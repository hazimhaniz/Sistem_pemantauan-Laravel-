<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\MasterModel\MasterUserStatus;
use App\MasterModel\MasterUserType;
use App\LogModel\LogSystem;
use App\ModelHasRole;
use Validator;
use Datatables;
use DateTime;
use App\UserEO;
use App\Projek;
use App\Stesen;
use App\MonthlyCDetail;
use App\PengawasanHasEo;
use App\Distribution;
use App\Notifications\ResetPassword;
use App\ProjekHasUser;
use Carbon\Carbon;
use Mail;
use DB;
use App\OtherModel\Inbox;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasRoles;
    use Notifiable;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
      'name',
      'username',
      'password',
      'email',
      'phone',
      'fax',
      'entity_id',
      'entity_type',
      'user_type_id',
      'user_status_id',
      'kompetensi_no',
      'kompetensi_date',
      'sebab_tidak_aktif',
      'komen',
      'picture_url'
  ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isOnline() {
      return \Cache::has('user-is-online-' . $this->id);
  }

  public function entity() {
      return $this->morphTo();
  }

  public function type() {
    return $this->belongsTo('App\MasterModel\MasterUserType', 'user_type_id', 'id');
}

public function entity_staff() {
    return $this->belongsTo('App\UserStaff', 'id', 'user_id');
}

public function statusUser() {
    return $this->belongsTo('App\MasterModel\MasterUserStatus', 'user_status_id', 'id');
}


public function entity_internal() {
    return $this->belongsTo('App\UserInternal', 'entity_id', 'id');
}
public function status() {
    return $this->belongsTo('App\MasterModel\MasterFilingStatus', 'user_status_id', 'id');
}

public function entity_user() {
    return $this->belongsTo('App\UserPP', 'entity_id', 'id');
}

public function role() {
    return $this->belongsTo('App\Role', 'role_id', 'id');
}

public function model_has_role() {
    return $this->belongsTo('App\ModelHasRole', 'id', 'model_id');
}

public function user_has_role() {
    return $this->hasMany('App\ModelHasRole', 'model_id', 'id');
}

public function logs() {
    return $this->hasMany('App\LogModel\LogSystem', 'created_by_user_id', 'id');
}

public function role_name() {
    $user = User::where('id',auth()->user()->id)->first();
    if ($user->entity_type == 'App\UserPP') {
        $role = 'Penggerak Projek';
    } else if($user->entity_type == 'App\UserEO'){
        $role = 'Environmental Officer';
    } else if($user->entity_type == 'App\UserEMC'){
        $role = 'Environmental Monitoring Consultant';
    } else {
        $role = '';
    }

    return $role;
}

public function role_name_by_id() {
    $user = User::where('id',$this->id)->first();
    if ($user->entity_type == 'App\UserPP') {
        $role = 'Penggerak Projek';
    } else if($user->entity_type == 'App\UserEO'){
        $role = 'Environmental Officer';
    } else if($user->entity_type == 'App\UserEMC'){
        $role = 'Environmental Monitoring Consultant';
    } else {
        $role = '';
    }

    return $role;
}

public function role_name_by_id_log() {
    $user = User::where('id',$this->id)->first();
    if ($user->entity_type == 'App\UserPP') {
        $role = 'Penggerak Projek';
    } else if($user->entity_type == 'App\UserEO'){
        $role = 'Environmental Officer';
    } else if($user->entity_type == 'App\UserEMC'){
        $role = 'Environmental Monitoring Consultant';
    } else {
        $role = 'Penyiasat/ Pelulus/ Penyelia';
    }

    return $role;
}

public function entity_eo() {
    return $this->belongsTo('App\UserEO', 'entity_id', 'id');
}

public function entity_emc() {
    return $this->belongsTo('App\UserEMC', 'entity_id', 'id');
}

public function project_has_user() {
    return $this->belongsTo('App\ProjekHasUser', 'id', 'user_id');
}

public function inboxes() {
    return $this->hasMany('App\OtherModel\Inbox', 'receiver_user_id', 'id');
}

public function distribute() {
    return $this->hasMany('App\Distribution', 'assigned_to_user_id', 'id');
}

public static function hantarUser($id,$type)
{
    DB::beginTransaction();
    try{

        $user = User::where('id',$id)->first();
        $user->user_status_id = 3;
        $user->save();

        $ioid = ProjekHasUser::where('user_id',auth()->id())->first();
        $ioidpegawai = Projek::where('id',$ioid->projek_id)->first();
        $distribution = Distribution::where('no_fail_jas',$ioidpegawai->no_fail_jas)->first();

        if ($type == 'emc') {
            $subject = 'EMC';
            $message = 'Pendaftaran Enviromental Monitoring Consulant (EMC)';
        } else {
            $subject = 'EO';
            $message = 'Enviromental Officer';
        }

        if ($distribution) {
            Inbox::create([
                'subject' => 'Pengesahan Pengguna Luar - '.$subject,
                'message' => 'Terdapat pengesahan diperlukan untuk '.$message,
                    'sender_user_id' => $user->id, //admin
                    'receiver_user_id' => $distribution->assigned_to_user_id, //Penyiasat
                    'inbox_status_id' => 2,
                ]);
        }

        DB::commit();
        return ['status' => 'success', 'title' => 'Berjaya!', 'message' => 'Data baru telah ditambah.'];

    }catch (\Exception $ex){
        DB::rollback();
        throw $ex;
    }
}

