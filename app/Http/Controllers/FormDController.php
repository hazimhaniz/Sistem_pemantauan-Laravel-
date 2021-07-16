<?php

namespace App\Http\Controllers;

use App\MonthlyD;
use App\MonthlyDBulanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use App\ProjekHelper;
use Storage;

class FormDController extends Controller
{
    public function saveD(Request $request)
    {
        $requestAll = $request->all();
        $borangDID = $request->borangDID;

        $master_bmp_id = $request->master_bmp_id;
        $master_bmp_code = $request->master_bmp_code;
        $master_bmp_component = $request->master_bmp_component;
        $bmp_date = $request->bmp_date;
        $ulasan = $request->ulasan;
        
        $monthlyD = MonthlyD::where('id', $borangDID)->first();
        $projek_id = $monthlyD->projek_id;

        for ($i = 0; $i < count($master_bmp_id); $i++) { 
            if(empty($requestAll['status_'.$master_bmp_id[$i]])){
                return response()->json(['test' => 'Gagal', 'txt' => 'Sila isi semua status. Tandakan tidak berkaitan jika tiada.', 'status' => 'error']);
            }

            if(isset($requestAll['status_'.$master_bmp_id[$i]]) && $requestAll['status_'.$master_bmp_id[$i]]=="1"){
                if(empty($bmp_date[$i])){
                    return response()->json(['test' => 'Gagal', 'txt' => 'Sila pilih tarikh untuk status yang baik/perlu diselenggara.', 'status' => 'error']);
                }
            }

            if( isset($requestAll['status_' . $master_bmp_id[$i]]) && $requestAll['status_'.$master_bmp_id[$i]] == "2"){
              if(empty($bmp_date[$i])){
                return response()->json(['test' => 'Gagal', 'txt' => 'Sila pilih tarikh untuk status yang baik/perlu diselenggara.', 'status' => 'error']);
            }
        }
        

        if (isset($requestAll['status_' . $master_bmp_id[$i]])) {
            $monthlyDBulanan = MonthlyDBulanan::firstOrCreate(['monthlyD_id' => $borangDID, 'elemen_pemeriksaan' => $master_bmp_id[$i]]);
            $monthlyDBulanan->monthlyD_id = $borangDID;
            $monthlyDBulanan->elemen_pemeriksaan = $master_bmp_id[$i];
            $monthlyDBulanan->ulasan = $ulasan[$i];
            $monthlyDBulanan->kod_bmp = $master_bmp_code[$i];
            $monthlyDBulanan->jenis_komponen = $master_bmp_component[$i];
            $monthlyDBulanan->kod_bmp_status = $requestAll['status_' . $master_bmp_id[$i]];

            if ($bmp_date[$i]) {
                $bmp_date_cvt = Carbon::createFromFormat('d/m/Y', $bmp_date[$i]);
                $monthlyDBulanan->kod_bmp_date = $bmp_date_cvt;
            }
            $monthlyDBulanan->save();

            if (!empty($requestAll['files'][$i])) {
                uploadFiles($monthlyDBulanan, ['files' => array($requestAll['files'][$i])], 'borang_D_attach', $projek_id);
            }

        } else {
            MonthlyDBulanan::where('monthlyD_id', $borangDID)->where('elemen_pemeriksaan', $master_bmp_id[$i])->delete();
        }
    }

    return response()->json(['test' => 'Berjaya', 'txt' => 'Maklumat berjaya disimpan', 'status' => 'success', $requestAll]);
}

public function getD(Request $request)
{
    $borangDID = $request->borangDID;
    $monthlyDBulanans = MonthlyDBulanan::where('monthlyD_id', $borangDID)->with('docType')->get();

    foreach ($monthlyDBulanans as $key => $monthlyDBulanan) {

        if(count($monthlyDBulanan->docType) > 0)
        {
            $monthlyDBulanan->setAttribute('path_download', Storage::url($monthlyDBulanan->docType));
        }

        if ($monthlyDBulanan->kod_bmp_date) {
                // $monthlyDBulanan->kod_bmp_date = $monthlyDBulanan->kod_bmp_date->format('d/m/Y');
            $monthlyDBulanan->setAttribute('kod_bmp_date_dmy', $monthlyDBulanan->kod_bmp_date->format('d/m/Y'));
        }
    }        
    return response()->json($monthlyDBulanans);
}

public function tindakanBorangD(Request $request)
{
    $monthlyDID = $request->monthlyDID; 
    $status = $request->status;

    $monthlyD = MonthlyD::where('id', $monthlyDID)->first();
    $monthlyD->status_id = $status;
    $monthlyD->save();

    ProjekHelper::checkAllFormStatus($monthlyD->projek_id, $monthlyD->tahun, $monthlyD->bulan);

    Session::flash('success', 'Maklumat telah disimpan');
    return redirect()->back();
}
}
