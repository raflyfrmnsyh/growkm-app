<x-layouts.auth>

    <x-slot:title> {{ $title ? $title : 'Sign In' }}</x-slot:title>

    <div class="flex flex-col gap-8 w-full">
        <div class="flex flex-col justify-center items-center gap-1">
            <h1 class="jakarta font-extrabold text-[32px] leading-[48px] text-center text-[#072326] w-full">
                Welcome Back!
            </h1>
            <p class="urbanist font-medium text-[18px] leading-[22px] text-center text-[#072326] opacity-60">
                Sign in to continue to your account
            </p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 p-3 text-red-500 border border-red-500">
                <h6 class="font-bold">Error!!</h6>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('auth.login.process') }}" method="POST" id="loginForm" class="flex flex-col gap-3.5"
            x-data="{ email: '', password: '', showPassword: false }">
            @csrf
            <!-- Email Input -->
            <div class="flex flex-col gap-3.5">
                <label for="user_email" class="jakarta font-medium text-base text-[#072326]">Email</label>
                <div class="relative">
                    <input type="email" id="user_email" name="user_email" value="{{ old('email') }}" x-model="email"
                        class="w-full h-[54px] px-[14px] py-[10px] border rounded-[8px] focus:outline-none {{ $errors->has('email') ? 'border-red-500 ring-red-500' : 'border-[#072326] focus:ring-2 focus:ring-[#003C43]' }}"
                        required>
                </div>
                @if ($errors->has('email'))
                    <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 5.33334V8M8 10.6667H8.00667M14.6667 8C14.6667 11.6819 11.6819 14.6667 8 14.6667C4.3181 14.6667 1.33334 11.6819 1.33334 8C1.33334 4.3181 4.3181 1.33334 8 1.33334C11.6819 1.33334 14.6667 4.3181 14.6667 8Z"
                                stroke="#EF4444" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>

            <!-- Password Input -->
            <div class="flex flex-col gap-3.5">
                <label for="user_password" class="jakarta font-medium text-base text-[#072326]">Password</label>
                <div class="relative">
                    <input :type="showPassword ? 'text' : 'password'" id="user_password" name="user_password"
                        x-model="password"
                        class="w-full h-[54px] px-[14px] py-[10px] border rounded-[8px] focus:outline-none {{ $errors->has('password') ? 'border-red-500 ring-red-500' : 'border-[#072326] focus:ring-2 focus:ring-[#003C43]' }}"
                        required>
                    <!-- Eye Button -->
                    <button type="button" @click="showPassword = !showPassword"
                        class="absolute right-[14px] top-1/2 transform -translate-y-1/2 focus:outline-none">
                        <!-- Show Password Icon -->
                        <svg x-show="!showPassword" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 12C2 12 5 5 12 5C19 5 22 12 22 12C22 12 19 19 12 19C5 19 2 12 2 12Z"
                                stroke="#777777" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
                                stroke="#777777" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <!-- Hide Password Icon -->
                        <svg x-show="showPassword" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 12C2 12 5 5 12 5C19 5 22 12 22 12" stroke="#777777" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M22 12C22 12 19 19 12 19C5 19 2 12 2 12" stroke="#777777" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                stroke="#777777" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M4 4L20 20" stroke="#777777" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                @if ($errors->has('password'))
                    <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 5.33334V8M8 10.6667H8.00667M14.6667 8C14.6667 11.6819 11.6819 14.6667 8 14.6667C4.3181 14.6667 1.33334 11.6819 1.33334 8C1.33334 4.3181 4.3181 1.33334 8 1.33334C11.6819 1.33334 14.6667 4.3181 14.6667 8Z"
                                stroke="#EF4444" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        {{ $errors->first('password') }}
                    </p>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="flex flex-col gap-4 mt-4">
                <button type="submit"
                    class="jakarta flex justify-center items-center py-[14px] px-[24px] bg-[#003C43] text-white rounded-[8px] font-semibold text-[16px] leading-[20px] w-full">
                    Sign In
                </button>
                <div class="flex justify-center items-center gap-2">
                    <p class="urbanist font-medium text-[18px] leading-[22px] text-[#072326] opacity-60">
                        Don't have an account?
                    </p>
                    <a href="{{ route('auth.register') }}"
                        class="urbanist text-[18px] leading-[22px] text-[#072326] font-semibold underline">
                        Sign Up
                    </a>
                </div>
                <p class="urbanist font-medium text-sm text-center text-[#777777] mt-4">
                    This site is protected by reCAPTCHA and the Google
                    <a href="https://policies.google.com/privacy" target="_blank"
                        class="text-[#072326] font-semibold underline">Privacy Policy</a> and
                    <a href="https://policies.google.com/terms" target="_blank"
                        class="text-[#072326] font-semibold underline">Terms of Service</a> apply.
                </p>
            </div>
        </form>
    </div>

    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
            class="fixed top-6 right-6 z-50 bg-green-100 text-green-800 px-4 py-2 rounded shadow-lg mb-4"
            style="min-width: 220px;">
            {{ session('success') }}
        </div>
    @endif

</x-layouts.auth>
