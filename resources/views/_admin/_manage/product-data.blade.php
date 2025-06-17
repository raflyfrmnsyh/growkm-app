<x-layouts.admin.admin-layout>

    <x-slot:title> {{ $title }}</x-slot:title>

    <div
        class="p-6 bg-white w-full gap-8 rounded-t-md flex lg:flex-row flex-col items-center justify-between border-b border-gray-200">
        <h1 class="font-semibold text-lg">Kelola Data Produk</h1>

        <div class="flex flex-col md:flex-row items-center gap-4 w-full lg:w-auto justify-between lg:justify-end">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    {{-- Form pencarian produk --}}
                    <form action="{{ route('admin.manage.product') }}" method="get" class="flex items-center gap-4">
                        {{-- Input pencarian --}}
                        <div class="input-bx border border-gray-200 py-2 px-4 rounded-md w-[320px] flex items-center justify-between gap-2">
                            <input type="text" name="searchBox" id="searchBox" placeholder="Cari produk" class="outline-none w-full" value="{{ request('searchBox') }}"> {{-- Menampilkan nilai pencarian sebelumnya --}}
                            <button type="submit" class="bg-transparent border-none p-0 m-0 cursor-pointer">
                                <x-icons.searach-01 class="size-5 stroke-gray-200"></x-icons.searach-01>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="flex gap-4">
                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <div>
                        <button type="button" @click="open = !open"
                            class="inline-flex w-full items-center justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-md font-semibold text-gray-800 border border-gray-200 hover:bg-gray-50"
                            id="menu-button" aria-expanded="true" aria-haspopup="true">
                            Semua Kategori
                            <x-icons.arrow-down class="stroke-dark-base size-5"></x-icons.arrow-down>
                        </button>
                    </div>

                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-[164px] origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
                        style="display: none;">
                        <div class="py-1" role="none">
                            {{-- Tautan untuk menampilkan semua kategori. Tidak ada parameter 'category' yang dikirim. --}}
                            <a href="{{ route('admin.manage.product') }}"
                                class="block px-4 py-3 text-md text-secondaryColors-base bg-secondaryColors-10 hover:bg-gray-50 hover:text-gray-800 active"
                                role="menuitem" tabindex="-1" id="menu-item-0">Semua Kategori</a>
                            {{-- Tautan untuk memfilter produk berdasarkan kategori 'Elektronik'. --}}
                            <a href="{{ route('admin.manage.product', ['category' => 'Elektronik']) }}"
                                class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                role="menuitem" tabindex="-1" id="menu-item-1">Elektronik</a>
                            {{-- Tautan untuk memfilter produk berdasarkan kategori 'Fashion'. --}}
                            <a href="{{ route('admin.manage.product', ['category' => 'Fashion']) }}"
                                class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                role="menuitem" tabindex="-1" id="menu-item-2">Fashion</a>
                            {{-- Tautan untuk memfilter produk berdasarkan kategori 'Makanan'. --}}
                            <a href="{{ route('admin.manage.product', ['category' => 'Makanan']) }}"
                                class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                role="menuitem" tabindex="-1" id="menu-item-3">Makanan</a>
                            {{-- Tautan untuk memfilter produk berdasarkan kategori 'Kesehatan'. --}}
                            <a href="{{ route('admin.manage.product', ['category' => 'Kesehatan']) }}"
                                class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                role="menuitem" tabindex="-1" id="menu-item-4">Kesehatan</a>
                            {{-- Tautan untuk memfilter produk berdasarkan kategori 'Olahraga'. --}}
                            <a href="{{ route('admin.manage.product', ['category' => 'Olahraga']) }}"
                                class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                role="menuitem" tabindex="-1" id="menu-item-5">Olahraga</a>
                        </div>
                    </div>
                </div>

                <a href="{{ route('admin.manage.product.add') }}"
                    class="inline-flex px-4 py-2 text-md font-semibold rounded-md border border-gray-200 bg-secondaryColors-base text-white hover:bg-secondaryColors-60 transition-all">Tambah
                    Data</a>
            </div>

        </div>
    </div>

    <div class="overflow-x-auto w-full">
        <table class="w-full bg-white text-left min-w-[80%]">
            <thead class="text-sm uppercase bg-gray-50">
                <tr>
                    <th class="py-4 px-2 w-12 h-12 text-center">#</th>
                    <th class="py-4 px-2">Product ID</th>
                    <th class="py-4 px-2">Nama Produk</th>
                    <th class="py-4 px-2">Kategori</th>
                    <th class="py-4 px-2 text-start">Stok</th>
                    <th class="py-4 px-2 text-center">Harga</th>
                    <th class="py-4 px-2 text-center">Status</th>
                    <th class="text-center p-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                    <tr class="border-b border-gray-200">
                        <td class="text-center gap-2 px-6">{{ $index + 1 }}</td>
                        <td class="py-4 px-2">{{ $product->product_id }}</td>
                        <td class="py-4 px-2">
                            <div class="flex flex-col">
                                <span class="font-medium">{{ $product->product_name }}</span>
                                <span class="text-sm text-gray-500">
                                    Min. Order: {{ $product->product_min_order }}
                                </span>
                            </div>
                        </td>
                        <td class="py-4 px-2">
                            @php
                                $categories = json_decode($product->product_category);
                            @endphp
                            @foreach($categories as $category)
                                <span class="inline-block bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded mr-1 mb-1">{{ $category }}</span>
                            @endforeach
                        </td>
                        <td class="py-4 px-2 text-start">{{ $product->product_stock }}</td>
                        <td class="py-4 px-2 text-end">
                            Rp. {{ number_format($product->product_price, 0, ',', '.') }}
                        </td>
                        <td class="py-4 px-2 text-center">
                            @if($product->product_stock > 10)
                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Tersedia</span>
                            @elseif($product->product_stock > 0)
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Hampir Habis</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Habis</span>
                            @endif
                        </td>
                        <td class="w-full py-4 flex items-center justify-center gap-2 px-6">
                                 <a href="{{ route('admin.manage.product.detail', $product->product_id) }}" 
                                 class="bg-secondaryColors-10 flex items-center justify-center w-auto gap-2 px-2 h-8 rounded-md hover:bg-secondaryColors-20">
                                <x-icons.eye-01 class="size-5 stroke-secondaryColors-base"></x-icons.eye-01>
                            </a>

                            <form id="delete-product-form-{{ $product->product_id }}" action="{{ route('admin.manage.product.delete', $product->product_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="bg-red-100 flex items-center justify-center w-auto gap-2 px-2 h-8 rounded-md hover:bg-red-200"
                                    data-product-id="{{ $product->product_id }}"
                                    onclick="confirmDelete(this)">
                                    <x-icons.delete-01 class="size-5 stroke-red-500"></x-icons.delete-01>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-6">
                            <div class="flex flex-col items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-gray-600">Belum ada produk yang tersedia</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="p-6 bg-white w-full rounded-b-lg flex items-center justify-between">
        <span>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} entries</span>

        {{-- Pagination --}}
        @if ($products->hasPages())
        <ul class="flex justify-center gap-1 text-gray-900">
            {{-- Previous Page Link --}}
            @if ($products->onFirstPage())
                <li>
                    <span class="grid size-8 place-content-center rounded border border-gray-200 opacity-50 cursor-not-allowed">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $products->previousPageUrl() }}"
                    class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50 rtl:rotate-180"
                    aria-label="Halaman sebelumnya">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                @if ($page == $products->currentPage())
                    <li>
                        <span class="block size-8 rounded border border-secondaryColors-base bg-secondaryColors-base text-center text-sm/8 font-medium text-white">
                            {{ $page }}
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $url }}"
                        class="block size-8 rounded border border-gray-200 text-center text-sm/8 font-medium transition-colors hover:bg-gray-50">
                            {{ $page }}
                        </a>
                    </li>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($products->hasMorePages())
                <li>
                    <a href="{{ $products->nextPageUrl() }}"
                    class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50 rtl:rotate-180"
                    aria-label="Halaman berikutnya">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </li>
            @else
                <li>
                    <span class="grid size-8 place-content-center rounded border border-gray-200 opacity-50 cursor-not-allowed">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </li>
            @endif
        </ul>
        @endif
    </div>
</x-layouts.admin.admin-layout>

<script>
function confirmDelete(button) {
    if (confirm('Apakah Anda yakin ingin menghapus product ini?')) {
        const productId = button.dataset.productId;
        console.log('Attempting to delete product with ID:', productId);
        const form = document.getElementById(`delete-product-form-${productId}`);
        if (form) {
            form.submit();
        }
    }
}
</script>
