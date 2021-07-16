<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonthlyD;
use App\MonthlyDBulanan;
use App\ProjekHelper;

class BorangDController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
	}

	public function saveD(Request $request)
	{
		$requestAll = $request->all();
		$borangDID = $request->borangDID;
		$master_bmp_id = $request->master_bmp_id;
		$master_bmp_code = $request->master_bmp_code;
		$master_bmp_component = $request->master_bmp_component;
		$ulasan = $request->ulasan;
		$MonthlyD = MonthlyD::where('id', $borangDID)->first();

		for ($i = 0; $i < count($request->master_bmp_id); $i++) {
		
			if(empty($ulasan[0])){
				return response()->json(['test'=>'Gagal','txt'=>'Maklumat pertama wajib diisi.','status'=>'error']);
			}else{
				if (isset($requestAll['ulasan'][$i])) {
					$monthlyDBulanan = MonthlyDBulanan::firstOrCreate(['monthlyD_id' => $borangDID, 'elemen_pemeriksaan' => $master_bmp_id[$i]]);
					$monthlyDBulanan->monthlyD_id = $borangDID;
					$monthlyDBulanan->elemen_pemeriksaan = $master_bmp_id[$i];
					$monthlyDBulanan->ulasan = $ulasan[$i];
					$monthlyDBulanan->kod_bmp = $master_bmp_code[$i];
					$monthlyDBulanan->jenis_komponen = $master_bmp_component[$i];
					$monthlyDBulanan->save();
		
					if (!empty($requestAll['files'][$i])) {
						uploadFiles($monthlyDBulanan, ['files' => array($requestAll['files'][$i])], 'borang_D_attach', $MonthlyD->projek_id);
					}
		
				} else {
					MonthlyDBulanan::where('monthlyD_id', $borangDID)->where('elemen_pemeriksaan', $master_bmp_id[$i])->delete();
				}
			}
		}

		return response()->json(['test' => 'Berjaya', 'txt' => 'Maklumat berjaya disimpan', 'status' => 'success', $requestAll]);
	}

	// public function getD(Request $request)
	// {
	// 	$borangDID = $request->borangDID;
	// 	$monthlyDBulanans = MonthlyDBulanan::where('monthlyD_id', $borangDID)->get();
				
	// 	foreach ($monthlyDBulanans as $key => $monthlyDBulanan) {
	// 		if ($monthlyDBulanan->kod_bmp_date) {
	// 			$monthlyDBulanan->setAttribute('kod_bmp_date_dmy', $monthlyDBulanan->kod_bmp_date->format('d/m/Y'));
	// 		}
	// 	}

		
	// 	return response()->json($monthlyDBulanans);
	// }

	public function simpan_bmp_keluar_masuk(Request $request){
		
		foreach($request->ulasan as $ulasan){
			$borangDBulanan =new MonthlyDBulanan;
			$borangDBulanan->monthlyD_id =  $request->borangD_id;
			$borangDBulanan->ulasan = $ulasan;
			$borangDBulanan->flag_update = 1;
			$borangDBulanan->elemen_pemeriksaan = $request->elemen_pemeriksaan;
			$borangDBulanan->save();
		}

		$MonthlyD = MonthlyD::where('id', $request->borangD_id)->first();

		$data=array();
		
		foreach ($request->files as $file) {
			$no=1;			
			array_push($data,$file);
		}
		
		foreach($data as $file){
			if ($file) {
				uploadFiles($borangDBulanan, ['files' => $file], 'files', $MonthlyD->projek_id);
			}
		}

		return response()->json(['text'=>'Maklumat berjaya disimpan','test'=>'Berjaya','status'=>'success']);
	}

	public function kawasan_sensitif(Request $request){
		foreach($request->ulasan as $ulasan){
			$borangDBulanan =new MonthlyDBulanan;
			$borangDBulanan->monthlyD_id = $request->borangD_id;
			$borangDBulanan->ulasan = $ulasan;
			$borangDBulanan->flag_update = 1;
			$borangDBulanan->elemen_pemeriksaan = $request->elemen_pemeriksaan;
			$borangDBulanan->save();
		}
		
		$data=array();
		
		foreach ($request->files as $file) {
			$no=1;			
			array_push($data,$file);
		}
		
		$MonthlyD = MonthlyD::where('id', $request->borangD_id)->first();

		foreach($data as $file){
			if ($file) {
				uploadFiles($borangDBulanan, ['files' => $file], 'files', $MonthlyD->projek_id);
			}
		}

		return response()->json(['text'=>'Maklumat berjaya disimpan','test'=>'Berjaya','status'=>'success']);
	}

	public function kawasan_larian_air_permukaan(Request $request){
		foreach($request->ulasan as $ulasan){
			$borangDBulanan =new MonthlyDBulanan;
			$borangDBulanan->monthlyD_id =  $request->borangD_id;
			$borangDBulanan->ulasan = $ulasan;
			$borangDBulanan->flag_update = 1;
			$borangDBulanan->elemen_pemeriksaan = $request->elemen_pemeriksaan;
			$borangDBulanan->save();
		}
		$data=array();
		
		foreach ($request->files as $file) {
			$no=1;			
			array_push($data,$file);
		}
		$MonthlyD = MonthlyD::where('id', $request->borangD_id)->first();
		foreach($data as $file){
			if ($file) {
				uploadFiles($borangDBulanan, ['files' => $file], 'files', $MonthlyD->projek_id);
			}
		}

		return response()->json(['text'=>'Maklumat berjaya disimpan','test'=>'Berjaya','status'=>'success']);
	}

	public function parameter(Request $request){
		foreach($request->ulasan as $ulasan){
			$borangDBulanan =new MonthlyDBulanan;
			$borangDBulanan->monthlyD_id =  $request->borangD_id;
			$borangDBulanan->ulasan = $ulasan;
			$borangDBulanan->flag_update = 1;
			$borangDBulanan->elemen_pemeriksaan = $request->elemen_pemeriksaan;
			$borangDBulanan->save();
		}
		return redirect()->back();
	}

	public function tanah(Request $request){
		foreach($request->ulasan as $ulasan){
			$borangDBulanan =new MonthlyDBulanan;
			$borangDBulanan->monthlyD_id =  $request->borangD_id;
			$borangDBulanan->ulasan = $ulasan;
			$borangDBulanan->flag_update = 1;
			$borangDBulanan->elemen_pemeriksaan = $request->elemen_pemeriksaan;
			$borangDBulanan->save();
		}
		$data=array();
		
		foreach ($request->files as $file) {
			$no=1;			
			array_push($data,$file);
		}
		$MonthlyD = MonthlyD::where('id', $request->borangD_id)->first();
		foreach($data as $file){
			if ($file) {
				uploadFiles($borangDBulanan, ['files' => $file], 'files', $MonthlyD->projek_id);
			}
		}

		return response()->json(['text'=>'Maklumat berjaya disimpan','test'=>'Berjaya','status'=>'success']);
	}

	public function pelupusan(Request $request){
		foreach($request->ulasan as $ulasan){
			$borangDBulanan =new MonthlyDBulanan;
			$borangDBulanan->monthlyD_id =  $request->borangD_id;
			$borangDBulanan->ulasan = $ulasan;
			$borangDBulanan->flag_update = 1;
			$borangDBulanan->elemen_pemeriksaan = $request->elemen_pemeriksaan;
			$borangDBulanan->save();
		}
		$data=array();
		
		foreach ($request->files as $file) {
			$no=1;			
			array_push($data,$file);
		}
		$MonthlyD = MonthlyD::where('id', $request->borangD_id)->first();
		foreach($data as $file){
			if ($file) {
				uploadFiles($borangDBulanan, ['files' => $file], 'files', $MonthlyD->projek_id);
			}
		}

		return response()->json(['text'=>'Maklumat berjaya disimpan','test'=>'Berjaya','status'=>'success']);
	}

	public function bahan(Request $request){
		foreach($request->ulasan as $ulasan){
			$borangDBulanan =new MonthlyDBulanan;
			$borangDBulanan->monthlyD_id =  $request->borangD_id;
			$borangDBulanan->ulasan = $ulasan;
			$borangDBulanan->flag_update = 1;
			$borangDBulanan->elemen_pemeriksaan = $request->elemen_pemeriksaan;
			$borangDBulanan->save();
		}
		$data=array();
		
		foreach ($request->files as $file) {
			$no=1;			
			array_push($data,$file);
		}
		$MonthlyD = MonthlyD::where('id', $request->borangD_id)->first();
		foreach($data as $file){
			if ($file) {
				uploadFiles($borangDBulanan, ['files' => $file], 'files', $MonthlyD->projek_id);
			}
		}

		return response()->json(['text'=>'Maklumat berjaya disimpan','test'=>'Berjaya','status'=>'success']);
	}

	public function jadual(Request $request){
		foreach($request->ulasan as $ulasan){
			$borangDBulanan =new MonthlyDBulanan;
			$borangDBulanan->monthlyD_id =  $request->borangD_id;
			$borangDBulanan->ulasan = $ulasan;
			$borangDBulanan->flag_update = 1;
			$borangDBulanan->elemen_pemeriksaan = $request->elemen_pemeriksaan;
			$borangDBulanan->save();
		}
		$data=array();
		
		foreach ($request->files as $file) {
			$no=1;			
			array_push($data,$file);
		}
		$MonthlyD = MonthlyD::where('id', $request->borangD_id)->first();
		foreach($data as $file){
			if ($file) {
				uploadFiles($borangDBulanan, ['files' => $file], 'files', $MonthlyD->projek_id);
			}
		}

		return response()->json(['text'=>'Maklumat berjaya disimpan','test'=>'Berjaya','status'=>'success']);
	}

	public function selenggara(Request $request){
		foreach($request->ulasan as $ulasan){
			$borangDBulanan =new MonthlyDBulanan;
			$borangDBulanan->monthlyD_id =  $request->borangD_id;
			$borangDBulanan->ulasan = $ulasan;
			$borangDBulanan->flag_update = 1;
			$borangDBulanan->elemen_pemeriksaan = $request->elemen_pemeriksaan;
			$borangDBulanan->save();
		}
		return view('form.index');
	}

	public function buangan(Request $request){
		foreach($request->ulasan as $ulasan){
			$borangDBulanan =new MonthlyDBulanan;
			$borangDBulanan->monthlyD_id =  $request->borangD_id;
			$borangDBulanan->ulasan = $ulasan;
			$borangDBulanan->flag_update = 1;
			$borangDBulanan->elemen_pemeriksaan = $request->elemen_pemeriksaan;
			$borangDBulanan->save();
		}
		$data=array();
		
		foreach ($request->files as $file) {
			$no=1;			
			array_push($data,$file);
		}
		$MonthlyD = MonthlyD::where('id', $request->borangD_id)->first();
		foreach($data as $file){
			if ($file) {
				uploadFiles($borangDBulanan, ['files' => $file], 'files', $MonthlyD->projek_id);
			}
		}

		return response()->json(['text'=>'Maklumat berjaya disimpan','test'=>'Berjaya','status'=>'success']);
	}

	public function bancuhan(Request $request){
		foreach($request->ulasan as $ulasan){
			$borangDBulanan =new MonthlyDBulanan;
			$borangDBulanan->monthlyD_id =  $request->borangD_id;
			$borangDBulanan->ulasan = $ulasan;
			$borangDBulanan->flag_update = 1;
			$borangDBulanan->elemen_pemeriksaan = $request->elemen_pemeriksaan;
			$borangDBulanan->save();
		}
		$data=array();
		
		foreach ($request->files as $file) {
			$no=1;			
			array_push($data,$file);
		}
		$MonthlyD = MonthlyD::where('id', $request->borangD_id)->first();
		foreach($data as $file){
			if ($file) {
				uploadFiles($borangDBulanan, ['files' => $file], 'files', $MonthlyD->projek_id);
			}
		}

		return response()->json(['text'=>'Maklumat berjaya disimpan','test'=>'Berjaya','status'=>'success']);
	}

	public function kawasanHakisan(Request $request){
		$status = [$request->status_earth_bank,$request->status_kh2,$request->status_kh3,$request->status_kh4,$request->status_kh5,$request->status_kh6,$request->status_kh7];
		
		$data=array();
		for($a=0;$a<count($request->ulasan);$a++){
			array_push($data,array(
				'ulasan'=>$request->ulasan[$a],
				'tarikh'=>$request->tarikh[$a],
				'status'=>$status[$a]
			));
		}
		
		foreach($data as $input){
			$borangDBulanan =new MonthlyDBulanan;
			$borangDBulanan->monthlyD_id =  $request->borangD_id;
			$borangDBulanan->ulasan = $input['ulasan'];
			$borangDBulanan->kod_bmp_date = $input['tarikh'];
			$borangDBulanan->kod_bmp_status = $input['status'];
			$borangDBulanan->elemen_pemeriksaan = $request->elemen_pemeriksaan;
			$borangDBulanan->save();
		}
		return view('form.index');
	}

	public function kawasanLain(Request $request){
		$status = [$request->status_kll1,$request->status_kll2,$request->status_kll3,$request->status_kll4,$request->status_kll5,$request->status_kll6,$request->status_kll7,$request->status_kll8,$request->status_kll9,$request->status_kll10,$request->status_kll11,$request->status_kll12];
		
		$data=array();
		for($a=0;$a<count($request->ulasan);$a++){
			array_push($data,array(
				'ulasan'=>$request->ulasan[$a],
				'tarikh'=>$request->tarikh[$a],
				'status'=>$status[$a]
			));
		}
		
		foreach($data as $input){
			$borangDBulanan =new MonthlyDBulanan;
			$borangDBulanan->monthlyD_id =  $request->borangD_id;
			$borangDBulanan->ulasan = $input['ulasan'];
			$borangDBulanan->kod_bmp_date = $input['tarikh'];
			$borangDBulanan->kod_bmp_status = $input['status'];
			$borangDBulanan->elemen_pemeriksaan = $request->elemen_pemeriksaan;
			$borangDBulanan->save();
		}
		return view('form.index');
	}

	public function kawasanAir(Request $request){
		$status = [$request->status_kalp1,$request->status_kalp2,$request->status_kalp3,$request->status_kalp4,$request->status_kalp5,$request->status_kalp6,$request->status_kalp7,$request->status_kalp8,$request->status_kalp9,$request->status_kalp10,$request->status_kalp11,$request->status_kalp12,$request->status_kalp13];
		
		$data=array();
		for($a=0;$a<count($request->ulasan);$a++){
			array_push($data,array(
				'ulasan'=>$request->ulasan[$a],
				'tarikh'=>$request->tarikh[$a],
				'status'=>$status[$a]
			));
		}
		
		foreach($data as $input){
			$borangDBulanan =new MonthlyDBulanan;
			$borangDBulanan->monthlyD_id =  $request->borangD_id;
			$borangDBulanan->ulasan = $input['ulasan'];
			$borangDBulanan->kod_bmp_date = $input['tarikh'];
			$borangDBulanan->kod_bmp_status = $input['status'];
			$borangDBulanan->elemen_pemeriksaan = $request->elemen_pemeriksaan;
			$borangDBulanan->save();
		}
		return view('form.index');
	}

	public function kawasanSedimen(Request $request){
		$status = [$request->status_ks1,$request->status_ks2,$request->status_ks3,$request->status_ks4,$request->status_ks5,$request->status_ks6];
		
		$data=array();
		for($a=0;$a<count($request->ulasan);$a++){
			array_push($data,array(
				'ulasan'=>$request->ulasan[$a],
				'tarikh'=>$request->tarikh[$a],
				'status'=>$status[$a]
			));
		}
		
		foreach($data as $input){
			$borangDBulanan =new MonthlyDBulanan;
			$borangDBulanan->monthlyD_id =  $request->borangD_id;
			$borangDBulanan->ulasan = $input['ulasan'];
			$borangDBulanan->kod_bmp_date = $input['tarikh'];
			$borangDBulanan->kod_bmp_status = $input['status'];
			$borangDBulanan->elemen_pemeriksaan = $request->elemen_pemeriksaan;
			$borangDBulanan->save();
		}
		return view('form.index');
	}
}
