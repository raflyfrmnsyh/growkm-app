<aside
    class="desktop-sidebar w-[20%] bg-white border-r-[1px] border-gray-300 h-screen fixed top-0 left-0 z-50 hidden lg:block scroll">
    <div class="sidebar_head-logo px-6 py-4 border-b-[1px] border-gray-300 w-full h-[80px] flex items-center">
        <img src="{{ asset('image/logo-growkm.svg') }}" alt="logo" class="logo cursor-pointer w-[40%] h-auto">
    </div>
    <div class="sidebar_menu my-4 flex flex-col gap-4">
        <ul class="flex flex-col gap-2">
            <span
                class="menu-section w-full py-3 px-6 text-sm text-primaryColors-base font-medium uppercase opacity-45">Aktivitas</span>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full isActive cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.analytic-icon class="size-6 stroke-secondaryColors-base"></x-icons.analytic-icon>
                <a href="{{ url('#') }}"
                    class="text-secondaryColors-base mb-[1px] text-md font-medium">Dashboard</a>
                <div class="line-active absolute left-0 w-[4px] h-full bg-secondaryColors-base rounded-r-lg">
                </div>
            </li>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.transaction-icon class="size-6 stroke-primaryColors-90"></x-icons.transaction-icon>
                <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-md font-normal">Transaksi
                    Event & Kelas</a>
            </li>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.transaction-01-icon class="size-6 stroke-primaryColors-90"></x-icons.transaction-01-icon>
                <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-md font-normal">Transaksi
                    Produk</a>
            </li>
        </ul>

        <ul class="flex flex-col gap-2">
            <span
                class="menu-section w-full py-3 px-6 text-sm text-primaryColors-base font-medium uppercase opacity-45">Kelola
                Data</span>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.calendar class="size-6 stroke-primaryColors-90"></x-icons.calendar>
                <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-md font-normal">Kelola
                    Event & Kelas</a>
            </li>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.box-package class="size-6 stroke-primaryColors-90"></x-icons.box-package>
                <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-md font-normal">Kelola
                    Produk</a>
            </li>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.user-group class="size-6 stroke-primaryColors-90"></x-icons.user-group>
                <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-md font-normal">Kelola
                    Admin</a>
            </li>
        </ul>
        <ul class="flex flex-col gap-2">
            <span
                class="menu-section w-full py-3 px-6 text-sm text-primaryColors-base font-medium uppercase opacity-45">Pengaturan</span>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.web-icon class="size-6 stroke-primaryColors-90"></x-icons.web-icon>
                <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-md font-normal">Web
                    Settings</a>
            </li>
        </ul>


    </div>
</aside>
