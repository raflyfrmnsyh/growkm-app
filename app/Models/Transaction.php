<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    // Jika kamu pakai string sebagai primary key (misal 'transaction_id')
    protected $primaryKey = 'transaction_id';
    public $incrementing = false; // karena bukan auto-increment
    protected $keyType = 'string';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'transaction_id',
        'user_id',
        'shipping_address',
        'shipping_phone',
        'shipping_name',
        'subtotal',
        'shipping_cost',
        'total',
        'transaction_status',
        'payment_method',
        'payment_status',
    ];

    /**
     * Relasi ke user (jika ingin)
     */

    /**
     * Relasi ke order
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'transaction_id', 'transaction_id');
    }
}
