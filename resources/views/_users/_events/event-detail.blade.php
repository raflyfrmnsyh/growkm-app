<html>
<x-partials.head-info>
    <x-slot:title>{{ $title }}</x-slot:title>
</x-partials.head-info>

<body class="bg-gray-100 flex flex-row justify-center items-start">
    <x-partials.dashboard.sidebar></x-partials.dashboard.sidebar>

    <main class="w-full lg:w-[80%] lg:left-[20%] absolute ">
        {{-- Mobile Header --}}
        <x-partials.dashboard.mobile-header></x-partials.dashboard.mobile-header>
        {{-- Desktop Header --}}
        <x-partials.dashboard.desktop-header></x-partials.dashboard.desktop-header>

        <section class="section_content flex flex-wrap lg:flex-nowrap items-start gap-8 mx-8 py-[112px]">
            <div class="w-full lg:w-[70%]">
                <div class="flex flex-col">
                    <div class="w-full bg-gradient-to-r from-[#003C43] to-[#00746B] rounded-t-lg border border-gray-200">
                        <div class="m-5">
                            <div class="flex-col">
                                <span
                                    class="inline-flex items-center justify-center rounded bg-secondaryColors-base px-3 py-1 text-light-base my-1.5">
                                    <p class="text-xs whitespace-nowrap">{{ $data['event_type'] }}</p>
                                </span>
                                <span
                                    class="inline-flex items-center justify-center rounded bg-light-base px-3 py-1 text-secondaryColors-base my-1.5">
                                    <p class="text-xs whitespace-nowrap">Sisa kuota {{ $data['event_quota'] }}</p>
                                </span>
                            </div>
                            <h1 class="text-2xl font-semibold text-light-base mt-6">{{ $data['event_title'] }}</h1>
                        </div>
                    </div>
                    <div class="w-full bg-light-base rounded-b-lg border border-gray-200">
                        <div class="m-5">

                            <div class="mb-4">
                                <h2 class="text-lg font-semibold text-dark-base mb-2">Detail Kelas</h2>
                                <div>
                                    @foreach ($data['event_tags'] as $tag)
                                        <span
                                            class="inline-flex items-center justify-center rounded bg-secondaryColors-10 px-3 py-1 text-secondaryColors-base my-1.5">
                                            <p class="text-sm whitespace-nowrap">{{ $tag }}</p>
                                        </span>
                                    @endforeach

                                </div>
                            </div>
                            <div>
                                <h2 class="text-lg font-semibold text-dark-base">Deskripsi Kelas</h2>
                                <p class="text-base text-dark-base">
                                    {{ $data['event_description'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="w-full lg:w-[40%]">
                <div class="p-5 rounded-lg border border-gray-200 bg-light-base">
                    <div class="flex flex-col">
                        <!-- Row 1 -->
                        <div>
                            <h2 class="text-lg font-semibold text-dark-base mb-1">Progress Kelas</h2>
                            <div class="flex items-center gap-2">
                                <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-2 bg-secondaryColors-base rounded-full" style="width: 60%;"></div>
                                </div>
                                <span class="text-xs text-secondaryColors-base">60%</span>
                            </div>
                            <p class="text-xs text-light-80">2 Week Left</p>
                        </div>

                        <!-- Garis Tengah -->
                        <div class="my-4 w-full border-t-2 border-dashed border-light-60"></div>

                        <!-- Row 2 -->
                        <div>
                            <h2 class="text-lg font-semibold text-dark-base mb-4">Pemateri Kelas</h2>
                            <div class="grid grid-cols-[auto,1fr] gap-3">
                                <div class="w-fit">
                                    <img src="{{ asset('image/dummy-profile.png') }}" alt="profile" class="w-12">
                                </div>
                                <div class="">
                                    <p class="text-lg font-medium">{{ $data['event_speaker'] }}</p>
                                    <p class="text-xs">{{ $data['event_speaker_job'] }} at Growkm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 rounded-lg border border-gray-200 bg-light-base mt-3 flex flex-col gap-4">

                    @if (!$isRegistered)
                        <a href="{{ route('register.event', ['id' => $data['event_id']]) }}"
                            class="w-full py-3 rounded-lg text-center bg-secondaryColors-base text-light-base hover:bg-primaryColors-base transition-colors text-sm md:text-base font-medium">
                            Daftar Kelas
                        </a>
                    @elseif ($data['event_type'] === 'Offline')
                        <div x-data="{ showPopup: false }">
                            <!-- Tombol Trigger -->
                            <button @click="showPopup = true"
                                class="w-full py-3 rounded-lg text-center bg-primaryColors-base text-light-base hover:bg-secondaryColors-base transition-colors text-sm md:text-base font-medium">
                                Lihat Tiket
                            </button>

                            <!-- Popup -->
                            <div x-show="showPopup" x-transition.opacity
                                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">

                                <div @click.away="showPopup = false" x-transition
                                    class="bg-white p-6 rounded-xl shadow-xl w-11/12 max-w-md relative">

                                    <!-- Tombol Close -->
                                    <button @click="showPopup = false"
                                        class="absolute top-2 right-3 text-gray-500 hover:text-red-600 text-xl">
                                        &times;
                                    </button>

                                    <!-- Konten Tiket -->
                                    <h2 class="text-lg font-semibold mb-4">Detail Tiket</h2>
                                    <p><strong>Kode Tiket:</strong> <span>{{ $participantCode ?? 'ABC123' }}</span></p>

                                </div>
                            </div>
                        </div>
                    @elseif ($data['event_type'] === 'Online')
                        <a href="{{ $data['event_location'] ?? 'http://meet.google.com' }}"
                            class="w-full py-3 rounded-lg text-center bg-primaryColors-base text-light-base hover:bg-secondaryColors-base transition-colors text-sm md:text-base font-medium">
                            Join Meet
                        </a>
                    @endif
                    <a href="{{ url()->previous() }}"
                        class="w-full py-3 rounded-lg text-center bg-gray-200 text-dark-base hover:bg-gray-300 transition-colors text-sm md:text-base font-medium flex items-center justify-center gap-2">
                        Kembali
                    </a>
                </div>
            </div>
        </section>
    </main>
    <script src="//unpkg.com/alpinejs" defer></script>

</body>

</html>
