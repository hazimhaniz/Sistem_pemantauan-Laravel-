<?php

namespace App\Http\Controllers;

use App\MasterModel\MasterDistrict;
use App\MasterModel\MasterPematuhanEia;
use App\MasterModel\MasterPengawasan;
use App\MasterModel\MasterPeringkatPengawasan;
use App\MasterModel\MasterState;
use App\MasterModel\MasterTempohAudit;
use App\PakejHasPengawasan;
use App\Projek;
use App\ProjekAudit;
use App\ProjekDetail;
use App\ProjekEMP;
use App\ProjekFasa;
use App\ProjekHasPp;
use App\ProjekHasUser;
use App\ProjekLDP2M2;
use App\ProjekPengawasan;
use App\MonthlyBSyaratRegister;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\LogSystem;
use Illuminate\Support\Facades\Validator;
use Session;
use DateTime;

class PendaftaranProjekController extends Controller
{
    public function pendaftaranProjek(Request $request)
    {
        $userPP = null;
        $projek = null;
        $projekDetail = null;
        $jasFail = null;
        $jasDetail = null;
        $xxx = null;

        $projekID = $request->projekID;
        $userPP = ProjekHasPp::where('projek_id', $projekID)->where('role_id', 4)->first();
        $userEMC = ProjekHasUser::where('projek_id', $projekID)->where('role_id', 6)->join('user', 'user.id', '=', 'projek_has_user.user_id')->select(['user.id', 'user.name'])->get();

        $projek = Projek::where('id', $projekID)->first();
        if ($projek) {
            $projekDetail = $projek->projekdetail;
            $jasFail = $projek->jasfail;
            if ($jasFail) {
                $jasDetail = $jasFail->jasdetail;
            }
        }

        $states = MasterState::get();
        $districts = MasterDistrict::get();
        $pengawasans = MasterPengawasan::get();
        $pematuhans = MasterPematuhanEia::get();
        $projekPengawasanArr = ProjekPengawasan::where('projek_id', $projek->id)->get()->pluck('pengawasan_id')->toArray();
        $peringkatPengawasans = MasterPeringkatPengawasan::where('status', 1)->get();
        $tempohAudits = MasterTempohAudit::get();

        return view('form.pendaftaranProjek', compact('projek', 'userPP', 'projekDetail', 'jasFail', 'jasDetail', 'states', 'districts', 'pengawasans', 'pematuhans', 'projekPengawasanArr', 'peringkatPengawasans', 'tempohAudits', 'userEMC'));
    }

