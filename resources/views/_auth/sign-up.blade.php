<x-layouts.client-side-layout>
    <x-slot:title>Register - GrowKM</x-slot:title>
    
<div class="pb-8 md:pb-12 lg:pb-16" > 

    <x-layouts.register-layout>


        <form method="POST" action="{{ route('register.store') }}" class="flex gap-2 flex-wrap justify-between items-start">
            @csrf

            <!-- Name -->
            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="user_name" class="font-medium text-gray-800 w-full">Full Name</label>
                <input type="text" id="user_name" name="user_name" value="{{ old('user_name') }}" placeholder="John Doe" required
                    class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2
                    @error('user_name') input-error @enderror">
                @error('user_name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="email" class="font-medium text-gray-800 w-full">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="example@email.com" required
                    class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2
                    @error('email') input-error @enderror">
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="password" class="font-medium text-gray-800 w-full">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required
                    class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2
                    @error('password') input-error @enderror">
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="password_confirmation" class="font-medium text-gray-800 w-full">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required
                    class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2">
            </div>

            <!-- Gender -->
            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="user_gender" class="font-medium text-gray-800 w-full">Gender</label>
                <div class="relative">
                    <select name="user_gender" id="user_gender" required
                            class="block appearance-none my-2 w-full bg-white border border-gray-200 px-4 py-3 pr-8 rounded-md leading-tight focus:outline-none transition focus:border-2 focus:border-secondaryColors-40
                            @error('user_gender') input-error @enderror">
                        <option value="">Pilih Gender</option>
                        <option value="male" {{ old('user_gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('user_gender') == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                        <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                            <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" />
                        </svg>
                    </div>
                </div>
                @error('user_gender')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="user_phone" class="font-medium text-gray-800 w-full">Phone</label>
                <input type="tel" name="user_phone" id="user_phone" value="{{ old('user_phone') }}"
                    placeholder="081234567890" maxlength="14" required
                    class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2
                    @error('user_phone') input-error @enderror">
                @error('user_phone')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-4 flex flex-col w-full">
                <label for="user_address" class="font-medium text-gray-800 w-full">Address</label>
                <textarea name="user_address" id="user_address" rows="3" placeholder="Alamat lengkap"
                        class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2 resize-none">{{ old('user_address') }}</textarea>
            </div>

            <!-- Profile Picture -->
            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="user_profile" class="font-medium text-gray-800 w-full">Profile Picture (URL)</label>
                <input type="text" name="user_profile" id="user_profile"
                    placeholder="https://example.com/profile.jpg"
                    class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2"
                    value="{{ old('user_profile') }}">
                <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin menambahkan</p>
            </div>

            <!-- Submit Button -->
            <div class="w-full">
                <div class="flex items-center gap-4">
                    <input type="submit" value="Register"
                        class="bg-secondaryColors-base px-4 py-3 font-semibold text-white rounded-md cursor-pointer hover:bg-secondaryColors-60 transition-all">
                    <a href="{{ route('login') }}"
                    class="px-4 py-3 font-medium text-dark-base border border-gray-300 rounded-md">Kembali ke Login</a>
                </div>
            </div>
        </form>
    </x-layouts.register-layout>

</div>

    
</x-layouts.client-side-layout>
