<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntityFile extends Model
{
    public $table = 'entity_files';

    public $fillable = [
        'uploaded_file_id',
        'entity_id',
        'created_at',
        'update_at'
    ];
}
