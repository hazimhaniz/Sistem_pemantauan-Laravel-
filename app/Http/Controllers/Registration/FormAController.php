<?php

namespace App\Http\Controllers\Registration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OtherModel\Address;
use App\OtherModel\Flow;
use App\ViewModel\ViewUserDistributionPTW;
use App\ViewModel\ViewUserDistributionPPW;
use App\ViewModel\ViewUserDistributionPTHQ;
use App\ViewModel\ViewUserDistributionPPHQ;
use App\MasterModel\MasterConstitutionTemplate;
use App\MasterModel\MasterSectorCategory;
use App\MasterModel\MasterDesignation;
use App\MasterModel\MasterMeetingType;
use App\MasterModel\MasterUnionType;
use App\MasterModel\MasterCountry;
use App\MasterModel\MasterSector;
use App\MasterModel\MasterState;
use App\LogModel\LogFiling;
use App\LogModel\LogSystem;
use App\FilingModel\Query;
use App\FilingModel\FormB;
use App\FilingModel\Tenure;
use App\FilingModel\Officer;
use App\FilingModel\Requester;
use App\FilingModel\Distribution;
use App\Mail\Filing\Queried;
use App\Mail\Filing\Distributed;
use App\Mail\Filing\SendToHQ;
use App\Mail\Filing\Received;
use App\Mail\Filing\ReceivedHQ;
use App\Mail\FormB\Sent;
use App\Mail\FormB\Delayed;
use App\Mail\FormB\Approved;
use App\Mail\FormB\Rejected;
use App\Mail\FormB\NotReceived;
use App\Mail\FormB\ReminderMeeting;
use App\Mail\FormB\DocumentApproved;
use Carbon\Carbon;
use App\UserInternal;
use App\User;
use Validator;
use Mail;
use PDF;
use Storage;
use App\Custom\PhpWord;

class FormAController extends Controller
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

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','registration_a')->firstOrFail()->id;
        $log->activity_type_id = 9;
        $log->description = "Buka paparan Borang A - Permohonan";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return view('registration.forma.index', compact('formb','errors_b2', 'errors_b3','errors_b4'));
    }

}