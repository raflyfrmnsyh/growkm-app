@props(['id', 'label', 'type' => 'text', 'model', 'error'])

<div class="flex flex-col gap-3.5">
    <label for="{{ $id }}" class="jakarta font-medium text-base text-[#072326]">{{ $label }}</label>
    <div class="relative">
        <input type="{{ $type }}"
               id="{{ $id }}"
               x-model="{{ $model }}"
               {{ $attributes->merge(['class' => 'w-full h-[54px] px-[14px] py-[10px] border rounded-[8px] focus:outline-none focus:ring-2']) }}
               :class="{{ $error }} ? 'border-red-500 ring-red-500' : 'border-teal-primary ring-teal-primary'">

        {{ $slot }}
    </div>
    <p x-show="{{ $error }}" x-text="{{ $error }}" class="text-sm text-red-600 mt-1"></p>
</div>