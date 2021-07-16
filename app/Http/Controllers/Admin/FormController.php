<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LogModel\LogSystem;
use App\OtherModel\Flow;
use App\MasterModel\MasterLetterType;
use App\MasterModel\MasterModule;
use App\MasterModel\MasterUseCase;
use App\MasterModel\MasterUseCaseType;
use Validator;
use App\Role;

class FormController extends Controller
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
      
        $all_module = MasterModule::whereNotNull('model')->get();
        $all_role = Role::whereBetween('id',[6,20])->get();

        if($request->ajax()) {
            // $log = new LogSystem;
            // $log->module_id = 55;
            // $log->activity_type_id = 1;
            // $log->description = "Papar senarai Pengurusan Permohonan";
            // $log->data_old = json_encode($request->input());
            // $log->url = $request->fullUrl();
            // $log->method = strtoupper($request->method());
            // $log->ip_address = $request->ip();
            // $log->created_by_user_id = auth()->id();
            // $log->save();

            if ($request->filter_module_id) {
                $module = MasterModule::where('id',$request->filter_module_id)->first();
                $model_class = $module->model;
                // $form = $model_class::where('filing_status_id','>',1);
                $form = $model_class::all();
                $module_id = $request->filter_module_id;
            }else{
                $form = \App\FilingModel\FormB::all();
                $module_id = 7;
            }

            return datatables()->of($form)
                ->editColumn('applicant', function ($form) {
                    $result = '';

                    if ($form->applicant) {
                        $result .= $form->applicant;
                    }else if($form->created_by) {
                        $applicant = $form->created_by;

                        $result .= $applicant->name;
                        $result .= '<br><br><small style="font-size: smaller;">';
                        $result .= $applicant->username;
                        $result .= '<br><br><small style="font-size: smaller;">';
                        $result .= $applicant->email;
                        $result .= '<br><small style="font-size: smaller;">';
                    }

                    return $result;
                })
                ->editColumn('applied_at', function ($form) {
                    return $form->created_at;
                })
                ->editColumn('status', function ($form) {
                    return $form->status->name;
                })
                ->editColumn('reference_no', function ($form) {
                    return optional(optional($form->references())->first())->reference_no;
                })
                ->editColumn('letter', function ($form) use($module_id) {
                    $result = '';

                    foreach(MasterLetterType::where('module_id',$module_id)->get() as $letter){
                        $result .= letterButton($letter->id, get_class($form), $form->id);
                        // $result .= '<a href="'.route('letter.'.$letter->template_name, $form->id).'" target="_blank" class="btn btn-default btn-xs mb-1"><i class="fa fa-download mr-1"></i> '.$letter->name.'</a><br>'; 
                    }

                    return $result;
                })
                ->editColumn('holder', function ($form) {
                    $result = '';

                    // if ($form->logs()->get()->last()->created_by->name) {
                    //     $result .= $form->logs()->get()->last()->created_by->name;
                    //     $result .= '<br><br><small style="font-size: smaller;">';
                    //     $result .= $form->logs()->get()->last()->created_by->username;
                    //     $result .= '<br><br><small style="font-size: smaller;">';
                    //     $result .= $form->logs()->get()->last()->created_by->email;
                    //     $result .= '<br><small style="font-size: smaller;">';
                    // }

                    return $result;
                })
                ->editColumn('action', function ($form) {
                    $button = "";
                    $button .= '<a onclick="viewFiling(\''.addslashes(get_class($form)).'\','.$form->id.')" href="javascript:;" class="btn btn-default btn-xs mb-1"><i class="fa fa-search mr-1"></i> Lihat</a><br>';

                    $button .= '<a onclick="viewFlow(\''.addslashes(get_class($form)).'\','.$form->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-list mr-1"></i> Flow</a><br>';
                    return $button;
                })
                ->make(true);
        }
        else {
            // $log = new LogSystem;
            // $log->module_id = 54;
            // $log->activity_type_id = 9;
            // $log->description = "Buka paparan Pengurusan Flow";
            // $log->url = $request->fullUrl();
            // $log->method = strtoupper($request->method());
            // $log->ip_address = $request->ip();
            // $log->created_by_user_id = auth()->id();
            // $log->save();
        }

        return view('admin.form.index',compact('all_module','all_role'));

    }
    public function form(Request $request) {
        
        return view('form.form',compact('all_module','all_role'));

    }

}