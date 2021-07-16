<?php
namespace App\Http\ViewComposers;

use App\MasterKomponenPemeriksaan;
use App\MonthlyD;
use App\MonthlyDRainyMain;
use Illuminate\View\View;

class KeluarMasukComposer
{
    public function _construct()
    {

    }

    public function compose(View $view)
    {
        $elemen_id = 1;
        $MasterBMPs = [];

        $borangD = $view->borangD;
        $laporan_hujan = $view->laporan_hujan;

        if (!$view->borangD) {
            $borangD = MonthlyD::where('projek_id', $view->projek->id)->where('tahun', $view->year)->where('bulan', $view->month)->first();
            $laporan_hujan = MonthlyDRainyMain::where('projek_id', $view->laporan_hujan->projek_id)->where('tahun', $view->year)->where('bulan', $view->month)->first();
        }

        if ($view->hujan) {
            $laporan_hujan = $view->hujan;
        }

        $MasterBMPs = MasterKomponenPemeriksaan::where('master_bmp_pemeriksaan_id', $elemen_id)->get();

        $view->with(['MasterBMPs' => $MasterBMPs, 'elemen_id' => $elemen_id, 'borangD' => $borangD, 'laporan_hujan' => $laporan_hujan]);
    }
}
