<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

class MasterReligion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'master_religion';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    ];
}
