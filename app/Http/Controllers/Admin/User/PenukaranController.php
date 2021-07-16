<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\LogModel\LogSystem;
use App\MasterModel\MasterProvinceOffice;
use App\MasterModel\MasterUserStatus;
use App\Permission;
// use App\Permission;
use App\Role;
// use App\User;
use App\User;
use App\UserStaff;
use Auth;
use Illuminate\Http\Request;
use Validator;
use App\MasterModel\MasterState;
use App\Distribution;

class PenukaranController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}

	public function penukaran(Request $request){
		$all_status = MasterUserStatus::all();
		$provinces = MasterProvinceOffice::all();
		$roles = Role::whereNotIn('name', ['superadmin', 'admin', 'pengguna_dalam', 'pengguna_luar'])->get();
		$permissions = Permission::all();

		if ($request->ajax()) {
			$log = new LogSystem;
			$log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
			$log->activity_type_id = 1;
			$log->description = "Papar senarai Pengurusan Pengguna - Pengguna Dalaman";
			$log->data_old = json_encode($request->input());
			$log->url = $request->fullUrl();
			$log->method = strtoupper($request->method());
			$log->ip_address = $request->ip();
			$log->created_by_user_id = auth()->id();
			$log->save();

			if(auth()->user()->hasAnyRole(['admin_hq','superadmin'])){
				$user = User::where('user_type_id', 2)->with(['entity_staff.province_office', 'entity_staff.role', 'status'])->wherehas('entity_staff',function($user_staff) {
					return $user_staff->whereIn('role_id',[7,8,9]);
				});				

			}

			return datatables()->of($user)
			->editColumn('name', function ($user) {
				if ($user->isOnline() && $user->is_login) {
					return '<span style="color: #25e125;">●</span> ' . $user->name . '<br><small style="font-size: smaller;">' . $user->email . '</small>';
				} else {
					return $user->name . '<br><small style="font-size: smaller;">' . $user->email . '</small>';
				}

			})
			->editColumn('username', function ($user) {
				return '<span class="label label-default">' . $user->username . '</span>';
			})
			->editColumn('entity_staff.province_office.name', function ($user) {
				if ($user->entity_internal) {
					return $user->entity_internal->province_office->name;
				} else {
					return $user->model_has_role->role;
				}
			})
			->editColumn('state', function ($user) {
				if(!$user->entity_staff){
					return "Superadmin HQ";
				}else{
					return $user->entity_staff->state->name;
				}
			})
			->editColumn('status.name', function ($user) {
				if ($user->user_status_id == 1) {
					return '<span class="badge badge-success">Aktif</span>';
				}

				if ($user->user_status_id == 3) {
					return '<span class="badge badge-default">Belum Disahkan</span>';
				} else {
					return '<span class="badge badge-danger">' . $user->status->name . '</span>';
				}

			})

			->editColumn('action', function ($user) {
				$button = "";
				if(auth()->user()->hasAnyRole(['superadmin','admin_hq'])){
					$button .= '<a data-toggle="tooltip" title="Kemaskini" onclick="edit(' . $user->id . ')" href="javascript:;" class="btn text-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i></a>';
				}

				return $button;
			})

			->make(true);
		}
		return view('admin.user.internal.penukaran_staf', compact('all_status', 'provinces', 'roles', 'permissions'));
	}

	public function penukaran_process($id=null,Request $request){

		$log = new LogSystem;
		$log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
		$log->activity_type_id = 3;
		$log->description = "Popup kemaskini Pengurusan Pengguna - Pengguna Dalaman";
		$log->url = $request->fullUrl();
		$log->method = strtoupper($request->method());
		$log->ip_address = $request->ip();
		$log->created_by_user_id = auth()->id();
		$log->save();

		$all_status = MasterUserStatus::all();
		$provinces = MasterProvinceOffice::all();
		$roles = Role::whereNotIn('name', ['superadmin', 'admin', 'pengguna_dalam', 'pengguna_luar', 'dnegara', 'lnegara'])->get();
		$user = User::findOrFail($request->id);
		$staff_permision_via_roles = $user->getPermissionsViaRoles();
		$state = MasterState::all();
		$permissions = Permission::whereNotIn('name', $staff_permision_via_roles->pluck('name'))->get();

		$staff_roles = $user->getRoleNames();
		$staff_state = $user->entity_staff->state->name;

		$user_staff_negeri = User::with(['entity_staff.role'])->wherehas('entity_staff',function($user_staff) use ($user) {
			return $user_staff->where('state_id',$user->entity_staff->state_id);
		})->get();	
		// dd($user_staff_negeri);

		$distribution="";
		if($user->hasAnyRole(['pelulus','pengarah'])){
			$distribution = Distribution::where('assigned_pelulus',$user->id)->get();
		}elseif ($user->hasAnyRole(['penyelia'])) {
			$distribution = Distribution::where('assigned_penyelia',$user->id)->get();
		}elseif($user->hasAnyRole(['penyiasat'])){
			$distribution = Distribution::where('assigned_to_user_id',$user->id)->get();
		}		

		return view('admin.user.internal.penukaran_edit', compact('state','staff_state','all_status', 'provinces', 'roles', 'user', 'staff_roles', 'permissions', 'staff_permision_via_roles','distribution','user_staff_negeri'));
	}

	public function penukaran_process_post(Request $request,$id){
		// dd($request->all());
		$log = new LogSystem;
		$log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
		$log->activity_type_id = 3;
		$log->description = "Popup kemaskini Penukaran Pengguna - Pengguna Dalaman";
		$log->url = $request->fullUrl();
		$log->method = strtoupper($request->method());
		$log->ip_address = $request->ip();
		$log->created_by_user_id = auth()->id();
		$log->save();
		// dd($request->all());
		$user_staff = UserStaff::where('user_id',$id)->first();
		$user_staff->state_id = $request->state;
		$user_staff->save();
		
		$distribution = Distribution::whereIn('no_fail_jas',[$request->project])->get();
		// dd($distribution);
		foreach ($distribution as $dist) {
			$inactive = Distribution::where('id',$dist->id)->first();
			$inactive->active=0;
			$inactive->save();

			$active = new Distribution();
			$active->no_fail_jas = $dist->no_fail_jas;
			$active->active=1;
			$active->assigned_by=auth()->user()->id;
			if($request->inactive_user == $inactive->assigned_to_user_id){
				$active->assigned_to_user_id=$request->assign_user_id; 
			}else{
				$active->assigned_to_user_id=$dist->assigned_to_user_id;
			}

			if($request->inactive_user == $inactive->assigned_to_user_id){
				$active->assigned_penyelia=$request->assign_user_id; 
			}else{
				$active->assigned_penyelia=$dist->assigned_penyelia;
			}

			if($request->inactive_user == $inactive->assigned_to_user_id){
				$active->assigned_pelulus=$request->assign_user_id; 
			}else{
				$active->assigned_pelulus=$dist->assigned_pelulus;
			}
			$active->save();
		}



		return response()->json(['test' => 'Berjaya', 'text' => 'Maklumat berjaya dikemaskini', 'status' => 'success'],200);
	}
}
