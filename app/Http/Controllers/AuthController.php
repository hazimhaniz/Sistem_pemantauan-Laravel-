<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\User;
use App\OtherModel\Announcement;
use Carbon\Carbon;
use App\Projek;
use App\ProjekHasUser;
use App\ModelHasRole;
use App\LogModel\LogSystem;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
  public function CheckProjekExternal(Request $request)
  {

    $log = new LogSystem;
    $log->module_id = 28;
    $log->activity_type_id = 7;
    $log->description = "Log Masuk Sistem";
    $log->url = $request->fullUrl();
    $log->method = strtoupper($request->method());
    $log->ip_address = $request->ip();
    $log->created_by_user_id = auth()->id();
    $log->save();

    $this->validate($request, [
      // 'username' => 'required',
      // 'password' => 'required',
    ]);
    $users = User::where('username', $request->username)->first();
    $user = User::where('username', $request->username)->count();
    if ($user <= 1) {
      $userdata = array('username' => $request->username, 'password'  => $request->password);
      if (Auth::attempt($userdata)) {
        $user = User::where('username', $request->username)->where('user_status_id', 1)->first();
        if ($user) {
          return response()->json(['status' => 'ok', 'url' => route('home')]);
        } else {
          Auth::logout();
          return response()->json(['status' => 'xactive', 'url' => route('login')]);
        }
      } else {
        Auth::logout();
        return response()->json(['status' => 'notok', 'url' => route('login')]);
      }
    } else {
      return response()->json(['status' => 'projeklist', 'data' => $request->username, 'password' => $request->password]);
    }
  }

  public function ModalProjek(Request $request, $username, $password)
  {
    $log = new LogSystem;
    $log->module_id = 28;
    $log->activity_type_id = 3;
    $log->description = "Log Masuk Modal Projek";
    $log->url = $request->fullUrl();
    $log->method = strtoupper($request->method());
    $log->ip_address = $request->ip();
    $log->created_by_user_id = auth()->id();
    $log->save();

    $projeklist = [];
    $projekarray = [];
    $user = User::where('username', $username)->get();
    foreach ($user as $users) {
      $ProjekHasUser = ProjekHasUser::where('user_id', $users->id)->first();
      $Projek = Projek::where('id', $ProjekHasUser->projek_id)->first();

      $hashedPassword = User::find($users->id)->password;
      if (Hash::check($password, $hashedPassword)) {
        $user = User::where('id', $users->id)->where('user_status_id', 1)->first();
        if ($user) {
          $userstatus = "Sah";
        } else {
          $userstatus = "Tidak Active";
        }
      } else {
        $userstatus = "Tidak Sah";
      }
      array_push($projeklist, $ProjekHasUser->projek_id);
      array_push($projeklist, $Projek->nama_projek);
      array_push($projeklist, $ProjekHasUser->user_id);
      array_push($projeklist, $password);
      array_push($projeklist, $userstatus);
      array_push($projekarray, $projeklist);
      $projeklist = [];
    }

    $announcement = Announcement::where('date_start', '<=', Carbon::today()->toDateString());
    $announcement->where('date_end', '>=', Carbon::today()->toDateString());
    $announcement->orderBy('date_start', 'DESC');
    $list_announcements = $announcement->get();
    $this->data['list_announcements'] = $list_announcements;
    $this->data['projekarray'] = $projekarray;

    return view('auth.listprojek', $this->data);
  }

  public function LoginProjekExternal(Request $request)
  {

    $log = new LogSystem;
    $log->module_id = 28;
    $log->activity_type_id = 7;
    $log->description = "Log Masuk Pengguna Luar";
    // $log->data_old = json_encode($MonthlyA);
    $log->url = $request->fullUrl();
    $log->method = strtoupper($request->method());
    $log->ip_address = $request->ip();
    $log->created_by_user_id = auth()->id();
    $log->save();

    $hashedPassword = User::find($request->userid)->password;
    if (Hash::check($request->password, $hashedPassword)) {
      $User = User::where('id', $request->userid)->first();
      Auth::login($User);
      return response()->json(['status' => 'success']);
    } else {
      Auth::logout();
      return response()->json(['status' => 'invalid']);
    }
  }

  public function LoginOtherProjekExternal(Request $request)
  {

    $log = new LogSystem;
    $log->module_id = 28;
    $log->activity_type_id = 7;
    $log->description = "Log Masuk Projek Lain";
    // $log->data_old = json_encode($MonthlyA);
    $log->url = $request->fullUrl();
    $log->method = strtoupper($request->method());
    $log->ip_address = $request->ip();
    $log->created_by_user_id = auth()->id();
    $log->save();

    $User = User::where('id', $request->userid)->first();
    if ($User) {
      Auth::login($User);
      return redirect('/home');
    } else {
      Auth::logout();
      return redirect('/login');
    }
    // dd($request->userid);
  }

  public function loginRegister(Request $request)
  {

    // $log = new LogSystem;
    // $log->module_id = 28;
    // $log->activity_type_id = 7;
    // $log->description = "Log Masuk Sistem Sebagain Pengguna Luar";
    // // $log->data_old = json_encode($MonthlyA);
    // $log->url = $request->fullUrl();
    // $log->method = strtoupper($request->method());
    // $log->ip_address = $request->ip();
    // $log->created_by_user_id = auth()->id();
    // $log->save();

    $validation = "False";
    $fullname = "Tiada";

    if ($request->email == "" || $request->password == "") {
      return response()->json(['status' => 'notok', 'url' => route('login')]);
    }
    $this->validate($request, [
      // 'email' => 'required',
      // 'password' => 'required',
    ]);

    if (strstr($request->email, '/')) {
      $mail = str_replace('/', '', $request->email);
      // $password = bcrypt($request->password);
      // echo $mail;
      $User = User::where('username', $mail)->first();
      if ($User) {
        Auth::login($User);
        return response()->json(['status' => 'ok', 'url' => route('home')]);
      } else {
        Auth::logout();
        return response()->json(['status' => 'nodata', 'url' => route('login')]);
      }
      // echo $User;
      exit();
    }
    $ldaprdn  = $request->email;
    $basedn = 'DC=doe,DC=gov,DC=my';
    $ldappass = $request->password;  // associated password
    $ldapserver = "ldap://10.19.158.15";
    // connect to ldap server
    try {
      $ldapconn = ldap_connect($ldapserver);
      if (FALSE === $ldapconn) {
        $validation = "False";
        return response()->json(['status' => 'nodata', 'url' => route('login')]);
      }
      ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3) or die('Unable to set LDAP protocol version');
      ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);

      if (TRUE == @ldap_bind($ldapconn, $ldaprdn, $ldappass)) {
        $filter = "(mail=$request->email)";
        $result = ldap_Search($ldapconn, $basedn, $filter);
        $AdData = ldap_get_entries($ldapconn, $result);
        $fullname = $AdData[0]['cn'][0];
        $validation = "True";
      } else {
        return response()->json(['status' => 'server', 'url' => route('login')]);
      }
      ldap_unbind($ldapconn);
    } catch (Exception $e) {
      $validation = "False";
      return response()->json(['status' => 'nodata', 'url' => route('login')]);
    }

    if ($validation == "True") {
      $User = User::where('email', $request->email)->where('name', $fullname)->first();
      if ($User) {
        Auth::login($User);
        return response()->json(['status' => 'ok', 'url' => route('home')]);
      } else {
        Auth::logout();
        return response()->json(['status' => 'nodata', 'url' => route('login')]);
      }
      Auth::logout();
      return response()->json(['status' => 'nodataAD', 'url' => route('login')]);
    }
  }

  public function resetPassword()
  {
    return view('auth.passwords.reset');
  }

  public function resetPasswordPost(Request $request)
  {
    $input = $request->all();

    $validator = Validator::make($input, [
      'login' => 'required'
    ], [
      'login.required' => 'Sila Masukkan Emel'
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'code' => 422,
        'field' => $validator->errors()
      ]);
    }

    DB::beginTransaction();
    try {

      $user = User::where('email', $request->login)
      ->orWhere('username', $request->login)
      ->first();

      if (!$user){
       return response()->json(['title'=>'Ralat','msg'=>'Emel pengguna tidak wujud. Sila semak semula emel.','status'=>'error','code'=>'880']);
     }

     if($user->entity_type=='App\UserStaff'){
      return response()->json(['title'=>'Ralat','msg'=>'Bagi pegawai JAS, sila hubungi 03-88712186 (Unit Rangkaian, BTM JAS) untuk reset kata laluan.','status'=>'error','code'=>'888']);
    }



    PasswordReset::create([
      'email' => $request->login,
      'token' => str_random(60),
      'created_at' => Carbon::now()
    ]);

    $tokenData = PasswordReset::where('email', $request->login)->first();

    $data['token'] = $tokenData->token;
    $data['email'] = $request->login;

    sendMail($user, 1, $data);

    DB::commit();

    return response()->json([
      'success' => true,
      'code' => 200,
      'message' => 'Anda akan terima emel, jika emel wujud di dalam sistem',
      'data' => $input
    ]);
  } catch (\Throwable $th) {
    DB::rollback();
    throw $th;
  }
}

