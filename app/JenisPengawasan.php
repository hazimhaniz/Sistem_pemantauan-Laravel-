<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisPengawasan extends Model
{
    use SoftDeletes;
    protected $table = 'jenispengawasan';

    protected $fillable = [
    	'id',
        'projek_id',
        'jenis_pengawasan_id',
    ];

    public function pengawasan() {
        return $this->belongsToMany('App\MasterModel\MasterPengawasan');
    }

      public function projek() {
        return $this->belongsTo('App\Projek', 'id');
    }
}
