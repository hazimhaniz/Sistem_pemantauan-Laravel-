<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

class MasterNotKomanwelCountry extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'master_notkomanwel_country';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
        'code',
    ];

    public function states() {
        return $this->hasMany('App\MasterModel\MasterState', 'country_id', 'id');
    }
}
