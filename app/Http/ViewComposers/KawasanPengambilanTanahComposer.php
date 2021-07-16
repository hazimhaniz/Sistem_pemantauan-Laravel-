<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\MasterBmpPemeriksaan;
use App\MasterKomponenPemeriksaan;
use App\MasterPematuhanBmpPemeriksaan;
use App\MonthlyD;
use App\MonthlyDRainyMain;

class KawasanPengambilanTanahComposer
{
    public function _construct()
    {

    }

    public function compose(View $view)
    {
        $elemen_id = 5;
        $MasterBMPs = [];

        $borangD=$view->borangD;
        $laporan_hujan=$view->laporan_hujan;

        if(!$view->borangD){ 
          if($view->projek){
            $borangD = MonthlyD::where('projek_id', $view->projek->id)->where('tahun', $view->year)->where('bulan', $view->month)->first();
            $laporan_hujan = MonthlyDRainyMain::where('projek_id', $view->laporan_hujan->year)->where('tahun', $view->month)->where('bulan', $view->selectedMonth)->first();
        }
    }

    if($view->hujan){
      $laporan_hujan=$view->hujan;
  }
  
  $MasterBMPs = MasterKomponenPemeriksaan::where('master_bmp_pemeriksaan_id', $elemen_id)->get();

  $view->with(['MasterBMPs' => $MasterBMPs, 'elemen_id' => $elemen_id,'borangD'=>$borangD, 'laporan_hujan'=>$laporan_hujan]);
}
}
