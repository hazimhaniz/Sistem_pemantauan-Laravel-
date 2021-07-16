<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kompeten extends Model
{
     protected $table = 'kompeten';

     public function senaraiKompeten(){
     	return $this->belongsTo('App\UserEO','user_eo_id','id');
     }
}
