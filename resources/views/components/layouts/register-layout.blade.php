<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GrowKM')</title>
    @vite('resources/css/app.css')
    <style>
        .error-message {
            color: #e53e3e;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .input-error {
            border-color: #e53e3e !important;
            box-shadow: 0 0 0 2px rgba(229, 62, 62, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="p-6 bg-white w-full gap-4 rounded-t-md flex flex-row items-center justify-between border-b border-gray-200">
        <!-- Logo dan Judul di kiri -->
        <div class="flex items-center gap-4">
            <x-auth.logo class="w-10 h-10" />
            <h1 class="font-main-bold text-2xl text-dark-base">Buat Akun Baru</h1>
        </div>

        <!-- Navigasi di kanan -->
        <div class="flex items-center gap-2">
            <a href="{{ route('login') }}" class="opacity-50 hover:opacity-100 transition-all text-dark-base">Masuk</a>
            <span class="text-dark-base">/</span>
            <span class="font-medium text-secondaryColors-base">Daftar</span>
        </div>
    </div>

    <div class="p-6 bg-white w-full">
        {{ $slot }}
    </div>
</body>
</html>
