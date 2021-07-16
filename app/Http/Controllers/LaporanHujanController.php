<?php

namespace App\Http\Controllers;
use App\MonthlyDRainyMain;
use App\MonthlyDRainyDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Storage;
use App\Projek;
use App\MonthlyD;

class LaporanHujanController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
  }

  public function bmp_hujan(Request $request){
    $requestAll = $request->all();

    $rainy = new MonthlyDRainyMain; 
    $rainy->monthlyd_rainy_id = $request->borangD_id;
    $rainy->projek_id = $request->projek_id;
    $rainy->tahun = $request->tahun;
    $rainy->bulan = $request->bulan;
    $rainy->tarikh = Carbon::createFromFormat('d/m/Y', $request->tarikh_hujan);
    $rainy->tempoh = $request->tempoh_hujan;
    $rainy->bacaan = $request->bacaan_hujan;
    $rainy->status_id = 0;
    $rainy->save();
}

public function saveHujan(Request $request)
{   
    // dd($request->all());
    $requestAll = $request->all();
    $borangDID = $request->borangDID;
    $hujanID = $request->hujan_id;
    $projekID = $requestAll['projek_id'];
    
    $rainy = MonthlyDRainyMain::firstOrCreate(['projek_id'=> $projekID,'id'=>$hujanID]); 
    $rainy->monthlyD_id = $borangDID;
    $rainy->projek_id = $request->projek_id;
    $rainy->tahun = $request->tahun;
    $rainy->bulan = $request->bulan;
    if($request->tarikh_hujan){
        $rainy->tarikh = Carbon::createFromFormat('d/m/Y', $request->tarikh_hujan);
    }
    $rainy->tempoh = $request->tempoh_hujan;
    $rainy->bacaan = $request->bacaan_hujan;
    $rainy->status_id = 600;
    $rainy->save();

    $master_bmp_id = $request->master_bmp_id;
    $master_bmp_code = $request->master_bmp_code;
    $master_bmp_component = $request->master_bmp_component;
    $ulasan = $request->ulasan;

    for ($i = 0; $i < count($master_bmp_id); $i++) {

        if(empty($ulasan[0])){
            return response()->json(['test'=>'Gagal','txt'=>'Maklumat pertama wajib diisi.','status'=>'error']);
        }else{
            if (isset($requestAll['ulasan'][$i])) {
                $hujanDetail = MonthlyDRainyDetail::firstOrCreate(['monthlyd_rainy_main_id' => $rainy->id,'elemen_pemeriksaan' => $master_bmp_id[$i]]);
                $hujanDetail->monthlyd_rainy_main_id = $rainy->id;
                $hujanDetail->elemen_pemeriksaan = $master_bmp_id[$i];
                $hujanDetail->ulasan = $ulasan[$i];
                $hujanDetail->kod_bmp = $master_bmp_component[$i];
                $hujanDetail->jenis_komponen = $master_bmp_code[$i];
                $hujanDetail->save();

                if (!empty($requestAll['files'][$i])) {
                    uploadFiles($hujanDetail, ['files' => array($requestAll['files'][$i])], 'laporan_hujan_files', $request->projek_id);
                }
            } else {
                MonthlyDRainyDetail::where('monthlyd_rainy_main_id', $hujanID)->where('elemen_pemeriksaan', $master_bmp_id[$i])->delete();
            }
        }
    }
    return response()->json(['test' => 'Berjaya', 'txt' => 'Maklumat berjaya disimpan', 'status' => 'success', $requestAll]);
}

