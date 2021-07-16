<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use App\MasterModel\MasterUserStatus;
use App\MasterModel\MasterUserType;
use App\LogModel\LogSystem;
use Validator;
use Datatables;
use DateTime;
use App\UserEO;
use App\Projek;
use App\Distribution;
use App\ProjekHasUser;
use Carbon\Carbon;
use Mail;
use Illuminate\Filesystem\Filesystem;
use App\OtherModel\Inbox;

class PenggunaEOController extends Controller
{

  public function __construct() {
      $this->middleware('auth');
  }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pengurusan_eo(Request $request) {

    	$all_status = MasterUserStatus::all();
        // $provinces = MasterProvinceOffice::all();
        // $sections = MasterSection::all();
        $roles = Role::all();
        $failjas = ProjekHasUser::where('user_id',auth()->user()->id)->get();
        foreach ($failjas as $key => $value) {
            $projek = Projek::where('id',$value->projek_id)->first();
            $failjasno[$projek->id] = $projek->no_fail_jas;
        }

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = 27;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $user = auth()->id();
            
            $projekuser = ProjekHasUser::where('user_id',$user)->first();
            if($projekuser){
              $projekusereo = ProjekHasUser::where('projek_id',$projekuser->projek_id)->get();
              $usereo = [];
              foreach($projekusereo as $projekusereos){
                array_push($usereo , $projekusereos->user_id);
              }
            //   $user = User::where('user_type_id', 3)->whereIn('id',$usereo)->with(['entity_eo', 'status','role'])->whereHas('model_has_role',function($role) use($request) {
            //       return $role->where('role_id',5);
            //   });

            $user = User::leftJoin('user_eo', 'user.entity_id', '=', 'user_eo.id')
            ->select([
                '*',
                'user.name as eo_name',
                'user.id as user_id',
            ])
            ->whereIn('user.id',$usereo)
            ->whereNotNull('user.name')
            ->whereNotNull('user.username')
            ->where('user.entity_type','App\UserEO');
            // dd($user->get());
            //   $user->get();
            
            }else{
              $user = [];
            }
            // dd($user->get());

            return datatables()->of($user)
                ->editColumn('eo_name', function ($user) {
                    return $user->name;
                })
                ->editColumn('username', function ($user) {
                    return '<span class="label label-default">'.$user->username.'</span>';
                })
                ->editColumn('created_at', function ($user) {
                    return $user->created_at ? date('d/m/Y', strtotime($user->created_at)) : date('d/m/Y');
                })
                ->editColumn('kompetensi_no', function ($user) {
                    if($user->entity_eo)
                        return $user->entity_eo->no_kompetensi;
                    else
                        return '';
                })
                ->editColumn('date_kompetensi', function ($user) {
                    if($user->entity_eo)
                        return $user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($user->entity_eo->date_kompetensi)) : date('d/m/Y');
                    else
                        return '';
                })
                ->editColumn('user_status_id', function ($user) {
                    // return $user->user_status_id;
                    if($user->user_status_id == 1){
                            return '<span class="badge badge-success">'.$user->status->name.'</span>';
                    } else if($user->user_status_id == 3 ){
                            return '<span class="badge badge-warning">Semakan P. Penyiasat</span>';
                    } else{
                        return '<span class="badge badge-warning">'.$user->status->name.'</span>';
                    }
                })
                ->editColumn('action', function ($user) {
                    $button = "";
                    if($user->user_status_id == 1 || $user->user_status_id == 3){
                      $button .= '<a onclick="view('.$user->user_id.')" href="javascript:;" class="btn btn-default btn-xs mb-1" style="width:168px;"><i class="fa fa-eye mr-1"></i> Lihat Maklumat EO</a> ';
                      $button .= '<a onclick="deactive('.$user->user_id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:168px;"><i class="fa fa-minus-circle mr-1"></i>  Nyah Aktif</a> ';
                    }
                    if($user->user_status_id == 3 || $user->user_status_id == 9 || $user->user_status_id == 10){
                        // $button .= '<a onclick="view('.$user->id.')" href="javascript:;" class="btn btn-default btn-xs mb-1"><i class="fa fa-list mr-1"></i> Lihat</a> ';
                        if ($user->user_status_id == 9 || $user->user_status_id == 10) {
                        //  $button .= '<a onclick="edit('.$user->user_id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i> Kemaskini</a> ';
                            $button .= '<a onclick="edit('.$user->user_id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:168px;"><i class="fa fa-edit mr-1"></i> Kemaskini</a> ';
                        //  $button .= '<a onclick="hantar('.$user->user_id.')" href="javascript:;" class="btn btn-success btn-xs mb-1"><i class="fa fa-check mr-1"></i> Hantar</a> ';
                            $button .= '<a onclick="hantar('.$user->user_id.')" href="javascript:;" class="btn btn-success btn-xs mb-1" style="width:168px;"><i class="fa fa-arrow-right mr-1"></i> Hantar</a> ';
                            if ($user->user_status_id == 10) {
                        //      $button .= '<a onclick="komen('.$user->user_id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-search mr-1"></i> Lihat Komen</a> ';
                                $button .= '<a onclick="komen('.$user->user_id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:168px;"><i class="fa fa-eye mr-1"></i> Lihat Komen</a> ';
                            }
                        }
                        if($user->user_status_id != 3 && $user->user_status_id != 10 ){
                        //  $button .= '<a onclick="remove('.$user->user_id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                            $button .= '<a onclick="remove('.$user->user_id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:168px;"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                        }
                    }
                    // if($user->user_status_id == 9 ){
                    //     $button .= '<a onclick="update('.$user->id.')" href="javascript:;" class="btn btn-default btn-xs mb-1"><i class="fa fa-list mr-1"></i> Kemaskini</a> ';
                    //     $button .= '<a onclick="send('.$user->id.')" href="javascript:;" class="btn btn-default btn-xs mb-1"><i class="fa fa-list mr-1"></i> Hantar</a> ';
                    //   $button .= '<a onclick="remove('.$user->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    // }
                    if($user->user_status_id == 5 ){
                    //   $button .= '<a onclick="active('.$user->user_id.')" href="javascript:;" class="btn btn-success  btn-xs mb-1"><i class="fa fa-check-circle-o mr-1"></i> Aktifkan</a> ';
                    }
                    return $button;
                })
                ->make(true);
        }

