<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LogModel\LogSystem;
use App\OtherModel\Access;
use App\OtherModel\Menu;
use App\Permission;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Validator;

class AccessController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','admin_access')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Keizinan";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $access = Access::all();

            return datatables()->of($access)
                ->editColumn('name', function ($access) {
                    $result = $access->name;

                    return $result;
                })
                ->editColumn('method', function ($access){
                    $result = '';

                    if ($access->method == 'GET') {
                        $result .= " <span class='label label-primary label-lg'>GET</span>";
                    }
                    if ($access->method == 'POST') {
                        $result .= " <span class='label label-success label-lg'>POST</span>";
                    }
                    if ($access->method == 'DELETE') {
                        $result .= " <span class='label label-danger label-lg'>DELETE</span>";
                    }

                    return $result;

                })
                // ->editColumn('link', function ($access) {
                //     return $access->link;
                // })
                ->editColumn('action', function ($access) {
                    $button = "";

                    if (Permission::where('name',$access->name)->exists()) {
                        if (\App\User::permission($access->name)->get()->first() || Menu::where('link',$access->name)->first()) {
                        }else{
                            $button .= '<a onclick="revokepermission(\''.$access->name.'\')" href="javascript:;" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Revoke Tugasan</a> ';
                        }
                    }else{
                    $button .= '<a onclick="setpermission(\''.$access->name.'\')" href="javascript:;" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Jadikan Tugasan</a> ';
                    }

                    $button .= '<a onclick="view('.$access->id.')" href="javascript:;" class="btn btn-default btn-xs text-capitalize"><i class="fa fa-search"></i> Lihat</a> ';
                    return $button;
                })
                ->make(true);
        }
        else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','admin_access')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka Keizinan";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

    	return view('admin.access.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function insert(Request $request)
    {
        Access::truncate();

        // dapatkan semua route 

        $getRouteCollection = Route::getRoutes();

        foreach ($getRouteCollection as $key => $route) {

            $action = $route->getAction();

            if (array_key_exists('as', $action)) {
                $r['name'] = $action['as'];
            }else{
                continue;
            }
            if (array_key_exists('uses', $action)) {
                $r['uses'] = $action['uses'];
            }
            if (array_key_exists('controller', $action)) {
                $r['controller'] = $action['controller'];
            }
            if (array_key_exists('prefix', $action)) {
                $r['prefix'] = $action['prefix'];
            }

            $r['method'] = $route->methods[0];
            $r['uri'] = $route->uri;
            $r['actionMethod'] = $route->getActionMethod();

            $routeList[$key] = $r;

        }

        //

        // $unsetlist = ['login.announcement','login.faq','home.list','general.getDistrictFromState','general.getStateFromPostcode','general.getAttachment','general.getLetterTemplate','general.getFilingDetails','general.getFlowDetails','api.database','logout','login','register','auth.bayaran','auth.semakanberjaya','auth.visa','auth.manual','password.request','password.email','password.reset','autologin','home','locale','auth.verify'];

        // $name = array_unique($name);

        // foreach ($unsetlist as $item) {
        //     $key = array_search($item,$name);
        //     unset($name[$key]);
        // }

        $master_state = \App\MasterModel\MasterState::all();

        foreach ($routeList as $accesslist) {

            $access = new Access;

            if (array_key_exists('name', $accesslist)) {
                if ($accesslist['method']=='GET') {
                    $access->name = $accesslist['name'];
                }else{
                    $access->name = $accesslist['name'].'_'.strtolower($accesslist['method']);
                }
            }
            if (array_key_exists('uri', $accesslist)) {
                $access->link = $accesslist['uri'];
            }
            if (array_key_exists('method', $accesslist)) {
                $access->method = $accesslist['method'];
            }
            $access->description = json_encode($accesslist);
            $access->save();

            if (in_array($access->name,['forma','formb','formc'])) {
                # code...
                foreach ($master_state as $state_key => $state_value) {

                    $access = new Access;
                    $access->name = $accesslist['name'].'-state-'.$state_value->id;
                    $access->link = $accesslist['uri'];
                    $access->method = 'GET';
                    $access->save();

                    foreach ($state_value->districts as $city_key => $city_value) {

                    $access = new Access;
                    $access->name = $accesslist['name'].'-city-'.$city_value->id;
                    $access->link = $accesslist['uri'];
                    $access->method = 'GET';
                    $access->save();

                    }

                }

            }
        }

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data akses telah diload semula.']);
    }

    /**
     * Show the specified resource.
     * @param  Request $request
     * @return Response
     */
    public function edit(Request $request)
    {

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_access')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Keizinan";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $access = Access::findOrFail($request->id);

        return view('admin.access.edit', compact('access'));
    }
    public function setpermission(Request $request)
    {
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_access')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Set Tugasan Bagi Keizinan ".$request->name;
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        \Artisan::call('cache:forget', ['key' => 'spatie.permission.cache']);
        \Artisan::call('cache:clear');

        Permission::create(['name'=>$request->name,'guard_name'=>'web','description'=>'Keizinan '.$request->name]);

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dikemaskini.']);
    }
    public function revokepermission(Request $request)
    {
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_access')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Revoke Tugasan Bagi Keizinan ".$request->name;
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user = \App\User::permission($request->name)->get()->first();

        if ($user) {
            return response()->json(['status' => 'error', 'title' => 'Tidak Berjaya!', 'message' => 'Tugasan ini telah diassignkan ke pengguna']);
        }

        if (Menu::where('link',$request->name)->first()) {
            return response()->json(['status' => 'error', 'title' => 'Tidak Berjaya!', 'message' => 'Tugasan ini sedang digunakan di Pengurusan Menu dan tidak boleh direvoke.']);
        }
        Permission::where('name',$request->name)->delete();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dikemaskini.']);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:access,name,'.$request->id,
            'description' => 'required|string'
        ]);

        if ($validator->fails()) {
            // If validation failed
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $access = Access::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_access')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Keizinan";
        $log->data_old = json_encode($access);

        $access->update($request->only('name','description'));

        $log->data_new = json_encode($access);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dikemaskini.']);
    }

    /**
     * Remove the specified resource from storage.
     * @param  Request $request
     * @return Response
     */
    public function delete(Request $request)
    {
        $access = Access::findOrFail($request->id);
        
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_access')->firstOrFail()->id;
        $log->activity_type_id = 6;
        $log->description = "Padam Keizinan";
        $log->data_old = json_encode($access);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $access->delete();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dipadam.']);
    }

    public function view(Request $request){
        
        $access = Access::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_access')->firstOrFail()->id;
        $log->activity_type_id = 2;
        $log->description = "Buka paparan maklumat terperinci keizinan";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return view('admin.access.view', compact('access'));
    }
}
