<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class MasterElemenPemeriksaan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'master_elemen_pemeriksaan';

    /**
     * @var array
     */
    protected $fillable = ['name', 'created_at', 'updated_at'];

}
