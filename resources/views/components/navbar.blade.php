<nav class="w-full px-[24px] py-4 md:px-[64px] md:py-6 bg-white flex justify-between items-center relative z-50">
    <!-- Logo -->
    <x-logo href="{{ url('/') }}"></x-logo>

    <!-- Mobile Hamburger -->
    <div x-data="{ open: false }" class="md:hidden">
        <x-hamburger-button></x-hamburger-button>

        <!-- Mobile Dropdown Menu -->
        <div x-show="open" @click.outside="open = false" x-transition
            class="absolute top-full left-0 w-full bg-white ring-1 ring-gray-200 py-5 px-6 text-dark-base z-50 flex flex-col gap-6 shadow-none text-md">

            <x-nav-link href="{{ url('/') }}">Beranda</x-nav-link>
            <x-nav-link href="#">Program Growkm</x-nav-link>

            <!-- Mobile: Sumber Daya / Dropdown-->
            <x-dropdown-nav-link :dropdownName="'Sumber Daya'">
                <x-slot name="linkName">
                    <x-nav-link href="{{ url('/our-partner') }}">Mitra Growkm</x-nav-link>
                    <x-nav-link href="{{ url('/about-supplier-plus') }}">Tentang Supplier+</x-nav-link>
                    <x-nav-link href="{{ url('/our-team') }}">Tim Growkm</x-nav-link>
                </x-slot>
            </x-dropdown-nav-link>

            <x-nav-link href="#">Testimoni</x-nav-link>
            <x-nav-link href="#">Pusat Bantuan</x-nav-link>

            <!-- Mobile: Bahasa & Auth -->
            <div class=" border-gray-200 flex flex-col gap-4">
                <x-dropdown-nav-link :dropdownName="'ID'">
                    <x-slot name="beforeIcon">
                        <i class="hgi hgi-stroke hgi-globe-02"></i>
                    </x-slot>

                    <x-slot name="linkName">
                        <x-nav-link href="#">ID - Indonesia</x-nav-link>
                        <x-nav-link href="#">EN - Inggris</x-nav-link>
                    </x-slot>
                </x-dropdown-nav-link>

                <a href="{{ url('/auth/register') }}"
                    class="rounded border border-dark-base text-dark-base text-center px-4 py-3 hover:bg-gray-50 transition">Daftar</a>
                <a href="{{ url('/auth/login') }}"
                    class="rounded bg-dark-base text-white text-center px-4 py-3 hover:bg-gray-900 transition">Masuk</a>
            </div>
        </div>
    </div>

    <!-- Desktop Menu -->
    <ul class="items-center gap-8 text-lg hidden md:flex">
        <x-nav-link href="{{ url('/') }}">Beranda</x-nav-link>
        <x-nav-link href="{{ url('#') }}">Program Growkm</x-nav-link>
        <x-dropdown-nav-link :dropdownName="'Sumber Daya'">
            <x-slot name="linkName">
                <x-nav-link href="{{ url('/our-partner') }}">Mitra Growkm</x-nav-link>
                <x-nav-link href="{{ url('/about-supplier-plus') }}">Tentang Supplier+</x-nav-link>
                <x-nav-link href="{{ url('/our-team') }}">Tim Growkm</x-nav-link>
            </x-slot>
        </x-dropdown-nav-link>


        <x-nav-link href="{{ url('#') }}">Testimoni</x-nav-link>
        <x-nav-link href="{{ url('#') }}">Pusat Bantuan</x-nav-link>
        <div class="vertical-line w-[1px] h-[32px] bg-dark-30"></div>

        <li>
            <div class="flex items-center gap-4">
                <x-dropdown-nav-link :dropdownName="'ID'">
                    <x-slot name="beforeIcon">
                        <i class="hgi hgi-stroke hgi-globe-02"></i>
                    </x-slot>
                    <x-slot name="linkName">
                        <x-nav-link href="#">ID - Indonesia</x-nav-link>
                        <x-nav-link href="#">EN - Inggris</x-nav-link>
                    </x-slot>
                </x-dropdown-nav-link>
                <a href="{{ url('/auth/register') }}"
                    class="btn px-3 py-2 border border-dark-base bg-transparent text-dark-base rounded-[4px]">Daftar</a>
                <a href="{{ url('/auth/login') }}"
                    class="btn px-3 py-2 border border-dark-base bg-dark-base text-light-base rounded-[4px]">Masuk</a>
            </div>
        </li>
    </ul>
</nav>
