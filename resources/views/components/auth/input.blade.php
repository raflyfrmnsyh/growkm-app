@props([
    'id',
    'label',
    'type' => 'text',
])

<div class="flex flex-col gap-3.5">
    <label for="{{ $id }}" class="jakarta font-medium text-base text-[#072326]">{{ $label }}</label>
    
    <input
        type="{{ $type }}"
        id="{{ $id }}"
        name="{{ $id }}"
        value="{{ old($id) }}"
        {{ $attributes->merge(['class' => 'w-full h-[54px] px-[14px] py-[10px] border rounded-[8px] focus:outline-none']) }}
        class="{{ $errors->has($id) ? 'border-red-500 ring-red-500' : 'border-[#072326] focus:ring-2 focus:ring-[#003C43]' }}"
    >

    <x-icons.error :message="$errors->first($id)" />
</div>
