<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\ViewModel\ViewDashboardStat1;
use App\ViewModel\ViewDashboardStat2;
use App\ViewModel\ViewDashboardStat3;
use App\ViewModel\ViewDashboardStat4;
use App\ViewModel\ViewDashboardStat5;
use App\MasterModel\MasterModule;
use App\MasterModel\MasterFilingStatus;
use App\OtherModel\Announcement;
use App\OtherModel\Inbox;
use App\FilingModel\Reference;
use App\FilingModel\FormBB;
use App\FilingModel\FormB;
use App\LogModel\LogSystem;
use Carbon\Carbon;
use App\User;
use App\FilingModel\GoodConduct;



use App\Http\Controllers\Controller;
use App\OtherModel\Address;
use App\MasterModel\MasterCountry;
use App\MasterModel\MasterState;
use App\LogModel\LogFiling;
use App\FilingModel\Query;
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
use App\FilingModel\Appeal;
use App\FilingModel\CertWaiver;
use App\FilingModel\RegAbroad;
use App\FilingModel\MalaysianMissing;
use App\FilingModel\ForeignMissing;
use App\UserInternal;
use Validator;
use Mail;
use PDF;
use Storage;
use DB;
use App\Custom\PhpWord;

class FormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function form(Request $request) {
        
        return view('form.index');

    }
       public function elemen(){
        return view('form.index');
    }

}
