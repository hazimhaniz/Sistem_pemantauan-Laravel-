<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MonthlyBSyaratRegister;

class MonthlyBSyaratKuiri extends Model
{
	protected $table = 'monthly_b_syarat_kuiri';

	protected $fillable = [
		'id',
		'monthly_b_syarat_register_id',
		'kuiri',
		'tarikh_kuiri',
		'kuiri_user_id',
	];

	protected $date=['created_at','updated_at','tarikh_kuiri'];

	public function getSyarat(){
		return $this->belongsTo(MonthlyBSyaratRegister::class,'monthly_b_syarat_register_id','id');
	}
}
