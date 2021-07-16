<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonthlyA;
use App\MonthlyAESCP;
use App\LogSystem;
use App\MasterModel\MasterState;
use App\MasterModel\MasterDistrict;
use App\ProjekFasa;
use App\MonthlyAKemajuan;
use App\MonthlyAKemajuanStatus;
use App\Models\MonthlyC;
use App\MonthlyB;
use App\MonthlyD;
use App\MonthlyE;
use App\MonthlyF;
use Carbon\Carbon;
use App\Stesen;
use App\ProjekDetail;
use App\Projek;
use App\JenisPengawasan;
use App\ProjekPengawasan;
use App\ProjekHelper;
use Auth;
use Illuminate\Support\Facades\Validator;


class BorangAController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function bahagianA($id)
	{

		$this->data['state'] = $state = MasterState::all();
		$this->data['district'] = $district = MasterDistrict::all();
		$this->data['monthlyA'] = $monthlyA = MonthlyAESCP::where('monthlya_id', $id)->get();
		$this->data['old'] = $old = session()->getOldInput();

		return view('projek.form', $this->data);
	}



	public function BorangESCP(Request $request)
	{

		$input = $request->all();
		// dd($input);
        $validator = Validator::make($input, [
			'escp_name' => 'required',
			'borang_id' => 'required',
			'status_escp' => 'required',
			'tarikh_kelulusan_escp' => 'required_if:status_escp,==,1',
			'no_rujukan_escp' => 'required_if:status_escp,==,1',
			'no_pelan_escp' => 'required_if:status_escp,==,1',
        ], [
			'escp_name.required' => 'Sila Isi Ruang Nama ESCP',
			'borang_id.required' => 'Nombor ID Borang A Tidak Wujud',
			'status_escp.required' => 'Sila Isi Pilih Status ESCP',
			'tarikh_kelulusan_escp.required_if' => 'Sila Isi Isi Tarikh Kelulusan ESCP',
			'no_rujukan_escp.required_if' => 'Sila Isi Ruang No Rujukan ESCP',
			'no_pelan_escp.required_if' => 'Sila Isi Ruang No Pelan ESCP',

		]);

		if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'code' => 422,
                'message' => $validator->errors(),
            ]);
        }

		$log = new LogSystem;
		$log->module_id = 7;
		$log->activity_type_id = 3;
		$log->description = "Papar Modal (Popup) Borang ESCP bagi Borang A - Pengguna Luaran";
		$log->url = $request->fullUrl();
		$log->method = strtoupper($request->method());
		$log->ip_address = $request->ip();
		$log->created_by_user_id = auth()->id();
		$log->save();

		$MonthlyAESCP = new MonthlyAESCP();
		$MonthlyAESCP->monthlya_id = $request->borang_id;
		$MonthlyAESCP->nama = $request->escp_name;
		$MonthlyAESCP->status = $request->status_escp;

		if($request->tarikh_kelulusan_escp){
			$MonthlyAESCP->tarikh_kelulusan =  Carbon::createFromFormat('d/m/Y', $request->tarikh_kelulusan_escp);
		}
		$MonthlyAESCP->no_rujukan = $request->no_rujukan_escp;
		$MonthlyAESCP->no_pelan = $request->no_pelan_escp;
		$MonthlyAESCP->save();


		return response()->json(['text' => 'Maklumat berjaya disimpan', 'test' => 'Berjaya', 'status' => 'success']);
	}

	public function getEscp(Request $request, $id)
	{
		$borangescp = MonthlyAESCP::where('monthlya_id', $id)->get();


		if ($request->ajax()) {
			return datatables()->of($borangescp)
			->editColumn('nama', function ($borangescp) {
				$escp_name = "";
				if ($borangescp->nama) {
					$escp_name .= $borangescp->nama;
				}

				return strtoupper($escp_name);
			})
			->editColumn('status', function ($borangescp) {
				$status = "";
				if ($borangescp->status == 1) {
					$status .= 'diluluskan';
				} else {
					$status .= 'belum diluluskan';
				}

				return strtoupper($status);
			})
			->editColumn('tarikh_kelulusan', function ($borangescp) {
				$tarikh_kelulusan = "";
				if ($borangescp->tarikh_kelulusan) {
					$tarikh_kelulusan .= date("d/m/Y", strtotime($borangescp->tarikh_kelulusan));
				}

				return strtoupper($tarikh_kelulusan);
			})
			->editColumn('no_rujukan', function ($borangescp) {
				$no_rujukan = "";
				if ($borangescp->no_rujukan) {
					$no_rujukan .= $borangescp->no_rujukan;
				}

				return strtoupper($no_rujukan);
			})
			->editColumn('no_pelan', function ($borangescp) {
				$no_pelan = "-";
				if ($borangescp->no_pelan) {
					$no_pelan = $borangescp->no_pelan;
				}
				return $no_pelan;
			})
			->editColumn('action', function ($borangescp) {
				$borangA = MonthlyA::find($borangescp->monthlya_id);
				$button = "";
				if ($borangA->status_id == 600) {
					$button .= '<a onclick="removeBorang(' . $borangescp->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1" ><i class="fas fa-trash text-danger"></i></a>';
				} elseif ($borangA->status_id == 602) {
					$button .= '<a onclick="removeBorang(' . $borangescp->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1 disabled"><i class="fas fa-trash text-danger"></i></a>';
				}

				return $button;
			})
			->make(true);
		}
		return view('form.index');
	}

	public function deleteESCP($id)
	{

		try {
			$deleteESCP = MonthlyAESCP::find($id);
			$deleteESCP->delete();
			return response()->json(['test' => 'Berjaya', 'text' => 'Maklumat berjaya dipadam', 'status' => 'success']);
		} catch (Exception $e) {
			return response()->json(['test' => 'Gagal', 'text' => 'Maklumat gagal dipadam', 'status' => 'error']);
		}
	}

	public function postBorangA(Request $request)
	{
		$input = $request->all();
		// dd($input);
        $validator = Validator::make($input, [
			'status_projek' => 'required',
			'tarikh_kelulusan_1' => 'required_unless:status_projek,==,2',
			'no_rujukan_1' => 'required_unless:status_projek,==,2',
			'no_pelan_1' => 'required_unless:status_projek,==,2',
			'status_kerja_tanah' => 'required',
			'tarikh_kelulusan_2' => 'required_unless:status_kerja_tanah,==,2',
			'no_rujukan_2' => 'required_unless:status_kerja_tanah,==,2',
			'no_pelan_2' => 'required_unless:status_kerja_tanah,==,2',
			'status_kemajuan_projek' => 'required', 
			'tarikh_awal_4' => 'required_unless:status_kemajuan_projek,==,"belum dimulakan"', 
			'tarikh_akhir_4' => 'required_unless:status_kemajuan_projek,==,"belum dimulakan"', 
			'peratus_kemajuan' => 'required_unless:status_kemajuan_projek,==,"belum dimulakan"', 
			// 'usbu_email_checker' => 'accepted',
			'alamat_tapak_milik_pengurusan_1' => 'required_if:usbu_email_checker,==,1',
			'poskod_3' => 'required_if:usbu_email_checker,==,1',
			'negeri_3' => 'required_if:usbu_email_checker,==,1',
			'no_tel_3' => 'required_if:usbu_email_checker,==,1',
		], [
			'status_projek.required' => 'Sila Pilih Status Pelan Susunatur',
			'tarikh_kelulusan_1.required_unless' => 'Sila Isi Tarikh Kelulusan Pelan Susunatur',
			'no_rujukan_1.required_unless' => 'Sila Isi No Rujukan Pelan Susunatur',
			'no_pelan_1.required_unless' => 'Sila Isi No Pelan Pelan Susunatur',
			'status_kerja_tanah.required' => 'Sila Pilih Status Kerja Tanah',
			'tarikh_kelulusan_2.required_unless' => 'Sila Isi Ruang Tarikh Kerja Tanah',
			'no_rujukan_2.required_unless' => 'Sila Isi Ruang No Kerja Tanah',
			'no_pelan_2.required_unless' => 'Sila Isi Ruang No Pelan Kerja Tanah',
			'status_kemajuan_projek.required' => 'Sila Pilih Status Kemajuan Projek',
			'tarikh_awal_4.required_unless' => 'Sila Isi Ruang Tarikh Awal Kemajuan Projek',
			'tarikh_akhir_4.required_unless' => 'Sila Isi Ruang Tarikh Akhir Kemajuan Projek',
			'peratus_kemajuan.required_unless' => 'Sila Isi Ruang Peratus Kemajuan Projek',
			// 'usbu_email_checker.accepted' => 'Pengerak Baru',
			'alamat_tapak_milik_pengurusan_1.required_if' => 'Sila Isi Ruang Alamat Tapak',
			'poskod_3.required_if' => 'Sila Isi Ruang Poskod',
			'negeri_3.required_if' => 'Sila Isi Ruang Negeri',
			'no_tel_3.required_if' => 'Sila Isi Ruang Nombor Telefon',
			]);

		if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'code' => 422,
                'message' => $validator->errors(),
            ]);
        }
		
		$log = new LogSystem;
		$log->module_id = 7;
		$log->activity_type_id = 3;
		$log->description = "Simpan borang A - Pengguna Luaran";
		$log->url = $request->fullUrl();
		$log->method = strtoupper($request->method());
		$log->ip_address = $request->ip();
		$log->created_by_user_id = auth()->id();
		$log->save();

		if (Auth::user()->hasRole('pp')) {

			$MonthlyA = MonthlyA::where('id', $request->eia118_id)->where('old_data', Null)->first();
			if ($MonthlyA) {
				$MonthlyA->old_data = json_encode($MonthlyA);
				$MonthlyA->version = auth()->id();
				$MonthlyA->save();
			}
		}

		$MonthlyA = MonthlyA::find($request->borangA_id);
		$MonthlyA->nama_projek = $request->nama_projek_1;
		$MonthlyA->alamat_projek = $request->alamat_tapak_maklumat_projek_1 . ' ' . $request->alamat_tapak_maklumat_projek_2 . ' ' . $request->alamat_tapak_maklumat_projek_3;
		$MonthlyA->tel_projek = $request->tel_projek;
		$MonthlyA->faks_projek = $request->faks_projek;

		if ($request->tarikh_awal_1) {
			$MonthlyA->tarikh_awal = Carbon::createFromFormat('d/m/Y', $request->tarikh_awal_1);
		}

		if($request->tarikh_akhir_1){
			$MonthlyA->tarikh_akhir =  Carbon::createFromFormat('d/m/Y', $request->tarikh_akhir_1);
		}

		$MonthlyA->nama_pemaju = $request->nama_projek_2;
		$MonthlyA->alamat_pemaju = $request->alamat_tapak_penggerak_projek_1;
		$MonthlyA->alamat_pemaju1 = $request->alamat_tapak_penggerak_projek_2;
		$MonthlyA->alamat_pemaju2 = $request->alamat_tapak_penggerak_projek_3;
		$MonthlyA->tel_pemaju = $request->no_tel_2;
		$MonthlyA->faks_pemaju = $request->no_faks_2;
		$MonthlyA->pertukaran_hakmilik = $request->usbu_email_checker;
		$MonthlyA->alamat_pemaju_baru = $request->alamat_tapak_milik_pengurusan_1;
		$MonthlyA->alamat_pemaju_baru1 = $request->alamat_tapak_milik_pengurusan_2;
		$MonthlyA->alamat_pemaju_baru2 = $request->alamat_tapak_milik_pengurusan_3;
		$MonthlyA->tel_pemaju_baru = $request->no_tel_3;
		$MonthlyA->faks_pemaju_baru = $request->no_faks_3;

		if (!empty($request->status_kemajuan_projek)) {
			if ($request->status_kemajuan_projek == 'siap') {
				$MonthlyA->status_id = 212;
			} elseif ($request->status_kemajuan_projek == 'tangguh') {
				$MonthlyA->status_id = 203;
			} elseif ($request->status_kemajuan_projek == 'terbengkalai') {
				$MonthlyA->status_id = 204;
			} else {
				$MonthlyA->status_id = 602;
			}
		} else {
			$MonthlyA->status_id = 602;
		}

		if ($request->status_kerja_tanah == 1) {
			$MonthlyA->status_tanah = $request->status_kerja_tanah;
			if ($request->tarikh_kelulusan_2) {
				$MonthlyA->tarikh_kelulusan_tanah = Carbon::createFromFormat('d/m/Y', $request->tarikh_kelulusan_2);
			}			
			$MonthlyA->no_rujukan_tanah =  $request->no_rujukan_2;
			$MonthlyA->no_pelan_tanah =  $request->no_pelan_2;
		}

		if ($request->status_projek == 1) {
			$MonthlyA->status_susunatur = $request->status_projek;
			if ($request->tarikh_kelulusan_1) {
				$MonthlyA->tarikh_kelulusan_susunatur =  Carbon::createFromFormat('d/m/Y', $request->tarikh_kelulusan_1);
			}
			$MonthlyA->no_rujukan_susunatur =  $request->no_rujukan_1;
			$MonthlyA->no_pelan_susunatur =  $request->no_pelan_1;
		}

		if ($request->peratus_fasa) {
			$data = array();
			if (!empty($request->peratus_fasa)) {
				for ($a = 0; $a < count($request->peratus_fasa); $a++) {
					array_push($data, array(
						'peratus' => $request->peratus_fasa[$a],
						'status_kemajuan_fasa' => $request->status_kemajuan_fasa[$a],
						'fasa_id' => $request->fasa_id[$a],
					));
				}
			}

			foreach ($data as $fasa) {
				$projekFasa = ProjekFasa::where('id', $fasa['fasa_id'])->first();
				$projekFasa->status_kemajuan = $fasa['status_kemajuan_fasa'];
				$projekFasa->kemajuan_percentage = $fasa['peratus'];
				$projekFasa->save();

				$akemajuan = new MonthlyAKemajuan;
				$akemajuan->projek_id = $request->projek_id;
				$akemajuan->monthly_a_id = $request->borangA_id;
				$akemajuan->pakej_id = $fasa['fasa_id'];
				$akemajuan->peratus_kemajuan = $fasa['peratus'];
				$akemajuan->status_kemajuan = $fasa['status_kemajuan_fasa'];
				$akemajuan->save();
			}
		}
		$MonthlyA->save();

		$MonthlyAKemajuanStatus = new MonthlyAKemajuanStatus;
		$MonthlyAKemajuanStatus->monthlya_id = $MonthlyA->id;
		$MonthlyAKemajuanStatus->peratus = $request->peratus_kemajuan;
		$MonthlyAKemajuanStatus->status_kemajuan = $request->status_kemajuan_projek;
		if($request->tarikh_awal_4)
		{
			$MonthlyAKemajuanStatus->tarikh_awal =  Carbon::createFromFormat('d/m/Y', $request->tarikh_awal_4);
		}

		if($request->tarikh_akhir_4)
		{
			$MonthlyAKemajuanStatus->tarikh_akhir =  Carbon::createFromFormat('d/m/Y', $request->tarikh_akhir_4);
		}
		
		$MonthlyAKemajuanStatus->save();
		
		// save if in status determined
		$statusData = ['siap', 'tangguh', 'terbengkalai'];
		if (in_array($request->status_kemajuan_projek, $statusData)) {
			$projekDetail = ProjekDetail::where('projek_id', $request->projek_id)->first();
			if ($projekDetail) {
				$projekDetail->status_id = $MonthlyA->status_id;
				$projekDetail->save();
			}
			$projek = Projek::where('id', $request->projek_id)->first();
			if ($projek) {
				$projek->status = $MonthlyA->status_id;
				$projek->save();
			}
			$this->saveMultipleMonths($request->projek_id, $MonthlyA->bulan, $MonthlyA->tahun, $MonthlyA->status_id);
			ProjekHelper::checkAllFormStatus($MonthlyA->projek_id, $MonthlyA->tahun, $MonthlyA->bulan);
		}
		return response()->json(['test' => 'Berjaya', 'text' => 'Maklumat berjaya disimpan', 'status' => 'success']);
	}

	public function saveMultipleMonths($projekId, $month, $year, $status)
	{
		$monthlyB = MonthlyB::firstOrCreate(['projek_id' => $projekId, 'tahun' => $year, 'bulan' => $month]);
		$monthlyB->projek_id = $projekId;
		$monthlyB->status_id = $status;
		$monthlyB->bulan = $month;
		$monthlyB->tahun = $year;
		$monthlyB->save();

		$monthlyC = MonthlyC::firstOrCreate(['projek_id' => $projekId, 'tahun' => $year, 'bulan' => $month]);
		$monthlyC->projek_id = $projekId;
		$monthlyC->status_id = $status;
		$monthlyC->bulan = $month;
		$monthlyC->tahun = $year;
		$monthlyC->save();

		$monthlyD = MonthlyD::firstOrCreate(['projek_id' => $projekId, 'tahun' => $year, 'bulan' => $month]);
		$monthlyD->projek_id = $projekId;
		$monthlyD->status_id = $status;
		$monthlyD->bulan = $month;
		$monthlyD->tahun = $year;
		$monthlyD->save();

		$monthlyE = MonthlyE::firstOrCreate(['projek_id' => $projekId, 'tahun' => $year, 'bulan' => $month]);
		$monthlyE->projek_id = $projekId;
		$monthlyE->status_id = $status;
		$monthlyE->bulan = $month;
		$monthlyE->tahun = $year;
		$monthlyE->save();

		$monthlyF = MonthlyF::firstOrCreate(['projek_id' => $projekId, 'tahun' => $year, 'bulan' => $month]);
		$monthlyF->projek_id = $projekId;
		$monthlyF->status_id = $status;
		$monthlyF->bulan = $month;
		$monthlyF->tahun = $year;
		$monthlyF->save();

		//get jeni pendawasan and loop
		$pengawasan = JenisPengawasan::where('projek_id', $projekId)->first();
		if ($pengawasan) {
			$jenisPengawasanId = json_decode($pengawasan->jenis_pengawasan_id, true);

			foreach ($jenisPengawasanId as $key => $value) {
				$ProjekPengawasan = ProjekPengawasan::where('projek_id', $projekId)->where('pengawasan_id', $value)->first();
				if ($ProjekPengawasan) {
					$ProjekPengawasanId = $ProjekPengawasan->id;
				} else {
					$ProjekPengawasanId = 0;
				}

				$stesen = Stesen::where('projek_id', $projekId)->where('tahun', $year)->where('bulan', $month)->where('jenis_pengawasan_id', $value)->where('projek_pengawasan_id', $ProjekPengawasanId)->first();
				if (empty($stesen)) {
					$stesen = new Stesen;
				}
				$stesen->projek_id = $projekId;
				$stesen->status = $status;
				$stesen->bulan = $month;
				$stesen->jenis_pengawasan_id = $value;
				$stesen->projek_pengawasan_id = $ProjekPengawasanId;
				$stesen->tahun = $year;
				$stesen->save();
			}
		}
	}
}
