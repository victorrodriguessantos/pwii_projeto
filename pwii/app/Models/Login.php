<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;

    protected $table = 'tbusuarios';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $fillable = [
        'user_email',
        'user_key',
    ];
}
