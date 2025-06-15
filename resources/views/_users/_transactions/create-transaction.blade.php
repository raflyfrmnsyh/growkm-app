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
                class="section_content flex items-start gap-4 mx-8 py-[112px]">
                @csrf
                <input type="hidden" name="user_id" value="">
                <input type="hidden" name="total_amount" value="">
                <input type="hidden" name="shipping_cost" value="">
                <input type="hidden" name="status" value="pending">

                <div class="w-[70%] flex flex-col gap-4">
                    <!-- Shipping Information Section -->
                    <div class="flex flex-col">
                        <div class="p-6 bg-white w-full rounded-t-lg border-b border-gray-200">
                            <div class="w-full flex justify-between">
                                <h1 class="text-lg font-medium mb-4">Informasi Pengiriman</h1>
                            </div>

                            <div>
                                <span class="font-medium">Alamat Utama</span>
                                <p>Alamat pengiriman</p>
                            </div>
                        </div>

                        <!-- Shipping Options -->
                        <div class="p-6 bg-white w-full border-b border-gray-200">
                            <h1 class="text-md font-medium mb-2">Paket Pengiriman</h1>
                            <div class="relative w-full mx-auto space-y-3">
                                <label
                                    class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-green-500 cursor-pointer">
                                    <input type="radio" name="shipping_option" value="regular"
                                        class="w-4 h-4 text-green-600" checked>
                                    <div class="ml-3 flex-grow">
                                        <span class="font-medium">Reguler</span>
                                        <p class="text-sm text-gray-500">Estimasi 3-5 hari</p>
                                    </div>
                                    <span class="font-medium">Rp 15.000</span>
                                </label>

                                <label
                                    class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-green-500 cursor-pointer">
                                    <input type="radio" name="shipping_option" value="express"
                                        class="w-4 h-4 text-green-600">
                                    <div class="ml-3 flex-grow">
                                        <span class="font-medium">Express</span>
                                        <p class="text-sm text-gray-500">Estimasi 1-2 hari</p>
                                    </div>
                                    <span class="font-medium">Rp 25.000</span>
                                </label>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="p-6 bg-white w-full rounded-b-lg">
                            <h1 class="text-md font-medium mb-2">Metode Pembayaran</h1>
                            <div class="relative w-full mx-auto">
                                <select name="payment_method"
                                    class="w-full bg-white border border-gray-300 rounded-lg px-4 py-3 text-left focus:outline-none focus:border-green-500">
                                    <option value="" disabled selected>Pilih Metode Pembayaran</option>
                                    <option value="bca">Bank BCA</option>
                                    <option value="mandiri">Bank Mandiri</option>
                                    <option value="bni">Bank BNI</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Product Selection -->
                    <div class="p-6 bg-white w-full rounded-lg">
                        <h1 class="text-lg font-medium mb-4">Pilih Produk</h1>
                        <div class="space-y-4">
                            <div class="bg-white rounded-lg shadow-sm">
                                <div class="p-6">
                                    <div class="flex flex-col md:flex-row gap-6">
                                        <!-- Product Image -->
                                        <div class="w-full md:w-32 flex-shrink-0">
                                            <div class="bg-gray-50 rounded-lg p-2 flex items-center justify-center">
                                                <img src="" alt="Product Image"
                                                    class="w-full h-32 object-contain">
                                            </div>
                                        </div>

                                        <!-- Product Details -->
                                        <div class="flex-grow">
                                            <div class="flex flex-col gap-2">
                                                <h2
                                                    class="text-lg font-medium text-gray-900 hover:text-secondaryColors-base transition-colors">
                                                    Nama Produk
                                                </h2>

                                                <div class="flex justify-between items-center">

                                                    <div class="text-right">
                                                        <p class="text-sm text-gray-600">Harga Satuan</p>
                                                        <p class="text-lg font-semibold text-gray-900">
                                                            Rp 0
                                                            <span class="text-sm font-normal text-gray-500">/
                                                                item</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <div x-data="{ qty: 1 }"
                                                class="inline-flex items-center border border-gray-300 rounded-lg bg-gray-50 px-2 py-1">

                                                <button type="button"
                                                    class="pe-4 py-1 text-gray-600 hover:text-gray-900 disabled:opacity-50"
                                                    @click="qty = Math.max(1, qty - 1)">
                                                    -
                                                </button>

                                                <input type="number" name="quantities[]" min="1"
                                                    :value="qty" readonly
                                                    class="w-8 text-center border-0 focus:outline-none focus:ring-0"
                                                    x-model="qty">

                                                <button type="button" class=" py-1 text-gray-600 hover:text-gray-900"
                                                    @click="qty++">
                                                    +
                                                </button>
                                            </div>

                                        </div>


                                    </div>
                                </div>

                                {{-- Card Footer --}}
                                <div class="px-6 py-4 bg-gray-50 rounded-b-lg">
                                    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                                        <div class="flex items-center gap-4">
                                            <a href="#"
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
                                                <span class="text-gray-600">Rp 0</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <span>Rp 0</span>
                            </li>
                            <li class="flex items-center justify-between w-full">
                                <span>Shipping</span>
                                <span>Rp 0</span>
                            </li>
                            <li class="flex items-center justify-between w-full font-bold">
                                <span>Total Bayar</span>
                                <span>Rp 0</span>
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
