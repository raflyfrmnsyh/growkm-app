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
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            @if ($status === 'pending') color="#16a34a" @else color="#000000" @endif
                            fill="none">
                            <path d="M12 3V6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M12 18V21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M21 12L18 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                            </path>
                            <path d="M6 12L3 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M18.3635 5.63672L16.2422 7.75804" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round"></path>
                            <path d="M7.75804 16.2422L5.63672 18.3635" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round"></path>
                            <path d="M18.3635 18.3635L16.2422 16.2422" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round"></path>
                            <path d="M7.75804 7.75804L5.63672 5.63672" stroke="#000000" stroke-width="1.5"
                                stroke-linecap="round"></path>
                        </svg>
                        <span class="status mt-4">Review Order</span>
                    </div>
                    <div
                        class="flex flex-col items-start py-2 w-full border-b-4 {{ $status === 'on process' || $status === 'on shipping' || $status === 'selesai' ? 'border-secondaryColors-base' : 'border-gray-200' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            color="#000000" fill="none">
                            <path
                                d="M11 22C10.1818 22 9.40019 21.6698 7.83693 21.0095C3.94564 19.3657 2 18.5438 2 17.1613C2 16.7742 2 10.0645 2 7M11 22L11 11.3548M11 22C11.3404 22 11.6463 21.9428 12 21.8285M20 7V11.5"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M18 18.0005L18.9056 17.0949M22 18C22 15.7909 20.2091 14 18 14C15.7909 14 14 15.7909 14 18C14 20.2091 15.7909 22 18 22C20.2091 22 22 20.2091 22 18Z"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M7.32592 9.69138L4.40472 8.27785C2.80157 7.5021 2 7.11423 2 6.5C2 5.88577 2.80157 5.4979 4.40472 4.72215L7.32592 3.30862C9.12883 2.43621 10.0303 2 11 2C11.9697 2 12.8712 2.4362 14.6741 3.30862L17.5953 4.72215C19.1984 5.4979 20 5.88577 20 6.5C20 7.11423 19.1984 7.5021 17.5953 8.27785L14.6741 9.69138C12.8712 10.5638 11.9697 11 11 11C10.0303 11 9.12883 10.5638 7.32592 9.69138Z"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path d="M5 12L7 13" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M16 4L6 9" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                        <span class="status mt-4">Order diproses</span>
                    </div>
                    <div
                        class="flex flex-col items-start py-2 w-full border-b-4 {{ $status === 'on shipping' || $status === 'selesai' ? 'border-secondaryColors-base' : 'border-gray-200' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            color="#000000" fill="none">
                            <path
                                d="M11 22C10.1818 22 9.40019 21.6698 7.83693 21.0095C3.94564 19.3657 2 18.5438 2 17.1613C2 16.7742 2 10.0645 2 7M11 22L11 11.3548M11 22C11.3404 22 11.6463 21.9428 12 21.8285M20 7V11.5"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M18 18.0005L18.9056 17.0949M22 18C22 15.7909 20.2091 14 18 14C15.7909 14 14 15.7909 14 18C14 20.2091 15.7909 22 18 22C20.2091 22 22 20.2091 22 18Z"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M7.32592 9.69138L4.40472 8.27785C2.80157 7.5021 2 7.11423 2 6.5C2 5.88577 2.80157 5.4979 4.40472 4.72215L7.32592 3.30862C9.12883 2.43621 10.0303 2 11 2C11.9697 2 12.8712 2.4362 14.6741 3.30862L17.5953 4.72215C19.1984 5.4979 20 5.88577 20 6.5C20 7.11423 19.1984 7.5021 17.5953 8.27785L14.6741 9.69138C12.8712 10.5638 11.9697 11 11 11C10.0303 11 9.12883 10.5638 7.32592 9.69138Z"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path d="M5 12L7 13" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M16 4L6 9" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                        <span class="status mt-4">Sedang dikirim</span>
                    </div>
                    <div
                        class="flex flex-col items-start py-2 w-full border-b-4 {{ $status === 'selesai' ? 'border-secondaryColors-base' : 'border-gray-200' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            color="#000000" fill="none">
                            <path
                                d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z"
                                stroke="#000000" stroke-width="1.5"></path>
                            <path d="M8 12.5L10.5 15L16 9" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                        <span class="status mt-4">Selesai</span>
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
                    <li class="flex gap-2 items-center">
                        <x-icons.user-group class="stroke-dark-base size-6"></x-icons.user-group>
                        <span>{{ $customer['shipping_name'] }}r</span>
                    </li>
                    <li class="flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            color="#000000" fill="none">
                            <path d="M14 3V6M19 5L17 7M21 10H18" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M9.15825 5.71223L8.7556 4.80625C8.49232 4.21388 8.36068 3.91768 8.1638 3.69101C7.91707 3.40694 7.59547 3.19794 7.23567 3.08785C6.94858 3 6.62446 3 5.97621 3C5.02791 3 4.55375 3 4.15573 3.18229C3.68687 3.39702 3.26343 3.86328 3.09473 4.3506C2.95151 4.76429 2.99253 5.18943 3.07458 6.0397C3.94791 15.0902 8.90981 20.0521 17.9603 20.9254C18.8106 21.0075 19.2357 21.0485 19.6494 20.9053C20.1367 20.7366 20.603 20.3131 20.8177 19.8443C21 19.4462 21 18.9721 21 18.0238C21 17.3755 21 17.0514 20.9122 16.7643C20.8021 16.4045 20.5931 16.0829 20.309 15.8362C20.0823 15.6393 19.7861 15.5077 19.1937 15.2444L18.2878 14.8417C17.6462 14.5566 17.3255 14.4141 16.9995 14.3831C16.6876 14.3534 16.3731 14.3972 16.0811 14.5109C15.776 14.6297 15.5063 14.8544 14.967 15.3038C14.4301 15.7512 14.1617 15.9749 13.8337 16.0947C13.543 16.2009 13.1586 16.2403 12.8523 16.1951C12.5069 16.1442 12.2423 16.0029 11.7133 15.7201C10.0672 14.8405 9.15953 13.9328 8.27986 12.2867C7.99714 11.7577 7.85578 11.4931 7.80487 11.1477C7.75974 10.8414 7.79908 10.457 7.9053 10.1663C8.02512 9.83828 8.24881 9.56986 8.69619 9.033C9.14562 8.49368 9.37034 8.22402 9.48915 7.91891C9.60285 7.62694 9.64661 7.3124 9.61694 7.00048C9.58594 6.67452 9.44338 6.35376 9.15825 5.71223Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        <span>{{ $customer['shipping_phone'] }}</span>
                    </li>
                    <li class="flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            color="#000000" fill="none">
                            <path
                                d="M14.5 10C14.0697 8.55426 12.5855 7.5 11 7.5C9.067 7.5 7.5 9.067 7.5 11C7.5 12.7632 8.80385 14.2574 10.5 14.5"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path>
                            <path
                                d="M19.9504 10C19.4697 5.53446 15.5596 2 11 2C6.12944 2 2 6.03298 2 10.9258C2 15.9137 6.2039 19.3616 10.073 21.7567C10.3555 21.9162 10.675 22 11 22C11.325 22 11.6445 21.9162 11.927 21.7567C12.1816 21.6009 12.4376 21.4403 12.6937 21.2748"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path>
                            <path
                                d="M17.5 12C19.9353 12 22 14.0165 22 16.4629C22 18.9482 19.9017 20.6924 17.9635 21.8783C17.8223 21.9581 17.6625 22 17.5 22C17.3375 22 17.1777 21.9581 17.0365 21.8783C15.1019 20.6808 13 18.9568 13 16.4629C13 14.0165 15.0647 12 17.5 12Z"
                                stroke="#000000" stroke-width="1.5"></path>
                            <path d="M17.5 16.5H17.509" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
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
