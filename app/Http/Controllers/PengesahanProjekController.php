<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Projek;
use App\ProjekDetail;
use App\LogModel\LogSystem;
use App\MasterModel\MasterState;
use App\ProjekHasUser;
use App\User;
use App\OtherModel\Inbox;
use App\MasterModel\MasterProjectActivity;
use App\MasterModel\MasterPematuhanEia;
use App\MasterModel\MasterJenisProjek;
use App\ProjekPakej;
use App\MasterModel\MasterPeringkatPengawasan;
use App\MasterModel\MasterTempohAudit;
use App\MasterModel\MasterPengawasan;
use App\Stesen;
use App\ProjekAudit;
use App\ProjekEMP;
use App\ProjekLDP2M2;
use App\Parameter;
use App\UserStaff;
use App\MasterModel\MasterStandard;
use App\MasterModel\MasterMonth;
use App\ProjekPengawasanLaporan;
use App\MasterModel\MasterParameter;
use Mail;
use App\Mail\Pegawai\PengesahanProjek;
use App\OtherModel\Notification;
use Adldap\Laravel\Facades\Adldap;
use App\ProjekFasa;
use App\Distribution;
use App\JasFailDetailAktiviti;
use App\MasterModel\MasterCity;
use App\MasterModel\MasterActivity;

class PengesahanProjekController extends Controller
{

