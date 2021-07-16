<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LogModel\LogSystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Validator;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_system_config')->firstOrFail()->id;
        $log->activity_type_id = 9;
        $log->description = "Buka Konfigurasi Sistem";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

    	return view('admin.settings.index');
    }

    public function checkEmail(Request $request) {

        $messageBody = 'Test '.uniqid();

        try{

            \Mail::raw($messageBody, function ($message) {
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                $message->to('test@getnada.com');
                $message->subject('Test');
            });

        } catch (\Exception $e){
            return response()->json(['status' => 'error', 'title' => 'Tidak Berjaya!', 'message' => 'Emel tidak berjaya dihantar']);
        }

        // check for failures
        if (\Mail::failures()) {
            return response()->json(['status' => 'error', 'title' => 'Tidak Berjaya!', 'message' => 'Emel tidak berjaya dihantar']);
            // return response showing failed emails
        }
        
        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Emel berjaya dihantar']);
    }


    public function changeEnv($key, $value) {
        $key = strtoupper($key);

        $path = base_path('.env');

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                $key.'="'.$_ENV[$key].'"', $key.'="'.$value.'"', file_get_contents($path)
            ));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request) {

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_system_config')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Konfigurasi Sistem";
        $log->data_new = json_encode($request->input());
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        foreach ($request->input() as $key => $value) {
            $this->changeEnv($key, $value);
        }

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dikemaskini.']);
    }
    public function settings_save(Request $request) {

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_system_config')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Konfigurasi Sistem";
        $log->data_new = json_encode($request->input());
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        foreach ($request->input() as $key => $value) {
            $settings = \App\Setting::where('name',$key)->first();
            $settings->value = $value;
            $settings->save();
        }

        if ($request->logo_header && $request->file('logo_header')->isValid()) {

            $path = Storage::disk('public')->putFileAs(
                '',
                $request->file('logo_header'),
                'logo_header.'.uniqid().".".$request->file('logo_header')->getClientOriginalExtension()
            );

            $settings = \App\Setting::where('name','logo_header')->first();
            $settings->value = $path;
            $settings->save();
        }

        if ($request->background_login_page && $request->file('background_login_page')->isValid()) {

            $path = Storage::disk('public')->putFileAs(
                '',
                $request->file('background_login_page'),
                'background_login_page.'.uniqid().".".$request->file('background_login_page')->getClientOriginalExtension()
            );

            $settings = \App\Setting::where('name','background_login_page')->first();
            $settings->value = $path;
            $settings->save();
        }

        if ($request->favicon && $request->file('favicon')->isValid()) {

            $path = Storage::disk('public')->putFileAs(
                '',
                $request->file('favicon'),
                'favicon.'.uniqid().".".$request->file('favicon')->getClientOriginalExtension()
            );

            $settings = \App\Setting::where('name','favicon')->first();
            $settings->value = $path;
            $settings->save();
        }

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dikemaskini.']);
    }

    public function picture(Request $request) {
        
        return Storage::disk('public')->download(config('global')[$request->filename]);
    }
}
