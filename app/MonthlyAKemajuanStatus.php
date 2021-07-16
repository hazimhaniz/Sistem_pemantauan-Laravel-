<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyAKemajuanStatus extends Model
{
     protected $table = 'monthly_a_status_kemajuan';

     public function borangA_kemajuan(){
     	return $this->belongsTo('App\MasterModel\MonthlyA', 'id')->latest();
     }
}
