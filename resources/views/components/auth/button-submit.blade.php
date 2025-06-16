<button type="button"
        @click.prevent="submitForm"
        class="jakarta bg-teal-primary text-white py-3.5 rounded-md font-semibold w-full flex items-center justify-center"
        :class="{ 'opacity-75 cursor-not-allowed': loading }"
        :disabled="loading">
    <span x-show="!loading">Sign Up</span>
    <svg x-show="loading" class="animate-spin h-5 w-5 text-white" ...></svg>
    <span x-show="loading">Memproses...</span>
</button>
