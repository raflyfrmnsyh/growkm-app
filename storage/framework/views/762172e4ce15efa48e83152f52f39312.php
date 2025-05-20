<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sign Up - GrowKM</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;800&family=Syne:wght@600&family=Urbanist:wght@400;500;700&display=swap" rel="stylesheet">

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
<body class="min-h-screen flex items-center justify-center py-10">
    <div class="w-full max-w-[547px] mx-auto p-10 bg-white auth-card rounded-xl"
    x-data="formhandler()">


        <!-- Logo Container -->
        <div class="flex justify-center mb-8">
            <a href="/" class="block w-[124px] md:w-auto">
                <img src="<?php echo e(@asset('image/logo-growkm.svg')); ?>" alt="logo" class="mx-auto h-[42px]">
            </a>
        </div>

        <!-- Form Container -->
        <div class="flex flex-col gap-8">
            <!-- Header Container -->
            <div class="text-center">
                <h1 class="jakarta font-extrabold text-3xl text-[#072326]">Get Started Now </h1>
                <p class="urbanist text-lg text-[#072326] opacity-60">Discover the power features enchance business efficiency</p>
            </div>

            <!-- Input Fields Container -->
            <div class="flex flex-col gap-3.5">
                <!-- Nama -->
                <div class="flex flex-col gap-3.5">
                    <label for="name" class="jakarta font-medium text-base text-[#072326]">Nama Lengkap</label>
                    <input type="text"
                           id="name"
                           x-model="name"
                           class="w-full h-[54px] px-[14px] py-[10px] border border-[#072326] rounded-[8px] focus:outline-none focus:ring-2 focus:ring-[#003C43]"
                           :class="errors.name ? 'border-red-500 ring-red-500' : 'border-[#072326] focus:ring-[#003C43]'"
                           >
                    <p x-show="errors.name" x-text="errors.name" class="text-sm text-red-600 mt-1"></p>
                </div>

                <!-- Email -->
                <div class="flex flex-col gap-3.5">
                    <label for="email" class="jakarta font-medium text-base text-[#072326]">Email</label>
                    <div class="relative">
                        <input type="email"
                        id="email"
                        x-model="email"
                        class="w-full h-[54px] px-[14px] py-[10px] border border-[#072326] rounded-[8px] focus:outline-none focus:ring-2 focus:ring-[#003C43]"
                        :class="errors.email ? 'border-red-500 ring-red-500' : 'border-teal-primary ring-teal-primary'">

                        <div class="absolute right-[14px] top-1/2 transform -translate-y-1/2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 9L12 12.5L17 9" stroke="#777777" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 17V7C2 6.46957 2.21071 5.96086 2.58579 5.58579C2.96086 5.21071 3.46957 5 4 5H20C20.5304 5 21.0391 5.21071 21.4142 5.58579C21.7893 5.96086 22 6.46957 22 7V17C22 17.5304 21.7893 18.0391 21.4142 18.4142C21.0391 18.7893 20.5304 19 20 19H4C3.46957 19 2.96086 18.7893 2.58579 18.4142C2.21071 18.0391 2 17.5304 2 17Z" stroke="#777777" stroke-width="1.5"/>
                            </svg>
                        </div>
                    </div>
                    <p x-show="errors.email" x-text="errors.email" class="text-sm text-red-600 mt-1"></p>
                </div>

                <!-- Password -->
                <div class="flex flex-col gap-3.5">
                    <label for="password" class="jakarta font-medium text-base text-[#072326]">Password</label>
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

                <!-- Konfirmasi Password -->
                <div class="flex flex-col gap-3.5">
                    <label for="confirmPassword" class="jakarta font-medium text-base text-[#072326]">Konfirmasi Password</label>
                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'"
                                id="confirmPassword"
                                x-model="confirmPassword"
                                class="w-full h-[54px] px-[14px] py-[10px] border border-[#072326] rounded-[8px] focus:outline-none focus:ring-2 focus:ring-[#003C43]"
                                :class="errors.confirmPassword ? 'border-red-500 ring-red-500' : ''"
                                >
                    </div>
                    <p x-show="errors.confirmPassword" x-text="errors.confirmPassword" class="text-sm text-red-600 mt-1"></p>
                </div>
            </div>

            <!-- Terms Container -->
            <div class="flex items-center justify-between py-2.5">
                <div class="flex items-center gap-2">
                    <input type="checkbox"
                            id="terms"
                            x-model="agreeToTerms"
                            class="w-5 h-5 border border-[#7D7D7D] rounded-md focus:ring-[#003C43]">
                    <label for="terms" class="urbanist font-medium text-lg text-[#072326] opacity-60">
                        Saya menyetujui syarat dan ketentuan
                    </label>
                </div>
            </div>
            <p x-show="errors.terms" x-text="errors.terms" class="text-sm text-red-600 mt-1"></p>

            <!-- Button Container -->
            <div class="flex flex-col gap-4">
                <!-- Tombol Submit -->
                <button type="button"
                        @click.prevent="submitForm"
                        class="jakarta bg-teal-primary text-white py-3.5 rounded-md font-semibold w-full flex items-center justify-center"
                        :class="{ 'opacity-75 cursor-not-allowed': loading }"
                        :disabled="loading">
                    <span x-show="!loading">Sign Up</span>
                    <svg x-show="loading" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <span x-show="loading">Memproses...</span>
                </button>

                <button class="flex items-center justify-center gap-2 w-full border border-[#072326] rounded-[8px] py-3 hover:bg-gray-50 transition-all">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
                    <span class="text-gray-700 font-medium text-sm">Masuk dengan Google</span>
                </button>

                <!-- Tombol Masuk -->
                <p class="urbanist font-medium text-lg text-center text-[#777777]">
                    Sudah punya akun? <a href="<?php echo e(route('login')); ?>" class="text-[#072326] font-semibold underline"     >Sign in</a>
                </p>
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
    </div>
