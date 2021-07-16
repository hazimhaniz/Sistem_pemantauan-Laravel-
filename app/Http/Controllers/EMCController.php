<?php

namespace App\Http\Controllers;

use App\JenisPengawasan;
use App\MasterModel\MasterDistrict;
use App\MasterModel\MasterFilingStatus;
use App\MasterModel\MasterPengawasan;
use App\MasterModel\MasterState;
use App\MasterModel\MasterUserStatus;
use App\MasterModel\MasterUserType;
use App\Notifications\SendMail;
use App\Projek;
use App\LogSystem;
use App\ProjekDetail;
use App\ProjekHasPp;
use App\ProjekHasUser;
use App\ProjekHelper;
use App\ProjekPengawasan;
use App\User;
use App\UserEMC;
use App\UserPP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\UserEO;
use Session;
// use App\Mail\Pengguna\PendaftaranPenggunaEMC;
use Mail;

class EMCController extends Controller
{
    public function daftarEMC(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'username' => 'required',
        ], [
            'username.required' => 'Sila masukkan no. kad pengenalan.',
        ]);

        if ($validator->fails()) {
          Session::flash('gagalEMC', 'Pendaftaran EMC Tidak Berjaya. Sila masukkan no kad pengenalan.');
          return redirect()->back();
      }


    //  if no kad pengenalan sama dengan EO, return error
      $dahjadieo = UserEO::where('username', $request->username)->first();
      if (!empty($dahjadieo)) {
        Session::flash('eoxemc');
        return redirect()->back();
        exit();
      }

    //  if no kad pengenalan sama dengan PP, return error
      $ppExist = UserPP::where('username', $request->username)->first();
      if (!empty($ppExist)) {
        Session::flash('pp_exist');
        return redirect()->back();
        exit();
      }
      
    DB::beginTransaction();
    $entity = UserEMC::firstOrCreate(['username' => $request->username]);
      $entity->username = $request->username;
      $entity->syarikat = strtoupper($request->syarikat);
      $entity->alamatsyarikat = strtoupper($request->alamatsyarikat);
      $entity->alamatsyarikat1 = strtoupper($request->alamatsyarikat1);
      $entity->alamatsyarikat2 = strtoupper($request->alamatsyarikat2);
      $entity->nama_pegawai = strtoupper($request->officer_name);
      $entity->nama_makmal = strtoupper($request->nama_makmal);
      $entity->no_tel_makmal = strtoupper($request->no_tel_makmal);
      $entity->kod_makmal = strtoupper($request->kod_makmal);
      $entity->alamat_makmal = strtoupper($request->alamat_makmal);
      $entity->alamat_makmal1 = strtoupper($request->alamat_makmal1);
      $entity->alamat_makmal2 = strtoupper($request->alamat_makmal2);
      $entity->negeri_id = $request->negeri_id;
      $entity->daerah_id = $request->daerah_id;
    //   $entity->poskod = $request->poskod;
      $entity->makmal_negeri_id = $request->makmal_negeri_id;
      $entity->makmal_daerah_id = $request->makmal_daerah_id;
      $entity->save();


      $log = new LogSystem;
      $log->module_id = 27; //pendaftaran pengguna
      $log->activity_type_id = 4; //tambah data
      $log->description = "Pendaftaran EMC";
      $log->url = $request->fullUrl();
      $log->method = strtoupper($request->method());
      $log->ip_address = $request->ip();
      $log->created_by_user_id = auth()->user()->id;
      $log->save();

      $user = User::firstOrCreate(['username' => $request->username]);

      $user->entity_type = "App\UserEMC";
      $user->entity_id = $entity->id;

      if (empty($user->email_sent)) {
        $user->password = bcrypt('password');
    }

    $user->username = $request->username;
    $user->name = $request->officer_name;
    $user->email = $request->email;
    $user->phone = $request->no_tel;
    $user->user_type_id = 3;
    $user->fax = $request->faks1;
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

        sendMail($user, 25, $data);
        sendNotification(17, $data);
    }
    $user->save();

    $user->assignRole(['emc'])->assignRole(['ex']);

        $projekHasPP = ProjekHasPp::where('projek_id', $request->projekID)->first();

        $ProjekHasUser = ProjekHasUser::firstOrCreate(['projek_id' => $request->projekID, 'user_id' => $user->id]);
        $ProjekHasUser->projek_has_pp_id = $projekHasPP->id;
        $ProjekHasUser->role_id = 6;
        $ProjekHasUser->status = 103;
        $ProjekHasUser->save();

        // $projekPengawasan = ProjekPengawasan::firstOrCreate(['projek_id' => $request->projekID, 'pengawasan_id' => $request->pengawasan_id]);
        // $projekPengawasan->user_id = $user->id;
        // $projekPengawasan->projek_has_userid = $ProjekHasUser->id;
        // // // new columns addded
        // $projekPengawasan->nama_makmal = strtoupper($request->nama_makmal);
        // $projekPengawasan->kod_makmal = strtoupper($request->kod_makmal);
        // $projekPengawasan->no_tel_makmal = $request->no_tel_makmal;
        // $projekPengawasan->alamat_makmal = strtoupper($request->alamat_makmal);
        // $projekPengawasan->alamat_makmal1 = strtoupper($request->alamat_makmal1);
        // $projekPengawasan->alamat_makmal2 = strtoupper($request->alamat_makmal2);
        // $projekPengawasan->makmal_negeri_id = $request->makmal_negeri_id;
        // $projekPengawasan->makmal_daerah_id = $request->makmal_daerah_id;
        // $projekPengawasan->save();

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

    // $projek = Projek::with('projekdetail')->findOrFail($request->projekID);
    // $data = [
    //     'projek'         => $projek->nama_projek . ',' . ($projek->projekdetail ? $projek->projekdetail->lokasi : ''),
    //     'no_fail_jas'    => $projek->no_fail_jas,
    //     'email'          => $request->email,
    //     'nama_emc'       => $request->officer_name,
    //     'kad_pengenalan' => $request->username
    //     ];
    // Mail::to($request->email)->send(new PendaftaranPenggunaEMC($data, 'Pendaftaran Pengguna EMC'));

    DB::commit();
    Session::flash('DaftarEMC', 'Pendaftaran EMC sudah berjaya');
    return redirect()->back();
}


