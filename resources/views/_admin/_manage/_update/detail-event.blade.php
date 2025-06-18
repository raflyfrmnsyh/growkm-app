<x-layouts.admin.admin-layout>
    <x-slot:title>Detail Event</x-slot:title>

    <div class="p-6 bg-white w-full gap-8 rounded-t-md flex lg:flex-row flex-col items-end justify-between border-b border-gray-200">
        <h1 class="font-semibold text-lg">Detail Event & Kelas</h1>

        <div class="flex flex-col md:flex-row items-center gap-2 w-full lg:w-auto justify-between lg:justify-end">
            <a href="{{ route('admin.manage.event') }}" class="opacity-50 hover:opacity-100 transition-all">Kelola Event</a>
            <span>/</span>
            <span class="font-medium text-secondaryColors-base">Detail data</span>
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
        <form method="POST" action="{{ route('admin.manage.event.update', $event->event_id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="w-full flex flex-col lg:flex-row items-start justify-between gap-6">
                <div class="event_informations w-full lg:w-[48%]">
                    <h1 class="font-semibold text-xl mb-4">Informasi umum event</h1>

                    <!-- Banner Image -->
                    <div class="mb-4">
                        <label class="font-medium text-gray-800 w-full mb-2 block">Banner Event</label>
                        @if(!empty($event->event_banner_img))
                            <img src="{{ asset($event->event_banner_img) }}" alt="Event Banner" class="w-full h-48 object-cover rounded-lg">
                        @else
                            <div class="border-2 border-dashed rounded-lg bg-gray-100 w-full h-48 flex items-center justify-center text-gray-500">
                                No image available
                            </div>
                        @endif
                    </div>

                    <div class="mb-4 flex flex-col w-full">
                        <label class="font-medium text-gray-800 w-full">Judul kegiatan</label>
                        <input type="text" name="event_name" value="{{ old('event_name', $event->event_title) }}" class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full bg-gray-50" />
                    </div>

                    <div class="mb-4 flex flex-col w-full">
                        <label class="font-medium text-gray-800 w-full">Deskripsi</label>
                        <textarea name="event_desc" class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full bg-gray-50 min-h-[100px]">{{ old('event_desc', $event->event_description) }}</textarea>
                    </div>

                    <div class="mb-4 flex flex-col w-full">
                        <label for="tags_event" class="font-medium text-gray-800 w-full mb-1">Tags Event</label>
                        @php
                            // Read tags from old input or from $event->tags_event (array or comma-separated string)
                            $tags = old('tags_event', $event->tags_event ?? []);
                            if (is_string($tags)) {
                                $tags = explode(',', $tags);
                            }
                            if (!is_array($tags)) {
                                $tags = [];
                            }
                            $tags = array_filter(array_map('trim', $tags));
                            $categories = [
                                ['id' => 1, 'name' => 'Seminar'],
                                ['id' => 2, 'name' => 'Workshop'],
                                ['id' => 3, 'name' => 'Konferensi'],
                                ['id' => 4, 'name' => 'Pelatihan'],
                                ['id' => 5, 'name' => 'Networking'],
                            ];
                        @endphp
                        <div
                            x-data="{
                                tags: {{ Js::from($tags) }},
                                categories: {{ Js::from($categories) }},
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
                            }"
                            class="relative"
                        >
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
                    <div class="mb-4 flex flex-col w-full">
                        <label class="font-medium text-gray-800 w-full">Jenis kegiatan</label>
                        @php
                            $typeLabels = [
                                'Online_Berbayar' => 'Online Berbayar',
                                'Online_Gratis' => 'Online Gratis',
                                'Offline_Berbayar' => 'Offline Berbayar',
                                'Offline_Gratis' => 'Offline Gratis'
                            ];
                        @endphp
                        <select name="event_type_paid" class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full bg-gray-50">
                            @foreach($typeLabels as $key => $label)
                                <option value="{{ $key }}" @if(old('event_type_paid', $event->event_type_paid) == $key) selected @endif>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4 flex flex-col w-full">
                        <label class="font-medium text-gray-800 w-full">Biaya Kegiatan</label>
                        <input type="number" name="event_price" value="{{ old('event_price', $event->event_price) }}" class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full bg-gray-50" min="0" />
                    </div>
                </div>

                <div class="event-date-details w-full lg:w-[48%]">
                    <h1 class="font-semibold text-xl mb-4">Detail Waktu Kegiatan dan pendaftaran</h1>

                    <div class="mb-4 flex flex-col w-full">
                        <label class="font-medium text-gray-800 w-full">Lokasi Kegiatan</label>
                        <input type="text" name="event_location" value="{{ old('event_location', $event->event_location) }}" class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full bg-gray-50" />
                    </div>

                    <div class="mb-4 flex flex-col w-full">
                        <label class="font-medium text-gray-800 w-full">Tanggal Event</label>
                        <input type="date" name="event_date" value="{{ old('event_date', $event->event_date ? \Carbon\Carbon::parse($event->event_date)->format('Y-m-d') : '') }}" class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full bg-gray-50" />
                    </div>

                    <div class="mb-7 flex items-center w-full gap-2">
                        <div class="flex flex-col gap-2 w-full">
                            <label class="font-medium text-gray-800 w-full">Waktu awal</label>
                            <input type="time" name="event_start_time" value="{{ old('event_start_time', $event->event_start_time ? \Carbon\Carbon::parse($event->event_start_time)->format('H:i') : '') }}" class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full bg-gray-50" />
                        </div>
                        <span class="text-gray-500 self-center translate-y-4">-</span>
                        <div class="flex flex-col gap-2 w-full">
                            <label class="font-medium text-gray-800 w-full">Waktu Akhir</label>
                            <input type="time" name="event_end_time" value="{{ old('event_end_time', $event->event_end_time ? \Carbon\Carbon::parse($event->event_end_time)->format('H:i') : '') }}" class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full bg-gray-50" />
                        </div>
                    </div>

                    <div class="mb-4 flex flex-col w-full">
                        <label class="font-medium text-gray-800 w-full">Batas pendaftaran</label>
                        <input type="datetime-local" name="event_registration_deadline" value="{{ old('event_registration_deadline', $event->event_registration_deadline ? \Carbon\Carbon::parse($event->event_registration_deadline)->format('Y-m-d\TH:i') : '') }}" class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full bg-gray-50" />
                    </div>

                    <div class="mb-4 flex flex-col w-full">
                        <label class="font-medium text-gray-800 w-full">Kuota Peserta</label>
                        <input type="number" name="event_quota" value="{{ old('event_quota', $event->event_quota) }}" class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full bg-gray-50" min="0" />
                    </div>

                    <h1 class="font-semibold text-xl mb-4 pt-4">Informasi Pemateri</h1>
                    <div class="mb-4 flex flex-col w-full">
                        <label class="font-medium text-gray-800 w-full">Nama Pemateri</label>
                        <input type="text" name="event_speaker_name" value="{{ old('event_speaker_name', $event->event_speaker_name) }}" class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full bg-gray-50" />
                    </div>

                    <div class="mb-4 flex flex-col w-full">
                        <label class="font-medium text-gray-800 w-full">Pekerjaan Pemateri</label>
                        <input type="text" name="event_speaker_job" value="{{ old('event_speaker_job', $event->event_speaker_job) }}" class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full bg-gray-50" />
                    </div>

                    <div class="w-full mt-8 flex gap-2">
                        <button type="submit" class="px-4 py-3 font-medium text-white bg-secondaryColors-base rounded-md hover:bg-secondaryColors-80 transition-all">
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.manage.event') }}"
                            class="px-4 py-3 font-medium text-dark-base border border-gray-300 rounded-md hover:bg-gray-50 transition-all">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layouts.admin.admin-layout>
