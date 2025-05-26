<div
    class="mobile_header  fixed flex w-full lg:hidden px-4 py-3 border-b-[1px] border-gray-300 bg-light-base justify-between items-center h-[80px]">
    <img src="{{ asset('image/logo-growkm.svg') }}" alt="logo" class="logo h-[70%]  cursor-pointer">

    <div x-data="{ open: false }" x-transition>
        <x-partials.hamburger-button></x-partials.hamburger->

            <div x-show="open" click.outside="open = false" x-transition
                class="absolute bg-light-base w-full top-[80px] h-screen left-0 px-4 py-6  z-50">
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
                        <x-icons.dashboard-icon class="size-6 stroke-secondaryColors-base"></x-icons.dashboard-icon>
                        <a href="{{ url('#') }}"
                            class="text-secondaryColors-base mb-[1px] text-md font-medium">Dashboard</a>
                        <div class="line-active absolute left-0 w-[4px] h-full bg-secondaryColors-base rounded-r-lg">
                        </div>
                    </li>
                    <li
                        class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                        <x-icons.computer-user class="size-6 stroke-primaryColors-90"></x-icons.computer-user>
                        <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-md font-normal">Kelas &
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
                        <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-md font-normal">Program
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
                        <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-md font-normal">Riwayat
                            Transaksi</a>
                    </li>
                    <li
                        class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                        <x-icons.star-medal class="size-6 stroke-primaryColors-90"></x-icons.star-medal>
                        <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-md font-normal">Upgrade
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
