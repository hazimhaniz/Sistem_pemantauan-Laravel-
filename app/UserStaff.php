<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserStaff extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_staff';

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
        'role_id',
        'user_id',
        'state_id',
    ];

    public function user() {
        return $this->morphOne('App\User', 'entity');
    }

    public function user_state() {
        return $this->belongsTo('App\User', 'user_id','id');
    }

    public function state() {
        return $this->belongsTo('App\MasterModel\MasterState', 'state_id', 'id');
    }

    public function role() {
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }

    public function detail_user() {
        return $this->belongsTo('App\User', 'user_id','id');
    }

    public function province_office() {
        return $this->belongsTo('App\MasterModel\MasterProvinceOffice', 'province_office_id', 'id');
    }

    public function section() {
        return $this->belongsTo('App\MasterModel\MasterSection', 'section_id', 'id');
    }

    
}
