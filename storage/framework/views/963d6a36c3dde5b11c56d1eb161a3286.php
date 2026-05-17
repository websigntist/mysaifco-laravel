<header class="sticky top-0 z-50 w-full border-b border-gray-100 bg-white py-2">
    <div class="container mx-auto">
        <div class="flex min-w-0 items-center justify-between gap-2 sm:gap-3">
            <div class="brand_logo">
                <a href="<?php echo e(url('/')); ?>">
                    <img src="<?php echo e(asset('assets/images/logo.svg')); ?>" class="w-14" alt="brand_logo"
                         title="standard patches">
                </a>
            </div>
            <div class="flex min-w-0 flex-1 items-center justify-end">
                <?php echo $__env->make('frontend.components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
            
        </div>
    </div>
</header>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/layouts/header.blade.php ENDPATH**/ ?>