<section class="px-6 py-6 sm:py-16 sm:px-16">
  <div class="container mx-auto flex flex-col gap-6">

    <!-- Header -->
    <div class="flex items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
        <circle cx="6" cy="6.5" r="4" fill="#007F73"/>
        <circle cx="6" cy="6.5" r="5" stroke="#007F73" stroke-opacity="0.2" stroke-width="2"/>
      </svg>
      <span class="text-secondaryColors-base text-lg font-medium leading-[150%]">
        Bagaimana Growkm Membantu Anda
      </span>
    </div>

    <p class="text-dark-base text-3xl sm:text-5xl font-extrabold leading-[150%] md:w-[1000px]">
      Pengalaman pertumbuhan bisnis Anda dengan pendampingan, dan koneksi yang tepat.
    </p>

    <!-- Konten Utama: image + cards -->
    <div class="flex flex-col lg:flex-row gap-6">

      <!-- Gambar (hanya di desktop) -->
      <div class="hidden lg:block lg:w-1/3">
        <img src="{{ asset('image/program-growkm.png') }}" alt="" class="w-full h-auto rounded-xl" />
      </div>

      <!-- Cards grid: 1 kolom di mobile, 2 kolom di sm, 2 kolom di md, 2 kolom di lg dengan 3: sisakan untuk image -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:grid-cols-2 lg:w-2/3">
        <!-- Card 1 -->
        <div class="p-6 rounded-[20px] bg-light-30 flex flex-col gap-3">
          <i class="hgi hgi-stroke hgi-idea-01 text-6xl sm:text-7xl text-secondaryColors-base"></i>
          <h2 class="text-primaryColors-base text-xl sm:text-2xl font-bold leading-[150%]">Growkm Course</h2>
          <p class="text-primaryColors-base text-sm sm:text-base">
            Yes! Growkm provides smart tools and resources to help you grow personally and professionally. From goal setting to progress tracking, we make self-improvement easier and more effective.
          </p>
        </div>

        <!-- Card 2 -->
        <div class="p-6 rounded-[20px] bg-light-30 flex flex-col gap-3">
          <i class="hgi hgi-stroke hgi-mentoring text-6xl sm:text-7xl text-secondaryColors-base"></i>
          <h2 class="text-primaryColors-base text-xl sm:text-2xl font-bold leading-[150%]">Pendampingan Usaha</h2>
          <p class="text-primaryColors-base text-sm sm:text-base">
            Yes! Growkm provides smart tools and resources to help you grow personally and professionally. From goal setting to progress tracking, we make self-improvement easier and more effective.
          </p>
        </div>

        <!-- Card 3 -->
        <div class="p-6 rounded-[20px] bg-light-30 flex flex-col gap-3">
          <i class="hgi hgi-stroke hgi-package-open text-6xl sm:text-7xl text-secondaryColors-base"></i>
          <h2 class="text-primaryColors-base text-xl sm:text-2xl font-bold leading-[150%]">Jejaring Supplier+</h2>
          <p class="text-primaryColors-base text-sm sm:text-base">
            Yes! Growkm provides smart tools and resources to help you grow personally and professionally. From goal setting to progress tracking, we make self-improvement easier and more effective.
          </p>
        </div>

        <!-- Card 4 -->
        <div class="p-6 rounded-[20px] bg-light-30 flex flex-col gap-3">
          <i class="hgi hgi-stroke hgi-analytics-up text-6xl sm:text-7xl text-secondaryColors-base"></i>
          <h2 class="text-primaryColors-base text-xl sm:text-2xl font-bold leading-[150%]">Tingkatkan Potensi Bisnis Anda</h2>
          <p class="text-primaryColors-base text-sm sm:text-base">
            Yes! Growkm provides smart tools and resources to help you grow personally and professionally. From goal setting to progress tracking, we make self-improvement easier and more effective.
          </p>
          <a href="{{ route('auth.register')}}" class="mt-2 text-primaryColors-base text-sm sm:text-base font-bold underline inline-flex items-center">
            Bergabung Sekarang
            <i class="hgi hgi-stroke hgi-arrow-right-02 text-sm ml-1"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
