<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BacaanCerap extends Model
{
    public $table = 'bacaan_cerap';

    public $fillable = [
        'id',
        'monthly_c_id',
        'parameter_id',
        'bacaan_cerap',
        'bacaan_cerap_b',
        'version',
        'old_data',
        'created_at',
        'updated_at'
    ];

    public function masterStandard()
    {
        return $this->hasOne(MasterStandard::class, 'parameter_id', 'jenis_parameter');
    }

    public function masterParameter()
    {
        return $this->hasOne(MasterParameter::class, 'id', 'parameter_id');
    }

    public function parameter()
    {
        return $this->hasOne(Parameter::class, 'id', 'parameter_id');
    }

}
