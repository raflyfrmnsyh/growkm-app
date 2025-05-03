<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Reset Password - GrowKM</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            background-color: #FDFDFD;
        }
        .jakarta { font-family: 'Plus Jakarta Sans', sans-serif; }
        .syne { font-family: 'Syne', sans-serif; }
        .urbanist { font-family: 'Urbanist', sans-serif; }
        .auth-card { box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); }
        .teal-primary { color: #003C43; }
        .bg-teal-primary { background-color: #003C43; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-[547px] mx-auto p-10 bg-white auth-card rounded-xl"
        x-data="formhandler()">

        <!-- Logo Container -->
        <div class="flex justify-center items-center w-full mb-8">
            <div class="flex justify-center mb-8">
                <a href="/" class="block w-[124px] md:w-auto">
                    <img src="{{ @asset('image/logo-growkm.svg') }}" alt="logo" class="mx-auto h-[42px]">
                </a>
            </div>
        </div>

        <!-- Form Container -->
        <div class="flex flex-col gap-6 w-full">
            <!-- Header Container -->
            <div class="flex flex-col justify-center items-center gap-1 w-full">
                <h1 class="jakarta font-extrabold text-[32px] leading-[150%] text-center text-[#072326] w-full">Reset Password</h1>
                <p class="urbanist font-medium text-[18px] leading-[22px] text-center text-[#072326] opacity-60 max-w-[389px]">
                    Enter your new password below to reset your password
                </p>
            </div>

            <!-- Error Message -->
            <div x-show="showError" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline" x-text="errorMessage"></span>
            </div>

            <!-- Input Fields Container -->
            <div class="flex flex-col gap-3.5 w-full">
                <!-- Password Input Container -->
                <div class="flex flex-col gap-3.5 w-full">
                    <label for="password" class="jakarta font-medium text-base leading-[150%] text-[#072326]">
                        New Password
                    </label>
                    <div class="relative">
                        <input
                            :type="showPassword ? 'text' : 'password'"
                            id="password"
                            x-model="password"
                            class="w-full h-[54px] px-[14px] py-[10px] border border-[#7D7D7D] rounded-[8px] focus:outline-none focus:ring-2 focus:ring-[#003C43]"
                            placeholder="Enter your new password">
                        <button type="button"
                                @click.privent="showPassword = !showPassword"
                                class="absolute right-[14px] top-1/2 transform -translate-y-1/2">
                            <svg x-show="!showPassword" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 12C2 12 5 5 12 5C19 5 22 12 22 12C22 12 19 19 12 19C5 19 2 12 2 12Z" stroke="#777777" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="#777777" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <svg x-show="showPassword" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 12C2 12 5 5 12 5C19 5 22 12 22 12" stroke="#777777" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22 12C22 12 19 19 12 19C5 19 2 12 2 12" stroke="#777777" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="#777777" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 4L20 20" stroke="#777777" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Confirm Password Input Container -->
                <div class="flex flex-col gap-3.5 w-full">
                    <label for="confirm-password" class="jakarta font-medium text-base leading-[150%] text-[#072326]">
                        Confirm New Password
                    </label>
                    <div class="relative">
                        <input
                            :type="showConfirmPassword ? 'text' : 'password'"
                            id="confirm-password"
                            x-model="confirmPassword"
                            class="w-full h-[54px] px-[14px] py-[10px] border border-[#7D7D7D] rounded-[8px] focus:outline-none focus:ring-2 focus:ring-[#003C43]"
                            placeholder="Confirm your new password">
                        <button type="button"
                                @click.privent="showConfirmPassword = !showConfirmPassword"
                                class="absolute right-[14px] top-1/2 transform -translate-y-1/2">
                            <svg x-show="!showConfirmPassword" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 12C2 12 5 5 12 5C19 5 22 12 22 12C22 12 19 19 12 19C5 19 2 12 2 12Z" stroke="#777777" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="#777777" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <svg x-show="showConfirmPassword" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 12C2 12 5 5 12 5C19 5 22 12 22 12" stroke="#777777" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22 12C22 12 19 19 12 19C5 19 2 12 2 12" stroke="#777777" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="#777777" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4 4L20 20" stroke="#777777" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Button Container -->
            <div class="flex flex-col gap-4 mt-4">
                <button
                    @click.privent="submitForm()"
                    :disabled="loading"
                    class="flex justify-center items-center px-6 py-3.5 bg-[#003C43] border border-[#003C43] rounded-lg text-white jakarta font-semibold text-base">
                    <span x-show="!loading">Reset Password</span>
                    <svg x-show="loading" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span x-show="loading">Processing...</span>
                </button>
            </div>

            <!-- Footer Container -->
            <div class="flex flex-col gap-8 mt-4">
                <p class="urbanist font-medium text-lg text-center text-[#777777]">
                    Remember your password? <a href="{{route('login')}}" class="text-[#003C43] font-semibold">Sign in</a>
                </p>
                <p class="urbanist font-medium text-sm text-center text-[#777777]">
                    This site is protected by reCAPTCHA and the Google
                    <a href="https://policies.google.com/privacy" target="_blank" class=" text-[#072326] font-semibold underline">Privacy Policy</a> and
                            <a href="https://policies.google.com/terms" target="_blank" class=" text-[#072326] font-semibold underline">Terms of Service</a> apply.
                </p>
            </div>
        </div>
    </div>
</body>

<script>
    function formhandler() {
        return {
            password: '',
            confirmPassword: '',
            showPassword: false,
            showConfirmPassword: false,
            loading: false,
            showError: false,
            errorMessage: '',
    
            async submitForm() {
                this.showError = false;
                this.errorMessage = '';
    
                if (!this.password) {
                this.errors.password = 'Please enter your password';
                hasError = true;
            } else if (this.password.length < 8) {
                this.errors.password = 'Password must be at least 8 characters';
                hasError = true;
            } else if (this.password.length > 20) {
                this.errors.password = 'Password must be less than 20 characters';
                hasError = true;
            } else if (!this.password.match(/[A-Z]/)) {
                this.errors.password = 'Must include at least one uppercase letter';
                hasError = true;
            } else if (!this.password.match(/[a-z]/)) {
                this.errors.password = 'Must include at least one lowercase letter';
                hasError = true;
            } else if (!this.password.match(/[0-9]/)) {
                this.errors.password = 'Must include at least one number';
                hasError = true;
            } else if (!this.password.match(/[@$!%*?&]/)) {
                this.errors.password = 'Must include at least one special character (@$!%*?&)';
                hasError = true;
            }
    
                if (this.password !== this.confirmPassword) {
                    this.errorMessage = 'Passwords do not match.';
                    this.showError = true;
                    return;
                }
    
                this.loading = true;
    
                if (hasError) {
                this.showError = true;
                this.errorMessage = 'Silakan periksa kembali inputan kamu';
                } else {
                    alert('Form valid, siap dikirim!');
                }
            }
        }
    }
</script>
</html>
