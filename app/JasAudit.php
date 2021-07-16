<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JasAudit extends Model
{
    protected $table = 'jas_audit';

    protected $guarded = [''];

    public $timestamps = true;

    protected $primaryKey = 'id';

    public static function register(array $attribute)
    {
        return new static($attribute);
    }
}
