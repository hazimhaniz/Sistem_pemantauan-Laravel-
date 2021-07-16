<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    public $table = 'parameter';

    public $fillable = [
        'id',
        'stesen_id',
        'parameter',
        'standard',
        'baselineeia',
        'baselineemp',
        'mode',
        'created_at',
        'updated_at',
        'is_near',
        'bunyi_value'
    ];

    public function stesen()
    {
        return $this->belongsTo(Stesen::class, 'stesen_id', 'id');
    }

    public function masterStandard()
    {
        return $this->hasOne(MasterStandard::class, 'jenis_parameter', 'parameter');
    }

    public function masterParameter()
    {
        return $this->hasOne(MasterParameter::class, 'id', 'parameter');
    }
}