public function showPasswordResetForm($token)
{
  $tokenData = PasswordReset::where('token', $token)->first();

  if (!$tokenData) abort('404');

  return view('auth.passwords.show')->with('token', $token);
}

public function PasswordResetPost(Request $request, $token)
{
  $input = $request->all();

  $validator = Validator::make($input, [
    'password' => 'required|confirmed|min:8'
  ], [
    'password.required' => 'Sila Masukkan Katalaluan Baru',
    'password.confirmed' => 'Katalaluan Tidak Sama',
    'password.min' => 'Minimum Katalaluan 8 Aksara'
  ]);

  if ($validator->fails()) {
    return response()->json([
      'success' => false,
      'code' => 422,
      'field' => $validator->errors()
    ]);
  }

  DB::beginTransaction();
  try {

    $password = $request->password;
    $tokenData = PasswordReset::where('token', $token)->first();

    $user = User::where('email', $tokenData->email)->orWhere('username', $tokenData->email)->first();
      if (!$user) return redirect()->to('home'); //or wherever you want

      $user->password = Hash::make($password);
      $user->update(); 

      // If the user shouldn't reuse the token later, delete the token 
      PasswordReset::where('email', $user->email)->orWhere('email', $user->username)->delete();

      DB::commit();

      return response()->json([
        'success' => true,
        'code' => 200,
        'message' => 'Berjaya! Sila Log Masuk Menggunakan Katalaluan Baru',
        'data' => $input
      ]);
    } catch (\Throwable $th) {
      DB::rollback();
      throw $th;
    }
  }
}
