<x-client-side-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-header></x-header>

      {{-- Hero Section --}}
    <div class="bg-gradient-to-br from-white to-gray-100 py-12 md:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 leading-tight">
                    Berkembang bersama pelaku 
                    usaha se–Indonesia melalui 
                    <span class="text-[#007F73] block mt-1">Pendampingan Growkm</span>
            </h1>
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mt-6 sm:mt-8">
                    <a href="#" class="inline-flex justify-center bg-[#007F73] text-white px-6 py-2.5 rounded-md font-semibold hover:bg-green-800 transition-colors duration-200">
                    Jadi Mitra Growkm
                </a>
                    <a href="#" class="inline-flex justify-center border border-gray-400 px-6 py-2.5 rounded-md font-semibold text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                    Keuntungan menjadi mitra?
                </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Partner Grid --}}
    @php
        $partners = [
            ['logo' => 'ao-smith.png', 'name' => 'Ao Smith Education'],
            ['logo' => 'abbvie.png', 'name' => 'Abbvie Academy'],
            ['logo' => 'align.png', 'name' => 'Align Edu'],
            ['logo' => 'bestbuy.png', 'name' => 'Best Buy'],
            ['logo' => 'humana.png', 'name' => 'Humana Corp'],
            ['logo' => 'labcorp.png', 'name' => 'Labcorp.id'],
            ['logo' => 'jacobs.png', 'name' => 'Jacobs Designs lab'],
            ['logo' => 'meta.png', 'name' => 'Meta'],
            ['logo' => 'molsoncoors.png', 'name' => 'Molson Coors'],
            ['logo' => 'walmart.png', 'name' => 'Walmart commerce'],
            ['logo' => 'basecamp.png', 'name' => 'Basecamp'],
            ['logo' => 'codecademy.png', 'name' => 'code Academy'],
        ];
    @endphp
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 sm:gap-6">
            @foreach($partners as $partner)
                <div class="flex flex-col items-center">
                    <div class="bg-white border border-gray-200 rounded-lg p-3 sm:p-4 h-20 sm:h-24 w-full flex items-center justify-center hover:shadow-sm transition-shadow duration-200">
                        <img src="{{ asset('image/partners/' . $partner['logo']) }}" alt="{{ $partner['name'] }}" class="h-8 sm:h-10 object-contain mx-auto">
                    </div>
                    <span class="text-[#041213] text-center text-sm sm:text-base font-sans mt-2 line-clamp-2">{{ $partner['name'] }}</span>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Pagination --}}
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <nav class="flex justify-end">
            <div class="inline-flex items-center space-x-1 sm:space-x-2">
                <span class="px-3 py-1.5 rounded bg-[#007F73] text-white text-sm sm:text-base">1</span>
                <a href="#" class="px-3 py-1.5 rounded hover:bg-gray-200 text-sm sm:text-base">2</a>
                <span class="px-3 py-1.5 text-sm sm:text-base">...</span>
                <a href="#" class="px-3 py-1.5 rounded hover:bg-gray-200 text-sm sm:text-base">5</a>
                <a href="#" class="ml-2 text-gray-500 hover:text-[#007F73] text-sm sm:text-base">&gt;</a>
            </div>
        </nav>
    </div>
</x-client-side-layout>
