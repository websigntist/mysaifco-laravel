<section class="flex justify-center items-center py-8 px-4
bg-gradient-to-r from-[#ffffff] from-75% to-[#BA9B315F] to-25%">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-[8.2fr_3.8fr] gap-6">
            <div class="flex flex-col justify-center">
                
                <?php
                    $words = explode(' ', $explore_uae[0]->title ?? '');
                    $splitIndex = max(0, count($words) - 4); // last 3 words
                    $part1 = implode(' ', array_slice($words, 0, $splitIndex));
                    $part2 = implode(' ', array_slice($words, $splitIndex));
                ?>

                <h1>
                    <?php echo e($part1); ?> <span class="text-mst"><?php echo e($part2); ?></span>
                </h1>
                <div class="my-2 md:w-10/12 mt-5">
                    <?php echo $explore_uae[0]->description; ?>

                </div>
                <ul class="flex items-center justify-start gap-5 mt-5">
                    <li class="bg-mst p-2 w-50 rounded-lg">
                        <div class="text-white text-md font-medium text-center italic font-heading">
                            <?php echo $explore_uae[0]->title1; ?>

                        </div>
                        <div class="text-white text-sm text-center"><?php echo $explore_uae[0]->sub_title1; ?></div>
                    </li>
                    <li class="bg-mst p-2 w-50 rounded-lg">
                        <div class="text-white text-md font-medium text-center italic font-heading">
                            <?php echo $explore_uae[0]->title2; ?>

                        </div>
                        <div class="text-white text-sm text-center"><?php echo $explore_uae[0]->sub_title2; ?></div>
                    </li>
                    <li class="bg-mst p-2 w-50 rounded-lg">
                        <div class="text-white text-md font-medium text-center italic font-heading">
                            <?php echo $explore_uae[0]->title3; ?>

                        </div>
                        <div class="text-white text-sm text-center"><?php echo $explore_uae[0]->sub_title3; ?></div>
                    </li>
                </ul>
            </div>
            <div class="bg-gray-50 rounded-xl pt-3 pb-5 px-4 border border-gray-200 space-y-4">
                <div class="font-heading font-bold italic text-xl capitalize mb-3">
                    Contact with <span class="text-mst">Us</span>
                </div>
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 flex gap-4 item-center justify-start">
                    <img src="<?php echo e(asset('assets/images/icons/whatsapp.svg')); ?>" class="w36" alt="whatsapp">
                    <a href="tel:<?php echo e(get_setting('umrah_inquiry_whatsapp')); ?>">
                        <div class="font-heading font-bold italic text-mst text-xl">
                            Umrah Inquires <br> <span class="text-mst-gray">
                                                    <?php echo e(get_setting('umrah_inquiry_whatsapp')); ?>

                                                </span>
                        </div>
                    </a> <img src="<?php echo e(asset('assets/images/icons/line-arrow.svg')); ?>" class="w36 ml-auto" alt="arrow">
                </div>
                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 flex gap-4 item-center justify-start">
                    <img src="<?php echo e(asset('assets/images/icons/whatsapp.svg')); ?>" class="w36" alt="whatsapp">
                    <a href="tel:<?php echo e(get_setting('tour_inquiry_whatsapp')); ?>">
                        <div class="font-heading font-bold italic text-mst text-xl">
                            Tour Inquires <br> <span class="text-mst-gray">
                                <?php echo e(get_setting('tour_inquiry_whatsapp')); ?>

                            </span>
                        </div>
                    </a> <img src="<?php echo e(asset('assets/images/icons/line-arrow.svg')); ?>" class="w36 ml-auto" alt="arrow">
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/components/explore_uae.blade.php ENDPATH**/ ?>