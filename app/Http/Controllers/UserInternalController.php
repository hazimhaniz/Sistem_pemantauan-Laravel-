<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\MasterModel\MasterUserStatus;
use App\MasterModel\MasterState;
// use App\MasterModel\MasterSection;
// use App\MasterModel\MasterProvinceOffice;
use App\Permission;
use App\Distribution;
use App\JasFail;
use App\User;
use App\UserStaff;
use App\LogModel\LogSystem;
use Validator;
use Auth;

class UserInternalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     // public function __construct()
     // {
     //     $this->middleware(function ($request, $next) {
     //         var_dump(current_Site());
     //
     //         return $next($request);
     //     });
     // }

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $all_status = MasterUserStatus::all();
        $roles = Role::whereIn('id',[7,8,9,10,11])->get();

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','admin_user')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna Dalaman";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            if($request->role_id && $request->role_id != -1 && $request->status_id == -1) {

              $users = User::with(['entity','status','type','role'])
              ->whereHas('model_has_role',function($role) use($request) {
                  return $role->whereIn('role_id',[$request->role_id]);
              });

          }else if($request->status_id  && $request->status_id != -1 && $request->role_id == -1) {

              $users = User::whereIn('user_status_id', [$request->status_id])
              ->with(['entity','status','type','role'])
              ->whereHas('model_has_role',function($role) use($request) {
                  return $role->whereIn('role_id',[2,7,8,9,10,11]);
              });

          }else if($request->role_id && $request->role_id != -1 && $request->status_id  && $request->status_id != -1){

              $users = User::whereIn('user_status_id', [$request->status_id])
              ->with(['entity','status','type','role'])
              ->whereHas('model_has_role',function($role) use($request) {
                  return $role->whereIn('role_id',[$request->role_id]);
              });

          }else{

              $users = User::whereIn('user_type_id', [2])
              ->with(['entity','status','type','role'])
              ->whereHas('model_has_role',function($role) use($request) {
                return $role->whereIn('role_id',[2,7,8,9,10,11]);
            });

          }


          if (auth()->user()->hasAnyRole(['admin_state'])) {
            
            $users = $users->whereHas('model_has_role',function($role) use($request) {
                return $role->whereNotIn('role_id',[1,2,3,4,5,6,11]);
            })->whereHas('entity_staff',function($staff) use($request) {
                $selfstate = UserStaff::where('user_id',auth()->user()->id)->get();
                foreach ($selfstate as $key => $value) {
                    $stateid[] = $value->state_id;
                }
                return $staff->whereIn('state_id',$stateid);
            });
                    // dd(vsprintf(str_replace(['?'], ['\'%s\''], $users->toSql()), $users->getBindings()));
        }

        return datatables()->of($users->get())
        ->addIndexColumn()
        ->editColumn('name', function ($user) {
            if($user->isOnline())
                return '<span style="color: #25e125;">●</span> '.strtoupper($user->name).'<br><small style="text-transform:none !important">'.$user->email.'</small>';
            else
                return strtoupper($user->name).'<br><small style="text-transform:none !important">'.$user->email.'</small>';
        })
        ->editColumn('username', function ($user) {
            return '<span class="label label-default">'.$user->username.'</span>';
        })
        ->editColumn('entity_staff.role.desc', function ($user) {
          $button = "";
          $staff_roles = $user->getRoleDescs($user->id);
                    // $staff_roles = $user->getRoleNames();
          foreach($staff_roles as $staff_role){
                        // dd($staff_role);
            if ($staff_role != 'staff' && $staff_role != 'Pegawai JAS') {
                $button .= $staff_role.'<br>';
                            // $button .= '<span class="badge badge-info">'.strtoupper($staff_role).'</span> &nbsp;';
            }
        }
        return $button;
    })

                // ->editColumn('entity_staff.role.name', function ($user) {
                //   $button = "";
                //     // $staff_roles = $user->getRoleDescs();
                //     $staff_roles = $user->getRoleNames();
                //     foreach($staff_roles as $staff_role){
                //         if ($staff_role != 'staff') {
                //             $button .= '<span class="badge badge-info">'.strtoupper($staff_role).'</span> &nbsp;';
                //         }
                //     }
                //     return $button;
                // })

        ->editColumn('status.name', function ($user) {
            if($user->user_status_id == 1)
                return strtoupper($user->status->name);
                        // return '<span class="badge badge-success">'.strtoupper($user->status->name).'</span>';
            if($user->user_status_id == 3 )
                return strtoupper($user->status->name);
                        // return '<span class="badge badge-default">'.strtoupper($user->status->name).'</span>';
            else
                return strtoupper($user->status->name);
                        // return '<span class="badge badge-danger">'.strtoupper($user->status->name).'</span>';
        })
        ->editColumn('action', function ($user) {
            $button = "";
                    // $button .= '<a data-toggle="tooltip" title="Kemaskini" onclick="edit('.$user->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i></a>';
            $button .= '<a title="Kemaskini" onclick="edit('.$user->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i></a>';
            if ($user->hasAnyRole(['penyiasat'])) {
                        // $button .= '<a title="Pertukaran pegawai" onclick="change('.$user->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-refresh"></i></a>';
            }
                    // dd($user->id);
            if ($user->id != 4 && $user->id != auth()->user()->id) {
                $button .= '<a title="Padam" onclick="remove('.$user->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i></a>';
            }
                    // $button .= '<a title="Kemaskini Kata Laluan" onclick="passwordUser('.$user->id.')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5"><i class="fa fa-lock"></i></a>';
            return $button;
        })
        ->make(true);
    }

    return view('user.internal.index', compact('all_status','roles'));
}

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function insert(Request $request) {
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

        $role_id = Role::where('name', $request->roles[count($request->roles)-1])->first()->id;

        if(is_array($request->roles)) {
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
                'role_id'=>$role_id,
                'user_id'=>$user->id,
                'state_id'=>$request->cawangan
            ]);

            $userentity = User::where('id',$user->id)->first();
            $userentity->entity_type =  "App\UserStaff";
            $userentity->entity_id = $staff->id;
            $userentity->save();

        }

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_user')->firstOrFail()->id;
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
    public function edit(Request $request){

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_user')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Pengurusan Pengguna - Pengguna Dalaman";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();


        $all_status = MasterUserStatus::all();
        $all_state = MasterState::all();
        // $provinces = MasterProvinceOffice::all();
        // $sections = MasterSection::all();

        $roles = Role::all();
        $user = User::findOrFail($request->id);
        $user_state = UserStaff::where('user_id',$request->id)->get();
        $array_user_state = array();
        foreach ($user_state as $key => $value_user_state) {
            $array_user_state[] = $value_user_state->state_id;
        }
        $not_user_state = MasterState::whereNotIn('id',$array_user_state)->get();
        //dd($not_user_state);

        $staff_permision_via_roles = $user->getPermissionsViaRoles();
        $permissions = Permission::whereNotIn('name',$staff_permision_via_roles->pluck('name'))->get();

        $staff_roles = $user->getRoleNames();

        return view('user.internal.edit', compact('all_status','all_state','roles','user','user_state','not_user_state','staff_permision_via_roles','permissions','staff_roles'));
    }

    public function change(Request $request){
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_user')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Pengurusan Pengguna - Pengguna Dalaman";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();


        $all_status = MasterUserStatus::all();
        $all_state = MasterState::all();
        // $provinces = MasterProvinceOffice::all();
        // $sections = MasterSection::all();

        $roles = Role::all();
        $user = User::findOrFail($request->id);
        $distribute = Distribution::where('assigned_to_user_id',$request->id)->where('active',1)->get();

        $userother = User::select('user.id','user.name')->leftJoin('user_staff','user.id','user_staff.user_id')->where('user_staff.state_id',$user->entity_staff->state_id)
        ->whereHas('model_has_role',function($role) use($request) {
          return $role->whereIn('role_id',[7]);
      })
        ->whereNull('user_staff.deleted_at')->whereNull('user.deleted_at')->where('user.id','!=',$request->id)->get();
        // dd($userother);
        // $user_state = UserStaff::where('user_id',$request->id)->get();
        // $array_user_state = array();
        // foreach ($user_state as $key => $value_user_state) {
        //     $array_user_state[] = $value_user_state->state_id;
        // }
        // $not_user_state = MasterState::whereNotIn('id',$array_user_state)->get();
        //dd($not_user_state);

        $staff_permision_via_roles = $user->getPermissionsViaRoles();
        $permissions = Permission::whereNotIn('name',$staff_permision_via_roles->pluck('name'))->get();

        $staff_roles = $user->getRoleNames();

        return view('user.internal.change', compact('all_status','all_state','roles','user','staff_permision_via_roles','permissions','staff_roles','userother','distribute'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request) {
       
        // dd('sini');
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string',
        //     'username' => 'required|string|unique:user,username,'.$request->id ,
        //     'email' => 'required|email|unique:user,email,'.$request->id ,
        //     'user_status_id' => 'required|integer',
        //     'roles' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     // If validation failed
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->user_status_id = $request->user_status_id;
        $user->save();
        if($request->password){
          $user->password = bcrypt($request->password);
          $user->save();
      }
      $role_id = Role::where('name', $request->roles[count($request->roles)-1])->first()->id;

        // dd($request->user_state_id);
      if(Auth::user()->hasRole('admin_hq')){
        $input_checkbox = $request->user_state_id;
        $num_input = count($input_checkbox);

        $user_role = UserStaff::where('user_id',$request->id);
            // dd($request->id);
            // dd(vsprintf(str_replace(['?'], ['\'%s\''], $user_role->toSql()), $user_role->getBindings()));
            // dd($user_role);
        $user_state = UserStaff::where('user_id','=',$request->id);
        $user_state->delete();
            // $user_state = UserStaff::where('user_id','=',$request->id)->get();
            // $num_user_state = count($user_state);

            // if($num_input>$num_user_state) //checked state
            // {
            //     for($i=0;$i<$num_input;$i++)
            //     {
            //         $counthave = 0;
            //         foreach($user_state as $key => $value_old)
            //         {
            //             if($input_checkbox[$i]==$value_old->state_id)
            //             {
            //                $counthave = $counthave+1;
            //             }
            //         }

            //         if($counthave==0)
            //         {
            //             $newdata = new UserStaff;
            //             $newdata->role_id = $user_role->role_id;
            //             $newdata->user_id = $request->id;
            //             $newdata->state_id = $input_checkbox[$i];
            //             $newdata->save();
            //         }
            //       }
            // }
            // elseif($num_input<$num_user_state) //unchecked state
            // {
            //     $not_user_state = UserStaff::where('user_id','=',$request->id)
            //                                 ->whereNotIn('state_id',$input_checkbox)
            //                                 ->delete();
            // }
            // dd($request->roles);
        
        for($i=0;$i<$num_input;$i++)
        {
            $cd[] = $i;
            $counthave = 0;
            foreach($user_state as $key => $value_old)
            {
                if($input_checkbox[$i]==$value_old->state_id)
                {
                 $counthave = $counthave+1;
             }
         }

         if($counthave==0)
         {
            $newdata = new UserStaff;
            $newdata->role_id = 2;
                    // $newdata->role_id = $user_role->role_id;
            $newdata->user_id = $request->id;
            $newdata->state_id = $input_checkbox[$i];

            $usercheckstate = UserStaff::where('user_id','=',$request->id)->get();

            if (count($usercheckstate) > 0) {
                foreach ($usercheckstate as $key1 => $value1) {
                    if ($input_checkbox[$i] != $value1->state_id) {
                        $newdata->save();
                    }
                }
            } else {
                $newdata->save();
            }
        }
    }
}
        // dd($i);
        // $user->entity()->update([
        //     'role_id' => $role_id,
        // ]);

if(is_array($request->roles)) {
    $roles = $request->roles;
            // array_push($roles, 'staff');
    $user->syncRoles($roles);
}

if(is_array($request->permissions) && $user) {
    $permissions = $request->permissions;
    $user->syncPermissions($permissions);
}

$log = new LogSystem;
$log->module_id = \App\MasterModel\MasterModule::where('code','admin_user')->firstOrFail()->id;
$log->activity_type_id = 5;
$log->description = "Kemaskini Pengurusan Pengguna - Pengguna Dalaman";
$log->data_old = json_encode($user);


        // $user->update($request->all());

        // $user->entity->update($request->all());

$log->data_new = json_encode($user);
$log->url = $request->fullUrl();
$log->method = strtoupper($request->method());
$log->ip_address = $request->ip();
$log->created_by_user_id = auth()->id();
$log->save();

return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
}

public function updatechange(Request $request) {
        // dd($request->nofailjas_id);
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string',
        //     'username' => 'required|string|unique:user,username,'.$request->id ,
        //     'email' => 'required|email|unique:user,email,'.$request->id ,
        //     'user_status_id' => 'required|integer',
        //     'roles' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     // If validation failed
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }


    foreach ($request->nofailjas_id as $key => $value) {
            // $distrib = Distribution::where('no_fail_jas',$value)->where('assigned_to_user_id',$request->old_id)->first();
            // $distrib->active = 0;
            // $distrib->save();

            // $distribute = new Distribution;
            // $distribute->no_fail_jas = $value;
            // $distribute->assigned_to_user_id = $request->user_change_id;
            // // $distribute->assigned_to_user_id_old = $request->old_id;
            // $distribute->assigned_by = $distrib->assigned_by;
            // $distribute->assigned_pelulus = $distrib->assigned_pelulus;
            // $distribute->active = 1;
            // $distribute->save();
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_user')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Pengurusan Pengguna - Pertukaran Pegawai";

        $distrib = Distribution::where('no_fail_jas',$value)->where('assigned_to_user_id',$request->old_id)->first();
            // $distrib->active = 0;
        $log->data_old = json_encode($distrib);

            // $distribute = new Distribution;
        $distrib->no_fail_jas = $value;
        $distrib->assigned_to_user_id = $request->user_change_id;
            // $distribute->assigned_to_user_id_old = $request->old_id;
        $distrib->assigned_by = $distrib->assigned_by;
        $distrib->assigned_pelulus = $distrib->assigned_pelulus;
        $distrib->active = 1;
        $distrib->save();
            // $distribute->save();
        $log->data_new = json_encode($distrib);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();
    }
    



        // $user->update($request->all());

        // $user->entity->update($request->all());


    return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
}

    /**
     * Show the specified resource.
     * @param  Request $request
     * @return Response
     */
    public function edit_password(Request $request){
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_user')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini kata laluan Pengurusan Pengguna - Pengguna Dalaman";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return view('user.internal.password');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update_password(Request $request) {
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

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
    }

    /**
     * Remove the specified resource from storage.
     * @param  Request $request
     * @return Response
     */
    public function delete(Request $request) {

        $user = User::findOrFail($request->id);
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_user')->firstOrFail()->id;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Pengguna - Pengguna Dalaman";
        $log->data_old = json_encode($user);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        // $user->entity->delete();
        $user->delete();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
    }


}
