<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelHasRole extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'model_has_role';

    public function user() {
        return $this->belongsTo('App\User', 'model_id', 'id');
    }

    public function role() {
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }
}
