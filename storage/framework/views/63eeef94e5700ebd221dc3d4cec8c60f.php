<header class="bg-slate-600 relatiive">
    <?php if (isset($component)) { $__componentOriginal9e3467c0994f225e7c9d13be47c12d80 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e3467c0994f225e7c9d13be47c12d80 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.promo-alert','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('promo-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
         <?php $__env->slot('text', null, []); ?> Dapatkan Kesempatan mengembangkan bisnis dengan mudah dan cepat bersama
            growkm <?php $__env->endSlot(); ?>
         <?php $__env->slot('textAction', null, []); ?> Bergabung Sekarang <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e3467c0994f225e7c9d13be47c12d80)): ?>
<?php $attributes = $__attributesOriginal9e3467c0994f225e7c9d13be47c12d80; ?>
<?php unset($__attributesOriginal9e3467c0994f225e7c9d13be47c12d80); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e3467c0994f225e7c9d13be47c12d80)): ?>
<?php $component = $__componentOriginal9e3467c0994f225e7c9d13be47c12d80; ?>
<?php unset($__componentOriginal9e3467c0994f225e7c9d13be47c12d80); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e = $attributes; } ?>
<?php $component = App\View\Components\Navbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Navbar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $attributes = $__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $component = $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>
</header>
<?php /**PATH C:\laragon\www\growkm-app\resources\views/components/header.blade.php ENDPATH**/ ?>