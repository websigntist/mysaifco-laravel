<?php
    $holidaySlides = $holidaySlides ?? [
        [
            'title' => '4 Days 3 Nights Holiday Package',
            'meta' => '5 Days • All Inclusive • Overwater Villa',
            'price' => '2,499',
            'rating' => '4.8',
            'image' => asset('assets/images/holi1.webp'),
            'url' => '#',
        ],
        [
            'title' => '5 Days Dubai & Abu Dhabi Combo',
            'meta' => 'City Tour • Desert Safari • Marina Cruise',
            'price' => '3,199',
            'rating' => '4.9',
            'image' => asset('assets/images/holi2.webp'),
            'url' => '#',
        ],
        [
            'title' => 'Luxury UAE Escape Package',
            'meta' => '4 Nights • 5 Star • Private Transfers',
            'price' => '4,850',
            'rating' => '4.7',
            'image' => asset('assets/images/p1.webp'),
            'url' => '#',
        ],
        [
            'title' => 'Family Dubai Holiday Deal',
            'meta' => '6 Days • Theme Parks • Beach Resort',
            'price' => '2,899',
            'rating' => '4.8',
            'image' => asset('assets/images/p2.webp'),
            'url' => '#',
        ],
        [
            'title' => 'Premium Honeymoon Package',
            'meta' => '7 Days • Romantic Dinner • Yacht Tour',
            'price' => '5,499',
            'rating' => '4.9',
            'image' => asset('assets/images/p3.webp'),
            'url' => '#',
        ],
    ];
?>
<section class="holiday-packages-section flex justify-center items-center overflow-x-clip bg-white py-10 px-4 sm:py-12 md:bg-gradient-to-r md:from-[#ffffff] md:from-50% md:to-[#E5EBFB] md:to-50% md:py-14">
    <div class="container mx-auto">
        <div class="holiday-packages-grid grid grid-cols-1 items-center gap-6 sm:gap-8 md:grid-cols-[minmax(0,2fr)_minmax(0,3fr)] md:gap-6 lg:gap-10">
            <div class="holiday-packages-copy flex min-w-0 flex-col justify-center">
                <h1 class="holiday-packages-heading capitalize italic font-semibold text-2xl sm:text-3xl font-heading">
                    holiday <span class="text-mst">
                        packages
                    </span>
                </h1>
                <div class="holiday-packages-desc text-sm sm:text-base my-2 leading-6 font-body text-gray-600 w-full max-w-lg mt-4 sm:mt-5 md:pe-2">
                    <p>Discover the best Dubai holiday packages with top UAE tours, exclusive deals, and unforgettable
                       experiences. From desert safari and luxury yacht tours to Abu Dhabi city tours and dhow cruises,
                       explore the UAE with expertly crafted travel packages for comfort, value, and memorable
                       journeys.</p>
                </div>
                <a href="" class="holiday-packages-cta flex items-center justify-center w-fit text-white text-base sm:text-lg px-5 py-2 rounded-full
                                            bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                                             hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                                             transition duration-300 font-heading italic mt-8"> Explore all Destination
                    <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                         class="w-5 ms-1"
                         alt="arrow"> </a>
            </div>
            <div class="holiday_carousel holiday-swiper-wrap min-w-0 w-full" aria-label="Holiday packages carousel">
                <div class="holiday-swiper-header mb-4 flex items-center justify-end gap-3 sm:gap-4 sm:mb-5 md:mb-6">
                    <button
                        type="button"
                        class="holiday-swiper-prev holiday-nav-btn holiday-nav-btn--prev"
                        aria-label="Previous holiday packages"
                    >
                        <img
                            src="<?php echo e(asset('assets/images/icons/btn-arrow-blk-left.svg')); ?>"
                            class="holiday-nav-img holiday-nav-img--prev rotate-180"
                            width="20"
                            height="20"
                            alt=""
                        />
                    </button>
                    <button
                        type="button"
                        class="holiday-swiper-next holiday-nav-btn holiday-nav-btn--next"
                        aria-label="Next holiday packages"
                    >
                        <img
                            src="<?php echo e(asset('assets/images/icons/btn-arrow-wht-right.svg')); ?>"
                            class="holiday-nav-img"
                            width="20"
                            height="20"
                            alt=""
                        />
                    </button>
                </div>
                <div class="holiday-swiper-bleed relative">
                    <div class="swiper holiday-swiper" id="holiday-packages-swiper">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $holidaySlides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide !h-auto">
                                    <article class="holiday-card">
                                        <img
                                            src="<?php echo e($slide['image']); ?>"
                                            alt="<?php echo e($slide['title']); ?>"
                                            class="holiday-card__img"
                                            loading="lazy"
                                            width="380"
                                            height="200"
                                        />
                                        <div class="holiday-card__overlay" aria-hidden="true"></div>
                                        <div class="holiday-card__content">
                                        <h2 class="holiday-card__title font-heading">
                                            <?php echo e($slide['title']); ?>

                                        </h2>
                                        <p class="holiday-card__meta font-body">
                                            <?php echo e($slide['meta']); ?>

                                        </p>
                                        <div class="holiday-card__footer">
                                            <span class="holiday-card__price font-heading">
                                                AED <?php echo e($slide['price']); ?>

                                            </span>
                                            <span class="holiday-card__rating font-body">
                                                <span class="holiday-card__rating-star" aria-hidden="true">&#9733;</span>
                                                <?php echo e($slide['rating']); ?>

                                            </span>
                                        </div>
                                    </div>
                                    </article>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/components/holiday_packages.blade.php ENDPATH**/ ?>