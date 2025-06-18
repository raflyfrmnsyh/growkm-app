<!DOCTYPE html>
<html lang="en">
<x-partials.head-info>
    <x-slot:title>Buat Transaksi</x-slot:title>
</x-partials.head-info>

<body class="bg-gray-100 flex flex-row justify-center items-start" x-data="checkoutForm()">
    <x-partials.dashboard.sidebar />

    <main class="w-full lg:w-[80%] lg:left-[20%] absolute">
        <x-partials.dashboard.mobile-header />
        <x-partials.dashboard.desktop-header />
        <section>
            <form action="{{ route('create.transaction.product') }}" method="POST"
                class="section_content flex items-start gap-4 mx-8 py-[112px]" @submit.prevent="submitForm($event)">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                <input type="hidden" name="shipping_cost" :value="shippingCost">
                <input type="hidden" name="total" :value="total">
                <input type="hidden" name="transaction_status" value="pending">
                <input type="hidden" name="payment_status" value="unpaid">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">Ada kesalahan!</strong>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="w-[70%] flex flex-col gap-4">
                    <!-- Shipping Information -->
                    <div class="flex flex-col">
                        <div class="p-6 bg-white w-full rounded-t-lg border-b border-gray-200">
                            <h1 class="text-lg font-medium mb-4">Informasi Pengiriman</h1>
                            <div class="mb-4">
                                <label class="font-medium block mb-1" for="shipping_name">Nama Penerima</label>
                                <input type="text" id="shipping_name" name="shipping_name"
                                    class="w-full border rounded px-3 py-2" required>

                            </div>
                            <div class="mb-4">
                                <label class="font-medium block mb-1" for="shipping_phone">No. Telepon</label>
                                <input type="text" id="shipping_phone" name="shipping_phone"
                                    class="w-full border rounded px-3 py-2" required>

                            </div>
                            <div>
                                <label class="font-medium block mb-1" for="shipping_address">Alamat Pengiriman</label>
                                <textarea id="shipping_address" name="shipping_address" class="w-full border rounded px-3 py-2" rows="3" required></textarea>
                            </div>
                        </div>

                        <!-- Shipping Options -->
                        <div class="p-6 bg-white w-full border-b border-gray-200">
                            <h1 class="text-md font-medium mb-2">Paket Pengiriman</h1>
                            <div class="relative w-full mx-auto space-y-3">
                                <template x-for="option in shippingOptions" :key="option.value">
                                    <label
                                        class="flex items-center p-4 border border-gray-200 rounded-lg cursor-pointer"
                                        :class="shippingOption === option.value ? 'border-green-500' : ''">
                                        <input type="radio" name="shipping_option" :value="option.value"
                                            class="w-4 h-4 text-green-600" x-model="shippingOption">
                                        <div class="ml-3 flex-grow">
                                            <span class="font-medium" x-text="option.label"></span>
                                            <p class="text-sm text-gray-500" x-text="option.estimate"></p>
                                        </div>
                                        <span class="font-medium" x-text="'Rp ' + option.cost.toLocaleString()"></span>
                                    </label>
                                </template>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="p-6 bg-white w-full rounded-b-lg">
                            <h1 class="text-md font-medium mb-2">Metode Pembayaran</h1>
                            <div class="relative w-full mx-auto">
                                <select name="payment_method"
                                    class="w-full bg-white border border-gray-300 rounded-lg px-4 py-3 text-left focus:outline-none focus:border-green-500"
                                    required>
                                    <option value="" disabled selected>Pilih Metode Pembayaran</option>
                                    <option value="bca">Bank BCA</option>
                                    <option value="mandiri">Bank Mandiri</option>
                                    <option value="bni">Bank BNI</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    @if ($errors->has('message'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Gagal!</strong>
                            <span class="block sm:inline">{{ $errors->first('message') }}</span>
                        </div>
                    @endif

                    <!-- Produk -->
                    <div class="p-6 bg-white w-full rounded-lg">
                        <h1 class="text-lg font-medium mb-4">Pilih Produk</h1>
                        <template x-if="products.length === 0">
                            <div class="text-center text-gray-500 py-8">Tidak ada produk dipilih.</div>
                        </template>
                        <template x-for="(item, index) in products" :key="index">
                            <div class="bg-white rounded-lg shadow-sm mb-4">
                                <div class="p-6 flex flex-col md:flex-row gap-6">
                                    <div class="w-full md:w-32">
                                        <img :src="item.image" alt="Product Image"
                                            class="w-full h-32 object-contain">
                                    </div>
                                    <div class="flex-grow">
                                        <h2 class="text-lg font-medium text-gray-900" x-text="item.name"></h2>
                                        <p class="text-sm text-gray-600"
                                            x-text="'Rp ' + item.price.toLocaleString() + ' / item'"></p>
                                    </div>
                                    <div>
                                        <div class="inline-flex items-center border rounded-lg bg-gray-50 px-2 py-1">
                                            <button type="button" class="pe-4 text-gray-600"
                                                @click="decrementQty(index)">-</button>
                                            <input type="number" min="1"
                                                class="w-8 text-center border-0 bg-transparent focus:outline-none"
                                                x-model.number="item.qty" readonly>
                                            <button type="button" class=" text-gray-600"
                                                @click="incrementQty(index)">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-6 py-4 bg-gray-50 rounded-b-lg flex justify-between">
                                    <a href="#" class="text-red-600"
                                        @click.prevent="removeItem(index)">Hapus</a>
                                    <p class="text-gray-900 font-medium"
                                        x-text="'Total: Rp ' + (item.price * item.qty).toLocaleString()"></p>
                                </div>
                                <!-- Hidden inputs for each product -->
                                <input type="hidden" :name="'products[' + index + '][product_id]'"
                                    :value="item.id">
                                <input type="hidden" :name="'products[' + index + '][quantity]'"
                                    :value="item.qty">
                                <input type="hidden" :name="'products[' + index + '][price]'"
                                    :value="item.price">
                                <input type="hidden" :name="'products[' + index + '][subtotal]'"
                                    :value="(item.price * item.qty)">
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="bg-white w-[30%] order_summary">
                    <div class="bg-white w-full rounded-lg border border-gray-200">
                        <h2 class="p-4 border-b font-bold">Ringkasan Pesanan</h2>
                        <ul class="px-4 py-6 flex flex-col gap-6">
                            <li class="flex justify-between">
                                <span>Subtotal</span>
                                <span x-text="'Rp ' + subtotal.toLocaleString()"></span>
                            </li>
                            <li class="flex justify-between">
                                <span>Shipping</span>
                                <span x-text="'Rp ' + shippingCost.toLocaleString()"></span>
                            </li>
                            <li class="flex justify-between font-bold">
                                <span>Total Bayar</span>
                                <span x-text="'Rp ' + total.toLocaleString()"></span>
                            </li>
                        </ul>
                        <div class="px-4 pb-4">
                            <button type="submit"
                                class="w-full bg-secondaryColors-base py-3 rounded-md text-white font-medium hover:bg-secondaryColors-60 transition-all"
                                :disabled="products.length === 0">
                                Lanjut Pembayaran
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>

    <script>
        function checkoutForm() {
            return {
                shippingOptions: [{
                        value: 'regular',
                        label: 'Reguler',
                        estimate: 'Estimasi 3-5 hari',
                        cost: 15000
                    },
                    {
                        value: 'express',
                        label: 'Express',
                        estimate: 'Estimasi 1-2 hari',
                        cost: 25000
                    }
                ],
                shippingOption: 'regular',
                products: [{
                    id: @json($data['product_id']),
                    name: @json($data['product_name']),
                    price: @json($data['product_price']),
                    qty: 1,
                    image: @json($data['product_image'])
                }],
                get subtotal() {
                    return this.products.reduce((sum, p) => sum + (p.price * p.qty), 0);
                },
                get shippingCost() {
                    const selected = this.shippingOptions.find(opt => opt.value === this.shippingOption);
                    return selected ? selected.cost : 0;
                },
                get total() {
                    return this.subtotal + this.shippingCost;
                },
                removeItem(index) {
                    this.products.splice(index, 1);
                },
                incrementQty(index) {
                    this.products[index].qty++;
                },
                decrementQty(index) {
                    if (this.products[index].qty > 1) {
                        this.products[index].qty--;
                    }
                },
                submitForm(event) {
                    if (this.products.length === 0) {
                        alert('Pilih minimal satu produk.');
                        return;
                    }
                    event.target.submit();
                }
            }
        }
    </script>
</body>

</html>
