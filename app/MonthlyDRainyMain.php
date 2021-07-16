<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyDRainyMain extends Model
{
    protected $table = 'monthly_d_rainy_main';
    public $fillable =['projek_id'];
    public $date =['tarikh'];

    public function monthlydrainy() {
        return $this->belongsTo('App\MonthlyDRainy', 'monthlyd_rainy_id', 'id');
    }
    public function status() {
        return $this->belongsTo('App\MasterModel\MasterFilingStatus', 'status_id', 'id');
    }
    public function attachments() {
        return $this->morphMany('App\OtherModel\Attachment', 'filing');
    }

    public function pakejname() {
        return $this->belongsTo('App\ProjekPakej', 'pakej_id', 'id');
    }

}
