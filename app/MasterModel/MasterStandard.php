<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

class MasterStandard extends Model
{
    public $table = 'master_standard';

    public $fillable = [
        'id',
        'jenis_parameter',
        'class',
        'parameter',
        'created_at',
        'updated_at'
    ];
}
