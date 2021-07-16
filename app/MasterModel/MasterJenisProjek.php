<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

class MasterJenisProjek extends Model
{
    protected $table = 'master_jenis_projek';

    protected $fillable = [
    	'name',
        'status',    
    ];
}
