<div x-data="{ childOpen: false }"
    class="{{ $class ?? 'hidden lg:flex flex-col md:flex-row md:item-center md:gap-8 md:text-lg' }}">
    <button @click="childOpen = !childOpen"
        class="flex justify-between md:justify-normal items-center w-full hover:text-primaryColors-500 transition md:leading-none md:whitespace-nowrap md:cursor-pointer md:gap-1">
        @if (!empty($beforeIcon))
            <div class="flex items-center gap-2">
                {{ $beforeIcon }}
                <span class="{{ $dropdownClass ?? 'text-lg' }}">{{ $dropdownName }}</span>
            </div>
            <x-icons.arrow-down :class="childOpen ? 'rotate-180' : ''"
                class="stroke-primaryColors-90 transition-transform size-5 mt-1"></x-icons.arrow-down>
        @else
            <span class="{{ $dropdownClass ?? 'text-lg' }}">{{ $dropdownName }}</span>
            <x-icons.arrow-down :class="childOpen ? 'rotate-180' : ''"
                class="stroke-primaryColors-90 transition-transform size-5 mt-1"></x-icons.arrow-down>
        @endif

    </button>
    <div x-show="childOpen" x-transition
        class="pl-4 md:pl-0 mt-6 md:mt-14 flex flex-col gap-6 md:gap-0 text-primaryColors-700 text-md md:absolute md:w-56 md:border md:z-50 md:rounded-[4px] md:bg-white md:border-gray-300">
        {{ $linkName }}
    </div>
</div>
{{--  --}}
