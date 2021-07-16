<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

class MasterKomanwelCountry extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'master_komanwel_country';
    
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
