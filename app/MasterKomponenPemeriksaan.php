<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterKomponenPemeriksaan extends Model
{
    protected $table = "master_komponen_pemeriksaan";

    public function pematuhan(){
        return $this->hasMany('App\MasterPematuhanBmpPemeriksaan', 'master_komponen_pemeriksaan_id', 'id');
    }

    public function KodPemeriksaan(){
        return $this->belongsTo('App\MasterBmpPemeriksaan', 'master_bmp_pemeriksaan_id','id');
    }
}
