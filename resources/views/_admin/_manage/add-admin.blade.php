<x-layouts.admin.admin-layout>

    <x-slot:title> {{ $title }}</x-slot:title>

    <div
        class="p-6 bg-white w-full gap-8 rounded-t-md flex lg:flex-row flex-col items-center justify-between border-b border-gray-200">
        <h1 class="font-semibold text-lg">Add Admin</h1>

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

            </div>

        </div>
    </div>

    <div class="p-6 bg-white w-full rounded-b-lg flex justify-center">
    <div class="w-full max-w-6xl bg-white p-6 rounded-xl border border-gray-200 shadow-sm">

        <form action="#" method="POST" class="space-y-5 w-full">
            @csrf

            <!-- Nama -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama admin"
                    class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-2 shadow-sm focus:outline-none focus:ring-1 focus:ring-secondaryColors-base">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email"
                    class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-2 shadow-sm focus:outline-none focus:ring-1 focus:ring-secondaryColors-base">
            </div>

            <!-- Nomor Telepon -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">No. Telepon</label>
                <input type="text" id="phone" name="phone" placeholder="Contoh: 08123456789"
                    class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-2 shadow-sm focus:outline-none focus:ring-1 focus:ring-secondaryColors-base">
            </div>

            <!-- Role Dropdown -->
            <div x-data="{ open: false, selected: 'Pilih Role' }" class="relative  ">
                <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                <button type="button" @click="open = !open"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md flex justify-between items-center text-gray-700 bg-white">
                    <span x-text="selected"></span>
                    <x-icons.chevron-down class="w-5 h-5 stroke-gray-500" />
                </button>

                <div x-show="open" @click.away="open = false"
                    class="absolute z-10 mt-2 w-full bg-white border border-gray-300 rounded-md shadow">
                    <ul class="text-sm text-gray-700">
                        <li @click="selected = 'Super Admin'; open = false"
                            class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Super Admin</li>
                        <li @click="selected = 'Event Admin'; open = false"
                            class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Event Admin</li>
                        <li @click="selected = 'Product Admin'; open = false"
                            class="px-4 py-2 hover:bg-gray-100 cursor-pointer">Product Admin</li>
                    </ul>
                </div>
            </div>

            <!-- Password -->
            <div x-data="{ show: false }">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative">
                    <input :type="show ? 'text' : 'password'" id="password" name="password"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-2 pr-10 shadow-sm focus:outline-none focus:ring-1 focus:ring-secondaryColors-base"
                        placeholder="Minimal 8 karakter">
                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500">
                        <x-icons.eye class="w-5 h-5" x-show="!show" />
                        <x-icons.eye-off class="w-5 h-5" x-show="show" />
                    </button>
                </div>
            </div>

            <!-- Konfirmasi Password -->
            <div x-data="{ show: false }">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <div class="relative">
                    <input :type="show ? 'text' : 'password'" id="password_confirmation" name="password_confirmation"
                        class="mt-1 block w-full border border-gray-300 rounded-md px-4 py-2 pr-10 shadow-sm focus:outline-none focus:ring-1 focus:ring-secondaryColors-base"
                        placeholder="Ulangi password">
                    <button type="button" @click="show = !show"
                        class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500">
                        <x-icons.eye class="w-5 h-5" x-show="!show" />
                        <x-icons.eye-off class="w-5 h-5" x-show="show" />
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>





    <div class="p-6 bg-white w-full rounded-b-lg flex items-center justify-between">
        <a href="{{ url('#') }}"
                    class="inline-flex px-4 py-2 text-md font-semibold rounded-md border border-gray-200 bg-secondaryColors-base text-white hover:bg-secondaryColors-60 transition-all">Tambah
                    Data</a>

        {{-- Pagination --}}
    </div>
</x-layouts.admin.admin-layout>
