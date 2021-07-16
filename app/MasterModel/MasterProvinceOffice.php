<?php

namespace App\MasterModel;

use App\UserInternal;
use Illuminate\Database\Eloquent\Model;

class MasterProvinceOffice extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'master_province_office';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
        'address_id',
        'phone',
        'fax',
        'email',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */ 

    public function address() {
        return $this->belongsTo('App\OtherModel\Address', 'address_id', 'id');
    }
}
