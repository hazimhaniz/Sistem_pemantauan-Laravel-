<?php

namespace App\Http\Controllers;

use App\MasterModel\MasterPengawasan;
use App\Projek;
use App\MonthlyE;
use App\ProjekAudit;
use App\ProjekDetail;
use App\ProjekEMP;
use App\ProjekHasUser;
use App\ProjekLDP2M2;
use App\ProjekPakej;
use App\ProjekFasa;
use App\OtherModel\Inbox;
use App\Stesen;
use App\JasFailDetailAktiviti;
use App\JasFailDetail;
use App\MasterModel\MasterMonth;
use App\Parameter;
use App\ParameterBunyi;
use App\PenambahanStesen;
use App\PenambahanStesenStatus;
use App\PenambahanParameter;
use App\ProjekPengawasanLaporan;
use App\ProjekPengawasanLaporanStatus;
use App\PengurusanKuiri;
use App\PakejHasPengawasan;
use App\PengawasanHasEo;
use App\PengawasanHasEmc;
use App\StesenPengawasanStatus;
use Illuminate\Http\Request;
use App\MasterModel\MasterDistrict;
use App\MasterModel\MasterState;
use App\MasterModel\MasterSungai;
use App\MasterModel\MasterCity;
use App\MasterModel\MasterActivity;
use App\MasterModel\MasterPeringkatPengawasan;
use App\MasterModel\MasterProjectActivity;
use App\MasterModel\MasterPematuhanEia;
use App\MasterModel\MasterJenisProjek;
use App\MasterModel\MasterTempohAudit;
use App\MasterModel\MasterStation;
use App\MasterModel\MasterParameter;
use App\MasterModel\MasterStandard;
use App\MasterModel\MasterStandardBunyi;
use App\LogModel\LogSystem;
use App\User;
use App\UserPP;
use App\JasFail;
use Carbon\Carbon;
use Auth;
use Validator;
use App\Distribution;
use Mail;
use App\Mail\Pengguna\NewProject;
use App\Mail\Pengguna\PengesahanPenggunaPP;
use App\JenisPengawasan;

use App\JasEmp;
use App\JasAudit;
use App\JasLdp2m2;

use App\ProjekHasPp;

class ProjekControllerBak extends Controller
{
  protected $request;

  public function __construct() {
    $this->middleware('auth');
  }
  
    public function berfasa(){
        return view('form.berfasa');
    }

    public function senaraiRekodEkas(Request $request){
        $jasfail =  JasFailDetail::query();
           $jasfail =  $jasfail->select('jas_fail.id','jas_fail.name','jas_fail.nofail','jas_fail.status','jas_fail_detail.jas_fail_id','jas_fail_detail.jas_ekas_id','jas_fail_detail.negeri', 'jas_fail_detail.daerah')
            ->leftJoin('jas_fail','jas_fail_detail.jas_fail_id','=','jas_fail.id')->paginate('10');
        return view('form.PenggunaLuar.rekodEkas', compact('jasfail'));
    }

    public function addProjek(Request $request) {

    $log = new LogSystem;
    $log->module_id = 26;
    $log->activity_type_id = 2;
    $log->description = "Lihat Maklumat Projek";
      // $log->data_old = json_encode($request->input());
    $log->url = $request->fullUrl();
    $log->method = strtoupper($request->method());
    $log->ip_address = $request->ip();
    $log->created_by_user_id = auth()->id();
    $log->save();

    if(Auth::user()->hasRole('pp')){
      $user = auth()->id();
      $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id',$user)->first();
      $projek_id = $projek->projek_id;

        // dd($request->jenis_projek);
      if ($request->jenis_projek == 1) {
        $ProjekPakej = ProjekPakej::where('projek_id', $projek_id)->where('nama_pakej','like','%Tidak Berpakej / Tidak Berfasa%')->first();
          // dd($ProjekPakej);

        if ($ProjekPakej == null) {
          $Projekhaspakej = ProjekPakej::where('projek_id', $projek_id)->delete();
          $ProjekPakej = new ProjekPakej;
          $ProjekPakej->nama_pakej = 'Tidak Berpakej / Tidak Berfasa';
          $ProjekPakej->projek_id = $projek_id;
        }
        $mula = str_replace('/', '-', $request->tarikh_mula);
        $akhir = str_replace('/', '-', $request->tarikh_akhir);
        $datemula = null;
        $dateakhir = null;
        if ($mula) {
          $datemula = date("Y-m-d", strtotime($mula));
        }

        if ($akhir) {
          $dateakhir = date("Y-m-d", strtotime($akhir));
        }

        $ProjekPakej->kontraktor = $request->kontraktor;
        $ProjekPakej->pakej_negeri = $request->pakej_negeri;
        $ProjekPakej->alamat = $request->alamat;
        $ProjekPakej->alamat1 = $request->alamat1;
        $ProjekPakej->alamat2 = $request->alamat2;
        $ProjekPakej->tarikh_mula = $datemula;
        $ProjekPakej->tarikh_akhir = $dateakhir;
        $ProjekPakej->save();
            // $ProjekPakej = ProjekPakej::where('nama_pakej', )->first();
      } else {
        $ProjekPakej = ProjekPakej::where('projek_id', $projek_id)->where('nama_pakej','like','%Tidak Berpakej / Tidak Berfasa%')->delete();
      }

      $projekdetail = ProjekDetail::where('projek_id', $projek_id)->first();
      $arrayaktivity = explode(',', $request->aktiviti);
        // foreach ($arrayaktivity as $value) {
        //   $projekdetail->aktiviti = $request->aktiviti;
        // }
      if ($projekdetail) {
        $projekdetail->aktiviti = json_encode($arrayaktivity);
        $projekdetail->lokasi = $request->lokasi;
            // $projekdetail->negeri = $request->negeri;
            // $projekdetail->daerah = $request->daerah;
        $projekdetail->bandar = $request->bandar;
        $projekdetail->poskod = $request->poskod;
        $projekdetail->alamat_surat = $request->alamat_surat;
        $projekdetail->alamat_surat1 = $request->alamat_surat1;
        $projekdetail->alamat_surat2 = $request->alamat_surat2;
        $projekdetail->surat_negeri = $request->surat_negeri;
        $projekdetail->surat_daerah = $request->surat_daerah;
        $projekdetail->surat_bandar = $request->surat_bandar;
        $projekdetail->surat_poskod = $request->surat_poskod;
            // $projekdetail->eo = $request->eo;
            // $projekdetail->emc = $request->emc;
        $projekdetail->jenis_projek = $request->jenis_projek;
        $projekdetail->other_aktiviti = $request->other_aktiviti;
        $projekdetail->laporaneia = $request->laporaneia;
        $projekdetail->peringkat_audit = $request->peringkat_audit;
        $currentjenis = $projekdetail->jenis;
        $projekdetail->jenis = $request->jenis;
        $projekdetail->save();

        if($currentjenis != $request->jenis){
          if($projekdetail->jenis){
            $projekAuditcount = ProjekAudit::where('projek_id',$projek_id)->count();
                    // $monthlyE  = MonthlyE::where('projek_id',$projek_id)->count();
            if($request->jenis == 1){
              $projekAuditcount  = ProjekAudit::where('projek_id',$projek_id)->delete();
              $projekAudit = new ProjekAudit();
              $projekAudit->projek_id = $projek_id;
              $projekAudit->save();

                            // $monthlyE  = MonthlyE::where('projek_id',$projek_id)->delete();
                            // $monthlyE = new MonthlyE();
                            // $monthlyE->projek_id = $projek_id;
                            // $monthlyE->status_id = 1;
                            // $monthlyE->audit_id = $projekAudit->id;
                            // $monthlyE->save();
            }else if($request->jenis == 2){
              $projekAuditcount  = ProjekAudit::where('projek_id',$projek_id)->delete();
                            // $monthlyE  = MonthlyE::where('projek_id',$projek_id)->delete();
              $i = 0;
              for ($i = 0; $i < 2; $i++)
              {
               $projekAudit = new ProjekAudit();
               $projekAudit->projek_id = $projek_id;
               $projekAudit->save();

                               // $monthlyE = new MonthlyE();
                               // $monthlyE->projek_id = $projek_id;
                               // $monthlyE->status_id = 1;
                               // $monthlyE->audit_id = $projekAudit->id;
                               // $monthlyE->save();
             }
           }else if($request->jenis == 3){
            $projekAuditcount  = ProjekAudit::where('projek_id',$projek_id)->delete();
                            // $monthlyE  = MonthlyE::where('projek_id',$projek_id)->delete();
            $i = 0;
            for ($i = 0; $i < 3; $i++)
            {
              $projekAudit = new ProjekAudit();
              $projekAudit->projek_id = $projek_id;
              $projekAudit->save();

                              // $monthlyE = new MonthlyE();
                              // $monthlyE->projek_id = $projek_id;
                              // $monthlyE->status_id = 1;
                              // $monthlyE->audit_id = $projekAudit->id;
                              // $monthlyE->save();
            }
          }else if($request->jenis==4){
            $projekAuditcount  = ProjekAudit::where('projek_id',$projek_id)->delete();
                            // $monthlyE  = MonthlyE::where('projek_id',$projek_id)->delete();
            $i = 0;
            for ($i = 0; $i < 4; $i++)
            {
              $projekAudit = new ProjekAudit();
              $projekAudit->projek_id = $projek_id;
              $projekAudit->save();

                              // $monthlyE = new MonthlyE();
                              // $monthlyE->projek_id = $projek_id;
                              // $monthlyE->status_id = 1;
                              // $monthlyE->audit_id = $projekAudit->id;
                              // $monthlyE->save();
            }
          }else if($request->jenis==5){
            $projekAuditcount  = ProjekAudit::where('projek_id',$projek_id)->delete();
                            // $monthlyE  = MonthlyE::where('projek_id',$projek_id)->delete();
            $i = 0;
            for ($i = 0; $i < 12; $i++)
            {
              $projekAudit = new ProjekAudit();
              $projekAudit->projek_id = $projek_id;
              $projekAudit->save();

                              // $monthlyE = new MonthlyE();
                              // $monthlyE->projek_id = $projek_id;
                              // $monthlyE->status_id = 1;
                              // $monthlyE->audit_id = $projekAudit->id;
                              // $monthlyE->save();
            }
          }else{
            $projekAuditcount  = ProjekAudit::where('projek_id',$projek_id)->delete();
                            // $monthlyE  = MonthlyE::where('projek_id',$projek_id)->delete();
          }

        }else{
                    // $addcolumn = $MonthlyBSyarat - $request->syarat;
          $projekAudit = ProjekAudit::where('projek_id',$projek_id)->delete();
                    // $monthlyE  = MonthlyE::where('projek_id',$projek_id)->delete();
        }
      }


            // add fasa
      $countFasa = ProjekFasa::where('projek_id',$request->projek_id)->count();

            if($request->bilangan_fasa > $countFasa){ //jika fasa da ada dan bilangan stesen lebih bsar.akan tambah stesen

              $addcolumn = $request->bilangan_fasa - $countFasa;
              $i = 0;
              for ($i = 0; $i < $addcolumn; $i++)
              {
                $fasa = new ProjekFasa();
                $fasa->projek_id = $request->projek_id;
                $fasa->save();
              }
            }else{  //jika sama atau kurang bilangan fasa.dia akan delete kalau kurang dan maintain klau sama

              $addcolumn = $countFasa - $request->bilangan_fasa;
              $stesen = ProjekFasa::where('projek_id',$request->projek_id)->orderBy('id', 'desc')->take($addcolumn)->delete();
            }

            // end add fasa

          }
        // dd($request->jenis_pengawasan_id);

//        $aa = ProjekAudit::where('projek_id',$projek_id)->get();
// // dd($aa);
// // dd($request);
//        // dd($request->fffid);
//        $nn = json_decode($request->fffid);
//         foreach ($aa as $key => $value) {
//                 // dd($value->id);
//             foreach ($nn as $key1 => $sss) {
//                 if($sss==$value->id){
//                     if($key1==0){
//                         $er = $request->tarikh_audit0;
//                     }elseif($key1==1){
//                         $er = $request->tarikh_audit1;
//                     }else{
//                         $er = $request->tarikh_audit2;
//                     }
//                     // var_dump($request->tarikh_audit)
//                     $projektarikhaudit = ProjekAudit::where('id',$sss)->first();
//                     $projektarikhaudit->tarikh_audit = date("Y-m-d", strtotime($er));
//                     $projektarikhaudit->save();
//                 }
//             }


//             }


        // ProjekTarikhAudit::where('projek_id','=',$projek_id)->delete();
        // for ($i = 0; $i < count($request->tarikh_audit); $i++) {
        //     $audit[] = [
        //         'projek_id' => $projek_id,
        //         'tarikh_audit' => $request->tarikh_audit[$i]
        //     ];
        // }
        // ProjekTarikhAudit::insert($audit);
        // ProjekTarikhAudit::where('tarikh_audit','=',NULL)->delete();

        // $pengawasan = $request->jenis_pengawasan_id;
        // foreach ($pengawasan as $value) {
        //     if($value) {
        //         $data = array();
        //         $stesens = $request->stesen;
        //         foreach ($stesens as $k => $v) {
        //             $data[$k]['projek_id'] = $projek_id;
        //             $data[$k]['jenis_pengawasan_id'] = $value;
        //             $data[$k]['nama'] = $request->nama.$value;
        //             $data[$k]['stesen'] = $v;
        //             $data[$k]['latitud'] = $request->latitud;
        //             $data[$k]['longitud'] = $request->longitud;

        //             Stesen::insert($data);
        //             Stesen::whereRaw("(stesen.id NOT IN (SELECT * FROM (SELECT MAX(n.id) FROM stesen n GROUP BY n.stesen) x))")->delete();
        //         }
        //     }
        // }
          if ($request->jenis_projek) {
            $jenis = $request->jenis_projek;
          } else {
            $jenis = 0;
          }
          if($request->ajax()){
            return response()->json(['status' => 'ok', 'jenis' => $jenis]);
          }else{
            return redirect()->back()->with('jenis',$jenis);
          }
        }
      }

      public function jenis_pakej_eo(Request $request){

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 2;
        $log->description = "Lihat Maklumat Pakej EO";
      // $log->data_old = json_encode($request->input());
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $PakejPengawasan = PakejHasPengawasan::where('pakej_id', $request->myPakej)->get();
      // $PakejPengawasan = PakejHasPengawasan::where('pakej_id', $request->myPakej)->where('pengawasan_id', $request->pengawasan_id)->first();
      // foreach ($PakejPengawasan as $key => $value) {
        $PengawasanHasEo = PengawasanHasEo::where('pakej',$request->myPakej)->where('user_id',$request->eo)->first();
        if (!$PengawasanHasEo) {
          if($request->eo <> Null){
            if($PengawasanHasEo == null){
              $PengawasanHasEo = new PengawasanHasEo();
              $PengawasanHasEo->pakej = $request->myPakej;
                      // $PengawasanHasEo->pakej_has_pengawasan_id = $value->id;
              $PengawasanHasEo->user_id = $request->eo;
              $PengawasanHasEo->save();

              return response()->json(['pengawasan' => $request->pengawasan_id]);
            }
          }
        }
      // }
      }

      public function getApi(Request $request){
      // dd('$request->request');
        $ind = 'sini';
      // $log = new LogSystem;
      // $log->module_id = 26;
      // $log->activity_type_id = 2;
      // $log->description = "Lihat Maklumat Pakej EO";
      // // $log->data_old = json_encode($request->input());
      // $log->url = $request->fullUrl();
      // $log->method = strtoupper($request->method());
      // $log->ip_address = $request->ip();
      // $log->created_by_user_id = auth()->id();
      // $log->save();

      // if($request->eo <> Null){
      //   $PakejPengawasan = PakejHasPengawasan::where('pakej_id', $request->myPakej)->where('pengawasan_id', $request->pengawasan_id)->first();

      //   $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id',$PakejPengawasan->id)->where('user_id',$request->eo)->first();
      //   // dd($PengawasanHasEo);
      //   if($PengawasanHasEo == null){
      //     $PengawasanHasEo = new PengawasanHasEo();
      //     $PengawasanHasEo->pakej_has_pengawasan_id = $PakejPengawasan->id;
      //     $PengawasanHasEo->user_id = $request->eo;
      //     $PengawasanHasEo->save();

      //   }
      // }
        return response()->json([$ind]);
      }

      public function jenis_pakej_emc(Request $request){

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 2;
        $log->description = "Lihat Maklumat Pakej EMC";
      // $log->data_old = json_encode($request->input());
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        if($request->emc <> Null){
          $PakejPengawasan = PakejHasPengawasan::where('pakej_id', $request->myPakej)->where('pengawasan_id', $request->pengawasan_id)->first();

          $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id',$PakejPengawasan->id)->where('user_id',$request->emc)->first();
        // dd($PengawasanHasEo);
          if($PengawasanHasEmc == null){
            $PengawasanHasEmc = new PengawasanHasEmc();
            $PengawasanHasEmc->pakej_has_pengawasan_id = $PakejPengawasan->id;
            $PengawasanHasEmc->user_id = $request->emc;
            $PengawasanHasEmc->save();

            return response()->json(['pengawasan' => $request->pengawasan_id]);
          }
        }
      }

      public function jenis_pakej(Request $request){
    //   dd('dwdw');
        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 2;
        $log->description = "Lihat Jenis Pakej";
      // $log->data_old = json_encode($request->input());
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $PengawasanArray = $request->pakej_pengawasan_id;
        // dd($PengawasanArray);
        if($PengawasanArray == Null){
          $PakejPengawasan = PakejHasPengawasan::where('pakej_id', $request->myPakej)->where('status', 1)->first();
          $PakejPengawasan->status = 0;
          $PakejPengawasan->save();
        // exit();
        }else{
          $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id' , $request->myPakej)->get();
        // dd($PakejHasPengawasan);
          foreach($PakejHasPengawasan as $PakejHasPengawasans){
            if (!in_array($PakejHasPengawasans->pengawasan_id, $PengawasanArray)) {
              $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id' , $request->myPakej)->where('pengawasan_id',$PakejHasPengawasans->pengawasan_id)->first();
              $PakejHasPengawasan->status = 0;
              $PakejHasPengawasan->save();
            }
          }

          $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id' , $request->myPakej)->get();
        // dd($request->myPakej);
          foreach($PengawasanArray as $PengawasanArrays){
            $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id' , $request->myPakej)->where('pengawasan_id',$PengawasanArrays)->first();
            if($PakejHasPengawasan){
              $PakejHasPengawasan->status = 1;
              $PakejHasPengawasan->save();
            }else{
              $PakejHasPengawasan->status = 1;
              $PakejHasPengawasan->save();
            }
          }
        }
        return response()->json(['pakejid' => $request->myPakej]);
      }

      public function fasa(Request $request) {

        $validator = Validator::make($request->all(), [
          'nama_pakej' => 'required|string',
          'kontraktor' => 'required',
          'alamat' => 'required',
          'tarikh_mula_fasa' => 'required',
          'tarikh_akhir_fasa' => 'required',
        ]);
        if ($validator->fails()) {
          return response()->json(['errors' => $validator->errors()], 422);
        }

      // dd('sini');
        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 4;
        $log->description = "Tambah Data Maklumat Pakej";
      // $log->data_old = json_encode($request->input());
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user = auth()->id();
        $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id',$user)->first();
        $projek_id = $projek->projek_id;

        // ProjekPakej::where('projek_id',$projek_id)->where('nama_pakej','like','%Tidak Berpakej / Tidak Berfasa%')->delete();

        $pakej = new ProjekFasa(); // nnti masukkan dalam table projek fasa
        $pakej->projek_id = $projek_id;
        $pakej->nama_pakej = $request->nama_pakej;
        $pakej->kontraktor = $request->kontraktor;
        $pakej->pakej_negeri = $request->pakej_negeri;
        $pakej->alamat = $request->alamat;
        $pakej->alamat1 = $request->alamat1;
        $pakej->alamat2 = $request->alamat2;

        $date1 = strtr($request->tarikh_mula_fasa, '/', '-');
        $tarikh_mula_fasa = date("Y-m-d",strtotime($date1));
        $pakej->tarikh_mula = $tarikh_mula_fasa;

        $date2 = strtr($request->tarikh_akhir_fasa, '/', '-');
        $tarikh_akhir_fasa = date("Y-m-d",strtotime($date2));
        $pakej->tarikh_akhir = $tarikh_akhir_fasa;
        $pakej->save();

        // dd($request->pengawasan);

        foreach($request->pengawasan as $awas){
          $PakejHasPengawasan = new PakejHasPengawasan;
          $PakejHasPengawasan->pakej_id = $pakej->id;
          $PakejHasPengawasan->pengawasan_id = $awas;
          $PakejHasPengawasan->save();
        }

        // $pengawasan = MasterPengawasan::all();
        // foreach($pengawasan as $pengawasans){
        //   $PakejHasPengawasan = new PakejHasPengawasan();
        //   $PakejHasPengawasan->pakej_id = $pakej->id;
        //   $PakejHasPengawasan->pengawasan_id = $pengawasans->id;
        //   $PakejHasPengawasan->save();
        // }

        $state = MasterState::all();
        // dd('data simpan');

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Sila teruskan kemaskini Pengawasan Pakej.', 'state' => $state]);
      }

      public function pakej(Request $request) {

        $validator = Validator::make($request->all(), [
          'nama_pakej' => 'required|string',
          'kontraktor' => 'required',
          'alamat' => 'required',
          'tarikh_mula' => 'required',
          'tarikh_akhir' => 'required',
        ]);
        if ($validator->fails()) {
          return response()->json(['errors' => $validator->errors()], 422);
        }

      // dd('sini');
        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 4;
        $log->description = "Tambah Data Maklumat Pakej";
      // $log->data_old = json_encode($request->input());
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user = auth()->id();
        $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id',$user)->first();
        $projek_id = $projek->projek_id;

        // ProjekPakej::where('projek_id',$projek_id)->where('nama_pakej','like','%Tidak Berpakej / Tidak Berfasa%')->delete();

        $pakej = new ProjekFasa(); // nnti masukkan dalam table projek fasa
        $pakej->projek_id = $projek_id;
        $pakej->nama_pakej = $request->nama_pakej;
        $pakej->kontraktor = $request->kontraktor;
        $pakej->pakej_negeri = $request->pakej_negeri;
        $pakej->alamat = $request->alamat;
        $pakej->alamat1 = $request->alamat1;
        $pakej->alamat2 = $request->alamat2;

        $date1 = strtr($request->tarikh_mula, '/', '-');
        $tarikh_mula = date("Y-m-d",strtotime($date1));
        $pakej->tarikh_mula = $tarikh_mula;

        $date2 = strtr($request->tarikh_akhir, '/', '-');
        $tarikh_akhir = date("Y-m-d",strtotime($date2));
        $pakej->tarikh_akhir = $tarikh_akhir;
        $pakej->save();

        $pengawasan = MasterPengawasan::all();
        foreach($pengawasan as $pengawasans){
          $PakejHasPengawasan = new PakejHasPengawasan();
          $PakejHasPengawasan->pakej_id = $pakej->id;
          $PakejHasPengawasan->pengawasan_id = $pengawasans->id;
          $PakejHasPengawasan->save();
        }

        $state = MasterState::all();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Sila teruskan kemaskini Pengawasan Pakej.', 'state' => $state]);
      }

      public function pendaftaraneoemc(Request $request){
        // $validator = Validator::make($request->all(),[
        //   'user_eo.*'=>'required',
        //   'user_emc.*'=>'required',
        // ]);

        // if($validator->fail()){
        //   return response()->json(['errors' => $validator->errors()], 422);
        // }

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 4;
        $log->description = "Pendaftaran Pengawasan EO & EMC ";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $data=array();
        for($i=0;$i<count($request->pakej_pengawasan_id);$i++){
          array_push($data,array(
            'pengawasan_id'=>$request->pakej_pengawasan_id[$i],
            'user_id_eo'=>$request->user_eo[$i],
            'user_id_emc'=>$request->user_emc[$i],
            'pakej_id'=>$request->pakej_id[$i],
          ));
        }

        foreach($data as $maklumat){
          $pengawasanhaseo =new PengawasanHasEo;
          $pengawasanhaseo->pakej_has_pengawasan_id=$maklumat['pengawasan_id'];
          $pengawasanhaseo->pakej=$maklumat['pakej_id'];
          $pengawasanhaseo->user_id=$maklumat['user_id_eo'];
          $pengawasanhaseo->save();

          $pengawasanhasemc =new PengawasanHasEmc;
          $pengawasanhasemc->pakej_has_pengawasan_id=$maklumat['pengawasan_id'];
          $pengawasanhasemc->user_id=$maklumat['user_id_eo'];
          $pengawasanhasemc->save();
        }

        return response()->json(['status' => 'Maklumat berjaya disimpan',]);

      }


      public function pakejupdate(Request $request) {

        $validator = Validator::make($request->all(), [
          'nama_pakej' => 'required|string',
          'kontraktor' => 'required',
          'alamat' => 'required',
          'tarikh_mula' => 'required',
          'tarikh_akhir' => 'required',
        ]);
        if ($validator->fails()) {
          return response()->json(['errors' => $validator->errors()], 422);
        }

      // dd('sini');
        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 4;
        $log->description = "Kemaskini Data Maklumat Pakej";
      // $log->data_old = json_encode($request->input());
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user = auth()->id();
        $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id',$user)->first();
        $projek_id = $projek->projek_id;

        // ProjekPakej::where('projek_id',$projek_id)->where('nama_pakej','like','%Tidak Berpakej / Tidak Berfasa%')->delete();
        // dd('sini');
        $pakej = ProjekPakej::where('id',$request->id)->first();
        $pakej->projek_id = $projek_id;
        $pakej->nama_pakej = $request->nama_pakej;
        $pakej->kontraktor = $request->kontraktor;
        $pakej->pakej_negeri = $request->pakej_negeri;
        $pakej->alamat = $request->alamat;
        $pakej->alamat1 = $request->alamat1;
        $pakej->alamat2 = $request->alamat2;

        $date1 = strtr($request->tarikh_mula, '/', '-');
        $tarikh_mula = date("Y-m-d",strtotime($date1));
        $pakej->tarikh_mula = $tarikh_mula;

        $date2 = strtr($request->tarikh_akhir, '/', '-');
        $tarikh_akhir = date("Y-m-d",strtotime($date2));
        $pakej->tarikh_akhir = $tarikh_akhir;
        $pakej->save();

        $state = MasterState::all();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Maklumat pakej/fasa telah dikemaskini.', 'state' => $state]);
      }

    // public function pakejeoemc(Request $request) {
    //     $projectpakej = ProjekPakej::where('projek_id',$request->id)->first();
    //     $pakejpengawasan = PakejHasPengawasan::where('pakej_id',$projectpakej->id)->where('status',1)->get();
    //     // dd($pakejpengawasan);

    //     return response()->json(['status' => 'success', 'title' => 'Selesai', 'message' => 'Sila teruskan kemaskini Pengawasan Pakej.']);
    // }

      public function pakejeoemc(Request $request) {
      // dd($request->id);
        $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id',$id)->where('status',1)->get();

        foreach ($PakejHasPengawasan as $PakejHasPengawasanvalue) {
          $pakejemc = PengawasanHasEmc::where('pakej_has_pengawasan_id', $PakejHasPengawasanvalue->id)->first();
          $pakejeo = PengawasanHasEo::where('pakej_has_pengawasan_id', $PakejHasPengawasanvalue->id)->first();
          if ($pakejemc) {
            $pakejuser[] = $pakejemc->user_id.' emc';
          } else {
            $pakejuser[] = 'tiada';
          }

          if ($pakejeo) {
            $pakejuser[] = $pakejeo->user_id.' eo';
          } else {
            $pakejuser[] = 'tiada';
          }
        }

        foreach ($pakejuser as $value) {
          if ($value == 'tiada') {
            return response()->json(['status1' => 'error','title' => '','message' => 'Pastikan anda sudah lengkap lantik EO dan EMC bagi setiap pengawasan.','status' => '']);
          }
        }

        return response()->json(['status' => 'ok']);
      }

