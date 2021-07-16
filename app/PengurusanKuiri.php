<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengurusanKuiri extends Model
{
    protected $table = "pengurusan_kuiri";

    public function statusid()
    {
        return $this->belongsTo('App\MasterModel\MasterFilingStatus', 'status', 'id');
    }

    public function projek()
    {
        return $this->belongsTo('App\Projek', 'projek_id', 'id');
    }

    
}
