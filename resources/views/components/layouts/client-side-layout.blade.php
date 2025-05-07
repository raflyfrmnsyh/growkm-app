<!DOCTYPE html>
<html lang="en">
<x-partials.head-info>
    <x-slot name="title">{{ $title }}</x-slot>
</x-partials.head-info>

<body>
    {{ $slot }}
</body>

<x-partials.footer></x-partials.footer>

</html>
