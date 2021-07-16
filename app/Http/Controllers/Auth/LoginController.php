<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\MasterModel\MasterPengawasan;
use App\OtherModel\Announcement;
use Auth;
use Carbon\Carbon;
use DateTime;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;
use Illuminate\Validation\ValidationException;
use App\LogSystem;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $username;
    protected $project_type;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
    }

    public function findUsername()
    {
        $login = request()->input('login');
        $this->project_type = request()->input('project_type');
        if( $this->project_type == 1){
            // $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'email';
            $fieldType = 'email';
        }else if ( $this->project_type == 0){
            $fieldType = 'username';
            
        }
        request()->merge([$fieldType => $login]);
        // dd(request()->all());
        return $fieldType;
    }

    public function showLoginForm()
    {
        $announcement = Announcement::where('date_start', '<=', Carbon::today()->toDateString());
        $announcement->where('date_end', '>=', Carbon::today()->toDateString());
        $announcement->orderBy('created_at', 'DESC');
        $list_announce = $announcement->get();
        if (count($list_announce) > 0) {
            foreach ($list_announce as $key => $value) {
                $date = DateTime::createFromFormat('Y-m-d H:i:s', $value->created_at);
                $list_announcements[$date->format('d-m-Y')][] = array(
                    'title' => $value->title,
                    'description' => $value->description,
                );
            }
        } else {
            $list_announcements[] = [];
        }

        $this->data['list_announcements'] = $list_announcements;

        $this->data['projekarray'] = $projekarray = [];

        $this->data['pengawasans'] = $pengawasans = MasterPengawasan::get();

        return view('auth.login', $this->data);
    }

    public function username()
    {
        return $this->username;
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('login');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    

public function autologin(Request $request)
{
    Auth::loginUsingId($request->id);
    return redirect()->route('home');
}

public function sendFailedLoginResponse(Request $request)
{
    Session::flash('error', trans('auth.failed'));

    throw ValidationException::withMessages([
        $this->username() => [trans('auth.failed')],
    ]);
}

}
