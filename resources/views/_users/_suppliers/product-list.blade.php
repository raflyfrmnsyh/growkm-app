<html>
<x-partials.head-info>
    <x-slot:title>{{ $title }}</x-slot:title>
</x-partials.head-info>

<body class="bg-gray-100 flex flex-row justify-center items-start">
    <x-partials.dashboard.sidebar></x-partials.dashboard.sidebar>


    <main class="w-full lg:w-[80%] lg:left-[20%] absolute ">
        {{-- Mobile Header --}}
        <x-partials.dashboard.mobile-header></x-partials.dashboard.mobile-header>
        {{-- Desktop Header --}}
        <x-partials.dashboard.desktop-header></x-partials.dashboard.desktop-header>

        <section class="section_content flex items-start gap-4 mx-8 py-[112px]">
            <div class="w-full bg-white flex flex-wrap">
                <div class="overflow-x-auto w-full">
                    <table class="w-full bg-white text-left min-w-[80%]">
                        <thead class="text-sm uppercase bg-gray-50">
                            <tr>
                                <th class="py-4 px-2 w-12 h-12 text-center">#</th>
                                <th class="py-4 px-2">Produk ID</th>
                                <th class="py-4 px-2">Nama produk</th>
                                <th class="text-center p-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $idx => $data)
                                <tr class="border-b border-gray-200">
                                    <td class="text-center gap-2 px-6">1
                                    </td>
                                    <td class="py-4 px-2">{{ $data['product_id'] }}</td>
                                    <td class="py-4 px-2">{{ $data['product_name'] }}</td>
                                    <td class="w-full py-4 flex items-center justify-center gap-2 px-6">
                                        <a href="{{ url('#') }}"
                                            class="bg-secondaryColors-10 flex items-center justify-center w-auto gap-2 px-2 h-8 rounded-md hover:bg-secondaryColors-20">
                                            <x-icons.bill-return
                                                class="size-5 stroke-secondaryColors-base "></x-icons.bill-return>
                                            Beli sekarang
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-6 bg-white w-full rounded-b-lg flex items-center justify-between">
                    <span>Showing 1 to 10 of 57 entries</span>

                    {{-- Pagination --}}
                </div>
            </div>
        </section>
    </main>

</body>

</html>
