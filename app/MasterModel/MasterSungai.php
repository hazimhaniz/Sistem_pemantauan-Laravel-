<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

class MasterSungai extends Model
{
    public $table = 'master_sungai';

    public $fillable = [
        'id',
        'negeri',
        'lembangan_eqmp',
        'lembangan_2020',
        'sungai_eqmp',
        'sungai_2020'
    ];
}
