<x-layouts.admin.admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="p-6 mb-6 w-full bg-white flex items-center justify-between rounded-lg">
        <div class="flex items-center gap-8">
            <h1 class="font-semibold text-xl flex items-end gap-2">
                Detail order <span class="font-normal">{{ '#' . $customer['transaction_id'] }}</span>
            </h1>
            <h4 class="font-semibold">
                {{ Str::of($customer['transaction_status'])->camel() }}
            </h4>
            <h4 class="date-information">
                {{ \Carbon\Carbon::parse($customer['date'])->locale('id')->isoFormat('dddd, D MMMM Y - HH:mm') }}
            </h4>
        </div>

        <div class="breadcrumb flex items-center gap-2">
            <a href="{{ url('#') }}" class="text-dark-40">Dashboard</a>
            <span class="text-dark-40">/</span>
            <a href="{{ url('#') }}" class="text-dark-40">Transaksi produk</a>
            <span class="text-dark-40">/</span>
            <span class="font-semibold text-secondaryColors-base cursor-pointer">Detail transaksi</span>
        </div>

    </div>
    <div class="w-full flex gap-6 justify-between">

        <div class="w-full flex flex-col items-start gap-6">
            <div class="bg-white w-full rounded-lg border border-gray-200">
                <h1
                    class=" p-6 card-head title flex items-center justify-between font-semibold text-lg text-gray-600 border-b border-gray-200">
                    Status Pengiriman

                    <span class="font-normal text-md text-gray-600">Dikirim ke <span
                            class="font-medium text-gray-900">{{ $customer['shipping_name'] . ' di ' . $customer['shipping_address'] }}</span></span>
                </h1>

                <div class="p-6 w-full flex items-center justify-between gap-6">
                    @php
                        $status = $customer['transaction_status']; // misalnya 'on shipping'
                    @endphp

                    <div
                        class="flex flex-col items-start py-2 w-full border-b-4 {{ $status === 'pending' ? 'border-secondaryColors-base' : 'border-gray-200' }}">
                        <i>icon</i>
                        <span class="status">Review Order</span>
                    </div>
                    <div
                        class="flex flex-col items-start py-2 w-full border-b-4 {{ $status === 'on process' || $status === 'on shipping' || $status === 'selesai' ? 'border-secondaryColors-base' : 'border-gray-200' }}">
                        <i>icon</i>
                        <span class="status">Order diproses</span>
                    </div>
                    <div
                        class="flex flex-col items-start py-2 w-full border-b-4 {{ $status === 'on shipping' || $status === 'selesai' ? 'border-secondaryColors-base' : 'border-gray-200' }}">
                        <i>icon</i>
                        <span class="status">Sedang dikirim</span>
                    </div>
                    <div
                        class="flex flex-col items-start py-2 w-full border-b-4 {{ $status === 'selesai' ? 'border-secondaryColors-base' : 'border-gray-200' }}">
                        <i>icon</i>
                        <span class="status">Selesai</span>
                    </div>
                </div>
                <div class="px-6 py-3 w-full border-t border-gray-200 flex items-center justify-between">
                    <span>Estimasi Pengiriman 3 Hari</span>

                    <form action="{{ route('update.transaction.status', $customer['transaction_id']) }}"
                        method="POST">
                        @csrf
                        <input type="text" name="current_status" id="status_transaction"
                            value="{{ old('transaction_status', $customer['transaction_status']) }}" hidden>

                        @if ($customer['transaction_status'] === 'pending')
                            <button type="submit"
                                class="px-4 py-2 bg-secondaryColors-base rounded-md font-medium text-white hover:bg-secondaryColors-60 cursor-pointer transition-all">
                                Terima Pesanan
                            </button>
                        @elseif ($customer['transaction_status'] === 'on process')
                            <button type="submit"
                                class="px-4 py-2 bg-secondaryColors-base rounded-md font-medium text-white hover:bg-secondaryColors-60 cursor-pointer transition-all">
                                Lakukan Pengiriman
                            </button>
                        @elseif ($customer['transaction_status'] === 'on shipping')
                            <button type="submit"
                                class="px-4 py-2 bg-secondaryColors-base rounded-md font-medium text-white hover:bg-secondaryColors-60 cursor-pointer transition-all">
                                Selesaikan
                            </button>
                        @elseif ($customer['transaction_status'] === 'selesai')
                            <button type="button" disabled
                                class="px-4 py-2 bg-gray-300 rounded-md font-medium text-white cursor-not-allowed transition-all">
                                Selesai
                            </button>
                        @endif

                        @if ($errors->any())
                            <div class="bg-red-100 p-3 text-red-500 border border-red-500">
                                <h6 class="font-bold">Error!!</h6>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>

            </div>
            <div class="overflow-x-auto w-full">
                <table class="w-full bg-white text-left min-w-[800px]">
                    <thead class="text-sm uppercase bg-gray-50">
                        <tr>
                            <th class="py-4 px-2 w-12 h-12 text-center">#</th>
                            <th class="py-4 px-2 w-1/2">Item Produk</th>
                            <th class="py-4 px-2 text-center">Jumlah</th>
                            <th class="py-4 px-2">Harga</th>
                            <th class="py-4 px-2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $idx => $item)
                            {{-- @dd($item) --}}
                            <tr class="border-b border-gray-200">
                                <td class="text-center">{{ $idx + 1 }}</td>
                                <td class="py-4 px-2 flex items-center gap-6">

                                    <div class="img w-16 h-16 flex items-center justify-center rounded-md bg-gray-50">
                                        <img src="{{ asset($item['product_image']) }}"
                                            alt="{{ $item['product_name'] }}">
                                    </div>

                                    <div>
                                        <h1 class="title-product font-medium">{{ $item['product_name'] }}</h1>
                                        <span class="text-gray-500">{{ implode(',', $item['product_tags']) }}</span>
                                    </div>

                                </td>
                                <td class="py-4 px-2 text-center">{{ $item['product_qty'] . 'x' }}</td>
                                <td class="py-4 px-2">{{ 'Rp.' . $item['product_price'] }}</td>
                                <td class="py-4 px-2 font-semibold">{{ 'Rp.' . $item['product_total'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-[40%] h-auto">
            <div class="bg-white w-full rounded-lg border border-gray-200">
                <h2 class="p-4 border-b border-gray-200 font-bold flex items-center justify-between">Detail Pelanggan

                </h2>

                <ul class="px-4 py-4 flex flex-col items-start gap-4 border-b border-gray-200">
                    <li class="flex gap-2">
                        <i>icon</i>
                        <span>{{ $customer['shipping_name'] }}r</span>
                    </li>
                    <li class="flex gap-2">
                        <i>i</i>
                        <span>{{ $customer['shipping_phone'] }}</span>
                    </li>
                    <li class="flex gap-2">
                        <i>icon</i>
                        <span>{{ $customer['shipping_address'] }}</span>
                    </li>
                </ul>
                <ul class="px-4 py-4 flex flex-col items-start gap-4">
                    <h1 class="font-semibold">
                        Ringkasan Pesanan
                    </h1>
                    <li class="flex items-center justify-between w-full">
                        <span>ID Transaksi</span>
                        <span>{{ $customer['transaction_id'] }}</span>
                    </li>
                    <li class="flex items-center justify-between w-full">
                        <span>Payment method</span>
                        <span>{{ $customer['paymethod'] }}</span>
                    </li>
                    <li class="flex items-center justify-between w-full">
                        <span>Shipping</span>
                        @if ($customer['shipping_cost'] == 0)
                            <span>{{ 'Rp.' . $customer['shipping_cost'] . '(Gratis)' }}</span>
                        @elseif ($customer['shipping_cost'] > 0)
                            <span>{{ 'Rp.' . $customer['shipping_cost'] }}</span>
                        @endif
                    </li>
                    <li class="flex items-center justify-between w-full">
                        <span>Subtotal</span>
                        <span>{{ 'Rp.' . $customer['subtotal'] }}</span>
                    </li>

                    <li class="flex items-center justify-between w-full font-bold">
                        <span>Total Bayar</span>
                        <span>{{ 'Rp.' . $customer['total'] }}</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>


</x-layouts.admin.admin-layout>
