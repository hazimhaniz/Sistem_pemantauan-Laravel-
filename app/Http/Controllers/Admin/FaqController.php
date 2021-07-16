<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LogModel\LogSystem;
use App\OtherModel\Faq;
use App\MasterModel\MasterFaqType;
use App\Permission;
use Validator;
use App\Role;

class FaqController extends Controller
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
    	$faq_type = MasterFaqType::all();

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','faq')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Faq";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $faq = Faq::all();

            return datatables()->of($faq)
                ->editColumn('code', function ($faq) {
                    return $faq->code;
                })
                ->editColumn('question', function ($faq) {
                    return $faq->question;
                })
                ->editColumn('answer', function ($faq) {
                    return $faq->answer;
                })
                ->editColumn('type', function ($faq) {
                    return $faq->type->name;
                })
                ->editColumn('action', function ($faq) {
                    $button = "";
                    $button .= '<a onclick="edit('.$faq->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i> Kemaskini</a> ';
                    $button .= '<a onclick="remove('.$faq->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    return $button;
                })
                ->make(true);
        }
        else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','faq')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Faq";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('admin.faq.index',compact('faq_type'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function insert(Request $request) {

        $faq = Faq::create($request->all());

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','faq')->firstOrFail()->id;
        $log->activity_type_id = 4;
        $log->description = "Tambah Pengurusan Faq";
        $log->data_new = json_encode($faq);
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

        $faq = Faq::findOrFail($request->id);
        $faq_type = MasterFaqType::all();

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','faq')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Pengurusan Faq";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return view('admin.faq.edit', compact('faq_type','faq'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request) {

        $faq = Faq::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','faq')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Pengurusan Faq";
        $log->data_old = json_encode($faq);

        $faq = $faq->update($request->all());

        $log->data_new = json_encode($faq);
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

        $faq = Faq::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','faq')->firstOrFail()->id;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Faq";
        $log->data_old = json_encode($faq);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $faq->delete();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dipadam.']);
    }
}
