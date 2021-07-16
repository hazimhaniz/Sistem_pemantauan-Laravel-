<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use App\OtherModel\Inbox; 
use App\MasterModel\MasterUserStatus;
use App\MasterModel\MasterDistrict;
use App\MasterModel\MasterState;
use App\MasterModel\MasterUserType;
use App\MasterModel\MasterPengawasan;
use App\LogModel\LogSystem;
use App\ProjekHasUser;
use App\JenisPengawasan;
use App\MakmalAkreditasi;
use Validator;
use Datatables;
use App\UserEMC;
use App\Projek;
use App\Distribution;
use Carbon\Carbon;
use Mail;
use App\Mail\Pengguna\PengesahanPengguna;


class PenggunaEMCController extends Controller
{

  public function __construct() {
      $this->middleware('auth');
  }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pengurusan_emc(Request $request) {

    	$all_status = MasterUserStatus::all();
      $district = MasterDistrict::orderBy('name','asc')->get();
      $state = MasterState::orderBy('name','asc')->where('id','<>',17)->get();
      $users = auth()->id();
      // $user1 = User::where('id',$users->id)->first();
      // $newuser = new User;
      $id = '$newuser->id';
      $user = null;
      $entity = null;
      // dd($id);
      // $entity = UserEMC::create([
      //       'syarikat' => strtoupper($request->company_name),
      //       'alamatsyarikat' => strtoupper($request->company_address),
      //       'nama_pegawai' => strtoupper($request->officer_name),
      //       'nama_makmal' => strtoupper($request->lab),
      //       'no_tel_makmal' => strtoupper($request->lab_tel),
      //       'alamat_makmal' => strtoupper($request->location),
      //       'negeri_id' => strtoupper($request->state_registered),
      //       'daerah_id' => strtoupper($request->district_registered),
      //       'poskod' => strtoupper($request->poskod),

      //   ]);

      //   $user = $entity->user()->create([
      //       'name' => strtoupper($request->name),
      //       'email' => $request->email,
      //       'phone' => $request->no_tel,
      //       'username' => $request->username,
      //       'user_type_id' => 3,
      //       'user_status_id' => 8,
      //       'fax' => strtoupper($request->faks),
      //       'password' => bcrypt('password'),
      //   ])->assignRole(['emc'])->assignRole(['ex']);

        $user1 = auth()->id();
        $projekuser1 = ProjekHasUser::where('user_id',$user1)->first();
        $JenisPengawasan = json_decode(JenisPengawasan::where('projek_id',$projekuser1->projek_id)->first()->jenis_pengawasan_id);
        $MasterPengawasan = MasterPengawasan::all();
        // $provinces = MasterProvinceOffice::all();
        // $sections = MasterSection::all();
        $roles = Role::all();


        if($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 27;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EMC";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $user = auth()->id();
            $projekuser = ProjekHasUser::where('user_id',$user)->first();
            if($projekuser){
              $projekuseremc = ProjekHasUser::where('projek_id',$projekuser->projek_id)->get();
              $useremc = [];
              foreach($projekuseremc as $projekuseremcs){
                array_push($useremc , $projekuseremcs->user_id);
              }
              
              $user = User::leftJoin('user_emc', 'user.entity_id', '=', 'user_emc.id')
              ->select([
                '*',
                'user.id as user_id',
              ])
              ->whereIn('user.id',$useremc)
              ->whereNotNull('user.name')
              ->whereNotNull('user.username')
              ->where('user.entity_type','App\UserEMC');
              // dd($user->get());
              // $user = User::where('user_type_id', 3)->whereIn('id',$useremc)->whereNotNull('name')->whereNotNull('username')->with(['entity_emc', 'status','role'])->whereHas('model_has_role',function($role) use($request) {
              //     return $role->where('role_id',6 );
              // });
            }else{
              $user = [];
            }
            // dd($user->get());
            // $user = $user->whereNotNull('syarikat');
            // dd($user->get()->toArray());
            return datatables()->of($user)
                ->editColumn('name', function ($user) {
                  return $user->name;
                })
                ->editColumn('username', function ($user) {
                    return '<span class="label label-default">'.$user->username.'</span>';
                })
                ->editColumn('syarikat', function ($user) {
                    return $user->entity_emc->syarikat;
                })
                // ->editColumn('alamatsyarikat', function ($user) {
                //   return $user->entity_emc->alamatsyarikat;
                // })
                // ->editColumn('phone', function ($user) {
                //     if($user->fax <> Null || $user->phone <> Null){
                //       $seperate = '';
                //       $seperate2 = '';
                //       $faks = '';
                //       $phone = '';
                //       if($user->fax <> Null){
                //         $faks = '<b>No Faks : </b>';
                //         $seperate = '<br>';
                //       }
                //       if($user->phone <> Null){
                //         $phone = '<b>No Tel : </b>';
                //       }
                //         return $user->fax.$seperate.$user->phone;
                //     }
                //     else{
                //       return '-';
                //     }
                // })
                ->editColumn('daftar', function ($user) {
                  return date('d/m/Y',strtotime($user->entity_emc->created_at));
                })
                ->editColumn('pengawasan', function ($user) {
                  $pengawasan = '';
                  $pengawasanmaster = MasterPengawasan::all();
                  // dd($user->pengawasan);
                  if ($user->pengawasan) {
                    foreach ($user->pengawasan as $key => $value) {
                    foreach ($pengawasanmaster as $key1 => $value1) {
                      if ($value1->id == $value->skop_pengawasan) {
                        $pengawasan .= $value1->jenis_pengawasan.'<br>';
                      }
                    }
                    }
                  }
                  return $pengawasan;
                })
                ->editColumn('user_status_id', function ($user) {
                  // return $user->user_status_id;
                    if($user->user_status_id == 1)
                        return '<span class="badge badge-success">'.$user->status->name.'</span>';
                    else if($user->user_status_id == 3 )
                          return '<span class="badge badge-warning">Semakan P. Penyiasat</span>';
                    else
                        return '<span class="badge badge-warning">'.$user->status->name.'</span>';
                })
                ->editColumn('action', function ($user) {
                  // $user = User::where('id',$user->id)->first();
                  // return $user;
                  // if ($user->user_status_id !=9) {
                  //   if($user){
                  //     $type = MakmalAkreditasi::where('emc_id',$user->entity_id)->count();
                  //     // dd($type);
                  //     // return $type;
                  //     if($user->user_status_id != 3 && $user->user_status_id != 1){
                  //       if($type > 0){
                  //         $user->user_status_id = 3;
                  //       }else{
                  //         $user->user_status_id = 8;
                  //       }
                  //       $user->save();
                  //     }
                  //   }
                  // }
                  
                    $button = "";
                    // dd($user->id);
                    if($user->user_status_id == 3){
                      $button .= '<a onclick="viewemc('.$user->user_id.')" href="javascript:;" class="btn btn-default btn-xs mb-1 action-btn"  style="width:168px;"><i class="fa fa-eye mr-1"></i> Lihat Maklumat EMC</a> ';
                    }
                    if($user->user_status_id == 1){
                      $button .= '<a onclick="viewemc('.$user->user_id.')" href="javascript:;" class="btn btn-default btn-xs mb-1" style="width:168px;"><i class="fa fa-eye mr-1"></i> Lihat Maklumat EMC</a> ';
                      $button .= '<a onclick="deactive('.$user->user_id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"  style="width:168px;"><i class="fa fa-minus-circle mr-1"></i>Nyah Aktif</a> ';
                    }
                    if($user->user_status_id == 5 ){
                      $button .= '<a onclick="active('.$user->user_id.')" href="javascript:;" class="btn btn-success  btn-xs mb-1 m-l-5 action-btn"  style="width:168px;"><i class="fa fa-check-circle-o"></i> Aktifkan</a> ';
                    }
                    if ($user->user_status_id == 9 || $user->user_status_id == 10) {
                  //  $button .= '<a onclick="updateData('.$user->entity_emc->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-pencil-square-o mr-1"></i> Kemaskini</a> ';
                      $button .= '<a onclick="updateData('.$user->entity_emc->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:168px;"><i class="fa fa-edit mr-1"></i> Kemaskini</a> ';
                  //  $button .= '<a onclick="hantar('.$user->user_id.')" href="javascript:;" class="btn btn-success btn-xs mb-1"><i class="fa fa-check mr-1"></i> Hantar</a> ';
                      $button .= '<a onclick="hantar('.$user->user_id.')" href="javascript:;" class="btn btn-success btn-xs mb-1" style="width:168px;"><i class="fa fa-arrow-right mr-1"></i> Hantar</a> ';

                    }
                    // $button .= '<a onclick="makmal('.$user->entity_emc->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-pencil-square-o mr-1"></i> Kemaskini Makmal</a> ';
                    if($user->user_status_id == 8 || $user->user_status_id == 9){
                      // $button .= '<a onclick="viewemc('.$user->id.')" href="javascript:;" class="btn btn-default btn-xs mb-1"><i class="fa fa-list mr-1"></i> Lihat</a> ';
                  //  $button .= '<a onclick="removeuser('.$user->user_id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                      $button .= '<a onclick="removeuser('.$user->user_id.')" href="javascript:;" class="btn btn-danger btn-xs mb-" style="width:168px;"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                    return $button;
                })
                ->make(true);
        }

    	return view('pengguna.pengurusan_emc', compact('all_status','roles','district','state','MasterPengawasan','id','user','entity','JenisPengawasan'));
    }

    public function tambah_emc(Request $request) {
      // dd('hai');
      // $entity = UserEMC::create([
      //   'syarikat' => strtoupper($request->company_name),
      //   'alamatsyarikat' => strtoupper($request->company_address),
      //   'nama_pegawai' => strtoupper($request->officer_name),
      //   'nama_makmal' => strtoupper($request->lab),
      //   'no_tel_makmal' => strtoupper($request->lab_tel),
      //   'alamat_makmal' => strtoupper($request->location),
      //   'negeri_id' => strtoupper($request->state_registered),
      //   'daerah_id' => strtoupper($request->district_registered),
      //   'poskod' => strtoupper($request->poskod),
      // ]);

      // $user = $entity->user()->create([
      //   'name' => strtoupper($request->name),
      //   'email' => $request->email,
      //   'phone' => $request->no_tel,
      //   'username' => $request->username,
      //   'user_type_id' => 3,
      //   'user_status_id' => 8,
      //   'fax' => strtoupper($request->faks),
      //   'password' => bcrypt('password'),
      // ])->assignRole(['emc'])->assignRole(['ex']);

      // $entity = new UserEMC;
      // $useremc = User::where('user_pp_id', auth()->user()->id)->where('user_status_id',9)->first();
      // if ($useremc) {
      //   $user = $useremc;
      //   $entity = UserEMC::where('id',$user->entity_id)->first();
      // } else {
        $entity = UserEMC::create();
        $user = $entity->user()->create([])->assignRole(['emc'])->assignRole(['ex']);
      // }
      
      // dd($user->id);
      $user->user_pp_id = auth()->user()->id;
      $user->save();

      $ProjekHasUser = ProjekHasUser::where('user_id',auth()->id())->first();
      $ProjekHasUserCreate = new ProjekHasUser;
        
      $ProjekHasUserCreate->projek_id = $ProjekHasUser->projek_id;
      $ProjekHasUserCreate->user_id = $user->id;
      $ProjekHasUserCreate->save();

      return response()->json(['emcid' => $entity->id,'user'=>$user,'entity'=>$entity]);
    }

    public function update_emc(Request $request) {
      
      // dd($request->id);
      $useremc = User::where('user_pp_id', auth()->user()->id)->where('entity_id',$request->id)->first();

      $user = $useremc;
      $entity = UserEMC::where('id',$user->entity_id)->first();
      // dd($entity);
      // dd($user->id);
      $user->user_pp_id = auth()->user()->id;
      $user->save();

      $daerah = MasterDistrict::where('id',$entity->daerah_id)->first();

      if ($daerah) {
        $daerah = $daerah->district_id;
      }else {
        $daerah = "";
      }
      
      $negeri = MasterState::where('id',$entity->negeri_id)->first();
      if ($negeri) {
        $negeri = $negeri->id;
      }else {
        $negeri = "";
      }
      $masterstate = MasterState::orderBy('name','asc')->where('id','<>',17)->get();

      return response()->json(['emcid' => $entity->id,'user'=>$user,'entity'=>$entity,'daerah' => $daerah,'negeri' => $negeri,'masterstate' => $masterstate]);
    }

    public function senaraimakmal(Request $request,$id){
      // dd($id);
        $this->data['id'] = $id;
        $this->data['MasterPengawasan'] = MasterPengawasan::all();
        return view('pengguna.makmal_akreditasi',$this->data);
    }

    public function hantarpengguna(Request $request,$id) {
      $user = new User;
      $response = $user->hantarUser($id,'emc');

      return response()->json($response);
  }

    public function senaraimakmaldetail(Request $request){
      // dd('hai');
      if($request->ajax()) {
      $type = MakmalAkreditasi::where('emc_id',$request->id)->get();
      
      // dd($type);
            return datatables()->of($type)

                ->editColumn('kodmakmal', function ($type) {
                    return $type->kod_makmal;
                })
                ->editColumn('name', function ($type) {
                    return $type->nama_makmal;
                })
                ->editColumn('notel', function ($type) {
                    return $type->no_tel_makmal;
                })
                ->editColumn('address', function ($type) {
                    return $type->alamat_makmal;
                })
                ->editColumn('pengawasan', function ($type) {
                    return $type->makmal->jenis_pengawasan;
                })
                ->editColumn('action', function ($type) {
                    $button = "";
                    // $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                    // $button .= '<a onclick="parameterSungai('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';

                    // $button .= '<a onclick="edit1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                    // $button .= '<a onclick="parameterSungai1('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-plus"></i> Parameter</a>';
                    $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Padam</a>';
                    return $button;
                })
                ->make(true);
        }
    }
    public function makmalAkreditasisimpan(Request $request){
 
      $validator = Validator::make($request->all(), [
          'kodmakmal' => 'required|string',
          'labname' => 'required|string',
          'lab_tel1' => 'required|string',
          'location' => 'required|string',
          'Pengawasan' => 'required|string',
      ]);
      if ($validator->fails()) {
            // If validation failed
            return response()->json(['errors' => $validator->errors()], 422);
        }
      // dd($request->Pengawasan);
      if (!$request->Pengawasan) {
      
      }

      $MakmalAkreditasi = new MakmalAkreditasi();
      $MakmalAkreditasi->emc_id = $request->id;
      $MakmalAkreditasi->kod_makmal = $request->kodmakmal;
      $MakmalAkreditasi->nama_makmal = ucwords($request->labname);
      $MakmalAkreditasi->no_tel_makmal = $request->lab_tel1;
      $MakmalAkreditasi->alamat_makmal = $request->location;
      $MakmalAkreditasi->skop_pengawasan = $request->Pengawasan;
      $MakmalAkreditasi->save();

      // dd($request->id);
      $user = User::where('entity_type','App\UserEMC')->where('entity_id',$request->id)->first();
      // dd($user);
      if($user){
        $type = MakmalAkreditasi::where('emc_id',$request->id)->count();
        // dd($type);
        // return $type;
        // if($user->user_status_id != 3 || $user->user_status_id != 1){
          if($type > 0){
            // $user->user_status_id = 3;
          }else{
            $user->user_status_id = 8;
          }
        // }
        $user->save();
      }

      $MasterPengawasan = MasterPengawasan::all();
      // dd($MasterPengawasan);
      return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data baru berjaya ditambah.','id'=> $request->id, 'pengawasan' => $MasterPengawasan]);
    }

    public function makmalAkreditasibuang(Request $request,$id){

      $MakmalAkreditasi =  MakmalAkreditasi::where('id',$id);
      $id = $MakmalAkreditasi->first()->emc_id;
      $MakmalAkreditasi->delete();

      return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.', 'id'=>$id]);
    }

    public function insert_pengurusan_emc(Request $request) {
       
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'username' => 'required|string',
            'company_name' => 'required|string',
            'company_address' => 'required|string',
            'no_tel' => 'required|string',
            // 'faks' => 'required|string',
            // 'officer_name' => 'required|string',
            'email' => 'required|string|email|max:191',
            // 'lab' => 'required|string',
            // 'lab_tel' => 'required|string',
            // 'location' => 'required|string',
            'state_registered' => 'required',
            'district_registered' => 'required',
            'poskod' => 'required',
        ]);

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
                                'email' => ['E-mel xxxxx@doe.gov.my tidak boleh didaftar sebagai pihak syarikat.'],
                            ],
            ], 422);
        }


        // $entity = UserEMC::create([
        //     'syarikat' => strtoupper($request->company_name),
        //     'alamatsyarikat' => strtoupper($request->company_address),
        //     'nama_pegawai' => strtoupper($request->officer_name),
        //     'nama_makmal' => strtoupper($request->lab),
        //     'no_tel_makmal' => strtoupper($request->lab_tel),
        //     'alamat_makmal' => strtoupper($request->location),
        //     'negeri_id' => strtoupper($request->state_registered),
        //     'daerah_id' => strtoupper($request->district_registered),
        //     'poskod' => strtoupper($request->poskod),

        // ]);

        $entity = UserEMC::findOrFail($request->emcid);
        $entity->syarikat = strtoupper($request->company_name);
        $entity->alamatsyarikat = strtoupper($request->company_address);
        $entity->alamatsyarikat1 = strtoupper($request->company_address1);
        $entity->alamatsyarikat2 = strtoupper($request->company_address2);
        $entity->nama_pegawai = strtoupper($request->officer_name);
        $entity->nama_makmal = strtoupper($request->lab);
        $entity->no_tel_makmal = strtoupper($request->lab_tel);
        $entity->alamat_makmal = strtoupper($request->location);
        $entity->alamat_makmal1 = strtoupper($request->location1);
        $entity->alamat_makmal2 = strtoupper($request->location2);
        $entity->negeri_id = strtoupper($request->state_registered);
        $entity->daerah_id = strtoupper($request->district_registered);
        $entity->poskod = strtoupper($request->poskod);
        $entity->save();
        $user = $entity->user()->first();
        // dd($user->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->no_tel;
        $user->username = $request->username;
        $user->user_type_id = 3;
      
        $user->fax = $request->faks1;
        $user->password = bcrypt('password');
        $user->save();

        $password = 'password';
        // Mail::to($user['email'])->send(new PengesahanPengguna($user, 'Pengesahan Pengguna', $password));
          // dd(auth()->id());
        $userlogin = User::find(auth()->id());
        // Mail::to($userlogin->email)->send(new PengesahanPengguna($user, 'Pengesahan Pengguna', $password));

        $countuser = User::where('username',$request->username)->count();
        if($countuser > 1){
          $alluser = User::where('username',$request->username)->get();
          foreach($alluser as $allusers){
            $updateuser = User::where('username',$request->username)->first();
            $updateuser->password = bcrypt('password');
            $updateuser->email = $request->email;
            $updateuser->name = $request->name;
            $updateuser->save();
          }
        }

        //notifikasi kepada pegawai Jas(penyelia) untuk mengaktifkan Enviromental Office (eo)

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data baru berjaya ditambah.']);
        // return response()->json(['status' => 'success', 'title' => 'Selesai', 'message' => 'Maklumat EMC telah dihantar ke Pegawai Penyiasat']);
    }

    public function submit_pengurusan_emc(Request $request) {
      
        $makmalakredasi = MakmalAkreditasi::where('emc_id',$request->emcid)->get();
        if (count($makmalakredasi) == 0) {
            return response()->json(['status' => 'error', 'title' => '', 'message' => 'Sila pastikan anda telah mengisi maklumat Makmal Akreditasi.']);
            
        }
      // dd($request->emcid);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'username' => 'required|string',
            'company_name' => 'required|string',
            'company_address' => 'required',
            'no_tel' => 'required|string',
            // 'faks' => 'required|string',
            // 'officer_name' => 'required|string',
            'email' => 'required|string|email|max:191',
            // 'lab' => 'required|string',
            // 'lab_tel' => 'required|string',
            // 'location' => 'required|string',
            'state_registered' => 'required',
            'district_registered' => 'required',
            'poskod' => 'required',
        ]);

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
                                'email' => ['E-mel xxxxx@doe.gov.my tidak boleh didaftar sebagai pihak syarikat.'],
                            ],
            ], 422);
        }
        // dd($request->request);


        // $entity = UserEMC::create([
        //     'syarikat' => strtoupper($request->company_name),
        //     'alamatsyarikat' => strtoupper($request->company_address),
        //     'nama_pegawai' => strtoupper($request->officer_name),
        //     'nama_makmal' => strtoupper($request->lab),
        //     'no_tel_makmal' => strtoupper($request->lab_tel),
        //     'alamat_makmal' => strtoupper($request->location),
        //     'negeri_id' => strtoupper($request->state_registered),
        //     'daerah_id' => strtoupper($request->district_registered),
        //     'poskod' => strtoupper($request->poskod),

        // ]);

        $entity = UserEMC::findOrFail($request->emcid);
        // $entity->syarikat = strtoupper($request->company_name);
        // $entity->alamatsyarikat = strtoupper($request->company_address);
        // $entity->nama_pegawai = strtoupper($request->officer_name);
        // $entity->nama_makmal = strtoupper($request->lab);
        // $entity->no_tel_makmal = strtoupper($request->lab_tel);
        // $entity->alamat_makmal = strtoupper($request->location);
        // $entity->negeri_id = strtoupper($request->state_registered);
        // $entity->daerah_id = strtoupper($request->district_registered);
        // $entity->poskod = strtoupper($request->poskod);
        // $entity->save();

        // $user = $entity->user()->create([
        //     'name' => strtoupper($request->name),
        //     'email' => $request->email,
        //     'phone' => $request->no_tel,
        //     'username' => $request->username,
        //     'user_type_id' => 3,
        //     'user_status_id' => 3,
        //     'fax' => strtoupper($request->faks),
        //     'password' => bcrypt('password'),
        // ])->assignRole(['emc'])->assignRole(['ex']);

        $user = $entity->user()->first();
        // dd($user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->no_tel;
        $user->username = $request->username;
        $user->user_status_id = 9;
        $user->fax = $request->faks;      
        $user->save();
        // $user->fax = strtoupper($request->faks);
        // $user->password = bcrypt('password');



        $emc = UserEMC::where('id',$request->emcid)->first();
        $emc->syarikat = $request->company_name;
        $emc->alamatsyarikat = $request->company_address;
        $emc->alamatsyarikat1 = $request->company_address1;
        $emc->alamatsyarikat2 = $request->company_address2;
        $emc->nama_pegawai = $request->name;
        $emc->negeri_id = $request->state_registered;
        $emc->daerah_id = $request->district_registered;
        $emc->poskod = $request->poskod;
        $emc->save();

        $ProjekHasUser = ProjekHasUser::where('user_id',auth()->id())->first();

        $ProjekHasUseremc = ProjekHasUser::where('user_id',$user->id)->first();
        if ($ProjekHasUseremc) {
          $ProjekHasUserCreate = $ProjekHasUseremc;
        } else {
          $ProjekHasUserCreate = new ProjekHasUser;
        }
        
        $ProjekHasUserCreate->projek_id = $ProjekHasUser->projek_id;
        $ProjekHasUserCreate->user_id = $user->id;
        $ProjekHasUserCreate->save();
        // dd($user->email);
        $password = 'password';
        // Mail::to($user['email'])->send(new PengesahanPengguna($user, 'Pengesahan Pengguna', $password));
          // dd(auth()->id());
        $userlogin = User::find(auth()->id());
        // Mail::to($userlogin->email)->send(new PengesahanPengguna($user, 'Pengesahan Pengguna', $password));

        // $countuser = User::where('username',$request->username)->count();
        // if($countuser > 1){
        //   $alluser = User::where('username',$request->username)->get();
        //   foreach($alluser as $allusers){
        //     $updateuser = User::where('username',$request->username)->first();
        //     $updateuser->password = bcrypt('password');
        //     $updateuser->email = $request->email;
        //     $updateuser->name = strtoupper($request->name);
        //     $updateuser->save();
        //   }
        // }

        //notifikasi kepada pegawai Jas(penyelia) untuk mengaktifkan Enviromental Office (eo)
       //  Inbox::create([
       //    'subject' => 'Pengesahan Pendaftaran Enviromental Monitoring Consulant (EMC)',
       //    'message' => 'Terdapat pengesahan diperlukan untuk Pendaftaran Enviromental Monitoring Consulant (EMC)',
       //        'sender_user_id' => auth()->id(), //admin
       //        'receiver_user_id' => 8, //Penyelia
       //        'inbox_status_id' => 2,
       // ]);
        $ioid = ProjekHasUser::where('user_id',auth()->id())->first();
        $ioidpegawai = Projek::where('id',$ioid->projek_id)->first();
        $distribution = Distribution::where('no_fail_jas',$ioidpegawai->no_fail_jas)->first();
        
        // Inbox::create([
        //     'subject' => 'Pengesahan Pengguna Luar - EMC',
        //     'message' => 'Terdapat pengesahan diperlukan untuk Pendaftaran Enviromental Monitoring Consulant (EMC)',
        //     'sender_user_id' => $user->id,
        //     'receiver_user_id' => $distribution->assigned_to_user_id, //Penyelia
        //     'inbox_status_id' => 2,
        // ]);
          // dd($user);
        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data baru berjaya ditambah.']);
    }

    /**
     * Remove the specified resource from storage.
     * @param  Request $request
     * @return Response
     */
    public function delete_pengurusan_emc(Request $request) {
      // dd('dwdwdw');
        $user = User::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = 27;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Pengguna - Pengguna EMC";
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

    public function deactivate_pengurusan_emc(Request $request) {

        $user = User::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = 27;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Pengguna - Pengguna EMC";
        $log->data_old = json_encode($user);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user->user_status_id = 6;

        $user->save();

        $ioid = ProjekHasUser::where('user_id',auth()->id())->first();
        $ioidpegawai = Projek::where('id',$ioid->projek_id)->first();
        $distribution = Distribution::where('no_fail_jas',$ioidpegawai->no_fail_jas)->first();

        Inbox::create([
            'subject' => 'Nyah Aktif Pengguna Luar - EMC',
            'message' => 'Terdapat pengesahan diperlukan untuk Nyah Aktif Pengguna Enviromental Monitoring Consulant (EMC)',
            'sender_user_id' => $user->id,
            'receiver_user_id' => $distribution->assigned_to_user_id, //Penyelia
            'inbox_status_id' => 2,
            'url' => '/admin/user/external',
        ]);

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
    }

    public function activate_pengurusan_emc(Request $request) {

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

        $ioid = ProjekHasUser::where('user_id',auth()->id())->first();
        $ioidpegawai = Projek::where('id',$ioid->projek_id)->first();
        $distribution = Distribution::where('no_fail_jas',$ioidpegawai->no_fail_jas)->first();

        Inbox::create([
            'subject' => 'Aktifkan Pengguna Luar - EMC',
            'message' => 'Terdapat pengesahan diperlukan untuk Aktifkan Pengguna Enviromental Monitoring Consulant (EMC)',
            'sender_user_id' => $user->id,
            'receiver_user_id' => $distribution->assigned_to_user_id, //Penyelia
            'inbox_status_id' => 2,
            'url' => '/admin/user/external',
        ]);

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
    }

    public function view_user(Request $request) {

        $user = User::findOrFail($request->id);
        $user2 = $user->entity_emc;
        $negeri = $user->entity_emc->state;
        $daerah = $user->entity_emc->district;
        // dd($negeri);
        // $datekompetensi = date("d/m/Y", strtotime($user2->date_kompetensi));
        $log = new LogSystem;
        $log->module_id = 27;
        $log->activity_type_id = 6;
        $log->description = "Lihat Pengurusan Pengguna - Pengguna EMC";
        $log->data_old = json_encode($user);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json(['status' => 'success', 'userdata' => $user,'userdata2' => $user2,'negeri' => $negeri,'daerah' => $daerah]);
    }

    public function checkemc(Request $request) {
      // dd('sini hoi');
      $user = User::where('username',$request->id)->first();
      // if($user->entity_type == 'App\UserPP'){
      //   return response()->json(['status' => 'fail']);
      // }
      $user2 = $user->entity_emc;
      // dd($user);
      $negeri = $user->entity_emc->state;
      $daerah = $user->entity_emc->district;
      // $datekompetensi = date("d/m/Y", strtotime($user2->date_kompetensi));

      return response()->json(['status' => 'success', 'userdata' => $user,'userdata2' => $user2,'negeri' => $negeri,'daerah' => $daerah]);
  }

}
