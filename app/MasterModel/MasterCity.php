<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

class MasterCity extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'master_city';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    // 	'name',
    //     'state_id',
    // ];

    public function state() {
        return $this->belongsTo('App\MasterModel\MasterState', 'state_id', 'id');
    }
}
