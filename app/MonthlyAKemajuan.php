<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyAKemajuan extends Model
{
    protected $table = 'monthly_a_kemajuan';

    protected $fillable = [
        'projek_id',
        'monthly_a_id',
        'pakej_id',
        'peratus_kemajuan',
    ];

    public function pakej() {
        return $this->belongsTo('App\ProjekPakej', 'pakej_id', 'id');
    }

}
