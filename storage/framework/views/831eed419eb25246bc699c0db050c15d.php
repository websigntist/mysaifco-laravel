<?php if(filled($pageContent ?? null) && isset($page)): ?>
    <section class="flex justify-center items-center py-8 px-4 md:py-10">
        <div class="container mx-auto">
            <div class="testimonials-section-inner mx-auto max-w-6xl">
                <div class="mx-auto text-center">
                    <?php if($page->show_title == '1' && filled($page->page_title)): ?>
                        <?php
                            $words     = explode(' ', $page->page_title);
                            $mainText  = implode(' ', array_slice($words, 0, -2));
                            $spanText  = implode(' ', array_slice($words, -2));
                        ?>
                        <h1>
                            <span><?php echo e($mainText); ?>  </span><span class="text-mst"><?php echo e($spanText); ?></span>
                        </h1>
                    <?php endif; ?>
                    <p class="mt-4">
                        <?php echo $pageContent; ?>

                    </p>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<section class="flex justify-center items-center py-8 px-4 md:py-10">
    <div class="container mx-auto">
        <div class="testimonials-section-inner mx-auto max-w-6xl">
            <div class="mx-auto text-center">
                <h1>
                    <span>Explore the Best </span><span class="text-mst">Dubai Tours, Activities</span>
                </h1>
                <p class="mt-4">
                    Explore the best Dubai tours and activities with a trusted local tour operator. Find top experiences
                    including Dubai desert safari, Dubai city tours, Dubai Marina yacht tours, dhow cruise dinner, and
                    full-day Abu Dhabi city tours with Ferrari World and Louvre Museum. Choose from popular Dubai water
                    activities, theme park tickets, and value Dubai combo tours with hotel pickup and drop-off, best
                    price guarantee, and 24/7 support. All tours are designed for easy booking, flexible options, and a
                    smooth travel experience.
                </p>
            </div>
        </div>
    </div>
</section>

<?php $__currentLoopData = $tourSections ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('frontend.components.tour-type-section', ['section' => $section], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo $__env->make('frontend.components.testimonials', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('frontend.components.faqs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('frontend.components.explore_dubai', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\frontend\pages\all-categories.blade.php ENDPATH**/ ?>