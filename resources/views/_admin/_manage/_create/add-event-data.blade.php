<x-layouts.admin.admin-layout>
    <x-slot:title>{{ $title ? $title : 'Tambah data' }}</x-slot:title>

    <div
        class="p-6 bg-white w-full gap-8 rounded-t-md flex lg:flex-row flex-col items-end justify-between border-b border-gray-200">
        <h1 class="font-semibold text-lg">Tambah Data Event & Kelas</h1>

        <div class="flex flex-col md:flex-row items-center gap-2 w-full lg:w-auto justify-between lg:justify-end">
            <a href="{{ route('admin.manage.event') }}" class="opacity-50 hover:opacity-100 transition-all">Kelola
                Event</a>
            <span>/</span>
            <span class="font-medium text-secondaryColors-base">Tambah data</span>
        </div>
    </div>

    <div class="p-6 bg-white w-full">
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Terjadi Kesalahan!</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.manage.event.store') }}" method="POST" enctype="multipart/form-data" class="flex gap-2 flex-wrap justify-between items-start">
            @csrf
            <div class="w-full flex items-start justify-between gap-6">
                <div class="event_informations w-[48%]">
                    <h1 class="font-semibold text-xl mb-4">Informasi umum event</h1>
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
                        <label for="event_banner_img"
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
                                    Image or banner event
                                </p>
                                <p class="text-xs text-gray-500">Mendukung format PNG dan JPG (MAX. 1024x768)</p>
                            </div>
                            <input id="event_banner_img" name="event_banner_img" type="file" class="hidden" accept="image/*"
                                @change="updatePreview" x-ref="fileInput" />
                        </label>
                    </div>
                    <div class="mb-4 flex flex-col w-full">
                        <label for="event_name" class="font-medium text-gray-800 w-full">Judul kegiatan</label>
                        <input type="text" name="event_name" id="nameField" placeholder="Seminar Bisnis digital"
                            required
                            class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2">
                    </div>
                    <div class="mb-4 flex flex-col w-full">
                        <label for="event_desc" class="font-medium text-gray-800 w-full">Deskripsi</label>
                        <textarea name="event_desc" id="descField" rows="3" placeholder="Deskripsi kegiatan"
                            class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2 resize-none"></textarea>
                    </div>

                    <div class="mb-4 flex flex-col w-full">
                        <label for="tags_event" class="font-medium text-gray-800 w-full mb-1">Tags Event</label>
                        <div x-data="{
                            tags: [],
                            categories: [
                                { id: 1, name: 'Seminar' },
                                { id: 2, name: 'Workshop' },
                                { id: 3, name: 'Konferensi' },
                                { id: 4, name: 'Pelatihan' },
                                { id: 5, name: 'Networking' }
                            ],
                            selectedCategory: '',
                            addTag() {
                                if (this.selectedCategory && !this.tags.includes(this.selectedCategory)) {
                                    this.tags.push(this.selectedCategory);
                                    this.selectedCategory = '';
                                }
                            },
                            removeTag(tag) {
                                this.tags = this.tags.filter(t => t !== tag);
                            }
                        }" class="relative">
                            <div class="flex flex-wrap gap-2 px-3 py-3 border border-gray-200 rounded-md">
                                <template x-for="tag in tags" :key="tag">
                                    <div
                                        class="flex items-center gap-1 bg-secondaryColors-10 text-secondaryColors-base px-2 py-1 rounded-md text-md">
                                        <span x-text="tag"></span>
                                        <button type="button" @click="removeTag(tag)"
                                            class="text-secondaryColors-base hover:text-secondaryColors-base">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                        <input type="hidden" name="tags_event[]" :value="tag">
                                    </div>
                                </template>
                                <select x-model="selectedCategory" @change="addTag()"
                                    class="flex-1 min-w-[200px] outline-none text-md border-0">
                                    <option value="">Pilih Kategori</option>
                                    <template x-for="category in categories" :key="category.id">
                                        <option :value="category.name" x-text="category.name"></option>
                                    </template>
                                </select>
                            </div>
                        </div>
                    </div>
                    <h1 class="font-semibold text-xl mb-4 pt-4">Informasi biaya</h1>
                    <div class="mb-4 flex flex-col w-full md:w-full">
                        <label for="event_type_paid" class="font-medium text-gray-800 w-full">Jenis kegiatan</label>
                        <div class="relative">
                            <select name="event_type_paid" id="eventTypePaidrFieldSelect"
                                class="block appearance-none my-2 w-full bg-white border border-gray-200 px-4 py-3 pr-8 rounded-md leading-tight focus:outline-none transition focus:border-2 focus:border-secondaryColors-40 custom-select">
                                <option value="Online_Berbayar">Online Berbayar</option>
                                <option value="Online_Gratis">Online Gratis</option>
                                <option value="Offline_Berbayar">Offline Berbayar</option>
                                <option value="Offline_Gratis">Offline Gratis</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 flex flex-col w-full">
                        <label for="event_price" class="font-medium text-gray-800 w-full">Biaya Kegiatan</label>
                        <input type="text" name="event_price" id="priceField" placeholder="Rp." required
                            class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2">
                    </div>

                </div>
                <div class="event-date-details w-[48%]">
                    <h1 class="font-semibold text-xl mb-4">Detail Waktu Kegiatan dan pendaftaran</h1>

                    <div class="mb-4 flex flex-col w-full">
                        <label for="event_location" class="font-medium text-gray-800 w-full">Set Lokasi Kegiatan</label>
                        <input type="text" name="event_location" id="nameField"
                            placeholder="Link Maps Vanue atau Zoom Meet Link" required
                            class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2">
                    </div>
                    <div class="mb-4 flex flex-col w-full">
                        <label for="event_date" class="font-medium text-gray-800 w-full">Tanggal Event</label>
                        <input type="date" name="event_date" id="nameField"
                            placeholder="Link Maps Vanue atau Zoom Meet Link" required
                            class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2">
                    </div>
                    <div class="mb-7 flex items-center w-full gap-2">
                        <div class="flex flex-col gap-2 w-full">
                            <label for="event_start_time" class="font-medium text-gray-800 w-full">Waktu awal</label>
                            <input type="time" name="event_start_time" aria-label="Mulai"
                                class="flex-1 px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:border-secondaryColors-base" />
                        </div>
                        <span class="text-gray-500 self-center translate-y-4">-</span>
                        <div class="flex flex-col gap-2 w-full">
                            <label for="event_end_time" class="font-medium text-gray-800 w-full">Waktu Akhir</label>
                            <input type="time" name="event_end_time" aria-label="Selesai"
                                class="flex-1 px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:border-secondaryColors-base" />
                        </div>
                    </div>
                    <div class="mb-4 flex flex-col w-full">
                        <label for="event_registration_deadline" class="font-medium text-gray-800 w-full">Set batas pendaftaran</label>
                        <input type="datetime-local" name="event_registration_deadline" id="nameField" required
                            class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2">
                    </div>
                    <div class="mb-4 flex flex-col w-full">
                        <label for="event_quota" class="font-medium text-gray-800 w-full">Set Kuota Peserta</label>
                        <input type="number" min="0" name="event_quota" id="nameField" required
                            placeholder="Jumlah kuota peserta"
                            class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2">
                    </div>
                    <h1 class="font-semibold text-xl mb-4 pt-4">Informasi Pemateri</h1>
                    <div class="mb-4 flex flex-col w-full">
                        <label for="event_speaker_name" class="font-medium text-gray-800 w-full">Nama Pemateri</label>
                        <input type="text" name="event_speaker_name" id="priceField" placeholder="Asep Surasep" required
                            class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2">
                    </div>
                    <div class="mb-4 flex flex-col w-full">
                        <label for="event_speaker_job" class="font-medium text-gray-800 w-full">Pekerjaan Pemateri</label>
                        <input type="text" name="event_speaker_job" id="priceField" placeholder="Head of GrowKM" required
                            class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2">
                    </div>
                    <div class="w-full">
                        <div class="flex items-center gap-4">
                            <input type="submit" value="Tambah Data"
                                class="bg-secondaryColors-base px-4 py-3 font-semibold text-white rounded-md cursor-pointer hover:bg-secondaryColors-60 transition-all">
                            <a href="{{ route('admin.manage.event') }}"
                                class="px-4 py-3 font-medium text-dark-base border border-gray-300 rounded-md ">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>

</x-layouts.admin.admin-layout>
