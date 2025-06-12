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
                class="flex items-center gap-4 px-6 py-3 w-full {{ request()->routeIs('admin.dashboard') ? 'isActive' : '' }} cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.analytic-icon
                    class="size-6 {{ request()->routeIs('admin.dashboard') ? 'stroke-secondaryColors-base' : 'stroke-primaryColors-90' }}"></x-icons.analytic-icon>
                <a href="{{ route('admin.dashboard') }}"
                    class="{{ request()->routeIs('admin.dashboard') ? 'text-secondaryColors-base font-medium' : 'text-primaryColors-90 font-normal' }} mb-[1px] text-md">Dashboard</a>
                @if (request()->routeIs('admin.dashboard'))
                    <div class="line-active absolute left-0 w-[4px] h-full bg-secondaryColors-base rounded-r-lg"></div>
                @endif
            </li>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full {{ request()->routeIs('admin.transaction-event') ? 'isActive' : '' }} cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.transaction-icon
                    class="size-6 {{ request()->routeIs('admin.transaction-event') ? 'stroke-secondaryColors-base' : 'stroke-primaryColors-90' }}"></x-icons.transaction-icon>
                <a href="{{ route('admin.transaction-event') }}"
                    class="{{ request()->routeIs('admin.transaction-event') ? 'text-secondaryColors-base font-medium' : 'text-primaryColors-90 font-normal' }} mb-[1px] text-md">Transaksi
                    Event & Kelas</a>
                @if (request()->routeIs('admin.transaction-event'))
                    <div class="line-active absolute left-0 w-[4px] h-full bg-secondaryColors-base rounded-r-lg"></div>
                @endif
            </li>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full {{ request()->routeIs('admin.transaction-product') ? 'isActive' : '' }} cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.transaction-01-icon
                    class="size-6 {{ request()->routeIs('admin.transaction-product') ? 'stroke-secondaryColors-base' : 'stroke-primaryColors-90' }}"></x-icons.transaction-01-icon>
                <a href="{{ route('admin.transaction-product') }}"
                    class="{{ request()->routeIs('admin.transaction-product') ? 'text-secondaryColors-base font-medium' : 'text-primaryColors-90 font-normal' }} mb-[1px] text-md">Transaksi
                    Product</a>
                @if (request()->routeIs('admin.transaction-product'))
                    <div class="line-active absolute left-0 w-[4px] h-full bg-secondaryColors-base rounded-r-lg"></div>
                @endif
            </li>

        </ul>

        <ul class="flex flex-col gap-2">
            <span
                class="menu-section w-full py-3 px-6 text-sm text-primaryColors-base font-medium uppercase opacity-45">Kelola
                Data</span>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full {{ request()->routeIs('admin.manage.event') ? 'isActive' : '' }} cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.calendar
                    class="size-6 {{ request()->routeIs('admin.manage.event') ? 'stroke-secondaryColors-base' : 'stroke-primaryColors-90' }}"></x-icons.calendar>
                <a href="{{ route('admin.manage.event') }}"
                    class="{{ request()->routeIs('admin.manage.event') ? 'text-secondaryColors-base font-medium' : 'text-primaryColors-90 font-normal' }} mb-[1px] text-md">Kelola
                    Event & Kelas</a>
                @if (request()->routeIs('admin.manage.event'))
                    <div class="line-active absolute left-0 w-[4px] h-full bg-secondaryColors-base rounded-r-lg"></div>
                @endif
            </li>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full {{ request()->routeIs('admin.manage.product') ? 'isActive' : '' }} cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.box-package
                    class="size-6 {{ request()->routeIs('admin.manage.product') ? 'stroke-secondaryColors-base' : 'stroke-primaryColors-90' }}"></x-icons.box-package>
                <a href="{{ route('admin.manage.product') }}"
                    class="{{ request()->routeIs('admin.manage.product') ? 'text-secondaryColors-base font-medium' : 'text-primaryColors-90 font-normal' }} mb-[1px] text-md">Kelola
                    Produk</a>
                @if (request()->routeIs('admin.manage.product'))
                    <div class="line-active absolute left-0 w-[4px] h-full bg-secondaryColors-base rounded-r-lg"></div>
                @endif
            </li>
            <li
                class="flex items-center gap-4 px-6 py-3 w-full {{ request()->routeIs('admin.manage.admin') ? 'isActive' : '' }} cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                <x-icons.user-group
                    class="size-6 {{ request()->routeIs('admin.manage.admin') ? 'stroke-secondaryColors-base' : 'stroke-primaryColors-90' }}"></x-icons.user-group>
                <a href="{{ route('admin.manage.admin') }}"
                    class="{{ request()->routeIs('admin.manage.admin') ? 'text-secondaryColors-base font-medium' : 'text-primaryColors-90 font-normal' }} mb-[1px] text-md">Kelola
                    Admin</a>
                @if (request()->routeIs('admin.manage.admin'))
                    <div class="line-active absolute left-0 w-[4px] h-full bg-secondaryColors-base rounded-r-lg"></div>
                @endif
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
