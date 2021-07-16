<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\UserPP;
use App\ProjekHasUser;
use App\ProjekHasPp;
use App\Projek;
use App\ProjekDetail;
use App\JasFail;
use Carbon\Carbon;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //dd('huhu');
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'username' => 'required|string|max:150|unique:user',
            'password' => 'required|string|min:8|confirmed',
            // 'is_mykad' => 'required|integer',
        ];

        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        $entity = UserPP::create([
            'name' => $data['name'],
            'register_at' => Carbon::parse(Carbon::now())->format('d/m/Y'),
            // Carbon::createFromFormat('d/m/Y', Carbon::now())->toDateTimeString(),
        ]);

        $user = $entity->user()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            // 'phone' => $data['phone'],
            'username' => $data['username'],
            'user_type_id' => 3,
            'user_status_id' => 5,
            'password' => bcrypt($data['password']),
        ])->assignRole(['pp'])->assignRole(['ex']);

        $projek = new Projek();
        $projek->no_fail_jas = $data['no_fail_JAS'];
        $projek->nama_projek = $data['nama_projek'];
        $projek->penggerak_projek = $user->id;
        $projek->status = 5;

        if($projek->save()){

          $ProjekHasUser = new ProjekHasUser();
          $ProjekHasUser->user_id = $user->id;
          $ProjekHasUser->projek_id = $projek->id;
          $ProjekHasUser->save();

          $ProjekHasPp = new ProjekHasPp();
          $ProjekHasPp->user_id = $user->id;
          $ProjekHasPp->projek_id = $projek->id;
          $ProjekHasPp->save();
        }
        return response()->json([
            'status' => 'success',
            'code' => '102',
            'message' => 'Anda telah berjaya mendaftar sebagai pengguna sistem ldp2m2 . Status pendaftaran akan dihantar melalui e-mel.',
        ]);
    }

}
