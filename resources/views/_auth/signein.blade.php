<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In - GrowKM</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;800&family=Syne:wght@600&family=Urbanist:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link
    rel="stylesheet"
    href="https://cdn.hugeicons.com/font/hgi-stroke-rounded.css"
    crossorigin="anonymous"
    />
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css"
    />

    <style>
        body {
            background-color: #FDFDFD;
            font-family: 'Urbanist', sans-serif;
        }
        .jakarta {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .syne {
            font-family: 'Syne', sans-serif;
        }
        .urbanist {
            font-family: 'Urbanist', sans-serif;
        }
        .auth-card {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        .teal-primary {
            color: #003C43;
        }
        .teal-secondary {
            color: #007F73;
        }
        .bg-teal-primary {
            background-color: #003C43;
        }
        .border-teal-primary {
            border-color: #003C43;
        }
        .bg-teal-secondary {
            background-color: #007F73;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-[547px] mx-auto p-10 bg-white auth-card rounded-xl"
    x-data="formhandler()">




            {{-- logo kontainer --}}
        <div class="flex justify-center items-center w-full mb-8">
            <div class="flex justify-center mb-8">
                <a href="/" class="block w-[124px] md:w-auto">
                    <img src="{{ @asset('image/logo-growkm.svg') }}" alt="logo" class="mx-auto h-[42px]">
                </a>
            </div>
        </div>

        <!-- Form Container -->
        <div class="flex flex-col gap-8 w-full">
            <!-- Header Container -->
            <div class="flex flex-col justify-center items-center gap-1">
                <h1 class="jakarta font-extrabold text-[32px] leading-[48px] text-center text-[#072326] w-full">
                    Welcome Back!
                </h1>
                <p class="urbanist font-medium text-[18px] leading-[22px] text-center text-[#072326] opacity-60">
                    Sign in to continue to your account
                </p>
            </div>

            <!-- Input Fields Container -->
            <form id="loginForm" class="flex flex-col gap-3.5">
                <!-- Email Input Container -->
                <div class="flex flex-col gap-3.5">
                    <label for="email" class="jakarta font-medium text-base text-[#072326]">Email</label>
                    <div class="relative">
                        <input type="email"
                        id="email"
                        x-model="email"
                        class="w-full h-[54px] px-[14px] py-[10px] border border-[#072326] rounded-[8px] focus:outline-none focus:ring-2 focus:ring-[#003C43]"
                        :class="errors.email ? 'border-red-500 ring-red-500' : 'border-teal-primary ring-teal-primary'"
                        >

                        <div class="absolute right-[14px] top-1/2 transform -translate-y-1/2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 9L12 12.5L17 9" stroke="#777777" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 17V7C2 6.46957 2.21071 5.96086 2.58579 5.58579C2.96086 5.21071 3.46957 5 4 5H20C20.5304 5 21.0391 5.21071 21.4142 5.58579C21.7893 5.96086 22 6.46957 22 7V17C22 17.5304 21.7893 18.0391 21.4142 18.4142C21.0391 18.7893 20.5304 19 20 19H4C3.46957 19 2.96086 18.7893 2.58579 18.4142C2.21071 18.0391 2 17.5304 2 17Z" stroke="#777777" stroke-width="1.5"/>
                            </svg>
                        </div>
                    </div>
                    <p x-show="errors.email" x-text="errors.email" class="text-sm text-red-600 mt-1"></p>
                </div>

                <!-- Password Input Container -->
                <div class="flex flex-col gap-3.5 mt-1">
                    <label for="password" class="jakarta font-medium text-[16px] leading-[24px] text-[#072326]">
                        Password
                    </label>
                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'"
                                id="password"
                                x-model="password"
                                class="w-full h-[54px] px-[14px] py-[10px] border border-[#072326] rounded-[8px] focus:outline-none focus:ring-2 focus:ring-[#003C43]"
                                :class="errors.password ? 'border-red-500 ring-red-500' : 'border-teal-primary ring-teal-primary'">
                        <button type="button"
                                @click.prevent="showPassword = !showPassword"
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
                    <p x-show="errors.password" x-text="errors.password" class="text-sm text-red-600 mt-1"></p>
                </div>


                <!-- Terms Container -->
                <div class="flex justify-between items-center py-[10px] mt-1">
                    <div class="flex items-center gap-2">
                        <input type="checkbox"
                            id="remember"
                            name="remember"
                            x-model="rememberMe"
                            class="w-5 h-5 border border-[#072326] rounded-md focus:ring-[#003C43]">
                        <label for="remember" class="urbanist font-medium text-[18px] leading-[22px] text-[#072326] opacity-60">
                            Remember me
                        </label>
                    </div>

                    <a href="{{ route('forgot.password') }}" class="urbanist font-medium text-[18px] leading-[22px] text-[#072326] underline">
                        Forgot password?
                    </a>
                </div>

                <!-- Button Container -->
                <div class="flex flex-col gap-4 mt-4">
                    <!-- Sign In Button -->
                    <button type="button"
                            @click.prevent="submitForm( )"
                            class="jakarta flex justify-center items-center py-[14px] px-[24px] bg-[#003C43] border border-[#003C43] rounded-[8px] text-white font-semibold text-[16px] leading-[20px] w-full"
                            :class="{ 'opacity-75 cursor-not-allowed': loading }"
                            :disabled="loading">
                            <span x-show="loading" class="mr-2">
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0="></path>
                                </svg>
                            </span>

                        <span x-show="!loading">Sign In</span>
                    </button>

                    <button class="flex items-center justify-center gap-2 w-full border border-[#072326] rounded-[8px] py-3 hover:bg-teal-primary transition-all duration-300">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
                        <span class="text-gray-700 font-medium text-sm">Masuk dengan Google</span>
                    </button>

                    <!-- Sign Up Link -->
                    <div class="flex justify-center items-center gap-2">
                        <p class="urbanist font-medium text-[18px] leading-[22px] text-[#072326] opacity-60">
                            Don't have an account?
                        </p>        
                        <a href="{{route('register')}}" class="urbanist font-medium text-[18px] leading-[22px] text-[#072326] font-semibold underline">
                            Sign Up
                        </a>
                    </div>
                    <!-- Footer Container -->
                    <div class="flex flex-col gap-4 mt-4">

                        <p class="urbanist font-medium text-sm text-center text-[#777777]">
                            This site is protected by reCAPTCHA and the Google
                            <a href="https://policies.google.com/privacy" target="_blank" class=" text-[#072326] font-semibold underline">Privacy Policy</a> and
                            <a href="https://policies.google.com/terms" target="_blank" class=" text-[#072326] font-semibold underline">Terms of Service</a> apply.
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<script>
    function formhandler()  {
        return {
            email: '',
            password: '',
            rememberMe: false,
            showPassword: false,
            loading: false,
            errors: {
                email: '',
                password: ''
            },
            errorMessage: '',
            showError: false,

            submitForm() {
                this.loading = true;
                this.errors.email = '';
                this.errors.password = '';

                setTimeout(() => {
                    let hasError = false;

                    if (!this.email) {
                        this.errors.email = 'Please enter your email address';
                        hasError = true;
                    } else if (!this.email.includes('@')) {
                        this.errors.email = 'Please include "@" in your email address';
                        hasError = true;
                    } else if (!this.email.includes('.com')) {
                        this.errors.email = 'Email must end with a valid domain like ".com"';
                        hasError = true;
                    }

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

                    this.loading = false;

                    if (!hasError) {
                        alert('Form submitted successfully!');
                    }
                }, 1000);
            }
        };
    }
</script>
</html>

