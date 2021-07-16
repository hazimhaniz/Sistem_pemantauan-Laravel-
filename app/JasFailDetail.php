<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JasFailDetail extends Model
{
    protected $table = 'jas_fail_detail';

    protected $guarded = [''];

    public $timestamps = true;

    protected $primaryKey = 'id';

    public static function register(array $attribute)
    {
        return new static($attribute);
    }

    public function jasaktiviti() {
        return $this->hasMany('App\JasFailDetailAktiviti', 'jas_ekas_id', 'ekas_id');
    }

    public function negeri_nama() {
        return $this->belongsTo('App\MasterModel\MasterState', 'negeri', 'id');
    }

    public function jasfail() {
        return $this->belongsTo('App\JasFail', 'jas_fail_id', 'id');
    }
}
