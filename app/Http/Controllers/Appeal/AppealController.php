<?php

namespace App\Http\Controllers\Appeal;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogModel\LogSystem;
use App\FilingModel\Appeal;
use Storage;
use Validator;
use Carbon\Carbon;

class AppealController extends Controller
{

    public function index(Request $request)
    {
        return view('appeal.index');
    }

    public function edit(Request $request)
    {
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
        $log->activity_type_id = 2;
        $log->description = "Kemaskini Rayuan";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $appeal = Appeal::findOrFail($request->id); 
        $upload_date = $appeal->upload_date;
        $link = 'storage/uploads/appeal/'.date('Y',strtotime($appeal->upload_date)).'/'.date('F',strtotime($appeal->upload_date)).'/'.date('Ymd').'/'.$appeal->form_id.'/';

        return view('appeal.edit', compact('appeal','link','upload_date'));
        
    }

    public function insert(Request $request) {

        // Kalau Submit True Then Terus Set Ke Status Submitted Else Set Draft
        $submit = $request->post('submit') == 'true' ? true : false;

        $validator = Validator::make($request->all(), [
            'dokumen1' => 'required_without_all:dokumen2,dokumen3,dokumen4|file',
            'dokumen2' => 'required_without_all:dokumen1,dokumen3,dokumen4|file',
            'dokumen3' => 'required_without_all:dokumen1,dokumen2,dokumen4|file',
            'dokumen4' => 'required_without_all:dokumen1,dokumen2,dokumen3|file',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'warning', 'title' => 'Ralat', 'message' => 'Salah satu input perlu diisi']);
        }

        $listToInsert = [
            'created_at' => \Carbon\Carbon::now(),
            'created_by' => auth()->user()->id,
        ];   

        // Draft Running No
        $master_runningno = \App\MasterModel\MasterRunningNo::where('code','D-R')->firstOrFail();
        // reset running no if not same as current year 
        if ($master_runningno->year != date('Y')) {
            $master_runningno->count = 1;
            $master_runningno->year = date('Y');
            $master_runningno->save();
        }
        // end reset running no 
        $runningno = $master_runningno->code.'-'.$master_runningno->year.'-'.$master_runningno->count;
        $master_runningno->count = $master_runningno->count + 1;
        $master_runningno->save();
        //

        if ($submit) {
            $listToInsert['filing_status_id'] = 2;
            $listToInsert['submitted_at'] = date('Y-m-d H:i:s');
            $listToInsert['submitted_by'] = auth()->user()->id;

            // Submission Running No
            $master_runningno_submission = \App\MasterModel\MasterRunningNo::where('code','R')->firstOrFail();
            // reset running no if not same as current year 
            if ($master_runningno_submission->year != date('Y')) {
                $master_runningno_submission->count = 0;
                $master_runningno_submission->year = date('Y');
                $master_runningno_submission->save();
            }
            // end reset running no 
            $submissionrunningno = $master_runningno_submission->code.'-'.$master_runningno_submission->year.'-'.$master_runningno_submission->count;
            $master_runningno_submission->count = $master_runningno_submission->count + 1;
            $master_runningno_submission->save();

            $listToInsert['submission_id'] = $submissionrunningno;
            //

        }else{
            $listToInsert['filing_status_id'] = 1;
        }

        $listToInsert['form_id'] = $runningno;
        $listToInsert['upload_date'] = date('Y-m-d');

        // Submission Running No (If Submitted)

        if ($request->dokumen1 && $request->file('dokumen1')->isValid()) {

            $name1 = '1-'.$runningno.'.'.$request->file('dokumen1')->getClientOriginalExtension();
            $dokumen1 = Storage::disk('uploads')->putFileAs(
                'appeal/'.date('Y').'/'.date('F').'/'.date('Ymd').'/'.$runningno,
                $request->file('dokumen1'),
                $name1
            );

            $upload1_original_filename = $request->file('dokumen1')->getClientOriginalName();

            $listToInsert['upload1_filename'] = $name1;
            $listToInsert['upload1_real_filename'] = $upload1_original_filename;
        }

        if ($request->dokumen2 && $request->file('dokumen2')->isValid()) {

            $name2 = '2-'.$runningno.'.'.$request->file('dokumen2')->getClientOriginalExtension();
            $dokumen2 = Storage::disk('uploads')->putFileAs(
                'appeal/'.date('Y').'/'.date('F').'/'.date('Ymd').'/'.$runningno,
                $request->file('dokumen2'),
                $name2
            );

            $upload2_original_filename = $request->file('dokumen2')->getClientOriginalName();

            $listToInsert['upload2_filename'] = $name2;
            $listToInsert['upload2_real_filename'] = $upload2_original_filename;
        }