      public function eotable(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();

          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->first();
          // dd($pakejhaspengawasan);
          if($pakejhaspengawasan){
            // dd('1');
            // dd($pakejhaspengawasan->id);
            $PengawasanHasEo = PengawasanHasEo::where('pakej',$request->id)->get();
          }else{
            // dd('2');
            $PengawasanHasEo = [];
          }
          // dd($PengawasanHasEo->user);
          return datatables()->of($PengawasanHasEo)
          ->editColumn('name', function ($PengawasanHasEo) {
                  // if($PengawasanHasEo->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';
                  // else
                  // dd($PengawasanHasEo);
                  // if($PengawasanHasEo->user->entity_eo <> Null){
                  //   if($PengawasanHasEo->user->entity_eo->gambar_url <> Null){
                  //     return '<a href="/'.$PengawasanHasEo->user->entity_eo->gambar_url.'" target="_blank"><img src="/'.$PengawasanHasEo->user->entity_eo->gambar_url.'" width="100px" height="auto"></a><br>'.$PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';
                  //   }else{
                  //     return $PengawasanHasEo->user->name.'<br><small style="text-transform: none !important;">'.$PengawasanHasEo->user->email.'</small>';
                  //   }
                  // }else{
            return $PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';
                  // }

          })
          ->editColumn('username', function ($PengawasanHasEo) {
            return '<span class="label label-default">'.$PengawasanHasEo->user->username.'</span>';
          })
          ->editColumn('created_at', function ($PengawasanHasEo) {
            return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
          })
          ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->no_kompetensi;
            else
              return '';
          })
          ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
            else
              return '';
          })
          ->editColumn('status.name', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEo->user->status->name.'</span>';
            if($PengawasanHasEo->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEo->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEo->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEo) {
            $button = "";
            $projekpakej = ProjekPakej::where('id',$PengawasanHasEo->pakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeeo('.$PengawasanHasEo->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function eotable1(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();

          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',1)->first();
          // dd($pakejhaspengawasan);
          if($pakejhaspengawasan){
            // dd('1');
            // dd($pakejhaspengawasan->id);
            $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
          }else{
            // dd('2');
            $PengawasanHasEo = [];
          }
          // dd($PengawasanHasEo->user);
          return datatables()->of($PengawasanHasEo)
          ->editColumn('name', function ($PengawasanHasEo) {
                  // if($PengawasanHasEo->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';
                  // else
                  // dd($PengawasanHasEo);
                  // if($PengawasanHasEo->user->entity_eo <> Null){
                  //   if($PengawasanHasEo->user->entity_eo->gambar_url <> Null){
                  //     return '<a href="/'.$PengawasanHasEo->user->entity_eo->gambar_url.'" target="_blank"><img src="/'.$PengawasanHasEo->user->entity_eo->gambar_url.'" width="100px" height="auto"></a><br>'.$PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';
                  //   }else{
                  //     return $PengawasanHasEo->user->name.'<br><small style="text-transform: none !important;">'.$PengawasanHasEo->user->email.'</small>';
                  //   }
                  // }else{
            return $PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';
                  // }

          })
          ->editColumn('username', function ($PengawasanHasEo) {
            return '<span class="label label-default">'.$PengawasanHasEo->user->username.'</span>';
          })
          ->editColumn('created_at', function ($PengawasanHasEo) {
            return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
          })
          ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->no_kompetensi;
            else
              return '';
          })
          ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
            else
              return '';
          })
          ->editColumn('status.name', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEo->user->status->name.'</span>';
            if($PengawasanHasEo->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEo->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEo->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEo) {
            $button = "";
            $projekpakej = ProjekPakej::where('id',$PengawasanHasEo->pakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeeo('.$PengawasanHasEo->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }

            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function eotable2(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();
          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',2)->first();
          if($pakejhaspengawasan){
            // dd($pakejhaspengawasan->id);
            $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
            // dd($PengawasanHasEo);
          }else{
            $PengawasanHasEo = [];
          }

          return datatables()->of($PengawasanHasEo)
          ->editColumn('name', function ($PengawasanHasEo) {
                  // if($PengawasanHasEo->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';
                  // else
            return $PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';

          })
          ->editColumn('username', function ($PengawasanHasEo) {
            return '<span class="label label-default">'.$PengawasanHasEo->user->username.'</span>';
          })
          ->editColumn('created_at', function ($PengawasanHasEo) {
            return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
          })
          ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->no_kompetensi;
            else
              return '';
          })
          ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
            else
              return '';
          })
          ->editColumn('status.name', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEo->user->status->name.'</span>';
            if($PengawasanHasEo->user->user_status_id == 3 )
                  // dd($PengawasanHasEo->user);
              return '<span class="badge badge-default">'.$PengawasanHasEo->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEo->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEo) {
            $button = "";
            $projekpakej = ProjekPakej::where('id',$PengawasanHasEo->pakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeeo('.$PengawasanHasEo->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function eotable3(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();
          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',3)->first();
          if($pakejhaspengawasan){
            $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
            // dd($PengawasanHasEo);
          }else{
            $PengawasanHasEo = [];
          }


          return datatables()->of($PengawasanHasEo)
          ->editColumn('name', function ($PengawasanHasEo) {
                  // if($PengawasanHasEo->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';
                  // else
            return $PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';

          })
          ->editColumn('username', function ($PengawasanHasEo) {
            return '<span class="label label-default">'.$PengawasanHasEo->user->username.'</span>';
          })
          ->editColumn('created_at', function ($PengawasanHasEo) {
            return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
          })
          ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->no_kompetensi;
            else
              return '';
          })
          ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
            else
              return '';
          })
          ->editColumn('status.name', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEo->user->status->name.'</span>';
            if($PengawasanHasEo->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEo->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEo->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEo) {
            $button = "";
            $projekpakej = ProjekPakej::where('id',$PengawasanHasEo->pakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeeo('.$PengawasanHasEo->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function eotable4(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();
          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',4)->first();
          if($pakejhaspengawasan){
            $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
            // dd($PengawasanHasEo);
          }else{
            $PengawasanHasEo = [];
          }
          // dd($PengawasanHasEo);
          return datatables()->of($PengawasanHasEo)
          ->editColumn('name', function ($PengawasanHasEo) {
                  // if($PengawasanHasEo->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';
                  // else
            return $PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';

          })
          ->editColumn('username', function ($PengawasanHasEo) {
            return '<span class="label label-default">'.$PengawasanHasEo->user->username.'</span>';
          })
          ->editColumn('created_at', function ($PengawasanHasEo) {
            return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
          })
          ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->no_kompetensi;
            else
              return '';
          })
          ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
            else
              return '';
          })
          ->editColumn('status.name', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEo->user->status->name.'</span>';
            if($PengawasanHasEo->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEo->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEo->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEo) {
            $button = "";
            $projekpakej = ProjekPakej::where('id',$PengawasanHasEo->pakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeeo('.$PengawasanHasEo->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function eotable5(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();
          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',5)->first();
          if($pakejhaspengawasan){
            $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
            // dd($PengawasanHasEo);
          }else{
            $PengawasanHasEo = [];
          }

          return datatables()->of($PengawasanHasEo)
          ->editColumn('name', function ($PengawasanHasEo) {
                  // if($PengawasanHasEo->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';
                  // else
            return $PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';

          })
          ->editColumn('username', function ($PengawasanHasEo) {
            return '<span class="label label-default">'.$PengawasanHasEo->user->username.'</span>';
          })
          ->editColumn('created_at', function ($PengawasanHasEo) {
            return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
          })
          ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->no_kompetensi;
            else
              return '';
          })
          ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
            else
              return '';
          })
          ->editColumn('status.name', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEo->user->status->name.'</span>';
            if($PengawasanHasEo->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEo->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEo->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEo) {
            $button = "";
            $projekpakej = ProjekPakej::where('id',$PengawasanHasEo->pakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeeo('.$PengawasanHasEo->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function eotable6(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();
          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',6)->first();
          if($pakejhaspengawasan){
            $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
            // dd($PengawasanHasEo);
          }else{
            $PengawasanHasEo = [];
          }

          return datatables()->of($PengawasanHasEo)
          ->editColumn('name', function ($PengawasanHasEo) {
                  // if($PengawasanHasEo->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';
                  // else
            return $PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';

          })
          ->editColumn('username', function ($PengawasanHasEo) {
            return '<span class="label label-default">'.$PengawasanHasEo->user->username.'</span>';
          })
          ->editColumn('created_at', function ($PengawasanHasEo) {
            return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
          })
          ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->no_kompetensi;
            else
              return '';
          })
          ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
            else
              return '';
          })
          ->editColumn('status.name', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEo->user->status->name.'</span>';
            if($PengawasanHasEo->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEo->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEo->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEo) {
            $button = "";
            $projekpakej = ProjekPakej::where('id',$PengawasanHasEo->pakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeeo('.$PengawasanHasEo->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function eotable7(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();
          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',7)->first();
          if($pakejhaspengawasan){
            $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
            // dd($PengawasanHasEo);
          }else{
            $PengawasanHasEo = [];
          }

          return datatables()->of($PengawasanHasEo)
          ->editColumn('name', function ($PengawasanHasEo) {
                  // if($PengawasanHasEo->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';
                  // else
            return $PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';

          })
          ->editColumn('username', function ($PengawasanHasEo) {
            return '<span class="label label-default">'.$PengawasanHasEo->user->username.'</span>';
          })
          ->editColumn('created_at', function ($PengawasanHasEo) {
            return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
          })
          ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->no_kompetensi;
            else
              return '';
          })
          ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
            else
              return '';
          })
          ->editColumn('status.name', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEo->user->status->name.'</span>';
            if($PengawasanHasEo->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEo->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEo->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEo) {
            $button = "";
            $projekpakej = ProjekPakej::where('id',$PengawasanHasEo->pakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeeo('.$PengawasanHasEo->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function eotable8(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();
          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',8)->first();
          if($pakejhaspengawasan){
            $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
            // dd($PengawasanHasEo);
          }else{
            $PengawasanHasEo = [];
          }

          return datatables()->of($PengawasanHasEo)
          ->editColumn('name', function ($PengawasanHasEo) {
                  // if($PengawasanHasEo->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';
                  // else
            return $PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';

          })
          ->editColumn('username', function ($PengawasanHasEo) {
            return '<span class="label label-default">'.$PengawasanHasEo->user->username.'</span>';
          })
          ->editColumn('created_at', function ($PengawasanHasEo) {
            return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
          })
          ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->no_kompetensi;
            else
              return '';
          })
          ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
            else
              return '';
          })
          ->editColumn('status.name', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEo->user->status->name.'</span>';
            if($PengawasanHasEo->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEo->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEo->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEo) {
            $button = "";
            $projekpakej = ProjekPakej::where('id',$PengawasanHasEo->pakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeeo('.$PengawasanHasEo->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function eotable9(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();
          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',9)->first();
          if($pakejhaspengawasan){
            $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
            // dd($PengawasanHasEo);
          }else{
            $PengawasanHasEo = [];
          }

          return datatables()->of($PengawasanHasEo)
          ->editColumn('name', function ($PengawasanHasEo) {
                  // if($PengawasanHasEo->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';
                  // else
            return $PengawasanHasEo->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';

          })
          ->editColumn('username', function ($PengawasanHasEo) {
            return '<span class="label label-default">'.$PengawasanHasEo->user->username.'</span>';
          })
          ->editColumn('created_at', function ($PengawasanHasEo) {
            return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
          })
          ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->no_kompetensi;
            else
              return '';
          })
          ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->entity_eo)
              return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
            else
              return '';
          })
          ->editColumn('status.name', function ($PengawasanHasEo) {
            if($PengawasanHasEo->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEo->user->status->name.'</span>';
            if($PengawasanHasEo->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEo->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEo->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEo) {
            $button = "";
            $projekpakej = ProjekPakej::where('id',$PengawasanHasEo->pakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeeo('.$PengawasanHasEo->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function usereodelete($id){
        $PengawasanHasEo = PengawasanHasEo::where('id',$id)->first();
        if($PengawasanHasEo->delete()){
          return response()->json();
        }
      }

      public function emctable1(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();

          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',1)->first();
          if($pakejhaspengawasan){
            $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
            // dd($PengawasanHasEo);
          }else{
            $PengawasanHasEmc = [];
          }
          return datatables()->of($PengawasanHasEmc)
          ->editColumn('name', function ($PengawasanHasEmc) {

                  // if($PengawasanHasEmc->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEmc->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEmc->user->email.'</small>';
                  // else
                  // dd($PengawasanHasEmc);
            return $PengawasanHasEmc->user->name.'<br><small style="text-transform: none !important;">'.$PengawasanHasEmc->user->email.'</small>';
          })
          ->editColumn('username', function ($PengawasanHasEmc) {
            return '<span class="label label-default">'.$PengawasanHasEmc->user->username.'</span>';
          })
          ->editColumn('syarikat', function ($PengawasanHasEmc) {
            return $PengawasanHasEmc->user->entity_emc->syarikat;
          })
          ->editColumn('detail', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->fax <> Null || $PengawasanHasEmc->user->phone <> Null){
              $seperate = '';
              $seperate2 = '';
              $faks = '';
              $phone = '';
              if($PengawasanHasEmc->user->fax <> Null){
                $faks = '<b>No Faks : </b>';
                $seperate = '<br>';
              }
              if($PengawasanHasEmc->user->phone <> Null){
                $phone = '<b>No Tel : </b>';
              }
              return $faks.$PengawasanHasEmc->user->fax.$seperate.$phone.$PengawasanHasEmc->user->phone;
            }
            else{
              return '-';
            }
          })
          ->editColumn('status.name', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEmc->user->status->name.'</span>';
            if($PengawasanHasEmc->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEmc->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEmc->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEmc) {
            $button = "";
            $pengawasanpakej = PakejHasPengawasan::where('id',$PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
            $projekpakej = ProjekPakej::where('id',$pengawasanpakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeemc('.$PengawasanHasEmc->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function emctable2(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();
          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',2)->first();
          if($pakejhaspengawasan){
            $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
            // dd($PengawasanHasEo);
          }else{
            $PengawasanHasEmc = [];
          }
          return datatables()->of($PengawasanHasEmc)
          ->editColumn('name', function ($PengawasanHasEmc) {

                  // if($PengawasanHasEmc->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEmc->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEmc->user->email.'</small>';
                  // else
            return $PengawasanHasEmc->user->name.'<br><small style="text-transform: none !important;">'.$PengawasanHasEmc->user->email.'</small>';
          })
          ->editColumn('username', function ($PengawasanHasEmc) {
            return '<span class="label label-default">'.$PengawasanHasEmc->user->username.'</span>';
          })
          ->editColumn('syarikat', function ($PengawasanHasEmc) {
            return $PengawasanHasEmc->user->entity_emc->syarikat;
          })
          ->editColumn('detail', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->fax <> Null || $PengawasanHasEmc->user->phone <> Null){
              $seperate = '';
              $seperate2 = '';
              $faks = '';
              $phone = '';
              if($PengawasanHasEmc->user->fax <> Null){
                $faks = '<b>No Faks : </b>';
                $seperate = '<br>';
              }
              if($PengawasanHasEmc->user->phone <> Null){
                $phone = '<b>No Tel : </b>';
              }
              return $faks.$PengawasanHasEmc->user->fax.$seperate.$phone.$PengawasanHasEmc->user->phone;
            }
            else{
              return '-';
            }
          })
          ->editColumn('status.name', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEmc->user->status->name.'</span>';
            if($PengawasanHasEmc->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEmc->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEmc->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEmc) {
            $button = "";
            $pengawasanpakej = PakejHasPengawasan::where('id',$PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
            $projekpakej = ProjekPakej::where('id',$pengawasanpakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeemc('.$PengawasanHasEmc->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function emctable3(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();
          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',3)->first();
          if($pakejhaspengawasan){
            $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
            // dd($PengawasanHasEo);
          }else{
            $PengawasanHasEmc = [];
          }
          return datatables()->of($PengawasanHasEmc)
          ->editColumn('name', function ($PengawasanHasEmc) {

                  // if($PengawasanHasEmc->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEmc->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEmc->user->email.'</small>';
                  // else
            return $PengawasanHasEmc->user->name.'<br><small style="text-transform: none !important;">'.$PengawasanHasEmc->user->email.'</small>';
          })
          ->editColumn('username', function ($PengawasanHasEmc) {
            return '<span class="label label-default">'.$PengawasanHasEmc->user->username.'</span>';
          })
          ->editColumn('syarikat', function ($PengawasanHasEmc) {
            return $PengawasanHasEmc->user->entity_emc->syarikat;
          })
          ->editColumn('detail', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->fax <> Null || $PengawasanHasEmc->user->phone <> Null){
              $seperate = '';
              $seperate2 = '';
              $faks = '';
              $phone = '';
              if($PengawasanHasEmc->user->fax <> Null){
                $faks = '<b>No Faks : </b>';
                $seperate = '<br>';
              }
              if($PengawasanHasEmc->user->phone <> Null){
                $phone = '<b>No Tel : </b>';
              }
              return $faks.$PengawasanHasEmc->user->fax.$seperate.$phone.$PengawasanHasEmc->user->phone;
            }
            else{
              return '-';
            }
          })
          ->editColumn('status.name', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEmc->user->status->name.'</span>';
            if($PengawasanHasEmc->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEmc->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEmc->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEmc) {
            $button = "";
            $pengawasanpakej = PakejHasPengawasan::where('id',$PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
            $projekpakej = ProjekPakej::where('id',$pengawasanpakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeemc('.$PengawasanHasEmc->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function emctable4(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();
          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',4)->first();
          if($pakejhaspengawasan){
            $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
            // dd($PengawasanHasEo);
          }else{
            $PengawasanHasEmc = [];
          }
          return datatables()->of($PengawasanHasEmc)
          ->editColumn('name', function ($PengawasanHasEmc) {

                  // if($PengawasanHasEmc->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEmc->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEmc->user->email.'</small>';
                  // else
                    // if($PengawasanHasEmc->user->picture_url <> Null){
                    //   return '<a href="/profilepicture/'.$PengawasanHasEmc->user->picture_url.'" target="_blank"><img src="/profilepicture/'.$PengawasanHasEmc->user->picture_url.'" width="100px" height="auto"></a><br>'.$user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEo->user->email.'</small>';
                    // }else{
            return $PengawasanHasEmc->user->name.'<br><small style="text-transform: none !important;">'.$PengawasanHasEmc->user->email.'</small>';
                    // }
          })
          ->editColumn('username', function ($PengawasanHasEmc) {
            return '<span class="label label-default">'.$PengawasanHasEmc->user->username.'</span>';
          })
          ->editColumn('syarikat', function ($PengawasanHasEmc) {
            return $PengawasanHasEmc->user->entity_emc->syarikat;
          })
          ->editColumn('detail', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->fax <> Null || $PengawasanHasEmc->user->phone <> Null){
              $seperate = '';
              $seperate2 = '';
              $faks = '';
              $phone = '';
              if($PengawasanHasEmc->user->fax <> Null){
                $faks = '<b>No Faks : </b>';
                $seperate = '<br>';
              }
              if($PengawasanHasEmc->user->phone <> Null){
                $phone = '<b>No Tel : </b>';
              }
              return $faks.$PengawasanHasEmc->user->fax.$seperate.$phone.$PengawasanHasEmc->user->phone;
            }
            else{
              return '-';
            }
          })
          ->editColumn('status.name', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEmc->user->status->name.'</span>';
            if($PengawasanHasEmc->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEmc->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEmc->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEmc) {
            $button = "";
            $pengawasanpakej = PakejHasPengawasan::where('id',$PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
            $projekpakej = ProjekPakej::where('id',$pengawasanpakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeemc('.$PengawasanHasEmc->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function emctable5(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();
          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',5)->first();
          if($pakejhaspengawasan){
            $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
            // dd($PengawasanHasEo);
          }else{
            $PengawasanHasEmc = [];
          }
          return datatables()->of($PengawasanHasEmc)
          ->editColumn('name', function ($PengawasanHasEmc) {

                  // if($PengawasanHasEmc->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEmc->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEmc->user->email.'</small>';
                  // else
            return $PengawasanHasEmc->user->name.'<br><small style="text-transform: none !important;">'.$PengawasanHasEmc->user->email.'</small>';
          })
          ->editColumn('username', function ($PengawasanHasEmc) {
            return '<span class="label label-default">'.$PengawasanHasEmc->user->username.'</span>';
          })
          ->editColumn('syarikat', function ($PengawasanHasEmc) {
            return $PengawasanHasEmc->user->entity_emc->syarikat;
          })
          ->editColumn('detail', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->fax <> Null || $PengawasanHasEmc->user->phone <> Null){
              $seperate = '';
              $seperate2 = '';
              $faks = '';
              $phone = '';
              if($PengawasanHasEmc->user->fax <> Null){
                $faks = '<b>No Faks : </b>';
                $seperate = '<br>';
              }
              if($PengawasanHasEmc->user->phone <> Null){
                $phone = '<b>No Tel : </b>';
              }
              return $faks.$PengawasanHasEmc->user->fax.$seperate.$phone.$PengawasanHasEmc->user->phone;
            }
            else{
              return '-';
            }
          })
          ->editColumn('status.name', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEmc->user->status->name.'</span>';
            if($PengawasanHasEmc->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEmc->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEmc->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEmc) {
            $button = "";
            $pengawasanpakej = PakejHasPengawasan::where('id',$PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
            $projekpakej = ProjekPakej::where('id',$pengawasanpakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeemc('.$PengawasanHasEmc->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function emctable6(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();
          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',6)->first();
          if($pakejhaspengawasan){
            $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
            // dd($PengawasanHasEo);
          }else{
            $PengawasanHasEmc = [];
          }
          return datatables()->of($PengawasanHasEmc)
          ->editColumn('name', function ($PengawasanHasEmc) {

                  // if($PengawasanHasEmc->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEmc->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEmc->user->email.'</small>';
                  // else
            return $PengawasanHasEmc->user->name.'<br><small style="text-transform: none !important;">'.$PengawasanHasEmc->user->email.'</small>';
          })
          ->editColumn('username', function ($PengawasanHasEmc) {
            return '<span class="label label-default">'.$PengawasanHasEmc->user->username.'</span>';
          })
          ->editColumn('syarikat', function ($PengawasanHasEmc) {
            return $PengawasanHasEmc->user->entity_emc->syarikat;
          })
          ->editColumn('detail', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->fax <> Null || $PengawasanHasEmc->user->phone <> Null){
              $seperate = '';
              $seperate2 = '';
              $faks = '';
              $phone = '';
              if($PengawasanHasEmc->user->fax <> Null){
                $faks = '<b>No Faks : </b>';
                $seperate = '<br>';
              }
              if($PengawasanHasEmc->user->phone <> Null){
                $phone = '<b>No Tel : </b>';
              }
              return $faks.$PengawasanHasEmc->user->fax.$seperate.$phone.$PengawasanHasEmc->user->phone;
            }
            else{
              return '-';
            }
          })
          ->editColumn('status.name', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEmc->user->status->name.'</span>';
            if($PengawasanHasEmc->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEmc->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEmc->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEmc) {
            $button = "";
            $pengawasanpakej = PakejHasPengawasan::where('id',$PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
            $projekpakej = ProjekPakej::where('id',$pengawasanpakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeemc('.$PengawasanHasEmc->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function emctable7(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();
          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',7)->first();
          if($pakejhaspengawasan){
            $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
            // dd($PengawasanHasEo);
          }else{
            $PengawasanHasEmc = [];
          }
          return datatables()->of($PengawasanHasEmc)
          ->editColumn('name', function ($PengawasanHasEmc) {

                  // if($PengawasanHasEmc->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEmc->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEmc->user->email.'</small>';
                  // else
            return $PengawasanHasEmc->user->name.'<br><small style="text-transform: none !important;">'.$PengawasanHasEmc->user->email.'</small>';
          })
          ->editColumn('username', function ($PengawasanHasEmc) {
            return '<span class="label label-default">'.$PengawasanHasEmc->user->username.'</span>';
          })
          ->editColumn('syarikat', function ($PengawasanHasEmc) {
            return $PengawasanHasEmc->user->entity_emc->syarikat;
          })
          ->editColumn('detail', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->fax <> Null || $PengawasanHasEmc->user->phone <> Null){
              $seperate = '';
              $seperate2 = '';
              $faks = '';
              $phone = '';
              if($PengawasanHasEmc->user->fax <> Null){
                $faks = '<b>No Faks : </b>';
                $seperate = '<br>';
              }
              if($PengawasanHasEmc->user->phone <> Null){
                $phone = '<b>No Tel : </b>';
              }
              return $faks.$PengawasanHasEmc->user->fax.$seperate.$phone.$PengawasanHasEmc->user->phone;
            }
            else{
              return '-';
            }
          })
          ->editColumn('status.name', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEmc->user->status->name.'</span>';
            if($PengawasanHasEmc->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEmc->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEmc->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEmc) {
            $button = "";
            $pengawasanpakej = PakejHasPengawasan::where('id',$PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
            $projekpakej = ProjekPakej::where('id',$pengawasanpakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeemc('.$PengawasanHasEmc->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function emctable8(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();
          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',8)->first();
          if($pakejhaspengawasan){
            $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
            // dd($PengawasanHasEo);
          }else{
            $PengawasanHasEmc = [];
          }


          return datatables()->of($PengawasanHasEmc)
          ->editColumn('name', function ($PengawasanHasEmc) {

                  // if($PengawasanHasEmc->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEmc->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEmc->user->email.'</small>';
                  // else
            return $PengawasanHasEmc->user->name.'<br><small style="text-transform: none !important;">'.$PengawasanHasEmc->user->email.'</small>';
          })
          ->editColumn('username', function ($PengawasanHasEmc) {
            return '<span class="label label-default">'.$PengawasanHasEmc->user->username.'</span>';
          })
          ->editColumn('syarikat', function ($PengawasanHasEmc) {
            return $PengawasanHasEmc->user->entity_emc->syarikat;
          })
          ->editColumn('detail', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->fax <> Null || $PengawasanHasEmc->user->phone <> Null){
              $seperate = '';
              $seperate2 = '';
              $faks = '';
              $phone = '';
              if($PengawasanHasEmc->user->fax <> Null){
                $faks = '<b>No Faks : </b>';
                $seperate = '<br>';
              }
              if($PengawasanHasEmc->user->phone <> Null){
                $phone = '<b>No Tel : </b>';
              }
              return $faks.$PengawasanHasEmc->user->fax.$seperate.$phone.$PengawasanHasEmc->user->phone;
            }
            else{
              return '-';
            }
          })
          ->editColumn('status.name', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEmc->user->status->name.'</span>';
            if($PengawasanHasEmc->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEmc->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEmc->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEmc) {
            $button = "";
            $pengawasanpakej = PakejHasPengawasan::where('id',$PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
            $projekpakej = ProjekPakej::where('id',$pengawasanpakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeemc('.$PengawasanHasEmc->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function emctable9(Request $request){

        if($request->ajax()) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 1;
          $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
          $log->data_old = json_encode($request->input());
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();
          $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id',$request->id)->where('pengawasan_id',9)->first();
          if($pakejhaspengawasan){
            $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id',$pakejhaspengawasan->id)->get();
            // dd($PengawasanHasEo);
          }else{
            $PengawasanHasEmc = [];
          }


          return datatables()->of($PengawasanHasEmc)
          ->editColumn('name', function ($PengawasanHasEmc) {

                  // if($PengawasanHasEmc->user->isOnline())
                  //     return '<span style="color: #25e125;">●</span> '.$PengawasanHasEmc->user->name.'<br><small style="font-size: smaller;">'.$PengawasanHasEmc->user->email.'</small>';
                  // else
            return $PengawasanHasEmc->user->name.'<br><small style="text-transform: none !important;">'.$PengawasanHasEmc->user->email.'</small>';
          })
          ->editColumn('username', function ($PengawasanHasEmc) {
            return '<span class="label label-default">'.$PengawasanHasEmc->user->username.'</span>';
          })
          ->editColumn('syarikat', function ($PengawasanHasEmc) {
            return $PengawasanHasEmc->user->entity_emc->syarikat;
          })
          ->editColumn('detail', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->fax <> Null || $PengawasanHasEmc->user->phone <> Null){
              $seperate = '';
              $seperate2 = '';
              $faks = '';
              $phone = '';
              if($PengawasanHasEmc->user->fax <> Null){
                $faks = '<b>No Faks : </b>';
                $seperate = '<br>';
              }
              if($PengawasanHasEmc->user->phone <> Null){
                $phone = '<b>No Tel : </b>';
              }
              return $faks.$PengawasanHasEmc->user->fax.$seperate.$phone.$PengawasanHasEmc->user->phone;
            }
            else{
              return '-';
            }
          })
          ->editColumn('status.name', function ($PengawasanHasEmc) {
            if($PengawasanHasEmc->user->user_status_id == 1)
              return '<span class="badge badge-success">'.$PengawasanHasEmc->user->status->name.'</span>';
            if($PengawasanHasEmc->user->user_status_id == 3 )
              return '<span class="badge badge-default">'.$PengawasanHasEmc->user->status->name.'</span>';
            else
              return '<span class="badge badge-danger">'.$PengawasanHasEmc->user->status->name.'</span>';
          })
          ->editColumn('action', function ($PengawasanHasEmc) {
            $button = "";
            $pengawasanpakej = PakejHasPengawasan::where('id',$PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
            $projekpakej = ProjekPakej::where('id',$pengawasanpakej)->first()->projek_id;
            $projek = Projek::where('id',$projekpakej)->first()->status;
            if ($projek == 1) {
              if (auth()->user()->entity_type != 'App\UserStaff') {
                $button .= '<a onclick="removeemc('.$PengawasanHasEmc->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
              }
            }
            return $button;
          })
          ->make(true);
        }
        return view('projek.daftar_projek');
      }

      public function useremcdelete(Request $request,$id){
        $PengawasanHasEmc = PengawasanHasEmc::where('id',$id)->first();

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 6;
        $log->description = "Padam Data Pengguna EMC";
        $log->data_old = json_encode($PengawasanHasEmc);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();


        if($PengawasanHasEmc->delete()){
          return response()->json();
        }
      }

      public function jenispengawasan(Request $request){
        //dd($request->version);

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 1;
        $log->description = "Lihat Senarai Pengawasan";
        // $log->data_old = json_encode($PengawasanHasEmc);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $Stesen = Stesen::where('jenis_pengawasan_id',$request->jenis_pengawasan)->where('projek_id',$request->projek_id)->where('projek_pakej_id',$request->pakej_id)->count(); //kira stesen yg ada sekarang
        $getStesen = Stesen::where('jenis_pengawasan_id',$request->jenis_pengawasan)->where('projek_id',$request->projek_id)->where('projek_pakej_id',$request->pakej_id)->get();


            if($request->bilangan_stesen > $Stesen){  //jika stesen da ada dan bilangan stesen lebih bsar.akan tambah stesen
                // dd(1);
              $addcolumn = $request->bilangan_stesen - $Stesen;
              $i = 0;
              for ($i = 0; $i < $addcolumn; $i++)
              {
                $stesen = new Stesen();
                $stesen->projek_id = $request->projek_id;
                $stesen->jenis_pengawasan_id = $request->jenis_pengawasan;
                $stesen->projek_pakej_id = $request->pakej_id;
                $stesen->nama = $request->nama;

                if($request->version){
                  $stesen->versi = $request->version;
                        // $stesen->save();
                }


                if($stesen->save())
                {
                  /*dd($stesen->id);*/
                  $lates_id = $stesen->id;
                  if($request->jenis_pengawasan==2)
                  {
                    if($request->version){
                      $stesen->versi = $request->version;
                      $stesen->save();
                    }

                    if($request->version==1)
                    {
                      $versi_name = 'lama';
                    }
                    elseif($request->version==2)
                    {
                      $versi_name = 'baru';
                    }
                    $mendatory_parameter = MasterParameter::where('jenis_pengawasan',$request->jenis_pengawasan)
                    ->where('mode','=','mandatory')
                    ->where('versi','=',$versi_name)
                    ->get();
                  }
                  else
                  {
                    $mendatory_parameter = MasterParameter::where('jenis_pengawasan',$request->jenis_pengawasan)
                    ->where('mode','=','mandatory')
                    ->get();
                  }

                  /*dd($mendatory_parameter);*/
                  if($request->jenis_pengawasan!=7){
                    foreach ($mendatory_parameter as $key => $mendatory) {
                      $new_parameter = new Parameter;
                      $new_parameter->stesen_id = $lates_id;
                      $new_parameter->parameter = $mendatory->id;
                      $new_parameter->mode = 'mandatory';
                      $new_parameter->save();
                    }
                  }

                }

              }

            }else{  //jika sama atau kurang bilangan stesen.dia akan delete kalau kurang dan maintain klau sama
                // dd(2);
              $addcolumn = $Stesen - $request->bilangan_stesen;
              $stesen = Stesen::where('jenis_pengawasan_id',$request->jenis_pengawasan)->where('projek_id',$request->projek_id)->where('projek_pakej_id',$request->pakej_id)->orderBy('id', 'desc')->take($addcolumn)->delete();
            }

            if($getStesen){
              foreach ($getStesen as $key => $value) {
                $value->nama =  $request->nama;
                $value->save();
              }

            }

            $count_stesen = Stesen::where('jenis_pengawasan_id',$request->jenis_pengawasan)->where('projek_pakej_id',$request->pakej_id)->where('projek_id',$request->projek_id)->count();
            if($count_stesen!=0)
            {
              return response()->json(['status' => 'ok','standard_dirujuk' => 'disable']);
            }
            else
            {
              return response()->json(['status' => 'ok','standard_dirujuk' => 'enable']);
            }



          }


          public function getSungai(Request $request,$id,$pakejid){

            if($request->ajax()) {
              $type = Stesen::where('projek_id',$id)->where('jenis_pengawasan_id',1)->where('projek_pakej_id',$pakejid)->orderBy('id')->get();

              return datatables()->of($type)
              ->editColumn('stesen', function ($type) {
                $stesen = "";
                if($type->stesen){
                  $stesen .= $type->stesen;
                  return strtoupper($stesen);
                }else{
                  return '<input type="hidden" id="errorSg" value="0">';
                }
              })
              ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud){
                  if($type->longitud)
                    $longitud .= strtoupper($type->longitud);
                  return $longitud;
                }else{
                  return '<input type="hidden" id="errorSg" value="0">';
                }
              })
              ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud){
                  if($type->latitud)
                   $latitud .= strtoupper($type->latitud);
                 if($type->longitud && $type->latitud)
                   $latitud .= '<center><a  href="'.config('status.geoLocatorDomain').$type->url_geolocator.'" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';

                            // $latitud .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                 return $latitud;
               }else{
                return '<input type="hidden" id="errorSg" value="0">';
              }
            })
              ->editColumn('gambar', function ($type) {
                $gambar = "";
                if($type->gambar_stesen){
                  $gambar .= '<a href="'.asset('/').$type->gambar_stesen.'" target="_blank"><img src="'.asset('/').$type->gambar_stesen.'" width="150px" height="auto"></a>';
                  return $gambar;
                }else{
                  return '<input type="hidden" id="errorSg" value="-">';
                }

              })
              ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id',$type->projek_pakej_id)->where('projek_id',$type->projek_id)->first();
                $button = "";
                if (($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC') || ($stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC')) {
                          // dd('sini');
                  $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                          // $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                  $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                } else {
                          // dd('sini1');
                  if(Auth::user()->hasAnyRole(['emc',])){
                            // $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                            // $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';

                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                            // $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                    $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                            // $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                    $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                  }
                  if(Auth::user()->hasAnyRole(['pp',])){
                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                              // $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                    $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                  }
                }

                return $button;
              })
              ->make(true);
            }
            return view('projek.daftar_projek');

          }

          public function getMarin(Request $request,$id,$pakejid){

            if($request->ajax()) {
              $type = Stesen::where('projek_id',$id)->where('jenis_pengawasan_id',2)->where('projek_pakej_id',$pakejid)->orderBy('id')->get();
                // $type = Stesen::where('projek_id',$request->id)->where('jenis_pengawasan_id',2)->orderBy('id')->get();
              return datatables()->of($type)
              ->editColumn('stesen', function ($type) {
                $stesen = "";
                if($type->stesen){
                  $stesen .= $type->stesen;
                  return strtoupper($stesen);
                }else{
                  return '<input type="hidden" id="errorMarin" value="0">';
                }
              })
              ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud){
                  if($type->longitud)
                    $longitud .= strtoupper($type->longitud);
                  return $longitud;
                }else{
                  return '<input type="hidden" id="errorSg" value="0">';
                }
              })
              ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud){
                  if($type->latitud)
                   $latitud .= strtoupper($type->latitud);
                 if($type->longitud && $type->latitud)
                   $latitud .= '<center><a  href="'.config('status.geoLocatorDomain').$type->url_geolocator.'" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';

                            // $latitud .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                 return $latitud;
               }else{
                return '<input type="hidden" id="errorSg" value="0">';
              }
            })
              ->editColumn('gambar', function ($type) {
                $gambar = "";
                if($type->gambar_stesen){
                  $gambar .= '<a href="'.asset('/').$type->gambar_stesen.'" target="_blank"><img src="'.asset('/').$type->gambar_stesen.'" width="150px" height="auto"></a>';
                  return $gambar;
                }else{
                  return '<input type="hidden" id="errorMarin" value="-">';
                }

              })
              ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id',$type->projek_pakej_id)->where('projek_id',$type->projek_id)->first();
                $button = "";

                if ($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC' || $stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC') {
                  $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                  $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                } else {
                  if(Auth::user()->hasAnyRole(['emc',])){
                          // $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                          // $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                    $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                  }
                  if(Auth::user()->hasAnyRole(['pp',])){
                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                  }
                }
                return $button;
              })
              ->make(true);
            }
            return view('projek.daftar_projek');

          }

          public function getTasik(Request $request,$id,$pakejid){

            if($request->ajax()) {
              $type = Stesen::where('projek_id',$id)->where('jenis_pengawasan_id',3)->where('projek_pakej_id',$pakejid)->orderBy('id')->get();
                // $type = Stesen::where('projek_id',$request->id)->where('jenis_pengawasan_id',3)->orderBy('id')->get();
              return datatables()->of($type)
              ->editColumn('stesen', function ($type) {
                $stesen = "";
                if($type->stesen){
                  $stesen .= $type->stesen;
                  return strtoupper($stesen);
                }else{
                  return '<input type="hidden" id="errorTasik" value="0">';
                }
              })
              ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud){
                  if($type->longitud)
                    $longitud .= strtoupper($type->longitud);
                  return $longitud;
                }else{
                  return '<input type="hidden" id="errorSg" value="0">';
                }
              })
              ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud){
                  if($type->latitud)
                   $latitud .= strtoupper($type->latitud);
                 if($type->longitud && $type->latitud)
                            // $latitud .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                  $latitud .= '<center><a  href="'.config('status.geoLocatorDomain').$type->url_geolocator.'" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';

                return $latitud;
              }else{
                return '<input type="hidden" id="errorSg" value="0">';
              }
            })
              ->editColumn('gambar', function ($type) {
                $gambar = "";
                if($type->gambar_stesen){
                  $gambar .= '<a href="'.asset('/').$type->gambar_stesen.'" target="_blank"><img src="'.asset('/').$type->gambar_stesen.'" width="150px" height="auto"></a>';
                  return $gambar;
                }else{
                  return '<input type="hidden" id="errorTasik" value="-">';
                }

              })
              ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id',$type->projek_pakej_id)->where('projek_id',$type->projek_id)->first();

                $button = "";

                if ($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC' || $stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC') {
                  $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                  $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                } else {
                  if(Auth::user()->hasAnyRole(['emc',])){
                          // $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                          // $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                    $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                  }
                  if(Auth::user()->hasAnyRole(['pp',])){
                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                  }
                }

                return $button;
              })
              ->make(true);
            }
            return view('projek.daftar_projek');

          }

          public function getTanah(Request $request,$id,$pakejid){

            if($request->ajax()) {
                // $type = Stesen::where('projek_id',$request->id)->where('jenis_pengawasan_id',4)->orderBy('id')->get();
              $type = Stesen::where('projek_id',$id)->where('jenis_pengawasan_id',4)->where('projek_pakej_id',$pakejid)->orderBy('id')->get();
              return datatables()->of($type)
              ->editColumn('stesen', function ($type) {
                $stesen = "";
                if($type->stesen){
                  $stesen .= $type->stesen;
                  return strtoupper($stesen);
                }else{
                  return '<input type="hidden" id="errorTanah" value="0">';
                }
              })
              ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud){
                  if($type->longitud)
                    $longitud .= strtoupper($type->longitud);
                  return $longitud;
                }else{
                  return '<input type="hidden" id="errorSg" value="0">';
                }
              })
              ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud){
                  if($type->latitud)
                   $latitud .= strtoupper($type->latitud);
                 if($type->longitud && $type->latitud)
                            // $latitud .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                  $latitud .= '<center><a  href="'.config('status.geoLocatorDomain').$type->url_geolocator.'" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';

                return $latitud;
              }else{
                return '<input type="hidden" id="errorSg" value="0">';
              }
            })
              ->editColumn('gambar', function ($type) {
                $gambar = "";
                if($type->gambar_stesen){
                  $gambar .= '<a href="'.asset('/').$type->gambar_stesen.'" target="_blank"><img src="'.asset('/').$type->gambar_stesen.'" width="150px" height="auto"></a>';
                  return $gambar;
                }else{
                  return '<input type="hidden" id="errorTanah" value="-">';
                }

              })
              ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id',$type->projek_pakej_id)->where('projek_id',$type->projek_id)->first();

                $button = "";

                if ($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC' || $stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC') {
                  $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                  $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                } else {
                  if(Auth::user()->hasAnyRole(['emc',])){
                          // $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                          // $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                    $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                  }
                  if(Auth::user()->hasAnyRole(['pp',])){
                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                  }
                }
                return $button;
              })
              ->make(true);
            }
            return view('projek.daftar_projek');

          }

          public function getAir(Request $request,$id,$pakejid){

            if($request->ajax()) {
                // $type = Stesen::where('projek_id',$request->id)->where('jenis_pengawasan_id',5)->orderBy('id')->get();
              $type = Stesen::where('projek_id',$id)->where('jenis_pengawasan_id',5)->where('projek_pakej_id',$pakejid)->orderBy('id')->get();
              return datatables()->of($type)
              ->editColumn('stesen', function ($type) {
                $stesen = "";
                if($type->stesen){
                  $stesen .= $type->stesen;
                  return strtoupper($stesen);
                }else{
                  return '<input type="hidden" id="errorAir" value="0">';
                }
              })
              ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud){
                  if($type->longitud)
                    $longitud .= strtoupper($type->longitud);
                  return $longitud;
                }else{
                  return '<input type="hidden" id="errorSg" value="0">';
                }
              })
              ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud){
                  if($type->latitud)
                   $latitud .= strtoupper($type->latitud);
                 if($type->longitud && $type->latitud)
                            // $latitud .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                  $latitud .= '<center><a  href="'.config('status.geoLocatorDomain').$type->url_geolocator.'" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';

                return $latitud;
              }else{
                return '<input type="hidden" id="errorSg" value="0">';
              }
            })
              ->editColumn('gambar', function ($type) {
                $gambar = "";
                if($type->gambar_stesen){
                  $gambar .= '<a href="'.asset('/').$type->gambar_stesen.'" target="_blank"><img src="'.asset('/').$type->gambar_stesen.'" width="150px" height="auto"></a>';
                  return $gambar;
                }else{
                  return '<input type="hidden" id="errorAir" value="-">';
                }

              })
              ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id',$type->projek_pakej_id)->where('projek_id',$type->projek_id)->first();

                $button = "";

                if ($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC' || $stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC') {
                  $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                  $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                } else {
                  if(Auth::user()->hasAnyRole(['emc',])){
                          // $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                          // $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                    $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                  }
                  if(Auth::user()->hasAnyRole(['pp',])){
                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                  }
                }
                return $button;
              })
              ->make(true);
            }
            return view('projek.daftar_projek');

          }

          public function getUdara(Request $request,$id,$pakejid){

            if($request->ajax()) {
                // $type = Stesen::where('projek_id',$request->id)->where('jenis_pengawasan_id',6)->orderBy('id')->get();
              $type = Stesen::where('projek_id',$id)->where('jenis_pengawasan_id',6)->where('projek_pakej_id',$pakejid)->orderBy('id')->get();
              return datatables()->of($type)
              ->editColumn('stesen', function ($type) {
                $stesen = "";
                if($type->stesen){
                  $stesen .= $type->stesen;
                  return strtoupper($stesen);
                }else{
                  return '<input type="hidden" id="errorUdara" value="0">';
                }
              })
              ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud){
                  if($type->longitud)
                    $longitud .= strtoupper($type->longitud);
                  return $longitud;
                }else{
                  return '<input type="hidden" id="errorSg" value="0">';
                }
              })
              ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud){
                  if($type->latitud)
                   $latitud .= strtoupper($type->latitud);
                 if($type->longitud && $type->latitud)
                            // $latitud .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                  $latitud .= '<center><a  href="'.config('status.geoLocatorDomain').$type->url_geolocator.'" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';

                return $latitud;
              }else{
                return '<input type="hidden" id="errorSg" value="0">';
              }
            })
              ->editColumn('gambar', function ($type) {
                $gambar = "";
                if($type->gambar_stesen){
                  $gambar .= '<a href="'.asset('/').$type->gambar_stesen.'" target="_blank"><img src="'.asset('/').$type->gambar_stesen.'" width="150px" height="auto"></a>';
                  return $gambar;
                }else{
                  return '<input type="hidden" id="errorUdara" value="-">';
                }

              })
              ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id',$type->projek_pakej_id)->where('projek_id',$type->projek_id)->first();

                $button = "";

                if ($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC' || $stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC') {
                  $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                  $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                } else {
                  if(Auth::user()->hasAnyRole(['emc',])){
                          // $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                          // $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                    $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                  }
                  if(Auth::user()->hasAnyRole(['pp',])){
                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                  }
                }
                return $button;
              })
              ->make(true);
            }
            return view('projek.daftar_projek');

          }

          public function getBunyi(Request $request,$id,$pakejid){

            if($request->ajax()) {
                // $type = Stesen::where('projek_id',$request->id)->where('jenis_pengawasan_id',7)->orderBy('id')->get();
              $type = Stesen::where('projek_id',$id)->where('jenis_pengawasan_id',7)->where('projek_pakej_id',$pakejid)->orderBy('id')->get();
              return datatables()->of($type)
              ->editColumn('stesen', function ($type) {
                $stesen = "";
                if($type->stesen){
                  $stesen .= $type->stesen;
                  return strtoupper($stesen);
                }else{
                  return '<input type="hidden" id="errorBunyi" value="0">';
                }
              })
              ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud){
                  if($type->longitud)
                    $longitud .= strtoupper($type->longitud);
                  return $longitud;
                }else{
                  return '<input type="hidden" id="errorSg" value="0">';
                }
              })
              ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud){
                  if($type->latitud)
                   $latitud .= strtoupper($type->latitud);
                 if($type->longitud && $type->latitud)
                            // $latitud .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                  $latitud .= '<center><a  href="'.config('status.geoLocatorDomain').$type->url_geolocator.'" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';

                return $latitud;
              }else{
                return '<input type="hidden" id="errorSg" value="0">';
              }
            })
              ->editColumn('gambar', function ($type) {
                $gambar = "";
                if($type->gambar_stesen){
                  $gambar .= '<a href="'.asset('/').$type->gambar_stesen.'" target="_blank"><img src="'.asset('/').$type->gambar_stesen.'" width="150px" height="auto"></a>';
                  return $gambar;
                }else{
                  return '<input type="hidden" id="errorBunyi" value="-">';
                }

              })
              ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id',$type->projek_pakej_id)->where('projek_id',$type->projek_id)->first();

                $button = "";

                if ($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC' || $stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC') {
                  $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                  $button .= '<a onclick="parameterSungai2('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                } else {
                  if(Auth::user()->hasAnyRole(['emc',])){
                          // $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                          // $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai2('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                    $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                  }
                  if(Auth::user()->hasAnyRole(['pp',])){
                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai2('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                  }
                }

                return $button;
              })
              ->make(true);
            }
            return view('projek.daftar_projek');

          }

          public function getGetaran(Request $request,$id,$pakejid){

            if($request->ajax()) {
                // $type = Stesen::where('projek_id',$request->id)->where('jenis_pengawasan_id',8)->orderBy('id')->get();
              $type = Stesen::where('projek_id',$id)->where('jenis_pengawasan_id',8)->where('projek_pakej_id',$pakejid)->orderBy('id')->get();
              return datatables()->of($type)
              ->editColumn('stesen', function ($type) {
                $stesen = "";
                if($type->stesen){
                  $stesen .= $type->stesen;
                  return strtoupper($stesen);
                }else{
                  return '<input type="hidden" id="errorGetaran" value="0">';
                }
              })
              ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud){
                  if($type->longitud)
                    $longitud .= strtoupper($type->longitud);
                  return $longitud;
                }else{
                  return '<input type="hidden" id="errorSg" value="0">';
                }
              })
              ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud){
                  if($type->latitud)
                   $latitud .= strtoupper($type->latitud);
                 if($type->longitud && $type->latitud)
                            // $latitud .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                  $latitud .= '<center><a  href="'.config('status.geoLocatorDomain').$type->url_geolocator.'" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';

                return $latitud;
              }else{
                return '<input type="hidden" id="errorSg" value="0">';
              }
            })
              ->editColumn('gambar', function ($type) {
                $gambar = "";
                if($type->gambar_stesen){
                  $gambar .= '<a href="'.asset('/').$type->gambar_stesen.'" target="_blank"><img src="'.asset('/').$type->gambar_stesen.'" width="150px" height="auto"></a>';
                  return $gambar;
                }else{
                  return '<input type="hidden" id="errorGetaran" value="-">';
                }

              })
              ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id',$type->projek_pakej_id)->where('projek_id',$type->projek_id)->first();

                $button = "";

                if ($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC' || $stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC') {
                  $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                  $button .= '<a onclick="parameterSungai2('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                } else {
                  if(Auth::user()->hasAnyRole(['emc',])){
                          // $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                          // $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                    $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                  }
                  if(Auth::user()->hasAnyRole(['pp',])){
                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai2('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                  }
                }
                return $button;
              })
              ->make(true);
            }
            return view('projek.daftar_projek');

          }

          public function getDron(Request $request,$id,$pakejid){

            if($request->ajax()) {
                // $type = Stesen::where('projek_id',$request->id)->where('jenis_pengawasan_id',9)->orderBy('id')->get();
              $type = Stesen::where('projek_id',$id)->where('jenis_pengawasan_id',9)->where('projek_pakej_id',$pakejid)->orderBy('id')->get();
              return datatables()->of($type)
              ->editColumn('stesen', function ($type) {
                $stesen = "";
                if($type->stesen){
                  $stesen .= $type->stesen;
                  return strtoupper($stesen);
                }else{
                  return '<input type="hidden" id="errorDron" value="0">';
                }
              })
              ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud){
                  if($type->longitud)
                    $longitud .= strtoupper($type->longitud);
                  return $longitud;
                }else{
                  return '<input type="hidden" id="errorDron" value="0">';
                }
              })
              ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud){
                  if($type->latitud)
                   $latitud .= strtoupper($type->latitud);
                 if($type->longitud && $type->latitud)
                            // $latitud .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                  $latitud .= '<center><a  href="'.config('status.geoLocatorDomain').$type->url_geolocator.'" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';

                return $latitud;
              }else{
                return '<input type="hidden" id="errorSg" value="0">';
              }
            })
              ->editColumn('gambar', function ($type) {
                $gambar = "";
                if($type->gambar_stesen){
                  $gambar .= '<a href="'.asset('/').$type->gambar_stesen.'" target="_blank"><img src="'.asset('/').$type->gambar_stesen.'" width="150px" height="auto"></a>';
                  return $gambar;
                }else{
                  return '<input type="hidden" id="errorGetaran" value="-">';
                }

              })
              ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id',$type->projek_pakej_id)->where('projek_id',$type->projek_id)->first();

                $button = "";

                if ($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC' || $stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC') {
                  $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                } else {
                  if(Auth::user()->hasAnyRole(['emc',])){
                          // $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                          // $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                          // $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                    $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                  }
                  if(Auth::user()->hasAnyRole(['pp',])){
                    $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                  }
                }

                return $button;
              })
              ->make(true);
            }
            return view('projek.daftar_projek');

          }


          public function addProjektab1(Request $request) {
           $user = auth()->id();
           $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id',$user)->first();
           $projek_id = $projek->projek_id;

           $projekdetail = ProjekDetail::where('projek_id', $projek_id)->first();
           if ($projekdetail) {
            $projekdetail->aktiviti = $request->aktiviti;
            $projekdetail->lokasi = $request->lokasi;
            $projekdetail->negeri = $request->negeri;
            $projekdetail->daerah = $request->daerah;
            $projekdetail->bandar = $request->bandar;
            $projekdetail->poskod = $request->poskod;
            $projekdetail->alamat_surat = $request->alamat_surat;
            $projekdetail->surat_negeri = $request->surat_negeri;
            $projekdetail->surat_daerah = $request->surat_daerah;
            $projekdetail->surat_bandar = $request->surat_bandar;
            $projekdetail->surat_poskod = $request->surat_poskod;
            $projekdetail->eo = $request->eo;
            $projekdetail->emc = $request->emc;
            $projekdetail->jenis_projek = $request->jenis_projek;
            $projekdetail->laporaneia = $request->laporaneia;
            $projekdetail->peringkat = $request->peringkat;
            $projekdetail->jenis = $request->jenis;
            if($projekdetail->save()){
              return response()->json(['status' => 'ok']);
            }else{
              return response()->json(['status' => 'error']);
            }
          }else{
            return response()->json(['status' => 'error']);
          }
        }

        public function addProjektab2(Request $request) {
          $user = auth()->id();
          $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id',$user)->first();
          $projek_id = $projek->projek_id;
        }

        public function pakej_pengawasan(Request $request,$id) {

          $this->data['myPakej'] = $myPakej = $id;
      // dd($id);
          $this->data['PakejHasPengawasan'] = $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id',$id)->where('status',1)->get();
          $pakej = ProjekPakej::where('id',$id)->first();
          $this->data['projek'] = $projek = Projek::where('id',$pakej->projek_id)->first();
          $jenispengawasan = \App\JenisPengawasan::where('projek_id',$pakej->projek_id)->first();
          $user = auth()->id();
          $projekuser = ProjekHasUser::where('user_id',$user)->first();
          $this->data['Pengawasan'] = $Pengawasan = MasterPengawasan::whereIn('id',json_decode($jenispengawasan->jenis_pengawasan_id))->get();
      //   dd($Pengawasan);
          if($projekuser){
            $projekuserarray = ProjekHasUser::where('projek_id',$projekuser->projek_id)->get();
            $userarrays = [];
            foreach($projekuserarray as $projekuserarrays){
              array_push($userarrays , $projekuserarrays->user_id);
            }
            $EMCuser = User::where('user_type_id', 3)->where('user_status_id', 1)->whereIn('id',$userarrays)->with(['entity_emc', 'status','role', 'emcpengawasan.pengawasan'])->whereHas('model_has_role',function($role) use($request) {
              return $role->where('role_id',6 );
            })->get();
        // dd($EMCuser);
            $this->data['EOuser'] = $EOuser = User::where('user_type_id', 3)->where('user_status_id', 1)->whereIn('id',$userarrays)->with(['entity_eo', 'status','role'])->whereHas('model_has_role',function($role) use($request) {
              return $role->where('role_id',5);
            })->get();
          }else{
            $this->data['EMCuser'] = $EMCuser = [];
            $this->data['EOuser'] = $EOuser = [];
          }


          $collect = collect($EMCuser);
          $EMCuser = $collect->map(function($item){
            $item['pengawasan_item'] = $item->pengawasan->map(function($item2){
              return $item2->skop_pengawasan;
            });
            return $item;
          });

          $EMCarray = $EMCuser->toArray();



      // dd($EMCarray[2]['pengawasan_item']->toArray());

          $this->data['EMCuser'] = $EMCarray;

          return view('projek.pakej_pengawasan', $this->data);
        }

        public function checkupeoemc(Request $request,$id) {

          $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id',$id)->where('status',1)->get();

          $pakejeo = PengawasanHasEo::where('pakej', $id)->first();
          if ($pakejeo) {
            $pakejuser[] = $pakejeo->user_id.' eo';
          } else {
            $pakejuser[] = 'tiada';
          }

          foreach ($PakejHasPengawasan as $PakejHasPengawasanvalue) {
            $pakejemc = PengawasanHasEmc::where('pakej_has_pengawasan_id', $PakejHasPengawasanvalue->id)->first();
            if ($pakejemc) {
              $pakejuser[] = $pakejemc->user_id.' emc';
            } else {
              $pakejuser[] = 'tiada';
            }

          }

          foreach ($pakejuser as $value) {
            if ($value == 'tiada') {
              return response()->json(['status1' => 'error','title' => '','message' => 'Pastikan anda sudah lengkap lantik EO dan EMC bagi setiap pengawasan.','status' => '']);
            }
          }

          return response()->json(['status' => 'ok']);
        }

        public function submitProjek(Request $request) {
        // dd('sini');
        // $ProjekPakej = ProjekPakej::where('projek_id',$request->id)->get();

        //   // dd($ProjekPakej);
        // foreach ($ProjekPakej as $valuepakej) {
        //   $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id',$valuepakej->id)->where('status',1)->get();
        //   $pakejuser[$valuepakej->id]['pakej'] = $valuepakej->id;
        //   foreach ($PakejHasPengawasan as $PakejHasPengawasanvalue) {
        //     if ($PakejHasPengawasanvalue) {
        //       $pakejuser[$valuepakej->id]['pengawasan'][] = $PakejHasPengawasanvalue->id;
        //     }

        //     // $pakejemc = PengawasanHasEmc::where('pakej_has_pengawasan_id', $PakejHasPengawasanvalue->id)->first();
        //     // $pakejeo = PengawasanHasEo::where('pakej_has_pengawasan_id', $PakejHasPengawasanvalue->id)->first();
        //     // if ($pakejemc) {
        //     //   $pakejuser[$valuepakej->id][] = $pakejemc->user_id.' emc';
        //     // } else {
        //     //   $pakejuser[$valuepakej->id][] = 'tiada';
        //     // }

        //     // if ($pakejeo) {
        //     //   $pakejuser[$valuepakej->id][] = $pakejeo->user_id.' eo';
        //     // } else {
        //     //   $pakejuser[$valuepakej->id][] = 'tiada';
        //     // }
        //   }

        //   foreach ($pakejuser as $valuepakejuser) {
        //     dd($valuepakejuser['pakej']);
        //   }
        // }
        //   dd($pakejuser);
        // foreach ($pakejuser as $value) {
        //   if ($value == 'tiada') {
        //     return response()->json(['status1' => 'error','title' => 'Perhatian','message' => 'Pastikan anda sudah lengkap lantik EO dan EMC bagi setiap pengawasan.','status' => 'warning']);
        //   }
        // }
          $checking_projek = ProjekAudit::where('projek_id',$request->id)->where('tarikh_audit',null)->get();
          if(count($checking_projek)>0){
            return  response()->json(['status1' => 'error','title' => '','message' => 'Sila masukkan tarikh audit pada butang kemaskini','status' => '']);
          }

          $ProjekPakej = ProjekPakej::where('projek_id',$request->id)->get();
        // dd(count($ProjekPakej));
        // foreach ($ProjekPakej as $valuepakej) {
        //   $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id',$valuepakej->id)->where('status',1)->get();
          
        //   if (count($PakejHasPengawasan) > 0) {
        //     $PakejPengawasan['pakej'.$valuepakej->id] = $valuepakej->id;
        //   } else {
        //     $PakejPengawasan['pakej'.$valuepakej->id] = 'tiada'.$valuepakej->id;
        //   }
        // }

        // foreach ($PakejPengawasan as $keyPakejPengawasan => $valuePakejPengawasan) {
        //   if (strpos($valuePakejPengawasan, 'tiada') !== false) {
        //     // dd($valuePakejPengawasan);
        //       $idvaluePakejPengawasan = explode("tiada",$valuePakejPengawasan);
        //       $ProjekPakejtiada = ProjekPakej::where('id',$idvaluePakejPengawasan[1])->first();
        //       // dd($ProjekPakejtiada);
        //     return response()->json(['status1' => 'error','title' => '','message' => 'Sila kemaskini pengawasan pakej dan pastikan anda sudah lengkap lantik EO dan EMC bagi setiap pengawasan.','status' => '']);
        //   }
        // }
        // dd('hai');
          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 4;
          $log->description = "Tambah Data Projek";
        // $log->data_old = json_encode($PengawasanHasEmc);
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();

          $projek = Projek::findOrFail($request->id);
        // dd($projek->no_fail_jas);
          $projek->status = 3;
          $projek->tarikh_hantar = date('Y-m-d');
          $projek->save();

          $distribution = Distribution::where('no_fail_jas', $projek->no_fail_jas)->first();

        // dd($projek->no_fail_jas);
        // dd($distribution->toArray());

          $distribution = User::where('id', $distribution->assigned_to_user_id)->first();

        // dd($distribution->email);

          Mail::to($distribution->email)->send(new NewProject($projek->no_fail_jas, 'Pendaftaran Projek'));

          $projeklaporan = ProjekPengawasanLaporan::where('projek_id',$request->id)->first();
          if (!$projeklaporan) {
            for ($x = 1; $x <= 12; $x++) {
              $ProjekPengawasanLaporan = new ProjekPengawasanLaporan();
              $ProjekPengawasanLaporan->projek_id = $request->id;
              $ProjekPengawasanLaporan->bulan = $x;
              $ProjekPengawasanLaporan->save();
            }
          }

          $ioid = ProjekHasUser::where('user_id',auth()->id())->first();
          $ioidpegawai = Projek::where('id',$ioid->projek_id)->first();
          $distribution = Distribution::where('no_fail_jas',$ioidpegawai->no_fail_jas)->first();
        //notifikasi kepada pegawai Jas(penyelia) untuk mengaktifkan Enviromental Office (eo)

          Inbox::create([
            'subject' => 'Pengesahan Pendaftaran Projek - '.$ioidpegawai->no_fail_jas,
            'message' => 'Terdapat pengesahan diperlukan untuk Enviromental Officer',
            'sender_user_id' => auth()->id(), //admin
            'receiver_user_id' => $distribution->assigned_to_user_id, //Penyelia
            'inbox_status_id' => 2,
          ]);

          return response()->json(['status1' => 'ok', 'url' => route('projek.pendaftaran_projek')]);
        }

        public function submitProjekIO(Request $request) {
      // dd($request);
          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 4;
          $log->description = "Hantar Data Projek";
      // $log->data_old = json_encode($PengawasanHasEmc);
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();

          $projek = Projek::findOrFail($request->id);
      // dd($projek->no_fail_jas);
          $projek->status = 3;
          $projek->tarikh_hantar = date('Y-m-d');
          $projek->save();

          $distribution = Distribution::where('no_fail_jas', $projek->no_fail_jas)->first();

      // dd($projek->no_fail_jas);
      // dd($distribution->toArray());

          $distribution = User::where('id', $distribution->assigned_to_user_id)->first();

      // dd($distribution->email);

          Mail::to($distribution->email)->send(new NewProject($projek->no_fail_jas, 'Pendaftaran Projek'));

          $projeklaporan = ProjekPengawasanLaporan::where('projek_id',$request->id)->first();
          if (!$projeklaporan) {
            for ($x = 1; $x <= 12; $x++) {
              $ProjekPengawasanLaporan = new ProjekPengawasanLaporan();
              $ProjekPengawasanLaporan->projek_id = $request->id;
              $ProjekPengawasanLaporan->bulan = $x;
              $ProjekPengawasanLaporan->save();
            }
          }

          $ioid = ProjekHasUser::where('user_id',auth()->id())->first();
          $ioidpegawai = Projek::where('id',$ioid->projek_id)->first();
          $distribution = Distribution::where('no_fail_jas',$ioidpegawai->no_fail_jas)->first();
      //notifikasi kepada pegawai Jas(penyelia) untuk mengaktifkan Enviromental Office (eo)

          Inbox::create([
            'subject' => 'Pengesahan Pendaftaran Projek - '.$ioidpegawai->no_fail_jas,
            'message' => 'Terdapat pengesahan diperlukan untuk Enviromental Officer',
          'sender_user_id' => auth()->id(), //admin
          'receiver_user_id' => $distribution->assigned_to_user_id, //Penyelia
          'inbox_status_id' => 2,
        ]);

          return response()->json(['status1' => 'ok']);
        }

        public function projek(Request $request) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 2;
          $log->description = "Lihat Maklumat Projek";
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();

          $user = auth()->id();

          $projekUser = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id',$user)->first();
             // // dd($projekUser);
          if(!$projekUser){
            return '<script type="text/javascript">alert("Anda tidak berdaftar atas mana-mana projek!!");document.location="javascript:history.back()"</script>';
          }

          $this->data['projekUser'] = $projekUser;

          $this->data['Projek'] = $projek = Projek::where('id',$projekUser->projek_id)->first();
          $this->data['ProjekFasa'] = $ProjekFasa = ProjekFasa::where('projek_id',$projekUser->projek_id)->first();
          $jasdetail = $projek->jasfail->jasdetail->jas_ekas_id;
            // dd($jasdetail);
          $jasfailaktiviti = JasFailDetailAktiviti::where('ekas_id',$jasdetail)->get();
          foreach ($jasfailaktiviti as $keyjasfailaktiviti => $valuejasfailaktiviti) {
            $aktiviti_name = MasterActivity::where('aktiviti','like','%' .$valuejasfailaktiviti->aktiviti. '%')->first();
            // dd($aktiviti_name);
            if ($aktiviti_name) {
              $aktiviti_id[$keyjasfailaktiviti]['id'] = $aktiviti_name->aktiviti;
              $aktiviti_id[$keyjasfailaktiviti]['nama'] = $aktiviti_name->keterangan;
            } else {
              $aktiviti_id[] = 'tiada';
            }
            
          }
            // dd($aktiviti_id);
          $this->data['aktiviti'] = $aktiviti_id;
            // dd($aktiviti_id);
            // $this->data['aktiviti'] = strtoupper(implode(", ",$aktiviti_id));
          $this->data['jasdetail'] = $projek->jasfail->jasdetail;

          if ($projekUser){
            $this->data['ProjekDetail'] = $projekdetail = ProjekDetail::leftJoin('projek_has_user', 'projek_detail.projek_id', '=', 'projek_has_user.projek_id')->where('projek_detail.projek_id',$projek->id)->first();
            // dd(vsprintf(str_replace(['?'], ['\'%s\''], $projekdetail->toSql()), $projekdetail->getBindings()));
            $this->data['Pengawasan'] = $pengawasan = MasterPengawasan::all();
            $this->data['Stesen'] = Stesen::all();
            $this->data['districts'] = $districts = MasterDistrict::orderBy('name','asc')->get();
            $this->data['states'] =  $states = MasterState::orderBy('name')->whereNotIn('id',['17'])->get();
            //dd($states);
            $this->data['city'] =  $city = MasterCity::orderBy('name')->get();
            $this->data['peringkatPengawasan'] = $peringkatPengawasan = MasterPeringkatPengawasan::all();
            // $this->data['peringkatPengawasan'] = $peringkatPengawasan = MasterPeringkatPengawasan::all()->sortByDesc('id');
            $this->data['pematuhaneia'] =  $pematuhaneia = MasterPematuhanEia::all()->sortByDesc('id');
            $this->data['jenisProjek'] =  $jenisProjek = MasterJenisProjek::where('status',1)->orderBy('id', 'desc')->get();
            $this->data['tempohAudit'] =  $tempohAudit = MasterTempohAudit::all(); //remove pilihan untuk tempoh audit TIADA di database
            $this->data['projekAudit'] =  $projekAudit = ProjekAudit::where('projek_id',$projek->id)->get();
            $this->data['stesens'] =  $stesens = Stesen::where('projek_id',$projek->id)->get();
            // $this->data['countsungai'] =  $stesens = Stesen::where('projek_id',$projek->id)->andWhere->get();
            // dd($stesens);
            $this->data['stesen_sungai'] =  $stesen_sungai = Stesen::where('projek_id',$projek->id)->where('jenis_pengawasan_id',1)->latest()->first();
            $this->data['stesen_marin'] =  $stesen_marin = Stesen::where('projek_id',$projek->id)->where('jenis_pengawasan_id',2)->latest()->first();
            $this->data['stesen_tasik'] =  $stesen_tasik = Stesen::where('projek_id',$projek->id)->where('jenis_pengawasan_id',3)->latest()->first();
            $this->data['stesen_tanah'] =  $stesen_tanah = Stesen::where('projek_id',$projek->id)->where('jenis_pengawasan_id',4)->latest()->first();
            $this->data['stesen_air'] =  $stesen_air = Stesen::where('projek_id',$projek->id)->where('jenis_pengawasan_id',5)->latest()->first();
            $this->data['stesen_udara'] =  $stesen_air = Stesen::where('projek_id',$projek->id)->where('jenis_pengawasan_id',6)->latest()->first();
            $this->data['stesen_bunyi'] =  $stesen_bunyi = Stesen::where('projek_id',$projek->id)->where('jenis_pengawasan_id',7)->latest()->first();
            $this->data['stesen_getaran'] =  $stesen_bunyi = Stesen::where('projek_id',$projek->id)->where('jenis_pengawasan_id',8)->latest()->first();

            $this->data['PakejHasPengawasan']=$PakejHasPengawasan=MasterPengawasan::join('pakej_has_pengawasan','pakej_has_pengawasan.pengawasan_id','=','master_pengawasan.id')
            ->join('projek_fasa','projek_fasa.id','=','pakej_has_pengawasan.pakej_id')
            ->select('master_pengawasan.jenis_pengawasan','pakej_has_pengawasan.id as pengawasan_id','pakej_has_pengawasan.pakej_id')
            ->where('projek_fasa.projek_id',$projek->id)->groupBy('pakej_has_pengawasan.pengawasan_id')->get();
            
            $this->data['countsungai'] =  $countsungai = Stesen::where('jenis_pengawasan_id',1)->where('projek_id',$projek->id)->count();
            $this->data['countmarin'] =   $countmarin = Stesen::where('jenis_pengawasan_id',2)->where('projek_id',$projek->id)->count();
            $this->data['version'] = 3;//not selected
            if($countmarin)
            {
              $data_stesen = Stesen::where('jenis_pengawasan_id',2)->where('projek_id',$projek->id)->first();
                // $parameter_id = Parameter::where('stesen_id','=',$data_stesen->id)->first();
                // $version = MasterParameter::where('id','=',$parameter_id->parameter)->first();
                // if($version->versi=='lama')
                // {
                //     $this->data['version'] = 1;
                // }
                // elseif($version->versi=='baru')
                // {
                //     $this->data['version'] = 2;
                // }
              if($data_stesen->versi==1){
                $this->data['version'] = 1;
              }
              elseif($data_stesen->versi==2)
              {
                $this->data['version'] = 2;
              }
            }

            $this->data['counttasik'] =   $counttasik = Stesen::where('jenis_pengawasan_id',3)->where('projek_id',$projek->id)->count();
            $this->data['counttanah'] =   $counttanah = Stesen::where('jenis_pengawasan_id',4)->where('projek_id',$projek->id)->count();
            $this->data['countairlarian'] =   $countairlarian = Stesen::where('jenis_pengawasan_id',5)->where('projek_id',$projek->id)->count();
            $this->data['countudara'] =   $countudara = Stesen::where('jenis_pengawasan_id',6)->where('projek_id',$projek->id)->count();
            $this->data['countbunyi'] =   $countbunyi = Stesen::where('jenis_pengawasan_id',7)->where('projek_id',$projek->id)->count();
            $this->data['countgetaran'] =   $countgetaran = Stesen::where('jenis_pengawasan_id',8)->where('projek_id',$projek->id)->count();
            $this->data['countdron'] =   $countdron = Stesen::where('jenis_pengawasan_id',9)->where('projek_id',$projek->id)->count();

            // dd($EOuser);

            $this->data['stations'] =   $stations =MasterStation::all();

            $EO = ProjekHasUser::leftJoin('model_has_role', 'projek_has_user.user_id', '=', 'model_has_role.model_id')
            ->where('model_has_role.role_id',5)
            ->where('projek_has_user.projek_id',$projekUser->projek_id)
            ->get();
            // if(!$EO){
            //     return '<script type="text/javascript">alert("Sila daftar EO terlebih dahulu!!");document.location="javascript:history.back()"</script>';
            // }
            // if(count($EO) > 0){
            $detailEO = [];
            foreach($EO as $value) {
              $usereo = User::select('name','username')->where('id', $value->user_id)->where('user_status_id',1)->whereNotNull('username')->first();
              if ($usereo) {
                $detailEO[] = $usereo;
              }
            }
            $this->data['detailEO'] = $detailEO;
            // dd($detailEO);


            $EMC = ProjekHasUser::leftJoin('model_has_role', 'projek_has_user.user_id', '=', 'model_has_role.model_id')
            ->where('model_has_role.role_id',6)
            ->where('projek_has_user.projek_id',$projekUser->projek_id)
            ->get();

            // if(!$EMC){
            //     return '<script type="text/javascript">alert("Sila daftar EMC terlebih dahulu!!");document.location="javascript:history.back()"</script>';
            // }
            // dd($EMC->user_id);
            // if($EMC){
            //     $this->data['detailEMC'] = $detailEMC = User::where('id', $EMC->user_id)->first();
            // }else{
            //     $this->data['detailEMC'] = "";
            // }
            $detailEMC = [];
            foreach($EMC as $value1) {
              $useremc = User::select('name','username')->where('id', $value1->user_id)->where('user_status_id',1)->whereNotNull('username')->first();
              if ($useremc) {
                $detailEMC[] = $useremc;
              }
            }
            // dd($detailEMC);
            $this->data['detailEMC'] = $detailEMC;
            $this->data['project_activity'] =  $project_activity = MasterProjectActivity::all();

            $this->data['countStesen'] =  $countStesen = Stesen::where('projek_id',$projek->id)->count();

            $this->data['countFasa'] =  $countFasa = ProjekFasa::where('projek_id',$projek->id)->count();

            if($request->ajax()) {
              $pakej = ProjekFasa::where('projek_id',$projek->id)->where('nama_pakej','!=','Tidak Berpakej / Tidak Berfasa')->get();
                // dd($pakej);
              return datatables()->of($pakej)
              ->editColumn('nama_pakej', function ($pakej) {
                $pakejNama = "";
                if($pakej->nama_pakej)
                 $pakejNama .= $pakej->nama_pakej;
               return strtoupper($pakejNama);
             })
              ->editColumn('kontraktor', function ($pakej) {
                $pakejKontraktor = "";
                if ($pakej->kontraktor)
                  $pakejKontraktor .= $pakej->kontraktor;
                return strtoupper($pakejKontraktor);
              })
              ->editColumn('negeri', function ($pakej) {
                $pakejNegeri = "";
                if($pakej->pakej_negeri)
                 $pakejNegeri .= $pakej->projekState->name;
               return  strtoupper($pakejNegeri);
             })
              ->editColumn('alamat', function ($pakej) {
                $pakejAlamat = "";
                if($pakej->alamat)
                  $pakejAlamat .= $pakej->alamat;
                return strtoupper($pakejAlamat);
              })
              ->editColumn('tarikh_mula', function ($pakej) {
                $tarikh_mula = "";
                if($pakej->tarikh_mula)
                  $tarikh_mula .= date("d/m/Y",strtotime($pakej->tarikh_mula));
                return strtoupper($tarikh_mula);
              })
              ->editColumn('tarikh_akhir', function ($pakej) {
                $tarikh_akhir = "";
                if($pakej->tarikh_akhir)
                  $tarikh_akhir .= date("d/m/Y",strtotime($pakej->tarikh_akhir));
                return strtoupper($tarikh_akhir);
              })
              ->editColumn('action', function ($pakej) {
                $button = "";
                // $button .= '<a onclick="pengawasan('.$pakej->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Maklumat EO/EMC</a>';

                $button .= '<a onclick="editFasaModal('.$pakej->id.')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i></a>';

                // $button .= '<a onclick="removepakej('.$pakej->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i></a>';  

                $button .= '<a onclick="removepakej('.$pakej->id.')" href="javascript:;" data-toggle="tooltip" title="" class="btn btn-default btn-xs" style="" type="button" onclick=""><span style="color:#fff"> <i class="fas fa-trash text-danger"></i></span></a>';


                return $button;
              })
              ->make(true);
            }
          }

          $this->data['userEOs'] = $userEOs = ProjekHasUser::where('projek_id', $projek->id)->where('role_id', 5)->where('status', 5)->get();
          $this->data['userEMCs'] = $userEMCs = ProjekHasUser::where('projek_id', $projek->id)->where('role_id', 6)->where('status', 5)->get();

          return view('projek.daftar_projek', $this->data);
        }


        public function projek_temp(Request $request) {

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 2;
          $log->description = "Lihat Maklumat Projek";
      // $log->data_old = json_encode($PengawasanHasEmc);
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();

          $user = auth()->id();

          $projekUser = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id',$user)->first();
             // // dd($projekUser);
          if(!$projekUser){
            return '<script type="text/javascript">alert("Anda tidak berdaftar atas mana-mana projek!!");document.location="javascript:history.back()"</script>';
          }

          $this->data['projekUser'] = $projekUser;

          $this->data['Projek'] = $projek = Projek::where('id',$projekUser->projek_id)->first();
          $this->data['ProjekPakej'] = $projekpakej = ProjekPakej::where('projek_id',$projekUser->projek_id)->first();
          $jasdetail = $projek->jasfail->jasdetail->jas_ekas_id;
            // dd($jasdetail);
          $jasfailaktiviti = JasFailDetailAktiviti::where('ekas_id',$jasdetail)->get();
          foreach ($jasfailaktiviti as $keyjasfailaktiviti => $valuejasfailaktiviti) {
            $aktiviti_name = MasterActivity::where('aktiviti','like','%' .$valuejasfailaktiviti->aktiviti. '%')->first();
            // dd($aktiviti_name);
            if ($aktiviti_name) {
              $aktiviti_id[$keyjasfailaktiviti]['id'] = $aktiviti_name->aktiviti;
              $aktiviti_id[$keyjasfailaktiviti]['nama'] = $aktiviti_name->keterangan;
            } else {
              $aktiviti_id[] = 'tiada';
            }
            
          }
            // dd($aktiviti_id);
          $this->data['aktiviti'] = $aktiviti_id;
            // dd($aktiviti_id);
            // $this->data['aktiviti'] = strtoupper(implode(", ",$aktiviti_id));
          $this->data['jasdetail'] = $projek->jasfail->jasdetail;

          if ($projekUser){
            $this->data['ProjekDetail'] = $projekdetail = ProjekDetail::leftJoin('projek_has_user', 'projek_detail.projek_id', '=', 'projek_has_user.projek_id')->where('projek_detail.projek_id',$projek->id)->first();
            // dd(vsprintf(str_replace(['?'], ['\'%s\''], $projekdetail->toSql()), $projekdetail->getBindings()));
            $this->data['Pengawasan'] = $pengawasan = MasterPengawasan::all();
            $this->data['Stesen'] = Stesen::all();
            $this->data['districts'] = $districts = MasterDistrict::orderBy('name','asc')->get();
            $this->data['states'] =  $states = MasterState::orderBy('name')->whereNotIn('id',['17'])->get();
            $this->data['city'] =  $states = MasterCity::orderBy('name')->get();
            $this->data['peringkatPengawasan'] = $peringkatPengawasan = MasterPeringkatPengawasan::all();
            // $this->data['peringkatPengawasan'] = $peringkatPengawasan = MasterPeringkatPengawasan::all()->sortByDesc('id');
            $this->data['pematuhaneia'] =  $pematuhaneia = MasterPematuhanEia::all()->sortByDesc('id');
            $this->data['jenisProjek'] =  $jenisProjek = MasterJenisProjek::where('status',1)->orderBy('id', 'desc')->get();
            $this->data['tempohAudit'] =  $tempohAudit = MasterTempohAudit::all(); //remove pilihan untuk tempoh audit TIADA di database
            $this->data['projekAudit'] =  $projekAudit = ProjekAudit::where('projek_id',$projek->id)->get();
            $this->data['stesens'] =  $stesens = Stesen::where('projek_id',$projek->id)->get();
            // $this->data['countsungai'] =  $stesens = Stesen::where('projek_id',$projek->id)->andWhere->get();
            // dd($stesens);
            $this->data['stesen_sungai'] =  $stesen_sungai = Stesen::where('projek_id',$projek->id)->where('jenis_pengawasan_id',1)->latest()->first();
            $this->data['stesen_marin'] =  $stesen_marin = Stesen::where('projek_id',$projek->id)->where('jenis_pengawasan_id',2)->latest()->first();
            $this->data['stesen_tasik'] =  $stesen_tasik = Stesen::where('projek_id',$projek->id)->where('jenis_pengawasan_id',3)->latest()->first();
            $this->data['stesen_tanah'] =  $stesen_tanah = Stesen::where('projek_id',$projek->id)->where('jenis_pengawasan_id',4)->latest()->first();
            $this->data['stesen_air'] =  $stesen_air = Stesen::where('projek_id',$projek->id)->where('jenis_pengawasan_id',5)->latest()->first();
            $this->data['stesen_udara'] =  $stesen_air = Stesen::where('projek_id',$projek->id)->where('jenis_pengawasan_id',6)->latest()->first();
            $this->data['stesen_bunyi'] =  $stesen_bunyi = Stesen::where('projek_id',$projek->id)->where('jenis_pengawasan_id',7)->latest()->first();
            $this->data['stesen_getaran'] =  $stesen_bunyi = Stesen::where('projek_id',$projek->id)->where('jenis_pengawasan_id',8)->latest()->first();


            $this->data['countsungai'] =  $countsungai = Stesen::where('jenis_pengawasan_id',1)->where('projek_id',$projek->id)->count();
            $this->data['countmarin'] =   $countmarin = Stesen::where('jenis_pengawasan_id',2)->where('projek_id',$projek->id)->count();
            $this->data['version'] = 3;//not selected
            if($countmarin)
            {
              $data_stesen = Stesen::where('jenis_pengawasan_id',2)->where('projek_id',$projek->id)->first();
                // $parameter_id = Parameter::where('stesen_id','=',$data_stesen->id)->first();
                // $version = MasterParameter::where('id','=',$parameter_id->parameter)->first();
                // if($version->versi=='lama')
                // {
                //     $this->data['version'] = 1;
                // }
                // elseif($version->versi=='baru')
                // {
                //     $this->data['version'] = 2;
                // }
              if($data_stesen->versi==1){
                $this->data['version'] = 1;
              }
              elseif($data_stesen->versi==2)
              {
                $this->data['version'] = 2;
              }
            }

            $this->data['counttasik'] =   $counttasik = Stesen::where('jenis_pengawasan_id',3)->where('projek_id',$projek->id)->count();
            $this->data['counttanah'] =   $counttanah = Stesen::where('jenis_pengawasan_id',4)->where('projek_id',$projek->id)->count();
            $this->data['countairlarian'] =   $countairlarian = Stesen::where('jenis_pengawasan_id',5)->where('projek_id',$projek->id)->count();
            $this->data['countudara'] =   $countudara = Stesen::where('jenis_pengawasan_id',6)->where('projek_id',$projek->id)->count();
            $this->data['countbunyi'] =   $countbunyi = Stesen::where('jenis_pengawasan_id',7)->where('projek_id',$projek->id)->count();
            $this->data['countgetaran'] =   $countgetaran = Stesen::where('jenis_pengawasan_id',8)->where('projek_id',$projek->id)->count();
            $this->data['countdron'] =   $countdron = Stesen::where('jenis_pengawasan_id',9)->where('projek_id',$projek->id)->count();

            // dd($EOuser);

            $this->data['stations'] =   $stations =MasterStation::all();

            $EO = ProjekHasUser::leftJoin('model_has_role', 'projek_has_user.user_id', '=', 'model_has_role.model_id')
            ->where('model_has_role.role_id',5)
            ->where('projek_has_user.projek_id',$projekUser->projek_id)
            ->get();
            // if(!$EO){
            //     return '<script type="text/javascript">alert("Sila daftar EO terlebih dahulu!!");document.location="javascript:history.back()"</script>';
            // }
            // if(count($EO) > 0){
            $detailEO = [];
            foreach($EO as $value) {
              $usereo = User::select('name','username')->where('id', $value->user_id)->where('user_status_id',1)->whereNotNull('username')->first();
              if ($usereo) {
                $detailEO[] = $usereo;
              }
            }
            $this->data['detailEO'] = $detailEO;
            // dd($detailEO);


            $EMC = ProjekHasUser::leftJoin('model_has_role', 'projek_has_user.user_id', '=', 'model_has_role.model_id')
            ->where('model_has_role.role_id',6)
            ->where('projek_has_user.projek_id',$projekUser->projek_id)
            ->get();

            // if(!$EMC){
            //     return '<script type="text/javascript">alert("Sila daftar EMC terlebih dahulu!!");document.location="javascript:history.back()"</script>';
            // }
            // dd($EMC->user_id);
            // if($EMC){
            //     $this->data['detailEMC'] = $detailEMC = User::where('id', $EMC->user_id)->first();
            // }else{
            //     $this->data['detailEMC'] = "";
            // }
            $detailEMC = [];
            foreach($EMC as $value1) {
              $useremc = User::select('name','username')->where('id', $value1->user_id)->where('user_status_id',1)->whereNotNull('username')->first();
              if ($useremc) {
                $detailEMC[] = $useremc;
              }
            }
            // dd($detailEMC);
            $this->data['detailEMC'] = $detailEMC;
            $this->data['project_activity'] =  $project_activity = MasterProjectActivity::all();

            $this->data['countStesen'] =  $countStesen = Stesen::where('projek_id',$projek->id)->count();

            $this->data['countFasa'] =  $countFasa = ProjekFasa::where('projek_id',$projek->id)->count();

            if($request->ajax()) {
              $pakej = ProjekPakej::where('projek_id',$projek->id)->where('nama_pakej','!=','Tidak Berpakej / Tidak Berfasa')->get();
                // dd($pakej);
              return datatables()->of($pakej)
              ->editColumn('nama_pakej', function ($pakej) {
                $pakejNama = "";
                if($pakej->nama_pakej)
                 $pakejNama .= $pakej->nama_pakej;
               return strtoupper($pakejNama);
             })
              ->editColumn('kontraktor', function ($pakej) {
                $pakejKontraktor = "";
                if ($pakej->kontraktor)
                  $pakejKontraktor .= $pakej->kontraktor;
                return strtoupper($pakejKontraktor);
              })
              ->editColumn('negeri', function ($pakej) {
                $pakejNegeri = "";
                if($pakej->pakej_negeri)
                 $pakejNegeri .= $pakej->projekState->name;
               return  strtoupper($pakejNegeri);
             })
              ->editColumn('alamat', function ($pakej) {
                $pakejAlamat = "";
                if($pakej->alamat)
                  $pakejAlamat .= $pakej->alamat;
                return strtoupper($pakejAlamat);
              })
              ->editColumn('tarikh_mula', function ($pakej) {
                $tarikh_mula = "";
                if($pakej->tarikh_mula)
                  $tarikh_mula .= date("d/m/Y",strtotime($pakej->tarikh_mula));
                return strtoupper($tarikh_mula);
              })
              ->editColumn('tarikh_akhir', function ($pakej) {
                $tarikh_akhir = "";
                if($pakej->tarikh_akhir)
                  $tarikh_akhir .= date("d/m/Y",strtotime($pakej->tarikh_akhir));
                return strtoupper($tarikh_akhir);
              })
              ->editColumn('action', function ($pakej) {
                $button = "";
                $button .= '<a onclick="pengawasan('.$pakej->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Maklumat EO/EMC</a>';
                $button .= '<a onclick="editfasa('.$pakej->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini Pakej</a>';
                        // $button .= '<a onclick="pengawasan('.$pakej->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini Pengawasan Pakej</a>';
                $button .= '<a onclick="removepakej('.$pakej->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Padam</a>';

                return $button;
              })
              ->make(true);
            }
          }
          return view('projek.daftar_projek_backup_19112020_1126PM', $this->data);
        }
        public function editpakej(Request $request){
          $projekPakej = ProjekPakej::findOrFail($request->id);
          return response()->json(['status' => 'success', 'title' => '', 'projekPakej' => $projekPakej]);
        }

        public function buangpakej(Request $request) {
          $projekPakej = ProjekPakej::findOrFail($request->id);
          $projekPakej->delete();
        
          return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
        }

        public function buangFasa(Request $request) {
          $projekFasa = ProjekFasa::findOrFail($request->id);
          $projekFasa->delete();
          return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
        }

        public function buangemp(Request $request) {
          $ProjekEMP = ProjekEMP::findOrFail($request->id);

          if($ProjekEMP){
            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 6;
            $log->description = "Padam Data Pakej";
            $log->data_old = json_encode($ProjekEMP);
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
          }


          $ProjekEMP->delete();
          return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
        }

        public function buangStesen(Request $request) {
          $Stesen = Stesen::findOrFail($request->id);
          $Stesen->delete();
          return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
        }

        public function buangStesen1(Request $request) {
          $Stesen = PenambahanStesen::findOrFail($request->id);
          $Stesen->delete();
          return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
        }

        public function EMP(Request $request) {
//dd($request);

          $log = new LogSystem;
          $log->module_id = 26;
          $log->activity_type_id = 4;
          $log->description = "Tambah Data EMP";
        // $log->data_old = json_encode($ProjekEMP);
          $log->url = $request->fullUrl();
          $log->method = strtoupper($request->method());
          $log->ip_address = $request->ip();
          $log->created_by_user_id = auth()->id();
          $log->save();
        // dd('dwdwdw');
          $user = auth()->id();
          $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id',$user)->first();
          $projek_id = $projek->projek_id;

          $emp = new ProjekEMP();
          $emp->projek_id = $projek_id;

          $date1 = strtr($request->tarikh_kelulusan, '/', '-');
          $tarikh_kelulusan = date("Y-m-d",strtotime($date1));
          $emp->tarikh_kelulusan = $tarikh_kelulusan;

          $emp->laporan = $request->laporan;
          $emp->jururunding = $request->jururunding;
          $emp->No_Rujukan = $request->No_Rujukan;
          $emp->save();

          return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data baru berjaya ditambah.']);
        }

        public function getFasa(Request $request) {

          if($request->ajax()) {

           $projekFasa = ProjekFasa::where('projek_id',$request->id)->orderBy('id')->get();

           return datatables()->of($projekFasa)
           ->editColumn('nama_fasa', function ($projekFasa) {
            if($projekFasa->nama_fasa){
              return strtoupper($projekFasa->nama_fasa);
            }else{
              return '-';
            }
          })
           ->editColumn('action', function ($projekFasa) {
            $button = "";
            $button .= '<a onclick="editfasa('.$projekFasa->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
            $button .= '<a onclick="removefasa('.$projekFasa->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Padam</a>';
            return $button;
          })
           ->make(true);
         }
         return view('projek.daftar_projek',compact('audit'));
       }

       public function getTidakPakej(Request $request) {

        $pakej = ProjekPakej::where('projek_id',$request->id)->where('nama_pakej',"Tidak Berpakej / Tidak Berfasa")->first();
        if($pakej){
          // $pakej = new ProjekPakej();
          // $pakej->projek_id = $request->id;
          // $pakej->nama_pakej = "Tidak Berpakej / Tidak Berfasa";
          // $pakej->kontraktor = "Tiada";
          // $pakej->pakej_negeri = "Tiada";
          // $pakej->alamat = "Tiada";
          // $pakej->tarikh_mula = "Tiada";
          // $pakej->tarikh_akhir = "Tiada";
          // $pakej->save();
          $pengawasan = MasterPengawasan::all();
          foreach($pengawasan as $pengawasans){
            $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id',$pakej->id)->where('pengawasan_id',$pengawasans->id)->first();
            if(!$PakejHasPengawasan){
              $PakejHasPengawasan = new PakejHasPengawasan();
              $PakejHasPengawasan->pakej_id = $pakej->id;
              $PakejHasPengawasan->pengawasan_id = $pengawasans->id;
              $PakejHasPengawasan->save();
            }
          }

          if($request->ajax()) {
            $projekFasa = ProjekPakej::where('projek_id',$request->id)->where('nama_pakej',"Tidak Berpakej / Tidak Berfasa")->get();
            return datatables()->of($projekFasa)
            ->editColumn('nama_fasa', function ($projekFasa) {
              if($projekFasa->nama_pakej){
                return strtoupper($projekFasa->nama_pakej);
              }else{
                return '-';
              }
            })
            ->editColumn('action', function ($projekFasa) {
              $button = "";
              $projek = Projek::where('id',$projekFasa->projek_id)->first();
              if ($projek->status == 1) {
                $button .= '<a onclick="pengawasan('.$projekFasa->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                          // $button .= '<a onclick="pengawasan('.$projekFasa->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini Pengawasan Tidak Berpakej/ Tidak Berfasa</a>';
              } else {
                $button .= '<a onclick="pengawasan('.$projekFasa->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Lihat Pengawasan Tidak Berpakej/ Tidak Berfasa</a>';
              }
              return $button;
            })
            ->make(true);
          }
        }

        // return view('projek.daftar_projek',compact('audit'));
      }

      public function getTarikhAudit(Request $request) {

        if($request->ajax()) {
         $audit = ProjekAudit::where('projek_id',$request->id)->get();
           // $audit = ProjekAudit::where('projek_id',$request->id)->orderBy('tarikh_audit','asc')->get();
           // dd($audit);

         return datatables()->of($audit)
         ->editColumn('tarikh', function ($audit) {
                    // return $audit->tarikh_audit ? '<div style="text-align=center">'.date('d/m/Y', strtotime($audit->tarikh_audit))."</div>" : '<span class=""> Sila Masukkan Tarikh Pada Butang Kemaskini</span>';
          return $audit->tarikh_audit;

          // if($audit->tarikh_audit){
          //   $month = intval (date('m', strtotime($audit->tarikh_audit)));
          //   if(date("F", mktime(0, 0, 0,$month , 10)) == "January")
          //     $monthmy = "Januari";
          //   if(date("F", mktime(0, 0, 0,$month , 10)) == "February")
          //     $monthmy = "Februari";
          //   if(date("F", mktime(0, 0, 0,$month , 10)) == "March")
          //     $monthmy = "Mac";
          //   if(date("F", mktime(0, 0, 0,$month , 10)) == "April")
          //     $monthmy = "April";
          //   if(date("F", mktime(0, 0, 0,$month , 10)) == "May")
          //     $monthmy = "Mei";
          //   if(date("F", mktime(0, 0, 0,$month , 10)) == "June")
          //     $monthmy = "Jun";
          //   if(date("F", mktime(0, 0, 0,$month , 10)) == "July")
          //     $monthmy = "Julai";
          //   if(date("F", mktime(0, 0, 0,$month , 10)) == "August")
          //     $monthmy = "Ogos";
          //   if(date("F", mktime(0, 0, 0,$month , 10)) == "September")
          //     $monthmy = "September";
          //   if(date("F", mktime(0, 0, 0,$month , 10)) == "October")
          //     $monthmy = "Oktober";
          //   if(date("F", mktime(0, 0, 0,$month , 10)) == "November")
          //     $monthmy = "November";
          //   if(date("F", mktime(0, 0, 0,$month , 10)) == "December")
          //     $monthmy = "Disember";
          //   return '<div style="text-align=center">'.$monthmy." | ".date('Y', strtotime($audit->tarikh_audit))."</div>";
          // }else{
          //   return '<span class="text-danger text-uppercase"> </span><br><input type="hidden" id="erroraudit" value="0">';
          // }
        })
         ->editColumn('action', function ($audit) {
          $button = "";
          $button .= '<a onclick="editaudit('.$audit->id.')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                    // $button .= '<a onclick="remove('.$audit->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Buang</a>';
          return $button;
        }) 

         ->editColumn('status', function ($audit) {


          return $audit->status_pengawasan->name;

        }) 

         ->editColumn('kekerapan', function ($audit) {

          return $audit->audit->name;
        })

         ->editColumn('rujukan', function ($audit) {

          return $audit->no_rujukan;
        })


         ->make(true);
       }
       return view('projek.daftar_projek',compact('audit'));
     }

     public function kemaskiniaudit1(Request $request) {
        // dd($request->frequent);
      $this->data['master_bulan'] = $master_bulan = MasterMonth::all();
      $current_year = "2020";
      $range_of_year = '5';

        // dd($years);
        // $master_tahun['0'] = $current_year;
        // for($i='1';$i<=$range_of_year;$i++)
        // {
        //     $tambah = '+'.$i.'years';
        //     $tahun = date('Y', strtotime($tambah));
        //     $master_tahun[$i] = $tahun;
        // }
        // dd($master_tahun);
      $years = array_combine(range(date("Y"), 2070), range(date("Y"), 2070));
      $this->data['master_tahun'] = $years;
      $this->data['audit'] = $audit = ProjekAudit::where('projek_id',$request->id)->first();
      $this->data['frequent'] = $request->frequent;
        // $month = date('Y', strtotime($audit->tarikh_audit));
        // dd($month);
      return view('projek.editaudit1',$this->data);
    }

    public function audit(Request $request) {

        dd($request);
      $audit = ProjekAudit::where('projek_id',$request->id)->get();

      $audit->tarikh_audit = $request->tarikh_audit;
      $audit->no_rujukan = $request->no_rujukan;
      $audit->kekerapan_audit = $request->no_rujukan;
      $audit->status_kemajuan = $request->peringkatPengawasan;
      $audit->save();

        // foreach($audit as $addaudit){


        // }

    }

    public function kemaskiniaudit(Request $request) {
        // dd($request->id);
      $audit = ProjekAudit::where('projek_id',$request->id)->get();

      

      $this->data['master_bulan'] = $master_bulan = MasterMonth::all();
      $current_year = "2020";
      $range_of_year = '5';

        // dd($years);
        // $master_tahun['0'] = $current_year;
        // for($i='1';$i<=$range_of_year;$i++)
        // {
        //     $tambah = '+'.$i.'years';
        //     $tahun = date('Y', strtotime($tambah));
        //     $master_tahun[$i] = $tahun;
        // }
        // dd($master_tahun);
      $years = array_combine(range(date("Y"), 2070), range(date("Y"), 2070));
      $this->data['master_tahun'] = $years;
      $this->data['audit'] = $audit = ProjekAudit::where('id',$request->id)->first();
        // $month = date('Y', strtotime($audit->tarikh_audit));
        // dd($month);
      return view('projek.editaudit',$this->data);
    }

    public function kemaskinifasa(Request $request) {
        // dd($request->id);
      $this->data['fasa'] = $fasa = ProjekPakej::where('id',$request->id)->first();
      $this->data['states'] = $states = MasterState::all();
        // dd($audit->tarikh_audit);
      return view('projek.editfasa',$this->data);
    }

    public function kemaskinistesen(Request $request) {
        // dd($request->id);
      $this->data['stesen'] = $stesen = Stesen::where('id',$request->id)->first();
      $this->data['parameter'] = $parameter = Parameter::where('stesen_id',$stesen->id)->where('mode','mandatory')->get();
      if($stesen->jenis_pengawasan_id!=7){
        $parameter2 = Parameter::where('stesen_id',$stesen->id)->where('mode','mandatory')->first();
        $version = MasterParameter::where('id',$parameter2->parameter)->first();
        //$this->data['masterstandard'] = $masterstandard = MasterStandard::all();
      }
      if($stesen->jenis_pengawasan_id==2)
      {
        $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->where('versi','=',$version->versi)->where('mode','mandatory')->first();
        $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
        ->where('jenis_parameter',$masterparameter->id)
        ->get();
      }
      elseif($stesen->jenis_pengawasan_id==4)
      {
        $class_data = MasterParameter::leftJoin('master_standard', 'master_parameter.id', '=', 'master_standard.jenis_parameter')

        ->select(['class'])
        ->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)
        ->distinct()
        ->get();
        $masterStandardID = array();
        foreach ($class_data as $key => $class_datas)
        {
          $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->where('mode','mandatory')->first();
                // dd($class_datas->class);
          $masterstandard = MasterStandard::where('jenis_parameter',$masterparameter->id)
                                                // ->where('class',$class_datas->class)
          ->get();
          foreach ($masterstandard as $key => $value) {
            $masterStandardID[]=$value->id;
          }

        }

        $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
        ->whereIn('id',$masterStandardID)
        ->get();
            //dd($masterstandard);
      }
      elseif($stesen->jenis_pengawasan_id==7){
        $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
        $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
        ->where('jenis_parameter',$masterparameter->id)
        ->get();
      }
      else
      {
        $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->where('mode','mandatory')->first();
        $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
        ->where('jenis_parameter',$masterparameter->id)
        ->get();
      }
        //$masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
        //dd($masterparameter);


      $this->data['parameter_standard'] = $parameter_standard = Parameter::where('stesen_id',$stesen->id)->where('mode','mandatory')->first();
        //dd($masterstandard);

        // Stesen::where('id',$request->id)->first();
        // dd($audit->tarikh_audit);
      return view('projek.editstesen',$this->data);
    }

    public function kemaskinistesen1(Request $request,$pakejid,$projekid) {

      $log = new LogSystem;
      $log->module_id = 26;
      $log->activity_type_id = 5;
      $log->description = "Kemaskini Data Stesen";
      // $log->data_old = json_encode($ProjekEMP);
      $log->url = $request->fullUrl();
      $log->method = strtoupper($request->method());
      $log->ip_address = $request->ip();
      $log->created_by_user_id = auth()->id();
      $log->save();

      $pakejidarray = explode(".",$pakejid);
      $pakejidarraycount = count($pakejidarray);

      if($pakejidarraycount == 2){
        $StesenPengawasanStatus = StesenPengawasanStatus::where('projek_id',$projekid)->where('pakej_id',$pakejidarray[1])->first();
        $status_id = $StesenPengawasanStatus->status_id;
      }else{
        $status_id = 1;
      }
      if($status_id <> 9 ){
        $this->data['stesen'] = $stesen = Stesen::where('id',$pakejidarray[0])->first();
        $stesen_status = StesenPengawasanStatus::where('pakej_id',$stesen->projek_pakej_id)->where('projek_id',$stesen->projek_id)->first();
        $this->data['stesen_status'] = $stesen_status->status_id;
        $this->data['type'] = 1;
        if($stesen->jenis_pengawasan_id==1){
          $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
          $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
          ->where('jenis_parameter',$masterparameter->id)
          ->get();
          $negeris = $stesen->projek->jasfail->jasdetail->negeri_nama->name;
          if ($negeris == 'Pulau Pinang') {
            $negeris = 'P.Pinang';
          }
          if ($negeris == 'Negeri Sembilan') {
            $negeris = 'N.SEMBILAN';
          }
          $lembangan = MasterSungai::where('negeri',$negeris)->groupBy('lembangan_2020')->get();
          $sungai = MasterSungai::where('negeri',$negeris)->groupBy('sungai_2020')->get();
          $this->data['lembangan'] = $lembangan;
          $this->data['sungai'] = $sungai;
        }else if($stesen->jenis_pengawasan_id==2)
        {
          if($stesen->versi==1){
            $versi = 'lama';
          }else{
            $versi = 'baru';
          }
          $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->where('versi','=',$versi)->first();
              // dd($masterparameter);
          $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
          ->where('jenis_parameter',$masterparameter->id)
          ->whereNotIn('class', ['Sentuhan Prima','Sentuhan Sekunder'])
          ->get();

        }
        elseif($stesen->jenis_pengawasan_id==4)
        {
          $class_data = MasterParameter::leftJoin('master_standard', 'master_parameter.id', '=', 'master_standard.jenis_parameter')

          ->select(['class'])
          ->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)
          ->distinct()
          ->get();
          $masterStandardID = array();
          foreach ($class_data as $key => $class_datas)
          {
            $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->where('mode','mandatory')->first();
                  // dd($class_datas->class);
            $masterstandard = MasterStandard::where('jenis_parameter',$masterparameter->id)
            ->get();
            foreach ($masterstandard as $key => $value) {
              $masterStandardID[]=$value->id;
            }

          }

          $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
          ->whereIn('id',$masterStandardID)
          ->get();
              //dd($masterstandard);
        }
        elseif($stesen->jenis_pengawasan_id==7){
          $this->data['masterparameter'] = $masterparameter = MasterParameter::select(['id','schedule'])->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->groupBy('schedule')->get();

          $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
          $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
          ->where('jenis_parameter',$masterparameter->id)
          ->get();
        }
        elseif($stesen->jenis_pengawasan_id==9){

        }
        else
        {
          $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
          $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
          ->where('jenis_parameter',$masterparameter->id)
          ->get();
        }
        $this->data['parameter_standard'] = $parameter_standard = Parameter::where('stesen_id',$stesen->id)->where('mode','mandatory')->first();

        }//statusstesenselesai
        else{
          $this->data['stesen'] = $stesen = PenambahanStesen::where('id',$pakejidarray[0])->first();
          $this->data['type'] = 2;
          if($stesen->jenis_pengawasan_id==2)
          {
            if($stesen->versi==1){
              $versi = 'lama';
            }else{
              $versi = 'baru';
            }
            $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->where('versi','=',$versi)->first();
              // dd($masterparameter);
            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
            ->where('jenis_parameter',$masterparameter->id)
            ->whereNotIn('class', ['Sentuhan Prima','Sentuhan Sekunder'])
            ->get();

                                                                          // dd($masterstandard->toSql());

          }
          elseif($stesen->jenis_pengawasan_id==4)
          {
            $class_data = MasterParameter::leftJoin('master_standard', 'master_parameter.id', '=', 'master_standard.jenis_parameter')

            ->select(['class'])
            ->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)
            ->distinct()
            ->get();
            $masterStandardID = array();
            foreach ($class_data as $key => $class_datas)
            {
              $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->where('mode','mandatory')->first();
                  // dd($class_datas->class);
              $masterstandard = MasterStandard::where('jenis_parameter',$masterparameter->id)
                                                  // ->where('class',$class_datas->class)
              ->get();
              foreach ($masterstandard as $key => $value) {
                $masterStandardID[]=$value->id;
              }

            }

            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
            ->whereIn('id',$masterStandardID)
            ->get();
              //dd($masterstandard);
          }
          elseif($stesen->jenis_pengawasan_id==7){
            $this->data['masterparameter'] = $masterparameter = MasterParameter::select(['id','schedule'])->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->groupBy('schedule')->get();

              // $masterparameter1 = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->get();
              // $this->data['masterstandard'] = $masterstandard = MasterStandard::whereIn('jenis_parameter',$masterparameter1->id)->get();

            $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
            $this->data['masterstandard'] = $masterstandard = MasterStandardBunyi::select(['id','class'])
            ->where('jenis_parameter',$masterparameter->id)
            ->get();
          }
          elseif($stesen->jenis_pengawasan_id==9){

          }
          else
          {
            $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
            ->where('jenis_parameter',$masterparameter->id)
            ->get();
          }
          //$masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
          //dd($masterparameter);


          $this->data['parameter_standard'] = $parameter_standard = PenambahanParameter::where('stesen_id',$stesen->id)->where('mode','mandatory')->first();
          //dd($masterstandard);

          // Stesen::where('id',$request->id)->first();
          // dd($audit->tarikh_audit);
        }

        return view('projek.editstesen1',$this->data);
      }

      public function kemaskinistesen2(Request $request,$pakejid,$projekid) {
      // dd('siniii');
        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Data Stesen";
      // $log->data_old = json_encode($ProjekEMP);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $pakejidarray = explode(".",$pakejid);
        $pakejidarraycount = count($pakejidarray);

        if($pakejidarraycount == 2){
          $StesenPengawasanStatus = PenambahanStesenStatus::where('projek_id',$projekid)->where('pakej_id',$pakejidarray[1])->first();
          $status_id = $StesenPengawasanStatus->status_id;
        }else{
          $status_id = 1;
        }
        if($status_id <> 9 ){
          // dd('$stesen_status->status_id');
          $this->data['stesen'] = $stesen = PenambahanStesen::where('id',$pakejidarray[0])->first();
          $stesen_status = PenambahanStesenStatus::where('pakej_id',$stesen->projek_pakej_id)->where('projek_id',$stesen->projek_id)->first();
          $this->data['stesen_status'] = $stesen_status->status_id;
          $this->data['type'] = 2;
          if($stesen->jenis_pengawasan_id==1){
            $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
            ->where('jenis_parameter',$masterparameter->id)
            ->get();
            $negeris = $stesen->projek->jasfail->jasdetail->negeri_nama->name;
            if ($negeris == 'Pulau Pinang') {
              $negeris = 'P.Pinang';
            }
            $lembangan = MasterSungai::where('negeri',$negeris)->groupBy('lembangan_2020')->get();
            $sungai = MasterSungai::where('negeri',$negeris)->groupBy('sungai_2020')->get();
            $this->data['lembangan'] = $lembangan;
            $this->data['sungai'] = $sungai;
          }else if($stesen->jenis_pengawasan_id==2)
          {
            if($stesen->versi==1){
              $versi = 'lama';
            }else{
              $versi = 'baru';
            }
            $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->where('versi','=',$versi)->first();
              // dd($masterparameter);
            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
            ->where('jenis_parameter',$masterparameter->id)
            ->whereNotIn('class', ['Sentuhan Prima','Sentuhan Sekunder'])
            ->get();

          }
          elseif($stesen->jenis_pengawasan_id==4)
          {
            $class_data = MasterParameter::leftJoin('master_standard', 'master_parameter.id', '=', 'master_standard.jenis_parameter')

            ->select(['class'])
            ->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)
            ->distinct()
            ->get();
            $masterStandardID = array();
            foreach ($class_data as $key => $class_datas)
            {
              $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->where('mode','mandatory')->first();
                  // dd($class_datas->class);
              $masterstandard = MasterStandard::where('jenis_parameter',$masterparameter->id)
              ->get();
              foreach ($masterstandard as $key => $value) {
                $masterStandardID[]=$value->id;
              }

            }

            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
            ->whereIn('id',$masterStandardID)
            ->get();
              //dd($masterstandard);
          }
          elseif($stesen->jenis_pengawasan_id==7){
            $this->data['masterparameter'] = $masterparameter = MasterParameter::select(['id','schedule'])->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->groupBy('schedule')->get();

            $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
            ->where('jenis_parameter',$masterparameter->id)
            ->get();
          }
          elseif($stesen->jenis_pengawasan_id==9){

          }
          else
          {
            $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
            ->where('jenis_parameter',$masterparameter->id)
            ->get();
          }
          $this->data['parameter_standard'] = $parameter_standard = Parameter::where('stesen_id',$stesen->id)->where('mode','mandatory')->first();

        }//statusstesenselesai
        else{
          $this->data['stesen'] = $stesen = PenambahanStesen::where('id',$pakejidarray[0])->first();
          $this->data['type'] = 2;
          if($stesen->jenis_pengawasan_id==2)
          {
            if($stesen->versi==1){
              $versi = 'lama';
            }else{
              $versi = 'baru';
            }
            $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->where('versi','=',$versi)->first();
              // dd($masterparameter);
            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
            ->where('jenis_parameter',$masterparameter->id)
            ->whereNotIn('class', ['Sentuhan Prima','Sentuhan Sekunder'])
            ->get();

                                                                          // dd($masterstandard->toSql());

          }
          elseif($stesen->jenis_pengawasan_id==4)
          {
            $class_data = MasterParameter::leftJoin('master_standard', 'master_parameter.id', '=', 'master_standard.jenis_parameter')

            ->select(['class'])
            ->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)
            ->distinct()
            ->get();
            $masterStandardID = array();
            foreach ($class_data as $key => $class_datas)
            {
              $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->where('mode','mandatory')->first();
                  // dd($class_datas->class);
              $masterstandard = MasterStandard::where('jenis_parameter',$masterparameter->id)
                                                  // ->where('class',$class_datas->class)
              ->get();
              foreach ($masterstandard as $key => $value) {
                $masterStandardID[]=$value->id;
              }

            }

            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
            ->whereIn('id',$masterStandardID)
            ->get();
              //dd($masterstandard);
          }
          elseif($stesen->jenis_pengawasan_id==7){
            $this->data['masterparameter'] = $masterparameter = MasterParameter::select(['id','schedule'])->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->groupBy('schedule')->get();

              // $masterparameter1 = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->get();
              // $this->data['masterstandard'] = $masterstandard = MasterStandard::whereIn('jenis_parameter',$masterparameter1->id)->get();

            $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
            $this->data['masterstandard'] = $masterstandard = MasterStandardBunyi::select(['id','class'])
            ->where('jenis_parameter',$masterparameter->id)
            ->get();
          }
          elseif($stesen->jenis_pengawasan_id==9){

          }
          else
          {
            $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
            ->where('jenis_parameter',$masterparameter->id)
            ->get();
          }
          //$masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
          //dd($masterparameter);


          $this->data['parameter_standard'] = $parameter_standard = PenambahanParameter::where('stesen_id',$stesen->id)->where('mode','mandatory')->first();
          //dd($masterstandard);

          // Stesen::where('id',$request->id)->first();
          // dd($audit->tarikh_audit);
        }

        return view('projek.editstesen1',$this->data);
      }

      public function map(Request $request) {
        // dd($request->id);
        $this->data['stesen'] = $stesen = Stesen::where('id',$request->id)->first();

        // Stesen::where('id',$request->id)->first();
        // dd($audit->tarikh_audit);
        return view('projek.map',$this->data);
      }

      public function addparametersg1(Request $request,$pakejid,$projekid) {


        $pakejidarray = explode(".",$pakejid);
        $pakejidarraycount = count($pakejidarray);
      // dd($pakejidarraycount);
        if($pakejidarraycount == 2){
          $StesenPengawasanStatus = StesenPengawasanStatus::where('projek_id',$projekid)->where('pakej_id',$pakejidarray[1])->first();
          $status_id = $StesenPengawasanStatus->status_id;
        }else{
          $status_id = 1;
        }

        if($status_id <> 9 ){

         $this->data['type'] = 1;
         $this->data['stesen'] = $stesen = Stesen::where('id',$pakejidarray[0])->first();
         $this->data['pengawasan_id'] = $pengawasan_id = $stesen->jenis_pengawasan_id;
         // dd($pengawasan_id);
         $stesen_statusdata = StesenPengawasanStatus::where('projek_id',$stesen->projek_id)->first();
        //  dd($stesen_statusdata);
         $this->data['stesen_status'] = $stesen_statusdata->status_id;
         if(in_array($stesen->jenis_pengawasan_id,[2])){
          // dd('sini12');
            // $this->data['parameters'] = $parameters = Parameter::select('parameter.id','parameter.stesen_id','parameter.parameter','parameter.standard','parameter.baselineeia','parameter.baselineemp','parameter.mode',
              // 'master_standard.id as mid','master_standard.jenis_parameter','master_standard.class as mclass','master_standard.parameter as mparameter')->leftJoin('master_standard','parameter.standard','=','master_standard.id')->where('stesen_id',$stesen->id)->where('class',$stesen->class)->orderBy('parameter')->orderBy('standard')->get();
          $this->data['parameters'] = $parameters = Parameter::with('jenisstandard')->where('stesen_id',$stesen->id)->orderBy('mode')->orderBy('parameter')->get();
            // dd(vsprintf(str_replace(['?'], ['\'%s\''], $parameters->toSql()), $parameters->getBindings()));
            // dd($parameters->toArray());
        // dd('sini');
        }else{
        // dd('sini1');
          // dd('sini11');
          $this->data['parameters'] = $parameters = Parameter::with('jenisstandard')->where('stesen_id',$stesen->id)->orderBy('mode')->orderBy('parameter')->get();
            // dd(vsprintf(str_replace(['?'], ['\'%s\''], $parameters->toSql()), $parameters->getBindings()));
        }
      }else{
        $this->data['type'] = 2;
        $this->data['stesen'] = $stesen = PenambahanStesen::where('id',$pakejidarray[0])->first();
        $this->data['pengawasan_id'] = $pengawasan_id = $stesen->jenis_pengawasan_id;
        $stesen_statusdata = PenambahanStesenStatus::where('projek_id',$stesen->projek_id)->first();
        $this->data['stesen_status'] = $stesen_statusdata->status_id;
        if(in_array($stesen->jenis_pengawasan_id,[2])){
          // $this->data['parameters'] = $parameters = Parameter::select('parameter.id','parameter.stesen_id','parameter.parameter','parameter.standard','parameter.baselineeia','parameter.baselineemp','parameter.mode',
              // 'master_standard.id as mid','master_standard.jenis_parameter','master_standard.class as mclass','master_standard.parameter as mparameter')->leftJoin('master_standard','parameter.standard','=','master_standard.id')->where('stesen_id',$stesen->id)->where('class',$stesen->class)->orderBy('parameter')->orderBy('standard')->get();
          $this->data['parameters'] = $parameters = PenambahanParameter::with('jenisstandard')->where('stesen_id',$stesen->id)->orderBy('mode')->get();
        }else{

         $this->data['parameters'] = $parameters = PenambahanParameter::with('jenisstandard')->where('stesen_id',$stesen->id)->orderBy('mode')->get();
       }
     }

     $log = new LogSystem;
     $log->module_id = 26;
     $log->activity_type_id = 3;
     $log->description = "Papar Modal Parameter";
      // $log->data_old = json_encode($parameters);
     $log->url = $request->fullUrl();
     $log->method = strtoupper($request->method());
     $log->ip_address = $request->ip();
     $log->created_by_user_id = auth()->id();
     $log->save();
        // dd($this->data);
     return view('projek.editparameter1',$this->data);

   }

   public function addparametersg2(Request $request,$pakejid,$projekid) {
        // dd($pakejid);
    $pakejidarray = explode(".",$pakejid);
    $pakejidarraycount = count($pakejidarray);
      // dd($pakejidarraycount);

    if($pakejidarraycount == 2){
      $StesenPengawasanStatus = StesenPengawasanStatus::where('projek_id',$projekid)->where('pakej_id',$pakejidarray[1])->first();
        // dd($StesenPengawasanStatus);
      $status_id = $StesenPengawasanStatus->status_id;
        // dd($status_id);
    }else{
      $status_id = 1;
    }
    $this->data['status'] = $status_id;
    if($status_id <> 9 ){

      $this->data['type'] = 1;
      $this->data['stesen'] = $stesen = Stesen::where('id',$pakejidarray[0])->first();
      $this->data['pengawasan_id'] = $pengawasan_id = $stesen->jenis_pengawasan_id;

      if(in_array($stesen->jenis_pengawasan_id,[2])){
        $this->data['parameters'] = $parameters = Parameter::with('jenisstandard')->where('stesen_id',$stesen->id)->orderBy('standard')->orderBy('mode')->get();
      }else{
        $this->data['parameters'] = $parameters = Parameter::with('jenisstandard')->where('stesen_id',$stesen->id)->orderBy('mode')->get();
      }
    }else{
      $this->data['type'] = 2;

      $this->data['stesen'] = $stesen = PenambahanStesen::where('id',$pakejidarray[0])->first();
        // dd($request->id);
      if(in_array($stesen->jenis_pengawasan_id,[2])){

       $this->data['parameters'] = $parameters = PenambahanParameter::with('jenisstandard')->where('stesen_id',$stesen->id)->orderBy('standard')->orderBy('mode')->get();
     }else{
       $this->data['parameters'] = $parameters = PenambahanParameter::with('jenisstandard')->where('stesen_id',$stesen->id)->orderBy('mode')->get();
     }
   }

   if(in_array($stesen->jenis_pengawasan_id,[7])){
        // dd(preg_match('/Schedule 3/',$stesen->class));
    if (preg_match('/Schedule 1/',$stesen->class) == 1) {
      $schedule = 1;
    }
    if (preg_match('/Schedule 2/',$stesen->class) == 1) {
      $schedule = 2;
    }
    if (preg_match('/Schedule 3/',$stesen->class) == 1) {
      $schedule = 3;
    }
    if (preg_match('/Schedule 4/',$stesen->class) == 1) {
      $schedule = 4;
    }
    if (preg_match('/Schedule 5/',$stesen->class) == 1) {
      $schedule = 5;
    }
    if (preg_match('/Schedule 6/',$stesen->class) == 1) {
      $schedule = 6;
    }
        // dd($schedule);
    $this->data['schedule'] = $schedule;
    $this->data['parameterbunyi'] = $parameterbunyi = ParameterBunyi::where('stesen_id',$stesen->id)->where('schedule',$schedule)->get();
        // dd($parameterbunyi);
    if(count($parameterbunyi) == 0) {
      $this->data['parameterbunyidata'] = 0;
    } else {
      $this->data['parameterbunyidata'] = 1;
    }
  }
  $log = new LogSystem;
  $log->module_id = 26;
  $log->activity_type_id = 3;
  $log->description = "Papar Modal Parameter";
      // $log->data_old = json_encode($parameters);
  $log->url = $request->fullUrl();
  $log->method = strtoupper($request->method());
  $log->ip_address = $request->ip();
  $log->created_by_user_id = auth()->id();
  $log->save();

  return view('projek.editparameter2',$this->data);

}

