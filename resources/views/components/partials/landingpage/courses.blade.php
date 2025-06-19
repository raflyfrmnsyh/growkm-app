<section class="px-6 py-6 sm:py-16 sm:px-16">
    <div class="flex flex-col gap-6 container">
        <!-- Header -->
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                <circle cx="6" cy="6.5" r="4" fill="#007F73"/>
                <circle cx="6" cy="6.5" r="5" stroke="#007F73" stroke-opacity="0.2" stroke-width="2"/>
            </svg>
            <span class="text-secondaryColors-base text-lg font-medium leading-[150%]">
                Bagaimana Growkm Membantu Anda
            </span>
        </div>

        <p class="text-dark-base text-3xl sm:text-5xl font-extrabold leading-[150%] md:w-[1000px]">
            Berikut pilihan kelas bisnis gratis dan program pendampingan growkm
        </p>

        <!-- Filter -->
        <div class="flex flex-col sm:flex-row sm:items-end gap-4">
        <!-- Selects -->
            <div class="flex flex-col sm:flex-row gap-4 flex-1">
                <div class="flex flex-col">
                <label class="text-dark-base mb-1">Metode Kegiatan</label>
                <select
                    class="w-full sm:w-[310px] h-11 px-3 py-2 border border-light-60 rounded-md bg-light-base text-dark-base"
                >
                    <option disabled selected>Metode</option>
                    <option>Semua Metode</option>
                </select>
                </div>
                <div class="flex flex-col">
                <label class="text-dark-base mb-1">Lokasi</label>
                <select
                    class="w-full sm:w-[310px] h-11 px-3 py-2 border border-light-60 rounded-md bg-light-base text-dark-base"
                >
                    <option disabled selected>Lokasi</option>
                    <option>Semua Lokasi</option>
                </select>
                </div>
                <div class="flex flex-col">
                <label class="text-dark-base mb-1">Kategori</label>
                <select
                    class="w-full sm:w-[310px] h-11 px-3 py-2 border border-light-60 rounded-md bg-light-base text-dark-base"
                >
                    <option disabled selected>Kategori</option>
                    <option>Semua Kategori</option>
                </select>
                </div>
            </div>

            <!-- Button -->
            <button
                class="w-full sm:w-auto h-11 px-6 rounded-md border border-secondaryColors-base bg-secondaryColors-base text-light-base hover:bg-secondaryColors-60 transition-colors"
            >
                <i class="fas fa-filter mr-2"></i>
                Temukan
            </button>
        </div>


        <!-- Course List -->
        <div class="flex flex-wrap justify-center gap-6">
            <!-- Course Card 1 -->
            <div class="w-full sm:w-[calc(50%-12px)] md:w-[calc(33.333%-16px)] lg:w-[calc(25%-18px)] p-3">
                <div class="rounded-t-lg overflow-hidden">
                    <img src="{{ asset('image/courses-1.png') }}" class="w-full h-auto" alt="">
                </div>
                <div class="p-3 space-y-4">
                    <h3 class="text-secondaryColors-base text-lg font-bold leading-[150%]">
                        Inovasi Teknologi untuk Meningkatkan...
                    </h3>
                    <p class="text-[#7D7D7D] text-base">
                        Anda akan belajar bagaimana mengelola data pelanggan, mening...
                    </p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('image/author.png')}}" class="w-8 h-8 rounded-full">
                            <div>
                                <p class="text-xs">by <span class="font-bold">GrowkmEduka</span></p>
                                <span class="text-xs text-[#999]">Rafly Firmansyah</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-1">
                            <span>⭐</span>
                            <span class="text-[#7D7D7D] text-sm">4.9</span>
                        </div>
                    </div>
                    <div class="flex gap-2 flex-wrap">
                        <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Online</span>
                        <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Gratis</span>
                        <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Bersertifikat</span>
                    </div>
                </div>
            </div>

            <!-- Course Card 2 -->
            <div class="w-full sm:w-[calc(50%-12px)] md:w-[calc(33.333%-16px)] lg:w-[calc(25%-18px)] p-3">
                <div class="rounded-t-lg overflow-hidden">
                    <img src="{{ asset('image/courses-2.png') }}" class="w-full h-auto" alt="">
                </div>
                <div class="p-3 space-y-4">
                    <h3 class="text-secondaryColors-base text-lg font-bold leading-[150%]">
                        Strategi Pemasaran Digital untuk Meningkatkan Penjualan
                    </h3>
                    <p class="text-[#7D7D7D] text-base">
                        Anda akan belajar bagaimana mengelola data pelanggan, mening...
                    </p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('image/author.png')}}" class="w-8 h-8 rounded-full">
                            <div>
                                <p class="text-xs">by <span class="font-bold">GrowkmEduka</span></p>
                                <span class="text-xs text-[#999]">Rafly Firmansyah</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-1">
                            <span>⭐</span>
                            <span class="text-[#7D7D7D] text-sm">4.9</span>
                        </div>
                    </div>
                    <div class="flex gap-2 flex-wrap">
                        <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Online</span>
                        <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Gratis</span>
                        <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Bersertifikat</span>
                    </div>
                    <button class="w-full py-2.5 px-6 rounded-lg border border-[#007F73] bg-secondaryColors-base text-light-base hover:bg-[#00635a] transition-colors">
                        Bergabung Sekarang
                    </button>
                </div>
            </div>

            <!-- Course Card 3 -->
            <div class="w-full sm:w-[calc(50%-12px)] md:w-[calc(33.333%-16px)] lg:w-[calc(25%-18px)] p-3 hidden sm:block">
                <div class="rounded-t-lg overflow-hidden">
                    <img src="{{ asset('image/courses-3.png') }}" class="w-full h-auto" alt="">
                </div>
                <div class="p-3 space-y-4">
                    <h3 class="text-secondaryColors-base text-lg font-bold leading-[150%]">
                        Pentingnya Analisis Data dalam Mengambil Keputusan Bisnis
                    </h3>
                    <p class="text-[#7D7D7D] text-base">
                        Anda akan belajar bagaimana mengelola data pelanggan, mening...
                    </p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('image/author.png')}}" class="w-8 h-8 rounded-full">
                            <div>
                                <p class="text-xs">by <span class="font-bold">GrowkmEduka</span></p>
                                <span class="text-xs text-[#999]">Rafly Firmansyah</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-1">
                            <span>⭐</span>
                            <span class="text-[#7D7D7D] text-sm">4.9</span>
                        </div>
                    </div>
                    <div class="flex gap-2 flex-wrap">
                        <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Online</span>
                        <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Gratis</span>
                        <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Bersertifikat</span>
                    </div>
                    <button class="w-full py-2.5 px-6 rounded-lg border border-[#007F73] bg-secondaryColors-base text-light-base hover:bg-[#00635a] transition-colors">
                        Bergabung Sekarang
                    </button>
                </div>
            </div>

            <!-- Course Card 4 -->
            <div class="w-full sm:w-[calc(50%-12px)] md:w-[calc(33.333%-16px)] lg:w-[calc(25%-18px)] p-3 hidden sm:block">
                <div class="rounded-t-lg overflow-hidden">
                    <img src="{{ asset('image/courses-4.png') }}" class="w-full h-auto" alt="">
                </div>
                <div class="p-3 space-y-4">
                    <h3 class="text-secondaryColors-base text-lg font-bold leading-[150%]">
                        Membangun Brand yang Kuat di Era Digital
                    </h3>
                    <p class="text-[#7D7D7D] text-base">
                        Anda akan belajar bagaimana mengelola data pelanggan, mening...
                    </p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('image/author.png')}}" class="w-8 h-8 rounded-full">
                            <div>
                                <p class="text-xs">by <span class="font-bold">GrowkmEduka</span></p>
                                <span class="text-xs text-[#999]">Rafly Firmansyah</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-1">
                            <span>⭐</span>
                            <span class="text-[#7D7D7D] text-sm">4.9</span>
                        </div>
                    </div>
                    <div class="flex gap-2 flex-wrap">
                        <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Online</span>
                        <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Gratis</span>
                        <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Bersertifikat</span>
                    </div>
                    <button class="w-full py-2.5 px-6 rounded-lg border border-[#007F73] bg-secondaryColors-base text-light-base hover:bg-[#00635a] transition-colors">
                        Bergabung Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
