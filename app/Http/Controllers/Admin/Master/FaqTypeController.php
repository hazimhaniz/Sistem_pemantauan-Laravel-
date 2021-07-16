<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MasterModel\MasterFaqType;
use App\LogModel\LogSystem;
use Carbon\Carbon;
use Validator;

class FaqTypeController extends Controller
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

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','master_data')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Data Induk - Jenis Faq";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $types = MasterFaqType::all();

            return datatables()->of($types)
                ->editColumn('name', function ($type) {
                   return $type->name;
                })
                ->editColumn('action', function ($type) {
                    $button = "";
                    $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a> ';
                    if (!$type->faq->first()) {
                    $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> ';
                    }
                    return $button;
                })
                ->make(true);
        }
        else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','master_data')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Data Induk - Jenis Faq";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('admin.master.faq-type.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:master_faq_type',
        ]);

        if ($validator->fails()) {
            // If validation failed
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $type = MasterFaqType::create([
                'name' => $request->name,
            ]);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','master_data')->firstOrFail()->id;
        $log->activity_type_id = 4;
        $log->description = "Tambah Data Induk - Jenis Faq";
        $log->data_new = json_encode($type);
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
    public function edit(Request $request)
    {
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','master_data')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Data Induk - Jenis Faq";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $type = MasterFaqType::findOrFail($request->id);

        return view('admin.master.faq-type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:master_faq_type,name,'.$request->id,
        ]);

        if ($validator->fails()) {
            // If validation failed
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $type = MasterFaqType::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','master_data')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Data Induk - Jenis Faq";
        $log->data_old = json_encode($type);

        $type->update([
            'name' => $request->name,
        ]);

        $log->data_new = json_encode($type);
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
        $type = MasterFaqType::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','master_data')->firstOrFail()->id;
        $log->activity_type_id = 6;
        $log->description = "Padam Data Induk - Jenis Faq";
        $log->data_old = json_encode($type);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $type->delete();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dipadam.']);
    }
}
