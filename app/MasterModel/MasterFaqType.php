<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

class MasterFaqType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'master_faq_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    ];

    public function faq() {
        return $this->hasMany('App\OtherModel\Faq', 'faq_type_id', 'id');
    }
}
