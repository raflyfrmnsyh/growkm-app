<html>
<x-partials.head-info>
    <x-slot:title>{{ $title }}</x-slot:title>
</x-partials.head-info>

<body class="bg-gray-100 flex flex-row justify-center items-start">
    <x-partials.dashboard.sidebar></x-partials.dashboard.sidebar>

    <main class="w-full lg:w-[80%] lg:left-[20%] absolute">
        {{-- Mobile Header --}}
        <x-partials.dashboard.mobile-header></x-partials.dashboard.mobile-header>
        {{-- Desktop Header --}}
        <x-partials.dashboard.desktop-header></x-partials.dashboard.desktop-header>

        <section class="section_content flex flex-col items-start mx-8 py-[112px]">
            {{-- Header Section --}}
            <div
                class="p-6 bg-white w-full gap-8 rounded-t-md flex lg:flex-row flex-col items-center justify-between border-b border-gray-200 z-10">
                <h1 class="font-semibold text-xl">Event & Kelas Saya</h1>

                <div
                    class="flex flex-col md:flex-row items-center gap-4 w-full lg:w-auto justify-between lg:justify-end">
                    {{-- Search Form --}}
                    <form action="#" method="get" class="w-full md:w-auto p-0 m-0">
                        @csrf
                        <div class="relative w-[320px]">
                            <input type="text" name="searchBox" id="searchBox" placeholder="Cari event atau kelas..."
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-secondaryColors-base focus:ring-1 focus:ring-secondaryColors-base outline-none transition-all">
                            <x-icons.searach-01
                                class="absolute right-3 top-1/2 -translate-y-1/2 size-5 stroke-gray-400"></x-icons.searach-01>
                        </div>
                    </form>

                    {{-- Filter Dropdown --}}
                    <div class="flex gap-4">
                        <div x-data="{ open: false }" class="relative inline-block text-left">
                            <div>
                                <button type="button" @click="open = !open"
                                    class="inline-flex w-full items-center justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-md font-semibold text-gray-800 border border-gray-200 hover:bg-gray-50"
                                    id="menu-button" aria-expanded="true" aria-haspopup="true">
                                    Semua Waktu
                                    <x-icons.arrow-down class="stroke-dark-base size-5"></x-icons.arrow-down>
                                </button>
                            </div>

                            <div x-show="open" @click.away="open = false"
                                x-transition:enter="transition ease-out duration-100"
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
                                        role="menuitem" tabindex="-1" id="menu-item-0">Semua waktu</a>
                                    <a href="#"
                                        class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                        role="menuitem" tabindex="-1" id="menu-item-1">Hari ini</a>
                                    <a href="#"
                                        class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                        role="menuitem" tabindex="-1" id="menu-item-2">Minggu ini</a>
                                    <a href="#"
                                        class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                        role="menuitem" tabindex="-1" id="menu-item-3">Bulan ini</a>
                                    <a href="#"
                                        class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                        role="menuitem" tabindex="-1" id="menu-item-3">Tahun ini</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Events Grid --}}
            <div class="w-full bg-white px-6 py-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($data as $item)
                        <div class="w-full">
                            <div class="rounded-t-lg overflow-hidden bg-gray-100">
                                <img src="{{ asset('image/courses-1.png') }}" class="w-full h-auto"
                                    alt="Event thumbnail">
                            </div>
                            <div class="p-3 space-y-4">
                                <a href="{{ route('event-detail', ['event_id' => $item['event_id'], 'user_id' => Auth::user()->user_id]) }}"
                                    class="text-secondaryColors-base text-lg font-bold leading-[150%] line-clamp-2">
                                    {{ $item['event_title'] }}
                                </a>
                                <p class="text-[#7D7D7D] text-base line-clamp-2">
                                    {{ $item['event_description'] }}
                                </p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('image/author.png') }}" class="w-8 h-8 rounded-full"
                                            alt="Author avatar">
                                        <div>
                                            <p class="text-xs">by <span class="font-bold">GrowkmEduka</span></p>
                                            <span class="text-xs text-[#999]">{{ $item['event_speaker'] }}</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <span>⭐</span>
                                        <span class="text-[#7D7D7D] text-sm">4.9</span>
                                    </div>
                                </div>
                                <div class="flex gap-2 flex-wrap">
                                    @foreach ($item['event_tags'] as $tag)
                                        <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">
                                            {{ $tag ?? 'Online' }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
</body>

</html>
