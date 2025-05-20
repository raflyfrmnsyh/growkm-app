<button @click="open = !open" class="text-dark-base">
    <template x-if="!open">
        <x-icons.hamburger-menu class="stroke-dark-base"></x-icons.hamburger-menu>
    </template>
    <template x-if="open">
        <x-icons.cancel class="stroke-dark-base"></x-icons.cancel>
    </template>
</button>
