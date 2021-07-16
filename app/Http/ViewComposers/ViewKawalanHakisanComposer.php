<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\MasterBMP;
use App\MonthlyD;
class ViewKawalanHakisanComposer
{
    public function _construct()
    {

    }

    public function compose(View $view)
    {
        $elemen_id = 3;
        $MasterBMPs = [];
        $borangD = $view->borangD;
        if (empty($view->borangD)) {
            $borangD = MonthlyD::where('projek_id', $view->projek->id)->where('tahun', $view->selectedYear)->where('bulan', $view->selectedMonth)->first();
        }
        $MasterBMPs = MasterBMP::where('elemen_id', $elemen_id)->get();

        $view->with(['MasterBMPs' => $MasterBMPs, 'elemen_id' =>$elemen_id, 'borangD' => $borangD]);
    }
}
