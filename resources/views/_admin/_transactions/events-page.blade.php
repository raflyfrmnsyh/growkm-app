<x-layouts.admin.admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div
        class="p-6 bg-white w-full gap-8 rounded-t-md flex lg:flex-row flex-col items-center justify-between border-b border-gray-200">
        <h1 class="font-semibold text-lg">Data Transaksi Event & Kelas</h1>

        <div class="flex flex-col md:flex-row items-center gap-4 w-full lg:w-auto justify-between lg:justify-end">

            <form action="{{ route('admin.transaction-event') }}" method="GET">
                @if (request('filter'))
                    <input type="hidden" name="filter" value="{{ request('filter') }}">
                @endif
                <div
                    class="input-bx border border-gray-200 py-2 px-4 rounded-md w-[320px] flex items-center justify-between gap-2">
                    <input type="text" name="search" id="searchBox" placeholder="Cari sesuatu"
                        value="{{ request('search') }}" class="outline-none w-full">
                    <x-icons.searach-01 class="size-5 stroke-gray-200"></x-icons.searach-01>
                </div>
            </form>

            <div x-data="{ open: false }" class="relative inline-block text-left">
                <div>
                    <button type="button" @click="open = !open"
                        class="inline-flex w-full items-center justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-md font-semibold text-gray-800 border border-gray-200 hover:bg-gray-50"
                        id="menu-button" aria-expanded="true" aria-haspopup="true">
                        {{ request('filter') == 'today'
                            ? 'Hari ini'
                            : (request('filter') == 'this_week'
                                ? 'Minggu ini'
                                : (request('filter') == 'this_month'
                                    ? 'Bulan ini'
                                    : (request('filter') == 'this_year'
                                        ? 'Tahun ini'
                                        : 'Semua Waktu'))) }}
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
                        <a href="{{ request()->fullUrlWithQuery(['filter' => null]) }}"
                            class="block px-4 py-3 text-md {{ !request('filter') ? 'text-secondaryColors-base bg-secondaryColors-10' : 'text-gray-700' }} hover:bg-gray-50 hover:text-gray-800"
                            role="menuitem" tabindex="-1" id="menu-item-0">Semua waktu</a>
                        <a href="{{ request()->fullUrlWithQuery(['filter' => 'today']) }}"
                            class="block px-4 py-3 text-md {{ request('filter') == 'today' ? 'text-secondaryColors-base bg-secondaryColors-10' : 'text-gray-700' }} hover:bg-gray-50 hover:text-gray-800"
                            role="menuitem" tabindex="-1" id="menu-item-1">Hari ini</a>
                        <a href="{{ request()->fullUrlWithQuery(['filter' => 'this_week']) }}"
                            class="block px-4 py-3 text-md {{ request('filter') == 'this_week' ? 'text-secondaryColors-base bg-secondaryColors-10' : 'text-gray-700' }} hover:bg-gray-50 hover:text-gray-800"
                            role="menuitem" tabindex="-1" id="menu-item-2">Minggu ini</a>
                        <a href="{{ request()->fullUrlWithQuery(['filter' => 'this_month']) }}"
                            class="block px-4 py-3 text-md {{ request('filter') == 'this_month' ? 'text-secondaryColors-base bg-secondaryColors-10' : 'text-gray-700' }} hover:bg-gray-50 hover:text-gray-800"
                            role="menuitem" tabindex="-1" id="menu-item-3">Bulan ini</a>
                        <a href="{{ request()->fullUrlWithQuery(['filter' => 'this_year']) }}"
                            class="block px-4 py-3 text-md {{ request('filter') == 'this_year' ? 'text-secondaryColors-base bg-secondaryColors-10' : 'text-gray-700' }} hover:bg-gray-50 hover:text-gray-800"
                            role="menuitem" tabindex="-1" id="menu-item-4">Tahun ini</a>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <div class="overflow-x-auto w-full">
        <table class="w-full bg-white text-left min-w-[700px]">
            <thead class="text-sm uppercase bg-gray-50">
                <tr>
                    <th class="py-4 px-2 w-12 h-12 text-center">#</th>
                    <th class="py-4 px-2">Transaction ID</th>
                    <th class="py-4 px-2">Created At</th>
                    <th class="py-4 px-2">Nama Pelanggan</th>
                    <th class="py-4 px-2">Nama Event / Kelas</th>
                    <th class="py-4 px-2">Total Payment</th>
                    <th class="py-4 px-2 text-center">Payment status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr class="border-b border-gray-200">
                        <td class="text-center">{{ $loop->iteration + ($data->firstItem() - 1) }}.</td>
                        <td class="py-4 px-2">{{ $item['regist_id'] }}</td>
                        <td class="py-4 px-2">{{ $item['created_at'] }}</td>
                        <td class="py-4 px-2">{{ $item['participant_name'] }}</td>
                        <td class="py-4 px-2">{{ $item['event_name'] }}</td>
                        <td class="py-4 px-2 text-center">Rp. {{ $item['subtotal'] }}</td>
                        <td class="py-4 px-2 text-center">Success</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="p-6 bg-white w-full rounded-b-lg flex items-center justify-between">
        <span>Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }}
            entries</span>

        {{-- Pagination --}}
        @if ($data->hasPages())
            <ul class="flex justify-center gap-1 text-gray-900">
                {{-- Previous Page Link --}}
                @if ($data->onFirstPage())
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
                        <a href="{{ $data->previousPageUrl() }}"
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
                @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                    @if ($page == $data->currentPage())
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
                @if ($data->hasMorePages())
                    <li>
                        <a href="{{ $data->nextPageUrl() }}"
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
    </div>
</x-layouts.admin.admin-layout>
