<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjekPengawasanLaporan extends Model
{
    protected $table = 'projek_pengawasan_laporan';

    public function projek() {
        return $this->belongsTo('App\Projek', 'projek_id', 'id');
    }

    public function status() {
        return $this->belongsTo('App\ProjekPengawasanLaporanStatus', 'id', 'projek_pengawasan_laporan_id');
    }
}
