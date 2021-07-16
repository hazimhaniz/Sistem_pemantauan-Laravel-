<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjekHasUser extends Model
{
    protected $table = 'projek_has_user';

    protected $fillable = ['projek_id', 'user_id', 'status', 'user_flag', 'projek_fasa_id', 'projek_has_pp_id', 'role_id', 'eo_has_emc'];

    public function projek()
    {
        return $this->belongsTo('App\Projek', 'projek_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    // public function model_has_role() {
    //     return $this->belongsTo('App\ModelHasRole', 'projek_id', 'model_id');
    // }

    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }

    public function statusFiling()
    {
        return $this->belongsTo('App\MasterModel\MasterFilingStatus', 'status', 'id');
    }

}