public function addparametersg(Request $request) {

  $this->data['parameters'] = $parameters = MasterParameter::where('jenis_pengawasan',1)->get();
  $this->data['stesen_id'] =  $request->id;
  $this->data['stesen'] = $stesen = Stesen::where('id',$request->id)->first();
  $this->data['masterpengawasan'] = $masterpengawasan = MasterPengawasan::where('id','=',$stesen->jenis_pengawasan_id)->first();
        //dd($masterpengawasan);


        //$this->data['masterstandard'] = $masterstandard = MasterStandard::all();

  if($stesen->jenis_pengawasan_id==2)
  {
    $this->data['masterparameter'] =  $masterparameter = MasterParameter::where('jenis_pengawasan','=',$stesen->jenis_pengawasan_id)->where('versi','=','baru')->get();
    $parameter2 = Parameter::where('stesen_id',$stesen->id)->where('mode','mandatory')->first();
    $version = MasterParameter::where('id',$parameter2->parameter)->first();
    $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->where('versi','=',$version->versi)->first();
    $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])

    ->where('jenis_parameter',$masterparameter->id)
    ->get();

  }
  elseif($stesen->jenis_pengawasan_id==4)
  {
    $class_data = MasterParameter::leftJoin('master_standard', 'master_parameter.id', '=', 'master_standard.jenis_parameter')
    ->select(['class'])
    ->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)
    ->distinct()
    ->get();
    $masterStandardID = array();
    foreach ($class_data as $key => $class_datas)
    {
     $masterstandard = MasterStandard::select(['id'])
     ->where('class',$class_datas->class)
     ->first();
     $masterStandardID[]=$masterstandard->id;
   }

   $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
   ->whereIn('id',$masterStandardID)
   ->get();

   $this->data['masterparameter'] =  $masterparameter = MasterParameter::where('jenis_pengawasan','=',$stesen->jenis_pengawasan_id)->where('versi','=','lama')->get();
            //dd($masterstandard);
 }
        // elseif($stesen->jenis_pengawasan_id==7)
        // {
        //     $this->data['masterparameter'] =  $masterparameter = MasterParameter::where('jenis_pengawasan','=',$stesen->jenis_pengawasan_id)->where('versi','=','lama')->get();
        //     $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
        //     $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
        //                                                                 ->where('jenis_parameter',$masterparameter->id)
        //                                                                 ->get();
        // }
 else
 {
  $this->data['masterparameter'] =  $masterparameter = MasterParameter::where('jenis_pengawasan','=',$stesen->jenis_pengawasan_id)->where('versi','=','lama')->get();
  $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
  $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
  ->where('jenis_parameter',$masterparameter->id)
  ->get();
}
        //$masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
        //dd($masterparameter);

        // dd($audit->tarikh_audit);
