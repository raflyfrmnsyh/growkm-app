<html>
<x-partials.head-info>
    {{-- This slot is for setting the title of the page --}}
    <x-slot:title>{{ $title }}</x-slot:title>
</x-partials.head-info>

<body class="bg-gray-100 flex flex-row justify-center items-start">
    {{-- Sidebar component for navigation --}}
    <x-partials.dashboard.sidebar></x-partials.dashboard.sidebar>

    {{-- Main content area, takes up 80% width on large screens and moves to the right --}}
    <main class="w-full lg:w-[80%] lg:left-[20%] absolute ">
        {{-- Mobile Header component --}}
        <x-partials.dashboard.mobile-header></x-partials.dashboard.mobile-header>
        {{-- Desktop Header component --}}
        <x-partials.dashboard.desktop-header></x-partials.dashboard.desktop-header>

        {{-- Section for the main product details content --}}
        <section class="section_content flex items-start gap-4 mx-8 py-[112px]">
            <div class="flex flex-col items-center bg-gray-100 min-h-screen py-2 w-full">
            <div class="w-full bg-white rounded-lg shadow p-8">

            <div
        class="p-6 bg-white w-full gap-8 rounded-t-md flex lg:flex-row flex-col items-center justify-between border-b border-gray-200">
        <h1 class="font-semibold text-lg">Detail Product</h1>

        <div class="flex flex-col md:flex-row items-center gap-4 w-full lg:w-auto justify-between lg:justify-end">
                <form action="#" method="get">
                    @csrf
                    <div
                        class="input-bx border border-gray-200 py-2 px-4 rounded-md w-[320px] flex items-center justify-between gap-2">
                        <input type="text" name="searchBox" id="searchBox" placeholder="Cari sesuatu"
                            class="outline-none w-full ">
                        <x-icons.searach-01 class="size-5 stroke-gray-200"></x-icons.searach-01>
                    </div>
                </form>
            </div>
        </div>

            <div class="container mx-auto px-4 py-8">
                <div class="mb-6 text-sm text-gray-500">
                    <a href="#" class="hover:text-[#007F73]">Fashion Muslim</a> >
                    <a href="#" class="hover:text-[#007F73]">Pakaian Muslim Pria</a> >
                    <a href="#" class="text-gray-700">Baju Koko Pria</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        {{-- Main Product Image --}}
                        <div class="bg-white rounded-lg shadow-md overflow-hidden relative">
                            <img src="{{ asset('image/product.png') }}" alt="Main Product Image" class="object-cover mx-auto" style="width: 300px; height: 300px;">
                        </div>                        
                    </div>

                    <div class="space-y-6">
                        {{-- Product Name and View Count --}}
                        <div>
                            <h1 class="text-3xl font-bold mb-2">MOSQU Baju Koko Pria Dewasa Model Akhtar</h1>
                        </div>

                        {{-- Product Price --}}
                        <div class="text-4xl font-bold">100.000 - 250.000</div>

                        <div class="space-y-2">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Stok</span>
                                <span>1000 unit</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Kategori</span>
                                <span class="text-[#007F73]">Fashion Muslim, Pakaian Muslim Pria, Baju Koko Pria</span>
                            </div>
                           <div class="flex justify-between items-center">
                                <span class="text-gray-600">Minimal Pembelian</span>
                                <span>5 unit</span>
                            </div>
                        </div>

                        {{-- Buy Button --}}
                        <button class="w-full bg-[#007F73] text-white py-3 rounded-md font-semibold hover:bg-[#006A5F] transition duration-200">
                            Beli
                        </button>
                    </div>
                </div>
                {{-- Product Description --}}
                <div class="border-t border-gray-200 pt-6 mt-8">
                    <h3 class="font-semibold mb-2">Deskripsi</h3>
                    <p class="text-gray-600">NOTED !!!<br>PASANG HARGA DI MARKETPLACE : 107.500</p>
                </div>
            </div>
        </div>
    </div>
        </section>
    </main>

</body>

</html>