  public function __construct() {
      $this->middleware('auth');
  }
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function senarai_belumsah(Request $request)
    {
        if($request->ajax()) {

                $pp_id = auth()->id();
                $pp_state = UserStaff::where('user_id','=',$pp_id)->get();
                $projekID = array();
                foreach ($pp_state as $key => $value_state) {
                      $projekSTATE[] = $value_state->state_id;
                }

                $projek = Projek::with(['projekdetail'])
                ->whereIn('status', [2])
                ->whereHas('projekdetail',function($project) use($projekSTATE)
                    {
                    return $project->whereIn('negeri', $projekSTATE);
                });
                if ($request->user_id) {
                    $projek = $projek->where('penggerak_projek',$request->user_id);
                }

                return datatables()->of($projek)
                ->editColumn('nama_projek', function ($projek) {
                    $namaProjek = "";
                    if($projek->nama_projek)
                        $namaProjek .= $projek->nama_projek;
                    return strtoupper($namaProjek);
                })
                ->editColumn('no_fail_jas', function ($projek) {
                    $data = "";
                    if ($projek->no_fail_jas)
                        $data .= $projek->no_fail_jas ." ";
                    return strtoupper($data);
                })
                ->editColumn('status', function ($projek) {
                    $status = "";
                    if($projek->status){
                        if($projek->status == 3){
                            $status = '<span class="badge badge-info">Belum Disahkan</span>';
                        } else {
                            $status = '<span class="badge badge-info">'.$projek->statusid->name.'</span>';
                        }
                    }
                    return strtoupper($status);
                })
                ->editColumn('updated_at', function ($projek) {
                    $update = "";
                    if($projek->updated_at)
                        $update .= date("d/m/Y",strtotime($projek->updated_at));
                    return $update;
                })
                ->editColumn('action', function ($projek) {
                    $button = "";
                    if($projek->status==3 || $projek->status==12)
                        // $button .= '<a href="'.route('external.projek.daftar_projek1',$projek->id).'" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i> Kemaskini</a><br>';
                    $button .= '<a href="'.route('pengesahanprojek.projek',['id'=>$projek->id,'a'=>1]).'" class="btn btn-primary btn-xs mb-1" style="width:170px;"><i class="fa fa-check-square-o mr-1"></i> Pengesahan</a><br>';
                    // $button .= '<a onclick="remove('.$projek->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Buang</a>';
                    return $button;
                })
                ->make(true);
            }
            else {
              $log = new LogSystem;
              $log->module_id = 26;
              $log->activity_type_id = 9;
              $log->description = "Buka paparan Senarai Projek - Projek Belum Sah";
              $log->url = $request->fullUrl();
              $log->method = strtoupper($request->method());
              $log->ip_address = $request->ip();
              $log->created_by_user_id = auth()->id();
              // $log->save();
          }

        return view('pengesahanprojek.belumsah');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function senarai_belumhantar(Request $request)
    {
       if($request->ajax()) {

                $pp_id = auth()->id();
                $pp_state = UserStaff::where('user_id','=',$pp_id)->get();
                $projekID = array();
                foreach ($pp_state as $key => $value_state) {
                      $projekSTATE[] = $value_state->state_id;
                }

                $projek = Projek::with(['projekdetail'])
                                ->where('status', 1)
                                ->whereHas('projekdetail',function($project) use($projekSTATE)
                                 {
                                    return $project->whereIn('negeri',$projekSTATE);
                                });

                /*$projek = Projek::with(['projekdetail'])->where('status', 1)->get();*/
                $distribute = Distribution::where('assigned_to_user_id', auth()->user()->id)->get();
                foreach ($distribute as $key => $value) {
                    $failjas1[] = $value->no_fail_jas;
                }

                if(!empty($failjas1)){
                $projek = $projek->whereIn('no_fail_jas',$failjas1);
                }else{
                  $projek = [];
                }


                return datatables()->of($projek)
                ->editColumn('nama_projek', function ($projek) {
                    $namaProjek = "";
                    if($projek->nama_projek)
                        $namaProjek .= $projek->nama_projek;
                    return $namaProjek;
                })
                ->editColumn('no_fail_jas', function ($projek) {
                    $data = "";
                    if ($projek->no_fail_jas)
                        $data .= $projek->no_fail_jas ." ";
                    return $data;
                })
                ->editColumn('status', function ($projek) {
                    $status = "";
                    if($projek->status){
                        if ($projek->status == 1) {
                            $status .= '<span class="badge badge-danger">Belum Dihantar</span>';
                        } else {
                            $status .= '<span class="badge badge-danger">'.$projek->statusid->name.'</span>';
                        }
                        
                    }
                    return $status;
                })
                ->editColumn('updated_at', function ($projek) {
                    $update = "";
                    if($projek->updated_at)
                        $update .= date("d/m/Y",strtotime($projek->updated_at));
                    return $update;
                })
                ->editColumn('action', function ($projek) {
                    $button = "";
                    $button .= '<a href="'.route('pengesahanprojek.projek',['id'=>$projek->id,'a'=>2]).'" class="btn btn-default btn-xs mb-1" style="width:170px;"><i class="fa fa-eye mr-1"></i> Lihat</a><br>';
                    return $button;
                })
                ->make(true);
            }
            
            else {
              $log = new LogSystem;
              $log->module_id = 26;
              $log->activity_type_id = 9;
              $log->description = "Buka paparan Senarai Projek - Projek Belum Hantar";
              $log->url = $request->fullUrl();
              $log->method = strtoupper($request->method());
              $log->ip_address = $request->ip();
              $log->created_by_user_id = auth()->id();
              // $log->save();
          }

        return view('pengesahanprojek.belumhantar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function senarai_sah(Request $request)
    {
        if($request->ajax()) {

                $pp_id = auth()->id();
                $pp_state = UserStaff::where('user_id','=',$pp_id)->get();
                $projekID = array();
                foreach ($pp_state as $key => $value_state) {
                      $projekSTATE[] = $value_state->state_id;
                }

                $projek = Projek::with(['projekdetail'])
                                ->where('status', 9)
                                ->whereHas('projekdetail',function($project) use($projekSTATE)
                                 {
                                    return $project->whereIn('negeri',$projekSTATE);
                                });

                if ($request->user_id) {
                    $projek = $projek->where('penggerak_projek',$request->user_id);
                }
                /*$projek = Projek::with(['projekdetail'])->where('status', 9)->get();*/

                return datatables()->of($projek)
                ->editColumn('nama_projek', function ($projek) {
                    $namaProjek = "";
                    if($projek->nama_projek)
                        $namaProjek .= $projek->nama_projek;
                    return $namaProjek;
                })
                ->editColumn('no_fail_jas', function ($projek) {
                    $data = "";
                    if ($projek->no_fail_jas)
                        $data .= $projek->no_fail_jas ." ";
                    return $data;
                })
                ->editColumn('status', function ($projek) {
                    $status = "";
                    if($projek->status)
                        $status .= '<span class="badge badge-success">'.$projek->statusid->name.'</span>';
                    return $status;
                })
                ->editColumn('updated_at', function ($projek) {
                    $update = "";
                    if($projek->tarikh_hantar)
                        $update .= date("d/m/Y",strtotime($projek->tarikh_hantar));
                    return $update;
                })
                ->editColumn('tarikh_sah', function ($projek) {
                    $update = "";
                    if($projek->tarikh_sah)
                        $update .= date("d/m/Y",strtotime($projek->tarikh_sah));
                    return $update;
                })
                ->editColumn('action', function ($projek) {
                    $button = "";
                    $button .= '<a href="'.route('pengesahanprojek.projek',['id'=>$projek->id,'a'=>3]).'" class="btn btn-default btn-xs mb-1" style="width:170px;"><i class="fa fa-eye mr-1"></i> Lihat</a><br>';
                    return $button;
                })
                ->make(true);
            }
            else {
              $log = new LogSystem;
              $log->module_id = 26;
              $log->activity_type_id = 9;
              $log->description = "Buka paparan Senarai Projek - Projek Telah Disah";
              $log->url = $request->fullUrl();
              $log->method = strtoupper($request->method());
              $log->ip_address = $request->ip();
              $log->created_by_user_id = auth()->id();
              // $log->save();
          }

        return view('pengesahanprojek.sah');
    }

    public function senarai_sahsemula(Request $request)
    {
      // // $user = Adldap::search()->users()->find('john doe');
      //
      //  // Searching for a user.
      //  $search = Adldap::search()->where('cn', '=', 'Roimah')->get();
      //  dd($search);
      //  // Authenticating against your LDAP server.
      //  if (Adldap::auth()->attempt($username, $password)) {
      //  // Passed!
      //  }
        if($request->ajax()) {

                $pp_id = auth()->id();
                $pp_state = UserStaff::where('user_id','=',$pp_id)->get();
                $projekID = array();
                foreach ($pp_state as $key => $value_state) {
                      $projekSTATE[] = $value_state->state_id;
                }

                $projek = Projek::with(['projekdetail'])
                                ->where('status', 12)
                                ->whereHas('projekdetail',function($project) use($projekSTATE)
                                 {
                                    return $project->whereIn('negeri',$projekSTATE);
                                });


                /*$projek = Projek::with(['projekdetail'])->where('status', 9)->get();*/

                return datatables()->of($projek)
                ->editColumn('nama_projek', function ($projek) {
                    $namaProjek = "";
                    if($projek->nama_projek)
                        $namaProjek .= $projek->nama_projek;
                    return $namaProjek;
                })
                ->editColumn('no_fail_jas', function ($projek) {
                    $data = "";
                    if ($projek->no_fail_jas)
                        $data .= $projek->no_fail_jas ." ";
                    return $data;
                })
                ->editColumn('status', function ($projek) {
                    $status = "";
                    if($projek->status)
                        $status .= '<span class="badge badge-success">'.$projek->statusid->name.'</span>';
                    return $status;
                })
                ->editColumn('updated_at', function ($projek) {
                    $update = "";
                    if($projek->updated_at)
                        $update .= date("d/m/Y",strtotime($projek->updated_at));
                    return $update;
                })
                ->editColumn('action', function ($projek) {
                    $button = "";
                    $button .= '<a href="'.route('pengesahanprojek.projek',['id'=>$projek->id,'a'=>12]).'" class="btn btn-default btn-xs mb-1" style="width:170px;"><i class="fa fa-eye mr-1"></i> Lihat</a><br>';
                    return $button;
                })
                ->make(true);
            }
            else {
              $log = new LogSystem;
              $log->module_id = 26;
              $log->activity_type_id = 9;
              $log->description = "Buka paparan Senarai Projek - Projek Telah Sah Semula";
              $log->url = $request->fullUrl();
              $log->method = strtoupper($request->method());
              $log->ip_address = $request->ip();
              $log->created_by_user_id = auth()->id();
              // $log->save();
          }

        return view('pengesahanprojek.sahsemula');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function senaraipelaporan(Request $request){

       $log = new LogSystem;
       $log->module_id = 6;
       $log->activity_type_id = 2;
       $log->description = "Lihat Maklumat Laporan";
       // $log->data_old = json_encode($request->input());
       // $log->data_new = json_encode($laporanSiasatan);
       $log->url = $request->fullUrl();
       $log->method = strtoupper($request->method());
       $log->ip_address = $request->ip();
       $log->created_by_user_id = auth()->id();
       $log->save();


       $user = auth()->id();

       $this->data['projekuser'] = $projekuser = ProjekPengawasanLaporan::leftJoin('projek', 'projek_pengawasan_laporan.projek_id', '=', 'projek.id')
       ->leftJoin('projek_has_user', 'projek.id', '=', 'projek_has_user.projek_id')
       ->select('*','projek_pengawasan_laporan.id as projek_pengawasan_laporan_id')
       ->where('projek_has_user.user_id',$user)->get();
       $MonthlyAarray = [];
       $MonthlyBarray = [];
       $MonthlyCarray = [];
       $MonthlyDarray = [];
       $MonthlyEarray = [];
       $MonthlyFarray = [];
       $countbulanA = 0;
       $countbulanB = 0;
       $countbulanC = 0;
       $countbulanD = 0;
       $countbulanE = 0;
       $countbulanF = 0;
       foreach($projekuser as $projekusers){
         $countbulanA = $countbulanA + 1;
         $countA = 0;
         $A = \App\MonthlyA::where('projek_id' ,$projekusers->projek_id)->where('tahun',date("Y"))->get();
         foreach($A as $MonthlyAs){
           $checkMonthlyA = \App\MonthlyA::where('id',$MonthlyAs->id)->where('old_data',Null)->first();
           if($checkMonthlyA){
             $MonthlyA123 = \App\MonthlyA::where('old_data',$checkMonthlyA->id)->first();
             if($MonthlyA123){
               $MonthlyA123 = \App\MonthlyA::where('old_data',$checkMonthlyA->id)->first();
             }else{
               $MonthlyA123 = \App\MonthlyA::where('id',$MonthlyAs->id)->where('version','eo')->first();
             }
           }else{
             $MonthlyA123 = \App\MonthlyA::where('id',$MonthlyAs->id)->where('version','eo')->first();
           }
           // return $MonthlyA->id;
           $countA = $countA + 1 ;
           $monthlya = [];
           if($countA == $countbulanA){
             array_push($monthlya, $countbulanA);
             array_push($monthlya, $MonthlyA123->id);
             array_push($monthlya, $MonthlyA123->status->name);
             array_push($MonthlyAarray, $monthlya);
           }
         }
         $countbulanB = $countbulanB + 1;
         $countB = 0;
         $B = \App\MonthlyB::where('projek_id' ,$projekusers->projek_id)->where('tahun',date("Y"))->get();
         foreach($B as $MonthlyBs){
           $checkMonthlyB = \App\MonthlyB::where('id',$MonthlyBs->id)->where('old_data',Null)->first();
           if($checkMonthlyB){
             $MonthlyB123 = \App\MonthlyB::where('old_data',$checkMonthlyB->id)->first();
             if($MonthlyB123){
               $MonthlyB123 = \App\MonthlyB::where('old_data',$checkMonthlyB->id)->first();
             }else{
               $MonthlyB123 = \App\MonthlyB::where('id',$MonthlyBs->id)->where('version','eo')->first();
             }
           }else{
             $MonthlyB123 = \App\MonthlyB::where('id',$MonthlyBs->id)->where('version','eo')->first();
           }
           // return $MonthlyA->id;
           $countB = $countB + 1 ;
           $monthlyb = [];
           if($countB == $countbulanB){
             array_push($monthlyb, $countbulanB);
             array_push($monthlyb, $MonthlyB123->id);
             array_push($monthlyb, $MonthlyB123->status->name);
             array_push($MonthlyBarray, $monthlyb);
           }
         }


         $countbulanC = $countbulanC + 1;
         $countC = 0;
         $C = \App\MonthlyC::where('projek_id' ,$projekusers->projek_id)->where('tahun',date("Y"))->get();

         foreach($C as $MonthlyCs){

           // $checkMonthlyC = \App\MonthlyC::where('id',$MonthlyCs->id)->where('old_data',Null)->first();
           // if($checkMonthlyC){
           //   $MonthlyC123 = \App\MonthlyC::where('old_data',$checkMonthlyC->id)->first();
           //   if($MonthlyC123){
           //     $MonthlyC123 = \App\MonthlyC::where('old_data',$checkMonthlyC->id)->first();
           //   }else{
           //     $MonthlyC123 = \App\MonthlyC::where('id',$MonthlyCs->id)->where('version','eo')->first();
           //   }
           // }else{
           //   $MonthlyC123 = \App\MonthlyC::where('id',$MonthlyCs->id)->where('version','eo')->first();
           // }
           // return $MonthlyA->id;
           $countC = $countC + 1 ;
           $monthlyc = [];
           if($countC == $countbulanC){
             array_push($monthlyc, $countbulanC);
             array_push($monthlyc, $MonthlyCs->id);
             array_push($monthlyc, $MonthlyCs->status->name);
             array_push($MonthlyCarray, $monthlyc);
           }
         }


         // $MonthlyC = \App\MonthlyC::where('projek_id',$projekusers->projek_id)->where('tahun',date("Y"))->first();

         $countbulanD = $countbulanD + 1;
         $countD = 0;
         $D = \App\MonthlyD::where('projek_id' ,$projekusers->projek_id)->where('tahun',date("Y"))->get();
         foreach($D as $MonthlyDs){
           $checkMonthlyD = \App\MonthlyD::where('id',$MonthlyDs->id)->where('old_data',Null)->first();
           if($checkMonthlyD){
             $MonthlyD123 = \App\MonthlyD::where('old_data',$checkMonthlyD->id)->first();
             if($MonthlyD123){
               $MonthlyD123 = \App\MonthlyD::where('old_data',$checkMonthlyD->id)->first();
             }else{
               $MonthlyD123 = \App\MonthlyD::where('id',$MonthlyDs->id)->where('version','eo')->first();
             }
           }else{
             $MonthlyD123 = \App\MonthlyD::where('id',$MonthlyDs->id)->where('version','eo')->first();
           }
           // return $MonthlyA->id;
           $countD = $countD + 1 ;
           $monthlyd = [];
           if($countD == $countbulanD){
             array_push($monthlyd, $countbulanD);
             array_push($monthlyd, $MonthlyD123->id);
             array_push($monthlyd, $MonthlyD123->status->name);
             array_push($MonthlyDarray, $monthlyd);
           }
         }

         // $checkMonthlyD = \App\MonthlyD::where('projek_id',$projekusers->projek_id)->where('tahun',date("Y"))->where('version','pp')->first();
         // if($checkMonthlyD){
         //   $MonthlyD = \App\MonthlyD::where('projek_id' ,$projekusers->projek_id)->where('tahun',date("Y"))->where('version','pp')->first();
         // }else{
         //   $MonthlyD = \App\MonthlyD::where('projek_id' ,$projekusers->projek_id)->where('tahun',date("Y"))->where('version','eo')->first();
         // }

         // $MonthlyE = \App\MonthlyE::where('projek_id',$projekusers->projek_id)->where('tahun',date("Y"))->first();

         $countbulanF = $countbulanF + 1;
         $countF = 0;
         $F = \App\MonthlyF::where('projek_id' ,$projekusers->projek_id)->where('tahun',date("Y"))->get();
         foreach($F as $MonthlyFs){
           $checkMonthlyF = \App\MonthlyF::where('id',$MonthlyFs->id)->where('old_data',Null)->first();
           if($checkMonthlyF){
             $MonthlyF123 = \App\MonthlyF::where('old_data',$checkMonthlyF->id)->first();
             if($MonthlyF123){
               $MonthlyF123 = \App\MonthlyF::where('old_data',$checkMonthlyF->id)->first();
             }else{
               $MonthlyF123 = \App\MonthlyF::where('id',$MonthlyFs->id)->where('version','eo')->first();
             }
           }else{
             $MonthlyF123 = \App\MonthlyF::where('id',$MonthlyFs->id)->where('version','eo')->first();
           }
           // return $MonthlyA->id;
           $countF = $countF + 1 ;
           $monthlyf = [];
           if($countF == $countbulanF){
             array_push($monthlyf, $countbulanF);
             array_push($monthlyf, $MonthlyF123->id);
             array_push($monthlyf, $MonthlyF123->status->name);
             array_push($MonthlyFarray, $monthlyf);
           }
         }
         // $MonthlyF = \App\MonthlyF::where('projek_id',$projekusers->projek_id)->where('tahun',date("Y"))->first();


       }
       // dd($data[1][0]);
       $this->data['MonthlyAarray'] = $MonthlyAarray;
       $this->data['MonthlyBarray'] = $MonthlyBarray;
       $this->data['MonthlyCarray'] = $MonthlyCarray;
       $this->data['MonthlyDarray'] = $MonthlyDarray;
       // $this->data['MonthlyEarray'] = $MonthlyEarray;
       $this->data['MonthlyFarray'] = $MonthlyFarray;

       // $checkMonthlyA = MonthlyA::where('projek_id',$projekusers->projek_id)->where('bulan',$projekusers->bulan)->where('tahun',date("Y"))->get();

       // $projekuser = ProjekHasUser::where('user_id',$user)->first();

       // $this->data['MonthlyDRainy'] = $MonthlyDRainy = MonthlyDRainyMain::leftJoin('monthly_d_rainy', 'monthly_d_rainy_main.monthlyd_rainy_id', '=', 'monthly_d_rainy.id')
       // ->select('*')
       // ->where('monthly_d_rainy.projek_id',$projekuser->projek_id)->get();
       // dd($this->data['MonthlyDRainy']);
       return view('pelaporan.senaraipelaporan',$this->data);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function projek(Request $request, $id)
    {

      $log = new LogSystem;
      $log->module_id = 26;
      $log->activity_type_id = 2;
      $log->description = "Lihat Maklumat Projek";
      // $log->data_old = json_encode($request->input());
      // $log->data_new = json_encode($laporanSiasatan);
      $log->url = $request->fullUrl();
      $log->method = strtoupper($request->method());
      $log->ip_address = $request->ip();
      $log->created_by_user_id = auth()->id();
      $log->save();

      // dd($request->b);
      $this->data['Projek'] = $projek = Projek::where('id',$id)->first();

      $this->data['ProjekPakej'] = $projekpakej = ProjekPakej::where('projek_id',$id)->first();
      $this->data['ProjekDetail'] = ProjekDetail::where('projek_id', $projek->id)->first();
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
      $this->data['states'] =  $states = MasterState::all();
      $this->data['masterprojek'] =  $states = MasterProjectActivity::all();
      $this->data['states'] =  $states1 = MasterState::all();

      // $EO = ProjekHasUser::leftJoin('model_has_role', 'projek_has_user.user_id', '=', 'model_has_role.model_id')
      // ->where('model_has_role.role_id',5)
      // ->where('projek_has_user.projek_id',$projek->id)
      // ->first();

      // if($EO){
      //   $this->data['detailEO'] = $detailEO = User::where('id', $EO->user_id)->first();
      // }else{
      //   $this->data['detailEO'] = "";
      // }
      // // $this->data['detailEO'] = $detailEO = User::where('id', $EO->user_id)->first();

      // $EMC = ProjekHasUser::leftJoin('model_has_role', 'projek_has_user.user_id', '=', 'model_has_role.model_id')
      // ->where('model_has_role.role_id',6)
      // ->where('projek_has_user.projek_id',$projek->id)
      // ->first();

      // $this->data['detailEMC'] = $detailEMC = User::where('id', $EMC->user_id)->first();

      $EO = ProjekHasUser::leftJoin('model_has_role', 'projek_has_user.user_id', '=', 'model_has_role.model_id')
      ->where('model_has_role.role_id',5)
      ->where('projek_has_user.projek_id',$projek->id)
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
      ->where('projek_has_user.projek_id',$projek->id)
      ->get();
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

      $this->data['pematuhaneia'] =  $pematuhaneia = MasterPematuhanEia::all();

      $this->data['jenisProjek'] =  $jenisProjek = MasterJenisProjek::where('status',1)->orderBy('id', 'desc')->get();

      $this->data['peringkatPengawasan'] = $peringkatPengawasan = MasterPeringkatPengawasan::all();

      //exclude tiada from dropdownlist
      $this->data['tempohAudit'] =  $tempohAudit = MasterTempohAudit::where('id','!=',6)->get();

      $this->data['stesens'] =  $stesens = Stesen::where('projek_id',$projek->id)->get();

      $this->data['Pengawasan'] = $pengawasan = MasterPengawasan::all();

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
      $this->data['counttasik'] =   $counttasik = Stesen::where('jenis_pengawasan_id',3)->where('projek_id',$projek->id)->count();
      $this->data['counttanah'] =   $counttanah = Stesen::where('jenis_pengawasan_id',4)->where('projek_id',$projek->id)->count();
      $this->data['countairlarian'] =   $countairlarian = Stesen::where('jenis_pengawasan_id',5)->where('projek_id',$projek->id)->count();
      $this->data['countudara'] =   $countudara = Stesen::where('jenis_pengawasan_id',6)->where('projek_id',$projek->id)->count();
      $this->data['countbunyi'] =   $countbunyi = Stesen::where('jenis_pengawasan_id',7)->where('projek_id',$projek->id)->count();
      $this->data['countgetaran'] =   $countgetaran = Stesen::where('jenis_pengawasan_id',8)->where('projek_id',$projek->id)->count();
      $this->data['countdron'] =   $countdron = Stesen::where('jenis_pengawasan_id',9)->where('projek_id',$projek->id)->count();


      $this->data['master_bulan'] = $master_bulan = MasterMonth::all();

      $this->data['countFasa'] =  $countFasa = ProjekFasa::where('projek_id',$projek->id)->count();

      $current_year = "2020";
      $range_of_year = '5';

      $years = array_combine(range(date("Y"), 2070), range(date("Y"), 2070));
      $this->data['master_tahun'] = $master_tahun = $years;

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
            if($pakej->pakej_negeri == 'Tiada'){
              return  strtoupper($pakej->pakej_negeri);
            }else{
              $pakejNegeri .= $pakej->projekState->name;
              return  strtoupper($pakejNegeri);
            }


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
            $button .= '<a onclick="pengawasan('.$pakej->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Maklumat Pengawasan Pakej</a>';
            // $button .= '<a onclick="removepakej('.$pakej->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Buang</a>';

            return $button;
        })
        ->make(true);
      }

      return view('pengesahanprojek.projek',$this->data, compact('master_tahun'));
    }

    public function viewFasa(Request $request) {
 // dd($request->b);

        $projek = Projek::where('id',$request->id)->first();


        if ($projek){
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
        }
       return view('pengesahanprojek.projek');
    }

    public function viewEMP(Request $request) {
 // dd($request->b);

        $projek = Projek::where('id',$request->id)->first();


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
                    // ->editColumn('action', function ($emp) {
                    //     $button = "";
                    //     // $button .= '<a onclick="edit('.$emp->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                    //     // if(!request()->a){
                    //     //     $button .= '<a onclick="removeEmp('.$emp->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Buang</a>';
                    //     // }
                    //     return $button;
                    // })
                    ->make(true);
            }
        }
       return view('pengesahanprojek.projek');
    }

