<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

class MasterRunningNo extends Model
{
    //
    protected $table = 'master_runningno';

    protected $fillable = [
    	'year',
    	'count',
    ];

}
