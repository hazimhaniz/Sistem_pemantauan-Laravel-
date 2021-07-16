<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserEMC extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_emc';

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
      'syarikat',
      'syarikat',
      'alamatsyarikat',
      'nama_pegawai',
      'nama_makmal',
      'no_tel_makmal',
      'alamat_makmal',
      'negeri_id',
      'daerah_id',
      'poskod',
      'faks',
      'deleted_at'
    ];

    public function user() {
        return $this->morphOne('App\User', 'entity');
    }

    public function isOnline() {
      return \Cache::has('user-is-online-' . $this->id);
    }

    public function state() {
        return $this->belongsTo('App\MasterModel\MasterState', 'negeri_id', 'id');
    }

    public function district() {
        return $this->belongsTo('App\MasterModel\MasterDistrict', 'daerah_id', 'district_id');
    }
}
