<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonthlyF;
use App\MonthlyE;
use App\MonthlyEDetail;
use App\LogSystem;
use Yajra\Datatables\Datatables;
use App\ProjekHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class BorangEFController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

	public function getBorangEF($id){
		$monthlyF=MonthlyF::where('id',$id)->get();
		$monthlyE=MonthlyE::where('id',$id)->get();
		return view('form.index',compact('monthlyF'));
	}

	public function postBorangEF(Request $request) {

		$input = $request->all();
		// dd($input);
        $validator = Validator::make($input, [    
			'tarikh_audit_dijalankan' => 'required_if:jenis_audit,"kemaskini_audit"',
			'auditor' => 'required_if:jenis_audit,"kemaskini_audit"',
			'sebab_tidak_melaksanakan' => 'required_if:tidak_dapat_melaksanakan_audit,"1"',
			'jenis_audit' => 'required_unless:tidak_dapat_melaksanakan_audit,"1"',
			'borangFvalidate' => 'required',
		], [
			'tarikh_audit_dijalankan.required_if' => 'Sila Isi Ruang Tarikh Audit Dijalankan',
			'tarikh_audit_dijalankan.required_unless' => 'Sila Isi Ruang Tarikh Audit Dijalankan', 
			'auditor.required_if' => 'Sila Isi Auditor',
			'sebab_tidak_melaksanakan.required_if' => 'Sila Berikan Sebab Tidak Dapat Melaksanakan Audit',
			'jenis_audit.required' => 'Sila Isi Jenis Audit',
			'borangFvalidate.required' => 'Sila Pilih Sekurang-kurangnya Satu Status Pelaksanaan EMT',

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
		$log->description = "Bahagian E & F - Pengguna Luaran";
		$log->url = $request->fullUrl();
		$log->method = strtoupper($request->method());
		$log->ip_address = $request->ip();
		$log->created_by_user_id = auth()->id();
		$log->save();

		if($request->jenis_audit == 'tidak_dijadualkan'){
			$MonthlyExaudit = MonthlyE::where('id',$request->borangE_id)->first();
			$MonthlyExaudit->status_id = 602;
			$MonthlyExaudit->type_of_audit = 2;
			$MonthlyExaudit->save();
		}elseif($request->jenis_audit == 'kemaskini_audit'){
			$MonthlyE = MonthlyE::where('id',$request->borangE_id)->first();
			$MonthlyE->projek_id = $request->projek_id;
			$MonthlyE->audit_id = $request->projek_audit;
			$MonthlyE->status_id = 602;

			if($request->tarikh_audit_dijalankan){
				$MonthlyE->tarikh_perlaksanaan_audit =  Carbon::createFromFormat('d/m/Y', $request->tarikh_audit_dijalankan);
			}

			$MonthlyE->audit = $request->auditor;
			$MonthlyE->ncr_op = $request->ncr;
			$MonthlyE->ofi_op = $request->ofi;
			$MonthlyE->type_of_audit = 1;
			$MonthlyE->sebab = $request->sebab_tidak_melaksanakan;
			$MonthlyE->save();
			
			if ($request->files) {
				uploadFiles($MonthlyE, ['files' =>$request->files], 'doc_sokongan', $request->projek_id);
			}

			ProjekHelper::checkAllFormStatus($MonthlyE->projek_id, $MonthlyE->tahun, $MonthlyE->bulan);
		}

		$MonthlyF = MonthlyF::where('id',$request->borangF_id)->first();
		$MonthlyF->projek_id = $request->projek_id;
		$MonthlyF->status_id = 602;
		$MonthlyF->ep = $request->ep;
		$MonthlyF->eb = $request->eb;
		$MonthlyF->ec = $request->ec;
		$MonthlyF->ef = $request->ef;
		$MonthlyF->emc= $request->emc;
		$MonthlyF->erc= $request->erc;
		$MonthlyF->et = $request->et;
		$MonthlyF->save();

		ProjekHelper::checkAllFormStatus($MonthlyF->projek_id, $MonthlyF->tahun, $MonthlyF->bulan);
		
		return response()->json(['test'=>'Berjaya','text'=>'Maklumat berjaya dipadam','status'=>'success']);
		
	}
}
