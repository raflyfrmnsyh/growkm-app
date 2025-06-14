<x-layouts.admin.admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="p-6 bg-white rounded-md shadow-md w-full max-w-3xl mx-auto space-y-6">
        <h2 class="text-xl font-semibold text-gray-700">Edit Data Admin</h2>

        <form action="{{ route('admin.manage.update-admin', $admin->id) }}" method="POST" class="space-y-6">
    @csrf
    @method('PUT')

    <div>
        <label for="username" class="block font-medium">Nama Admin</label>
        <input type="text" name="username" id="username" value="{{ old('username', $admin->username) }}"
            class="w-full px-4 py-2 border rounded-md" required>
        @error('username')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="user_email" class="block font-medium">Email</label>
        <input type="email" name="user_email" id="user_email" value="{{ old('user_email', $admin->user_email) }}"
            class="w-full px-4 py-2 border rounded-md" required>
        @error('user_email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="user_phone" class="block font-medium">No. HP</label>
        <input type="text" name="user_phone" id="user_phone" value="{{ old('user_phone', $admin->user_phone) }}"
            class="w-full px-4 py-2 border rounded-md" required>
        @error('user_phone')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="user_role" class="block font-medium">Role</label>
        <select name="user_role" id="user_role" class="w-full px-4 py-2 border rounded-md" required>
            <option value="M" {{ $admin->user_role === 'M' ? 'selected' : '' }}>Event Admin</option>
            <option value="P" {{ $admin->user_role === 'P' ? 'selected' : '' }}>Product Admin</option>
        </select>
        @error('user_role')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="user_gender" class="block font-medium">Gender</label>
        <select name="user_gender" id="user_gender" class="w-full px-4 py-2 border rounded-md" required>
            <option value="M" {{ $admin->user_gender === 'M' ? 'selected' : '' }}>Laki-laki</option>
            <option value="F" {{ $admin->user_gender === 'F' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('user_gender')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="user_address" class="block font-medium">Alamat</label>
        <textarea name="user_address" id="user_address" rows="3"
            class="w-full px-4 py-2 border rounded-md">{{ old('user_address', $admin->user_address) }}</textarea>
        @error('user_address')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit"
        class="bg-secondaryColors-base text-white font-semibold px-6 py-2 rounded-md hover:bg-secondaryColors-60">
        Update Data
    </button>
</form>

    </div>
</x-layouts.admin.admin-layout>
