<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengawasanHasEo extends Model
{
    protected $table = 'pengawasan_has_eo';

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function pakej_data() {
        return $this->belongsTo('App\ProjekPakej', 'pakej', 'id');
    }
}
