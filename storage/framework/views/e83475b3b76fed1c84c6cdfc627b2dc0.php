<?php
    // Prepare gallery list
        $galleryImages = [];
        if (isset($sliderImages) && count($sliderImages) > 0) {
            foreach ($sliderImages as $img) {
                $galleryImages[] = $img['url'];
            }
        } else {
            $galleryImages = [
                asset('assets/images/sliders/tourbanner1.webp'),
                asset('assets/images/sliders/a95d2e266d1a301acbd44ce569f06b327150147d-original.webp'),
                asset('assets/images/sliders/bd2082fb280c1f77c0443001a10d57b3aa95d04d-original.webp'),
                asset('assets/images/sliders/b8cb2c4443fe91b19f2c0911feed8c6de30e3f79-original.webp'),
                asset('assets/images/sliders/02ba5f7de1ac57b3d882cde755809bb5074e4349-original.webp'),
            ];
        }
        $totalCount = count($galleryImages);
        $remainingCount = $totalCount - 4;

    $highlights = [
        ['label' => 'Burj Khalifa',  'icon' => '8887.svg'],
        ['label' => 'Desert Safari', 'icon' => 'j56.svg'],
        ['label' => 'Dhow Cruise',   'icon' => '0999.svg'],
        ['label' => 'City Tour',     'icon' => 'c56.svg'],
        ['label' => 'Dubai Mall',    'icon' => '0022.svg'],
    ];

    $itinerary = [
        ['day' => 1, 'title' => 'Arrival in Dubai',  'desc' => 'Arrive at Dubai International Airport. Meet & greet, transfer to hotel and check-in.'],
        ['day' => 2, 'title' => 'Dubai City Tour',   'desc' => 'Visit Dubai Museum, Jumeirah Mosque, Burj Al Arab, Palm Jumeirah, and Dubai Mall.'],
        ['day' => 3, 'title' => 'Desert Safari',     'desc' => 'Enjoy dune bashing, camel ride, sandboarding, BBQ dinner and live entertainment.'],
        ['day' => 4, 'title' => 'Dhow Cruise',       'desc' => 'Relax with the luxury dhow cruise at Dubai Marina with dinner and entertainment.'],
        ['day' => 5, 'title' => 'Departure',         'desc' => 'Check-out from hotel and transfer to airport for your return flight.'],
    ];

    $included = [
        '4 Nights Hotel Accommodation',
        'Daily Breakfast',
        'Airport Transfers',
        'Dubai City Tour',
        'Desert Safari with BBQ Dinner',
        'Dhow Cruise with Dinner',
        'All Tours & Transfers on SIC Basis',
        'All Taxes & Service Charges',
    ];

    $notIncluded = [
        'Air Tickets',
        'Lunch & Dinner (Except mentioned)',
        'Travel Insurance',
        'Personal Expenses',
        'Visa Fees (If applicable)',
        'Anything not mentioned in inclusions',
    ];

    $amenities = [
        ['label' => 'Air Conditioning', 'icon' => '666.svg'],
        ['label' => 'Free WiFi',        'icon' => '33.svg'],
        ['label' => 'TV',               'icon' => '11.svg'],
        ['label' => 'Gym',              'icon' => '22.svg'],
        ['label' => 'Swimming Pool',    'icon' => '44.svg'],
        ['label' => 'Housekeeping',     'icon' => '343434.svg'],
        ['label' => 'Elevator',         'icon' => '867876.svg'],
        ['label' => 'Restaurant',       'icon' => '432423.svg'],
        ['label' => '24/7 Front Desk',  'icon' => '564565.svg'],
    ];

    $features = [
        ['title' => 'Great Locations', 'desc' => 'Hotels are located in well-connected areas close to shopping, transport & attractions', 'icon'  => 'p898.svg'],
        ['title' => 'Quality Assured', 'desc' => 'All hotels are 3 Star category with standard services and comfortable stay', 'icon'  => '598.svg'],
        ['title' => 'Perfect for All', 'desc' => 'Suitable for families, couples and solo travelers', 'icon'  => '17years.svg'],
        ['title' => 'Dedicated Support', 'desc' => 'Our experienced team is available throughout our journey to assist you', 'icon'  => 'support2.svg'],
    ];

    $importantNotes = [
        'Checkin time is 2:00 PM and check-out time is 12:00 PM.',
        'Early check-in or late check-out subject to availability.',
        'Rates are subject to change without prior notice.',
        'Passport must be valid for at least 6 months from travel date.',
        'Visa charges are not included.',
    ];

    $popularServices = [
        ['image' => '5655.webp', 'badge' => '5 - 6 Hours',  'title' => 'Desert Safari with BBQ Dinner',
         'desc' => 'Explore the thrill of Dubai desert safari, learn about different safari types, prices, inclusions and tips for an amazing.', 'price' => '169'],
        ['image' => '1111.webp', 'badge' => '8 - 10 Hours', 'title' => 'Yacht Charter in Dubai - A Luxury Experience',
         'desc' => 'Explore the thrill of Dubai desert safari, learn about different safari types, prices, inclusions and tips for an amazing.', 'price' => '169'],
    ];
?>

<section class="pt-6">
    <div class="container mx-auto">
        <nav class="flex items-center gap-2 text-sm font-heading" aria-label="Breadcrumb">
            <a href="<?php echo e(url('/')); ?>" class="text-mst-gray hover:text-mst transition">Home</a>
            <svg class="w-3.5 h-3.5 text-mst" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7"/>
            </svg>
            <a href="<?php echo e(url('/holiday-packages')); ?>" class="text-mst-gray hover:text-mst transition">Holiday
                                                                                                     Packages</a>
            <svg class="w-3.5 h-3.5 text-mst" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7"/>
            </svg>
            <span class="text-mst">Dubai Holiday Package</span>
        </nav>
    </div>
</section>

