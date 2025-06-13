<x-layouts.admin.admin-layout>

    <x-slot:title> {{ $title }}</x-slot:title>

    <div
        class="p-6 bg-white w-full gap-8 rounded-t-md flex lg:flex-row flex-col items-center justify-between border-b border-gray-200">
        <h1 class="font-semibold text-lg">Kelola Data Event & Kelas</h1>

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

            <div>
                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <div>
                        <button type="button" @click="open = !open"
                            class="inline-flex w-full items-center justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-md font-semibold text-gray-800 border border-gray-200 hover:bg-gray-50"
                            id="menu-button" aria-expanded="true" aria-haspopup="true">
                            Semua Role
                            <x-icons.arrow-down class="stroke-dark-base size-5"></x-icons.arrow-down>
                        </button>
                    </div>

                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-[164px] origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
                        style="display: none;">
                        <div class="py-1" role="none">
                            <a href="#"
                                class="block px-4 py-3 text-md text-secondaryColors-base bg-secondaryColors-10 hover:bg-gray-50 hover:text-gray-800 active"
                                role="menuitem" tabindex="-1" id="menu-item-0">Semua Role</a>
                            <a href="#"
                                class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                role="menuitem" tabindex="-1" id="menu-item-1">Super Admin</a>
                            <a href="#"
                                class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                role="menuitem" tabindex="-1" id="menu-item-2">Event Admin</a>
                            <a href="#"
                                class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                role="menuitem" tabindex="-1" id="menu-item-3">Product Admin</a>
                        </div>
                    </div>
                </div>

                <a href="{{ url('admin/manage/event/detail') }}"
                    class="inline-flex px-4 py-2 text-md font-semibold rounded-md border border-gray-200 bg-secondaryColors-base text-white hover:bg-secondaryColors-60 transition-all">Tambah
                    Data</a>
            </div>

        </div>
    </div>

    <div class="overflow-x-auto w-full">
        <table class="w-full bg-white text-left min-w-[80%]">
            <thead class="text-sm uppercase bg-gray-50">
                <tr>
                    <th class="py-4 px-2 w-12 h-12 text-center">#</th>
                    <th class="py-4 px-2">Event ID</th>
                    <th class="py-4 px-2">Nama Event & Kelas</th>
                    <th class="py-4 px-2">Kategori</th>
                    <th class="py-4 px-2 text-start">Kuota</th>
                    <th class="py-4 px-2 text-center">Harga</th>
                    <th class="py-4 px-2 text-center">Status</th>
                    <th class="text-center p-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 10; $i++)
                    <tr class="border-b border-gray-200">
                        <td class="text-center gap-2 px-6">{{ $i + 1 }}</td>
                        <td class="py-4 px-2">{{ '#TRXEVT00' . $i + 1 }}</td>
                        <td class="py-4 px-2">07/06/25 - 22:35</td>
                        <td class="py-4 px-2">Jhon dae</td>
                        <td class="py-4 px-2 text-start">100</td>
                        <td class="py-4 px-2 text-end">Rp. 80.000</td>
                        <td class="py-4 px-2 text-center">Hampir Habis</td>
                        <td class="w-full py-4 flex items-center justify-center gap-2 px-6">
                            <a href="{{ url('#') }}"
                                class="bg-secondaryColors-10 flex items-center justify-center w-auto gap-2 px-2 h-8 rounded-md hover:bg-secondaryColors-20">
                                <x-icons.eye-01 class="size-5 stroke-secondaryColors-base "></x-icons.eye-01>
                            </a>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <div class="p-6 bg-white w-full rounded-b-lg flex items-center justify-between">
        <span>Showing 1 to 10 of 57 entries</span>

        {{-- Pagination --}}
    </div>
</x-layouts.admin.admin-layout>