public function simpanPengawasan(Request $request)
{
    $input = $request->all();

    $validator = Validator::make($input, [
        'pengawasan_id' => 'required',
        'kod_makmal' => 'required',
        'nama_makmal' => 'required',
        'no_tel_makmal' => 'required',
        'alamat_makmal' => 'required',
        'makmal_negeri_id' => 'required',
        'poskod' => 'required',
        'makmal_daerah_id' => 'required',
    ], [
        'pengawasan_id.required' => 'Sila pilih pengawasan.',
        'kod_makmal.required' => 'Sila isi kod makmal.',
        'nama_makmal.required' => 'Sila Isi nama makmal',
        'no_tel_makmal.required' => 'Sila Isi no telefon makmal',
        'alamat_makmal.required' => 'Sila Isi alamat makmal',
        'makmal_negeri_id.required' => 'Sila pilih negeri.',
        'poskod.required' => 'Sila isi poskod.',
        'makmal_daerah_id.required' => 'Sila semak daerah.',

    ]);

    if (!in_array($request->pengawasan_id, [6, 7, 8, 9])) {
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'code' => 422,
                'message' => $validator->errors(),
            ]);
        }
    }

    $entity = UserEMC::firstOrCreate(['username' => $request->username]);

    $entity->username = $request->username;
    $entity->syarikat = strtoupper($request->syarikat);
    $entity->alamatsyarikat = strtoupper($request->alamatsyarikat);
    $entity->alamatsyarikat1 = strtoupper($request->alamatsyarikat1);
    $entity->alamatsyarikat2 = strtoupper($request->alamatsyarikat2);
    $entity->nama_pegawai = strtoupper($request->officer_name);
    $entity->nama_makmal = strtoupper($request->nama_makmal);
    $entity->no_tel_makmal = strtoupper($request->no_tel_makmal);
    $entity->kod_makmal = strtoupper($request->kod_makmal);
    $entity->alamat_makmal = strtoupper($request->alamat_makmal);
    $entity->alamat_makmal1 = strtoupper($request->alamat_makmal1);
    $entity->alamat_makmal2 = strtoupper($request->alamat_makmal2);
    $entity->negeri_id = $request->negeri_id;
    $entity->daerah_id = $request->daerah_id;
    $entity->poskod = $request->poskod;
    $entity->makmal_negeri_id = $request->makmal_negeri_id;
    $entity->makmal_daerah_id = $request->makmal_daerah_id;
    $entity->save();

    $user = User::firstOrCreate(['username' => $request->username]);
    $user->entity_type = "App\UserEMC";
    $user->entity_id = $entity->id;

    if (empty($user->email_sent)) {
        $user->password = bcrypt('password');
    }

    $user->username = $request->username;
    $user->name = $request->officer_name;
    $user->email = $request->email;
    $user->phone = $request->no_tel;
    $user->user_type_id = 3;
    $user->fax = $request->faks1;
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

            // sendMail($user, 25, $data);
            // sendNotification(17, $data);
    }
    $user->save();
        // $user->assignRole(['emc'])->assignRole(['ex']);

        // $projekHasPP = ProjekHasPp::where('projek_id', $request->projekID)->first();

        // $ProjekHasUser = ProjekHasUser::firstOrCreate(['projek_id' => $request->projekID, 'user_id' => $user->id]);
        // $ProjekHasUser->projek_has_pp_id = $projekHasPP->id;
        // $ProjekHasUser->role_id = 6;
        // $ProjekHasUser->status = 103;
        // $ProjekHasUser->replace_user_id = $request->old_user_emc;
        // $ProjekHasUser->save();

    $projekPengawasan = ProjekPengawasan::firstOrCreate(['projek_id' => $request->projekID, 'pengawasan_id' => $request->pengawasan_id]);
    $projekPengawasan->user_id = $user->id;
        // $projekPengawasan->projek_has_userid = $ProjekHasUser->id;

        // new columns addded
    $projekPengawasan->nama_makmal = strtoupper($request->nama_makmal);
    $projekPengawasan->kod_makmal = strtoupper($request->kod_makmal);
    $projekPengawasan->no_tel_makmal = $request->no_tel_makmal;
    $projekPengawasan->alamat_makmal = strtoupper($request->alamat_makmal);
    $projekPengawasan->alamat_makmal1 = strtoupper($request->alamat_makmal1);
    $projekPengawasan->alamat_makmal2 = strtoupper($request->alamat_makmal2);
    $projekPengawasan->makmal_negeri_id = $request->makmal_negeri_id;
    $projekPengawasan->makmal_daerah_id = $request->makmal_daerah_id;
    $projekPengawasan->poskod = $request->poskod;
    $projekPengawasan->save();

    return response()->json(['title' => 'Berjaya', 'message' => 'Maklumat berjaya disimpan.', 'status' => 'success', 'pengawasan' => $projekPengawasan]);
}

