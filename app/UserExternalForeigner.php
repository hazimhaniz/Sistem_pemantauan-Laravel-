<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserExternalForeigner extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_external_foreigner';

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
        'no_passport',
        'country_passport',
    ];

    public function user() {
        return $this->morphOne('App\User', 'entity');
    }

    public function country() {
        return $this->belongsTo('App\MasterModel\MasterCountry', 'country_passport', 'code');
    }

    public function getCountryAttribute()
    {
        return strtoupper(optional(optional($this->country())->first())->name);
    }

    public function getWarganegaraAttribute()
    {
        return 0;
    }
    
}
