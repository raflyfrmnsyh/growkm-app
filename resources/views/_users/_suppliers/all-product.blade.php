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
                            <form action="#" method="get" class="w-full lg:w-auto m-0 p-0">
                                @csrf
                                <div class="relative">
                                    <input type="text" name="searchBox" id="searchBox" placeholder="Cari produk..."
                                        class="w-full lg:w-[400px] pl-4 pr-12 py-3 rounded-lg border border-gray-200 focus:border-secondaryColors-base focus:ring-2 focus:ring-secondaryColors-base/20 outline-none transition-all">
                                    <x-icons.searach-01
                                        class="absolute right-4 top-1/2 -translate-y-1/2 size-5 stroke-gray-400"></x-icons.searach-01>
                                </div>
                            </form>

                            {{-- Filter Dropdown --}}
                            <div x-data="{ open: false }" class="relative">
                                <button type="button" @click="open = !open"
                                    class="inline-flex items-center justify-center gap-2 px-4 py-3 rounded-lg border border-gray-200 hover:bg-gray-50 transition-colors">
                                    <span class="text-gray-700">Filter Kategori</span>
                                    <x-icons.arrow-down class="size-5 stroke-gray-400"></x-icons.arrow-down>
                                </button>

                                <div x-show="open" @click.away="open = false"
                                    class="absolute right-0 mt-2 w-64 rounded-xl bg-white shadow-lg border border-gray-100 p-4 z-10">
                                    <div class="space-y-3">
                                        <div class="flex items-center gap-2">
                                            <input type="checkbox" id="elektronik"
                                                class="w-6 h-6 rounded-lg border-gray-200 text-secondaryColors-base focus:ring-secondaryColors-base checked:bg-secondaryColors-base">
                                            <label for="elektronik" class="text-gray-700">Elektronik</label>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <input type="checkbox" id="fashion"
                                                class="w-6 h-6 rounded-lg border-gray-200 text-secondaryColors-base focus:ring-secondaryColors-base checked:bg-secondaryColors-base">
                                            <label for="fashion" class="text-gray-700">Fashion</label>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <input type="checkbox" id="makanan"
                                                class="w-6 h-6 rounded-lg border-gray-200 text-secondaryColors-base focus:ring-secondaryColors-base checked:bg-secondaryColors-base">
                                            <label for="makanan" class="text-gray-700">Makanan</label>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <input type="checkbox" id="minuman"
                                                class="w-6 h-6 rounded-lg border-gray-200 text-secondaryColors-base focus:ring-secondaryColors-base checked:bg-secondaryColors-base">
                                            <label for="minuman" class="text-gray-700">Minuman</label>
                                        </div>
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
