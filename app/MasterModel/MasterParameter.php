<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

class MasterParameter extends Model
{
    public $table = 'master_parameter';

    public $fillable = [
        'id',
        'jenis_pengawasan',
        'jenis_parameter',
        'unit',
        'mode',
        'versi',
        'schedule',
        'is_hashtag',
        'created_at',
        'updated_at'
    ];
    
    public function standard()
    {
        return $this->hasOne(MasterStandard::class, 'jenis_parameter', 'id');
    }
}
