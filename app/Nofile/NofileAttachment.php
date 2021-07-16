<?php

namespace App\Nofile;

use Illuminate\Database\Eloquent\Model;

class NofileAttachment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nofile_attachment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'url',
        'type',
        'created_by_user_id',
    ];
}
