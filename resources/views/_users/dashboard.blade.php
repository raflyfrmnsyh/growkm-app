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
            <div class="main-content w-full lg:w-[70%] mb-6">
                <div class="stat-dash">
                    <div
                        class="stat-dash_header px-4 md:px-6 py-4 rounded-t-lg bg-[linear-gradient(90deg,_#003C43_0%,_#007F73_52.31%,_#E4C46E_100%)] w-full">
                        <h2 class="text-md font-semibold text-light-base">Dashboard</h2>
                    </div>
                    <div class="stat-dash_body bg-light-base p-4 md:p-6 rounded-b-lg">
                        <div class="greating">
                            <h2 class="text-xl font-semibold">Halo, Rafly Firmansyah!</h2>
                            <span class="text-sm my-2">Mulai Belajar dan aktif mengikuti event bisnis di Growkm</span>
                        </div>
                        <div
                            class="stat-dash_main mt-6 flex flex-col sm:flex-row items-center gap-4 sm:gap-2 justify-between">
                            <div
                                class="card-stat flex flex-col items-start xl:flex-row xl:items-center gap-4 w-full sm:w-auto">
                                <div class="icons p-2 rounded-[4px] bg-secondaryColors-10">
                                    <x-icons.computer-user class="stroke-secondaryColors-base"></x-icons.computer->
                                </div>
                                <div class="card-detail">
                                    <h2 class="total text-xl font-bold">24</h2>
                                    <span class="label text-sm"> Total Kelas & Event Diikuti</span>
                                </div>
                            </div>
                            <div
                                class="card-stat flex flex-col items-start xl:flex-row xl:items-center gap-4 w-full sm:w-auto">
                                <div class="icons p-2 rounded-[4px] bg-secondaryColors-10">
                                    <x-icons.certificate class="stroke-secondaryColors-base"></x-icons.certificate>
                                </div>
                                <div class="card-detail">
                                    <h2 class="total text-xl font-bold">24</h2>
                                    <span class="label text-sm"> Total Kelas & Event Diikuti</span>
                                </div>
                            </div>
                            <div
                                class="card-stat flex flex-col items-start xl:flex-row xl:items-center gap-4 w-full sm:w-auto">
                                <div class="icons p-2 rounded-[4px] bg-secondaryColors-10">
                                    <x-icons.package-search
                                        class="stroke-secondaryColors-base"></x-icons.package-search>
                                </div>
                                <div class="card-detail">
                                    <h2 class="total text-xl font-bold">24</h2>
                                    <span class="label text-sm"> Total Kelas & Event Diikuti</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 course-progress">
                    <div
                        class="progress-header flex flex-col md:flex-row items-start md:items-center justify-between px-4 md:px-6 py-4 rounded-t-lg bg-light-base border-b-[1px] border-gray-200 gap-2 md:gap-0">
                        <h2 class="font-semibold text-primaryColors-60 text-lg">Lanjutkan Progress Belajar</h2>

                    </div>
                    <div
                        class="progress-container px-4 md:px-6 py-6 bg-light-base flex flex-col md:flex-row flex-wrap gap-6">
                        <div
                            class="progress-card w-full xl:w-[48%] p-4 border-[1px] border-gray-200 rounded-lg flex flex-col gap-3">
                            <div class="card-progress_head flex justify-between items-center">
                                <h2 class="course-title font-medium text-lg">
                                    Lorem ipsum dolor si..
                                </h2>
                                <span
                                    class="course-status text-[14px] px-2 py-1 bg-secondaryColors-10 text-secondaryColors-base rounded-[4px]">
                                    on-progress
                                </span>
                            </div>
                            <p class="card-course_body text-[14px]">Lorem ipsum dolor sit amet consectetur
                                elit. Omnis ipsam perferendis ali...
                            </p>
                            <div class="course-course-foot py-2 mt-2  ">
                                <a href="{{ url('#') }}"
                                    class="btn text-[14px] py-2 px-3 font-normal rounded-md  text-light-base bg-secondaryColors-base">Lanjutkan
                                    Belajar</a>
                            </div>
                        </div>
                        <div
                            class="progress-card w-full xl:w-[48%] p-4 border-[1px] border-gray-200 rounded-lg flex flex-col gap-3">
                            <div class="card-progress_head flex justify-between items-center">
                                <h2 class="course-title font-medium text-lg">
                                    Lorem ipsum dolor si..
                                </h2>
                                <span
                                    class="course-status text-[14px] px-2 py-1 bg-secondaryColors-10 text-secondaryColors-base rounded-[4px]">
                                    on-progress
                                </span>
                            </div>
                            <p class="card-course_body text-[14px]">Lorem ipsum dolor sit amet consectetur
                                elit. Omnis ipsam perferendis ali...
                            </p>
                            <div class="course-course-foot py-2 mt-2  ">
                                <a href="{{ url('#') }}"
                                    class="btn text-[14px] py-2 px-3 font-normal rounded-md  text-light-base bg-secondaryColors-base">Lanjutkan
                                    Belajar</a>
                            </div>
                        </div>
                        <div
                            class="progress-card w-full xl:w-[48%] p-4 border-[1px] border-gray-200 rounded-lg flex flex-col gap-3">
                            <div class="card-progress_head flex justify-between items-center">
                                <h2 class="course-title font-medium text-lg">
                                    Lorem ipsum dolor si..
                                </h2>
                                <span
                                    class="course-status text-[14px] px-2 py-1 bg-secondaryColors-10 text-secondaryColors-base rounded-[4px]">
                                    on-progress
                                </span>
                            </div>
                            <p class="card-course_body text-[14px]">Lorem ipsum dolor sit amet consectetur
                                elit. Omnis ipsam perferendis ali...
                            </p>
                            <div class="course-course-foot py-2 mt-2  ">
                                <a href="{{ url('#') }}"
                                    class="btn text-[14px] py-2 px-3 font-normal rounded-md  text-light-base bg-secondaryColors-base">Lanjutkan
                                    Belajar</a>
                            </div>
                        </div>
                        <div
                            class="progress-card w-full xl:w-[48%] p-4 border-[1px] border-gray-200 rounded-lg flex flex-col gap-3">
                            <div class="card-progress_head flex justify-between items-center">
                                <h2 class="course-title font-medium text-lg">
                                    Lorem ipsum dolor si..
                                </h2>
                                <span
                                    class="course-status text-[14px] px-2 py-1 bg-secondaryColors-10 text-secondaryColors-base rounded-[4px]">
                                    on-progress
                                </span>
                            </div>
                            <p class="card-course_body text-[14px]">Lorem ipsum dolor sit amet consectetur
                                elit. Omnis ipsam perferendis ali...
                            </p>
                            <div class="course-course-foot py-2 mt-2  ">
                                <a href="{{ url('#') }}"
                                    class="btn text-[14px] py-2 px-3 font-normal rounded-md  text-light-base bg-secondaryColors-base">Lanjutkan
                                    Belajar</a>
                            </div>
                        </div>

                    </div>
                    <div
                        class="progress-header flex items-center justify-center p-3 rounded-b-lg bg-light-base border-t-[1px] border-gray-200 gap-2 cursor-pointer">
                        <a href="{{ url('#') }}" class="font-semibold text-primaryColors-60 text-md">Lihat
                            semua</a>
                        <x-icons.arrow-right class="stroke-primaryColors-base size-6 mt-1"></x-icons.arrow-right>
                    </div>
                </div>
            </div>
            {{-- event --}}
            <div class="my_event w-full lg:w-[40%] bg-light-base rounded-lg">
                <div
                    class="my-event_head px-4 md:px-6 py-4 border-b-[1px] border-gray-200 bg-[linear-gradient(90deg,_#003C43_0%,_#007F73_52.31%,_#E4C46E_100%)] rounded-t-lg">
                    <h2 class="text-white font-medium">Event mendatang</h2>
                </div>
                <div class="my-event_body p-4 md:p-6 flex flex-col gap-6">
                    <div class="event-card flex flex-col gap-2 p-4 rounded-lg border-[1px] border-gray-200">
                        <div class="event-card_head">
                            <h2 class="event_title font-semibold text-lg">Merancang Bisnis Digital</h2>
                            <span class="text-sm">Webinar by growKm</span>
                        </div>
                        <div class="event-card-body">
                            <p class="text-[14px]">Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. Corrupti,
                                repellendus at. Sit
                                velit dolor assumenda?
                            </p>

                            <div
                                class="detail flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4 mt-4">
                                <div class="date flex flex-col items-start gap-2">
                                    <x-icons.calendar class="stroke-primaryColors-base size-5"></x-icons.calendar>
                                    <span class="mx-lg:text-sm text-[14px]">12 Desember 2023</span>
                                </div>
                                <div class="time flex flex-col items-start gap-2">
                                    <x-icons.time class="stroke-primaryColors-base size-5"></x-icons.time>
                                    <span class="mx-lg:text-sm text-[14px]">09:00 s/d selesai</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="my-event-foot flex items-center justify-center p-3 rounded-b-lg bg-light-base border-t-[1px] border-gray-200 gap-2 cursor-pointer">
                    <a href="{{ url('#') }}" class="font-semibold text-primaryColors-60 text-md">Lihat
                        semua</a>
                    <x-icons.arrow-right class="stroke-primaryColors-base size-6 mt-1"></x-icons.arrow-right>
                </div>
            </div>

        </section>
    </main>

</body>

</html>
