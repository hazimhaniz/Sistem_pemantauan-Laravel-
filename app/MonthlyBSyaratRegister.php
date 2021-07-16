<?php

namespace App;
use App\MasterModel\MasterFilingStatus;
use App\MonthlyBSyaratKuiri;
use Illuminate\Database\Eloquent\Model;

class MonthlyBSyaratRegister extends Model
{
	protected $table = 'monthly_b_syarat_register';

	protected $fillable = [
		'id',
		'projek_id',
		'syarat',
		'ulasan',
		'status',
	];

	protected $date=['created_at','updated_at','tarikh_pindaaan'];

	public function filing_status(){
		return $this->belongsTo(MasterFilingStatus::class,'status','id');
	}

	public function senarai_kuiri(){
		return $this->hasMany('App\MonthlyBSyaratKuiri','monthly_b_syarat_register_id','id');
	}

}
