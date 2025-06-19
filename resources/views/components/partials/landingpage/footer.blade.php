 <footer class=" p-[24px] lg:px-[64px] md:py-[32px] w-full flex flex-col flex-start gap-4 bottom-0">
     <div class="_head_footer">
         <img src="{{ asset('image/logo-growkm.svg') }}" alt="logo" class="logo_footer h-[42px]">
     </div>
     <div class="_content_footer flex flex-col md:flex-row justify-between gap-4 lg:gap-8">
         <div class="_info flex flex-col gap-8 w-full md:w-[40%]">
             <p class="leading-6 text-justify">
                 Growkm merupakan platform edukasi, pendampingan usaha yang terintegrasi dengan fitur temu supplier
                 yang dapat membantu proses pengembangan usaha melalui produk tangan pertama dengan mitra supplier
                 yang tergabung.
             </p>
             <div class="_info-social_media hidden md:flex gap-6 text-2xl">
                 <a href="{{ url('#') }}" class="social_link hover:scale-[1.1]">
                     <img src="{{ asset('image/linkedin.svg') }}" alt="Linkedin">
                 </a>
                 <a href="{{ url('#') }}" class="social_link hover:scale-[1.1]">
                     <img src="{{ asset('image/tiktok.svg') }}" alt="Tiktok">
                 </a>
                 <a href="{{ url('#') }}" class="social_link hover:scale-[1.1]">
                     <img src="{{ asset('image/instagram.svg') }}" alt="Instagram">
                 </a>
                 <a href="{{ url('#') }}" class="social_link hover:scale-[1.1]">
                     <img src="{{ asset('image/x.svg') }}" alt="X">
                 </a>
                 <a href="{{ url('#') }}" class="social_link hover:scale-[1.1]">
                     <img src="{{ asset('image/youtube.svg') }}" alt="Youtube">
                 </a>
             </div>
         </div>
         <div class="_nav-links flex flex-wrap md:flex-nowrap justify-between md:ms-4 w-full md:w-[60%]">
             <ul class="link_group flex flex-col gap-4 md:w-full w-[50%]">
                 <span class="font-bold text-secondaryColors-base">Sumber Daya</span>
                 <a href="{{ url('#') }}"
                     class="foot_nav-link hover:font-medium hover:text-primaryColors-base hover:text-nowrap lg:hover:text-wrap text-md">Layanan
                     Kami</a>
                 <a href="{{ url('#') }}"
                     class="foot_nav-link hover:font-medium hover:text-primaryColors-base hover:text-nowrap lg:hover:text-wrap text-md">Tentang
                     Growkm</a>
                 <a href="{{ url('/our-partner') }}"
                     class="foot_nav-link hover:font-medium hover:text-primaryColors-base hover:text-nowrap lg:hover:text-wrap text-md">Mitra
                     Growkm</a>
                 <a href="{{ url('#') }}"
                     class="foot_nav-link hover:font-medium hover:text-primaryColors-base hover:text-nowrap lg:hover:text-wrap text-md">Testimoni
                     Alumni</a>
                 <a href="{{ url('#') }}"
                     class="foot_nav-link hover:font-medium hover:text-primaryColors-base hover:text-nowrap lg:hover:text-wrap text-md">FaQ</a>
             </ul>
             <ul class="link_group flex flex-col gap-4 md:w-full w-[50%] ">
                 <span class="font-bold text-secondaryColors-base">Solusi Kami</span>
                 <a href="{{ url('#') }}"
                     class="foot_nav-link hover:font-medium hover:text-primaryColors-base hover:text-nowrap lg:hover:text-wrap w-full">Growkm Event</a>
                 <a href="{{ url('#') }}"
                     class="foot_nav-link hover:font-medium hover:text-primaryColors-base hover:text-nowrap lg:hover:text-wrap w-full">Supply Hub</a>
             </ul>
             <ul class="link_group flex flex-col gap-4 md:w-full mt-8 sm:mt-0 w-[50%]">
                 <span class="font-bold text-secondaryColors-base w-full">Jadi Bagian Kami</span>
                 <a href="{{ url('#') }}"
                     class="foot_nav-link hover:font-medium hover:text-primaryColors-base hover:text-nowrap lg:hover:text-wrap w-full">Mulai
                     Berlangganan</a>
                 <a href="{{ url('#') }}"
                     class="foot_nav-link hover:font-medium hover:text-primaryColors-base hover:text-nowrap lg:hover:text-wrap w-full">Bergabung
                     menjadi
                     Mitra</a>
                 <a href="{{ url('#') }}"
                     class="foot_nav-link hover:font-medium hover:text-primaryColors-base hover:text-nowrap lg:hover:text-wrap w-full">Syarat
                     &
                     Ketentuan</a>
                 <a href="{{ url('#') }}"
                     class="foot_nav-link hover:font-medium hover:text-primaryColors-base hover:text-nowrap lg:hover:text-wrap w-full">Kebijakan
                     Privasi</a>
             </ul>
             <div
                 class="_direct-download md:hidden flex flex-col gap-4 cursor-pointer mt-8 sm:mt-0 w-[50%] lg:flex md:w-[420px] ">
                 <img src="{{ asset('image/google-play.png') }}" alt="google-play"
                     class="download_img w-[60%] lg:w-full">
                 <img src="{{ asset('image/app-store.png') }}" alt="app-store" class="download_img w-[60%] lg:w-full">
             </div>
         </div>
     </div>
     <div
         class="_copy-right flex md:flex-row flex-col justify-between items-center mt-4 pb-4 md:mt-8 text-primaryColors-90 pt-4">
         <div class="copy-companny">
             PT Digital Creative Solution Indonesia
         </div>
         <div class="copy-right">
             &copy; 2025 Growkm. All rights reserved.
         </div>
     </div>
 </footer>
