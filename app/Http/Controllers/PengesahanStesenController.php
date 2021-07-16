<?php

namespace App\Http\Controllers;

use App\MasterModel\MasterFilingStatus;
use App\MasterModel\MasterParameter;
use App\MasterModel\MasterStandard;
use App\Models\MasterSungai;
use App\Models\MonthlyC;
use App\Models\MonthlyCDetail;
use App\Models\Parameter;
use App\Projek;
use App\ProjekBulananStatus;
use App\ProjekHasPp;
use App\Stesen;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengesahanStesenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function senaraiStesen(Request $request)
    {
        $stesenQuery = Stesen::query();

        if (Auth::user()->hasRole('pp')) {
            $projekhaspp = ProjekHasPp::where('user_id', auth()->user()->id)->pluck('projek_id')->toArray();
            $stesenQuery->whereIn('projek_id', $projekhaspp);
        }
        $status = '';
        if ($request->has('status')) {
            $status = $request->status;
            if ($status == 'belum_sah') {
                $stesenQuery->where('status', 4);
            }

            if ($status == 'telah_sah') {
                $stesenQuery->where('status', 607);
            }
        } else {
            $stesenQuery->whereIn('status', [4]);
        }

        // $stesenQuery->groupBy('projek_id', 'jenis_pengawasan_id');

        if ($request->ajax()) {
            return datatables()->of($stesenQuery->get())

                ->editColumn('no_fail_jas', function ($stesen) {
                    return $stesen->projek ? $stesen->projek->no_fail_jas : '-';
                })
                ->editColumn('pengawasan', function ($stesen) {
                    return $stesen->namaProgram ? $stesen->namaProgram->jenis_pengawasan : '-';
                })
                ->editColumn('name', function ($stesen) {
                    return $stesen->stesen;
                })
                ->editColumn('latitude', function ($stesen) {
                    return $stesen->latitud;
                })
                ->editColumn('longitude', function ($stesen) {
                    return $stesen->longitud;
                })
                ->editColumn('tarikh_pengawasan', function ($stesen) {
                    return date('d/m/Y', strtotime($stesen->date_eia));
                })
                ->editColumn('lembangan', function ($stesen) {
                    if ($stesen->lembangan == 'undefined') {
                        return '-';
                    } else {
                        return $stesen->lembangan;
                    }
                })
                ->editColumn('status', function ($stesen)  {
                    $status = $stesen->stesenStatus ? $stesen->stesenStatus->name : '';
                    $badge = $stesen->stesenStatus ? $stesen->stesenStatus->badge : 'label-light-success';
                    
                    return '<span style="text-align:center;font-size:16px;" class="label label-lg label-inline ' . $badge . '">' . $status . '</span>';
                    
                })
                ->editColumn('action', function ($stesen) use ($status) {
                    $button = '';

                    $style = "style='pointer-events:none'";
                    $color = "warning";
                    $nama = strtolower($stesen->namaProgram->id);
                     if ($status == 'telah_sah') {
                        
                        $button .= "<span class='btn fail btn-xs' onclick='viewStation(" . $stesen->id . "," . $nama . ")'><i class='fas fa-eye text-warning'></i> </span>";
                    } else {
                        $button .= "<span class='btn fail btn-xs' onclick='viewStation(" . $stesen->id . "," . $nama . ")'> PENGESAHAN </span>";

                    }


                    return $button;
                })
                ->make(true);
        }

        $legendStatuses = MasterFilingStatus::whereIn('id', [4, 13, 603, 607])->get();

        return view('form.senaraiStesen', compact('legendStatuses'));
    }

    public function pengesahan_stesen(Request $request)
    {
        $stesens = new Stesen;
        $stesen = $stesens->where('status', 4);
        if ($request->year) {
            $stesen->where('tahun', $request->year);
        }
        if ($request->month) {
            $stesen->where('bulan', $request->month);
        }

        if ($request->ajax()) {
            return datatables()->of($stesen)

                ->editColumn('name', function ($stesen) {
                    return $stesen->stesen;
                })
                ->editColumn('latitude', function ($stesen) {
                    return $stesen->latitud;
                })
                ->editColumn('longitude', function ($stesen) {
                    return $stesen->longitud;
                })
                ->editColumn('tarikh_pengawasan', function ($stesen) {
                    return date('d/m/Y', strtotime($stesen->date_eia));
                })
                ->editColumn('lembangan', function ($stesen) {
                    if ($stesen->lembangan == 'undefined') {
                        return '-';
                    } else {
                        return $stesen->lembangan;
                    }
                })
                ->editColumn('status', function ($stesen) {
                    return '<span style="text-align:center;font-size:16px;" class="label label-lg label-light-success label-inline">Pengesahan Peg. Penyiasat</span>';
                })
                ->editColumn('action', function ($stesen) {
                    $button = '';
                    $style = "style='pointer-events:none'";
                    $color = "warning";
                    $nama = strtolower($stesen->namaProgram->id);
                    $button .= "<span class='btn fail btn-xs' onclick='viewStation(" . $stesen->id . "," . $nama . ")'> PENGESAHAN </span>";

                    return $button;
                })
                ->make(true);
        }

        $legendStatuses = MasterFilingStatus::whereIn('id', [4, 13, 603, 607])->get();

        return view('form.pengesahanStesen', compact('legendStatuses'));
    }

    public function pengesahanModal($id)
    {
        $stesen = Stesen::where('id', $id)->first();
        if ($stesen->lembangan != 'undefined') {
            $sungai = MasterSungai::select('id', 'lembangan_2020', 'sungai_2020')
                ->where('lembangan_2020', 'LIKE', '%' . $stesen->lembangan . '%')->first();
        } else {
            $sungai = null;
        }

        $parameter = Parameter::where('stesen_id', $stesen->id)->whereNotNull('baselineeia')->get();
        $parameters = [];
        foreach ($parameter as $key => $value) {
            $standard = MasterStandard::where('id', $value->standard)->first();
            $masterParameter = MasterParameter::find($value->parameter);
            if ($masterParameter) {
                $parameters[$key]['name'] = $masterParameter->jenis_parameter;
                $parameters[$key]['unit'] = $masterParameter->unit;
                $parameters[$key]['value'] = $value->baselineeia;
                $parameters[$key]['emp'] = $value->baselineemp;
                $parameters[$key]['standard'] = $standard ? $standard->parameter : '-';
            }
        }
        $sno = 1;
        return view('form.pengeshanmodal', compact('stesen', 'sungai', 'parameters', 'sno'));
    }

    public function tambah_stesen()
    {
        return view('form.tambahStesen');
    }

    public function downloadFile(Request $request, $id)
    {
        $stesen = Stesen::where('id', $id)->first();
        $fileUrl = $stesen->gambar_stesen;

        if ($fileUrl) {
            return Storage::disk('uploads')->download($fileUrl);

        } else {
            return "";
        }
    }

    public function saveStesen(Request $request, $id)
    {
        DB::beginTransaction();
        $stesen = Stesen::where('id', $id)->first();
        $stesen->status = 607;
        $stesen->save();

        $monthlyC = new MonthlyC;
        $monthlyC->projek_id = $stesen->projek_id;
        $monthlyC->status_id = 600;
        $monthlyC->bulan = $stesen->bulan;
        $monthlyC->tahun = $stesen->tahun;
        $monthlyC->save();

        $monthlyCDetail = new MonthlyCDetail;
        $monthlyCDetail->stesen_id = $stesen->id;
        $monthlyCDetail->monthly_c_id = $monthlyC->id;
        $monthlyCDetail->tarikh_pengsampelan = date('Y-m-d');
        $monthlyCDetail->save();

        $remainingStations = [];
        if ($stesen->projek_pengawasan_id) {
            // we save same data to all greater months
            $remainingStations = Stesen::where('jenis_pengawasan_id', $stesen->jenis_pengawasan_id)->whereNotIn('status', [607, 13, 4])->whereNotNull('projek_pengawasan_id')->where('projek_id', $stesen->projek_id)->get();
            if (count($remainingStations) > 0) {
                foreach ($remainingStations as $key => $value) {
                    if ($value->bulan < $stesen->bulan) {
                        if ($value->tahun < $stesen->tahun) {
                            continue;
                        }
                    }

                    if ($value->bulanan == $stesen->bulan && $value->year == $stesen->tahun) {
                        continue;
                    }

                    $stesenData = Stesen::where('id', $value->id)->first();
                    $stesenData->nama = $stesen->nama;
                    $stesenData->stesen = $stesen->stesen;
                    $stesenData->status = $stesen->status;
                    $stesenData->projek_id = $stesen->projek_id;
                    $stesenData->lembangan = $stesen->lembangan;
                    $stesenData->gambar_stesen = $stesen->gambar_stesen;
                    $stesenData->longitud = $stesen->longitud;
                    $stesenData->latitud = $stesen->latitud;
                    $stesenData->class = $stesen->class;
                    $stesenData->is_eia = $stesen->is_eia;
                    $stesenData->is_emp = $stesen->is_emp;
                    $stesenData->date_eia = $stesen->date_eia;
                    $stesenData->date_emp = $stesen->date_emp;
                    $stesenData->main_stesen_id = $stesen->id;
                    $stesenData->save();

                    $monthlyC = new MonthlyC;
                    $monthlyC->projek_id = $stesenData->projek_id;
                    $monthlyC->status_id = 600;
                    $monthlyC->bulan = $stesenData->bulan;
                    $monthlyC->tahun = $stesenData->tahun;
                    $monthlyC->save();

                    $monthlyCDetail = new MonthlyCDetail;
                    $monthlyCDetail->stesen_id = $stesenData->id;
                    $monthlyCDetail->monthly_c_id = $monthlyC->id;
                    $monthlyCDetail->tarikh_pengsampelan = date('Y-m-d');
                    $monthlyCDetail->save();

                    $parameters = Parameter::where('stesen_id', $stesen->id)->get();
                    foreach ($parameters as $value) {

                        $parameter = new Parameter;
                        $parameter->stesen_id = $stesenData->id;
                        $parameter->parameter = $value->parameter;
                        $parameter->baselineeia = $value->baselineeia;
                        $parameter->baselineemp = $value->baselineemp;
                        $parameter->standard = $value->standard;
                        $parameter->mode = $value->mode;
                        $parameter->save();
                    }

                }
            }
        }

        // get all months if new stesenData
        if (empty($remainingStations)) {
            $getAllMonths = ProjekBulananStatus::where('projek_id', $stesen->projek_id)->get();
        } else {
            $getAllMonths = [];
        }
        if (count($getAllMonths) > 0) {
            foreach ($getAllMonths as $key => $value) {
                if ((int) $value->bulanan < $stesen->bulan) {
                    if ((int) $value->year <= $stesen->tahun) {
                        continue;
                    }
                }

                if ($value->bulanan == $stesen->bulan && $value->year == $stesen->tahun) {
                    continue;
                }
                //new stesen save
                $stesenData = new Stesen;
                $stesenData->nama = $stesen->nama;
                $stesenData->tahun = $value->year;
                $stesenData->bulan = $value->bulanan;
                $stesenData->stesen = $stesen->stesen;
                $stesenData->status = $stesen->status;
                $stesenData->projek_id = $stesen->projek_id;
                $stesenData->lembangan = $stesen->lembangan;
                $stesenData->gambar_stesen = $stesen->gambar_stesen;
                $stesenData->jenis_pengawasan_id = $stesen->jenis_pengawasan_id;
                $stesenData->longitud = $stesen->longitud;
                $stesenData->latitud = $stesen->latitud;
                $stesenData->class = $stesen->class;
                $stesenData->is_eia = $stesen->is_eia;
                $stesenData->is_emp = $stesen->is_emp;
                $stesenData->date_eia = $stesen->date_eia;
                $stesenData->date_emp = $stesen->date_emp;
                $stesenData->main_stesen_id = $stesen->id;
                $stesenData->save();

                $monthlyC = new MonthlyC;
                $monthlyC->projek_id = $stesen->projek_id;
                $monthlyC->status_id = 600;
                $monthlyC->bulan = $stesenData->bulan;
                $monthlyC->tahun = $stesenData->tahun;
                $monthlyC->save();

                $monthlyCDetail = new MonthlyCDetail;
                $monthlyCDetail->stesen_id = $stesenData->id;
                $monthlyCDetail->monthly_c_id = $monthlyC->id;
                $monthlyCDetail->tarikh_pengsampelan = date('Y-m-d');
                $monthlyCDetail->save();

                $parameters = Parameter::where('stesen_id', $stesen->id)->get();

                foreach ($parameters as $value) {

                    $parameter = new Parameter;
                    $parameter->stesen_id = $stesenData->id;
                    $parameter->parameter = $value->parameter;
                    $parameter->baselineeia = $value->baselineeia;
                    $parameter->standard = $value->standard;
                    $parameter->mode = $value->mode;
                    $parameter->save();
                }
            }
        }

        $data['no_fail_jas'] = $stesen->projek->no_fail_jas;
        $data['nama_projek'] = $stesen->projek->nama_projek;
        $data['fasa'] = '-';

        // shoot email/notification to pp
        $data['receiver_user_id'] = 1;
        sendMail($stesen->projek->projekHasPp->user, 35, $data);
        sendNotification(36, $data);

        // shoot email/notification to emc
        $emcs = $stesen->projek->projekHasUser()->where('role_id', 6)->get();

        if ($emcs) {
            foreach ($emcs as $emc) {
                $data['receiver_user_id'] = $emc->user_id;
                sendMail($emc->user, 35, $data);
                sendNotification(36, $data);
            }
        }

        DB::commit();
        return response()->json(['success' => true]);
    }
}
