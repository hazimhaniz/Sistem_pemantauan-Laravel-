<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JasEmp extends Model
{
    protected $table = 'jas_emp';

    protected $guarded = [''];

    public $timestamps = true;

    protected $primaryKey = 'id';

    public static function register(array $attribute)
    {
        return new static($attribute);
    }
}
