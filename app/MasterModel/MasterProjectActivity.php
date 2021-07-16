<?php

namespace App\MasterModel;

use Illuminate\Database\Eloquent\Model;

class MasterProjectActivity extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_project_activity';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    ];
}
