<html>
<x-partials.head-info>
    <x-slot:title>{{ $title }}</x-slot:title>
</x-partials.head-info>

<body class="bg-gray-100 flex flex-row justify-center items-start">
    <x-partials.dashboard.sidebar></x-partials.dashboard.sidebar>

    <main class="w-full lg:w-[80%] lg:left-[20%] absolute ">
        {{-- Mobile Header --}}
        <x-partials.dashboard.mobile-header></x-partials.dashboard.mobile-header>
        {{-- Desktop Header --}}
        <x-partials.dashboard.desktop-header></x-partials.dashboard.desktop-header>

        <section class="section_content flex items-start gap-4 mx-8 py-[112px]">
            <div class="flex flex-col items-center bg-gray-100 min-h-screen py-2 w-full">
            <div class="w-full bg-white rounded-lg shadow p-8">
            <div
        class="p-6 bg-white w-full gap-8 rounded-t-md flex lg:flex-row flex-col items-center justify-between border-b border-gray-200">
        <h1 class="font-semibold text-lg">Semua Produk</h1>

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
            <div class="overflow-x-auto w-full bg-white px-6 py-4 flex flex-wrap flex-rows-4 gap-y-4 gap-x-6">
                @for ($i = 0; $i < 12; $i++)
                <div class="overflow-hidden w-full sm:w-[calc(50%-12px)] md:w-[calc(33.333%-16px)] lg:w-[calc(25%-18px)] p-3 border rounded-lg shadow-sm transition hover:shadow-lg">
                    <div class="relative">
                        <img alt="" src="{{ asset('image/product.png') }}" class="w-full h-auto"/>
                    </div>

                    <div class="bg-white p-2">
                        <a href="#">
                            <h3 class="mt-0.5 text-lg text-gray-900 line-clamp-2">Baju Koko Proa Dewasa Model Akhtar</h3>
                        </a>

                        <p class="mt-1 text-sm/relaxed text-gray-500">Harga Beli</p>
                        <p class="mt-1 line-clamp-3 text-sm/relaxed text-gray-900 font-semibold">
                            Rp. 100.000
                        </p>

                        <p class="mt-1 text-sm/relaxed text-gray-500">Harga Jual</p>
                        <p class="mt-1 line-clamp-3 text-sm/relaxed text-gray-900 font-semibold">
                            Belum ditentukan supplier
                        </p>
                    </div>
                </div>
                @endfor
            </div>
            <div class="w-full bg-white p-6 rounded-b-md flex justify-center items-center mt-4">
                <nav aria-label="Pagination" class="flex justify-center items-center space-x-2">
                    <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        Previous
                    </a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        1
                    </a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        2
                    </a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        Next
                    </a>
                </nav>
            </div>
        <div>
        </section>
    </main>
</body>

</html>