public function getTableEMCPengawasan($projek_id, $userID)
{

    $pengawasan = ProjekPengawasan::where('projek_id', $projek_id)->where('user_id', $userID)->get();

    return view('form-backup.senarai_pengawasan', compact('pengawasan'));
}

public function checkuseremc($id, $projekid)
{
        // $ProjekHasUserEMCs = ProjekHasUser::where('projek_id', $projekid)->get();
        // $userId = [];
        // foreach ($ProjekHasUserEMCs as $key => $value) {
        //     $userId[$key] = $value->user_id;
        // }

        // $getUsersOfProjek = User::where('username',$id)->where('entity_type','App\UserEMC')->first();
    $getUsersOfProjek = User::where('username', $id)->first();
    $exists = $success = $userDetails = false;

    if ($getUsersOfProjek) {
            // if(in_array($getUsersOfProjek->id, $userId)) {
        $exists = $getUsersOfProjek;
        $userDetails = UserEMC::where('username', $id)->first();
        $success = true;
            // }
    }

    return ['success' => $success, 'data' => $exists, 'userDetails' => $userDetails];
}

public function pendEMC(Request $request)
{
    $projekID = $request->projekID;
    $ProjekHasUserEMCs = ProjekHasUser::where('projek_id', $projekID)->where('role_id', 6)->where('status', 101)->get();

    $masterpengawasans = MasterPengawasan::get();
    $states = MasterState::get();
    $districts = MasterDistrict::get();
    $pengawasan = JenisPengawasan::where('projek_id', $projekID)->select(['jenis_pengawasan_id'])->first();
    $pengawasanId = [];
    if ($pengawasan) {
        $pengawasan = json_decode($pengawasan->jenis_pengawasan_id);
        foreach ($pengawasan as $key => $value) {
            $pengawasanId[$key] = $value;
        }
    }

    return view('form-backup.pendEMC', compact('projekID', 'ProjekHasUserEMCs', 'masterpengawasans', 'states', 'districts', 'pengawasanId'));
}

