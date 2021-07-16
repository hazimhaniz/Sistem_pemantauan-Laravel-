<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PakejHasPengawasan extends Model
{
    protected $table = 'pakej_has_pengawasan';

    protected $fillable = ['pakej_id', 'pengawasan_id'];

    public function pakej() {
        return $this->belongsTo('App\MasterModel\ProjekPakej', 'pakej_id', 'id');
    }

    public function pengawasannama() {
        return $this->belongsTo('App\MasterModel\MasterPengawasan', 'pengawasan_id', 'id');
    }

    public function pengawasan() {
        return $this->belongsToMany('App\MasterModel\MasterPengawasan');
    }

    public function pengawasanhasemc() {
        return $this->hasOne('App\PengawasanHasEmc', 'pakej_has_pengawasan_id', 'id');
    }
}
