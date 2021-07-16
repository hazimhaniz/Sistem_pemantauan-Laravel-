<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserExternal extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_external';

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
        'no_ic',
    ];

    public function user() {
        return $this->morphOne('App\User', 'entity');
    }

    public function getCountryAttribute()
    {
        return 'MALAYSIA';
    }

    public function getWarganegaraAttribute()
    {
        return 1;
    }
}
