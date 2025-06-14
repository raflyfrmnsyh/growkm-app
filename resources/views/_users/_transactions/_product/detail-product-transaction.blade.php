<x-layouts.admin.admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="p-6 mb-6 w-full bg-white flex items-center justify-between rounded-lg">
        <div class="flex items-center gap-8">
            <h1 class="font-semibold text-xl flex items-end gap-2">
                Detail order <span class="font-normal">#2523423</span>
            </h1>
            <h4 class="font-semibold">
                Pesanan Masuk
            </h4>
            <h4 class="date-information">
                Sat 14 Jun 2025 - 06:24 PM
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
                            class="font-medium text-gray-900">Rafly
                            Firmansyah,
                            Sumedang</span></span>
                </h1>

                <div class="p-6 w-full flex items-center justify-between gap-6">
                    <div class="flex flex-col items-start py-2 w-full border-b-4 border-secondaryColors-base">
                        <i>icon</i>
                        <span class="status">Review Order</span>
                    </div>
                    <div class="flex flex-col items-start py-2 w-full border-b-4 border-gray-200">
                        <i>icon</i>
                        <span class="status">Order diproses</span>
                    </div>
                    <div class="flex flex-col items-start py-2 w-full border-b-4 border-gray-200">
                        <i>icon</i>
                        <span class="status">Sedang dikirim</span>
                    </div>
                    <div class="flex flex-col items-start py-2 w-full border-b-4 border-gray-200">
                        <i>icon</i>
                        <span class="status">Selesai</span>
                    </div>
                </div>
                <div class="px-6 py-3 w-full border-t border-gray-200 flex items-center justify-between">
                    <span>Estimasi Pengiriman 3 Hari</span>

                    <form action="" method="POST">
                        @csrf
                        <input type="submit" value="Ubah status"
                            class="px-4 py-2 bg-secondaryColors-base rounded-md font-medium text-white hover:bg-secondaryColors-60 cursor-pointer transition-all">
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
                        @for ($i = 0; $i < 6; $i++)
                            <tr class="border-b border-gray-200">
                                <td class="text-center">{{ $i + 1 }}</td>
                                <td class="py-4 px-2 flex items-center gap-6">

                                    <div class="img w-16 h-16 flex items-center justify-center rounded-md bg-gray-50">
                                        img
                                    </div>

                                    <div>
                                        <h1 class="title-product font-medium">Fjallraven - Foldsack No.1 Backpack</h1>
                                        <span class="text-gray-500">tags, tags, tags</span>
                                    </div>

                                </td>
                                <td class="py-4 px-2 text-center">1x</td>
                                <td class="py-4 px-2">Rp.0</td>
                                <td class="py-4 px-2 font-semibold">Rp. 80.000</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-[40%] h-auto">
            <div class="bg-white w-full rounded-lg border border-gray-200">
                <h2 class="p-4 border-b border-gray-200 font-bold flex items-center justify-between">Detail Pelanggan
                    <i
                        class="p-2 border-[2px] cursor-pointer border-gray-200 rounded-lg w-8 h-8 text-md flex items-center justify-center">i</i>
                </h2>

                <ul class="px-4 py-4 flex flex-col items-start gap-4 border-b border-gray-200">
                    <li class="flex gap-2">
                        <i>icon</i>
                        <span>Alex Jander</span>
                    </li>
                    <li class="flex gap-2">
                        <i>i</i>
                        <span>alex@email.test</span>
                    </li>
                    <li class="flex gap-2">
                        <i>i</i>
                        <span>+6867565465345</span>
                    </li>
                </ul>
                <ul class="px-4 py-4 flex flex-col items-start gap-4 border-b border-gray-200">
                    <h1 class="font-semibold">
                        Informasi Pengiriman
                    </h1>
                    <li class="flex gap-2">
                        <i>icon</i>
                        <span>Jl. Malaka Desa Situraja Utara RW06/RT03 Kec. Situraja</span>
                    </li>
                    <li class="flex gap-2">
                        <i>icon</i>
                        <span>Kab. Sumedang, Jawa barat</span>
                    </li>
                    <li class="flex gap-2">
                        <i>icon</i>
                        <span>45371</span>
                    </li>
                </ul>
                <ul class="px-4 py-4 flex flex-col items-start gap-4">
                    <h1 class="font-semibold">
                        Ringkasan Pesanan
                    </h1>
                    <li class="flex items-center justify-between w-full">
                        <span>ID Transaksi</span>
                        <span>Alex Jander</span>
                    </li>
                    <li class="flex items-center justify-between w-full">
                        <span>Payment method</span>
                        <span>Bank transfer</span>
                    </li>
                    <li class="flex items-center justify-between w-full">
                        <span>Shipping</span>
                        <span>Rp. 0 (Free)</span>
                    </li>
                    <li class="flex items-center justify-between w-full">
                        <span>Subtotal</span>
                        <span>Rp. 1000.000</span>
                    </li>

                    <li class="flex items-center justify-between w-full font-bold">
                        <span>Total Bayar</span>
                        <span>Rp. 0</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>


</x-layouts.admin.admin-layout>
