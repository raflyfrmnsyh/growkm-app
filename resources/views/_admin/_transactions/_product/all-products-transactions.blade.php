<x-layouts.admin.admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="py-4 px-6 bg-white w-full gap-8 rounded-t-md flex lg:flex-row flex-col items-center justify-between ">
        <h1 class="font-semibold text-lg w-auto text-center lg:text-start">Data Transaksi Product</h1>

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

            <div x-data="{ open: false }" class="relative inline-block text-left">
                <div>
                    <button type="button" @click="open = !open"
                        class="inline-flex w-full items-center justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-md font-semibold text-gray-800 border border-gray-200 hover:bg-gray-50"
                        id="menu-button" aria-expanded="true" aria-haspopup="true">
                        Semua waktu
                        <x-icons.arrow-down class="stroke-dark-base size-5"></x-icons.arrow-down>
                    </button>
                </div>

                <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-full origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
                    style="display: none;">
                    <div class="py-1" role="none">

                        <a href="#"
                            class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                            role="menuitem" tabindex="-1" id="menu-item-1">Hari ini</a>
                        <a href="#"
                            class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                            role="menuitem" tabindex="-1" id="menu-item-1">Mingguan</a>
                        <a href="#"
                            class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                            role="menuitem" tabindex="-1" id="menu-item-2">Bulanan</a>
                        <a href="#"
                            class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                            role="menuitem" tabindex="-1" id="menu-item-3">Tahunan</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="bg-white w-full flex gap-4 border-b border-gray-200 ">
        <a href="{{ url('#') }}"
            class="p-4 font-semibold border-b-4 border-secondaryColors-base text-secondaryColors-base hover:text-secondaryColors-60 hover:border-secondaryColors-50">Semua
            transaksi</a>
        <a href="{{ url('#') }}" class="p-4 font-normal hover:opacity-75">Transaksi Masuk</a>
        <a href="{{ url('#') }}" class="p-4 font-normal hover:opacity-75">Diproses</a>
        <a href="{{ url('#') }}" class="p-4 font-normal hover:opacity-75">Selesai</a>
    </div>

    <div class="overflow-x-auto w-full">
        <table class="w-full bg-white text-left min-w-[800px]">
            <thead class="text-sm uppercase bg-gray-50">
                <tr>
                    <th class="py-4 px-2 w-12 h-12 text-center">#</th>
                    <th class="py-4 px-2">Transaction ID</th>
                    <th class="py-4 px-2">Created At</th>
                    <th class="py-4 px-2">Nama Pelanggan</th>
                    <th class="py-4 px-2">Alamat pengiriman</th>
                    <th class="py-4 px-2">Total Payment</th>
                    <th class="py-4 px-2 text-center">Payment status</th>
                    <th class="text-center p-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item => $data)
                    <tr class="border-b border-gray-200">
                        <td class="text-center"></td>
                        <td class="py-4 px-2">{{ '#' . $data['id'] }}</td>
                        <td class="py-4 px-2">{{ $data['tanggal_masuk'] }}</td>
                        <td class="py-4 px-2">{{ $data['customer_name'] }}</td>
                        <td class="py-4 px-2">{{ $data['customer_address'] }}</td>
                        <td class="py-4 px-2 text-center">{{ 'Rp.' . $data['total'] }}</td>
                        <td class="py-4 px-2 text-center">{{ $data['status'] }}</td>
                        <td class="w-full py-4 flex items-center justify-center gap-2 px-6">
                            <a href="{{ route('admin.transaction-product-detail', 3) }}"
                                class="bg-secondaryColors-10 flex items-center justify-center w-8 h-8 rounded-md hover:bg-secondaryColors-20">
                                <x-icons.eye-01 class="size-5 stroke-secondaryColors-base "></x-icons.eye-01>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-6 bg-white w-full rounded-b-lg flex items-center justify-between">
        <span>Showing 1 to 10 of 57 entries</span>
    </div>


    {{-- Pagination --}}
</x-layouts.admin.admin-layout>
