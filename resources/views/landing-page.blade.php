<x-layouts.client-side-layout>
    {{-- <x-slot name="title">{{ @dd($title) }}</x-slot> --}}
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-partials.landingpage.header></x-partials.landingpage.header>

    {{-- Make content bellow! --}}
    <section id="beranda" class="overflow-hidden pt-0 sm:pt-16 px-6 bg-light-base sm:grid sm:grid-cols-2">
        <div class="py-6 md:p-12 lg:px-16">
            <div class="max-w-xl ltr:sm:text-left rtl:sm:text-right">
                <div class="flex items-center gap-2">
                    <x-icons.star-icon></x-icons.star-icon>
                    <span class="text-primaryColors-base text-lg font-medium leading-[150%]">
                        Solusi Pengembangan UKM dan UMKM terbaik
                    </span>
                </div>
                <p class="text-dark-base text-4xl sm:text-5xl font-extrabold">
                    Berkembang bersama pelaku usaha se-Indonesia melalui
                    <span class="text-secondaryColors-base">Growkm</span>
                </p>

                <p class="text-gray-500 md:mt-4 text-justify sm:text-left">
                    Growkm hadir sebagai platform edukasi bisnis praktis
                    sekaligus penyedia akses bahan baku terpercaya bagi pelaku usaha
                </p>

                <div class="flex flex-col mt-4 sm:mt-6">
                    <a
                    class="w-full text-center rounded bg-secondaryColors-base px-5 py-3 text-sm sm:text-base font-medium text-light-base shadow-sm"
                    href="{{ route('auth.register') }}"
                    >
                    Bergabung Sekarang
                    </a>
                </div>
            </div>
        </div>

        <img
            alt=""
            src="{{ asset('image/hero_landpage.png') }}"
            class="hidden md:block"
        />
    </section>

    <section id="stats" class="bg-gradient-to-r from-primaryColors-base to-secondaryColors-60 py-6 px-4 md:px-16">
        <div class=" mx-auto flex flex-col md:flex-row items-start md:items-center md:justify-between gap-8 md:gap-0 w-full">
            <!-- Text -->
            <p class="text-light-base text-lg md:text-2xl font-semibold leading-[150%] text-center md:text-left max-w-[502px]">
            Dalam perjalanan membantu pelaku usaha, Growkm telah menghadirkan
            </p>

            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 w-full justify md:w-auto">
                <div class="text-center py-4">
                    <h3 class="text-yellowLight-base text-3xl md:text-7xl font-bold leading-[150%]">{{ $stats['total_products'] }}</h3>
                    <p class="text-light-base text-base md:text-lg">Produk Terbaik</p>
                </div>
                <div class="text-center py-4">
                    <h3 class="text-yellowLight-base text-3xl md:text-7xl font-bold leading-[150%]">{{ $stats['total_events'] }}</h3>
                    <p class="text-light-base text-base md:text-lg">Event Menarik</p>
                </div>
                <div class="text-center py-4">
                    <h3 class="text-yellowLight-base text-3xl md:text-7xl font-bold leading-[150%]">{{ $stats['total_users'] }}</h3>
                    <p class="text-light-base text-base md:text-lg">Pengguna Aktif</p>
                </div>
            </div>
        </div>
    </section>

    <section id="program" class="px-6 py-6 sm:py-16 sm:px-16">
        <div class=" mx-auto flex flex-col gap-6">

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

            <p class="text-dark-base text-3xl sm:text-5xl font-extrabold leading-[150%] md:w-full ">
                Pengalaman pertumbuhan bisnis Anda bersama <br class="hidden lg:block">
                Tim Growkm
            </p>

            <!-- Konten Utama: image + cards -->
            <div class="flex flex-col lg:flex-row gap-6">

                <!-- Gambar (hanya di desktop) -->
                <div class="hidden lg:block lg:w-1/3">
                    <img src="{{ asset('image/program-growkm.png') }}" alt="" class="w-full h-auto rounded-xl" />
                </div>


                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:grid-cols-2 lg:w-2/3">
                    <!-- Card 1 -->
                    <div class="p-6 rounded-[20px] bg-light-30 flex flex-col gap-3">
                        <i class="hgi hgi-stroke hgi-idea-01 text-6xl sm:text-7xl text-secondaryColors-base"></i>
                        <h2 class="text-primaryColors-base text-xl sm:text-2xl font-bold leading-[150%]">Growkm Event</h2>
                        <p class="text-primaryColors-base text-sm sm:text-base">
                            Tingkatkan kompetensi bisnis Anda melalui workshop, sampai seminar eksklusif. Pelajari strategi pemasaran, manajemen keuangan, hingga pengembangan produk langsung dari praktisi industri.
                        </p>
                    </div>

                    <!-- Card 2 -->
                    <div class="p-6 rounded-[20px] bg-light-30 flex flex-col gap-3">
                        <i class="hgi hgi-stroke hgi-mentoring text-6xl sm:text-7xl text-secondaryColors-base"></i>
                        <h2 class="text-primaryColors-base text-xl sm:text-2xl font-bold leading-[150%]">Supply Hub</h2>
                        <p class="text-primaryColors-base text-sm sm:text-base">
                            Akses jaringan pemasok bahan baku terpercaya dengan harga kompetitif. Temukan material berkualitas untuk produksi Anda dengan jaminan kualitas dan pengiriman tepat waktu.
                        </p>
                    </div>

                    <!-- Card 3 -->
                    <div class="p-6 rounded-[20px] bg-light-30 flex flex-col gap-3">
                        <i class="hgi hgi-stroke hgi-analytics-up text-6xl sm:text-7xl text-secondaryColors-base"></i>
                        <h2 class="text-primaryColors-base text-xl sm:text-2xl font-bold leading-[150%]">Tingkatkan Potensi Bisnis Anda</h2>
                        <p class="text-primaryColors-base text-sm sm:text-base">
                            Bergabunglah dengan ekosistem wirausaha terbesar dan kembangkan jaringan bisnis Anda.
                        </p>
                        <a href="{{ route('auth.register')}}" class="mt-2 text-primaryColors-base text-sm sm:text-base font-bold underline inline-flex items-center">
                            Bergabung Sekarang
                            <i class="hgi hgi-stroke hgi-arrow-right-02 text-sm ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="event" class="px-6 py-6 sm:py-16 sm:px-16">
        <div class="flex flex-col gap-6 ">
            <!-- Header -->
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                    <circle cx="6" cy="6.5" r="4" fill="#007F73"/>
                    <circle cx="6" cy="6.5" r="5" stroke="#007F73" stroke-opacity="0.2" stroke-width="2"/>
                </svg>
                <span class="text-secondaryColors-base text-lg font-medium leading-[150%]">
                    Bagaimana Anda Dapat Berkembang bersama Growkm
                </span>
            </div>

            <p class="text-dark-base text-3xl sm:text-5xl font-extrabold leading-[150%] md:w-full">
                Berikut pilihan event bisnis gratis dari Growkm
            </p>

            <!-- Filter -->
            {{-- <div class="flex flex-col sm:flex-row sm:items-end gap-4">
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
            </div> --}}


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
                        </div>
                        <div class="flex gap-2 flex-wrap">
                            <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Online</span>
                            <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Gratis</span>
                            <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Bersertifikat</span>
                        </div>
                        <a href="{{ url('/auth/register') }}">
                            <button class="w-full mt-4 py-2.5 px-6 rounded-lg border border-[#007F73] bg-secondaryColors-base text-light-base hover:bg-[#00635a] transition-colors">
                                Bergabung Sekarang
                            </button>
                        </a>
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
                        </div>
                        <div class="flex gap-2 flex-wrap">
                            <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Online</span>
                            <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Gratis</span>
                            <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Bersertifikat</span>
                        </div>
                        <a href="{{ url('/auth/register') }}">
                            <button class="w-full mt-4 py-2.5 px-6 rounded-lg border border-[#007F73] bg-secondaryColors-base text-light-base hover:bg-[#00635a] transition-colors">
                                Bergabung Sekarang
                            </button>
                        </a>
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
                        </div>
                        <div class="flex gap-2 flex-wrap">
                            <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Online</span>
                            <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Gratis</span>
                            <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Bersertifikat</span>
                        </div>
                        <a href="{{ url('/auth/register') }}">
                            <button class="w-full mt-4 py-2.5 px-6 rounded-lg border border-[#007F73] bg-secondaryColors-base text-light-base hover:bg-[#00635a] transition-colors">
                                Bergabung Sekarang
                            </button>
                        </a>
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
                        </div>
                        <div class="flex gap-2 flex-wrap">
                            <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Online</span>
                            <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Gratis</span>
                            <span class="px-2 py-1 text-xs border border-[#A9B2B2] rounded-lg">Bersertifikat</span>
                        </div>
                        <a href="{{ url('/auth/register') }}">
                            <button class="w-full mt-4 py-2.5 px-6 rounded-lg border border-[#007F73] bg-secondaryColors-base text-light-base hover:bg-[#00635a] transition-colors">
                                Bergabung Sekarang
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimoni" class="bg-gradient-to-r from-[#003C43] to-[#00746B] px-6 py-6 sm:py-16 sm:px-16">
        <div class="flex flex-col items-center gap-10 ">
            <div class="text-center">
                <p class="text-light-base text-5xl font-bold leading-[150%]">
                    Trusted by thousand of people & companies.
                </p>
                <p class="text-light-base text-base">
                    For any other questions that we may not have answered, please contact us and we’ll get your answers.
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <!-- Testimonial Card 1 -->
                <div class="bg-white p-6 rounded-lg space-y-6 flex flex-col h-full justify-between">
                    <p class="text-dark-base text-base">
                        Growkm memberikan pengalaman yang luar biasa dalam mencari supplier. Dengan fitur
                        pelacakan permintaan, saya dapat melakukan pemantauan terhadap pengiriman secara real-time.
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('image/testimonials-1.png') }}" class="w-12 h-12 rounded-full" alt="Budi Santoso">
                        <div class="ml-2.5">
                            <h4 class="text-primaryColors-base text-xl font-bold">Budi Santoso</h4>
                            <span class="text-primaryColors-base text-base">Toko Elektronik Budi, Yogyakarta</span>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Card 2 -->
                <div class="bg-white p-6 rounded-lg space-y-6 flex flex-col h-full justify-between hidden md:block">
                    <p class="text-dark-base text-base">
                        Growkm sangat memuaskan, saya bisa menda-patkan akses ke berbagai pilihan supplier yang
                        sebelumnya sulit ditemukan. Fitur analisis harga membantu saya untuk bernegosiasi dengan lebih baik.
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('image/testimonials-2.png') }}" class="w-12 h-12 rounded-full" alt="Siti Nurhaliza">
                        <div class="ml-2.5">
                            <h4 class="text-primaryColors-base text-xl font-bold">Siti Nurhaliza</h4>
                            <span class="text-primaryColors-base text-base">Toko Bahan Kue Siti, Jakarta</span>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Card 3 -->
                <div class="bg-white p-6 rounded-lg space-y-6 flex flex-col h-full justify-between hidden md:block">
                    <p class="text-dark-base text-base">
                        Dengan Growkm, menemukan supplier terpercaya menjadi lebih mudah. Fitur rekomendasi
                        berdasarkan kebutuhan saya membantu dalam proses pengambilan keputusan.
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('image/testimonials-3.png') }}" class="w-12 h-12 rounded-full" alt="Ali Akbar">
                        <div class="ml-2.5">
                            <h4 class="text-primaryColors-base text-xl font-bold">Ali Akbar</h4>
                            <span class="text-primaryColors-base text-base">Toko Alat Rumah Tangga Akbar, Surabaya</span>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Card 4 -->
                <div class="bg-white p-6 rounded-lg space-y-6 flex flex-col h-full justify-between hidden md:block">
                    <p class="text-dark-base text-base">
                        Growkm sangat membantu saya dalam menemukan supplier bahan baku berkualitas dengan
                        harga terbaik. Fitur Supplier+ membuat proses pencarian jauh lebih cepat dan efisien!
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('image/testimonials-4.png') }}" class="w-12 h-12 rounded-full" alt="Rizky Pratama">
                        <div class="ml-2.5">
                            <h4 class="text-primaryColors-base text-xl font-bold">Rizky Pratama</h4>
                            <span class="text-primaryColors-base text-base">Kedai Kopi Pratama, Bandung</span>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Card 5 -->
                <div class="bg-white p-6 rounded-lg space-y-6 flex flex-col h-full justify-between hidden md:block">
                    <p class="text-dark-base text-base">
                        Saya sangat terkesan dengan kemudahan yang ditawarkan oleh Growkm. Fitur perbandingan
                        produk membantu saya untuk memilih pilihan terbaik dalam waktu singkat.
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('image/testimonials-5.png') }}" class="w-12 h-12 rounded-full" alt="Dewi Lestari">
                        <div class="ml-2.5">
                            <h4 class="text-primaryColors-base text-xl font-bold">Dewi Lestari</h4>
                            <span class="text-primaryColors-base text-base">Toko Fashion Dewi, Bali</span>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Card 6 -->
                <div class="bg-white p-6 rounded-lg space-y-6 flex flex-col h-full justify-between hidden md:block">
                    <p class="text-dark-base text-base">
                        Growkm benar-benar telah mengubah cara saya bekerja. Fitur koneksi langsung
                        dengan supplier membuat komunikasi menjadi lebih lancar dan cepat.
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('image/testimonials-6.png') }}" class="w-12 h-12 rounded-full" alt="Fajar Setiawan">
                        <div class="ml-2.5">
                            <h4 class="text-primaryColors-base text-xl font-bold">Fajar Setiawan</h4>
                            <span class="text-primaryColors-base text-base">Toko Olahraga Fajar, Malang</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="CTA" class="py-8 md:py-16 px-4 md:px-16">
        <div class="flex flex-col md:flex-row gap-4 md:gap-7">
            <div class="w-full md:flex-1 p-8 md:p-[84px_30px_30px_30px] rounded-lg bg-[url('../../public/image/action-bg-left.png')] bg-cover bg-center min-h-[300px] md:min-h-[400px]">
                <div class="text-light-base w-full md:w-[60%] space-y-4 md:space-y-8">
                    <h3 class="text-xl md:text-2xl font-bold">
                        Pengalaman pengembangan bisnis terbaik bersama growkm.
                    </h3>
                    <p class="text-light-base/80 text-sm md:text-base">
                        Akses workshop eksklusif dengan mentor profesional
                        untuk menguasai strategi pemasaran, manajemen keuangan, hingga pengembangan produk.
                    </p>
                    <a href="{{ url('/auth/register') }}">
                        <button class="mt-6 px-4 py-2 rounded-lg border border-white bg-white text-dark-base hover:bg-white/90 transition-colors text-sm md:text-base">
                            Bergabung Growkm Event
                        </button>
                    </a>
                </div>
            </div>

            <div class="w-full md:flex-1 p-8 md:p-[84px_30px_30px_30px] rounded-lg bg-[url('../../public/image/action-bg-right.png')] bg-cover bg-center min-h-[300px] md:min-h-[400px]">
                <div class="text-light-base w-full md:w-[60%] space-y-4 md:space-y-8">
                    <h3 class="text-xl md:text-2xl font-bold">
                        Dapatkan Konseksi Supply Bahan Baku terpercaya.
                    </h3>
                    <p class="text-light-base/80 text-sm md:text-base">
                        Temukan jaringan pemasok bahan baku berkualitas dengan harga kompetitif dan
                        jaminan pengiriman tepat waktu untuk mendukung kelancaran produksi usaha Anda.
                    </p>
                    <a href="{{ url('/auth/register') }}">
                        <button class="mt-6 px-4 py-2 rounded-lg border border-white bg-white text-dark-base hover:bg-white/90 transition-colors text-sm md:text-base">
                            Bergabung Supply Hub
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="bantuan" class="py-8 md:py-16 px-4 md:px-16">
        <div class=" flex flex-col md:flex-row gap-8">
            <!-- Left Section - akan full width di mobile -->
            <div class="w-full md:w-1/3 space-y-4">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                        <circle cx="6" cy="6.5" r="4" fill="#007F73"/>
                        <circle cx="6" cy="6.5" r="5" stroke="#007F73" stroke-opacity="0.2" stroke-width="2"/>
                    </svg>
                    <span class="text-secondaryColors-base text-lg font-medium">Tanya Growkm</span>
                </div>
                <h1 class="text-dark-base text-2xl md:text-3xl font-bold">Frequently Asked Questions</h1>
                <p class="text-dark-base text-base md:text-[19px] font-normal leading-[150%]">
                    Untuk pertanyaan lain yang belum terjawab di sini, silakan hubungi kami dan kami akan segera merespons Anda.
                </p>

                <!-- Contact Info -->
                <div class="mt-6 space-y-4">
                    <!-- Location -->
                    <div class="flex items-start gap-4">
                        <i class="hgi hgi-stroke hgi-location-03 text-3xl md:text-4xl text-secondaryColors-base"></i>
                        <div>
                            <p class="text-dark-base text-base md:text-lg font-bold leading-[150%]">
                                Lokasi Official Growkm
                            </p>
                            <span class="text-dark-base text-sm md:text-base font-normal leading-[150%]">
                                Jl. Pendidikan No.15, Cibiru Wetan, Kec. Cileunyi, Kabupaten Bandung, Jawa Barat 40625
                            </span>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-4">
                        <i class="hgi hgi-stroke hgi-mail-account-02 text-3xl md:text-4xl text-secondaryColors-base"></i>
                        <div>
                            <p class="text-dark-base text-base md:text-lg font-bold leading-[150%]">
                                Email Official
                            </p>
                            <span class="text-dark-base text-sm md:text-base font-normal leading-[150%]">
                                Info@growkm.com
                            </span>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-start gap-4">
                        <i class="hgi hgi-stroke hgi-headset text-3xl md:text-4xl text-secondaryColors-base"></i>
                        <div>
                            <p class="text-dark-base text-base md:text-lg font-bold leading-[150%]">
                                Nomor Telepon Official
                            </p>
                            <span class="text-dark-base text-sm md:text-base font-normal leading-[150%]">
                                +62 812–3456–7890
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div class="w-full md:w-2/3 space-y-4">
                <!-- FAQ Item 1 -->
                <details class="group border-s-4 border-gray-200 bg-gray-50 p-4 [&_summary::-webkit-details-marker]:hidden hover:border-s-[#007F73] transition-colors duration-300 group-open:border-s-[#007F73]">
                    <summary class="flex items-center justify-between gap-1.5 cursor-pointer">
                        <h2 class="text-base md:text-lg font-medium text-gray-900">
                            Apa itu Platform Growkm?
                        </h2>
                        <svg class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <p class="mt-4 text-gray-700 text-sm md:text-base">
                        Growkm adalah platform edukasi bisnis praktis yang sekaligus menghubungkan pelaku usaha dengan pemasok bahan baku terpercaya.
                        Kami menyediakan solusi lengkap mulai dari pembelajaran bisnis hingga akses ke bahan baku berkualitas untuk mendukung perkembangan usaha Anda.
                    </p>
                </details>

                <!-- FAQ Item 2 -->
                <details class="group border-s-4 border-gray-200 bg-gray-50 p-4 [&_summary::-webkit-details-marker]:hidden hover:border-s-[#007F73] transition-colors duration-300 group-open:border-s-[#007F73]">
                    <summary class="flex items-center justify-between gap-1.5 cursor-pointer">
                        <h2 class="text-base md:text-lg font-medium text-gray-900">
                            Apa saja layanan yang ditawarkan Growkm?
                        </h2>
                        <svg class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <p class="mt-4 text-gray-700 text-sm md:text-base">
                        Growkm menawarkan dua layanan utama:
                        1. <strong>Growkm Event</strong> - Program edukasi bisnis melalui workshop hingga seminar edukatif
                        2. <strong>Supply Hub</strong> - Akses ke bahan baku terpercaya
                    </p>
                </details>

                <!-- FAQ Item 3 -->
                <details class="group border-s-4 border-gray-200 bg-gray-50 p-4 [&_summary::-webkit-details-marker]:hidden hover:border-s-[#007F73] transition-colors duration-300 group-open:border-s-[#007F73]">
                    <summary class="flex items-center justify-between gap-1.5 cursor-pointer">
                        <h2 class="text-base md:text-lg font-medium text-gray-900">
                            Bagaimana cara bergabung dengan Growkm Event?
                        </h2>
                        <svg class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <p class="mt-4 text-gray-700 text-sm md:text-base">
                        Untuk bergabung dengan Growkm Event:
                        1. Daftar akun di platform Growkm
                        2. Pilih program Academy yang sesuai dengan kebutuhan Anda
                        3. Lakukan pembayaran sesuai instruksi
                        4. Anda akan diarahkan menuju grup WhatsApp
                        Semua pelaku usaha UMKM di Indonesia dapat bergabung tanpa syarat khusus.
                    </p>
                </details>

                <!-- FAQ Item 4 -->
                <details class="group border-s-4 border-gray-200 bg-gray-50 p-4 [&_summary::-webkit-details-marker]:hidden hover:border-s-[#007F73] transition-colors duration-300 group-open:border-s-[#007F73]">
                    <summary class="flex items-center justify-between gap-1.5 cursor-pointer">
                        <h2 class="text-base md:text-lg font-medium text-gray-900">
                            Bagaimana proses pemesanan bahan baku melalui Growkm?
                        </h2>
                        <svg class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <p class="mt-4 text-gray-700 text-sm md:text-base">
                        Proses pemesanan bahan baku:
                        1. Cari bahan baku yang dibutuhkan di Supply Hub
                        2. Pilih kemudian lihat detail produk
                        3. Tambahkan ke keranjang dan tentukan jumlah
                        4. Lakukan pembayaran melalui sistem aman kami
                        5. Pantau status pengiriman melalui dashboard akun
                        Kami menjamin kualitas bahan baku dan ketepatan waktu pengiriman.
                    </p>
                </details>

                <!-- FAQ Item 5 -->
                <details class="group border-s-4 border-gray-200 bg-gray-50 p-4 [&_summary::-webkit-details-marker]:hidden hover:border-s-[#007F73] transition-colors duration-300 group-open:border-s-[#007F73]">
                    <summary class="flex items-center justify-between gap-1.5 cursor-pointer">
                        <h2 class="text-base md:text-lg font-medium text-gray-900">
                            Apakah ada biaya keanggotaan untuk menggunakan Growkm?
                        </h2>
                        <svg class="size-5 shrink-0 transition-transform duration-300 group-open:-rotate-180"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </summary>
                    <p class="mt-4 text-gray-700 text-sm md:text-base">
                        Pendaftaran akun dasar di Growkm sepenuhnya gratis. Anda dapat mengakses fitur dasar seperti:
                        - Pencarian bahan baku
                        - Informasi event gratis
                    </p>
                </details>
            </div>
        </div>
    </section>

    <x-icons.arrow-down></x-icons.arrow-down>
</x-layouts.client-side-layout>