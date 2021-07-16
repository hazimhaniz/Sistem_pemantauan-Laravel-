<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

class MasterEmbassy extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'master_embassy';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];
}
