<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjekPengawasanLaporanStatus extends Model
{
    protected $table = 'projek_pengawasan_laporan_status';

    protected $guarded = [''];

    public $timestamps = true;

    protected $primaryKey = 'id';

    public static function register(array $attribute)
    {
        return new static($attribute);
    }

    public function status() {
        return $this->belongsTo('App\MasterModel\MasterFilingStatus', 'status_id', 'id');
    }
}
