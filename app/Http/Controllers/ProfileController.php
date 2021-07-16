<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\LogModel\LogSystem;
use App\Mail\Profile\HandedOver;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mail;
use Validator;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'user_profile')->firstOrFail()->id;
        $log->activity_type_id = 9;
        $log->description = "Buka paparan Profil Pengguna - " . auth()->user()->name;
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return view('profile.index');
    }

    /**
     * Display the specified image in storage.
     * @param  Request $request
     * @return Response
     */
    public function picture(Request $request)
    {
        abort_if(!auth()->user()->picture_url, 404);
        return Storage::disk('uploads')->download(auth()->user()->picture_url);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        // dd($request->all());

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::findOrFail(auth()->id());

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'user_profile')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Profile Pengguna - " . auth()->user()->name;
        $log->data_old = json_encode($user);

        if ($request->picture_url && $request->file('picture_url')->isValid()) {

            if (auth()->user()->picture_url) {
                Storage::disk('uploads')->delete(auth()->user()->picture_url);
            }

            $path = Storage::disk('uploads')->putFileAs(
                'profile',
                $request->file('picture_url'),
                auth()->id() . '_' . $request->file('picture_url')->getClientOriginalName()
            );

            auth()->user()->update([
                'name' => $request->name,
                'email' => $request->email,
                'picture_url' => $path,
            ]);
        } else {
            auth()->user()->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        $log->data_new = json_encode(User::findOrFail(auth()->id()));
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dikemaskini.']);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update_password(Request $request)
    {
        // dd($request->new_pass);
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed',

        ]);

        if ($validator->fails()) {
            // If validation failed
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if (!(password_verify($request->old_password, auth()->user()->password))) {
            return response()->json(['status' => 'error', 'title' => 'Tidak Berjaya!', 'message' => 'Kata laluan lama tidak sepadan']);
        }

        $password = bcrypt($request->password);

        $user = User::findOrFail(auth()->id());

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'user_profile')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Profile Pengguna - " . auth()->user()->name;
        $log->data_old = json_encode($user);

        $user->update(['password' => $password]);

        $log->data_new = json_encode($user);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dikemaskini.']);
    }

    /**
     * Send email to specific address
     * @param  Request $request
     * @return Response
     */
    public function handover(Request $request)
    {

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'user_profile')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Penyerahan Tugas Pengguna - " . auth()->user()->name . ' kepada ' . $request->new_email;
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        Mail::to($request->new_email)->send(new HandedOver(auth()->user()));

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Notifikasi emel akan dihantar kepada alamat berikut untuk pendaftaran akaun dan penerimaan tugas.']);
    }
}