    public function pendaftaranProjekMaklumatProjek(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tarikh_awal' => 'required',
            'tarikh_akhir' => 'required',
            'alamat_surat' => 'required',
            'surat_poskod' => 'required',
            'surat_negeri' => 'required',
            'jenisPakej' => 'required_if:value,==,"undefined"',
        ], [
            'tarikh_awal.required' => 'Sila Isi Ruang Tarikh Awal',
            'tarikh_akhir.required' => 'Sila Isi Ruang Tarikh Akhir',
            'alamat_surat.required' => 'Sila Isi Ruang Alamat',
            'surat_poskod.required' => 'Sila Isi Ruang Poskod',
            'surat_negeri.required' => 'Sila Pilih Negeri',
            'jenisPakej.required' => 'Sila pilih jenis pakej',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'code' => 422,
                'message' => $validator->errors()->first(),
            ]);
        }

        $projekID = $request->projekID;
        $projek = Projek::where('id', $projekID)->first();
        $projekDetail = $projek->projekdetail;

        $start = str_replace("/", "-", $request->tarikh_awal);
        $end = str_replace("/", "-", $request->tarikh_akhir);
        $startTime = strtotime($start);
        $endTime = strtotime($end);
        if ($startTime > $endTime) {
            return response()->json(['success' => false, 'message' => 'Sila pastikan tarikh akhir tidak kurang daripada tarikh mula']);
        }

        if ($request->tarikh_awal) {
            $tarikh_awal = Carbon::createFromFormat('d/m/Y', $request->tarikh_awal);
            $projek->tarikh_awal = $tarikh_awal;
        }
        if ($request->tarikh_akhir) {
            $tarikh_akhir = Carbon::createFromFormat('d/m/Y', $request->tarikh_akhir);
            $projek->tarikh_akhir = $tarikh_akhir;
        }

        if ($request->tarikh_awal && $request->tarikh_akhir) {
            $tempoh = $tarikh_awal->diffInMonths($tarikh_akhir) + 1;
            $projek->tempoh = $tempoh;
        }

        $projek->pematuhan_eia = $request->pematuhanEIA;
        $projek->jenis_pakej = $request->jenisPakej;

        $projek->save();

        $projekDetail->alamat_surat = $request->alamat_surat;
        $projekDetail->alamat_surat1 = $request->alamat_surat1;
        $projekDetail->alamat_surat2 = $request->alamat_surat2;
        $projekDetail->surat_poskod = $request->surat_poskod;
        $projekDetail->surat_negeri = $request->surat_negeri;
        $projekDetail->surat_daerah = $request->surat_daerah;
        $projekDetail->save();

        $log = new LogSystem;
        $log->module_id = 26; //pendaftaran projek
        $log->activity_type_id = 4; //tambah data
        $log->description = "Simpan maklumat projek";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->user()->id;
        $log->save();

        $response = ['success' => true, 'projek' => $projek, 'projekDetail' => $projekDetail];

        return response()->json($response);
    }

    public function pendaftaranProjekTambahFasa(Request $request)
    {
        // dd($request->jadual_perlaksanaan_file);
        $projekID = $request->projekID;

        $projekFasa = new ProjekFasa;
        $projekFasa->projek_id = $request->projekID;
        $projekFasa->nama_pakej = $request->nama_pakej;
        $projekFasa->kontraktor = $request->kontraktor_fasa;
        $projekFasa->pakej_negeri = $request->pakej_negeri_fasa;
        $projekFasa->alamat = $request->pakej_alamat_fasa;
        $projekFasa->alamat1 = $request->pakej_alamat1_fasa;
        $projekFasa->alamat2 = $request->pakej_alamat2_fasa;

        if ($request->tarikh_mula_fasa) {
            $tarikh_mula_fasa = Carbon::createFromFormat('d/m/Y', $request->tarikh_mula_fasa);
            $projekFasa->tarikh_mula = $tarikh_mula_fasa;
        }
        if ($request->tarikh_akhir_fasa) {
            $tarikh_akhir_fasa = Carbon::createFromFormat('d/m/Y', $request->tarikh_akhir_fasa);
            $projekFasa->tarikh_akhir = $tarikh_akhir_fasa;
        }

        $projekFasa->save();

        if ($request->jadual_perlaksanaan_file) {
            uploadFiles($projekFasa, ['files' => $request->jadual_perlaksanaan_file], 'jadual_perlaksanaan_file', $request->projekID);
        }

        if ($request->foto_status_file) {
            uploadFiles($projekFasa, ['files' => $request->foto_status_file], 'foto_status_file', $request->projekID);
        }

        $pengawasan = $request->pengawasan;
        $pengawasanArr = explode(',', $pengawasan);

        foreach ($pengawasanArr as $key => $val) {
            $pakejHasPengawasan = new PakejHasPengawasan;
            $pakejHasPengawasan->pakej_id = $projekFasa->id;
            $pakejHasPengawasan->pengawasan_id = $val;
            // $pakejHasPengawasan->user_emc_id = $request->user_emc;
            $pakejHasPengawasan->save();
        }

        return response()->json($projekFasa);
    }

    public function pendaftaranProjekDeleteFasa(Request $request)
    {
        $projekFasa = ProjekFasa::where('id', $request->projekFasaID)->delete();
        return redirect()->back();
    }

    public function pendaftaranProjekKemaskiniFasa(Request $request)
    {
        $projekFasa = ProjekFasa::where('id', $request->projekFasaID)->first();
        $projek = $projekFasa->projek;
        $pakejHasPengawasans = PakejHasPengawasan::where('pakej_id', $projekFasa->id)->get();

        $states = MasterState::get();
        $districts = MasterDistrict::get();
        $pengawasans = MasterPengawasan::get();
        $pematuhans = MasterPematuhanEia::get();
        $projekPengawasanArr = ProjekPengawasan::where('projek_id', $projek->id)->get()->pluck('pengawasan_id')->toArray();

        $userEOs = ProjekHasUser::where('projek_id', $projek->id)->where('role_id', 5)->get();
        $userEMCs = ProjekHasUser::where('projek_id', $projek->id)->where('role_id', 6)->get();

        return view('projek.kemaskini_fasa_projek_modal', compact('projekFasa', 'projek', 'pakejHasPengawasans', 'states', 'districts', 'pengawasans', 'pematuhans', 'projekPengawasanArr', 'userEOs', 'userEMCs'));
    }

    public function pendaftaranProjekKemaskiniFasaSubmit(Request $request)
    {
        $projekFasaID = $request->projekFasaID;

        $projekFasa = ProjekFasa::where('id', $projekFasaID)->first();
        // $projekFasa->projek_id = $request->projekID;
        $projekFasa->nama_pakej = $request->nama_pakej;
        $projekFasa->kontraktor = $request->kontraktor_fasa;
        $projekFasa->pakej_negeri = $request->pakej_negeri_fasa;
        $projekFasa->alamat = $request->pakej_alamat_fasa;
        $projekFasa->alamat1 = $request->pakej_alamat1_fasa;
        $projekFasa->alamat2 = $request->pakej_alamat2_fasa;

        if ($request->tarikh_mula_fasa) {
            $tarikh_mula_fasa = Carbon::createFromFormat('d/m/Y', $request->tarikh_mula_fasa);
            $projekFasa->tarikh_mula = $tarikh_mula_fasa;
        }
        if ($request->tarikh_akhir_fasa) {
            $tarikh_akhir_fasa = Carbon::createFromFormat('d/m/Y', $request->tarikh_akhir_fasa);
            $projekFasa->tarikh_akhir = $tarikh_akhir_fasa;
        }

        $projekFasa->save();

        $pengawasan = $request->pengawasan;
        $pengawasanArr = explode(',', $pengawasan);

        foreach ($pengawasanArr as $key => $val) {
            $pakejHasPengawasan = PakejHasPengawasan::where('pakej_id', $projekFasa->id)->where('pengawasan_id', $val)->first();
            if (empty($pakejHasPengawasan)) {
                $pakejHasPengawasan = new PakejHasPengawasan;
            }
            $pakejHasPengawasan->pakej_id = $projekFasa->id;
            $pakejHasPengawasan->pengawasan_id = $val;
            $pakejHasPengawasan->save();
        }

        $pengawasanAssignID = $request->pengawasanAssignID;
        $userEO = $request->userEO;
        $userEMC = $request->userEMC;

        $pengawasanAssignID = explode(',', $pengawasanAssignID);
        $userEO = explode(',', $userEO);
        $userEMC = explode(',', $userEMC);

        // PakejHasPengawasan::where('pakej_id', $projekFasaID)->delete();
        for ($i = 0; $i < count($pengawasanAssignID); $i++) {
            $pengawasan = $pengawasanAssignID[$i];
            $eo = $userEO[$i];
            $emc = $userEMC[$i];

            if ($pengawasan && $eo && $emc) {
                $pakejHasPengawasan = PakejHasPengawasan::where('pakej_id', $projekFasaID)->where('pengawasan_id', $pengawasan)->first();
                if (empty($pakejHasPengawasan)) {
                    $pakejHasPengawasan = new PakejHasPengawasan;
                }
                $pakejHasPengawasan->pakej_id = $projekFasaID;
                $pakejHasPengawasan->pengawasan_id = $pengawasan;
                $pakejHasPengawasan->user_eo_id = $eo;
                $pakejHasPengawasan->user_emc_id = $emc;
                $pakejHasPengawasan->save();

            }
        }
        return ['success' => true];
    }

    public function senaraiEMP(Request $request)
    {
        $projekID = $request->projekID;
        $projekEMPs = ProjekEMP::where('projek_id', $projekID)->get();

        return view('projek.senaraiEMP', compact('projekEMPs'));
    }

    public function tambahEMP(Request $request)
    {
        $projekID = $request->projekID;

        $projekEMP = new ProjekEMP;
        $projekEMP->projek_id = $projekID;
        if ($request->emp_tarikh_kelulusan) {
            $emp_tarikh_kelulusan = Carbon::createFromFormat('d/m/Y', $request->emp_tarikh_kelulusan);
            $projekEMP->tarikh_kelulusan = $emp_tarikh_kelulusan;
        }
        $projekEMP->laporan = $request->emp_nama_laporan;
        $projekEMP->jururunding = $request->emp_perunding;
        $projekEMP->No_Rujukan = $request->emp_no_rujukan;
        $projekEMP->save();

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 4; 
        $log->description = "Tambah maklumat EMP";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->user()->id;
        $log->save();

        return response()->json($projekEMP);
    }

    public function deleteEMP(Request $request)
    {
        $empID = $request->empID;
        ProjekEMP::where('id', $empID)->delete();

        Session::flash('pendaftaranprojek_tab', 'tabBtnDaftar2');
        return redirect()->back();
    }

    public function senaraiLDP2M2(Request $request)
    {
        $projekID = $request->projekID;
        $projekLDP2M2s = ProjekLDP2M2::where('projek_id', $projekID)->get();

        return view('projek.senaraiLDP2M2', compact('projekLDP2M2s'));
    }

    public function tambahLDP2M2(Request $request)
    {
        $projekID = $request->projekID;

        $projekLDP2M2 = new ProjekLDP2M2;
        $projekLDP2M2->projek_id = $projekID;

        if ($request->ldp2m2_tarikh_kelulusan) {
            $tarikh_kelulusan = Carbon::createFromFormat('d/m/Y', $request->ldp2m2_tarikh_kelulusan);
            $projekLDP2M2->tarikh_kelulusan = $tarikh_kelulusan;
        }

        $projekLDP2M2->nama = $request->ldp2m2_nama_dokumen;
        $projekLDP2M2->no_plan_diluluskan = $request->ldp2m2_no_rujukan;

        $projekLDP2M2->save();

        if ($request->ldp2m2_file) {
            uploadFiles($projekLDP2M2, ['files' => $request->ldp2m2_file], '', $projekID);
        }

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 4; 
        $log->description = "Tambah maklumat LDP2M2 ";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->user()->id;
        $log->save();

        return response()->json($projekLDP2M2);
    }

    public function deleteLDP2M2(Request $request)
    {
        $ldp2m2ID = $request->ldp2m2ID;
        ProjekLDP2M2::where('id', $ldp2m2ID)->delete();

        Session::flash('pendaftaranprojek_tab', 'tabBtnDaftar2');
        return redirect()->back();
    }

    public function senaraiAudit(Request $request)
    {
        $projekID = $request->projekID;
        $projekAudits = ProjekAudit::where('projek_id', $projekID)->get();

        return view('projek.senaraiAudit', compact('projekAudits'));
    }

    public function tambahAudit(Request $request)
    {
        $projekID = $request->projekID;
        ProjekAudit::where('projek_id', $projekID)->delete();

        $loopCount = 0;
        if ($request->tempohAudit == 5) {
            $loopCount = 12;
        } else {
            $loopCount = $request->tempohAudit;
        }

        $tarikh_cadangan_audit = "";
        if ($request->tarikh_cadangan_audit) {
            $tarikh_cadangan_audit = Carbon::createFromFormat('d/m/Y', $request->tarikh_cadangan_audit);
        }

        for ($i = 0; $i < $loopCount; $i++) {
            $projekAudit = new ProjekAudit;
            $projekAudit->projek_id = $projekID;
            $projekAudit->kekerapan_audit = $request->tempohAudit;
            $projekAudit->status_kemajuan = $request->peringkatPengawasan;
            if ($i == 0) {
                $projekAudit->tarikh_audit = $tarikh_cadangan_audit;
            }
            $projekAudit->save();
        }

        return response()->json(null);
    }

    public function deleteAudit(Request $request)
    {
        $auditID = $request->auditID;
        ProjekAudit::where('id', $auditID)->delete();

        Session::flash('pendaftaranprojek_tab', 'tabBtnDaftar3');
        return redirect()->back();
    }

    public function editAudit(Request $request)
    {
        // dd($request->tarikh_cadangan_audit_edit);
        $auditID = $request->auditID;
        $projekAudit = ProjekAudit::where('id', $auditID)->first();

        $tarikh_cadangan_audit_edit = $request->tarikh_cadangan_audit_edit;
        $no_rujukan_audit_edit = $request->no_rujukan_audit_edit;

        $exist = $this->checkProjekAuditMonthExist($projekAudit, $tarikh_cadangan_audit_edit);
        if ($exist) {
            return response()->json(['success' => false, 'message' => '']);
        }
        $tarikh_cadangan_audit_edit = "";
        if ($request->tarikh_cadangan_audit_edit) {
            $tarikh_cadangan_audit_edit = Carbon::createFromFormat('d/m/Y', $request->tarikh_cadangan_audit_edit);
        }

        // tarikh cadangan must not less than today
        $date_now = date("Y-m-d");
        if($date_now > $tarikh_cadangan_audit_edit->toDateString()) {
            return response()->json(['success' => false, 'message' => 'Tarikh cadangan mestilah melebih daripada tarikh pada hari ini']);
        }

        // check the dates
        // $projekId = Projek::where('id', $projekAudit->projek_id)->first();
        // if ($projekId) {
        //     $startDate = date('Y-m-d', strtotime($projekId->tarikh_awal));
        //     $startTime = strtotime($startDate);
        //     $endDate = date('Y-m-d', strtotime($projekId->tarikh_akhir));
        //     $endTime = strtotime($endDate);
        // }
        // $tarikhCadanganDate = date('Y-m-d', strtotime($tarikh_cadangan_audit_edit));
        // $tarikhCadanganDateTime = strtotime($tarikhCadanganDate);

        // if ($tarikhCadanganDateTime < $startTime || $tarikhCadanganDateTime > $endTime) {
        //     $startDateView = Carbon::createFromFormat('Y-m-d', $startDate)->format('d/m/Y');
        //     $endDateView = Carbon::createFromFormat('Y-m-d', $endDate)->format('d/m/Y');

        //     return response()->json(['success' => false, 'message' => 'Tarikh cadangan hendaklah dari ' . $startDateView . ' hingga ' . $endDateView]);
        // }

        $projekAudit->tarikh_audit = $tarikh_cadangan_audit_edit;
        $projekAudit->no_rujukan = $no_rujukan_audit_edit;
        $projekAudit->save();

        return response()->json(['success' => true]);
    }

    public function checkProjekAuditMonthExist($projekAudit, $tarikh_cadangan_audit_edit)
    {
        $tarikh_cadangan_audit_edit = Carbon::createFromFormat('d/m/Y', $tarikh_cadangan_audit_edit);

        $projekAudit = ProjekAudit::where('projek_id', $projekAudit->projek_id)->where('id', '!=', $projekAudit->id)->whereYear('tarikh_audit', $tarikh_cadangan_audit_edit->year)->whereMonth('tarikh_audit', $tarikh_cadangan_audit_edit->month)->first();
        if ($projekAudit) {
            return true;
        } else {
            return false;
        }
    }

    public function hantarPendaftaran(Request $request)
    {
        $projekID = $request->projekID;
        $projek = Projek::where('id', $projekID)->first();
        $projek->status = 4;
        $projek->save();

        $projekDetail = ProjekDetail::where('projek_id', $projekID)->first();
        $projekDetail->status_id = 4;
        $projekDetail->save();

        $syarat = MonthlyBSyaratRegister::where('projek_id',$projekID)->whereIn('status',[608,609])->get();
        foreach($syarat as $rat){
            $rat->status = 608;
            $rat->save();
        }

        $log = new LogSystem;
        $log->module_id = 26; //pendaftaran projek
        $log->activity_type_id = 4; //tambah data
        $log->description = "Pendaftaran Audit Alam Sekeliling";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->user()->id;
        $log->save();

        // check if all required form fill in
        $projekEMP     = ProjekEMP::where('projek_id', $projekID)->first();
        $projekDP2M2   = ProjekLDP2M2::where('projek_id', $projekID)->first();
        $monthlySyarat = MonthlyBSyaratRegister::where('projek_id', $projekID)->first();
        $projekAudit  = ProjekAudit::where('projek_id', $projekID)->first();
        $checker = [
            // tab : MAKLUMAT PROJEK
            'tarikh_awal'   => $projek ? ($projek->tarikh_awal ? $projek->tarikh_awal->toDateString() : null) : null,
            'tarikh_akhir'  => $projek ? ($projek->tarikh_akhir ? $projek->tarikh_akhir->toDateString() : null) : null,
            'jenis_pakej'   => $projek ? $projek->jenis_pakej : null,
            'alamat_surat'  => $projekDetail ? $projekDetail->alamat_surat : null,
            'surat_poskod'  => $projekDetail ? $projekDetail->surat_poskod : null,
            'surat_negeri'  => $projekDetail ? $projekDetail->surat_negeri : null,
            'jenis_package' => $projek ? $projek->jenis_pakej : null,
            // tab : EMP & LDP2M2
            'projek_EMP'    => $projekEMP ? 'yes' : null,
            'projek_DP2M2'  => $projekDP2M2 ? 'yes' : null,
            // tab : PENDAFTARAN SYARAT EIA
            'monthly_syarat'=> $monthlySyarat ? 'yes' : null,
            // tab : AUDIT ALAM SEKELILING
            'kekerapan_audit' => $projekAudit ? $projekAudit->kekerapan_audit : null,
            'status_kemajuan' => $projekAudit ? $projekAudit->status_kemajuan : null,
            'tarikh_audit'    => $projekAudit ? $projekAudit->tarikh_audit : null,
        ];

        $validator = Validator::make($checker, [
            'tarikh_awal'   => 'required',
            'tarikh_akhir'  => 'required',
            'jenis_pakej'   => 'required',
            'alamat_surat'  => 'required',
            'surat_poskod'  => 'required',
            'surat_negeri'  => 'required',
            'jenis_package' => 'required',
            'projek_EMP'    => 'required',
            'projek_DP2M2'  => 'required',
            'monthly_syarat'  => 'required',
            'kekerapan_audit' => 'required',
            'status_kemajuan' => 'required',
            'tarikh_audit'    => 'required',
        ], [
            'tarikh_awal.required'   => 'Tab Maklumat Projek : Sila Isi Ruang Tarikh Awal',
            'tarikh_akhir.required'  => 'Tab Maklumat Projek : Sila Isi Ruang Tarikh Akhir',
            'alamat_surat.required'  => 'Tab Maklumat Projek : Sila Isi Ruang Alamat',
            'surat_poskod.required'  => 'Tab Maklumat Projek : Sila Isi Ruang Poskod',
            'surat_negeri.required'  => 'Tab Maklumat Projek : Sila Pilih Negeri',
            'jenis_package.required' => 'Tab Maklumat Projek : Sila pilih jenis pakej',
            'projek_EMP.required'    => 'Tab EMP & LDP2M2 : Sila Isi Projek EMP',
            'projek_DP2M2.required'  => 'Tab EMP & LDP2M2 : Sila Isi Projek LDP2M2',
            'monthly_syarat.required'  => 'Tab PENDAFTARAN SYARAT EIA : Sila Isi Pendaftaran Syarat EIA',
            'kekerapan_audit.required' => 'Tab AUDIT ALAM SEKELILING : Sila pilih Status Kemajuan',
            'status_kemajuan.required' => 'Tab AUDIT ALAM SEKELILING : Sila Isi Tempoh Audit Alam Sekeliling',
            'tarikh_audit.required'    => 'Tab AUDIT ALAM SEKELILING : Sila Isi Tarikh Cadangan Audit Alam Sekeliling',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'code' => 422,
                'message' => $validator->errors(),
            ]);
        }

        // Session::flash('success', 'Maklumat Berjaya Disimpan');
        // return redirect('/home');
    }
    
    public function getuserData(Request $request)
    {
        $projekID = $request->projekID;
        $projek = Projek::where('id', $projekID)->first();
        $userId = $request->userId;

        $pengawasan = ProjekPengawasan::where('projek_id', $projekID)->where('user_id', $userId)->get();
        foreach ($pengawasan as $key => $value) {
            $pengawasans = MasterPengawasan::where('id', $value->pengawasan_id)->first();
            $data[$key]['id'] = $pengawasans->id;
            $data[$key]['jenis_pengawasan'] = $pengawasans->jenis_pengawasan;
        }
        return ['success' => true, 'data' => $data];
    }
}
