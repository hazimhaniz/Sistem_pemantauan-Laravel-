<?php

namespace App\Http\Controllers;

use App\LogSystem;
use App\Models\UploadedFile;
use App\MonthlyA;
use App\MonthlyB;
use App\MonthlyBSyarat;
use App\Projek;
use App\ProjekEMP;
use App\ProjekHelper;
use App\ProjekLDP2M2;
use Illuminate\Http\Request;
use Session;

class BorangBController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getBorangB($id)
    {
        $monthlyB = MonthlyBSyarat::where('monthly_b_id', $id)->get();
        $formB = MonthlyB::where('id', $id)->first();
        $projek = $formB->projek;

        $year = $formB->tahun;
        $month = $formB->bulan;

        $projekEMP = ProjekEMP::where('projek_id', $id)->get();
        $projekLdp2m2 = ProjekLDP2M2::where('projek_id', $id)->get();

        $borangA = MonthlyA::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangB = MonthlyB::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();

        $borangBSyarats = MonthlyBSyarat::where('monthly_b_id', $borangB->id)->get();

        return view('form.index', compact('monthlyB', 'projek', 'year', 'month', 'projekEMP', 'projekLdp2m2', 'borangA', 'borangB', 'borangBSyarats'));
    }

    public function BorangB(Request $request)
    {
        $log = new LogSystem;
        $log->module_id = 7;
        $log->activity_type_id = 3;
        $log->description = "Papar Modal (Popup) Bahagian B - Pengguna Luaran";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        ///////////////////// Checking Tarikh If Exist ///////////////////////////
        // dd($request->all());
        $projekID = $request->projekID;
        $projek = Projek::where('id', $projekID)->first();
        $month = $request->month;
        $year = $request->year;

        if ($request->tarikh_laporan_eia) {
            $MonthlyB = MonthlyB::firstOrCreate(['projek_id' => $projekID, 'tahun' => $year, 'bulan' => $month]);
            $MonthlyB->projek_id = $projekID;
            // $MonthlyB->pakej_id = 348;
            $MonthlyB->status_id = 600;
            $MonthlyB->bulan = $month;
            $MonthlyB->tahun = $year;
            $MonthlyB->nama_projek = $projek->nama_projek;
            $MonthlyB->tarikh_kelulusan_eia = $request->tarikh_laporan_eia;
            $MonthlyB->jururunding_eia = $request->jurunding_eia;
            $MonthlyB->tarikh_kelulusan_emp = $request->tarikh_laporan_eia_diluluskan;
            $MonthlyB->jururunding_post_eia = $request->jurunding_pengawasan_eia;
            $MonthlyB->save();
        }
        /////////////////// End Checking Tarikh  //////////////////////////////

        ////////////////// Checking Syarat /////////////////////
        if ($request->syarat) {
            $borangB = MonthlyB::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
            MonthlyBSyarat::where('monthly_b_id', $borangB->id)->delete();

            for ($i = 0; $i < $request->syarat; $i++) {
                $MonthlyBSyarat = new MonthlyBSyarat;
                $MonthlyBSyarat->monthly_b_id = $MonthlyB->id;
                $MonthlyBSyarat->save();
            }

            $getMonthlyB = MonthlyBSyarat::where('monthly_b_id', $MonthlyB->id)->get();
        }
        //////////////// End Syarat /////////////////////////

        return response()->json(['status' => 'Maklumat berjaya disimpan', 'id' => $MonthlyB, 'url' => route('form.bahagianB', $MonthlyB)]);

    }

    public function postSyarat(Request $request)
    {
        $log = new LogSystem;
        $log->module_id = 7;
        $log->activity_type_id = 3;
        $log->description = "Tambah Syarat Bahagian B - Pengguna Luaran";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        /////////////////// Simpan Syarat Borang B //////////////////////////////////
        $projekID = $request->projekID;
        $projek = Projek::where('id', $projekID)->first();
        $month = $request->month;
        $year = $request->year;

        if ($request->id_borangB) {
            for ($i = 0; $i < count($request->id_borangB); $i++) {
                $borang_B = MonthlyBSyarat::where('id', $request->id_borangB[$i])->first();
                // $borang_B->syarat = $request->syarat[$i];
                $borang_B->ulasan = $request->ulasan[$i];
                $borang_B->save();
            }
        }
        /////////////////// End Syarat Borang B //////////////////////////////////

        return response()->json(['status' => 'Maklumat berjaya disimpan', 'url' => url('/projek/form/' . $projekID . '/' . $year . '/' . $month)]);

    }

    public function deleteSyarat(Request $request)
    {
        $syaratBID = $request->syaratBID;
        MonthlyBSyarat::where('id', $syaratBID)->delete();

        return response()->json(null);
    }

    public function projekGetSyaratB(Request $request)
    {
        $projekid = $request->projekid;
        $year = $request->year;
        $month = $request->month;

        $projek = Projek::where('id', $projekid)->first();
        $monthlyB = MonthlyB::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();

        $borangBSyarats = MonthlyBSyarat::where('monthly_b_id', $monthlyB->id)->get();

        return view('form.senarai_syarat_b', compact('projekid', 'year', 'month', 'projek', 'monthlyB', 'borangBSyarats'));
    }

    public function deleteDocSyaratB(Request $request)
    {
        $syaratBDocID = $request->syaratBDocID;
        UploadedFile::where('id', $syaratBDocID)->delete();

        return response()->json(['status' => "Dokumen berjaya dipadam"]);
    }

    public function projekSaveSyaratNumber(Request $request)
    {
        $syarat = $request->syarat;
        $monthlyBID = $request->monthlyBID;

        $monthlyB = MonthlyB::where('id', $monthlyBID)->first();
        $monthlyB->tarikh_kelulusan_eia = $request->tarikh_laporan_eia;
        $monthlyB->jururunding_eia = $request->jurunding_eia;
        $monthlyB->tarikh_kelulusan_emp = $request->tarikh_laporan_eia_diluluskan;
        $monthlyB->jururunding_post_eia = $request->jurunding_pengawasan_eia;
        $monthlyB->save();

        MonthlyBSyarat::where('monthly_b_id', $monthlyBID)->delete();

        for ($i = 0; $i < $syarat; $i++) {
            $monthlyBSyarat = new MonthlyBSyarat;
            $monthlyBSyarat->monthly_b_id = $monthlyBID;
            $monthlyBSyarat->save();
        }

        return response()->json($monthlyB);
    }

    public function projekSaveSyaratB(Request $request)
    {
        $dataID = $request->dataID;
        $dataColumn = $request->dataColumn;
        $monthlyBSyarat = MonthlyBSyarat::where('id', $dataID)->first();
        $monthlyB = MonthlyB::where('id', $monthlyBSyarat->monthly_b_id)->first();

        if ($dataColumn == 'fail') {
            uploadFiles($monthlyBSyarat, ['files' => $request->fail], 'fail', $monthlyB->projek_id);
        } else {
            $value = $request->value;

            $monthlyBSyarat[$dataColumn] = $value;
            $monthlyBSyarat->save();
        }

        return response()->json($monthlyBSyarat);
    }

    public function tindakanSyaratB(Request $request)
    {
        $monthlyBID = $request->monthlyBID;
        $status = $request->status;

        $monthlyB = MonthlyB::where('id', $monthlyBID)->first();
        $monthlyB->status_id = $status;
        $monthlyB->save();

        $log = new LogSystem;
		$log->module_id = 8;
		$log->activity_type_id = 4;
		$log->description = "Penghantaran Borang B";
		$log->url = $request->fullUrl();
		$log->method = strtoupper($request->method());
		$log->ip_address = $request->ip();
		$log->created_by_user_id = auth()->id();
		$log->save();

        ProjekHelper::checkAllFormStatus($monthlyB->projek_id, $monthlyB->tahun, $monthlyB->bulan);

        Session::flash('success', 'Maklumat telah disimpan');
        return redirect()->back();
    }

}
