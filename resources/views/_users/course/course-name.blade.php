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
                                class="inline-flex items-center justify-center rounded bg-secondaryColors-base px-3 py-1 text-light-base my-1.5"
                                >
                                    <p class="text-xs whitespace-nowrap">Materi</p>
                                </span>
                                <span
                                class="inline-flex items-center justify-center rounded bg-light-base px-3 py-1 text-secondaryColors-base my-1.5"
                                >
                                    <p class="text-xs whitespace-nowrap">Sisa kuota 0</p>
                                </span>
                            </div>
                            <h1 class="text-2xl font-semibold text-light-base">Judul Kelas & Event</h1>
                            <p class="text-sm text-light-80">Kelola informasi akun pribadimu di halaman ini.</p>
                            <div class="flex-col mt-4 text-sm text-light-base">
                                <span>⭐ 4.9</span>
                                <span class="ms-10">Max 20 Peserta</span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full bg-light-base rounded-b-lg border border-gray-200">
                        <div class="m-5">
                            <div>
                                <h2 class="text-lg font-semibold text-dark-base">Deskripsi Kelas</h2>
                                <p class="text-base text-dark-base">
                                    Kelas ini dirancang untuk para pemula, calon wirausahawan, maupun pelaku
                                    UMKM yang ingin mengembangkan usahanya secara sistematis dan berkelanjutan.
                                    Dalam kelas ini, peserta akan mempelajari pondasi bisnis, strategi pemasaran,
                                    pengelolaan keuangan, hingga cara beradaptasi dengan era digital. Disampaikan
                                    dengan bahasa yang ringan dan studi kasus lokal, kelas ini akan membantu Anda
                                    membangun bisnis yang kuat dan relevan di tengah persaingan pasar.
                                </p>
                            </div>
                            <div class="mt-4">
                                <h2 class="text-lg font-semibold text-dark-base">Detail Kelas</h2>
                                <div>
                                    <span
                                    class="inline-flex items-center justify-center rounded bg-secondaryColors-10 px-3 py-1 text-secondaryColors-base my-1.5"
                                    >
                                        <p class="text-sm whitespace-nowrap">Cocok untuk pemula</p>
                                    </span>
                                    <span
                                    class="inline-flex items-center justify-center rounded bg-secondaryColors-10 px-3 py-1 text-secondaryColors-base my-1.5"
                                    >
                                        <p class="text-sm whitespace-nowrap">100 peserta</p>
                                    </span>
                                    <span
                                    class="inline-flex items-center justify-center rounded bg-secondaryColors-10 px-3 py-1 text-secondaryColors-base my-1.5"
                                    >
                                        <p class="text-sm whitespace-nowrap">Kelas online</p>
                                    </span>
                                    <span
                                    class="inline-flex items-center justify-center rounded bg-secondaryColors-10 px-3 py-1 text-secondaryColors-base my-1.5"
                                    >
                                        <p class="text-sm whitespace-nowrap">Kelas Bisnis UMKM</p>
                                    </span>
                                    <span
                                    class="inline-flex items-center justify-center rounded bg-secondaryColors-10 px-3 py-1 text-secondaryColors-base my-1.5"
                                    >
                                        <p class="text-sm whitespace-nowrap">Berbahasa Indonesia</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col mt-6">
                    <div class="w-full bg-light-base rounded-t-lg border border-gray-200">
                        <div class="m-5">
                            <h1 class="text-lg font-semibold text-dark-base">Jadwal Sesi Kelas</h1>
                            <p class="text-sm text-light-80">Kelas ini dirancang untuk para pemula, calon wirausahawan</p>
                        </div>
                    </div>
                    <div class="w-full bg-light-base border border-gray-200">
                        <div class="m-5">
                            <details class="group [&_summary::-webkit-details-marker]:hidden duration-300">
                                <summary class="flex items-center justify-between gap-1.5 cursor-pointer">
                                    <h2 class="text-base font-medium text-gray-900">
                                        Sesi 1: Membangun Pondasi Bisnis UMKM
                                    </h2>
                                    <svg class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </summary>
                                <p class="mt-4 text-gray-700 text-sm md:text-base">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab hic veritatis molestias culpa in,
                                    recusandae laboriosam neque aliquid libero nesciunt voluptate dicta quo officiis explicabo
                                    consequuntur distinctio corporis earum similique!
                                </p>
                            </details>
                        </div>
                    </div>
                    <div class="w-full bg-light-base border border-gray-200">
                        <div class="m-5">
                            <details class="group [&_summary::-webkit-details-marker]:hidden duration-300">
                                <summary class="flex items-center justify-between gap-1.5 cursor-pointer">
                                    <h2 class="text-base font-medium text-gray-900">
                                        Sesi 2: Strategi Pemasaran yang Efektif untuk UMKM
                                    </h2>
                                    <svg class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </summary>
                                <p class="mt-4 text-gray-700 text-sm md:text-base">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab hic veritatis molestias culpa in,
                                    recusandae laboriosam neque aliquid libero nesciunt voluptate dicta quo officiis explicabo
                                    consequuntur distinctio corporis earum similique!
                                </p>
                            </details>
                        </div>
                    </div>
                    <div class="w-full bg-light-base border border-gray-200">
                        <div class="m-5">
                            <details class="group [&_summary::-webkit-details-marker]:hidden duration-300">
                                <summary class="flex items-center justify-between gap-1.5 cursor-pointer">
                                    <h2 class="text-base font-medium text-gray-900">
                                        Sesi 3: Manajemen Keuangan untuk UMKM
                                    </h2>
                                    <svg class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </summary>
                                <p class="mt-4 text-gray-700 text-sm md:text-base">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab hic veritatis molestias culpa in,
                                    recusandae laboriosam neque aliquid libero nesciunt voluptate dicta quo officiis explicabo
                                    consequuntur distinctio corporis earum similique!
                                </p>
                            </details>
                        </div>
                    </div>
                    <div class="w-full bg-light-base rounded-b-lg border border-gray-200">
                        <div class="m-5">
                            <details class="group [&_summary::-webkit-details-marker]:hidden duration-300">
                                <summary class="flex items-center justify-between gap-1.5 cursor-pointer">
                                    <h2 class="text-base font-medium text-gray-900">
                                        Sesi 4: Digitalisasi Bisnis UMKM di Era Modern
                                    </h2>
                                    <svg class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </summary>
                                <p class="mt-4 text-gray-700 text-sm md:text-base">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab hic veritatis molestias culpa in,
                                    recusandae laboriosam neque aliquid libero nesciunt voluptate dicta quo officiis explicabo
                                    consequuntur distinctio corporis earum similique!
                                </p>
                            </details>
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
                            <h2 class="text-lg font-semibold text-dark-base mb-1">Pemateri Kelas</h2>
                            <div class="grid grid-cols-[auto,1fr] gap-3">
                                <div class="w-fit">
                                    <img src="{{ asset('image/dummy-profile.png') }}" alt="profile" class="w-12">
                                </div>
                                <div class="grid grid-rows-3">
                                    <p class="text-lg font-medium">Roy Subagya Santoso</p>
                                    <p class="text-xs">Head of Product Development at Growkm</p>
                                    <div class="flex gap-6 text-2xl">
                                        <a href="{{ url('#') }}" class="social_link hover:scale-[1.1]">
                                            <img src="{{ asset('image/linkedin.svg') }}" alt="Linkedin">
                                        </a>
                                        <a href="{{ url('#') }}" class="social_link hover:scale-[1.1]">
                                            <img src="{{ asset('image/tiktok.svg') }}" alt="Tiktok">
                                        </a>
                                        <a href="{{ url('#') }}" class="social_link hover:scale-[1.1]">
                                            <img src="{{ asset('image/instagram.svg') }}" alt="Instagram">
                                        </a>
                                        <a href="{{ url('#') }}" class="social_link hover:scale-[1.1]">
                                            <img src="{{ asset('image/x.svg') }}" alt="X">
                                        </a>
                                        <a href="{{ url('#') }}" class="social_link hover:scale-[1.1]">
                                            <img src="{{ asset('image/youtube.svg') }}" alt="Youtube">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-5 rounded-lg border border-gray-200 bg-light-base mt-3">
                    <button class="w-full py-3 rounded-lg bg-secondaryColors-base text-light-base hover:bg-primaryColors-base transition-colors text-sm md:text-base font-medium">
                        Join Group Kelas
                    </button>
                </div>
            </div>
        </section>
    </main>

</body>

</html>
