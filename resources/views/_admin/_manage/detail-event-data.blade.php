<x-layouts.admin.admin-layout>

    <x-slot:title> {{ $title }}</x-slot:title>

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold">Kelas & Event Saya</h1>
            <p class="text-sm text-gray-500">Kelola informasi akun pribadimu di halaman ini.</p>
        </div>
    </div>

    <div class="w-full flex flex-wrap lg:flex-nowrap items-start gap-6">
        <div class="w-full lg:w-[50%] flex flex-col gap-4">
            <div class="flex flex-col">
                <div class="w-full bg-light-base rounded-t-lg border border-gray-200">
                    <div class="m-5">
                        <h1 class="text-lg font-semibold text-dark-base">Nama dan Deskripsi</h1>
                    </div>
                </div>
                <div class="w-full bg-light-base rounded-b-lg border border-gray-200 p-5">
                    <label for="name">
                        <span class="text-sm font-medium text-gray-700"> Nama Event </span>

                        <input type="text" id="name" class="mt-0.5 w-full h-[25pt] rounded" />
                    </label>
                    <label for="description">
                        <span class="text-sm font-medium text-gray-700"> Deskripsi Event </span>

                        <textarea id="description" class="mt-0.5 w-full h-[220pt] rounded"></textarea>
                    </label>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="w-full bg-light-base rounded-t-lg border border-gray-200">
                    <div class="m-5">
                        <h1 class="text-lg font-semibold text-dark-base"> Waktu dan Lokasi</h1>
                    </div>
                </div>
                <div class="w-full bg-light-base rounded-b-lg border border-gray-200 p-5">
                    <label for="date_event">
                        <span class="text-sm font-medium text-gray-700"> Tanggal Event </span>

                        <input type="date" name="date_event" id="date_event" class="mt-0.5 w-full h-[25pt] rounded">
                    </label>
                    <div class="grid grid-cols-2 gap-6">
                        <label for="time_start_event">
                            <span class="text-sm font-medium text-gray-700"> Waktu Mulai Event </span>

                            <input type="time" name="time_start_event" id="time_start_event"
                                class="mt-0.5 w-full h-[25pt] rounded">
                        </label>
                        <label for="time_end_event">
                            <span class="text-sm font-medium text-gray-700"> Waktu Akhir Event </span>

                            <input type="time" name="time_end_event" id="time_end_event"
                                class="mt-0.5 w-full h-[25pt] rounded">
                        </label>
                    </div>
                    <label for="location">
                        <span class="text-sm font-medium text-gray-700"> Lokasi Event </span>

                        <input type="text" id="location" class="mt-0.5 w-full h-[25pt] rounded" />
                    </label>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-[50%] flex flex-col gap-4">
            <div class="flex flex-col">
                <div class="w-full bg-light-base rounded-t-lg border border-gray-200">
                    <div class="m-5">
                        <h1 class="text-lg font-semibold text-dark-base">Detail Event</h1>
                    </div>
                </div>
                <div class="w-full bg-light-base rounded-b-lg border border-gray-200 p-5">
                    <div class="grid grid-cols-2 gap-6">
                        <label for="type_event">
                            <span class="text-sm font-medium text-gray-700"> Tipe Event </span>

                            <select id="type_event" class="mt-0.5 w-full h-[25pt] rounded">
                                <option value="" disabled selected>Select</option>
                                <option value="ini 1">Ini 1</option>
                            </select>
                        </label>
                        <label for="status_event">
                            <span class="text-sm font-medium text-gray-700"> Status Event </span>

                            <select id="status_event" class="mt-0.5 w-full h-[25pt] rounded">
                                <option value="" disabled selected>Select</option>
                                <option value="ini 1">Ini 1</option>
                            </select>
                        </label>
                    </div>
                    <label for="tags_event">
                        <span class="text-sm font-medium text-gray-700"> Tags Event </span>

                        <select id="tags_event" class="mt-0.5 w-full h-[25pt] rounded">
                            <option value="" disabled selected>Select</option>
                            <option value="ini 1">Ini 1</option>
                        </select>
                    </label>

                </div>
            </div>

            <div class="flex flex-col">
                <div class="w-full bg-light-base rounded-t-lg border border-gray-200">
                    <div class="m-5">
                        <h1 class="text-lg font-semibold text-dark-base"> Harga dan Kuota </h1>
                    </div>
                </div>
                <div class="w-full bg-light-base rounded-b-lg border border-gray-200 p-5">
                    <label for="is_paid_event">
                        <span class="text-sm font-medium text-gray-700"> ... Event </span>

                        <select id="is_paid_event" class="mt-0.5 w-full h-[25pt] rounded">
                            <option value="" disabled selected>Select</option>
                            <option value="ini 1">Ini 1</option>
                        </select>
                    </label>
                    <div class="grid grid-cols-2 gap-6">
                        <label for="price_event">
                            <span class="text-sm font-medium text-gray-700"> Harga Event </span>

                            <input type="number" name="price_event" id="price_event"
                                class="mt-0.5 w-full h-[25pt] rounded">
                        </label>
                        <label for="quota_event">
                            <span class="text-sm font-medium text-gray-700"> Kuota Event </span>

                            <input type="number" name="quota_event" id="quota_event"
                                class="mt-0.5 w-full h-[25pt] rounded">
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="w-full bg-light-base rounded-t-lg border border-gray-200">
                    <div class="m-5">
                        <h1 class="text-lg font-semibold text-dark-base"> Gambar </h1>
                    </div>
                </div>
                <div class="w-full bg-light-base rounded-b-lg border border-gray-200 p-5">
                    <div class="col-span-full">
                        <div
                            class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm/6 text-gray-600">
                                    <label for="file-upload"
                                        class="relative cursor-pointer rounded-md bg-white font-semibold text-secondaryColors-base focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 focus-within:outline-hidden hover:text-secondaryColors-60">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 flex flex-row justify-between w-full">
        <button type="button"
            class="rounded border border-red-500 bg-gray-100 px-10 py-2 text-sm font-medium text-red-500 transition-colors hover:bg-red-500 hover:text-light-base">
            Delete
        </button>
        <div>
            <button type="button"
                class="rounded border border-gray-300 bg-gray-100 px-10 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                Cancel
            </button>

            <button type="button"
                class="rounded bg-secondaryColors-base px-10 py-2 text-sm font-medium text-white transition-colors hover:bg-primaryColors-base">
                Save
            </button>
        </div>
    </div>
</x-layouts.admin.admin-layout>