public function penukaranEMC(Request $request)
{
    $projekID = $request->projekID;
    $ProjekHasUserEMCs = ProjekHasUser::where('projek_id', $projekID)->where('role_id', 6)->where('status', 101)->get();

    $masterpengawasans = MasterPengawasan::get();
    $states = MasterState::get();
    $districts = MasterDistrict::get();
    $pengawasan = JenisPengawasan::where('projek_id', $projekID)->select(['jenis_pengawasan_id'])->first();
    $pengawasanId = [];
    if ($pengawasan) {
        $pengawasan = json_decode($pengawasan->jenis_pengawasan_id);
        foreach ($pengawasan as $key => $value) {
            $pengawasanId[$key] = $value;
        }
    }

    return view('projek.penukaranEMC', compact('projekID', 'ProjekHasUserEMCs', 'masterpengawasans', 'states', 'districts', 'pengawasanId'));
}
public function getdistricts($id, $type)
{
    $districts = MasterDistrict::where('state_id', $id)->get();
    return ['districts' => $districts, 'type' => $type];
}

public function penukaranEMCSubmit(Request $request)
{
    $entity = UserEMC::firstOrCreate(['username' => $request->username]);

    $entity->username = $request->username;
    $entity->syarikat = strtoupper($request->syarikat);
    $entity->alamatsyarikat = strtoupper($request->alamatsyarikat);
    $entity->alamatsyarikat1 = strtoupper($request->alamatsyarikat1);
    $entity->alamatsyarikat2 = strtoupper($request->alamatsyarikat2);
    $entity->nama_pegawai = strtoupper($request->officer_name);
    $entity->negeri_id = $request->negeri_id;
    $entity->daerah_id = $request->daerah_id;

    $entity->nama_makmal = strtoupper($request->nama_makmal);
    $entity->kod_makmal = strtoupper($request->kod_makmal);
    $entity->no_tel_makmal = $request->no_tel_makmal;
    $entity->alamat_makmal = strtoupper($request->alamat_makmal);
    $entity->alamat_makmal1 = strtoupper($request->alamat_makmal1);
    $entity->alamat_makmal2 = strtoupper($request->alamat_makmal2);

    $entity->makmal_negeri_id = $request->makmal_negeri_id;
    $entity->makmal_daerah_id = $request->makmal_daerah_id;

    $entity->poskod = $request->poskod;

    $entity->save();
    $user = User::where('username', $request->username)->first();

    if (empty($user)) {
        $user = new User;
    }

    $user->entity_type = "App\UserEMC";
    $user->entity_id = $entity->id;
    if (empty($user->email_sent)) {
        $user->password = bcrypt('password');
    }

    $user->username = $request->username;
    $user->name = $request->officer_name;
    $user->email = $request->email;
    $user->phone = $request->no_tel;
    $user->user_type_id = 3;
    $user->user_status_id = 103;
    $user->fax = $request->faks;
    $user->save();

    $user->assignRole(['emc'])->assignRole(['ex']);

    $projekHasPP = ProjekHasPp::where('projek_id', $request->projekID)->first();

    $ProjekHasUser = ProjekHasUser::firstOrCreate(['projek_id' => $request->projekID, 'user_id' => $user->id]);
    $ProjekHasUser->projek_has_pp_id = $projekHasPP->id;
    $ProjekHasUser->role_id = 6;
    $ProjekHasUser->status = 103;
    $ProjekHasUser->replace_user_id = $request->old_user_emc;
    $ProjekHasUser->save();

    $projekPengawasan = ProjekPengawasan::firstOrCreate(['projek_id' => $request->projekID, 'pengawasan_id' => $request->pengawasan_id]);
    $projekPengawasan->user_id = $user->id;
    $projekPengawasan->projek_has_userid = $ProjekHasUser->id;
        // new colum for  emc
    $projekPengawasan->nama_makmal = strtoupper($request->nama_makmal);
    $projekPengawasan->kod_makmal = strtoupper($request->kod_makmal);
    $projekPengawasan->no_tel_makmal = $request->no_tel_makmal;
    $projekPengawasan->alamat_makmal = strtoupper($request->alamat_makmal);
    $projekPengawasan->alamat_makmal1 = strtoupper($request->alamat_makmal1);
    $projekPengawasan->alamat_makmal2 = strtoupper($request->alamat_makmal2);
    $projekPengawasan->makmal_negeri_id = $request->makmal_negeri_id;
    $projekPengawasan->makmal_daerah_id = $request->makmal_daerah_id;

    $projekPengawasan->save();

    $log = new LogSystem;
      $log->module_id = 27; //pendaftaran pengguna
      $log->activity_type_id = 5; //kemaskini data
      $log->description = "Penukaran EMC";
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
    return redirect()->back();
}

