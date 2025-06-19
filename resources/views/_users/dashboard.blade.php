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
            <div class="stat-dash w-2/3">
                <div
                    class="stat-dash_header px-4 md:px-6 py-4 rounded-t-lg bg-[linear-gradient(90deg,_#003C43_0%,_#007F73_52.31%,_#E4C46E_100%)] w-full">
                    <h2 class="text-md font-semibold text-light-base">Dashboard</h2>
                </div>
                <div class="stat-dash_body bg-light-base p-4 md:p-6 rounded-b-lg">
                    <div class="greating">
                        <h2 class="text-xl font-semibold">Halo, Rafly Firmansyah!</h2>
                        <span class="text-sm my-2">Mulai Belajar dan aktif mengikuti event bisnis di Growkm</span>
                    </div>
                    <div class="stat-dash_main mt-6 flex flex-col sm:flex-row items-center gap-4 sm:gap-2 ">
                        <div
                            class="card-stat flex flex-col items-start xl:flex-row xl:items-center gap-4 w-full sm:w-auto">
                            <div class="icons p-2 rounded-[4px] bg-secondaryColors-10">
                                <x-icons.computer-user class="stroke-secondaryColors-base"></x-icons.computer->
                            </div>
                            <div class="card-detail">
                                <h2 class="total text-xl font-bold">{{ $event_total ?? '0' }}</h2>
                                <span class="label text-sm"> Total Kelas & Event Diikuti</span>
                            </div>
                        </div>
                        <div
                            class="card-stat flex flex-col ms-8 items-start xl:flex-row xl:items-center gap-4 w-full sm:w-auto">
                            <div class="icons p-2 rounded-[4px] bg-secondaryColors-10">
                                <x-icons.package-search class="stroke-secondaryColors-base"></x-icons.package-search>
                            </div>
                            <div class="card-detail">
                                <h2 class="total text-xl font-bold">{{ $product_transaction_total ?? '0' }}</h2>
                                <span class="label text-sm"> Total Produk transaksi</span>
                            </div>
                        </div>
                        <div
                            class="card-stat flex flex-col ms-8 items-start xl:flex-row xl:items-center gap-4 w-full sm:w-auto">
                            <div class="icons p-2 rounded-[4px] bg-secondaryColors-10">
                                <x-icons.transaction-01-icon
                                    class="stroke-secondaryColors-base"></x-icons.transaction-01-icon>
                            </div>
                            <div class="card-detail">
                                <h2 class="total text-xl font-bold">{{ $transaction_total ?? '0' }}</h2>
                                <span class="label text-sm"> Total Transaksi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>

</body>

</html>
