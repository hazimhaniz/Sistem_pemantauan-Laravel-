<?php

namespace App\Http\Controllers;

use App\Distribution;
use App\JasFail;
use App\JasFailDetail;
use App\Projek;
use App\ProjekDetail;
use App\User;
use App\UserPP;
use Illuminate\Http\Request;
use Session;
use App\ProjekHasUser;
use App\JenisPengawasan;
use App\Notifications\SendMail;
use App\ProjekHasPp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class FailJasController extends Controller
{
    public function semakFailJas(Request $request)
    {
        $jasFail = null;
        $jasFailDetail = null;

        $exist = false;
        $msg = "";
        $canRegister = true;

        $jasFail = JasFail::where('nofail', $request->no_fail_jas)->first();
        if ($jasFail) {
            $jasFailDetail = JasFailDetail::where('jas_fail_id', $jasFail->id)->first();
            if ($jasFailDetail) {
                $exist = true;
            }
        }

        if ($exist) {
            $projek = Projek::where('no_fail_jas', $request->no_fail_jas)->where('status', '>=', 200)->first();
            if ($projek) {
                $canRegister = false;
                $msg = "Projek ".$request->no_fail_jas." telah didaftar dengan PP";
            }

            $distribution = Distribution::where('no_fail_jas', $request->no_fail_jas)->first();
            if (!$distribution) {
                $canRegister = false;
                $msg = "Projek ".$request->no_fail_jas." Sedang Diproses JAS";
            }
        }
        else{
            $msg = "Tiada Rekod ".$request->no_fail_jas;
        }

        if ($exist && $canRegister) {
            // $msg = "Projek Sedang Diproses JAS";
        }

        // condition for available jas fail

        $response['exist'] = $exist;
        $response['msg'] = $msg;
        $response['canRegister'] = $canRegister;
        $response['jasFail'] = $jasFail;
        $response['jasFailDetail'] = $jasFailDetail;

        return response()->json($response);
    }

    public function daftarPPProjek(Request $request)
    {
        DB::beginTransaction();
        $pengawasan = $request->pengawasan;
        //check login conditions

        $projek = Projek::where('no_fail_jas', $request->no_fail_jas)->where('status', 2)->first();
        if ($projek) {
            $ProjekHasUser = ProjekHasUser::where('projek_id', $projek->id)->where('status', 2)->first();
            if ($ProjekHasUser) {
                Session::flash('flash_message', 'Projek already registered');
                return redirect()->back();
            }
        }

        $userPP = UserPP::firstOrCreate(['username' => $request->no_kp]);
        $userPP->username = $request->no_kp;
        $userPP->name = $request->nama_pegawai_penggerak;
        $userPP->save();

        $user = User::firstOrCreate(['username' => $request->no_kp]);
        $user->entity_type = "App\UserPP";
        $user->entity_id = $userPP->id;
        $user->username = $request->no_kp;
        $user->name = $request->nama_pegawai_penggerak;
        $user->email = $request->email;
        if (empty($user->password)) {
            $user->password = bcrypt('password');
            $user->user_status_id = 103;
        }
        $user->save();

        $data['receiver_user_id'] = $user->id;

        $user->assignRole(['pp'])->assignRole(['ex']);

        $jasFail = JasFail::where('nofail', $request->no_fail_jas)->first();
        $jasFailDetail = JasFailDetail::where('jas_fail_id', $jasFail->id)->first();

        $projek = Projek::firstOrCreate(['no_fail_jas' => $request->no_fail_jas]);
        $projek->no_fail_jas = $request->no_fail_jas;
        $projek->nama_projek = $jasFail->name;
        $projek->penggerak_projek = $user->id;
        $projek->status = 2;
        $projek->state = $jasFailDetail->negeri;
        $projek->tarikh_hantar = now();
        $projek->save();

        $projekDetail = ProjekDetail::firstOrCreate(['projek_id' => $projek->id]);
        $projekDetail->projek_id = $projek->id;
        $projekDetail->status_id = 2;
        $projekDetail->aktiviti = $jasFailDetail->aktiviti;
        $projekDetail->lokasi = $jasFailDetail->lokasi;
        $projekDetail->negeri = $jasFailDetail->negeri;
        $projekDetail->save();

        $projekHasUser = ProjekHasUser::firstOrCreate(['projek_id' => $projek->id, 'user_id' => $user->id]);
        $projekHasUser->projek_id = $projek->id;
        $projekHasUser->user_id = $user->id;
        $projekHasUser->status = 2;
        $projekHasUser->role_id = 4;
        $projekHasUser->save();

        $projekHasPP = ProjekHasPp::firstOrCreate(['projek_id' => $projek->id, 'user_id' => $user->id]);
        $projekHasPP->projek_id = $projek->id;
        $projekHasPP->user_id = $user->id;
        $projekHasPP->role_id = 4;
        $projekHasPP->save();

        $jenisPengawasan = JenisPengawasan::firstOrCreate(['projek_id' => $projek->id]);
        $jenisPengawasan->jenis_pengawasan_id = json_encode($pengawasan);
        $jenisPengawasan->save();

        $data['no_fail_jas'] = $request->no_fail_jas;
        $data['nama_projek'] = $jasFail->name;
        $data['emel'] = $request->email;
        $data['username'] = $request->no_kp;
        $data['nama_pp'] = $request->nama_pegawai_penggerak;
        $data['projek_id'] = $projek->id;

        sendMail($user, 22, $data);
        sendNotification(23, $data);

        DB::commit();
        Session::flash('success', 'Permohonan akan diproses dalam tempoh 5 hari bekerja. Sila semak e-mel bagi pengaktifan akaun.');
        return redirect()->back();
    }
}
