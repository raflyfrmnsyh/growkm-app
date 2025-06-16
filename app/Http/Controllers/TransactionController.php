<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showtb()
    {
        $getDataTransaction = Transaction::select(
            'transaction_id',
            'created_at',
            'shipping_name',
            'shipping_address',
            'total',
            'transaction_status'
        )->orderBy('created_at', 'desc')->get();

        $data = $getDataTransaction->map(function ($transaction) {
            return [
                'id' => $transaction->transaction_id,
                'tanggal_masuk' => $transaction->created_at,
                'customer_name' => $transaction->shipping_name,
                'customer_address' => $transaction->shipping_address,
                'total' => $transaction->total,
                'status' => $transaction->transaction_status
            ];
        });

        return view('_admin._transactions._product.all-products-transactions', [
            'title' => 'Data transaksi Product',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $lastTransaction = Transaction::where('transaction_id', 'like', 'TRX%')
                ->orderByRaw("CAST(SUBSTRING(transaction_id, 4) AS UNSIGNED) DESC")
                ->first();

            $nextNumber = $lastTransaction ? (int)substr($lastTransaction->transaction_id, 3) + 1 : 1;

            // Format angka agar tetap 6 digit
            $transactionId = 'TRX' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

            $transaction = Transaction::create([
                'transaction_id'     => $transactionId,
                'user_id'            => $request->user_id,
                'shipping_name'      => $request->shipping_name,
                'shipping_phone'     => $request->shipping_phone,
                'shipping_address'   => $request->shipping_address,
                'shipping_cost'      => $request->shipping_cost,
                'subtotal'           => collect($request->products)->sum('subtotal'),
                'total'              => $request->total,
                'transaction_status' => $request->transaction_status,
                'payment_status'     => $request->payment_status,
                'payment_method'     => $request->payment_method,
            ]);

            foreach ($request->products as $product) {
                Order::create([
                    'transaction_id' => $transactionId,
                    'product_id'     => $product['product_id'],
                    'quantity'       => $product['quantity'],
                    'price'          => $product['price'],
                    'subtotal'       => $product['subtotal'],
                ]);
            }

            DB::commit();

            return redirect()->route('product.list')->with('success', 'Transaksi berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['message' => 'Gagal membuat transaksi: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