public function adminList(Request $request)
{
    $status = [101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113];

    if ($request->ajax()) {

        $userEMC = ProjekHasUser::where('role_id', '=', '6')->whereIn('status', $status);

        return datatables()->of($userEMC->orderBy('created_at','DESC')->get())
        ->editColumn('no_fail_jas', function ($userEMC) {
            return $userEMC->projek ? $userEMC->projek->no_fail_jas : '';
        })
        ->editColumn('nama_projek', function ($userEMC) {
            $projekName = $userEMC->projek ? $userEMC->projek->nama_projek : '';
            return "<span class='ow pull-left'>" . $projekName . "</span>";
        })
        ->editColumn('nama_pengguna', function ($userEMC) {
            return $userEMC->user ? $userEMC->user->name : '';
        })
        ->editColumn('peranan', function ($userEMC) {
            return $userEMC->role ? $userEMC->role->description : '';
        })
        ->editColumn('status', function ($userEMC) {
            $status = $userEMC->statusFiling ? $userEMC->statusFiling->name : '';
            $badge = $userEMC->statusFiling ? $userEMC->statusFiling->badge : '';
            return '<span class="label label-lg label-inline ' . $badge . '">' . $status . '</span>';
        })
        ->editColumn('action', function ($userEMC) {

            $button = "";

            $button .= '<button onclick="tindakanModal(' . $userEMC->id . ')" type="button" class="btn fail btn-sm m-t-5"> TINDAKAN </button>';

            return $button;
        })
        ->make(true);
    }
    $types = MasterUserType::whereIn('id', [3, 4])->get();
    $all_status = MasterUserStatus::all();
    $legendStatuses = MasterFilingStatus::whereIn('id', $status)->get();

    return view('pengurusan_emc.adminList', compact('types', 'all_status', 'legendStatuses'));
}

public function adminTindakanModal(Request $request)
{
    $projekHasUserID = $request->projekHasUserID;

    $projekHasUser = ProjekHasUser::where('id', $projekHasUserID)->first();
    $projek = $projekHasUser->projek;
    $user = $projekHasUser->user;
    $UserEMC = UserEMC::where('id', $user->entity_id)->first();

    $projekHasPP = ProjekHasPp::where('projek_id', $projek->id)->first();

    $projek_pengawasan = ProjekPengawasan::where('projek_id', $projek->id)->where('user_id', $projekHasUser->user_id)->get();
    $count = count($projek_pengawasan);

        // foreach ($projek_pengawasan as $key => $value) {

        //     if ($projek_pengawasan) {
        //         $pengwasananama = MasterPengawasan::where('id', $projek_pengawasan->pengawasan_id)->first();
        //         $pengwasananama = $pengwasananama->jenis_pengawasan;
        //     } else {
        //         $pengwasananama = '-';
        //     }
        // }

    return view('pengurusan_emc.adminTindakanModal', compact('projekHasUserID', 'projekHasUser', 'projek', 'user', 'UserEMC', 'projekHasPP', 'projek_pengawasan', 'count'));
}

public function adminTindakanModalSubmit(Request $request)
{
    DB::beginTransaction();
    $projekHasUserID = $request->projekHasUserID;

    $projekHasUser = ProjekHasUser::where('id', $projekHasUserID)->first();
    $projekHasUser->status = $request->status;
    $projekHasUser->save();

    $user = User::where('id', $projekHasUser->user_id)->first();

    if ($request->status == 101) {

        $user->user_status_id = "101";
        $user->save();

        if ($projekHasUser->replace_user_id) {
            $projekHasUserReplace = ProjekHasUser::where('projek_id', $projekHasUser->projek_id)->where('user_id', $projekHasUser->replace_user_id)->where('role_id', 6)->first();
            $projekHasUserReplace->status = 112;
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

            sendMail($user, 27, $data);
            sendNotification(21, $data);
        }
    } else if ($request->status == 102) {
        $data = [
            'receiver_user_id' => $user->id,
            'no_fail_jas' => $projekHasUser->projek->no_fail_jas,
            'nama_projek' => $projekHasUser->projek->nama_projek,
            'username' => $user->username,
            'sebab_ditolak' => 'BUKAN WARGANEGARA MALAYSIA',
        ];

            // sendMail($user, 28, $data);
        sendNotification(29, $data);
    } else if ($request->status == 105) {
        $data = [
            'receiver_user_id' => $user->id,
            'no_fail_jas' => $projekHasUser->projek->no_fail_jas,
            'nama_projek' => $projekHasUser->projek->nama_projek,
            'username' => $user->username,
            'sebab_ditolak' => 'TIADA PENGESAHAN',
        ];

            // sendMail($user, 28, $data);
        sendNotification(29, $data);
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

}
