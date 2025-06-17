<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

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
            'product_unit' => 'required|string|max:255',
            'product_tags' => 'nullable|string|max:255',
        ]);

        // Generate product ID baru
        $lastProduct = Product::where('product_id', 'like', 'TRXPRD%')
        ->orderByRaw('CAST(SUBSTR(product_id, 7) AS UNSIGNED) DESC') // Mengurutkan berdasarkan bagian numerik ID
            ->first();

        if ($lastProduct) {
            // Ambil angka terakhir dari ID
            $lastNumber = (int) substr($lastProduct->product_id, 6); // Perhatikan indeksnya berubah menjadi 6 karena 'TRXPRD' ada 6 karakter.
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
            'product_unit' => 'required|string|max:255',
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

    /**
     * Menampilkan daftar produk dengan fitur pencarian dan filter kategori
     * Menggunakan stored procedure 'search_products' untuk efisiensi query
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Mengambil parameter pencarian dari request
        $searchTerm = $request->input('searchBox');
        $category = $request->input('category');

        // Memanggil stored procedure search_products
        // Parameter pertama: kata kunci pencarian
        // Parameter kedua: kategori yang dipilih
        $products = DB::select('CALL search_products(?, ?)', [$searchTerm, $category]);

        // Konfigurasi pagination
        $perPage = 10; // Jumlah item per halaman
        $currentPage = LengthAwarePaginator::resolveCurrentPage(); // Mendapatkan halaman saat ini
        $currentItems = array_slice($products, ($currentPage - 1) * $perPage, $perPage);

        // Membuat instance paginator untuk menangani pagination
        $products = new LengthAwarePaginator(
            $currentItems,
            count($products),
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query() // Mempertahankan parameter query (searchBox, category)
            ]
        );

        // Mengirim data ke view
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
