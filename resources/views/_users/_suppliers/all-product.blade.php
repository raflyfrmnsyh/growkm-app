<html>
<x-partials.head-info>
    <x-slot:title>{{ $title }}</x-slot:title>
</x-partials.head-info>

<body class="bg-gray-50">
    <x-partials.dashboard.sidebar></x-partials.dashboard.sidebar>

    <main class="w-full lg:w-[80%] lg:left-[20%] absolute">
        {{-- Mobile Header --}}
        <x-partials.dashboard.mobile-header></x-partials.dashboard.mobile-header>
        {{-- Desktop Header --}}
        <x-partials.dashboard.desktop-header></x-partials.dashboard.desktop-header>

        <section class="section_content mx-8 py-[112px]">
            <div class="max-w-7xl mx-auto">
                {{-- Header Section --}}
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
                        <h1 class="text-2xl font-bold text-gray-900">Semua Produk</h1>

                        <div class="flex flex-col lg:flex-row items-center gap-4 w-full lg:w-auto">
                            {{-- Search Form --}}
                            <form action="{{ route('product.list') }}" method="get" class="w-full lg:w-auto m-0 p-0">
                                <div class="relative">
                                    <input type="text" name="searchBox" id="searchBox" placeholder="Cari produk..."
                                        value="{{ request('searchBox') }}"
                                        class="w-full lg:w-[400px] pl-4 pr-12 py-3 rounded-lg border border-gray-200 focus:border-secondaryColors-base focus:ring-2 focus:ring-secondaryColors-base/20 outline-none transition-all">
                                    <x-icons.searach-01
                                        class="absolute right-4 top-1/2 -translate-y-1/2 size-5 stroke-gray-400"></x-icons.searach-01>
                                </div>
                            </form>

                            {{-- Filter Dropdown --}}
                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                <div>
                                    <button type="button" @click="open = !open"
                                        class="inline-flex w-full items-center justify-center gap-x-1.5 rounded-md bg-white px-3 py-3 text-md font-semibold text-gray-800 border border-gray-200 hover:bg-gray-50"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        Semua Kategori
                                        <x-icons.arrow-down class="stroke-dark-base size-5"></x-icons.arrow-down>
                                    </button>
                                </div>

                                <div x-show="open" @click.away="open = false"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute z-30 right-0 mt-2 w-[164px] origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1" style="display: none;">
                                    <div class="py-1" role="none">
                                        {{-- Tautan untuk menampilkan semua kategori. Tidak ada parameter 'category' yang dikirim. --}}
                                        {{-- Semua Kategori --}}
                                        <a href="{{ route('product.list', ['searchBox' => request('searchBox')]) }}"
                                            class="block px-4 py-3 text-md text-secondaryColors-base bg-secondaryColors-10 hover:bg-gray-50 hover:text-gray-800 active"
                                            role="menuitem" tabindex="-1" id="menu-item-0">Semua Kategori</a>

                                        {{-- Elektronik --}}
                                        <a href="{{ route('product.list', ['category' => 'Elektronik', 'searchBox' => request('searchBox')]) }}"
                                            class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                            role="menuitem" tabindex="-1" id="menu-item-1">Elektronik</a>

                                        {{-- Fashion --}}
                                        <a href="{{ route('product.list', ['category' => 'Fashion', 'searchBox' => request('searchBox')]) }}"
                                            class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                            role="menuitem" tabindex="-1" id="menu-item-2">Fashion</a>

                                        {{-- Makanan --}}
                                        <a href="{{ route('product.list', ['category' => 'Makanan', 'searchBox' => request('searchBox')]) }}"
                                            class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                            role="menuitem" tabindex="-1" id="menu-item-3">Makanan</a>

                                        {{-- Kesehatan --}}
                                        <a href="{{ route('product.list', ['category' => 'Kesehatan', 'searchBox' => request('searchBox')]) }}"
                                            class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                            role="menuitem" tabindex="-1" id="menu-item-4">Kesehatan</a>

                                        {{-- Olahraga --}}
                                        <a href="{{ route('product.list', ['category' => 'Olahraga', 'searchBox' => request('searchBox')]) }}"
                                            class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                            role="menuitem" tabindex="-1" id="menu-item-5">Olahraga</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Products Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @forelse ($data as $product)
                        <div
                            class="bg-white rounded-lg shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden group">
                            {{-- Product Image --}}
                            <div class="relative aspect-square overflow-hidden">
                                <img src="{{ asset($product['product_image']) }}" alt="{{ $product['product_name'] }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>

                            {{-- Product Info --}}
                            <div class="p-4">
                                <a href="{{ route('products.details', ['id' => $product['product_id']]) }}"
                                    class="block">
                                    <h3
                                        class="text-lg font-semibold text-gray-900 line-clamp-2 mb-2 group-hover:text-secondaryColors-base transition-colors">
                                        {{ $product['product_name'] }}
                                    </h3>
                                </a>

                                <div class="space-y-2">
                                    <div>
                                        <p class="text-sm text-gray-500">Harga Beli</p>
                                        <p class="text-lg font-bold text-gray-900">Rp
                                            {{ number_format($product['product_price']) }}</p>
                                    </div>

                                    <div>
                                        <p class="text-sm text-gray-500">Rekomendasi Harga Jual</p>
                                        <p class="text-lg font-bold text-secondaryColors-base">Rp
                                            {{ number_format($product['product_sell']) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full">
                            <div class="bg-white rounded-lg shadow-sm p-8 text-center">
                                <p class="text-gray-500 text-lg">Belum ada produk yang tersedia</p>
                            </div>
                        </div>
                    @endforelse
                </div>

                {{-- Pagination --}}
                @if ($data->hasPages())
                    <div class="mt-6">
                        {{ $data->links() }}
                    </div>
                @endif
            </div>
        </section>
    </main>
</body>

</html>
