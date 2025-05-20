<?php if (isset($component)) { $__componentOriginal6107cafe1a6b2bb3ae2fbdc60a313162 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6107cafe1a6b2bb3ae2fbdc60a313162 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.auth','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.auth'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="flex justify-center items-center w-full mb-8">
        <?php if (isset($component)) { $__componentOriginala78585284581daae177d448ae16c046d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala78585284581daae177d448ae16c046d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.logo','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala78585284581daae177d448ae16c046d)): ?>
<?php $attributes = $__attributesOriginala78585284581daae177d448ae16c046d; ?>
<?php unset($__attributesOriginala78585284581daae177d448ae16c046d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala78585284581daae177d448ae16c046d)): ?>
<?php $component = $__componentOriginala78585284581daae177d448ae16c046d; ?>
<?php unset($__componentOriginala78585284581daae177d448ae16c046d); ?>
<?php endif; ?>
    </div>

    <div class="flex flex-col gap-8 w-full">
        <div class="flex flex-col justify-center items-center gap-1">
            <h1 class="jakarta font-extrabold text-[32px] leading-[48px] text-center text-[#072326] w-full">
                Welcome Back!
            </h1>
            <p class="urbanist font-medium text-[18px] leading-[22px] text-center text-[#072326] opacity-60">
                Sign in to continue to your account
            </p>
        </div>

        <form id="loginForm" class="flex flex-col gap-3.5" x-data="formhandler()">
            <?php if (isset($component)) { $__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.input','data' => ['id' => 'email','label' => 'Email','type' => 'email','model' => 'email','error' => 'errors.email']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'email','label' => 'Email','type' => 'email','model' => 'email','error' => 'errors.email']); ?>
                <div class="absolute right-[14px] top-1/2 transform -translate-y-1/2">
                    <!-- Email Icon SVG -->
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb)): ?>
<?php $attributes = $__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb; ?>
<?php unset($__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb)): ?>
<?php $component = $__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb; ?>
<?php unset($__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth.input','data' => ['id' => 'password','label' => 'Password','type' => 'password','model' => 'password','error' => 'errors.password']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'password','label' => 'Password','type' => 'password','model' => 'password','error' => 'errors.password']); ?>
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
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb)): ?>
<?php $attributes = $__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb; ?>
<?php unset($__attributesOriginal4fe80e9d239d0b60843c2b8ddd36eccb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb)): ?>
<?php $component = $__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb; ?>
<?php unset($__componentOriginal4fe80e9d239d0b60843c2b8ddd36eccb); ?>
<?php endif; ?>

            <div class="flex justify-between items-center py-[10px] mt-1">
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="remember" name="remember" x-model="rememberMe" class="w-5 h-5 border border-[#072326] rounded-md focus:ring-[#003C43]">
                    <label for="remember" class="urbanist font-medium text-[18px] leading-[22px] text-[#072326] opacity-60">
                        Remember me
                    </label>
                </div>
                <a href="<?php echo e(route('forgot.password')); ?>" class="urbanist font-medium text-[18px] leading-[22px] text-[#072326] underline">
                    Forgot password?
                </a>
            </div>

            <div class="flex flex-col gap-4 mt-4">
                <button type="button" @click.prevent="submitForm()" class="jakarta flex justify-center items-center py-[14px] px-[24px] bg-[#003C43] text-white rounded-[8px] font-semibold text-[16px] leading-[20px] w-full">
                    Sign In
                </button>
                <button class="flex items-center justify-center gap-2 w-full border border-[#072326] rounded-[8px] py-3 hover:bg-teal-primary transition-all duration-300">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
                    <span class="text-gray-700 font-medium text-sm">Masuk dengan Google</span>
                </button>
                <div class="flex justify-center items-center gap-2">
                    <p class="urbanist font-medium text-[18px] leading-[22px] text-[#072326] opacity-60">
                        Don't have an account?
                    </p>
                    <a href="<?php echo e(route('register')); ?>" class="urbanist font-medium text-[18px] leading-[22px] text-[#072326] font-semibold underline">
                        Sign Up
                    </a>
                </div>
                <p class="urbanist font-medium text-sm text-center text-[#777777] mt-4">
                    This site is protected by reCAPTCHA and the Google
                    <a href="https://policies.google.com/privacy" target="_blank" class="text-[#072326] font-semibold underline">Privacy Policy</a> and
                    <a href="https://policies.google.com/terms" target="_blank" class="text-[#072326] font-semibold underline">Terms of Service</a> apply.
                </p>
            </div>
        </form>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6107cafe1a6b2bb3ae2fbdc60a313162)): ?>
<?php $attributes = $__attributesOriginal6107cafe1a6b2bb3ae2fbdc60a313162; ?>
<?php unset($__attributesOriginal6107cafe1a6b2bb3ae2fbdc60a313162); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6107cafe1a6b2bb3ae2fbdc60a313162)): ?>
<?php $component = $__componentOriginal6107cafe1a6b2bb3ae2fbdc60a313162; ?>
<?php unset($__componentOriginal6107cafe1a6b2bb3ae2fbdc60a313162); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\growkm-app\resources\views/_auth/sign-in.blade.php ENDPATH**/ ?>