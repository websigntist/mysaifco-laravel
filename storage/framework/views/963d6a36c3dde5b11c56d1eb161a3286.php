<header class="site-header sticky top-0 z-50 w-full border-b border-gray-100 bg-white">
    <div class="site-header__bar container mx-auto flex min-w-0 items-center justify-between gap-2 px-4 py-2 sm:gap-3 md:px-6">
        <div class="brand_logo shrink-0">
            <a href="<?php echo e(url('/')); ?>">
                <img src="<?php echo e(asset('assets/images/logo.svg')); ?>" class="w-14" alt="brand_logo"
                     title="standard patches">
            </a>
        </div>
        <button
            type="button"
            class="site-navbar__toggle inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-lg p-2 text-mst-gray hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-mst md:hidden"
            data-collapse-toggle="navbar-multi-level-dropdown"
            aria-controls="navbar-multi-level-dropdown"
            aria-expanded="false"
        >
            <span class="sr-only">Open main menu</span>
            <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
            </svg>
        </button>
        <nav class="site-navbar site-navbar--desktop hidden min-w-0 flex-1 items-center justify-end md:flex" aria-label="Main navigation">
            <?php echo $__env->make('frontend.components.navbar-menu', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </nav>
    </div>
    <nav
        class="site-navbar site-navbar--mobile hidden w-full border-t border-gray-100 bg-white md:hidden"
        id="navbar-multi-level-dropdown"
        aria-label="Mobile navigation"
    >
        <div class="site-navbar__panel mx-auto w-full max-w-full px-4 py-2">
            <?php echo $__env->make('frontend.components.navbar-menu', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </nav>
</header>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/layouts/header.blade.php ENDPATH**/ ?>