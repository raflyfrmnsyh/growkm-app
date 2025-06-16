@props(['id', 'label', 'error'])

@php
    $inputType = old('show_password') === 'on' ? 'text' : 'password';
@endphp

<div class="flex flex-col gap-3.5">
    <label for="{{ $id }}" class="jakarta font-medium text-base text-[#072326]">{{ $label }}</label>
    
    <div class="relative">
        <input
            name="{{ $id }}"
            type="{{ $inputType }}"
            id="{{ $id }}"
            value="{{ old($id) }}"
            class="w-full h-[54px] px-[14px] py-[10px] border rounded-[8px] focus:outline-none focus:ring-2
                   @error($id) border-red-500 ring-red-500 @else border-[#072326] focus:ring-[#003C43] @enderror"
        >
        {{-- Tombol Toggle show/hide password --}}
        {{-- Catatan: Ini hanya visual, tidak bekerja tanpa JS --}}
        <span class="absolute right-[14px] top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none">
            👁️
        </span>
    </div>

    <x-icons.error :message="$errors->first($id)" />
</div>
