<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.hugeicons.com/font/hgi-stroke-rounded.css" />

</head>

<body>

    <header class="bg-slate-600 relatiive">
        <section x-data="{ show: true }" x-show="show"
            class="promo_alert hidden md:flex justify-center p-2.5
            bg-dark-base text-light-base text-md relative justify-items-center">
            <div class="flex gap-2 font-main">
                <p>Dapatkan Kesempatan mengembangkan bisnis dengan mudah dan cepat bersama growkm</p>
                <i class="hgi hgi-stroke hgi-arrow-right-02"></i>
                <a href="#"
                    class="text-yellowLight-base font-semibold hover:underline hover:underline-offset-1">Bergabung
                    Sekarang</a>
            </div>
            <button x-on:click="show = false"
                class="absolute right-[64px] top-0 text-2xl h-full flex justify-center justify-items-center hover:opacity-90">
                <i class="hgi hgi-stroke hgi-cancel-01 mt-[4px]"></i>
            </button>
        </section>
        <nav
            class="w-full px-[24px] py-4 md:px-[64px] md:py-6 bg-white flex justify-between items-center relative z-50">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="logo w-[124px] md:w-full">
                <img src="{{ @asset('image/logo-growkm.svg') }}" alt="logo">
            </a>

            <!-- Mobile Hamburger -->
            <div x-data="{ open: false }" class="md:hidden">
                <button @click="open = !open" class="text-dark-base">
                    <template x-if="!open">
                        <i class="hgi hgi-stroke hgi-menu-01 text-2xl"></i>
                    </template>
                    <template x-if="open">
                        <i class="hgi hgi-stroke hgi-cancel-01 text-2xl"></i>
                    </template>
                </button>

                <!-- Mobile Dropdown Menu -->
                <div x-show="open" @click.outside="open = false" x-transition
                    class="absolute top-full left-0 w-full bg-white ring-1 ring-gray-200 py-5 px-6 text-dark-base z-50 flex flex-col gap-6 shadow-none text-md">

                    <a href="#" class="hover:text-primaryColors-500 transition">Beranda</a>
                    <a href="#" class="hover:text-primaryColors-500 transition">Program Growkm</a>

                    <!-- Mobile: Sumber Daya -->
                    <div x-data="{ childOpen: false }" class="flex flex-col">
                        <button @click="childOpen = !childOpen"
                            class="flex justify-between items-center w-full hover:text-primaryColors-500 transition">
                            <span>Sumber Daya</span>
                            <i :class="childOpen ? 'rotate-180' : ''"
                                class="transition-transform hgi hgi-stroke hgi-arrow-down-01 text-md"></i>
                        </button>
                        <div x-show="childOpen" x-transition
                            class="pl-4 mt-6 flex flex-col gap-6 text-primaryColors-500 text-md">
                            <a href="#" class="hover:text-primaryColors-500 transition">Mitra GrowKM</a>
                            <a href="#" class="hover:text-primaryColors-500 transition">Tentang Supplier+</a>
                            <a href="#" class="hover:text-primaryColors-500 transition">Tim GrowKM</a>
                        </div>
                    </div>

                    <a href="#" class="hover:text-primaryColors-500 transition">Testimoni</a>
                    <a href="#" class="hover:text-primaryColors-500 transition">Bantuan</a>

                    <!-- Mobile: Bahasa & Auth -->
                    <div class=" border-gray-200 flex flex-col gap-4">
                        <div x-data="{ childOpen: false }" class="flex flex-col mb-2">
                            <button @click="childOpen = !childOpen"
                                class="flex justify-between items-center w-full hover:text-primaryColors-500 transition">
                                <div class="flex items-center gap-2">
                                    <i class="hgi hgi-stroke hgi-globe-02 text-md"></i>
                                    <span>ID</span>
                                </div>
                                <i class="hgi hgi-stroke hgi-arrow-down-01 text-md"></i>
                            </button>
                            <div x-show="childOpen" x-transition
                                class="pl-4 mt-6 flex flex-col gap-6 text-md text-primaryColors-600">
                                <a href="#" class="hover:text-primaryColors-500 transition">ID - Indonesia</a>
                                <a href="#" class="hover:text-primaryColors-500 transition">EN - Inggris</a>
                            </div>
                        </div>

                        <a href="#"
                            class="rounded border border-dark-base text-dark-base text-center px-4 py-3 hover:bg-gray-50 transition">Daftar</a>
                        <a href="#"
                            class="rounded bg-dark-base text-white text-center px-4 py-3 hover:bg-gray-900 transition">Masuk</a>
                    </div>
                </div>
            </div>

            <!-- Desktop Menu -->
            <ul class="_nav-menu items-center gap-8 text-lg hidden md:flex">
                <li><a href="#" class="_nav-link whitespace-nowrap">Beranda</a></li>
                <li><a href="#" class="_nav-link whitespace-nowrap">Program Growkm</a></li>
                <li x-data="{ open: false }" class="relative">
                    <a href="#" @click.prevent="open = !open"
                        class="_nav-link flex items-center gap-1 cursor-pointer leading-none whitespace-nowrap">
                        <span>Sumber Daya</span>
                        <i class="hgi hgi-stroke hgi-arrow-down-01 text-[20px] flex items-center mt-1"></i>
                    </a>
                    <div x-show="open" @click.outside="open = false" x-transition
                        class="absolute mt-6 w-48 border border-gray-300 bg-white z-50 text-md rounded-[4px] text-primaryColors-700">
                        <a href="#" class="block p-3 hover:bg-primaryColors-10">Mitra GrowKM</a>
                        <a href="#" class="block p-3 hover:bg-primaryColors-10">Tentang Supplier+</a>
                        <a href="#" class="block p-3 hover:bg-primaryColors-10">Tim GrowKM</a>
                    </div>
                </li>
                <li><a href="#" class="_nav-link whitespace-nowrap">Testimoni</a></li>
                <li><a href="#" class="_nav-link whitespace-nowrap">Bantuan</a></li>
                <li>
                    <div class="vertical-line w-[1px] h-[32px] bg-dark-30"></div>
                </li>
                <li>
                    <div class="flex items-center gap-4">
                        <div x-data="{ open: false }" class="relative">
                            <a href="#" @click.prevent="open = !open"
                                class="_nav-link flex items-center gap-2 cursor-pointer leading-none whitespace-nowrap">
                                <i class="hgi hgi-stroke hgi-globe-02 text-[20px] flex items-center"></i>
                                <span>ID</span>
                                <i class="hgi hgi-stroke hgi-arrow-down-01 text-[20px] flex items-center mt-1"></i>
                            </a>
                            <div x-show="open" @click.outside="open = false" x-transition
                                class="absolute mt-6 w-36 border border-gray-300 bg-white z-50 text-md rounded-[4px] text-primaryColors-700">
                                <a href="#" class="block p-3 hover:bg-primaryColors-10">ID - Indonesia</a>
                                <a href="#" class="block p-3 hover:bg-primaryColors-10">EN - Inggris</a>
                            </div>
                        </div>
                        <a href="#"
                            class="btn px-3 py-2 border border-dark-base bg-transparent text-dark-base rounded-[4px]">Daftar</a>
                        <a href="#"
                            class="btn px-3 py-2 border border-dark-base bg-dark-base text-light-base rounded-[4px]">Masuk</a>
                    </div>
                </li>
            </ul>
        </nav>


    </header>

</body>

</html>
