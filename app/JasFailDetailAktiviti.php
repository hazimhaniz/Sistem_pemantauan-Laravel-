<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JasFailDetailAktiviti extends Model
{
    protected $table = 'jas_fail_detail_aktiviti';

    protected $guarded = [''];

    public $timestamps = true;

    protected $primaryKey = 'id';

    public static function register(array $attribute)
    {
        return new static($attribute);
    }
}
