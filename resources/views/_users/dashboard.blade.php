<html>
<x-head-info>
    <x-slot:title>{{ $title }}</x-slot:title>
</x-head-info>

<body class="bg-gray-100 flex flex-row min-h-screen">
    <aside
        class="desktop-sidebar w-[300px] bg-light-base border-r-[1px] border-gray-300 h-screen fixed top-0 left-0 z-50 hidden lg:block">
        <div class="sidebar_head-logo px-6 py-4 border-b-[1px] border-gray-300 w-full">
            <img src="{{ asset('image/logo-growkm.svg') }}" alt="logo" class="logo cursor-pointer w-1/2 h-auto">
        </div>
        <div class="sidebar_menu my-4 ">
            <ul class="flex flex-col gap-2">
                <span
                    class="menu-section w-full py-3 px-6 text-md text-secondaryColors-base font-medium">Aktivitas</span>
                <li
                    class="flex items-center gap-4 px-6 py-3 w-full isActive cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">
                    <i
                        class="hgi hgi-stroke hgi-dashboard-square-setting text-xl text-secondaryColors-base font-semibold"></i>
                    <a href="{{ url('#') }}"
                        class="text-secondaryColors-base mb-[1px] text-lg font-medium">Dashboard</a>
                    <div class="line-active absolute left-0 w-[4px] h-full bg-secondaryColors-base rounded-r-lg">
                    </div>
                    <div
                        class="dot-active absolute right-6 w-5 h-5 rounded-full  border-4 border-secondaryColors-10 bg-secondaryColors-base">
                    </div>
                </li>
                <li
                    class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">

                    <i
                        class="hgi hgi-stroke hgi-dashboard-square-setting text-xl text-primaryColors-90 font-medium"></i>
                    <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-lg font-normal">Kelas &
                        Event Saya</a>
                </li>
                <li
                    class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">

                    <i
                        class="hgi hgi-stroke hgi-dashboard-square-setting text-xl text-primaryColors-90 font-medium"></i>
                    <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-lg font-normal">Sertifikat
                        / Skillbadge</a>
                </li>
                <li
                    class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">

                    <i
                        class="hgi hgi-stroke hgi-dashboard-square-setting text-xl text-primaryColors-90 font-medium"></i>
                    <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-lg font-normal">Supplier
                        Saya</a>
                </li>
                <li
                    class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">

                    <i
                        class="hgi hgi-stroke hgi-dashboard-square-setting text-xl text-primaryColors-90 font-medium"></i>
                    <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-lg font-normal">Program
                        Mentoring</a>
                </li>
            </ul>
            <ul class="flex flex-col gap-2">
                <span
                    class="menu-section w-full py-3 px-6 text-md text-secondaryColors-base font-medium">Transaksi</span>
                <li
                    class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">

                    <i
                        class="hgi hgi-stroke hgi-dashboard-square-setting text-xl text-primaryColors-90 font-medium"></i>
                    <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-lg font-normal">
                        Riwayat Transaksi</a>
                </li>
                <li
                    class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">

                    <i
                        class="hgi hgi-stroke hgi-dashboard-square-setting text-xl text-primaryColors-90 font-medium"></i>
                    <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-lg font-normal">
                        Upgrade Member</a>
                </li>
            </ul>
            <ul class="flex flex-col gap-2">
                <span class="menu-section w-full py-3 px-6 text-md text-secondaryColors-base font-medium">Lainnya</span>
                <li
                    class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">

                    <i
                        class="hgi hgi-stroke hgi-dashboard-square-setting text-xl text-primaryColors-90 font-medium"></i>
                    <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-lg font-normal">
                        Pengaturan</a>
                </li>
                <li
                    class="flex items-center gap-4 px-6 py-3 w-full cursor-pointer relative hover:bg-[#007f7310] transition-all duration-300 ease-in-out">

                    <i
                        class="hgi hgi-stroke hgi-dashboard-square-setting text-xl text-primaryColors-90 font-medium"></i>
                    <a href="{{ url('#') }}" class="text-primaryColors-90 mb-[1px] text-lg font-normal">
                        Logout</a>
                </li>
            </ul>
        </div>
    </aside>

    {{-- <header class="dashboard-header">

    </header>

    <main class="dashboard-content">

    </main> --}}
</body>

</html>
