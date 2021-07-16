<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LogModel\LogSystem;
use App\FilingModel\GoodConduct;
use App\FilingModel\CertWaiver;
use App\FilingModel\RegAbroad;
use App\MasterModel\MasterFilingStatus;
use Validator;


class ListController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function ListApplication(){
        
        $goodconduct = GoodConduct::select('id','created_by_user_id','filing_status_id','created_at')->where('created_by_user_id',auth()->user()->id);
        $certwaiver = CertWaiver::select('id','created_by_user_id','filing_status_id','created_at')->where('created_by_user_id',auth()->user()->id);

        // dd(vsprintf(str_replace(['?'], ['\'%s\''], $certwaiver->toSql()), $certwaiver->getBindings()));

        $list = RegAbroad::select('id','created_by_user_id','filing_status_id','created_at')->where('created_by_user_id',auth()->user()->id)->union($certwaiver)->union($goodconduct)->get();

        $status = MasterFilingStatus::all();

        return view('application.cert_goodconduct_list.index',compact('list','status'));
    }

}
