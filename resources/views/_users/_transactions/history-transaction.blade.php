<html>
<x-partials.head-info>
    <x-slot:title>{{ $title }}</x-slot:title>
</x-partials.head-info>

<body class="bg-gray-100 flex flex-row justify-center items-start">
    <x-partials.dashboard.sidebar></x-partials.dashboard.sidebar>

    <main class="w-full lg:w-[80%] lg:left-[20%] absolute">
        {{-- Mobile Header --}}
        <x-partials.dashboard.mobile-header></x-partials.dashboard.mobile-header>
        {{-- Desktop Header --}}
        <x-partials.dashboard.desktop-header></x-partials.dashboard.desktop-header>

        <section class="section_content flex flex-col items-start mx-8 py-[112px]">
            {{-- Header Section --}}
            <div
                class="p-6 bg-white w-full gap-8 rounded-t-md flex lg:flex-row flex-col items-center justify-between border-b border-gray-200 z-10">
                <h1 class="font-semibold text-xl">Transaksi saya</h1>
            </div>

            @if (count($data) > 0)
                <table class="w-full bg-white text-left min-w-[800px]">
                    <thead class="text-sm uppercase bg-gray-50">
                        <tr>
                            <th class="py-4 px-2 w-12 h-12 text-center">#</th>
                            <th class="py-4 px-2">Transaction ID</th>
                            <th class="py-4 px-2">Created At</th>
                            <th class="py-4 px-2">Nama Pelanggan</th>
                            <th class="py-4 px-2">Alamat pengiriman</th>
                            <th class="py-4 px-2">Total Payment</th>
                            <th class="py-4 px-2 text-center">Payment status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $idx => $item)
                            <tr class="border-b border-gray-200">
                                <td class="text-center">{{ $idx + 1 }}</td>
                                <td class="py-4 px-2">{{ '#' . $item['transaction_id'] }}</td>
                                <td class="py-4 px-2">
                                    {{ \Illuminate\Support\Carbon::parse($item['created_at'])->locale('id')->format('d M Y') }}
                                </td>
                                <td class="py-4 px-2">{{ $item['shipping_name'] }}</td>
                                <td class="py-4 px-2">{{ $item['shipping_address'] }}</td>
                                <td class="py-4 px-2 text-center">
                                    {{ 'Rp. ' . number_format($item['total'], 0, ',', '.') }}</td>
                                <td class="py-4 px-2 text-center">{{ $item['transaction_status'] }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="w-full flex flex-col items-center justify-center bg-white p-8 rounded-md">
                    <p class="text-lg font-semibold mb-4">Maaf belum ada riwayat transaksi</p>
                    <a href="{{ route('product.list') }}"
                        class="bg-primaryColors-base text-white px-6 py-2 rounded hover:bg-primaryColors-20 transition">
                        Beli Sekarang!
                    </a>
                </div>
            @endif

        </section>
    </main>

    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
</body>

</html>
