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
        <form action="{{ route('participant.register', ['id' => $data['event_id']]) }}" method="POST"
            @submit.prevent="
        $refs.subtotalInput.value = subtotal;
        $el.submit();
    "
            class="section_content flex items-start gap-4 mx-8 py-[112px]" x-data="{
                qty: 1,
                price: 0,
                get subtotal() { return this.qty * this.price },
                formatRupiah(val) {
                    return 'Rp. ' + val.toLocaleString('id-ID');
                }
            }" x-init="price = {{ $data['event_price'] }}">

            @csrf



            <div class="w-[70%] flex flex-col gap-4">
                {{-- Shipping Information --}}
                <div class="flex flex-col">
                    <div class="bg-white mb-4 rounded-lg">

                        <div
                            class="w-full h-[188px] flex items-center justify-center bg-gray-200 rounded-t-lg overflow-hidden">
                            <img src="{{ isset($data['event_banner_image']) && $data['event_banner_image'] ? asset($data['event_banner_image']) : asset('image/courses-1.png') }}"
                                alt="{{ $data['event_title'] }}" class="w-full h-full object-cover">
                        </div>
                        <div class="py-4 px-4">
                            <h2 class="text-xl font-semibold">{{ $data['event_title'] }}</h2>
                            <h4 class="pt-6 pb-2 font-semibold">Deskripsi Event</h4>
                            <span>{{ $data['event_description'] }}</span>
                        </div>
                    </div>

                    <div class="p-6 bg-white w-full rounded-t-lg border-b border-gray-200">
                        <div class="w-full flex justify-between">
                            <h1 class="text-lg font-medium">Pendaftaran Event</h1>
                            <a href="#" class="">
                                <x-icons.address-edit class="size-6 stroke-gray-600"></x-icons.address-edit>
                            </a>
                        </div>
                    </div>

                    <div class="pt-6 px-6 bg-white w-full flex flex-wrap justify-between">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">

                        <div class="mb-4 flex flex-col w-full md:w-[48%]">
                            <label for="participant_name" class="font-medium text-gray-800 w-full">Nama Lengkap</label>
                            <input type="text" name="participant_name" id="participant_nameField"
                                placeholder="Jhon Doe" value="{{ old('participant_name', Auth::user()->user_name) }}"
                                required
                                class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2">
                        </div>
                        <div class="mb-4 flex flex-col w-full md:w-[48%]">
                            <label for="participant_email" class="font-medium text-gray-800 w-full">Email</label>
                            <input type="text" name="participant_email" id="participant_emailField"
                                placeholder="jhondoe@example.id" required
                                value="{{ old('participant_email', Auth::user()->email) }}"
                                class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2">
                        </div>
                        <div class="mb-4 flex flex-col w-full md:w-[48%]">
                            <label for="participant_phone" class="font-medium text-gray-800 w-full">No. Ponsel</label>
                            <input type="text" name="participant_phone" id="participant_phoneField"
                                placeholder="+62xxxxxxx" required
                                value="{{ old('participant_phone', Auth::user()->user_phone) }}"
                                class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2">
                        </div>
                        <div class="mb-4 flex flex-col w-full md:w-[48%]">
                            <label for="participant_qty" class="font-medium text-gray-800 w-full">Jumlah Tiket</label>
                            <input type="number" name="participant_qty" id="participant_qtyField" min="1"
                                max="10" value="1" required placeholder="Jumlah tiket" x-model.number="qty"
                                class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2">
                        </div>

                        <!-- Perbaikan Subtotal -->
                        <input type="hidden" name="subtotal" x-ref="subtotalInput">
                    </div>
                </div>
            </div>

            <div class="w-[30%]">
                <div class="bg-white w-full rounded-lg border border-gray-200">
                    <h2 class="p-4 border-b border-gray-200 font-bold flex items-center justify-between">
                        Ringkasan Pesanan
                        <i
                            class="p-2 border-[2px] cursor-pointer border-gray-200 rounded-lg w-8 h-8 text-md flex items-center justify-center">i</i>
                    </h2>

                    <ul class="px-4 py-6 flex flex-col items-start gap-6">
                        <li class="flex items-center justify-between w-full">
                            <span>Jumlah Tiket</span>
                            <span x-text="qty + ' (Tiket)'"></span>
                        </li>
                        <li class="flex items-center justify-between w-full">
                            <span>Subtotal</span>
                            <span x-text="formatRupiah(subtotal)">Rp. 0</span>
                        </li>
                        <li class="flex items-center justify-between w-full font-bold">
                            <span>Total Bayar</span>
                            <span x-text="formatRupiah(subtotal)"></span>
                        </li>
                    </ul>

                    <ul class="px-4 py-4 flex flex-col items-start gap-4 border-t border-gray-200">

                        @if ($data['event_quota'] > 0)
                            <button type="submit"
                                class="w-full bg-secondaryColors-base py-3 rounded-md text-white font-medium hover:bg-secondaryColors-60 transition-all">
                                Lanjut Pembayaran
                            </button>
                        @else
                            <button type="button" disabled
                                class="w-full bg-gray-400 py-3 rounded-md text-white font-medium cursor-not-allowed">
                                Maaf, Tiket Habis
                            </button>
                        @endif
                        <a href="{{ route('event-detail', ['event_id' => $data['event_id'], 'user_id' => Auth::user()->user_id]) }}"
                            class="w-full bg-transparent py-3 rounded-md text-gray-800 font-medium hover:bg-light-60 transition-all text-center">
                            Kembali
                        </a>
                    </ul>
                </div>
            </div>
        </form>

    </main>

    @if (session()->has('quota_sold'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
            class="fixed top-6 right-6 z-50">
            <div class="bg-red-500 text-white px-6 py-4 rounded shadow-lg flex items-center gap-2"
                style="background-color: #ef4444 !important;">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18.364 5.636l-1.414-1.414A9 9 0 105.636 18.364l1.414 1.414A9 9 0 1018.364 5.636z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01" />
                </svg>
                <span>{{ session('quota_sold') }}</span>
            </div>
        </div>
    @endif

</body>
