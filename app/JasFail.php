<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JasFail extends Model
{
    protected $table = 'jas_fail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
        'nofail',
        'status',
    ];

    public function getstatus() {
        return $this->belongsTo('App\MasterModel\MasterPeringkatPengawasan', 'status', 'id');
    }

    public function jasdetail() {
        return $this->belongsTo('App\JasFailDetail', 'id', 'jas_fail_id');
    }

    public function distribute() {
        return $this->belongsTo('App\Distribution', 'nofail', 'no_fail_jas');
    }

}
