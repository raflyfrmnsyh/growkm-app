<html>
<x-partials.head-info>
    <x-slot:title>{{ $title }}</x-slot:title>
</x-partials.head-info>

<body class="bg-gray-50">
    <x-partials.dashboard.sidebar></x-partials.dashboard.sidebar>

    <main class="w-full lg:w-[80%] lg:left-[20%] absolute">
        <x-partials.dashboard.mobile-header></x-partials.dashboard.mobile-header>
        <x-partials.dashboard.desktop-header></x-partials.dashboard.desktop-header>

        <section class="px-6 py-24">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white rounded-2xl shadow-sm p-8">
                    <!-- Header -->
                    <div class="flex flex-col items-center justify-center mb-8 pb-6 border-b border-gray-100">
                        <h1 class="text-xl font-medium text-gray-900 mb-4">Detail Produk</h1>
                        <!-- Breadcrumb -->
                        <div class="flex items-center gap-2 text-sm text-gray-500">
                            <a href="#" class="hover:text-[#007F73] transition-colors">Fashion Muslim</a>
                            <span>/</span>
                            <a href="#" class="hover:text-[#007F73] transition-colors">Pakaian Muslim Pria</a>
                            <span>/</span>
                            <span class="text-gray-700">Baju Koko Pria</span>
                        </div>
                    </div>



                    <!-- Product Content -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                        <!-- Product Image -->
                        <div class="flex justify-center">
                            <div class="relative group">
                                <img src="{{ asset('image/product.png') }}" alt="Main Product Image"
                                    class="w-[400px] h-[400px] object-cover rounded-xl shadow-sm transition-transform group-hover:scale-[1.02]">
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="space-y-8">
                            <div>
                                <h1 class="text-2xl font-semibold text-gray-900 mb-2">MOSQU Baju Koko Pria Dewasa Model
                                    Akhtar</h1>
                                <div class="text-3xl font-bold text-[#007F73]">Rp 100.000 - 250.000</div>
                            </div>

                            <div class="space-y-4">
                                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                    <span class="text-gray-600">Stok Tersedia</span>
                                    <span class="font-medium">1.000 unit</span>
                                </div>
                                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                    <span class="text-gray-600">Kategori</span>
                                    <span class="text-[#007F73]">Fashion Muslim, Pakaian Muslim Pria, Baju Koko
                                        Pria</span>
                                </div>
                                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                    <span class="text-gray-600">Minimal Pembelian</span>
                                    <span class="font-medium">5 unit</span>
                                </div>
                            </div>
                            <a href="{{ route('create.order.product', ['id' => $id]) }}"
                                class="w-full bg-[#007F73] text-white py-3.5 rounded-xl font-medium hover:bg-[#006A5F] transition-all duration-200 shadow-sm hover:shadow-md flex items-center justify-center gap-2 group">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 group-hover:scale-110 transition-transform" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Beli Sekarang
                            </a>
                        </div>
                    </div>

                    <!-- Product Description -->
                    <div class="mt-12 pt-8 border-t border-gray-100">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Deskripsi Produk</h3>
                        <div class="prose prose-gray max-w-none">
                            <p class="text-gray-600 leading-relaxed">
                                NOTED !!!<br>
                                PASANG HARGA DI MARKETPLACE : Rp 107.500
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
