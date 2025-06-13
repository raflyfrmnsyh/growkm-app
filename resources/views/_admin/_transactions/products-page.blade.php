<x-layouts.admin.admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>



    <div
        class="p-6 bg-white w-full gap-8 rounded-t-md flex lg:flex-row flex-col items-center justify-between border-b border-gray-200">
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

            <div>
                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <div>
                        <button type="button" @click="open = !open"
                            class="inline-flex w-full items-center justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-md font-semibold text-gray-800 border border-gray-200 hover:bg-gray-50"
                            id="menu-button" aria-expanded="true" aria-haspopup="true">
                            Pesanan Masuk
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
                                role="menuitem" tabindex="-1" id="menu-item-1">Semua Status</a>
                            <a href="#"
                                class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                role="menuitem" tabindex="-1" id="menu-item-1">Pesanan Masuk</a>
                            <a href="#"
                                class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                role="menuitem" tabindex="-1" id="menu-item-2">Pesanan Diprosess</a>
                            <a href="#"
                                class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                role="menuitem" tabindex="-1" id="menu-item-3">Selesai</a>
                        </div>
                    </div>
                </div>

                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <div>
                        <button type="button" @click="open = !open"
                            class="inline-flex w-full items-center justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-md font-semibold text-gray-800 border border-gray-200 hover:bg-gray-50"
                            id="menu-button" aria-expanded="true" aria-haspopup="true">
                            Hari ini
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
    </div>

    <div class="overflow-x-auto w-full">
        <table class="w-full bg-white text-left min-w-[800px]">
            <thead class="text-sm uppercase bg-gray-50">
                <tr>
                    <th class="py-4 px-2 w-12 h-12 text-center">#</th>
                    <th class="py-4 px-2">Transaction ID</th>
                    <th class="py-4 px-2">Created At</th>
                    <th class="py-4 px-2">Nama Pelanggan</th>
                    <th class="py-4 px-2">Deskripsi Pesanan</th>
                    <th class="py-4 px-2">Total Payment</th>
                    <th class="py-4 px-2 text-center">Payment status</th>
                    <th class="text-center p-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 10; $i++)
                    <tr class="border-b border-gray-200">
                        <td class="text-center">{{ $i + 1 }}</td>
                        <td class="py-4 px-2">{{ '#TRXPRT00' . $i + 1 }}</td>
                        <td class="py-4 px-2">07/06/25 - 22:35</td>
                        <td class="py-4 px-2">Jhon dae</td>
                        <td class="py-4 px-2">Bisnis Digital with Growkm</td>
                        <td class="py-4 px-2 text-center">Rp. 0</td>
                        <td class="py-4 px-2 text-center">Pesanan Masuk</td>
                        <td class="w-full py-4 flex items-center justify-center gap-2 px-6">
                            <a href="{{ url('#') }}"
                                class="bg-secondaryColors-10 flex items-center justify-center w-8 h-8 rounded-md hover:bg-secondaryColors-20">
                                <x-icons.eye-01 class="size-5 stroke-secondaryColors-base "></x-icons.eye-01>
                            </a>
                            <div x-data="{ open: false }">
                                <button
                                    @click="open = true"
                                    class="rounded-md bg-gray-950/5 px-2.5 py-1.5 text-sm font-semibold text-gray-900 hover:bg-gray-950/10">
                                    Open dialog
                                </button>

                                <!-- Modal -->
                                <template x-if="open">
                                    <div>
                                        <!-- Backdrop -->
                                        <div class="fixed inset-0 bg-gray-500/75 transition-opacity z-40" aria-hidden="true"
                                            x-show="open"
                                            x-transition:enter="ease-out duration-300"
                                            x-transition:enter-start="opacity-0"
                                            x-transition:enter-end="opacity-100"
                                            x-transition:leave="ease-in duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                        ></div>

                                        <!-- Modal panel -->
                                        <div class="fixed inset-0 z-50 w-screen overflow-y-auto">
                                            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                <div
                                                    x-show="open"
                                                    @click.away="open = false"
                                                    x-transition:enter="ease-out duration-300"
                                                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                    x-transition:leave="ease-in duration-200"
                                                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg"
                                                    role="dialog" aria-modal="true" aria-labelledby="dialog-title"
                                                >
                                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                        <div class="sm:flex sm:items-start">
                                                            <div
                                                                class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:size-10">
                                                                <svg class="size-6 text-red-600" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" aria-hidden="true"
                                                                    data-slot="icon">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                                                                </svg>
                                                            </div>
                                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                <h3 class="text-base font-semibold text-gray-900"
                                                                    id="dialog-title">Deactivate account</h3>
                                                                <div class="mt-2">
                                                                    <p class="text-sm text-gray-500">Are you sure you want
                                                                        to deactivate your account? All of your data will be
                                                                        permanently removed. This action cannot be undone.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                        <button type="button"
                                                            class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto"
                                                            @click="open = false">Deactivate</button>
                                                        <button type="button"
                                                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50 sm:mt-0 sm:w-auto"
                                                            @click="open = false">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>

                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <div class="p-6 bg-white w-full rounded-b-lg flex items-center justify-between">
        <span>Showing 1 to 10 of 57 entries</span>

    </div>
    {{-- Pagination --}}
</x-layouts.admin.admin-layout>
