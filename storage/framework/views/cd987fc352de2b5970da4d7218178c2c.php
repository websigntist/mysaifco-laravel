
<?php $__env->startSection('content'); ?>
    
    <section class="flex justify-center items-center border-b-1 border-gray-200">
        <div class="px-4 relative flex min-h-[400px] w-full
            items-center justify-center overflow-hidden">
            <div class="absolute inset-0 scale-105 bg-cover bg-top bg-no-repeat"
                 style="background-image: url('<?php echo e(asset('assets/images/sliders/560650.webp')); ?>')"
                 aria-hidden="true"></div>
            <div class="absolute inset-0 bg-gray-950/25" aria-hidden="true"></div>
            <div class="relative z-10 w-full py-14">
                <div class="container mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-[0.7fr_1fr] gap-6">
                        <div class="flex flex-col justify-center">
                            <ul class="flex items-center justify-start gap-5">
                                <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                    <div class="text-white text-xl font-medium text-center italic font-heading">
                                        Best Price
                                    </div>
                                    <div class="text-white text-xs text-center">Guaranteed Deals</div>
                                </li>
                                <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                    <div class="text-white text-xl font-medium text-center italic font-heading">
                                        18 + Years
                                    </div>
                                    <div class="text-white text-xs text-center">Trusted Experience</div>
                                </li>
                                <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                    <div class="text-white text-xl font-medium text-center italic font-heading">
                                        Top Rated
                                    </div>
                                    <div class="text-white text-xs text-center">5 Starts Rated</div>
                                </li>
                            </ul>
                            <ul class="flex items-center justify-start gap-5 mt-5">
                                <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                    <div class="text-white text-xl font-medium text-center italic font-heading">
                                        Licensed Operator
                                    </div>
                                    <div class="text-white text-xs text-center">Dubai Approved</div>
                                </li>
                                <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                    <div class="text-white text-xl font-medium text-center italic font-heading">
                                        50K + Customers
                                    </div>
                                    <div class="text-white text-xs text-center">World Wide Travelerss</div>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="flex items-center justify-end">
                            <div class="bg-gray-50 rounded-xl pt-3 pb-4 px-4 border border-gray-200 space-y-4 w-96 h-40">
                                <div class="font-heading font-bold italic text-xl capitalize mb-3">
                                    Contact with <span class="text-mst">Us</span>
                                </div>
                                <div class="bg-gray-50 rounded-xl p-4 border gap-3 border-gray-200 flex item-center justify-start">
                                    <img src="<?php echo e(asset('assets/images/icons/whatsapp.svg')); ?>" class="w36" alt="whatsapp">
                                    <a href="tel:+971505593840">
                                        <div class="font-heading font-bold italic text-mst text-xl">Tour Inquires <br>
                                            <span class="text-mst-gray">+971 50 559 3840</span>
                                        </div>
                                    </a>
                                    <img src="<?php echo e(asset('assets/images/icons/line-arrow.svg')); ?>" class="w36 ml-auto" alt="arrow">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    

    <?php if(filled($pageContent ?? null)): ?>
    <section class="flex justify-center items-center py-8 px-4 md:py-10">
        <div class="container mx-auto">
            <div class="testimonials-section-inner mx-auto max-w-6xl">
                <div class="mx-auto text-center">
                    <?php if($page->show_title == '1' && filled($page->page_title)): ?>
                    <?php
                        $words     = explode(' ', $page->page_title);
                        $mainText  = implode(' ', array_slice($words, 0, -2)); // all except last 2
                        $spanText  = implode(' ', array_slice($words, -2));    // last 2 words
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

    <?php $__currentLoopData = $tourSections ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('frontend.components.tour-type-section', ['section' => $section], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo $__env->make('frontend.components.testimonials', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('frontend.components.faqs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('frontend.components.explore_dubai', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/pages/all-categories.blade.php ENDPATH**/ ?>