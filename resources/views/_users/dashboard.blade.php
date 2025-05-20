<html>
<x-partials.head-info>
    <x-slot:title>{{ $title }}</x-slot:title>
</x-partials.head-info>

<body class="bg-gray-100 flex flex-row justify-center items-start">
    <x-dashboards.sidebar></x-dashboards.sidebar>

    <main class="w-full lg:w-[80%] lg:left-[20%] absolute ">
        {{-- Mobile Header --}}
        <div
            class="mobile_header flex w-full lg:hidden px-4 py-3 border-b-[1px] border-gray-300 bg-light-base justify-between items-center h-[80px]">
            <img src="{{ asset('image/logo-growkm.svg') }}" alt="logo" class="logo h-[70%]  cursor-pointer">

            <div x-data="{ open: false }" x-transition>
                <x-partials.hamburger-button></x-partials.hamburger->

                    <div x-show="open" click.outside="open = false" x-transition
                        class="absolute bg-light-base w-full top-full h-screen left-0 px-4 py-6">
                        {{-- profile --}}
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('image/dummy-profile.png') }}" alt="profile"
                                    class="w-[72px] h-[72px] rounded-[4px] bg-gray-300 overflow-hidden">
                                <div class="profile-name">
                                    <div class="flex items-center gap-1">
                                        <h5 class="_name font-medium">Rafly Firmansyah</h5>
                                        <x-icons.verify-icon></x-icons.verify-icon>
                                    </div>
                                    <span class="text-sm text-gray-600">Basic Member</span>
                                </div>
                            </div>

                            <a href="{{ url('#') }}"
                                class="flex items-center gap-2 px-4 py-2 border border-gray-300 rounded-[4px] bg-light-base">
                                <x-icons.user-edit class="stroke-dark-base size-6"></x-icons.user-edit>
                                <span>Edit profile</span>
                            </a>
                        </div>
                        {{-- menu --}}
                        <ul class="flex flex-col gap-2">
                            <span
                                class="menu-section w-full py-3 text-sm text-primaryColors-base font-medium uppercase opacity-45">Aktivitas</span>
                            <li
                                class="flex items-center gap-4 px-6 py-3 w-full isActive cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                                <x-icons.dashboard-icon
                                    class="size-6 stroke-secondaryColors-base"></x-icons.dashboard-icon>
                                <a href="{{ url('#') }}"
                                    class="text-secondaryColors-base mb-[1px] text-md font-medium">Dashboard</a>
                                <div
                                    class="line-active absolute left-0 w-[4px] h-full bg-secondaryColors-base rounded-r-lg">
                                </div>
                            </li>
                            <li
                                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                                <x-icons.computer-user class="size-6 stroke-primaryColors-90"></x-icons.computer-user>
                                <a href="{{ url('#') }}"
                                    class="text-primaryColors-90 mb-[1px] text-md font-normal">Kelas &
                                    Event Saya</a>
                            </li>
                            <li
                                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                                <x-icons.package-search class="size-6 stroke-primaryColors-90"></x-icons.package-search>
                                <a href="{{ url('#') }}"
                                    class="text-primaryColors-90 mb-[1px] text-md font-normal">Supplier
                                    Saya</a>
                            </li>
                            <li
                                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                                <x-icons.courses-icon class="size-6 stroke-primaryColors-90"></x-icons.courses-icon>
                                <a href="{{ url('#') }}"
                                    class="text-primaryColors-90 mb-[1px] text-md font-normal">Program
                                    Mentoring</a>
                            </li>

                        </ul>
                        <ul class="flex flex-col gap-2">
                            <span
                                class="menu-section w-full py-3 text-sm text-primaryColors-base font-medium uppercase opacity-45">Transaksi</span>
                            <li
                                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                                <x-icons.history-transaction
                                    class="size-6 stroke-primaryColors-90"></x-icons.history-transaction>
                                <a href="{{ url('#') }}"
                                    class="text-primaryColors-90 mb-[1px] text-md font-normal">Riwayat
                                    Transaksi</a>
                            </li>
                            <li
                                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                                <x-icons.star-medal class="size-6 stroke-primaryColors-90"></x-icons.star-medal>
                                <a href="{{ url('#') }}"
                                    class="text-primaryColors-90 mb-[1px] text-md font-normal">Upgrade
                                    Member</a>
                            </li>
                        </ul>
                        <ul class="flex flex-col gap-2">
                            <span
                                class="menu-section w-full py-3 text-sm text-primaryColors-base font-medium uppercase opacity-45">Lainnya</span>
                            <li
                                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                                <x-icons.settings class="size-6 stroke-primaryColors-90"></x-icons.settings>
                                <a href="{{ url('#') }}"
                                    class="text-primaryColors-90 mb-[1px] text-md font-normal">Pengaturan</a>
                            </li>
                            <li
                                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                                <x-icons.logout-icon class="size-6 stroke-primaryColors-90"></x-icons.logout-icon>
                                <a href="{{ url('#') }}"
                                    class="text-primaryColors-90 mb-[1px] text-md font-normal">Logout</a>
                            </li>
                        </ul>
                    </div>
            </div>

        </div>

        {{-- Desktop Header --}}
        <header
            class=" desktop_header hidden px-8 py-3 border-b-[1px] border-gray-300 bg-light-base lg:flex gap-4 justify-end items-center h-[80px]">

            <x-partials.dropdown-nav-link :dropdownName="'Program Growkm'" :dropdownClass="'text-md'">
                <x-slot name="linkName">
                    <x-partials.nav-link href="{{ url('/our-partner') }}"
                        class="block px-4 py-2 hover:bg-gray-100">Event
                        & Kelas Gratis</x-partials.nav-link>
                    <x-partials.nav-link href="{{ url('/about-supplier-plus') }}"
                        class="block px-4 py-2 hover:bg-gray-100">Supplier Plus</x-partials.nav-link>
                    <x-partials.nav-link href="{{ url('/our-team') }}"
                        class="block px-4 py-2 hover:bg-gray-100">Program
                        Pendampingan</x-partials.nav-link>
                </x-slot>
            </x-partials.dropdown-nav-link>
            <x-partials.nav-link href="{{ url('$') }}" class="hidden md:block">Pusat
                Bantuan</x-partials.nav-link>

            <div x-data="{ isOpen: false }" class="relative">
                <div class="profile-menu flex items-center gap-2 cursor-pointer" @click="isOpen = !isOpen">
                    <div class="profile-img w-[44px] h-[44px] rounded-[4px] bg-gray-300 overflow-hidden">
                        <img src="{{ asset('image/dummy-profile.png') }}" alt="profile"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="profile-name">
                        <div class="flex items-center gap-1">
                            <h5 class="_name font-medium">Rafly Firmansyah</h5>
                            <x-icons.verify-icon></x-icons.verify-icon>
                        </div>
                        <span class="text-sm text-gray-600">Basic Member</span>
                    </div>
                </div>
                <div x-show="isOpen" x-transition
                    class="absolute right-0 mt-[22px] w-56 bg-white border border-gray-300 rounded-[4px] shadow-lg z-50">
                    <x-partials.nav-link href="{{ url('/profile') }}"
                        class="block px-4 py-2 hover:bg-gray-100">Profile</x-partials.nav-link>
                    <x-partials.nav-link href="{{ url('/setting') }}"
                        class="block px-4 py-2 hover:bg-gray-100">Pengaturan</x-partials.nav-link>
                    <x-partials.nav-link href="{{ url('/logout') }}"
                        class="block px-4 py-2 hover:bg-gray-100">Keluar</x-partials.nav-link>
                </div>
            </div>
        </header>

        <section class="section_content flex items-start gap-4 m-8">
            <div class="main-content w-[70%]  ">
                <div class="stat-dash">
                    <div
                        class="stat-dash_header px-6 py-4 rounded-t-lg bg-[linear-gradient(90deg,_#003C43_0%,_#007F73_52.31%,_#E4C46E_100%)] w-full">
                        <h2 class="text-md font-semibold text-light-base">Dashboard</h2>
                    </div>
                    <div class="stat-dash_body bg-light-base p-6 rounded-b-lg">
                        <div class="greating">
                            <h2 class="text-xl font-semibold">Halo, Rafly Firmansyah!</h2>
                            <span class="text-sm my-2">Mulai Belajar dan aktif mengikuti event bisnis di Growkm</span>
                        </div>
                        <div class="stat-dash_main mt-6 flex items-center gap-2 justify-between">
                            <div class="card-stat flex items-center gap-4">
                                <div class="icons p-2 rounded-[4px] bg-secondaryColors-10">
                                    <x-icons.computer-user class="stroke-secondaryColors-base"></x-icons.computer->
                                </div>
                                <div class="card-detail">
                                    <h2 class="total text-xl font-bold">24</h2>
                                    <span class="label text-sm"> Total Kelas & Event Diikuti</span>
                                </div>
                            </div>
                            <div class="card-stat flex items-center gap-4">
                                <div class="icons p-2 rounded-[4px] bg-secondaryColors-10">
                                    <x-icons.certificate class="stroke-secondaryColors-base"></x-icons.certificate>
                                </div>
                                <div class="card-detail">
                                    <h2 class="total text-xl font-bold">24</h2>
                                    <span class="label text-sm"> Total Kelas & Event Diikuti</span>
                                </div>
                            </div>
                            <div class="card-stat flex items-center gap-4">
                                <div class="icons p-2 rounded-[4px] bg-secondaryColors-10">
                                    <x-icons.package-search
                                        class="stroke-secondaryColors-base"></x-icons.package-search>
                                </div>
                                <div class="card-detail">
                                    <h2 class="total text-xl font-bold">24</h2>
                                    <span class="label text-sm"> Total Kelas & Event Diikuti</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="course-progress bg-light-base p-6 mt-6 rounded-lg">
                    <div class="course-progress_head flex items-center justify-between">
                        <h2 class="text-lg">Lanjutkan Progress</h2>
                        <a class="font-medium text-secondaryColors-base text-md"
                            href="{{ url('#') }}">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="my_event w-[40%] bg-light-base">
                Event Terdekat
            </div>

        </section>
    </main>

</body>

</html>
