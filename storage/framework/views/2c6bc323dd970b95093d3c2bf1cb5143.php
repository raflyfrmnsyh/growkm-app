<?php if (isset($component)) { $__componentOriginalb60e00b6cb6ab2f3b65c74e5fc79d2b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb60e00b6cb6ab2f3b65c74e5fc79d2b9 = $attributes; } ?>
<?php $component = App\View\Components\ClientSideLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('client-side-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ClientSideLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    
     <?php $__env->slot('title', null, []); ?> <?php echo e($title); ?> <?php $__env->endSlot(); ?>
    <?php if (isset($component)) { $__componentOriginal2a2e454b2e62574a80c8110e5f128b60 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2a2e454b2e62574a80c8110e5f128b60 = $attributes; } ?>
<?php $component = App\View\Components\Header::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Header::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2a2e454b2e62574a80c8110e5f128b60)): ?>
<?php $attributes = $__attributesOriginal2a2e454b2e62574a80c8110e5f128b60; ?>
<?php unset($__attributesOriginal2a2e454b2e62574a80c8110e5f128b60); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2a2e454b2e62574a80c8110e5f128b60)): ?>
<?php $component = $__componentOriginal2a2e454b2e62574a80c8110e5f128b60; ?>
<?php unset($__componentOriginal2a2e454b2e62574a80c8110e5f128b60); ?>
<?php endif; ?>

    
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb60e00b6cb6ab2f3b65c74e5fc79d2b9)): ?>
<?php $attributes = $__attributesOriginalb60e00b6cb6ab2f3b65c74e5fc79d2b9; ?>
<?php unset($__attributesOriginalb60e00b6cb6ab2f3b65c74e5fc79d2b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb60e00b6cb6ab2f3b65c74e5fc79d2b9)): ?>
<?php $component = $__componentOriginalb60e00b6cb6ab2f3b65c74e5fc79d2b9; ?>
<?php unset($__componentOriginalb60e00b6cb6ab2f3b65c74e5fc79d2b9); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\growkm-app\resources\views/landing-page.blade.php ENDPATH**/ ?>