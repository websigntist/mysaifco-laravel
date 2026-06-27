
<section class="md:hidden block our-popular-section justify-center items-center bg-white py-12 px-4 md:py-14">
    <div class="container mx-auto">
        <div class="our-popular-inner">
            <div class="our-popular-header flex flex-col gap-5 md:flex-row md:items-start md:justify-between md:gap-8">
                <div class="min-w-0 flex-1">
                    <h2 class="font-heading text-3xl md:text-4xl font-semibold italic leading-tight tracking-tight text-mst-gray">
                        <span class="text-mst-gray">Our Popular</span><span class="text-mst"> Tour Categories</span>
                    </h2>
                    <p class="mt-4 font-body text-base leading-7 text-neutral-600 md:text-lg md:leading-8">
                        Explore our travel packages for every traveler. Whether a camel race, safari tour, or city
                        exploration, we have something special!
                    </p>
                </div>
                <div class="our-popular-header__cta flex shrink-0 md:pt-1">
                    <a
                        href="<?php echo e(route('page.default', 'all-tour-categories') ?? '#'); ?>"
                        class="inline-flex w-fit items-center justify-center gap-2 rounded-full bg-gradient-to-r from-mst to-mst-dark px-6 py-3 font-heading text-base italic text-white transition hover:from-mst-dark hover:to-mst md:px-7 md:text-lg"
                    >
                        View all Packages
                        <img
                            src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                            class="ms-1 w-5 md:w-6"
                            width="24"
                            height="24"
                            alt=""
                        />
                    </a>
                </div>
            </div>
            <div class="our-popular-grid mt-8 grid grid-cols-1 gap-4 sm:gap-5 md:mt-10 md:grid-cols-3 md:gap-5">
                <?php $__currentLoopData = $popular_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        if (method_exists($category, 'pageUrl')) {
                            $url = $category->pageUrl();
                        } else {
                            $url = is_callable($category->pageUrl ?? null) ? ($category->pageUrl)() : ($category->pageUrl ?? '#');
                        }
                        $imageSrc = str_contains($category->image ?? '', '/')
                            ? asset('assets/images/' . $category->image)
                            : ($category->image ? asset('assets/images/tour-types/' . $category->image) : asset('assets/images/product-category/01.webp'));
                    ?>
                    <article class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'our-popular-card',
                        'our-popular-card--wide md:col-span-2' => ($index === 1),
                    ]); ?>">
                        <a href="<?php echo e($url); ?>" class="our-popular-card__link">
                            <img
                                src="<?php echo e($imageSrc); ?>"
                                alt="<?php echo e($category->image_alt ?? $category->title); ?>"
                                class="our-popular-card__img"
                                loading="lazy"
                                width="640"
                                height="480"
                            />
                            <div class="our-popular-card__overlay" aria-hidden="true"></div>
                            <div class="our-popular-card__content">
                                <h3 class="our-popular-card__title font-heading">
                                    <?php echo e($category->title); ?>

                                </h3>
                                <p class="our-popular-card__count font-body">
                                    <?php echo e($category->tours_count); ?> <?php echo e(Str::plural('Tour', $category->tours_count)); ?>

                                </p>
                            </div>
                        </a>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>


<section class="hidden md:block justify-center items-center bg-white py-12 px-4 md:py-10">
    <div class="container mx-auto">
        <div class="our-popular-inner">
            <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between md:gap-8">
                <div class="min-w-0 flex-1">
                    <h1>
                        <span>Our Popular</span><span class="text-mst"> Tour Categories</span>
                    </h1>
                    <p class="mt-5 pe-20">
                        Explore our travel packages for every traveler. Whether a camel race, safari tour, or city
                        exploration, we have something special!
                    </p>
                </div>
                <div class="flex shrink-0 md:pt-1">
                    <a
                        href="<?php echo e(route( 'page.default', 'all-tour-categories') ?? '#'); ?>"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-mst to-mst-dark px-7 py-3.5 font-heading text-base italic text-white transition hover:from-mst-dark hover:to-mst md:py-4 md:text-lg"
                    > View all Packages <img
                            src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                            class="ms-1 w-6"
                            width="24"
                            height="24"
                            alt=""
                        > </a>
                </div>
            </div>
            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-5">
                <?php $__currentLoopData = $popular_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        if (method_exists($category, 'pageUrl')) {
                            $url = $category->pageUrl();
                        } else {
                            $url = is_callable($category->pageUrl ?? null) ? ($category->pageUrl)() : ($category->pageUrl ?? '#');
                        }
                        $imageSrc = str_contains($category->image ?? '', '/')
                            ? asset('assets/images/' . $category->image)
                            : ($category->image ? asset('assets/images/tour-types/' . $category->image) : asset('assets/images/product-category/01.webp'));
                    ?>
                    <div class="relative <?php echo e($index === 1 ? 'col-span-2' : ''); ?>">
                        <a href="<?php echo e($url); ?>">
                            <img src="<?php echo e($imageSrc); ?>"
                                 class="rounded-lg w-full h-full object-cover"
                                 alt="<?php echo e($category->image_alt ?? $category->title); ?>">
                            <!-- Overlay -->
                            <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                            hover:bg-black/20 transition duration-300 ease-in-out"></div>
                            <div class="absolute left-5 bottom-8 font-heading text-xl font-medium text-white z-10"><?php echo e($category->title); ?></div>
                            <div class="absolute left-5 bottom-3 font-body text-xs text-white/70 z-10"><?php echo e($category->tours_count); ?> <?php echo e(Str::plural('Tour', $category->tours_count)); ?></div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/components/our_popular.blade.php ENDPATH**/ ?>