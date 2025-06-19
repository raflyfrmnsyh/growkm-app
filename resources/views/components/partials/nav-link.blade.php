@props(['href'])

<a
    href="{{ $href }}"
    {{ $attributes->merge(['class' => 'hover:text-primaryColors-500 transition md:whitespace-nowrap md:block p-0 md:p-3']) }}
>
    {{ $slot }}
</a>
