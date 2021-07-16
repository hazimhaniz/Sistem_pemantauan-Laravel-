<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Projek;
use App\ProjekBulananStatus;
use App\Stesen;
use Illuminate\Support\Facades\DB;

class SummaryHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $monthlyReports = ProjekBulananStatus::with('status')->where('projek_id', $id)->get();

        $monthlyReportsId = $monthlyReports->pluck('bulanan');

        $stesen = Stesen::where('projek_id', $id)->where('bulan', $monthlyReportsId)->get();

        return response()->json([
            'success' => true,
            'message' => 'Projek Diterima',
            'data' => $stesen
        ]);

        // $first = DB::table('projek_bulanan_status')
        //     ->select(DB::raw('CAST(bulanan AS int) AS bulanan'), 'year', 'id')
        //     ->where('projek_id', $id);

        // $second = DB::table('stesen')
        //     ->select(DB::raw('CAST(bulan AS int) AS bulan'), 'tahun', 'id')
        //     ->where('projek_id', $id)->union($first)->get()->pluck('id');

        // $stesen = Stesen::with(['projectBulananStatus' => function ($query) {
        //     $query->where('bulan', $query->bulan);
        // }])->whereIn('id', $second)->get();

        return response()->json([
            'success' => true,
            'message' => 'Projek Diterima',
            'data' => ProjekBulananStatus::with('status')->where('projek_id', $id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function appendLabel($id)
    {
        $project = Projek::find($id);

        return response()->json([
            'data' => $project
        ]);
    }
}
