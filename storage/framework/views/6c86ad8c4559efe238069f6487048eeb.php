<footer class="py-12 pb-8 md:px-3 border-t-2 border-t-mst-gray">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-6 md:gap-5">
            <!-- Logo & Description — 2 cols -->
            <div class="md:col-span-2">
                <a href="<?php echo e(url('/')); ?>" class="text-2xl font-bold text-mst-gray py-3">
                    <img src="<?php echo e(asset('assets/images/settings/'.get_setting('footer_logo'))); ?>"
                         alt="<?php echo e(get_setting('site_title')); ?>"
                         title="<?php echo e(get_setting('site_title')); ?>">
                </a>
                <p class="text-sm my-3 text-mst-gray leading-6 md:pe-6">
                    <?php echo e(get_setting('footer_about_us')); ?>

                </p>
            </div>
            <!-- Services — 1 col -->
            <div class="hidden md:block">
                <div class="text-mst-gray text-sm font-semibold mb-3">Services</div>
                <ul class="flex flex-col text-mst-gray text-sm space-y-[5px]">
                    <li><a href="#" class="hover:text-black transition-all duration-300">Dubai Tour</a></li>
                    <li><a href="#" class="hover:text-black transition-all duration-300">Umrah Packages</a></li>
                    <li><a href="#" class="hover:text-black transition-all duration-300">Holiday Packages</a></li>
                    <li><a href="#" class="hover:text-black transition-all duration-300">Global Visa Assistance</a></li>
                </ul>
            </div>
            <!-- Company — 1 col -->
            <div class="hidden md:block">
                <div class="text-mst-gray text-sm font-semibold mb-3">Company</div>
                <ul class="flex flex-col text-mst-gray text-sm space-y-[5px]">
                    <li><a href="" class="hover:text-black transition-all duration-300">Home</a></li>
                    <li><a href="" class="hover:text-black transition-all duration-300">About Us</a></li>
                    <li><a href="" class="hover:text-black transition-all duration-300">Customer Reviews</a></li>
                </ul>
            </div>
            <div class="hidden md:block md:col-span-2">
                <div class="flex gap-30 mb-6">
                    <div>
                        <div class="text-mst-gray text-sm font-semibold mb-3">Legal</div>
                        <ul class="flex flex-col text-mst-gray text-sm space-y-[5px]">
                            <li><a href="" class="hover:text-black transition-all duration-300">Privacy Policy</a></li>
                            <li><a href="" class="hover:text-black transition-all duration-300">Terms & Conditions</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="text-mst-gray text-sm font-semibold mb-3">Need Help?</div>
                        <ul class="flex flex-col text-mst-gray text-sm space-y-[5px]">
                            <li><a href="" class="hover:text-black transition-all duration-300">FAQs</a></li>
                            <li><a href="" class="hover:text-black transition-all duration-300">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <img src="<?php echo e(asset('assets/images/payment-icons.png')); ?>" alt="payment-icons">
            </div>
            <?php echo $__env->make('frontend.components.footer_menu', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </div>

    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-[1.6fr_1fr_1fr_1fr] md:gap-10 gap-3">
            <div>
                <ul class="flex gap-5 mt-5 items-center">
                    <li>
                        <a href=""><img src="<?php echo e(asset('assets/images/fb.svg')); ?>" alt="facebook"></a>
                    </li>
                    <li>
                        <a href=""><img src="<?php echo e(asset('assets/images/insta.svg')); ?>" alt="instagram"></a>
                    </li>
                    <li>
                        <a href=""><img src="<?php echo e(asset('assets/images/yt.svg')); ?>" alt="youtube"></a>
                    </li>
                    <li>
                        <a href=""><img src="<?php echo e(asset('assets/images/tt.svg')); ?>" alt="tiktok"></a>
                    </li>
                    <li>
                        <a href=""><img src="<?php echo e(asset('assets/images/lk.svg')); ?>" alt="linkedin"></a>
                    </li>
                </ul>
                <p class="text-sm text-body mt-3"><?php echo e(get_setting('copyright_text')); ?></p>
            </div>
            <!-- Email -->
            <div class="flex items-center text-sm text-body md:mt-10 gap-3">
                <img src="<?php echo e(asset('assets/images/email.svg')); ?>" class="w-10 shrink-0" alt="email"> <span><?php echo e(get_setting('email')); ?></span>
            </div>
            <!-- Address -->
            <div class="flex items-start text-sm text-body  md:mt-12 gap-3 md:-ms-10">
                <img src="<?php echo e(asset('assets/images/location.svg')); ?>" class="w-10 shrink-0 mt-0.5" alt="address">
                <span class="mt-0"><?php echo e(get_setting('address')); ?></span>
                
            </div>
            <!-- Phone -->
            <div class="flex items-start text-sm text-body md:mt-10 gap-3">
                <img src="<?php echo e(asset('assets/images/phone.svg')); ?>" class="w-10 shrink-0 mt-2.5" alt="phone">
                <span class="mt-0">
                    Office: <?php echo e(get_setting('mobile_number')); ?> <br>
                    Tours: <?php echo e(get_setting('tour_inquiry_whatsapp')); ?> <br>
                    Umrah: <?php echo e(get_setting('umrah_inquiry_whatsapp')); ?>

                </span>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/layouts/footer.blade.php ENDPATH**/ ?>