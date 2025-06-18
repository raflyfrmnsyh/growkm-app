<x-layouts.auth>
    <x-slot:title>{{ $title ? $title : 'Sign Up' }}</x-slot:title>
    <div class="w-full max-w-md mx-auto mt-6 space-y-5">
        <div class="text-center">
            <h1 class="text-lg font-bold text-primaryColors-base">Create Account</h1>
            <p class="text-sm text-gray-600">Sign up to get started</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 text-red-600 text-sm p-2 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('auth.register.process') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Full Name -->
            <div>
                <label for="user_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="user_name" id="user_name" value="{{ old('user_name') }}"
                    class="w-full mt-1 px-3 py-2 border rounded text-sm focus:ring-1 focus:ring-primaryColors-base {{ $errors->has('user_name') ? 'border-red-500' : 'border-gray-300' }}"
                    required>
            </div>

            <!-- Email -->
            <div>
                <label for="user_email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="user_email" id="user_email" value="{{ old('user_email') }}"
                    class="w-full mt-1 px-3 py-2 border rounded text-sm focus:ring-1 focus:ring-primaryColors-base {{ $errors->has('user_email') ? 'border-red-500' : 'border-gray-300' }}"
                    required>
            </div>

            <!-- Password -->
            <div>
                <label for="user_password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="user_password" id="user_password"
                    class="w-full mt-1 px-3 py-2 border rounded text-sm focus:ring-1 focus:ring-primaryColors-base {{ $errors->has('user_password') ? 'border-red-500' : 'border-gray-300' }}"
                    required>
            </div>

            <!-- Gender -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Gender</label>
                <div class="flex items-center gap-4 mt-1 text-sm">
                    <label class="flex items-center gap-1">
                        <input type="radio" name="user_gender" value="Laki-laki"
                            {{ old('user_gender') == 'Laki-laki' ? 'checked' : '' }} class="text-primaryColors-base">
                        Laki-laki
                    </label>
                    <label class="flex items-center gap-1">
                        <input type="radio" name="user_gender" value="Perempuan"
                            {{ old('user_gender') == 'Perempuan' ? 'checked' : '' }} class="text-primaryColors-base">
                        Perempuan
                    </label>
                </div>
                @error('user_gender')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div>
                <label for="user_phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="user_phone" id="user_phone" value="{{ old('user_phone') }}"
                    class="w-full mt-1 px-3 py-2 border rounded text-sm focus:ring-1 focus:ring-primaryColors-base {{ $errors->has('user_phone') ? 'border-red-500' : 'border-gray-300' }}">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full py-2 text-white bg-primaryColors-base hover:bg-primaryColors-50 rounded text-sm font-medium">
                    Sign Up
                </button>
            </div>

            <div class="text-center text-sm text-gray-600">
                Already have an account?
                <a href="{{ route('auth.login') }}" class="text-primaryColors-base font-medium underline">Sign In</a>
            </div>

            <p class="text-center text-xs text-gray-400 mt-2">
                Protected by reCAPTCHA –
                <a href="https://policies.google.com/privacy" target="_blank" class="underline">Privacy</a> &
                <a href="https://policies.google.com/terms" target="_blank" class="underline">Terms</a>
            </p>
        </form>
    </div>
</x-layouts.auth>
