<!DOCTYPE html>
<html lang="en">
<x-partials.head-info>
    <x-slot name="title">{{ $title }}</x-slot>
</x-partials.head-info>

<body>
    {{ $slot }}
</body>

<x-partials.landingpage.footer></x-partials.landingpage.footer>

</html>
