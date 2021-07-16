<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OtherModel\ComplaintExternal;
use App\LogModel\LogSystem;
use Validator;


class ComplaintController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = 50;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Aduan Luaran";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $complaint = ComplaintExternal::orderBy('id', 'DESC');
            // dd($complaint);

            return datatables()->of($complaint)
                ->editColumn('created_at', function ($complaint) {
                    return date('d/m/Y h:i A', strtotime($complaint->created_at));
                })
                // ->editColumn('action', function ($complaint) {
                //     $button = "";
                //     // $button .= '<a href="#" class="btn btn-info btn-xs"><i class="fa fa-search"></i></a> ';
                //     $button .= '<a onclick="edit('.$complaint->id.')" href="javascript:;" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a> ';
                //     $button .= '<a onclick="remove('.$complaint->id.')" href="javascript:;" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> ';
                //     return $button;
                // })
                ->make(true);
        }
        else {
            $log = new LogSystem;
            $log->module_id = 50;
            $log->activity_type_id = 9;
            $log->description = "Papar senarai Aduan Luaran";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('complaint-external.index');
    }


    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email',
            'complaint' => 'required|string',
            // 'g-recaptcha-response' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            // If validation failed
            return response()->json(['errors' => $validator->errors()], 422);
        }

        ComplaintExternal::insert($request->only('name','email','complaint'));

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Aduan anda telah diterima oleh pihak JHEKS.']);
    }
}