return view('projek.editparameter',$this->data);
}


public function standardlisted(Request $request){

  $value_class = MasterStandard::where('id','=',$request->standard)->first();

  $masterstandard = MasterStandard::where('class','=',$value_class->class)->where('jenis_parameter','=',$request->parameter_id)->first();

  return response()->json(['status' => 'success', 'masterstandard' => $masterstandard]);
}

public function standardlisted2(Request $request){
// dd('s');
  $parameter = MasterParameter::where('id',$request->parameter_id)->first();
  $schedule = MasterParameter::where('schedule',$parameter->id)->get();

  $masterstandard = MasterStandard::where('schedule','=',$schedule->schedule)->where('jenis_parameter','=',$request->parameter_id)->first();

  return response()->json(['status' => 'success', 'masterstandard' => $masterstandard]);
}

public function schedulelisted(Request $request){
// dd($request->id);
  $value_class = MasterParameter::where('schedule','=',$request->schedule_id)->first();

        // $masterstandard = MasterStandard::where('class','=',$value_class->class)->where('jenis_parameter','=',$request->parameter_id)->first();

  return response()->json(['status' => 'success', 'value_class' => $value_class]);
}


public function showbaseline(Request $request){
        //$databaseline = MasterStandard::where('class','=',$request->standard)->get();
  $stesen = Stesen::where('id',$request->stesenid)->first();
  $parameter = Parameter::where('stesen_id',$stesen->id)->where('mode','mandatory')->get();
  $class = MasterStandard::where('id','=',$request->standard)->first();
        //dd($class->class);
  $idname = array();
  $dataBaseline = array();
  foreach ($parameter as $key => $parameterSungai) {
    $databaseline = MasterStandard::where('jenis_parameter','=',$parameterSungai->parameter)->where('class','=',$class->class)->first();
    if($databaseline)
    {
      $newvalue= $databaseline->parameter;
    }
    else
    {
     $newvalue=0;
   }
            //dd($newvalue);
   $idname[] = "baseline".$parameterSungai->parameter;
   $dataBaseline[] = $newvalue;

 }

 return response()->json(['title' => '', 'idname' => $idname, 'iddata' => $dataBaseline]);
}

