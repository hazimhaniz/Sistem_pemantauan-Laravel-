<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LogModel\LogSystem;
use App\OtherModel\Flow;
use App\MasterModel\MasterModule;
use App\MasterModel\MasterUseCase;
use App\MasterModel\MasterUseCaseType;
use Validator;
use App\Role;

class ModuleController extends Controller
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
            $log->module_id = \App\MasterModel\MasterModule::where('code','admin_module')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Module";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            // if ($request->filter_module_type) {
                // $module = MasterModule::where('type',$request->filter_module_type)->get();
                $module = MasterModule::where('type',3)->get();
            // }else{
            //     $module = MasterModule::all();
            // }

            return datatables()->of($module)
                ->editColumn('name', function ($module) {
                    return $module->name;
                })
                ->editColumn('code', function ($module) {
                    return $module->code;
                })
                ->editColumn('type', function ($module) {
                    if ($module->type == 1) {
                        return 'General Non Flow Process';
                    }if ($module->type == 2) {
                        return 'Admin';
                    }if ($module->type == 3) {
                        return 'Flow Process';
                    }
                })
                ->editColumn('action', function ($module) {
                    if ($module->type == 3) {
                        $button = "";
                        $button .= '<a href="'.route('admin.module.form',$module->id).'" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i> Kemaskini Borang</a> ';
                        $button .= '<br>';
                        $button .= '<a href="'.route('admin.flow').'" class="btn btn-primary btn-xs mb-1"><i class="fa fa-retweet mr-1"></i> Kemaskini Flow</a> ';
                        $button .= '<br>';
                        $button .= '<a onclick="access('.$module->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-users mr-1"></i> Kemaskini Akses</a> ';
                        $button .= '<br>';
                        $button .= '<a onclick="view('.$module->id.')" href="javascript:;" class="btn btn-success btn-xs mb-1"><i class="fa fa-list mr-1"></i> Senarai Borang</a> ';
                        $button .= '<br>';
                        return $button;
                    }
                })
                ->make(true);
        }
        else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','admin_module')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Module";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('admin.module.index',compact('all_sequence','all_case_type','all_role'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function insert(Request $request) {

        $validator = Validator::make($request->all(), [
            'module_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            // If validation failed
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $request->request->add(['message' => nl2br($request->message)]);

        if (MasterModule::where('module_id',$request->module_id)->count()) {
            $sequence = MasterModule::where('module_id',$request->module_id)->get()->last()->sequence + 1;
        }else{
            $sequence = 1;
        }

        $module = MasterModule::create($request->all());
        $module->update(['sequence'=>$sequence]);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_module')->firstOrFail()->id;
        $log->activity_type_id = 4;
        $log->description = "Tambah Pengurusan Module";
        $log->data_new = json_encode($module);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data baru telah ditambah.']);
    }

    public function edit(Request $request) {

        $module = MasterModule::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_module')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Kemaskini Pengurusan Borang";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $data = $module->data ? json_decode($module->data, true) : [];

        return view('admin.module.form', compact('module','data'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'module_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            // If validation failed
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $module = Module::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_module')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Pengurusan Module";
        $log->data_old = json_encode($module);

        $request->request->add(['message' => nl2br($request->message)]);
        $module = $module->update($request->all());

        $log->data_new = json_encode($module);
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

        $module = Module::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_module')->firstOrFail()->id;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Module";
        $log->data_old = json_encode($module);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $module->delete();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dipadam.']);
    }
}
