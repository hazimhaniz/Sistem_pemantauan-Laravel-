<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\LogModel\LogSystem;
use App\MasterModel\MasterProvinceOffice;
use App\MasterModel\MasterUserStatus;
use App\MasterModel\MasterState;
use App\Permission;
// use App\Permission;
use App\Role;
// use App\User;
use App\User;
use App\UserStaff;
use Auth;
use Illuminate\Http\Request;
use Validator;

class UserInternalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $permissions = Permission::all();
        if ($request->ajax()) {

            // show user by state only
         if(auth()->user()->hasAnyRole(['superadmin','penyelia','pengarah','pelulus','admin_state'])){
            if ($request->province_office_id == 1)  { $province = ['10','14','15','16']; }
            elseif ($request->province_office_id == 2)  { $province = ['4','5']; }
            elseif ($request->province_office_id == 3)  { $province = ['6']; }
            elseif ($request->province_office_id == 4)  { $province = ['3','11']; }
            elseif ($request->province_office_id == 5)  { $province = ['1']; }
            elseif ($request->province_office_id == 6)  { $province = ['2','7','9']; }
            elseif ($request->province_office_id == 7)  { $province = ['12']; }
            elseif ($request->province_office_id == 8)  { $province = ['13']; }
            elseif ($request->province_office_id == 9)  { $province = ['8']; }
            elseif ($request->province_office_id == 10) { $province = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17']; }
            else { $province = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17']; }

            $user = User::where('user_type_id', 2)->with(['entity_staff.role', 'entity_staff.state', 'status'])->whereHas('entity_staff', function ($user_staff) use ($province) {
                return $user_staff->whereIn('state_id', $province);
            });
        }elseif(auth()->user()->hasAnyRole(['superadmin','admin_hq'])){

            $province = MasterState::pluck('id');
            $user = User::where('user_type_id', 2)->with(['entity_staff.role', 'entity_staff.state', 'status'])->whereHas('entity_staff', function ($user_staff) use ($province) {
                return $user_staff->whereIn('state_id', [$province]);
            });
        }
        $provinceOfficeID = $request->province_office_id ? $request->province_office_id : '-1';

            // search by peranan only
            if ($provinceOfficeID == -1 && $request->status_id == -1 && $request->role_id != -1) {
                $user = $user->whereHas('entity_staff.role', function ($role) use ($request) {
                    return $role->where('role_id', $request->role_id);
                });
            } 
            // search by status only
            elseif ($provinceOfficeID == -1 && $request->status_id != -1 && $request->role_id == -1) {
                $user = $user->where('user_status_id', $request->status_id);
            }
            // search by province id
            elseif ($provinceOfficeID != -1 && $request->role_id == -1 && $request->status_id == -1) {
                $user = $user;
            }
            // search by peranan && status
            elseif ($provinceOfficeID == -1 && $request->role_id != -1 && $request->status_id != -1) {
                $user = $user->where('user_status_id', $request->status_id)->whereHas('entity_staff.role', function ($role) use ($request) {
                    return $role->where('role_id', $request->role_id);
                });
            }
            // search by peranan && province
            elseif ($provinceOfficeID != -1 && $request->role_id != -1 && $request->status_id == -1) {
                $user = $user->whereHas('entity_staff', function ($user_staff) use ($request,$province) {
                    return $user_staff->where('role_id', $request->role_id)->whereIn('state_id', $province);
                });
            }
            // search by status && province
            elseif ($provinceOfficeID != -1 && $request->role_id == -1 && $request->status_id != -1) {
                $user = $user->where('user_status_id', $request->status_id)->whereHas('entity_staff', function ($user_staff) use ($request,$province) {
                    return $user_staff->whereIn('state_id', $province);
                });
            }
            // search by peranan && status && province
            elseif ($provinceOfficeID != -1 && $request->role_id != -1 && $request->status_id != -1) {
                $user = $user->where('user_status_id', $request->status_id)->whereHas('entity_staff', function ($user_staff) use ($request,$province) {
                    return $user_staff->where('role_id', $request->role_id)->whereIn('state_id', $province);
                });
            }elseif(auth()->user()->hasAnyRole(['admin_hq','superadmin'])){
                $user = User::where('user_type_id', 2)->with(['entity_staff.province_office', 'entity_staff.role', 'status']);
            }
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
            /*->editColumn('created_at', function ($user) {
            return $user->created_at ? date('d/m/Y', strtotime($user->created_at)) : date('d/m/Y');
        })*/
        ->editColumn('entity_staff.province_office.name', function ($user) {
            if ($user->entity_internal) {
                $role = $user->entity_internal->province_office->name;
            } else {
                $role = $user->entity_staff->role->name ?? $user->model_has_role->role->name;
            }
            if($role == 'staff') {
                $role = 'Pentadbir Sistem';
            }
            return ucwords($role);
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
            $button .= '<a data-toggle="tooltip" title="Kemaskini" onclick="edit(' . $user->id . ')" href="javascript:;" class="btn text-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i></a>';

            if(auth()->user()->hasAnyRole(['superadmin','admin_hq'])){
                // $button .= '<a data-toggle="tooltip" title="Padam" onclick="remove(' . $user->id . ')" href="javascript:;" class="btn text-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i></a>';
                $button .= '<a data-toggle="tooltip" title="Kemaskini Kata Laluan" onclick="passwordUser(' . $user->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5"><i class="fa fa-lock"></i></a>';
            }

            return $button;
        })

        ->make(true);
        return view('admin.user.internal.index');
            
    }

//     return view('admin.user.internal.index');
// }

public function index(Request $request)
{
    if(auth()->user()->hasRole('penyelia')) {
        $viewRole = ['7','8','9','10','11'];
    } else {
        $viewRole = ['1','2','3','4','5','6','7','8','9','10','11'];
    }
    $roles = Role::whereNotIn('name', ['superadmin', 'admin', 'pengguna_dalam', 'pengguna_luar', 'dnegara', 'lnegara'])->whereIn('id', $viewRole)->get();

    $all_status = MasterUserStatus::all();
    $provinces = MasterProvinceOffice::all();
    $permissions = Permission::all();
    if ($request->ajax()) {
            // dd($request->all());
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

            // $user = User::where('user_type_id', 2)->with(['entity_staff.role', 'status']);

            // show user by state only
        if(auth()->user()->hasAnyRole(['penyelia','pengarah','pelulus','admin_state'])){
            $user_province = User::with('entity_staff.state')->where('id', auth()->user()->id)->first();
            $province = $user_province->entity_staff->state_id;
            $user = User::where('user_type_id', 2)->with(['entity_staff.role', 'entity_staff.state', 'status'])->whereHas('entity_staff', function ($user_staff) use ($province) {
                return $user_staff->where('state_id', $province);
            });
        }elseif(auth()->user()->hasAnyRole(['superadmin','admin_hq'])){

            $province = MasterState::pluck('id');
            $user = User::where('user_type_id', 2)->with(['entity_staff.role', 'entity_staff.state', 'status'])->whereHas('entity_staff', function ($user_staff) use ($province) {
                return $user_staff->whereIn('state_id', [$province]);
            });
        }


            // SEARCH BY STATUS SHJ
        if ($request->status_id && $request->status_id != -1 && $request->role_id == -1 && $request->province_office_id == -1) {
            ;
            $user = User::where('user_type_id', 2)->with(['entity_staff.role', 'status'])->whereIn('user_status_id', [$request->status_id]);

                // SEARCH BY ROLE SHJ
        } else if ($request->role_id && $request->role_id != -1 && $request->status_id == -1 && $request->province_office_id == -1) {

            $user = User::where('user_type_id', 2)->with(['entity_staff.role', 'status'])->whereHas('entity_staff.role', function ($role) use ($request) {
               return $role->where('role_id', $request->role_id);
           });

                // SEARCH BY PROVINCE OFFICE SHJ
        } else if ($request->province_office_id && $request->province_office_id != -1 && $request->status_id == -1 && $request->role_id == -1) {

            $user = User::where('user_type_id', 2)->with(['entity_staff.role', 'entity_staff.province_office', 'status'])->whereHas('entity_staff.province_office', function ($province_office) use ($request) {
                return $province_office->where('province_office_id', $request->province_office_id);
            });

                // SEARCH BY STATUS, ROLE N PROVINCE OFFICE
        } else if ($request->province_office_id && $request->province_office_id != -1 && $request->role_id && $request->role_id != -1 && $request->status_id && $request->status_id != -1) {

            $user = User::where('user_type_id', 2)->with(['entity_staff.role', 'entity_staff.province_office', 'status'])->whereIn('user_status_id', [$request->status_id])->whereHas('entity_staff.role', function ($role) use ($request) {
                return $role->where('role_id', $request->role_id);
            })->whereHas('entity_staff.province_office', function ($province_office) use ($request) {
                return $province_office->where('province_office_id', $request->province_office_id);
            });

                // SEARCH BY PROVINCE OFFICE AND ROLE
        } else if ($request->province_office_id && $request->province_office_id != -1 && $request->role_id && $request->role_id != -1 && $request->status_id == -1) {

            $user = User::where('user_type_id', 2)->with(['entity_staff.role', 'entity_staff.province_office', 'status'])->whereHas('entity_staff.role', function ($role) use ($request) {
                return $role->where('role_id', $request->role_id);
            })->whereHas('entity_staff.province_office', function ($province_office) use ($request) {
                return $province_office->where('province_office_id', $request->province_office_id);
            });
                // SEARCH BY PROVINCE OFFICE AND STATUS
        } else if ($request->province_office_id && $request->province_office_id != -1 && $request->role_id == -1 && $request->status_id && $request->status_id != -1) {

            $user = User::where('user_type_id', 2)->with(['entity_staff.role', 'entity_staff.province_office', 'status'])->whereIn('user_status_id', [$request->status_id])->whereHas('entity_staff.province_office', function ($province_office) use ($request) {
                return $province_office->where('province_office_id', $request->province_office_id);
            });

                // SEARCH BY STATUS AND ROLE
        } else if ($request->province_office_id == -1 && $request->role_id && $request->role_id != -1 && $request->status_id && $request->status_id != -1) {

            $user = User::where('user_type_id', 2)->with(['entity_staff.role', 'status'])->whereIn('user_status_id', [$request->status_id])->whereHas('entity_staff.role', function ($role) use ($request) {
                return $role->where('role_id', $request->role_id);
            });

        } else {
            if(auth()->user()->hasAnyRole(['admin_state','pengarah','pelulus','penyiasat','staff'])){
                $user = User::where('user_type_id', 2)->with(['entity_staff.province_office', 'entity_staff.role', 'status']);

                $user->whereHas('entity_staff',function($state){
                    return $state->where('state_id',auth()->user()->entity_staff->state_id);
                });
            }elseif(auth()->user()->hasAnyRole(['admin_hq','superadmin'])){
                $user = User::where('user_type_id', 2)->with(['entity_staff.province_office', 'entity_staff.role', 'status']);
            }
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
            /*->editColumn('created_at', function ($user) {
            return $user->created_at ? date('d/m/Y', strtotime($user->created_at)) : date('d/m/Y');
        })*/
        ->editColumn('entity_staff.province_office.name', function ($user) {
            if ($user->entity_internal) {
                $role = $user->entity_internal->province_office->name;
            } else {
                $role = $user->entity_staff->role->name ?? $user->model_has_role->role->name;
            }
            if($role == 'staff') {
                $role = 'Pentadbir Sistem';
            }
            return ucwords($role);
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
            $button .= '<a data-toggle="tooltip" title="Kemaskini" onclick="edit(' . $user->id . ')" href="javascript:;" class="btn text-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i></a>';

            if(auth()->user()->hasAnyRole(['superadmin','admin_hq'])){
                // $button .= '<a data-toggle="tooltip" title="Padam" onclick="remove(' . $user->id . ')" href="javascript:;" class="btn text-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i></a>';
                $button .= '<a data-toggle="tooltip" title="Kemaskini Kata Laluan" onclick="passwordUser(' . $user->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5"><i class="fa fa-lock"></i></a>';
            }

            return $button;
        })

        ->make(true);
    }

    return view('admin.user.internal.index', compact('all_status', 'provinces', 'roles', 'permissions'));
}

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function insert(Request $request)
    {
        // dd('sini');
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            // 'username' => 'required|string|unique:user',
            // 'email' => 'required|email|unique:user',
            'email' => 'required',
            // 'password' => 'required',
            // 'password_confirmation' => 'required',
            'user_status_id' => 'required|integer',
            'roles' => 'required',
            // 'section_id' => 'required',
            // 'province_office_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            // If validation failed
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if(auth()->user()->entity_staff && auth()->user()->entity_staff->state->id != $request->cawangan){
            return responsee()->json(['status' => 'errors', 'title' => 'Gagal', 'message' => 'Pengguna dalaman gagal ditambah. Sila tambah pengguna negeri yang sama.']);
        }

        $role_id = Role::where('name', $request->roles[count($request->roles) - 1])->first()->id;

        if (is_array($request->roles)) {
            $roles = $request->roles;
            array_push($roles, 'staff');
            // dd($roles);

            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt('password123'),
                'email' => $request->email,
                // 'phone' => $request->phone,
                'user_type_id' => 2,
                'user_status_id' => $request->user_status_id,
            ])->assignRole($roles);
            // dd(vsprintf(str_replace(['?'], ['\'%s\''], $user->toSql()), $user->getBindings()));

            $staff = UserStaff::create([
                'role_id' => $role_id,
                'user_id' => $user->id,
                'state_id' => $request->cawangan,
            ]);

            $userentity = User::where('id', $user->id)->first();
            $userentity->entity_type = "App\UserStaff";
            $userentity->entity_id = $staff->id;
            $userentity->save();
        }

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
        $log->activity_type_id = 4;
        $log->description = "Tambah Pengurusan Pengguna - Pengguna Dalaman";
        $log->data_new = json_encode($user);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data baru berjaya ditambah.']);
    }

    /**
     * Show the specified resource.
     * @param  Request $request
     * @return Response
     */
    public function edit(Request $request)
    {
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
        $permissions = Permission::whereNotIn('name', $staff_permision_via_roles->pluck('name'))->get();

        $staff_roles = $user->getRoleNames();

        return view('admin.user.internal.edit', compact('all_status', 'provinces', 'roles', 'user', 'staff_roles', 'permissions', 'staff_permision_via_roles'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'username' => 'required|string|unique:user,username,' . $request->id,
            'email' => 'required|email|unique:user,email,' . $request->id,
            'user_status_id' => 'required|integer',
            // 'roles' => 'required',
            // 'province_office_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            // If validation failed
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $input = $request->all();

        \DB::Begintransaction();
        try {


            $role_id = Role::where('name', $request->roles[count($request->roles) - 1])->first()->id;
            $user = User::where('id',$request->id)->first();

            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
            $log->activity_type_id = 5;
            $log->description = "Kemaskini Pengurusan Pengguna - Pengguna Dalaman";
            $log->data_old = json_encode($user);

            if (is_array($request->roles)) {
                $roles = $request->roles;
                array_push($roles, 'staff');

                \DB::table('model_has_role')->where('model_id',$user->id)->delete();
                $user->update($request->all());
                $user->assignRole($roles);

                $user_staff = UserStaff::where('id',$user->entity_id)->first();
                $user_staff->role_id=$role_id;
                $user_staff->save();

                // $user = User::where('id',$request->id)->first();
                // $user->name = ($input['name'])?$input['name']:$user->name;
                // $user->username = ($input['username'])?$input['username']:$user->username;
                // $user->email = ($input['email'])?$input['email']:$user->email;
                // $user->user_status_id = ($input['user_status_id'])?$input['user_status_id']:$user->user_status_id;
                // $user->save();
            }

            $log->data_new = json_encode($user);
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            \DB::commit();
            return response()->json(['test' => 'Berjaya', 'text' => 'Maklumat berjaya dikemaskini', 'status' => 'success'],200);
        } catch (Exception $e) {
            \DB::rollback();
            return response()->json(['test' => 'Failed', 'text' => 'Maklumat gagal dikemaskini', 'status' => 'success','error_log'=>$e],400);
        }


        // $role_id = Role::where('name', $request->roles[count($request->roles) - 1])->first()->id;

        // $user->entity()->update([
        //     'role_id' => $role_id,
        // ]);

        // if (is_array($request->roles)) {
        //     $roles = $request->roles;
        //     array_push($roles, 'staff');
        //     $user->syncRoles($roles);
        // }
        // if (is_array($request->permissions) && $user) {
        //     $permissions = $request->permissions;
        //     $user->syncPermissions($permissions);
        // }


    }

    /**
     * Show the specified resource.
     * @param  Request $request
     * @return Response
     */
    public function edit_password(Request $request)
    {
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini kata laluan Pengurusan Pengguna - Pengguna Dalaman";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return view('admin.user.internal.password');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update_password(Request $request)
    {
        // dd($request->new_pass);
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed',

        ]);

        if ($validator->fails()) {
            // If validation failed
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::findOrFail($request->id);

        $password = bcrypt($request->password);
        $user = $user->update(['password' => $password]);

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dikemaskini.']);
    }

    /**
     * Remove the specified resource from storage.
     * @param  Request $request
     * @return Response
     */
    public function delete(Request $request)
    {

        $user = User::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_user')->firstOrFail()->id;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Pengguna - Pengguna Dalaman";
        $log->data_old = json_encode($user);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user->entity_staff->delete();
        $user->delete();
        $user = $user->update([
            'email' => $user->email . '_deleted_' . uniqid(),
            'username' => $user->username . '_deleted_' . uniqid(),
        ]);

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dipadam.']);
    }

}
