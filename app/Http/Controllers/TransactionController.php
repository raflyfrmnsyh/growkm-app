<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Order;
use App\Models\Product;
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

    public function showtb(Request $request)
    {

        $query = Transaction::select(
            'transaction_id',
            'created_at',
            'shipping_name',
            'shipping_address',
            'total',
            'transaction_status'
        );

        // Filter by searchBox (search in transaction_id, shipping_name, shipping_address)
        if ($request->filled('searchBox')) {
            $search = $request->input('searchBox');
            $query->where(function ($q) use ($search) {
                $q->where('transaction_id', 'like', "%{$search}%")
                    ->orWhere('shipping_name', 'like', "%{$search}%")
                    ->orWhere('shipping_address', 'like', "%{$search}%");
            });
        }

        // Filter by transaction_status
        if ($request->filled('transaction_status')) {
            $query->where('transaction_status', $request->input('transaction_status'));
        }

        // Filter by date (today)
        if ($request->input('filter') === 'today') {
            $query->whereDate('created_at', now()->toDateString());
        }

        $getDataTransaction = $query->orderBy('created_at', 'desc')->get();

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
        $detail_transaction = Transaction::where('transaction_id', $id)->first();
        $detail_orders = Order::where('transaction_id', $id)->get();

        // Ringkasan Pesanan
        // Item products collection
        $products = $detail_orders->map(function ($order) {
            $product = Product::where('product_id', $order->product_id)->first();
            return [
                'product_image' => $product->product_image ?? '',
                'product_name' => $product->product_name ?? '',
                'product_tags' => isset($product->product_tags) ? explode(',', $product->product_tags) : [],
                'product_qty' => $order->quantity ?? 0,
                'product_price' => $order->price ?? 0,
                'product_total' => $order->subtotal
            ];
        });
        // Customer info
        $customer_info = [
            'transaction_id' => $detail_transaction->transaction_id ?? '',
            'shipping_name' => $detail_transaction->shipping_name ?? '',
            'shipping_address' => $detail_transaction->shipping_address ?? '',
            'shipping_phone' => $detail_transaction->shipping_phone ?? '',
            'shipping_cost' => $detail_transaction->shipping_cost ?? 0,
            'total' => $detail_transaction->total ?? 0,
            'transaction_status' => $detail_transaction->transaction_status ?? '',
            'paymethod' => $detail_transaction->payment_method ?? '',
            'subtotal' => $detail_transaction->subtotal ?? '',
            'payment_status' => $detail_transaction->payment_status ?? '',
            'date' => $detail_transaction->created_at
        ];


        // Pass data to view
        return view('_admin._transactions._product.detail-product-transaction', [
            'title' => 'Detail Product - ' . $id,
            'customer' => $customer_info,
            'product' => $products

        ]);
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
        // dd($request->all());
        $request->validate([
            'transaction_status' => 'string',
        ]);

        $transaction = Transaction::where('transaction_id', $id)->firstOrFail();
        $currentStatus = $transaction->transaction_status;

        switch ($currentStatus) {
            case 'pending':
                $transaction->transaction_status = 'on process';
                break;
            case 'on process':
                $transaction->transaction_status = 'on shipping';
                break;
            case 'on shipping':
                $transaction->transaction_status = 'selesai';
                break;
            default:
                // Tidak ada perubahan status jika status tidak dikenali
                break;
        }
        $transaction->save();

        return redirect()->route('admin.transaction-product-detail', $id)->with('success', 'Status transaksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