public static function userRole($userID)
{
    $user = User::where('id',$userID)->first();
    if ($user) {
        $modelHasRole = ModelHasRole::where('model_id', $user->id)->get(); 
        $roleArray = array();
        foreach ( $modelHasRole as $roles ) {
            $roleName = Role::where('id', $roles->role_id)->whereNotIn('id',[1,2,3,4,5,6])->first(); 
            if ($roleName ) {
                $roleArray[] = strtoupper($roleName->name);
            }
        }
    }
    return $roleArray;
}

public static function userDescription($userID)
{
    $user = User::where('id',$userID)->first();
    if ($user) {
        $modelHasRole = ModelHasRole::where('model_id', $user->id)->get(); 
        $roleArray = array();
        foreach ( $modelHasRole as $roles ) {
            $roleName = Role::where('id', $roles->role_id)->whereNotIn('id',[1,2,3,4,5,6])->first(); 
            if ($roleName ) {
                $roleArray[] = strtoupper($roleName->description);
            }
        }
    }
    return $roleArray;
}

public static function userRoleMenu($userID)
{
    $user = User::where('id',$userID)->first();
    if ($user) {
        $modelHasRole = ModelHasRole::where('model_id', $user->id)->get(); 
        $roleArray = array();
        foreach ( $modelHasRole as $roles ) {
            $roleName = Role::where('id', $roles->role_id)->first(); 
            if ($roleName ) {
                $roleArray[] = $roleName->name;
            }
        }
    }
    return $roleArray;
}

public static function getRoleDescs($id)
{
    $user = User::where('id',$id)->first();
    if ($user) {
        $modelHasRole = ModelHasRole::where('model_id', $user->id)->get(); 
        $roleArray = array();
        foreach ( $modelHasRole as $roles ) {
            $roleName = Role::where('id', $roles->role_id)->whereNotIn('id',[1,2,3,4,5,6])->first(); 
            if ($roleName ) {
                $roleArray[] = $roleName->description;
            }
        }
    }
    return $roleArray;
}

public function cstatus($id){
    $projekuser = ProjekHasUser::where('user_id',auth()->user()->id)->first();
    $pengawasaneo = PengawasanHasEo::where('user_id',auth()->user()->id)->get();

    foreach ($pengawasaneo as $key => $value) {
        $pakejeo[] = $value->pakej;
    }
    $stesen = Stesen::whereIn('projek_pakej_id',$pakejeo)->get();
    $checking = array();
        // dd($stesen);
    foreach ($stesen as $key => $value) {
        $cdetail = MonthlyCDetail::where('stesen_id',$value->id)->where('monthly_c_id',$id)->first();
        if (!is_null($cdetail->sampel)) {
            if (is_null($cdetail->ulasan)) {
                    // $cdetail->status_flag = 1;
                    // $cdetail->save();
                    // return response()->json(['status' => 'success']);
              $checking[] = 0;
              $flag[] = $cdetail->status_flag;
          } else {
                  // $cdetail->status_flag = 1;
                  // $cdetail->save();
              $checking[] = 1;
              $flag[] = $cdetail->status_flag;
          }
      } else {
              // dd('$cdetail');
        $checking[] = 0;
        $flag[] = $cdetail->status_flag;
    }
}
        // dd($checking);
if (in_array(null, $flag)) {
    $status = 0;
}else{
    $status = 1;
}

return $status;
}

public function kuiriPP(){
    $projek = auth()->user()->project_has_user->first()->projek;
    $bA = $projek->bahagiana();
        // $kuiriA = PengurusanKuiri::where('filing_id',)
}

public static function eopengawasan()
{
    $user = PengawasanHasEo::where('user_id',auth()->user()->id)->get();
    return $user;
}

public function pengawasan() {
    return $this->hasMany('App\MakmalAkreditasi', 'emc_id', 'entity_id');
}

public function emcpengawasan(){
    return $this->hasMany('App\PengawasanHasEmc','user_id', 'id');
}

public function sendPasswordResetNotification($token)
{
    $this->notify(new ResetPassword($token));
}

public function penggerakProjek()
{
    return $this->hasOne('App\Projek', 'penggerak_projek', 'id');
}

}
