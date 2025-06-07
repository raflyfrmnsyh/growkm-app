<x-layouts.admin.admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <body class="bg-gray-100 flex flex-row justify-center items-start w-full h-full  relative">


        <x-partials.admin.admin-sidebar></x-partials.admin.admin-sidebar>

        <main class="w-full lg:w-[80%] lg:left-[20%] absolute ">
            {{-- Mobile Header --}}
            <x-partials.admin.mobile-header></x-partials.admin.mobile-header>

            {{-- Desktop Header --}}
            <x-partials.admin.desk-header></x-partials.admin.desk-header>


            <section class="section_content flex flex-col items-start gap-4 mx-8 py-[112px]">

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

                <div class="card-list w-full flex items-center justify-between gap-4 flex-wrap">
                    {{-- card analytics --}}
                    @foreach ($data as $item)
                        <div class="card-analytics flex flex-col gap-2 w-[32%] bg-white rounded-lg p-6">
                            {{-- icon --}}
                            <div class="card-icon w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                <x-icons.user-group class="size-6 stroke-gray-900"></x-icons.user-group>
                            </div>
                            <div class="card-body">
                                <span>{{ $item['title'] }}</span>
                                <h2 class="text-3xl font-bold">{{ $item['count'] }}</h2>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="top-5-list w-full flex items-center justify-between gap-4 flex-wrap">
                    <div class="card w-[49%] bg-white rounded-lg p-6">
                        <h3 class="text-xl font-semibold mb-4">Top 5 Product</h3>

                        <ul class="lists">
                            @for ($i = 0; $i < 5; $i++)
                                <div class="lists-item py-4 flex items-center gap-4 w-full">
                                    <div
                                        class="badge w-8 h-8 bg-secondaryColors-50 text-white rounded-md flex items-center justify-center">
                                        {{ $i + 1 }}
                                    </div>
                                    <div class="flex items-center gap-4 justify-between w-full">
                                        <h2 class="text-lg font-semibold">Nama Produk</h2>
                                        <div class="flex items-center gap-1">
                                            <h2 class="text-xl font-semibold">100</h2>
                                            <sub>/ total terjual</sub>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </ul>
                    </div>
                    <div class="card w-[49%] bg-white rounded-lg p-6">
                        <h3 class="text-xl font-semibold">Top 5 Event & Kelas</h3>
                    </div>
                </div>


            </section>



        </main>
    </body>


</x-layouts.admin.admin-layout>
