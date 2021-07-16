<?php

namespace App\Http\Controllers;

use App\Distribution;
use App\JasAudit;
use App\JasEmp;
use App\JasFail;
use App\JasFailDetail;
use App\JasFailDetailAktiviti;
use App\JasLdp2m2;
use App\JenisPengawasan;
//use App\LogModel\LogSystem;
use App\Mail\Pengguna\NewProject;
use App\Mail\Pengguna\PengesahanPenggunaPP;
use App\MasterModel\MasterActivity;
use App\MasterModel\MasterCity;
use App\MasterModel\MasterDistrict;
use App\MasterModel\MasterJenisProjek;
use App\MasterModel\MasterMonth;
use App\MasterModel\MasterParameter;
use App\MasterModel\MasterPematuhanEia;
use App\MasterModel\MasterPengawasan;
use App\MasterModel\MasterPeringkatPengawasan;
use App\MasterModel\MasterProjectActivity;
use App\MasterModel\MasterStandard;
use App\MasterModel\MasterStandardBunyi;
use App\MasterModel\MasterState;
use App\MasterModel\MasterStation;
use App\MasterModel\MasterSungai;
use App\MasterModel\MasterTempohAudit;
use App\Models\BacaanCerap;
use App\Models\MonthlyC;
use App\Models\MonthlyCDetail;
use App\Models\Parameter;
use App\MasterModel\MasterFilingStatus;
use App\MonthlyA;
use App\MonthlyB;
use App\MonthlyBSyarat;
use App\MonthlyD;
use App\MonthlyE;
use App\MonthlyF;
use App\OtherModel\Inbox;
use App\PakejHasPengawasan;
use App\ParameterBunyi;
use App\PenambahanParameter;
use App\PenambahanStesen;
use App\PenambahanStesenStatus;
use App\PengawasanHasEmc;
use App\PengawasanHasEo;
use App\LogSystem;
use App\PengurusanKuiri;
use App\Projek;
use App\ProjekAudit;
use App\ProjekBulananStatus;
use App\ProjekDetail;
use App\ProjekEMP;
use App\ProjekFasa;
use App\ProjekHasPp;
use App\ProjekHasUser;
use App\ProjekLDP2M2;
use App\ProjekPakej;
use App\ProjekPengawasan;
use App\ProjekPengawasanLaporan;
use App\Stesen;
use App\StesenPengawasanStatus;
use App\User;
use App\UserPP;
use App\UserEO;
use App\UserEMC;
use App\MonthlyDRainyMain;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Mail;
use Ramsey\Uuid\Uuid;
use App\ProjekHelper;
use Session;
use App\LaporanSiasatanFinal;
use App\MonthlyBSyaratRegister;
use App\MonthlyBSyaratKuiri;
use App\Models\UploadedFile;

class ProjekController extends Controller
{
    protected $request;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function senaraiRekodEkas(Request $request)
    {
        $jasfail = JasFailDetail::query();
        $jasfail = $jasfail->select('jas_fail.id', 'jas_fail.name', 'jas_fail.nofail', 'jas_fail.status', 'jas_fail_detail.jas_fail_id', 'jas_fail_detail.jas_ekas_id', 'jas_fail_detail.negeri', 'jas_fail_detail.daerah')
        ->leftJoin('jas_fail', 'jas_fail_detail.jas_fail_id', '=', 'jas_fail.id')->paginate('10');
        return view('form.PenggunaLuar.rekodEkas', compact('jasfail'));
    }

    public function addProjek(Request $request)
    {

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 2;
        $log->description = "Lihat Maklumat Projek";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        if (Auth::user()->hasRole('pp')) {
            $user = auth()->id();
            $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id', $user)->first();
            $projek_id = $projek->projek_id;

            if ($request->jenis_projek == 1) {
                $ProjekPakej = ProjekPakej::where('projek_id', $projek_id)->where('nama_pakej', 'like', '%Tidak Berpakej / Tidak Berfasa%')->first();

                if ($ProjekPakej == null) {
                    $Projekhaspakej = ProjekPakej::where('projek_id', $projek_id)->delete();
                    $ProjekPakej = new ProjekPakej;
                    $ProjekPakej->nama_pakej = 'Tidak Berpakej / Tidak Berfasa';
                    $ProjekPakej->projek_id = $projek_id;
                }
                $mula = str_replace('/', '-', $request->tarikh_mula);
                $akhir = str_replace('/', '-', $request->tarikh_akhir);
                $datemula = null;
                $dateakhir = null;
                if ($mula) {
                    $datemula = date("Y-m-d", strtotime($mula));
                }

                if ($akhir) {
                    $dateakhir = date("Y-m-d", strtotime($akhir));
                }

                $ProjekPakej->kontraktor = $request->kontraktor;
                $ProjekPakej->pakej_negeri = $request->pakej_negeri;
                $ProjekPakej->alamat = $request->alamat;
                $ProjekPakej->alamat1 = $request->alamat1;
                $ProjekPakej->alamat2 = $request->alamat2;
                $ProjekPakej->tarikh_mula = $datemula;
                $ProjekPakej->tarikh_akhir = $dateakhir;
                $ProjekPakej->save();
            } else {
                $ProjekPakej = ProjekPakej::where('projek_id', $projek_id)->where('nama_pakej', 'like', '%Tidak Berpakej / Tidak Berfasa%')->delete();
            }

            $projekdetail = ProjekDetail::where('projek_id', $projek_id)->first();
            $arrayaktivity = explode(',', $request->aktiviti);
            if ($projekdetail) {
                $projekdetail->aktiviti = json_encode($arrayaktivity);
                $projekdetail->lokasi = $request->lokasi;
                $projekdetail->bandar = $request->bandar;
                $projekdetail->poskod = $request->poskod;
                $projekdetail->alamat_surat = $request->alamat_surat;
                $projekdetail->alamat_surat1 = $request->alamat_surat1;
                $projekdetail->alamat_surat2 = $request->alamat_surat2;
                $projekdetail->surat_negeri = $request->surat_negeri;
                $projekdetail->surat_daerah = $request->surat_daerah;
                $projekdetail->surat_bandar = $request->surat_bandar;
                $projekdetail->surat_poskod = $request->surat_poskod;
                $projekdetail->jenis_projek = $request->jenis_projek;
                $projekdetail->other_aktiviti = $request->other_aktiviti;
                $projekdetail->laporaneia = $request->laporaneia;
                $projekdetail->peringkat_audit = $request->peringkat_audit;
                $currentjenis = $projekdetail->jenis;
                $projekdetail->jenis = $request->jenis;
                $projekdetail->save();

                if ($currentjenis != $request->jenis) {
                    if ($projekdetail->jenis) {
                        $projekAuditcount = ProjekAudit::where('projek_id', $projek_id)->count();
                        if ($request->jenis == 1) {
                            $projekAuditcount = ProjekAudit::where('projek_id', $projek_id)->delete();
                            $projekAudit = new ProjekAudit();
                            $projekAudit->projek_id = $projek_id;
                            $projekAudit->save();

                        } else if ($request->jenis == 2) {
                            $projekAuditcount = ProjekAudit::where('projek_id', $projek_id)->delete();
                            $i = 0;
                            for ($i = 0; $i < 2; $i++) {
                                $projekAudit = new ProjekAudit();
                                $projekAudit->projek_id = $projek_id;
                                $projekAudit->save();

                            }
                        } else if ($request->jenis == 3) {
                            $projekAuditcount = ProjekAudit::where('projek_id', $projek_id)->delete();
                            $i = 0;
                            for ($i = 0; $i < 3; $i++) {
                                $projekAudit = new ProjekAudit();
                                $projekAudit->projek_id = $projek_id;
                                $projekAudit->save();

                            }
                        } else if ($request->jenis == 4) {
                            $projekAuditcount = ProjekAudit::where('projek_id', $projek_id)->delete();
                            $i = 0;
                            for ($i = 0; $i < 4; $i++) {
                                $projekAudit = new ProjekAudit();
                                $projekAudit->projek_id = $projek_id;
                                $projekAudit->save();

                            }
                        } else if ($request->jenis == 5) {
                            $projekAuditcount = ProjekAudit::where('projek_id', $projek_id)->delete();
                            $i = 0;
                            for ($i = 0; $i < 12; $i++) {
                                $projekAudit = new ProjekAudit();
                                $projekAudit->projek_id = $projek_id;
                                $projekAudit->save();

                            }
                        } else {
                            $projekAuditcount = ProjekAudit::where('projek_id', $projek_id)->delete();
                        }

                    } else {
                        $projekAudit = ProjekAudit::where('projek_id', $projek_id)->delete();
                    }
                }

                $countFasa = ProjekFasa::where('projek_id', $request->projek_id)->count();

                if ($request->bilangan_fasa > $countFasa) { //jika fasa da ada dan bilangan stesen lebih bsar.akan tambah stesen

                    $addcolumn = $request->bilangan_fasa - $countFasa;
                    $i = 0;
                    for ($i = 0; $i < $addcolumn; $i++) {
                        $fasa = new ProjekFasa();
                        $fasa->projek_id = $request->projek_id;
                        $fasa->save();
                    }
                } else { //jika sama atau kurang bilangan fasa.dia akan delete kalau kurang dan maintain klau sama

                    $addcolumn = $countFasa - $request->bilangan_fasa;
                    $stesen = ProjekFasa::where('projek_id', $request->projek_id)->orderBy('id', 'desc')->take($addcolumn)->delete();
                }

            }

            if ($request->jenis_projek) {
                $jenis = $request->jenis_projek;
            } else {
                $jenis = 0;
            }
            if ($request->ajax()) {
                return response()->json(['status' => 'ok', 'jenis' => $jenis]);
            } else {
                return redirect()->back()->with('jenis', $jenis);
            }
        }
    }

    public function jenis_pakej_eo(Request $request)
    {

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 2;
        $log->description = "Lihat Maklumat Pakej EO";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $PakejPengawasan = PakejHasPengawasan::where('pakej_id', $request->myPakej)->get();
        $PengawasanHasEo = PengawasanHasEo::where('pakej', $request->myPakej)->where('user_id', $request->eo)->first();
        if (!$PengawasanHasEo) {
            if ($request->eo != null) {
                if ($PengawasanHasEo == null) {
                    $PengawasanHasEo = new PengawasanHasEo();
                    $PengawasanHasEo->pakej = $request->myPakej;
                    $PengawasanHasEo->user_id = $request->eo;
                    $PengawasanHasEo->save();

                    return response()->json(['pengawasan' => $request->pengawasan_id]);
                }
            }
        }
    }

    public function getApi(Request $request)
    {
        $ind = 'sini';

        return response()->json([$ind]);
    }

    public function jenis_pakej_emc(Request $request)
    {

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 2;
        $log->description = "Lihat Maklumat Pakej EMC";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        if ($request->emc != null) {
            $PakejPengawasan = PakejHasPengawasan::where('pakej_id', $request->myPakej)->where('pengawasan_id', $request->pengawasan_id)->first();

            $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id', $PakejPengawasan->id)->where('user_id', $request->emc)->first();
            if ($PengawasanHasEmc == null) {
                $PengawasanHasEmc = new PengawasanHasEmc();
                $PengawasanHasEmc->pakej_has_pengawasan_id = $PakejPengawasan->id;
                $PengawasanHasEmc->user_id = $request->emc;
                $PengawasanHasEmc->save();

                return response()->json(['pengawasan' => $request->pengawasan_id]);
            }
        }
    }

    public function jenis_pakej(Request $request)
    {
        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 2;
        $log->description = "Lihat Jenis Pakej";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $PengawasanArray = $request->pakej_pengawasan_id;
        if ($PengawasanArray == null) {
            $PakejPengawasan = PakejHasPengawasan::where('pakej_id', $request->myPakej)->where('status', 1)->first();
            $PakejPengawasan->status = 0;
            $PakejPengawasan->save();
        } else {
            $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id', $request->myPakej)->get();
            foreach ($PakejHasPengawasan as $PakejHasPengawasans) {
                if (!in_array($PakejHasPengawasans->pengawasan_id, $PengawasanArray)) {
                    $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id', $request->myPakej)->where('pengawasan_id', $PakejHasPengawasans->pengawasan_id)->first();
                    $PakejHasPengawasan->status = 0;
                    $PakejHasPengawasan->save();
                }
            }

            $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id', $request->myPakej)->get();
            foreach ($PengawasanArray as $PengawasanArrays) {
                $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id', $request->myPakej)->where('pengawasan_id', $PengawasanArrays)->first();
                if ($PakejHasPengawasan) {
                    $PakejHasPengawasan->status = 1;
                    $PakejHasPengawasan->save();
                } else {
                    $PakejHasPengawasan->status = 1;
                    $PakejHasPengawasan->save();
                }
            }
        }
        return response()->json(['pakejid' => $request->myPakej]);
    }

    public function fasa(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama_pakej' => 'required|string',
            'kontraktor' => 'required',
            'alamat' => 'required',
            'tarikh_mula_fasa' => 'required',
            'tarikh_akhir_fasa' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 4;
        $log->description = "Tambah Data Maklumat Pakej";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user = auth()->id();
        $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id', $user)->first();
        $projek_id = $projek->projek_id;

        $pakej->projek_id = $projek_id;
        $pakej->nama_pakej = $request->nama_pakej;
        $pakej->kontraktor = $request->kontraktor;
        $pakej->pakej_negeri = $request->pakej_negeri;
        $pakej->alamat = $request->alamat;
        $pakej->alamat1 = $request->alamat1;
        $pakej->alamat2 = $request->alamat2;

        $date1 = strtr($request->tarikh_mula_fasa, '/', '-');
        $tarikh_mula_fasa = date("Y-m-d", strtotime($date1));
        $pakej->tarikh_mula = $tarikh_mula_fasa;

        $date2 = strtr($request->tarikh_akhir_fasa, '/', '-');
        $tarikh_akhir_fasa = date("Y-m-d", strtotime($date2));
        $pakej->tarikh_akhir = $tarikh_akhir_fasa;
        $pakej->save();

        foreach ($request->pengawasan as $awas) {
            $PakejHasPengawasan = new PakejHasPengawasan;
            $PakejHasPengawasan->pakej_id = $pakej->id;
            $PakejHasPengawasan->pengawasan_id = $awas;
            $PakejHasPengawasan->save();
        }

        $state = MasterState::all();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Sila teruskan kemaskini Pengawasan Pakej.', 'state' => $state]);
    }

    public function pakej(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama_pakej' => 'required|string',
            'kontraktor' => 'required',
            'alamat' => 'required',
            'tarikh_mula' => 'required',
            'tarikh_akhir' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 4;
        $log->description = "Tambah Data Maklumat Pakej";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user = auth()->id();
        $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id', $user)->first();
        $projek_id = $projek->projek_id;

        $pakej->projek_id = $projek_id;
        $pakej->nama_pakej = $request->nama_pakej;
        $pakej->kontraktor = $request->kontraktor;
        $pakej->pakej_negeri = $request->pakej_negeri;
        $pakej->alamat = $request->alamat;
        $pakej->alamat1 = $request->alamat1;
        $pakej->alamat2 = $request->alamat2;

        $date1 = strtr($request->tarikh_mula, '/', '-');
        $tarikh_mula = date("Y-m-d", strtotime($date1));
        $pakej->tarikh_mula = $tarikh_mula;

        $date2 = strtr($request->tarikh_akhir, '/', '-');
        $tarikh_akhir = date("Y-m-d", strtotime($date2));
        $pakej->tarikh_akhir = $tarikh_akhir;
        $pakej->save();

        $pengawasan = MasterPengawasan::all();
        foreach ($pengawasan as $pengawasans) {
            $PakejHasPengawasan = new PakejHasPengawasan();
            $PakejHasPengawasan->pakej_id = $pakej->id;
            $PakejHasPengawasan->pengawasan_id = $pengawasans->id;
            $PakejHasPengawasan->save();
        }

        $state = MasterState::all();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Sila teruskan kemaskini Pengawasan Pakej.', 'state' => $state]);
    }

    public function pendaftaraneoemc(Request $request)
    {

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 4;
        $log->description = "Pendaftaran Pengawasan EO & EMC ";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $data = array();
        for ($i = 0; $i < count($request->pakej_pengawasan_id); $i++) {
            array_push($data, array(
                'pengawasan_id' => $request->pakej_pengawasan_id[$i],
                'user_id_eo' => $request->user_eo[$i],
                'user_id_emc' => $request->user_emc[$i],
                'pakej_id' => $request->pakej_id[$i],
            ));
        }

        foreach ($data as $maklumat) {
            $pengawasanhaseo = new PengawasanHasEo;
            $pengawasanhaseo->pakej_has_pengawasan_id = $maklumat['pengawasan_id'];
            $pengawasanhaseo->pakej = $maklumat['pakej_id'];
            $pengawasanhaseo->user_id = $maklumat['user_id_eo'];
            $pengawasanhaseo->save();

            $pengawasanhasemc = new PengawasanHasEmc;
            $pengawasanhasemc->pakej_has_pengawasan_id = $maklumat['pengawasan_id'];
            $pengawasanhasemc->user_id = $maklumat['user_id_eo'];
            $pengawasanhasemc->save();
        }

        return response()->json(['status' => 'Maklumat berjaya disimpan']);

    }

    public function pakejupdate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama_pakej' => 'required|string',
            'kontraktor' => 'required',
            'alamat' => 'required',
            'tarikh_mula' => 'required',
            'tarikh_akhir' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 4;
        $log->description = "Kemaskini Data Maklumat Pakej";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user = auth()->id();
        $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id', $user)->first();
        $projek_id = $projek->projek_id;

        $pakej = ProjekPakej::where('id', $request->id)->first();
        $pakej->projek_id = $projek_id;
        $pakej->nama_pakej = $request->nama_pakej;
        $pakej->kontraktor = $request->kontraktor;
        $pakej->pakej_negeri = $request->pakej_negeri;
        $pakej->alamat = $request->alamat;
        $pakej->alamat1 = $request->alamat1;
        $pakej->alamat2 = $request->alamat2;

        $date1 = strtr($request->tarikh_mula, '/', '-');
        $tarikh_mula = date("Y-m-d", strtotime($date1));
        $pakej->tarikh_mula = $tarikh_mula;

        $date2 = strtr($request->tarikh_akhir, '/', '-');
        $tarikh_akhir = date("Y-m-d", strtotime($date2));
        $pakej->tarikh_akhir = $tarikh_akhir;
        $pakej->save();

