<x-layouts.client-side-layout>
    {{-- <x-slot name="title">{{ @dd($title) }}</x-slot> --}}
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-partials.landingpage.header></x-partials.landingpage.header>

    {{-- Make content bellow! --}}
    <x-partials.landingpage.hero-landing></x-partials.landingpage.hero-landing>
    <x-partials.landingpage.stats></x-partials.landingpage.stats>
    <x-partials.landingpage.program></x-partials.landingpage.program>
    <x-partials.landingpage.courses></x-partials.landingpage.courses>
    <x-partials.landingpage.testimonial></x-partials.landingpage.testimonial>
    <x-partials.landingpage.call-to-action></x-partials.landingpage.call-to-action>
    <x-partials.landingpage.faq-contact></x-partials.landingpage.faq-contact>

    <x-icons.arrow-down></x-icons.arrow-down>
</x-layouts.client-side-layout>