        if ($request->dokumen3 && $request->file('dokumen3')->isValid()) {

            $name3 = '3-'.$runningno.'.'.$request->file('dokumen3')->getClientOriginalExtension();
            $dokumen3 = Storage::disk('uploads')->putFileAs(
                'appeal/'.date('Y').'/'.date('F').'/'.date('Ymd').'/'.$runningno,
                $request->file('dokumen3'),
                $name3
            );

            $upload3_original_filename = $request->file('dokumen3')->getClientOriginalName();

            $listToInsert['upload3_filename'] = $name3;
            $listToInsert['upload3_real_filename'] = $upload3_original_filename;
        }

        if ($request->dokumen4 && $request->file('dokumen4')->isValid()) {

            $name4 = '4-'.$runningno.'.'.$request->file('dokumen4')->getClientOriginalExtension();
            $dokumen4 = Storage::disk('uploads')->putFileAs(
                'appeal/'.date('Y').'/'.date('F').'/'.date('Ymd').'/'.$runningno,
                $request->file('dokumen4'),
                $name4
            );

            $upload4_original_filename = $request->file('dokumen4')->getClientOriginalName();

            $listToInsert['upload4_filename'] = $name4;
            $listToInsert['upload4_real_filename'] = $upload4_original_filename;
        }

        $appeal = Appeal::create($listToInsert);

