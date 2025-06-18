<!DOCTYPE html>
<html lang="en">
<x-partials.head-info>
    <x-slot name="title">{{ $title }}</x-slot>
</x-partials.head-info>

<body class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-[547px] mx-auto p-10 bg-white auth-card rounded-xl">
        {{ $slot }}
    </div>
</body>

</html>
