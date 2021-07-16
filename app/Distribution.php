<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    protected $table = 'distribution';

    protected $guarded = [''];

    public $timestamps = true;

    protected $primaryKey = 'id';

    public static function register(array $attribute)
    {
        return new static($attribute);
    }

    public function assignstaff()
    {
        return $this->belongsTo('App\User', 'assigned_to_user_id', 'id');
    }

    public function assignstaffpelulus()
    {
        return $this->belongsTo('App\User', 'assigned_pelulus', 'id');
    }

    public function assignstaffpenyelia()
    {
        return $this->belongsTo('App\User', 'assigned_penyelia', 'id');
    }

    public function assignby()
    {
        return $this->belongsTo('App\User', 'assigned_by', 'id');
    }

    public function projek()
    {
        return $this->belongsTo('App\Projek', 'no_fail_jas', 'no_fail_jas');
    }
}
