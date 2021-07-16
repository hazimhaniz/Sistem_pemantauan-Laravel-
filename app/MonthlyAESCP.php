<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyAESCP extends Model
{
	protected $table = 'monthly_a_escp';
	protected $fillable = ['projek_id'];

	public function borangA(){
		return $this->hasMany('App\MonthlyA','id');
	}
}
