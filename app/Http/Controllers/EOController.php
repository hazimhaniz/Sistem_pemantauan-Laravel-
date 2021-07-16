<?php

namespace App\Http\Controllers;

use App\JenisPengawasan;
use App\Kompeten;
use App\MasterModel\MasterFilingStatus;
use App\MasterModel\MasterUserStatus;
use App\MasterModel\MasterUserType;
use App\Models\UploadedFile;
use App\Notifications\SendMail;
use App\Projek;
use App\LogSystem;
use App\ProjekDetail;
use App\ProjekHasPp;
use App\ProjekHasUser;
use App\ProjekHelper;
use App\ProjekPengawasan;
use App\User;
use App\UserEO;
// use App\Mail\Pengguna\PendaftaranPenggunaEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Session;
use Mail;

class EOController extends Controller
{
    public function daftarEO(Request $request)
    {
        DB::beginTransaction();
        try {
            $exist = User::where('username', $request->username)->first();
            if($exist) {
                Session::flash('EOW','Pengguna sudah didaftar.');
                return redirect()->back();
            }

            $projekID = $request->projekID;

            $entity = UserEO::where('username', $request->username)->first();
            if (empty($entity)) {
                $entity = new UserEO;
            } else {
                Session::flash('EOW','EO sudah didaftar.');
                return redirect()->back();
            }

            $entity->username = $request->username;

        // if ($request->tarikh_sijil) {
        //     $entity->date_kompetensi = date('Y-m-d H:i:s', strtotime($request->tarikh_sijil));
        // }
        // if ($request->no_kompetensi) {
        //     $entity->no_kompetensi = strtoupper($request->no_kompetensi);
        // }

            $entity->save();

            if ($request->no_sijil_kompetensi) {
                for ($i = 0; $i < count($request->no_sijil_kompetensi); $i++) {
                    $kompeten = new Kompeten;
                    $kompeten->user_eo_id = $entity->id;
                    $kompeten->no_sijil = ($request->no_sijil_kompetensi[$i]) ? $request->no_sijil_kompetensi[$i] : '-';
                    $kompeten->tarikh_sijil = ($request->tarikh_sijil[$i]) ? $request->tarikh_sijil[$i] : '-';
                    $kompeten->jenis_kompetensi = ($request->jenis_kompetensi[$i]) ? $request->jenis_kompetensi[$i] : '-';
                    $kompeten->alamat = ($request->alamat[$i]) ? $request->alamat[$i] : '-';
                    $kompeten->phone_eo = ($request->phone[$i]) ? $request->phone[$i] : '-';
                    $kompeten->email_eo = ($request->emel) ? $request->emel : '-';
                    $kompeten->save();
                }
            }
        // } else {
        //     \Session::flash('DaftarEOGagal', 'Pendaftaran EO Gagal. Sila masukkan maklumat kompetensi yang sah.');
        //     return redirect()->back();
        // }       

            if ($request->hasfile('gambar_eo_file')) {

                if(filesize($request->gambar_eo_file[0])>2000000){
                    Session::flash('maxPic');
                    return redirect()->back();
                    exit();
                   
                }

                else{
                    if($request->gambar_eo_file[0]->getClientOriginalExtension()!='pdf' &&$request->gambar_eo_file[0]->getClientOriginalExtension()!='png' && $request->gambar_eo_file[0]->getClientOriginalExtension()!='jpeg' && $request->fail_eo_file[0]->getClientOriginalExtension()!='jpg' && $request->gambar_eo_file[0]->getClientOriginalExtension()!='docx'){
                        Session::flash('maxFile');
                        return redirect()->back();
                        exit();

                    }

                    else{ uploadFiles($entity, ['files' => $request->gambar_eo_file], 'fail_eo_file', $projekID);}
                }
            }

            if ($request->hasfile('fail_eo_file')) {
         

                if(filesize( $request->fail_eo_file[0])>3000000){
                    Session::flash('maxFile');
                    return redirect()->back();
                    exit();
                     }

                     else{

                        if($request->fail_eo_file[0]->getClientOriginalExtension()!='pdf' && $request->fail_eo_file[0]->getClientOriginalExtension()!='png' && $request->fail_eo_file[0]->getClientOriginalExtension()!='jpeg' && $request->fail_eo_file[0]->getClientOriginalExtension()!='jpg' && $request->fail_eo_file[0]->getClientOriginalExtension()!='docx'){
                            Session::flash('maxFile');
                            return redirect()->back();
                            exit();

                        }

                        else{ uploadFiles($entity, ['files' => $request->fail_eo_file], 'fail_eo_file', $projekID);}
                     }
            }


            $log = new LogSystem;
		    $log->module_id = 27; //pendaftaran pengguna
		    $log->activity_type_id = 4; //tambah data
		    $log->description = "Pendaftaran EO";
		    $log->url = $request->fullUrl();
		    $log->method = strtoupper($request->method());
		    $log->ip_address = $request->ip();
		    $log->created_by_user_id = auth()->user()->id;
		    $log->save();

            $user = User::firstOrCreate(['username' => $request->username]);
            $user->name = $request->nama;
            $user->email = $request->emel;
            $user->phone = $request->no_phone;
            $user->fax = $request->fax;
            $user->username = $request->username;
            $user->user_type_id = 3;
            $user->entity_type = "App\UserEO";
            $user->entity_id = $entity->id;

            if (empty($user->email_sent)) {
                $password = bcrypt('password');
                $user->password = $password;
                $user->user_status_id = 103;

                $data = [
                    'emel' => $user->email,
                    'name' => $user->name,
                    'username' => $user->username,
                    'password' => $password,
                    'no_fail_jas' => auth()->user()->project_has_user->projek->no_fail_jas,
                    'nama_projek' => auth()->user()->project_has_user->projek->nama_projek,
                    'receiver_user_id' => $user->id,
                ];

                sendMail($user, 24, $data);
                sendNotification(16, $data);
            }

            $user->save();

            $user->assignRole(['eo'])->assignRole(['ex']);

            $projekHasPP = ProjekHasPp::where('projek_id', $request->projekID)->first();
            $ProjekHasUser = ProjekHasUser::firstOrCreate(['projek_id' => $request->projekID, 'user_id' => $user->id]);
            $ProjekHasUser->projek_has_pp_id = $projekHasPP->id;
            $ProjekHasUser->role_id = 5;
            $ProjekHasUser->status = 103;
            $ProjekHasUser->replace_user_id = $request->old_user_eo;
            $ProjekHasUser->save();

            $jenis_pengawasan = JenisPengawasan::where('projek_id', $request->projekID)->first();

            if ($jenis_pengawasan) {
                $addedpengawasan = ProjekPengawasan::where('projek_id', $request->projekID)->get();
                $ids = [];
                foreach ($addedpengawasan as $key => $value) {
                    $ids[$key] = $value->pengawasan_id;
                }
                $deoded = json_decode($jenis_pengawasan->jenis_pengawasan_id);
                foreach ($deoded as $key => $value) {
                    if (in_array($value, $ids)) {
                        $allin = true;
                    } else {
                        $allin = false;
                    }
                }
            }

            $checkEo = ProjekHasUser::where('projek_id', $request->projekID)->where('role_id', 5)->first();
            if (empty($checkEo)) {
                $allin = false;
            }

            if ($allin) {
                $ProjekDetails = ProjekDetail::where('projek_id', $request->projekID)->first();
                if ($ProjekDetails) {
                    $ProjekDetails->status_id = 2;
                    $ProjekDetails->save();
                }
            }

            // $projek = Projek::with('projekdetail')->findOrFail($projekID);
            // $data = [
            //     'no_fail_jas' => $projek->no_fail_jas,
            //     'projek' =>  $projek->nama_projek . ',' . ($projek->projekdetail ? $projek->projekdetail->lokasi : ''),
            //     'email' => $request->emel,
            //     'nama_eo' => $request->nama,
            //     'kad_pengenalan' => $request->username
            // ];

            // Mail::to($request->emel)->send(new PendaftaranPenggunaEO($data, 'Pendaftaran Pengguna EO'));

            DB::commit();
            \Session::flash('DaftarEO', 'Pendaftaran EO sudah berjaya');
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('DaftarEO_failed', 'Pendaftaran EO gagal');
            return redirect()->back();
        }
    }

