<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stesen;
use App\Projek;
use App\MonthlyAKemajuanStatus;
use App\MonthlyA;
use App\ProjekDetail;
use App\LaporanPermakahanFinal;
use App\MasterModel\MasterParameter;
use App\Models\BacaanCerap;
use App\Models\Parameter;
use App\Models\MonthlyC;
use App\Models\MonthlyCDetail;
use DB;

class SpeiaController extends Controller
{

	public function speiaApi(){
		$stesen = Stesen::join('projek','projek.id','=','stesen.projek_id')
		->join('projek_detail','projek_detail.projek_id','=','projek.id')
		->join('master_state','master_state.id','=','projek_detail.negeri')
		->join('master_district','master_district.state_id','=','master_state.id')
		->select('projek.no_fail_jas as no_fail_jas','stesen.stesen as nama_stesen','stesen.latitud as latitud','stesen.longitud as longitud','projek_detail.lokasi as lokasi','master_state.name as negeri','master_district.name as daerah','projek_detail.bandar as bandar')
		->groupBy('no_fail_jas','nama_stesen')->get()->toArray();

		$permarkahan = Projek::select('projek.id','projek.no_fail_jas as no_fail_jas')
		->with('laporan_permarkahan_final:projek_id,tahun,bulan,total as markah')
		->whereHas('laporan_permarkahan_final')
		->get()
		->toArray();
		
		$pengawasan = Stesen::join('projek','projek.id','=','stesen.projek_id')
		->join('master_pengawasan','master_pengawasan.id','=', 'stesen.jenis_pengawasan_id')
		->where('master_pengawasan.id','=',4)
		->select([
			'projek.no_fail_jas', 
			'projek.id as projek_id', 
			'stesen.stesen',
			'stesen.tahun',
			'stesen.bulan',
			'stesen.id',
		])
		->groupBy('projek.no_fail_jas','stesen.stesen')->get()->toArray();

		$data="";
		foreach ($pengawasan as $key => $value) {
			$data[$key]['data']['no_fail_jas'] = $value['no_fail_jas'];
			$data[$key]['data']['stesen'] = $value['stesen'];
			// $data[$key]['data']['id'] = $value['id'];
			// $data[$key]['data']['projek_id'] = $value['projek_id'];
			$year = $value['tahun'].'-'.$value['bulan'];
			
			//getting monthly c & details
			$monthlyC = MonthlyC::where('projek_id', '=', $value['projek_id'])->where('bulan', $value['bulan'])->where('tahun', $value['tahun'])->get();
			if (!empty($monthlyC)) {
				foreach ($monthlyC as $key3 => $value3) {
					# code...
					$MonthlyCDetail = MonthlyCDetail::where('monthly_c_id', $value3->id)->first();
					$data[$key]['data'][$year]['tarikh_pengsampelan'] = $MonthlyCDetail->tarikh_pengsampelan;
					$data[$key]['data'][$year]['masa_pengsampelan'] = $MonthlyCDetail->masa_pengsampelan;
					// get bacan cerap value
					$bacaanCerap = BacaanCerap::where('monthly_c_id','=', $value3->id)->get();

					foreach ($bacaanCerap as $key4 => $value4) {
						$nameofparam = MasterParameter::where('id','=', $value4->parameter_id)->first();
						if ($nameofparam) {
							$name = $nameofparam->jenis_parameter;
						} else {
							$name = 'bacaan_cerap';
						}
						if (!empty($value4->bacaan_cerap) && $value4->bacaan_cerap != ''){
							$params[$key4] = $value4->bacaan_cerap;
							$data[$key]['data'][$year]['BacaanCerap '][$name] = $value4->bacaan_cerap;
						} 
						if (!empty($value4->bacaan_cerap_b) && $value4->bacaan_cerap_b != ''){
							$params[$key4] = $value4->bacaan_cerap_b;
							$data[$key]['data'][$year]['BacaanCerap2'][$name] = $value4->bacaan_cerap_b;
						}
					}
				}
			}

			$getThePramsofthatMonth = Parameter::where('stesen_id', '=', $value['id'])->get();

			if (count($getThePramsofthatMonth) > 0) {
				foreach ($getThePramsofthatMonth as $key2 => $value2) {
					//get the name of param
					$nameofparam = MasterParameter::where('id','=', $value2->parameter)->first();
					if ($nameofparam) {
						$name = $nameofparam->jenis_parameter;
					} else {
						$name = 'param';
					}
					if (!empty($value2->baselineeia) && $value2->baselineeia != ''){
						$params['eia'][$key2] = $value2->baselineeia;
						$data[$key]['data'][$year]['parameters']['EIA'][$name] = $value2->baselineeia;
					}
					if (!empty($value2->baselineemp) && $value2->baselineemp != ''){
						$params['emp'][$key2] = $value2->baselineemp;
						$data[$key]['data'][$year]['parameters']['EMP'][$name] = $value2->baselineemp;
					}
				}
			} else {
				$params = [];
			}
		}

		$penguatkuasaan = Projek::all();	
		foreach ($penguatkuasaan as $key => $value) {
			$penguatkuasaanData[$key]['datas']['no_jas'] = $value->no_fail_jas;
			$monthlyA = MonthlyA::where('projek_id', $value->id)->get();
			foreach ($monthlyA as $key2 => $value2) {
				$year = $value2->tahun.'-'.$value2->bulan;
				$MonthlyAKemajuanStatus = MonthlyAKemajuanStatus::where('monthlya_id', $value2->id)->first();
				$LaporanPermakahanFinal = LaporanPermakahanFinal::where('projek_id', $value->id)->where('bulan', $value2->bulan)->where('tahun', $value->tahun)->first();
				$penguatkuasaanData[$key]['datas']['statuses'][$year]['status'] = $MonthlyAKemajuanStatus ? $MonthlyAKemajuanStatus->status_kemajuan : '-';
				$penguatkuasaanData[$key]['datas']['statuses'][$year]['tarikh_pengesahan'] = $LaporanPermakahanFinal ? $LaporanPermakahanFinal->pengarah_approved : '-';
			}
		}

		return response()->json(
			[
				'status'=>"success", 
				'pengawasan' => $data,
				'penguatkuasaan' => $penguatkuasaanData,
				"maklumat_stesen"=>$stesen,
				"permarkahan"=>$permarkahan
			],200
		);
	}

