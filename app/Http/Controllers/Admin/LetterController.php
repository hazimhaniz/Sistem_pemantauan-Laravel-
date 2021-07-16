<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MasterModel\MasterLetterType;
use App\MasterModel\MasterModule;
use App\OtherModel\Inbox;
use App\LogModel\LogSystem;
use Storage;
use Validator;
use Illuminate\Pagination\Paginator;

use App\Custom\PhpWord;

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

        $module = MasterModule::where('type',3)->get();

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Paparan Surat";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $input = MasterLetterType::with(['module']);

            $input = $request->all();
            Paginator::currentPageResolver(function () use ($input) {
                return ($input['start'] / $input['length'] + 1);
            });

            $model = new Inbox();

            if (!empty($input['search']['value'])) {
                foreach ($model->filedSearchable as $column) {
                    $model = $model->whereLike($column, $input['search']['value']);
                }
            }

            $output = $model->paginate($input['length'])->toArray();

            $response = [
                "draw"            => $input['draw'],
                "recordsTotal"    => intval($output['total']),
                "recordsFiltered" => intval($output['total']),
                "data"            => $output['data']
            ];
                   
            return response()->json($response, 200);
        } else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Paparan Surat";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('admin.letter.index');
    }

    public function create()
    {
        return view('admin.letter.create');
    }

    public function show(Request $request, Inbox $letter)
    {
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup lihat Pengurusan Notifikasi";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return view('admin.letter.show')->with([
            'letter' => $letter
        ]);
    }

    public function edit(Inbox $letter, Request $request)
    {
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Pengurusan Notifikasi";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return view('admin.letter.edit')->with([
            'letter' => $letter
        ]);
    }

    public function editdirect(Request $request) {

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Pengurusan Surat";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return view('admin.letter.form');
    }

    public function insert(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'module_id' => 'required'
        ]);

        if ($validator->fails()) {
            // If validation failed
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $letter = MasterLetterType::create($request->all());

        $template_name = MasterModule::where('id',$letter->module_id)->firstOrFail()->code.'.'.str_replace(' ', '-', strtolower($letter->name));

        $letter->update(['template_name'=>$template_name]);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
        $log->activity_type_id = 4;
        $log->description = "Tambah Pengurusan Surat";
        $log->data_new = json_encode($letter);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data baru telah ditambah.']);

    }

    /**
     * Show the list of resources
     *
     * @return \Illuminate\Http\Response
     */
    public function attachment_index(Request $request) {

        $type = MasterLetterType::findOrFail($request->id);
        $dir = str_replace('.', '/', $type->template_name);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
        $log->activity_type_id = 1;
        $log->description = "Papar senarai Pengurusan Paparan Surat - Dokumen Sokongan";
        $log->data_old = json_encode($request->input());
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $attachments = [];

        if(Storage::disk('templates_letters')->exists($dir.'.docx'))
            array_push($attachments, [
                'id' => $type->id,
                'name' => $type->name,
                'url' => route('general.getLetterTemplate', ['letter_type_id' => $type->id, 'filename' => $type->name.'.docx']),
                'size' => Storage::disk('templates_letters')->size($dir.'.docx')
            ]);

        return response()->json($attachments);
    }

    /**
     * Store resources into storage
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Inbox $letter, Request $request)
    {
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'subject' => 'required|string',
            'message' => 'required'
        ], [
            'subject.required' => 'Subjek Diperlukan.',
            'message.required' => 'Message Diperlukan.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'field' => $validator->errors(),
                'error_code' => 422
            ]);
        }

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Pengurusan Notifikasi";
        $log->data_old = json_encode($letter);

        $input['message'] = nl2br($request->message);
        $letter = $letter->update($input);

        $log->data_new = json_encode($letter);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json([
            'success' => true,
            'message' => 'Data telah dikemaskini.',
            'data' => $letter
        ]);
    }

    public function attachment_insert(Request $request) {

        $type = MasterLetterType::findOrFail($request->id);
        $paths = explode('.', $type->template_name);

        if($request->file('file')->isValid()) {
            $path = Storage::disk('templates_letters')->putFileAs(
                $paths[0],
                $request->file('file'),
                $paths[1].'.docx'
            );

            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
            $log->activity_type_id = 4;
            $log->description = "Tambah Pengurusan Paparan Surat - Dokumen Sokongan";
            $log->data_new = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah disimpan.', 'id' => $type->id]);
        }
    }

    /**
     * Delete resources from storage
     *
     * @return \Illuminate\Http\Response
     */
    public function attachment_delete(Request $request) {
        $type = MasterLetterType::findOrFail($request->id);
        $dir = str_replace('.', '/', $type->template_name);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Paparan Surat - Dokumen Sokongan";
        $log->data_old = json_encode($type);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        Storage::disk('templates_letters')->delete($dir.'.docx');

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dipadam.']);
    }

    public function downloadpdf(Request $request) {

        $log = new LogSystem;
        $log->module_id = 7;
        $log->activity_type_id = 18;
        $log->description = "Cetak Surat";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();
        
        $type = MasterLetterType::findOrFail($request->id);
        $paths = explode('.', $type->template_name);

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // Creating the new document...
        $phpWord = new PhpWord();

        // Searching for values to replace

        // $template = str_replace('.', '/', $letter->type->template_name);
        $document = $phpWord->loadTemplate(storage_path('templates/letters/'.$paths[0].'/'.$paths[1].'.docx'));

        // save as a random file in temp file
        $file_name = uniqid().'_'.$type->module->name;
        $temp_file = storage_path('tmp/'.$file_name.'.docx');
        $document->saveAs($temp_file);

        return docxToPdf($temp_file);
    }

    public function downloadword(Request $request) {

        $log = new LogSystem;
        $log->module_id = 7;
        $log->activity_type_id = 18;
        $log->description = "Cetak Surat";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();
        
        $type = MasterLetterType::findOrFail($request->id);
        $paths = explode('.', $type->template_name);

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // Creating the new document...
        $phpWord = new PhpWord();

        // Searching for values to replace

        // $template = str_replace('.', '/', $letter->type->template_name);
        $document = $phpWord->loadTemplate(storage_path('templates/letters/'.$paths[0].'/'.$paths[1].'.docx'));

        // save as a random file in temp file
        $file_name = uniqid().'_'.$type->module->name;
        $temp_file = storage_path('tmp/'.$file_name.'.docx');
        $document->saveAs($temp_file);

        return response()->download($temp_file)->deleteFileAfterSend(true);
    }

    public function delete(Request $request){ 

        $letter = MasterLetterType::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Surat";
        $log->data_old = json_encode($letter);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $letter->delete();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dipadam.']);
    }
}
