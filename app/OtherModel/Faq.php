<?php

namespace App\OtherModel;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'faq';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'question',
        'answer',
        'status',
        'faq_type_id'
    ];

    public function type() {
        return $this->belongsTo('App\MasterModel\MasterFaqType', 'faq_type_id', 'id');
    }
}
