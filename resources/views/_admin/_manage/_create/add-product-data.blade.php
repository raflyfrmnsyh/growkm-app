<x-layouts.admin.admin-layout>
    <x-slot:title>{{ $title ? $title : 'Tambah data' }}</x-slot:title>

    <div
        class="p-6 bg-white w-full gap-8 rounded-t-md flex lg:flex-row flex-col items-end justify-between border-b border-gray-200">
        <h1 class="font-semibold text-lg">Tambah Data Produk</h1>

        <div class="flex flex-col md:flex-row items-center gap-2 w-full lg:w-auto justify-between lg:justify-end">
            <a href="{{ route('admin.manage.product') }}" class="opacity-50 hover:opacity-100 transition-all">Kelola
                Produk</a>
            <span>/</span>
            <span class="font-medium text-secondaryColors-base">Tambah data</span>
        </div>
    </div>

    <div class="p-6 bg-white w-full">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Terjadi Kesalahan!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.manage.product.store') }}" method="POST" enctype="multipart/form-data"
            class="flex gap-2 flex-wrap justify-between items-start">
            @csrf
            <div class="w-full flex items-start justify-between gap-6">
                <div class="product_informations w-[48%]">
                    <h1 class="font-semibold text-xl mb-4">Informasi Produk</h1>
                    <div x-data="{
                        preview: null,
                        updatePreview(event) {
                            const file = event.target.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = e => this.preview = e.target.result;
                                reader.readAsDataURL(file);
                            } else {
                                this.preview = null;
                            }
                        },
                        clearPreview() {
                            this.preview = null;
                            $refs.fileInput.value = '';
                        }
                    }" class="mb-4 relative">
                        <label for="product_image"
                            class="flex flex-col items-center justify-center w-full h-[192px] border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-all relative">
                            <template x-if="preview">
                                <div class="w-full h-full relative">
                                    <img :src="preview" alt="Preview"
                                        class="object-cover h-full w-full rounded-lg" />
                                    <button type="button" @click.stop="clearPreview"
                                        class="absolute top-2 right-2 bg-white bg-opacity-80 hover:bg-opacity-100 rounded-full p-1 shadow text-gray-700"
                                        title="Cancel preview">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </template>
                            <div class="flex flex-col items-center justify-center pt-5 pb-6" x-show="!preview">
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-md text-gray-500"><span class="font-semibold">Click to upload</span>
                                    gambar produk</p>
                                <p class="text-xs text-gray-500">Mendukung format PNG dan JPG (MAX. 1024x768)</p>
                            </div>
                            <input id="product_image" name="product_image" type="file" class="hidden"
                                accept="image/*" @change="updatePreview" x-ref="fileInput" />
                        </label>
                        @error('product_image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 flex flex-col w-full">
                        <label for="product_name" class="font-medium text-gray-800 w-full">Nama Produk</label>
                        <input type="text" name="product_name" id="nameField" placeholder="Masukkan nama produk"
                            required value="{{ old('product_name') }}"
                            class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2">
                        @error('product_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 flex flex-col w-full">
                        <label for="product_description" class="font-medium text-gray-800 w-full">Deskripsi
                            Produk</label>
                        <textarea name="product_description" id="descField" rows="3" placeholder="Deskripsi produk"
                            class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2 resize-none">{{ old('product_description') }}</textarea>
                        @error('product_description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 flex flex-col w-full">
                        <label for="product_category" class="font-medium text-gray-800 w-full mb-1">Kategori
                            Produk</label>
                        <div x-data="{
                            product_categories: {{ old('product_category') ? json_encode(old('product_category')) : '[]' }},
                            categories: [
                                { id: 1, name: 'Elektronik' },
                                { id: 2, name: 'Fashion' },
                                { id: 3, name: 'Makanan' },
                                { id: 4, name: 'Kesehatan' },
                                { id: 5, name: 'Olahraga' }
                            ],
                            selectedCategory: '',
                            addCategory() {
                                if (this.selectedCategory && !this.product_categories.includes(this.selectedCategory)) {
                                    this.product_categories.push(this.selectedCategory);
                                    this.selectedCategory = '';
                                }
                            },
                            removeCategory(category) {
                                this.product_categories = this.product_categories.filter(t => t !== category);
                            }
                        }" class="relative">
                            <div class="flex flex-wrap gap-2 px-3 py-3 border border-gray-200 rounded-md">
                                <template x-for="category in product_categories" :key="category">
                                    <div
                                        class="flex items-center gap-1 bg-secondaryColors-10 text-secondaryColors-base px-2 py-1 rounded-md text-md">
                                        <span x-text="category"></span>
                                        <button type="button" @click="removeCategory(category)"
                                            class="text-secondaryColors-base hover:text-secondaryColors-base">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                        <input type="hidden" name="product_category[]" :value="category">
                                    </div>
                                </template>
                                <select x-model="selectedCategory" @change="addCategory()"
                                    class="flex-1 min-w-[200px] outline-none text-md border-0">
                                    <option value="">Pilih Kategori</option>
                                    <template x-for="category in categories" :key="category.id">
                                        <option :value="category.name" x-text="category.name"></option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        @error('product_category')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 flex flex-col w-full">
                        <label for="product_tags" class="font-medium text-gray-800 w-full">Tags Produk</label>
                        <input type="text" name="product_tags" id="tagsField"
                            placeholder="Pisahkan dengan koma, cth: baju, kaos, pria"
                            value="{{ old('product_tags') }}"
                            class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2">
                        @error('product_tags')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="product-details w-[48%]">
                    <h1 class="font-semibold text-xl mb-4">Detail Produk</h1>

                    <div class="mb-4 flex flex-col w-full">
                        <label for="product_price" class="font-medium text-gray-800 w-full">Harga Produk</label>
                        <input type="text" name="product_price" id="priceField" placeholder="Rp." required
                            value="{{ old('product_price') }}"
                            class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2">
                        @error('product_price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 flex flex-col w-full">
                        <label for="product_stock" class="font-medium text-gray-800 w-full">Stok Produk</label>
                        <input type="number" min="0" name="product_stock" id="stockField" required
                            value="{{ old('product_stock') }}" placeholder="Jumlah stok produk"
                            class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2">
                        @error('product_stock')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4 flex flex-col w-full">
                        <label for="product_min_order" class="font-medium text-gray-800 w-full">Min Order</label>
                        <div class="flex gap-2">
                            <input type="number" min="1" name="product_min_order" id="minOrderField"
                                value="{{ old('product_min_order') }}" required placeholder="Jumlah minimal order"
                                class="border border-gray-200 px-4 py-3 my-2 rounded-md w-2/3 focus:outline-none focus:border-secondaryColors-base focus:border-2">
                            <div class="relative w-1/3">
                                <select name="product_min_order_unit" id="minOrderUnit" required
                                    class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2 appearance-none">
                                    <option value="">Pilih Satuan</option>
                                    <option value="pcs"
                                        {{ old('product_min_order_unit') == 'pcs' ? 'selected' : '' }}>PCS</option>
                                    <option value="kg"
                                        {{ old('product_min_order_unit') == 'kg' ? 'selected' : '' }}>KG</option>
                                    <option value="liter"
                                        {{ old('product_min_order_unit') == 'liter' ? 'selected' : '' }}>Liter</option>
                                    <option value="meter"
                                        {{ old('product_min_order_unit') == 'meter' ? 'selected' : '' }}>Meter</option>
                                    <option value="item"
                                        {{ old('product_min_order_unit') == 'item' ? 'selected' : '' }}>Item</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        @error('product_min_order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full">
                        <div class="flex items-center gap-4">
                            <input type="submit" value="Tambah Data"
                                class="bg-secondaryColors-base px-4 py-3 font-semibold text-white rounded-md cursor-pointer hover:bg-secondaryColors-60 transition-all">
                            <a href="{{ route('admin.manage.product') }}"
                                class="px-4 py-3 font-medium text-dark-base border border-gray-300 rounded-md ">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layouts.admin.admin-layout>
