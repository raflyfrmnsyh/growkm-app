<section class="overflow-hidden pt-0 sm:pt-16 px-6 bg-light-base sm:grid sm:grid-cols-2">
    <div class="py-6 md:p-12 lg:px-16">
        <div class="max-w-xl ltr:sm:text-left rtl:sm:text-right">
            <div class="flex items-center gap-2">
                <x-icons.star-icon></x-icons.star-icon>
                <span class="text-primaryColors-base text-lg font-medium leading-[150%]">
                    Solusi Pengembangan UKM dan UMKM terbaik
                </span>
            </div>
            <p class="text-dark-base text-4xl sm:text-5xl font-extrabold">
                Berkembang bersama pelaku usaha se-Indonesia melalui
                <span class="text-secondaryColors-base">Growkm</span>
            </p>

            <p class="text-gray-500 md:mt-4 text-justify sm:text-left">
                Growkm hadir sebagai platform edukasi bisnis praktis
                sekaligus penyedia akses bahan baku terpercaya bagi pelaku usaha
            </p>

            <div class="flex flex-col mt-4 sm:mt-6">
                <a
                class="w-full text-center rounded bg-secondaryColors-base px-5 py-3 text-sm sm:text-base font-medium text-light-base shadow-sm"
                href="{{ route('auth.register') }}"
                >
                Bergabung Sekarang
                </a>
            </div>
        </div>
    </div>

    <img
        alt=""
        src="{{ asset('image/hero_landpage.png') }}"
        class="hidden md:block"
    />
</section>
