<!DOCTYPE html>
<html lang="en">
<x-head-info>
    <x-slot name="title">{{ $title }}</x-slot>
</x-head-info>

<body>
    {{ $slot }}
</body>

<x-footer></x-footer>

</html>
