<x-partials.head-info>
    <x-slot:title>{{ $title }}</x-slot:title>
</x-partials.head-info>

<body class="bg-gray-100 flex flex-row justify-center items-start">
    <x-partials.dashboard.sidebar></x-partials.dashboard.sidebar>

    <main class="w-full lg:w-[80%] lg:left-[20%] absolute">
        <x-partials.dashboard.mobile-header></x-partials.dashboard.mobile-header>
        <x-partials.dashboard.desktop-header></x-partials.dashboard.desktop-header>

        <section class="section_content mx-8 py-[112px]">
            <div class="w-full bg-light-base rounded-lg border border-gray-200 shadow-sm">
                <div class="p-6">
                    <h1 class="text-2xl font-semibold text-dark-base mb-6">Riwayat Transaksi</h1>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">ID Transaksi</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Event</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Qty</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Total</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($transactions as $item)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $item['id'] }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $item['event_name'] }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $item['qty'] }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Rp {{ $item['total'] }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 inline-flex text-xs font-semibold rounded-full
                                            {{ $item['status'] === 'Success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $item['status'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $item['date'] }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center px-6 py-4 text-sm text-gray-500">Belum ada transaksi.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if ($transactions->hasPages())
                    <div class="mt-6 flex justify-center">
                        {{ $transactions->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </main>
</body>
