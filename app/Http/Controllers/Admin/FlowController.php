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

class FlowController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $all_module = MasterModule::where('type',3)->get();
        $all_case_type = MasterUseCaseType::all();
        $all_role = Role::whereBetween('id',[4,11])->get();
        $all_sequence = range(1,45);

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','admin_flow')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Flow";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            if ($request->filter_module_id) {
                $flow = Flow::where('module_id',$request->filter_module_id)->get();
            }else{
                $flow = Flow::where('module_id',MasterModule::where('type',3)->firstOrFail()->id)->get();
            }


            return datatables()->of($flow)
                ->editColumn('sequence', function ($flow) {
                    return $flow->sequence;
                })
                ->editColumn('cur_role', function ($flow) {
                    $return = '';
                    if (optional($flow->typecase)->name) {
                        $return .= '<span class="label" style="background-color:'.optional($flow->typecase)->color.';color:#fff">'.strtoupper(optional($flow->typecase)->name).'</span><br>';
                    }
                    if (optional($flow->currentr)->name) {
                        $return .= '<small style="font-size: medium;">'.strtoupper(optional($flow->currentr)->name).'</small>';
                    }

                    return $return;
                })
                ->editColumn('case', function ($flow) {
                    return implode("<br>",explode("\n",$flow->case));
                })
                ->editColumn('action', function ($flow) {
                    $button = "";
                    $button .= '<a onclick="edit('.$flow->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i> Kemaskini</a> ';
                    $button .= '<a onclick="remove('.$flow->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    return $button;
                })
                ->make(true);
        }
        else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','admin_flow')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Flow";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('admin.flow.index',compact('all_module','all_sequence','all_case_type','all_role'));
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

        if (Flow::where('module_id',$request->module_id)->count()) {
            $sequence = Flow::where('module_id',$request->module_id)->get()->last()->sequence + 1;
        }else{
            $sequence = 1;
        }

        $flow = Flow::create($request->all());
        $flow->update(['sequence'=>$sequence]);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_flow')->firstOrFail()->id;
        $log->activity_type_id = 4;
        $log->description = "Tambah Pengurusan Flow";
        $log->data_new = json_encode($flow);
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
     * @return Response
     */
    public function edit(Request $request) {

        $all_module = MasterModule::whereNotNull('code')->orderBy('name','ASC')->get();
        $all_case_type = MasterUseCaseType::all();
        $all_role = Role::whereBetween('id',[4,11])->get();
        $all_sequence = range(1,45);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_flow')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Pengurusan Flow";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $flow = Flow::findOrFail($request->id);

        return view('admin.flow.edit', compact('flow','all_module','all_sequence','all_case_type','all_role'));
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

        $flow = Flow::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_flow')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Pengurusan Flow";
        $log->data_old = json_encode($flow);

        $request->request->add(['message' => nl2br($request->message)]);
        $flow = $flow->update($request->all());

        $log->data_new = json_encode($flow);
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

        $flow = Flow::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_flow')->firstOrFail()->id;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Flow";
        $log->data_old = json_encode($flow);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $flow->delete();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dipadam.']);
    }
}
