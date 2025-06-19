<section class="bg-gradient-to-r from-primaryColors-base to-secondaryColors-60 py-6 px-4 md:px-16">
    <div class="container mx-auto flex flex-col md:flex-row items-start md:items-center md:justify-between gap-8 md:gap-0">
        <!-- Text -->
        <p class="text-light-base text-lg md:text-2xl font-semibold leading-[150%] text-center md:text-left max-w-[502px]">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae.
        </p>

        @php
            $data = [
                [
                    'title' => 'Total Event',
                    'icon' => 'event-icon',
                    'count' => 120,
                    'color' => 'bg-blue-100',
                ],
                [
                    'title' => 'Total Kelas',
                    'icon' => 'class-icon',
                    'count' => 45,
                    'color' => 'bg-green-100',
                ],
                [
                    'title' => 'Total Produk',
                    'icon' => 'product-icon',
                    'count' => 78,
                    'color' => 'bg-yellow-100',
                ],
                [
                    'title' => 'Total Customer',
                    'icon' => 'user-icon',
                    'count' => 500,
                    'color' => 'bg-purple-100',
                ],
                [
                    'title' => 'Total Transaksi',
                    'icon' => 'transaction-icon',
                    'count' => 300,
                    'color' => 'bg-red-100',
                ],
                [
                    'title' => 'Total Pendapatan',
                    'icon' => 'revenue-icon',
                    'count' => '$20,000',
                    'color' => 'bg-orange-100',
                ],
            ];
        @endphp

        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 w-full justify md:w-auto">
            <div class="text-center py-4">
                <h3 class="text-yellowLight-base text-3xl md:text-7xl font-bold leading-[150%]">80+</h3>
                <p class="text-light-base text-base md:text-lg">Mentor Bisnis</p>
            </div>
            <div class="text-center py-4">
                <h3 class="text-yellowLight-base text-3xl md:text-7xl font-bold leading-[150%]">400+</h3>
                <p class="text-light-base text-base md:text-lg">Mitra Supplier</p>
            </div>
            <div class="text-center py-4">
                <h3 class="text-yellowLight-base text-3xl md:text-7xl font-bold leading-[150%]">{{ $stats['total_users'] }}</h3>
                <p class="text-light-base text-base md:text-lg">Usaha Tergabung</p>
            </div>
        </div>
    </div>
</section>
