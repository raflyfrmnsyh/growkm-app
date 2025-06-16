<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

        $validated['product_id'] = Str::uuid(); //untuk membuat ID benar-benar unik, tidak ada duplikasi

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

        return redirect()->route('admin.manage.product')->with('success', 'Product updated successfully!');
    }

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);

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

        $event->update($validated);

        return redirect()->route('admin.manage.product')->with('succes', 'Product berhasil diperbarui!');
    }

    public function destroy($product_id)
    {
        $product = Product::where('product_id', $product_id)->firstOrFail();

        // Hapus gambar banner jika ada
        if ($product->product_image) {
            Storage::delete(str_replace('/storage', 'public', $product->product_image));
        }

        // Hapus product dari database
        $product->delete();

        return redirect()->route('admin.manage.product')
                        ->with('success', 'Product berhasil dihapus!');
    }
}