</body>

<script>
function formhandler() {
    return {
    name: '',
    email: '', // ditambahkan
    password: '',
    confirmPassword: '',
    agreeToTerms: false,
    rememberMe: false,
    showPassword: false,
    loading: false,
    errors: {
        name: '',
        email: '',
        password: '',
        confirmPassword: '',
        terms: ''
    },
    errorMessage: '',
    showError: false,

    submitForm() {
        this.loading = true;
        this.errors = {
            name: '',
            email: '',
            password: '',
            confirmPassword: '',
            terms: ''
        };
        this.showError = false;
        this.errorMessage = '';

        setTimeout(() => {
            let hasError = false;

            // Validasi Nama
            if (!this.name) {
                this.errors.name = 'Name is required';
                hasError = true;
            }

            // Validasi Email
            if (!this.email) {
                this.errors.email = 'Email must be filled';
                hasError = true;
            } else if (!this.email.includes('@')) {
                this.errors.email = 'Email must use "@"';
                hasError = true;
            } else if (!this.email.includes('.')) {
                this.errors.email = 'Domain email not valid';
                hasError = true;
            }

            // Validasi Password
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
            


            // Validasi Konfirmasi Password
            if (!this.confirmPassword) {
                this.errors.confirmPassword = 'confirm the password';
                hasError = true;
            } else if (this.password !== this.confirmPassword) {
                this.errors.confirmPassword = 'passwords do not match';
                hasError = true;
            }

            // Validasi Terms
            if (!this.agreeToTerms) {
                this.errors.terms = 'you must agree to the terms and conditions';
                hasError = true;
            }

            this.loading = false;

            if (hasError) {
                this.showError = true;
                this.errorMessage = 'Please fix the errors above.';
                return;
            }

        }, 800);
    }
};
}
</script>
</html>
<?php /**PATH C:\laragon\www\growkm-app\resources\views/_auth/sign-up.blade.php ENDPATH**/ ?>