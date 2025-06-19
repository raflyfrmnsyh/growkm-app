<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'user_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'user_password',
        'user_gender',
        'user_phone',
        'user_address',
        'user_profile',
        'user_role',
    ];

    protected $hidden = [
        'user_password',
    ];

    public function getEmailAttribute()
    {
        return $this->user_email;
    }

    public function setEmailAttribute($value)
    {
        $this->user_email = $value;
    }

    public function getAuthPassword()
    {
        return $this->user_password;
    }
}
