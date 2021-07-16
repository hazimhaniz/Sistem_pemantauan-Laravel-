<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

class MasterPeringkatPengawasan extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'master_peringkat_pengawasan';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
        'status',
    ];
  
}
