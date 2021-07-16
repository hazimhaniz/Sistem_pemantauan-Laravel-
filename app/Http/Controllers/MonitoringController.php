<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class MonitoringController extends Controller
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

        $add = '';

        $table = 'app_good_conduct';

        $results = DB::select('SELECT
            YEAR(created_at) as year,
            COUNT(*) as total,
            SUM(CASE WHEN filing_status_id < 8 AND filing_status_id > 1 THEN 1 ELSE 0 END) as pending,
            SUM(CASE WHEN filing_status_id > 7 THEN 1 ELSE 0 END) as completed
        FROM '.$table.'
        WHERE filing_status_id > 1 '.$add.'
        GROUP BY year
        ORDER BY year DESC');

    	return view('monitoring.index', compact('results', 'table'));
    }
}