        $state = MasterState::all();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Maklumat pakej/fasa telah dikemaskini.', 'state' => $state]);
    }

    public function pakejeoemc(Request $request)
    {
        $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id', $id)->where('status', 1)->get();

        foreach ($PakejHasPengawasan as $PakejHasPengawasanvalue) {
            $pakejemc = PengawasanHasEmc::where('pakej_has_pengawasan_id', $PakejHasPengawasanvalue->id)->first();
            $pakejeo = PengawasanHasEo::where('pakej_has_pengawasan_id', $PakejHasPengawasanvalue->id)->first();
            if ($pakejemc) {
                $pakejuser[] = $pakejemc->user_id . ' emc';
            } else {
                $pakejuser[] = 'tiada';
            }

            if ($pakejeo) {
                $pakejuser[] = $pakejeo->user_id . ' eo';
            } else {
                $pakejuser[] = 'tiada';
            }
        }

        foreach ($pakejuser as $value) {
            if ($value == 'tiada') {
                return response()->json(['status1' => 'error', 'title' => '', 'message' => 'Pastikan anda sudah lengkap lantik EO dan EMC bagi setiap pengawasan.', 'status' => '']);
            }
        }

        return response()->json(['status' => 'ok']);
    }

    public function eotable(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEo = PengawasanHasEo::where('pakej', $request->id)->get();
            } else {
                $PengawasanHasEo = [];
            }
            return datatables()->of($PengawasanHasEo)
            ->editColumn('name', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->name . '<br><small style="font-size: smaller;">' . $PengawasanHasEo->user->email . '</small>';

            })
            ->editColumn('username', function ($PengawasanHasEo) {
                return '<span class="label label-default">' . $PengawasanHasEo->user->username . '</span>';
            })
            ->editColumn('created_at', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
            })
            ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->no_kompetensi;
                } else {
                    return '';
                }

            })
            ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
                } else {
                    return '';
                }

            })
            ->editColumn('status.name', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEo->user->status->name . '</span>';
                }

                if ($PengawasanHasEo->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEo->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEo->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEo) {
                $button = "";
                $projekpakej = ProjekPakej::where('id', $PengawasanHasEo->pakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeeo(' . $PengawasanHasEo->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function eotable1(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 1)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEo = [];
            }
            return datatables()->of($PengawasanHasEo)
            ->editColumn('name', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->name . '<br><small style="font-size: smaller;">' . $PengawasanHasEo->user->email . '</small>';

            })
            ->editColumn('username', function ($PengawasanHasEo) {
                return '<span class="label label-default">' . $PengawasanHasEo->user->username . '</span>';
            })
            ->editColumn('created_at', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
            })
            ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->no_kompetensi;
                } else {
                    return '';
                }

            })
            ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
                } else {
                    return '';
                }

            })
            ->editColumn('status.name', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEo->user->status->name . '</span>';
                }

                if ($PengawasanHasEo->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEo->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEo->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEo) {
                $button = "";
                $projekpakej = ProjekPakej::where('id', $PengawasanHasEo->pakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeeo(' . $PengawasanHasEo->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }

                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function eotable2(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 2)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEo = [];
            }

            return datatables()->of($PengawasanHasEo)
            ->editColumn('name', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->name . '<br><small style="font-size: smaller;">' . $PengawasanHasEo->user->email . '</small>';

            })
            ->editColumn('username', function ($PengawasanHasEo) {
                return '<span class="label label-default">' . $PengawasanHasEo->user->username . '</span>';
            })
            ->editColumn('created_at', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
            })
            ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->no_kompetensi;
                } else {
                    return '';
                }

            })
            ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
                } else {
                    return '';
                }

            })
            ->editColumn('status.name', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEo->user->status->name . '</span>';
                }

                if ($PengawasanHasEo->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEo->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEo->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEo) {
                $button = "";
                $projekpakej = ProjekPakej::where('id', $PengawasanHasEo->pakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeeo(' . $PengawasanHasEo->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function eotable3(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 3)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEo = [];
            }

            return datatables()->of($PengawasanHasEo)
            ->editColumn('name', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->name . '<br><small style="font-size: smaller;">' . $PengawasanHasEo->user->email . '</small>';

            })
            ->editColumn('username', function ($PengawasanHasEo) {
                return '<span class="label label-default">' . $PengawasanHasEo->user->username . '</span>';
            })
            ->editColumn('created_at', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
            })
            ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->no_kompetensi;
                } else {
                    return '';
                }

            })
            ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
                } else {
                    return '';
                }

            })
            ->editColumn('status.name', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEo->user->status->name . '</span>';
                }

                if ($PengawasanHasEo->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEo->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEo->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEo) {
                $button = "";
                $projekpakej = ProjekPakej::where('id', $PengawasanHasEo->pakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeeo(' . $PengawasanHasEo->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function eotable4(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 4)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEo = [];
            }
            return datatables()->of($PengawasanHasEo)
            ->editColumn('name', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->name . '<br><small style="font-size: smaller;">' . $PengawasanHasEo->user->email . '</small>';

            })
            ->editColumn('username', function ($PengawasanHasEo) {
                return '<span class="label label-default">' . $PengawasanHasEo->user->username . '</span>';
            })
            ->editColumn('created_at', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
            })
            ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->no_kompetensi;
                } else {
                    return '';
                }

            })
            ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
                } else {
                    return '';
                }

            })
            ->editColumn('status.name', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEo->user->status->name . '</span>';
                }

                if ($PengawasanHasEo->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEo->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEo->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEo) {
                $button = "";
                $projekpakej = ProjekPakej::where('id', $PengawasanHasEo->pakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeeo(' . $PengawasanHasEo->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function eotable5(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 5)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEo = [];
            }

            return datatables()->of($PengawasanHasEo)
            ->editColumn('name', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->name . '<br><small style="font-size: smaller;">' . $PengawasanHasEo->user->email . '</small>';

            })
            ->editColumn('username', function ($PengawasanHasEo) {
                return '<span class="label label-default">' . $PengawasanHasEo->user->username . '</span>';
            })
            ->editColumn('created_at', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
            })
            ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->no_kompetensi;
                } else {
                    return '';
                }

            })
            ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
                } else {
                    return '';
                }

            })
            ->editColumn('status.name', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEo->user->status->name . '</span>';
                }

                if ($PengawasanHasEo->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEo->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEo->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEo) {
                $button = "";
                $projekpakej = ProjekPakej::where('id', $PengawasanHasEo->pakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeeo(' . $PengawasanHasEo->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function eotable6(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 6)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEo = [];
            }

            return datatables()->of($PengawasanHasEo)
            ->editColumn('name', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->name . '<br><small style="font-size: smaller;">' . $PengawasanHasEo->user->email . '</small>';

            })
            ->editColumn('username', function ($PengawasanHasEo) {
                return '<span class="label label-default">' . $PengawasanHasEo->user->username . '</span>';
            })
            ->editColumn('created_at', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
            })
            ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->no_kompetensi;
                } else {
                    return '';
                }

            })
            ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
                } else {
                    return '';
                }

            })
            ->editColumn('status.name', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEo->user->status->name . '</span>';
                }

                if ($PengawasanHasEo->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEo->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEo->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEo) {
                $button = "";
                $projekpakej = ProjekPakej::where('id', $PengawasanHasEo->pakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeeo(' . $PengawasanHasEo->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function eotable7(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 7)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEo = [];
            }

            return datatables()->of($PengawasanHasEo)
            ->editColumn('name', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->name . '<br><small style="font-size: smaller;">' . $PengawasanHasEo->user->email . '</small>';

            })
            ->editColumn('username', function ($PengawasanHasEo) {
                return '<span class="label label-default">' . $PengawasanHasEo->user->username . '</span>';
            })
            ->editColumn('created_at', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
            })
            ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->no_kompetensi;
                } else {
                    return '';
                }

            })
            ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
                } else {
                    return '';
                }

            })
            ->editColumn('status.name', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEo->user->status->name . '</span>';
                }

                if ($PengawasanHasEo->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEo->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEo->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEo) {
                $button = "";
                $projekpakej = ProjekPakej::where('id', $PengawasanHasEo->pakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeeo(' . $PengawasanHasEo->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function eotable8(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 8)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEo = [];
            }

            return datatables()->of($PengawasanHasEo)
            ->editColumn('name', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->name . '<br><small style="font-size: smaller;">' . $PengawasanHasEo->user->email . '</small>';

            })
            ->editColumn('username', function ($PengawasanHasEo) {
                return '<span class="label label-default">' . $PengawasanHasEo->user->username . '</span>';
            })
            ->editColumn('created_at', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
            })
            ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->no_kompetensi;
                } else {
                    return '';
                }

            })
            ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
                } else {
                    return '';
                }

            })
            ->editColumn('status.name', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEo->user->status->name . '</span>';
                }

                if ($PengawasanHasEo->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEo->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEo->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEo) {
                $button = "";
                $projekpakej = ProjekPakej::where('id', $PengawasanHasEo->pakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeeo(' . $PengawasanHasEo->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function eotable9(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 9)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEo = PengawasanHasEo::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEo = [];
            }

            return datatables()->of($PengawasanHasEo)
            ->editColumn('name', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->name . '<br><small style="font-size: smaller;">' . $PengawasanHasEo->user->email . '</small>';

            })
            ->editColumn('username', function ($PengawasanHasEo) {
                return '<span class="label label-default">' . $PengawasanHasEo->user->username . '</span>';
            })
            ->editColumn('created_at', function ($PengawasanHasEo) {
                return $PengawasanHasEo->user->created_at ? date('d/m/Y', strtotime($PengawasanHasEo->user->created_at)) : date('d/m/Y');
            })
            ->editColumn('entity_eo.no_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->no_kompetensi;
                } else {
                    return '';
                }

            })
            ->editColumn('entity_eo.date_kompetensi', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->entity_eo) {
                    return $PengawasanHasEo->user->entity_eo->date_kompetensi ? date('d/m/Y', strtotime($PengawasanHasEo->user->entity_eo->date_kompetensi)) : date('d/m/Y');
                } else {
                    return '';
                }

            })
            ->editColumn('status.name', function ($PengawasanHasEo) {
                if ($PengawasanHasEo->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEo->user->status->name . '</span>';
                }

                if ($PengawasanHasEo->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEo->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEo->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEo) {
                $button = "";
                $projekpakej = ProjekPakej::where('id', $PengawasanHasEo->pakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeeo(' . $PengawasanHasEo->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function usereodelete($id)
    {
        $PengawasanHasEo = PengawasanHasEo::where('id', $id)->first();
        if ($PengawasanHasEo->delete()) {
            return response()->json();
        }
    }

    public function emctable1(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 1)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEmc = [];
            }
            return datatables()->of($PengawasanHasEmc)
            ->editColumn('name', function ($PengawasanHasEmc) {

                return $PengawasanHasEmc->user->name . '<br><small style="text-transform: none !important;">' . $PengawasanHasEmc->user->email . '</small>';
            })
            ->editColumn('username', function ($PengawasanHasEmc) {
                return '<span class="label label-default">' . $PengawasanHasEmc->user->username . '</span>';
            })
            ->editColumn('syarikat', function ($PengawasanHasEmc) {
                return $PengawasanHasEmc->user->entity_emc->syarikat;
            })
            ->editColumn('detail', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->fax != null || $PengawasanHasEmc->user->phone != null) {
                    $seperate = '';
                    $seperate2 = '';
                    $faks = '';
                    $phone = '';
                    if ($PengawasanHasEmc->user->fax != null) {
                        $faks = '<b>No Faks : </b>';
                        $seperate = '<br>';
                    }
                    if ($PengawasanHasEmc->user->phone != null) {
                        $phone = '<b>No Tel : </b>';
                    }
                    return $faks . $PengawasanHasEmc->user->fax . $seperate . $phone . $PengawasanHasEmc->user->phone;
                } else {
                    return '-';
                }
            })
            ->editColumn('status.name', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

                if ($PengawasanHasEmc->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEmc->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEmc) {
                $button = "";
                $pengawasanpakej = PakejHasPengawasan::where('id', $PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
                $projekpakej = ProjekPakej::where('id', $pengawasanpakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeemc(' . $PengawasanHasEmc->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function emctable2(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 2)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEmc = [];
            }
            return datatables()->of($PengawasanHasEmc)
            ->editColumn('name', function ($PengawasanHasEmc) {

                return $PengawasanHasEmc->user->name . '<br><small style="text-transform: none !important;">' . $PengawasanHasEmc->user->email . '</small>';
            })
            ->editColumn('username', function ($PengawasanHasEmc) {
                return '<span class="label label-default">' . $PengawasanHasEmc->user->username . '</span>';
            })
            ->editColumn('syarikat', function ($PengawasanHasEmc) {
                return $PengawasanHasEmc->user->entity_emc->syarikat;
            })
            ->editColumn('detail', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->fax != null || $PengawasanHasEmc->user->phone != null) {
                    $seperate = '';
                    $seperate2 = '';
                    $faks = '';
                    $phone = '';
                    if ($PengawasanHasEmc->user->fax != null) {
                        $faks = '<b>No Faks : </b>';
                        $seperate = '<br>';
                    }
                    if ($PengawasanHasEmc->user->phone != null) {
                        $phone = '<b>No Tel : </b>';
                    }
                    return $faks . $PengawasanHasEmc->user->fax . $seperate . $phone . $PengawasanHasEmc->user->phone;
                } else {
                    return '-';
                }
            })
            ->editColumn('status.name', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

                if ($PengawasanHasEmc->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEmc->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEmc) {
                $button = "";
                $pengawasanpakej = PakejHasPengawasan::where('id', $PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
                $projekpakej = ProjekPakej::where('id', $pengawasanpakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeemc(' . $PengawasanHasEmc->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function emctable3(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 3)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEmc = [];
            }
            return datatables()->of($PengawasanHasEmc)
            ->editColumn('name', function ($PengawasanHasEmc) {

                return $PengawasanHasEmc->user->name . '<br><small style="text-transform: none !important;">' . $PengawasanHasEmc->user->email . '</small>';
            })
            ->editColumn('username', function ($PengawasanHasEmc) {
                return '<span class="label label-default">' . $PengawasanHasEmc->user->username . '</span>';
            })
            ->editColumn('syarikat', function ($PengawasanHasEmc) {
                return $PengawasanHasEmc->user->entity_emc->syarikat;
            })
            ->editColumn('detail', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->fax != null || $PengawasanHasEmc->user->phone != null) {
                    $seperate = '';
                    $seperate2 = '';
                    $faks = '';
                    $phone = '';
                    if ($PengawasanHasEmc->user->fax != null) {
                        $faks = '<b>No Faks : </b>';
                        $seperate = '<br>';
                    }
                    if ($PengawasanHasEmc->user->phone != null) {
                        $phone = '<b>No Tel : </b>';
                    }
                    return $faks . $PengawasanHasEmc->user->fax . $seperate . $phone . $PengawasanHasEmc->user->phone;
                } else {
                    return '-';
                }
            })
            ->editColumn('status.name', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

                if ($PengawasanHasEmc->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEmc->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEmc) {
                $button = "";
                $pengawasanpakej = PakejHasPengawasan::where('id', $PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
                $projekpakej = ProjekPakej::where('id', $pengawasanpakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeemc(' . $PengawasanHasEmc->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function emctable4(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 4)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEmc = [];
            }
            return datatables()->of($PengawasanHasEmc)
            ->editColumn('name', function ($PengawasanHasEmc) {

                return $PengawasanHasEmc->user->name . '<br><small style="text-transform: none !important;">' . $PengawasanHasEmc->user->email . '</small>';
            })
            ->editColumn('username', function ($PengawasanHasEmc) {
                return '<span class="label label-default">' . $PengawasanHasEmc->user->username . '</span>';
            })
            ->editColumn('syarikat', function ($PengawasanHasEmc) {
                return $PengawasanHasEmc->user->entity_emc->syarikat;
            })
            ->editColumn('detail', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->fax != null || $PengawasanHasEmc->user->phone != null) {
                    $seperate = '';
                    $seperate2 = '';
                    $faks = '';
                    $phone = '';
                    if ($PengawasanHasEmc->user->fax != null) {
                        $faks = '<b>No Faks : </b>';
                        $seperate = '<br>';
                    }
                    if ($PengawasanHasEmc->user->phone != null) {
                        $phone = '<b>No Tel : </b>';
                    }
                    return $faks . $PengawasanHasEmc->user->fax . $seperate . $phone . $PengawasanHasEmc->user->phone;
                } else {
                    return '-';
                }
            })
            ->editColumn('status.name', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

                if ($PengawasanHasEmc->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEmc->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEmc) {
                $button = "";
                $pengawasanpakej = PakejHasPengawasan::where('id', $PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
                $projekpakej = ProjekPakej::where('id', $pengawasanpakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeemc(' . $PengawasanHasEmc->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function emctable5(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 5)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEmc = [];
            }
            return datatables()->of($PengawasanHasEmc)
            ->editColumn('name', function ($PengawasanHasEmc) {

                return $PengawasanHasEmc->user->name . '<br><small style="text-transform: none !important;">' . $PengawasanHasEmc->user->email . '</small>';
            })
            ->editColumn('username', function ($PengawasanHasEmc) {
                return '<span class="label label-default">' . $PengawasanHasEmc->user->username . '</span>';
            })
            ->editColumn('syarikat', function ($PengawasanHasEmc) {
                return $PengawasanHasEmc->user->entity_emc->syarikat;
            })
            ->editColumn('detail', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->fax != null || $PengawasanHasEmc->user->phone != null) {
                    $seperate = '';
                    $seperate2 = '';
                    $faks = '';
                    $phone = '';
                    if ($PengawasanHasEmc->user->fax != null) {
                        $faks = '<b>No Faks : </b>';
                        $seperate = '<br>';
                    }
                    if ($PengawasanHasEmc->user->phone != null) {
                        $phone = '<b>No Tel : </b>';
                    }
                    return $faks . $PengawasanHasEmc->user->fax . $seperate . $phone . $PengawasanHasEmc->user->phone;
                } else {
                    return '-';
                }
            })
            ->editColumn('status.name', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

                if ($PengawasanHasEmc->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEmc->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEmc) {
                $button = "";
                $pengawasanpakej = PakejHasPengawasan::where('id', $PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
                $projekpakej = ProjekPakej::where('id', $pengawasanpakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeemc(' . $PengawasanHasEmc->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function emctable6(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 6)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEmc = [];
            }
            return datatables()->of($PengawasanHasEmc)
            ->editColumn('name', function ($PengawasanHasEmc) {

                return $PengawasanHasEmc->user->name . '<br><small style="text-transform: none !important;">' . $PengawasanHasEmc->user->email . '</small>';
            })
            ->editColumn('username', function ($PengawasanHasEmc) {
                return '<span class="label label-default">' . $PengawasanHasEmc->user->username . '</span>';
            })
            ->editColumn('syarikat', function ($PengawasanHasEmc) {
                return $PengawasanHasEmc->user->entity_emc->syarikat;
            })
            ->editColumn('detail', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->fax != null || $PengawasanHasEmc->user->phone != null) {
                    $seperate = '';
                    $seperate2 = '';
                    $faks = '';
                    $phone = '';
                    if ($PengawasanHasEmc->user->fax != null) {
                        $faks = '<b>No Faks : </b>';
                        $seperate = '<br>';
                    }
                    if ($PengawasanHasEmc->user->phone != null) {
                        $phone = '<b>No Tel : </b>';
                    }
                    return $faks . $PengawasanHasEmc->user->fax . $seperate . $phone . $PengawasanHasEmc->user->phone;
                } else {
                    return '-';
                }
            })
            ->editColumn('status.name', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

                if ($PengawasanHasEmc->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEmc->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEmc) {
                $button = "";
                $pengawasanpakej = PakejHasPengawasan::where('id', $PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
                $projekpakej = ProjekPakej::where('id', $pengawasanpakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeemc(' . $PengawasanHasEmc->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function emctable7(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 7)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEmc = [];
            }
            return datatables()->of($PengawasanHasEmc)
            ->editColumn('name', function ($PengawasanHasEmc) {

                return $PengawasanHasEmc->user->name . '<br><small style="text-transform: none !important;">' . $PengawasanHasEmc->user->email . '</small>';
            })
            ->editColumn('username', function ($PengawasanHasEmc) {
                return '<span class="label label-default">' . $PengawasanHasEmc->user->username . '</span>';
            })
            ->editColumn('syarikat', function ($PengawasanHasEmc) {
                return $PengawasanHasEmc->user->entity_emc->syarikat;
            })
            ->editColumn('detail', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->fax != null || $PengawasanHasEmc->user->phone != null) {
                    $seperate = '';
                    $seperate2 = '';
                    $faks = '';
                    $phone = '';
                    if ($PengawasanHasEmc->user->fax != null) {
                        $faks = '<b>No Faks : </b>';
                        $seperate = '<br>';
                    }
                    if ($PengawasanHasEmc->user->phone != null) {
                        $phone = '<b>No Tel : </b>';
                    }
                    return $faks . $PengawasanHasEmc->user->fax . $seperate . $phone . $PengawasanHasEmc->user->phone;
                } else {
                    return '-';
                }
            })
            ->editColumn('status.name', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

                if ($PengawasanHasEmc->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEmc->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEmc) {
                $button = "";
                $pengawasanpakej = PakejHasPengawasan::where('id', $PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
                $projekpakej = ProjekPakej::where('id', $pengawasanpakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeemc(' . $PengawasanHasEmc->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function emctable8(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 8)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEmc = [];
            }

            return datatables()->of($PengawasanHasEmc)
            ->editColumn('name', function ($PengawasanHasEmc) {

                return $PengawasanHasEmc->user->name . '<br><small style="text-transform: none !important;">' . $PengawasanHasEmc->user->email . '</small>';
            })
            ->editColumn('username', function ($PengawasanHasEmc) {
                return '<span class="label label-default">' . $PengawasanHasEmc->user->username . '</span>';
            })
            ->editColumn('syarikat', function ($PengawasanHasEmc) {
                return $PengawasanHasEmc->user->entity_emc->syarikat;
            })
            ->editColumn('detail', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->fax != null || $PengawasanHasEmc->user->phone != null) {
                    $seperate = '';
                    $seperate2 = '';
                    $faks = '';
                    $phone = '';
                    if ($PengawasanHasEmc->user->fax != null) {
                        $faks = '<b>No Faks : </b>';
                        $seperate = '<br>';
                    }
                    if ($PengawasanHasEmc->user->phone != null) {
                        $phone = '<b>No Tel : </b>';
                    }
                    return $faks . $PengawasanHasEmc->user->fax . $seperate . $phone . $PengawasanHasEmc->user->phone;
                } else {
                    return '-';
                }
            })
            ->editColumn('status.name', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

                if ($PengawasanHasEmc->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEmc->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEmc) {
                $button = "";
                $pengawasanpakej = PakejHasPengawasan::where('id', $PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
                $projekpakej = ProjekPakej::where('id', $pengawasanpakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeemc(' . $PengawasanHasEmc->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function emctable9(Request $request)
    {

        if ($request->ajax()) {

            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Pengguna - Pengguna EO";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
            $pakejhaspengawasan = PakejHasPengawasan::where('pakej_id', $request->id)->where('pengawasan_id', 9)->first();
            if ($pakejhaspengawasan) {
                $PengawasanHasEmc = PengawasanHasEmc::where('pakej_has_pengawasan_id', $pakejhaspengawasan->id)->get();
            } else {
                $PengawasanHasEmc = [];
            }

            return datatables()->of($PengawasanHasEmc)
            ->editColumn('name', function ($PengawasanHasEmc) {

                return $PengawasanHasEmc->user->name . '<br><small style="text-transform: none !important;">' . $PengawasanHasEmc->user->email . '</small>';
            })
            ->editColumn('username', function ($PengawasanHasEmc) {
                return '<span class="label label-default">' . $PengawasanHasEmc->user->username . '</span>';
            })
            ->editColumn('syarikat', function ($PengawasanHasEmc) {
                return $PengawasanHasEmc->user->entity_emc->syarikat;
            })
            ->editColumn('detail', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->fax != null || $PengawasanHasEmc->user->phone != null) {
                    $seperate = '';
                    $seperate2 = '';
                    $faks = '';
                    $phone = '';
                    if ($PengawasanHasEmc->user->fax != null) {
                        $faks = '<b>No Faks : </b>';
                        $seperate = '<br>';
                    }
                    if ($PengawasanHasEmc->user->phone != null) {
                        $phone = '<b>No Tel : </b>';
                    }
                    return $faks . $PengawasanHasEmc->user->fax . $seperate . $phone . $PengawasanHasEmc->user->phone;
                } else {
                    return '-';
                }
            })
            ->editColumn('status.name', function ($PengawasanHasEmc) {
                if ($PengawasanHasEmc->user->user_status_id == 1) {
                    return '<span class="badge badge-success">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

                if ($PengawasanHasEmc->user->user_status_id == 3) {
                    return '<span class="badge badge-default">' . $PengawasanHasEmc->user->status->name . '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $PengawasanHasEmc->user->status->name . '</span>';
                }

            })
            ->editColumn('action', function ($PengawasanHasEmc) {
                $button = "";
                $pengawasanpakej = PakejHasPengawasan::where('id', $PengawasanHasEmc->pakej_has_pengawasan_id)->first()->pakej_id;
                $projekpakej = ProjekPakej::where('id', $pengawasanpakej)->first()->projek_id;
                $projek = Projek::where('id', $projekpakej)->first()->status;
                if ($projek == 1) {
                    if (auth()->user()->entity_type != 'App\UserStaff') {
                        $button .= '<a onclick="removeemc(' . $PengawasanHasEmc->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');
    }

    public function useremcdelete(Request $request, $id)
    {
        $PengawasanHasEmc = PengawasanHasEmc::where('id', $id)->first();

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 6;
        $log->description = "Padam Data Pengguna EMC";
        $log->data_old = json_encode($PengawasanHasEmc);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        if ($PengawasanHasEmc->delete()) {
            return response()->json();
        }
    }

    public function jenispengawasan(Request $request)
    {
        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 1;
        $log->description = "Lihat Senarai Pengawasan";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $Stesen = Stesen::where('jenis_pengawasan_id', $request->jenis_pengawasan)->where('projek_id', $request->projek_id)->where('projek_pakej_id', $request->pakej_id)->count(); //kira stesen yg ada sekarang
        $getStesen = Stesen::where('jenis_pengawasan_id', $request->jenis_pengawasan)->where('projek_id', $request->projek_id)->where('projek_pakej_id', $request->pakej_id)->get();

        if ($request->bilangan_stesen > $Stesen) { //jika stesen da ada dan bilangan stesen lebih bsar.akan tambah stesen
            $addcolumn = $request->bilangan_stesen - $Stesen;
            $i = 0;
            for ($i = 0; $i < $addcolumn; $i++) {
                $stesen = new Stesen();
                $stesen->projek_id = $request->projek_id;
                $stesen->jenis_pengawasan_id = $request->jenis_pengawasan;
                $stesen->projek_pakej_id = $request->pakej_id;
                $stesen->nama = $request->nama;

                if ($request->version) {
                    $stesen->versi = $request->version;
                }

                if ($stesen->save()) {
                    /*dd($stesen->id);*/
                    $lates_id = $stesen->id;
                    if ($request->jenis_pengawasan == 2) {
                        if ($request->version) {
                            $stesen->versi = $request->version;
                            $stesen->save();
                        }

                        if ($request->version == 1) {
                            $versi_name = 'lama';
                        } elseif ($request->version == 2) {
                            $versi_name = 'baru';
                        }
                        $mendatory_parameter = MasterParameter::where('jenis_pengawasan', $request->jenis_pengawasan)
                        ->where('mode', '=', 'mandatory')
                        ->where('versi', '=', $versi_name)
                        ->get();
                    } else {
                        $mendatory_parameter = MasterParameter::where('jenis_pengawasan', $request->jenis_pengawasan)
                        ->where('mode', '=', 'mandatory')
                        ->get();
                    }

                    /*dd($mendatory_parameter);*/
                    if ($request->jenis_pengawasan != 7) {
                        foreach ($mendatory_parameter as $key => $mendatory) {
                            $new_parameter = new Parameter;
                            $new_parameter->stesen_id = $lates_id;
                            $new_parameter->parameter = $mendatory->id;
                            $new_parameter->mode = 'mandatory';
                            $new_parameter->save();
                        }
                    }

                }

            }

        } else { //jika sama atau kurang bilangan stesen.dia akan delete kalau kurang dan maintain klau sama
            $addcolumn = $Stesen - $request->bilangan_stesen;
            $stesen = Stesen::where('jenis_pengawasan_id', $request->jenis_pengawasan)->where('projek_id', $request->projek_id)->where('projek_pakej_id', $request->pakej_id)->orderBy('id', 'desc')->take($addcolumn)->delete();
        }

        if ($getStesen) {
            foreach ($getStesen as $key => $value) {
                $value->nama = $request->nama;
                $value->save();
            }

        }

        $count_stesen = Stesen::where('jenis_pengawasan_id', $request->jenis_pengawasan)->where('projek_pakej_id', $request->pakej_id)->where('projek_id', $request->projek_id)->count();
        if ($count_stesen != 0) {
            return response()->json(['status' => 'ok', 'standard_dirujuk' => 'disable']);
        } else {
            return response()->json(['status' => 'ok', 'standard_dirujuk' => 'enable']);
        }

    }

    public function getSungai(Request $request, $id, $pakejid)
    {

        if ($request->ajax()) {
            $type = Stesen::where('projek_id', $id)->where('jenis_pengawasan_id', 1)->where('projek_pakej_id', $pakejid)->orderBy('id')->get();

            return datatables()->of($type)
            ->editColumn('stesen', function ($type) {
                $stesen = "";
                if ($type->stesen) {
                    $stesen .= $type->stesen;
                    return strtoupper($stesen);
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud) {
                    if ($type->longitud) {
                        $longitud .= strtoupper($type->longitud);
                    }

                    return $longitud;
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud) {
                    if ($type->latitud) {
                        $latitud .= strtoupper($type->latitud);
                    }

                    if ($type->longitud && $type->latitud) {
                        $latitud .= '<center><a  href="' . config('status.geoLocatorDomain') . $type->url_geolocator . '" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';
                    }

                    return $latitud;
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('gambar', function ($type) {
                $gambar = "";
                if ($type->gambar_stesen) {
                    $gambar .= '<a href="' . asset('/') . $type->gambar_stesen . '" target="_blank"><img src="' . asset('/') . $type->gambar_stesen . '" width="150px" height="auto"></a>';
                    return $gambar;
                } else {
                    return '<input type="hidden" id="errorSg" value="-">';
                }

            })
            ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id', $type->projek_pakej_id)->where('projek_id', $type->projek_id)->first();
                $button = "";
                if (($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC') || ($stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC')) {
                    $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                } else {
                    if (Auth::user()->hasAnyRole(['emc'])) {

                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                        $button .= '<a onclick="remove(' . $type->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                    }
                    if (Auth::user()->hasAnyRole(['pp'])) {
                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                    }
                }

                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');

    }

    public function getMarin(Request $request, $id, $pakejid)
    {

        if ($request->ajax()) {
            $type = Stesen::where('projek_id', $id)->where('jenis_pengawasan_id', 2)->where('projek_pakej_id', $pakejid)->orderBy('id')->get();
            return datatables()->of($type)
            ->editColumn('stesen', function ($type) {
                $stesen = "";
                if ($type->stesen) {
                    $stesen .= $type->stesen;
                    return strtoupper($stesen);
                } else {
                    return '<input type="hidden" id="errorMarin" value="0">';
                }
            })
            ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud) {
                    if ($type->longitud) {
                        $longitud .= strtoupper($type->longitud);
                    }

                    return $longitud;
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud) {
                    if ($type->latitud) {
                        $latitud .= strtoupper($type->latitud);
                    }

                    if ($type->longitud && $type->latitud) {
                        $latitud .= '<center><a  href="' . config('status.geoLocatorDomain') . $type->url_geolocator . '" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';
                    }

                    return $latitud;
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('gambar', function ($type) {
                $gambar = "";
                if ($type->gambar_stesen) {
                    $gambar .= '<a href="' . asset('/') . $type->gambar_stesen . '" target="_blank"><img src="' . asset('/') . $type->gambar_stesen . '" width="150px" height="auto"></a>';
                    return $gambar;
                } else {
                    return '<input type="hidden" id="errorMarin" value="-">';
                }

            })
            ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id', $type->projek_pakej_id)->where('projek_id', $type->projek_id)->first();
                $button = "";

                if ($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC' || $stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC') {
                    $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                } else {
                    if (Auth::user()->hasAnyRole(['emc'])) {
                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                        $button .= '<a onclick="remove(' . $type->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                    }
                    if (Auth::user()->hasAnyRole(['pp'])) {
                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');

    }

    public function getTasik(Request $request, $id, $pakejid)
    {

        if ($request->ajax()) {
            $type = Stesen::where('projek_id', $id)->where('jenis_pengawasan_id', 3)->where('projek_pakej_id', $pakejid)->orderBy('id')->get();
            return datatables()->of($type)
            ->editColumn('stesen', function ($type) {
                $stesen = "";
                if ($type->stesen) {
                    $stesen .= $type->stesen;
                    return strtoupper($stesen);
                } else {
                    return '<input type="hidden" id="errorTasik" value="0">';
                }
            })
            ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud) {
                    if ($type->longitud) {
                        $longitud .= strtoupper($type->longitud);
                    }

                    return $longitud;
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud) {
                    if ($type->latitud) {
                        $latitud .= strtoupper($type->latitud);
                    }

                    if ($type->longitud && $type->latitud) {
                        $latitud .= '<center><a  href="' . config('status.geoLocatorDomain') . $type->url_geolocator . '" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';
                    }

                    return $latitud;
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('gambar', function ($type) {
                $gambar = "";
                if ($type->gambar_stesen) {
                    $gambar .= '<a href="' . asset('/') . $type->gambar_stesen . '" target="_blank"><img src="' . asset('/') . $type->gambar_stesen . '" width="150px" height="auto"></a>';
                    return $gambar;
                } else {
                    return '<input type="hidden" id="errorTasik" value="-">';
                }

            })
            ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id', $type->projek_pakej_id)->where('projek_id', $type->projek_id)->first();

                $button = "";

                if ($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC' || $stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC') {
                    $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                } else {
                    if (Auth::user()->hasAnyRole(['emc'])) {
                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                        $button .= '<a onclick="remove(' . $type->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                    }
                    if (Auth::user()->hasAnyRole(['pp'])) {
                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                    }
                }

                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');

    }

    public function getTanah(Request $request, $id, $pakejid)
    {

        if ($request->ajax()) {
            $type = Stesen::where('projek_id', $id)->where('jenis_pengawasan_id', 4)->where('projek_pakej_id', $pakejid)->orderBy('id')->get();
            return datatables()->of($type)
            ->editColumn('stesen', function ($type) {
                $stesen = "";
                if ($type->stesen) {
                    $stesen .= $type->stesen;
                    return strtoupper($stesen);
                } else {
                    return '<input type="hidden" id="errorTanah" value="0">';
                }
            })
            ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud) {
                    if ($type->longitud) {
                        $longitud .= strtoupper($type->longitud);
                    }

                    return $longitud;
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud) {
                    if ($type->latitud) {
                        $latitud .= strtoupper($type->latitud);
                    }

                    if ($type->longitud && $type->latitud) {
                        $latitud .= '<center><a  href="' . config('status.geoLocatorDomain') . $type->url_geolocator . '" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';
                    }

                    return $latitud;
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('gambar', function ($type) {
                $gambar = "";
                if ($type->gambar_stesen) {
                    $gambar .= '<a href="' . asset('/') . $type->gambar_stesen . '" target="_blank"><img src="' . asset('/') . $type->gambar_stesen . '" width="150px" height="auto"></a>';
                    return $gambar;
                } else {
                    return '<input type="hidden" id="errorTanah" value="-">';
                }

            })
            ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id', $type->projek_pakej_id)->where('projek_id', $type->projek_id)->first();

                $button = "";

                if ($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC' || $stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC') {
                    $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                } else {
                    if (Auth::user()->hasAnyRole(['emc'])) {
                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                        $button .= '<a onclick="remove(' . $type->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                    }
                    if (Auth::user()->hasAnyRole(['pp'])) {
                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');

    }

    public function getAir(Request $request, $id, $pakejid)
    {

        if ($request->ajax()) {
            $type = Stesen::where('projek_id', $id)->where('jenis_pengawasan_id', 5)->where('projek_pakej_id', $pakejid)->orderBy('id')->get();
            return datatables()->of($type)
            ->editColumn('stesen', function ($type) {
                $stesen = "";
                if ($type->stesen) {
                    $stesen .= $type->stesen;
                    return strtoupper($stesen);
                } else {
                    return '<input type="hidden" id="errorAir" value="0">';
                }
            })
            ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud) {
                    if ($type->longitud) {
                        $longitud .= strtoupper($type->longitud);
                    }

                    return $longitud;
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud) {
                    if ($type->latitud) {
                        $latitud .= strtoupper($type->latitud);
                    }

                    if ($type->longitud && $type->latitud) {
                        $latitud .= '<center><a  href="' . config('status.geoLocatorDomain') . $type->url_geolocator . '" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';
                    }

                    return $latitud;
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('gambar', function ($type) {
                $gambar = "";
                if ($type->gambar_stesen) {
                    $gambar .= '<a href="' . asset('/') . $type->gambar_stesen . '" target="_blank"><img src="' . asset('/') . $type->gambar_stesen . '" width="150px" height="auto"></a>';
                    return $gambar;
                } else {
                    return '<input type="hidden" id="errorAir" value="-">';
                }

            })
            ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id', $type->projek_pakej_id)->where('projek_id', $type->projek_id)->first();

                $button = "";

                if ($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC' || $stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC') {
                    $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                } else {
                    if (Auth::user()->hasAnyRole(['emc'])) {
                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                        $button .= '<a onclick="remove(' . $type->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                    }
                    if (Auth::user()->hasAnyRole(['pp'])) {
                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');

    }

    public function getUdara(Request $request, $id, $pakejid)
    {

        if ($request->ajax()) {
            $type = Stesen::where('projek_id', $id)->where('jenis_pengawasan_id', 6)->where('projek_pakej_id', $pakejid)->orderBy('id')->get();
            return datatables()->of($type)
            ->editColumn('stesen', function ($type) {
                $stesen = "";
                if ($type->stesen) {
                    $stesen .= $type->stesen;
                    return strtoupper($stesen);
                } else {
                    return '<input type="hidden" id="errorUdara" value="0">';
                }
            })
            ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud) {
                    if ($type->longitud) {
                        $longitud .= strtoupper($type->longitud);
                    }

                    return $longitud;
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud) {
                    if ($type->latitud) {
                        $latitud .= strtoupper($type->latitud);
                    }

                    if ($type->longitud && $type->latitud) {
                        $latitud .= '<center><a  href="' . config('status.geoLocatorDomain') . $type->url_geolocator . '" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';
                    }

                    return $latitud;
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('gambar', function ($type) {
                $gambar = "";
                if ($type->gambar_stesen) {
                    $gambar .= '<a href="' . asset('/') . $type->gambar_stesen . '" target="_blank"><img src="' . asset('/') . $type->gambar_stesen . '" width="150px" height="auto"></a>';
                    return $gambar;
                } else {
                    return '<input type="hidden" id="errorUdara" value="-">';
                }

            })
            ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id', $type->projek_pakej_id)->where('projek_id', $type->projek_id)->first();

                $button = "";

                if ($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC' || $stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC') {
                    $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                } else {
                    if (Auth::user()->hasAnyRole(['emc'])) {
                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                        $button .= '<a onclick="remove(' . $type->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                    }
                    if (Auth::user()->hasAnyRole(['pp'])) {
                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');

    }

    public function getBunyi(Request $request, $id, $pakejid)
    {

        if ($request->ajax()) {
            $type = Stesen::where('projek_id', $id)->where('jenis_pengawasan_id', 7)->where('projek_pakej_id', $pakejid)->orderBy('id')->get();
            return datatables()->of($type)
            ->editColumn('stesen', function ($type) {
                $stesen = "";
                if ($type->stesen) {
                    $stesen .= $type->stesen;
                    return strtoupper($stesen);
                } else {
                    return '<input type="hidden" id="errorBunyi" value="0">';
                }
            })
            ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud) {
                    if ($type->longitud) {
                        $longitud .= strtoupper($type->longitud);
                    }

                    return $longitud;
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud) {
                    if ($type->latitud) {
                        $latitud .= strtoupper($type->latitud);
                    }

                    if ($type->longitud && $type->latitud) {
                        $latitud .= '<center><a  href="' . config('status.geoLocatorDomain') . $type->url_geolocator . '" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';
                    }

                    return $latitud;
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('gambar', function ($type) {
                $gambar = "";
                if ($type->gambar_stesen) {
                    $gambar .= '<a href="' . asset('/') . $type->gambar_stesen . '" target="_blank"><img src="' . asset('/') . $type->gambar_stesen . '" width="150px" height="auto"></a>';
                    return $gambar;
                } else {
                    return '<input type="hidden" id="errorBunyi" value="-">';
                }

            })
            ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id', $type->projek_pakej_id)->where('projek_id', $type->projek_id)->first();

                $button = "";

                if ($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC' || $stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC') {
                    $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai2(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                } else {
                    if (Auth::user()->hasAnyRole(['emc'])) {
                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai2(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                        $button .= '<a onclick="remove(' . $type->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                    }
                    if (Auth::user()->hasAnyRole(['pp'])) {
                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai2(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                    }
                }

                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');

    }

    public function getGetaran(Request $request, $id, $pakejid)
    {

        if ($request->ajax()) {
            $type = Stesen::where('projek_id', $id)->where('jenis_pengawasan_id', 8)->where('projek_pakej_id', $pakejid)->orderBy('id')->get();
            return datatables()->of($type)
            ->editColumn('stesen', function ($type) {
                $stesen = "";
                if ($type->stesen) {
                    $stesen .= $type->stesen;
                    return strtoupper($stesen);
                } else {
                    return '<input type="hidden" id="errorGetaran" value="0">';
                }
            })
            ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud) {
                    if ($type->longitud) {
                        $longitud .= strtoupper($type->longitud);
                    }

                    return $longitud;
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud) {
                    if ($type->latitud) {
                        $latitud .= strtoupper($type->latitud);
                    }

                    if ($type->longitud && $type->latitud) {
                        $latitud .= '<center><a  href="' . config('status.geoLocatorDomain') . $type->url_geolocator . '" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';
                    }

                    return $latitud;
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('gambar', function ($type) {
                $gambar = "";
                if ($type->gambar_stesen) {
                    $gambar .= '<a href="' . asset('/') . $type->gambar_stesen . '" target="_blank"><img src="' . asset('/') . $type->gambar_stesen . '" width="150px" height="auto"></a>';
                    return $gambar;
                } else {
                    return '<input type="hidden" id="errorGetaran" value="-">';
                }

            })
            ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id', $type->projek_pakej_id)->where('projek_id', $type->projek_id)->first();

                $button = "";

                if ($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC' || $stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC') {
                    $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    $button .= '<a onclick="parameterSungai2(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                } else {
                    if (Auth::user()->hasAnyRole(['emc'])) {
                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                        $button .= '<a onclick="remove(' . $type->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                    }
                    if (Auth::user()->hasAnyRole(['pp'])) {
                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="parameterSungai2(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-plus mr-1"></i> Standard Rujukan</a>';
                    }
                }
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');

    }

    public function getDron(Request $request, $id, $pakejid)
    {

        if ($request->ajax()) {
            $type = Stesen::where('projek_id', $id)->where('jenis_pengawasan_id', 9)->where('projek_pakej_id', $pakejid)->orderBy('id')->get();
            return datatables()->of($type)
            ->editColumn('stesen', function ($type) {
                $stesen = "";
                if ($type->stesen) {
                    $stesen .= $type->stesen;
                    return strtoupper($stesen);
                } else {
                    return '<input type="hidden" id="errorDron" value="0">';
                }
            })
            ->editColumn('longitud', function ($type) {
                $longitud = "";
                if ($type->longitud) {
                    if ($type->longitud) {
                        $longitud .= strtoupper($type->longitud);
                    }

                    return $longitud;
                } else {
                    return '<input type="hidden" id="errorDron" value="0">';
                }
            })
            ->editColumn('latitud', function ($type) {
                $latitud = "";
                if ($type->longitud || $type->latitud) {
                    if ($type->latitud) {
                        $latitud .= strtoupper($type->latitud);
                    }

                    if ($type->longitud && $type->latitud) {
                        $latitud .= '<center><a  href="' . config('status.geoLocatorDomain') . $type->url_geolocator . '" target="_blank" class="btn btn-default-focus btn-xs m-t-5 "><i class="fa fa-search mr-1"></i>Cari</a></center>';
                    }

                    return $latitud;
                } else {
                    return '<input type="hidden" id="errorSg" value="0">';
                }
            })
            ->editColumn('gambar', function ($type) {
                $gambar = "";
                if ($type->gambar_stesen) {
                    $gambar .= '<a href="' . asset('/') . $type->gambar_stesen . '" target="_blank"><img src="' . asset('/') . $type->gambar_stesen . '" width="150px" height="auto"></a>';
                    return $gambar;
                } else {
                    return '<input type="hidden" id="errorGetaran" value="-">';
                }

            })
            ->editColumn('action', function ($type) {
                $stesen_status = StesenPengawasanStatus::where('pakej_id', $type->projek_pakej_id)->where('projek_id', $type->projek_id)->first();

                $button = "";

                if ($stesen_status->status_id > 1 && auth()->user()->entity_type != 'App\UserEMC' || $stesen_status->status_id > 2 && auth()->user()->entity_type == 'App\UserEMC') {
                    $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                } else {
                    if (Auth::user()->hasAnyRole(['emc'])) {
                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                        $button .= '<a onclick="remove(' . $type->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1" style="width:200px;"><i class="fa fa-trash mr-1"></i> Padam</a>';
                    }
                    if (Auth::user()->hasAnyRole(['pp'])) {
                        $button .= '<a onclick="edit1(' . $type->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="width:200px;"><i class="fa fa-edit mr-1"></i> Maklumat Stesen</a>';
                    }
                }

                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek');

    }

    public function addProjektab1(Request $request)
    {
        $user = auth()->id();
        $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id', $user)->first();
        $projek_id = $projek->projek_id;

        $projekdetail = ProjekDetail::where('projek_id', $projek_id)->first();
        if ($projekdetail) {
            $projekdetail->aktiviti = $request->aktiviti;
            $projekdetail->lokasi = $request->lokasi;
            $projekdetail->negeri = $request->negeri;
            $projekdetail->daerah = $request->daerah;
            $projekdetail->bandar = $request->bandar;
            $projekdetail->poskod = $request->poskod;
            $projekdetail->alamat_surat = $request->alamat_surat;
            $projekdetail->surat_negeri = $request->surat_negeri;
            $projekdetail->surat_daerah = $request->surat_daerah;
            $projekdetail->surat_bandar = $request->surat_bandar;
            $projekdetail->surat_poskod = $request->surat_poskod;
            $projekdetail->eo = $request->eo;
            $projekdetail->emc = $request->emc;
            $projekdetail->jenis_projek = $request->jenis_projek;
            $projekdetail->laporaneia = $request->laporaneia;
            $projekdetail->peringkat = $request->peringkat;
            $projekdetail->jenis = $request->jenis;
            if ($projekdetail->save()) {
                return response()->json(['status' => 'ok']);
            } else {
                return response()->json(['status' => 'error']);
            }
        } else {
            return response()->json(['status' => 'error']);
        }
    }

    public function addProjektab2(Request $request)
    {
        $user = auth()->id();
        $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id', $user)->first();
        $projek_id = $projek->projek_id;
    }

    public function pakej_pengawasan(Request $request, $id)
    {

        $this->data['myPakej'] = $myPakej = $id;
        $this->data['PakejHasPengawasan'] = $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id', $id)->where('status', 1)->get();
        $pakej = ProjekPakej::where('id', $id)->first();
        $this->data['projek'] = $projek = Projek::where('id', $pakej->projek_id)->first();
        $jenispengawasan = \App\JenisPengawasan::where('projek_id', $pakej->projek_id)->first();
        $user = auth()->id();
        $projekuser = ProjekHasUser::where('user_id', $user)->first();
        $this->data['Pengawasan'] = $Pengawasan = MasterPengawasan::whereIn('id', json_decode($jenispengawasan->jenis_pengawasan_id))->get();
        if ($projekuser) {
            $projekuserarray = ProjekHasUser::where('projek_id', $projekuser->projek_id)->get();
            $userarrays = [];
            foreach ($projekuserarray as $projekuserarrays) {
                array_push($userarrays, $projekuserarrays->user_id);
            }
            $EMCuser = User::where('user_type_id', 3)->where('user_status_id', 1)->whereIn('id', $userarrays)->with(['entity_emc', 'status', 'role', 'emcpengawasan.pengawasan'])->whereHas('model_has_role', function ($role) use ($request) {
                return $role->where('role_id', 6);
            })->get();
            $this->data['EOuser'] = $EOuser = User::where('user_type_id', 3)->where('user_status_id', 1)->whereIn('id', $userarrays)->with(['entity_eo', 'status', 'role'])->whereHas('model_has_role', function ($role) use ($request) {
                return $role->where('role_id', 5);
            })->get();
        } else {
            $this->data['EMCuser'] = $EMCuser = [];
            $this->data['EOuser'] = $EOuser = [];
        }

        $collect = collect($EMCuser);
        $EMCuser = $collect->map(function ($item) {
            $item['pengawasan_item'] = $item->pengawasan->map(function ($item2) {
                return $item2->skop_pengawasan;
            });
            return $item;
        });

        $EMCarray = $EMCuser->toArray();

        $this->data['EMCuser'] = $EMCarray;

        return view('projek.pakej_pengawasan', $this->data);
    }

    public function checkupeoemc(Request $request, $id)
    {

        $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id', $id)->where('status', 1)->get();

        $pakejeo = PengawasanHasEo::where('pakej', $id)->first();
        if ($pakejeo) {
            $pakejuser[] = $pakejeo->user_id . ' eo';
        } else {
            $pakejuser[] = 'tiada';
        }

        foreach ($PakejHasPengawasan as $PakejHasPengawasanvalue) {
            $pakejemc = PengawasanHasEmc::where('pakej_has_pengawasan_id', $PakejHasPengawasanvalue->id)->first();
            if ($pakejemc) {
                $pakejuser[] = $pakejemc->user_id . ' emc';
            } else {
                $pakejuser[] = 'tiada';
            }

        }

        foreach ($pakejuser as $value) {
            if ($value == 'tiada') {
                return response()->json(['status1' => 'error', 'title' => '', 'message' => 'Pastikan anda sudah lengkap lantik EO dan EMC bagi setiap pengawasan.', 'status' => '']);
            }
        }

        return response()->json(['status' => 'ok']);
    }

    public function submitProjek(Request $request)
    {

        $checking_projek = ProjekAudit::where('projek_id', $request->id)->where('tarikh_audit', null)->get();
        if (count($checking_projek) > 0) {
            return response()->json(['status1' => 'error', 'title' => '', 'message' => 'Sila masukkan tarikh audit pada butang kemaskini', 'status' => '']);
        }

        $ProjekPakej = ProjekPakej::where('projek_id', $request->id)->get();

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 4;
        $log->description = "Tambah Data Projek";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $projek = Projek::findOrFail($request->id);
        $projek->status = 3;
        $projek->tarikh_hantar = date('Y-m-d');
        $projek->save();

        $distribution = Distribution::where('no_fail_jas', $projek->no_fail_jas)->first();

        $distribution = User::where('id', $distribution->assigned_to_user_id)->first();

        Mail::to($distribution->email)->send(new NewProject($projek->no_fail_jas, 'Pendaftaran Projek'));

        $projeklaporan = ProjekPengawasanLaporan::where('projek_id', $request->id)->first();
        if (!$projeklaporan) {
            for ($x = 1; $x <= 12; $x++) {
                $ProjekPengawasanLaporan = new ProjekPengawasanLaporan();
                $ProjekPengawasanLaporan->projek_id = $request->id;
                $ProjekPengawasanLaporan->bulan = $x;
                $ProjekPengawasanLaporan->save();
            }
        }

        $ioid = ProjekHasUser::where('user_id', auth()->id())->first();
        $ioidpegawai = Projek::where('id', $ioid->projek_id)->first();
        $distribution = Distribution::where('no_fail_jas', $ioidpegawai->no_fail_jas)->first();
//notifikasi kepada pegawai Jas(penyelia) untuk mengaktifkan Enviromental Office (eo)

        Inbox::create([
            'subject' => 'Pengesahan Pendaftaran Projek - ' . $ioidpegawai->no_fail_jas,
            'message' => 'Terdapat pengesahan diperlukan untuk Enviromental Officer',
            'sender_user_id' => auth()->id(), //admin
            'receiver_user_id' => $distribution->assigned_to_user_id, //Penyelia
            'inbox_status_id' => 2,
        ]);

        return response()->json(['status1' => 'ok', 'url' => route('projek.pendaftaran_projek')]);
    }

    public function submitProjekIO(Request $request)
    {
        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 4;
        $log->description = "Hantar Data Projek";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $projek = Projek::findOrFail($request->id);
        $projek->status = 3;
        $projek->tarikh_hantar = date('Y-m-d');
        $projek->save();

        $distribution = Distribution::where('no_fail_jas', $projek->no_fail_jas)->first();

        $distribution = User::where('id', $distribution->assigned_to_user_id)->first();

        Mail::to($distribution->email)->send(new NewProject($projek->no_fail_jas, 'Pendaftaran Projek'));

        $projeklaporan = ProjekPengawasanLaporan::where('projek_id', $request->id)->first();
        if (!$projeklaporan) {
            for ($x = 1; $x <= 12; $x++) {
                $ProjekPengawasanLaporan = new ProjekPengawasanLaporan();
                $ProjekPengawasanLaporan->projek_id = $request->id;
                $ProjekPengawasanLaporan->bulan = $x;
                $ProjekPengawasanLaporan->save();
            }
        }

        $ioid = ProjekHasUser::where('user_id', auth()->id())->first();
        $ioidpegawai = Projek::where('id', $ioid->projek_id)->first();
        $distribution = Distribution::where('no_fail_jas', $ioidpegawai->no_fail_jas)->first();
//notifikasi kepada pegawai Jas(penyelia) untuk mengaktifkan Enviromental Office (eo)

        Inbox::create([
            'subject' => 'Pengesahan Pendaftaran Projek - ' . $ioidpegawai->no_fail_jas,
            'message' => 'Terdapat pengesahan diperlukan untuk Enviromental Officer',
            'sender_user_id' => auth()->id(), //admin
            'receiver_user_id' => $distribution->assigned_to_user_id, //Penyelia
            'inbox_status_id' => 2,
        ]);

        return response()->json(['status1' => 'ok']);
    }

    public function projek(Request $request)
    {

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 2;
        $log->description = "Lihat Maklumat Projek";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user = auth()->id();

        $projekUser = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id', $user)->first();
        if (!$projekUser) {
            return '<script type="text/javascript">alert("Anda tidak berdaftar atas mana-mana projek!!");document.location="javascript:history.back()"</script>';
        }

        $this->data['projekUser'] = $projekUser;

        $this->data['Projek'] = $projek = Projek::where('id', $projekUser->projek_id)->first();
        $this->data['ProjekFasa'] = $ProjekFasa = ProjekFasa::where('projek_id', $projekUser->projek_id)->first();
        $jasdetail = $projek->jasfail->jasdetail->jas_ekas_id;
        $jasfailaktiviti = JasFailDetailAktiviti::where('ekas_id', $jasdetail)->get();
        foreach ($jasfailaktiviti as $keyjasfailaktiviti => $valuejasfailaktiviti) {
            $aktiviti_name = MasterActivity::where('aktiviti', 'like', '%' . $valuejasfailaktiviti->aktiviti . '%')->first();
            if ($aktiviti_name) {
                $aktiviti_id[$keyjasfailaktiviti]['id'] = $aktiviti_name->aktiviti;
                $aktiviti_id[$keyjasfailaktiviti]['nama'] = $aktiviti_name->keterangan;
            } else {
                $aktiviti_id[] = 'tiada';
            }

        }
        $this->data['aktiviti'] = $aktiviti_id;
        $this->data['jasdetail'] = $projek->jasfail->jasdetail;

        if ($projekUser) {
            $this->data['ProjekDetail'] = $projekdetail = ProjekDetail::leftJoin('projek_has_user', 'projek_detail.projek_id', '=', 'projek_has_user.projek_id')->where('projek_detail.projek_id', $projek->id)->first();
            $this->data['Pengawasan'] = $pengawasan = MasterPengawasan::all();
            $this->data['Stesen'] = Stesen::all();
            $this->data['districts'] = $districts = MasterDistrict::orderBy('name', 'asc')->get();
            $this->data['states'] = $states = MasterState::orderBy('name')->whereNotIn('id', ['17'])->get();
//dd($states);
            $this->data['city'] = $city = MasterCity::orderBy('name')->get();
            $this->data['peringkatPengawasan'] = $peringkatPengawasan = MasterPeringkatPengawasan::all();
            $this->data['pematuhaneia'] = $pematuhaneia = MasterPematuhanEia::all()->sortByDesc('id');
            $this->data['jenisProjek'] = $jenisProjek = MasterJenisProjek::where('status', 1)->orderBy('id', 'desc')->get();
            $this->data['tempohAudit'] = $tempohAudit = MasterTempohAudit::all(); //remove pilihan untuk tempoh audit TIADA di database
            $this->data['projekAudit'] = $projekAudit = ProjekAudit::where('projek_id', $projek->id)->get();
            $this->data['stesens'] = $stesens = Stesen::where('projek_id', $projek->id)->get();
            $this->data['stesen_sungai'] = $stesen_sungai = Stesen::where('projek_id', $projek->id)->where('jenis_pengawasan_id', 1)->latest()->first();
            $this->data['stesen_marin'] = $stesen_marin = Stesen::where('projek_id', $projek->id)->where('jenis_pengawasan_id', 2)->latest()->first();
            $this->data['stesen_tasik'] = $stesen_tasik = Stesen::where('projek_id', $projek->id)->where('jenis_pengawasan_id', 3)->latest()->first();
            $this->data['stesen_tanah'] = $stesen_tanah = Stesen::where('projek_id', $projek->id)->where('jenis_pengawasan_id', 4)->latest()->first();
            $this->data['stesen_air'] = $stesen_air = Stesen::where('projek_id', $projek->id)->where('jenis_pengawasan_id', 5)->latest()->first();
            $this->data['stesen_udara'] = $stesen_air = Stesen::where('projek_id', $projek->id)->where('jenis_pengawasan_id', 6)->latest()->first();
            $this->data['stesen_bunyi'] = $stesen_bunyi = Stesen::where('projek_id', $projek->id)->where('jenis_pengawasan_id', 7)->latest()->first();
            $this->data['stesen_getaran'] = $stesen_bunyi = Stesen::where('projek_id', $projek->id)->where('jenis_pengawasan_id', 8)->latest()->first();

            $this->data['PakejHasPengawasan'] = $PakejHasPengawasan = MasterPengawasan::join('pakej_has_pengawasan', 'pakej_has_pengawasan.pengawasan_id', '=', 'master_pengawasan.id')
            ->join('projek_fasa', 'projek_fasa.id', '=', 'pakej_has_pengawasan.pakej_id')
            ->select('master_pengawasan.jenis_pengawasan', 'pakej_has_pengawasan.id as pengawasan_id', 'pakej_has_pengawasan.pakej_id')
            ->where('projek_fasa.projek_id', $projek->id)->groupBy('pakej_has_pengawasan.pengawasan_id')->get();

            $this->data['countsungai'] = $countsungai = Stesen::where('jenis_pengawasan_id', 1)->where('projek_id', $projek->id)->count();
            $this->data['countmarin'] = $countmarin = Stesen::where('jenis_pengawasan_id', 2)->where('projek_id', $projek->id)->count();
            $this->data['version'] = 3; //not selected
            if ($countmarin) {
                $data_stesen = Stesen::where('jenis_pengawasan_id', 2)->where('projek_id', $projek->id)->first();
                if ($data_stesen->versi == 1) {
                    $this->data['version'] = 1;
                } elseif ($data_stesen->versi == 2) {
                    $this->data['version'] = 2;
                }
            }

            $this->data['counttasik'] = $counttasik = Stesen::where('jenis_pengawasan_id', 3)->where('projek_id', $projek->id)->count();
            $this->data['counttanah'] = $counttanah = Stesen::where('jenis_pengawasan_id', 4)->where('projek_id', $projek->id)->count();
            $this->data['countairlarian'] = $countairlarian = Stesen::where('jenis_pengawasan_id', 5)->where('projek_id', $projek->id)->count();
            $this->data['countudara'] = $countudara = Stesen::where('jenis_pengawasan_id', 6)->where('projek_id', $projek->id)->count();
            $this->data['countbunyi'] = $countbunyi = Stesen::where('jenis_pengawasan_id', 7)->where('projek_id', $projek->id)->count();
            $this->data['countgetaran'] = $countgetaran = Stesen::where('jenis_pengawasan_id', 8)->where('projek_id', $projek->id)->count();
            $this->data['countdron'] = $countdron = Stesen::where('jenis_pengawasan_id', 9)->where('projek_id', $projek->id)->count();

            $this->data['stations'] = $stations = MasterStation::all();

            $EO = ProjekHasUser::leftJoin('model_has_role', 'projek_has_user.user_id', '=', 'model_has_role.model_id')
            ->where('model_has_role.role_id', 5)
            ->where('projek_has_user.projek_id', $projekUser->projek_id)
            ->get();
            $detailEO = [];
            foreach ($EO as $value) {
                $usereo = User::select('name', 'username')->where('id', $value->user_id)->where('user_status_id', 1)->whereNotNull('username')->first();
                if ($usereo) {
                    $detailEO[] = $usereo;
                }
            }
            $this->data['detailEO'] = $detailEO;

            $EMC = ProjekHasUser::leftJoin('model_has_role', 'projek_has_user.user_id', '=', 'model_has_role.model_id')
            ->where('model_has_role.role_id', 6)
            ->where('projek_has_user.projek_id', $projekUser->projek_id)
            ->get();

            $detailEMC = [];
            foreach ($EMC as $value1) {
                $useremc = User::select('name', 'username')->where('id', $value1->user_id)->where('user_status_id', 1)->whereNotNull('username')->first();
                if ($useremc) {
                    $detailEMC[] = $useremc;
                }
            }
            $this->data['detailEMC'] = $detailEMC;
            $this->data['project_activity'] = $project_activity = MasterProjectActivity::all();

            $this->data['countStesen'] = $countStesen = Stesen::where('projek_id', $projek->id)->count();

            $this->data['countFasa'] = $countFasa = ProjekFasa::where('projek_id', $projek->id)->count();

            if ($request->ajax()) {
                $pakej = ProjekFasa::where('projek_id', $projek->id)->where('nama_pakej', '!=', 'Tidak Berpakej / Tidak Berfasa')->get();
                return datatables()->of($pakej)
                ->editColumn('nama_pakej', function ($pakej) {
                    $pakejNama = "";
                    if ($pakej->nama_pakej) {
                        $pakejNama .= $pakej->nama_pakej;
                    }

                    return strtoupper($pakejNama);
                })
                ->editColumn('kontraktor', function ($pakej) {
                    $pakejKontraktor = "";
                    if ($pakej->kontraktor) {
                        $pakejKontraktor .= $pakej->kontraktor;
                    }

                    return strtoupper($pakejKontraktor);
                })
                ->editColumn('negeri', function ($pakej) {
                    $pakejNegeri = "";
                    if ($pakej->pakej_negeri) {
                        $pakejNegeri .= $pakej->projekState->name;
                    }

                    return strtoupper($pakejNegeri);
                })
                ->editColumn('alamat', function ($pakej) {
                    $pakejAlamat = "";
                    if ($pakej->alamat) {
                        $pakejAlamat .= $pakej->alamat;
                    }

                    return strtoupper($pakejAlamat);
                })
                ->editColumn('tarikh_mula', function ($pakej) {
                    $tarikh_mula = "";
                    if ($pakej->tarikh_mula) {
                        $tarikh_mula .= date("d/m/Y", strtotime($pakej->tarikh_mula));
                    }

                    return strtoupper($tarikh_mula);
                })
                ->editColumn('tarikh_akhir', function ($pakej) {
                    $tarikh_akhir = "";
                    if ($pakej->tarikh_akhir) {
                        $tarikh_akhir .= date("d/m/Y", strtotime($pakej->tarikh_akhir));
                    }

                    return strtoupper($tarikh_akhir);
                })
                ->editColumn('action', function ($pakej) {
                    $button = "";

                    $button .= '<a onclick="editFasaModal(' . $pakej->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i></a>';

                    $button .= '<a onclick="removepakej(' . $pakej->id . ')" href="javascript:;" data-toggle="tooltip" title="" class="btn btn-default btn-xs" style="" type="button" onclick=""><span style="color:#fff"> <i class="fas fa-trash text-danger"></i></span></a>';

                    return $button;
                })
                ->make(true);
            }
        }

        $this->data['userEOs'] = $userEOs = ProjekHasUser::where('projek_id', $projek->id)->where('role_id', 5)->where('status', 5)->get();
        $this->data['userEMCs'] = $userEMCs = ProjekHasUser::where('projek_id', $projek->id)->where('role_id', 6)->where('status', 5)->get();

        return view('projek.daftar_projek', $this->data);
    }

    public function projek_temp(Request $request)
    {

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 2;
        $log->description = "Lihat Maklumat Projek";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user = auth()->id();

        $projekUser = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id', $user)->first();
        if (!$projekUser) {
            return '<script type="text/javascript">alert("Anda tidak berdaftar atas mana-mana projek!!");document.location="javascript:history.back()"</script>';
        }

        $this->data['projekUser'] = $projekUser;

        $this->data['Projek'] = $projek = Projek::where('id', $projekUser->projek_id)->first();
        $this->data['ProjekPakej'] = $projekpakej = ProjekPakej::where('projek_id', $projekUser->projek_id)->first();
        $jasdetail = $projek->jasfail->jasdetail->jas_ekas_id;
        $jasfailaktiviti = JasFailDetailAktiviti::where('ekas_id', $jasdetail)->get();
        foreach ($jasfailaktiviti as $keyjasfailaktiviti => $valuejasfailaktiviti) {
            $aktiviti_name = MasterActivity::where('aktiviti', 'like', '%' . $valuejasfailaktiviti->aktiviti . '%')->first();
            if ($aktiviti_name) {
                $aktiviti_id[$keyjasfailaktiviti]['id'] = $aktiviti_name->aktiviti;
                $aktiviti_id[$keyjasfailaktiviti]['nama'] = $aktiviti_name->keterangan;
            } else {
                $aktiviti_id[] = 'tiada';
            }

        }
        $this->data['aktiviti'] = $aktiviti_id;
        $this->data['jasdetail'] = $projek->jasfail->jasdetail;

        if ($projekUser) {
            $this->data['ProjekDetail'] = $projekdetail = ProjekDetail::leftJoin('projek_has_user', 'projek_detail.projek_id', '=', 'projek_has_user.projek_id')->where('projek_detail.projek_id', $projek->id)->first();
            $this->data['Pengawasan'] = $pengawasan = MasterPengawasan::all();
            $this->data['Stesen'] = Stesen::all();
            $this->data['districts'] = $districts = MasterDistrict::orderBy('name', 'asc')->get();
            $this->data['states'] = $states = MasterState::orderBy('name')->whereNotIn('id', ['17'])->get();
            $this->data['city'] = $states = MasterCity::orderBy('name')->get();
            $this->data['peringkatPengawasan'] = $peringkatPengawasan = MasterPeringkatPengawasan::all();
            $this->data['pematuhaneia'] = $pematuhaneia = MasterPematuhanEia::all()->sortByDesc('id');
            $this->data['jenisProjek'] = $jenisProjek = MasterJenisProjek::where('status', 1)->orderBy('id', 'desc')->get();
            $this->data['tempohAudit'] = $tempohAudit = MasterTempohAudit::all(); //remove pilihan untuk tempoh audit TIADA di database
            $this->data['projekAudit'] = $projekAudit = ProjekAudit::where('projek_id', $projek->id)->get();
            $this->data['stesens'] = $stesens = Stesen::where('projek_id', $projek->id)->get();
            $this->data['stesen_sungai'] = $stesen_sungai = Stesen::where('projek_id', $projek->id)->where('jenis_pengawasan_id', 1)->latest()->first();
            $this->data['stesen_marin'] = $stesen_marin = Stesen::where('projek_id', $projek->id)->where('jenis_pengawasan_id', 2)->latest()->first();
            $this->data['stesen_tasik'] = $stesen_tasik = Stesen::where('projek_id', $projek->id)->where('jenis_pengawasan_id', 3)->latest()->first();
            $this->data['stesen_tanah'] = $stesen_tanah = Stesen::where('projek_id', $projek->id)->where('jenis_pengawasan_id', 4)->latest()->first();
            $this->data['stesen_air'] = $stesen_air = Stesen::where('projek_id', $projek->id)->where('jenis_pengawasan_id', 5)->latest()->first();
            $this->data['stesen_udara'] = $stesen_air = Stesen::where('projek_id', $projek->id)->where('jenis_pengawasan_id', 6)->latest()->first();
            $this->data['stesen_bunyi'] = $stesen_bunyi = Stesen::where('projek_id', $projek->id)->where('jenis_pengawasan_id', 7)->latest()->first();
            $this->data['stesen_getaran'] = $stesen_bunyi = Stesen::where('projek_id', $projek->id)->where('jenis_pengawasan_id', 8)->latest()->first();

            $this->data['countsungai'] = $countsungai = Stesen::where('jenis_pengawasan_id', 1)->where('projek_id', $projek->id)->count();
            $this->data['countmarin'] = $countmarin = Stesen::where('jenis_pengawasan_id', 2)->where('projek_id', $projek->id)->count();
            $this->data['version'] = 3; //not selected
            if ($countmarin) {
                $data_stesen = Stesen::where('jenis_pengawasan_id', 2)->where('projek_id', $projek->id)->first();
                if ($data_stesen->versi == 1) {
                    $this->data['version'] = 1;
                } elseif ($data_stesen->versi == 2) {
                    $this->data['version'] = 2;
                }
            }

            $this->data['counttasik'] = $counttasik = Stesen::where('jenis_pengawasan_id', 3)->where('projek_id', $projek->id)->count();
            $this->data['counttanah'] = $counttanah = Stesen::where('jenis_pengawasan_id', 4)->where('projek_id', $projek->id)->count();
            $this->data['countairlarian'] = $countairlarian = Stesen::where('jenis_pengawasan_id', 5)->where('projek_id', $projek->id)->count();
            $this->data['countudara'] = $countudara = Stesen::where('jenis_pengawasan_id', 6)->where('projek_id', $projek->id)->count();
            $this->data['countbunyi'] = $countbunyi = Stesen::where('jenis_pengawasan_id', 7)->where('projek_id', $projek->id)->count();
            $this->data['countgetaran'] = $countgetaran = Stesen::where('jenis_pengawasan_id', 8)->where('projek_id', $projek->id)->count();
            $this->data['countdron'] = $countdron = Stesen::where('jenis_pengawasan_id', 9)->where('projek_id', $projek->id)->count();

            $this->data['stations'] = $stations = MasterStation::all();

            $EO = ProjekHasUser::leftJoin('model_has_role', 'projek_has_user.user_id', '=', 'model_has_role.model_id')
            ->where('model_has_role.role_id', 5)
            ->where('projek_has_user.projek_id', $projekUser->projek_id)
            ->get();
            $detailEO = [];
            foreach ($EO as $value) {
                $usereo = User::select('name', 'username')->where('id', $value->user_id)->where('user_status_id', 1)->whereNotNull('username')->first();
                if ($usereo) {
                    $detailEO[] = $usereo;
                }
            }
            $this->data['detailEO'] = $detailEO;

            $EMC = ProjekHasUser::leftJoin('model_has_role', 'projek_has_user.user_id', '=', 'model_has_role.model_id')
            ->where('model_has_role.role_id', 6)
            ->where('projek_has_user.projek_id', $projekUser->projek_id)
            ->get();

            $detailEMC = [];
            foreach ($EMC as $value1) {
                $useremc = User::select('name', 'username')->where('id', $value1->user_id)->where('user_status_id', 1)->whereNotNull('username')->first();
                if ($useremc) {
                    $detailEMC[] = $useremc;
                }
            }
            $this->data['detailEMC'] = $detailEMC;
            $this->data['project_activity'] = $project_activity = MasterProjectActivity::all();

            $this->data['countStesen'] = $countStesen = Stesen::where('projek_id', $projek->id)->count();

            $this->data['countFasa'] = $countFasa = ProjekFasa::where('projek_id', $projek->id)->count();

            if ($request->ajax()) {
                $pakej = ProjekPakej::where('projek_id', $projek->id)->where('nama_pakej', '!=', 'Tidak Berpakej / Tidak Berfasa')->get();
                return datatables()->of($pakej)
                ->editColumn('nama_pakej', function ($pakej) {
                    $pakejNama = "";
                    if ($pakej->nama_pakej) {
                        $pakejNama .= $pakej->nama_pakej;
                    }

                    return strtoupper($pakejNama);
                })
                ->editColumn('kontraktor', function ($pakej) {
                    $pakejKontraktor = "";
                    if ($pakej->kontraktor) {
                        $pakejKontraktor .= $pakej->kontraktor;
                    }

                    return strtoupper($pakejKontraktor);
                })
                ->editColumn('negeri', function ($pakej) {
                    $pakejNegeri = "";
                    if ($pakej->pakej_negeri) {
                        $pakejNegeri .= $pakej->projekState->name;
                    }

                    return strtoupper($pakejNegeri);
                })
                ->editColumn('alamat', function ($pakej) {
                    $pakejAlamat = "";
                    if ($pakej->alamat) {
                        $pakejAlamat .= $pakej->alamat;
                    }

                    return strtoupper($pakejAlamat);
                })
                ->editColumn('tarikh_mula', function ($pakej) {
                    $tarikh_mula = "";
                    if ($pakej->tarikh_mula) {
                        $tarikh_mula .= date("d/m/Y", strtotime($pakej->tarikh_mula));
                    }

                    return strtoupper($tarikh_mula);
                })
                ->editColumn('tarikh_akhir', function ($pakej) {
                    $tarikh_akhir = "";
                    if ($pakej->tarikh_akhir) {
                        $tarikh_akhir .= date("d/m/Y", strtotime($pakej->tarikh_akhir));
                    }

                    return strtoupper($tarikh_akhir);
                })
                ->editColumn('action', function ($pakej) {
                    $button = "";
                    $button .= '<a onclick="pengawasan(' . $pakej->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Maklumat EO/EMC</a>';
                    $button .= '<a onclick="editfasa(' . $pakej->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini Pakej</a>';
                    $button .= '<a onclick="removepakej(' . $pakej->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Padam</a>';

                    return $button;
                })
                ->make(true);
            }
        }
        return view('projek.daftar_projek_backup_19112020_1126PM', $this->data);
    }
    public function editpakej(Request $request)
    {
        $projekPakej = ProjekPakej::findOrFail($request->id);
        return response()->json(['status' => 'success', 'title' => '', 'projekPakej' => $projekPakej]);
    }

    public function buangpakej(Request $request)
    {
        $projekPakej = ProjekPakej::findOrFail($request->id);
        $projekPakej->delete();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
    }

    public function buangFasa(Request $request)
    {
        $projekFasa = ProjekFasa::findOrFail($request->id);
        $projekFasa->delete();
        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
    }

    public function buangemp(Request $request)
    {
        $ProjekEMP = ProjekEMP::findOrFail($request->id);

        if ($ProjekEMP) {
            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 6;
            $log->description = "Padam Data Pakej";
            $log->data_old = json_encode($ProjekEMP);
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        $ProjekEMP->delete();
        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
    }

    public function buangStesen(Request $request)
    {
        $Stesen = Stesen::findOrFail($request->id);
        $Stesen->delete();
        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
    }

    public function buangStesen1(Request $request)
    {
        $Stesen = PenambahanStesen::findOrFail($request->id);
        $Stesen->delete();
        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
    }

    public function EMP(Request $request)
    {
//dd($request);

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 4;
        $log->description = "Tambah Data EMP";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();
        $user = auth()->id();
        $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id', $user)->first();
        $projek_id = $projek->projek_id;

        $emp = new ProjekEMP();
        $emp->projek_id = $projek_id;

        $date1 = strtr($request->tarikh_kelulusan, '/', '-');
        $tarikh_kelulusan = date("Y-m-d", strtotime($date1));
        $emp->tarikh_kelulusan = $tarikh_kelulusan;

        $emp->laporan = $request->laporan;
        $emp->jururunding = $request->jururunding;
        $emp->No_Rujukan = $request->No_Rujukan;
        $emp->save();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data baru berjaya ditambah.']);
    }

    public function getFasa(Request $request)
    {

        if ($request->ajax()) {

            $projekFasa = ProjekFasa::where('projek_id', $request->id)->orderBy('id')->get();

            return datatables()->of($projekFasa)
            ->editColumn('nama_fasa', function ($projekFasa) {
                if ($projekFasa->nama_fasa) {
                    return strtoupper($projekFasa->nama_fasa);
                } else {
                    return '-';
                }
            })
            ->editColumn('action', function ($projekFasa) {
                $button = "";
                $button .= '<a onclick="editfasa(' . $projekFasa->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                $button .= '<a onclick="removefasa(' . $projekFasa->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Padam</a>';
                return $button;
            })
            ->make(true);
        }
        return view('projek.daftar_projek', compact('audit'));
    }

    public function getTidakPakej(Request $request)
    {

        $pakej = ProjekPakej::where('projek_id', $request->id)->where('nama_pakej', "Tidak Berpakej / Tidak Berfasa")->first();
        if ($pakej) {
            $pengawasan = MasterPengawasan::all();
            foreach ($pengawasan as $pengawasans) {
                $PakejHasPengawasan = PakejHasPengawasan::where('pakej_id', $pakej->id)->where('pengawasan_id', $pengawasans->id)->first();
                if (!$PakejHasPengawasan) {
                    $PakejHasPengawasan = new PakejHasPengawasan();
                    $PakejHasPengawasan->pakej_id = $pakej->id;
                    $PakejHasPengawasan->pengawasan_id = $pengawasans->id;
                    $PakejHasPengawasan->save();
                }
            }

            if ($request->ajax()) {
                $projekFasa = ProjekPakej::where('projek_id', $request->id)->where('nama_pakej', "Tidak Berpakej / Tidak Berfasa")->get();
                return datatables()->of($projekFasa)
                ->editColumn('nama_fasa', function ($projekFasa) {
                    if ($projekFasa->nama_pakej) {
                        return strtoupper($projekFasa->nama_pakej);
                    } else {
                        return '-';
                    }
                })
                ->editColumn('action', function ($projekFasa) {
                    $button = "";
                    $projek = Projek::where('id', $projekFasa->projek_id)->first();
                    if ($projek->status == 1) {
                        $button .= '<a onclick="pengawasan(' . $projekFasa->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                    } else {
                        $button .= '<a onclick="pengawasan(' . $projekFasa->id . ')" href="javascript:;" class="btn btn-primary btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Lihat Pengawasan Tidak Berpakej/ Tidak Berfasa</a>';
                    }
                    return $button;
                })
                ->make(true);
            }
        }

    }

    public function getTarikhAudit(Request $request)
    {

        if ($request->ajax()) {
            $audit = ProjekAudit::where('projek_id', $request->id)->get();

            return datatables()->of($audit)
            ->editColumn('tarikh', function ($audit) {
                return $audit->tarikh_audit;

            })
            ->editColumn('action', function ($audit) {
                $button = "";
                $button .= '<a onclick="editaudit(' . $audit->id . ')" href="javascript:;" class="btn btn-default btn-xs mb-1 m-l-5"><i class="fa fa-edit"></i> Kemaskini</a>';
                return $button;
            })

            ->editColumn('status', function ($audit) {

                return $audit->status_pengawasan->name;

            })

            ->editColumn('kekerapan', function ($audit) {

                return $audit->audit->name;
            })

            ->editColumn('rujukan', function ($audit) {

                return $audit->no_rujukan;
            })

            ->make(true);
        }
        return view('projek.daftar_projek', compact('audit'));
    }

    public function kemaskiniaudit1(Request $request)
    {
        $this->data['master_bulan'] = $master_bulan = MasterMonth::all();
        $current_year = "2020";
        $range_of_year = '5';

        $years = array_combine(range(date("Y"), 2070), range(date("Y"), 2070));
        $this->data['master_tahun'] = $years;
        $this->data['audit'] = $audit = ProjekAudit::where('projek_id', $request->id)->first();
        $this->data['frequent'] = $request->frequent;
        return view('projek.editaudit1', $this->data);
    }

    public function audit(Request $request)
    {

        dd($request);
        $audit = ProjekAudit::where('projek_id', $request->id)->get();

        $audit->tarikh_audit = $request->tarikh_audit;
        $audit->no_rujukan = $request->no_rujukan;
        $audit->kekerapan_audit = $request->no_rujukan;
        $audit->status_kemajuan = $request->peringkatPengawasan;
        $audit->save();

    }

    public function kemaskiniaudit(Request $request)
    {
        $audit = ProjekAudit::where('projek_id', $request->id)->get();

        $this->data['master_bulan'] = $master_bulan = MasterMonth::all();
        $current_year = "2020";
        $range_of_year = '5';

        $years = array_combine(range(date("Y"), 2070), range(date("Y"), 2070));
        $this->data['master_tahun'] = $years;
        $this->data['audit'] = $audit = ProjekAudit::where('id', $request->id)->first();
        return view('projek.editaudit', $this->data);
    }

    public function kemaskinifasa(Request $request)
    {
        $this->data['fasa'] = $fasa = ProjekPakej::where('id', $request->id)->first();
        $this->data['states'] = $states = MasterState::all();
        return view('projek.editfasa', $this->data);
    }

    public function kemaskinistesen(Request $request)
    {
        $this->data['stesen'] = $stesen = Stesen::where('id', $request->id)->first();
        $this->data['parameter'] = $parameter = Parameter::where('stesen_id', $stesen->id)->where('mode', 'mandatory')->get();
        if ($stesen->jenis_pengawasan_id != 7) {
            $parameter2 = Parameter::where('stesen_id', $stesen->id)->where('mode', 'mandatory')->first();
            $version = MasterParameter::where('id', $parameter2->parameter)->first();
//$this->data['masterstandard'] = $masterstandard = MasterStandard::all();
        }
        if ($stesen->jenis_pengawasan_id == 2) {
            $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->where('versi', '=', $version->versi)->where('mode', 'mandatory')->first();
            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
            ->where('jenis_parameter', $masterparameter->id)
            ->get();
        } elseif ($stesen->jenis_pengawasan_id == 4) {
            $class_data = MasterParameter::leftJoin('master_standard', 'master_parameter.id', '=', 'master_standard.jenis_parameter')

            ->select(['class'])
            ->where('jenis_pengawasan', $stesen->jenis_pengawasan_id)
            ->distinct()
            ->get();
            $masterStandardID = array();
            foreach ($class_data as $key => $class_datas) {
                $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->where('mode', 'mandatory')->first();
                $masterstandard = MasterStandard::where('jenis_parameter', $masterparameter->id)
                ->get();
                foreach ($masterstandard as $key => $value) {
                    $masterStandardID[] = $value->id;
                }

            }

            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
            ->whereIn('id', $masterStandardID)
            ->get();
//dd($masterstandard);
        } elseif ($stesen->jenis_pengawasan_id == 7) {
            $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->first();
            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
            ->where('jenis_parameter', $masterparameter->id)
            ->get();
        } else {
            $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->where('mode', 'mandatory')->first();
            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
            ->where('jenis_parameter', $masterparameter->id)
            ->get();
        }
//$masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
        //dd($masterparameter);

        $this->data['parameter_standard'] = $parameter_standard = Parameter::where('stesen_id', $stesen->id)->where('mode', 'mandatory')->first();
//dd($masterstandard);

        return view('projek.editstesen', $this->data);
    }

    public function kemaskinistesen1(Request $request, $pakejid, $projekid)
    {

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Data Stesen";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $pakejidarray = explode(".", $pakejid);
        $pakejidarraycount = count($pakejidarray);

        if ($pakejidarraycount == 2) {
            $StesenPengawasanStatus = StesenPengawasanStatus::where('projek_id', $projekid)->where('pakej_id', $pakejidarray[1])->first();
            $status_id = $StesenPengawasanStatus->status_id;
        } else {
            $status_id = 1;
        }
        if ($status_id != 9) {
            $this->data['stesen'] = $stesen = Stesen::where('id', $pakejidarray[0])->first();
            $stesen_status = StesenPengawasanStatus::where('pakej_id', $stesen->projek_pakej_id)->where('projek_id', $stesen->projek_id)->first();
            $this->data['stesen_status'] = $stesen_status->status_id;
            $this->data['type'] = 1;
            if ($stesen->jenis_pengawasan_id == 1) {
                $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->first();
                $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
                ->where('jenis_parameter', $masterparameter->id)
                ->get();
                $negeris = $stesen->projek->jasfail->jasdetail->negeri_nama->name;
                if ($negeris == 'Pulau Pinang') {
                    $negeris = 'P.Pinang';
                }
                if ($negeris == 'Negeri Sembilan') {
                    $negeris = 'N.SEMBILAN';
                }
                $lembangan = MasterSungai::where('negeri', $negeris)->groupBy('lembangan_2020')->get();
                $sungai = MasterSungai::where('negeri', $negeris)->groupBy('sungai_2020')->get();
                $this->data['lembangan'] = $lembangan;
                $this->data['sungai'] = $sungai;
            } else if ($stesen->jenis_pengawasan_id == 2) {
                if ($stesen->versi == 1) {
                    $versi = 'lama';
                } else {
                    $versi = 'baru';
                }
                $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->where('versi', '=', $versi)->first();
                $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
                ->where('jenis_parameter', $masterparameter->id)
                ->whereNotIn('class', ['Sentuhan Prima', 'Sentuhan Sekunder'])
                ->get();

            } elseif ($stesen->jenis_pengawasan_id == 4) {
                $class_data = MasterParameter::leftJoin('master_standard', 'master_parameter.id', '=', 'master_standard.jenis_parameter')

                ->select(['class'])
                ->where('jenis_pengawasan', $stesen->jenis_pengawasan_id)
                ->distinct()
                ->get();
                $masterStandardID = array();
                foreach ($class_data as $key => $class_datas) {
                    $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->where('mode', 'mandatory')->first();
                    $masterstandard = MasterStandard::where('jenis_parameter', $masterparameter->id)
                    ->get();
                    foreach ($masterstandard as $key => $value) {
                        $masterStandardID[] = $value->id;
                    }

                }

                $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
                ->whereIn('id', $masterStandardID)
                ->get();
//dd($masterstandard);
            } elseif ($stesen->jenis_pengawasan_id == 7) {
                $this->data['masterparameter'] = $masterparameter = MasterParameter::select(['id', 'schedule'])->where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->groupBy('schedule')->get();

                $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->first();
                $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
                ->where('jenis_parameter', $masterparameter->id)
                ->get();
            } elseif ($stesen->jenis_pengawasan_id == 9) {

            } else {
                $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->first();
                $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
                ->where('jenis_parameter', $masterparameter->id)
                ->get();
            }
            $this->data['parameter_standard'] = $parameter_standard = Parameter::where('stesen_id', $stesen->id)->where('mode', 'mandatory')->first();

        } //statusstesenselesai
        else {
            $this->data['stesen'] = $stesen = PenambahanStesen::where('id', $pakejidarray[0])->first();
            $this->data['type'] = 2;
            if ($stesen->jenis_pengawasan_id == 2) {
                if ($stesen->versi == 1) {
                    $versi = 'lama';
                } else {
                    $versi = 'baru';
                }
                $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->where('versi', '=', $versi)->first();
                $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
                ->where('jenis_parameter', $masterparameter->id)
                ->whereNotIn('class', ['Sentuhan Prima', 'Sentuhan Sekunder'])
                ->get();

            } elseif ($stesen->jenis_pengawasan_id == 4) {
                $class_data = MasterParameter::leftJoin('master_standard', 'master_parameter.id', '=', 'master_standard.jenis_parameter')

                ->select(['class'])
                ->where('jenis_pengawasan', $stesen->jenis_pengawasan_id)
                ->distinct()
                ->get();
                $masterStandardID = array();
                foreach ($class_data as $key => $class_datas) {
                    $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->where('mode', 'mandatory')->first();
                    $masterstandard = MasterStandard::where('jenis_parameter', $masterparameter->id)
                    ->get();
                    foreach ($masterstandard as $key => $value) {
                        $masterStandardID[] = $value->id;
                    }

                }

                $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
                ->whereIn('id', $masterStandardID)
                ->get();
//dd($masterstandard);
            } elseif ($stesen->jenis_pengawasan_id == 7) {
                $this->data['masterparameter'] = $masterparameter = MasterParameter::select(['id', 'schedule'])->where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->groupBy('schedule')->get();

                $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->first();
                $this->data['masterstandard'] = $masterstandard = MasterStandardBunyi::select(['id', 'class'])
                ->where('jenis_parameter', $masterparameter->id)
                ->get();
            } elseif ($stesen->jenis_pengawasan_id == 9) {

            } else {
                $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->first();
                $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
                ->where('jenis_parameter', $masterparameter->id)
                ->get();
            }
//$masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
            //dd($masterparameter);

            $this->data['parameter_standard'] = $parameter_standard = PenambahanParameter::where('stesen_id', $stesen->id)->where('mode', 'mandatory')->first();
//dd($masterstandard);

        }

        return view('projek.editstesen1', $this->data);
    }

    public function kemaskinistesen2(Request $request, $pakejid, $projekid)
    {
        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Data Stesen";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $pakejidarray = explode(".", $pakejid);
        $pakejidarraycount = count($pakejidarray);

        if ($pakejidarraycount == 2) {
            $StesenPengawasanStatus = PenambahanStesenStatus::where('projek_id', $projekid)->where('pakej_id', $pakejidarray[1])->first();
            $status_id = $StesenPengawasanStatus->status_id;
        } else {
            $status_id = 1;
        }
        if ($status_id != 9) {
            $this->data['stesen'] = $stesen = PenambahanStesen::where('id', $pakejidarray[0])->first();
            $stesen_status = PenambahanStesenStatus::where('pakej_id', $stesen->projek_pakej_id)->where('projek_id', $stesen->projek_id)->first();
            $this->data['stesen_status'] = $stesen_status->status_id;
            $this->data['type'] = 2;
            if ($stesen->jenis_pengawasan_id == 1) {
                $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->first();
                $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
                ->where('jenis_parameter', $masterparameter->id)
                ->get();
                $negeris = $stesen->projek->jasfail->jasdetail->negeri_nama->name;
                if ($negeris == 'Pulau Pinang') {
                    $negeris = 'P.Pinang';
                }
                $lembangan = MasterSungai::where('negeri', $negeris)->groupBy('lembangan_2020')->get();
                $sungai = MasterSungai::where('negeri', $negeris)->groupBy('sungai_2020')->get();
                $this->data['lembangan'] = $lembangan;
                $this->data['sungai'] = $sungai;
            } else if ($stesen->jenis_pengawasan_id == 2) {
                if ($stesen->versi == 1) {
                    $versi = 'lama';
                } else {
                    $versi = 'baru';
                }
                $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->where('versi', '=', $versi)->first();
                $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
                ->where('jenis_parameter', $masterparameter->id)
                ->whereNotIn('class', ['Sentuhan Prima', 'Sentuhan Sekunder'])
                ->get();

            } elseif ($stesen->jenis_pengawasan_id == 4) {
                $class_data = MasterParameter::leftJoin('master_standard', 'master_parameter.id', '=', 'master_standard.jenis_parameter')

                ->select(['class'])
                ->where('jenis_pengawasan', $stesen->jenis_pengawasan_id)
                ->distinct()
                ->get();
                $masterStandardID = array();
                foreach ($class_data as $key => $class_datas) {
                    $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->where('mode', 'mandatory')->first();
                    $masterstandard = MasterStandard::where('jenis_parameter', $masterparameter->id)
                    ->get();
                    foreach ($masterstandard as $key => $value) {
                        $masterStandardID[] = $value->id;
                    }

                }

                $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
                ->whereIn('id', $masterStandardID)
                ->get();
//dd($masterstandard);
            } elseif ($stesen->jenis_pengawasan_id == 7) {
                $this->data['masterparameter'] = $masterparameter = MasterParameter::select(['id', 'schedule'])->where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->groupBy('schedule')->get();

                $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->first();
                $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
                ->where('jenis_parameter', $masterparameter->id)
                ->get();
            } elseif ($stesen->jenis_pengawasan_id == 9) {

            } else {
                $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->first();
                $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
                ->where('jenis_parameter', $masterparameter->id)
                ->get();
            }
            $this->data['parameter_standard'] = $parameter_standard = Parameter::where('stesen_id', $stesen->id)->where('mode', 'mandatory')->first();

        } //statusstesenselesai
        else {
            $this->data['stesen'] = $stesen = PenambahanStesen::where('id', $pakejidarray[0])->first();
            $this->data['type'] = 2;
            if ($stesen->jenis_pengawasan_id == 2) {
                if ($stesen->versi == 1) {
                    $versi = 'lama';
                } else {
                    $versi = 'baru';
                }
                $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->where('versi', '=', $versi)->first();
                $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
                ->where('jenis_parameter', $masterparameter->id)
                ->whereNotIn('class', ['Sentuhan Prima', 'Sentuhan Sekunder'])
                ->get();

            } elseif ($stesen->jenis_pengawasan_id == 4) {
                $class_data = MasterParameter::leftJoin('master_standard', 'master_parameter.id', '=', 'master_standard.jenis_parameter')

                ->select(['class'])
                ->where('jenis_pengawasan', $stesen->jenis_pengawasan_id)
                ->distinct()
                ->get();
                $masterStandardID = array();
                foreach ($class_data as $key => $class_datas) {
                    $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->where('mode', 'mandatory')->first();
                    $masterstandard = MasterStandard::where('jenis_parameter', $masterparameter->id)
                    ->get();
                    foreach ($masterstandard as $key => $value) {
                        $masterStandardID[] = $value->id;
                    }

                }

                $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
                ->whereIn('id', $masterStandardID)
                ->get();
//dd($masterstandard);
            } elseif ($stesen->jenis_pengawasan_id == 7) {
                $this->data['masterparameter'] = $masterparameter = MasterParameter::select(['id', 'schedule'])->where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->groupBy('schedule')->get();

                $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->first();
                $this->data['masterstandard'] = $masterstandard = MasterStandardBunyi::select(['id', 'class'])
                ->where('jenis_parameter', $masterparameter->id)
                ->get();
            } elseif ($stesen->jenis_pengawasan_id == 9) {

            } else {
                $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->first();
                $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
                ->where('jenis_parameter', $masterparameter->id)
                ->get();
            }
//$masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
            //dd($masterparameter);

            $this->data['parameter_standard'] = $parameter_standard = PenambahanParameter::where('stesen_id', $stesen->id)->where('mode', 'mandatory')->first();
//dd($masterstandard);

        }

        return view('projek.editstesen1', $this->data);
    }

    public function map(Request $request)
    {
        $this->data['stesen'] = $stesen = Stesen::where('id', $request->id)->first();

        return view('projek.map', $this->data);
    }

    public function addparametersg1(Request $request, $pakejid, $projekid)
    {

        $pakejidarray = explode(".", $pakejid);
        $pakejidarraycount = count($pakejidarray);
        if ($pakejidarraycount == 2) {
            $StesenPengawasanStatus = StesenPengawasanStatus::where('projek_id', $projekid)->where('pakej_id', $pakejidarray[1])->first();
            $status_id = $StesenPengawasanStatus->status_id;
        } else {
            $status_id = 1;
        }

        if ($status_id != 9) {

            $this->data['type'] = 1;
            $this->data['stesen'] = $stesen = Stesen::where('id', $pakejidarray[0])->first();
            $this->data['pengawasan_id'] = $pengawasan_id = $stesen->jenis_pengawasan_id;
            $stesen_statusdata = StesenPengawasanStatus::where('projek_id', $stesen->projek_id)->first();
            $this->data['stesen_status'] = $stesen_statusdata->status_id;
            if (in_array($stesen->jenis_pengawasan_id, [2])) {
                $this->data['parameters'] = $parameters = Parameter::with('jenisstandard')->where('stesen_id', $stesen->id)->orderBy('mode')->orderBy('parameter')->get();
            } else {
                $this->data['parameters'] = $parameters = Parameter::with('jenisstandard')->where('stesen_id', $stesen->id)->orderBy('mode')->orderBy('parameter')->get();
            }
        } else {
            $this->data['type'] = 2;
            $this->data['stesen'] = $stesen = PenambahanStesen::where('id', $pakejidarray[0])->first();
            $this->data['pengawasan_id'] = $pengawasan_id = $stesen->jenis_pengawasan_id;
            $stesen_statusdata = PenambahanStesenStatus::where('projek_id', $stesen->projek_id)->first();
            $this->data['stesen_status'] = $stesen_statusdata->status_id;
            if (in_array($stesen->jenis_pengawasan_id, [2])) {
                $this->data['parameters'] = $parameters = PenambahanParameter::with('jenisstandard')->where('stesen_id', $stesen->id)->orderBy('mode')->get();
            } else {

                $this->data['parameters'] = $parameters = PenambahanParameter::with('jenisstandard')->where('stesen_id', $stesen->id)->orderBy('mode')->get();
            }
        }

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 3;
        $log->description = "Papar Modal Parameter";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();
        return view('projek.editparameter1', $this->data);

    }

    public function addparametersg2(Request $request, $pakejid, $projekid)
    {
        $pakejidarray = explode(".", $pakejid);
        $pakejidarraycount = count($pakejidarray);

        if ($pakejidarraycount == 2) {
            $StesenPengawasanStatus = StesenPengawasanStatus::where('projek_id', $projekid)->where('pakej_id', $pakejidarray[1])->first();
            $status_id = $StesenPengawasanStatus->status_id;
        } else {
            $status_id = 1;
        }
        $this->data['status'] = $status_id;
        if ($status_id != 9) {

            $this->data['type'] = 1;
            $this->data['stesen'] = $stesen = Stesen::where('id', $pakejidarray[0])->first();
            $this->data['pengawasan_id'] = $pengawasan_id = $stesen->jenis_pengawasan_id;

            if (in_array($stesen->jenis_pengawasan_id, [2])) {
                $this->data['parameters'] = $parameters = Parameter::with('jenisstandard')->where('stesen_id', $stesen->id)->orderBy('standard')->orderBy('mode')->get();
            } else {
                $this->data['parameters'] = $parameters = Parameter::with('jenisstandard')->where('stesen_id', $stesen->id)->orderBy('mode')->get();
            }
        } else {
            $this->data['type'] = 2;

            $this->data['stesen'] = $stesen = PenambahanStesen::where('id', $pakejidarray[0])->first();
            if (in_array($stesen->jenis_pengawasan_id, [2])) {

                $this->data['parameters'] = $parameters = PenambahanParameter::with('jenisstandard')->where('stesen_id', $stesen->id)->orderBy('standard')->orderBy('mode')->get();
            } else {
                $this->data['parameters'] = $parameters = PenambahanParameter::with('jenisstandard')->where('stesen_id', $stesen->id)->orderBy('mode')->get();
            }
        }

        if (in_array($stesen->jenis_pengawasan_id, [7])) {
            if (preg_match('/Schedule 1/', $stesen->class) == 1) {
                $schedule = 1;
            }
            if (preg_match('/Schedule 2/', $stesen->class) == 1) {
                $schedule = 2;
            }
            if (preg_match('/Schedule 3/', $stesen->class) == 1) {
                $schedule = 3;
            }
            if (preg_match('/Schedule 4/', $stesen->class) == 1) {
                $schedule = 4;
            }
            if (preg_match('/Schedule 5/', $stesen->class) == 1) {
                $schedule = 5;
            }
            if (preg_match('/Schedule 6/', $stesen->class) == 1) {
                $schedule = 6;
            }
            $this->data['schedule'] = $schedule;
            $this->data['parameterbunyi'] = $parameterbunyi = ParameterBunyi::where('stesen_id', $stesen->id)->where('schedule', $schedule)->get();
            if (count($parameterbunyi) == 0) {
                $this->data['parameterbunyidata'] = 0;
            } else {
                $this->data['parameterbunyidata'] = 1;
            }
        }
        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 3;
        $log->description = "Papar Modal Parameter";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return view('projek.editparameter2', $this->data);

    }

    public function addparametersg(Request $request)
    {

        $this->data['parameters'] = $parameters = MasterParameter::where('jenis_pengawasan', 1)->get();
        $this->data['stesen_id'] = $request->id;
        $this->data['stesen'] = $stesen = Stesen::where('id', $request->id)->first();
        $this->data['masterpengawasan'] = $masterpengawasan = MasterPengawasan::where('id', '=', $stesen->jenis_pengawasan_id)->first();
//dd($masterpengawasan);

//$this->data['masterstandard'] = $masterstandard = MasterStandard::all();

        if ($stesen->jenis_pengawasan_id == 2) {
            $this->data['masterparameter'] = $masterparameter = MasterParameter::where('jenis_pengawasan', '=', $stesen->jenis_pengawasan_id)->where('versi', '=', 'baru')->get();
            $parameter2 = Parameter::where('stesen_id', $stesen->id)->where('mode', 'mandatory')->first();
            $version = MasterParameter::where('id', $parameter2->parameter)->first();
            $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->where('versi', '=', $version->versi)->first();
            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])

            ->where('jenis_parameter', $masterparameter->id)
            ->get();

        } elseif ($stesen->jenis_pengawasan_id == 4) {
            $class_data = MasterParameter::leftJoin('master_standard', 'master_parameter.id', '=', 'master_standard.jenis_parameter')
            ->select(['class'])
            ->where('jenis_pengawasan', $stesen->jenis_pengawasan_id)
            ->distinct()
            ->get();
            $masterStandardID = array();
            foreach ($class_data as $key => $class_datas) {
                $masterstandard = MasterStandard::select(['id'])
                ->where('class', $class_datas->class)
                ->first();
                $masterStandardID[] = $masterstandard->id;
            }

            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
            ->whereIn('id', $masterStandardID)
            ->get();

            $this->data['masterparameter'] = $masterparameter = MasterParameter::where('jenis_pengawasan', '=', $stesen->jenis_pengawasan_id)->where('versi', '=', 'lama')->get();
//dd($masterstandard);
        } else {
            $this->data['masterparameter'] = $masterparameter = MasterParameter::where('jenis_pengawasan', '=', $stesen->jenis_pengawasan_id)->where('versi', '=', 'lama')->get();
            $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->first();
            $this->data['masterstandard'] = $masterstandard = MasterStandard::select(['id', 'class'])
            ->where('jenis_parameter', $masterparameter->id)
            ->get();
        }
//$masterparameter = MasterParameter::where('jenis_pengawasan',$stesen->jenis_pengawasan_id)->first();
        //dd($masterparameter);

        return view('projek.editparameter', $this->data);
    }

    public function standardlisted(Request $request)
    {

        $value_class = MasterStandard::where('id', '=', $request->standard)->first();

        $masterstandard = MasterStandard::where('class', '=', $value_class->class)->where('jenis_parameter', '=', $request->parameter_id)->first();

        return response()->json(['status' => 'success', 'masterstandard' => $masterstandard]);
    }

    public function standardlisted2(Request $request)
    {
        $parameter = MasterParameter::where('id', $request->parameter_id)->first();
        $schedule = MasterParameter::where('schedule', $parameter->id)->get();

        $masterstandard = MasterStandard::where('schedule', '=', $schedule->schedule)->where('jenis_parameter', '=', $request->parameter_id)->first();

        return response()->json(['status' => 'success', 'masterstandard' => $masterstandard]);
    }

    public function schedulelisted(Request $request)
    {
        $value_class = MasterParameter::where('schedule', '=', $request->schedule_id)->first();

        return response()->json(['status' => 'success', 'value_class' => $value_class]);
    }

    public function showbaseline(Request $request)
    {
//$databaseline = MasterStandard::where('class','=',$request->standard)->get();
        $stesen = Stesen::where('id', $request->stesenid)->first();
        $parameter = Parameter::where('stesen_id', $stesen->id)->where('mode', 'mandatory')->get();
        $class = MasterStandard::where('id', '=', $request->standard)->first();
//dd($class->class);
        $idname = array();
        $dataBaseline = array();
        foreach ($parameter as $key => $parameterSungai) {
            $databaseline = MasterStandard::where('jenis_parameter', '=', $parameterSungai->parameter)->where('class', '=', $class->class)->first();
            if ($databaseline) {
                $newvalue = $databaseline->parameter;
            } else {
                $newvalue = 0;
            }
//dd($newvalue);
            $idname[] = "baseline" . $parameterSungai->parameter;
            $dataBaseline[] = $newvalue;

        }

        return response()->json(['title' => '', 'idname' => $idname, 'iddata' => $dataBaseline]);
    }

    public function getParameterSungai(Request $request)
    {

        if ($request->ajax()) {
            $stesen = Parameter::where('stesen_id', $request->id)->where('mode', 'optional')->get();

            return datatables()->of($stesen)
            ->editColumn('parameter', function ($stesen) {

                return $stesen->jenisparameter->jenis_parameter;
            })
            ->editColumn('standard', function ($stesen) {

                return $stesen->jenisstandard->class;

            })
            ->editColumn('baseline', function ($stesen) {

                return $stesen->baseline;
            })
            ->editColumn('action', function ($stesen) {
                $button = "";
                $button .= '<a onclick="remove(' . $stesen->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Padam</a>';
                return $button;
            })
            ->make(true);
        } else {

        }
        return view('projek.editparameter');
    }

    public function updateparametersg(Request $request)
    {

        $parameter = new Parameter();
        $parameter->stesen_id = $request->stesen_id;
        $parameter->parameter = $request->parameter;
        $parameter->standard = $request->standard;
        $parameter->baseline = $request->baseline;
        $parameter->save();

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Data Parameter";
        $log->data_old = json_encode($parameter);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
    }

    public function updateparametersg1(Request $request)
    {
        if ($request->type == 2) {
            $dataparameter = PenambahanParameter::where('stesen_id', '=', $request->id)->get();
        } else {
            $dataparameter = Parameter::where('stesen_id', '=', $request->id)->get();
        }
        $stesen = Stesen::where('id', $request->id)->first();

        foreach ($dataparameter as $key => $dataparameters) {
            $request_paramter_id = $request->parameter_id + $dataparameters->parameter;
            if ($dataparameters->parameter == $request_paramter_id) {
//$update_standard = "standard".$dataparameters->parameter;
                //dd($dataparameters->parameter);
                if ($request->jenis_pengawasan_id == 2) {
                    $classID = MasterStandard::where('id', '=', $dataparameters->standard)->first();
                } else {
                    $classID = MasterStandard::where('jenis_parameter', '=', $dataparameters->parameter)->where('class', $stesen->class)->first();
                }
                //dd($classID);
                $update_baselineeia = "baselineeia" . $dataparameters->parameter;
                $update_baselineemp = "baselineemp" . $dataparameters->parameter;
                if ($request->jenis_pengawasan_id == 8) {
                    $update_standard = "standard" . $dataparameters->parameter;
                }
                if ($request->type == 2) {
                    $update_parameter = PenambahanParameter::where('stesen_id', '=', $request->id)->where('parameter', '=', $dataparameters->parameter)->first();
                } else {
                    $update_parameter = Parameter::where('stesen_id', '=', $request->id)->where('parameter', '=', $dataparameters->parameter)->first();
                }
                if ($classID) {
                    $update_parameter->standard = $classID->id;
                } else {
                    $update_parameter->standard = 0;
                }
                $update_parameter->baselineeia = $request->$update_baselineeia;
                $update_parameter->baselineemp = $request->$update_baselineemp;
                if ($request->jenis_pengawasan_id == 8) {
                    $update_parameter->standard = $request->$update_standard;
                }
                $update_parameter->save();
            }
        }

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Data Parameter";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
    }

    public function updateparametersg2(Request $request)
    {
        $category = "";
        if ($request->jenis_pengawasan_id == 7) {
            if ($request->schedule == 1) {
                if (isset($request->baselinedaynoise) == true && isset($request->baselinenightnoise) == true) {
                    $category = 'noise';
                    $baselineday = $request->baselinedaynoise;
                    $baselinenight = $request->baselinenightnoise;
                }

                if (isset($request->baselinedaysuburrban) == true && isset($request->baselinenightsuburrban) == true) {
                    $category = 'suburban';
                    $baselineday = $request->baselinedaysuburrban;
                    $baselinenight = $request->baselinenightsuburrban;
                }

                if (isset($request->baselinedayurban) == true && isset($request->baselinenighturban) == true) {
                    $category = 'urban';
                    $baselineday = $request->baselinedayurban;
                    $baselinenight = $request->baselinenighturban;
                }

                if (isset($request->baselinedaycommercial) == true && isset($request->baselinenightcommercial) == true) {
                    $category = 'commercial';
                    $baselineday = $request->baselinedaycommercial;
                    $baselinenight = $request->baselinenightcommercial;
                }

                if (isset($request->baselinedayindustrial) == true && isset($request->baselinenightindustrial) == true) {
                    $category = 'industry';
                    $baselineday = $request->baselinedayindustrial;
                    $baselinenight = $request->baselinenightindustrial;
                }

                $standard = MasterStandardBunyi::where('schedule', $request->schedule)->where('categori', $category)->get();
                foreach ($standard as $keystandard => $valuestandard) {
                    if ($valuestandard->time == 'day') {
                        $standardday = $valuestandard->parameter;
                    } else if ($valuestandard->time == 'night') {
                        $standardnight = $valuestandard->parameter;
                    }
                }
                $parameterbunyidata = ParameterBunyi::where('stesen_id', $request->id)->first();
                if ($parameterbunyidata) {
                    $parameterbunyidata->delete();
                }
                $parameterbunyi = new ParameterBunyi;
                $parameterbunyi->stesen_id = $request->id;
                $parameterbunyi->schedule = $request->schedule;
                $parameterbunyi->category = $category;
                $parameterbunyi->standardday = $standardday;
                $parameterbunyi->standardnight = $standardnight;
                $parameterbunyi->baselineday = $baselineday;
                $parameterbunyi->baselinenight = $baselinenight;
                $parameterbunyi->save();
            } else if ($request->schedule == 2) {
                if (isset($request->baselinedaynoise) == true && isset($request->baselinenightnoise) == true) {
                    $category = 'noise';
                    $baselineday = $request->baselinedaynoise;
                    $baselinenight = $request->baselinenightnoise;
                }

                if (isset($request->baselinedaysuburrban) == true && isset($request->baselinenightsuburrban) == true) {
                    $category = 'suburban';
                    $baselineday = $request->baselinedaysuburrban;
                    $baselinenight = $request->baselinenightsuburrban;
                }

                if (isset($request->baselinedaycommercial) == true && isset($request->baselinenightcommercial) == true) {
                    $category = 'commercial';
                    $baselineday = $request->baselinedaycommercial;
                    $baselinenight = $request->baselinenightcommercial;
                }

                if (isset($request->baselinedayindustrial) == true && isset($request->baselinenightindustrial) == true) {
                    $category = 'industry';
                    $baselineday = $request->baselinedayindustrial;
                    $baselinenight = $request->baselinenightindustrial;
                }

                $standard = MasterStandardBunyi::where('schedule', $request->schedule)->where('categori', $category)->get();
                foreach ($standard as $keystandard => $valuestandard) {
                    if ($valuestandard->time == 'day') {
                        $standardday = $valuestandard->parameter;
                    } else if ($valuestandard->time == 'night') {
                        $standardnight = $valuestandard->parameter;
                    }
                }
                $parameterbunyidata = ParameterBunyi::where('stesen_id', $request->id)->first();
                if ($parameterbunyidata) {
                    $parameterbunyidata->delete();
                }
                $parameterbunyi = new ParameterBunyi;
                $parameterbunyi->stesen_id = $request->id;
                $parameterbunyi->schedule = $request->schedule;
                $parameterbunyi->category = $category;
                $parameterbunyi->standardday = $standardday;
                $parameterbunyi->standardnight = $standardnight;
                $parameterbunyi->baselineday = $baselineday;
                $parameterbunyi->baselinenight = $baselinenight;
                $parameterbunyi->save();
            } else if ($request->schedule == 3) {
                $parameterbunyidata = ParameterBunyi::where('stesen_id', $request->id)->first();
                if ($parameterbunyidata) {
                    $parameterbunyidata->delete();
                }
                $parameterbunyi = new ParameterBunyi;
                $parameterbunyi->stesen_id = $request->id;
                $parameterbunyi->schedule = $request->schedule;
                $parameterbunyi->baseline_exist_lvl = $request->existlvl;
                $parameterbunyi->baseline_new_lvl = $request->newlvl;
                $parameterbunyi->baseline_max_lvl = $request->maxlvl;
                $parameterbunyi->save();
            } else if ($request->schedule == 4) {
                if (isset($request->baselinedaynoise) == true && isset($request->baselinenightnoise) == true) {
                    $category = 'noise';
                    $baselineday = $request->baselinedaynoise;
                    $baselinenight = $request->baselinenightnoise;
                }

                if (isset($request->baselinedaysuburrban) == true && isset($request->baselinenightsuburrban) == true) {
                    $category = 'suburban';
                    $baselineday = $request->baselinedaysuburrban;
                    $baselinenight = $request->baselinenightsuburrban;
                }

                if (isset($request->baselinedayurban) == true && isset($request->baselinenighturban) == true) {
                    $category = 'urban';
                    $baselineday = $request->baselinedayurban;
                    $baselinenight = $request->baselinenighturban;
                }

                if (isset($request->baselinedaycommercial) == true && isset($request->baselinenightcommercial) == true) {
                    $category = 'commercial';
                    $baselineday = $request->baselinedaycommercial;
                    $baselinenight = $request->baselinenightcommercial;
                }

                if (isset($request->baselinedayindustrial) == true && isset($request->baselinenightindustrial) == true) {
                    $category = 'industry';
                    $baselineday = $request->baselinedayindustrial;
                    $baselinenight = $request->baselinenightindustrial;
                }

                $standard = MasterStandardBunyi::where('schedule', $request->schedule)->where('categori', $category)->get();
                foreach ($standard as $keystandard => $valuestandard) {
                    if ($valuestandard->time == 'day') {
                        $standardday = $valuestandard->parameter;
                    } else if ($valuestandard->time == 'night') {
                        $standardnight = $valuestandard->parameter;
                    }
                }
                $parameterbunyidata = ParameterBunyi::where('stesen_id', $request->id)->first();
                if ($parameterbunyidata) {
                    $parameterbunyidata->delete();
                }
                $parameterbunyi = new ParameterBunyi;
                $parameterbunyi->stesen_id = $request->id;
                $parameterbunyi->schedule = $request->schedule;
                $parameterbunyi->category = $category;
                $parameterbunyi->standardday = $standardday;
                $parameterbunyi->standardnight = $standardnight;
                $parameterbunyi->baselineday = $baselineday;
                $parameterbunyi->baselinenight = $baselinenight;
                $parameterbunyi->save();
            } else if ($request->schedule == 5) {
                if (isset($request->baselinedaynoise) == true && isset($request->baselinenightnoise) == true && isset($request->baselinemaxnoise) == true) {
                    $category = 'noise';
                    $baselineday = $request->baselinedaynoise;
                    $baselinenight = $request->baselinenightnoise;
                    $baselinemax = $request->baselinemaxnoise;
                }

                if (isset($request->baselinedaysuburrban) == true && isset($request->baselinenightsuburrban) == true && isset($request->baselinemaxsuburrban) == true) {
                    $category = 'suburban';
                    $baselineday = $request->baselinedaysuburrban;
                    $baselinenight = $request->baselinenightsuburrban;
                    $baselinemax = $request->baselinemaxsuburrban;
                }

                if (isset($request->baselinedaycommercial) == true && isset($request->baselinenightcommercial) == true && isset($request->baselinemaxcommercial) == true) {
                    $category = 'commercial';
                    $baselineday = $request->baselinedaycommercial;
                    $baselinenight = $request->baselinenightcommercial;
                    $baselinemax = $request->baselinemaxcommercial;
                }

                if (isset($request->baselinedayindustrial) == true && isset($request->baselinenightindustrial) == true && isset($request->baselinemaxindustrial) == true) {
                    $category = 'industry';
                    $baselineday = $request->baselinedayindustrial;
                    $baselinenight = $request->baselinenightindustrial;
                    $baselinemax = $request->baselinemaxindustrial;
                }

                $standard = MasterStandardBunyi::where('schedule', $request->schedule)->where('categori', $category)->get();
                foreach ($standard as $keystandard => $valuestandard) {
                    if ($valuestandard->time == 'day') {
                        $standardday = $valuestandard->parameter;
                    } else if ($valuestandard->time == 'night') {
                        $standardnight = $valuestandard->parameter;
                    } else if ($valuestandard->time == 'max') {
                        $standardmax = $valuestandard->parameter;
                    }
                }
                $parameterbunyidata = ParameterBunyi::where('stesen_id', $request->id)->first();
                if ($parameterbunyidata) {
                    $parameterbunyidata->delete();
                }
                $parameterbunyi = new ParameterBunyi;
                $parameterbunyi->stesen_id = $request->id;
                $parameterbunyi->schedule = $request->schedule;
                $parameterbunyi->category = $category;
                $parameterbunyi->standardday = $standardday;
                $parameterbunyi->standardnight = $standardnight;
                $parameterbunyi->standardmax = $standardmax;
                $parameterbunyi->baselineday = $baselineday;
                $parameterbunyi->baselinenight = $baselinenight;
                $parameterbunyi->baselinemax = $baselinemax;
                $parameterbunyi->save();
            } else if ($request->schedule == 6) {
                if (isset($request->baselinedayresidentl90) == true && isset($request->baselineeveningresidentl90) == true && isset($request->baselinenightresidentl90) == true && isset($request->baselinedayresidentl10) == true && isset($request->baselineeveningresidentl10) == true && isset($request->baselinenightresidentl10) == true && isset($request->baselinedayresidentlmax) == true && isset($request->baselineeveningresidentlmax) == true && isset($request->baselinenightresidentlmax) == true) {
                    $category = 'residential';
                    $baselinedayl90 = $request->baselinedayresidentl90;
                    $baselineeveningl90 = $request->baselineeveningresidentl90;
                    $baselinenightl90 = $request->baselinenightresidentl90;
                    $baselinedayl10 = $request->baselinedayresidentl10;
                    $baselineeveningl10 = $request->baselineeveningresidentl10;
                    $baselinenightl10 = $request->baselinenightresidentl10;
                    $baselinedaylmax = $request->baselinedayresidentlmax;
                    $baselineeveninglmax = $request->baselineeveningresidentlmax;
                    $baselinenightlmax = $request->baselinenightresidentlmax;
                }

                if (isset($request->baselinedaycommerciall90) == true && isset($request->baselineeveningcommerciall90) == true && isset($request->baselinenightcommerciall90) == true && isset($request->baselinedaycommerciall10) == true && isset($request->baselineeveningcommerciall10) == true && isset($request->baselinenightcommerciall10) == true) {
                    $category = 'commercial';
                    $baselinedayl90 = $request->baselinedaycommerciall90;
                    $baselineeveningl90 = $request->baselineeveningcommerciall90;
                    $baselinenightl90 = $request->baselinenightcommerciall90;
                    $baselinedayl10 = $request->baselinedaycommerciall10;
                    $baselineeveningl10 = $request->baselineeveningcommerciall10;
                    $baselinenightl10 = $request->baselinenightcommerciall10;
                }

                if (isset($request->baselinedayindustryl90) == true && isset($request->baselineeveningindustryl90) == true && isset($request->baselinenightindustryl90) == true && isset($request->baselinedayindustryl10) == true && isset($request->baselineeveningindustryl10) == true && isset($request->baselinenightindustryl10) == true) {
                    $category = 'industry';
                    $baselinedayl90 = $request->baselinedayindustryl90;
                    $baselineeveningl90 = $request->baselineeveningindustryl90;
                    $baselinenightl90 = $request->baselinenightindustryl90;
                    $baselinedayl10 = $request->baselinedayindustryl10;
                    $baselineeveningl10 = $request->baselineeveningindustryl10;
                    $baselinenightl10 = $request->baselinenightindustryl10;
                }

                $standard = MasterStandardBunyi::where('schedule', $request->schedule)->where('categori', $category)->get();
                foreach ($standard as $keystandard => $valuestandard) {
                    if ($valuestandard->time == 'day') {
                        $standard6[$valuestandard->categori][$valuestandard->noise_parameter][$valuestandard->time] = $valuestandard->parameter;
                    } else if ($valuestandard->time == 'night') {
                        $standard6[$valuestandard->categori][$valuestandard->noise_parameter][$valuestandard->time] = $valuestandard->parameter;
                    } else if ($valuestandard->time == 'evening') {
                        $standard6[$valuestandard->categori][$valuestandard->noise_parameter][$valuestandard->time] = $valuestandard->parameter;
                    }
                }
                $parameterbunyidatadelete = ParameterBunyi::where('stesen_id', $request->id)->get();
                foreach ($parameterbunyidatadelete as $keyparameterbunyidatadelete => $valueparameterbunyidatadelete) {
                    $valueparameterbunyidatadelete->delete();
                }
                foreach ($standard6 as $keystandard6 => $valuestandard6) {
                    foreach ($valuestandard6 as $keyvaluestandard6 => $valuevaluestandard6) {
                        if ($keyvaluestandard6 == 'L90') {
                            $parameterbunyidata = ParameterBunyi::where('stesen_id', $request->id)->where('category', $category)->where('noise_parameter', $keyvaluestandard6)->first();
                            if ($parameterbunyidata) {
                                $parameterbunyidata->delete();
                            }
                            $parameterbunyi = new ParameterBunyi;
                            $parameterbunyi->stesen_id = $request->id;
                            $parameterbunyi->schedule = $request->schedule;
                            $parameterbunyi->category = $category;
                            $parameterbunyi->noise_parameter = $keyvaluestandard6;
                            $parameterbunyi->standardday = $valuevaluestandard6['day'];
                            $parameterbunyi->standardevening = $valuevaluestandard6['evening'];
                            $parameterbunyi->standardnight = $valuevaluestandard6['night'];

                            $parameterbunyi->baselineday = $baselinedayl90;
                            $parameterbunyi->baselineevening = $baselineeveningl90;
                            $parameterbunyi->baselinenight = $baselinenightl90;
                            $parameterbunyi->save();
                        }

                        if ($keyvaluestandard6 == 'L10') {
                            $parameterbunyidata = ParameterBunyi::where('stesen_id', $request->id)->where('category', $category)->where('noise_parameter', $keyvaluestandard6)->first();
                            if ($parameterbunyidata) {
                                $parameterbunyidata->delete();
                            }
                            $parameterbunyi = new ParameterBunyi;
                            $parameterbunyi->stesen_id = $request->id;
                            $parameterbunyi->schedule = $request->schedule;
                            $parameterbunyi->category = $category;
                            $parameterbunyi->noise_parameter = $keyvaluestandard6;
                            $parameterbunyi->standardday = $valuevaluestandard6['day'];
                            $parameterbunyi->standardevening = $valuevaluestandard6['evening'];
                            $parameterbunyi->standardnight = $valuevaluestandard6['night'];

                            $parameterbunyi->baselineday = $baselinedayl10;
                            $parameterbunyi->baselineevening = $baselineeveningl10;
                            $parameterbunyi->baselinenight = $baselinenightl10;
                            $parameterbunyi->save();
                        }

                        if ($keyvaluestandard6 == 'Lmax') {
                            $parameterbunyidata = ParameterBunyi::where('stesen_id', $request->id)->where('category', $category)->where('noise_parameter', $keyvaluestandard6)->first();
                            if ($parameterbunyidata) {
                                $parameterbunyidata->delete();
                            }
                            $parameterbunyi = new ParameterBunyi;
                            $parameterbunyi->stesen_id = $request->id;
                            $parameterbunyi->schedule = $request->schedule;
                            $parameterbunyi->category = $category;
                            $parameterbunyi->noise_parameter = $keyvaluestandard6;
                            $parameterbunyi->standardday = $valuevaluestandard6['day'];
                            $parameterbunyi->standardevening = $valuevaluestandard6['evening'];
                            $parameterbunyi->standardnight = $valuevaluestandard6['night'];

                            $parameterbunyi->baselineday = $baselinedaylmax;
                            $parameterbunyi->baselineevening = $baselineeveninglmax;
                            $parameterbunyi->baselinenight = $baselinenightlmax;
                            $parameterbunyi->save();
                        }
                    }
                }
            }

        } else {
            if ($request->type == 2) {
                $dataparameter = PenambahanParameter::where('stesen_id', '=', $request->id)->get();
            } else {
                $dataparameter = Parameter::where('stesen_id', '=', $request->id)->get();
            }

            foreach ($dataparameter as $key => $dataparameters) {
                $request_stndrd_id = $request->standard_id + $dataparameters->standard;
                if ($dataparameters->standard == $request_stndrd_id) {
//$update_standard = "standard".$dataparameters->parameter;
                    //dd($dataparameters->parameter);
                    //dd($classID);
                    $update_baselineeia = "baselineeia" . $dataparameters->standard;
                    $update_baselineemp = "baselineemp" . $dataparameters->standard;
                    if ($request->type == 2) {
                        $update_parameter = PenambahanParameter::where('stesen_id', '=', $request->id)->where('standard', '=', $dataparameters->standard)->first();
                    } else {
                        $update_parameter = Parameter::where('stesen_id', '=', $request->id)->where('standard', '=', $dataparameters->standard)->first();
                    }
                    $update_parameter->baselineeia = $request->$update_baselineeia;
                    $update_parameter->baselineemp = $request->$update_baselineemp;
                    $update_parameter->save();
                }
            }
        }
        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
    }

    public function buangParameter(Request $request)
    {
        $parameter = Parameter::findOrFail($request->id);

        if ($parameter) {
            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 6;
            $log->description = "Padam Data Parameter";
            $log->data_old = json_encode($parameter);
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        $parameter->delete();
        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
    }

    public function updatemaklumataudit1(Request $request)
    {

        $auditdata = ProjekAudit::where('projek_id', $request->id)->get();
        $projekdetail = ProjekDetail::where('projek_id', $request->id)->first();

        if ($projekdetail->jenis == 2) {
            $plus = "+6 months";
        } else if ($projekdetail->jenis == 3) {
            $plus = "+4 months";
        } else if ($projekdetail->jenis == 4) {
            $plus = "+3 months";
        } else if ($projekdetail->jenis == 5) {
            $plus = "+1 months";
        }
        $num_padded = sprintf("%02d", $request->bulan);
        $tarikh_audit = $request->tahun . "-" . $num_padded . "-01";
        $temp = $tarikh_audit;
        foreach ($auditdata as $key => $value) {
            $audit = ProjekAudit::where('id', $value->id)->first();

            if ($key == 0) {
                $temp = date("Y-m-d", strtotime($temp));
            } else {
                $temp = date("Y-m-d", strtotime($plus, strtotime($temp)));
            }
            $audit->tarikh_audit = $temp;
            $temp = $temp;
            $audit->save();

        }

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data berjaya dikemaskini.']);
    }

    public function updatemaklumataudit(Request $request)
    {

        $audit = ProjekAudit::where('id', $request->id)->first();

        $audit->tarikh_audit = Carbon::createFromFormat('d/m/Y', $request->tarikh_audit_1);

        $audit->no_rujukan = $request->no_rujukan;
        $audit->save();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah dikemaskini.']);
    }

    public function updatefasa(Request $request)
    {
        $fasa = ProjekFasa::where('id', $request->id)->first();
        $fasa->nama_fasa = $request->nama_fasa;
        $fasa->save();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
    }

    public function updatestesen1(Request $request)
    {
        if (in_array($request->jenis_pengawasan_id, [1])) {
            $validator = Validator::make($request->all(), [
                'stesen' => 'required|string',
                'longitud' => 'required|regex:/[0-9]{3}\.[0-9]{6}+$/u',
                'latitud' => 'required||regex:/[0-9]{1}\.[0-9]{6}+$/u',
                'lembangan' => 'required',
                'sungai' => 'required',
                'class' => 'required',
                'is_eia' => 'required',
                'date_eia' => 'required',
            ]);
        }
        if (in_array($request->jenis_pengawasan_id, [3])) {
            $validator = Validator::make($request->all(), [
                'stesen' => 'required|string',
                'longitud' => 'required|regex:/[0-9]{3}\.[0-9]{6}+$/u',
                'latitud' => 'required||regex:/[0-9]{1}\.[0-9]{6}+$/u',
                'nama' => 'required',
                'class' => 'required',
                'is_eia' => 'required',
                'date_eia' => 'required',
            ]);
        }
        if (in_array($request->jenis_pengawasan_id, [4])) {
            $validator = Validator::make($request->all(), [
                'stesen' => 'required|string',
                'longitud' => 'required||regex:/[0-9]{3}\.[0-9]{6}+$/u',
                'latitud' => 'required||regex:/[0-9]{1}\.[0-9]{6}+$/u',
                'is_eia' => 'required',
                'kategori_tanah' => 'required',
                'date_eia' => 'required',
            ]);
        }
        if (in_array($request->jenis_pengawasan_id, [8, 9])) {
            $validator = Validator::make($request->all(), [
                'stesen' => 'required|string',
                'longitud' => 'required||regex:/[0-9]{3}\.[0-9]{6}+$/u',
                'latitud' => 'required||regex:/[0-9]{1}\.[0-9]{6}+$/u',
                'is_eia' => 'required',
                'date_eia' => 'required',
            ]);
        }
        if (in_array($request->jenis_pengawasan_id, [5])) {
            $validator = Validator::make($request->all(), [
                'stesen' => 'required|string',
                'longitud' => 'required||regex:/[0-9]{3}\.[0-9]{6}+$/u',
                'latitud' => 'required||regex:/[0-9]{1}\.[0-9]{6}+$/u',
            ]);
        }
        if (in_array($request->jenis_pengawasan_id, [6, 2, 7])) {
            $validator = Validator::make($request->all(), [
                'stesen' => 'required|string',
                'longitud' => 'required||regex:/[0-9]{3}\.[0-9]{6}+$/u',
                'latitud' => 'required||regex:/[0-9]{1}\.[0-9]{6}+$/u',
                'class' => 'required',
                'is_eia' => 'required',
                'date_eia' => 'required',
            ]);
        }
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        if ($request->type == 2) {
            $stesen = PenambahanStesen::where('id', $request->id)->first();
        } else {
            $stesen = Stesen::where('id', $request->id)->first();
        }

        if ($stesen) {
            $log = new LogSystem;
            $log->module_id = 26;
            $log->activity_type_id = 5;
            $log->description = "Kemaskini Data Stesen";
            $log->data_old = json_encode($stesen);
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        $stesen->stesen = $request->stesen;
        $stesen->longitud = $request->longitud;
        $stesen->latitud = $request->latitud;
//$stesen->url_geolocator = $request->geolocatorID;
        $stesen->is_tanah = $request->is_tanah;
        $stesen->is_pembinaan = $request->is_pembinaan;
        $stesen->is_operasi = $request->is_operasi;
        $stesen->is_eia = $request->is_eia;
        $stesen->is_emp = $request->is_emp;
        $stesen->date_eia = date("Y-m-d", strtotime($request->date_eia));

        if ($request->date_emp != null) {
            $stesen->date_emp = date("Y-m-d", strtotime($request->date_emp));
        }

        if ($request->kategori_tanah) {
            $stesen->kategori_tanah = $request->kategori_tanah;
        }

        if ($request->prima_sekunder == 1) {
            $stesen->is_sekunder = 0;
            $stesen->is_prima = 1;
        }

        if ($request->prima_sekunder == 2) {
            $stesen->is_sekunder = 1;
            $stesen->is_prima = 0;
        }

        if (in_array($request->jenis_pengawasan_id, [1])) {
            $stesen->lembangan = $request->lembangan;
            $stesen->sungai = $request->sungai;
        }
        $stesen->nama = $request->nama;
        $class_lama = $stesen->class;
        $stesen->class = $request->class;

        if ($request->gambar_stesen && $request->file('gambar_stesen')->isValid()) {
            $file = $request->file('gambar_stesen');
            $name = $file->getClientOriginalName();
            $file->move('stesen/' . $stesen->id . '/', $name);
            $stesen->gambar_stesen = '/stesen/' . $stesen->id . '/' . $name;
        } else {
            if ($request->picture_removed == 1) {
                $stesen->gambar_stesen = null;
            }
        }

        if ($stesen->save()) {

            if (!auth()->user()->hasRole('staff')) {
                if (in_array($stesen->jenis_pengawasan_id, [1, 3, 6])) {

                    $this->data['masterstandard'] = $masterstandard = \App\MasterModel\MasterStandard::select(['id', 'class', 'jenis_parameter'])->where('class', $stesen->class)->get();

                    $jenisparameter = array();
                    foreach ($masterstandard as $key => $value) {
                        $jenisparameter[] = $value->jenis_parameter;
                    }

                    $this->data['masterparameter'] = $masterparameter = MasterParameter::whereIn('id', $jenisparameter)->where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->get();

                    if ($class_lama != $request->class) {
                        $parameter = Parameter::where('stesen_id', $stesen->id)->delete();
                        foreach ($masterparameter as $key => $valueparameter) {

                            $this->data['masterstandardID'] = $masterstandardID = \App\MasterModel\MasterStandard::where('class', $stesen->class)->where('jenis_parameter', $valueparameter->id)->first();

                            if ($request->type == 2) {
                                $parameter = new PenambahanParameter();
                            } else {
                                $parameter = new Parameter();
                            }
                            $parameter->stesen_id = $stesen->id;
                            $parameter->parameter = $valueparameter->id;
                            $parameter->standard = $masterstandardID->id;
                            $parameter->baselineeia = null;
                            $parameter->baselineemp = null;
                            $parameter->mode = $valueparameter->mode;
                            $parameter->save();
                        }
                    } else {
                    }
                }
                if (in_array($stesen->jenis_pengawasan_id, [2])) {

                    if ($stesen->versi == 1) {
                        $versi = 'lama';
                    } else {
                        $versi = 'baru';
                    }
                    $this->data['masterstandard'] = $masterstandard = \App\MasterModel\MasterStandard::select(['id', 'class', 'jenis_parameter'])->where('class', '=', $stesen->class)->get();

                    $jenisparameter = array();
                    foreach ($masterstandard as $key => $value) {
                        $jenisparameter[] = $value->jenis_parameter;
                    }

                    $this->data['masterparameter'] = $masterparameter = MasterParameter::whereIn('id', $jenisparameter)->where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->where('versi', $versi)->get();

                    if ($class_lama != $request->class) {
                        if ($request->type == 2) {
                            $parameter = PenambahanParameter::where('stesen_id', $stesen->id)->delete();
                        } else {
                            $parameter = Parameter::where('stesen_id', $stesen->id)->delete();
                        }
                        foreach ($masterparameter as $key => $valueparameter) {
                            $this->data['masterstandardID'] = $masterstandardID = \App\MasterModel\MasterStandard::where('class', '=', $stesen->class)->where('jenis_parameter', $valueparameter->id)->first();
                            if ($request->type == 2) {
                                $parameter = new PenambahanParameter();
                            } else {
                                $parameter = new Parameter();
                            }
                            $parameter->stesen_id = $stesen->id;
                            $parameter->parameter = $valueparameter->id;
                            $parameter->standard = $masterstandardID->id;
                            $parameter->baselineeia = null;
                            $parameter->baselineemp = null;
                            $parameter->mode = $valueparameter->mode;
                            $parameter->save();
                        }
                    } else {
                    }

                    if (in_array($stesen->versi, [2])) {

                        if ($request->is_prima == 1) {
                            $this->data['masterstandardPrima'] = $masterstandardPrima = \App\MasterModel\MasterStandard::select(['id', 'class', 'jenis_parameter'])->where('class', 'Sentuhan Prima')->get();

                            $jenisparameter = array();
                            foreach ($masterstandardPrima as $key => $valuePrima) {
                                $jenisparameterPrima[] = $valuePrima->jenis_parameter;
                            }

                            $this->data['masterparameterPrima'] = $masterparameterPrima = MasterParameter::whereIn('id', $jenisparameterPrima)->where('versi', '=', 'baru')->where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->get();

                            foreach ($masterparameterPrima as $key => $valueparameterPrima) {

                                $masterstandardR1ID = \App\MasterModel\MasterStandard::where('class', 'Sentuhan Prima')->where('jenis_parameter', $valueparameterPrima->id)->first();
                                if ($request->type == 2) {
                                    $parameterPrima = PenambahanParameter::where('parameter', $valueparameterPrima->id)->where('standard', $masterstandardR1ID->id)->where('stesen_id', $stesen->id)->first();
                                } else {
                                    $parameterPrima = Parameter::where('parameter', $valueparameterPrima->id)->where('standard', $masterstandardR1ID->id)->where('stesen_id', $stesen->id)->first();
                                }

                                if (!$parameterPrima) {
                                    if ($request->type == 2) {
                                        $parameter = new PenambahanParameter();
                                    } else {
                                        $parameter = new Parameter();
                                    }
                                    $parameter->stesen_id = $stesen->id;
                                    $parameter->parameter = $valueparameterPrima->id;
                                    $parameter->standard = $masterstandardR1ID->id;
                                    $parameter->baselineeia = null;
                                    $parameter->baselineemp = null;
                                    $parameter->mode = $valueparameterPrima->mode;
                                    $parameter->save();
                                }
                            }
                        }

                        if ($request->is_sekunder == 1) {
                            $this->data['masterstandardSekunder'] = $masterstandardSekunder = \App\MasterModel\MasterStandard::select(['id', 'class', 'jenis_parameter'])->where('class', 'Sentuhan Sekunder')->get();

                            $jenisparameter = array();
                            foreach ($masterstandardSekunder as $key => $valueSekunder) {
                                $jenisparameterSekunder[] = $valueSekunder->jenis_parameter;
                            }

                            $this->data['masterparameterSekunder'] = $masterparameterSekunder = MasterParameter::whereIn('id', $jenisparameterSekunder)->where('versi', '=', 'baru')->where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->get();

                            foreach ($masterparameterSekunder as $key => $valueparameterSekunder) {

                                $masterstandardR2ID = \App\MasterModel\MasterStandard::where('class', 'Sentuhan Sekunder')->where('jenis_parameter', $valueparameterSekunder->id)->first();
                                if ($request->type == 2) {
                                    $parameterSekunder = PenambahanParameter::where('parameter', $valueparameterSekunder->id)->where('standard', $masterstandardR2ID->id)->where('stesen_id', $stesen->id)->first();
                                } else {
                                    $parameterSekunder = Parameter::where('parameter', $valueparameterSekunder->id)->where('standard', $masterstandardR2ID->id)->where('stesen_id', $stesen->id)->first();
                                }
                                if (!$parameterSekunder) {
                                    if ($request->type == 2) {
                                        $parameter = new PenambahanParameter();
                                    } else {
                                        $parameter = new Parameter();
                                    }
                                    $parameter->stesen_id = $stesen->id;
                                    $parameter->parameter = $valueparameterSekunder->id;
                                    $parameter->standard = $masterstandardR2ID->id;
                                    $parameter->baselineeia = null;
                                    $parameter->baselineemp = null;
                                    $parameter->mode = $valueparameterSekunder->mode;
                                    $parameter->save();
                                }
                            }
                        }

                    }
                }
                if (in_array($stesen->jenis_pengawasan_id, [4])) {
                    $this->data['masterstandard'] = $masterstandard = \App\MasterModel\MasterStandard::select(['id', 'class', 'jenis_parameter'])->where('class', 'Air Minuman')->get();

                    $jenisparameter = array();
                    foreach ($masterstandard as $key => $value) {
                        $jenisparameter[] = $value->jenis_parameter;
                    }
                    $this->data['masterparameter'] = $masterparameter = MasterParameter::whereIn('id', $jenisparameter)->where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->get();
                    foreach ($masterparameter as $key => $valueparameter) {

                        $this->data['masterstandardID'] = $masterstandardID = \App\MasterModel\MasterStandard::where('class', 'Air Minuman')->where('jenis_parameter', $valueparameter->id)->first();

                        if ($masterstandardID->id) {
                            if ($request->type == 2) {
                                $parameter = PenambahanParameter::where('stesen_id', $stesen->id)->where('parameter', $valueparameter->id)->first();
                            } else {
                                $parameter = Parameter::where('stesen_id', $stesen->id)->where('parameter', $valueparameter->id)->first();
                            }
                            if (!$parameter) {
                                if ($request->type == 2) {
                                    $parameter = new PenambahanParameter();
                                } else {
                                    $parameter = new Parameter();
                                }
                                $parameter->stesen_id = $stesen->id;
                                $parameter->parameter = $valueparameter->id;
                                $parameter->standard = $masterstandardID->id;
                                $parameter->baselineeia = null;
                                $parameter->baselineemp = null;
                                $parameter->mode = $valueparameter->mode;
                                $parameter->save();
                            }
                        }

                    }
                }
                if (in_array($stesen->jenis_pengawasan_id, [5, 8])) {

                    $this->data['masterparameter'] = $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->get();
                    if ($request->type == 2) {
                        $parameter = PenambahanParameter::where('stesen_id', $stesen->id)->first();
                    } else {
                        $parameter = Parameter::where('stesen_id', $stesen->id)->first();
                    }
                    if (!$parameter) {
                        foreach ($masterparameter as $key => $valueparameter) {

                            $this->data['masterstandardID'] = $masterstandardID = \App\MasterModel\MasterStandard::where('jenis_parameter', $valueparameter->id)->first();
                            if ($masterstandardID) {
                                if ($request->type == 2) {
                                    $parameter = new PenambahanParameter();
                                } else {
                                    $parameter = new Parameter();
                                }
                                $parameter->stesen_id = $stesen->id;
                                $parameter->parameter = $valueparameter->id;
                                $parameter->standard = $masterstandardID->id;
                                $parameter->baselineeia = null;
                                $parameter->baselineemp = null;
                                $parameter->mode = $valueparameter->mode;
                                $parameter->save();
                            }

                        }
                    }
                }
                if (in_array($stesen->jenis_pengawasan_id, [7])) {

                    $this->data['masterparameter'] = $masterparameter = MasterParameter::where('jenis_pengawasan', $stesen->jenis_pengawasan_id)->where('schedule', 'LIKE', '%' . $stesen->class . '%')->get();

                    $parameterID = array();
                    foreach ($masterparameter as $key => $value) {
                        $parameterID[] = $value->id;
                    }

                    $this->data['masterstandard'] = $masterstandard = MasterStandard::whereIn('jenis_parameter', $parameterID)->get();

                    foreach ($masterstandard as $key => $valuestandard) {

                        if ($request->type == 2) {
                            $parameter = new PenambahanParameter();
                        } else {
                            $parameter = new ParameterBunyi();
                        }
                        $parameter->stesen_id = $stesen->id;
                        if (preg_match('/Schedule 1/', $stesen->class) == 1) {
                            $schedule = 1;
                        }
                        if (preg_match('/Schedule 2/', $stesen->class) == 1) {
                            $schedule = 2;
                        }
                        if (preg_match('/Schedule 3/', $stesen->class) == 1) {
                            $schedule = 3;
                        }
                        if (preg_match('/Schedule 4/', $stesen->class) == 1) {
                            $schedule = 4;
                        }
                        if (preg_match('/Schedule 5/', $stesen->class) == 1) {
                            $schedule = 5;
                        }
                        if (preg_match('/Schedule 6/', $stesen->class) == 1) {
                            $schedule = 6;
                        }
                        $parameter->schedule = $schedule;
                        $parambunyi = ParameterBunyi::where('stesen_id', $stesen->id)->first();
                        if ($parambunyi) {
                            if ($parambunyi->schedule == $schedule) {
                            } else {
                                $parambunyi->schedule = $schedule;
                                $parambunyi->save();
                            }
                        } else {
                            $parameter->save();
                        }
                    }
                }
            }
        }

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dikemaskini.']);
    }

    public function getEMP(Request $request)
    {

        if (Auth::user()->hasRole('pp')) {
            $user = auth()->id();

            $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id', $user)->first();
        } else {

            $projek = Projek::where('id', $request->id)->first();
        }

        if ($projek) {
            if ($request->ajax()) {
                $emp = ProjekEMP::where('projek_id', $request->id)->get();
                return datatables()->of($emp)
                ->editColumn('laporan', function ($emp) {
                    if ($emp->laporan) {
                        return strtoupper($emp->laporan);
                    } else {
                        return '-';
                    }

                })
                ->editColumn('tarikh_kelulusan', function ($emp) {
                    $tarikh_kelulusan = "";
                    if ($emp->tarikh_kelulusan) {
                        $tarikh_kelulusan .= date("d/m/Y", strtotime($emp->tarikh_kelulusan));
                    }

                    return strtoupper($tarikh_kelulusan);
                })
                ->editColumn('jururunding', function ($emp) {
                    $empJuru = "";
                    if ($emp->jururunding) {
                        $empJuru .= $emp->jururunding;
                    }

                    return strtoupper($empJuru);
                })
                ->editColumn('no_rujukan', function ($emp) {
                    $empJuru = "";
                    if ($emp->No_Rujukan) {
                        $empJuru .= $emp->No_Rujukan;
                    }

                    return strtoupper($empJuru);
                })
                ->editColumn('action', function ($emp) {
                    $button = "";
                    $button .= '<a onclick="removeEmp(' . $emp->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Padam</a>';
                    return $button;
                })
                ->make(true);
            }
        }
        return view('projek.daftar_projek');
    }

    public function LDP2M2(Request $request)
    {
        $user = auth()->id();
        $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id', $user)->first();
        $projek_id = $projek->projek_id;

        $ldp2m2 = new ProjekLDP2M2();
        $ldp2m2->projek_id = $projek_id;

        $date1 = strtr($request->tarikh_kelulusan, '/', '-');
        $tarikh_kelulusan = date("Y-m-d", strtotime($date1));
        $ldp2m2->tarikh_kelulusan = $tarikh_kelulusan;

        $ldp2m2->no_plan_diluluskan = $request->no_plan_diluluskan;
        $ldp2m2->nama = $request->nama;

        if ($request->hasfile('dokumen')) {
            $file = $request->file('dokumen');
            $name = $file->getClientOriginalName();
            $file->move('ldp2m2/' . $ldp2m2->id . 'dokumen/', $name);
            $ldp2m2->dokumen = '/ldp2m2/' . $ldp2m2->id . 'dokumen/' . $name;
        }

        $ldp2m2->save();

        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data baru berjaya ditambah.']);
    }

    public function getLDP2M2(Request $request)
    {

        if (Auth::user()->hasRole('pp')) {
            $user = auth()->id();

            $projek = ProjekHasUser::leftJoin('projek', 'projek_has_user.projek_id', '=', 'projek.id')->where('projek_has_user.user_id', $user)->first();
        } else {

            $projek = Projek::where('id', $request->id)->first();
        }

        if ($projek) {
            if ($request->ajax()) {
                $ldp2m2 = ProjekLDP2M2::where('projek_id', $request->id)->get();
                return datatables()->of($ldp2m2)
                ->editColumn('nama', function ($ldp2m2) {
                    $ldpnama = "";
                    if ($ldp2m2->nama) {
                        $ldpnama .= $ldp2m2->nama;
                    }

                    return strtoupper($ldpnama);
                })
                ->editColumn('tarikh_kelulusan', function ($ldp2m2) {
                    $tarikh_kelulusan = "";
                    if ($ldp2m2->tarikh_kelulusan) {
                        $tarikh_kelulusan .= date("d/m/Y", strtotime($ldp2m2->tarikh_kelulusan));
                    }

                    return strtoupper($tarikh_kelulusan);
                })
                ->editColumn('no_plan_diluluskan', function ($ldp2m2) {
                    $noPlan = "";
                    if ($ldp2m2->no_plan_diluluskan) {
                        $noPlan .= $ldp2m2->no_plan_diluluskan;
                    }

                    return strtoupper($noPlan);
                })
                ->editColumn('dokumen', function ($ldp2m2) {
                    $ldpDoc = "-";
                    if ($ldp2m2->dokumen) {
                        $ldpDoc = '<a href="' . asset('/') . $ldp2m2->dokumen . '" target="_blank" style="margin-left: 4%;"><i class="fa fa-file-pdf-o fa-2x"></i></a>';
                    }
                    return $ldpDoc;
                })
                ->editColumn('action', function ($ldp2m2) {
                    $button = "";
                    $button .= '<a onclick="removeLDP(' . $ldp2m2->id . ')" href="javascript:;" class="btn btn-danger btn-xs mb-1 m-l-5"><i class="fa fa-trash"></i> Padam</a>';
                    return $button;
                })
                ->make(true);
            }
        }
        return view('projek.daftar_projek');
    }

    public function buangLDP2M2(Request $request)
    {
        $projekLDP2M2 = ProjekLDP2M2::findOrFail($request->id);
        $projekLDP2M2->delete();
        return response()->json(['status' => 'success', 'title' => '', 'message' => 'Data telah berjaya dipadam.']);
    }

    public function catatan(Request $request)
    {
        $this->data['projek'] = $projek = Projek::where('id', $request->id)->first();

        $log = new LogSystem;
        $log->module_id = 26;
        $log->activity_type_id = 2;
        $log->description = "Lihat Maklumat Catatan";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return view('projek.catatan', $this->data);
    }

    public function kuiriview(Request $request)
    {
        $projek = Projek::where('id', $request->id);

        $this->data['master_bulan'] = MasterMonth::all();
        $years = array_combine(range(date("Y"), 2000), range(date("Y"), 2000));
        $this->data['master_tahun'] = $years;

        $this->data['kuiria'] = PengurusanKuiri::leftJoin('monthly_a', 'pengurusan_kuiri.filing_id', 'monthly_a.id')->where('pengurusan_kuiri.projek_id', $request->id)->where('pengurusan_kuiri.filing_type', 'eia118')->where('monthly_a.bulan', $request->bulan)->where('monthly_a.tahun', $request->tahun);

        $this->data['kuirib'] = PengurusanKuiri::leftJoin('monthly_b', 'pengurusan_kuiri.filing_id', 'monthly_b.id')->where('pengurusan_kuiri.projek_id', $request->id)->where('pengurusan_kuiri.filing_type', 'like', '%eia218%')->where('monthly_b.bulan', $request->bulan)->where('monthly_b.tahun', $request->tahun);

        $this->data['kuiric'] = PengurusanKuiri::leftJoin('monthly_c', 'pengurusan_kuiri.filing_id', 'monthly_c.id')->where('pengurusan_kuiri.projek_id', $request->id)->where('pengurusan_kuiri.filing_type', 'like', '%emr%')->where('monthly_c.bulan', $request->bulan)->where('monthly_c.tahun', $request->tahun);

        $this->data['kuirid'] = PengurusanKuiri::leftJoin('monthly_d', 'pengurusan_kuiri.filing_id', 'monthly_d.id')->where('pengurusan_kuiri.projek_id', $request->id)->where('pengurusan_kuiri.filing_type', 'like', '%bmps%')->where('monthly_d.bulan', $request->bulan)->where('monthly_d.tahun', $request->tahun);

        $this->data['kuirie'] = PengurusanKuiri::leftJoin('monthly_e', 'pengurusan_kuiri.filing_id', 'monthly_e.id')->where('pengurusan_kuiri.projek_id', $request->id)->where('pengurusan_kuiri.filing_type', 'audit')->where('monthly_e.bulan', sprintf("%02d", $request->bulan))->where('monthly_e.tahun', $request->tahun);

        $this->data['kuirif'] = PengurusanKuiri::leftJoin('monthly_f', 'pengurusan_kuiri.filing_id', 'monthly_f.id')->where('pengurusan_kuiri.projek_id', $request->id)->where('pengurusan_kuiri.filing_type', 'emt')->where('monthly_f.bulan', $request->bulan)->where('monthly_f.tahun', $request->tahun);

        return view('kuiri.kuiriviewpp', $this->data);
    }

    public function daftar_projek()
    {
        return view('projek.daftar_penggerak_projek');
    }

    public function daftar_projek_process(Request $request)
    {

        $distribution = \App\Distribution::where('no_fail_jas', $request->no_fail_JAS)->first();
        $projekcheck = \App\Projek::where('no_fail_jas', $request->no_fail_JAS)->first();

        $rules = [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'username' => 'required|string|max:150',
        ];

        $rules['name'] = 'required|string';
        if (!$projekcheck) {
            $rules['pakej_pengawasan_id'] = 'required';
        }
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'code' => '006',
                'message' => 'Ralat pengesahan input pengguna.',
                'errors' => $validator->errors(),
            ], 422);
        }
        if (strpos($request->email, 'doe.gov') !== false) {
            return response()->json([
                'status' => 'error',
                'code' => '006',
                'message' => 'Ralat pengesahan input pengguna.',
                'errors' => [
                    'email' => ['E-mel xxxxx@doe.gov.my tidak boleh daftar sebagai pihak syarikat.'],
                ],
            ], 422);
        }

        $entity = UserPP::firstOrCreate(['username' => $request->username]);
        $entity->username = $request->username;
        $entity->name = $request->name;
        $entity->register_at = now();
        $entity->save();

        $user = User::firstOrCreate(['username' => $request->username]);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type_id = 3;
        $user->save();

        if ($user->wasRecentlyCreated) {
            $user->password = $this->generateRandomString();
            $user->user_status_id = 5;
            $user->save();
        }

        $user->assignRole(['pp'])->assignRole(['ex']);

        $today = Carbon::parse(Carbon::now())->format('d/m/Y');
        // Inbox::create([
        //     'subject' => 'Pengesahan Pengguna Luar - PP',
        //     'message' => 'Anda telah ditugaskan untuk sah kan pengguna PP. <br /> Tarikh Agihan Tugasan Melalui Sistem : ' . $today,
        //     'sender_user_id' => $user->id, //admin
        //     'receiver_user_id' => Distribution::where('no_fail_jas', $request->no_fail_JAS)->first()->assigned_to_user_id,
        //     'inbox_status_id' => 2,
        // ]);

        if ($projekcheck) {
            $ProjekHasUser = new ProjekHasUser();
            $ProjekHasUser->user_id = $user->id;
            $ProjekHasUser->projek_id = $projekcheck->id;
            $ProjekHasUser->user_flag = 0;
            $ProjekHasUser->save();

            if ($projekcheck->status_id != 9) {
                $checkpega = JenisPengawasan::where('projek_id', $projekcheck->id)->first();
                if ($checkpega) {
                    $checkpega->delete();
                }
                $jenispengawasan = new JenisPengawasan();
                $jenispengawasan->projek_id = $projekcheck->id;
                $jenispengawasan->jenis_pengawasan_id = json_encode($request->pakej_pengawasan_id);
                $jenispengawasan->save();
            }

            $today = Carbon::parse(Carbon::now())->format('d/m/Y');

        } else {
            $projek = new Projek();
            $projek->no_fail_jas = $request->no_fail_JAS;
            $projek->nama_projek = $request->nama_projek;
            $projek->penggerak_projek = $user->id;
            $projek->status = 1;
            if ($projek->save()) {

                $jasFail = JasFail::where('nofail', $request->no_fail_JAS)->first();

                $jasdetail = JasFailDetail::where('jas_fail_id', $jasFail->id)->first();
                if ($jasdetail) {
                    $projekDetail = new ProjekDetail();
                    $projekDetail->projek_id = $projek->id;
                    $projekDetail->status_id = 1;
                    $projekDetail->aktiviti = $jasdetail->aktiviti;
                    $projekDetail->lokasi = $jasdetail->lokasi;
                    $projekDetail->negeri = $jasdetail->negeri;
                    $projekDetail->daerah = $jasdetail->daerah;
                    $projekDetail->poskod = $jasdetail->poskod;
                    $projekDetail->alamat_surat = $jasdetail->alamat_surat;
                    $projekDetail->surat_negeri = $jasdetail->surat_negeri;
                    $projekDetail->surat_daerah = $jasdetail->surat_daerah;
                    $projekDetail->surat_bandar = $jasdetail->surat_bandar;
                    $projekDetail->surat_poskod = $jasdetail->surat_poskod;
                    $projekDetail->jenis_projek = $jasdetail->jenis_projek;
                    $projekDetail->laporaneia = $jasdetail->laporaneia;
                    $projekDetail->peringkat_audit = $jasdetail->peringkat_audit;
                    $projekDetail->jenis = $jasdetail->jenis;
                    $projekDetail->other_aktiviti = $jasdetail->other_aktiviti;
                    $projekDetail->save();
                }

                $jasemp = JasEmp::where('jas_fail_id', $jasFail->id)->first();
                if ($jasemp) {
                    $projekEMP = new ProjekEMP();
                    $projekEMP->projek_id = $projek->id;
                    $projekEMP->tarikh_kelulusan = $jasemp->tarikh_kelulusan;
                    $projekEMP->laporan = $jasemp->laporan;
                    $projekEMP->jururunding = $jasemp->jururunding;
                    $projekEMP->save();
                }

                $jasaudit = JasAudit::where('jas_fail_id', $jasFail->id)->first();
                if ($jasaudit) {
                    $projekAudit = new ProjekAudit();
                    $projekAudit->projek_id = $projek->id;
                    $projekAudit->tarikh_audit = $jasaudit->tarikh_audit;
                    $projekAudit->save();
                }

                $jasldp2m2 = JasLdp2m2::where('jas_fail_id', $jasFail->id)->first();
                if ($jasldp2m2) {
                    $projekLdp2m2 = new ProjekLDP2M2();
                    $projekLdp2m2->projek_id = $projek->id;
                    $projekLdp2m2->tarikh_kelulusan = $jasldp2m2->tarikh_kelulusan;
                    $projekLdp2m2->dokumen = $jasldp2m2->dokumen;
                    $projekLdp2m2->nama = $jasldp2m2->nama;
                    $projekLdp2m2->no_plan_diluluskan = $jasldp2m2->no_plan_diluluskan;
                    $projekLdp2m2->save();
                }

                $ProjekHasUser = new ProjekHasUser();
                $ProjekHasUser->user_id = $user->id;
                $ProjekHasUser->projek_id = $projek->id;
                $ProjekHasUser->user_flag = 0;
                $ProjekHasUser->save();

                $jenispengawasan = new JenisPengawasan();
                $jenispengawasan->projek_id = $projek->id;
                $jenispengawasan->jenis_pengawasan_id = json_encode($request->pakej_pengawasan_id);
                $jenispengawasan->save();

                $today = Carbon::parse(Carbon::now())->format('d/m/Y');

            }

        }
        
        $distribution = Distribution::where('no_fail_jas', $request->no_fail_JAS)->first();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Permohonan anda akan diproses dalam tempoh 5 hari bekerja. Sila semak e-mel bagi pengaktifan akaun.']);
    }

    public function checkExist2($id)
    {
        $new = str_replace('-', '/', $id);
        $exist = 0;
        $projekall = \App\Projek::where('no_fail_jas', 'like', '%' . $new . '%')->first();

        if ($projekall) {
            $projekhasuser = ProjekHasUser::where('projek_id', $projekall->id)->get();
            foreach ($projekhasuser as $key => $value) {
                $user = User::where('id', $value->user_id)->first();
                if ($user) {
                    if ($user->entity_type == 'App\UserPP' && $user->user_status_id == 1) {
                        $exist = 1;
                    }
                }
            }
        }
        //JAS file number already use
        if ($exist == 1) {
            return response()->json(['status' => 'error']);
        } else {
//not yet used, but check if exist in distribution (flag no yet initiated)
            $distribution = \App\Distribution::where('no_fail_jas', 'like', '%' . $new . '%')->count();
            if ($distribution == 0) {
                return response()->json(['status' => 'pending_distribute']);
            } else {
                return response()->json(['status' => 'ok']);
            }
        }
    }

    public function jas($id)
    {
        $jasfail = str_replace(' ', '', $id);
        $JasFail = \App\JasFail::all();
        foreach ($JasFail as $JasFails) {
            $JasFaildetail = strtoupper(str_replace(' ', '', $JasFails->nofail));
            if ($JasFaildetail == strtoupper(str_replace('-', '/', $jasfail))) {
                $JasFaildetail = \App\JasFailDetail::where('jas_fail_id', $JasFails->id)->first();
                $projek = \App\Projek::where('no_fail_jas', $JasFails->nofail)->first();
                if ($projek) {
                    $jenispengawasan = \App\JenisPengawasan::where('projek_id', $projek->id)->first();
                    $jsona = json_decode($jenispengawasan->jenis_pengawasan_id);
                    $exist = 1;
                    if ($projek->status != 9) {
                        $changeable = 'ubah';
                    } else {
                        $changeable = 'noubah';
                    }
                    $master = \App\MasterModel\MasterPengawasan::all();
                    return response()->json(['changeable' => $changeable, 'master' => $master, 'pakejpengawasan' => $jsona, 'exist' => $exist, 'status' => 'ok', 'nama' => $JasFails->name, 'ppnama' => $JasFaildetail->pegawai_penggerak, 'ppnamap' => $JasFaildetail->nama_penggerak, 'failjas' => $JasFails->nofail]);
                } else {
                    $exist = 0;
                    return response()->json(['exist' => $exist, 'status' => 'ok', 'nama' => $JasFails->name, 'ppnama' => $JasFaildetail->pegawai_penggerak, 'ppnamap' => $JasFaildetail->nama_penggerak, 'ppnamap' => $JasFaildetail->nama_penggerak, 'failjas' => $JasFails->nofail]);
                }
            }
        }
    }

    public function registerexist(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        $distribution = \App\Distribution::where('no_fail_jas', $request->no_fail_JAS)->first();

        Mail::to($distribution->assignstaff->email)->send(new PengesahanPenggunaPP($request->no_fail_JAS, 'Pengesahan Pengguna PP'));

        $projek = new Projek();
        $projek->no_fail_jas = $request->no_fail_JAS;
        $projek->nama_projek = $request->nama_projek;
        $projek->penggerak_projek = $user->id;
        $projek->status = 1;
        if ($projek->save()) {

            $jasFail = JasFail::where('nofail', $request->no_fail_JAS)->first();

            $jasdetail = JasFailDetail::where('jas_fail_id', $jasFail->id)->first();
            if ($jasdetail) {
                $projekDetail = new ProjekDetail();
                $projekDetail->projek_id = $projek->id;
                $projekDetail->status_id = 1;
                $projekDetail->aktiviti = $jasdetail->aktiviti;
                $projekDetail->lokasi = $jasdetail->lokasi;
                $projekDetail->negeri = $jasdetail->negeri;
                $projekDetail->daerah = $jasdetail->daerah;
                $projekDetail->poskod = $jasdetail->poskod;
                $projekDetail->alamat_surat = $jasdetail->alamat_surat;
                $projekDetail->surat_negeri = $jasdetail->surat_negeri;
                $projekDetail->surat_daerah = $jasdetail->surat_daerah;
                $projekDetail->surat_bandar = $jasdetail->surat_bandar;
                $projekDetail->surat_poskod = $jasdetail->surat_poskod;
                $projekDetail->jenis_projek = $jasdetail->jenis_projek;
                $projekDetail->laporaneia = $jasdetail->laporaneia;
                $projekDetail->peringkat_audit = $jasdetail->peringkat_audit;
                $projekDetail->jenis = $jasdetail->jenis;
                $projekDetail->other_aktiviti = $jasdetail->other_aktiviti;
                $projekDetail->save();
            }

            $jasemp = JasEmp::where('jas_fail_id', $jasFail->id)->first();
            if ($jasemp) {
                $projekEMP = new ProjekEMP();
                $projekEMP->projek_id = $projek->id;
                $projekEMP->tarikh_kelulusan = $jasemp->tarikh_kelulusan;
                $projekEMP->laporan = $jasemp->laporan;
                $projekEMP->jururunding = $jasemp->jururunding;
                $projekEMP->save();
            }

            $jasaudit = JasAudit::where('jas_fail_id', $jasFail->id)->first();
            if ($jasaudit) {
                $projekAudit = new ProjekAudit();
                $projekAudit->projek_id = $projek->id;
                $projekAudit->tarikh_audit = $jasaudit->tarikh_audit;
                $projekAudit->save();
            }

            $jasldp2m2 = JasLdp2m2::where('jas_fail_id', $jasFail->id)->first();
            if ($jasldp2m2) {
                $projekLdp2m2 = new ProjekLDP2M2();
                $projekLdp2m2->projek_id = $projek->id;
                $projekLdp2m2->tarikh_kelulusan = $jasldp2m2->tarikh_kelulusan;
                $projekLdp2m2->dokumen = $jasldp2m2->dokumen;
                $projekLdp2m2->nama = $jasldp2m2->nama;
                $projekLdp2m2->no_plan_diluluskan = $jasldp2m2->no_plan_diluluskan;
                $projekLdp2m2->save();
            }

            $ProjekHasUser = new ProjekHasUser();
            $ProjekHasUser->user_id = $user->id;
            $ProjekHasUser->projek_id = $projek->id;
            $ProjekHasUser->user_flag = 0;
            $ProjekHasUser->save();

            $jenispengawasan = new JenisPengawasan();
            $jenispengawasan->projek_id = $projek->id;
            $jenispengawasan->jenis_pengawasan_id = json_encode($request->pakej_pengawasan_id);
            $jenispengawasan->save();

//notifikasi kepada pegawai Jas untuk mengaktifkan Penggerak Projek(pp)

            $today = Carbon::parse(Carbon::now())->format('d/m/Y');

            Inbox::create([
                'subject' => 'Pengesahan Pengguna Luar - PP',
                'message' => 'Anda telah ditugaskan untuk sah kan pengguna PP. <br /> Tarikh Agihan Tugasan Melalui Sistem : ' . $today,
                'sender_user_id' => $user->id, //admin
                'receiver_user_id' => Distribution::where('no_fail_jas', $request->no_fail_JAS)->first()->assigned_to_user_id,
                'inbox_status_id' => 2,
            ]);

        }

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Permohonan akan diproses dalam masa 3 hari bekerja. Sila semak e-mel bagi penambahan no. fail JAS.']);
    }

    public function generateRandomString($length = 10)
    {
        return bcrypt(substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length));
    }

    public function senaraiProjek()
    {
        return view('form.senaraiProjek');
    }

    public function pendaftaranProjek(Request $request)
    {
        $userPP = null;
        $projek = null;
        $projekDetail = null;
        $xxx = null;

        $projekID = $request->projekID;
        $userPP = ProjekHasPp::where('projek_id', $projekID)->where('role_id', 4)->first();
        $projek = Projek::where('id', $projekID)->first();
        if ($projek) {
            $projekDetail = $projek->projekdetail;
            $jasFail = $projek->jasfail;
            if ($jasFail) {
                $jasDetail = $jasFail->jasdetail;
            }
        }

        return view('form.pendaftaranProjek', compact('projek', 'userPP', 'projekDetail'));
    }
    public function senarai_projek(Request $request)
    {
        $projectHasPP = ProjekHasPp::query();
        $projectHasPP->where('user_id', Auth::user()->id);

        $masterpengawasans = MasterPengawasan::get();
        if ($request->ajax()) {

            $projectHasPP = ProjekHasPp::query();
            $projectHasPP->where('user_id', Auth::user()->id);


            return datatables()->of($projectHasPP->get())
            ->editColumn('ahliProjek', function ($projectHasPP) {
                $projek = Projek::where('id', $projectHasPP->projek_id)->first();
                $projekStatus = $projek ? $projek->status : '-';
                $projekDetail = $projek->projekdetail;

                return '<button type="button" class="dt-button buttons-html5 btn btn-default btn-xs" onclick="ahliProjekModal(' . $projectHasPP->projek_id . ', ' . $projekStatus . ', '.$projekDetail->status_id.')"> <i class="fa fa-user-plus text-success"></i> Ahli Projek </button>';
            })
            ->editColumn('no_fail_jas', function ($projectHasPP) {
                $projek = Projek::where('id', $projectHasPP->projek_id)->first();
                $no_fail = $projek ? $projek->no_fail_jas : '-';
                return $no_fail;
            })
            ->editColumn('nama_projek', function ($projectHasPP) {
                $projek = Projek::where('id', $projectHasPP->projek_id)->first();
                $nama = $projek ? $projek->nama_projek : '-';
                return '<span class="ow pull-left" >' . $nama . '</span>';
            })
            ->editColumn('status_laporan', function ($projectHasPP) {
                $bulananStatus = ProjekBulananStatus::where('projek_id', $projectHasPP->projek_id)->where('bulanan', now()->month)->where('year', now()->year)->first();
                $badge = $bulananStatus ? $bulananStatus->statusFiling ? $bulananStatus->statusFiling->badge : '-' : '-';
                $status = $bulananStatus ? $bulananStatus->statusFiling ? $bulananStatus->statusFiling->name : 'TIADA' : 'TIADA';

                return "<span class='label " . $badge . "'> " . $status . " </span>";
            })
            ->editColumn('status_projek', function ($projectHasPP) {
                $projek = ProjekDetail::where('projek_id', $projectHasPP->projek_id)->first();
                if ($projek) {
                    return "<span class='label " . $projek->statusid->badge . "'> " . $projek->statusid->ext_text . " </span>";
                } else {
                    return '-';
                }
            })
            ->editColumn('action', function ($projectHasPP) {
             $button = "";

             $projek = ProjekDetail::where('projek_id', $projectHasPP->projek_id)->first();
             $syaratKuiri = MonthlyBSyaratRegister::whereIn('status',[610])->first();

             if (in_array($projek->status_id, [209, 210])) {
                $url = url('/projek/pendaftaranprojek/' . $projek->projek_id);

                $button .= '<a href="' . $url . '" class="dt-button buttons-html5 fail btn btn-xs"> <i class="far fa-eye text-info"></i> Pendaftaran Projek&nbsp; </a>';
            }

            return $button;
        })
            ->make(true);
        }

        $masterpengawasans = MasterPengawasan::get();
        $states = MasterState::get();
        $districts = MasterDistrict::get();

        $legendStatuses = MasterFilingStatus::whereIn('id', [200, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, 212])->get();

        return view('projek.senarai_projek', compact('masterpengawasans', 'states', 'districts', 'legendStatuses'));
    }

    public function senarai_ahli(Request $request)
    {
        $users = ProjekHasUser::where('projek_id', $request->projekID)->where('role_id', '!=', 6)->whereNotIn('status', [110])->orderBy('role_id')->get();

        $projekHasUsersEMC = ProjekHasUser::where('projek_has_user.projek_id', $request->projekID)->where('projek_has_user.role_id', '=', 6)->whereNotIn('status', [110])->join('projek_pengawasan','projek_has_user.user_id','=', 'projek_pengawasan.user_id')->orderBy('projek_has_user.role_id')->get();

        foreach ($users as $key => $value) {
         $projekHasUsers[] = $value;
     }
     foreach ($projekHasUsersEMC as $key => $value) {
        if ($value->projek_id != $request->projekID) {
            continue;
        }
        $projekHasUsers[] = $value;
    }

    $legendStatuses = MasterFilingStatus::whereIn('id', [101, 102, 103, 110, 111, 112, 113])->get();


    return view('form-backup.senaraiAhliProjek', compact('projekHasUsers', 'legendStatuses'));
}

public function deleteAhli($role,$projekID,$userID)
{
    $projekHasUser = ProjekHasUser::where('projek_id',$projekID)->where('user_id',$userID)->first();
    $user = User::findOrFail($userID);

    if($projekHasUser){
        $projekHasUser->delete();
        if($role == '5') {
            $userEO = UserEO::findOrFail($user->entity_id);
            $userEO->delete();
        }
        elseif($role == '6') {
            $userEMC = UserEMC::findOrFail($user->entity_id);
            $userEMC->delete();
        }
        $user->delete();
    }
    Session::flash('padamAhli', 'Maklumat ahli telah berjaya dipadam');
    return redirect()->back();
}

public function projek_fasa(Request $request)
{
    $projekFasas = ProjekFasa::where('projek_id', $request->projekID)->get();
    return view('projek.projek_fasa', compact('projekFasas'));
}

public function addAudit(Request $request)
{
    $projectID = $request->projectID;
    $jenis = $request->jenis;

    $tarikh_audit = Carbon::createFromFormat('d/m/Y', $request->tarikh_audit);

    ProjekAudit::where('projek_id', $projectID)->delete();
    $loopCount = $jenis;

    if ($jenis == 5) {
        $loopCount = 12;
    }

    for ($i = 0; $i < $loopCount; $i++) {
        $projekAudit = new ProjekAudit;
        $projekAudit->projek_id = $projectID;
        $projekAudit->kekerapan_audit = $jenis;
        $projekAudit->status_kemajuan = $request->peringkatPengawasan;

        if ($i == 0) {
            $projekAudit->tarikh_audit = $tarikh_audit;
        }

        $projekAudit->save();
    }

    return response()->json($request->all());

}

public function projekFasa(Request $request)
{
    $projek_id = $request->projek_id;
    $jenis_projek = $request->jenis_projek;
    $pengawasan = $request->pengawasan;
    $pengawasan = explode(',', $pengawasan);

    if ($jenis_projek == 1) {
        $phaseCount = ProjekFasa::where('projek_id', $projek_id)->count();
        if ($phaseCount > 1) {
        }

        $phase = ProjekFasa::firstOrCreate(['projek_id' => $projek_id]);
        $phase->nama_pakej = "Tidak Berpakej / Tidak Berfasa";
        $phase->save();

        for ($i = 0; $i < count($pengawasan); $i++) {
            $pakejPengawasan = PakejHasPengawasan::firstOrCreate(['pakej_id' => $phase->id, 'pengawasan_id' => $pengawasan[$i]]);
            $pakejPengawasan->status = 1;
            $pakejPengawasan->save();
        }
    } else if ($jenis_projek == 2) {

    }

    return response()->json($request->all());
}

public function editFasa(Request $request)
{

    $phase = ProjekFasa::where('id', $request->fasaID)->first();
    $pengawasanArr = PakejHasPengawasan::where('pakej_id', $phase->id)->get()->pluck('pengawasan_id')->toArray();
    $PakejHasPengawasan = MasterPengawasan::join('pakej_has_pengawasan', 'pakej_has_pengawasan.pengawasan_id', '=', 'master_pengawasan.id')
    ->join('projek_fasa', 'projek_fasa.id', '=', 'pakej_has_pengawasan.pakej_id')
    ->select('master_pengawasan.jenis_pengawasan', 'pakej_has_pengawasan.id as pengawasan_id', 'pakej_has_pengawasan.pakej_id')
    ->where('projek_fasa.projek_id', $phase->projek_id)->where('projek_fasa.id', $phase->id)->get();

    $userEOs = ProjekHasUser::where('projek_id', $phase->projek_id)->where('role_id', 5)->where('status', 5)->get();
    $userEMCs = ProjekHasUser::where('projek_id', $phase->projek_id)->where('role_id', 6)->where('status', 5)->get();

    $states = MasterState::get();
    $Pengawasan = MasterPengawasan::get();

    return view('projek.editfasa', compact('phase', 'states', 'Pengawasan', 'PakejHasPengawasan', 'pengawasanArr', 'userEOs', 'userEMCs'));
}

public function editFasaSubmit(Request $request)
{
    $phase = ProjekFasa::where('id', $request->fasaID)->first();
    $phase->nama_pakej = $request->nama_pakej;
    $phase->kontraktor = $request->nama_kontraktor;
    $phase->pakej_negeri = $request->negeri;
    $phase->alamat = $request->alamat;
    $phase->alamat1 = $request->alamat1;
    $phase->alamat2 = $request->alamat2;
    $phase->tarikh_mula = $request->tarikh_mula_fasa;
    $phase->tarikh_akhir = $request->tarikh_akhir_fasa;
    $phase->save();

    return response()->json($phase);
}
public function saveDate(Request $request)
{
    $projek = Projek::where('id', $request->id)->first();
    $start = str_replace("/", "-", $request->start);
    $end = str_replace("/", "-", $request->end);
    $startTime = strtotime($start);
    $endTime = strtotime($end);
    if ($startTime > $endTime) {
        return ['success' => false, 'message' => 'Start date is greater than end date'];
    }

    $endDate = date('Y-m-d H:i:s', $endTime);
    $startDate = date('Y-m-d H:i:s', $startTime);
    $projek->tarikh_awal = $startDate;
    $projek->tarikh_akhir = $endDate;
    if ($projek->save()) {
        return ['success' => true, 'message' => 'successfully updated', 'data' => $projek];
    }
}
public function berfasa(Request $request)
{
    if ($request->ajax()) {
            // $pengawasanParameter = MasterPengawasan::with(['parameters.standard' => function ($query) use ($request) {
            //     $query->where('class', $request->kelas);
            // }])->find($request->pengawasanId);
        if ($request->pengawasanId == 5) {
            $request->kelas = '-';
        }

        $pengawasanParameter = MasterParameter::join('master_standard','master_parameter.id','=', 'master_standard.jenis_parameter')->where('jenis_pengawasan', $request->pengawasanId);
        if ($request->pengawasanId == 7) {
            $pengawasanParameter = $pengawasanParameter->where('master_parameter.schedule','like', '%'.$request->kelas.'%');
        } else {
            $pengawasanParameter = $pengawasanParameter->where('master_standard.class',$request->kelas);
        }

        $pengawasanParameter = $pengawasanParameter->select(['master_parameter.id as id',
            'master_parameter.jenis_pengawasan',
            'master_parameter.jenis_parameter',
            'master_parameter.mode',
            'master_parameter.unit',
            'master_parameter.versi',
            'master_standard.parameter',
            'master_standard.id as standard',
        ])->orderBy('master_parameter.mode', 'ASC')->GroupBy('master_parameter.id')->get();

        return response()->json([
            'success' => true,
            'data' => $pengawasanParameter,
        ]);
    }

    $pengawasanSungai = MasterPengawasan::with('parameters')->find(1);

    $pengawasanMarin = MasterPengawasan::with('parameters')->find(2);

    return view('form.berfasa')->with([
        'pengawasanSungai' => $pengawasanSungai,
        'pengawasanMarin' => $pengawasanMarin,
    ]);
}
public function jadual(Request $request) {
    if ($request->ajax()) {
        $pengawasanParameter = MasterStandardBunyi::Join('master_parameter','master_standard_bunyi.jenis_parameter','=', 'master_parameter.jenis_pengawasan')->Join('master_standard','master_parameter.id','=', 'master_standard.jenis_parameter')->where('master_standard_bunyi.schedule','=', $request->jadual)
        ->GroupBy('master_standard_bunyi.categori')->get();

        return response()->json([
            'success' => true,
            'data' => $pengawasanParameter,
        ]);
    }   
}

public function senaraiStesen(Projek $projek, Request $request, $year, $month)
{
    $input = $request->all();
    Paginator::currentPageResolver(function () use ($input) {
        return ($input['start'] / $input['length'] + 1);
    });

    $model = new Stesen();

    if (!empty($input['search']['value'])) {
        foreach ($model->fieldSearchable as $column) {
            $model = $model->whereLike($column, $input['search']['value']);
        }
    }

    $output = $model->with('monthlyCDetail')
    ->where('jenis_pengawasan_id', $input['jenis_pengawasan_id'])
    ->where('projek_id', $projek->id)
    ->where('tahun', $year)
    ->where('bulan', $month)
    ->orderBy('created_at', 'desc');

    $output = $output->paginate()->toArray();
    $data = [];
    foreach ($output['data'] as $key => $value) {
        $data[]  = $value;
        $status = 0;
        $monthlyCDetail = MonthlyCDetail::where('stesen_id', $value['id'])->first();
        if ($monthlyCDetail) {
            $monthlyC = MonthlyC::where('id', $monthlyCDetail->monthly_c_id)->first();
            if ($monthlyC) {
                $status = $monthlyC->status_id;
            }
        }
        $data[$key]['monthly_c_status'] = $status;
    }

    $response = [
        "draw" => $input['draw'],
        "recordsTotal" => intval($output['total']),
        "recordsFiltered" => intval($output['total']),
        "data" => $data,
    ];

    return response()->json($response, 200);
}

public function tambahStesen(Projek $projek, Request $request)
{
    $input = $request->all();
    $input['jenis_pengawasan_id'] = $request->jenis_pengawasan_id;
    if ($input['jenis_pengawasan_id'] == 9) {
        $input['is_eia'] = 1;
    }
    $input['projek_id'] = $projek->id;

    if($request->date_eia){
        $input['date_eia'] = Carbon::createFromFormat('d/m/Y',$request->date_eia);
    }

    if($request->date_emp){
        $input['date_emp'] = Carbon::createFromFormat('d/m/Y',$request->date_eia);
    }

    if ($request->class == "null" )
    {
        $input['class'] = null;
    }
    if ($request->nama == "null")  {
        $input['nama'] = null;
    }

    $validator = Validator::make($input, [
        'latitud' => 'required',
        'longitud' => 'required',
                // 'lembangan' => 'required_if:jenis_pengawasan_id,==,1',
        'class' => 'required_unless:jenis_pengawasan_id,==,9',
        'stesen' => 'required',
        'is_prima' => 'required_if:class,==,"R"',
        'is_sekunder' => 'required_if:class,==,"R"',
        'is_eia' => 'accepted',
                // 'is_emp' => 'accepted',
        'date_eia' => 'required',
                // 'date_emp' => 'required',
        'files.*' => 'mimes:jpg,jpeg,png,bmp|max:20000',
    ], [
        'latitud.required' => 'Sila Isi Ruang Latitude',
        'longitud.required' => 'Sila Isi Ruang Longitude',
                // 'lembangan.required' => 'Sila Isi Ruang Lembangan',
        'class.required_unless' => 'Sila Pilih Kelas',
        'stesen.required' => 'Sila Isi Ruang Nama Stesen',
        'is_prima.accepted' => 'Sentuhan Prima Mesti Diterima',
        'is_sekunder.accepted' => 'Sentuhan Sekunder Mesti Diterima',
        'is_eia.accepted' => 'Peringkat EIA Mesti Diterima',
                // 'is_emp.accepted' => 'Peringkat EMP Mesti Diterima',
        'date_eia.required' => 'Sila Pilih Tarikh EIA',
                // 'date_emp.required' => 'Sila Pilih Tarikh EMP',
        'files.*.required' => 'Sila Muat Naik Fail',
        'files.*.mimes' => 'Hanya JPEG,PNG and BMP Dibenarkan',
        'files.*.max' => 'Maksimum Saiz Fail Tidak Melebihi 20MB',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'code' => 422,
            'message' => $validator->errors(),
        ]);
    }
    DB::beginTransaction();
    try {
            // foreach ($input['files'] as $key => $value) {
            //     $uuid = Uuid::uuid4();
            //     $imagePath = Storage::disk('uploads')->putFileAs('stesen' . '', $value, $uuid . '.' . $value->extension());
            // }

            // $input['gambar_stesen'] = $imagePath;
            // $input['date_eia'] = Carbon::createFromFormat('d/m/Y', $request->date_eia)->toDateTimeString();
            // if (!empty($input['date_emp'])){
            //     $input['date_emp'] = Carbon::createFromFormat('d/m/Y', $request->date_emp)->toDateTimeString();
            // }


        $input['status'] = 13;
        $checkStesen = Stesen::Where('projek_id', $projek->id)->where('jenis_pengawasan_id', $request->jenis_pengawasan_id)->get();

        if (count($checkStesen) > 0) {
            $input['status'] = 13;
        }
                // $stesen = Stesen::firstOrCreate([
                //     'projek_id' => $projek->id,
                //     'status' => 603,
                //     'tahun' => $request->year,
                //     'bulan' => $request->month,
                //     'jenis_pengawasan_id' => $request->jenis_pengawasan_id
                // ],[
                //     $input
                // ]);
        $stesen = Stesen::where('projek_id', $projek->id)->where('tahun', $request->year)->where('bulan',$request->month)->where('jenis_pengawasan_id', $request->jenis_pengawasan_id)->whereNotNull('projek_pengawasan_id')->where('status', 603)->first();
        if (empty($stesen)) {
            $stesen = new Stesen;
            $stesen->projek_id = $projek->id;
            $stesen->status = 603;
            $stesen->tahun = $request->year;
            $stesen->bulan = $request->month;
            $stesen->stesen = $input['stesen'];
            $stesen->lembangan = $input['lembangan'];
            $stesen->class = $input['class'];
            $stesen->is_eia = $input['is_eia'];
            $stesen->is_emp = $input['is_emp'];
            $stesen->date_eia = $input['date_eia'];
            $stesen->date_emp = $input['date_emp'];
            $stesen->latitud = $input['latitud'];
            $stesen->longitud = $input['longitud'];
            $stesen->jenis_pengawasan_id = $request->jenis_pengawasan_id;
            if (array_key_exists('is_near', $input)) {
                $stesen->is_near = $input['is_near'];
            }
            if (array_key_exists('sentuhan', $input)) {
                $stesen->sentuhan = $input['sentuhan'];
            }
            if (array_key_exists('kategori_bunyi', $input)) {
                $stesen->kategori_bunyi = $input['kategori_bunyi'];
            }

            $stesen->save();
        } else {
            $stesen->update($input);
        }

                // $stesen = Stesen::firstOrCreate(['projek_id', $projek->id][])->first();

        if ($input['jenis_pengawasan_id'] != 9) {
            $input['ulasan'] = [];
        }

        if (!empty($input['files'])) {
            uploadFiles($stesen, ['files' => $input['files'], 'ulasan' => $input['ulasan']], 'Gambar_stesen', $stesen->projek_id);
        }
        if (!$stesen) {
            throw new Exception("Error Processing Request", 1);
        } else {
            if ( ($input['jenis_pengawasan_id'] == 2 && $input['class'] == 'R') || ($input['jenis_pengawasan_id'] == 2 && $input['class'] == 'V') || ($input['jenis_pengawasan_id'] == 9) ) {
                $parameter = null;
            } else {
                foreach ($input['parameters'] as $parameter => $value) {

                    $standard = MasterStandard::where('jenis_parameter', $parameter)->where('class', $input['class'])->first();
                    $masterParameter = MasterParameter::find($parameter);
                    if (!empty($standard->id)) {
                        $arr = [
                            'stesen_id' => $stesen->id,
                            'parameter' => $parameter,
                            'baselineeia' => $value,
                            'standard' => $standard->id,
                            'mode' => $masterParameter->mode,
                        ];
                        if ($input['is_emp']) {
                            if (array_key_exists('base_emp', $input)) {
                                $arr['baselineemp'] =  $input['base_emp']['base'.$parameter];
                            }
                        }
                        if ($masterParameter->mode == 'mandatory') {
                            if (empty($value)) {
                                return response()->json([
                                    'success' => false,
                                    'code' => 422,
                                    'message' => 'Please fill all mandatory fields-',
                                ]);
                            }
                            if ($input['is_emp']) {
                                if (empty($input['base_emp']['base'.$parameter])) {
                                    return response()->json([
                                        'success' => false,
                                        'code' => 422,
                                        'message' => 'Please fill all mandatory fields',
                                    ]); 
                                }
                            }
                        }
                    } else {
                        $arr = [
                            'stesen_id' => $stesen->id,
                            'parameter' => $parameter,
                            'baselineeia' => $value,
                            'mode' => $masterParameter->mode,
                        ];
                        if (array_key_exists('base_emp', $input)) {
                            $arr['baselineemp'] =  $input['base_emp']['base'.$parameter];
                        }

                        if ($masterParameter->mode == 'mandatory') {
                            if (empty($value)) {
                             return response()->json([
                                'success' => false,
                                'code' => 422,
                                'message' => 'Please fill all mandatory fields',
                            ]);
                         }
                         if ($input['is_emp']) {
                            if (empty($input['base_emp']['base'.$parameter])) {
                                return response()->json([
                                    'success' => false,
                                    'code' => 422,
                                    'message' => 'Please fill all mandatory fields',
                                ]); 
                            }
                        }
                    }
                }
                $parameter = Parameter::create($arr);
                if (!$parameter) {
                    throw new Exception("Error Processing Request", 1);
                }
            }
                    //check for marin two tables
            if (array_key_exists('is_near', $input)) {
                if ($input['is_near']) {
                    foreach ($input['parameters2'] as $parameter => $value) {
                        $standard = MasterStandard::where('jenis_parameter', $parameter)->where('class', $input['sentuhan'])->first();
                        $masterParameter = MasterParameter::find($parameter);
                        if (!empty($standard->id)) {
                            $arr = [
                                'stesen_id' => $stesen->id,
                                'parameter' => $parameter,
                                'baselineeia' => $value,
                                'standard' => $standard->id,
                                'mode' => $masterParameter->mode,
                                'is_near' => 1,
                            ];
                            if ($input['is_emp']) {
                                if (array_key_exists('base_emp2', $input)) {
                                    $arr['baselineemp'] =  $input['base_emp2']['base'.$parameter];
                                } 
                            }
                            if ($masterParameter->mode == 'mandatory') {
                                if (empty($value)) {
                                 return response()->json([
                                    'success' => false,
                                    'code' => 422,
                                    'message' => 'Please fill all mandatory fields-',
                                ]);
                             }
                             if ($input['is_emp']) {
                                if (empty($input['base_emp2']['base'.$parameter])) {
                                    return response()->json([
                                        'success' => false,
                                        'code' => 422,
                                        'message' => 'Please fill all mandatory fields',
                                    ]); 
                                }
                            }
                        }
                    } else {
                        $arr = [
                            'stesen_id' => $stesen->id,
                            'parameter' => $parameter,
                            'baselineeia' => $value,
                            'mode' => $masterParameter->mode,
                            'is_near' => 1,
                        ];
                        if (array_key_exists('base_emp2', $input)) {
                            $arr['baselineemp'] =  $input['base_emp2']['base'.$parameter];
                        }
                        if ($masterParameter->mode == 'mandatory') {
                            if (empty($value)) {
                             return response()->json([
                                'success' => false,
                                'code' => 422,
                                'message' => 'Please fill all mandatory fields',
                            ]);
                         }
                         if ($input['is_emp']) {
                            if (empty($input['base_emp2']['base'.$parameter])) {
                                return response()->json([
                                    'success' => false,
                                    'code' => 422,
                                    'message' => 'Please fill all mandatory fields',
                                ]); 
                            }
                        }
                    }
                }
                $parameter = Parameter::create($arr);
                if (!$parameter) {
                    throw new Exception("Error Processing Request", 1);
                }
            }
        }
    }
}
}

$data = [
    'receiver_user_id' => $projek->projekHasPp->user->id,
    'fasa' => '-',
    'no_fail_jas' => $projek->no_fail_jas,
    'nama_projek' => $projek->nama_projek
];

                // sendMail($projek->projekHasPp->user, 33, $data);
                // sendNotification(34, $data);

DB::commit();
return response()->json([
    'success' => true,
    'message' => 'Data Berjaya Disimpan.',
    'data' => $parameter,
]);
} catch (\Throwable $th) {
    DB::rollBack();
    throw $th;
}
}

public function updateStesen(Stesen $stesen, Request $request)
{
    $input = $request->all();
    if (!array_key_exists('ulasan', $input)) {
        $input['ulasan'] = [];
    }
    DB::beginTransaction();
    try {
        $imagePath = '';
        if (!empty($input['files'])) {
            foreach ($input['files'] as $key => $value) {
                if ($value == 'undefined') {
                    continue;
                }
                $uuid = Uuid::uuid4();
                $imagePath = Storage::disk('uploads')->putFileAs('stesen' . '', $value, $uuid . '.' . $value->extension());
            }

            $input['gambar_stesen'] = $imagePath;
        }
        $input['date_eia'] = Carbon::createFromFormat('d/m/Y', $request->date_eia)->toDateTimeString();
        $input['date_emp'] = Carbon::createFromFormat('d/m/Y', $request->date_emp)->toDateTimeString();

        $stesen->update($input);
        if (!empty($input['files']) && $input['files'] != 'undefined') {
            uploadFiles($stesen, ['files' => $input['files'], 'ulasan' => $input['ulasan']], 'Gambar_stesen', $stesen->projek_id);
        }
        $stesen->parameters()->delete();

        if (!$stesen) {
            throw new Exception("Error Processing Request", 1);
        } else {
            if ( ($input['jenis_pengawasan_id'] == 2 && $input['class'] == 'R') || ($input['jenis_pengawasan_id'] == 2 && $input['class'] == 'V') || ($input['jenis_pengawasan_id'] == 9) ) {
                $parameter = null;
            } else {
                foreach ($input['parameters'] as $parameter => $value) {

                    $standard = MasterStandard::where('jenis_parameter', $parameter)->where('class', $input['class'])->first();
                    $masterParameter = MasterParameter::find($parameter);

                    if (!empty($standard->id)) {
                        $arr = [
                            'stesen_id' => $stesen->id,
                            'parameter' => $parameter,
                            'baselineeia' => $value,
                            'standard' => $standard->id,
                            'mode' => $masterParameter->mode,
                        ];
                        if ($input['is_emp']) {
                            if (array_key_exists('base_emp', $input)) {
                                $arr['baselineemp'] =  $input['base_emp']['base'.$parameter];
                            }
                        }
                        if ($masterParameter->mode == 'mandatory') {
                            if (empty($value)) {
                                return response()->json([
                                    'success' => false,
                                    'code' => 422,
                                    'message' => 'Please fill all mandatory fields-',
                                ]);
                            }
                            if ($input['is_emp']) {
                                if (empty($input['base_emp']['base'.$parameter])) {
                                    return response()->json([
                                        'success' => false,
                                        'code' => 422,
                                        'message' => 'Please fill all mandatory fields',
                                    ]); 
                                }
                            }
                        }
                    } else {
                        $arr = [
                            'stesen_id' => $stesen->id,
                            'parameter' => $parameter,
                            'baselineeia' => $value,
                            'mode' => $masterParameter->mode
                        ];
                        if (array_key_exists('base_emp', $input)) {
                            $arr['baselineemp'] =  $input['base_emp']['base'.$parameter];
                        }

                        if ($masterParameter && $masterParameter->mode == 'mandatory') {
                            if (empty($value)) {
                             return response()->json([
                                'success' => false,
                                'code' => 422,
                                'message' => 'Please fill all mandatory fields',
                            ]);
                         }
                         if ($input['is_emp']) {
                            if (empty($input['base_emp']['base'.$parameter])) {
                                return response()->json([
                                    'success' => false,
                                    'code' => 422,
                                    'message' => 'Please fill all mandatory fields',
                                ]); 
                            }
                        }
                    }
                }
                $parameter = Parameter::create($arr);
                if (!$parameter) {
                    throw new Exception("Error Processing Request", 1);
                }
            }
                    //check for marin two tables
            if (array_key_exists('is_near', $input)) {
                if ($input['is_near']) {
                    foreach ($input['parameters2'] as $parameter => $value) {
                        $standard = MasterStandard::where('jenis_parameter', $parameter)->where('class', $input['sentuhan'])->first();
                        $masterParameter = MasterParameter::find($parameter);
                        if (!empty($standard->id)) {
                            $arr = [
                                'stesen_id' => $stesen->id,
                                'parameter' => $parameter,
                                'baselineeia' => $value,
                                'standard' => $standard->id,
                                'mode' => $masterParameter->mode,
                                'is_near' => 1,
                            ];
                            if ($input['is_emp']) {
                                if (array_key_exists('base_emp2', $input)) {
                                    $arr['baselineemp'] =  $input['base_emp2']['base'.$parameter];
                                } 
                            }
                            if ($masterParameter->mode == 'mandatory') {
                                if (empty($value)) {
                                 return response()->json([
                                    'success' => false,
                                    'code' => 422,
                                    'message' => 'Please fill all mandatory fields-',
                                ]);
                             }
                             if ($input['is_emp']) {
                                if (empty($input['base_emp2']['base'.$parameter])) {
                                    return response()->json([
                                        'success' => false,
                                        'code' => 422,
                                        'message' => 'Please fill all mandatory fields',
                                    ]); 
                                }
                            }
                        }
                    } else {
                        $arr = [
                            'stesen_id' => $stesen->id,
                            'parameter' => $parameter,
                            'baselineeia' => $value,
                            'mode' => $masterParameter->mode,
                            'is_near' => 1,
                        ];
                        if (array_key_exists('base_emp2', $input)) {
                            $arr['baselineemp'] =  $input['base_emp2']['base'.$parameter];
                        }
                        if ($masterParameter && $masterParameter->mode == 'mandatory') {
                            if (empty($value)) {
                             return response()->json([
                                'success' => false,
                                'code' => 422,
                                'message' => 'Please fill all mandatory fields',
                            ]);
                         }
                         if ($input['is_emp']) {
                            if (empty($input['base_emp2']['base'.$parameter])) {
                                return response()->json([
                                    'success' => false,
                                    'code' => 422,
                                    'message' => 'Please fill all mandatory fields',
                                ]); 
                            }
                        }
                    }
                }
                $parameter = Parameter::create($arr);
                if (!$parameter) {
                    throw new Exception("Error Processing Request", 1);
                }
            }
        }
    }
}
}

DB::commit();

return response()->json([
    'success' => true,
    'message' => 'Data Berjaya Dikemaskini.',
    'data' => $stesen,
]);
} catch (\Throwable $th) {
    DB::rollBack();

    throw $th;
}
}

public function deleteStesen(Stesen $stesen, Request $request)
{
    DB::beginTransaction();
    try {
        $stesen->parameters()->delete();
        $stesen->delete();

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Stesen Berjaya Di Padam.',
        ]);
    } catch (\Throwable $th) {
        DB::rollBack();

        throw $th;
    }
}

public function viewBorangCSungaiModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();

    return view('form.sungai.borang-c-view')->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function viewBorangCMarinModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();

    return view('form.marin.borang-c-view')->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function viewBorangCTasikModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();

    return view('form.tasik.borang-c-view')->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function viewBorangCAirTanahModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();

    return view('form.air-tanah.borang-c-view')->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function viewBorangCKolamModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();

    return view('form.kolam.borang-c-view')->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function viewBorangCUdaraModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();

    return view('form.udara.borang-c-view')->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function viewBorangCBunyiBisingModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();

    return view('form.bunyi-bising.borang-c-view')->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function viewBorangCGetaranModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();

    return view('form.getaran.borang-c-view')->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function viewBorangCDronModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();

    return view('form.dron.borang-c-view')->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function editBorangCSungaiModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();
    return view('form.sungai.borang-c-create', compact('monthlyC'))->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function editBorangCMarinModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();

    return view('form.marin.borang-c-create')->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function editBorangCTasikModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();

    return view('form.tasik.borang-c-create')->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function editBorangCAirTanahModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();

    return view('form.air-tanah.borang-c-create')->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function editBorangCKolamModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();

    return view('form.kolam.borang-c-create')->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function editBorangCUdaraModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();

    return view('form.udara.borang-c-create')->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function editBorangCBunyiBisingModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();

    return view('form.bunyi-bising.borang-c-create')->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function editBorangCGetaranModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();

    return view('form.getaran.borang-c-create')->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function editBorangCDronModal($id)
{
    $monthlyC = MonthlyCDetail::with(['stesen', 'monthlyC.bacaanCerap'])->find($id);
    $stesen = Stesen::where('id', $monthlyC->stesen_id)->first();

    return view('form.dron.borang-c-create')->with([
        'monthlyC' => $monthlyC,
        'pengawasan' => $stesen
    ]);
}

public function editStesenSungaiModal(Stesen $stesen)
{
    $stesen->parameters;
    $stesen->lembanganSungai;
    $projek = Projek::where('id', $stesen->projek_id)->first();
    $pengawasanSungai = $stesen;
    $rujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanSungai->jenis_pengawasan_id)->get();
    return view('form.sungai.tambah-stesen',compact('pengawasanSungai','projek','rujukan'));
}

public function editStesenMarinModal(Stesen $stesen)
{
    $stesen->parameters;
    $pengawasanMarin = $stesen;

    $rujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanMarin->jenis_pengawasan_id)->get();
    return view('form.marin.tambah-stesen', compact('rujukan'))->with('pengawasanMarin', $stesen);
}

public function editStesenTasikModal(Stesen $stesen)
{
    $stesen->parameters;
    $pengawasanTasik = $stesen;

    $rujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanTasik->jenis_pengawasan_id)->get();
    return view('form.tasik.tambah-stesen',compact('rujukan'))->with('pengawasanTasik', $stesen);
}

public function editStesenAirTanahModal(Stesen $stesen)
{
    $stesen->parameters;
    $stesen->lembanganSungai;
    $projek = Projek::where('id', $stesen->projek_id)->first();
    $pengawasanSungai = $stesen;
    $rujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanSungai->jenis_pengawasan_id)->get();
    return view('form.air-tanah.tambah-stesen', compact('rujukan'))->with('pengawasanAirTanah', $stesen);
}

public function editStesenKolamModal(Stesen $stesen)
{
    $stesen->parameters;

    return view('form.kolam.tambah-stesen')->with('pengawasanKolam', $stesen);
}

public function editStesenUdaraModal(Stesen $stesen)
{
    $stesen->parameters;
    $pengawasanSungai = $stesen;
    $rujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanSungai->jenis_pengawasan_id)->get();
    return view('form.udara.tambah-stesen', compact('rujukan'))->with('pengawasanUdara', $stesen);
}

public function editStesenBunyiBisingModal(Stesen $stesen)
{
    $stesen->parameters;
    $pengawasanBunyiBising = $stesen;
    $rujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanBunyiBising->jenis_pengawasan_id)->get();
    return view('form.bunyi-bising.tambah-stesen', compact('rujukan'))->with('pengawasanBunyiBising', $stesen);
}

public function editStesenGetaranModal(Stesen $stesen)
{
    $stesen->parameters;
    $pengawasanGetaran = $stesen;
    $rujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$stesen->jenis_pengawasan_id)->get();
    return view('form.getaran.tambah-stesen',compact('rujukan', 'pengawasanGetaran'))->with('pengawasanGetaran', $stesen);
}

public function editStesenDronModal(Stesen $stesen)
{
    $stesen->parameters;
    $stesen->parameters;
    $stesen->lembanganDron;
    $projek = Projek::where('id', $stesen->projek_id)->first();

    return view('form.dron.tambah-stesen', compact('projek'))->with('pengawasanDron', $stesen);
}

public function viewStesenSungaiModal(Stesen $stesen)
{
    $stesen->parameters;
    $stesen->lembanganSungai;
    $projek = Projek::where('id', $stesen->projek_id)->first();
    $pengawasanSungai = $stesen;
    $kelasrujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanSungai->jenis_pengawasan_id)->get();
    return view('form.sungai.view-stesen',compact('pengawasanSungai','projek','kelasrujukan'));
}

public function viewStesenMarinModal(Stesen $stesen)
{
    $stesen->parameters;
    $stesen->lembanganMarin;
    $projek = Projek::where('id', $stesen->projek_id)->first();
    $pengawasanMarin = $stesen;
    $kelasrujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanMarin->jenis_pengawasan_id)->get();
    return view('form.marin.view-stesen',compact('pengawasanMarin','projek','kelasrujukan'));
}

public function viewStesenTasikModal(Stesen $stesen)
{
    $stesen->parameters;
    $stesen->lembanganTasik;
    $projek = Projek::where('id', $stesen->projek_id)->first();
    $pengawasanTasik = $stesen;
    $kelasrujukan = $rujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanTasik->jenis_pengawasan_id)->get();
    return view('form.tasik.view-stesen',compact('pengawasanTasik','projek', 'kelasrujukan', 'rujukan'));
}

public function viewStesenAirTanahModal(Stesen $stesen)
{

    $stesen->parameters;
    $stesen->lembanganAirTanah;
    $projek = Projek::where('id', $stesen->projek_id)->first();
    $pengawasanAirTanah = $stesen;
    $kelasrujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanAirTanah->jenis_pengawasan_id)->get();

    return view('form.air-tanah.view-stesen',compact('pengawasanAirTanah','projek','kelasrujukan'));
}

public function viewStesenKolamModal(Stesen $stesen)
{
    $stesen->parameters;
    $stesen->lembanganKolam;
    $projek = Projek::where('id', $stesen->projek_id)->first();
    $pengawasanKolam = $stesen;

    return view('form.kolam.view-stesen',compact('pengawasanKolam','projek'));
}

public function viewStesenUdaraModal(Stesen $stesen)
{
    $stesen->parameters;
    $stesen->lembanganUdara;
    $projek = Projek::where('id', $stesen->projek_id)->first();
    $pengawasanUdara = $stesen;
    $kelasrujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanUdara->jenis_pengawasan_id)->get();
    return view('form.udara.view-stesen',compact('pengawasanUdara','projek','kelasrujukan'));
}

public function viewStesenBunyiBisingModal(Stesen $stesen)
{
    $stesen->parameters;
    $stesen->lembanganBunyiBising;
    $projek = Projek::where('id', $stesen->projek_id)->first();
    $pengawasanBunyiBising = $stesen;
    $kelasrujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanBunyiBising->jenis_pengawasan_id)->get();
    return view('form.bunyi-bising.view-stesen',compact('pengawasanBunyiBising','projek','kelasrujukan'));
}

public function viewStesenGetaranModal(Stesen $stesen)
{
    $stesen->parameters;
    $stesen->lembanganGetaran;
    $projek = Projek::where('id', $stesen->projek_id)->first();
    $pengawasanGetaran = $stesen;
    $kelasrujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanGetaran->jenis_pengawasan_id)->get();
    return view('form.getaran.view-stesen',compact('pengawasanGetaran','projek','kelasrujukan'));
}

public function viewStesenDronModal(Stesen $stesen)
{
    $stesen->parameters;
    $stesen->lembanganDron;
    $projek = Projek::where('id', $stesen->projek_id)->first();
    $pengawasanDron = $stesen;

    return view('form.dron.view-stesen',compact('pengawasanDron','projek'));
}

public function tambahStesenSungaiModal(Request $request, Projek $projek)
{
    $pengawasanSungai = MasterPengawasan::with('parameters')->find(1);
    $kelasrujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanSungai->id)->get();
    return view('form.sungai.tambah-stesen')->with([
        'pengawasanSungai' => $pengawasanSungai,
        'projek' => $projek,
        'rujukan'=>$kelasrujukan,
    ]);
}

public function tambahStesenMarinModal(Request $request, Projek $projek)
{
    $pengawasanMarin = MasterPengawasan::with('parameters')->find(2);
    $kelasrujukan = $rujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanMarin->id)->get();
    return view('form.marin.tambah-stesen', compact('rujukan'))->with([
        'pengawasanMarin' => $pengawasanMarin,
        'projek' => $projek,
        'rujukan'=>$kelasrujukan,
    ]);
}

public function tambahStesenTasikModal(Request $request, Projek $projek)
{
    $pengawasanTasik = MasterPengawasan::with('parameters')->find(3);
    $kelasrujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanTasik->id)->get();
    return view('form.tasik.tambah-stesen')->with([
        'pengawasanTasik' => $pengawasanTasik,
        'projek' => $projek,
        'rujukan'=>$kelasrujukan,
    ]);
}

public function tambahStesenAirTanahModal(Request $request, Projek $projek)
{
    $pengawasanAirTanah = MasterPengawasan::with('parameters')->find(4);
    $kelasrujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanAirTanah->id)->get();
    return view('form.air-tanah.tambah-stesen')->with([
        'pengawasanAirTanah' => $pengawasanAirTanah,
        'projek' => $projek,
        'rujukan'=>$kelasrujukan,
    ]);
}

public function tambahStesenKolamModal(Request $request, Projek $projek)
{
    $pengawasanKolam = MasterPengawasan::with('parameters')->find(5);

    return view('form.kolam.tambah-stesen')->with([
        'pengawasanKolam' => $pengawasanKolam,
        'projek' => $projek,
    ]);
}

public function tambahStesenUdaraModal(Request $request, Projek $projek)
{
    $pengawasanUdara = MasterPengawasan::with('parameters')->find(6);
    $kelasrujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanUdara->id)->get();

    return view('form.udara.tambah-stesen')->with([
        'pengawasanUdara' => $pengawasanUdara,
        'projek' => $projek,
        'rujukan'=>$kelasrujukan,
    ]);
}

public function tambahStesenBunyiBisingModal(Request $request, Projek $projek)
{
    $pengawasanBunyiBising = MasterPengawasan::with('parameters')->find(7);
    $kelasrujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanBunyiBising->id)->get();
    return view('form.bunyi-bising.tambah-stesen')->with([
        'pengawasanBunyiBising' => $pengawasanBunyiBising,
        'projek' => $projek,
        'rujukan'=>$kelasrujukan,
    ]);
}

public function tambahStesenGetaranModal(Request $request, Projek $projek)
{
    $pengawasanGetaran = MasterPengawasan::with('parameters')->find(8);
    $kelasrujukan = \DB::table('master_class_pengawasan')->where('pengawasan_id',$pengawasanGetaran->id)->get();
    return view('form.getaran.tambah-stesen')->with([
        'pengawasanGetaran' => $pengawasanGetaran,
        'projek' => $projek,
        'rujukan'=>$kelasrujukan,
    ]);
}

public function tambahStesenDronModal(Request $request, Projek $projek)
{
    $pengawasanDron = MasterPengawasan::with('parameters')->find(9);

    return view('form.dron.tambah-stesen')->with([
        'pengawasanDron' => $pengawasanDron,
        'projek' => $projek,
    ]);
}

public function senaraiBorangC(Request $request, Projek $projek, $year, $month)
{
    $input = $request->all();

    Paginator::currentPageResolver(function () use ($input) {
        return ($input['start'] / $input['length'] + 1);
    });

    $model = new MonthlyC();

    if (!empty($input['search']['value'])) {
        foreach ($model->fieldSearchable as $column) {
            $model = $model->whereLike($column, $input['search']['value']);
        }
    }

    $value = $input['jenis_pengawasan_id'];

    $output = $model->join('monthly_c_detail', 'monthly_c.id','=', 'monthly_c_detail.monthly_c_id')
    ->join('stesen', 'stesen.id','=', 'monthly_c_detail.stesen_id')
    ->where('monthly_c.projek_id', $projek->id)
    ->where('monthly_c.tahun', $year)
    ->where('monthly_c.bulan', $month)
    ->where('stesen.jenis_pengawasan_id', $input['jenis_pengawasan_id'])
    ->select(['monthly_c_detail.nama_fail as nama_fail',
        'stesen.stesen as stesen',
        'stesen.id as stesen_id',
        'monthly_c_detail.tarikh_pengsampelan as tarikh_pengsampelan',
        'monthly_c.id as id',
        'monthly_c_detail.id as detail_id',
        'monthly_c.status_id as status_id'
    ])
    ->orderBy('monthly_c.created_at', 'desc');

    $output = $output->paginate()->toArray();
    $response = [
        "draw" => $input['draw'],
        "recordsTotal" => intval($output['total']),
        "recordsFiltered" => intval($output['total']),
        "data" => $output['data'],
    ];

    return response()->json($response, 200);
}

public function borangC(Request $request)
{
    $stesen = Stesen::with(['parameters.masterParameter.standard'])->find($request->id);
    $monthlyC = false;

    if($stesen->namaProgram->jenis_pengawasan=='Sungai'){
        return view('form.sungai.borang-c-create', compact('monthlyC'))->with([
            'pengawasan' => $stesen,
        ]);
    }elseif($stesen->namaProgram->jenis_pengawasan=='Marin'){
        return view('form.marin.borang-c-create', compact('monthlyC'))->with([
            'pengawasan' => $stesen,
        ]);
    }elseif($stesen->namaProgram->jenis_pengawasan=='Tasik'){
        return view('form.tasik.borang-c-create', compact('monthlyC'))->with([
            'pengawasan' => $stesen,
        ]);
    }elseif($stesen->namaProgram->jenis_pengawasan=='Air Tanah'){
        return view('form.air-tanah.borang-c-create', compact('monthlyC'))->with([
            'pengawasan' => $stesen,
        ]);
    }elseif($stesen->namaProgram->jenis_pengawasan=='Perlepasan Dari Kolam Perangkap Mendap '){
        return view('form.kolam.borang-c-create', compact('monthlyC'))->with([
            'pengawasan' => $stesen,
        ]);
    }elseif($stesen->namaProgram->jenis_pengawasan=='Udara'){
        return view('form.udara.borang-c-create', compact('monthlyC'))->with([
            'pengawasan' => $stesen,
        ]);
    }elseif($stesen->namaProgram->jenis_pengawasan=='Bunyi Bising'){
        return view('form.bunyi-bising.borang-c-create', compact('monthlyC'))->with([
            'pengawasan' => $stesen,
        ]);
    }elseif($stesen->namaProgram->jenis_pengawasan=='Getaran'){
        return view('form.getaran.borang-c-create', compact('monthlyC'))->with([
            'pengawasan' => $stesen,
        ]);
    }elseif($stesen->namaProgram->jenis_pengawasan=='Dron'){
        return view('form.dron.borang-c-create', compact('monthlyC'))->with([
            'pengawasan' => $stesen,
        ]);
    }

}

public function tambahBorangC(Request $request)
{

    $input = $request->all();
    $stesenId = $input['stesen_id'];
    $validator = Validator::make($input, [
        'sample' => 'required',
        'tarikh_pengsampelan' => 'required',
        'masa_pengsampelan' => 'required',
                // 'catatan' => 'required',
        'laporan_kimias.*' => 'mimes:jpg,jpeg,png,bmp|max:20000',
        'gambar_pengsampelans.*' => 'mimes:jpg,jpeg,png,bmp|max:20000',
    ], [
        'sample' => 'Sila isi',
        'tarikh_pengsampelan' => 'Sila isi',
        'masa_pengsampelan' => 'Sila isi',
                // 'catatan' => 'Sila isi',
        'nama_fail' => 'Sila isi',
        'laporan_kimias.*.required' => 'Sila Muat Naik Fail',
        'laporan_kimias.*.mimes' => 'Hanya JPEG,PNG and BMP Dibenarkan',
        'laporan_kimias.*.max' => 'Maksimum Saiz Fail Tidak Melebihi 20MB',
        'gambar_pengsampelans.*.required' => 'Sila Muat Naik Fail',
        'gambar_pengsampelans.*.mimes' => 'Hanya JPEG,PNG and BMP Dibenarkan',
        'gambar_pengsampelans.*.max' => 'Maksimum Saiz Fail Tidak Melebihi 20MB',
    ]);

            // if ($validator->fails()) {
            //     return response()->json([
            //         'success' => false,
            //         'code' => 422,
            //         'message' => $validator->errors(),
            //     ]);
            // }

    DB::beginTransaction();
    try {
        $gamabarpath = $path = [];
        $i = $j = 0;
        if(!empty($input['laporan_kimias'])) {
            foreach ($input['laporan_kimias'] as $key => $value) {
                $uuid = Uuid::uuid4();
                if ($value == 'undefined') {
                    continue;
                }
                $kimiasPath = Storage::disk('uploads')->putFileAs('borang_c/laporan_kimia' . '', $value, $uuid . '.' . $value->extension());

                $path[$i]  = $kimiasPath;
                $i++;
            }
            $input['laporan_kimia'] = json_encode($path);
        }

        if(!empty($input['gambar_pengsampelans'])) {
            foreach ($input['gambar_pengsampelans'] as $key => $value) {
                if ($value == 'undefined') {
                    continue;
                }
                $uuid = Uuid::uuid4();
                $pengsampelansPath = Storage::disk('uploads')->putFileAs('borang_c/gambar_pengsampelan' . '', $value, $uuid . '.' . $value->extension());
                $gamabarpath[$j] = $pengsampelansPath;
                $j++;

            }
            $input['gambar_pengsampelan'] = json_encode($gamabarpath);
        }

        if ($input['gambar_pengsampelan'] == "[]") {
            unset($input['gambar_pengsampelan']);
        }
        if ($input['laporan_kimia'] == "[]") {
            unset($input['laporan_kimia']);
        }
        $tarikh_pengsampelan = str_replace("/","-", $request->tarikh_pengsampelan);
        $input['tarikh_pengsampelan'] = date('Y-m-d', strtotime($tarikh_pengsampelan));
        $input['masa_pengsampelan'] = date('H:i:s', strtotime($request->masa_pengsampelan)); ;

        $input['sampel'] = $request->sample;
        $input['cuaca'] = $request->cuaca;
                // $input['tahun'] = Carbon::createFromFormat('d/m/Y', $request->tarikh_pengsampelan)->year;
                // $input['bulan'] = Carbon::createFromFormat('d/m/Y', $request->tarikh_pengsampelan)->month;
        $input['projek_id'] = $request->projek_id;
        $input['status_id'] = 11;
        $input['nama_fail'] = $request->nama_fail;
                // $monthlyC = MonthlyC::with(['detail' => function ($query) {
                //     return $query->where('nama_fail', '-');
                // }])->where('projek_id', $input['projek_id'])->first();
        $monthlyCDetail = MonthlyCDetail::where('stesen_id', $stesenId)->first();
        $monthlyC = MonthlyC::where('id', $monthlyCDetail->monthly_c_id)->first();
        $stesen = Stesen::where('id', $stesenId)->first();
        if ($monthlyC) {
            if (array_key_exists('bacaan_ceraps', $input) && $input['bacaan_ceraps']) {
                $monthlyC->bacaanCerap()->delete();
            }
            if (array_key_exists('bacaan_ceraps2', $input) && $input['bacaan_ceraps2']) {
                $monthlyC->bacaanCerapB()->delete();
            }
        }
        if(!empty($monthlyCDetail) && !empty($monthlyC)) {
            $monthlyC->update($input);

            if (!$monthlyC) {
                throw new Exception("Error Processing Request", 1);
            }
            $input['stesen_id'] = $request->stesen_id;
            $input['monthly_c_id'] = $monthlyC->id;

            $monthlyC->detail->update($input);
            $monthlyC->detail->update(['catatan' => $input['catatan']]);
            if ($stesen->jenis_pengawasan_id != 9) {
                foreach ($input['bacaan_ceraps'] as $parameter => $value) {
                    $arr = [
                        'monthly_c_id' => $monthlyC->id,
                        'parameter_id' => $parameter,
                        'bacaan_cerap' => $value,
                    ];
                    $bacaan_cerap = BacaanCerap::create($arr);
                    if (!$bacaan_cerap) {
                        throw new Exception("Error Processing Request", 1);
                    }
                }
            }
            if (($stesen->jenis_pengawasan_id == 2 || $stesen->jenis_pengawasan_id == 6 ) && array_key_exists('bacaan_ceraps2', $input)){
                foreach ($input['bacaan_ceraps2'] as $parameter => $value) {
                    $arr = [
                        'monthly_c_id' => $monthlyC->id,
                        'parameter_id' => $parameter,
                        'bacaan_cerap_b' => $value,
                    ];
                    $bacaan_cerap = BacaanCerap::create($arr);
                    if (!$bacaan_cerap) {
                        throw new Exception("Error Processing Request", 1);
                    }
                }
            }

        } else {
            $monthlyC = MonthlyC::create($input);

            if (!$monthlyC) {
                throw new Exception("Error Processing Request", 1);
            }

            $input['stesen_id'] = $request->stesen_id;
            $input['monthly_c_id'] = $monthlyC->id;

            $monthlyC->detail()->create($input);

            if ($stesen->jenis_pengawasan_id != 9) {
                foreach ($input['bacaan_ceraps'] as $parameter => $value) {
                    $arr = [
                        'monthly_c_id' => $monthlyC->id,
                        'parameter_id' => $parameter,
                        'bacaan_cerap' => $value,
                    ];
                    $bacaan_cerap = BacaanCerap::create($arr);
                    if (!$bacaan_cerap) {
                        throw new Exception("Error Processing Request", 1);
                    }
                }
            }
            if ($stesen->jenis_pengawasan_id == 2 && array_key_exists('bacaan_ceraps2', $input)){
                foreach ($input['bacaan_ceraps2'] as $parameter => $value) {
                    $arr = [
                        'monthly_c_id' => $monthlyC->id,
                        'parameter_id' => $parameter,
                        'bacaan_cerap_b' => $value,
                    ];
                    $bacaan_cerap = BacaanCerap::create($arr);
                    if (!$bacaan_cerap) {
                        throw new Exception("Error Processing Request", 1);
                    }
                }
            }
        }

        DB::commit();
        return response()->json([
            'success' => true,
            'message' => 'Data Berjaya Disimpan.',
            'data' => $monthlyC,
        ]);
    } catch (\Throwable $th) {
        DB::rollBack();
        throw $th;
    }
}

public function openProjekForm($id, Request $request)
{
    $year = now()->year;
    $month = now()->month;

    if ($request->year) {
        $year = $request->year;
    } else {
        $year = date('Y');
    }

    if ($request->month) {
        $month = $request->month;
    } else {
        $month = date('m');
    }

    if (strlen($month) == 1) {
        $month = '0'.$month;
    }

    $logdata = LogSystem::where('created_by_user_id', auth()->user()->id)->get();

    ProjekHelper::preCreateForm($id, $year, $month);
            // check for every form status, to enable hantar laporan bulanan button

    $projek = Projek::where('id', $id)->first();
    $projekDetail = ProjekDetail::where('projek_id', $id)->where('status_id', '!=', 500)->first();
    if ($projekDetail) {
        if (!in_array($projekDetail->status_id, [212,203,204])) {
            $projekDetail->status_id = 500;
        }
        $projekDetail->save();
    }

    $projekEMP = ProjekEMP::where('projek_id', $id)->get();
    $projekLdp2m2 = ProjekLDP2M2::where('projek_id', $id)->get();

            // $this->savemonths($month, $year, $projek->id);

    $projekFasa = ProjekFasa::where('projek_id', $id)->get();

    $borangA = MonthlyA::where('projek_id',$id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangB = MonthlyB::where('projek_id',$id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangC = MonthlyC::where('projek_id',$id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangD = MonthlyD::where('projek_id',$id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangE = MonthlyE::where('projek_id',$id)->where('bulan', $month)->where('tahun', $year)->first();
    $borangF = MonthlyF::where('projek_id',$id)->where('bulan', $month)->where('tahun', $year)->first();

    $laporan_hujan = MonthlyDRainyMain::where('projek_id',$id)->where('bulan',$month)->where('tahun',$year)->first();

    $projekBulanan = ProjekBulananStatus::where('projek_id', $projek->id)->where('year', $year)->where('bulanan', $month)
    ->select(['bulanan', 'year', 'status'])->orderBy('bulanan')->first();

    if($projekBulanan->status == 500)
    {
        ProjekHelper::checkAllFormStatus($id, $year, $month);
    }
            // get pengawasans 
    $jenispengawasan = JenisPengawasan::where('projek_id', $id)->first();
    $jenispengawasan = json_decode($jenispengawasan->jenis_pengawasan_id);
    foreach ($jenispengawasan as $key => $value) {
        $master = MasterPengawasan::where('id', $value)->first();
        $jenis[$value]['name'] = $master->jenis_pengawasan;
        $stesenData = Stesen::where('projek_id', $id)->where('bulan',$month)->where('tahun', $year)->where('jenis_pengawasan_id',$value)->orderBy('id', 'desc')->first();
        if($stesenData){
            if (count($stesenData->monthlyCDetail) > 0) {
                $monthlyC = MonthlyC::where('id', $stesenData->monthlyCDetail[0]['monthly_c_id'])->first();
                $jenis[$value]['status'] = $monthlyC->status->name;
                $jenis[$value]['badge'] = $monthlyC->status->badge;
            } else {
             $jenis[$value]['status'] ='-';
             $jenis[$value]['badge'] = '-';
         }
     }else {
         $jenis[$value]['status'] ='-';
         $jenis[$value]['badge'] = '-';
     }
 }

 return view('form.index', compact('year', 'month', 'projek', 'projekDetail','projekEMP','projekLdp2m2','borangA','projekFasa','borangB','borangE','borangF','borangD','borangC', 'projekBulanan','laporan_hujan', 'jenis', 'logdata'));
}

public function hantarLaporanBulanan(Request $request)
{
    $projek_id = $request->projekid;
    $year = $request->year;
    $month = $request->month;

    $projek = Projek::where('id', $projek_id)->first();
    $projekDetail = $projek->projekdetail;

            // $projekDetail->status_id = 502;
            // $projekDetail->save();

    $projekBulanan = ProjekBulananStatus::where('projek_id', $projek_id)->where('year', $year)->where('bulanan', $month)->first();
    $projekBulanan->status = 2;
    $projekBulanan->save();

    $laporanFinal = LaporanSiasatanFinal::firstOrCreate(['projek_id' => $projek_id, 'tahun' => $year, 'bulan' => $month]);
    $laporanFinal->status = 508;
    $laporanFinal->save();

    ProjekHelper::updateLaporanPemarkahan($projek_id, $year, $month);

    Session::flash('success', 'Laporan Bulanan '. $projek->no_fail_jas . '('.$year.' - '.$month.') telah berjaya dihantar');
    return redirect()->back();
}

public function getmonths($year, $projekId, Request $request)
{
    $projek = Projek::where('id', $projekId)->first();

    $projekDetail = $projek->projekdetail;
            // $projekDetail->status_id = 211;
    $projekDetail->save();

    $startYear = date("Y", strtotime($projek->tarikh_awal));
    $endYear = date("Y", strtotime($projek->tarikh_akhir));

    $diffYears = abs($startYear - $endYear);

    $startMonth = date("m", strtotime($projek->tarikh_awal));
    $endMonth = date("m", strtotime($projek->tarikh_akhir));

    $diffMonths = abs($endMonth - $startMonth);
    $pematuhanEia = MasterPematuhanEia::where('id', $projek->pematuhan_eia)->first();

    $occurence = $pematuhanEia->divided;

    $duration = $projek->tempoh;

    $repeatInterval = $duration / $occurence;
            //to save in database

    $currentMonth = date('m');
    $currentYear = date('Y');
    $currentDate = date("Y-m-d");
    $timeStap = strtotime($currentDate);
            // to send current date in loop, minus 1 month
    $addDate = date("Y-m", strtotime('-1 month', strtotime($projek->tarikh_awal)));
    $lastDate = date("Y-m", strtotime($projek->tarikh_akhir));
    $lastDateTime = strtotime($lastDate);

    for ($i = 1; $i <= $duration; $i++) {
        $addMonth = '+' . $occurence . ' month';
        $nextDate = date("Y-m", strtotime($addMonth, strtotime($addDate)));
        $getYear = date('Y', strtotime($nextDate));
        $addDate = $nextDate;
                // no need to add extra dates
        if (strtotime($nextDate) > $lastDateTime) {
            continue;
        }
        $projekBulananStatus = ProjekBulananStatus::where('projek_id', $projek->id)->where('bulanan', date("m", strtotime($nextDate)))->where('year', date("Y", strtotime($nextDate)))->first();

        if (empty($projekBulananStatus)) {
            $projekBulananStatus = new ProjekBulananStatus;
            $projekBulananStatus->projek_id = $projek->id;
            $projekBulananStatus->bulanan = date("m", strtotime($nextDate));
            $projekBulananStatus->year = date("Y", strtotime($nextDate));

            if ($currentYear < date("Y", strtotime($nextDate))) {
                $projekBulananStatus->status = 0;
            } else {
                if ($currentMonth >= date("m", strtotime($nextDate))) {
                            //previous months ,so can click
                    $projekBulananStatus->status = 500;
                } else {
                            //if greater than, then need to check
                    $projekBulananStatus->status = 0;
                }
            }
            $projekBulananStatus->save();
        }

    }
            //need to add logic to get 500 records for 31+7 days
    $projekBulanan = ProjekBulananStatus::where('projek_id', $projek->id)->where('year', $year)
    ->select(['bulanan', 'year', 'status'])->orderBy('bulanan','ASC')->get();

    if ($year == date('Y')) {
        $show = 'show';
    } else {
        $show = '';
    }

    $month = $request->month;
         // dd($month);
    return view('form.showdates', compact('year', 'month', 'projekBulanan', 'show', 'projek'));
}

public function savemonths($month, $year, $projekid)
{
            // please modify the data u want here
    $projek = Projek::where('id', $projekid)->first();
    $projekPengawasan = ProjekPengawasan::where('projek_id', $projekid)->get();

            //saving
    $monthlyA = MonthlyA::where('projek_id', $projekid)->where('bulan', $month)->where('tahun', $year)->first();
    if (empty($monthlyA)) {
        $monthlyA = new MonthlyA;
        $monthlyA->projek_id = $projekid;
        $monthlyA->bulan = $month;
        $monthlyA->tahun = $year;
        $monthlyA->status_id = 600;
        $monthlyA->save();

                // $MonthlyAESCP = new MonthlyAESCP;
                // $MonthlyAESCP->monthlya_id = $monthlyA->id;
                // $MonthlyAESCP->save();

                // $MonthlyAKemajuan = new MonthlyAKemajuan;
                // $MonthlyAKemajuan->projek_id = $projekid;
                // $MonthlyAKemajuan->monthly_a_id = $monthlyA->id;
                // $MonthlyAKemajuan->pakej_id = 348;
                // $MonthlyAKemajuan->peratus_kemajuan = 0;
                // $MonthlyAKemajuan->save();

                // $MonthlyApplication = new MonthlyApplication;
                // $MonthlyApplication->projek_id = $projekid;
                // $MonthlyApplication->bulan = $month;
                // $MonthlyApplication->tahun = $year;
                // $MonthlyApplication->save();

        $MonthlyB = new MonthlyB;
        $MonthlyB->projek_id = $projekid;
        $MonthlyB->bulan = $month;
        $MonthlyB->tahun = $year;
        $MonthlyB->status_id = 600;
        $MonthlyB->save();

        if ($projekPengawasan) {
            foreach ($projekPengawasan as $pengawas) {
                $station = Stesen::where('projek_id', $projek_id)->where('jenis_pengawasan_id', $pengawas->pengawasan_id)->where('tahun', $year)->where('bulan', $month)->first();
                if (empty($station)) {
                    $station = new Stesen;
                }
                $station->tahun = $year;
                $station->projek_id = $projekid;
                $station->jenis_pengawasan_id = $pengawas->pengawasan_id;
                $station->bulan = $month;
                $station->projek_pengawasan_id = $pengawas->id;
                $station->status = 603;
                $station->save();
            }
        }
                // $MonthlyBSyarat = new MonthlyBSyarat;
                // $MonthlyBSyarat->monthly_b_id = $MonthlyB->id;
                // $MonthlyBSyarat->save();


        $MonthlyD = new MonthlyD;
        $MonthlyD->projek_id = $projekid;
        $MonthlyD->bulan = $month;
        $MonthlyD->tahun = $year;
        $MonthlyD->status_id = 600;
        $MonthlyD->save();

        $MonthlyDRainyMain = new MonthlyDRainyMain;
        $MonthlyDRainyMain->monthlyd_rainy_id = $MonthlyD->id;
        $MonthlyDRainyMain->projek_id = $projekid;
        $MonthlyDRainyMain->bulan = $month;
        $MonthlyDRainyMain->tahun = $year;
        $MonthlyDRainyMain->status_id = 600;
        $MonthlyDRainyMain->save();

                // $MonthlyDBulanan = new MonthlyDBulanan;
                // $MonthlyDBulanan->monthlyD_id = $MonthlyD->id;

        $MonthlyE = new MonthlyE;
        $MonthlyE->projek_id = $projekid;
        $MonthlyE->bulan = $month;
        $MonthlyE->tahun = $year;
        $MonthlyE->status_id = 600;
        $MonthlyE->save();

                // $MonthlyEDetail = new MonthlyEDetail;
        $MonthlyF = new MonthlyF;
        $MonthlyF->projek_id = $projekid;
        $MonthlyF->bulan = $month;
        $MonthlyF->tahun = $year;
        $MonthlyF->status_id = 600;
        $MonthlyF->save();

    }
}
public function tabs3()
{
    return view('form.tabs3');
}

public function tabs4()
{
    return view('form.tabs4');
}

public function stesenSungai(Projek $projek)
{
    return view('form.stesenSungai')->with([
        'projek' => $projek,
    ]);
}

public function stesenMarin(Projek $projek)
{
    return view('form.stesenMarin')->with([
        'projek' => $projek,
    ]);
}

public function stesenTasik(Projek $projek)
{
    return view('form.stesenTasik')->with([
        'projek' => $projek,
    ]);
}

public function stesenAirTanah(Projek $projek)
{
    return view('form.stesenAirTanah')->with([
        'projek' => $projek,
    ]);
}

public function stesenKolam(Projek $projek)
{
    return view('form.stesenKolam')->with([
        'projek' => $projek,
    ]);
}

public function stesenUdara(Projek $projek)
{
    return view('form.stesenUdara')->with([
        'projek' => $projek,
    ]);
}

public function stesenBunyi(Projek $projek)
{
    return view('form.stesenBunyi')->with([
        'projek' => $projek,
    ]);
}

public function stesenGetaran(Projek $projek)
{
    return view('form.stesenGetaran')->with([
        'projek' => $projek,
    ]);
}

public function stesenDron(Projek $projek)
{
    return view('form.stesenDron')->with([
        'projek' => $projek,
    ]);
}

public function loadPengawasan(MasterPengawasan $pengawasan, Projek $projek)
{
    if ($pengawasan->id == 1) {
        return view('form.stesenSungai')->with([
            'projek' => $projek,
        ]);
    } else if ($pengawasan->id == 2) {
        return view('form.stesenMarin')->with([
            'projek' => $projek,
        ]);
    } else if ($pengawasan->id == 3) {
        return view('form.stesenTasik')->with([
            'projek' => $projek,
        ]);
    } else if ($pengawasan->id == 4) {
        return view('form.stesenAirTanah')->with([
            'projek' => $projek,
        ]);
    } else if ($pengawasan->id == 5) {
        return view('form.stesenKolam')->with([
            'projek' => $projek,
        ]);
    } else if ($pengawasan->id == 6) {
        return view('form.stesenUdara')->with([
            'projek' => $projek,
        ]);
    } else if ($pengawasan->id == 7) {
        return view('form.stesenBunyi')->with([
            'projek' => $projek,
        ]);
    } else if ($pengawasan->id == 8) {
        return view('form.stesenGetaran')->with([
            'projek' => $projek,
        ]);
    } else if ($pengawasan->id == 9) {
        return view('form.stesenDron')->with([
            'projek' => $projek,
        ]);
    }
}

public function hantarStesen(Stesen $stesen)
{
    $stesen->update([
        'status' => 13
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Stesen Berjaya Dihantar',
        'data' => $stesen
    ]);
}

public function sahkanStesen(Stesen $stesen,Request $request)
{

    $stesen->update([
        'status' => 4,
    ]);

    $year = now()->year;
    $month = now()->month;

    if ($request->year) {
        $year = $request->year;
    }

    if ($request->month) {
        $month = $request->month;
    }

    return response()->json([
        'success' => true,
        'message' => 'Stesen Berjaya Disahkan',
        'data' => $stesen
    ]);
}

public function semakBorangC(MonthlyC $monthlyc)
{
    if(auth()->user()->hasRole('eo') && ($monthlyc->status_id == 11)) {
        $monthlyc->update([
            'status_id' => 13
        ]);
    }

    if(auth()->user()->hasRole('pp') && ($monthlyc->status_id == 13)) {
        $monthlyc->update([
            'status_id' => 602
        ]);
    }

    return response()->json([
        'success' => true,
        'message' => 'Borang C Berjaya Disahkan',
        'data' => $monthlyc
    ]);
}

public function downloadFile($id)
{
    return downloadFile($id);
}
public function getfasaTab(Request $request, $id)
{
    $projek = $request->projek;
    $year = $request->year;
    $month = $request->month;
    $pakejId = $id;
    return view('form.fasa1', compact('pakejId', 'projek', 'year', 'month'));
}
public function deleteImage(Request $request) {
    if ($request->token) {
        $file = UploadedFile::where('id', $request->token)->first();
    } else {
        $file = false;
    }

    if ($file) {
        if ($file->delete()) {
            return ['success' => true, 'token' => $request->token ];
        }
    } else {
        return ['success' => false ];
    }
}
}