    public function penukaranEO(Request $request)
    {
        $projekID = $request->projekID;
        $ProjekHasUserEOs = ProjekHasUser::where('projek_id', $projekID)->where('role_id', 5)->where('status', 101)->get();

        return view('projek.penukaranEO', compact('projekID', 'ProjekHasUserEOs'));
    }

    public function pendEO(Request $request)
    {
        $projekID = $request->projekID;
        $ProjekHasUserEOs = ProjekHasUser::where('projek_id', $projekID)->where('role_id', 5)->where('status', 101)->get();

        return view('form-backup.pendEO', compact('projekID', 'ProjekHasUserEOs'));
    }



    public function penukaranEOSubmit(Request $request)
    {   

        
        $projekID = $request->projekID;

        

        $entity = UserEO::where('username', $request->username)->first();
        if (empty($entity)) {
            $entity = new UserEO;
            $entity->username = $request->username;
        }
        $entity->name = $request->nama;

        if ($request->tarikh_sijil) {
            $entity->date_kompetensi = date('Y-m-d H:i:s', strtotime($request->tarikh_sijil));
        }

        if ($request->no_kompetensi) {
            $entity->no_kompetensi = strtoupper($request->no_kompetensi);
        }

        $entity->save();


        if ($request->hasfile('gambar_eo_file')) {

            if(filesize($request->gambar_eo_file[0])>2000000){
                Session::flash('maxPic');
                return redirect()->back();
                exit();
               
            }

            else{
                if($request->gambar_eo_file[0]->getClientOriginalExtension()!='pdf' &&$request->gambar_eo_file[0]->getClientOriginalExtension()!='png' && $request->gambar_eo_file[0]->getClientOriginalExtension()!='jpeg' && $request->fail_eo_file[0]->getClientOriginalExtension()!='jpg' && $request->gambar_eo_file[0]->getClientOriginalExtension()!='docx'){
                    Session::flash('maxFile');
                    return redirect()->back();
                    exit();

                }

                else{ uploadFiles($entity, ['files' => $request->gambar_eo_file], 'fail_eo_file', $projekID);}
            }
        }

        if ($request->hasfile('fail_eo_file')) {
     

            if(filesize( $request->fail_eo_file[0])>3000000){
                Session::flash('maxFile');
                return redirect()->back();
                exit();
                 }

                 else{

                    if($request->fail_eo_file[0]->getClientOriginalExtension()!='pdf' && $request->fail_eo_file[0]->getClientOriginalExtension()!='png' && $request->fail_eo_file[0]->getClientOriginalExtension()!='jpeg' && $request->fail_eo_file[0]->getClientOriginalExtension()!='jpg' && $request->fail_eo_file[0]->getClientOriginalExtension()!='docx'){
                        Session::flash('maxFile');
                        return redirect()->back();
                        exit();

                    }

                    else{ uploadFiles($entity, ['files' => $request->fail_eo_file], 'fail_eo_file', $projekID);}
                 }
        }

        $user = User::firstOrCreate(['username' => $request->username]);
        $user->name = $request->nama;
        $user->email = $request->emel;
        $user->phone = $request->no_phone;
        $user->fax = $request->fax;
        $user->username = $request->username;
        $user->user_type_id = 3;
        $user->entity_type = "App\UserEO";
        $user->entity_id = $entity->id;
        if (empty($user->email_sent)) {
            $user->password = bcrypt('password');
            $user->user_status_id = 103;
        }
        $user->save();

        $user->assignRole(['eo'])->assignRole(['ex']);

        $projekHasPP = ProjekHasPp::where('projek_id', $request->projekID)->first();
        $ProjekHasUser = ProjekHasUser::firstOrCreate(['projek_id' => $request->projekID, 'user_id' => $user->id]);
        $ProjekHasUser->projek_has_pp_id = $projekHasPP->id;
        $ProjekHasUser->role_id = 5;
        $ProjekHasUser->status = 103;
        $ProjekHasUser->replace_user_id = $request->old_user_eo;
        $ProjekHasUser->save();


        $log = new LogSystem;
        $log->module_id = 27; //pendaftaran pengguna
        $log->activity_type_id = 5; //kemaskini data
        $log->description = "Penukaran EO";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->user()->id;
        $log->save();

        $jenis_pengawasan = JenisPengawasan::where('projek_id', $request->projekID)->first();

        if ($jenis_pengawasan) {
            $addedpengawasan = ProjekPengawasan::where('projek_id', $request->projekID)->get();
            $ids = [];
            foreach ($addedpengawasan as $key => $value) {
                $ids[$key] = $value->pengawasan_id;
            }
            $deoded = json_decode($jenis_pengawasan->jenis_pengawasan_id);
            foreach ($deoded as $key => $value) {
                if (in_array($value, $ids)) {
                    $allin = true;
                } else {
                    $allin = false;
                }
            }
        }

        $checkEo = ProjekHasUser::where('projek_id', $request->projekID)->where('role_id', 5)->first();
        if (empty($checkEo)) {
            $allin = false;
        }

        if ($allin) {
            $ProjekDetails = ProjekDetail::where('projek_id', $request->projekID)->first();
            if ($ProjekDetails) {
                $ProjekDetails->status_id = 2;
                $ProjekDetails->save();
            }
        }

        Session::flash('success', 'Maklumat berjaya disimpan');
        return redirect()->back();
    }

