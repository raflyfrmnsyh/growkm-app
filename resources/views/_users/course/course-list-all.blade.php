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
            <div class="flex flex-col items-center bg-gray-100 min-h-screen py-2 w-full">
                <div class="w-full max-w-6xl bg-white rounded-lg shadow p-8">
                    {{-- Header --}}
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-2xl font-semibold">Kelas & Event Saya</h1>
                            <p class="text-sm text-gray-500">Kelola informasi akun pribadimu di halaman ini.</p>
                        </div>
                        <div class="text-xs text-gray-400">
                            Dashboard / <span class="text-secondaryColors-base font-semibold">Kelas & event</span>
                        </div>
                    </div>

                    {{-- Tabs --}}
                    <div class="flex border-b mb-8">
                        <a href="{{ url('#') }}"
                            class="px-4 py-2 border-b-2 border-secondaryColors-base text-secondaryColors-base font-semibold">Semua
                            Kelas & Event</a>
                        <a href="{{ url('#') }}" class="px-4 py-2 text-gray-600">Kelas sedang
                            diikuti</a>
                        <a href="{{ url('#') }}" class="px-4 py-2 text-gray-600">Event sedang
                            diikuti</a>
                        <a href="{{ url('#') }}" class="px-4 py-2 text-gray-600">Sudah selesai</a>
                    </div>

                    {{-- Course list --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-6">
                        <a href="#" class="rounded border">
                            <div class="m-5">
                                <div class="flex items-start gap-4">
                                    <div class="w-20 h-20 bg-gray-400 rounded"></div>
                                    <div class="w-full">
                                        <div class="flex justify-between">
                                            <h1 class="text-2xl font-semibold">Growth Tactics</h1>
                                            <div>
                                                <span
                                                    class="inline-flex items-center justify-center rounded bg-secondaryColors-10 px-2.5 py-0.5 text-secondaryColors-base my-1.5">
                                                    <p class="text-sm whitespace-nowrap">Materi</p>
                                                </span>
                                                <span
                                                    class="inline-flex items-center justify-center rounded bg-secondaryColors-10 px-2.5 py-0.5 text-secondaryColors-base my-1.5">
                                                    <p class="text-sm whitespace-nowrap">Grow Point</p>
                                                </span>
                                            </div>
                                        </div>
                                        <p class="text-xs text-dark">Course by <span
                                                class="font-bold text-secondaryColors-base">EduGrow</span></p>
                                        <div class="flex items-center gap-2">
                                            <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                                                <div class="h-2 bg-secondaryColors-base rounded-full"
                                                    style="width: 60%;"></div>
                                            </div>
                                            <span class="text-xs text-gray-600">60%</span>
                                        </div>
                                        <p class="text-xs text-dark"><span class="font-bold">5</span> / 38 Submateri</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="rounded border">
                            <div class="m-5">
                                <div class="flex items-start gap-4">
                                    <div class="w-20 h-20 bg-gray-400 rounded"></div>
                                    <div class="w-full">
                                        <div class="flex justify-between">
                                            <h1 class="text-2xl font-semibold">Growth Tactics</h1>
                                            <div>
                                                <span
                                                    class="inline-flex items-center justify-center rounded bg-secondaryColors-10 px-2.5 py-0.5 text-secondaryColors-base my-1.5">
                                                    <p class="text-sm whitespace-nowrap">Materi</p>
                                                </span>
                                                <span
                                                    class="inline-flex items-center justify-center rounded bg-secondaryColors-10 px-2.5 py-0.5 text-secondaryColors-base my-1.5">
                                                    <p class="text-sm whitespace-nowrap">Grow Point</p>
                                                </span>
                                            </div>
                                        </div>
                                        <p class="text-xs text-dark">Course by <span
                                                class="font-bold text-secondaryColors-base">EduGrow</span></p>
                                        <div class="flex items-center gap-2">
                                            <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                                                <div class="h-2 bg-secondaryColors-base rounded-full"
                                                    style="width: 60%;"></div>
                                            </div>
                                            <span class="text-xs text-gray-600">60%</span>
                                        </div>
                                        <p class="text-xs text-dark"><span class="font-bold">5</span> / 38 Submateri</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="rounded border">
                            <div class="m-5">
                                <div class="flex items-start gap-4">
                                    <div class="w-20 h-20 bg-gray-400 rounded"></div>
                                    <div class="w-full">
                                        <div class="flex justify-between">
                                            <h1 class="text-2xl font-semibold">Growth Tactics</h1>
                                            <div>
                                                <span
                                                    class="inline-flex items-center justify-center rounded bg-secondaryColors-10 px-2.5 py-0.5 text-secondaryColors-base my-1.5">
                                                    <p class="text-sm whitespace-nowrap">Materi</p>
                                                </span>
                                                <span
                                                    class="inline-flex items-center justify-center rounded bg-secondaryColors-10 px-2.5 py-0.5 text-secondaryColors-base my-1.5">
                                                    <p class="text-sm whitespace-nowrap">Grow Point</p>
                                                </span>
                                            </div>
                                        </div>
                                        <p class="text-xs text-dark">Course by <span
                                                class="font-bold text-secondaryColors-base">EduGrow</span></p>
                                        <div class="flex items-center gap-2">
                                            <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                                                <div class="h-2 bg-secondaryColors-base rounded-full"
                                                    style="width: 60%;"></div>
                                            </div>
                                            <span class="text-xs text-gray-600">60%</span>
                                        </div>
                                        <p class="text-xs text-dark"><span class="font-bold">5</span> / 38 Submateri</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="rounded border">
                            <div class="m-5">
                                <div class="flex items-start gap-4">
                                    <div class="w-20 h-20 bg-gray-400 rounded"></div>
                                    <div class="w-full">
                                        <div class="flex justify-between">
                                            <h1 class="text-2xl font-semibold">Growth Tactics</h1>
                                            <div>
                                                <span
                                                    class="inline-flex items-center justify-center rounded bg-secondaryColors-10 px-2.5 py-0.5 text-secondaryColors-base my-1.5">
                                                    <p class="text-sm whitespace-nowrap">Materi</p>
                                                </span>
                                                <span
                                                    class="inline-flex items-center justify-center rounded bg-secondaryColors-10 px-2.5 py-0.5 text-secondaryColors-base my-1.5">
                                                    <p class="text-sm whitespace-nowrap">Grow Point</p>
                                                </span>
                                            </div>
                                        </div>
                                        <p class="text-xs text-dark">Course by <span
                                                class="font-bold text-secondaryColors-base">EduGrow</span></p>
                                        <div class="flex items-center gap-2">
                                            <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden">
                                                <div class="h-2 bg-secondaryColors-base rounded-full"
                                                    style="width: 60%;"></div>
                                            </div>
                                            <span class="text-xs text-gray-600">60%</span>
                                        </div>
                                        <p class="text-xs text-dark"><span class="font-bold">5</span> / 38 Submateri
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-8">
                        <ul class="flex justify-center gap-1 text-gray-900">
                            <li>
                                <a href="#"
                                    class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50 rtl:rotate-180"
                                    aria-label="Previous page">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                            <li
                                class="block size-8 rounded border border-secondaryColors-base bg-secondaryColors-base text-center text-sm/8 font-medium text-white">
                                1
                            </li>
                            <li>
                                <a href="#"
                                    class="block size-8 rounded border border-gray-200 text-center text-sm/8 font-medium transition-colors hover:bg-gray-50">
                                    2
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50 rtl:rotate-180"
                                    aria-label="Next page">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>

</body>

</html>
