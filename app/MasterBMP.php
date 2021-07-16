<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterBMP extends Model
{
    protected $table = "master_bmp";

    public function pematuhans()
    {
        return $this->hasMany('App\Master_bmp_pematuhan', 'master_bmp_id', 'id');
    }
}
