<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ParticipantRegist extends Model
{
    //

    use HasFactory;

    protected $fillable = [
        'regist_id',
        'user_id',
        'participant_name',
        'event_name',
        'participant_email',
        'participant_phone',
        'participant_qty',
        'participant_code',
        'subtotal',
        'payment_status',
    ];

    protected $catst = [
        'subtotal' => 'double'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'event_id');
    }
}
