<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'event_id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'event_id',
        'event_title',
        'event_description',
        'event_type',
        'event_location',
        'event_tags',
        'event_is_paid',
        'event_price',
        'event_quota',
        'event_status',
        'event_banner_img',
        'event_date',
        'event_start_time',
        'event_end_time',
        'event_registration_deadline',
        'event_speaker_name',
        'event_speaker_job'
    ];

    protected $casts = [
        'event_date' => 'date',
        'event_start_time' => 'datetime:H:i:s',
        'event_end_time' => 'datetime:H:i:s',
        'event_registration_deadline' => 'date',
        'event_price' => 'decimal:2'
    ];
}