<section class="tour-detail-gallery pt-8 pb-4">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-[8fr_4fr] gap-6">
            <!-- Left Column: Big image autoplay slider -->
            <div class="relative w-full h-[280px] md:h-[450px] group min-w-0">
                <!-- Swiper Container -->
                <div class="swiper tour-details-swiper rounded-2xl overflow-hidden h-full shadow-sm">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imageUrl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide h-full">
                                <img src="<?php echo e($imageUrl); ?>" class="w-full h-full object-cover" alt="Gallery Image">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination tour-details-swiper-pagination !bottom-4"></div>
                </div>
                <!-- Overlays -->
                <!-- Back Button (top-left) -->
                <div class="absolute left-6 top-6 z-20">
                    <a href="#" class="inline-flex items-center text-white px-5 py-2.5 rounded-full font-heading
                    italic font-bold text-sm bg-[#BA9B31] hover:bg-[#A3872A] transition duration-300 shadow-md">
                        <!-- Left Arrow Chevron SVG -->
                        <svg class="w-4 h-4 mr-1.5 stroke-current" fill="none" stroke-width="3" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back </a>
                </div>
                <!-- Action Buttons (top-right) -->
                <div class="absolute right-6 top-6 z-20 flex items-center gap-3">
                    <!-- Share -->
                    <button class="cursor-pointer shadow-md" title="Share">
                        <img src="<?php echo e(asset('assets/images/icons/share.svg')); ?>" class="w-10 h-10" alt="Share">
                    </button>
                    <!-- Heart -->
                    <button class="cursor-pointer shadow-md" title="Wishlist">
                        <img src="<?php echo e(asset('assets/images/icons/heart.svg')); ?>" class="w-10 h-10" alt="Wishlist">
                    </button>
                    <!-- Three Dots -->
                    <button class="cursor-pointer shadow-md" title="More">
                        <img src="<?php echo e(asset('assets/images/icons/more.svg')); ?>" class="w-10 h-10" alt="More">
                    </button>
                </div>
                <!-- Navigation Arrows (left and right edges) -->
                <button class="tour-details-swiper-prev absolute left-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-black/35 hover:bg-black/55 text-white flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button class="tour-details-swiper-next absolute right-4 top-1/2 -translate-y-1/2 z-20 w-11 h-11 rounded-full bg-black/35 hover:bg-black/55 text-white flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
            <!-- Right Column: 2x2 grid showing up to 4 images, 4th image showing "+X" overlay -->
            <div class="grid grid-cols-2 gap-4">
                <!-- Grid Image 1 -->
                <div class="gallery-grid-item relative aspect-square overflow-hidden rounded-2xl border border-gray-100 shadow-xs group cursor-pointer" data-index="1">
                    <img src="<?php echo e($galleryImages[1] ?? ($galleryImages[0] ?? asset('assets/images/sliders/tourbanner1.webp'))); ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Gallery Image 1">
                </div>
                <!-- Grid Image 2 -->
                <div class="gallery-grid-item relative aspect-square overflow-hidden rounded-2xl border border-gray-100 shadow-xs group cursor-pointer" data-index="2">
                    <img src="<?php echo e($galleryImages[2] ?? ($galleryImages[0] ?? asset('assets/images/sliders/tourbanner1.webp'))); ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Gallery Image 2">
                </div>
                <!-- Grid Image 3 -->
                <div class="gallery-grid-item relative aspect-square overflow-hidden rounded-2xl border border-gray-100 shadow-xs group cursor-pointer" data-index="3">
                    <img src="<?php echo e($galleryImages[3] ?? ($galleryImages[0] ?? asset('assets/images/sliders/tourbanner1.webp'))); ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Gallery Image 3">
                </div>
                <!-- Grid Image 4 (with +X remaining overlay) -->
                <div class="gallery-grid-item relative aspect-square overflow-hidden rounded-2xl border border-gray-100 shadow-xs group cursor-pointer" data-index="4">
                    <img src="<?php echo e($galleryImages[4] ?? ($galleryImages[0] ?? asset('assets/images/sliders/tourbanner1.webp'))); ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center z-15 hover:bg-black/30 transition duration-300">
                        <span class="font-heading font-normal text-3xl md:text-4xl text-white">+<?php echo e($remainingCount > 0 ? $remainingCount : 10); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Script to change slider image on clicking grid items -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const swiperEl = document.querySelector('.tour-details-swiper');
            const gridItems = document.querySelectorAll('.gallery-grid-item');

            gridItems.forEach(item => {
                item.addEventListener('click', function () {
                    const idx = parseInt(this.getAttribute('data-index'));
                    if (swiperEl && swiperEl.swiper) {
                        swiperEl.swiper.slideToLoop(idx);
                        // Optional: pause autoplay on user interaction
                        swiperEl.swiper.autoplay?.stop();
                    }
                });
            });
        });
    </script>
</section>

