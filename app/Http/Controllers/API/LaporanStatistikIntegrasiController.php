<?php

namespace App\Http\Controllers\API;

use DB;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LaporanStatistikIntegrasiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /*public function __construct() {
        $this->middleware('auth');
    }*/

    /**
     * Show the main page
     *
     * @return \Illuminate\Http\Response
     */
 
    public function laporanStatistikIntegrasi() {

        $apidata = DB::table('laporan_statistik_integrasi')->select('no_fail_jas','stesen','nama_stesen','lokasi','daerah','negeri','latitude','longitude','pengawasan_id','kedalaman')->get();
        // foreach ($apidata as $keyapidata => $valueapidata) {
        //     $apidatamarkah = DB::table('laporan_statistik_integrasi_markah')->where('stesen',$valueapidata->nama_stesen)->select('no_fail_jas','stesen','bulan_tahun','markah')->get();
        //     $apidatabacaan = DB::table('laporan_statistik_integrasi_bacaan')->where('stesen',$valueapidata->nama_stesen)->select('no_fail_jas','stesen','bulan_tahun','tarikh_persampelan','masa_persampelan','parameter','unit','bacaan_bulanan')->get();
        //     $sendapi[]['projek'] = $valueapidata;
        //     $sendapi[]['markah'] = $apidatamarkah;
        //     $sendapi[]['bacaan'] = $apidatabacaan;
        // }
        if(count($apidata) > 0){
            return response()->json(['status' => 'success', 'result' => $apidata]);
        } else {
            return response()->json(['status' => 'no record']);
        }
    }


    public function laporanStatistikIntegrasiDetail(Request $request) {
        // dd($request->request);
        // $apidata = DB::table('laporan_statistik_integrasi')->get();
        // foreach ($apidata as $keyapidata => $valueapidata) {
            $apidatabacaan = DB::table('laporan_statistik_integrasi_bacaan')->whereYear('bulan_tahun',$request->tahun);
            $apidatabacaan = $apidatabacaan->whereMonth('bulan_tahun',$request->bulan)->select('no_fail_jas','stesen','tarikh_persampelan','masa_persampelan','parameter','bacaan_bulanan')->get();
            // dd(vsprintf(str_replace(['?'], ['\'%s\''], $apidatabacaan->toSql()), $apidatabacaan->getBindings()));
            // $sendapi[]['projek'] = $valueapidata;
            // $sendapi[]['bacaan'] = $apidatabacaan;
        // }
        if(count($apidatabacaan) > 0){
            return response()->json(['status' => 'success', 'result' => $apidatabacaan]);
        } else {
            return response()->json(['status' => 'no record']);
        }
    }

    public function laporanStatistikIntegrasiMarkah(Request $request) {
        // dd($request->request);
        // $apidata = DB::table('laporan_statistik_integrasi')->get();
        // foreach ($apidata as $keyapidata => $valueapidata) {
            $apidatabacaan = DB::table('laporan_statistik_integrasi_markah')->whereYear('bulan_tahun',$request->tahun);
            $apidatabacaan = $apidatabacaan->whereMonth('bulan_tahun',$request->bulan)->select('no_fail_jas','bulan_tahun','markah')->get();
            // dd(vsprintf(str_replace(['?'], ['\'%s\''], $apidatabacaan->toSql()), $apidatabacaan->getBindings()));
            // $sendapi[]['projek'] = $valueapidata;
            // $sendapi[]['bacaan'] = $apidatabacaan;
        // }
        if(count($apidatabacaan) > 0){
            return response()->json(['status' => 'success', 'result' => $apidatabacaan]);
        } else {
            return response()->json(['status' => 'no record']);
        }
    }

    public function laporanStatistikIntegrasiBulanan(Request $request) {
        // dd($request->request);
        // $apidata = DB::table('laporan_statistik_integrasi')->get();
        // foreach ($apidata as $keyapidata => $valueapidata) {
            $apidatabacaan = DB::table('laporan_statistik_integrasi')->whereYear('created_at',$request->tahun);
            $apidatabacaan = $apidatabacaan->whereMonth('created_at',$request->bulan)->select('no_fail_jas','status_projek')->get();
            // dd(vsprintf(str_replace(['?'], ['\'%s\''], $apidatabacaan->toSql()), $apidatabacaan->getBindings()));
            // $sendapi[]['projek'] = $valueapidata;
            // $sendapi[]['bacaan'] = $apidatabacaan;
        // }
        if(count($apidatabacaan) > 0){
            return response()->json(['status' => 'success', 'result' => $apidatabacaan]);
        } else {
            return response()->json(['status' => 'no record']);
        }
    }

    //url/api-esdr-stesen
    public function laporanESDRStesen() {
        $database_integrasi = DB::connection('mysql2');
        $apidata = $database_integrasi->table('laporan_esdr_stesen')->select('no_fail_jas','status_projek','nama_stesen','daerah','negeri','latitude','longitude','pengawasan_id','kedalaman','kelas','parameter','unit','standard','baseline')->get();

        if(count($apidata) > 0){
            return response()->json(['status' => 'success', 'result' => $apidata]);
        } else {
            return response()->json(['status' => 'no record']);
        }
    }
    //url/api-esdr-bulanan?bulan=04&tahun=2020
    public function laporanESDRBulanan(Request $request) {
        $database_integrasi = DB::connection('mysql2');
        $apidata = $database_integrasi->table('laporan_esdr_bulanan')->whereYear('bulan_tahun',$request->tahun);
            $apidata = $apidata->whereMonth('bulan_tahun',$request->bulan)->select('no_fail_jas','bulan_tahun','markah')->get();

        if(count($apidata) > 0){
            return response()->json(['status' => 'success', 'result' => $apidata]);
        } else {
            return response()->json(['status' => 'no record']);
        }
    }
    //api-esdr-parameter?bulan=04&tahun=2020
    public function laporanESDRParameter(Request $request) {
        $database_integrasi = DB::connection('mysql2');
        $apidata = $database_integrasi->table('laporan_esdr_parameter')->whereYear('tarikh_persampelan',$request->tahun);
            $apidata = $apidata->whereMonth('tarikh_persampelan',$request->bulan)->select('no_fail_jas','nama_stesen','tarikh_persampelan','masa_persampelan','pengawasan_id','parameter','bacaan')->get();

        if(count($apidata) > 0){
            return response()->json(['status' => 'success', 'result' => $apidata]);
        } else {
            return response()->json(['status' => 'no record']);
        }
    }
}
