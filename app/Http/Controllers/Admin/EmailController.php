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
use App\Mail\Auth\RegistrationRejected;

class EmailController extends Controller
{
    public function index()
    {
        return view('form.notifications.emel');
    }
}