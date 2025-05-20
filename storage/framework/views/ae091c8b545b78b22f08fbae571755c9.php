<section x-data="{ show: true }" x-show="show"
    class="promo_alert hidden md:flex justify-center p-2.5
            bg-dark-base text-light-base text-md relative justify-items-center">
    <div class="flex gap-2 font-main">
        <p><?php echo e($text); ?></p>
        <i class="hgi hgi-stroke hgi-arrow-right-02"></i>
        <a href="#"
            class="text-yellowLight-base font-semibold hover:underline hover:underline-offset-1"><?php echo e($textAction); ?></a>
    </div>
    <button x-on:click="show = false"
        class="absolute right-[64px] top-0 text-2xl h-full flex justify-center justify-items-center hover:opacity-90">
        <i class="hgi hgi-stroke hgi-cancel-01 mt-[4px]"></i>
    </button>
</section>
<?php /**PATH C:\laragon\www\growkm-app\resources\views/components/promo-alert.blade.php ENDPATH**/ ?>