    	return view('pengguna.pengurusan_eo', compact('all_status','roles','failjasno'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function insert_pengurusan_eo(Request $request) {
        
        $no_kad = User::where('username', $request->username)->where('entity_type', '=', 'App\UserEO')->where('user_status_id','=',1)->first();

        if($no_kad && $request->kemaskini != 1)
        {
            return response()->json(['status' => 'error', 'title' => '', 'message' => 'Nombor kad pengenalan EO telah wujud dan didaftarkan bagi projek di dalam sistem. Sila kemukakan surat lantikan EO kepada JAS Negeri projek terdahulu untuk tindakan selanjutnya.']);
        }

        $date = date('Y-m-d');
        // $datekompetensi = strtotime($request->date_kompetensi);
        if ($request->date_kompetensi) {
            $daterequest = DateTime::createFromFormat('d/m/Y', $request->date_kompetensi)->format('Y-m-d');
        }

        // // dd($time);
        if ($request->date_kompetensi) {
            if ($daterequest >= $date) {
                return response()->json([
                    'status' => 'error',
                    'code' => '006',
                    'message' => 'Ralat pengesahan input pengguna1.',
                    'errors' => [
                                    'date_kompetensi' => ['Pastikan tarikh tidak melebihi atau sama tarikh hari ini.'],
                                ],
                ], 422);
            }
        }
        // // dd('$date');

        if ($request->kemaskini == 0) {
            $validator = Validator::make($request->all(), [
                // 'no_kompetensi' => 'required|string',
                // 'date_kompetensi' => 'required|string',
                'name' => 'required|string',
                'username' => 'required|string',
                'username' => 'required|string|unique:user,username,NULL,id,deleted_at,NULL,user_status_id,1',
                'phone' => 'required|string',
                // 'faks' => 'required|string',
                'email' => 'required|string|email|max:191',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                // 'no_kompetensi' => 'required|string',
                // 'date_kompetensi' => 'required|string',
                'name' => 'required|string',
                'username' => 'required',
                'phone' => 'required|string',
                // 'faks' => 'required|string',
                'email' => 'required|string|email|max:191',
            ]);
        }

        if (strpos($request->email, 'doe.gov') !== false) {
            return response()->json([
                'status' => 'error',
                'code' => '006',
                'message' => 'Ralat pengesahan input pengguna3.',
                'errors' => [
                                'email' => ['E-mel xxxxx@doe.gov.my tidak boleh didaftar sebagai pihak syarikat.'],
                            ],
            ], 422);
        }
        
        if ($request->kemaskini == 0) {

            $entity = UserEO::create([
                'name' => $request->name,
            ]);

            if ($request->date_kompetensi) {
                $entity->date_kompetensi = Carbon::createFromFormat('d/m/Y', $request->date_kompetensi)->toDateTimeString();
                $entity->save();
            }

            if ($request->no_kompetensi) {
                $entity->no_kompetensi = strtoupper($request->no_kompetensi);
                $entity->save();
            }

            $user = $entity->user()->create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'fax' => $request->faks,
                'username' => $request->username,
                'user_type_id' => 3,
                'user_status_id' => 9,
                // 'password' => bcrypt('password'),
            ])->assignRole(['eo'])->assignRole(['ex']);
            // dd($user);
            $password = 'password';
              // dd($user['email']);
            //Mail::to($user['email'])->send(new PengesahanPengguna($user, 'Pengesahan Pengguna', $password));


            $userlogin = User::find(auth()->id());
            //Mail::to($userlogin->email)->send(new PengesahanPengguna($user, 'Pengesahan Pengguna', $password));

            $ProjekHasUser = ProjekHasUser::where('user_id',auth()->id())->first();

            $ProjekHasUserCreate = new ProjekHasUser;
            $ProjekHasUserCreate->projek_id = $ProjekHasUser->projek_id;
            $ProjekHasUserCreate->user_id = $user->id;
            $ProjekHasUserCreate->save();
        } else {
           
            $ProjekHasUser = ProjekHasUser::where('user_id',auth()->id())->first();
            // dd($ProjekHasUser);
            $userKemaskini = User::leftJoin('projek_has_user', 'user.id', '=', 'projek_has_user.user_id')   
            ->select([
                'user.id as user_id',
            ])       
            ->where('user.username',$request->username)
            ->where('projek_has_user.projek_id',$ProjekHasUser->projek_id)
            ->where('user.entity_type','App\UserEO')
            ->first();
           
            if (!empty($userKemaskini)) {
                $user = User::where('id',$userKemaskini->user_id)->first();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->fax = $request->faks;
                $user->save();

            } 
            $entity = $user->entity_eo;

        }
        if ($request->hasfile('gambar')) {
            $file=$request->file('gambar');
            $name = $file->getClientOriginalName();
            $file->move('eo/'.$entity->id.'/gambar/', $name);
            $entity->gambar_url= "eo/".$entity->id."/gambar/".$name;
            $entity->save();
        }

        if ($request->hasfile('sijil')) {
            $file = new Filesystem;
            $file->cleanDirectory("eo/".$entity->id."/sijil/");
            $files=$request->file('sijil');
                foreach($files as $file) {
                    $name = $file->getClientOriginalName();
                    $exten = $file->getClientOriginalExtension();
                    $name_temp = $name;
                    $file->move('eo/'.$entity->id.'/sijil/', $name_temp);
                    $entity->sijil_url= "eo/".$entity->id."/sijil/";
                    $entity->save();
                }
        }

        $ioid = ProjekHasUser::where('user_id',auth()->id())->first();
        $ioidpegawai = Projek::where('id',$ioid->projek_id)->first();
        $distribution = Distribution::where('no_fail_jas',$ioidpegawai->no_fail_jas)->first();
        //notifikasi kepada pegawai Jas(penyelia) untuk mengaktifkan Enviromental Office (eo)
        if ($request->kemaskini == 0) {
            // Inbox::create([
            //     'subject' => 'Pengesahan Pengguna Luar - EO',
            //     'message' => 'Terdapat pengesahan diperlukan untuk Enviromental Officer',
            //     'sender_user_id' => $user->id, //admin
            //     'receiver_user_id' => $distribution->assigned_to_user_id, //Penyelia
            //     'inbox_status_id' => 2,
            // ]);
        }
        // dd('sinia');
        // dd($userKemaskini);
        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data baru berjaya ditambah.']);
    }

