<?php

namespace App\Http\Controllers;

use App\PengurusanKuiri;
use App\ProjekBulananStatus;
use Auth;
use Illuminate\Http\Request;
use App\Models\MasterPengawasan;
use App\MasterElemenPemeriksaan;
use App\MonthlyBSyarat;
use App\ProjekHelper;

class ProjekKuiriController extends Controller
{
    public function getSenaraiKuiri(Request $request)
    {
        $projekid = $request->projekid;
        $year = $request->year;
        $month = $request->month;

        $kuiris = PengurusanKuiri::where('projek_id', $projekid)->where('year', $year)->where('month', $month)->get();

        foreach ($kuiris as $key => $kuiri) {
            $subText = "";
            if($kuiri->form_class == "B")
            {
                $monthlyBSyarat = MonthlyBSyarat::where('id', $kuiri->form_id)->first();
                $subText = $monthlyBSyarat->syarat;
            }

            if($kuiri->form_class == "C")
            {
                $pengawasan = MasterPengawasan::where('id', $kuiri->form_id)->first();
                $subText = $pengawasan->jenis_pengawasan;
            }

            if($kuiri->form_class == "D")
            {
                $elemen = MasterElemenPemeriksaan::where('id', $kuiri->form_id)->first();
                $subText = $elemen->name;
            }

            $kuiri->setAttribute('subText', $subText);
        }

        return view('form.senarai_kuiri', compact('kuiris'));
    }

    public function getLihatKuiri(Request $request)
    {
        $kuiriID = $request->kuiriID;
        $kuiri = PengurusanKuiri::where('id', $kuiriID)->first();
        $projek = $kuiri->projek;

        ProjekHelper::updateLaporanPemarkahan($kuiri->projek_id, $kuiri->year, $kuiri->month);

        return view('form.lihat_kuiri', compact('kuiri', 'projek'));
    }

    public function jawabKuiri(Request $request)
    {
        $kuiriID = $request->kuiriID;
        $queryJawabText = $request->queryJawabText;

        $kuiri = PengurusanKuiri::where('id', $kuiriID)->first();
        $kuiri->balas = $queryJawabText;
        $kuiri->balas_user_id = Auth::user()->id;
        $kuiri->tarikh_balas = now();
        $kuiri->status = 506;
        $kuiri->save();

        // $projekBulananStatus = ProjekBulananStatus::where('projek_id', $kuiri->projek_id)->where('year', $kuiri->year)->where('bulanan', $kuiri->month)->first();
        // $projekBulananStatus->status = 506;
        // $projekBulananStatus->save();

        return response()->json($kuiri);
    }
}
