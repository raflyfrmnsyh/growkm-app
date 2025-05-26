<x-layouts.client-side-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-partials.header></x-partials.header>

    <section class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800 mb-2">
                Bangun jejaring dengan
            </h2>
                <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 mb-3">
                    Tim Pengembang <span class="text-[#007F73]">Platform Growkm</span>
            </h3>
                <p class="text-base sm:text-lg text-gray-500 mb-12 max-w-2xl mx-auto">
                Tim kami yang terdiri dari mentor berpengalaman, dan pemecah masalah
            </p>
            </div>

            <div class="mt-22 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                <!-- Team Member 1 -->
                <div class="flex flex-col items-center relative">
                    <div class="bg-[#007F73] rounded-xl w-full h-64 sm:h-72 lg:h-80 xl:h-96 flex items-end justify-center relative z-10"></div>
                    <img src="/image/team/rafly.png" alt="Rafly Firmansyah"
                         class="w-48 sm:w-56 lg:w-64 xl:w-72 h-64 sm:h-72 lg:h-80 xl:h-96 object-contain rounded-lg absolute left-1/2 bottom-0 transform -translate-x-1/2 z-20">
                    <div class="relative -mt-4 sm:-mt-6 bg-white rounded-xl px-4 py-3 shadow-lg text-center w-[90%] z-30">
                        <p class="text-xs sm:text-sm text-gray-500 mb-1">Chief Executive Officer</p>
                        <h4 class="text-base sm:text-lg font-bold text-[#007F73]">Rafly Firmansyah</h4>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="flex flex-col items-center relative">
                    <div class="bg-[#007F73] rounded-xl w-full h-64 sm:h-72 lg:h-80 xl:h-96 flex items-end justify-center relative z-10"></div>
                    <img src="/image/team/kinta.png" alt="Kinta Desvina"
                         class="w-48 sm:w-56 lg:w-64 xl:w-72 h-64 sm:h-72 lg:h-80 xl:h-96 object-contain rounded-lg absolute left-1/2 bottom-0 transform -translate-x-1/2 z-20">
                    <div class="relative -mt-4 sm:-mt-6 bg-white rounded-xl px-4 py-3 shadow-lg text-center w-[90%] z-30">
                        <p class="text-xs sm:text-sm text-gray-500 mb-1">Chief Technology Officer</p>
                        <h4 class="text-base sm:text-lg font-bold text-[#007F73]">Kinta Desvina</h4>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="flex flex-col items-center relative">
                    <div class="bg-[#007F73] rounded-xl w-full h-64 sm:h-72 lg:h-80 xl:h-96 flex items-end justify-center relative z-10"></div>
                    <img src="/image/team/roy.png" alt="Roy Subagya"
                         class="w-48 sm:w-56 lg:w-64 xl:w-72 h-64 sm:h-72 lg:h-80 xl:h-96 object-contain rounded-lg absolute left-1/2 bottom-0 transform -translate-x-1/2 z-20">
                    <div class="relative -mt-4 sm:-mt-6 bg-white rounded-xl px-4 py-3 shadow-lg text-center w-[90%] z-30">
                        <p class="text-xs sm:text-sm text-gray-500 mb-1">Desainer UI/UX</p>
                        <h4 class="text-base sm:text-lg font-bold text-[#007F73]">Roy Subagya</h4>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="flex flex-col items-center relative">
                    <div class="bg-[#007F73] rounded-xl w-full h-64 sm:h-72 lg:h-80 xl:h-96 flex items-end justify-center relative z-10"></div>
                    <img src="/image/team/vina.png" alt="Vina Nurul"
                         class="w-48 sm:w-56 lg:w-64 xl:w-72 h-64 sm:h-72 lg:h-80 xl:h-96 object-contain rounded-lg absolute left-1/2 bottom-0 transform -translate-x-1/2 z-20">
                    <div class="relative -mt-4 sm:-mt-6 bg-white rounded-xl px-4 py-3 shadow-lg text-center w-[90%] z-30">
                        <p class="text-xs sm:text-sm text-gray-500 mb-1">Sr. Full Web Developer</p>
                        <h4 class="text-base sm:text-lg font-bold text-[#007F73]">Vina Nurul</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-client-side-layout>