public function saveKawalan(Request $request)
{
    $requestAll = $request->all();
    $hujanID = $request->hujanID;
    $master_bmp_id = $request->master_bmp_id;
    $master_bmp_code = $request->master_bmp_code;
    $master_bmp_component = $request->master_bmp_component;
    $bmp_date = $request->bmp_date;
    $ulasan = $request->ulasan;

    $checking_date = MonthlyDRainyMain::where('projek_id',$requestAll['projekID'])
    ->where('bulan',$requestAll['month'])
    ->where('tahun',$requestAll['year'])
    ->where('tarikh',$requestAll['tarikh_hujan'])
    ->first();

    if(empty($checking_date)){

        $rainy = MonthlyDRainyMain::firstOrCreate(['projek_id'=>$requestAll['projekID'],'tarikh'=> $request->tarikh_hujan,'id'=>$hujanID]); 
        $rainy->monthlyD_id = 0;
        $rainy->projek_id = $requestAll['projekID'];
        $rainy->tahun = $requestAll['year'];
        $rainy->bulan = $requestAll['month'];
        $rainy->status_id = 600;

        if($request->tarikh_hujan){
            $rainy->tarikh = Carbon::createFromFormat('d/m/Y', $request->tarikh_hujan);
        }

        $rainy->tempoh = $request->tempoh_hujan;
        $rainy->bacaan = $request->bacaan_hujan;
        $rainy->save();  

        for ($i = 0; $i < count($master_bmp_id); $i++) {
           if(isset($requestAll['status_hujan_'.$master_bmp_id[$i]]) && $requestAll['status_hujan_'.$master_bmp_id[$i]]=="1"){
            if(empty($bmp_date[$i])){
                return response()->json(['test' => 'Gagal', 'txt' => 'Sila pilih tarikh untuk status yang baik/perlu diselenggara.', 'status' => 'error']);
            }
        }

        if( isset($requestAll['status_hujan_' . $master_bmp_id[$i]]) && $requestAll['status_hujan_'.$master_bmp_id[$i]] == "2"){
          if(empty($bmp_date[$i])) {
            return response()->json(['test' => 'Gagal', 'txt' => 'Sila pilih tarikh untuk status yang baik/perlu diselenggara.', 'status' => 'error']);
        }
    }

    if (isset($requestAll['status_hujan_' . $master_bmp_id[$i]])){
        $hujanDetail = MonthlyDRainyDetail::firstOrCreate(['monthlyd_rainy_main_id' => $rainy->id, 'elemen_pemeriksaan' => $master_bmp_id[$i]]);
        $hujanDetail->monthlyd_rainy_main_id = $hujanID;
        $hujanDetail->elemen_pemeriksaan = $master_bmp_id[$i];
        $hujanDetail->ulasan = $ulasan[$i];
        $hujanDetail->kod_bmp = $master_bmp_code[$i];
        $hujanDetail->jenis_komponen = $master_bmp_component[$i];
        $hujanDetail->kod_bmp_status = $requestAll['status_hujan_' . $master_bmp_id[$i]];

        if ($bmp_date[$i]){
            $bmp_date_cvt = Carbon::createFromFormat('d/m/Y', $bmp_date[$i]);
            $hujanDetail->kod_bmp_date = $bmp_date_cvt;
        }
        $hujanDetail->save();

        if (!empty($requestAll['file'][$i])) { 
           uploadFiles($hujanDetail, ['files' => array($requestAll['file'][$i])], 'laporan_hujan_files', $requestAll['projekID']);
       } else {
        MonthlyDRainyDetail::where('monthlyd_rainy_main_id', $hujanID)->where('elemen_pemeriksaan', $master_bmp_id[$i])->delete();
    }
}

return response()->json(['test' => 'Berjaya', 'txt' => 'Maklumat berjaya disimpan', 'status' => 'success']);
}
}else{

    for ($i = 0; $i < count($master_bmp_id); $i++) {

     if(isset($requestAll['status_hujan_'.$master_bmp_id[$i]]) && $requestAll['status_hujan_'.$master_bmp_id[$i]]=="1"){
        if(empty($bmp_date[$i])){
            return response()->json(['test' => 'Gagal', 'txt' => 'Sila pilih tarikh untuk status yang baik/perlu diselenggara.', 'status' => 'error']);
        }
    }

    if( isset($requestAll['status_hujan_' . $master_bmp_id[$i]]) && $requestAll['status_hujan_'.$master_bmp_id[$i]] == "2")
    {
      if(empty($bmp_date[$i]))
      {
        return response()->json(['test' => 'Gagal', 'txt' => 'Sila pilih tarikh untuk status yang baik/perlu diselenggara.', 'status' => 'error']);
    }
}

if (isset($requestAll['status_hujan_' . $master_bmp_id[$i]])) {
    $hujanDetail = MonthlyDRainyDetail::firstOrCreate(['monthlyd_rainy_main_id' => $checking_date->id, 'elemen_pemeriksaan' => $master_bmp_id[$i]]);
    $hujanDetail->monthlyd_rainy_main_id = $hujanID;
    $hujanDetail->elemen_pemeriksaan = $master_bmp_id[$i];
    $hujanDetail->ulasan = $ulasan[$i];
    $hujanDetail->kod_bmp = $master_bmp_code[$i];
    $hujanDetail->jenis_komponen = $master_bmp_component[$i];
    $hujanDetail->kod_bmp_status = $requestAll['status_hujan_' . $master_bmp_id[$i]];

    if ($bmp_date[$i]) {
        $bmp_date_cvt = Carbon::createFromFormat('d/m/Y', $bmp_date[$i]);
        $hujanDetail->kod_bmp_date = $bmp_date_cvt;
    }
    $hujanDetail->save();
            // dd($requestAll['file'][1]);
    if (!empty($requestAll['file'][$i])) { 
     uploadFiles($hujanDetail, ['files' => array($requestAll['file'][$i])], 'laporan_hujan_files', $requestAll['projekID']);
 }
} else {
    MonthlyDRainyDetail::where('monthlyd_rainy_main_id', $hujanID)->where('elemen_pemeriksaan', $master_bmp_id[$i])->delete();
}
}

return response()->json(['test' => 'Berjaya', 'txt' => 'Maklumat berjaya disimpan', 'status' => 'success']);
}

}

