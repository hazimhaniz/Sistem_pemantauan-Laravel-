<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    public $table = 'uploaded_files';
    protected $primaryKey = 'id';
    public $incrementing = false;

    public $fillable = [
        'id',
        'entity_type',
        'doc_type',
        'path',
        'created_at',
        'update_at',
        'projek_id',
        'user_id',
        'ulasan'
    ];
}
