<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterModel\MasterIndustryType;
use App\MasterModel\MasterSectorCategory;
use App\MasterModel\MasterSector;
use App\MasterModel\MasterReport;
use App\MasterModel\MasterProvinceOffice;
use App\MasterModel\MasterModule;
use App\FilingModel\Distribution;
use App\LogModel\LogSystem;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $reports = MasterReport::all();
        $industries = MasterIndustryType::all();
        $sectors = MasterSector::all();
        $categories = MasterSectorCategory::where('sector_id', 2)->get();
        $offices = MasterProvinceOffice::all();
        $years = range(date('Y'), date('Y') - 10);

    	return view('report.index', compact('reports', 'industries', 'sectors', 'categories', 'offices', 'years'));
    }
    public function kpi(Request $request) {

        $reports = MasterReport::all();
        $industries = MasterIndustryType::all();
        $sectors = MasterSector::all();
        $categories = MasterSectorCategory::where('sector_id', 2)->get();
        $offices = MasterProvinceOffice::all();
        $years = range(date('Y'), date('Y') - 10);
      
        $modules = MasterModule::where('type',3)->get();

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','report')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Laporan KPI";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            if ($request->module_id) {
                $module = MasterModule::where('id',$request->module_id)->first();
                $model_class = $module->model;
                $model = $model_class::where('filing_status_id','>',1);
            }else{
                $model = \App\FilingModel\FormB::where('filing_status_id','>',1);
            }

            $model = $model->whereHas('logs',function($logs){
                return $logs->whereIn('activity_type_id',[11,12])->whereIn('filing_status_id',[1,2,3]);
            });

            if ($request->start_date) {
                $model = $model->whereHas('logs',function($logs) use($request) {
                    return $logs->where('created_at', '>=', Carbon::createFromFormat('d/m/Y',$request->start_date));
                });
            }

            if ($request->end_date) {
                $model = $model->whereHas('logs',function($logs) use($request) {
                    return $logs->where('created_at', '<=', Carbon::createFromFormat('d/m/Y',$request->end_date));
                });
            }

            if ($request->province_office_id) {
                if (in_array($request->module_id,[7])) {
                    $model = $model->whereHas('union',function($union) use($request) {
                        return $union->where('province_office_id',$request->province_office_id);
                    });
                }else if(in_array($request->module_id,[9])) {
                    $model = $model->whereHas('federation',function($federation) use($request) {
                        return $federation->where('province_office_id',$request->province_office_id);
                    });
                }else{
                    $model = $model->whereHas('created_by',function($created_by) use($request) {

                        // module yg bermula dari pegawai
                        if (in_array($request->module_id,[30])) {
                            return $created_by->whereHas('entity_staff',function($entity_staff) use($request) {
                                return $entity_staff->where('province_office_id',$request->province_office_id);
                            });
                        // module yg bermula dari ks
                        }else{
                            return $created_by->whereHas('entity_user',function($entity_user) use($request) {
                                return $entity_user->where('province_office_id',$request->province_office_id);
                            });
                        }
                    });
                }
            }

            if ($request->process) {
                if ($request->process == 1) {
                    $model = $model->whereIn('filing_status_id',[2,3,4,5,6,7]);
                }
                if ($request->process == 2) {
                    $model = $model->whereIn('filing_status_id',[9,10,11,12]);
                }
                if ($request->process == 3) {
                    $model = $model->whereIn('filing_status_id',[8,11,10]);
                }
            }

            return datatables()->of($model)
                ->editColumn('created_by', function ($model) {
                    if (optional($model->created_by->entity)->name) {
                        return $model->created_by->entity->name;
                    }else{
                        return $model->created_by->name.' - '.strtoupper($model->created_by->entity_staff->role->name);
                    }
                })
                ->editColumn('filing.reference_no', function ($model) {
                    return optional($model->references->last())->reference_no;
                    // return $model->id.' '.get_class($model);
                })
                ->editColumn('date_submit', function ($model) {
                    if (optional($model->logs()->whereIn('activity_type_id',[11,12])->whereIn('filing_status_id',[1,2,3])->first())->created_at) {
                        return date('d/m/Y H:i:s',strtotime(optional($model->logs()->whereIn('activity_type_id',[11,12])->whereIn('filing_status_id',[1,2,3])->first())->created_at));
                    }
                })
                ->editColumn('date_processed', function ($model) {

                    $foo = '';

                    if (optional($model->logs()->where('activity_type_id',16)->whereIn('filing_status_id',[8,9,10,11,12])->get()->last())->created_at) {
                        $foo .= date('d/m/Y H:i:s',strtotime(optional($model->logs()->where('activity_type_id',16)->whereIn('filing_status_id',[8,9,10,11,12])->get()->last())->created_at));
                    }

                    return $foo;

                })
                ->editColumn('result', function ($model) {

                    $foo = '';

                    $submitted_date = optional($model->logs()->whereIn('activity_type_id',[11,12])->whereIn('filing_status_id',[1,2,3])->first())->created_at;

                    if ($submitted_date) {
                        $end_date = optional($model->logs()->where('activity_type_id',16)->whereIn('filing_status_id',[8,9,10,11,12])->get()->last())->created_at;

                        if ($end_date) {

                            if (optional($model->logs()->where('activity_type_id',16)->where('filing_status_id',8)->first())->created_at) {
                                $foo .= '<span class="badge badge-danger">TIDAK LULUS</span><br>';
                            }else if(optional($model->logs()->where('activity_type_id',16)->where('filing_status_id',9)->first())->created_at) {
                                $foo .= '<span class="badge badge-success">LULUS</span><br>';
                            }else if(optional($model->logs()->where('activity_type_id',16)->where('filing_status_id',10)->first())->created_at) {
                                $foo .= '<span class="badge badge-default">SELESAI</span><br>';
                            }else if(optional($model->logs()->where('activity_type_id',16)->where('filing_status_id',11)->first())->created_at) {
                                $foo .= '<span class="badge badge-default">LULUS + TIDAK LULUS</span><br>';
                            }else if(optional($model->logs()->where('activity_type_id',16)->where('filing_status_id',12)->first())->created_at) {
                                $foo .= '<span class="badge badge-success">DIPERAKUKAN</span><br>';
                            }

                        }else{
                            $foo .= '<br>';
                            $foo .= '<span class="badge badge-default">DALAM PROSES</span>';
                        }
                    }

                    return $foo;
                })
                ->editColumn('processed_day', function ($model) {

                    $submitted_date = optional($model->logs()->whereIn('activity_type_id',[11,12])->whereIn('filing_status_id',[1,2,3])->first())->created_at;

                    if ($submitted_date) {
                        $end_date = optional($model->logs()->where('activity_type_id',16)->whereIn('filing_status_id',[8,9])->get()->last())->created_at;

                        if ($end_date) {
                            $foo = Carbon::createFromFormat('Y-m-d H:i:s', $submitted_date)->diffInDays(Carbon::createFromFormat('Y-m-d H:i:s', $end_date));
                        }else{
                            $foo = Carbon::createFromFormat('Y-m-d H:i:s', $submitted_date)->diffInDays(Carbon::now());
                        }

                        return $foo;

                    }
                })
                ->editColumn('action', function ($formk) {
                    return '';
                })
                ->make(true);
        }
        else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','report')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Agihan";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }
        return view('report.kpi.index', compact('modules','reports', 'industries', 'sectors', 'categories', 'offices', 'years'));
    }

    /**
     * Show the application details.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request) {

        $report = MasterReport::findOrFail($request->report_id);

        $model = '\\App\\ViewModel\\ViewReport' . ucwords($report->type->name) . $report->code;
        $view_report_query = $model::query();

        if($request->industry_type_id) {
            // Filter
            $view_report_query = $view_report_query->where('industry_type_id', $request->industry_type_id);
        }

        if($request->sector_id) {
            // Filter
            $view_report_query = $view_report_query->where('sector_id', $request->sector_id);
        }

        if($request->sector_category_id) {
            // Filter
            $view_report_query = $view_report_query->where('sector_category_id', $request->sector_category_id);
        }

        if($request->province_office_id) {
            // Filter
            $view_report_query = $view_report_query->where('province_office_id', $request->province_office_id);
        }

        if($request->start_year) {
            // Filter
            $view_report_query = $view_report_query->where('year', '>=', $request->start_year);
        }

        if($request->end_year) {
            // Filter
            $view_report_query = $view_report_query->where('year', '<=', $request->end_year);
        }

        $view_report = $view_report_query->get();

        $start_year = $request->start_year ? $request->start_year : date('Y') - 5;
        $end_year = $request->end_year ? $request->end_year : date('Y');
        $name = $report->name;
        
        return view('report.'.$report->type->name.'.'.$report->code.'.index', compact('view_report', 'start_year', 'end_year', 'name', 'view_report_query'));
    }

    public function main(Request $request) {
        // if(auth()->user()->hasRole('ks'))
        // $menu = [
        //     'Bilangan Kesatuan Sekerja Dan Keanggotaan',
        //     'Bilangan Kesatuan Sekerja Mengikut Jantina',
        //     'Bilangan Kesatuan Sekerja Mengikut Sektor',
        //     'Keanggotaan Kesatuan Sekerja Mengikut Jantina Dan Sektor',
        //     'Bilangan Kesatuan Sekerja Mengikut Jenis',
        //     'Bilangan Keanggotaan Mengikut Jenis & Jantina',
        //     'Bilangan Kesatuan Sekerja Mengikut Kategori',
        //     'Bilangan Dan Keanggotaan Kesatuan Sekerja Berdasarkan Industri',
        //     'Bilangan Kesatuan Sekerja Mengikut Industri',
        //     'Keanggotaan Kesatuan Sekerja Mengikut Industri',
        //     'Bilangan Dan Keanggotaan Kesatuan Sekerja Pekerja Dan Majikan',
        //     'Bilangan Kesatuan Sekerja Yang Bergabung Dengan Cuepacs',
        //     'Bilangan Kesatuan Sekerja Yang Bergabung Dengan Mtuc',
        //     'Bilangan Kesatuan Sekerja Yang Bergabung Dengan Badan Perunding Antrabangsa',
        //     'Bilangan Dan Keanggotaan Cuepacs',
        // ];
        // else
        // $menu = [
        //     'Bilangan & Keanggotaan Kesatuan Sekerja',
        //     'Bilangan Keanggotaan Kesatuan Sekerja Berdasarkan Jantina',
        //     'Bilangan & Keanggotaan Kesatuan Sekerja Berdasarkan Sektor',
        //     'Bilangan Keanggotaan Kesatuan Sekerja Berdasarkan Sektor & Jantina',
        //     'Bilangan Kesatuan Sekerja Berdasarkan Jenis',
        //     'Bilangan Keanggotaan Kesatuan Sekerja Berdasarkan Jenis & Jantina',
        //     'Bilangan & Keanggotaan Kesatuan Sekerja Berdasarkan Kategori (Etoi)',
        //     'Bilangan Kesatuan Sekerja Pekerja & Majikan',
        //     'Senarai & Keanggotaan Kesatuan Sekerja Kerja Majikan',
        //     'Bilangan & Keanggotaan Kesatuan Sekerja Berdasarkan Negeri',
        //     'Bilangan Keanggotaan Kesatuan Sekerja Tertinggi',
        //     'Bilangan Pendaftaran & Kesatuan Sekerja Aktif Berdasarkan Lokasi',
        //     'Bilangan & Keanggotaan Kesatuan Sekerja Yang Bergabung Dengan Cuepacs',
        //     'Bilangan & Keanggotaan Kesatuan Sekerja Yang Bergabung Dengan Mtuc',
        //     'Bilangan Kesatuan Sekerja Yang Bergabung Dengan Cuepacs, Mtuc & Badan Perunding Antarabangsa',
        //     'Bilangan Kesatuan Sekerja (Daftar, Batal, Bubar)',
        //     'Bilangan & Keanggotaan Kesatuan Sekerja Berdasarkan Industri',
        //     'Senarai Persekutuan Kesatuan Sekerja',
        //     'Percantum Kesatuan Sekerja',
        //     'Bilangan & Keanggotaan Kesatuan Sekerja Yang Mempunyai Keanggotaan Pekerja Asing',
        //     'Bilangan Kesatuan Yang Mempunyai Keanggotaan Pekerja Asing Mengikut Industri',
        //     'Bilangan Pekerja Asing Yang Menganggotai Kesatuan Sekerja Mengikut Industri',
        //     'Bilangan Pekerja Asing Yang Menganggotai Kesatuan Sekerja Mengikut Kategori (Etoi)',
        //     'Keanggotaan Pekerja Asing Mengikut Negeri',
        //     'Keanggotaan Pekerja Asing Mengikut Negara',
        //     'Senarai Kesatuan & Keanggotaan Pekerja Asing Mengikut Negeri',
        //     'Bilangan & Keanggotaan Kesatuan Sekerja Yang Bergabung Dengan Badan Perunding Antrabangsa',
        // ];
        if(auth()->user()->hasAnyRole(['ks', 'ptw', 'ppw', 'pw']) ){
            $menu = MasterReport::where('report_type_id', 1)->where('is_active', 1)->get();
        }elseif(auth()->user()->hasAnyRole(['pthq', 'pphq']) ){
            $menu = MasterReport::where('report_type_id', 2)->where('is_active', 1)->get();
        }else{
            $menu = MasterReport::where('report_type_id', 2)->where('is_active', 1)->get();
        }

        return view('report.main', compact('menu'));
    }
}
