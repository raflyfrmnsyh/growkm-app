<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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

    public static function getTopProducts(int $limit = 5)
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Selalu ambil semua produk, left join dengan orders minggu ini
        $topProducts = DB::table('products')
            ->leftJoin('orders', function ($join) use ($startOfWeek, $endOfWeek) {
                $join->on('products.product_id', '=', 'orders.product_id')
                    ->whereBetween('orders.created_at', [$startOfWeek, $endOfWeek]);
            })
            ->select(
                'products.product_id',
                'products.product_name',
                'products.product_category',
                DB::raw('COALESCE(SUM(orders.quantity * orders.price), 0) as total_sale')
            )
            ->groupBy('products.product_id', 'products.product_name', 'products.product_category')
            ->orderByDesc('total_sale')
            ->limit($limit)
            ->get();

        return $topProducts->map(function ($item, $index) {
            return [
                'rank' => $index + 1,
                'product_name' => $item->product_name,
                'product_category' => explode(',', $item->product_category)[0],
                'total_sale' => 'Rp ' . number_format($item->total_sale, 0, ',', '.')
            ];
        });
    }

    public static function getTopUserTransaction(int $limit = 5)
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $topUsers = DB::table('users')
            ->leftJoin('transactions', function ($join) use ($startOfWeek, $endOfWeek) {
                $join->on('users.user_id', '=', 'transactions.user_id')
                    ->whereBetween('transactions.created_at', [$startOfWeek, $endOfWeek]);
            })
            ->select(
                'users.user_id',
                'users.user_name',
                'users.user_email',
                DB::raw('COALESCE(SUM(transactions.total), 0) as total_transaction')
            )
            ->groupBy('users.user_id', 'users.user_name', 'users.user_email')
            ->orderByDesc('total_transaction')
            ->limit($limit)
            ->get();

        // Fallback jika kosong
        if ($topUsers->isEmpty()) {
            $topUsers = DB::table('users')
                ->leftJoin('transactions', 'users.user_id', '=', 'transactions.user_id')
                ->select(
                    'users.user_id',
                    'users.user_name',
                    'users.user_email',
                    DB::raw('COALESCE(SUM(transactions.total), 0) as total_transaction')
                )
                ->groupBy('users.user_id', 'users.user_name', 'users.user_email')
                ->orderByDesc('total_transaction')
                ->limit($limit)
                ->get();

            Log::debug('Top Users All Time (Fallback):', [$topUsers]);
        }

        return $topUsers->map(function ($item, $index) {
            return [
                'rank' => $index + 1,
                'username' => $item->user_name,
                'email' => $item->user_email,
                'total_transaction' => 'Rp ' . number_format($item->total_transaction, 0, ',', '.')
            ];
        });
    }
}
