<?php

namespace App\Http\Controllers\Letter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LogModel\LogSystem;
use App\OtherModel\Letter;
use Storage;

use App\Custom\PhpWord;

class StrikeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function disobey(Request $request) {
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

        $periods = '';
        $total = count($letter->filing->periods);
        // dd($letter->filing->periods);
        foreach ($letter->filing->periods as $index => $period) {
            if($index > 0 && $index != ($total-1))
                $periods .= ', ';
            elseif($index > 0 && $index == ($total-1))
                $periods .= 'dan ';
            elseif($period->start_date == $period->end_date)
                $periods .= date('d/m/Y' , strtotime($period->start_date));
            else
                $periods .= date('d/m/Y' , strtotime($period->start_date)).' - '.date('d/m/Y' , strtotime($period->end_date));
        }

        // json_encode(json_decode($periods, true));
        if(!is_array($periods)){
            $period = $periods;
        }else{
            $period = '';
        }

        $data = array_merge($data, $data_uppercase);
        $data = array_merge($data, [
            'reference_no' => $letter->reference ? htmlspecialchars($letter->reference->reference_no) : '',
            'entity_name' => htmlspecialchars($letter->entity->name),
            'entity_name_uppercase' => htmlspecialchars(strtoupper($letter->entity->name)),
            'address' => htmlspecialchars(strtoupper($letter->entity->addresses->last()->address->address1)).
                ($letter->entity->addresses->last()->address->address2 ? ',<w:br/>'.htmlspecialchars(strtoupper($letter->entity->addresses->last()->address->address2)) : '').
                ($letter->entity->addresses->last()->address->address3 ? ',<w:br/>'.htmlspecialchars(strtoupper($letter->entity->addresses->last()->address->address3)) : ''),
            'postcode' => htmlspecialchars($letter->entity->addresses->last()->address->postcode),
            'district' => $letter->entity->addresses->last()->address->district ? htmlspecialchars(strtoupper($letter->entity->addresses->last()->address->district->name)) : '',
            'state' => $letter->entity->addresses->last()->address->state ? htmlspecialchars(strtoupper($letter->entity->addresses->last()->address->state->name)) : '',
            'filing_applied_at' => htmlspecialchars(strftime('%e %B %Y' , strtotime($letter->filing->applied_at))),
            'filing_period' => htmlspecialchars($period),
            'province_office_name_uppercase' => htmlspecialchars(strtoupper($letter->entity->province_office->name)),
            'tagline' => htmlspecialchars(strtoupper(env('JHEKS_TAGLINE', 'BERKHIDMAT UNTUK NEGARA'))),
            'slogan' => htmlspecialchars(env('JHEKS_SLOGAN', 'Pekerja Berkemahiran Penggerak Ekonomi')),
            'kpks_name' => htmlspecialchars(strtoupper($letter->entity->province_office->kpks->name)),
            // '' => htmlspecialchars(),
        ]);

        $data = array_merge($data, [
            'jheks_location' => auth()->user()->hasAnyRole(['ptw','ppw','pw']) ? htmlspecialchars(str_replace('JABATAN HAL EHWAL KESATUAN SEKERJA ','',strtoupper(auth()->user()->entity->province_office->name))).'<w:br/>' : '',
            'jheks_address' => htmlspecialchars(auth()->user()->entity->province_office->address->address1).
                (auth()->user()->entity->province_office->address->address2 ? ', '.htmlspecialchars(auth()->user()->entity->province_office->address->address2) : '').
                (auth()->user()->entity->province_office->address->address3 ? ', '.htmlspecialchars(auth()->user()->entity->province_office->address->address3) : '').
                ', '.(auth()->user()->entity->province_office->address->postcode).
                (auth()->user()->entity->province_office->address->district ? ' '.htmlspecialchars(auth()->user()->entity->province_office->address->district->name) : '').
                (auth()->user()->entity->province_office->address->state ? ', '.htmlspecialchars(auth()->user()->entity->province_office->address->state->name) : ''),
            'jheks_phone' => htmlspecialchars(explode('/',auth()->user()->entity->province_office->phone)[0]),
            'jheks_fax' => htmlspecialchars(auth()->user()->entity->province_office->fax),
            'jheks_email' => htmlspecialchars(auth()->user()->entity->province_office->email),
            'jheks_website' => htmlspecialchars('https://jheks.mohr.gov.my'),
        ]);

        $log = new LogSystem;
        $log->module_id = 32;
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
        $reasons = htmlspecialchars($letter->filing->logs()->where('activity_type_id', 16)->first()->data);
        $reasons = array_filter(preg_split('~\R~u', $reasons));

        $document->cloneBlockString('list', count($reasons));

        foreach($reasons as $reason){
            $content = preg_replace('~\R~u', '<w:br/>', $reason);
            $document->setValue('reason', preg_replace('/^\s*[0-9ivx]+\s*[\)|\-\.]+\s*/', '', $content), 1);
        }

        // save as a random file in temp file
        $file_name = uniqid().'_'.$letter->type->name;
        $temp_file = storage_path('tmp/'.$file_name.'.docx');
        $document->saveAs($temp_file);

        if ($request->format == "pdf") {
            return docxToPdf($temp_file);
        }
        else
            return response()->download($temp_file)->deleteFileAfterSend(true);
    }

}