    public function hantarpengguna(Request $request,$id,$type) {
        $user = new User;
        $response = $user->hantarUser($id,$type);

        return response()->json($response);
    }
    /**
     * Remove the specified resource from storage.
     * @param  Request $request
     * @return Response
     */
    public function delete_pengurusan_eo(Request $request) {
        // dd('dwdw');
        $user = User::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = 27;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Pengguna - Pengguna EO";
        $log->data_old = json_encode($user);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user->entity->delete();
        $user->delete();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
    }

    // public function delete_pengurusan_eo(Request $request) {
    //     // dd('dwdw');
    //     $user = User::findOrFail($request->id);

    //     return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.','user' => $user]);
    // }

    public function deactivate_pengguna(Request $request,$jenis,$id) {
        $this->data['user'] = $user = User::findOrFail($id);

    	return view('pengguna.modal.nyahaktif',$this->data);
    }

    public function deactivate_penggunaPost(Request $request) {
        $user = User::where('id',$request->userID)->first();
        if (!empty($user)){
            $nyahAktif = new \App\NyahAktif;
            $nyahAktif->deactivate_by = auth()->id();
            $nyahAktif->user_id = $user->id;
            $nyahAktif->sebab = $request->sebab;
            $nyahAktif->save();
            
            $pengguna = "";
            if ( $user->entity_type  == "App\UserEO" ) {
                $pengguna = "EO";
            } elseif ( $user->entity_type  == "App\UserEMC" ) {
                $pengguna = "EMC";
            }
            $log = new LogSystem;
            $log->module_id = 27;
            $log->activity_type_id = 6;
            $log->description = "Padam Pengurusan Pengguna - Pengguna ".$pengguna;
            $log->data_old = json_encode($user);
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $user->user_status_id = 6;
            $user->save();
        }
        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Permohonan telah dihantar.']);
    }
    
    
    public function deactivate_pengurusan_eo(Request $request) {

        $user = User::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = 27;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Pengguna - Pengguna EO";
        $log->data_old = json_encode($user);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user->user_status_id = 6;

        $user->save();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
    }

