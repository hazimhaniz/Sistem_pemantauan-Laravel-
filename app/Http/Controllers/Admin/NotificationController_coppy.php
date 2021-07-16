<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LogModel\LogSystem;
use App\OtherModel\Notification;
use App\User;
use Mail;
use Validator;
use App\Mail\Auth\RegistrationAccepted;
use App\Notifications\SendMail;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Notification as NotificationEvent;

class NotificationController extends Controller
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
        if ($request->ajax()) {
            $log = new LogSystem;
            $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_notification')->firstOrFail()->id;
            $log->activity_type_id = 1;
            $log->description = "Papar senarai Pengurusan Notifikasi";
            $log->data_old = json_encode($request->input());
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();

            $input = $request->all();

            Paginator::currentPageResolver(function () use ($input) {
                return ($input['start'] / $input['length'] + 1);
            });

            $model = new Notification();

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
            $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_notification')->firstOrFail()->id;
            $log->activity_type_id = 9;
            $log->description = "Buka paparan Pengurusan Notifikasi";
            $log->url = $request->fullUrl();
            $log->method = strtoupper($request->method());
            $log->ip_address = $request->ip();
            $log->created_by_user_id = auth()->id();
            $log->save();
        }

        // return view('admin.notification.index');
        return view('form.notifications.notification');
    }

    public function create()
    {
        return view('admin.notification.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'code' => 'required|string|unique:notification',
            'name' => 'required|string',
            'message' => 'required'
        ], [
            'code.required' => 'Kod Notifikasi Diperlukan.',
            'name.required' => 'Nama Notifikasi Diperlukan.',
            'message.required' => 'Message Notifikasi Diperlukan.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error',
                'field' => $validator->errors(),
                'error_code' => 422
            ]);
        }

        $input['message'] = nl2br($request->message);
        $input['created_by_user_id'] = auth()->user()->id;
        $notification = Notification::create($input);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_notification')->firstOrFail()->id;
        $log->activity_type_id = 4;
        $log->description = "Tambah Pengurusan Notifikasi";
        $log->data_new = json_encode($notification);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json([
            'success' => true,
            'message' => 'Data baru telah ditambah.',
            'data' => $notification
        ]);
    }

    /**
     * Show the specified resource.
     * @param  Request $request
     * @return Response
     */
    public function edit(Notification $notification, Request $request)
    {
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_notification')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup kemaskini Pengurusan Notifikasi";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return view('admin.notification.edit')->with([
            'notification' => $notification
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Notification $notification, Request $request)
    {
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'code' => 'required|string',
            'name' => 'required|string',
            'message' => 'required'
        ], [
            'code.required' => 'Kod Notifikasi Diperlukan.',
            'name.required' => 'Nama Notifikasi Diperlukan.',
            'message.required' => 'Message Notifikasi Diperlukan.'
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
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_notification')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Pengurusan Notifikasi";
        $log->data_old = json_encode($notification);

        $input['message'] = nl2br($request->message);
        $notification = $notification->update($input);

        $log->data_new = json_encode($notification);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json([
            'success' => true,
            'message' => 'Data telah dikemaskini.',
            'data' => $notification
        ]);
    }

    /**
     * Show the specified resource.
     * @param  Request $request
     * @return Response
     */
    public function show(Request $request, Notification $notification)
    {
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_notification')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup lihat Pengurusan Notifikasi";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return view('admin.notification.show')->with([
            'notification' => $notification
        ]);
    }

    
    /**
     * Remove the specified resource from storage.
     * @param  Request $request
     * @return Response
     */
    public function delete(Request $request, Notification $notification)
    {
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_notification')->firstOrFail()->id;
        $log->activity_type_id = 6;
        $log->description = "Padam Pengurusan Notifikasi";
        $log->data_old = json_encode($notification);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $notification->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data telah dipadam.'
        ]);
    }

    public function sendform(Request $request)
    {
        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_notification')->firstOrFail()->id;
        $log->activity_type_id = 3;
        $log->description = "Popup Paparan Hantar Email Notifikasi";
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $notification = Notification::findOrFail($request->id);

        return view('admin.notification.send', compact('notification'));
    }

    public function setactivationemel(Request $request)
    {

        $notification = Notification::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_notification')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Pengurusan Notifikasi";
        $log->data_old = json_encode($notification);

        $notification = $notification->update(['is_active_emel' => $request->set_value]);

        $log->data_new = json_encode($notification);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dikemaskini.']);
    }

    public function setactivationsystem(Request $request)
    {

        $notification = Notification::findOrFail($request->id);

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_notification')->firstOrFail()->id;
        $log->activity_type_id = 5;
        $log->description = "Kemaskini Pengurusan Notifikasi";
        $log->data_old = json_encode($notification);

        $notification = $notification->update(['is_active_system' => $request->set_value]);

        $log->data_new = json_encode($notification);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data telah dikemaskini.']);
    }

    public function sendprocess(Request $request)
    {

        $notification = Notification::findOrFail($request->id);
        $result = false;

        $log = new LogSystem;
        $log->module_id = \App\MasterModel\MasterModule::where('code', 'admin_notification')->firstOrFail()->id;
        $log->activity_type_id = 10;
        $log->description = "Hantar Emel Notifikasi";
        $log->data_new = json_encode($notification);
        $log->url = $request->fullUrl();
        $log->method = strtoupper($request->method());
        $log->ip_address = $request->ip();
        $log->created_by_user_id = auth()->id();
        $log->save();

        $user = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['admin']);
        })->get()->first();

        try {

            if ($request->code == 'PB_KS_1.1') {
                Mail::to($request->email)->send(new RegistrationAccepted($user, 'password'));
                $result = true;
            } else {
                $email_receiver = $request->email;
                $message = $request->message;
                $subject = $request->name;

                Mail::raw($message, function ($message) use ($email_receiver, $subject) {
                    $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                    $message->to($email_receiver);
                    $message->subject($subject);
                });

                $result = true;

                $receipient = User::where('email', $request->email)->first();

                if ($receipient) {
                    $receipient->inboxes()->create(
                        [
                            'subject' => $request->name,
                            'message' => $request->message,
                            'sender_user_id' => $user->id,
                            'inbox_status_id' => 2,
                        ]
                    );
                } else {
                    \App\OtherModel\Inbox::create(
                        [
                            'subject' => $request->name,
                            'message' => $request->message,
                            'sender_user_id' => $user->id,
                            'inbox_status_id' => 2,
                        ]
                    );
                }
            }

            if ($result) {
                return response()->json(['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Email berjaya dihantar.']);
            } else {
                return response()->json(['status' => 'error', 'title' => 'Tidak Berjaya', 'message' => 'Sila contact ' . config('global')['system_admin_email']]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'title' => 'Tidak Berjaya!', 'message' => 'Emel tidak berjaya dihantar']);
        }
    }
}
