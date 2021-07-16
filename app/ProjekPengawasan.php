<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $projek_id
 * @property int $pengawasan_id
 * @property string $created_at
 * @property string $updated_at
 */
class ProjekPengawasan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'projek_pengawasan';

    /**
     * @var array
     */
    protected $fillable = ['projek_id', 'pengawasan_id', 'created_at', 'updated_at'];

    public function jenisPengawasan(){
       return $this->belongsTo('App\MasterModel\MasterPengawasan','pengawasan_id','id');
    }

}