    public function adminList(Request $request)
    {
        $status = [101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113];
        $userEO = ProjekHasUser::where('role_id', '=', '5')->whereIn('status', $status);

        if ($request->ajax()) {

            return datatables()->of($userEO->orderBy('created_at', 'DESC')->get())
            ->editColumn('no_fail_jas', function ($userEO) {
                return $userEO->projek ? $userEO->projek->no_fail_jas : '';
            })
            ->editColumn('nama_projek', function ($userEO) {
                $projekName = $userEO->projek ? $userEO->projek->nama_projek : '';
                return "<span class='ow pull-left'>" . $projekName . "</span>";
            })
            ->editColumn('nama_pengguna', function ($userEO) {
                return $userEO->user ? $userEO->user->name : '';
            })
            ->editColumn('peranan', function ($userEO) {
                return $userEO->role ? $userEO->role->description : '';
            })
            ->editColumn('status', function ($userEO) {
                $status = $userEO->statusFiling ? $userEO->statusFiling->name : '';
                $badge = $userEO->statusFiling ? $userEO->statusFiling->badge : '';
                return '<span class="label label-lg label-inline ' . $badge . '">' . $status . '</span>';
            })
            ->editColumn('action', function ($userEO) {

                $button = "";

                $button .= '<button onclick="tindakanModal(' . $userEO->id . ')" type="button" class="btn fail btn-sm m-t-5"> TINDAKAN </button>';

                return $button;
            })
            ->make(true);
        }

        $types = MasterUserType::whereIn('id', [3, 4])->get();
        $all_status = MasterUserStatus::all();
        $legendStatuses = MasterFilingStatus::whereIn('id', $status)->get();

        return view('pengurusan_eo.adminList', compact('types', 'all_status', 'legendStatuses'));
    }

