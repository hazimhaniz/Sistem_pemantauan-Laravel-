<?php

use App\Models\EntityFile;
use App\Models\UploadedFile;
use App\Notifications\SendMail;
use App\OtherModel\Inbox;
use App\OtherModel\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification as IlluminateNotification;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Validator;

function uploadFiles($entity, array $array, $docType = NULL, $projekId = '')
{
    DB::beginTransaction();
    try {

        $entityName = substr(get_class($entity), strpos(get_class($entity), "\\") + 1);
        
        foreach ($array['files'] as $key => $value) {
            

            if(filesize($value)>3000000){
                Session::flash('maxFile', 'Fail hendaklah kurang daripada 3MB.');
                return redirect()->back();
            }

            if($value->getClientOriginalExtension()!='pdf' && $value->getClientOriginalExtension()!='png' && $value->getClientOriginalExtension()!='jpeg' && $value->getClientOriginalExtension()!='jpg' && $value->getClientOriginalExtension()!='docx'){
                Session::flash('fileType', 'Fail hendaklah dalam format png, jpeg, jpg, docx dan pdf sahaja.');
                return redirect()->back();  
            }             

            $now = Carbon::now();
            $uuid = Uuid::uuid4();
            $imagePath = Storage::disk('uploads')->putFileAs($entityName, $value, $uuid . '.' . $value->getClientOriginalName());
            $input['id'] = $uuid;
            $input['entity_type'] = get_class($entity);
            $input['doc_type'] = $docType;
            $input['path'] = 'uploads/' . $imagePath;
            $input['created_at'] = $now;
            $input['updated_at'] = $now;
            $input['user_id'] = $entity->id;
            $input['projek_id'] = $projekId;
            if (array_key_exists('ulasan', $array)) {
                if (count($array['ulasan']) > 0) {
                    $input['ulasan'] = $array['ulasan'][$key];
                } else {
                    $input['ulasan'] = null;;
                }
            }

            $uploadedFile = UploadedFile::create($input);

            if (!$uploadedFile) {
                throw new Exception("Error Processing Request", 1);
            }

            $input['uploaded_file_id'] = $uploadedFile->id;
            $input['entity_id'] = $entity->id;

            $entityFile = EntityFile::create($input);
        }
        DB::commit();

        Session::flash('success',['success'=> 'Maklumat berjaya disimpan.']);
    } catch (\Throwable $th) {
        DB::rollBack();

        throw $th;
    }
}

function sendMail($notifiable, $notificationId, array $data)
{ 
    IlluminateNotification::send($notifiable, new SendMail($notificationId, $data));

    return true;
}

function sendNotification($notificationId, array $data)
{
    DB::beginTransaction();
    try {
        $notification = Notification::find($notificationId);

        $name = $notification->name;
        $message = $notification->message;

        if($notificationId == 32) {
            $name = str_replace('%no_fail_jas%', $data['no_fail_jas'], $name);
            
            $message = str_replace('%peranan%', $data['peranan'], $message);
            $message = str_replace('%no_fail_jas%', $data['no_fail_jas'], $message);
            $message = str_replace('%nama_projek%', $data['nama_projek'], $message);
            $message = str_replace('%nama%', $data['nama'], $message);
        } else if ($notificationId == 23) {
            // TODO: replace link projek
            $message = str_replace('%link_projek%', route('login'), $message);
        } else if ($notificationId == 20) {
            $message = str_replace('%no_fail_jas%', $data['no_fail_jas'], $message);
            $message = str_replace('%nama_projek%', $data['nama_projek'], $message);
            $message = str_replace('%username%', $data['username'], $message);
            $message = str_replace('%sebab_ditolak%', $data['sebab_ditolak'], $message);
        } else if ($notificationId == 29) {
            $message = str_replace('%no_fail_jas%', $data['no_fail_jas'], $message);
            $message = str_replace('%nama_projek%', $data['nama_projek'], $message);
            $message = str_replace('%username%', $data['username'], $message);
            $message = str_replace('%sebab_ditolak%', $data['sebab_ditolak'], $message);
        }

        $data['sender_user_id'] = 1207;
        $data['receiver_user_id'] = $data['receiver_user_id'];
        $data['subject'] = $name;
        $data['message'] = $message;
        $data['inbox_status_id'] = 2;

        if (!$inbox = Inbox::create($data)) {
            throw new Exception("Error Processing Request", 1);
        }

        DB::commit();
        return $inbox;
    } catch (\Throwable $th) {
        DB::rollBack();
        throw $th;
    }
}

function downloadFile($id)
{
    $entity = UploadedFile::where('id', $id)->first();
    $fileUrl = $entity->path;

    if ($fileUrl) {
        $fileUrl = config('app.url') . '/storage/' . $fileUrl;
        dd(Storage::disk('uploads'));
        return Storage::disk('uploads')->download($fileUrl);
    } else {
        return "";
    }
}
// C:/laragon/www/ldp2m2_new/public/storage/uploads/MonthlyDBulanan/43bb8246-e44e-4d33-af20-5788e06a3ce5.jpg
// C:/laragon/www/ldp2m2_new/public/storage/uploads/MonthlyDBulanan/43bb8246-e44e-4d33-af20-5788e06a3ce5.jpg