<section class="pt-12">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-[8fr_4fr] gap-6">
            
            <div>
                <h1 class="font-heading italic font-bold text-3xl text-mst-gray">Dubai Holiday <span class="text-mst">Package</span>
                </h1>
                <p class="font-body text-mst-gray mt-2 text-sm">5 Days / 4 Nights</p>
                <div class="flex items-center gap-2 mt-3">
                    <span class="flex text-[#F5A623]" aria-hidden="true">
                        <?php for($s = 0; $s < 5; $s++): ?>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 1.5l2.6 5.3 5.9.9-4.3 4.1 1 5.8L10 15l-5.2 2.7 1-5.8L1.5 7.7l5.9-.9L10 1.5Z"/></svg>
                        <?php endfor; ?>
                    </span> <span class="font-body text-sm text-mst-gray">(4.9/5) 2.4K Reviews</span>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mt-6 border-y border-gray-200 py-5">
                    <?php
                        $facts = [
                            ['label' => 'Starting From', 'value' => 'AED 125', 'icon' => 'tag.svg'],
                            ['label' => 'Destination', 'value' => 'Dubai, UAE', 'icon' => 'redpin.svg'],
                            ['label' => 'Duration', 'value' => '5 Days / 4 Nights', 'icon' => '3dclock.svg'],
                            ['label' => 'Hotel Category', 'value' => '4 Star Hotel', 'icon' => '988.svg'],
                            ['label' => 'Flights', 'value' => 'Optional', 'icon' => '88.svg'],
                        ];
                    ?>
                    <?php $__currentLoopData = $facts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex flex-col gap-1">
                            <div class="flex items-center gap-2">
                                <img src="<?php echo e(asset('assets/images/icons/' . $fact['icon'])); ?>" alt="">
                                <span class="font-body text-xs -mt-1 text-gray-500"><?php echo e($fact['label']); ?></span>
                            </div>
                            <span class="font-heading font-bold text-xs text-mst-gray ms-8 -mt-2"><?php echo e($fact['value']); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-5 gap-3 mt-6">
                    <?php $__currentLoopData = $highlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $highlight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex flex-col items-center justify-center text-center gap-2 bg-gray-50 border border-gray-200 rounded-xl py-4 px-2">
                            <img src="<?php echo e(asset('assets/images/icons/' . $highlight['icon'])); ?>" alt="">
                            <span class="font-heading italic font-bold text-sm text-mst-gray"><?php echo e($highlight['label']); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                <h2 class="font-heading italic font-bold text-2xl text-mst-gray mt-10 mb-6">Itinerary</h2>
                <div class="space-y-6">
                    <?php $__currentLoopData = $itinerary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-start gap-4">
                            <div class="flex flex-col items-center justify-center w-12 h-12 flex-shrink-0 rounded-full bg-gradient-to-r from-[#BA9B31] to-[#74611E] text-white leading-none">
                                <span class="font-heading text-[10px] uppercase">Day</span>
                                <span class="font-heading font-bold text-base"><?php echo e($item['day']); ?></span>
                            </div>
                            <div>
                                <h3 class="font-heading font-bold text-lg no-italic text-mst-gray"><?php echo e($item['title']); ?></h3>
                                <p class="font-body text-sm text-mst-gray mt-1"><?php echo e($item['desc']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-10">
                    <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6">
                        <h3 class="font-heading font-bold text-lg text-mst-gray mb-4">What's Included</h3>
                        <ul class="space-y-3">
                            <?php $__currentLoopData = $included; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="flex items-start gap-3">
                                    <img src="<?php echo e(asset('assets/images/icons/check-bullet.svg')); ?>" alt="">
                                    <span class="font-body text-sm text-mst-gray"><?php echo e($inc); ?></span>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6">
                        <h3 class="font-heading font-bold text-lg text-mst-gray mb-4">What's Not Included</h3>
                        <ul class="space-y-3">
                            <?php $__currentLoopData = $notIncluded; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="flex items-start gap-3">
                                    <img src="<?php echo e(asset('assets/images/icons/777.svg')); ?>" alt="">
                                    <span class="font-body text-sm text-mst-gray"><?php echo e($exc); ?></span>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="rightSide__column bg-gray-50 py-6 px-6 rounded-3xl border border-gray-200 h-fit">
                <form id="detailed-booking-form" class="space-y-6">
                    <h3>
                        Book this <span class="text-mst">Tour</span>
                    </h3>
                    <!-- STEP 1 -->
                    <div class="space-y-2">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-9 pb-1 rounded-full italic font-heading
                                         bg-gradient-to-r from-mst to-mst-dark
                                         text-white flex items-center justify-center text-xl flex-shrink-0 select-none">
                                1
                            </div>
                            <div>
                                <div class="text-xs font-medium text-mst leading-none">STEP 1</div>
                                <div class="text-sm font-heading font-bold text-mst-gray">Travel Date</div>
                            </div>
                        </div>
                        <div class="relative">
                            <div class="w-full flex items-center justify-between border border-gray-200 rounded-xl px-4 py-3 text-mst-gray cursor-pointer" onclick="const input = document.getElementById('booking-tour-date'); input.type='date'; try { input.showPicker(); } catch(e) { input.focus(); }">
                                <div class="flex items-center gap-2.5 w-full">
                                    <img src="<?php echo e(asset('assets/images/icons/3dcalender.svg')); ?>" class="object-contain flex-shrink-0 pointer-events-none" alt="">
                                    <input type="text" id="booking-tour-date" placeholder="Choose your tour date" onfocus="this.type='date'; try { this.showPicker(); } catch(e) {}" onblur="if(!this.value)this.type='text'" class="font-body text-sm font-medium focus:outline-none bg-transparent w-full cursor-pointer text-mst-gray" required>
                                </div>
                                <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <!-- STEP 2 -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-2.5 mb-2">
                            <div class="w-8 h-9 pb-1 rounded-full italic font-heading
                                                                     bg-gradient-to-r from-mst to-mst-dark
                                                                     text-white flex items-center justify-center text-xl flex-shrink-0 select-none">
                                2
                            </div>
                            <div>
                                <div class="text-xs font-medium text-mst leading-none">STEP 2</div>
                                <div class="text-sm font-heading font-bold text-mst-gray">Number of Guests</div>
                            </div>
                        </div>
                        <div class="space-y-3 pl-1">
                            <!-- Adults -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <img src="<?php echo e(asset('assets/images/icons/user2.svg')); ?>" class="object-contain" alt="">
                                    <span class="text-sm font-semibold text-mst-gray">Adults
                                                    <span class="text-sm font-normal text-gray-400">(12+ Years)</span></span>
                                </div>
                                <div class="flex items-center gap-2.5 border border-gray-200 rounded-lg px-2 py-0.5 bg-white select-none">
                                    <button type="button" class="w-6 h-6 flex items-center justify-center
                                                text-mst hover:text-mst-gray text-md" id="adult-dec">
                                        -
                                    </button>
                                    <span class="w-5 text-center text-sm font-bold text-mst-gray"
                                          id="adult-qty">2</span>
                                    <button type="button" class="w-6 h-6 flex items-center justify-center
                                                                                    text-mst hover:text-mst-gray text-md" id="adult-inc">
                                        +
                                    </button>
                                </div>
                            </div>
                            <!-- Children -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <img src="<?php echo e(asset('assets/images/icons/user2.svg')); ?>" class="object-contain" alt="">
                                    <span class="text-sm font-semibold text-mst-gray">Children <span class="text-sm font-normal text-gray-400">(2 - 10 Years)</span></span>
                                </div>
                                <div class="flex items-center gap-2.5 border border-gray-200 rounded-lg px-2 py-0.5 bg-white select-none">
                                    <button type="button" class="w-6 h-6 flex items-center justify-center
                                                                                    text-mst hover:text-mst-gray text-md" id="child-dec">
                                        -
                                    </button>
                                    <span class="w-5 text-center text-sm font-bold text-mst-gray" id="child-qty">0</span>
                                    <button type="button" class="w-6 h-6 flex items-center justify-center
                                                                                    text-mst hover:text-mst-gray text-md" id="child-inc">
                                        +
                                    </button>
                                </div>
                            </div>
                            <!-- Infant -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <img src="<?php echo e(asset('assets/images/icons/user2.svg')); ?>" class="object-contain" alt="">
                                    <span class="text-sm font-semibold text-mst-gray">Infant <span class="text-sm font-normal text-gray-400">(0 - 1 Years)</span></span>
                                </div>
                                <div class="flex items-center gap-2.5 border border-gray-200 rounded-lg px-2 py-0.5 bg-white select-none">
                                    <button type="button" class="w-6 h-6 flex items-center justify-center
                                                                                    text-mst hover:text-mst-gray text-md" id="infant-dec">
                                        -
                                    </button>
                                    <span class="w-5 text-center text-sm font-bold text-mst-gray" id="infant-qty">0</span>
                                    <button type="button" class="w-6 h-6 flex items-center justify-center
                                                                                    text-mst hover:text-mst-gray text-md" id="infant-inc">
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- STEP 3 -->
                    <div class="space-y-2">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-9 pb-1 rounded-full italic font-heading
                                                             bg-gradient-to-r from-mst to-mst-dark
                                                             text-white flex items-center justify-center text-xl flex-shrink-0 select-none">
                                3
                            </div>
                            <div>
                                <div class="text-xs font-medium text-mst leading-none">STEP 3</div>
                                <div class="text-sm font-heading font-bold text-mst-gray">Room Type</div>
                            </div>
                        </div>
                        <div class="relative">
                            <div class="w-full flex items-center justify-between border border-gray-200 rounded-xl px-4 py-3 text-mst-gray cursor-pointer" onclick="const input = document.getElementById('booking-tour-date'); input.type='date'; try { input.showPicker(); } catch(e) { input.focus(); }">
                                <div class="flex items-center gap-2.5 w-full">
                                    <img src="<?php echo e(asset('assets/images/icons/222.svg')); ?>" class="object-contain flex-shrink-0 pointer-events-none" alt="">
                                    <input type="text" id="booking-tour-date" placeholder="Select room type" onfocus="this.type='date'; try { this.showPicker(); } catch(e) {}" onblur="if(!this.value)this.type='text'" class="font-body text-sm font-medium focus:outline-none bg-transparent w-full cursor-pointer text-mst-gray" required>
                                </div>
                                <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <!-- STEP 4 -->
                    <div class="space-y-2">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-9 pb-1 rounded-full italic font-heading
                                                             bg-gradient-to-r from-mst to-mst-dark
                                                             text-white flex items-center justify-center text-xl flex-shrink-0 select-none">
                                4
                            </div>
                            <div>
                                <div class="text-xs font-medium text-mst leading-none">STEP 4</div>
                                <div class="text-sm font-heading font-bold text-mst-gray">Hotel Category</div>
                            </div>
                        </div>
                        <div class="relative">
                            <div class="w-full flex items-center justify-between border border-gray-200 rounded-xl px-4 py-3 text-mst-gray cursor-pointer" onclick="const input = document.getElementById('booking-tour-date'); input.type='date'; try { input.showPicker(); } catch(e) { input.focus(); }">
                                <div class="flex items-center gap-2.5 w-full">
                                    <img src="<?php echo e(asset('assets/images/icons/988.svg')); ?>" class="object-contain flex-shrink-0 pointer-events-none" alt="">
                                    <input type="text" id="booking-tour-date" placeholder="4 Star hotel" onfocus="this .type='date'; try { this.showPicker(); } catch(e) {}" onblur="if(!this.value)this.type='text'" class="font-body text-sm font-medium focus:outline-none bg-transparent w-full cursor-pointer text-mst-gray" required>
                                </div>
                                <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- BOOK ACTIONS -->
                    <div class="space-y-3">
                        <button type="submit" class="w-full flex items-center justify-center gap-2 rounded-full
                                    bg-gradient-to-r from-mst to-mst-dark hover:from-mst-dark hover:to-mst text-white
                                    font-heading font-semibold italic text-md py-3 transition duration-300 select-none">
                            <img src="<?php echo e(asset('assets/images/icons/lock.svg')); ?>" alt=""> Book Now
                        </button>
                        <a href="#" target="_blank" class="w-full flex items-center justify-center gap-2 rounded-full
                                     bg-gradient-to-r from-[#2D9D3E] to-[#1E5E28] hover:from-[#1E5E28] hover:to-[#2D9D3E]
                                     text-white font-heading font-semibold italic text-md py-3
                                     shadow-md transition duration-300">
                            <img src="<?php echo e(asset('assets/images/icons/whatsapp1.svg')); ?>" class="brightness-0 invert" alt="">
                            Book via WhatsApp </a>
                    </div>
                    <!-- NEED HELP -->
                    <div class="p-4 bg-mst/10 rounded-xl flex items-center justify-between gap-3">
                        <div class="flex items-center gap-2">
                            <img src="<?php echo e(asset('assets/images/icons/support6.svg')); ?>" class="object-contain" alt="">
                            <div>
                                <div class="text-md font-heading font-bold text-mst italic leading-tight">Need Help?
                                </div>
                                <div class="text-sm text-gray-600 leading-none mt-1">We're here to help you</div>
                            </div>
                        </div>
                        <div class="text-right space-y-1 leading-none font-heading">
                            <div class="flex">
                                <img src="<?php echo e(asset('assets/images/icons/phone9.svg')); ?>" class="me-1 object-contain" alt="">
                                <a href="#" class="block text-sm font-bold text-mst-gray italic">+971 4 273 3888</a>
                            </div>
                            <div class="flex">
                                <img src="<?php echo e(asset('assets/images/icons/wa5.svg')); ?>" class="me-1 object-contain" alt="">
                                <a href="#" target="_blank" class="block text-sm font-bold italic">+971 50 559 3840</a>
                            </div>
                        </div>
                    </div>
                    <!-- TRUST BADGES -->
                    <div class="grid grid-cols-3 gap-1 font-heading select-none">
                        <div class="flex flex-col items-center text-center">
                            <img src="<?php echo e(asset('assets/images/icons/4543534.svg')); ?>" class="object-contain" alt="">
                            <span class="text-sm font-bold text-mst-gray mt-1 italic leading-tight">Since 2008</span>
                            <span class="text-xs text-gray-500 mt-0.5">Trusted Partner</span>
                        </div>
                        <div class="flex flex-col items-center text-center">
                            <img src="<?php echo e(asset('assets/images/icons/17years.svg')); ?>" class="object-contain" alt="">
                            <span class="text-sm font-bold text-mst-gray mt-1 italic leading-tight">50,000+</span>
                            <span class="text-xs text-gray-500 mt-0.5">Happy Travelers</span>
                        </div>
                        <div class="flex flex-col items-center text-center">
                            <img src="<?php echo e(asset('assets/images/icons/badge1.svg')); ?>" class="object-contain" alt="">
                            <span class="text-sm font-bold text-mst-gray mt-3 italic leading-tight">Licensed</span>
                            <span class="text-xs text-gray-500 mt-0.5">UAE Tour Operator</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="pt-16">
    <div class="container mx-auto">
        <div class="flex items-center justify-center gap-4 mb-2">
            <h2 class="font-heading italic font-bold text-3xl md:text-4xl text-mst-gray text-center">Hotel Stay
                <span class="text-mst">(3 Star Category)</span></h2>
        </div>
        <p class="font-body text-center text-mst-gray mb-8 text-[16px]">Comfortable & well-located hotels to make our
                                                                        stay pleasant and relaxing</p>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="rounded-2xl overflow-hidden h-64 lg:h-auto">
                <img src="<?php echo e(asset('assets/images/packages/989898.webp')); ?>" alt="3 Star Hotel" class="w-full h-full object-cover">
            </div>
            
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6">
                <h3 class="font-heading font-bold not-italic text-lg text-mst-gray mb-4">3 Star Hotel</h3>
                <p class="font-body text-sm text-gray-600 mb-8">You will be accommodated in a comfortable 3 Star
                                                                category hotel similar to City Max Burdubai or
                                                                similar.</p>
                <?php
                    $hotelPoints = [
                        ['label' => 'Clean and Comfortable Rooms', 'icon' => 'b65.svg'],
                        ['label' => 'Prime Location', 'icon' => 'p898.svg'],
                        ['label' => 'Modern Amenities', 'icon' => '55.svg'],
                        ['label' => 'Ideal for Families & Couples', 'icon' => '77.svg'],
                    ];
                ?>
                <ul class="space-y-5">
                    <?php $__currentLoopData = $hotelPoints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="flex items-center gap-3">
                            <img src="<?php echo e(asset('assets/images/icons/' . $point['icon'])); ?>" alt="">
                            <span class="font-body text-sm text-mst-gray"><?php echo e($point['label']); ?></span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6">
                <h3 class="font-heading font-bold text-lg not-italic text-mst-gray mb-4">Inclusive You Can Expect</h3>
                <div class="grid grid-cols-3 gap-3">
                    <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex flex-col items-center justify-center text-center gap-2 bg-white border border-gray-200 rounded-xl py-4 px-1">
                            <img src="<?php echo e(asset('assets/images/icons/' . $amenity['icon'])); ?>" alt="">
                            <span class="font-body text-[11px] text-mst-gray leading-tight"><?php echo e($amenity['label']); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        
        <div class="bg-[#FAF7F2] border border-[#BA9B31]/30 rounded-xl p-4 mt-6 flex items-center justify-center gap-3 text-center">
            <img src="<?php echo e(asset('assets/images/icons/8789.svg')); ?>" class="w-6" alt="">
            <span class="font-body text-sm text-mst-gray">Hotels will be provided from our trusted 3 Star categorypartners. <span class="font-semibold">Final hotel detailswill be shared before your travel.</span></span>
        </div>
    </div>
</section>

<section class="pt-12">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
            <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="grid grid-cols-[auto_1fr] gap-4 px-6 items-center">
                    <div>
                        <img src="<?php echo e(asset('assets/images/icons/' . $feature['icon'])); ?>"
                             class="w-10 h-10 object-contain" alt="">
                    </div>
                    <div>
                        <h4 class="font-heading italic font-bold text-base text-mst-gray"><?php echo e($feature['title']); ?></h4>
                        <p class="font-body text-xs text-mst-gray mt-1 leading-snug"><?php echo e($feature['desc']); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<section class="pt-14">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.4fr] gap-6">
            
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6">
                <h3 class="font-heading font-bold text-xl text-mst-gray mb-6">Important Notes</h3>
                <ul class="space-y-4">
                    <?php $__currentLoopData = $importantNotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="flex items-start gap-3">
                            <img src="<?php echo e(asset('assets/images/icons/check-bullet.svg')); ?>" alt="">
                            <span class="font-body text-sm text-mst-gray"><?php echo e($note); ?></span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            
            <div>
                <h3 class="font-heading italic font-bold text-xl text-mst-gray mb-5">Our Popular <span class="text-mst">Services</span>
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <?php $__currentLoopData = $popularServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="bg-white border border-gray-200 rounded-2xl overflow-hidden flex flex-col">
                            <div class="relative h-40">
                                <img src="<?php echo e(asset('assets/images/packages/' . $service['image'])); ?>" alt="<?php echo e($service['title']); ?>" class="w-full h-full object-cover">
                                <span class="absolute bottom-3 left-3 bg-gray-800 text-white text-xs font-heading
                                italic px-3 py-1 rounded-md"><?php echo e($service['badge']); ?></span>
                            </div>
                            <div class="p-4 flex flex-col flex-1">
                                <h4 class="font-heading font-bold text-sm text-mst-gray leading-snug line-clamp-1"><?php echo e($service['title']); ?></h4>
                                <div class="flex items-center gap-1 mt-2">
                                    <svg class="w-4 h-4 text-[#F5A623]" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 1.5l2.6 5.3 5.9.9-4.3 4.1 1 5.8L10 15l-5.2 2.7 1-5.8L1.5 7.7l5.9-.9L10 1.5Z"/>
                                    </svg>
                                    <span class="font-body text-xs text-mst-gray">4.9/5 | 5.1k Reviews</span>
                                </div>
                                <p class="font-body text-xs text-mst-gray mt-2 leading-snug"><?php echo e($service['desc']); ?></p>
                                <div class="flex items-end justify-between mt-auto pt-2">
                                    <div>
                                        <p class="font-body text-xs text-mst-gray">Starting from</p>
                                        <p class="font-heading font-bold text-mst">AED <?php echo e($service['price']); ?></p>
                                    </div>
                                    <a href="#" class="w-9 h-9 rounded-full bg-gradient-to-r from-[#BA9B31] to-[#74611E] text-white flex items-center justify-center hover:opacity-90 transition" aria-label="View <?php echo e($service['title']); ?>">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        
        <div class="bg-[#FAF7F2] border border-[#BA9B31]/30 rounded-xl p-4 mt-8 flex items-center justify-center gap-3 text-center">
            <img src="<?php echo e(asset('assets/images/icons/46.svg')); ?>" alt="">
            <span class="font-body text-sm text-mst-gray"><span class="font-semibold">Please Note:</span> Hotel names
                                                                                                       will be confirmed closer to your travel date. We arrange stays in similar 3 Star Category hotels of the same standard.</span>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Gallery thumbnail swap
        var mainImg = document.getElementById('gallery-main-img');
        document.querySelectorAll('.gallery-thumb').forEach(function (thumb) {
            thumb.addEventListener('click', function () {
                var full = thumb.getAttribute('data-full');
                if (mainImg && full) {
                    mainImg.src = full;
                }
            });
        });
        // Guest steppers
        document.querySelectorAll('.guest-plus, .guest-minus').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var input = btn.parentElement.querySelector('.guest-count');
                var val = parseInt(input.value, 10) || 0;
                val = btn.classList.contains('guest-plus') ? val + 1 : Math.max(0, val - 1);
                input.value = val;
            });
        });
    });
