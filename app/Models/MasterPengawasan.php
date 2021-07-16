<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPengawasan extends Model
{
    public $table = 'master_pengawasan';

    public $fillable = [
        'id',
        'jenis_pengawasan',
        'nama',
        'standard_dirujuk',
        'created_at',
        'updated_at'
    ];

    public function parameters()
    {
        return $this->hasMany(MasterParameter::class, 'jenis_pengawasan', 'id')->orderBy('mode');
    }
}
