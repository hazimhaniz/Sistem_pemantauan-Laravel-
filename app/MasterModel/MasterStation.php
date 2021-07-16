<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

class MasterStation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'master_station';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
        'jenis_pengawasan_id',
        'sungai_id',
    ];
}