</script>
<?php echo $__env->make('frontend.components.testimonials', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;

<section class="flex items-center justify-center pt-10 pb-0">
    <div class="container mx-auto px-4">
        <div class="mx-auto text-center">
            <h1 class="text-3xl md:text-4xl">
                <span>Frequently Asked  </span><span class="text-mst">Questions</span>
            </h1>
            <p class="mt-4 text-center mx-auto md:w-3xl text-[16px]">Explore common questions about our Umrah by Bus
                                                                     packages from Dubai and UAE, including visa
                                                                     processing, departure schedules, hotel
                                                                     accommodation, transportation, and Ziyarat
                                                                     tours.</p>
        </div>
        <div id="accordion-card" class="faq-disert-safari mt-14" data-custom-accordion="collapse">
            <div class="w-4xl mx-auto md:gap-x-10">
                <div class="flex flex-col gap-4">
                    <div class="faqmst overflow-hidden rounded-lg border border-gray-200 bg-white transition">
                        <h2 id="faq-1">
                            <button type="button" class="faq-accordion-btn flex w-full items-center justify-between
                            gap-4 border-0 bg-transparent px-5 py-5 font-heading text-lg font-semibold text-left
                            text-mst-gray transition [&amp;[aria-expanded='true']]:text-white" data-custom-accordion-target="#faq-body-1" aria-expanded="true" aria-controls="faq-body-1">
                                <span>What is included in Desert Safari Dubai packages?</span>
                                <svg data-accordion-icon="" class="h-5 w-5 shrink-0 transition-transform duration-300 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="faq-body-1" class="grid transition-all duration-300 ease-in-out" style="grid-template-rows: 1fr;" aria-labelledby="faq-1">
                            <div class="overflow-hidden">
                                <div class="px-5 pb-5">
                                    <p class="font-body text-sm leading-relaxed text-white">Lorem ipsum dolor sit amet,
                                                                                            consectetur adipisicing
                                                                                            elit. Asperiores dolore
                                                                                            doloremque labore laborum
                                                                                            quidem rerum sint? Assumenda
                                                                                            consectetur doloremque
                                                                                            dolorum impedit modi
                                                                                            recusandae! Aspernatur aut
                                                                                            deserunt dignissimos esse et
                                                                                            exercitationem nostrum
                                                                                            repellendus repudiandae
                                                                                            sapiente vitae.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="faqmst overflow-hidden rounded-lg border border-gray-200 bg-white transition">
                        <h2 id="faq-2">
                            <button type="button" class="faq-accordion-btn flex w-full items-center justify-between gap-4 border-0 bg-transparent px-5 py-5 font-heading text-lg font-semibold text-left text-mst-gray transition [&amp;[aria-expanded='true']]:text-white" data-custom-accordion-target="#faq-body-2" aria-expanded="false" aria-controls="faq-body-2">
                                <span>Is BBQ dinner included in desert safari Dubai?</span>
                                <svg data-accordion-icon="" class="h-5 w-5 shrink-0 transition-transform duration-300 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="faq-body-2" class="grid transition-all duration-300 ease-in-out" style="grid-template-rows: 0fr;" aria-labelledby="faq-2">
                            <div class="overflow-hidden">
                                <div class="px-5 pb-5">
                                    <p class="font-body text-sm leading-relaxed text-white">Lorem ipsum dolor sit amet,
                                                                                            consectetur adipisicing
                                                                                            elit. Asperiores dolore
                                                                                            doloremque labore laborum
                                                                                            quidem rerum sint? Assumenda
                                                                                            consectetur doloremque
                                                                                            dolorum impedit modi
                                                                                            recusandae! Aspernatur aut
                                                                                            deserunt dignissimos esse et
                                                                                            exercitationem nostrum
                                                                                            repellendus repudiandae
                                                                                            sapiente vitae.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="faqmst overflow-hidden rounded-lg border border-gray-200 bg-white transition">
                        <h2 id="faq-3">
                            <button type="button" class="faq-accordion-btn flex w-full items-center justify-between gap-4 border-0 bg-transparent px-5 py-5 font-heading text-lg font-semibold text-left text-mst-gray transition [&amp;[aria-expanded='true']]:text-white" data-custom-accordion-target="#faq-body-3" aria-expanded="false" aria-controls="faq-body-3">
                                <span>Which is better, morning or evening desert safari Dubai?</span>
                                <svg data-accordion-icon="" class="h-5 w-5 shrink-0 transition-transform duration-300 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="faq-body-3" class="grid transition-all duration-300 ease-in-out" style="grid-template-rows: 0fr;" aria-labelledby="faq-3">
                            <div class="overflow-hidden">
                                <div class="px-5 pb-5">
                                    <p class="font-body text-sm leading-relaxed text-white">Lorem ipsum dolor sit amet,
                                                                                            consectetur adipisicing
                                                                                            elit. Asperiores dolore
                                                                                            doloremque labore laborum
                                                                                            quidem rerum sint? Assumenda
                                                                                            consectetur doloremque
                                                                                            dolorum impedit modi
                                                                                            recusandae! Aspernatur aut
                                                                                            deserunt dignissimos esse et
                                                                                            exercitationem nostrum
                                                                                            repellendus repudiandae
                                                                                            sapiente vitae.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="faqmst overflow-hidden rounded-lg border border-gray-200 bg-white transition">
                        <h2 id="faq-6">
                            <button type="button" class="faq-accordion-btn flex w-full items-center justify-between gap-4 border-0 bg-transparent px-5 py-5 font-heading text-lg font-semibold text-left text-mst-gray transition [&amp;[aria-expanded='true']]:text-white" data-custom-accordion-target="#faq-body-6" aria-expanded="false" aria-controls="faq-body-6">
                                <span>Can kids and elderly join desert safari?</span>
                                <svg data-accordion-icon="" class="h-5 w-5 shrink-0 transition-transform duration-300 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="faq-body-6" class="grid transition-all duration-300 ease-in-out" style="grid-template-rows: 0fr;" aria-labelledby="faq-6">
                            <div class="overflow-hidden">
                                <div class="px-5 pb-5">
                                    <p class="font-body text-sm leading-relaxed text-white">Lorem ipsum dolor sit amet,
                                                                                            consectetur adipisicing
                                                                                            elit. Asperiores dolore
                                                                                            doloremque labore laborum
                                                                                            quidem rerum sint? Assumenda
                                                                                            consectetur doloremque
                                                                                            dolorum impedit modi
                                                                                            recusandae! Aspernatur aut
                                                                                            deserunt dignissimos esse et
                                                                                            exercitationem nostrum
                                                                                            repellendus repudiandae
                                                                                            sapiente vitae.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="faqmst overflow-hidden rounded-lg border border-gray-200 bg-white transition">
                        <h2 id="faq-7">
                            <button type="button" class="faq-accordion-btn flex w-full items-center justify-between gap-4 border-0 bg-transparent px-5 py-5 font-heading text-lg font-semibold text-left text-mst-gray transition [&amp;[aria-expanded='true']]:text-white" data-custom-accordion-target="#faq-body-7" aria-expanded="false" aria-controls="faq-body-7">
                                <span>What activities are included in desert safari tours?</span>
                                <svg data-accordion-icon="" class="h-5 w-5 shrink-0 transition-transform duration-300 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="faq-body-7" class="grid transition-all duration-300 ease-in-out" style="grid-template-rows: 0fr;" aria-labelledby="faq-7">
                            <div class="overflow-hidden">
                                <div class="px-5 pb-5">
                                    <p class="font-body text-sm leading-relaxed text-white">Lorem ipsum dolor sit amet,
                                                                                            consectetur adipisicing
                                                                                            elit. Asperiores dolore
                                                                                            doloremque labore laborum
                                                                                            quidem rerum sint? Assumenda
                                                                                            consectetur doloremque
                                                                                            dolorum impedit modi
                                                                                            recusandae! Aspernatur aut
                                                                                            deserunt dignissimos esse et
                                                                                            exercitationem nostrum
                                                                                            repellendus repudiandae
                                                                                            sapiente vitae.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="faqmst overflow-hidden rounded-lg border border-gray-200 bg-white transition">
                        <h2 id="faq-8">
                            <button type="button" class="faq-accordion-btn flex w-full items-center justify-between gap-4 border-0 bg-transparent px-5 py-5 font-heading text-lg font-semibold text-left text-mst-gray transition [&amp;[aria-expanded='true']]:text-white" data-custom-accordion-target="#faq-body-8" aria-expanded="false" aria-controls="faq-body-8">
                                <span>Do desert safari tours include hotel pickup?</span>
                                <svg data-accordion-icon="" class="h-5 w-5 shrink-0 transition-transform duration-300 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="faq-body-8" class="grid transition-all duration-300 ease-in-out" style="grid-template-rows: 0fr;" aria-labelledby="faq-8">
                            <div class="overflow-hidden">
                                <div class="px-5 pb-5">
                                    <p class="font-body text-sm leading-relaxed text-white">Lorem ipsum dolor sit amet,
                                                                                            consectetur adipisicing
                                                                                            elit. Asperiores dolore
                                                                                            doloremque labore laborum
                                                                                            quidem rerum sint? Assumenda
                                                                                            consectetur doloremque
                                                                                            dolorum impedit modi
                                                                                            recusandae! Aspernatur aut
                                                                                            deserunt dignissimos esse et
                                                                                            exercitationem nostrum
                                                                                            repellendus repudiandae
                                                                                            sapiente vitae.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="" class="flex items-center justify-center w-fit text-white text-lg px-6 mt-10 pt-3 pb-3 rounded-full
        mx-auto
                                                        bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                                                         hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                                                         transition duration-300 font-heading italic mt-8"> Explore all
                                                                                                            FAQs
            <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>" class="w-5 ms-1" alt="arrow"> </a>
    </div>
</section>

<section class="contactBar pb-5 pt-14 bg-white">
    <div class="container mx-auto">
        <div class="bg-gray-50 rounded-lg p-6 md:p-8 flex flex-col lg:flex-row items-center justify-between gap-6
        w-11/12 mx-auto">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 flex-shrink-0 flex items-center justify-center">
                    <img src="<?php echo e(asset('assets/images/icons/support2.svg')); ?>"
                         class="w-full h-full object-contain"
                         alt="Support">
                </div>
                <div>
                    <h3 class="font-heading italic font-bold text-xl md:text-2xl text-mst-gray">Didn't find your
                        <span class="text-mst">Answer?</span></h3>
                    <p class="font-body text-gray-700 text-sm md:text-sm mt-1">
                        Our Travel specialists are available 24/7 for you.</p>
                </div>
            </div>
            <div class="flex flex-wrap items-center gap-3 md:gap-4 justify-center">
                <!-- Email Button -->
                <a href="#" class="flex items-center gap-2.5 px-6 py-3 bg-white border border-[#EAEAEA]
                hover:border-gray-300 hover:bg-gray-50 transition-all duration-200 rounded-full text-mst-gray
                font-heading font-semibold text-md italic">
                    <img src="<?php echo e(asset('assets/images/icons/email1.svg')); ?>" class="w-5 h-5 object-contain" alt="email">
                    <span>Email Us</span> </a>
                <!-- Call Button -->
                <a href="#" class="flex items-center gap-2.5 px-6 py-3 bg-[#EB001B] hover:bg-red-700 transition-all
                duration-200 rounded-full text-white font-heading font-semibold text-md italic">
                    <img src="<?php echo e(asset('assets/images/icons/call.svg')); ?>" class="w-5 h-5 object-contain" alt="call">
                    <span>Call Now</span> </a>
                <!-- WhatsApp Button -->
                <a href="#" target="_blank" class="flex items-center gap-2.5 px-6 py-3
                 bg-gradient-to-r from-[#2D9D3E] to-[#1E5E28] hover:bg-[#2D9D3E]
                 transition-all duration-200 rounded-full text-white font-heading font-semibold text-md italic">
                    <img src="<?php echo e(asset('assets/images/icons/whatsapp1.svg')); ?>" class="w-5 h-5 object-contain" alt="whatsapp">
                    <span>WhatsApp</span> </a>
            </div>
        </div>
    </div>
</section>

<section class="relatedServices py-12 bg-white">
    <div class="container mx-auto">
        <div>
            <h2 class="font-heading italic font-bold text-3xl text-mst-gray">Related
                <span class="text-mst">Services</span></h2>
            <p class="font-body text-gray-700 mt-2">Quick access to what travelers explore most—making it easier to find
                                                    the right experience without the search</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-5 mt-8">
            <!-- Card 1: Desert Safari -->
            <a href="<?php echo e(url('/desert-safari-tours')); ?>" class="group flex flex-col items-center text-center p-4
             bg-gray-50
            border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-16 h-16 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="<?php echo e(asset('assets/images/icons/desert.svg')); ?>" class="w-full h-full object-contain" alt="Desert Safari">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                                duration-200">Desert <span class="text-mst">Safari</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Experience thrilling desert adventure</p>
            </a>
            <!-- Card 2: Yacht Charter -->
            <a href="<?php echo e(url('/yacht-charter-tours')); ?>" class="group flex flex-col items-center text-center p-4
                         bg-gray-50
                        border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="<?php echo e(asset('assets/images/icons/yacht.svg')); ?>" class="w-full h-full object-contain" alt="Yacht Charter">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                duration-200">Yacht <span class="text-mst">Charter</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Luxury yachts for unforgettable moments</p>
            </a>
            <!-- Card 3: Umrah Packages -->
            <a href="<?php echo e(url('/umrah')); ?>" class="group flex flex-col items-center text-center p-4
                         bg-gray-50
                        border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="<?php echo e(asset('assets/images/icons/umrah.svg')); ?>" class="w-full h-full object-contain" alt="Umrah Packages">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                duration-200">Umrah <span class="text-mst">Packages</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Spiritual journeys made easy</p>
            </a>
            <!-- Card 4: UAE Visa -->
            <a href="<?php echo e(url('/uae-visa')); ?>" class="group flex flex-col items-center text-center p-4
                         bg-gray-50
                        border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="<?php echo e(asset('assets/images/icons/visa.svg')); ?>" class="w-full h-full object-contain" alt="UAE Visa">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                duration-200">UAE <span class="text-mst">Visa</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Hassle-free visa support & processing</p>
            </a>
            <!-- Card 5: Abu Dhabi Tours -->
            <a href="<?php echo e(url('/abu-dhabi-tours')); ?>" class="group flex flex-col items-center text-center p-4
                         bg-gray-50
                        border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="<?php echo e(asset('assets/images/icons/abu.svg')); ?>" class="w-full h-full object-contain" alt="Abu Dhabi Tours">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                duration-200">Abu Dhabi <span class="text-mst">Tours</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Explore Abu Dhabi's top attractions</p>
            </a>
            <!-- Card 6: Holiday Packages -->
            <a href="<?php echo e(url('/holiday-packages')); ?>" class="group flex flex-col items-center text-center p-4
                         bg-gray-50
                        border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="<?php echo e(asset('assets/images/icons/holiday.svg')); ?>" class="w-full h-full object-contain" alt="Holiday Packages">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                duration-200">Holiday <span class="text-mst">Packages</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Perfect getaways for everyone</p>
            </a>
        </div>
    </div>
</section>

<section class="py-14">
    <div class="container mx-auto">
        <h2 class="text-left font-heading text-2xl font-semibold italic leading-tight tracking-tight text-mst-gray">
            <span>Dubai to  </span><span class="text-mst">Abu Dhabi Tours</span>
        </h2>
        <div class="font-body text-center md:text-left text-sm bg-[#FAF7F2] mt-6 p-5 rounded-lg border border-[#BA9B31]/40
                -overflow-y-scroll ddscroll">
            <p>All You Need to Know About Desert Safari in Dubai.</p>
            <p>Have you ever been captivated by the breathtaking scenes of a Dubai Desert Safari in movies or music
               videos? Ever dreamed of feeling the golden sand slip through your fingers, surrounded by endless dunes
               that stretch as far as the eye can see? There’s a reason why the Desert Safari in Dubai is one of the
               most talked-about experiences among tourists—it’s a thrilling adventure that leaves an unforgettable mark
               on every traveler.</p>
            <p>If you’re planning a trip to Dubai, make sure the Dubai Desert Safari is at the top of your itinerary.
               This iconic tour offers a perfect mix of excitement, culture, and natural beauty, making it a must-do
               activity. Whether you’re looking for heart-racing dune bashing, serene camel rides, or mesmerizing desert
               sunsets, a desert safari tour in Dubai delivers it all—and more.</p>
        </div>
    </div>
    <div class="container mx-auto mt-10">
        <h2 class="text-left font-heading text-2xl font-semibold italic leading-tight tracking-tight text-mst-gray">
            <span>Popular  </span><span class="text-mst">Searches</span>
        </h2>
        <p class="text-left font-body mt-2">Quick access to what travelers explore most—making it easier to find the
                                            right experience without the search</p>
        <ul class="flex flex-wrap items-center justify-center gap-3 font-body text-sm
                           bg-[#FAF7F2] mt-6 p-5 rounded-lg border border-[#BA9B31]/40">
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Yacht in Dubai Marina
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Yacht Rental Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Dune Bashing Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Quad Biking Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                VR5 Tasheel Locations
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Desert Safari in Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Ski Dubai Tickets Offer
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Legoland Dubai Tickets
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                The Frame Dubai Tickets
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Umrah By Bus
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Umrah Services Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Theme Park Tickets
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Safari Tour Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Speed Boat Tour
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Yacht for Party
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Online Travel Agency
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Dinner Cruise Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Abu Dhabi City Tour
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Abu Dhabi Tour Packages
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Umrah By Air
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Deep Sea Fishing
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Desert Safari Deals
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Dibba Dhow Cruise
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Tour Operator in Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Umrah From Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Umrah Travel Agency
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Aquaventure Waterpark
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Morning Desert Safari
            </li>
        </ul>
    </div>
</section>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/pages/single-holiday-tour-details.blade.php ENDPATH**/ ?>