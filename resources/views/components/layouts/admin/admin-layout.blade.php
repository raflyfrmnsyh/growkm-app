<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex flex-row justify-center items-start w-full h-full  relative">


    <x-partials.admin.admin-sidebar></x-partials.admin.admin-sidebar>

    <main class="w-full lg:w-[80%] lg:left-[20%] absolute ">
        {{-- Mobile Header --}}
        <x-partials.admin.mobile-header></x-partials.admin.mobile-header>

        {{-- Desktop Header --}}
        <x-partials.admin.desk-header></x-partials.admin.desk-header>


        <section class="section_content flex flex-col items-start mx-8 py-[112px]">

            {{ $slot }}
        </section>
    </main>
</body>


</html>
