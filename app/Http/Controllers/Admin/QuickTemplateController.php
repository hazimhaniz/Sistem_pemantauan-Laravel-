<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OtherModel\QuickTemplate;
use App\LogModel\LogSystem;
use Storage;

class QuickTemplateController extends Controller
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

        if($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','quick_template')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Template Segera";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $quicktemplate = QuickTemplate::all();

            return datatables()->of($quicktemplate)
                ->editColumn('system_name', function ($quicktemplate) {
                    if ($quicktemplate->default) {
                        return '<span style="color: #25e125;">●</span> '.$quicktemplate->system_name;
                    }else{
                        return $quicktemplate->system_name;
                    }
                })
                ->editColumn('logo_header', function ($quicktemplate) {
                    return "<img src=".asset('storage/'.$quicktemplate->logo_header)." width='50px'>";
                })
                ->editColumn('copyright', function ($quicktemplate) {
                    return $quicktemplate->copyright;
                })
                ->editColumn('color_theme', function ($quicktemplate) {
                    return $quicktemplate->color_theme;
                })
                ->editColumn('description', function ($quicktemplate) {
                    return $quicktemplate->description;
                })
                ->editColumn('action', function ($quicktemplate) {
                    $button = "";
                    // $button .= '<a href="#" class="btn btn-info btn-xs"><i class="fa fa-search"></i></a> ';
                    $button .= '<a onclick="edit('.$quicktemplate->id.')" href="javascript:;" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a> ';
                    if (!$quicktemplate->default) {
                        $button .= '<a onclick="setdefault('.$quicktemplate->id.')" href="javascript:;" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a> ';
                    }
                    if (!$quicktemplate->default) {
                        $button .= '<a onclick="remove('.$quicktemplate->id.')" href="javascript:;" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>';
                    }
                    return $button;
                })
                ->make(true);
        }
        else {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code','admin_system_config')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Template Segera";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        return view('admin.quicktemplate.index');
    }

    /**
     * Show the specified resource.
     * @param  Request $request
     * @return Response
     */
    public function edit(Request $request)
    {
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_system_config')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Pengurusan Template Segera";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $quicktemplate = QuickTemplate::findOrFail($request->id);

        return view('admin.quicktemplate.edit', compact('quicktemplate'));
    }

    public function insert(Request $request) {

        $listToInsert = [
            'system_name' => $request->system_name,
            'copyright' => $request->copyright,
            'description' => $request->description,
            'color_theme' => $request->color_theme,
        ];   

        if ($request->logo_header && $request->file('logo_header')->isValid()) {

            $pathlogoheader = Storage::disk('public')->putFileAs(
                '',
                $request->file('logo_header'),
                'logo_header.'.uniqid().".".$request->file('logo_header')->getClientOriginalExtension()
            );

            $listToInsert['logo_header'] = $pathlogoheader;
        }

        if ($request->background_login_page && $request->file('background_login_page')->isValid()) {

            $pathbackgroundloginpage = Storage::disk('public')->putFileAs(
                '',
                $request->file('background_login_page'),
                'background_login_page.'.uniqid().".".$request->file('background_login_page')->getClientOriginalExtension()
            );

            $listToInsert['background_login_page'] = $pathbackgroundloginpage;
        }

        if ($request->favicon && $request->file('favicon')->isValid()) {

            $pathfavicon = Storage::disk('public')->putFileAs(
                '',
                $request->file('favicon'),
                'favicon.'.uniqid().".".$request->file('favicon')->getClientOriginalExtension()
            );

            $listToInsert['favicon'] = $pathfavicon;
        }

        if (!$request->default) {
            $listToInsert['default'] = 0;
        }

        $quicktemplate = QuickTemplate::create($listToInsert);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_system_config')->firstOrFail()->id;
        $log->activity_type_id = 4;
        $log->description = "Tambah Pengurusan Template Segera";
        $log->data_new = json_encode($quicktemplate);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data baru telah ditambah.']);
    }

    public function update(Request $request) {

        $quicktemplate = QuickTemplate::findOrFail($request->id); 

        $listToUpdate = [
            'system_name' => $request->system_name,
            'copyright' => $request->copyright,
            'description' => $request->description,
            'color_theme' => $request->color_theme,
        ];   

        if ($request->logo_header && $request->file('logo_header')->isValid()) {

            $pathlogoheader = Storage::disk('public')->putFileAs(
                '',
                $request->file('logo_header'),
                'logo_header.'.uniqid().".".$request->file('logo_header')->getClientOriginalExtension()
            );

            $listToUpdate['logo_header'] = $pathlogoheader;
        }

        if ($request->background_login_page && $request->file('background_login_page')->isValid()) {

            $pathbackgroundloginpage = Storage::disk('public')->putFileAs(
                '',
                $request->file('background_login_page'),
                'background_login_page.'.uniqid().".".$request->file('background_login_page')->getClientOriginalExtension()
            );

            $listToUpdate['background_login_page'] = $pathbackgroundloginpage;
        }

        if ($request->favicon && $request->file('favicon')->isValid()) {

            $pathfavicon = Storage::disk('public')->putFileAs(
                '',
                $request->file('favicon'),
                'favicon.'.uniqid().".".$request->file('favicon')->getClientOriginalExtension()
            );

            $listToUpdate['favicon'] = $pathfavicon;
        }

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_system_config')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Pengurusan Template Segera";
        $log->data_old = json_encode($quicktemplate);

        if ($request->default) {
            $otherQuickTemplate = QuickTemplate::where('id','<>',$request->id)->get();
            foreach ($otherQuickTemplate as $key => $value) {
                QuickTemplate::where('id',$value->id)->update(['default'=>0]);
            }
            $this->setdefault($request);
        }else{
            $listToUpdate['default'] = 0;
        }

        $quicktemplate = $quicktemplate->update($listToUpdate);

        $log->data_new = json_encode($quicktemplate);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dikemaskini.']);
    }

    public function setdefault(Request $request){

        $quicktemplate = QuickTemplate::findOrFail($request->id); 

        if ($quicktemplate->color_theme == 'blue') {
            $color1 = 'info';
            $color2 = '#5ec0cb';
            $color3 = '#2d8fbd';
            $color4 = '#1f3953';
            $color5 = '#1e5377';
            $color6 = '#1f3953';
        } if ($quicktemplate->color_theme == 'yellow') {
            $color1 = 'warning';
            $color2 = '#FFCD05';
            $color3 = '#FFCD05';
            $color4 = '#ffc107';
            $color5 = '#FFCD05';
            $color6 = '#FF9600';
        } if ($quicktemplate->color_theme == 'green') {
            $color1 = 'success';
            $color2 = '#78a03f';
            $color3 = '#78a03f';
            $color4 = '#a4cd39';
            $color5 = '#78a03f';
            $color6 = '#7da33f';
        }
        
        $settings = \App\Setting::where('name','color1')->first();
        $settings->value = $color1;
        $settings->save();
        $settings = \App\Setting::where('name','color2')->first();
        $settings->value = $color2;
        $settings->save();
        $settings = \App\Setting::where('name','color3')->first();
        $settings->value = $color3;
        $settings->save();
        $settings = \App\Setting::where('name','color4')->first();
        $settings->value = $color4;
        $settings->save();
        $settings = \App\Setting::where('name','color5')->first();
        $settings->value = $color5;
        $settings->save();
        $settings = \App\Setting::where('name','color6')->first();
        $settings->value = $color6;
        $settings->save();


        $settings = \App\Setting::where('name','system_name')->first();
        $settings->value = $quicktemplate->system_name;
        $settings->save();
        $settings = \App\Setting::where('name','background_login_page')->first();
        $settings->value = $quicktemplate->background_login_page;
        $settings->save();
        $settings = \App\Setting::where('name','logo_login_page')->first();
        $settings->value = $quicktemplate->logo_login_page;
        $settings->save();
        $settings = \App\Setting::where('name','logo_header')->first();
        $settings->value = $quicktemplate->logo_header;
        $settings->save();
        $settings = \App\Setting::where('name','favicon')->first();
        $settings->value = $quicktemplate->favicon;
        $settings->save();
        $settings = \App\Setting::where('name','copyright')->first();
        $settings->value = $quicktemplate->copyright;
        $settings->save();
        $settings = \App\Setting::where('name','color_theme')->first();
        $settings->value = $quicktemplate->color_theme;
        $settings->save();

        $otherQuickTemplate = QuickTemplate::where('id','<>',$request->id)->get();
        foreach ($otherQuickTemplate as $key => $value) {
            QuickTemplate::where('id',$value->id)->update(['default'=>0]);
        }
        $quicktemplate->update(['default'=>1]);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_system_config')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Pengurusan Template Segera";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dikemaskini.']);
    }

    public function delete(Request $request) {

        $quicktemplate = QuickTemplate::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code','admin_system_config')->firstOrFail()->id;
        $log->activity_type_id = 6;
        $log->description = "Padam Template Segera";
        $log->data_old = json_encode($quicktemplate);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $quicktemplate->delete();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dipadam.']);
    }

}
