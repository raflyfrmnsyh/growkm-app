<html>
<x-partials.head-info>
    <x-slot:title>{{ $title }}</x-slot:title>
</x-partials.head-info>

<body class="bg-gray-100 flex flex-row min-h-screen justify-center items-start">
    <x-dashboards.sidebar></x-dashboards.sidebar>

    <main class="w-[80%] left-[20%] absolute  min-h-screen">
        <header
            class="w-full px-8 py-3 border-b-[1px] border-gray-300 bg-light-base flex gap-4 justify-end items-center h-[80px]">
            <x-partials.dropdown-nav-link :dropdownName="'Program Growkm'" :dropdownClass="'text-md'">
                <x-slot name="linkName">
                    <x-partials.nav-link href="{{ url('/our-partner') }}" class="block px-4 py-2 hover:bg-gray-100">Event
                        & Kelas Gratis</x-partials.nav-link>
                    <x-partials.nav-link href="{{ url('/about-supplier-plus') }}"
                        class="block px-4 py-2 hover:bg-gray-100">Supplier Plus</x-partials.nav-link>
                    <x-partials.nav-link href="{{ url('/our-team') }}" class="block px-4 py-2 hover:bg-gray-100">Program
                        Pendampingan</x-partials.nav-link>
                </x-slot>
            </x-partials.dropdown-nav-link>
            <x-partials.nav-link href="{{ url('$') }}">Pusat Bantuan</x-partials.nav-link>

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
                    class="absolute right-0 mt-6 w-56 bg-white border border-gray-300 rounded-[4px] shadow-lg z-50">
                    <x-partials.nav-link href="{{ url('/profile') }}"
                        class="block px-4 py-2 hover:bg-gray-100">Profile</x-partials.nav-link>
                    <x-partials.nav-link href="{{ url('/setting') }}"
                        class="block px-4 py-2 hover:bg-gray-100">Pengaturan</x-partials.nav-link>
                    <x-partials.nav-link href="{{ url('/logout') }}"
                        class="block px-4 py-2 hover:bg-gray-100">Keluar</x-partials.nav-link>
                </div>
            </div>
        </header>

        <section class="main-content">

        </section>
    </main>

</body>

</html>
