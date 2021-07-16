<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JasLdp2m2 extends Model
{
    protected $table = 'jas_ldp2m2';

    protected $guarded = [''];

    public $timestamps = true;

    protected $primaryKey = 'id';

    public static function register(array $attribute)
    {
        return new static($attribute);
    }
}
