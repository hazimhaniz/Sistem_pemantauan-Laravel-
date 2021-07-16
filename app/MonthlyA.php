<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyA extends Model
{
    protected $table = 'monthly_a';
    protected $fillable = ['projek_id', 'bulan', 'tahun'];

    public function status() {
        return $this->belongsTo('App\MasterModel\MasterFilingStatus', 'status_id', 'id');
    }

    public function statusKemajuan() {
        return $this->hasOne('App\MonthlyAKemajuanStatus','monthlya_id')->latest();
    }

    public function attachments() {
        return $this->morphMany('App\OtherModel\Attachment', 'filing');
    }

    public function borangEscp(){
        return $this->belongsTo('App\MonthlyAESCP','monthlya_id','id');
    }

    public function projek()
    {
        return $this->belongsTo('App\Projek', 'projek_id', 'id');
    }
}