        $appeal->logs()->updateOrCreate(
            [
                'module_id' => \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id,
                'activity_type_id' => 4,
                'filing_status_id' => $appeal->filing_status_id,
                'created_by_user_id' => auth()->id(),
                'role_id' => auth()->user()->roles->last()->id
            ],
            [
                'data' => ''
            ]
        );

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
        $log->activity_type_id = 4;
        $log->description = "Tambah Rayuan";
        $log->data_new = json_encode($appeal);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        if ($submit) {
            return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Rayuan telah dihantar.']);
        }else{
            return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah disimpan.']);
        }

    }

    public function update(Request $request) {

        $appeal = Appeal::findOrFail($request->id); 

        // Kalau Submit True Then Terus Set Ke Status Submitted Else Set Draft
        $submit = $request->post('submit') == 'true' ? true : false;

        $validator = Validator::make($request->all(), [
            'dokumen1' => 'required_without_all:dokumen2,dokumen3,dokumen4|file',
            'dokumen2' => 'required_without_all:dokumen1,dokumen3,dokumen4|file',
            'dokumen3' => 'required_without_all:dokumen1,dokumen2,dokumen4|file',
            'dokumen4' => 'required_without_all:dokumen1,dokumen2,dokumen3|file',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'warning', 'title' => 'Ralat', 'message' => 'Salah satu input perlu diisi']);
        }

        $listToInsert = [
            'updated_at' => \Carbon\Carbon::now(),
            'updated_by' => auth()->user()->id,
        ];   

        if (!$appeal->upload_date) {
           $appeal->upload_date = date('Y-m-d');
        }

        //

        if ($submit) {
            $listToInsert['filing_status_id'] = 2;
            $listToInsert['submitted_at'] = date('Y-m-d H:i:s');
            $listToInsert['submitted_by'] = auth()->user()->id;

            // Submission Running No
            $master_runningno_submission = \App\MasterModel\MasterRunningNo::where('code','R')->firstOrFail();
            // reset running no if not same as current year 
            if ($master_runningno_submission->year != date('Y')) {
                $master_runningno_submission->count = 0;
                $master_runningno_submission->year = date('Y');
                $master_runningno_submission->save();
            }
            // end reset running no 
            $submissionrunningno = $master_runningno_submission->code.'-'.$master_runningno_submission->year.'-'.$master_runningno_submission->count;
            $master_runningno_submission->count = $master_runningno_submission->count + 1;
            $master_runningno_submission->save();

            $listToInsert['submission_id'] = $submissionrunningno;
            //

        }else{
            $listToInsert['filing_status_id'] = 1;
        }

        // Submission Running No (If Submitted)

        if ($request->dokumen1 && $request->file('dokumen1')->isValid()) {

            $name1 = '1-'.$appeal->form_id.'.'.$request->file('dokumen1')->getClientOriginalExtension();
            $dokumen1 = Storage::disk('uploads')->putFileAs(
                'appeal/'.date('Y',strtotime($appeal->upload_date)).'/'.date('F',strtotime($appeal->upload_date)).'/'.date('Ymd',strtotime($appeal->upload_date)).'/'.$appeal->form_id,
                $request->file('dokumen1'),
                $name1
            );

            $upload1_original_filename = $request->file('dokumen1')->getClientOriginalName();

            $listToInsert['upload1_filename'] = $name1;
            $listToInsert['upload1_real_filename'] = $upload1_original_filename;
        }

        if ($request->dokumen2 && $request->file('dokumen2')->isValid()) {

            $name2 = '2-'.$appeal->form_id.'.'.$request->file('dokumen2')->getClientOriginalExtension();
            $dokumen2 = Storage::disk('uploads')->putFileAs(
                'appeal/'.date('Y',strtotime($appeal->upload_date)).'/'.date('F',strtotime($appeal->upload_date)).'/'.date('Ymd',strtotime($appeal->upload_date)).'/'.$appeal->form_id,
                $request->file('dokumen2'),
                $name2
            );

            $upload2_original_filename = $request->file('dokumen2')->getClientOriginalName();

            $listToInsert['upload2_filename'] = $name2;
            $listToInsert['upload2_real_filename'] = $upload2_original_filename;
        }

        if ($request->dokumen3 && $request->file('dokumen3')->isValid()) {

            $name3 = '3-'.$appeal->form_id.'.'.$request->file('dokumen3')->getClientOriginalExtension();
            $dokumen3 = Storage::disk('uploads')->putFileAs(
                'appeal/'.date('Y',strtotime($appeal->upload_date)).'/'.date('F',strtotime($appeal->upload_date)).'/'.date('Ymd',strtotime($appeal->upload_date)).'/'.$appeal->form_id,
                $request->file('dokumen3'),
                $name3
            );

            $upload3_original_filename = $request->file('dokumen3')->getClientOriginalName();

            $listToInsert['upload3_filename'] = $name3;
            $listToInsert['upload3_real_filename'] = $upload3_original_filename;
        }

        if ($request->dokumen4 && $request->file('dokumen4')->isValid()) {

            $name4 = '4-'.$appeal->form_id.'.'.$request->file('dokumen4')->getClientOriginalExtension();
            $dokumen4 = Storage::disk('uploads')->putFileAs(
                'appeal/'.date('Y',strtotime($appeal->upload_date)).'/'.date('F',strtotime($appeal->upload_date)).'/'.date('Ymd',strtotime($appeal->upload_date)).'/'.$appeal->form_id,
                $request->file('dokumen4'),
                $name4
            );

            $upload4_original_filename = $request->file('dokumen4')->getClientOriginalName();

            $listToInsert['upload4_filename'] = $name4;
            $listToInsert['upload4_real_filename'] = $upload4_original_filename;
        }

        $appeal->update($listToInsert);

        $appeal->logs()->updateOrCreate(
            [
                'module_id' => \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id,
                'activity_type_id' => 5,
                'filing_status_id' => $appeal->filing_status_id,
                'created_by_user_id' => auth()->id(),
                'role_id' => auth()->user()->roles->last()->id
            ],
            [
                'data' => ''
            ]
        );

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Rayuan";
        $log->data_new = json_encode($appeal);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        if ($submit) {
            return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Rayuan telah dihantar.']);
        }else{
            return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah disimpan.']);
        }

    }

    public static function exticon($ext){

        if ($ext == 'pdf') {
            $exticon = "<span class='text-danger'><span class='fa fa-file-pdf-o m-r-5 fa-2x'></span></span>";
        }else if ($ext == 'doc' || $ext == 'docx') {
            $exticon = "<span class='text-primary'><span class='fa fa-file-word-o m-r-5 fa-2x'></span></span>";
        }else if ($ext == 'xls' || $ext == 'xlsx') {
            $exticon = "<span class='text-success'><span class='fa fa-file-excel-o m-r-5 fa-2x'></span></span>";
        }else{
            $exticon = "<span class=''><span class='fa fa-file m-r-5 fa-2x'></span></span>";
        }

        return $exticon;

    }

    public function list_user(Request $request) {

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Rayuan";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $appeal = Appeal::where('created_by',auth()->user()->id)->orderBy('submitted_at','desc');

            return datatables()->of($appeal->get())
                ->editColumn('date', function ($appeal) {

                    $button = '';

                    if ($appeal->created_at) {
                        $button .= "Tarikh Dibuat : <br>";
                        $button .= "<b>";
                        $button .= date('d/m/Y H:i:s',strtotime($appeal->created_at));
                        $button .= "</b>";
                    }

                    if ($appeal->submitted_at) {
                        $button .= "<br><br> Tarikh Dihantar : <br>";
                        $button .= "<b>";
                        $button .= date('d/m/Y H:i:s',strtotime($appeal->submitted_at));
                        $button .= "</b>";
                    }

                    return $button;
                })
                ->editColumn('documents', function ($appeal) {
                    $button = '';
                    $upload_date = $appeal->upload_date;

                    if ($appeal->upload1_filename) {
                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload1_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper('D4 Unit').'</a><br>';
                    }

                    if ($appeal->upload2_filename) {
                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload2_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper('Pengiktirafan Kelulusan').'</a><br>';
                    }

                    if ($appeal->upload3_filename) {
                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload3_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper('Rayuan Pemohon').'</a><br>';
                    }

                    if ($appeal->upload4_filename) {
                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload4_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper('Dokumen Sokongan').'</a><br>';
                    }

                    return $button;
                })
                ->editColumn('submission_id_skb', function ($appeal) {
                    $button = '';

                    $button .= str_replace('-','/',$appeal->goodconduct->submission_id);

                    $button .= "<br><br>";
                    $button .= '<a href="'.route('goodconduct.form.view_user', $appeal->good_conduct_id).'" class="btn btn-primary btn-xs"> <span class="fa fa-search"></span> LIHAT SKB</a> ';

                    return $button;
                })
                ->editColumn('submission_id', function ($appeal) {
                    $button = '';

                    $button = str_replace('-','/',$appeal->submission_id);

                    return $button;
                })
                ->editColumn('status', function ($appeal) {
                    $button = '';

                    // $button .= "<span class='label label-".$appeal->filing->color." label-lg' style='text-transform:uppercase'>";
                    // $button .= $appeal->filing->name;
                    // $button .= "</span>";

                    if ($appeal->filing_status_id==2) {
                        $button .= "<span class='label label-warning label-lg' style='text-transform:uppercase'>";
                        $button .= "Telah Dihantar";
                        $button .= "</span>";
                    }else{
                        $button .= "<span class='label label-".$appeal->filing->color." label-lg' style='text-transform:uppercase'>";
                        $button .= $appeal->filing->name;
                        $button .= "</span>";
                    }

                    if ($appeal->submitted_at) {
                        $button .= "<br><br>";
                        $button .= "Tarikh Hantar : <b>".date('d.m.Y',strtotime($appeal->upload_date))."</b>";
                    }
                    if ($appeal->konsular_at) {
                        $button .= "<br><br>";
                        $button .= "Tarikh Keputusan Konsular : <b>".date('d.m.Y',strtotime($appeal->konsular_date_decision))."</b>";
                    }

                    return $button;
                })
                ->editColumn('createdby', function ($appeal) {
                    $button = '';
                    $button .= $appeal->createdBy->name;

                    return $button;
                })
                ->editColumn('action', function ($appeal) {
                    $button = '';
                    if ($appeal->filing_status_id==1) {
                        $button .= '<a href="'.route('appeal.form', $appeal->id).'" class="btn btn-primary btn-xs m-r-5 m-b-5"><i class="fa fa-edit"></i> KEMASKINI</a> <br>';
                        $button .= '<a onclick="remove('.$appeal->id.')" href="javascript:;" class="btn btn-danger btn-xs m-r-5"><i class="fa fa-trash"></i> PADAM</a> ';
                    }
                    if (auth()->user()->hasAnyRole(['pengguna_dalam'])) {
                        $button .= '<a onclick="approve('.$appeal->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="background-color: #607d8b"><i class="fa fa-check"></i> LULUSKAN PERMOHONAN</a> ';
                        $button .= "<br>";
                        $button .= '<a onclick="reject('.$appeal->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1" ><i class="fa fa-remove"></i> TOLAK PERMOHONAN</a> ';
                    }
                    return $button;
                })
                ->make(true);
        }
        else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Senarai Rayuan";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('appeal.list_user');
    }

    public function list(Request $request) {

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Rayuan";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            if (auth()->user()->hasAnyRole(['pengguna_luar'])) {
                $appeal = Appeal::where('created_by',auth()->user()->id)->orderBy('filing_status_id','asc')->orderBy('submitted_at','desc');
                // $appeal->where('konsular_decision','');
                // $appeal->orWhere('konsular_decision',NULL);
            }
            if (auth()->user()->hasAnyRole(['pengguna_dalam'])) {
                $appeal = Appeal::orderBy('filing_status_id','asc')->orderBy('submitted_at','desc');
                $appeal->whereNotIn('filing_status_id',[1]);

                if (auth()->user()->hasAnyRole(['konsular'])) {
                    $appeal->where('konsular_decision','');
                    $appeal->orWhere('konsular_decision',NULL);
                }
            } 

            return datatables()->of($appeal->get())
                ->editColumn('documents', function ($appeal) {
                    $button = '';
                    $upload_date = $appeal->upload_date;

                    if ($appeal->upload1_filename) {
                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload1_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper($appeal->upload1_filename).'</a><br>';
                    }

                    if ($appeal->upload2_filename) {
                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload2_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper($appeal->upload2_filename).'</a><br>';
                    }

                    if ($appeal->upload3_filename) {
                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload3_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper($appeal->upload3_filename).'</a><br>';
                    }

                    if ($appeal->upload4_filename) {
                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload4_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper($appeal->upload4_filename).'</a><br>';
                    }

                    return $button;
                })
                ->editColumn('submission_id_skb', function ($appeal) {
                    $button = '';

                    $button .= str_replace('-','/',$appeal->goodconduct->submission_id);

                    $button .= "<br><br>";
                    $button .= '<a href="'.route('goodconduct.form.view_user', $appeal->good_conduct_id).'" class="btn btn-primary btn-xs"> <span class="fa fa-search"></span> LIHAT SKB</a> ';

                    return $button;
                })
                ->editColumn('submission_id', function ($appeal) {
                    $button = '';

                    $button = str_replace('-','/',$appeal->submission_id);

                    return $button;
                })
                ->editColumn('status', function ($appeal) {
                    $button = '';

                    $button .= "<span class='label label-default label-lg' style='text-transform:uppercase'>";
                    if (auth()->user()->hasAnyRole(['pengguna_dalam'])) {
                        if ($appeal->filing->name == 'Telah Dihantar') {
                            $button .= "BARU";
                        }else{
                            $button .= $appeal->filing->name;
                        }
                    }else{
                        $button .= $appeal->filing->name;
                    }
                    $button .= "</span>";

                    if ($appeal->submitted_at) {
                        $button .= "<br><br>";
                        $button .= "Tarikh Hantar : <b>".date('d.m.Y',strtotime($appeal->upload_date))."</b>";
                    }
                    if ($appeal->konsular_at) {
                        $button .= "<br><br>";
                        $button .= "Tarikh Keputusan Konsular : <b>".date('d.m.Y',strtotime($appeal->konsular_date_decision))."</b>";
                    }

                    return $button;
                })
                ->editColumn('createdby', function ($appeal) {
                    $button = '';
                    $button .= $appeal->createdBy->name;

                    return $button;
                })
                ->editColumn('action', function ($appeal) {
                    $button = '';
                    if ($appeal->filing_status_id==1) {
                        $button .= '<a href="'.route('appeal.form', $appeal->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a> ';
                        $button .= '<a onclick="remove('.$appeal->id.')" href="javascript:;" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> ';
                    }
                    if (auth()->user()->hasAnyRole(['pengguna_dalam'])) {
                        $button .= '<a onclick="approve('.$appeal->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="background-color: #607d8b"><i class="fa fa-check"></i> LULUSKAN PERMOHONAN</a> ';
                        $button .= "<br>";
                        $button .= '<a onclick="reject('.$appeal->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1" ><i class="fa fa-remove"></i> TOLAK PERMOHONAN</a> ';
                    }
                    return $button;
                })
                ->make(true);
        }
        else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Senarai Rayuan";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('appeal.list');
    }

    public function listkonsular(Request $request) {

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Rayuan";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            if (auth()->user()->hasAnyRole(['pengguna_luar'])) {
                $appeal = Appeal::where('created_by',auth()->user()->id)->orderBy('filing_status_id','asc')->orderBy('submitted_at','desc');
                $appeal->where('konsular_decision','');
                $appeal->orWhere('konsular_decision',NULL);
            }
            if (auth()->user()->hasAnyRole(['pengguna_dalam'])) {
                $appeal = Appeal::orderBy('filing_status_id','asc')->orderBy('submitted_at','desc');
                $appeal->whereNotIn('filing_status_id',[1]);

                // if (auth()->user()->hasAnyRole(['konsular'])) {
                //     $appeal->where('konsular_decision','');
                //     $appeal->orWhere('konsular_decision',NULL);
                // }
            } 

            return datatables()->of($appeal->get())
                ->editColumn('documents', function ($appeal) {
                    $button = '';
                    $upload_date = $appeal->upload_date;
                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload1_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper('D4 Unit').'</a><br>';

                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload2_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper('Pengiktirafan Kelulusan').'</a><br>';

                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload3_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper('Rayuan Pemohon').'</a><br>';

                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload4_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper('Dokumen Sokongan').'</a><br>';

                    return $button;
                })
                ->editColumn('status', function ($appeal) {
                    $button = '';

                    $button .= "<span class='label label-".$appeal->filing->color." label-lg' style='text-transform:uppercase'>";
                    if (auth()->user()->hasAnyRole(['pengguna_dalam'])) {
                        if ($appeal->filing->name == 'Telah Dihantar') {
                            $button .= "BARU";
                        }else{
                            $button .= $appeal->filing->name;
                        }
                    }else{
                        $button .= $appeal->filing->name;
                    }
                    $button .= "</span>";

                    if ($appeal->submitted_at) {
                        $button .= "<br><br>";
                        $button .= "Tarikh Hantar : <b>".date('d.m.Y',strtotime($appeal->upload_date))."</b>";
                    }
                    if ($appeal->konsular_at) {
                        $button .= "<br><br>";
                        $button .= "Tarikh Keputusan Konsular : <b>".date('d.m.Y',strtotime($appeal->konsular_date_decision))."</b>";
                    }

                    return $button;
                })
                ->editColumn('submission_id_skb', function ($appeal) {
                    $button = '';

                    $button .= str_replace('-','/',$appeal->goodconduct->submission_id);

                    $button .= "<br><br>";
                    $button .= '<a href="'.route('goodconduct.form.view_konsular', $appeal->good_conduct_id).'" class="btn btn-primary btn-xs"> <span class="fa fa-search"></span> LIHAT SKB</a> ';

                    return $button;
                })
                ->editColumn('submission_id', function ($appeal) {
                    $button = '';

                    $button = str_replace('-','/',$appeal->submission_id);

                    return $button;
                })
                ->editColumn('createdby', function ($appeal) {
                    $button = '';
                    $button .= $appeal->createdBy->name;

                    return $button;
                })
                ->editColumn('action', function ($appeal) {
                    $button = '';

                    $button .= '<a href="javascript:;" onclick="openKronologi('.$appeal->good_conduct_id.')" class="btn btn-primary btn-xs m-b-5"> <span class="fa fa-refresh"></span> STATUS SKB</a> <br>';

                    if ($appeal->filing_status_id==1) {
                        $button .= '<a href="'.route('appeal.form', $appeal->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a> ';
                        $button .= '<a onclick="remove('.$appeal->id.')" href="javascript:;" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> ';
                    }
                    if (auth()->user()->hasAnyRole(['pengguna_dalam'])) {
                        if ($appeal->filing_status_id==2) {
                            $button .= '<a onclick="approve('.$appeal->id.')" href="javascript:;" class="btn btn-primary btn-xs mb-1" style="background-color: #607d8b"><i class="fa fa-check"></i> LULUSKAN PERMOHONAN</a> ';
                            $button .= "<br>";
                            $button .= '<a onclick="reject('.$appeal->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1" ><i class="fa fa-remove"></i> TOLAK PERMOHONAN</a> ';
                        }
                    }
                    return $button;
                })
                ->make(true);
        }
        else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Senarai Rayuan";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('appeal.listkonsular');
    }

    public function listapprove(Request $request) {

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Rayuan";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            if (auth()->user()->hasAnyRole(['pengguna_luar'])) {
                $appeal = Appeal::where('created_by',auth()->user()->id)->orderBy('filing_status_id','asc')->orderBy('submitted_at','desc');
                $appeal->where('konsular_decision','Lulus');
            }
            if (auth()->user()->hasAnyRole(['pengguna_dalam'])) {
                $appeal = Appeal::orderBy('filing_status_id','asc')->orderBy('submitted_at','desc');
                $appeal->whereNotIn('filing_status_id',[1]);

                if (auth()->user()->hasAnyRole(['konsular'])) {
                    $appeal->where('konsular_decision','Lulus');
                    $appeal->where('konsular_by',auth()->user()->id);
                }
            }

            if ($request->year_filter) {
                $appeal->whereYear('submitted_at',$request->year_filter);
            }

            if ($request->month_filter) {
                $appeal->whereMonth('submitted_at',$request->month_filter);
            }

            return datatables()->of($appeal->get())
                ->editColumn('documents', function ($appeal) {
                    $button = '';
                    $upload_date = $appeal->upload_date;
                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload1_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper($appeal->upload1_filename).'</a><br>';

                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload2_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper($appeal->upload2_filename).'</a><br>';

                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload3_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper($appeal->upload3_filename).'</a><br>';

                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload4_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper($appeal->upload4_filename).'</a><br>';

                    return $button;
                })
                ->editColumn('status', function ($appeal) {
                    $button = '';

                    $button .= "<span class='label label-default label-lg' style='text-transform:uppercase'>";
                    if (auth()->user()->hasAnyRole(['pengguna_dalam'])) {
                        if ($appeal->filing->name == 'Telah Dihantar') {
                            $button .= "BARU";
                        }else{
                            $button .= $appeal->filing->name;
                        }
                    }else{
                        $button .= $appeal->filing->name;
                    }
                    $button .= "</span>";

                    if ($appeal->submitted_at) {
                        $button .= "<br><br>";
                        $button .= "Tarikh Hantar : <b>".date('d.m.Y',strtotime($appeal->upload_date))."</b>";
                    }
                    if ($appeal->konsular_at) {
                        $button .= "<br><br>";
                        $button .= "Tarikh Keputusan Konsular : <b>".date('d.m.Y',strtotime($appeal->konsular_date_decision))."</b>";
                    }

                    return $button;
                })
                ->editColumn('konsular_decision', function ($appeal) {
                    $button = '';

                    if ($appeal->konsular_decision == 'Lulus') {
                        $button .= "<span class='label label-lg label-success'>".$appeal->konsular_decision."</span>";
                    }else if($appeal->konsular_decision == 'Ditolak'){
                        $button .= "<span class='label label-lg label-danger'>".$appeal->konsular_decision."</span>";
                    }
                    if ($appeal->konsular_comment) {
                        $button .= "<br><br><b>Ulasan : </b><br><br>";
                        $button .= $appeal->konsular_comment;
                    }

                    return $button;
                })
                ->editColumn('createdby', function ($appeal) {
                    $button = '';
                    $button .= $appeal->createdBy->name;

                    return $button;
                })
                ->editColumn('action', function ($appeal) {
                    $button = '';
                    if ($appeal->filing_status_id==1) {
                        $button .= '<a href="'.route('appeal.form', $appeal->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a> ';
                        $button .= '<a onclick="remove('.$appeal->id.')" href="javascript:;" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> ';
                    }
                    if (auth()->user()->hasAnyRole(['pengguna_dalam'])) {
                        $upload_date = $appeal->upload_date;
                        $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->konsular_upload_filename);
                        $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));

                        $button .= '<a onclick="cetak('.$appeal->id.')" href="javascript:;" class="btn btn-default btn-xs mb-1" ><i class="fa fa-print"></i> CETAK SIJIL</a> ';
                        $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper($appeal->konsular_upload_filename).'</a><br>';
                    }
                    return $button;
                })
                ->make(true);
        }
        else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Senarai Rayuan";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('appeal.listapprove');
    }

    public function listreject(Request $request) {

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Rayuan";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            if (auth()->user()->hasAnyRole(['pengguna_luar'])) {
                $appeal = Appeal::where('created_by',auth()->user()->id)->orderBy('filing_status_id','asc')->orderBy('submitted_at','desc');
                $appeal->where('konsular_decision','Ditolak');
            }
            if (auth()->user()->hasAnyRole(['pengguna_dalam'])) {
                $appeal = Appeal::orderBy('filing_status_id','asc')->orderBy('submitted_at','desc');

                if (auth()->user()->hasAnyRole(['konsular'])) {
                    $appeal->whereIn('konsular_decision',['Ditolak']);
                    $appeal->where('konsular_by',auth()->user()->id);
                }
            }

            return datatables()->of($appeal->get())
                ->editColumn('documents', function ($appeal) {
                    $button = '';
                    $upload_date = $appeal->upload_date;
                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload1_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper($appeal->upload1_filename).'</a><br>';

                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload2_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper($appeal->upload2_filename).'</a><br>';

                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload3_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper($appeal->upload3_filename).'</a><br>';

                    $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->upload4_filename);
                    $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));
                    $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper($appeal->upload4_filename).'</a><br>';

                    return $button;
                })
                ->editColumn('status', function ($appeal) {
                    $button = '';

                    $button .= "<span class='label label-default label-lg' style='text-transform:uppercase'>";
                    if (auth()->user()->hasAnyRole(['pengguna_dalam'])) {
                        if ($appeal->filing->name == 'Telah Dihantar') {
                            $button .= "BARU";
                        }else{
                            $button .= $appeal->filing->name;
                        }
                    }else{
                        $button .= $appeal->filing->name;
                    }
                    $button .= "</span>";

                    if ($appeal->submitted_at) {
                        $button .= "<br><br>";
                        $button .= "Tarikh Hantar : <b>".date('d.m.Y',strtotime($appeal->upload_date))."</b>";
                    }
                    if ($appeal->konsular_at) {
                        $button .= "<br><br>";
                        $button .= "Tarikh Keputusan Konsular : <b>".date('d.m.Y',strtotime($appeal->konsular_date_decision))."</b>";
                    }

                    return $button;
                })
                ->editColumn('konsular_decision', function ($appeal) {
                    $button = '';

                    if ($appeal->konsular_decision == 'Lulus') {
                        $button .= "<span class='label label-lg label-success'>".$appeal->konsular_decision."</span>";
                    }else if($appeal->konsular_decision == 'Ditolak'){
                        $button .= "<span class='label label-lg label-danger'>".$appeal->konsular_decision."</span>";
                    }
                    if ($appeal->konsular_comment) {
                        $button .= "<br><br><b>Ulasan : </b><br><br>";
                        $button .= $appeal->konsular_comment;
                    }

                    return $button;
                })
                ->editColumn('createdby', function ($appeal) {
                    $button = '';
                    $button .= $appeal->createdBy->name;

                    return $button;
                })
                ->editColumn('action', function ($appeal) {
                    $button = '';
                    if ($appeal->filing_status_id==1) {
                        $button .= '<a href="'.route('appeal.form', $appeal->id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a> ';
                        $button .= '<a onclick="remove('.$appeal->id.')" href="javascript:;" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> ';
                    }
                    if (auth()->user()->hasAnyRole(['pengguna_dalam'])) {
                        $upload_date = $appeal->upload_date;
                        $path = asset('storage/uploads/appeal/'.date('Y',strtotime($upload_date)).'/'.date('F',strtotime($upload_date)).'/'.date('Ymd',strtotime($upload_date)).'/'.$appeal->form_id.'/'.$appeal->konsular_upload_filename);
                        $exticon = $this->exticon(pathinfo($path, PATHINFO_EXTENSION));

                        $button .= '<a target="_blank" onclick="" href="'.$path.'" class="btn btn-default btn-xs mb-1"> '.$exticon.strtoupper($appeal->konsular_upload_filename).'</a><br>';
                    }
                    return $button;
                })
                ->make(true);
        }
        else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Senarai Rayuan";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('appeal.listreject');
    }

    public function process_approve_edit(Request $request) {

        $appeal = Appeal::findOrFail($request->id);
        $submission_id = $appeal->submission_id;

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup (Proses) Rayuan - Kelulusan";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $route = route('appeal.process.approve', $appeal->id);

        return view('appeal.approve', compact('route','submission_id'));
    }

    public function process_approve_update(Request $request) {

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini (Proses) Rayuan - Lulus";
        $log->data_new = json_encode($request->input());
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $appeal = Appeal::findOrFail($request->id);
        $appeal->filing_status_id = 9;
        if (auth()->user()->hasAnyRole(['konsular'])) {
            $appeal->konsular_comment = $request->post('data');
            $appeal->konsular_date_decision = \DateTime::createFromFormat('d/m/Y', $request->post('konsular_date_decision'))->format('Y-m-d');
            $appeal->konsular_decision = 'Lulus';

            if ($request->approve_document && $request->file('approve_document')->isValid()) {

                $name2 = 'L-'.$appeal->form_id.'.'.$request->file('approve_document')->getClientOriginalExtension();
                $approve_document = Storage::disk('uploads')->putFileAs(
                    'appeal/'.date('Y',strtotime($appeal->upload_date)).'/'.date('F',strtotime($appeal->upload_date)).'/'.date('Ymd',strtotime($appeal->upload_date)).'/'.$appeal->form_id,
                    $request->file('approve_document'),
                    $name2
                );

                $appeal->konsular_upload_real_filename = $request->file('approve_document')->getClientOriginalName();
                $appeal->konsular_upload_filename = $name2;
            }

            $appeal->konsular_at = Carbon::now();
            $appeal->konsular_by = auth()->user()->id;
        }
        $appeal->save();
        $appeal->goodconduct()->update(['filing_status_id'=>9,'appeal_status'=>9]);

        $appeal->logs()->updateOrCreate(
            [
                'module_id' => \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id,
                'activity_type_id' => 16,
                'filing_status_id' => $appeal->filing_status_id,
                'created_by_user_id' => auth()->id(),
                'role_id' => auth()->user()->entity->role_id
            ],
            [
                'data' => $request->data
            ]
        );

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Permohonan Rayuan ini telah berjaya diluluskan']);
    }

    public function process_reject_edit(Request $request) {

        $appeal = Appeal::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup (Proses) Rayuan - Penolakan";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $route = route('appeal.process.reject', $appeal->id);

        return view('appeal.reject', compact('route'));
    }

    public function process_reject_update(Request $request) {

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini (Proses) Rayuan - Penolakan";
        $log->data_new = json_encode($request->input());
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $appeal = Appeal::findOrFail($request->id);
        $appeal->filing_status_id = 8;
        if (auth()->user()->hasAnyRole(['konsular'])) {
            $appeal->konsular_comment = $request->post('data');
            $appeal->konsular_date_decision = \DateTime::createFromFormat('d/m/Y', $request->post('konsular_date_decision'))->format('Y-m-d');
            $appeal->konsular_decision = 'Ditolak';

            if ($request->reject_document && $request->file('reject_document')->isValid()) {

                $name2 = 'T-'.$appeal->form_id.'.'.$request->file('reject_document')->getClientOriginalExtension();
                $reject_document = Storage::disk('uploads')->putFileAs(
                    'appeal/'.date('Y',strtotime($appeal->upload_date)).'/'.date('F',strtotime($appeal->upload_date)).'/'.date('Ymd',strtotime($appeal->upload_date)).'/'.$appeal->form_id,
                    $request->file('reject_document'),
                    $name2
                );

                $appeal->konsular_upload_real_filename = $request->file('reject_document')->getClientOriginalName();
                $appeal->konsular_upload_filename = $name2;
            }

            $appeal->konsular_at = Carbon::now();
            $appeal->konsular_by = auth()->user()->id;
        }
        $appeal->save();
        $appeal->goodconduct()->update(['filing_status_id'=>8,'appeal_status'=>8]);

        $appeal->logs()->updateOrCreate(
            [
                'module_id' => \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id,
                'activity_type_id' => 16,
                'filing_status_id' => $appeal->filing_status_id,
                'created_by_user_id' => auth()->id(),
                'role_id' => auth()->user()->entity->role_id
            ],
            [
                'data' => $request->data
            ]
        );

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Permohonan Rayuan ini telah berjaya ditolak']);
    }

    public function delete(Request $request) {
        $appeal = Appeal::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','appeal')->firstOrFail()->id;
        $log->activity_type_id = 6;
        $log->description = "Padam Rayuan SKB - Draf";
        $log->data_old = json_encode($request->all());
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $appeal->logs()->delete();
        $appeal->goodconduct()->update(['appeal_status'=>NULL,'appeal_id'=>NULL]);
        $appeal->delete();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dipadam.']);
    }

}