    public function viewLDP2M2(Request $request) {

        $projek = Projek::where('id',$request->id)->first();

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
                        if($ldp2m2->dokumen)
                            $ldpDoc .= '<a href="'.asset('/').$ldp2m2->dokumen.'" target="_blank"><i class="fa fa-file-pdf-o fa-2x"></i></a>';
                        return $ldpDoc;
                    })
                    // ->editColumn('action', function ($ldp2m2) {
                    //     $button = "";
                    //     // $button .= '<a onclick="edit('.$ldp2m2->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                    //     if(!request()->a){
                    //         $button .= '<a onclick="removeLDP('.$ldp2m2->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Buang</a>';
                    //     }
                    //     return $button;
                    // })
                    ->make(true);
            }
        }
        return view('pengesahanprojek.projek');
    }

    public function viewAudit(Request $request) {

        if($request->ajax()) {
           $audit = ProjekAudit::where('projek_id',$request->id)->orderBy('tarikh_audit','asc');

            return datatables()->of($audit->get())
                ->editColumn('tarikh', function ($audit) {
                    // dd($audit->tarikh_audit);
                    // return $audit->tarikh_audit;
                    if($audit->tarikh_audit){
                        $month = date('F', strtotime($audit->tarikh_audit));
                        // return $month ;
                        if($month == "January")
                          $monthmy = "Januari";
                        if($month == "February")
                          $monthmy = "Februari";
                        if($month == "March")
                          $monthmy = "Mac";
                        if($month == "April")
                          $monthmy = "April";
                        if($month == "May")
                          $monthmy = "Mei";
                        if($month == "June")
                          $monthmy = "Jun";
                        if($month == "July")
                          $monthmy = "Julai";
                        if($month == "August")
                          $monthmy = "Ogos";
                        if($month == "September")
                          $monthmy = "September";
                        if($month == "October")
                          $monthmy = "Oktober";
                        if($month == "November")
                          $monthmy = "November";
                        if($month == "December")
                          $monthmy = "Disember";
                        return '<div style="text-align=center">'.$monthmy." | ".date('Y', strtotime($audit->tarikh_audit))."</div>";
                    }else{
                        return '<span class="text-danger text-uppercase"> Sila Masukkan Tarikh Pada Butang Kemaskini*</span><br><input type="hidden" id="erroraudit" value="0">';
                    }                    
                })
                ->make(true);
        }
        return view('pengesahanprojek.projek');
    }

    public function viewSungai(Request $request){
// dd(request()->a);
        if($request->ajax()) {
                $type = Stesen::where('projek_id',$request->id)->where('jenis_pengawasan_id',1)->orderBy('longitud','ASC')->get();
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
                    ->editColumn('koordinat', function ($type) {
                        $koordinat = "";
                        if ($type->longitud || $type->latitud){
                            if($type->longitud)
                                $koordinat .= strtoupper("longitud: ".$type->longitud."<br>");
                            if($type->latitud)
                               $koordinat .= strtoupper("latitud: ".$type->latitud);
                           if($type->longitud && $type->latitud)
                            $koordinat .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                            return $koordinat;
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
                        $button = "";
                        $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-eye"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                        // $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Buang</a>';
                        return $button;
                    })
                    ->make(true);
            }
        return view('pengesahanprojek.projek');

    }

    public function viewMarin(Request $request){
// dd(request()->a);
        if($request->ajax()) {
                $type = Stesen::where('projek_id',$request->id)->where('jenis_pengawasan_id',2)->orderBy('longitud','ASC')->get();
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
                    ->editColumn('koordinat', function ($type) {
                        $koordinat = "";
                        if ($type->longitud || $type->latitud){
                            if($type->longitud)
                                $koordinat .= strtoupper("longitud: ".$type->longitud."<br>");
                            if($type->latitud)
                               $koordinat .= strtoupper("latitud: ".$type->latitud);
                           if($type->longitud && $type->latitud)
                            $koordinat .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                            return $koordinat;
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
                        $button = "";
                        $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-eye"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                        // $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Buang</a>';
                        return $button;
                    })
                    ->make(true);
            }
        return view('pengesahanprojek.projek');

    }

    public function viewTasik(Request $request){
// dd(request()->a);
        if($request->ajax()) {
                $type = Stesen::where('projek_id',$request->id)->where('jenis_pengawasan_id',3)->orderBy('longitud','ASC')->get();
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
                    ->editColumn('koordinat', function ($type) {
                        $koordinat = "";
                        if ($type->longitud || $type->latitud){
                            if($type->longitud)
                                $koordinat .= strtoupper("longitud: ".$type->longitud."<br>");
                            if($type->latitud)
                               $koordinat .= strtoupper("latitud: ".$type->latitud);
                           if($type->longitud && $type->latitud)
                            $koordinat .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                            return $koordinat;
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
                        $button = "";
                        $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-eye"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                        // $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Buang</a>';
                        return $button;
                    })
                    ->make(true);
            }
        return view('pengesahanprojek.projek');

    }

    public function viewTanah(Request $request){
// dd(request()->a);
        if($request->ajax()) {
                $type = Stesen::where('projek_id',$request->id)->where('jenis_pengawasan_id',4)->orderBy('longitud','ASC')->get();
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
                    ->editColumn('koordinat', function ($type) {
                        $koordinat = "";
                        if ($type->longitud || $type->latitud){
                            if($type->longitud)
                                $koordinat .= strtoupper("longitud: ".$type->longitud."<br>");
                            if($type->latitud)
                               $koordinat .= strtoupper("latitud: ".$type->latitud);
                           if($type->longitud && $type->latitud)
                            $koordinat .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                            return $koordinat;
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
                        $button = "";
                        $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-eye"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                        // $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Buang</a>';
                        return $button;
                    })
                    ->make(true);
            }
        return view('pengesahanprojek.projek');

    }

    public function viewAir(Request $request){
// dd(request()->a);
        if($request->ajax()) {
                $type = Stesen::where('projek_id',$request->id)->where('jenis_pengawasan_id',5)->orderBy('longitud','ASC')->get();
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
                    ->editColumn('koordinat', function ($type) {
                        $koordinat = "";
                        if ($type->longitud || $type->latitud){
                            if($type->longitud)
                                $koordinat .= strtoupper("longitud: ".$type->longitud."<br>");
                            if($type->latitud)
                               $koordinat .= strtoupper("latitud: ".$type->latitud);
                           if($type->longitud && $type->latitud)
                            $koordinat .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                            return $koordinat;
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
                        $button = "";
                        $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-eye"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                        // $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Buang</a>';
                        return $button;
                    })
                    ->make(true);
            }
        return view('pengesahanprojek.projek');

    }

    public function viewUdara(Request $request){
// dd(request()->a);
        if($request->ajax()) {
                $type = Stesen::where('projek_id',$request->id)->where('jenis_pengawasan_id',6)->orderBy('longitud','ASC')->get();
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
                    ->editColumn('koordinat', function ($type) {
                        $koordinat = "";
                        if ($type->longitud || $type->latitud){
                            if($type->longitud)
                                $koordinat .= strtoupper("longitud: ".$type->longitud."<br>");
                            if($type->latitud)
                               $koordinat .= strtoupper("latitud: ".$type->latitud);
                           if($type->longitud && $type->latitud)
                            $koordinat .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                            return $koordinat;
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
                        $button = "";
                        $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-eye"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                        // $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Buang</a>';
                        return $button;
                    })
                    ->make(true);
            }
        return view('pengesahanprojek.projek');

    }

    public function viewBunyi(Request $request){
// dd(request()->a);
        if($request->ajax()) {
                $type = Stesen::where('projek_id',$request->id)->where('jenis_pengawasan_id',7)->orderBy('longitud','ASC')->get();
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
                    ->editColumn('koordinat', function ($type) {
                        $koordinat = "";
                        if ($type->longitud || $type->latitud){
                            if($type->longitud)
                                $koordinat .= strtoupper("longitud: ".$type->longitud."<br>");
                            if($type->latitud)
                               $koordinat .= strtoupper("latitud: ".$type->latitud);
                           if($type->longitud && $type->latitud)
                            $koordinat .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                            return $koordinat;
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
                        $button = "";
                        $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-eye"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                        // $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Buang</a>';
                        return $button;
                    })
                    ->make(true);
            }
        return view('pengesahanprojek.projek');

    }

    public function viewGetaran(Request $request){
// dd(request()->a);
        if($request->ajax()) {
                $type = Stesen::where('projek_id',$request->id)->where('jenis_pengawasan_id',8)->orderBy('longitud','ASC')->get();
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
                    ->editColumn('koordinat', function ($type) {
                        $koordinat = "";
                        if ($type->longitud || $type->latitud){
                            if($type->longitud)
                                $koordinat .= strtoupper("longitud: ".$type->longitud."<br>");
                            if($type->latitud)
                               $koordinat .= strtoupper("latitud: ".$type->latitud);
                           if($type->longitud && $type->latitud)
                            $koordinat .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                            return $koordinat;
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
                        $button = "";
                        $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-eye"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                        // $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Buang</a>';
                        return $button;
                    })
                    ->make(true);
            }
        return view('pengesahanprojek.projek');

    }

    public function viewDron(Request $request){
// dd(request()->a);
        if($request->ajax()) {
                $type = Stesen::where('projek_id',$request->id)->where('jenis_pengawasan_id',9)->orderBy('longitud','ASC')->get();
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
                    ->editColumn('koordinat', function ($type) {
                        $koordinat = "";
                        if ($type->longitud || $type->latitud){
                            if($type->longitud)
                                $koordinat .= strtoupper("longitud: ".$type->longitud."<br>");
                            if($type->latitud)
                               $koordinat .= strtoupper("latitud: ".$type->latitud);
                           if($type->longitud && $type->latitud)
                            $koordinat .= '<a  onclick="map('.$type->id.')" href="javascript:;" class="btn btn-default-focus btn-sm m-t-5 pull-right"><i class="fa fa-search mr-1"></i>Semak</a>';
                            return $koordinat;
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
                        $button = "";
                        $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-eye"></i> Maklumat Stesen</a>';
                        // $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                        // $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Buang</a>';
                        return $button;
                    })
                    ->make(true);
            }
        return view('pengesahanprojek.projek');

    }

    public function viewStesen(Request $request) {
        // dd($request->id);
        $this->data['stesen'] = $stesen = Stesen::where('id',$request->id)->first();
        $this->data['parameter'] = $parameter = Parameter::where('stesen_id',$stesen->id)->where('mode','mandatory')->get();
        $this->data['masterstandard'] = $masterstandard = MasterStandard::all();

        if($stesen->jenis_pengawasan_id==7){
            $this->data['masterparameter'] = $masterparameter = MasterParameter::select(['id','schedule'])->where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->groupBy('schedule')->get();

            $masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id','class'])
                                                                        ->where('jenis_parameter',$masterparameter->id)
                                                                        ->get();
        }

        // Stesen::where('id',$request->id)->first();
        // dd($audit->tarikh_audit);
        // return view('pengesahanprojek.viewStesen',$this->data);
         return view('pengesahanprojek.viewStesen1',$this->data);
    }

    public function viewParameter(Request $request) {
        // dd($request->id);
      // $this->data['parameters'] = $parameters = MasterParameter::where('jenis_pengawasan',1)->get();
      // $this->data['stesen_id'] =  $request->id;
      // $stesen = Stesen::where('id',$request->id)->first();
      // $this->data['masterparameter'] =  $masterparameter = MasterParameter::where('jenis_pengawasan','=',$stesen->jenis_pengawasan_id)->get();

      $this->data['stesen'] = $stesen = Stesen::where('id',$request->id)->first();

         if(in_array($stesen->jenis_pengawasan_id,[2])){
            $this->data['parameters'] = $parameters = Parameter::with('jenisstandard')->where('stesen_id',$stesen->id)->orderBy('mode')->orderBy('standard')->get();
        }else{
            $this->data['parameters'] = $parameters = Parameter::with('jenisstandard')->where('stesen_id',$stesen->id)->orderBy('mode')->get();
        }
// dd($parameters);
      return view('pengesahanprojek.viewParameter1',$this->data);

      // return view('pengesahanprojek.viewParameter',$this->data);
    }

    public function getParameter(Request $request) {

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
                // ->editColumn('action', function ($stesen) {
                //     $button = "";
                //     // $button .= '<a onclick="editaudit('.$stesen->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                //     $button .= '<a onclick="remove('.$stesen->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Buang</a>';
                //     return $button;
                // })
                ->make(true);
        }else{

        }
        return view('external.projek.editparameter');
    }

    public function sahProjek(Request $request) {

      $projek = Projek::where('id',$request->id)->first();

      if($projek){
        $projek->bulan = $request->bulan;
        $projek->tahun = $request->tahun;
        $projek->tarikh_sah = date('Y-m-d');
        $projek->status = 9;
      }

      if($projek->save()){

        $exist = ProjekPengawasanLaporan::where('projek_id',$projek->id)->get();
        if($exist->isEmpty()){
          $i = 1;
          for ($i = 1; $i < 13; $i++)
          {
            $projekPengawasan = new ProjekPengawasanLaporan();
            $projekPengawasan->projek_id = $projek->id;
            $projekPengawasan->bulan = $i;
            $projekPengawasan->save();
          }
        }

        $projekUser = ProjekHasUser::leftJoin('model_has_role', 'projek_has_user.user_id', '=', 'model_has_role.model_id')
              ->where('model_has_role.role_id',4)
              ->where('projek_has_user.projek_id',$request->id)
              ->where('projek_has_user.status',"Active")
              ->first();

    //   dd($projekUser);
      if($projekUser->user->email && $projek->email_sah == 0){
          Mail::to($projekUser->user->email)->send(new PengesahanProjek($projek, 'Pengesahan Projek'));

          Inbox::create([
            'subject' => 'Pengesahan Projek',
            'message' => 'Dimaklumkan bahawa maklumat projek bagi projek </br'.$projek->no_fail_jas.'telah disemak dan disahkan',
            'sender_user_id' => auth()->id(), //admin
            'receiver_user_id' => $projekUser->user_id, //Penyelia
            'inbox_status_id' => 2,
        ]);

        $projek = Projek::where('id',$request->id)->first();
        $projek->email_sah = 1;
        $projek->save();
        // $notification = Notification::where('code', 'pengesahanprojek.projek')->first();

        // $email_receiver = $projekUser->user->email;
        // $message = $notification->message;
        // $subject = 'Pengesahan Projek';

        // $data = ['bulan'=>$request->bulan,'tahun'=>$request->tahun];

        // Mail::raw($message, function ($message) use ($email_receiver,$subject,$data)  {
        //   $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        //   $message->to($email_receiver);
        //   $message->subject($subject);
        // });

          // Mail::send('emails.pegawai.pengesahan_projek',
          //   array(
          //       'usermail' => $projekUser->user->email,
          //       'bulan'=>$request->bulan,
          //       'tahun'=>$request->tahun,
          //       'subject' => 'Pengesahan Projek',
          //       'message' => $notification->message
          //   ), function($message) use ($subject,$usermail)
          // {
          //     $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
          //     $message->to($usermail)->subject('Pengesahan Projek');
          // });
      }

      //         Mail::send('mail', 'Virat Gandhi', function($message) {
      //    $message->to('pp@getnada.com', 'Tutorials Point')->subject
      //       ('Laravel HTML Testing Mail');
      //    $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
      // });

       //  if( count(Mail::failures()) > 0 ) {

       //   echo "There was one or more failures. They were: <br />";

       //   foreach(Mail::failures as $email_address) {
       //     echo " - $email_address <br />";
       //   }

       // }
       $log = new LogSystem;
       $log->module_id = 26;
       $log->activity_type_id = 5;
       $log->description = "Kemaskini Data Projek";
       $log->data_old = json_encode($request->input());
       $log->data_new = json_encode($projek);
       $log->url = $request->fullUrl();
       $log->method = strtoupper($request->method());
       $log->ip_address = $request->ip();
       $log->created_by_user_id = auth()->id();
       $log->save();

          return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
      }else{
        return response()->json(['status' => 'error']);
      }

    }

    public function tidaklengkapProjek(Request $request) {

      $projek = Projek::where('id',$request->id)->first();

      if($projek){
        $projek->status = 12;
        $projek->pindaan_catatan = $request->ulasan1;
        Inbox::create([
            'subject' => 'Pendaftaran Projek Tidak Sah - '.$projek->no_fail_jas,
            'message' => 'Sebab Tidak Sah - '.$request->ulasan1,
            'sender_user_id' => auth()->id(), //penyiasat
            'receiver_user_id' => $projek->penggerak_projek, //Penggerak Projek
            'inbox_status_id' => 2,
        ]);
      }

      $log = new LogSystem;
      $log->module_id = 26;
      $log->activity_type_id = 20;
      $log->description = "Kemaskini Status Projek";
      $log->data_old = json_encode($projek);
      // $log->data_new = json_encode($projek);
      $log->url = $request->fullUrl();
      $log->method = strtoupper($request->method());
      $log->ip_address = $request->ip();
      $log->created_by_user_id = auth()->id();
      $log->save();

      if($projek->save()){
          return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
      }else{
        return response()->json(['status' => 'error']);
      }
    }
}
