<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_name' => 'required|string|max:100',
            'product_description' => 'required|string',
            'product_category' => 'required|array',
            'product_category.*' => 'string|max:100',
            'product_price' => 'required|numeric',
            'product_stock' => 'required|integer|min:0',
            'product_min_order' => 'required|integer|min:1',
            'product_tags' => 'nullable|string|max:255',
        ]);

        // Generate product ID baru
        $lastProduct = Product::where('product_id', 'like', 'TRXPRD%')
            ->orderBy('created_at', 'desc')
            ->first();

        if ($lastProduct) {
            // Ambil angka terakhir dari ID
            $lastNumber = (int) substr($lastProduct->product_id, 8);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        // Format angka menjadi 3 digit
        $formattedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        $validated['product_id'] = 'TRXPRD' . $formattedNumber;

        // Handle file upload
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $path = $image->store('public/image/products');
            $validated['product_image'] = Storage::url($path);
        }

        // Convert product_category array to JSON string
        $validated['product_category'] = json_encode($validated['product_category']);

        // Product tags are already handled as string by validation.

        // Create product
        Product::create($validated);

        return redirect()->route('admin.manage.product')->with('success', 'Product added successfully!');
    }

    public function update(Request $request, $product_id)
    {
        $product = Product::where('product_id', $product_id)->firstOrFail();

        $validated = $request->validate([
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_name' => 'required|string|max:100',
            'product_description' => 'required|string',
            'product_category.*' => 'string|max:100',
            'product_price' => 'required|numeric',
            'product_stock' => 'required|integer|min:0',
            'product_min_order' => 'required|integer|min:1',
            'product_tags' => 'nullable|string|max:255',
        ]);

        // Handle file upload
        if ($request->hasFile('product_image')) {
            // Delete old image if it exists
            if ($product->product_image) {
                Storage::delete(str_replace('/storage', 'public', $product->product_image));
            }
            $image = $request->file('product_image');
            $path = $image->store('public/image/products');
            $validated['product_image'] = Storage::url($path);
        } else {
            // Retain old image if no new one is uploaded
            $validated['product_image'] = $product->product_image;
        }

        // Convert product_category array to JSON string
        $validated['product_category'] = json_encode($validated['product_category']);

        $product->update($validated);

        return redirect()->route('admin.manage.product.detail', $product->product_id)->with('success', 'Product updated successfully!');
    }

    public function index()
    {
        // $products = Product::orderBy('created_at', 'desc')->paginate(10);
        $products = Product::select(
            'product_id',
            'product_name',
            'product_category',
            'product_price',
            'product_stock',
            'product_min_order'
        )->orderBy('created_at', 'desc')->paginate(10);


        $products->getCollection()->transform(
            function ($item) {
                return [
                    'product_id' => $item->product_id,
                    'product_name' => $item->product_name,
                    'product_category' => explode(',', $item->product_category),
                    'product_price' => $item->product_price,
                    'product_stock' => $item->product_stock,
                    'product_min_order' => $item->product_min_order
                ];
            }
        );

        return view('_admin._manage.product-data', [
            'title' => 'Kelola data Produk',
            'products' => $products
        ]);
    }

    public function show($product_id)
    {
        $product = Product::where('product_id', $product_id)->firstOrFail();

        return view('_admin._manage._update.detail-product-data', [
            'title' => $product->product_name . ' Details',
            'product' => $product,
        ]);
    }

    public function destroy($product_id)
    {
        $product = Product::where('product_id', $product_id)->firstOrFail();

        // Delete product image if it exists
        if ($product->product_image) {
            Storage::delete(str_replace('/storage', 'public', $product->product_image));
        }

        $product->delete();

        return redirect()->route('admin.manage.product')->with('success', 'Product deleted successfully!');
    }
}
