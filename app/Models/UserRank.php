<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRank extends Model
{
    protected $table = 'view_user_activity_rank';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'user_id';
}