public function getParameterSungai(Request $request) {

  if($request->ajax()) {
   $stesen = Parameter::where('stesen_id',$request->id)->where('mode','optional')->get();

   return datatables()->of($stesen)
   ->editColumn('parameter', function ($stesen) {

    return $stesen->jenisparameter->jenis_parameter;
  })
   ->editColumn('standard', function ($stesen) {

    return $stesen->jenisstandard->class;

  })
   ->editColumn('baseline', function ($stesen) {

    return $stesen->baseline;
  })
   ->editColumn('action', function ($stesen) {
    $button = "";
                    // $button .= '<a onclick="editaudit('.$stesen->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
    $button .= '<a onclick="remove('.$stesen->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Padam</a>';
    return $button;
  })
   ->make(true);
 }else{

 }
 return view('projek.editparameter');
}

public function updateparametersg(Request $request) {
        // dd($request->id);

 $parameter = new Parameter();
 $parameter->stesen_id = $request->stesen_id;
 $parameter->parameter = $request->parameter;
 $parameter->standard = $request->standard;
 $parameter->baseline = $request->baseline;
 $parameter->save();

 $log = new LogSystem;
 $log->module_id = 26;
 $log->activity_type_id = 5;
 $log->description = "Kemaskini Data Parameter";
 $log->data_old = json_encode($parameter);
 $log->url = $request->fullUrl();
 $log->method = strtoupper($request->method());
 $log->ip_address = $request->ip();
 $log->created_by_user_id = auth()->id();
 $log->save();

 return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
}


