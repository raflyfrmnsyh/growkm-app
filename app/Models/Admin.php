<?php

namespace App\Models;

use App\Models\User;
use App\Models\Event;
use App\Models\Product;
use App\Models\Transaction;
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


    public static function getStaticData()
    {
        // Get total events
        // Get total events with type 'online gratis' and 'online berbayar'
        $totalEventsOnline = Event::where('event_type', 'Online')->count();
        $totalEventsOffline = Event::where('event_type', 'Offline')->count();
        $totalEvents = Event::count();

        // Get total products
        $totalProducts = Product::count();

        // Get total users with role 'user'
        $totalUsers = User::where('user_role', 'user')->count();

        // Get total transactions
        $totalTransactions = Transaction::count();

        // Get total transaction amount (sum of 'total' column)
        $totalTransactionAmount = Transaction::sum('total');

        return [
            'total_events_online' => $totalEventsOnline,
            'total_events_offline' => $totalEventsOffline,
            'total_events' => $totalEvents,
            'total_products' => $totalProducts,
            'total_users' => $totalUsers,
            'total_transactions' => $totalTransactions,
            'total_transaction_amount' => 'Rp.' . number_format($totalTransactionAmount, 0, ',', '.')
        ];
    }
}
