<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property int $user_id
 * @property int $role_id
 * @property int $projek_id
 */
class ProjekHasPp extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'projek_has_pp';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'user_id', 'role_id', 'projek_id'];

    public function projek() {
        return $this->belongsTo('App\Projek', 'projek_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
}
