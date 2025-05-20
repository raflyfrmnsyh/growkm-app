<div x-data="{ childOpen: false }" class="flex flex-col md:flex-row md:item-center md:gap-8 md:text-lg">
    <button @click="childOpen = !childOpen"
        class="flex justify-between md:justify-normal items-center w-full hover:text-primaryColors-500 transition md:leading-none md:whitespace-nowrap md:cursor-pointer md:gap-1">
        <?php if(!empty($beforeIcon)): ?>
            <div class="flex items-center gap-2">
                <?php echo e($beforeIcon); ?>

                <span><?php echo e($dropdownName); ?></span>
            </div>
            <i :class="childOpen ? 'rotate-180' : ''"
                class="transition-transform hgi hgi-stroke hgi-arrow-down-01 text-md"></i>
        <?php else: ?>
            <span><?php echo e($dropdownName); ?></span>
            <i :class="childOpen ? 'rotate-180' : ''"
                class="transition-transform hgi hgi-stroke hgi-arrow-down-01 text-md md:text-[20px] md:flex md:items-center md:mt-1"></i>
        <?php endif; ?>

    </button>
    <div x-show="childOpen" x-transition
        class="pl-4 md:pl-0 mt-6 md:mt-12 flex flex-col gap-6 md:gap-0 text-primaryColors-700 text-md md:absolute md:w-48 md:border md:z-50 md:rounded-[4px] md:bg-white md:border-gray-300">
        <?php echo e($linkName); ?>

    </div>
</div>
<?php /**PATH C:\laragon\www\growkm-app\resources\views/components/dropdown-nav-link.blade.php ENDPATH**/ ?>