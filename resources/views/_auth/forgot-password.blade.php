<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Forgot Password - GrowKM</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Alpine.js -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <style>
    body {
      background-color: #fdfdfd;
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
      color: #003c43;
    }
    .bg-teal-primary {
      background-color: #003c43;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center">
  <div
    class="w-full max-w-[547px] mx-auto p-10 bg-white auth-card rounded-xl"
    x-data="formhandler()"
>
    <!-- Card Transition -->
    <div
    x-show="showForm"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    class="flex flex-col gap-6"
    >
    <!-- Logo -->
    <div class="flex justify-center items-center w-full mb-8">
        <a href="/" class="block w-[124px] md:w-auto">
        <img src="{{ @asset('image/logo-growkm.svg') }}" alt="logo" class="mx-auto h-[42px]" />
        </a>
    </div>

    <!-- Form Header -->
    <div class="flex flex-col justify-center items-center gap-1">
        <h1 class="jakarta font-extrabold text-[32px] text-center text-[#072326]">Forgot Password</h1>
        <p class="urbanist font-medium text-lg text-center text-[#072326] opacity-60 max-w-[389px]">
        Enter your email address and we'll send you a link to reset your password.
        </p>
        </div>

    <!-- Input Field -->
    <div class="flex flex-col gap-3.5">
        <label for="email" class="jakarta font-medium text-base text-[#072326]">Email</label>
        <div class="relative">
            <input type="email"
                id="email"
                x-model="email"
                class="w-full h-[54px] px-[14px] py-[10px] border border-[#072326] rounded-[8px] focus:outline-none focus:ring-2 focus:ring-[#003C43]"
                :class="showError ? 'border-red-500 ring-red-500' : 'border-teal-primary ring-teal-primary'"
                >      
        <div class="absolute right-[14px] top-1/2 transform -translate-y-1/2">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M7 9L12 12.5L17 9" stroke="#777777" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M2 17V7C2 6.46957 2.21071 5.96086 2.58579 5.58579C2.96086 5.21071 3.46957 5 4 5H20C20.5304 5 21.0391 5.21071 21.4142 5.58579C21.7893 5.96086 22 6.46957 22 7V17C22 17.5304 21.7893 18.0391 21.4142 18.4142C21.0391 18.7893 20.5304 19 20 19H4C3.46957 19 2.96086 18.7893 2.58579 18.4142C2.21071 18.0391 2 17.5304 2 17Z"
                stroke="#777777" stroke-width="1.5"/>
            </svg>
        </div>
        </div>

        <!-- Error Message -->
        <div
        x-show="showError"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        class="text-red-500 text-sm mt-1"
        x-text="errorMessage"
        ></div>
    </div>

    <!-- Submit Button -->
    <div class="mt-2">
        <button
        @click.prevent  ="submitForm"
        class="w-full h-[54px] bg-[#003C43] text-white font-semibold rounded-[8px] flex items-center justify-center"
        :disabled="loading"
        >
        <span x-show="!loading" x-transition:enter="transition ease-out duration-300" x-transition:leave="transition ease-in duration-200">
            Send Reset Link
        </span>

        <svg
            x-show="loading"
            x-transition:enter="transition ease-out duration-300"
            x-transition:leave="transition ease-in duration-200"
            class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
        >
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>

        <span x-show="loading" x-transition:enter="transition ease-out duration-300" x-transition:leave="transition ease-in duration-200">
            Processing...
        </span>
        </button>
    </div>

    <!-- Footer -->
    <div class="flex flex-col gap-8 mt-4">
        <p class="urbanist font-medium text-lg text-center text-[#777777]">
        Remember your password? <a href="{{route('login')}}" class="text-[#003C43] font-semibold">Sign in</a>
        </p>

        <p class="urbanist font-medium text-sm text-center text-[#777777]">
        <a href="https://policies.google.com/privacy" target="_blank" class="text-[#072326] font-semibold underline">Privacy Policy</a> and
        <a href="https://policies.google.com/terms" target="_blank" class="text-[#072326] font-semibold underline">Terms of Service</a> apply.
        </p>
    </div>
    </div>
</div>
</body>

<script>
    function formhandler() {
  return {
    email: '',
    showError: false,
    errorMessage: '',
    loading: false,
    showForm: true,
    submitForm() {
      this.showError = false;
      this.errorMessage = '';
      
      let hasError = false;

      // Validasi input email
      if (!this.email) {
        this.errorMessage = 'Email field must not be empty.';
        hasError = true;
      } else if (!this.email.includes('@')) {
        this.errorMessage = 'Email must contain "@".';
        hasError = true;
      } else if (!this.email.includes('.')) {
        this.errorMessage = 'Email domain is not valid.';
        hasError = true;
      }

      if (hasError) {
        this.showError = true;
        return;
      }

      // Simulasi loading dan pengiriman data
      this.loading = true;

      setTimeout(() => {
        this.loading = false;
        this.showForm = false;
        alert('Reset link sent to ' + this.email);
        this.email = '';
      }, 2000);
    }
  };
}

</script>

</html>
