<header
    class=" desktop_header fixed w-[80%] hidden px-8 py-3 border-b-[1px] border-gray-300 bg-white lg:flex gap-4 justify-end items-center h-[80px] z-20">

    <div x-data="{ isOpen: false }" class="relative">
        <div class="profile-menu flex items-center gap-2 cursor-pointer" @click="isOpen = !isOpen">
            <div class="profile-img w-[44px] h-[44px] rounded-[4px] bg-gray-300 overflow-hidden">
                <img src="{{ asset('image/dummy-profile.png') }}" alt="profile" class="w-full h-full object-cover">
            </div>
            <div class="profile-name">
                <div class="flex items-center gap-1">
                    <h5 class="_name font-medium">Rafly Firmansyah</h5>
                    <x-icons.verify-icon></x-icons.verify-icon>
                </div>
                <span class="text-sm text-gray-600">Super Admin</span>
            </div>
        </div>
        <div x-show="isOpen" x-transition
            class="absolute right-0 mt-[22px] w-56 bg-white border border-gray-300 rounded-[4px] shadow-lg z-50">
            <x-partials.nav-link href="{{ url('/profile') }}"
                class="block px-4 py-2 hover:bg-gray-100">Profile</x-partials.nav-link>
            <x-partials.nav-link href="{{ url('/setting') }}"
                class="block px-4 py-2 hover:bg-gray-100">Pengaturan</x-partials.nav-link>
            <x-partials.nav-link href="{{ url('/logout') }}"
                class="block px-4 py-2 hover:bg-gray-100">Logout</x-partials.nav-link>
        </div>
    </div>
</header>
