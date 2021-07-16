<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    public $table = 'password_reset';

    public $fillable = [
        'email',
        'token',
        'created_at'
    ];
}
