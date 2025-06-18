<x-layouts.admin.admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

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
        <div class="card-analytics flex flex-col gap-2 w-full lg:w-[32%] bg-white rounded-lg p-6">
            {{-- icon --}}
            <div class="card-icon w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                <x-icons.user-group class="size-6 stroke-gray-900"></x-icons.user-group>
            </div>
            <div class="card-body">
                <span>Total Cutsomer</span>
                <h2 class="text-3xl font-bold">{{ $stats['total_users'] }}</h2>
            </div>
        </div>
        <div class="card-analytics flex flex-col gap-2 w-full lg:w-[32%] bg-white rounded-lg p-6">
            {{-- icon --}}
            <div class="card-icon w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                <x-icons.user-group class="size-6 stroke-gray-900"></x-icons.user-group>
            </div>
            <div class="card-body">
                <span>Total Produk</span>
                <h2 class="text-3xl font-bold">{{ $stats['total_products'] }}</h2>
            </div>
        </div>
        <div class="card-analytics flex flex-col gap-2 w-full lg:w-[32%] bg-white rounded-lg p-6">
            {{-- icon --}}
            <div class="card-icon w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                <x-icons.user-group class="size-6 stroke-gray-900"></x-icons.user-group>
            </div>
            <div class="card-body">
                <span>Total Event Offline</span>
                <h2 class="text-3xl font-bold">{{ $stats['total_events_offline'] }}</h2>
            </div>
        </div>
        <div class="card-analytics flex flex-col gap-2 w-full lg:w-[32%] bg-white rounded-lg p-6">
            {{-- icon --}}
            <div class="card-icon w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                <x-icons.user-group class="size-6 stroke-gray-900"></x-icons.user-group>
            </div>
            <div class="card-body">
                <span>Total Event Online</span>
                <h2 class="text-3xl font-bold">{{ $stats['total_events_online'] }}</h2>
            </div>
        </div>
        <div class="card-analytics flex flex-col gap-2 w-full lg:w-[32%] bg-white rounded-lg p-6">
            {{-- icon --}}
            <div class="card-icon w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                <x-icons.user-group class="size-6 stroke-gray-900"></x-icons.user-group>
            </div>
            <div class="card-body">
                <span>Total Transaksi</span>
                <h2 class="text-3xl font-bold">{{ $stats['total_transactions'] }}</h2>
            </div>
        </div>
        <div class="card-analytics flex flex-col gap-2 w-full lg:w-[32%] bg-white rounded-lg p-6">
            {{-- icon --}}
            <div class="card-icon w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                <x-icons.user-group class="size-6 stroke-gray-900"></x-icons.user-group>
            </div>
            <div class="card-body">
                <span>Total Penghasilan</span>
                <h2 class="text-3xl font-bold">{{ $stats['total_transaction_amount'] }}</h2>
            </div>
        </div>
    </div>

    <div class="top-5-list w-full flex items-center justify-between gap-4 flex-wrap mt-4">
        <div class="card w-full lg:w-[49%] bg-white rounded-lg cursor-pointer">
            <div class="pb-6 border-b border-gray-200 px-6 pt-6 flex items-center justify-between">
                <h3 class="text-xl font-semibold">Top 5 User</h3>

                <span class="text-gray-600">Minggu ini</span>
            </div>

            <table class="w-full text-sm text-left">
                <thead class="text-sm uppercase bg-gray-50">
                    <tr>
                        <th class="text-center py-3 px-3">
                            Rank
                        </th>
                        <th class="text-start py-3 px-3 w-auto ">
                            Username
                        </th>
                        <th class="text-start py-3 px-3">
                            Email
                        </th>
                        <th class="text-center py-3 px-3 ">
                            Total Transaksi
                        </th>
                    </tr>
                </thead>
                <tbody class="text-base">
                    @foreach ($top_user as $idx => $item)
                        <tr
                            class="{{ $idx < 4 ? 'border-b border-gray-100' : '' }} {{ in_array($idx + 1, [2, 4]) ? 'bg-gray-50' : '' }} {{ $idx == 4 ? 'rounded-b-md' : '' }}">
                            <td class="py-3 px-3 text-center {{ $idx == 4 ? 'rounded-bl-md' : '' }}">
                                {{ $idx + 1 }}
                            </td>
                            <td class="py-3 px-3 text-start">
                                {{ $item['username'] }}
                            </td>
                            <td class="py-3 px-3 text-start">
                                {{ $item['email'] }}
                            </td>
                            <td class="py-3 px-3 text-end {{ $idx == 4 ? 'rounded-br-md' : '' }}">
                                {{ $item['total_transaction'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
        <div class="card w-full lg:w-[49%] bg-white rounded-lg cursor-pointer">
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
                        <th class="text-start py-3 px-3 w-auto lg:w-[40%]">
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
                <tbody class="text-base">
                    @foreach ($top_product as $idx => $item)
                        <tr
                            class="{{ $idx < 4 ? 'border-b border-gray-100' : '' }} {{ in_array($idx + 1, [2, 4]) ? 'bg-gray-50' : '' }} {{ $idx == 4 ? 'rounded-b-md' : '' }}">
                            <td class="py-3 px-3 text-center {{ $idx == 4 ? 'rounded-bl-md' : '' }}">
                                {{ $idx + 1 }}
                            </td>
                            <td class="py-3 px-3 text-start">
                                {{ $item['product_name'] }}
                            </td>
                            <td class="py-3 px-3 text-start">
                                {{ $item['product_category'] }}
                            </td>
                            <td class="py-3 px-3 text-end {{ $idx == 4 ? 'rounded-br-md' : '' }}">
                                {{ $item['total_sale'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


    </section>



    </main>
    </body>


</x-layouts.admin.admin-layout>