public function updateparametersg1(Request $request) {
        // dd($request->all());
  if($request->type == 2){
    $dataparameter = PenambahanParameter::where('stesen_id','=',$request->id)->get();
  }else{
    $dataparameter = Parameter::where('stesen_id','=',$request->id)->get();
  }
  $stesen = Stesen::where('id',$request->id)->first();

  foreach ($dataparameter as $key => $dataparameters) {
   $request_paramter_id = $request->parameter_id+$dataparameters->parameter;
             // dd($dataparameters->parameter.' '.$request_paramter_id);
             // dd($request_paramter_id);
   if($dataparameters->parameter==$request_paramter_id)
   {
                    //$update_standard = "standard".$dataparameters->parameter;
                    //dd($dataparameters->parameter);
    if ($request->jenis_pengawasan_id == 2) {
      $classID = MasterStandard::where('id','=',$dataparameters->standard)->first();
    } else {
      $classID = MasterStandard::where('jenis_parameter','=',$dataparameters->parameter)->where('class',$stesen->class)->first();
    }
                    // dd($classID);
                    // dd('sini');
                    // if (is_null($classID)) {
                    //     if (!is_null($request->is_prima)) {
                    //         $classID = MasterStandard::where('jenis_parameter','=',$dataparameters->parameter)->where('class',$request->is_prima)->first();
                    //     } else {
                    //         $classID = $classID;
                    //     }
                    //     if (is_null($classID)) {
                    //       if (!is_null($request->is_sekunder)) {
                    //           $classID = MasterStandard::where('jenis_parameter','=',$dataparameters->parameter)->where('class',$request->is_sekunder)->first();
                    //       }
                    //     }
                    // }
                    //dd($classID);
    $update_baselineeia = "baselineeia".$dataparameters->parameter;
    $update_baselineemp = "baselineemp".$dataparameters->parameter;
    if ($request->jenis_pengawasan_id == 8) {
      $update_standard = "standard".$dataparameters->parameter;
    }
    if($request->type == 2){
      $update_parameter = PenambahanParameter::where('stesen_id','=',$request->id)->where('parameter','=',$dataparameters->parameter)->first();
    }else{
      $update_parameter = Parameter::where('stesen_id','=',$request->id)->where('parameter','=',$dataparameters->parameter)->first();
    }
    if($classID){
      $update_parameter->standard = $classID->id;
    }else{
      $update_parameter->standard = 0;
    }
    $update_parameter->baselineeia = $request->$update_baselineeia;
    $update_parameter->baselineemp = $request->$update_baselineemp;
    if ($request->jenis_pengawasan_id == 8) {
      $update_parameter->standard = $request->$update_standard;
    }
    $update_parameter->save();
  }
}


$log = new LogSystem;
$log->module_id = 26;
$log->activity_type_id = 5;
$log->description = "Kemaskini Data Parameter";
       // $log->data_old = json_encode($update_parameter);
$log->url = $request->fullUrl();
$log->method = strtoupper($request->method());
$log->ip_address = $request->ip();
$log->created_by_user_id = auth()->id();
$log->save();

return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
}

public function updateparametersg2(Request $request) {
        // dd($request->all());
  $category = "";
  if ($request->jenis_pengawasan_id == 7) {
    if ($request->schedule == 1) {
      if (isset($request->baselinedaynoise) == true && isset($request->baselinenightnoise) == true) {
        $category = 'noise';
        $baselineday = $request->baselinedaynoise;
        $baselinenight = $request->baselinenightnoise;
      }

      if (isset($request->baselinedaysuburrban) == true && isset($request->baselinenightsuburrban) == true) {
        $category = 'suburban';
        $baselineday = $request->baselinedaysuburrban;
        $baselinenight = $request->baselinenightsuburrban;
      }

      if (isset($request->baselinedayurban) == true && isset($request->baselinenighturban) == true) {
        $category = 'urban';
        $baselineday = $request->baselinedayurban;
        $baselinenight = $request->baselinenighturban;
      }

      if (isset($request->baselinedaycommercial) == true && isset($request->baselinenightcommercial) == true) {
        $category = 'commercial';
        $baselineday = $request->baselinedaycommercial;
        $baselinenight = $request->baselinenightcommercial;
      }

      if (isset($request->baselinedayindustrial) == true && isset($request->baselinenightindustrial) == true) {
        $category = 'industry';
        $baselineday = $request->baselinedayindustrial;
        $baselinenight = $request->baselinenightindustrial;
      }

      $standard = MasterStandardBunyi::where('schedule',$request->schedule)->where('categori',$category)->get();
      foreach ($standard as $keystandard => $valuestandard) {
        if ($valuestandard->time == 'day') {
          $standardday = $valuestandard->parameter;
        } else if ($valuestandard->time == 'night') {
          $standardnight = $valuestandard->parameter;
        }
      }
          // dd($standardnight);
      $parameterbunyidata = ParameterBunyi::where('stesen_id',$request->id)->first();
      if ($parameterbunyidata) {
       $parameterbunyidata->delete();
     }
     $parameterbunyi = new ParameterBunyi;
     $parameterbunyi->stesen_id = $request->id;
     $parameterbunyi->schedule = $request->schedule;
     $parameterbunyi->category = $category;
     $parameterbunyi->standardday = $standardday;
     $parameterbunyi->standardnight = $standardnight;
     $parameterbunyi->baselineday = $baselineday;
     $parameterbunyi->baselinenight = $baselinenight;
     $parameterbunyi->save();
   } else if ($request->schedule == 2) {
    if (isset($request->baselinedaynoise) == true && isset($request->baselinenightnoise) == true) {
      $category = 'noise';
      $baselineday = $request->baselinedaynoise;
      $baselinenight = $request->baselinenightnoise;
    }

    if (isset($request->baselinedaysuburrban) == true && isset($request->baselinenightsuburrban) == true) {
      $category = 'suburban';
      $baselineday = $request->baselinedaysuburrban;
      $baselinenight = $request->baselinenightsuburrban;
    }

    if (isset($request->baselinedaycommercial) == true && isset($request->baselinenightcommercial) == true) {
      $category = 'commercial';
      $baselineday = $request->baselinedaycommercial;
      $baselinenight = $request->baselinenightcommercial;
    }

    if (isset($request->baselinedayindustrial) == true && isset($request->baselinenightindustrial) == true) {
      $category = 'industry';
      $baselineday = $request->baselinedayindustrial;
      $baselinenight = $request->baselinenightindustrial;
    }

    $standard = MasterStandardBunyi::where('schedule',$request->schedule)->where('categori',$category)->get();
    foreach ($standard as $keystandard => $valuestandard) {
      if ($valuestandard->time == 'day') {
        $standardday = $valuestandard->parameter;
      } else if ($valuestandard->time == 'night') {
        $standardnight = $valuestandard->parameter;
      }
    }
		  // dd($standardnight);
    $parameterbunyidata = ParameterBunyi::where('stesen_id',$request->id)->first();
    if ($parameterbunyidata) {
     $parameterbunyidata->delete();
   }
   $parameterbunyi = new ParameterBunyi;
   $parameterbunyi->stesen_id = $request->id;
   $parameterbunyi->schedule = $request->schedule;
   $parameterbunyi->category = $category;
   $parameterbunyi->standardday = $standardday;
   $parameterbunyi->standardnight = $standardnight;
   $parameterbunyi->baselineday = $baselineday;
   $parameterbunyi->baselinenight = $baselinenight;
   $parameterbunyi->save();
 } else if ($request->schedule == 3) {
   $parameterbunyidata = ParameterBunyi::where('stesen_id',$request->id)->first();
   if ($parameterbunyidata) {
     $parameterbunyidata->delete();
   }
   $parameterbunyi = new ParameterBunyi;
   $parameterbunyi->stesen_id = $request->id;
   $parameterbunyi->schedule = $request->schedule;
   $parameterbunyi->baseline_exist_lvl = $request->existlvl;
   $parameterbunyi->baseline_new_lvl = $request->newlvl;
   $parameterbunyi->baseline_max_lvl = $request->maxlvl;
   $parameterbunyi->save();
 } else if ($request->schedule == 4) {
  if (isset($request->baselinedaynoise) == true && isset($request->baselinenightnoise) == true) {
    $category = 'noise';
    $baselineday = $request->baselinedaynoise;
    $baselinenight = $request->baselinenightnoise;
  }

  if (isset($request->baselinedaysuburrban) == true && isset($request->baselinenightsuburrban) == true) {
    $category = 'suburban';
    $baselineday = $request->baselinedaysuburrban;
    $baselinenight = $request->baselinenightsuburrban;
  }

  if (isset($request->baselinedayurban) == true && isset($request->baselinenighturban) == true) {
    $category = 'urban';
    $baselineday = $request->baselinedayurban;
    $baselinenight = $request->baselinenighturban;
  }

  if (isset($request->baselinedaycommercial) == true && isset($request->baselinenightcommercial) == true) {
    $category = 'commercial';
    $baselineday = $request->baselinedaycommercial;
    $baselinenight = $request->baselinenightcommercial;
  }

  if (isset($request->baselinedayindustrial) == true && isset($request->baselinenightindustrial) == true) {
    $category = 'industry';
    $baselineday = $request->baselinedayindustrial;
    $baselinenight = $request->baselinenightindustrial;
  }

		  // dd($category);

  $standard = MasterStandardBunyi::where('schedule',$request->schedule)->where('categori',$category)->get();
  foreach ($standard as $keystandard => $valuestandard) {
    if ($valuestandard->time == 'day') {
      $standardday = $valuestandard->parameter;
    } else if ($valuestandard->time == 'night') {
      $standardnight = $valuestandard->parameter;
    }
  }
		  // dd($standardnight);
  $parameterbunyidata = ParameterBunyi::where('stesen_id',$request->id)->first();
  if ($parameterbunyidata) {
   $parameterbunyidata->delete();
 }
 $parameterbunyi = new ParameterBunyi;
 $parameterbunyi->stesen_id = $request->id;
 $parameterbunyi->schedule = $request->schedule;
 $parameterbunyi->category = $category;
 $parameterbunyi->standardday = $standardday;
 $parameterbunyi->standardnight = $standardnight;
 $parameterbunyi->baselineday = $baselineday;
 $parameterbunyi->baselinenight = $baselinenight;
 $parameterbunyi->save();
} else if ($request->schedule == 5) {
  if (isset($request->baselinedaynoise) == true && isset($request->baselinenightnoise) == true && isset($request->baselinemaxnoise) == true) {
    $category = 'noise';
    $baselineday = $request->baselinedaynoise;
    $baselinenight = $request->baselinenightnoise;
    $baselinemax = $request->baselinemaxnoise;
  }

  if (isset($request->baselinedaysuburrban) == true && isset($request->baselinenightsuburrban) == true && isset($request->baselinemaxsuburrban) == true) {
    $category = 'suburban';
    $baselineday = $request->baselinedaysuburrban;
    $baselinenight = $request->baselinenightsuburrban;
    $baselinemax = $request->baselinemaxsuburrban;
  }

  if (isset($request->baselinedaycommercial) == true && isset($request->baselinenightcommercial) == true && isset($request->baselinemaxcommercial) == true) {
    $category = 'commercial';
    $baselineday = $request->baselinedaycommercial;
    $baselinenight = $request->baselinenightcommercial;
    $baselinemax = $request->baselinemaxcommercial;
  }

  if (isset($request->baselinedayindustrial) == true && isset($request->baselinenightindustrial) == true && isset($request->baselinemaxindustrial) == true) {
    $category = 'industry';
    $baselineday = $request->baselinedayindustrial;
    $baselinenight = $request->baselinenightindustrial;
    $baselinemax = $request->baselinemaxindustrial;
  }

  $standard = MasterStandardBunyi::where('schedule',$request->schedule)->where('categori',$category)->get();
  foreach ($standard as $keystandard => $valuestandard) {
    if ($valuestandard->time == 'day') {
      $standardday = $valuestandard->parameter;
    } else if ($valuestandard->time == 'night') {
      $standardnight = $valuestandard->parameter;
    } else if ($valuestandard->time == 'max') {
      $standardmax = $valuestandard->parameter;
    }
  }
		  // dd($standardnight);
  $parameterbunyidata = ParameterBunyi::where('stesen_id',$request->id)->first();
  if ($parameterbunyidata) {
   $parameterbunyidata->delete();
 }
 $parameterbunyi = new ParameterBunyi;
 $parameterbunyi->stesen_id = $request->id;
 $parameterbunyi->schedule = $request->schedule;
 $parameterbunyi->category = $category;
 $parameterbunyi->standardday = $standardday;
 $parameterbunyi->standardnight = $standardnight;
 $parameterbunyi->standardmax = $standardmax;
 $parameterbunyi->baselineday = $baselineday;
 $parameterbunyi->baselinenight = $baselinenight;
 $parameterbunyi->baselinemax = $baselinemax;
 $parameterbunyi->save();
} else if ($request->schedule == 6) {
          // dd('sini');
  if (isset($request->baselinedayresidentl90) == true && isset($request->baselineeveningresidentl90) == true && isset($request->baselinenightresidentl90) == true && isset($request->baselinedayresidentl10) == true && isset($request->baselineeveningresidentl10) == true && isset($request->baselinenightresidentl10) == true && isset($request->baselinedayresidentlmax) == true && isset($request->baselineeveningresidentlmax) == true && isset($request->baselinenightresidentlmax) == true) {
    $category = 'residential';
    $baselinedayl90 = $request->baselinedayresidentl90;
    $baselineeveningl90 = $request->baselineeveningresidentl90;
    $baselinenightl90 = $request->baselinenightresidentl90;
    $baselinedayl10 = $request->baselinedayresidentl10;
    $baselineeveningl10 = $request->baselineeveningresidentl10;
    $baselinenightl10 = $request->baselinenightresidentl10;
    $baselinedaylmax = $request->baselinedayresidentlmax;
    $baselineeveninglmax = $request->baselineeveningresidentlmax;
    $baselinenightlmax = $request->baselinenightresidentlmax;
  }

  if (isset($request->baselinedaycommerciall90) == true && isset($request->baselineeveningcommerciall90) == true && isset($request->baselinenightcommerciall90) == true && isset($request->baselinedaycommerciall10) == true && isset($request->baselineeveningcommerciall10) == true && isset($request->baselinenightcommerciall10) == true) {
    $category = 'commercial';
    $baselinedayl90 = $request->baselinedaycommerciall90;
    $baselineeveningl90 = $request->baselineeveningcommerciall90;
    $baselinenightl90 = $request->baselinenightcommerciall90;
    $baselinedayl10 = $request->baselinedaycommerciall10;
    $baselineeveningl10 = $request->baselineeveningcommerciall10;
    $baselinenightl10 = $request->baselinenightcommerciall10;
  }

  if (isset($request->baselinedayindustryl90) == true && isset($request->baselineeveningindustryl90) == true && isset($request->baselinenightindustryl90) == true && isset($request->baselinedayindustryl10) == true && isset($request->baselineeveningindustryl10) == true && isset($request->baselinenightindustryl10) == true) {
    $category = 'industry';
    $baselinedayl90 = $request->baselinedayindustryl90;
    $baselineeveningl90 = $request->baselineeveningindustryl90;
    $baselinenightl90 = $request->baselinenightindustryl90;
    $baselinedayl10 = $request->baselinedayindustryl10;
    $baselineeveningl10 = $request->baselineeveningindustryl10;
    $baselinenightl10 = $request->baselinenightindustryl10;
  }

  $standard = MasterStandardBunyi::where('schedule',$request->schedule)->where('categori',$category)->get();
          // dd($standard);
  foreach ($standard as $keystandard => $valuestandard) {
    if ($valuestandard->time == 'day') {
      $standard6[$valuestandard->categori][$valuestandard->noise_parameter][$valuestandard->time] = $valuestandard->parameter;
    } else if ($valuestandard->time == 'night') {
      $standard6[$valuestandard->categori][$valuestandard->noise_parameter][$valuestandard->time] = $valuestandard->parameter;
    } else if ($valuestandard->time == 'evening') {
      $standard6[$valuestandard->categori][$valuestandard->noise_parameter][$valuestandard->time] = $valuestandard->parameter;
    }
  }
  $parameterbunyidatadelete = ParameterBunyi::where('stesen_id',$request->id)->get();
  foreach ($parameterbunyidatadelete as $keyparameterbunyidatadelete => $valueparameterbunyidatadelete) {
    $valueparameterbunyidatadelete->delete();
  }
  foreach ($standard6 as $keystandard6 => $valuestandard6) {
    foreach ($valuestandard6 as $keyvaluestandard6 => $valuevaluestandard6) {
  			      // dd($keyvaluestandard6);
      if ($keyvaluestandard6 == 'L90') {
        $parameterbunyidata = ParameterBunyi::where('stesen_id',$request->id)->where('category',$category)->where('noise_parameter',$keyvaluestandard6)->first();
        if ($parameterbunyidata) {
          $parameterbunyidata->delete();
        }
        $parameterbunyi = new ParameterBunyi;
        $parameterbunyi->stesen_id = $request->id;
        $parameterbunyi->schedule = $request->schedule;
        $parameterbunyi->category = $category;
        $parameterbunyi->noise_parameter = $keyvaluestandard6;
        $parameterbunyi->standardday = $valuevaluestandard6['day'];
        $parameterbunyi->standardevening = $valuevaluestandard6['evening'];
        $parameterbunyi->standardnight = $valuevaluestandard6['night'];

        $parameterbunyi->baselineday = $baselinedayl90;
        $parameterbunyi->baselineevening = $baselineeveningl90;
        $parameterbunyi->baselinenight = $baselinenightl90;
        $parameterbunyi->save();
      }

      if($keyvaluestandard6 == 'L10'){
        $parameterbunyidata = ParameterBunyi::where('stesen_id',$request->id)->where('category',$category)->where('noise_parameter',$keyvaluestandard6)->first();
        if ($parameterbunyidata) {
          $parameterbunyidata->delete();
        }
        $parameterbunyi = new ParameterBunyi;
        $parameterbunyi->stesen_id = $request->id;
        $parameterbunyi->schedule = $request->schedule;
        $parameterbunyi->category = $category;
        $parameterbunyi->noise_parameter = $keyvaluestandard6;
        $parameterbunyi->standardday = $valuevaluestandard6['day'];
        $parameterbunyi->standardevening = $valuevaluestandard6['evening'];
        $parameterbunyi->standardnight = $valuevaluestandard6['night'];

        $parameterbunyi->baselineday = $baselinedayl10;
        $parameterbunyi->baselineevening = $baselineeveningl10;
        $parameterbunyi->baselinenight = $baselinenightl10;
        $parameterbunyi->save();
      }

      if($keyvaluestandard6 == 'Lmax'){
                // dd('sini '.$keyvaluestandard6);
        $parameterbunyidata = ParameterBunyi::where('stesen_id',$request->id)->where('category',$category)->where('noise_parameter',$keyvaluestandard6)->first();
        if ($parameterbunyidata) {
          $parameterbunyidata->delete();
        }
        $parameterbunyi = new ParameterBunyi;
        $parameterbunyi->stesen_id = $request->id;
        $parameterbunyi->schedule = $request->schedule;
        $parameterbunyi->category = $category;
        $parameterbunyi->noise_parameter = $keyvaluestandard6;
        $parameterbunyi->standardday = $valuevaluestandard6['day'];
        $parameterbunyi->standardevening = $valuevaluestandard6['evening'];
        $parameterbunyi->standardnight = $valuevaluestandard6['night'];

        $parameterbunyi->baselineday = $baselinedaylmax;
        $parameterbunyi->baselineevening = $baselineeveninglmax;
        $parameterbunyi->baselinenight = $baselinenightlmax;
        $parameterbunyi->save();
      }
    }
  }
}

        // dd($standard);
} else {
  if($request->type == 2){
    $dataparameter = PenambahanParameter::where('stesen_id','=',$request->id)->get();
  }else{
    $dataparameter = Parameter::where('stesen_id','=',$request->id)->get();
  }

  foreach ($dataparameter as $key => $dataparameters) {
   $request_stndrd_id = $request->standard_id+$dataparameters->standard;
               // dd($dataparameters->parameter.' '.$request_paramter_id);
   if($dataparameters->standard==$request_stndrd_id)
   {
                      //$update_standard = "standard".$dataparameters->parameter;
                  //dd($dataparameters->parameter);
                      // $classID = MasterStandard::where('jenis_parameter','=',$dataparameters->parameter)->first();
                      //dd($classID);
    $update_baselineeia = "baselineeia".$dataparameters->standard;
    $update_baselineemp = "baselineemp".$dataparameters->standard;
    if($request->type == 2){
      $update_parameter = PenambahanParameter::where('stesen_id','=',$request->id)->where('standard','=',$dataparameters->standard)->first();
    }else{
      $update_parameter = Parameter::where('stesen_id','=',$request->id)->where('standard','=',$dataparameters->standard)->first();
    }
                      // if($classID){
                      //     $update_parameter->standard = $classID->id;
                      // }else{
                      //     $update_parameter->standard = 0;
                      // }
    $update_parameter->baselineeia = $request->$update_baselineeia;
    $update_parameter->baselineemp = $request->$update_baselineemp;
    $update_parameter->save();
  }
}
}
      // dd('hai');
return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
}