	public function insertMaklumatStesen(){
		$stesen = Stesen::join('projek','projek.id','=','stesen.projek_id')
		->join('projek_detail','projek_detail.projek_id','=','projek.id')
		->join('master_state','master_state.id','=','projek_detail.negeri')
		->join('master_district','master_district.state_id','=','master_state.id')
		->select('projek.no_fail_jas as no_fail_jas','stesen.stesen as nama_stesen','stesen.latitud as latitud','stesen.longitud as longitud','projek_detail.lokasi as lokasi','master_state.name as negeri','master_district.name as daerah','projek_detail.bandar as bandar')
		->groupBy('no_fail_jas','nama_stesen')->get()->toArray();

		$permarkahan = Projek::select('projek.id','projek.no_fail_jas as no_fail_jas')
		->with('laporan_permarkahan_final:projek_id,tahun,bulan,total as markah')
		->whereHas('laporan_permarkahan_final')
		->get()
		->toArray();

		$pengawasan = Stesen::join('projek','projek.id','=','stesen.projek_id')
		->join('master_pengawasan','master_pengawasan.id','=', 'stesen.jenis_pengawasan_id')
		->where('master_pengawasan.id','=',4)
		->select([
			'projek.no_fail_jas', 
			'projek.id as projek_id', 
			'stesen.stesen',
			'stesen.tahun',
			'stesen.bulan',
			'stesen.id',
		])
		->groupBy('projek.no_fail_jas','stesen.stesen')->get()->toArray();

		$data=[];
		foreach ($pengawasan as $key => $value) {
			$data[$key]['data']['no_fail_jas'] = $value['no_fail_jas'];
			$data[$key]['data']['stesen'] = $value['stesen'];
			// $data[$key]['data']['id'] = $value['id'];
			// $data[$key]['data']['projek_id'] = $value['projek_id'];
			$year = $value['tahun'].'-'.$value['bulan'];
			
			//getting monthly c & details
			$monthlyC = MonthlyC::where('projek_id', '=', $value['projek_id'])->where('bulan', $value['bulan'])->where('tahun', $value['tahun'])->get();
			if (!empty($monthlyC)) {
				foreach ($monthlyC as $key3 => $value3) {
					# code...
					$MonthlyCDetail = MonthlyCDetail::where('monthly_c_id', $value3->id)->first();
					$data[$key]['data']['tarikh_pengsampelan'] = $MonthlyCDetail->tarikh_pengsampelan;
					$data[$key]['data']['masa_pengsampelan'] = $MonthlyCDetail->masa_pengsampelan;
					// get bacan cerap value
					$bacaanCerap = BacaanCerap::where('monthly_c_id','=', $value3->id)->get();

					foreach ($bacaanCerap as $key4 => $value4) {
						$nameofparam = MasterParameter::where('id','=', $value4->parameter_id)->first();
						if ($nameofparam) {
							$name = $nameofparam->jenis_parameter;
						} else {
							$name = 'bacaan_cerap';
						}
						if (!empty($value4->bacaan_cerap) && $value4->bacaan_cerap != ''){
							$params[$key4] = $value4->bacaan_cerap;
							$data[$key]['data'][$year]['BacaanCerap '][$name] = $value4->bacaan_cerap;
						} 
						if (!empty($value4->bacaan_cerap_b) && $value4->bacaan_cerap_b != ''){
							$params[$key4] = $value4->bacaan_cerap_b;
							$data[$key]['data'][$year]['BacaanCerap2'][$name] = $value4->bacaan_cerap_b;
						}
					}
				}
			}

			$getThePramsofthatMonth = Parameter::where('stesen_id', '=', $value['id'])->get();

			if (count($getThePramsofthatMonth) > 0) {
				foreach ($getThePramsofthatMonth as $key2 => $value2) {
					//get the name of param
					$nameofparam = MasterParameter::where('id','=', $value2->parameter)->first();
					if ($nameofparam) {
						$name = $nameofparam->jenis_parameter;
					} else {
						$name = 'param';
					}
					if (!empty($value2->baselineeia) && $value2->baselineeia != ''){
						$params['eia'][$key2] = $value2->baselineeia;
						$data[$key]['data'][$year]['parameters']['EIA'][$name] = $value2->baselineeia;
					}
					if (!empty($value2->baselineemp) && $value2->baselineemp != ''){
						$params['emp'][$key2] = $value2->baselineemp;
						$data[$key]['data'][$year]['parameters']['EMP'][$name] = $value2->baselineemp;
					}
				}
			} else {
				$params = [];
			}
		}

		$penguatkuasaan = Projek::all();	
		foreach ($penguatkuasaan as $key => $value) {
			$penguatkuasaanData[$key]['datas']['no_jas'] = $value->no_fail_jas;
			$monthlyA = MonthlyA::where('projek_id', $value->id)->get();
			foreach ($monthlyA as $key2 => $value2) {
				$year = $value2->tahun.'-'.$value2->bulan;
				$MonthlyAKemajuanStatus = MonthlyAKemajuanStatus::where('monthlya_id', $value2->id)->first();
				$LaporanPermakahanFinal = LaporanPermakahanFinal::where('projek_id', $value->id)->where('bulan', $value2->bulan)->where('tahun', $value->tahun)->first();
				$penguatkuasaanData[$key]['datas']['statuses']['status'] = $MonthlyAKemajuanStatus ? $MonthlyAKemajuanStatus->status_kemajuan : '-';
				$penguatkuasaanData[$key]['datas']['statuses']['tarikh_pengesahan'] = $LaporanPermakahanFinal ? $LaporanPermakahanFinal->pengarah_approved : null;
			}
		}


		try {
			foreach($permarkahan as $markah){

				foreach($markah as $mark){
					// dd($mark['tahun']);
					\DB::connection('mysql2')->table('markah')->insert(
						[
							"no_jas"=> $markah['no_fail_jas'],
							"tahun"=>  isset($mark['tahun'])?$mark['tahun']:null,
							"bulan"=>  isset($mark['bulan'])?$mark['bulan']:null,
							"markah"=> isset($mark['markah'])?$mark['markah']:null,
						]
					);
				}

			}


			foreach($stesen as $station){
				\DB::connection('mysql2')->table('stesen')->insert($station);
			}
			
			foreach($data as $dat){
				foreach($dat as $da){
					foreach($da as $d){
						\DB::connection('mysql2')->table('pengawasan')->insert(
							[
								"no_fail_jas"=> isset($dat['data']['no_fail_jas'])?$dat['data']['no_fail_jas']:null,
								"nama_stesen"=>  isset($dat['data']['stesen'])?$dat['data']['stesen']:null,
								"tarikh_persampelan"=>  isset($da['tarikh_pengsampelan'])?$da['tarikh_pengsampelan']:null,
								"masa_persampelan"=> isset($da['masa_pengsampelan'])?$da['masa_pengsampelan']:null,
								"nama_param"=> isset($da['parameters'])?$da['parameters']['EIA'].'  '.$da['parameters']['EMP']:null,
								"bacaan"=> isset($d['BacaanCerap ']['bacaan_cerap'])?$d['BacaanCerap ']['bacaan_cerap']:null,
							]
						);
					}
				}			
			}


			foreach($penguatkuasaanData as $kuatkuasa){
				foreach($kuatkuasa as $kuasa){
					\DB::connection('mysql2')->table('penguatkuasaan')->insert(
						[
							"no_jas"=> isset($kuatkuasa['data']['no_jas'])?$kuatkuasa['data']['no_jas']:null,
							"status"=>  isset($kuasa['statuses']['status'])?$kuasa['statuses']['status']:null,
							"tarikh_pengesahan"=>  isset($kuasa['statuses']['tarikh_pengesahan'])?$kuasa['statuses']['tarikh_pengesahan']:null,
						]
					);
				}
			}


			return response()->json(['status'=>'success','stesen'=>$stesen,'permarkahan'=>$permarkahan,'pegawasan'=>$data,'penguatkuasaan'=>$penguatkuasaanData],200);
		} catch (Exception $e) {
			return response()->json(['status'=>'failed'],405);
		}


	}


}
