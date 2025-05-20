<x-layouts.client-side-layout>
    {{-- <x-slot name="title">{{ @dd($title) }}</x-slot> --}}
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-partials.header></x-partials.header>

    {{-- Make content bellow! --}}
    <x-partials.hero-landing></x-partials.hero-landing>
    <x-partials.stats></x-partials.stats>
    <x-partials.program></x-partials.program>
    <x-partials.courses></x-partials.courses>
    <x-partials.testimonial></x-partials.testimonial>
    <x-partials.call-to-action></x-partials.call-to-action>
    <x-partials.faq-contact></x-partials.faq-contact>

    <x-icons.arrow-down></x-icons.arrow-down>
</x-layouts.client-side-layout>