public function getPemeriksaan(Request $request)
{   

    $HujanID = $request->laporan_hujan;
    $MonthlyDRainyDetails = MonthlyDRainyDetail::where('monthlyd_rainy_main_id', $HujanID)->with('docType')->get();

    foreach ($MonthlyDRainyDetails as $key => $MonthlyDRainyDetail) {

        if(count($MonthlyDRainyDetail->docType) > 0)
        {
            $MonthlyDRainyDetail->setAttribute('path_download', Storage::url($MonthlyDRainyDetail->docType));
        }

        if ($MonthlyDRainyDetail->kod_bmp_date) {
                // $monthlyDBulanan->kod_bmp_date = $monthlyDBulanan->kod_bmp_date->format('d/m/Y');
            $MonthlyDRainyDetail->setAttribute('kod_bmp_date_dmy', $MonthlyDRainyDetail->kod_bmp_date->format('d/m/Y'));
        }
    }        
    return response()->json(['test' => 'Berjaya', 'txt' => 'Maklumat berjaya disimpan', 'status' => 'success', $MonthlyDRainyDetails]);
}

public function getHujanKawalan(Request $request,$hujanID) {

    $hujanpulaks = MonthlyDRainyDetail::where('monthlyd_rainy_main_id', $hujanID)->with('docType')->get();
    
    foreach ($hujanpulaks as $key => $hujan) {

        if(count($hujan->docType) > 0)
        {
            $hujan->setAttribute('path_download', Storage::url($hujan->docType));
        }

        if ($hujan->kod_bmp_date) {
            $hujan->setAttribute('kod_bmp_date_dmy', $hujan->kod_bmp_date->format('d/m/Y'));
        }
    }   

    return response()->json($hujanpulaks);
}

public function getSenaraiLaporanHujan(Request $request, $projek_id, $year ='', $month= ''){

    if ($year && $month) {
        $laporan_hujan = MonthlyDRainyMain::where('projek_id',$projek_id)->where('status_id',600)->where('bulan', $month)->where('tahun', $year)->get();
    } else {
       $laporan_hujan = MonthlyDRainyMain::where('projek_id',$projek_id)->where('status_id',600)->get();
    }

    if ($request->ajax()) {
        return datatables()->of($laporan_hujan)
        ->editColumn('tarikh_pemeriksaan', function ($laporan_hujan) {
            $tarikh_pemeriksaan = "";
            if ($laporan_hujan->tarikh) {
                $tarikh_pemeriksaan .= date('d-m-Y',strtotime($laporan_hujan->tarikh));
            }
            return $tarikh_pemeriksaan;
        })
        ->editColumn('masa', function ($laporan_hujan) {
            $masa = "";
            if ($laporan_hujan->masa) {
                $masa .= $laporan_hujan->masa;
            }
            return $masa;
        })
        ->editColumn('action', function ($laporan_hujan) {
            //$borangA = MonthlyA::find($borangescp->monthlya_id);
            $button = "";
            if ($laporan_hujan->status_id == 600) {

                $viewUrl = route('form.viewhujan', $laporan_hujan->id); 

                // $button .= '<button class="btn btn-default btn-xs mb-1" id="viewModalHujan" data-id="'.$laporan_hujan->id.'"  onclick="viewHujan('.$laporan_hujan->id.')"><i class="fas fa-eye text-warning"></i></button>';
                $button .= '<button class="btn btn-default btn-xs mb-1" id="viewModalHujan" data-action="' . $viewUrl . '"  onClick="getModalContent(this)"><i class="fas fa-eye text-warning"></i></button>';

                // $button.='<a onclick="removeBorang(' . $laporan_hujan->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1" ><i class="fas fa-trash text-danger"></i></a>';

            } elseif ($laporan_hujan->status_id == 602) {
                 $viewUrl = route('form.viewhujan', $laporan_hujan->id); 
                $button .= '<button class="btn btn-default btn-xs mb-1" id="viewModalHujan" data-action="' . $viewUrl . '"  onClick="getModalContent(this)"><i class="fas fa-eye text-warning"></i></button>';

                // $button.='<a onclick="removeBorang(' . $laporan_hujan->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1 disabled"><i class="fas fa-trash text-danger"></i></a>
                // ';
            }
            return $button;
        })
        ->make(true);
    }
    return view('form.index');
}

public function tindakanHujan(Request $request,$hujanID,$status){

    if($tarikh_hujan){
        $tarikh_hujan =  Carbon::createFromFormat('d/m/Y', $request->tarikh_hujan);
    }
 
    $hujan = MonthlyDRainyMain::where('id', $hujanID)->where('tarikh',$tarikh_hujan->format('Y-m-d'))->where('status_id',[13,602])->first();
    
    if(empty($hujan)){
        $hujan->status_id = $status;
        $hujan->save();
    }else{
        return Session::flash('error', 'Maklumat gagal disimpan');
    }

    Session::flash('success', 'Maklumat telah disimpan');
    return redirect()->back();
}

    public function viewHujan($hujanID)
    {
        $hujan = MonthlyDRainyMain::find($hujanID);
        $borangD = MonthlyD::where('projek_id',$hujan->projek_id)->where('bulan',$hujan->bulan)->where('tahun',$hujan->tahun)->first();

        return view('form.viewLaporanHujan')->with([
            'hujan' => $hujan,
            'month' => $hujan->bulan,
            'year' => $hujan->tahun,
            'laporan_hujan' =>$hujan,
            'borangD' =>$borangD
        ]);
    }

}
