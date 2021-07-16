<?php

namespace App\Http\Controllers\Letter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LogModel\LogSystem;
use App\OtherModel\Letter;
use App\Mail\FormF\ResponseRequired;
use App\Mail\FormF\SentToKS;
use Storage;
use Mail;

use App\Custom\PhpWord;

class FormFController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function notice(Request $request) {
        $letter = Letter::findOrFail($request->id);
        $data_db = $letter->data ? json_decode($letter->data, true) : [];
        $data_uppercase = [];
        $data = [];

        setlocale(LC_TIME, "ms", "my_MS", "ms_MY");
        foreach($data_db as $key => $value) {
            $data[$key] = preg_replace('~\R~u', '<w:br/>', htmlspecialchars($value));
            $data_uppercase[$key."_uppercase"] = preg_replace('~\R~u', '<w:br/>', htmlspecialchars(strtoupper($value)));
        }

        ///////////////////////////////////////// CHANGE HERE ONLY /////////////////////////////////////////////////////

        $data = array_merge($data, $data_uppercase);
        $data = array_merge($data, [
            'reference_no' => $letter->reference ? htmlspecialchars($letter->reference->reference_no) : '',
            'entity_name' => htmlspecialchars($letter->entity->name),
            'entity_name_uppercase' => htmlspecialchars(strtoupper($letter->entity->name)),
            'registration_no' =>  htmlspecialchars($letter->entity->registration_no),
            'today_day' => htmlspecialchars(strftime("%e")),
            'today_month_year' => htmlspecialchars(strftime("%B %Y")),
            'reasons' => array_key_exists('reasons',$data) ? $data['reasons'] : '',
            'address' => htmlspecialchars(optional(optional($letter->entity->addresses->last())->address)->address1).
                (optional(optional($letter->entity->addresses->last())->address)->address2 ? ',<w:br/>'.htmlspecialchars(optional(optional($letter->entity->addresses->last())->address)->address2) : '').
                (optional(optional($letter->entity->addresses->last())->address)->address3 ? ',<w:br/>'.htmlspecialchars(optional(optional($letter->entity->addresses->last())->address)->address3) : ''),
            'postcode' => htmlspecialchars(optional(optional($letter->entity->addresses->last())->address)->postcode),
            'district' => optional(optional($letter->entity->addresses->last())->address)->district ? htmlspecialchars(optional(optional($letter->entity->addresses->last())->address)->district->name) : '',
            'state' => optional(optional($letter->entity->addresses->last())->address)->state ? htmlspecialchars(optional(optional(optional($letter->entity->addresses->last())->address)->state)->name) : '',
            'filing_applied_at' => htmlspecialchars(strftime('%e %B %Y' , strtotime($letter->filing->applied_at))),
            'province_office_name_uppercase' => htmlspecialchars(strtoupper($letter->entity->province_office->name)),
            'tagline' => htmlspecialchars(strtoupper(env('JHEKS_TAGLINE', 'BERKHIDMAT UNTUK NEGARA'))),
            'slogan' => htmlspecialchars(env('JHEKS_SLOGAN', 'Pekerja Berkemahiran Penggerak Ekonomi')),
            'pw_name' => htmlspecialchars(strtoupper($letter->entity->province_office->pw->name)),
            // '' => htmlspecialchars(),
        ]);

        $log = new LogSystem;
        $log->module_id = 28;
        $log->activity_type_id = 18;
        $log->description = "Cetak Surat";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // Creating the new document...
        $phpWord = new PhpWord();

        //Searching for values to replace
        $template = str_replace('.', '/', $letter->type->template_name);
        $document = $phpWord->loadTemplate(storage_path('templates/letters/'.$template.'.docx'));

        foreach($data as $key => $value) {
            $document->setValue($key, $value);
        }

        // Generate list
        $extras = htmlspecialchars($data['extra_documents_received']);
        $extras = array_filter(preg_split('~\R~u', $extras));

        $document->cloneBlockString('list', count($extras));
        $index = 8;

        foreach($extras as $extra){
            $content = preg_replace('~\R~u', '<w:br/>', $extra);
            $document->setValue('no', $index++, 1);
            $document->setValue('document', preg_replace('/^\s*[0-9ivx]+\s*[\)|\-\.]+\s*/', '', $content), 1);
        }

        // save as a random file in temp file
        $file_name = uniqid().'_'.$letter->type->name;
        $temp_file = storage_path('tmp/'.$file_name.'.docx');
        $document->saveAs($temp_file);

        Mail::to($letter->filing->entity->user->email)->send(new SentToKS(auth()->user(), $letter->filing, 'Status Pembatalan Kesatuan Sekerja'));

        if ($request->format == "pdf")
            return docxToPdf($temp_file);
        else
            return response()->download($temp_file)->deleteFileAfterSend(true);
    }

}
