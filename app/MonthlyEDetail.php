<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyEDetail extends Model
{
  protected $table = 'monthly_e_detail';

  public function projekaudit() {
      return $this->belongsTo('App\ProjekAudit','audit_id','id');
  }
}
