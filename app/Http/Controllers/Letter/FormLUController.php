<?php

namespace App\Http\Controllers\Letter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LogModel\LogSystem;
use App\OtherModel\Letter;
use Storage;

use App\Custom\PhpWord;

class FormLUController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function approve(Request $request) {

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
            'tenure' => htmlspecialchars($letter->entity->tenures->last()->start_year.'/'.$letter->entity->tenures->last()->end_year),
            'registered_at' => htmlspecialchars(strftime('%e %B %Y' , strtotime($letter->filing->logs()->where('activity_type_id', 16)->first()->created_at))),
            'filing_applied_at' => htmlspecialchars(strftime('%e %B %Y' , strtotime($letter->filing->created_at))),
            'province_office_name_uppercase' => htmlspecialchars(strtoupper($letter->entity->province_office->name)),
            'tagline' => htmlspecialchars(strtoupper(env('JHEKS_TAGLINE', 'BERKHIDMAT UNTUK NEGARA'))),
            'slogan' => htmlspecialchars(env('JHEKS_SLOGAN', 'Pekerja Berkemahiran Penggerak Ekonomi')),
        ]);

        if($letter->filing->branch){
            $data = array_merge($data, [
                'no_1' => '1.',
                'no_2' => '2.',
                'entity_name' => htmlspecialchars($letter->filing->branch->name),
                'entity_name_uppercase' => htmlspecialchars(strtoupper($letter->filing->branch->name)),
                'address' => htmlspecialchars($letter->filing->branch->address->address1).
                    ($letter->filing->branch->address->address2 ? ',<w:br/>'.htmlspecialchars($letter->filing->branch->address->address2) : '').
                    ($letter->filing->branch->address->address3 ? ',<w:br/>'.htmlspecialchars($letter->filing->branch->address->address3) : ''),
                'postcode' => htmlspecialchars($letter->filing->branch->address->postcode),
                'district' => $letter->filing->branch->address->district ? htmlspecialchars($letter->filing->branch->address->district->name) : '',
                'state' =>  $letter->filing->branch->address->state ? htmlspecialchars($letter->filing->branch->address->state->name) : '',
                'is_main_secretary' => htmlspecialchars('Setiausaha Agung,'),
                'is_main_name' => '<w:br/>'.htmlspecialchars($letter->entity->name),
                'is_main_address' => '<w:br/>'.htmlspecialchars($letter->entity->addresses->last()->address->address1).
                    ($letter->entity->addresses->last()->address->address2 ? ',<w:br/>'.htmlspecialchars($letter->entity->addresses->last()->address->address2) : '').
                    ($letter->entity->addresses->last()->address->address3 ? ',<w:br/>'.htmlspecialchars($letter->entity->addresses->last()->address->address3) : ''),
                'is_main_postcode' => htmlspecialchars($letter->entity->addresses->last()->address->postcode),
                'is_main_district' => $letter->entity->addresses->last()->address->district ? htmlspecialchars($letter->entity->addresses->last()->address->district->name).',' : '',
                'is_main_state' => $letter->entity->addresses->last()->address->state ? htmlspecialchars($letter->entity->addresses->last()->address->state->name) : '',
                // '' => htmlspecialchars(),
            ]);
        }
        else{
            $data = array_merge($data, [
                'no_1' => '    ',
                'no_2' => '    ',
                'entity_name' => htmlspecialchars($letter->entity->name),
                'entity_name_uppercase' => htmlspecialchars(strtoupper($letter->entity->name)),
                'address' => htmlspecialchars($letter->entity->addresses->last()->address->address1).
                    ($letter->entity->addresses->last()->address->address2 ? ',<w:br/>'.htmlspecialchars($letter->entity->addresses->last()->address->address2) : '').
                    ($letter->entity->addresses->last()->address->address3 ? ',<w:br/>'.htmlspecialchars($letter->entity->addresses->last()->address->address3) : ''),
                'postcode' => htmlspecialchars($letter->entity->addresses->last()->address->postcode),
                'district' => $letter->entity->addresses->last()->address->district ? htmlspecialchars($letter->entity->addresses->last()->address->district->name) : '',
                'state' =>  $letter->entity->addresses->last()->address->state ? htmlspecialchars($letter->entity->addresses->last()->address->state->name) : '',
                'is_main_secretary' => '',
                'is_main_name' => '',
                'is_main_address' => '',
                'is_main_postcode' => '',
                'is_main_district' => '',
                'is_main_state' => '',
            ]);
        }

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
        $log->module_id = 19;
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

        // Generate table officer
        $rows2 = $letter->filing->officers;
        $document->cloneRow('officer_designation', count($rows2));

        foreach($rows2 as $index => $row2) {
            $document->setValue('officer_designation#'.($index+1), ($row2->designation ? htmlspecialchars(strtoupper($row2->designation->name)) : ''));
            $document->setValue('officer_name#'.($index+1), htmlspecialchars(strtoupper($row2->name)));
            $document->setValue('officer_ic#'.($index+1), htmlspecialchars($row2->identification_no));
            $document->setValue('officer_dob#'.($index+1), htmlspecialchars(date('d/m/Y', strtotime($row2->date_of_birth))));
            $document->setValue('officer_address#'.($index+1), htmlspecialchars(strtoupper($row2->address->address1)).
                ($row2->address->address2 ? ', '.htmlspecialchars(strtoupper($row2->address->address2)) : '').
                ($row2->address->address3 ? ', '.htmlspecialchars(strtoupper($row2->address->address3)) : '').
                ', '.($row2->address->postcode).
                ($row2->address->district ? ' '.htmlspecialchars(strtoupper($row2->address->district->name)) : '').
                ($row2->address->state ? ', '.htmlspecialchars(strtoupper($row2->address->state->name)) : '')
            );
            $document->setValue('officer_occupation#'.($index+1), htmlspecialchars(strtoupper($row2->occupation)));
            $document->setValue('officer_appointed_at#'.($index+1), htmlspecialchars(strtoupper(date('d/m/Y',strtotime($row2->held_at)))));
            $document->setValue('cert_citizen#'.($index+1), htmlspecialchars(strtoupper($row2->cert_citizen)));
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
