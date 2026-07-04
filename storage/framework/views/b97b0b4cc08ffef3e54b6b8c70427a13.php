<?php
    $tourType = $section['tourType'] ?? null;
    $tours = $section['tours'] ?? collect();
    $titleWords = $tourType ? preg_split('/\s+/', trim($tourType->title)) : [];
    $mainText = count($titleWords) > 1 ? implode(' ', array_slice($titleWords, 0, -1)) : '';
    $accentText = count($titleWords) > 1 ? implode(' ', array_slice($titleWords, -1)) : ($tourType->title ?? '');
    $viewAllTours = Str::slug($tourType->title);
?>
<?php if($tourType && $tours->isNotEmpty()): ?>
    <section class="justify-center items-center py-8">
        <div class="container mx-auto">
            <div class="our-popular-inner">
                <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between md:gap-8">
                    <div class="min-w-0 flex-1">
                        <h1 class="text-left">
                            <?php if($mainText !== ''): ?>
                                <span><?php echo e($mainText); ?> </span><span class="text-mst"><?php echo e($accentText); ?></span>
                            <?php else: ?>
                                <span class="text-mst"><?php echo e($accentText); ?></span>
                            <?php endif; ?>
                        </h1>
                        <?php if(filled($tourType->short_description)): ?>
                            <p class="text-left mt-4 pe-20"><?php echo e($tourType->short_description); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="flex shrink-0 md:pt-1">
                        <a href="<?php echo e($viewAllTours); ?>"
                           class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-mst to-mst-dark px-7 py-3.5 font-heading text-base italic text-white transition hover:from-mst-dark hover:to-mst md:py-4 md:text-lg">
                            View all
                            <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                                 class="ms-1 w-6"
                                 width="24"
                                 height="24"
                                 alt="">
                        </a>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-5">
                    <?php $__currentLoopData = $tours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('frontend.components.tour-card', ['tour' => $tour], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/components/tour-type-section.blade.php ENDPATH**/ ?>