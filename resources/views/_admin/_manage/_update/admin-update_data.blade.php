<x-layouts.admin.admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div
        class="p-6 bg-white w-full gap-8 rounded-t-md flex lg:flex-row flex-col items-end justify-between border-b border-gray-200">
        <h1 class="font-semibold text-lg">Edit Data Admin</h1>

        <div class="flex flex-col md:flex-row items-center gap-2 w-full lg:w-auto justify-between lg:justify-end">
            <a href="{{ route('admin.manage.admin') }}" class="opacity-50 hover:opacity-100 transition-all">Kelola
                Admin</a>
            <span>/</span>
            <span class="font-medium text-secondaryColors-base">Edit data</span>
        </div>
    </div>

    <div class="p-6 bg-white w-full">
        <form action="{{ route('admin.manage.update-admin', $admin->id) }}" method="POST"
            class="flex gap-2 flex-wrap justify-between items-start">
            @csrf
            @method('PUT')

            {{-- Username --}}
            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="username" class="font-medium text-gray-800 w-full">Nama Admin</label>
                <input type="text" name="username" id="username" value="{{ old('username', $admin->username) }}"
                    class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2"
                    required>
                @error('username')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="user_email" class="font-medium text-gray-800 w-full">Email</label>
                <input type="email" name="user_email" id="user_email"
                    value="{{ old('user_email', $admin->user_email) }}"
                    class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2"
                    required>
                @error('user_email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- No HP --}}
            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="user_phone" class="font-medium text-gray-800 w-full">No. HP</label>
                <input type="text" name="user_phone" id="user_phone"
                    value="{{ old('user_phone', $admin->user_phone) }}"
                    class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2"
                    required>
                @error('user_phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Role --}}
            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="user_role" class="font-medium text-gray-800 w-full">Role</label>
                <select name="user_role" id="user_role"
                    class="block appearance-none my-2 w-full bg-white border border-gray-200 px-4 py-3 pr-8 rounded-md leading-tight focus:outline-none transition focus:border-2 focus:border-secondaryColors-40">
                    <option value="">Pilih Role</option>
                    <option value="M" {{ $admin->user_role === 'M' ? 'selected' : '' }}>Event Admin</option>
                    <option value="P" {{ $admin->user_role === 'P' ? 'selected' : '' }}>Product Admin</option>
                </select>
                @error('user_role')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Gender --}}
            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="user_gender" class="font-medium text-gray-800 w-full">Gender</label>
                <select name="user_gender" id="user_gender"
                    class="block appearance-none my-2 w-full bg-white border border-gray-200 px-4 py-3 pr-8 rounded-md leading-tight focus:outline-none transition focus:border-2 focus:border-secondaryColors-40">
                    <option value="">Pilih Gender</option>
                    <option value="M" {{ $admin->user_gender === 'M' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="F" {{ $admin->user_gender === 'F' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('user_gender')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Alamat --}}
            <div class="mb-4 flex flex-col w-full">
                <label for="user_address" class="font-medium text-gray-800 w-full">Alamat</label>
                <textarea name="user_address" id="user_address" rows="3"
                    class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2 resize-none"
                    placeholder="Alamat lengkap">{{ old('user_address', $admin->user_address) }}</textarea>
                @error('user_address')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Tombol Aksi --}}
            <div class="w-full flex items-center gap-4">
                <button type="submit"
                    class="bg-secondaryColors-base text-white font-semibold px-6 py-3 rounded-md hover:bg-secondaryColors-60 transition-all">
                    Update Data
                </button>
                <a href="{{ route('admin.manage.admin') }}"
                    class="px-6 py-3 font-medium text-dark-base border border-gray-300 rounded-md">Kembali</a>
            </div>
        </form>
    </div>
</x-layouts.admin.admin-layout>
