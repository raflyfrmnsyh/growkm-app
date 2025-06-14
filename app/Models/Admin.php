<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Model
{
    protected $fillable = [
        "username",
        'user_email',
        'user_phone',
        'user_gender',
        'user_address',
        'user_password',
        'user_role',
    ];
}
