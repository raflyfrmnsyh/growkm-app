<nav class="w-full px-[24px] py-4 md:px-[64px] md:py-6 bg-white flex justify-between items-center relative z-50">
    <!-- Logo -->
    <x-partials.logo href="{{ url('/') }}"></x-partials.logo>

    <!-- Mobile Hamburger -->
    <div x-data="{ open: false }" class="lg:hidden">
        <x-partials.hamburger-button></x-partials.hamburger-button>

        <!-- Mobile Dropdown Menu -->
        <div x-show="open" @click.outside="open = false" x-transition
            class="absolute top-full left-0 w-full bg-white ring-1 ring-gray-200 py-5 px-6 text-dark-base z-50 flex flex-col gap-6 shadow-none text-md">
            <x-partials.nav-link href="#beranda" class="{{ request()->is('/') || request()->is('#beranda') ? 'text-primaryColors-base font-semibold' : '' }}">
                Beranda
            </x-partials.nav-link>

            <x-partials.nav-link href="#program" class="{{ request()->is('#program') ? 'text-primaryColors-base font-semibold' : '' }}">
                Program Growkm
            </x-partials.nav-link>

            <x-partials.nav-link href="#event" class="{{ request()->is('#event') ? 'text-primaryColors-base font-semibold' : '' }}">
                Growkm Event
            </x-partials.nav-link>

            <x-partials.nav-link href="#testimoni" class="{{ request()->is('#testimoni') ? 'text-primaryColors-base font-semibold' : '' }}">
                Testimoni
            </x-partials.nav-link>

            <x-partials.nav-link href="#bantuan" class="{{ request()->is('#bantuan') ? 'text-primaryColors-base font-semibold' : '' }}">
                Pusat Bantuan
            </x-partials.nav-link>

            <!-- Mobile: Bahasa & Auth -->
            <div class=" border-gray-200 flex flex-col gap-4">
                <x-partials.dropdown-nav-link :dropdownName="'ID'">
                    <x-slot name="beforeIcon">
                        <i class="hgi hgi-stroke hgi-globe-02"></i>
                    </x-slot>

                    <x-slot name="linkName">
                        <x-partials.nav-link href="#">ID - Indonesia</x-partials.nav-link>
                        <x-partials.nav-link href="#">EN - Inggris</x-partials.nav-link>
                    </x-slot>
                </x-partials.dropdown-nav-link>

                <a href="{{ url('/auth/register') }}"
                    class="rounded border border-dark-base text-dark-base text-center px-4 py-3 hover:bg-gray-50 transition">Daftar</a>
                <a href="{{ url('/auth/login') }}"
                    class="rounded bg-dark-base text-white text-center px-4 py-3 hover:bg-gray-900 transition">Masuk</a>
            </div>
        </div>
    </div>

    <!-- Desktop Menu -->
    <ul class="items-center gap-8 text-lg hidden lg:flex">
        <x-partials.nav-link href="#beranda" class="{{ request()->is('/') || request()->is('#beranda') ? 'text-primaryColors-base font-semibold' : '' }}">
            Beranda
        </x-partials.nav-link>

        <x-partials.nav-link href="#program" class="{{ request()->is('#program') ? 'text-primaryColors-base font-semibold' : '' }}">
            Program Growkm
        </x-partials.nav-link>

        <x-partials.nav-link href="#event" class="{{ request()->is('#event') ? 'text-primaryColors-base font-semibold' : '' }}">
            Growkm Event
        </x-partials.nav-link>

        <x-partials.nav-link href="#testimoni" class="{{ request()->is('#testimoni') ? 'text-primaryColors-base font-semibold' : '' }}">
            Testimoni
        </x-partials.nav-link>

        <x-partials.nav-link href="#bantuan" class="{{ request()->is('#bantuan') ? 'text-primaryColors-base font-semibold' : '' }}">
            Pusat Bantuan
        </x-partials.nav-link>
        <div class="vertical-line w-[1px] h-[32px] bg-dark-30"></div>

        <li>
            <div class="flex items-center gap-4">
                <x-partials.dropdown-nav-link :dropdownName="'ID'">
                    <x-slot name="beforeIcon">
                        <i class="hgi hgi-stroke hgi-globe-02"></i>
                    </x-slot>
                    <x-slot name="linkName">
                        <x-partials.nav-link href="#">ID - Indonesia</x-partials.nav-link>
                        <x-partials.nav-link href="#">EN - Inggris</x-partials.nav-link>
                    </x-slot>
                </x-partials.dropdown-nav-link>
                <a href="{{ url('/auth/register') }}"
                    class="btn px-3 py-2 border border-dark-base bg-transparent text-dark-base rounded-[4px]">Daftar</a>
                <a href="{{ url('/auth/login') }}"
                    class="btn px-3 py-2 border border-dark-base bg-dark-base text-light-base rounded-[4px]">Masuk</a>
            </div>
        </li>
    </ul>
</nav>
