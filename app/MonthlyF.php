<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyF extends Model
{
  protected $table = 'monthly_f';

  protected $fillable = [
    'projek_id',
      'tahun',
      'bulan',
  ];
  
  public function status() {
      return $this->belongsTo('App\MasterModel\MasterFilingStatus', 'status_id', 'id');
  }

  public function projek()
  {
      return $this->belongsTo('App\Projek', 'projek_id', 'id');
  }
}
