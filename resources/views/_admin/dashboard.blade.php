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
                    <div class="card w-[49%] bg-white rounded-lg cursor-pointer">
                        <div class="pb-6 border-b border-gray-200 px-6 pt-6 flex items-center justify-between">
                            <h3 class="text-xl font-semibold">Top 5 Product</h3>

                            <span class="text-gray-600">Minggu ini</span>
                        </div>

                        <table class="w-full text-sm text-left">
                            <thead class="text-sm uppercase bg-gray-50">
                                <tr>
                                    <th class="text-center py-3 px-3">
                                        Rank
                                    </th>
                                    <th class="text-start py-3 px-3 w-[40%]">
                                        Product Name
                                    </th>
                                    <th class="text-start py-3 px-3">
                                        Kategori
                                    </th>
                                    <th class="text-center py-3 px-3 ">
                                        Total Sale
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-md">
                                @for ($i = 0; $i < 5; $i++)
                                    <tr
                                        class="{{ $i < 4 ? 'border-b border-gray-100' : '' }} {{ in_array($i + 1, [2, 4]) ? 'bg-gray-50' : '' }} {{ $i == 4 ? 'rounded-b-md' : '' }}">
                                        <td class="py-3 px-3 text-center {{ $i == 4 ? 'rounded-bl-md' : '' }}">
                                            {{ $i + 1 }}
                                        </td>
                                        <td class="py-3 px-3 text-start">
                                            Nama Product
                                        </td>
                                        <td class="py-3 px-3 text-start">
                                            Nama Kategori
                                        </td>
                                        <td class="py-3 px-3 text-start {{ $i == 4 ? 'rounded-br-md' : '' }}">
                                            Rp. 50.000
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>


                    </div>
                    <div class="card w-[49%] bg-white rounded-lg cursor-pointer">
                        <div class="pb-6 border-b border-gray-200 px-6 pt-6 flex items-center justify-between">
                            <h3 class="text-xl font-semibold">Top 5 Event & Kelas</h3>

                            <span class="text-gray-600">Minggu ini</span>
                        </div>

                        <table class="w-full text-sm text-left">
                            <thead class="text-sm uppercase bg-gray-50">
                                <tr>
                                    <th class="text-center py-3 px-3">
                                        Rank
                                    </th>
                                    <th class="text-start py-3 px-3 w-[40%]">
                                        Product Name
                                    </th>
                                    <th class="text-start py-3 px-3">
                                        Kategori
                                    </th>
                                    <th class="text-center py-3 px-3 ">
                                        Total Sale
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-md">
                                @for ($i = 0; $i < 5; $i++)
                                    <tr
                                        class="{{ $i < 4 ? 'border-b border-gray-100' : '' }} {{ in_array($i + 1, [2, 4]) ? 'bg-gray-50' : '' }} {{ $i == 4 ? 'rounded-b-md' : '' }}">
                                        <td class="py-3 px-3 text-center {{ $i == 4 ? 'rounded-bl-md' : '' }}">
                                            {{ $i + 1 }}
                                        </td>
                                        <td class="py-3 px-3 text-start">
                                            Nama Product
                                        </td>
                                        <td class="py-3 px-3 text-start">
                                            Nama Kategori
                                        </td>
                                        <td class="py-3 px-3 text-start {{ $i == 4 ? 'rounded-br-md' : '' }}">
                                            Rp. 50.000
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>


                    </div>

                </div>


            </section>



        </main>
    </body>


</x-layouts.admin.admin-layout>
