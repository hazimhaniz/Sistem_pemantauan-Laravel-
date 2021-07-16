<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LogModel\LogSystem;
use App\OtherModel\Signature;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Permission;
use Validator;
use App\Role;
use App\UserInternal;

class SignatureController extends Controller
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

        $user = UserInternal::all();

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','signature')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Tandatangan";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $signature = Signature::all();

            return datatables()->of($signature)
                ->editColumn('name', function ($signature) {
                    return $signature->name;
                })
                ->editColumn('picture', function ($signature) {
                    return "<img src=".asset('storage/'.$signature->picture)." width='150px'>";
                })
                ->editColumn('role_bm', function ($signature) {
                    return $signature->role_bm;
                })
                ->editColumn('status', function ($signature) {
                    if ($signature->status) {
                        return 'Aktif';
                    }else{
                        return 'Tak Aktif';
                    }
                })
                ->editColumn('action', function ($signature) {
                    $button = "";
                    $button .= '<a onclick="edit('.$signature->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i> Kemaskini</a> ';
                    $button .= '<a onclick="remove('.$signature->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    return $button;
                })
                ->make(true);
        }
        else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','signature')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Tandatangan";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('admin.signature.index',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function insert(Request $request) {

        $signature = Signature::create($request->all());

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','signature')->firstOrFail()->id;
        $log->activity_type_id = 4;
        $log->description = "Tambah Pengurusan Tandatangan";
        $log->data_new = json_encode($signature);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        if ($request->picture && $request->file('picture')->isValid()) {

            $path = Storage::disk('public')->putFileAs(
                'signature',
                $request->file('picture'),
                'signature.'.uniqid().".".$request->file('picture')->getClientOriginalExtension()
            );

            $signature = $signature->update(['picture'=>$path]);
        }

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data baru telah ditambah.']);
    }

    /**
     * Show the specified resource.
     * @param  Request $request
     * @return Responsei
     */
    public function edit(Request $request) {

        $signature = Signature::findOrFail($request->id);
        $user = UserInternal::all();

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','signature')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Pengurusan Tandatangan";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return view('admin.signature.edit', compact('signature','user'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request) {

        $signature = Signature::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','signature')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Pengurusan Tandatangan";
        $log->data_old = json_encode($signature);

        $signature->update($request->all());

        if ($request->picture && $request->file('picture')->isValid()) {

            $path = Storage::disk('public')->putFileAs(
                'signature',
                $request->file('picture'),
                'signature.'.uniqid().".".$request->file('picture')->getClientOriginalExtension()
            );

            $signature->update(['picture'=>$path]);
        }

        $log->data_new = json_encode($signature);
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

        $signature = Signature::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','signature')->firstOrFail()->id;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Tandatangan";
        $log->data_old = json_encode($signature);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $signature->delete();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dipadam.']);
    }
}