    public function adminTindakanModal(Request $request)
    {
        $projekHasUserID = $request->projekHasUserID;

        $projekHasUser = ProjekHasUser::where('id', $projekHasUserID)->first();
        $projek = $projekHasUser->projek;
        $user = $projekHasUser->user;
        $UserEO = UserEO::where('id', $user->entity_id)->first();
        $kompeten = Kompeten::where('user_eo_id', $UserEO->id)->get();

        $projekHasPP = ProjekHasPp::where('projek_id', $projek->id)->first();

        return view('pengurusan_eo.adminTindakanModal', compact('kompeten', 'projekHasUserID', 'projekHasUser', 'projek', 'user', 'UserEO', 'projekHasPP'));
    }

    public function adminTindakanModalSubmit(Request $request)
    {
        DB::beginTransaction();
        $projekHasUserID = $request->projekHasUserID;

        $projekHasUser = ProjekHasUser::where('id', $projekHasUserID)->first();
        $projekHasUser->status = $request->status;
        $projekHasUser->save();

        $log = new LogSystem;
        $log->module_id = 15;
        $log->activity_type_id = 20;
        $log->description = "Buat keputusan status pengguna";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();


        $user = User::where('id', $projekHasUser->user_id)->first();
        if ($request->status == 101) {
            $user->user_status_id = "101";
            $user->save();

            if ($projekHasUser->replace_user_id) {
                $projekHasUserReplace = ProjekHasUser::where('projek_id', $projekHasUser->projek_id)->where('user_id', $projekHasUser->replace_user_id)->where('role_id', 5)->first();
                $projekHasUserReplace->status = 111;
                $projekHasUserReplace->save();
            }
            if (empty($user->email_sent)) {
                $password = $this->generateRandomString();

                $user->password = bcrypt($password);
                $user->email_sent = 1;
                $user->save();

                $data = [
                    'receiver_user_id' => $user->id,
                    'no_fail_jas' => $projekHasUser->projek->no_fail_jas,
                    'nama_projek' => $projekHasUser->projek->nama_projek,
                    'password' => $password,
                    'username' => $user->username,
                ];

                sendMail($user, 26, $data);
                sendNotification(18, $data);
            }
        } else if ($request->status == 102) {
            $data = [
                'receiver_user_id' => $user->id,
                'no_fail_jas' => $projekHasUser->projek->no_fail_jas,
                'nama_projek' => $projekHasUser->projek->nama_projek,
                'username' => $user->username,
                'sebab_ditolak' => 'BUKAN WARGANEGARA MALAYSIA',
            ];

            // sendMail($user, 19, $data);
            sendNotification(20, $data);
        } else if ($request->status == 105) {
            $data = [
                'receiver_user_id' => $user->id,
                'no_fail_jas' => $projekHasUser->projek->no_fail_jas,
                'nama_projek' => $projekHasUser->projek->nama_projek,
                'username' => $user->username,
                'sebab_ditolak' => 'TIADA PENGESAHAN',
            ];

            // sendMail($user, 19, $data);
            sendNotification(20, $data);
        }

        ProjekHelper::checkProjekHasUserStatus($projekHasUser);
        DB::commit();
        Session::flash('success', 'Maklumat berjaya disimpan');
        return redirect()->back();
    }
    public function generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    public function downlaodfile($id, $type, $projekId)
    {
        $user = UserEO::where('id', $id)->first();
        if ($type == 'gambar') {

            $fileUrl = UploadedFile::where('projek_id', $projekId)->where('doc_type', 'gambar_eo_file')->first();
        } else {

            $fileUrl = UploadedFile::where('projek_id', $projekId)->where('doc_type', 'fail_eo_file')->first();
        }

        if ($fileUrl) {
            $path = $fileUrl->path;
            $path = storage_path('app/public/'. $path);
            if (file_exists($path)) {
                return response()->download($path);
            } else {
                \Session::flash('not_found', 'Fail tidak dijumpai');
                return redirect()->back();
            }
        } else {
            return "-";
        }
    }

}
