<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FilingModel\Distribution;
use App\LogModel\LogSystem;
use App\MasterModel\MasterModule;
use App\UserInternal;
use App\User;
use App\Mail\Filing\Distributed;
use Mail;

class DistributionController extends Controller
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
        ini_set('memory_limit', '1024M');
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        $list = range(6,36);
        array_push($list, 53);
      
        $modules = MasterModule::whereIn('id', $list)->get();

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','distribution')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Agihan";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $distributions = Distribution::with(['filing','assigned_to']);//->has('filing.logs')->where('filing_status_id', '>', 1);
            //var_dump($distributions);

            $distributions->orderBy('created_at', 'DESC');

            $distributions = $distributions->get()->filter(function($distribution) use($request) {
                $result = true;

                if($request->module_id && $request->module_id != -1) {
                    $result = $result && ($distribution->filing->logs->first() ? $distribution->filing->logs->first()->module_id == $request->module_id : false);
                }

                if($request->reference_no) {
                    $result = $result && ($distribution->filing->references->first() ? stripos($distribution->filing->references->first()->reference_no, $request->reference_no) !== false : false);
                }

                if($request->assigned_to) {
                    $result = $result && ($distribution->assigned_to ? stripos($distribution->assigned_to->name, $request->assigned_to) !== false : false);
                }

                return $result;
            });

            return datatables()->of($distributions)
                ->editColumn('created_at', function ($distribution) {
                    return date('d/m/Y h:i A', strtotime($distribution->created_at));
                })
                ->editColumn('module', function ($distribution) {
                    if (isset($distribution->filing->logs->first()->module->name))
                        return $distribution->filing->logs->first()->module->name;
                    else
                        return '-';
                })
                ->editColumn('filing.reference_no', function ($distribution) {
                    if($distribution->filing->references->first() !== NULL)
                        return '<a onclick="viewFiling(\''.addslashes(get_class($distribution->filing)).'\','.$distribution->filing->id.')" href="#" class="btn btn-default btn-xs"><i class="fa fa-search m-r-5"></i> '.$distribution->filing->references->first()->reference_no.'</a>';
                    else
                        return '-';
                })
                ->editColumn('assigned_to.name', function ($distribution) {
                    if(isset($distribution->assigned_to))
                        return $distribution->assigned_to->name;
                    else
                        return '-';
                })
                ->editColumn('assigned_to.entity.role.name', function ($distribution) {
                    if(isset($distribution->assigned_to))
                        return '<span class="badge badge-default">'.strtoupper($distribution->assigned_to->entity->role->name).'</span>';
                    else
                        return '-';
                })
                ->editColumn('action', function ($distribution) {
                    $button = "";
                    $button .= '<a onclick="edit('.$distribution->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1"><i class="fa fa-edit mr-1"></i> Ubah Agihan</a>';
                    return $button;
                })
                ->make(true);
        }
        else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','distribution')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Agihan";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }
        return view('distribution.index', compact('modules'));
    }

    public function edit(Request $request) {

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','distribution')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Pengurusan Agihan";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $distribution = Distribution::findOrFail($request->id);

        if(auth()->user()->hasRole('pkpp')) {
            $userstaff = UserInternal::where('section_id',2)->get();
        } else if(auth()->user()->hasRole('pkpg')) {
            $userstaff = UserInternal::where('section_id',1)->get();
        } else if(auth()->user()->hasRole('pw')) {
            $userstaff = UserInternal::where('province_office_id',auth()->user()->entity->province_office_id)->get();
        } else {
            $userstaff = UserInternal::where('role_id',$distribution->assigned_to->entity->role_id)->get();
        }

        $modules = MasterModule::where('id', '>', 5)->where('id', '<', 37)->get();

        return view('distribution.edit', compact('distribution','userstaff'));
    }

    public function update(Request $request) {

        $distribution = Distribution::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','distribution')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Pengurusan Agihan";
        $log->data_old = json_encode($distribution);

        $distribution->update($request->all());

        $user = User::findOrFail($request->all());

        // Mail::to($user->pluck('email'))->send(new Distributed(auth()->user(), $distribution, 'Perubahan Agihan'));

        // SAHAH TRY
        Mail::to($user->pluck('email'))->send(new Distributed($distribution->filing, 'Perubahan Agihan'));
        
        $log->data_new = json_encode($distribution);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dikemaskini.']);

    }
}
