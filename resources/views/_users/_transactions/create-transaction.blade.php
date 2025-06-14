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

            <div class="w-[70%] flex flex-col gap-4">
                {{-- Shipping Information --}}

                <div class="flex flex-col">
                    <div class="p-6 bg-white w-full rounded-t-lg border-b border-gray-200">
                        <div class="w-full flex justify-between">
                            <h1 class="text-lg font-medium mb-4">Informasi Pengiriman</h1>
                            <a href="{{ url('#') }}" class="">
                                <x-icons.address-edit class="size-6 stroke-gray-600"></x-icons.address-edit>
                            </a>
                        </div>

                        <div>
                            <span class="font-medium">Rumah • Rafly Firmansyah</span>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, quo illo explicabo
                                similique eos quam.</p>
                        </div>
                    </div>
                    <div class="p-6 bg-white w-full border-b border-gray-200">
                        <h1 class="text-md font-medium mb-2">Paket Pengiriman</h1>
                        <div x-data="{ open: false, selected: 'Ekonomi (Rp12.000) - Estimasi 17 - 20 Jun' }" class="relative w-full mx-auto">
                            <!-- Button -->
                            <button @click="open = !open"
                                class="w-full bg-white border border-gray-300 rounded-lg px-4 py-3 text-left flex justify-between items-center hover:border-green-500 focus:outline-none">
                                <span x-text="selected"></span>
                                <svg class="w-4 h-4 text-gray-600 transform" :class="open ? 'rotate-180' : ''"
                                    fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <!-- Dropdown Options -->
                            <ul x-show="open" @click.outside="open = false" x-transition
                                class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg mt-1 shadow-md">
                                <!-- Option 1 -->
                                <li @click="selected = 'Ekonomi (Rp12.000) - Estimasi 17 - 20 Jun'; open = false"
                                    class="px-4 py-3 hover:bg-gray-100 cursor-pointer">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="font-semibold text-gray-800">Ekonomi (Rp12.000)</p>
                                            <p class="text-sm text-gray-500">Estimasi tiba 17 - 20 Jun</p>
                                        </div>
                                        <span class="text-green-600 font-medium text-sm">COD</span>
                                    </div>
                                </li>

                                <!-- Option 2 -->
                                <li @click="selected = 'Reguler (Rp18.000) - Estimasi 16 - 18 Jun'; open = false"
                                    class="px-4 py-3 hover:bg-gray-100 cursor-pointer">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="font-semibold text-gray-800">Reguler (Rp18.000)</p>
                                            <p class="text-sm text-gray-500">Estimasi tiba 16 - 18 Jun</p>
                                        </div>
                                        <span class="text-green-600 font-medium text-sm">COD</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="p-6 bg-white w-full rounded-b-lg">
                        <h1 class="text-md font-medium mb-2">Metode Pembayaran</h1>

                        <div x-data="{ open: false, selectedPayment: 'Pilih Metode Pembayaran' }" class="relative w-full mx-auto">
                            <!-- Button -->
                            <button @click="open = !open"
                                class="w-full bg-white border border-gray-300 rounded-lg px-4 py-3 text-left flex justify-between items-center hover:border-green-500 focus:outline-none">
                                <span x-text="selectedPayment"></span>
                                <svg class="w-4 h-4 text-gray-600 transform" :class="open ? 'rotate-180' : ''"
                                    fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <!-- Dropdown Options -->
                            <ul x-show="open" @click.outside="open = false" x-transition
                                class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg mt-1 shadow-md">
                                <!-- Option 1 -->
                                <li @click="selectedPayment = 'Bank Transfer'; open = false"
                                    class="px-4 py-3 hover:bg-gray-100 cursor-pointer">
                                    <div>
                                        <p class="font-semibold text-gray-800">Bank Transfer</p>
                                        <p class="text-sm text-gray-500">Transfer via BCA, BNI, Mandiri</p>
                                    </div>
                                </li>

                                <!-- Option 2 -->
                                <li @click="selectedPayment = 'E-Wallet'; open = false"
                                    class="px-4 py-3 hover:bg-gray-100 cursor-pointer">
                                    <div>
                                        <p class="font-semibold text-gray-800">E-Wallet</p>
                                        <p class="text-sm text-gray-500">GoPay, OVO, DANA, ShopeePay</p>
                                    </div>
                                </li>

                                <!-- Option 3 -->
                                <li @click="selectedPayment = 'Credit Card'; open = false"
                                    class="px-4 py-3 hover:bg-gray-100 cursor-pointer">
                                    <div>
                                        <p class="font-semibold text-gray-800">Credit Card</p>
                                        <p class="text-sm text-gray-500">Visa, MasterCard, JCB</p>
                                    </div>
                                </li>
                            </ul>

                            <!-- Hidden input untuk submit -->
                            <input type="hidden" name="payment_method" :value="selectedPayment">
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto w-full">
                    <div class="min-w-[800px] max-h-[420px] overflow-y-auto">
                        <table class="w-full bg-white text-left">
                            <thead class="text-sm uppercase bg-gray-50 sticky top-0 z-10">
                                <tr>
                                    <th class="py-4 px-2 w-12 h-12 text-center">#</th>
                                    <th class="py-4 px-2 w-1/2">Item Produk</th>
                                    <th class="py-4 px-2 text-center">Jumlah</th>
                                    <th class="py-4 px-2">Harga</th>
                                    <th class="py-4 px-2">Total</th>
                                    <th class="py-4 px-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < 6; $i++)
                                    <tr class="border-b border-gray-200">
                                        <td class="text-center">{{ $i + 1 }}</td>
                                        <td class="py-4 px-2 flex items-center gap-6">
                                            <div
                                                class="img w-16 h-16 flex items-center justify-center rounded-md bg-gray-50">
                                                img
                                            </div>
                                            <div>
                                                <h1 class="title-product font-medium">Fjallraven - Foldsack No.1
                                                    Backpack</h1>
                                                <span class="text-gray-500">tags, tags, tags</span>
                                            </div>
                                        </td>
                                        <td class="py-4 px-2 text-center">1x</td>
                                        <td class="py-4 px-2">Rp.0</td>
                                        <td class="py-4 px-2 font-semibold">Rp. 80.000</td>
                                        <td>
                                            <x-icons.delete-01 class="stroke-red-500 size-6"></x-icons.delete-01>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


            <div class="bg-white w-[30%]">
                <div class="bg-white w-full rounded-lg border border-gray-200">
                    <h2 class="p-4 border-b border-gray-200 font-bold flex items-center justify-between">Ringkasan
                        Pesanan
                        <i
                            class="p-2 border-[2px] cursor-pointer border-gray-200 rounded-lg w-8 h-8 text-md flex items-center justify-center">i</i>
                    </h2>

                    <ul class="px-4 py-6 flex flex-col items-start gap-6">
                        <li class="flex items-center justify-between w-full">
                            <span>Subtotal</span>
                            <span>Rp. 1000.000</span>
                        </li>

                        <li class="flex items-center justify-between w-full">
                            <span>Shipping</span>
                            <span>Rp. 0 (Free)</span>
                        </li>
                        <li class="flex items-center justify-between w-full font-bold">
                            <span>Total Bayar</span>
                            <span>Rp. 0</span>
                        </li>
                    </ul>
                    <ul class="px-4 py-4 flex flex-col items-start gap-4 border-t border-gray-200">
                        <button type="submit"
                            class="w-full bg-secondaryColors-base py-3 rounded-md text-white font-medium hover:bg-secondaryColors-60 transition-all">Lanjut
                            Pembayaran</button>
                    </ul>
                </div>
            </div>

        </section>
    </main>

</body>
