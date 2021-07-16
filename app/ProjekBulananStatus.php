<?php

namespace App;

use App\MasterModel\MasterFilingStatus;
use Illuminate\Database\Eloquent\Model;

class ProjekBulananStatus extends Model
{

    protected $table = 'projek_bulanan_status';

    protected $with = ['status'];

    protected $fillable = ['projek_id', 'year', 'bulanan'];

    public function projek()
    {
        return $this->belongsTo('App\Projek', 'projek_id', 'id');
    }

    public function ProjekDetail()
    {
        return $this->belongsTo('App\ProjekDetail', 'projek_id', 'projek_id');
    }

    public function statusFiling()
    {
        return $this->belongsTo('App\MasterModel\MasterFilingStatus', 'status', 'id');
    }

    public function projekUserPP()
    {
        return $this->belongsTo('App\ProjekHasPp', 'projek_id', 'projek_id');
    }

    public function status()
    {
        return $this->hasOne(MasterFilingStatus::class, 'id', 'status');
    }
}
