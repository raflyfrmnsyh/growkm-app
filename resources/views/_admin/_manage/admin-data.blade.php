<x-layouts.admin.admin-layout>

    <x-slot:title> {{ $title }}</x-slot:title>

    <div
        class="p-6 bg-white w-full gap-8 rounded-t-md flex lg:flex-row flex-col items-center justify-between border-b border-gray-200">
        <h1 class="font-semibold text-lg">Data Admin</h1>

        <div class="flex flex-col md:flex-row items-center gap-4 w-full lg:w-auto justify-between lg:justify-end">

            <form action="{{ route('admin.manage.admin') }}" method="get">
                <div
                    class="input-bx border border-gray-200 py-2 px-4 rounded-md w-[320px] flex items-center justify-between gap-2">
                    <input type="text" name="searchBox" id="searchBox" placeholder="Cari sesuatu"
                        class="outline-none w-full ">
                    <x-icons.searach-01 class="size-5 stroke-gray-200"></x-icons.searach-01>
                </div>
            </form>

            <div class="flex gap-4">
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
                            <a href="{{ route('admin.manage.admin') }}"
                                class="block px-4 py-3 text-md text-secondaryColors-base bg-secondaryColors-10 hover:bg-gray-50 hover:text-gray-800 {{ request('role_name') == null ? 'font-semibold' : '' }}"
                                role="menuitem" tabindex="-1" id="menu-item-0">
                                Semua Role
                            </a>
                            <a href="{{ route('admin.manage.admin', ['role_name' => 'admin_event', 'search_box' => request('search_box')]) }}"
                                class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800 {{ request('role_name') == 'admin_event' ? 'font-semibold text-secondaryColors-base' : '' }}"
                                role="menuitem" tabindex="-1" id="menu-item-2">
                                Event Admin
                            </a>
                            <a href="{{ route('admin.manage.admin', ['role_name' => 'admin_product', 'search_box' => request('search_box')]) }}"
                                class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800 {{ request('role_name') == 'admin_product' ? 'font-semibold text-secondaryColors-base' : '' }}"
                                role="menuitem" tabindex="-1" id="menu-item-3">
                                Product Admin
                            </a>
                        </div>
                    </div>
                </div>

                <a href="{{ route('admin.manage.add-admin') }}"
                    class="inline-flex px-4 py-2 text-md font-semibold rounded-md border border-gray-200 bg-secondaryColors-base text-white hover:bg-secondaryColors-60 transition-all">Tambah
                    Data</a>
            </div>

        </div>
    </div>

    <div class="overflow-x-auto w-full">
        <table class="w-full bg-white text-left min-w-[700px]">
            <thead class="text-sm uppercase bg-gray-50">
                <tr>
                    <th class="py-4 px-2 w-12 h-12 text-center">#</th>
                    <th class="py-4 px-2">ID Admin</th>
                    <th class="py-4 px-2">Tanggal bergabung</th>
                    <th class="py-4 px-2">Nama Admin</th>
                    <th class="py-4 px-2 text-start">No. Phone</th>
                    <th class="py-4 px-2 text-start">Admin role</th>
                    <th class="text-center p-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($admins as $index => $admin)
                    {{-- @dd($admin) --}}
                    <tr class="border-b border-gray-200">
                        <td class="text-center">{{ ($admins->currentPage() - 1) * $admins->perPage() + $index + 1 }}
                        </td>
                        <td class="py-4 px-2">{{ 'ADM' . $admin['user_id'] }}</td>
                        <td class="py-4 px-2">{{ $admin['join_date'] }}</td>
                        <td class="py-4 px-2">{{ $admin['username'] }}</td>
                        <td class="py-4 px-2 text-start">{{ $admin['user_phone'] }}</td>
                        <td class="py-4 px-2 text-start">
                            {{ ucwords(str_replace('_', ' ', $admin['user_role'])) }}
                        </td>
                        <td class="py-4 px-2 text-center align-middle">
                            <div class="flex items-center justify-center gap-2">
                                {{-- Tombol Edit / Lihat --}}
                                <a href="{{ route('admin.manage.edit-admin', $admin['user_id']) }}"
                                    class="bg-secondaryColors-10 flex items-center justify-center w-8 h-8 rounded-md hover:bg-secondaryColors-20">
                                    <x-icons.eye-01 class="size-5 stroke-secondaryColors-base" />
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('admin.manage.delete-admin', $admin['user_id']) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this admin?');"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-100 flex items-center justify-center w-8 h-8 rounded-md hover:bg-red-200">
                                        <x-icons.delete-01 class="size-5 stroke-red-600" />
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="7" class="py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center gap-4">
                                <x-icons.user-group class="w-12 h-12 stroke-gray-300" />
                                <p class="text-lg font-medium">Belum ada data admin.</p>
                                <p class="text-sm text-gray-400">Klik tombol "Tambah Data" untuk menambahkan admin
                                    pertama.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
    <div class="p-6 bg-white w-full rounded-b-lg flex items-center justify-between">
        <span>Showing {{ $admins->firstItem() ?? 0 }} to {{ $admins->lastItem() ?? 0 }} of
            {{ $admins->total() ?? 0 }}
            entries</span>

        {{-- Pagination --}}
        @if ($admins->hasPages())
            <ul class="flex justify-center gap-1 text-gray-900">
                {{-- Previous Page Link --}}
                @if ($admins->onFirstPage())
                    <li>
                        <span
                            class="grid size-8 place-content-center rounded border border-gray-200 opacity-50 cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $admins->previousPageUrl() }}"
                            class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50 rtl:rotate-180"
                            aria-label="Halaman sebelumnya">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($admins->getUrlRange(1, $admins->lastPage()) as $page => $url)
                    @if ($page == $admins->currentPage())
                        <li>
                            <span
                                class="block size-8 rounded border border-secondaryColors-base bg-secondaryColors-base text-center text-sm/8 font-medium text-white">
                                {{ $page }}
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}"
                                class="block size-8 rounded border border-gray-200 text-center text-sm/8 font-medium transition-colors hover:bg-gray-50">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($admins->hasMorePages())
                    <li>
                        <a href="{{ $admins->nextPageUrl() }}"
                            class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50 rtl:rotate-180"
                            aria-label="Halaman berikutnya">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                @else
                    <li>
                        <span
                            class="grid size-8 place-content-center rounded border border-gray-200 opacity-50 cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </li>
                @endif
            </ul>
        @endif
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                class="fixed top-6 right-6 z-50 bg-green-100 text-green-800 px-4 py-2 rounded shadow-lg mb-4"
                style="min-width: 220px;">
                {{ session('success') }}
            </div>
        @endif
    </div>
</x-layouts.admin.admin-layout>
