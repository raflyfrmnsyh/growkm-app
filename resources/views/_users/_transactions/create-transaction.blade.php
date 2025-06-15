<html>
<x-partials.head-info>
    <x-slot:title>Buat Transaksi</x-slot:title>
</x-partials.head-info>

<body class="bg-gray-100 flex flex-row justify-center items-start">
    <x-partials.dashboard.sidebar></x-partials.dashboard.sidebar>

    <main class="w-full lg:w-[80%] lg:left-[20%] absolute ">
        <x-partials.dashboard.mobile-header></x-partials.dashboard.mobile-header>
        <x-partials.dashboard.desktop-header></x-partials.dashboard.desktop-header>
        <section>
            <form action="{{ route('create.transaction.product') }}" method="POST"
                class="section_content flex items-start gap-4 mx-8 py-[112px]" x-data="{
                    subtotal: 0,
                    shippingCost: 15000,
                    get total() {
                        return this.subtotal + this.shippingCost;
                    },
                    updateShippingCost(option) {
                        const costs = {
                            'Regular': 15000,
                            'Express': 25000,
                            'Same Day': 35000
                        };
                        this.shippingCost = costs[option] || 0;
                    },
                    init() {
                        this.updateShippingCost('Regular');
                    }
                }">
                @csrf
                <div class="w-[70%] flex flex-col gap-4">
                    <div class="flex flex-col">
                        <div class="p-6 bg-white w-full rounded-t-lg border-b border-gray-200">
                            <div class="w-full flex justify-between">
                                <h1 class="text-lg font-medium mb-4">Informasi Pengiriman</h1>
                                {{-- <a href="{{ route('addresses.edit') }}" class="">
                                        <x-icons.address-edit class="size-6 stroke-gray-600"></x-icons.address-edit>
                                    </a> --}}
                            </div>

                            <div>
                                <span class="font-medium">Alamat Utama • John Doe</span>
                                <p>Jl. Contoh No. 123, Jakarta</p>
                            </div>
                        </div>

                        <div class="p-6 bg-white w-full border-b border-gray-200">
                            <h1 class="text-md font-medium mb-2">Paket Pengiriman</h1>
                            <div x-data="{ open: false, selected: 'Regular' }" class="relative w-full mx-auto">
                                <button type="button" @click="open = !open"
                                    class="w-full bg-white border border-gray-300 rounded-lg px-4 py-3 text-left flex justify-between items-center hover:border-green-500 focus:outline-none">
                                    <span x-text="selected"></span>
                                    <svg class="w-4 h-4 text-gray-600 transform" :class="open ? 'rotate-180' : ''"
                                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <ul x-show="open" @click.outside="open = false" x-transition
                                    class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg mt-1 shadow-md">
                                    <li @click="selected = 'Regular'; open = false; $root.updateShippingCost('Regular')"
                                        class="px-4 py-3 hover:bg-gray-100 cursor-pointer">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <p class="font-semibold text-gray-800">Regular</p>
                                                <p class="text-sm text-gray-500">Estimasi tiba 2-3 hari</p>
                                            </div>
                                            <span class="text-green-600 font-medium text-sm">Rp 15.000</span>
                                        </div>
                                    </li>
                                    <li @click="selected = 'Express'; open = false; $root.updateShippingCost('Express')"
                                        class="px-4 py-3 hover:bg-gray-100 cursor-pointer">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <p class="font-semibold text-gray-800">Express</p>
                                                <p class="text-sm text-gray-500">Estimasi tiba 1 hari</p>
                                            </div>
                                            <span class="text-green-600 font-medium text-sm">Rp 25.000</span>
                                        </div>
                                    </li>
                                    <li @click="selected = 'Same Day'; open = false; $root.updateShippingCost('Same Day')"
                                        class="px-4 py-3 hover:bg-gray-100 cursor-pointer">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <p class="font-semibold text-gray-800">Same Day</p>
                                                <p class="text-sm text-gray-500">Estimasi tiba hari ini</p>
                                            </div>
                                            <span class="text-green-600 font-medium text-sm">Rp 35.000</span>
                                        </div>
                                    </li>
                                </ul>
                                <input type="hidden" name="shipping_option_id" :value="selected">
                            </div>
                        </div>

                        <div class="p-6 bg-white w-full rounded-b-lg">
                            <h1 class="text-md font-medium mb-2">Metode Pembayaran</h1>
                            <div x-data="{ open: false, selectedPayment: 'Transfer Bank' }" class="relative w-full mx-auto">
                                <button type="button" @click="open = !open"
                                    class="w-full bg-white border border-gray-300 rounded-lg px-4 py-3 text-left flex justify-between items-center hover:border-green-500 focus:outline-none">
                                    <span x-text="selectedPayment"></span>
                                    <svg class="w-4 h-4 text-gray-600 transform" :class="open ? 'rotate-180' : ''"
                                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <ul x-show="open" @click.outside="open = false" x-transition
                                    class="absolute z-10 w-full bg-white border border-gray-300 rounded-lg mt-1 shadow-md">
                                    <li @click="selectedPayment = 'BCA'; open = false"
                                        class="px-4 py-3 hover:bg-gray-100 cursor-pointer">
                                        <div>
                                            <p class="font-semibold text-gray-800">Bank Central Asia (BCA)</p>
                                            <p class="text-sm text-gray-500">Transfer ke rekening BCA kami</p>
                                        </div>
                                    </li>
                                    <li @click="selectedPayment = 'Mandiri'; open = false"
                                        class="px-4 py-3 hover:bg-gray-100 cursor-pointer">
                                        <div>
                                            <p class="font-semibold text-gray-800">Bank Mandiri</p>
                                            <p class="text-sm text-gray-500">Transfer ke rekening Mandiri kami</p>
                                        </div>
                                    </li>
                                    <li @click="selectedPayment = 'BNI'; open = false"
                                        class="px-4 py-3 hover:bg-gray-100 cursor-pointer">
                                        <div>
                                            <p class="font-semibold text-gray-800">Bank Negara Indonesia (BNI)</p>
                                            <p class="text-sm text-gray-500">Transfer ke rekening BNI kami</p>
                                        </div>
                                    </li>
                                </ul>
                                <input type="hidden" name="payment_method_id" :value="selectedPayment">
                            </div>
                        </div>
                    </div>

                    {{-- Product Selection --}}
                    <div class="p-6 bg-white w-full rounded-lg">
                        <h1 class="text-lg font-medium mb-4">Pilih Produk</h1>
                        <div class="space-y-4">
                            <div class="bg-white rounded-lg shadow-sm" x-data="{ quantity: 0, price: 150000 }" x-init="$watch('quantity', value => $root.subtotal = value * price);
                            $root.subtotal = quantity * price">
                                <div class="p-6">
                                    <div class="flex flex-col md:flex-row gap-6">
                                        {{-- Product Image --}}
                                        <div class="w-full md:w-32 flex-shrink-0">
                                            <div class="bg-gray-50 rounded-lg p-2 flex items-center justify-center">
                                                <img src="https://via.placeholder.com/150" alt="Product Image"
                                                    class="w-full h-32 object-contain">
                                            </div>
                                        </div>

                                        {{-- Product Details --}}
                                        <div class="flex-grow">
                                            <a href="#"
                                                class="text-lg font-medium text-gray-900 hover:text-secondaryColors-base">
                                                Kaos Polos Premium
                                            </a>

                                            <div class="flex items-center gap-4 mt-2">
                                                <p class="text-gray-600">Warna: <span class="text-gray-900">Hitam</span>
                                                </p>
                                                <p class="text-gray-600">Ukuran: <span class="text-gray-900">M</span>
                                                </p>
                                            </div>

                                            {{-- Quantity Controls --}}
                                            <div class="mt-4">
                                                <div
                                                    class="inline-flex items-center border border-gray-200 rounded-lg bg-gray-50 p-1">
                                                    <button type="button"
                                                        @click="quantity > 0 ? quantity-- : quantity"
                                                        class="p-2 text-gray-600 hover:text-gray-900">-</button>
                                                    <input type="number" name="quantities[1]" x-model="quantity"
                                                        min="0"
                                                        class="w-16 text-center bg-transparent border-0 focus:ring-0">
                                                    <button type="button" @click="quantity++"
                                                        class="p-2 text-gray-600 hover:text-gray-900">+</button>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Price Info --}}
                                        <div class="w-full md:w-48 text-right">
                                            <p class="text-gray-600">Harga Item</p>
                                            <p class="text-lg font-semibold text-gray-900 mt-2">
                                                Rp 150.000
                                                <span class="text-sm font-normal text-gray-500">/ item</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Card Footer --}}
                                <div class="px-6 py-4 bg-gray-50 rounded-b-lg">
                                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                                        <div class="flex items-center gap-4">
                                            <a href="{{ route('products.details', ['id' => $id]) }}"
                                                class="text-gray-600 hover:text-red-600 flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Hapus
                                            </a>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-gray-900 font-medium">Total:
                                                <span class="text-gray-600"
                                                    x-text="'Rp ' + (quantity * price).toLocaleString('id-ID')"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Payment Method Section --}}
                        </div>
                    </div>

                    {{-- Shipping Information --}}

                </div>

                <div class="bg-white w-[30%] order_summary">
                    <div class="bg-white w-full rounded-lg border border-gray-200">
                        <h2 class="p-4 border-b border-gray-200 font-bold flex items-center justify-between">
                            Ringkasan Pesanan
                            <i
                                class="p-2 border-[2px] cursor-pointer border-gray-200 rounded-lg w-8 h-8 text-md flex items-center justify-center">i</i>
                        </h2>

                        <ul class="px-4 py-6 flex flex-col items-start gap-6">
                            <li class="flex items-center justify-between w-full">
                                <span>Subtotal</span>
                                <span x-text="'Rp ' + subtotal.toLocaleString('id-ID')">Rp 0</span>
                            </li>
                            <li class="flex items-center justify-between w-full">
                                <span>Shipping</span>
                                <span x-text="'Rp ' + shippingCost.toLocaleString('id-ID')">Rp 0</span>
                            </li>
                            <li class="flex items-center justify-between w-full font-bold">
                                <span>Total Bayar</span>
                                <span x-text="'Rp ' + total.toLocaleString('id-ID')">Rp 0</span>
                            </li>
                        </ul>
                        <ul class="px-4 py-4 flex flex-col items-start gap-4 border-t border-gray-200">
                            <button type="submit"
                                class="w-full bg-secondaryColors-base py-3 rounded-md text-white font-medium hover:bg-secondaryColors-60 transition-all">Lanjut
                                Pembayaran</button>
                        </ul>
                    </div>
                </div>
            </form>
        </section>
    </main>

</body>
<html>
