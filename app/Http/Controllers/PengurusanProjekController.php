<?php

namespace App\Http\Controllers;

use App\Distribution;
use App\LaporanPermakahanFinal;
use App\LaporanSiasatanFinal;
use App\MasterElemenPemeriksaan;
use App\Models\MonthlyC;
use App\MonthlyA;
use App\MonthlyB;
use App\MonthlyBSyarat;
use App\MonthlyD;
use App\MonthlyE;
use App\MonthlyF;
use App\PengurusanKuiri;
use App\Projek;
use App\ProjekBulananStatus;
use App\ProjekDetail;
use App\ProjekEMP;
use App\ProjekFasa;
use App\ProjekHasUser;
use App\ProjekHelper;
use App\ProjekLDP2M2;
use App\LogSystem;
use App\User;
use App\UserStaff;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use App\MasterModel\MasterFilingStatus;

class PengurusanProjekController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function projekAktif(Request $request)
    {
        if ($request->ajax()) {

            $staffStatesArr = UserStaff::where('user_id', Auth::user()->id)->get()->pluck('state_id')->toArray();
            if (auth()->user()->username == 'superadmin'){
            
                $staffStatesArr = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];
            }

            $projekAktif = Projek::query();
            $projekAktif->whereIn('state', $staffStatesArr);

            $projekAktif->where('status', 200);

            return datatables()->of($projekAktif->get())
                ->editColumn('no_fail_jas', function ($projekAktif) {
                    $button = '<button onclick="viewProjek(' . $projekAktif->id . ')" class="btn fail btn-sm btn-block"> ' . $projekAktif->no_fail_jas . ' </button>';
                    return $button;
                })
                ->editColumn('nama_projek', function ($projekAktif) {
                    return "<span class='ow pull-left'>" . $projekAktif->nama_projek . "</span>";
                })
                ->editColumn('tarikh_hantar', function ($projekAktif) {
                    return $projekAktif->tarikh_hantar ? $projekAktif->tarikh_hantar->format('d/m/Y') : '';
                })
                ->editColumn('tarikh_sah', function ($projekAktif) {

                    return $projekAktif->tarikh_sah ? $projekAktif->tarikh_sah->format('d/m/Y h:i a') : '';
                })
                ->make(true);
        }
        return view('form.PengurusanProjek.projekAktif');
    }

    public function projekDipinda(Request $request)
    {
        if ($request->ajax()) {

            $staffStatesArr = UserStaff::where('user_id', Auth::user()->id)->get()->pluck('state_id')->toArray();

            $projekBelumSah = Projek::query();
            $projekBelumSah->where('status', 210);
            $projekBelumSah->whereIn('state', $staffStatesArr);

            return datatables()->of($projekBelumSah->get())
                ->editColumn('no_fail_jas', function ($projekBelumSah) {
                    $button = '<button onclick="viewProjek(' . $projekBelumSah->id . ')" class="btn fail btn-sm btn-block"> ' . $projekBelumSah->no_fail_jas . ' </button>';
                    return $button;
                })
                ->editColumn('nama_projek', function ($projekBelumSah) {
                    return "<span class='ow pull-left'>" . $projekBelumSah->nama_projek . "</span>";
                })
                ->editColumn('tarikh_hantar', function ($projekBelumSah) {
                    return $projekBelumSah->tarikh_hantar ? $projekBelumSah->tarikh_hantar->format('d/m/Y') : '';
                })
                ->editColumn('tarikh_sah', function ($projekBelumSah) {

                    return $projekBelumSah->tarikh_sah ? $projekBelumSah->tarikh_sah->format('d/m/Y h:i a') : '';
                })
                ->make(true);
        }
        return view('form.PengurusanProjek.projekDipinda');
    }

    public function belum_sah(Request $request)
    {
        if ($request->ajax()) {

            $staffStatesArr = UserStaff::where('user_id', Auth::user()->id)->get()->pluck('state_id')->toArray();

            $projekBelumSah = Projek::query();
            $projekBelumSah->whereIn('state', $staffStatesArr);

            $projekBelumSah->where('status', 4);

            $projekBelumSah->whereHas('projekdetail', function ($query) {
                $query->where('status_id', 4);
            });

            return datatables()->of($projekBelumSah->get())
                ->editColumn('no_fail_jas', function ($projekBelumSah) {
                    $button = '<button onclick="viewProjek(' . $projekBelumSah->id . ')" class="btn fail btn-sm btn-block"> ' . $projekBelumSah->no_fail_jas . ' </button>';
                    return $button;
                })
                ->editColumn('nama_projek', function ($projekBelumSah) {
                    return "<span class='ow pull-left'>" . $projekBelumSah->nama_projek . "</span>";
                })
                ->editColumn('tarikh_hantar', function ($projekBelumSah) {
                    return $projekBelumSah->tarikh_hantar ? $projekBelumSah->tarikh_hantar->format('d/m/Y') : '';
                })
                ->editColumn('tarikh_sah', function ($projekBelumSah) {

                    return $projekBelumSah->tarikh_sah ? $projekBelumSah->tarikh_sah->format('d/m/Y h:i a') : '';
                })
                ->make(true);
        }
        return view('form.PengurusanProjek.belumSah');
    }

    public function telah_sah(Request $request)
    {
        if ($request->ajax()) {

            $staffStatesArr = UserStaff::where('user_id', Auth::user()->id)->get()->pluck('state_id')->toArray();

            $projekBelumSah = Projek::query();
            $projekBelumSah->whereIn('state', $staffStatesArr);

            $projekBelumSah->where('status', 200);

            $projekBelumSah->whereHas('projekdetail', function ($query) {
                $query->where('status_id', 500);
            });

            $projekBelumSah = $projekBelumSah->get();

            foreach ($projekBelumSah as $key => $projek) {
                $projekUsers = ProjekHasUser::where('projek_id', $projek->id)->get();
                foreach ($projekUsers as $projekUser) {
                    if ($projekUser->status != 101) {
                        $projekBelumSah->forget($key);
                    }
                }
            }

            return datatables()->of($projekBelumSah)
                ->editColumn('no_fail_jas', function ($projekBelumSah) {
                    $button = '<button onclick="viewProjek(' . $projekBelumSah->id . ')" class="btn fail btn-xs btn-block"> ' . $projekBelumSah->no_fail_jas . '</button>';
                    return $button;
                })
                ->editColumn('nama_projek', function ($projekBelumSah) {
                    return '<span class="ow pull-left">' . $projekBelumSah->nama_projek . '</span>';
                })
                ->editColumn('tarikh_hantar', function ($projekBelumSah) {
                    return $projekBelumSah->tarikh_hantar ? $projekBelumSah->tarikh_hantar->format('d/m/Y') : '';
                })
                ->editColumn('tarikh_sah', function ($projekBelumSah) {

                    return $projekBelumSah->tarikh_sah ? $projekBelumSah->tarikh_sah->format('d/m/Y h:i a') : '';
                })
                ->make(true);
        }
        return view('form.PengurusanProjek.telahSah');
    }

    public function penyiasatSahDaftar(Request $request)
    {
        $projekID = $request->projekID;
        $status = $request->status;

        $projek = Projek::where('id', $projekID)->first();
        $projek->status = 200;
        $projek->tarikh_sah = now();
        $projek->save();

        $projekDetail = $projek->projekdetail;
        $projekDetail->status_id = 211;
        $projekDetail->save();

        $log = new LogSystem;
        $log->module_id = 26; 
        $log->activity_type_id = 20; 
        $log->description = "PENGESAHAN MAKLUMAT AUDIT ALAM SEKELILING";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->user()->id;
        $log->save();

        Session::flash('success', 'Maklumat Berjaya Disahkan');
        return redirect()->back();
    }

    public function penyiasatPindaDaftar(Request $request)
    {
        $projekID = $request->projekID;
        $status = $request->status;

        $projek = Projek::where('id', $projekID)->first();
        $projek->status = 210;
        $projek->tarikh_sah = now();
        $projek->save();

        $projekDetail = $projek->projekdetail;
        $projekDetail->status_id = 210;
        $projekDetail->save();

        Session::flash('success', 'Maklumat Berjaya Disimpan');
        return redirect()->back();
    }

    public function laporanBulanan(Request $request)
    {
        if ($request->ajax()) {

            $staffStatesArr = UserStaff::where('user_id', Auth::user()->id)->get()->pluck('state_id')->toArray();

            $bulananStatusQuery = ProjekBulananStatus::query();

            if ($request->has('status')) {
                $status = $request->status;

                if ($status == 'belum_disahkan') {
                    $bulananStatusQuery->whereIn('status', [2]);

                    $bulananStatusQuery->whereHas('ProjekDetail', function ($query) {
                        $query->whereIn('status_id', [500]);
                    });
                }

                if ($status == 'telah_disahkan') {
                    $bulananStatusQuery->whereIn('status', [509]);
                }

                if ($status == 'penyelia' || $status == 'pengarah') {
                    $bulananStatusQuery->whereIn('status', [2, 509]);

                    $bulananStatusQuery->whereHas('ProjekDetail', function ($query) {
                        $query->whereIn('status_id', [502]);
                    });
                }
            }

            return datatables()->of($bulananStatusQuery->get())
                ->editColumn('no_fail_jas', function ($bulananStatus) {
                    return $bulananStatus->projek ? $bulananStatus->projek->no_fail_jas : '';
                })
                ->editColumn('nama_projek', function ($bulananStatus) {
                    $nama_projek = $bulananStatus->projek ? $bulananStatus->projek->nama_projek : '';
                    return '<span class="ow pull-left">' . $nama_projek . '</span>';
                })
                ->editColumn('tindakan', function ($bulananStatus) {
                    $button = "";

                    if (in_array($bulananStatus->status, [2, 509])) {
                        $button .= '<button onclick="viewProjek(' . $bulananStatus->projek_id . ', ' . $bulananStatus->year . ', ' . $bulananStatus->bulanan . ')" style="margin-bottom:5px;" type="button" class="dt-button  btn btn-default btn-sm" > <i class="far fa-eye text-info"></i> ' . $bulananStatus->year . '-' . $bulananStatus->bulanan . ' </button>';
                    }

                    return $button;
                })
                ->make(true);
        }

        $legendStatuses = MasterFilingStatus::whereIn('id', [2, 500, 502, 509])->get();

        return view('form.PengurusanProjek.laporanBulanan', compact('legendStatuses'));
    }

    public function laporanBulananView(Request $request)
    {
        $id = $request->projekID;

        $year = $request->year;
        $month = $request->month;

        $projek = Projek::where('id', $id)->first();
        $projekDetail = ProjekDetail::where('projek_id', $id)->where('status_id', '!=', 500)->first();
        if ($projekDetail) {
            if (!in_array($projekDetail->status_id, [212, 203, 204])) {
                $projekDetail->status_id = 500;
            }
            $projekDetail->save();
        }

        $projekEMP = ProjekEMP::where('projek_id', $id)->get();
        $projekLdp2m2 = ProjekLDP2M2::where('projek_id', $id)->get();

        $canSubmitMonthlyReport = false;
        $projekFasa = ProjekFasa::where('projek_id', $id)->get();

        $borangA = MonthlyA::where('projek_id', $id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangB = MonthlyB::where('projek_id', $id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangC = MonthlyC::where('projek_id', $id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangD = MonthlyD::where('projek_id', $id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangE = MonthlyE::where('projek_id', $id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangF = MonthlyF::where('projek_id', $id)->where('bulan', $month)->where('tahun', $year)->first();

        $monthlyBSyarats = MonthlyBSyarat::where('monthly_b_id', $borangB->id)->get();
        $projekPengawasans = $projek->pengawasan;

        $elemens = MasterElemenPemeriksaan::get();

        $projekBulananStatus = ProjekBulananStatus::where('projek_id', $projek->id)->where('year', $year)->where('bulanan', $month)->first();

        return view('form.PengurusanProjek.laporanBulananView', compact('year', 'month', 'projek', 'projekDetail', 'borangA', 'borangB', 'borangC', 'borangD', 'borangE', 'borangF', 'projekBulananStatus', 'projekEMP', 'projekLdp2m2', 'monthlyBSyarats', 'projekPengawasans', 'elemens'));
    }

    public function submitQuery(Request $request)
    {
        $projek_id = $request->projek_id;
        $year = $request->year;
        $month = $request->month;
        $form_class = $request->form_class;
        $syarat_b = $request->syarat_b;
        $pengawasan_c = $request->pengawasan_c;
        $elemen_d = $request->elemen_d;
        $kuiri_text = $request->kuiri_text;
        $borangA_id = $request->borangA_id;
        $borangE_id = $request->borangE_id;
        $borangF_id = $request->borangF_id;

        $kuiri = new PengurusanKuiri;
        $kuiri->projek_id = $projek_id;
        $kuiri->year = $year;
        $kuiri->month = $month;
        $kuiri->form_class = $form_class;

        if ($form_class == "A") {
            $kuiri->form_id = $borangA_id;
        }

        if ($form_class == "B") {
            $kuiri->form_id = $syarat_b;
        }

        if ($form_class == "C") {
            $kuiri->form_id = $pengawasan_c;
        }

        if ($form_class == "D") {
            $kuiri->form_id = $elemen_d;
        }

        if ($form_class == "E") {
            $kuiri->form_id = $borangE_id;
        }

        if ($form_class == "F") {
            $kuiri->form_id = $borangF_id;
        }

        $kuiri->kuiri = $kuiri_text;
        $kuiri->kuiri_user_id = Auth::user()->id;
        $kuiri->tarikh_kuiri = now();
        $kuiri->status = 503;
        $kuiri->save();

        ProjekHelper::updateLaporanPemarkahan($projek_id, $year, $month);

        return response()->json($kuiri);
    }

    public function sahkanLaporan(Request $request)
    {
        $FormType = $request->FormType;
        $formID = $request->formID;
        $formModel = null;

        if ($FormType == "App\MonthlyA") {
            $formModel = MonthlyA::where('id', $formID)->first();
        }

        if ($FormType == "App\MonthlyB") {
            $formModel = MonthlyB::where('id', $formID)->first();
        }

        if ($FormType == "App\Models\MonthlyC") {
            $formModel = MonthlyC::where('id', $formID)->first();
        }

        if ($FormType == "App\MonthlyD") {
            $formModel = MonthlyD::where('id', $formID)->first();
        }

        if ($FormType == "App\MonthlyE") {
            $formModel = MonthlyE::where('id', $formID)->first();
        }

        if ($FormType == "App\MonthlyF") {
            $formModel = MonthlyF::where('id', $formID)->first();
        }

        if ($formModel) {
            $formModel->status_id = 5;
            $formModel->save();

            $this->checkAllFormDisahkan($formModel->projek_id, $formModel->tahun, $formModel->bulan);
        }
        return response()->json($formModel);
    }

    public function checkAllFormDisahkan($projek_id, $year, $month)
    {
        $allFormDisahkan = false;

        $projek = Projek::where('id', $projek_id)->first();
        $projekDetail = $projek->projekdetail;

        $projekBulananStatus = ProjekBulananStatus::where('projek_id', $projek_id)->where('year', $year)->where('bulanan', $month)->first();

        $borangA = MonthlyA::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangB = MonthlyB::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangC = MonthlyC::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangD = MonthlyD::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangE = MonthlyE::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();
        $borangF = MonthlyF::where('projek_id', $projek->id)->where('bulan', $month)->where('tahun', $year)->first();

        if ($borangA && $borangB && $borangC && $borangD && $borangE && $borangF) {
            if ($borangA->status_id == 5 && $borangB->status_id == 5 && $borangC->status_id == 5 && $borangD->status_id == 5 && $borangE->status_id == 5 && $borangF->status_id == 5) {

                $projekBulananStatus->status = 509;
                $projekBulananStatus->save();
            }
        }
    }

    public function laporanPemarkahan(Request $request)
    {
        if ($request->ajax()) {

            $pemarkahanQuery = LaporanPermakahanFinal::query();

            return datatables()->of($pemarkahanQuery->get())
                ->editColumn('no_fail_jas', function ($pemarkahanFinal) {
                    return $pemarkahanFinal->projek ? $pemarkahanFinal->projek->no_fail_jas : '';
                })
                ->editColumn('nama_projek', function ($pemarkahanFinal) {
                    $nama_projek = $pemarkahanFinal->projek ? $pemarkahanFinal->projek->nama_projek : '';
                    return "<span class='ow pull-left'> ".$nama_projek." </span>";
                })
                ->editColumn('bulan', function ($pemarkahanFinal) {
                    return $pemarkahanFinal->bulan;
                })
                ->editColumn('tahun', function ($pemarkahanFinal) {
                    return $pemarkahanFinal->tahun;
                })
                ->editColumn('markah', function ($pemarkahanFinal) {
                    return $pemarkahanFinal->getLabelMarkah();
                })
                ->editColumn('tindakan', function ($pemarkahanFinal) {
                    $button = '<button onclick="viewLaporanPemarkahan(' . $pemarkahanFinal->id . ')" style="margin-bottom:5px;" class="dt-button  btn btn-default btn-sm "> <i class="far fa-eye text-info"></i> Lihat&nbsp; </button>';
                    return $button;
                })
                ->make(true);
        }

        return view('form.PengurusanProjek.laporanPemarkahan');
    }

    public function laporanPemarkahanView(Request $request)
    {
        $pemarkahanID = $request->pemarkahanID;

        $pemarkahanFinal = LaporanPermakahanFinal::where('id', $pemarkahanID)->first();
        $projek = $pemarkahanFinal->projek;

        return view('form.PengurusanProjek.laporanPemarkahanView', compact('pemarkahanFinal', 'projek'));
    }

    public function laporanPemarkahanSah(Request $request)
    {
        $pemarkahanID = $request->pemarkahanID;

        $pemarkahanFinal = LaporanPermakahanFinal::where('id', $pemarkahanID)->first();
        $pemarkahanFinal->status_id = 508;
        $pemarkahanFinal->save();

        // $projekBulananStatus = ProjekBulananStatus::where('projek_id', $pemarkahanFinal->projek_id)->where('year', $pemarkahanFinal->tahun)->where('bulanan', $pemarkahanFinal->bulan)->first();
        // $projekBulananStatus->status = 508;
        // $projekBulananStatus->save();

        Session::flash('success', 'Maklumat berjaya disahkan');
        return redirect()->back();
    }

    public function laporanSiasatan(Request $request)
    {
        if ($request->ajax()) {

            $siasatanQuery = LaporanSiasatanFinal::query();
            $siasatanQuery->whereIn('status', [6, 9, 19, 508]);

            if ($request->has('status')) {
                $status = $request->status;
                if ($status == 'belum_disediakan') {
                    $siasatanQuery->whereIn('status', [508]);
                }

                if ($status == 'telah_disediakan') {
                    $siasatanQuery->whereIn('status', [6]);
                }

                if ($status == 'belum_disemak') {
                    $siasatanQuery->whereIn('status', [6]);
                }

                if ($status == 'telah_disemak') {
                    $siasatanQuery->whereIn('status', [9]);
                }

                if ($status == 'belum_diluluskan') {
                    $siasatanQuery->whereIn('status', [9]);
                }

                if ($status == 'telah_diluluskan') {
                    $siasatanQuery->whereIn('status', [19]);
                }
            }

            return datatables()->of($siasatanQuery->get())
                ->editColumn('no_fail_jas', function ($laporanSiasatan) {
                    $no_fail_jas = $laporanSiasatan->projek ? $laporanSiasatan->projek->no_fail_jas : '';
                    return $no_fail_jas;
                })
                ->editColumn('nama_projek', function ($laporanSiasatan) {
                    $nama_projek = $laporanSiasatan->projek ? $laporanSiasatan->projek->nama_projek : '';
                    return "<span class='ow pull-left'>" . $nama_projek . "</span>";
                })
                ->editColumn('bulan', function ($laporanSiasatan) {
                    return $laporanSiasatan ? $laporanSiasatan->bulan : '';
                })
                ->editColumn('tahun', function ($laporanSiasatan) {
                    return $laporanSiasatan ? $laporanSiasatan->tahun : '';
                })
                ->editColumn('status', function ($laporanSiasatan) {
                    $name = $laporanSiasatan->statusFiling ? $laporanSiasatan->statusFiling->name : '';
                    $badge = $laporanSiasatan->statusFiling ? $laporanSiasatan->statusFiling->badge : '';

                    return "<span class='label " . $badge . "'>" . $name . "</span>";
                })
                ->editColumn('tindakan', function ($laporanSiasatan) {
                    $button = "";

                    if (Auth::user()->hasRole('penyiasat') && in_array($laporanSiasatan->status, [508])) {
                        $button = '<button onclick="viewLaporanSiasatan(' . $laporanSiasatan->id . ')" style="margin-bottom:5px;" class="dt-button  btn btn-default btn-sm "> <i class="far fa-eye text-info"></i> Semakan&nbsp; </button>';
                    }

                    if (Auth::user()->hasRole('penyelia') && in_array($laporanSiasatan->status, [6])) {
                        $button = '<button onclick="viewLaporanSiasatan(' . $laporanSiasatan->id . ')" style="margin-bottom:5px;" class="dt-button  btn btn-default btn-sm "> <i class="far fa-eye text-info"></i> Semakan&nbsp; </button>';
                    }

                    if (Auth::user()->hasRole('pengarah') && in_array($laporanSiasatan->status, [9])) {
                        $button = '<button onclick="viewLaporanSiasatan(' . $laporanSiasatan->id . ')" style="margin-bottom:5px;" class="dt-button  btn btn-default btn-sm "> <i class="far fa-eye text-info"></i> Semakan&nbsp; </button>';
                    }

                    if (in_array($laporanSiasatan->status, [19])) {
                        $button = '<button onclick="viewLaporanSiasatan(' . $laporanSiasatan->id . ')" style="margin-bottom:5px;" class="dt-button  btn btn-default btn-sm "> <i class="far fa-eye text-info"></i> Lihat&nbsp; </button>';
                    }

                    return $button;
                })
                ->make(true);
        }

        $legendStatuses = MasterFilingStatus::whereIn('id', [6, 9, 19, 508])->get();

        return view('form.PengurusanProjek.laporanSiasatan', compact('legendStatuses'));
    }

    public function laporanSiasatanView(Request $request)
    {
        $laporanFinalID = $request->laporanFinalID;
        $laporanFinal = LaporanSiasatanFinal::where('id', $laporanFinalID)->first();

        $projek = $laporanFinal->projek;
        $projekDetail = $projek->projekdetail;

        $projekBulanan = ProjekBulananStatus::firstOrCreate(['projek_id' => $laporanFinal->projek_id, 'year' => $laporanFinal->tahun, 'bulanan' => $laporanFinal->bulan]);
        if ($projekBulanan->wasRecentlyCreated) {
            $projekBulanan->status = 500;
        }
        $projekBulanan->save();

        $projekEMP = ProjekEMP::where('projek_id', $projek->id)->first();
        $borangB = MonthlyB::where('projek_id', $projek->id)->where('bulan', $laporanFinal->bulan)->where('tahun', $laporanFinal->tahun)->first();
        $borangE = MonthlyE::where('projek_id', $projek->id)->where('bulan', $laporanFinal->bulan)->where('tahun', $laporanFinal->tahun)->first();

        $distribution = Distribution::where('no_fail_jas', $projek->no_fail_jas)->first();

        return view('form.PengurusanProjek.laporanSiasatanView', compact('projekBulanan', 'projek', 'projekDetail', 'projekEMP', 'distribution', 'borangB', 'borangE', 'laporanFinal'));
    }

    public function laporanSiasatanSah(Request $request)
    {
        $projekBulananID = $request->projekBulananID;
        $dataRole = $request->dataRole;

        $projekBulanan = ProjekBulananStatus::where('id', $projekBulananID)->first();
        $laporanFinal = LaporanSiasatanFinal::where('projek_id', $projekBulanan->projek_id)->where('tahun', $projekBulanan->year)->where('bulan', $projekBulanan->bulanan)->first();

        if ($dataRole == "penyiasat") {
            $penyiasat_comment = "";
            if ($request->has('penyiasat_comment')) {
                $penyiasat_comment = $request->penyiasat_comment;
            }
            $laporanFinal->penyiasat_comment = $penyiasat_comment;

            $wakil_pemaju = "";
            if ($request->has('wakil_pemaju')) {
                $wakil_pemaju = $request->wakil_pemaju;
            }
            $laporanFinal->wakil_pemaju = $wakil_pemaju;

            $in_datetime = null;
            if ($request->has('in_datetime')) {
                $in_datetime = Carbon::createFromFormat('d/m/Y h:i a', $request->in_datetime);
            }

            $laporanFinal->in_datetime = $in_datetime;
            $laporanFinal->out_datetime = now();

            $laporanFinal->penyiasat_id = Auth::user()->id;
            $laporanFinal->penyiasat_approved = now();

            $laporanFinal->status = 6;
        }

        if ($dataRole == "penyelia") {
            $penyelia_comment = "";
            if ($request->has('penyelia_comment')) {
                $penyelia_comment = $request->penyelia_comment;
            }
            $laporanFinal->penyelia_comment = $penyelia_comment;

            $in_datetime = null;
            if ($request->has('in_datetime')) {
                $in_datetime = Carbon::createFromFormat('d/m/Y h:i a', $request->in_datetime);
            }

            $laporanFinal->penyelia_id = Auth::user()->id;
            $laporanFinal->penyelia_approved = now();

            $laporanFinal->status = 9;
        }

        if ($dataRole == "pengarah") {
            $pengarah_comment = "";
            if ($request->has('pengarah_comment')) {
                $pengarah_comment = $request->pengarah_comment;
            }
            $laporanFinal->pengarah_comment = $pengarah_comment;

            $in_datetime = null;
            if ($request->has('in_datetime')) {
                $in_datetime = Carbon::createFromFormat('d/m/Y h:i a', $request->in_datetime);
            }

            $syor = array();
            if ($request->has('syor')) {
                $syor = $request->syor;
            }
            $laporanFinal->syor = json_encode($syor);

            $laporanFinal->pengarah_id = Auth::user()->id;
            $laporanFinal->pengarah_approved = now();

            $laporanFinal->status = 19;
        }

        $projekBulanan->save();
        $laporanFinal->save();

        // $this->checkLaporanSiasatan($projekBulanan->id);

        return response()->json(['projekBulanan' => $projekBulanan, 'laporanFinal' => $laporanFinal]);
    }

    public function checkLaporanSiasatan($projekBulananID)
    {
        $projekBulanan = ProjekBulananStatus::where('id', $projekBulananID)->first();
        $laporanFinal = LaporanSiasatanFinal::where('projek_id', $projekBulanan->projek_id)->where('tahun', $projekBulanan->year)->where('bulan', $projekBulanan->bulanan)->first();

        if ($laporanFinal->penyiasat_id && $laporanFinal->penyelia_id && $laporanFinal->pengarah_id) {
            $laporanFinal->status = 19;
            $laporanFinal->save();
        }

        return response()->json($laporanFinal);
    }

    public function laporanBulananSenarai(Request $request)
    {
        if ($request->ajax()) {

            // $staffStatesArr = UserStaff::where('user_id', Auth::user()->id)->get()->pluck('state_id')->toArray();

            $userProjectArr = ProjekHasUser::where('user_id', Auth::user()->id)->get()->pluck('projek_id')->toArray();
            $projekQuery = Projek::query();

            $projekQuery->whereIn('id', $userProjectArr);

            if ($request->has('status')) {
                $status = $request->status;

                // status to be defibed later
                if ($status == 'belum_dihantar') {
                    $projekQuery->whereHas('bulananStatuses', function ($query) {
                        $query->whereIn('status', [504, 505]);
                    });
                }

                if ($status == 'telah_dihantar') {
                    $projekQuery->whereHas('bulananStatuses', function ($query) {
                        $query->whereIn('status', [504, 505]);
                    });
                }

                if ($status == 'belum_disemak') {
                    $projekQuery->whereHas('bulananStatuses', function ($query) {
                        $query->whereIn('status', [504, 505]);
                    });
                }
            }

            return datatables()->of($projekQuery->get())
                ->editColumn('no_fail_jas', function ($projek) {
                    return $projek->no_fail_jas;
                })
                ->editColumn('nama_projek', function ($projek) {
                    return '<span class="ow pull-left">' . $projek->nama_projek . '</span>';
                })
                ->editColumn('status_laporan', function ($projek) {
                    return "";
                })
                ->editColumn('status_projek', function ($projek) {

                    $projekDetail = $projek->projekdetail;
                    $status = $projekDetail->statusid ? $projekDetail->statusid->name : '';
                    $badge = $projekDetail->statusid ? $projekDetail->statusid->badge : '';

                    return "<span class='label " . $badge . "'>" . $status . "</span>";
                })
                ->editColumn('tindakan', function ($projek) {

                    $button = "";

                    $bulananStatuses = ProjekBulananStatus::where('projek_id', $projek->id)->whereIn('status', [2, 503, 506])->get();

                    foreach ($bulananStatuses as $bulananStatus) {
                        $button .= '<button onclick="viewProjek(' . $projek->id . ', ' . $bulananStatus->year . ', ' . $bulananStatus->bulanan . ')" style="margin-bottom:5px;" type="button" class="dt-button  btn btn-default btn-sm" > <i class="far fa-eye text-info"></i> ' . $bulananStatus->year . '-' . $bulananStatus->bulanan . ' </button>';
                    }

                    return $button;
                })
                ->make(true);
        }
        return view('form.PengurusanProjek.laporanBulananSenarai');
    }
}