public function buangParameter(Request $request) {
  $parameter = Parameter::findOrFail($request->id);

  if($parameter){
    $log = new LogSystem;
    $log->module_id = 26;
    $log->activity_type_id = 6;
    $log->description = "Padam Data Parameter";
    $log->data_old = json_encode($parameter);
    $log->url = $request->fullUrl();
    $log->method = strtoupper($request->method());
    $log->ip_address = $request->ip();
    $log->created_by_user_id = auth()->id();
    $log->save();
  }

  $parameter->delete();
  return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
}

public function updatemaklumataudit1(Request $request) {

  $auditdata = ProjekAudit::where('projek_id',$request->id)->get();
  $projekdetail = ProjekDetail::where('projek_id',$request->id)->first();
        // dd($request->frequent);
        // dd(count($auditdata));
        // if ($request->frequent == 2) {
        //     $plus = "+6 months";
        // } else if ($request->frequent == 3) {
        //     $plus = "+4 months";
        // } else if ($request->frequent == 4) {
        //     $plus = "+3 months";
        // } else if ($request->frequent == 5) {
        //     $plus = "+1 months";
        // }

  if ($projekdetail->jenis == 2) {
    $plus = "+6 months";
  } else if ($projekdetail->jenis == 3) {
    $plus = "+4 months";
  } else if ($projekdetail->jenis == 4) {
    $plus = "+3 months";
  } else if ($projekdetail->jenis == 5) {
    $plus = "+1 months";
  }
  $num_padded = sprintf("%02d", $request->bulan);
  $tarikh_audit = $request->tahun."-".$num_padded."-01";
  $temp = $tarikh_audit;
  foreach ($auditdata as $key => $value) {
    $audit = ProjekAudit::where('id',$value->id)->first();
             // dd($num_padded);

    if ($key == 0) {
      $temp = date("Y-m-d",strtotime($temp));
    } else {
      $temp = date("Y-m-d", strtotime($plus, strtotime($temp)));
    }
    $audit->tarikh_audit = $temp;
    $temp = $temp;
    $audit->save();
            // dd(date('m',strtotime($request->tarikh_audit)));
            // $monthlyE = MonthlyE::where('audit_id',$audit->id)->first();

            // if($monthlyE){
            //     $log = new LogSystem;
            //     $log->module_id = 26;
            //     $log->activity_type_id = 5;
            //     $log->description = "Kemaskini Data Audit";
            //     $log->data_old = json_encode($monthlyE);

            //     $monthlyE->bulan = date('m',strtotime($temp));
            //     $monthlyE->tahun = date('Y',strtotime($temp));
            //     // $monthlyE->save();

            //     $log->data_new = json_encode($monthlyE);
            //     $log->url = $request->fullUrl();
            //     $log->method = strtoupper($request->method());
            //     $log->ip_address = $request->ip();
            //     $log->created_by_user_id = auth()->id();
            //     $log->save();
            // }
  }

  return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data berjaya dikemaskini.']);
}


public function updatemaklumataudit(Request $request) {

 $audit = ProjekAudit::where('id',$request->id)->first();

 $audit->tarikh_audit = Carbon::createFromFormat('d/m/Y', $request->tarikh_audit_1);

 // $audit->tarikh_audit = date("Y-m-d", strtotime($request->tarikh_audit_1));
 // $audit->tarikh_audit = $tarikh_audit_1;

 $audit->no_rujukan = $request->no_rujukan;
 $audit->save();
// dd(date('m',strtotime($request->tarikh_audit)));
       // $monthlyE = MonthlyE::where('audit_id',$audit->id)->first();

       // if($monthlyE){
       //   $log = new LogSystem;
       //   $log->module_id = 26;
       //   $log->activity_type_id = 5;
       //   $log->description = "Kemaskini Data Audit";
       //   $log->data_old = json_encode($monthlyE);

       //   $monthlyE->bulan = date('m',strtotime($request->tarikh_audit));
       //   $monthlyE->tahun = date('Y',strtotime($request->tarikh_audit));
       //   $monthlyE->save();

       //   $log->data_new = json_encode($monthlyE);
       //   $log->url = $request->fullUrl();
       //   $log->method = strtoupper($request->method());
       //   $log->ip_address = $request->ip();
       //   $log->created_by_user_id = auth()->id();
       //   $log->save();
       // }






 return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah dikemaskini.']);
}

public function updatefasa(Request $request) {
        // dd($request->id);
 $fasa = ProjekFasa::where('id',$request->id)->first();
 $fasa->nama_fasa = $request->nama_fasa;
 $fasa->save();

 return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
}

public function updatestesen(Request $request) {
        // dd($request->hasfile('gambar_stesen'));
 $stesen = Stesen::where('id',$request->id)->first();

 if($stesen){
   $log = new LogSystem;
   $log->module_id = 26;
   $log->activity_type_id = 5;
   $log->description = "Kemaskini Data Stesen";
   $log->data_old = json_encode($stesen);
         // $log->data_new = json_encode($stesen);
   $log->url = $request->fullUrl();
   $log->method = strtoupper($request->method());
   $log->ip_address = $request->ip();
   $log->created_by_user_id = auth()->id();
   $log->save();
 }


 $stesen->stesen = $request->stesen;
 $stesen->longitud = $request->longitud;
 $stesen->latitud = $request->latitud;
        // dd($request->gambar_stesen);
 if($request->gambar_stesen && $request->file('gambar_stesen')->isValid()) {
  $file=$request->file('gambar_stesen');
  $name = $file->getClientOriginalName();
  $file->move('stesen/'.$stesen->id.'/', $name);
  $stesen->gambar_stesen= '/stesen/'.$stesen->id.'/'.$name;
} else {
  $stesen->gambar_stesen= null;
}


$stesen->save();
$class = MasterStandard::where('id','=',$request->standard)->first();
       //$value_standard = $request->standard;
$dataparameter = Parameter::where('stesen_id','=',$request->id)->get();

foreach ($dataparameter as $key => $dataparameters) {
  $request_paramter_id = $request->parameter_id+$dataparameters->parameter;
  if($dataparameters->parameter==$request_paramter_id)
  {
                //$update_standard = "standard".$dataparameters->parameter;
            //dd($dataparameters->parameter);
    $classID = MasterStandard::where('jenis_parameter','=',$dataparameters->parameter)->where('class','=',$class->class)->first();
                //dd($classID);
    $update_baseline = "baseline".$dataparameters->parameter;
    $update_parameter = Parameter::where('stesen_id','=',$request->id)->where('parameter','=',$dataparameters->parameter)->first();
    if($classID){
      $update_parameter->standard = $classID->id;
    }else{
      $update_parameter->standard = 0;
    }
    $update_parameter->baseline = $request->$update_baseline;
    $update_parameter->save();
  }
}


return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
}


public function updatestesen1(Request $request) {
        // dd($request->all());
        // dd('sinin');
  if(in_array($request->jenis_pengawasan_id,[1])){
    $validator = Validator::make($request->all(), [
      'stesen' => 'required|string',
      'longitud' => 'required|regex:/[0-9]{3}\.[0-9]{6}+$/u',
      'latitud' => 'required||regex:/[0-9]{1}\.[0-9]{6}+$/u',
      'lembangan' => 'required',
      'sungai' => 'required',
      'class' => 'required',
      'is_eia' => 'required',
      'date_eia' => 'required',
    ]);
  }
  if(in_array($request->jenis_pengawasan_id,[3])){
    $validator = Validator::make($request->all(), [
      'stesen' => 'required|string',
      'longitud' => 'required|regex:/[0-9]{3}\.[0-9]{6}+$/u',
      'latitud' => 'required||regex:/[0-9]{1}\.[0-9]{6}+$/u',
      'nama' => 'required',
      'class' => 'required',
      'is_eia' => 'required',
      'date_eia' => 'required',
    ]);
  }
  if(in_array($request->jenis_pengawasan_id,[4])){
    $validator = Validator::make($request->all(), [
      'stesen' => 'required|string',
      'longitud' => 'required||regex:/[0-9]{3}\.[0-9]{6}+$/u',
      'latitud' => 'required||regex:/[0-9]{1}\.[0-9]{6}+$/u',
      'is_eia' => 'required',
      'kategori_tanah' => 'required',
      'date_eia' => 'required',
    ]);
  }
  if(in_array($request->jenis_pengawasan_id,[8,9])){
    $validator = Validator::make($request->all(), [
      'stesen' => 'required|string',
      'longitud' => 'required||regex:/[0-9]{3}\.[0-9]{6}+$/u',
      'latitud' => 'required||regex:/[0-9]{1}\.[0-9]{6}+$/u',
      'is_eia' => 'required',
      'date_eia' => 'required',
    ]);
  }
  if(in_array($request->jenis_pengawasan_id,[5])){
    $validator = Validator::make($request->all(), [
      'stesen' => 'required|string',
      'longitud' => 'required||regex:/[0-9]{3}\.[0-9]{6}+$/u',
      'latitud' => 'required||regex:/[0-9]{1}\.[0-9]{6}+$/u',
    ]);
  }
  if(in_array($request->jenis_pengawasan_id,[6,2,7])){
    $validator = Validator::make($request->all(), [
      'stesen' => 'required|string',
      'longitud' => 'required||regex:/[0-9]{3}\.[0-9]{6}+$/u',
      'latitud' => 'required||regex:/[0-9]{1}\.[0-9]{6}+$/u',
      'class' => 'required',
      'is_eia' => 'required',
      'date_eia' => 'required',
    ]);
  }
  if ($validator->fails()) {
    return response()->json(['errors' => $validator->errors()], 422);
  }
    // dd($request->type);
  if($request->type == 2){
    $stesen = PenambahanStesen::where('id',$request->id)->first();
  }else{
    $stesen = Stesen::where('id',$request->id)->first();
  }

  if($stesen){
    $log = new LogSystem;
    $log->module_id = 26;
    $log->activity_type_id = 5;
    $log->description = "Kemaskini Data Stesen";
    $log->data_old = json_encode($stesen);
      // $log->data_new = json_encode($stesen);
    $log->url = $request->fullUrl();
    $log->method = strtoupper($request->method());
    $log->ip_address = $request->ip();
    $log->created_by_user_id = auth()->id();
    $log->save();
  }

  $stesen->stesen = $request->stesen;
  $stesen->longitud = $request->longitud;
  $stesen->latitud = $request->latitud;
     //$stesen->url_geolocator = $request->geolocatorID;
  $stesen->is_tanah = $request->is_tanah;
  $stesen->is_pembinaan = $request->is_pembinaan;
  $stesen->is_operasi = $request->is_operasi;
  $stesen->is_eia = $request->is_eia;
  $stesen->is_emp = $request->is_emp;
  $stesen->date_eia =  date("Y-m-d", strtotime($request->date_eia));

  if($request->date_emp != null){
   $stesen->date_emp =  date("Y-m-d", strtotime($request->date_emp));
 }

 if($request->kategori_tanah){
  $stesen->kategori_tanah = $request->kategori_tanah;
}

if($request->prima_sekunder == 1){
  $stesen->is_sekunder = 0;
  $stesen->is_prima = 1;    
}

if($request->prima_sekunder == 2){
  $stesen->is_sekunder = 1;
  $stesen->is_prima = 0;
}

    //  if($request->is_prima){
    //     $stesen->is_prima = 1;
    //  }

    //  if(!$request->is_prima){
    //     $stesen->is_prima = 0;
    //  }

    //  if($request->is_sekunder){
    //     $stesen->is_sekunder = 1;
    //  }

    //  if(!$request->is_sekunder){
    //     $stesen->is_sekunder = 0;
    //  }

if(in_array($request->jenis_pengawasan_id,[1])){
 $stesen->lembangan = $request->lembangan;
 $stesen->sungai = $request->sungai;
}
$stesen->nama = $request->nama;
$class_lama = $stesen->class;
$stesen->class = $request->class;

if($request->gambar_stesen && $request->file('gambar_stesen')->isValid()) {
  $file=$request->file('gambar_stesen');
  $name = $file->getClientOriginalName();
  $file->move('stesen/'.$stesen->id.'/', $name);
  $stesen->gambar_stesen= '/stesen/'.$stesen->id.'/'.$name;
} else {
  if ($request->picture_removed == 1) {
    $stesen->gambar_stesen= null;
  }
}


if($stesen->save()){

  if(!auth()->user()->hasRole('staff')){
                // UNTUK SUNGAI, TASIK, UDARA
    if(in_array($stesen->jenis_pengawasan_id,[1,3,6])){

      $this->data['masterstandard'] = $masterstandard = \App\MasterModel\MasterStandard::select(['id','class','jenis_parameter'])->where('class',$stesen->class)->get();

      $jenisparameter = array();
      foreach ($masterstandard as $key => $value) {
        $jenisparameter[] = $value->jenis_parameter;
      }

      $this->data['masterparameter'] = $masterparameter = MasterParameter::whereIn('id',$jenisparameter)->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->get();

                    // KALAU CURRENT KELAS TAK SAMA DENGAN KELAS BARU
      if($class_lama != $request->class){
        $parameter = Parameter::where('stesen_id',$stesen->id)->delete();
        foreach ($masterparameter as $key => $valueparameter) {

          $this->data['masterstandardID'] = $masterstandardID = \App\MasterModel\MasterStandard::where('class',$stesen->class)->where('jenis_parameter',$valueparameter->id)->first();

          if($request->type == 2){
            $parameter = new PenambahanParameter();
          }else{
            $parameter = new Parameter();
          }
          $parameter->stesen_id = $stesen->id;
          $parameter->parameter = $valueparameter->id;
          $parameter->standard = $masterstandardID->id;
          $parameter->baselineeia = NULL;
          $parameter->baselineemp = NULL;
          $parameter->mode = $valueparameter->mode;
          $parameter->save();
        }
      }else{
      }
    }
            // KALAU MARIN
    if(in_array($stesen->jenis_pengawasan_id,[2])){

      if($stesen->versi==1){
        $versi = 'lama';
      }else{
        $versi = 'baru';
      }
      $this->data['masterstandard'] = $masterstandard = \App\MasterModel\MasterStandard::select(['id','class','jenis_parameter'])->where('class','=',$stesen->class)->get();

      $jenisparameter = array();
      foreach ($masterstandard as $key => $value) {
        $jenisparameter[] = $value->jenis_parameter;
      }

      $this->data['masterparameter'] = $masterparameter = MasterParameter::whereIn('id',$jenisparameter)->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->where('versi',$versi)->get();

                // KALAU CURRENT KELAS TAK SAMA DENGAN KELAS BARU
      if($class_lama != $request->class){
        if($request->type == 2){
          $parameter = PenambahanParameter::where('stesen_id',$stesen->id)->delete();
        }else{
          $parameter = Parameter::where('stesen_id',$stesen->id)->delete();
        }
        foreach ($masterparameter as $key => $valueparameter) {
                        // dd($stesen->class);
          $this->data['masterstandardID'] = $masterstandardID = \App\MasterModel\MasterStandard::where('class','=',$stesen->class)->where('jenis_parameter',$valueparameter->id)->first();
          if($request->type == 2){
            $parameter = new PenambahanParameter();
          }else{
            $parameter = new Parameter();
          }
          $parameter->stesen_id = $stesen->id;
          $parameter->parameter = $valueparameter->id;
          $parameter->standard = $masterstandardID->id;
          $parameter->baselineeia = NULL;
          $parameter->baselineemp = NULL;
          $parameter->mode = $valueparameter->mode;
          $parameter->save();
        }
      }else{
      }

                // KALAU PILIHAN STANDARD 2 iaitu SELEPAS TAHUN 2019
      if(in_array($stesen->versi,[2])){

                // untuk versi 2 standard RACUN PEROSAK adalah WAJIB
                // $masterparameterRacunPerosak = MasterParameter::with('getstandard')->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->whereNotIn('getstandard.class',['1','2','3','E1','E2','E3'])->get();

                    // $masterparameterRacunPerosak = MasterParameter::with('getstandard')->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->where('versi','=','baru')->whereHas('getstandard', function($class) {
                    //     return $class->whereNotIn('class',['1','2','3','E1','E2','E3']);
                    // })->get();

                    // foreach ($masterparameterRacunPerosak as $key => $valueparameterRacunPerosak) {
                    //     // dd($valueparameterRacunPerosak);
                    //     $masterstandardRP = \App\MasterModel\MasterStandard::where('jenis_parameter',$valueparameterRacunPerosak->id)->where('class',$stesen->class)->first();
                    //     if ($masterstandardRP) {

                    // // KALAU PARAMETER RACUN PEROSAK DAH ADA, TAK PERLU CREATE
                    //     if($request->type == 2){
                    //       $parameterRacunPerosak = PenambahanParameter::where('stesen_id',$stesen->id)->where('parameter',$valueparameterRacunPerosak->id)->where('standard',$masterstandardRP->id)->first();
                    //     }else{
                    //       $parameterRacunPerosak = Parameter::where('stesen_id',$stesen->id)->where('parameter',$valueparameterRacunPerosak->id)->where('standard',$masterstandardRP->id)->first();

                    //     }

                    //     if(!$parameterRacunPerosak){
                    //         if($request->type == 2){
                    //           $parameter = new PenambahanParameter();
                    //         }else{
                    //           $parameter = new Parameter();
                    //         }
                    //         $parameter->stesen_id = $stesen->id;
                    //         $parameter->parameter = $valueparameterRacunPerosak->id;
                    //         $parameter->standard = $masterstandardRP->id;
                    //         $parameter->baselineeia = NULL;
                    //         $parameter->baselineemp = NULL;
                    //         $parameter->mode = $valueparameterRacunPerosak->mode;
                    //         $parameter->save();
                    //     }
                    //     }
                    // }

                    // KALAU ADA SENTUHAN PRIMA add PARAMETER SENTUHAN PRIMA
        if($request->is_prima==1){
                        // dd(1);
          $this->data['masterstandardPrima'] = $masterstandardPrima = \App\MasterModel\MasterStandard::select(['id','class','jenis_parameter'])->where('class','Sentuhan Prima')->get();

          $jenisparameter = array();
          foreach ($masterstandardPrima as $key => $valuePrima) {
            $jenisparameterPrima[] = $valuePrima->jenis_parameter;
          }

          $this->data['masterparameterPrima'] = $masterparameterPrima = MasterParameter::whereIn('id',$jenisparameterPrima)->where('versi','=','baru')->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->get();

          foreach ($masterparameterPrima as $key => $valueparameterPrima) {

            $masterstandardR1ID = \App\MasterModel\MasterStandard::where('class','Sentuhan Prima')->where('jenis_parameter',$valueparameterPrima->id)->first();
            if($request->type == 2){
              $parameterPrima =PenambahanParameter::where('parameter',$valueparameterPrima->id)->where('standard',$masterstandardR1ID->id)->where('stesen_id',$stesen->id)->first();
            }else{
              $parameterPrima =Parameter::where('parameter',$valueparameterPrima->id)->where('standard',$masterstandardR1ID->id)->where('stesen_id',$stesen->id)->first();
            }

                        // kalau dah ada sentuhan prima tak payah create dah
            if(!$parameterPrima){
              if($request->type == 2){
                $parameter = new PenambahanParameter();
              }else{
                $parameter = new Parameter();
              }
              $parameter->stesen_id = $stesen->id;
              $parameter->parameter = $valueparameterPrima->id;
              $parameter->standard = $masterstandardR1ID->id;
              $parameter->baselineeia = NULL;
              $parameter->baselineemp = NULL;
              $parameter->mode = $valueparameterPrima->mode;
              $parameter->save();
            }
          }
        }

                            // dd('sinia');

                    // KALAU ADA SENTIHAN SEKUNDER add PARAMETER SENTUHAN SEKUNDER
        if($request->is_sekunder==1){
          $this->data['masterstandardSekunder'] = $masterstandardSekunder = \App\MasterModel\MasterStandard::select(['id','class','jenis_parameter'])->where('class','Sentuhan Sekunder')->get();

          $jenisparameter = array();
          foreach ($masterstandardSekunder as $key => $valueSekunder) {
            $jenisparameterSekunder[] = $valueSekunder->jenis_parameter;
          }

          $this->data['masterparameterSekunder'] = $masterparameterSekunder = MasterParameter::whereIn('id',$jenisparameterSekunder)->where('versi','=','baru')->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->get();

          foreach ($masterparameterSekunder as $key => $valueparameterSekunder) {
                        // dd(21);

                            // $parameterSekunder =Parameter::where('stesen_id',$stesen->id)->where('parameter',$valueparameterSekunder->id)->first();

            $masterstandardR2ID = \App\MasterModel\MasterStandard::where('class','Sentuhan Sekunder')->where('jenis_parameter',$valueparameterSekunder->id)->first();
            if($request->type == 2){
             $parameterSekunder =PenambahanParameter::where('parameter',$valueparameterSekunder->id)->where('standard',$masterstandardR2ID->id)->where('stesen_id',$stesen->id)->first();
           }else{
             $parameterSekunder =Parameter::where('parameter',$valueparameterSekunder->id)->where('standard',$masterstandardR2ID->id)->where('stesen_id',$stesen->id)->first();
           }
                        // kalau dah ada sentuhan sekunder tak payah create dah
           if(!$parameterSekunder){
            if($request->type == 2){
              $parameter = new PenambahanParameter();
            }else{
              $parameter = new Parameter();
            }
            $parameter->stesen_id = $stesen->id;
            $parameter->parameter = $valueparameterSekunder->id;
            $parameter->standard = $masterstandardR2ID->id;
            $parameter->baselineeia = NULL;
            $parameter->baselineemp = NULL;
            $parameter->mode = $valueparameterSekunder->mode;
            $parameter->save();
          }
        }
      }

                    // if(in_array($stesen->is_prima, ['',0])){
                    //     $this->data['masterstandardPrima'] = $masterstandardPrima = \App\MasterModel\MasterStandard::select(['id','class','jenis_parameter'])->where('class','Sentuhan Prima')->get();

                    //     $jenisparameter = array();
                    //     foreach ($masterstandardPrima as $key => $valuePrima) {
                    //         $jenisparameterPrima[] = $valuePrima->jenis_parameter;
                    //     }

                    //     $this->data['masterparameterPrima2'] = $masterparameterPrima2 = MasterParameter::whereIn('id',$jenisparameterPrima)->where('versi','=','baru')->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->get();

                    //     foreach ($masterparameterPrima2 as $key => $valueparameterPrima2) {
                    //     // dd(3);

                    //         $masterstandardR1ID2 = \App\MasterModel\MasterStandard::where('class','Sentuhan Prima')->where('jenis_parameter',$valueparameterPrima2->id)->first();
                    //         if($request->type == 2){
                    //           $parameter1 = PenambahanParameter::where('parameter',$valueparameterPrima2->id)->where('stesen_id',$stesen->id)->where('standard',$masterstandardR1ID2->id)->get();
                    //         }else{
                    //           $parameter1 = Parameter::where('parameter',$valueparameterPrima2->id)->where('stesen_id',$stesen->id)->where('standard',$masterstandardR1ID2->id)->get();
                    //         }
                    //         if($parameter1){
                    //             foreach ($parameter1 as $key => $value1) {
                    //                 $value1->delete();
                    //             }
                    //         }
                    //     }


                    // }

                    // if(in_array($stesen->is_sekunder, ['',0])){
                    //     // dd(4);
                    //     $this->data['masterstandardSekunder'] = $masterstandardSekunder = \App\MasterModel\MasterStandard::select(['id','class','jenis_parameter'])->where('class','Sentuhan Sekunder')->get();

                    //     $jenisparameter = array();
                    //     foreach ($masterstandardSekunder as $key => $valueSekunder) {
                    //         $jenisparameterSekunder[] = $valueSekunder->jenis_parameter;
                    //     }

                    //     $this->data['masterparameterSekunder'] = $masterparameterSekunder2 = MasterParameter::whereIn('id',$jenisparameterSekunder)->where('versi','=','baru')->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->get();

                    //     foreach ($masterparameterSekunder2 as $key => $valueparameterSekunder2) {

                    //         $masterstandardR1ID2 = \App\MasterModel\MasterStandard::where('class','Sentuhan Sekunder')->where('jenis_parameter',$valueparameterSekunder2->id)->first();
                    //         if($request->type == 2){
                    //           $parameter2 = PenambahanParameter::where('parameter',$valueparameterSekunder2->id)->where('stesen_id',$stesen->id)->where('standard',$masterstandardR1ID2->id)->get();
                    //         }else{
                    //           $parameter2 = Parameter::where('parameter',$valueparameterSekunder2->id)->where('stesen_id',$stesen->id)->where('standard',$masterstandardR1ID2->id)->get();
                    //         }
                    //         // $parameter2 = Parameter::where('parameter',$valueparameterSekunder2->id)->first();
                    //         if($parameter2){
                    //             foreach ($parameter2 as $key => $value2) {
                    //                 $value2->delete();
                    //             }
                    //         }
                    //     }
                    // }
    }
  }
            // dd('sini');
            // dd('exit');
            // KALAU AIR TANAH
  if(in_array($stesen->jenis_pengawasan_id,[4])){
                // untuk air tanah standard air minuman shj yg digunakan
    $this->data['masterstandard'] = $masterstandard = \App\MasterModel\MasterStandard::select(['id','class','jenis_parameter'])->where('class','Air Minuman')->get();
                // $this->data['masterstandard'] = $masterstandard = \App\MasterModel\MasterStandard::select(['id','class','jenis_parameter'])->where('class','Air Minuman')->get();

    $jenisparameter = array();
    foreach ($masterstandard as $key => $value) {
      $jenisparameter[] = $value->jenis_parameter;
    }
                // dd($jenisparameter);
                // dd($stesen->jenis_pengawasan_id);
    $this->data['masterparameter'] = $masterparameter = MasterParameter::whereIn('id',$jenisparameter)->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->get();
                    // dd($masterparameter);
    foreach ($masterparameter as $key => $valueparameter) {
                // dd('sini1');

     $this->data['masterstandardID'] = $masterstandardID = \App\MasterModel\MasterStandard::where('class','Air Minuman')->where('jenis_parameter',$valueparameter->id)->first();

                       // create kalau tak ada lg parameter untuk tanah
                        // kalau dah ada akan ignore
     if($masterstandardID->id){
      if($request->type == 2){
        $parameter = PenambahanParameter::where('stesen_id',$stesen->id)->where('parameter',$valueparameter->id)->first();
      }else{
        $parameter = Parameter::where('stesen_id',$stesen->id)->where('parameter',$valueparameter->id)->first();
      }
      if(!$parameter){
       if($request->type == 2){
         $parameter = new PenambahanParameter();
       }else{
         $parameter = new Parameter();
       }
       $parameter->stesen_id = $stesen->id;
       $parameter->parameter = $valueparameter->id;
       $parameter->standard = $masterstandardID->id;
       $parameter->baselineeia = NULL;
       $parameter->baselineemp = NULL;
       $parameter->mode = $valueparameter->mode;
       $parameter->save();
     }
   }


 }
                   // die;
               // }
}
            // KALAU KAWALAN AIR LARIAN PERMUKAAN, GETARAN
if(in_array($stesen->jenis_pengawasan_id,[5,8])){

  $this->data['masterparameter'] = $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->get();
  if($request->type == 2){
    $parameter = PenambahanParameter::where('stesen_id',$stesen->id)->first();
  }else{
    $parameter = Parameter::where('stesen_id',$stesen->id)->first();
  }
            // create kalau tak ada lg parameter untuk air larian permukaan
            // kalau dah ada akan ignore
  if(!$parameter){
    foreach ($masterparameter as $key => $valueparameter) {

      $this->data['masterstandardID'] = $masterstandardID = \App\MasterModel\MasterStandard::where('jenis_parameter',$valueparameter->id)->first();
      if($masterstandardID){
        if($request->type == 2){
          $parameter = new PenambahanParameter();
        }else{
          $parameter = new Parameter();
        }
        $parameter->stesen_id = $stesen->id;
        $parameter->parameter = $valueparameter->id;
        $parameter->standard = $masterstandardID->id;
        $parameter->baselineeia = NULL;
        $parameter->baselineemp = NULL;
        $parameter->mode = $valueparameter->mode;
        $parameter->save();
      }

    }
  }
}
        // KALAU BUNYI
if(in_array($stesen->jenis_pengawasan_id,[7])){

  $this->data['masterparameter'] = $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->where('schedule', 'LIKE', '%'.$stesen->class.'%')->get();

  $parameterID = array();
  foreach ($masterparameter as $key => $value) {
    $parameterID[] = $value->id;
  }

  $this->data['masterstandard'] = $masterstandard = MasterStandard::whereIn('jenis_parameter',$parameterID)->get();

            // $parameter = Parameter::where('stesen_id',$stesen->id)->first();
            // create kalau tak ada lg parameter untuk tanah
            // kalau dah ada akan ignore
            // if(!$parameter){
  foreach ($masterstandard as $key => $valuestandard) {

                     // $this->data['masterstandardID'] = $masterstandardID = \App\MasterModel\MasterParameter::where('id', 'LIKE', '%Air Minuman%')->where('jenis_parameter',$valueparameter->id)->first();
    if($request->type == 2){
      $parameter = new PenambahanParameter();
    }else{
      $parameter = new ParameterBunyi();
    }
    $parameter->stesen_id = $stesen->id;
    if (preg_match('/Schedule 1/',$stesen->class) == 1) {
      $schedule = 1;
    }
    if (preg_match('/Schedule 2/',$stesen->class) == 1) {
      $schedule = 2;
    }
    if (preg_match('/Schedule 3/',$stesen->class) == 1) {
      $schedule = 3;
    }
    if (preg_match('/Schedule 4/',$stesen->class) == 1) {
      $schedule = 4;
    }
    if (preg_match('/Schedule 5/',$stesen->class) == 1) {
      $schedule = 5;
    }
    if (preg_match('/Schedule 6/',$stesen->class) == 1) {
      $schedule = 6;
    }
    $parameter->schedule = $schedule;
                // $parameter->standard = $valuestandard->id;
                // $parameter->baselineeia = NULL;
                // $parameter->baselineemp = NULL;
                // $parameter->mode = $valuestandard->getparameter->mode;
    $parambunyi = ParameterBunyi::where('stesen_id',$stesen->id)->first();
    if($parambunyi){
      if ($parambunyi->schedule == $schedule) {
      } else {
        $parambunyi->schedule = $schedule;
        $parambunyi->save();
      }
    } else {
      $parameter->save();
    }
  }
            // }
}
}
}



    //    $standard = MasterStandard::where('class','=',$class->class)->get();

    //    foreach ($standard as $key => $mendatory) {
    //     $new_parameter = new Parameter;
    //     $new_parameter->stesen_id = $request->id;
    //     $new_parameter->parameter = $mendatory->id;
    //     $new_parameter->mode = 'mandatory';
    //     $new_parameter->save();
    // }
       // $value_standard = $request->standard;
       // $dataparameter = Parameter::where('stesen_id','=',$request->id)->get();

       // foreach ($dataparameter as $key => $dataparameters) {
       //  $request_paramter_id = $request->parameter_id+$dataparameters->parameter;
       //      if($dataparameters->parameter==$request_paramter_id)
       //     {
       //          //$update_standard = "standard".$dataparameters->parameter;
       //      //dd($dataparameters->parameter);
       //          $classID = MasterStandard::where('jenis_parameter','=',$dataparameters->parameter)->where('class','=',$class->class)->first();
       //          //dd($classID);
       //          $update_baseline = "baseline".$dataparameters->parameter;
       //          $update_parameter = Parameter::where('stesen_id','=',$request->id)->where('parameter','=',$dataparameters->parameter)->first();
       //          if($classID){
       //              $update_parameter->standard = $classID->id;
       //          }else{
       //              $update_parameter->standard = 0;
       //          }
       //          $update_parameter->baseline = $request->$update_baseline;
       //          $update_parameter->save();
       //     }
       // }


       // if($request->jenis_pengawasan_id==1){
       //      $class = MasterStandard::where('id','=',$request->standard)->get();
       //      // dd($class);
       // }


return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
}

