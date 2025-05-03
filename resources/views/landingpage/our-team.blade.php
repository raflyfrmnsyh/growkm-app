<x-client-side-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-header></x-header>

    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-2">
                Bangun jejaring dengan
            </h2>
            <h3 class="text-2xl md:text-3xl font-bold text-center text-gray-800 mb-2">
                Tim Pengembang <span class="text-primary text-teal-600 mb-4">Platform Growkm</span>
            </h3>
            <p class="text-center text-gray-500 mb-12">
                Tim kami yang terdiri dari mentor berpengalaman, dan pemecah masalah
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Team Member 1 -->
                <div class="relative flex flex-col items-center w-64 mx-auto">
                    <div class="bg-teal-700 rounded-xl w-full h-72 flex justify-center items-start"></div>
                    <img src="/image/team/rafly.png" alt="Rafly Firmansyah"
                         class="w-70 h-80 object-cover absolute left-1/2 -top-8 transform -translate-x-1/2 z-10">
                    <div class="absolute left-1/2 bottom-0 transform -translate-x-1/2 translate-y-1/2 bg-white rounded-xl px-4 py-2 shadow text-center w-11/12 z-20">
                        <p class="text-xs text-gray-500 mb-1">Chief Executive Officer</p>
                        <h4 class="text-lg font-bold text-teal-700">Rafly Firmansyah</h4>
                    </div>
                </div>
                <!-- Team Member 2 -->
                <div class="relative flex flex-col items-center w-64 mx-auto">
                    <div class="bg-teal-700 rounded-xl w-full h-72 flex justify-center items-start"></div>
                    <img src="/image/team/kinta.png" alt="Kinta Desvina"
                         class="w-70 h-80 object-cover absolute left-1/2 -top-8 transform -translate-x-1/2 z-10">
                    <div class="absolute left-1/2 bottom-0 transform -translate-x-1/2 translate-y-1/2 bg-white rounded-xl px-4 py-2 shadow text-center w-11/12 z-20">
                        <p class="text-xs text-gray-500 mb-1">Chief Technology Officer</p>
                        <h4 class="text-lg font-bold text-teal-700">Kinta Desvina</h4>
                    </div>
                </div>
                <!-- Team Member 3 -->
                <div class="relative flex flex-col items-center w-64 mx-auto">
                    <div class="bg-teal-700 rounded-xl w-full h-72 flex justify-center items-start"></div>
                    <img src="/image/team/roy.png" alt="Roy Subagya"
                         class="w-70 h-80 object-cover absolute left-1/2 -top-8 transform -translate-x-1/2 z-10">
                    <div class="absolute left-1/2 bottom-0 transform -translate-x-1/2 translate-y-1/2 bg-white rounded-xl px-4 py-2 shadow text-center w-11/12 z-20">
                        <p class="text-xs text-gray-500 mb-1">Desainer UI/UX</p>
                        <h4 class="text-lg font-bold text-teal-700">Roy Subagya</h4>
                    </div>
                </div>
                <!-- Team Member 4 -->
                <div class="relative flex flex-col items-center w-64 mx-auto">
                    <div class="bg-teal-700 rounded-xl w-full h-72 flex justify-center items-start"></div>
                    <img src="/image/team/vina.png" alt="Vina Nurul"
                         class="w-70 h-80 object-cover absolute left-1/2 -top-8 transform -translate-x-1/2 z-10">
                    <div class="absolute left-1/2 bottom-0 transform -translate-x-1/2 translate-y-1/2 bg-white rounded-xl px-4 py-2 shadow text-center w-11/12 z-20">
                        <p class="text-xs text-gray-500 mb-1">Sr. Full Web Developer</p>
                        <h4 class="text-lg font-bold text-teal-700">Vina Nurul</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-client-side-layout>
