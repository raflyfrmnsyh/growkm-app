<x-layouts.client-side-layout>
    {{-- <x-slot name="title">{{ @dd($title) }}</x-slot> --}}
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-partials.header></x-partials.header>

    {{-- Make content bellow! --}}
    <x-icons.arrow-down></x-icons.arrow-down>
</x-layouts.client-side-layout>
