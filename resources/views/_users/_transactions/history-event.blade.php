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
            </div>

            {{-- Events Grid --}}
            <div class="w-full bg-white px-6 py-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @if (count($data) > 0)
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
                    @else
                        <div class="col-span-full flex flex-col items-center justify-center py-12">
                            <p class="text-lg text-gray-600 mb-4">Kamu belum mendaftar event sama sekali, daftar
                                sekarang!</p>
                            <a href="{{ route('events.data') }}"
                                class="px-4 py-2 bg-secondaryColors-base text-white rounded hover:bg-secondaryColors-dark transition">
                                Lihat Event
                            </a>
                        </div>
                    @endif
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
