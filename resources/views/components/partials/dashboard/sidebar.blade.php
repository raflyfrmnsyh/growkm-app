<aside
    class="desktop-sidebar w-[20%] bg-white border-r-[1px] border-gray-300 h-screen fixed top-0 left-0 z-50 hidden lg:block scroll">
    <div class="sidebar_head-logo px-6 py-4 border-b-[1px] border-gray-300 w-full h-[80px] flex items-center">
        <img src="{{ asset('image/logo-growkm.svg') }}" alt="logo" class="logo cursor-pointer w-[40%] h-auto">
    </div>
    <div class="sidebar_menu my-4 ">
        <ul class="flex flex-col gap-2">
            <span
                class="menu-section w-full py-3 px-6 text-sm text-primaryColors-base font-medium uppercase opacity-45">Aktivitas</span>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full isActive cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.dashboard-icon class="size-6 stroke-secondaryColors-base"></x-icons.dashboard-icon>
                <a href="{{ route('user.dashboard') }}"
                    class="text-secondaryColors-base mb-[1px] text-md font-medium">Dashboard</a>
                <div class="line-active absolute left-0 w-[4px] h-full bg-secondaryColors-base rounded-r-lg">
                </div>
            </li>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.computer-user class="size-6 stroke-primaryColors-90"></x-icons.computer-user>
                <a href="{{ route('events.data') }}" class="text-primaryColors-90 mb-[1px] text-md font-normal">Pusat
                    Event & Kelas</a>
            </li>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.package-search class="size-6 stroke-primaryColors-90"></x-icons.package-search>
                <a href="{{ route('product.list') }}" class="text-primaryColors-90 mb-[1px] text-md font-normal">Pusat
                    Supplier
                </a>
            </li>

        </ul>
        <ul class="flex flex-col gap-2">
            <span
                class="menu-section w-full py-3 px-6 text-sm text-primaryColors-base font-medium uppercase opacity-45">Transaksi</span>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.history-transaction class="size-6 stroke-primaryColors-90"></x-icons.history-transaction>
                <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-md font-normal">Riwayat
                    Transaksi</a>
            </li>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.save-01 class="size-6 stroke-primaryColors-90"></x-icons.save-01>
                <a href="{{ route('history.event') }}"
                    class="text-primaryColors-90 mb-[1px] text-md font-normal">Riwayat
                    Event & Kelas</a>
            </li>
        </ul>
        <ul class="flex flex-col gap-2">
            <span
                class="menu-section w-full py-3 px-6 text-sm text-primaryColors-base font-medium uppercase opacity-45">Lainnya</span>

            <li
                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.settings class="size-6 stroke-primaryColors-90"></x-icons.settings>
                <a href="{{ route('profile.info') }}"
                    class="text-primaryColors-90 mb-[1px] text-md font-normal">Pengaturan</a>
            </li>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.logout-icon class="size-6 stroke-primaryColors-90"></x-icons.logout-icon>
                <a href="{{ route('auth.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="text-primaryColors-90 mb-[1px] text-md font-normal">Logout</a>
                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>
