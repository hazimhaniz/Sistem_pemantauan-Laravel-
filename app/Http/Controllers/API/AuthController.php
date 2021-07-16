<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Carbon\Carbon;
use App\ProjekHasPp;
use App\ProjekHasUser;
use App\Projek;
use App\ProjekDetail;
use App\ProjekEMP;
use App\ProjekLDP2M2;
use App\ProjekAudit;
use App\UserPP;
use App\UserPPProjek;
use App\JasFail;
use App\JasFailDetail;
use App\JasEmp;
use App\JasAudit;
use App\JasLdp2m2;
use App\JenisPengawasan;
use App\OtherModel\Inbox;
use App\Distribution;
use Mail;
use App\Mail\Pengguna\PengesahanPenggunaPP;
use DB;

class AuthController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Register user through REST API
     *
     * @return void
     */

    public function checkExist($id) {
      // dd('wdwdw');
      // dd(str_replace('-', '/', $id));
        $new = str_replace('-', '/', $id);
      $exist = 0;
      $projekall = \App\Projek::where('no_fail_jas','like','%'.$new.'%')->first();
      // if ($projekall) {
      //     $exist = 1;
      // }

      if ($projekall) {
          $projekhasuser = ProjekHasUser::where('projek_id',$projekall->id)->get();
          foreach ($projekhasuser as $key => $value) {
              $user = User::where('id',$value->user_id)->first();
              // dd($user);
              if ($user) {
                  if ($user->entity_type == 'App\UserPP' && $user->user_status_id == 1) {
                      $exist = 1;
                  }
              }
          }
      }
      // foreach($projekall as $projekalls){
      //   $dbjas = str_replace(' ', '', strtoupper($projekalls->no_fail_jas));
      //   // echo $dbjas."<br>";
      //   $new = str_replace('-', '/', $id);
      //   if($dbjas == str_replace(' ', '', strtoupper($new))){
      //     $exist = 1;
      //   }
      // }
      // dd($exist);
      //JAS file number already use
      if($exist == 1){
          return response()->json(['status' => 'error']);
      }else{
        //not yet used, but check if exist in distribution (flag no yet initiated)
        $distribution = \App\Distribution::where('no_fail_jas','like','%'.$new.'%')->count();
        // $distribution = \App\Distribution::where('no_fail_jas',str_replace('-', '/', $id))->count();
        // dd($distribution);
        if($distribution == 0){
          return response()->json(['status' => 'pending_distribute']);
        } else{
          return response()->json(['status' => 'ok']);
        }
      }
    }

    /**
     * Register user through REST API
     *
     * @return void
     */

    public function jas($id) {
      $jasfail = str_replace(' ', '', $id);
      $JasFail = \App\JasFail::all();
      foreach($JasFail as $JasFails){
        $JasFaildetail = strtoupper(str_replace(' ', '', $JasFails->nofail));
        if($JasFaildetail == strtoupper(str_replace('-', '/', $jasfail))){
          $JasFaildetail = \App\JasFailDetail::where('jas_fail_id',$JasFails->id)->first();
          $projek = \App\Projek::where('no_fail_jas',$JasFails->nofail)->first();
          // dd($projek->status);
          // $projekpakej = \App\ProjekPakej::where('projek_id',$projek->id)->first();
          // // dd($projekpakej);
          // if ($projekpakej) {
          //     $pakejpengawasan = \App\PakejHasPengawasan::where('pakej_id',$projekpakej->id)->get();
          // }
          // dd($pakejpengawasan);
          if ($projek) {
              $jenispengawasan = \App\JenisPengawasan::where('projek_id',$projek->id)->first();
              $jsona = json_decode($jenispengawasan->jenis_pengawasan_id);
              $exist = 1;
              if ($projek->status != 9) {
                  $changeable = 'ubah';
              } else {
                  $changeable = 'noubah';
              }
              // dd($changeable);
              $master = \App\MasterModel\MasterPengawasan::all();
              return response()->json(['changeable' => $changeable, 'master' => $master, 'pakejpengawasan' => $jsona, 'exist' => $exist, 'status' => 'ok', 'nama' => $JasFails->name, 'ppnama' => $JasFaildetail->pegawai_penggerak, 'ppnamap' => $JasFaildetail->nama_penggerak, 'failjas' => $JasFails->nofail]);
          } else {
              $exist = 0;
              return response()->json(['exist' => $exist, 'status' => 'ok', 'nama' => $JasFails->name, 'ppnama' => $JasFaildetail->pegawai_penggerak, 'ppnamap' => $JasFaildetail->nama_penggerak, 'ppnamap' => $JasFaildetail->nama_penggerak,'failjas' => $JasFails->nofail]);
          }
        }
      }
      // $JasFail = \App\JasFail::where('nofail',str_replace('-', '/', $jasfail))->first();
      // return response()->json(['status' => 'ok', 'nama' => $JasFail->name]);
    }

    public function generateRandomString($length = 10) {
      return bcrypt(substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length));
    }

    public function register(Request $request) {

      try{
        DB::beginTransaction();
       // dd($request->all());
      $distribution = \App\Distribution::where('no_fail_jas',$request->no_fail_JAS)->first();
      $projekcheck = \App\Projek::where('no_fail_jas',$request->no_fail_JAS)->first();
      // exit();
      // dd($request->all());
        $rules = [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            // 'phone' => 'required|string',
            'username' => 'required|string|max:150', // en rahman 20/02/2020
            // 'username' => 'required|string|max:150|unique:user', // en rahman 20/02/2020
            // 'password' => 'required|string|min:8|confirmed',
        ];

        //$rules['name'] = 'required|string|unique:user_pp'; // en rahman 20/02/2020
        $rules['name'] = 'required|string';
        if (!$projekcheck) {
          $rules['pakej_pengawasan_id'] = 'required';
        }
        $validator = Validator::make($request->all(), $rules);
        // dd($validator->errors());
        if ($validator->fails()) {
            // If validation failed
            return response()->json([
                'status' => 'error',
                'code' => '006',
                'message' => 'Ralat pengesahan input pengguna.',
                'errors' => $validator->errors(),
            ], 422);
        }
        if (strpos($request->email, 'doe.gov') !== false) {
            return response()->json([
                'status' => 'error',
                'code' => '006',
                'message' => 'Ralat pengesahan input pengguna.',
                'errors' => [
                                'email' => ['E-mel xxxxx@doe.gov.my tidak boleh daftar sebagai pihak syarikat.'],
                            ],
            ], 422);
        }

        // $usercheck = User::where('username',$request->username)->first();
        // if($usercheck){
        //     return response()->json(['status' => 'info', 'title' => 'No. kad pengenalan telah wujud.', 'message' => 'Adakah anda ingin menambah no. fail JAS pada no. kad pengenalan '.$usercheck->username.' ?']);
        // }

      //   $entity = UserPP::create([
      //     'name' => $request->name,
      //     'register_at' => Carbon::parse(Carbon::now())->format('d/m/Y'),
      //     // Carbon::createFromFormat('d/m/Y', Carbon::now())->toDateTimeString(),
      // ]);

      $entity = UserPP::firstOrCreate(['username' => $request->username]);
      $entity->username = $request->username;
      $entity->name = $request->name;
      $entity->register_at = now();
      $entity->save();

        // $distribution = Distribution::where('no_fail_jas',$request->no_fail_JAS)->first();
        // dd($distribution->assignstaff->email);

        Mail::to($distribution->assignstaff->email)->send(new PengesahanPenggunaPP($request->no_fail_JAS, 'Pengesahan Pengguna Luar - PP'));
        
        // $user = $entity->user()->create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     // 'phone' => $data['phone'],
        //     'username' => $request->username,
        //     'user_type_id' => 3,
        //     'user_status_id' => 5,
        //     // 'password' => bcrypt($request->password),
        //     'password' => $this->generateRandomString(),
        // ])->assignRole(['pp'])->assignRole(['ex']);

        $user = User::firstOrCreate(['username' => $request->username]);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type_id = 3;
        $user->user_status_id = 5;
        $user->entity_type = "App\UserPP";        
        $user->entity_id = $entity->id;
         $user->save();



        // $user->entity_type->assignRole(['pp']);
        // $user->entity_id = "";
        // dd($user->assignRole(['pp'])->assignRole(['ex']));

    

        if ($user->wasRecentlyCreated)
        {
          $user->password = $this->generateRandomString();
          $user->save();
        }
        // dd($user->assignRole(['pp'])->assignRole(['ex']));
        $user->assignRole(['pp'])->assignRole(['ex']);
        
        $today =  Carbon::parse(Carbon::now())->format('d/m/Y');
        Inbox::create([
              'subject' => 'Pengesahan Pengguna Luar - PP',
              'message' => 'Anda telah ditugaskan untuk sah kan pengguna PP. <br /> Tarikh Agihan Tugasan Melalui Sistem : '.$today,
              'sender_user_id' => $user->id, //admin
              'receiver_user_id' => Distribution::where('no_fail_jas',$request->no_fail_JAS)->first()->assigned_to_user_id,
              'inbox_status_id' => 2,
          ]);

        // echo 'User created successfully.';exit;
        if ($projekcheck) {
          $ProjekHasUser = new ProjekHasUser();
          $ProjekHasUser->user_id = $user->id;
          $ProjekHasUser->projek_id = $projekcheck->id;
          $ProjekHasUser->user_flag = 0;
          $ProjekHasUser->save();

          $ProjekHasPp = new ProjekHasPp();
          $ProjekHasPp->user_id = $user->id;
          $ProjekHasPp->projek_id = $projekcheck->id;
          $ProjekHasPp->save();

          if ($projekcheck->status_id != 9) {
            $checkpega = JenisPengawasan::where('projek_id',$projekcheck->id)->first();
            if ($checkpega) {
              $checkpega->delete();
            }
            $jenispengawasan = new JenisPengawasan();
            $jenispengawasan->projek_id =  $projekcheck->id;
            $jenispengawasan->jenis_pengawasan_id = json_encode($request->pakej_pengawasan_id);
            $jenispengawasan->save();
          }

          $today =  Carbon::parse(Carbon::now())->format('d/m/Y');
          // Inbox::create([
          //     'subject' => 'Pengesahan Pengguna Luar - PP',
          //     'message' => 'Anda telah ditugaskan untuk sah kan pengguna PP. <br /> Tarikh Agihan Tugasan Melalui Sistem : '.$today,
          //     'sender_user_id' => $user->id, //admin
          //     'receiver_user_id' => Distribution::where('no_fail_jas',$request->no_fail_JAS)->first()->assigned_to_user_id,
          //     'inbox_status_id' => 2,
          // ]);

        } else {
            $projek = new Projek();
            $projek->no_fail_jas = $request->no_fail_JAS;
            $projek->nama_projek = $request->nama_projek;
            $projek->penggerak_projek = $user->id;
            $projek->status = 1;
            if($projek->save()){

              $jasFail = JasFail::where('nofail',$request->no_fail_JAS)->first();

              $jasdetail = JasFailDetail::where('jas_fail_id',$jasFail->id)->first();
              if($jasdetail){
                $projekDetail = new ProjekDetail();
                $projekDetail->projek_id = $projek->id;
                $projekDetail->status_id = 1;
                $projekDetail->aktiviti = $jasdetail->aktiviti;
                $projekDetail->lokasi = $jasdetail->lokasi;
                $projekDetail->negeri = $jasdetail->negeri;
                $projekDetail->daerah = $jasdetail->daerah;
                $projekDetail->poskod = $jasdetail->poskod;
                $projekDetail->alamat_surat = $jasdetail->alamat_surat;
                $projekDetail->surat_negeri = $jasdetail->surat_negeri;
                $projekDetail->surat_daerah = $jasdetail->surat_daerah;
                $projekDetail->surat_bandar = $jasdetail->surat_bandar;
                $projekDetail->surat_poskod = $jasdetail->surat_poskod;
                $projekDetail->jenis_projek = $jasdetail->jenis_projek;
                $projekDetail->laporaneia = $jasdetail->laporaneia;
                $projekDetail->peringkat_audit = $jasdetail->peringkat_audit;
                $projekDetail->jenis = $jasdetail->jenis;
                $projekDetail->other_aktiviti = $jasdetail->other_aktiviti;
                $projekDetail->save();
              }

              $jasemp = JasEmp::where('jas_fail_id',$jasFail->id)->first();
              if($jasemp){
                $projekEMP = new ProjekEMP();
                $projekEMP->projek_id = $projek->id;
                $projekEMP->tarikh_kelulusan = $jasemp->tarikh_kelulusan;
                $projekEMP->laporan = $jasemp->laporan;
                $projekEMP->jururunding = $jasemp->jururunding;
                $projekEMP->save();
              }

              $jasaudit = JasAudit::where('jas_fail_id',$jasFail->id)->first();
              if($jasaudit){
                $projekAudit = new ProjekAudit();
                $projekAudit->projek_id = $projek->id;
                $projekAudit->tarikh_audit = $jasaudit->tarikh_audit;
                $projekAudit->save();
              }

              $jasldp2m2 = JasLdp2m2::where('jas_fail_id',$jasFail->id)->first();
              if($jasldp2m2){
                $projekLdp2m2 = new ProjekLDP2M2();
                $projekLdp2m2->projek_id = $projek->id;
                $projekLdp2m2->tarikh_kelulusan = $jasldp2m2->tarikh_kelulusan;
                $projekLdp2m2->dokumen = $jasldp2m2->dokumen;
                $projekLdp2m2->nama = $jasldp2m2->nama;
                $projekLdp2m2->no_plan_diluluskan = $jasldp2m2->no_plan_diluluskan;
                $projekLdp2m2->save();
              }

              $ProjekHasUser = new ProjekHasUser();
              $ProjekHasUser->user_id = $user->id;
              $ProjekHasUser->projek_id = $projek->id;
              $ProjekHasUser->user_flag = 0;
              $ProjekHasUser->save(); 

              $ProjekHasPp = new ProjekHasPp();
              $ProjekHasPp->user_id = $user->id;
              $ProjekHasPp->projek_id = $projek->id;
              $ProjekHasPp->save();

              $jenispengawasan = new JenisPengawasan();
              $jenispengawasan->projek_id =  $projek->id;
              $jenispengawasan->jenis_pengawasan_id = json_encode($request->pakej_pengawasan_id);
              $jenispengawasan->save();

              //notifikasi kepada pegawai Jas untuk mengaktifkan Penggerak Projek(pp)

              // Inbox::create([
              //       'subject' => 'Pengesahan bagi Penggerak Projek '.'('.$request->no_fail_JAS.')'.' diperlukan',
              //       'message' => 'Terdapat pengesahan diperlukan untuk penggerak projek',
              //       'sender_user_id' => 4, //admin
              //       'receiver_user_id' => Distribution::where('no_fail_jas',$request->no_fail_JAS)->first()->assigned_to_user_id,
              //       'inbox_status_id' => 2,
              // ]);

              // Mail::to('email@email.com')->send(new PengesahanPengguna($user, 'Pengesahan Pengguna', 'password'));

              $today =  Carbon::parse(Carbon::now())->format('d/m/Y');

              // Inbox::create([
              //       'subject' => 'No Fail JAS : '.$request->no_fail_JAS,
              //       'message' => ' Anda telah ditugaskan untuk mengurus projek bernombor fail JAS seperti di atas. <br /> Tarikh Agihan Tugasan Melalui Sistem : '.$today,
              //       'sender_user_id' => 4, //admin
              //       'receiver_user_id' => Distribution::where('no_fail_jas',$request->no_fail_JAS)->first()->assigned_to_user_id,
              //       'inbox_status_id' => 2,
              // ]);

              // Inbox::create([
              //       'subject' => 'Pengesahan Pengguna Luar - PP',
              //       'message' => 'Anda telah ditugaskan untuk sah kan pengguna PP. <br /> Tarikh Agihan Tugasan Melalui Sistem : '.$today,
              //       'sender_user_id' => $user->id, //admin
              //       'receiver_user_id' => Distribution::where('no_fail_jas',$request->no_fail_JAS)->first()->assigned_to_user_id,
              //       'inbox_status_id' => 2,
              // ]);


            }

        }

        DB::commit();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Permohonan akan diproses dalam tempoh 5 hari bekerja. Sila semak e-mel bagi pengaktifan akaun.']);
        
      }catch(\Exception $e){
        DB::rollback();
        \Log::error($e);
        // dd($e);
      }
        
        // Mail::to($distribution->assignstaff->email)->send(new PengesahanPenggunaPP($request->no_fail_JAS, 'Pengesahan Pengguna PP'));

    }

    // public function registerexist(Request $request) {
    //     $user = User::where('username',$request->username)->first();
    //     $distribution = \App\Distribution::where('no_fail_jas',$request->no_fail_JAS)->first();

    //     Mail::to($distribution->assignstaff->email)->send(new PengesahanPenggunaPP($request->no_fail_JAS, 'Pengesahan Pengguna PP'));

    //     $projek = new Projek();
    //     $projek->no_fail_jas = $request->no_fail_JAS;
    //     $projek->nama_projek = $request->nama_projek;
    //     $projek->penggerak_projek = $user->id;
    //     $projek->status = 1;
    //     if($projek->save()){

    //       $jasFail = JasFail::where('nofail',$request->no_fail_JAS)->first();

    //       $jasdetail = JasFailDetail::where('jas_fail_id',$jasFail->id)->first();
    //       if($jasdetail){
    //         $projekDetail = new ProjekDetail();
    //         $projekDetail->projek_id = $projek->id;
    //         $projekDetail->status_id = 1;
    //         $projekDetail->aktiviti = $jasdetail->aktiviti;
    //         $projekDetail->lokasi = $jasdetail->lokasi;
    //         $projekDetail->negeri = $jasdetail->negeri;
    //         $projekDetail->daerah = $jasdetail->daerah;
    //         $projekDetail->poskod = $jasdetail->poskod;
    //         $projekDetail->alamat_surat = $jasdetail->alamat_surat;
    //         $projekDetail->surat_negeri = $jasdetail->surat_negeri;
    //         $projekDetail->surat_daerah = $jasdetail->surat_daerah;
    //         $projekDetail->surat_bandar = $jasdetail->surat_bandar;
    //         $projekDetail->surat_poskod = $jasdetail->surat_poskod;
    //         $projekDetail->jenis_projek = $jasdetail->jenis_projek;
    //         $projekDetail->laporaneia = $jasdetail->laporaneia;
    //         $projekDetail->peringkat_audit = $jasdetail->peringkat_audit;
    //         $projekDetail->jenis = $jasdetail->jenis;
    //         $projekDetail->other_aktiviti = $jasdetail->other_aktiviti;
    //         $projekDetail->save();
    //       }

    //       $jasemp = JasEmp::where('jas_fail_id',$jasFail->id)->first();
    //       if($jasemp){
    //         $projekEMP = new ProjekEMP();
    //         $projekEMP->projek_id = $projek->id;
    //         $projekEMP->tarikh_kelulusan = $jasemp->tarikh_kelulusan;
    //         $projekEMP->laporan = $jasemp->laporan;
    //         $projekEMP->jururunding = $jasemp->jururunding;
    //         $projekEMP->save();
    //       }

    //       $jasaudit = JasAudit::where('jas_fail_id',$jasFail->id)->first();
    //       if($jasaudit){
    //         $projekAudit = new ProjekAudit();
    //         $projekAudit->projek_id = $projek->id;
    //         $projekAudit->tarikh_audit = $jasaudit->tarikh_audit;
    //         $projekAudit->save();
    //       }

    //       $jasldp2m2 = JasLdp2m2::where('jas_fail_id',$jasFail->id)->first();
    //       if($jasldp2m2){
    //         $projekLdp2m2 = new ProjekLDP2M2();
    //         $projekLdp2m2->projek_id = $projek->id;
    //         $projekLdp2m2->tarikh_kelulusan = $jasldp2m2->tarikh_kelulusan;
    //         $projekLdp2m2->dokumen = $jasldp2m2->dokumen;
    //         $projekLdp2m2->nama = $jasldp2m2->nama;
    //         $projekLdp2m2->no_plan_diluluskan = $jasldp2m2->no_plan_diluluskan;
    //         $projekLdp2m2->save();
    //       }

    //       $ProjekHasUser = new ProjekHasUser();
    //       $ProjekHasUser->user_id = $user->id;
    //       $ProjekHasUser->projek_id = $projek->id;
    //       $ProjekHasUser->user_flag = 0;
    //       $ProjekHasUser->save();

    //       $jenispengawasan = new JenisPengawasan();
    //       $jenispengawasan->projek_id =  $projek->id;
    //       $jenispengawasan->jenis_pengawasan_id = json_encode($request->pakej_pengawasan_id);
    //       $jenispengawasan->save();

    //       // $ppprojek = new UserPPProjek();
    //       // $ppprojek->no_fail_jas =  $projek->no_fail_jas;
    //       // $ppprojek->user_id = $user->id;
    //       // $ppprojek->status = 3;
    //       // $ppprojek->save();

    //       //notifikasi kepada pegawai Jas untuk mengaktifkan Penggerak Projek(pp)

    //       // Inbox::create([
    //       //       'subject' => 'Pengesahan bagi Penggerak Projek '.'('.$request->no_fail_JAS.')'.' diperlukan',
    //       //       'message' => 'Terdapat pengesahan diperlukan untuk penggerak projek',
    //       //       'sender_user_id' => 4, //admin
    //       //       'receiver_user_id' => Distribution::where('no_fail_jas',$request->no_fail_JAS)->first()->assigned_to_user_id,
    //       //       'inbox_status_id' => 2,
    //       // ]);

    //       // Mail::to('email@email.com')->send(new PengesahanPengguna($user, 'Pengesahan Pengguna', 'password'));

    //       $today =  Carbon::parse(Carbon::now())->format('d/m/Y');

    //       // Inbox::create([
    //       //       'subject' => 'No Fail JAS : '.$request->no_fail_JAS,
    //       //       'message' => ' Anda telah ditugaskan untuk mengurus projek bernombor fail JAS seperti di atas. <br /> Tarikh Agihan Tugasan Melalui Sistem : '.$today,
    //       //       'sender_user_id' => 4, //admin
    //       //       'receiver_user_id' => Distribution::where('no_fail_jas',$request->no_fail_JAS)->first()->assigned_to_user_id,
    //       //       'inbox_status_id' => 2,
    //       // ]);

    //       Inbox::create([
    //             'subject' => 'Pengesahan Pengguna Luar - PP',
    //             'message' => 'Anda telah ditugaskan untuk sah kan pengguna PP. <br /> Tarikh Agihan Tugasan Melalui Sistem : '.$today,
    //             'sender_user_id' => $user->id, //admin
    //             'receiver_user_id' => Distribution::where('no_fail_jas',$request->no_fail_JAS)->first()->assigned_to_user_id,
    //             'inbox_status_id' => 2,
    //       ]);


    //     }
        
    //     // Mail::to($distribution->assignstaff->email)->send(new PengesahanPenggunaPP($request->no_fail_JAS, 'Pengesahan Pengguna PP'));

    //     return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Permohonan akan diproses dalam masa 3 hari bekerja. Sila semak e-mel bagi penambahan no. fail JAS.']);
    // }
}
