<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MasterModel\MasterLetterType;
use App\MasterModel\MasterModule;
use App\LogModel\LogSystem;
use Storage;
use Validator;

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

            $types = MasterLetterType::with(['module']);

            return datatables()->of($types)
                ->editColumn('action', function ($type) {

                    $dir = str_replace('.', '/', $type->template_name);

                    $button = "";
                    $button .= '<a onclick="edit('.$type->id.')" href="javascript:;" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> KEMASKINI </a> ';

                    if(Storage::disk('templates_letters')->exists($dir.'.docx')){

                        // $button .= '<a href="'.route('admin.letter.editdirect',['id'=>$type->id]).'" class="btn btn-dark btn-xs"><i class="fa fa-pencil"></i> SURAT </a> ';
                        $button .= '<a href="'.route('admin.letter.downloadword',$type->id).'" class="btn btn-default btn-xs"><i class="fa fa-print"></i> DOCX </a> ';
                        $button .= '<a href="'.route('admin.letter.downloadpdf',$type->id).'" class="btn btn-default btn-xs"><i class="fa fa-print"></i> PDF </a> ';

                    }
                    if(!Storage::disk('templates_letters')->exists($dir.'.docx')){
                        $button .= '<a onclick="remove('.$type->id.')" href="javascript:;" class="btn btn-danger btn-xs mb-1"><i class="fa fa-trash mr-1"></i> Padam</a> ';
                    }

                    return $button;
                })
                ->make(true);
        }
    else {
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

        return view('admin.letter.index',compact('module'));
    }

    public function create()
    {
        return view('admin.letter.create');
    }


    /**
     * Show the specified resource.
     * @param  Request $request
     * @return Response
     */
    public function edit(Request $request)
    {
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','letter_management')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Pengurusan Paparan Surat";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $type = MasterLetterType::findOrFail($request->id);

        return view('admin.letter.edit', compact('type'));
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
