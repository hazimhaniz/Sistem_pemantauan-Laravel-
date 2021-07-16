<?php

namespace App\Http\Controllers\Letter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MasterModel\MasterLetterType;
use App\MasterModel\MasterModule;
use App\LogModel\LogSystem;
use App\OtherModel\Letter;
use App\OtherModel\Attachment;
use Storage;
use Mail;

class LetterController extends Controller
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

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Surat";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $letter = Letter::with(['type','filing','module','entity']);

            return datatables()->of($letter)
                ->editColumn('created_at', function ($letter) {
                    return date('d/m/Y', strtotime($letter->created_at));
                })
                ->editColumn('entity_name', function($letter) {
                    return optional($letter->entity)->name;
                })
                ->editColumn('action', function ($letter) {
                    $button = "";
                    $button .= '<a href="'.route('letter.item', $letter->id).'"  class="btn btn-primary btn-xs text-capitalize mb-1"><i class="fa fa-edit mr-1"></i> Kemaskini</a> <br>';

                    if($letter->data)
                        $button .= '<a href="'.route('letter.'.$letter->type->template_name, $letter->id).'"  class="btn btn-default btn-xs text-capitalize mb-1"><i class="fa fa-download mr-1"></i> Muat Turun</a> <br>';

                    return $button;
                })
                ->make(true);
        }
        else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Surat";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }
        return view('letter.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {

        $letter = Letter::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Pengurusan Surat";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $data = $letter->data ? json_decode($letter->data, true) : [];

        return view('letter.form', compact('letter','data'));
    }
    
    /**
     * Validate the application
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {

        $letter = Letter::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Pengurusan Surat";
        $log->data_old = json_encode($letter);

        $letter->data = json_encode($request->input());
        
        $letter->save();

        $setting = \App\OtherModel\Setting::firstOrCreate(
            [ 'meta_key' => 'refno_'.$letter->module->code.'_'.date('Y') ],
            [ 'meta_value' => 1 ]
        );

        if (optional($letter->filing->logs->first())->created_at) {
            $date_ref_no = optional($letter->filing->logs->first())->created_at;
        }else{
            $date_ref_no = $letter->filing->created_at;
        }

        $letter->reference()->firstOrCreate(
            [
                'reference_type_id' => auth()->user()->hasAnyRole(['ptw','ppw','pw']) ? 1 : 2,
                'module_id' => $letter->module->id,
            ],
            [
                'reference_no' => $letter->module->code.'/'.date('Y', strtotime($date_ref_no)).'/'.(auth()->user()->hasAnyRole(['ptw','ppw','pw']) ? sprintf("%02d", auth()->user()->entity->province_office->address->state_id) : 'HQ').'/'.$setting->meta_value,
            ]
        );

        if(!empty($request->reference_no)){
            $letter->reference()->update(
                [
                    'reference_no' => $request->reference_no
                ]
            );
        }

        $setting->update(['meta_value' => $setting->meta_value+1]);

        $log->data_new = json_encode($letter);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        // App\FilingModel\FormBB
        if($letter->module->id==9){
            // Mail::to($letter->filing->created_by->email)->send(new \App\Mail\FormBB\Approved($letter->filing, 'Status Borang BB')); enablekan
        }

        // App\FilingModel\FormB
        if($letter->module->id==7){
            // Mail::to($letter->filing->created_by->email)->send(new \App\Mail\FormB\Approved($letter->filing, 'Status Borang B')); enablekan
        }

        // App\FilingModel\Prosecution ON PTHQ untuk cetak memo dan kemukakan kertas siasatan kepada PUU
        if($letter->module->id==30){

            if ($letter->letter_type_id == 55) {
                // Mail::to($letter->filing->distributions()->whereHas('assigned_to.entity_staff.role', function($role) { return $role->where('name', 'pthq'); })->first()->assigned_to->email)->send(new \App\Mail\Prosecution\PrintMemoPuu($letter->filing, 'Cetak Memo Dan Kemukakan Kertas Siasatan Kepada PUU')); enablekan
            }

        }

        // App\FilingModel\PP30
        if($letter->module->id==35){
            if(auth()->user()->hasRole('pphq')){
                if ($letter->letter_type_id == 69 || $letter->letter_type_id == 70) {
                    // Mail::to($letter->filing->distributions()->whereHas('assigned_to.entity_staff.role', function($role) { return $role->where('name', 'pthq'); })->first()->assigned_to->email)->send(new \App\Mail\PP30\ResultUpdatedPTHQ($letter->filing, 'Cetak Surat Perintah Dan Memo')); enablekan
                } else if ($letter->letter_type_id == 71 || $letter->letter_type_id == 78 || $letter->letter_type_id == 79) {
                    // Mail::to($letter->filing->distributions()->whereHas('assigned_to.entity_staff.role', function($role) { return $role->where('name', 'pthq'); })->first()->assigned_to->email)->send(new \App\Mail\PP30\ResultUpdated($letter->filing, 'Sedia Dokumen Kelulusan Pengecualian Peraturan Seksyen 30(b)')); enablekan
                }
            }
        }

        // App\FilingModel\Enforcement
        if($letter->module->id==29){
            if(auth()->user()->hasRole('ppw')){
                if ($letter->letter_type_id == 49) {
                    // Mail::to($letter->filing->entity->user->email)->send(new \App\Mail\Enforcement\Sent($letter->filing, 'Serahan Laporan Pemeriksaan Berkanun')); enablekan
                }
            }
        }

        // App\FilingModel\EligibilityIssue
        if($letter->module->id==34){
            if(auth()->user()->hasRole('pthq')){
                if ($letter->letter_type_id == 64) {
                    
                }
            }
        }

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dikemaskini']);
    }

    /**
     * Show the list of resources
     *
     * @return \Illuminate\Http\Response
     */
    public function attachment_index(Request $request) {

        $letter = Letter::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
        $log->activity_type_id = 1;
        $log->description = "Papar senarai Pengurusan Surat - Dokumen Sokongan";
        $log->data_old = json_encode($request->input());
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $attachments = [];

        foreach($letter->attachments as $attachment) {
            array_push($attachments, [
                'id' => $attachment->id,
                'name' => $attachment->name,
                'url' => route('general.getAttachment', ['attachment_id' => $attachment->id, 'filename' => $attachment->name]),
                'size' => Storage::disk('uploads')->size($attachment->url)
            ]);
        }

        return response()->json($attachments);
    }

    /**
     * Store resources into storage
     *
     * @return \Illuminate\Http\Response
     */
    public function attachment_insert(Request $request) {
        if($request->file('file')->isValid()) {
            $path = Storage::disk('uploads')->putFileAs(
                'letter',
                $request->file('file'),
                uniqid().'_'.$request->file('file')->getClientOriginalName()
            );

            $letter = Letter::findOrFail($request->id);

            $attachment = $letter->attachments()->create([
                'name' => $request->file('file')->getClientOriginalName(),
                'url' => $path,
                'created_by_user_id' => auth()->id()
            ]);

            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
            $log->activity_type_id = 4;
            $log->description = "Tambah Pengurusan Surat - Dokumen Sokongan";
            $log->data_old = json_encode($request->input());
            $log->data_new = json_encode($attachment);
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah disimpan.', 'id' => $attachment->id]);
        }
    }

    /**
     * Delete resources from storage
     *
     * @return \Illuminate\Http\Response
     */
    public function attachment_delete(Request $request) {
        $attachment = Attachment::findOrFail($request->attachment_id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Surat - Dokumen Sokongan";
        $log->data_old = json_encode($attachment);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        Storage::disk('uploads')->delete($attachment->url);
        $attachment->delete();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dipadam.']);
    }

    /*
    public function download(Request $request) {

        $letter = Letter::findOrFail($request->id);
        $data = $letter->data ? json_decode($letter->data, true) : [];

        $log = new LogSystem;
        $log->module_id = 18;
        $log->activity_type_id = 3;
        $log->description = "Cetak Surat";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        //Searching for values to replace
        $template = str_replace('.', '/', $letter->type->template_name);
        $document = $phpWord->loadTemplate(storage_path('templates/letters/'.$template.'.docx'));

        foreach($data as $key => $value) {
            $document->setValue($key, $value);
        }

        // Simple table
        $document->cloneRow('rowTitle', 2);
        $document->setValue('rowTitle#1', 'Sun');
        $document->setValue('rowTitle#2', 'Mercury');
        $document->setValue('rowValue1#1', 'Jan');
        $document->setValue('rowValue1#2', 'Feb');
        $document->setValue('rowValue2#1', 'Morning');
        $document->setValue('rowValue2#2', 'Evening');
        $document->setValue('rowValue3#1', 'Day');
        $document->setValue('rowValue3#2', 'Night');

        // Simple list
        $document->cloneBlockString('feature', 2);
        $document->setValue('feature_item', 'Adlan', 1);
        $document->setValue('feature_item', 'Genius', 1);
        
        // save as a random file in temp file
        $temp_file = storage_path('tmp/'.uniqid().'_'.$letter->type->name.'.docx');
        $document->saveAs($temp_file);






        // Load settings
        \PhpOffice\PhpWord\Settings::loadConfig();
        $dompdfPath = base_path() . '/vendor/dompdf/dompdf';
        if (file_exists($dompdfPath)) {
            define('DOMPDF_ENABLE_AUTOLOAD', false);
            \PhpOffice\PhpWord\Settings::setPdfRenderer(\PhpOffice\PhpWord\Settings::PDF_RENDERER_DOMPDF, base_path() . '/vendor/dompdf/dompdf');
        }

        //Load temp file
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($temp_file); 

        //Save it
        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'PDF');

        // save as a random file in temp file
        $temp_file2 = storage_path('tmp/'.uniqid().'_'.$letter->type->name.'.pdf');
        $xmlWriter->save($temp_file2);

        unlink($temp_file);

        return response()->download($temp_file2)->deleteFileAfterSend(true);
    }
    */
}
