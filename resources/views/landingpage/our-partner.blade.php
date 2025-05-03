<x-client-side-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-header></x-header>

      {{-- Hero Section --}}
      <div class="bg-gradient-to-br from-white to-gray-100 py-16 px-4 md:px-0">
        <div class="max-w-6xl mx-auto text-left">
            <h1 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900">
                Berkembang bersama pelaku <br>
                usaha se–Indonesia melalui <br>
                <span class="text-[#007F73]">Pendampingan Growkm</span>
            </h1>
            <div class="flex flex-col md:flex-row justify-start gap-4 mt-6">
                <a href="#" class="bg-[#007F73] text-white px-6 py-2 rounded-md font-semibold hover:bg-green-800 transition">
                    Jadi Mitra Growkm
                </a>
                <a href="#" class="border border-gray-400 px-6 py-2 rounded-md font-semibold text-gray-700 hover:bg-gray-100 transition">
                    Keuntungan menjadi mitra?
                </a>
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
    <div class="max-w-6xl mx-auto mt-6 px-4">
        <div class="grid grid-cols-2 md:grid-cols-6 gap-6">
            @foreach($partners as $partner)
                <div class="flex flex-col items-center">
                    <div class="bg-white border border-gray-200 rounded-lg p-4 h-24 w-full flex items-center justify-center">
                        <img src="{{ asset('image/partners/' . $partner['logo']) }}" alt="{{ $partner['name'] }}" class="h-10 object-contain mx-auto">
                    </div>
                    <span class="text-[#041213] text-center text-base font-sans mt-2">{{ $partner['name'] }}</span>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Pagination --}}
    <div class="max-w-6xl mx-auto flex justify-end mt-8 px-4">
        <nav class="inline-flex items-center space-x-2">
            <span class="px-3 py-1 rounded bg-[#007F73] text-white">1</span>
            <a href="#" class="px-3 py-1 rounded hover:bg-gray-200">2</a>
            <span class="px-3 py-1">...</span>
            <a href="#" class="px-3 py-1 rounded hover:bg-gray-200">5</a>
            <a href="#" class="ml-2 text-gray-500 hover:text-[#007F73]">&gt;</a>
        </nav>
    </div>
</x-client-side-layout>
