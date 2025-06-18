<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ProductController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_name' => 'required|string|max:100',
            'product_description' => 'required|string',
            'product_category' => 'required|array',
            'product_category.*' => 'string|max:100',
            'product_price' => 'required|numeric',
            'product_stock' => 'required|integer|min:0',
            'product_min_order' => 'required|integer|min:1',
            'product_unit' => 'required|string|max:255',
            'product_tags' => 'nullable|string|max:255',
        ]);

        // Generate unique product ID
        do {
            $productId = 'PRD' . strtoupper(Str::random(7));
        } while (Product::where('product_id', $productId)->exists());

        $validated['product_id'] = $productId;

        // Handle file upload (jika ada)
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $path = $image->store('public/image/products');
            $validated['product_image'] = Storage::url($path);
        }

        // Convert category array to comma-separated string
        $validated['product_category'] = implode(', ', $validated['product_category']);

        // Insert to database
        Product::create($validated);

        return redirect()->route('admin.manage.product')->with('success', 'Product Berhasil Ditambahkan!');
    }

    public function update(Request $request, $product_id)
    {

        $product = Product::where('product_id', $product_id)->firstOrFail();

        $validated = $request->validate([
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_name' => 'required|string|max:100',
            'product_description' => 'required|string',
            'product_category' => 'required|array', // <-- ubah jadi string
            'product_price' => 'required|numeric',
            'product_stock' => 'required|integer|min:0',
            'product_min_order' => 'required|integer|min:1',
            'product_unit' => 'required|string|max:255',
            'product_tags' => 'nullable|string|max:255',
        ]);

        $validated['product_category'] = implode(', ', $validated['product_category']);

        // Handle file upload
        if ($request->hasFile('product_image')) {
            if ($product->product_image) {
                Storage::delete(str_replace('/storage', 'public', $product->product_image));
            }
            $image = $request->file('product_image');
            $path = $image->store('public/image/products');
            $validated['product_image'] = Storage::url($path);
        } else {
            $validated['product_image'] = $product->product_image;
        }

        // Langsung update tanpa ubah kategori jadi array
        $product->update($validated);

        return redirect()->route('admin.manage.product')->with('success', 'Product Berhasil Terupdated!');
    }

    public function index(Request $request)
    {

        $search = $request->input('searchBox', '');
        $category = $request->input('category', '');

        // Panggil prosedur
        $rawProducts = DB::select("CALL SearchAndFilterProducts(?, ?)", [$search, $category]);

        // Konversi hasil ke Collection lalu mapping
        // dd([$search, $category, $rawProducts]);

        $mappedProducts = collect($rawProducts)->map(function ($item) {
            return [
                'product_id' => $item->product_id,
                'product_name' => $item->product_name,
                'product_category' => explode(',', $item->product_category),
                'product_price' => $item->product_price,
                'product_stock' => $item->product_stock,
                'product_min_order' => $item->product_min_order,
            ];
        });

        // Manual pagination dari collection
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;
        $currentPageItems = $mappedProducts->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $products = new LengthAwarePaginator(
            $currentPageItems,
            $mappedProducts->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
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

        $product->update($validated);

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
