<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyC extends Model
{
    public $table = 'monthly_c';

    public $fillable = [
        'id',
        'projek_id',
        'pakej_id',
        'status_id',
        'bulan',
        'tahun',
        'created_at',
        'updated_at',
        'flag'
    ];

    public function detail()
    {
        return $this->hasOne(MonthlyCDetail::class, 'monthly_c_id', 'id');
    }

    public function bacaanCerap()
    {
        return $this->hasMany(BacaanCerap::class, 'monthly_c_id', 'id')->whereNotNull('bacaan_cerap');;
    }
     public function bacaanCerapB()
    {
        return $this->hasMany(BacaanCerap::class, 'monthly_c_id', 'id')->whereNotNull('bacaan_cerap_b');
    }

    public function status()
    {
        return $this->belongsTo('App\MasterModel\MasterFilingStatus', 'status_id', 'id');
    }
}
