<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LogModel\LogSystem;
use App\OtherModel\Menu;
use App\MasterModel\MasterModule;
use App\MasterModel\MasterUseCase;
use App\MasterModel\MasterUseCaseType;
use App\Permission;
use Validator;
use App\Role;

class MenuController extends Controller
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

        $menu_list = Menu::all();

        $link_list = Permission::select('name')->get()->pluck('name');

        $symbol_list = ['fa-home','fa-bar-chart','fa-mail-forward','fa-file-text','fa-gear','fa-list-alt','fa-gavel','fa-users','fa-bullhorn','fa-database','fa-bell','fa-envelope','fa-calendar','fa-envelope-open','fa-retweet','fa-headphones','fa-search','fa-info-circle','fa-check','Di','Pp','Pk','P','M','A'];
        
        $unicode = ['&#xf015;','&#xf080;','&#xf064;','&#xf15c;','&#xf013;','&#xf022;','&#xf0e3;','&#xf0c0;','&#xf0a1;','&#xf1c0;','&#xf0f3;','&#xf0e0;','&#xf073;','&#xf2b6;','&#xf079;','&#xf025;','&#xf002;','&#xf05a;','&#xf00c;','Di','Pp','Pk','P','M','A'];

        $all_sequence = range(1,(Menu::count()+1));

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','admin_menu_management')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Menu";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $menu = Menu::orderBy('sequence','asc')->get();

            return datatables()->of($menu)
                ->editColumn('sequence', function ($menu) {
                    return $menu->sequence;
                })
                ->editColumn('name', function ($menu) {
                    if ($menu->parent) {
                        return "<span class='text-danger'>".$menu->name."</span>";
                    }else{
                        return "<span class='text-primary'>".$menu->name."</span>";
                    }
                })
                ->editColumn('parent', function ($menu) {
                    if ($menu->parent) {
                        return $menu->parentmodel->name;
                    }
                })
                ->editColumn('action', function ($menu) {
                    $button = "";
                    $button .= '<a onclick="edit('.$menu->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i> Kemaskini</a> ';
                    if (!$menu->child->first()) {
                        if ($menu->name != 'Pengurusan Menu') {
                            $button .= '<a onclick="remove('.$menu->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                        }
                    }
                    return $button;
                })
                ->make(true);
        }
        else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','admin_menu_management')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Menu";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('admin.menu.index',compact('all_sequence','menu_list','link_list','symbol_list','unicode'));
        // return view('admin.menu.index2',compact('all_sequence','menu_list','link_list','symbol_list','unicode'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function insert(Request $request) {


        if (Menu::get()->count()) {
            $sequence = Menu::get()->last()->sequence + 1;
        }else{
            $sequence = 1;
        }

        $menu = Menu::create($request->all());
        $menu->update(['sequence'=>$sequence]);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_menu_management')->firstOrFail()->id;
        $log->activity_type_id = 4;
        $log->description = "Tambah Pengurusan Menu";
        $log->data_new = json_encode($menu);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data baru telah ditambah.']);
    }

    /**
     * Show the specified resource.
     * @param  Request $request
     * @return Responsei
     */
    public function edit(Request $request) {

        $all_module = MasterModule::whereNotNull('code')->orderBy('name','ASC')->get();
        $all_case_type = MasterUseCaseType::all();
        $all_role = Role::whereBetween('id',[4,11])->get();

        $menu = Menu::findOrFail($request->id);

        $menu_list = Menu::whereNotIn('name',[$menu->name])->get();

        $link_list = Permission::select('name')->get()->pluck('name');

        $symbol_list = ['fa-home','fa-bar-chart','fa-mail-forward','fa-file-text','fa-gear','fa-list-alt','fa-gavel','fa-users','fa-bullhorn','fa-database','fa-bell','fa-envelope','fa-calendar','fa-envelope-open','fa-retweet','fa-headphones','fa-search','fa-info-circle','fa-check','Di','Pp','Pk','P','M','A'];
        
        $unicode = ['&#xf015;','&#xf080;','&#xf064;','&#xf15c;','&#xf013;','&#xf022;','&#xf0e3;','&#xf0c0;','&#xf0a1;','&#xf1c0;','&#xf0f3;','&#xf0e0;','&#xf073;','&#xf2b6;','&#xf079;','&#xf025;','&#xf002;','&#xf05a;','&#xf00c;','Di','Pp','Pk','P','M','A'];

        $all_sequence = range(1,(Menu::count()+1));

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_menu_management')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Pengurusan Menu";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return view('admin.menu.edit', compact('menu','all_module','all_sequence','all_case_type','all_role','menu_list','link_list','symbol_list','unicode'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request) {

        $menu = Menu::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_menu_management')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Pengurusan Menu";
        $log->data_old = json_encode($menu);

        if (Menu::where('sequence',$request->sequence)->first()) {

            if ($menu->sequence < $request->sequence) {
                $allmenubefore = Menu::where('sequence','<=',$request->sequence)->get();

                foreach ($allmenubefore as $key => $value) {
                    $menuToUpdate = Menu::where('id',$value->id);
                    $menuToUpdate->update(['sequence'=>($value->sequence-1)]);
                }
            }
            if ($menu->sequence > $request->sequence) {
                $allmenuafter = Menu::where('sequence','>=',$request->sequence)->get();

                foreach ($allmenuafter as $key => $value) {
                    $menuToUpdate = Menu::where('id',$value->id);
                    $menuToUpdate->update(['sequence'=>($value->sequence+1)]);
                }
            }

        }

        $request->request->add(['message' => nl2br($request->message)]);
        $menu = $menu->update($request->all());

        $log->data_new = json_encode($menu);
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
    public function delete(Request $request){ 

        $menu = Menu::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_menu_management')->firstOrFail()->id;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Menu";
        $log->data_old = json_encode($menu);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $menu->delete();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dipadam.']);
    }
}
