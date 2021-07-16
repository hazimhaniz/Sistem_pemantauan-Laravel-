<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\MasterBmpPemeriksaan;
use App\MasterKomponenPemeriksaan;
use App\MasterPematuhanBmpPemeriksaan;
use App\MonthlyD;

class ViewPenstoranBahanComposer
{
    public function _construct()
    {

    }

    public function compose(View $view)
    {
        $elemen_id = 7;
        $MasterBMPs = [];

        $borangD = $view->borangD;
        if (empty($view->borangD)) {
            $borangD = MonthlyD::where('projek_id', $view->projek->id)->where('tahun', $view->selectedYear)->where('bulan', $view->selectedMonth)->first();
        }
        $MasterBMPs = MasterKomponenPemeriksaan::where('master_bmp_pemeriksaan_id', $elemen_id)->get();

        $view->with(['MasterBMPs' => $MasterBMPs, 'elemen_id' => $elemen_id, 'borangD' => $borangD]);
    }
}