public function getEMP(Request $request) {

  if(Auth::user()->hasRole('pp')){
    $user = auth()->id();

    $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id',$user)->first();
  }else{

    $projek = Projek::where('id',$request->id)->first();
  }

  if ($projek){
    if($request->ajax()) {
                // $emp = ProjekEMP::leftJoin('projek_has_user', 'projek_emp.projek_id', '=', 'projek_has_user.id')->get();
     $emp = ProjekEMP::where('projek_id',$request->id)->get();
     return datatables()->of($emp)
     ->editColumn('laporan', function ($emp) {
      if($emp->laporan){
        return strtoupper($emp->laporan);
      }
      else{
        return '-';
      }

    })
     ->editColumn('tarikh_kelulusan', function ($emp) {
      $tarikh_kelulusan = "";
      if($emp->tarikh_kelulusan)
        $tarikh_kelulusan .= date("d/m/Y",strtotime($emp->tarikh_kelulusan));
      return strtoupper($tarikh_kelulusan);
    })
     ->editColumn('jururunding', function ($emp) {
      $empJuru = "";
      if($emp->jururunding)
        $empJuru .= $emp->jururunding;
      return strtoupper($empJuru);
    })
     ->editColumn('no_rujukan', function ($emp) {
      $empJuru = "";
      if($emp->No_Rujukan)
        $empJuru .= $emp->No_Rujukan;
      return strtoupper($empJuru);
    })
     ->editColumn('action', function ($emp) {
      $button = "";
                        // $button .= '<a onclick="edit('.$emp->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
      $button .= '<a onclick="removeEmp('.$emp->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Padam</a>';
      return $button;
    })
     ->make(true);
   }
 }
 return view('projek.daftar_projek');
}

public function LDP2M2(Request $request) {
  $user = auth()->id();
  $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id',$user)->first();
  $projek_id = $projek->projek_id;

  $ldp2m2 = new ProjekLDP2M2();
  $ldp2m2->projek_id = $projek_id;

  $date1 = strtr($request->tarikh_kelulusan, '/', '-');
  $tarikh_kelulusan = date("Y-m-d",strtotime($date1));
  $ldp2m2->tarikh_kelulusan = $tarikh_kelulusan;

  $ldp2m2->no_plan_diluluskan = $request->no_plan_diluluskan;
  $ldp2m2->nama = $request->nama;

  if($request->hasfile('dokumen')) {
    $file=$request->file('dokumen');
    $name = $file->getClientOriginalName();
    $file->move('ldp2m2/'.$ldp2m2->id.'dokumen/', $name);
    $ldp2m2->dokumen= '/ldp2m2/'.$ldp2m2->id.'dokumen/'.$name;
  }

  $ldp2m2->save();

  return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data baru berjaya ditambah.']);
}

public function getLDP2M2(Request $request) {

  if(Auth::user()->hasRole('pp')){
    $user = auth()->id();

    $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id',$user)->first();
  }else{

    $projek = Projek::where('id',$request->id)->first();
  }

  if ($projek){
    if($request->ajax()) {
                // $ldp2m2 = ProjekLDP2M2::leftJoin('projek_has_user', 'projek_ldp2m2.projek_id', '=', 'projek_has_user.id')->get();
      $ldp2m2 = ProjekLDP2M2::where('projek_id',$request->id)->get();
      return datatables()->of($ldp2m2)
      ->editColumn('nama', function ($ldp2m2) {
        $ldpnama = "";
        if($ldp2m2->nama)
          $ldpnama .= $ldp2m2->nama;
        return strtoupper($ldpnama);
      })
      ->editColumn('tarikh_kelulusan', function ($ldp2m2) {
        $tarikh_kelulusan ="";
        if($ldp2m2->tarikh_kelulusan)
          $tarikh_kelulusan .= date("d/m/Y",strtotime($ldp2m2->tarikh_kelulusan));
        return strtoupper($tarikh_kelulusan);
      })
      ->editColumn('no_plan_diluluskan', function ($ldp2m2) {
        $noPlan = "";
        if($ldp2m2->no_plan_diluluskan)
         $noPlan .= $ldp2m2->no_plan_diluluskan;
       return  strtoupper($noPlan);
     })
      ->editColumn('dokumen', function ($ldp2m2) {
        $ldpDoc = "-";
        if($ldp2m2->dokumen){
          $ldpDoc = '<a href="'.asset('/').$ldp2m2->dokumen.'" target="_blank" style="margin-left: 4%;"><i class="fa fa-file-pdf-o fa-2x"></i></a>';
        }
        return $ldpDoc;
      })
      ->editColumn('action', function ($ldp2m2) {
        $button = "";
                        // $button .= '<a onclick="edit('.$ldp2m2->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
        $button .= '<a onclick="removeLDP('.$ldp2m2->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Padam</a>';
        return $button;
      })
      ->make(true);
    }
  }
  return view('projek.daftar_projek');
}

public function buangLDP2M2(Request $request) {
  $projekLDP2M2 = ProjekLDP2M2::findOrFail($request->id);
  $projekLDP2M2->delete();
  return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
}


public function catatan(Request $request){
  $this->data['projek'] = $projek = Projek::where('id',$request->id)->first();

  $log = new LogSystem;
  $log->module_id = 26;
  $log->activity_type_id = 2;
  $log->description = "Lihat Maklumat Catatan";
  $log->url = $request->fullUrl();
  $log->method = strtoupper($request->method());
  $log->ip_address = $request->ip();
  $log->created_by_user_id = auth()->id();
  $log->save();

  return view('projek.catatan',$this->data);
}

public function kuiriview(Request $request){
  $projek = Projek::where('id',$request->id);

  $this->data['master_bulan'] = MasterMonth::all();
  $years = array_combine(range(date("Y"), 2000), range(date("Y"), 2000));
  $this->data['master_tahun'] = $years;

  $this->data['kuiria'] =  PengurusanKuiri::leftJoin('monthly_a','pengurusan_kuiri.filing_id','monthly_a.id')->where('pengurusan_kuiri.projek_id',$request->id)->where('pengurusan_kuiri.filing_type','eia118')->where('monthly_a.bulan',$request->bulan)->where('monthly_a.tahun',$request->tahun);

  $this->data['kuirib'] =  PengurusanKuiri::leftJoin('monthly_b','pengurusan_kuiri.filing_id','monthly_b.id')->where('pengurusan_kuiri.projek_id',$request->id)->where('pengurusan_kuiri.filing_type','like','%eia218%')->where('monthly_b.bulan',$request->bulan)->where('monthly_b.tahun',$request->tahun);

  $this->data['kuiric'] =  PengurusanKuiri::leftJoin('monthly_c','pengurusan_kuiri.filing_id','monthly_c.id')->where('pengurusan_kuiri.projek_id',$request->id)->where('pengurusan_kuiri.filing_type','like','%emr%')->where('monthly_c.bulan',$request->bulan)->where('monthly_c.tahun',$request->tahun);

  $this->data['kuirid'] =  PengurusanKuiri::leftJoin('monthly_d','pengurusan_kuiri.filing_id','monthly_d.id')->where('pengurusan_kuiri.projek_id',$request->id)->where('pengurusan_kuiri.filing_type','like','%bmps%')->where('monthly_d.bulan',$request->bulan)->where('monthly_d.tahun',$request->tahun);

  $this->data['kuirie'] =  PengurusanKuiri::leftJoin('monthly_e','pengurusan_kuiri.filing_id','monthly_e.id')->where('pengurusan_kuiri.projek_id',$request->id)->where('pengurusan_kuiri.filing_type','audit')->where('monthly_e.bulan',sprintf("%02d", $request->bulan))->where('monthly_e.tahun',$request->tahun);

  $this->data['kuirif'] =  PengurusanKuiri::leftJoin('monthly_f','pengurusan_kuiri.filing_id','monthly_f.id')->where('pengurusan_kuiri.projek_id',$request->id)->where('pengurusan_kuiri.filing_type','emt')->where('monthly_f.bulan',$request->bulan)->where('monthly_f.tahun',$request->tahun);

  return view('kuiri.kuiriviewpp',$this->data);
}

public function daftar_projek(){
  return view('projek.daftar_penggerak_projek');
}

public function daftar_projek_process(Request $request){

  $distribution = \App\Distribution::where('no_fail_jas',$request->no_fail_JAS)->first();
  $projekcheck = \App\Projek::where('no_fail_jas',$request->no_fail_JAS)->first();

  $rules = [
    'name' => 'required|string|max:191',
    'email' => 'required|string|email|max:191',
    'username' => 'required|string|max:150',
  ];

  $rules['name'] = 'required|string';
  if (!$projekcheck) {
    $rules['pakej_pengawasan_id'] = 'required';
  }
  $validator = Validator::make($request->all(), $rules);

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

        // $entity = UserPP::create([
        //     'name' => $request->name,
        //     'register_at' => Carbon::parse(Carbon::now())->format('d/m/Y'),
        // ]);

  $entity = UserPP::firstOrCreate(['username' => $request->username]);
  $entity->username = $request->username;
  $entity->name = $request->name;
  $entity->register_at = now();
  $entity->save();

        // Mail::to($distribution->assignstaff->email)->send(new PengesahanPenggunaPP($request->no_fail_JAS, 'Pengesahan Pengguna Luar - PP'));

        // $user = $entity->user()->create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'username' => $request->username,
        //     'user_type_id' => 3,
        //     'user_status_id' => 5,
        //     'password' => $this->generateRandomString(),
        // ])->assignRole(['pp'])->assignRole(['ex']);

  $user = User::firstOrCreate(['username' => $request->username]);
  $user->username = $request->username;
  $user->name = $request->name;
  $user->email = $request->email;
  $user->user_type_id = 3;
  $user->save();

  if ($user->wasRecentlyCreated)
  {
    $user->password = $this->generateRandomString();
    $user->user_status_id = 5;
    $user->save();
  }

  $user->assignRole(['pp'])->assignRole(['ex']);

  $today =  Carbon::parse(Carbon::now())->format('d/m/Y');
  Inbox::create([
    'subject' => 'Pengesahan Pengguna Luar - PP',
    'message' => 'Anda telah ditugaskan untuk sah kan pengguna PP. <br /> Tarikh Agihan Tugasan Melalui Sistem : '.$today,
              'sender_user_id' => $user->id, //admin
              'receiver_user_id' => Distribution::where('no_fail_jas',$request->no_fail_JAS)->first()->assigned_to_user_id,
              'inbox_status_id' => 2,
            ]);

  if ($projekcheck) {
    $ProjekHasUser = new ProjekHasUser();
    $ProjekHasUser->user_id = $user->id;
    $ProjekHasUser->projek_id = $projekcheck->id;
    $ProjekHasUser->user_flag = 0;
    $ProjekHasUser->save();

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

      $jenispengawasan = new JenisPengawasan();
      $jenispengawasan->projek_id =  $projek->id;
      $jenispengawasan->jenis_pengawasan_id = json_encode($request->pakej_pengawasan_id);
      $jenispengawasan->save();

      $today =  Carbon::parse(Carbon::now())->format('d/m/Y');


    }

  }

  return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Permohonan akan diproses dalam tempoh 5 hari bekerja. Sila semak e-mel bagi pengaktifan akaun.']);
}

public function checkExist2($id) {
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


public function registerexist(Request $request) {
  $user = User::where('username',$request->username)->first();
  $distribution = \App\Distribution::where('no_fail_jas',$request->no_fail_JAS)->first();

  Mail::to($distribution->assignstaff->email)->send(new PengesahanPenggunaPP($request->no_fail_JAS, 'Pengesahan Pengguna PP'));

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

    $jenispengawasan = new JenisPengawasan();
    $jenispengawasan->projek_id =  $projek->id;
    $jenispengawasan->jenis_pengawasan_id = json_encode($request->pakej_pengawasan_id);
    $jenispengawasan->save();

          // $ppprojek = new UserPPProjek();
          // $ppprojek->no_fail_jas =  $projek->no_fail_jas;
          // $ppprojek->user_id = $user->id;
          // $ppprojek->status = 3;
          // $ppprojek->save();

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

    Inbox::create([
      'subject' => 'Pengesahan Pengguna Luar - PP',
      'message' => 'Anda telah ditugaskan untuk sah kan pengguna PP. <br /> Tarikh Agihan Tugasan Melalui Sistem : '.$today,
                'sender_user_id' => $user->id, //admin
                'receiver_user_id' => Distribution::where('no_fail_jas',$request->no_fail_JAS)->first()->assigned_to_user_id,
                'inbox_status_id' => 2,
              ]);


  }

        // Mail::to($distribution->assignstaff->email)->send(new PengesahanPenggunaPP($request->no_fail_JAS, 'Pengesahan Pengguna PP'));

  return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Permohonan akan diproses dalam masa 3 hari bekerja. Sila semak e-mel bagi penambahan no. fail JAS.']);
}

public function generateRandomString($length = 10) {
  return bcrypt(substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length));
}

public function senaraiProjek(){
  return view('form.senaraiProjek');
}
public function pendaftaranProjek(Request $request)
{
  $userPP = null;
  $projek = null;
  $projekDetail = null;
  $xxx = null;
  
  $projekID = $request->projekID;
  $userPP = ProjekHasPp::where('projek_id', $projekID)->where('role_id', 4)->first();
  $projek = Projek::where('id', $projekID)->first();
  if($projek)
  {
    $projekDetail = $projek->projekdetail;
    $jasFail = $projek->jasfail;
    if($jasFail)
    {
      $jasDetail = $jasFail->jasdetail;
    }
  }

  return view('form.pendaftaranProjek', compact('projek', 'userPP', 'projekDetail'));
}
public function senarai_projek(Request $request)
{
  $projectHasPP = ProjekHasPp::query();
  $projectHasPP->where('user_id', Auth::user()->id);

  $masterpengawasans = MasterPengawasan::get();

    if($request->ajax()) {

    $projectHasPP = ProjekHasPp::query();
    $projectHasPP->where('user_id', Auth::user()->id);

    return datatables()->of($projectHasPP->get())
    ->editColumn('ahliProjek', function ($projectHasPP) {
        $projek = Projek::where('id',$projectHasPP->projek_id)->first();
        $projekStatus = $projek ? $projek->status : '-';

        return '<button type="button" class="dt-button buttons-html5 btn btn-default btn-xs m-t-5" onclick="ahliProjekModal('.$projectHasPP->projek_id.', '.$projekStatus.')">
      <i class="fa fa-user-plus text-success"></i> Ahli Projek
      </button>';
    })
    ->editColumn('no_fail_jas', function ($projectHasPP) {
        $projek = Projek::where('id',$projectHasPP->projek_id)->first();
        $no_fail = $projek ? $projek->no_fail_jas : '-';
        return $no_fail;
    })
    ->editColumn('nama_projek', function ($projectHasPP) {
        $projek = Projek::where('id',$projectHasPP->projek_id)->first();
        $nama = $projek ? $projek->nama_projek : '-';
        return '<span class="ow" >'.$nama.'</span>';
    })
    ->editColumn('status_laporan', function ($projectHasPP) {
      return "-";
    })
    ->editColumn('status_projek', function ($projectHasPP) {
      $statusText = $projectHasPP->projek ? $projectHasPP->projek->statusid ? $projectHasPP->projek->statusid->ext_text : '' : '';
      $statusBadge = $projectHasPP->projek ? $projectHasPP->projek->statusid ? $projectHasPP->projek->statusid->badge : '' : '';

      return "<span class='badge ".$statusBadge."'> ".$statusText." </span>";
    })
    ->editColumn('action', function ($projectHasPP) {

      $button = "";

      $projek = $projectHasPP->projek;

      if(in_array($projek->status, [209, 210]))
      {
        $url = url('/projek/pendaftaranprojek/'.$projek->id);

        $button .= '<a href="'.$url.'" class="dt-button  btn btn-default btn-sm m-t-10"> <i class="far fa-eye text-info"></i> Pendaftaran Projek&nbsp; </a>';
      }

      // $button .= '<button type="button" class="dt-button  btn btn-default btn-sm m-t-10" data-toggle="modal" data-target="#" >
      // <i class="far fa-eye text-info"></i> Laporan Bulanan&nbsp;
      // </button>';

      // $button .= '<button type="button" class="dt-button  btn btn-default btn-sm m-t-10" data-toggle="modal" data-target="#" >
      // <i class="far fa-eye text-info"></i> Laporan Bulanan&nbsp;
      // </button>';

      // $button .= '<button type="button" class="dt-button  btn btn-default btn-sm m-t-10" data-toggle="modal" data-target="#" >
      // <i class="far fa-eye text-info"></i> Laporan Bulanan&nbsp;
      // </button>';

      return $button;
    })
    ->make(true);
  }

  $masterpengawasans = MasterPengawasan::get();
  $states = MasterState::get();
  $districts = MasterDistrict::get();

  return view('projek.senarai_projek', compact('masterpengawasans', 'states', 'districts'));
}

public function senarai_ahli(Request $request)
{
  $projekHasUsers = ProjekHasUser::where('projek_id', $request->projekID)->orderBy('role_id')->get();
  return view('form-backup.senaraiAhliProjek', compact('projekHasUsers'));
}

public function projek_fasa(Request $request)
{
  $projekFasas = ProjekFasa::where('projek_id', $request->projekID)->get();
  return view('projek.projek_fasa', compact('projekFasas'));
}


public function addAudit(Request $request)
{
  // dd($request->all());
  $projectID = $request->projectID;
  $jenis = $request->jenis;

  $tarikh_audit = Carbon::createFromFormat('d/m/Y', $request->tarikh_audit);

  ProjekAudit::where('projek_id', $projectID)->delete();
  $loopCount = $jenis;

  if($jenis == 5)
  {
    $loopCount = 12;
  }

  for($i = 0; $i < $loopCount; $i++)
  { 
    $projekAudit = new ProjekAudit;
    $projekAudit->projek_id = $projectID;
    $projekAudit->kekerapan_audit = $jenis;
    $projekAudit->status_kemajuan = $request->peringkatPengawasan;

    if($i == 0)
    {
      $projekAudit->tarikh_audit = $tarikh_audit;
    }

    $projekAudit->save();
  }

  return response()->json($request->all());

}

public function projekFasa(Request $request)
{
    // dd($request->all());
  $projek_id = $request->projek_id;
  $jenis_projek = $request->jenis_projek;
  $pengawasan = $request->pengawasan;
  $pengawasan = explode(',', $pengawasan);

    // tidak berfasa
  if($jenis_projek == 1)
  {
    $phaseCount = ProjekFasa::where('projek_id', $projek_id)->count();
    if($phaseCount > 1)
    {
        // ProjekFasa::where('projek_id', $projek_id)->delete();
        // tambah cleanup pakej_has_pengawasan
    }

    $phase = ProjekFasa::firstOrCreate(['projek_id' => $projek_id]);
    $phase->nama_pakej = "Tidak Berpakej / Tidak Berfasa";
    $phase->save();

      // PakejHasPengawasan::where('pakej_id', $phase->id)->delete();

    for ($i = 0; $i < count($pengawasan); $i++)
    { 
      $pakejPengawasan = PakejHasPengawasan::firstOrCreate(['pakej_id' => $phase->id, 'pengawasan_id' => $pengawasan[$i]]);
      $pakejPengawasan->status = 1;
      $pakejPengawasan->save();
    }
  }
  else if($jenis_projek == 2)
  {
      // ProjekFasa::where('projek_id', $projek_id)->delete();
      // tambah cleanup pakej_has_pengawasan

      // $phase1 = ProjekFasa::create(['projek_id' => $projek_id]);
      // $phase1->nama_pakej = "Fasa 1";
      // $phase1->save();

      // $phase2 = ProjekFasa::create(['projek_id' => $projek_id]);
      // $phase2->nama_pakej = "Fasa 2";
      // $phase2->save();

  }

  return response()->json($request->all());
} 

public function editFasa(Request $request)
{

  $phase = ProjekFasa::where('id', $request->fasaID)->first();
  $pengawasanArr = PakejHasPengawasan::where('pakej_id', $phase->id)->get()->pluck('pengawasan_id')->toArray();
  $PakejHasPengawasan=MasterPengawasan::join('pakej_has_pengawasan','pakej_has_pengawasan.pengawasan_id','=','master_pengawasan.id')
  ->join('projek_fasa','projek_fasa.id','=','pakej_has_pengawasan.pakej_id')
  ->select('master_pengawasan.jenis_pengawasan','pakej_has_pengawasan.id as pengawasan_id','pakej_has_pengawasan.pakej_id')
  ->where('projek_fasa.projek_id',$phase->projek_id)->where('projek_fasa.id',$phase->id)->get();
 

  $userEOs = ProjekHasUser::where('projek_id', $phase->projek_id)->where('role_id', 5)->where('status', 5)->get();
  $userEMCs = ProjekHasUser::where('projek_id', $phase->projek_id)->where('role_id', 6)->where('status', 5)->get();

  $states = MasterState::get();
  $Pengawasan = MasterPengawasan::get();

  return view('projek.editfasa', compact('phase', 'states', 'Pengawasan', 'PakejHasPengawasan', 'pengawasanArr', 'userEOs', 'userEMCs'));
}

    public function editFasaSubmit(Request $request)
    {
      $phase = ProjekFasa::where('id', $request->fasaID)->first();
      $phase->nama_pakej = $request->nama_pakej;
      $phase->kontraktor = $request->nama_kontraktor;
      $phase->pakej_negeri = $request->negeri;
      $phase->alamat = $request->alamat;
      $phase->alamat1 = $request->alamat1;
      $phase->alamat2 = $request->alamat2;
      $phase->tarikh_mula = $request->tarikh_mula_fasa;
      $phase->tarikh_akhir = $request->tarikh_akhir_fasa;
      $phase->save();

      return response()->json($phase);
    }
    public function saveDate(Request $request)
    {
        $projek = Projek::where('id', $request->id)->first();
        $start = str_replace("/", "-", $request->start);
        $end = str_replace("/", "-", $request->end);
        $startTime = strtotime($start);
        $endTime = strtotime($end);
        if ($startTime > $endTime) {
            return ['success' => false, 'message' => 'Start date is greater than end date'];
        }

        $endDate = date('Y-m-d H:i:s', $endTime);
        $startDate = date('Y-m-d H:i:s', $startTime);
        $projek->tarikh_awal = $startDate;
        $projek->tarikh_akhir = $endDate;
        if ($projek->save()) {
            return ['success' => true, 'message' => 'successfully updated', 'data' => $projek];
        }
    }
}