    public function activate_pengurusan_eo(Request $request) {

        $user = User::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = 27;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Pengguna - Pengguna EO";
        $log->data_old = json_encode($user);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user->user_status_id = 7;

        $user->save();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
    }

    public function view_user(Request $request) {

        $user = User::findOrFail($request->id);
        $user2 = $user->entity_eo;
        $datekompetensi = null;
        if ($user2->date_kompetensi) {
            $datekompetensi = date("d/m/Y", strtotime($user2->date_kompetensi));
        }
        $log = new LogSystem;
        $log->module_id = 27;
        $log->activity_type_id = 6;
        $log->description = "Lihat Pengurusan Pengguna - Pengguna EO";
        $log->data_old = json_encode($user);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        // $user = User::where('user_type_id', 3)->whereIn('id',$request->id)->with(['entity_eo', 'status','role'])->whereHas('model_has_role',function($role) use($request) {
        //           return $role->where('role_id',5);
        //       });
        $picture = '';
        $sijil = '';
        if($user->entity_eo <> Null){
            if($user->entity_eo->gambar_url <> Null){
                $picture = '<a href="'.url('/').'/'.$user->entity_eo->gambar_url.'" target="_blank"><img src="'.url('/').'/'.$user->entity_eo->gambar_url.'" width="100%" height="auto"></a>';
            }
            $url = url('/').'/'.$user->entity_eo->sijil_url;
            $path      = parse_url($url, PHP_URL_PATH);       // get path from url
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            $filename  = pathinfo($path, PATHINFO_FILENAME);
            $name_ext = ''; 
  
            // Initialize filecount variavle 
            // $filecount = 0; 
            $files2 = glob( $user->entity_eo->sijil_url ."*" ); 

            // if( $files2 <> Null ) { 
            //     $filecount = count($files2);
            // }
            // dd($extension);
            if($user->entity_eo->sijil_url <> Null){
                //for($i = 1; $i <= $filecount; $i++){
                foreach($files2 as $file_temporary){
                        $file_display = ltrim($file_temporary, $user->entity_eo->sijil_url);
                        $sijil =  $sijil.'<a href="'.url('/').'/'.$user->entity_eo->sijil_url. $file_display.'" target="_blank">'. $file_display.'</a><br>';
                        // $sijil =   '<object data="'.url('/').'/'.$user->entity_eo->sijil_url.'" type="application/pdf" width="300" height="200">
                        //                 alt : <a href="'.url('/').'/'.$user->entity_eo->sijil_url.'">'.$filename.'</a>
                        //             </object>';
                        // $sijil = '<embed src="'.url('/').'/'.$user->entity_eo->sijil_url.'" type="application/pdf" width="100%" height="100%">';
                    // }
                }
            }
        }

        // dd($picture);
        return response()->json(['status' => 'success', 'userdata' => $user,'userdata2' => $user,'datekompetensi' => $datekompetensi, 'pic' => $picture, 'sijil' => $sijil]);
    }

}
