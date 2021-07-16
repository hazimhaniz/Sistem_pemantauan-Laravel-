<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjekEMP extends Model {

    protected $table = 'projek_emp';

    protected $guarded = [''];

    public $timestamps = true;

    protected $primaryKey = 'id';

    public $dates = ['tarikh_kelulusan'];

    public static function register(array $attribute)
    {
        return new static($attribute);
    }

}
