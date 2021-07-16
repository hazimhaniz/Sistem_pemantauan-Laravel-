<?php

namespace App\Http\Controllers;

use App\LogSystem;
use App\Projek;
use App\ProjekEMP;
use App\ProjekHelper;
use App\ProjekLDP2M2;
use App\MonthlyBSyaratRegister;
use App\MonthlyBSyaratKuiri;
use Illuminate\Http\Request;
use Session;
use Auth;

class SyaratController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function projekSaveSyaratNumber(Request $request,$projekID)
	{
		$total = $request->syarat;

		MonthlyBSyaratRegister::where('projek_id', $projekID)->where('syarat','')->delete();

		for ($i = 0; $i < $total; $i++) {
			$syarat = new MonthlyBSyaratRegister;
			$syarat->projek_id = $projekID;
			$syarat->status = 609;
			$syarat->save();
		}

		$log = new LogSystem;
        $log->module_id = 26; //pendaftaran projek
        $log->activity_type_id = 4; //tambah data
        $log->description = "Pendaftaran syarat EIA";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->user()->id;
        $log->save();

		return response()->json($syarat);
	}

	public function projekViewSyarat(Request $request,$projekID){

		$projekid = $projekID;
		$syaratEIA = MonthlyBSyaratRegister::where('projek_id', $projekID)->get();

		return view('form.senarai_syarat', compact('projekid', 'syaratEIA'));

	}


	public function loadKuiri(Request $request,$projekID){

		$projekid = $projekID;
		$syaratEIA = MonthlyBSyaratRegister::where('projek_id',$projekID)->get();

		return view('projek.view_table_syarat', compact('syaratEIA'));

	}

	public function viewKuiri(Request $request,$projekID){

		$projekid = $projekID;
		$syaratEIA = MonthlyBSyaratRegister::where('id',$projekID)->first();

		return view('form.senarai_syarat_b_kuiri', compact('syaratEIA'));

	}

	public function sahSyarat(Request $request, $id){

		$syaratEIA = MonthlyBSyaratRegister::where('id',$id)->first();
		$syaratEIA->status = 611;
		$syaratEIA->sah_syarat_user_id = Auth::user()->id;
		$syaratEIA->tarikh_sah = now();
		$syaratEIA->save();

		$log = new LogSystem;
		$log->module_id = 26; 
		$log->activity_type_id = 20; 
		$log->description = "pengesahan Syarat EIA";
		$log->url = $request->fullUrl();
		$log->method = strtoupper($request->method());
		$log->ip_address = $request->ip();
		$log->created_by_user_id = auth()->user()->id;
		$log->save();



		return response()->json(['test'=>'Berjaya!','text'=>'Syarat sudah disahkan.','status'=>'success']);

	}



	public function projekSaveSyarat(Request $request)
	{
		$dataID = $request->dataID;
		$dataColumn = $request->dataColumn;

		$syarat = MonthlyBSyaratRegister::where('id', $dataID)->first();
		$value = $request->value;

		$syarat[$dataColumn] = $value;
		$syarat->status = 609;
		$syarat->save();

		return response()->json($syarat);
	}

	public function projekSimpanSyarat($id, Request $request)
	{

		$syarat = MonthlyBSyaratRegister::where('projek_id', $id)->where('syarat','!=','')->whereIn('status',[610,609])->get();

		foreach($syarat as $sya){
			$sya->status = 608;
			$sya->save();
		}


		return response()->json($syarat);
	}


	public function deleteSyarat(Request $request)
	{

		$syaratBID = $request->syaratBID;
		MonthlyBSyaratRegister::where('id', $syaratBID)->delete();

		return response()->json(null);
	}

	public function getKuiri($id){

		$kuiri = MonthlyBSyaratRegister::where('id', $id)->first();
		$projek = Projek::where('id',$kuiri->projek_id)->first();
		return view('projek.view_kuiri_syarat', compact('kuiri','projek'));
	}


	public function submitKuiri(Request $request,$id)
	{
		if($request->kuiriSyarat){
			$syaratRegister = MonthlyBSyaratRegister::where('id',$id)->first();
			$syaratRegister->status=610;
			$syaratRegister->save();

			$kuiri =new MonthlyBSyaratKuiri;
			$kuiri->monthly_b_syarat_register_id = $syaratRegister->id;
			$kuiri->kuiri = $request->kuiriSyarat;
			$kuiri->kuiri_user_id = Auth::user()->id;
			$kuiri->tarikh_kuiri = now();
			$kuiri->save();

			return response()->json($kuiri);
		}else{
			return response()->json(null);
		}
	}


	public function submitKemaskiniSyarat(Request $request,$id)
	{
		if($request->kuiriSyarat){
			$syaratRegister = MonthlyBSyaratRegister::where('id',$id)->first();
			$syaratRegister->status=608;
			$syaratRegister->syarat=$request->kuiriSyarat;
			$syaratRegister->save();
			return response()->json($syaratRegister);
		}else{
			return response()->json(null);
		}
	}


}
