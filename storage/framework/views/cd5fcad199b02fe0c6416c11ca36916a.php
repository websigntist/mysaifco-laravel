
<section class="flex justify-between items-center py-12">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] items-center gap-8">
            <div>
                <?php
                    $page_title = "Umrah Travel Agency";
                    $words      = explode(' ', $page_title);
                    $count      = count($words);
                    $spanN      = $count >= 3 ? 2 : 1;
                    $mainText   = implode(' ', array_slice($words, 0, -$spanN));
                    $spanText   = implode(' ', array_slice($words, -$spanN));
                ?>
                <h1 class="text-center md:text-left">
                    <span><?php echo e($mainText); ?> </span><span class="text-mst"><?php echo e($spanText); ?></span>
                </h1>
                <p class="text-[16px] mt-4 text-center md:text-left">Get everything on a single call with Umrah
                                                                     travel agency. Every Muslim
                                            wishes to visit Makkah and Madina at least once in his/her life to perform
                                            Umrah. Keeping this in view, Our main goal is to assist each and every
                                            pilgrim to have a comfortable, safe, and trouble-free journey to perform
                                            Umrah from UAE and UK.
                </p>
                <a href="" class="flex items-center justify-center w-fit text-white text-lg px-5 pt-2 pb-2 rounded-full
                                                                            bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                                                                             hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                                                                             transition duration-300 font-heading
                                                                             italic mt-8 mx-auto md:ms-auto">
                    Get Umrah Details on WhatsApp <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                                                       class="w-5 ms-1"
                                                       alt="arrow"> </a>
            </div>
            <div class="flex items-center justify-end">
                <img src="<?php echo e(asset('assets/images/umrah/umrah-2.webp')); ?>"
                     class="w-full object-cover"
                     alt="umrah">
            </div>
        </div>
    </div>
</section>

<section class="pb-12">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-12 pb-10">
            <h1>
                <span>Umrah Offered </span><span class="text-mst">By</span>
            </h1>
            <p class="mt-5">
                Begin your sacred journey with comfort, trust, and complete guidance. We believe in reliability, quality
                customer service, willingness and dedication to serving you the best umrah packages from Dubai, Abu
                Dhabi & Sharjah.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="md:flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-xl">
                <div class="text-center justify-center md:text-left">
                    <h3 class="text-2xl">Umrah by Bus</h3>
                    <p class="text-sm leading-6 my-4 pe-5">Affordable Umrah by Bus from Dubai and UAE with visa
                                                           assistance, transport, and hotel options. Explore
                                                           budget-friendly Umrah packages designed for individuals,
                                                           families, and groups seeking a comfortable spiritual journey
                                                           to Makkah and Madinah.</p>
                    <a href="#"
                       class="flex items-center justify-center w-fit text-white text-sm px-4 pt-1 pb-2 rounded-full mx-auto md:ms-auto
                               bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Explore Umrah by Bus Packages <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                                                           class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
                <div class="">
                    <img src="<?php echo e(asset('assets/images/umrah/umrah-12.webp')); ?>"
                         alt=""
                         title=""
                         class="max-w-2xl h-auto mx-auto md:ms-auto md:mt-0 mt-5">
                </div>
            </div>
            <div class="md:flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-xl">
                <div class="text-center justify-center md:text-left">
                    <h3 class="text-2xl">Umrah by Air</h3>
                    <p class="text-sm leading-6 my-4 pe-5">Travel with convenience through our Umrah by Air packages
                                                           from UAE, including visa support, flights, accommodation, and
                                                           complete travel assistance. Choose flexible Umrah options
                                                           with trusted guidance for a smooth pilgrimage experience.</p>
                    <a href="#"
                       class="flex items-center justify-center w-fit text-white text-sm px-4 pt-1 pb-2 rounded-full mx-auto md:ms-auto
                               bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        View Umrah by Air Packages <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                                                        class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
                <div class="">
                    <img src="<?php echo e(asset('assets/images/umrah/umrah-13.webp')); ?>"
                         alt=""
                         title=""
                         class="max-w-2xl h-auto mx-auto md:ms-auto md:mt-0 mt-5">
                </div>
            </div>
            <div class="md:flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-xl">
                <div class="text-center justify-center md:text-left">
                    <h3 class="text-2xl">Umrah Visa</h3>
                    <p class="text-sm leading-6 my-4 pe-5">Get fast and reliable Umrah visa assistance from UAE with
                                                           updated requirements, documentation guidance, and support
                                                           throughout the application process. Learn about eligibility,
                                                           processing times, and required documents.</p>
                    <a href="#"
                       class="flex items-center justify-center w-fit text-white text-sm px-4 pt-1 pb-2 rounded-full mx-auto md:ms-auto
                               bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Check Umrah Visa Requirements <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                                                           class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
                <div class="">
                    <img src="<?php echo e(asset('assets/images/umrah/umrah-16.webp')); ?>"
                         alt=""
                         title=""
                         class="max-w-2xl h-auto mx-auto md:ms-auto md:mt-0 mt-5">
                </div>
            </div>
            <div class="md:flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-xl">
                <div class="text-center justify-center md:text-left">
                    <h3 class="text-2xl">Saudi Multiple Entry Visa</h3>
                    <p class="text-sm leading-6 my-4 pe-5">Apply for Saudi multiple entry visa options suitable for
                                                           Umrah, family visits, and business travel to Saudi Arabia.
                                                           Understand visa validity, eligibility criteria, and how
                                                           multiple-entry visas can provide flexible travel
                                                           opportunities.</p>
                    <a href="#"
                       class="flex items-center justify-center w-fit text-white text-sm px-4 pt-1 pb-2 rounded-full mx-auto md:ms-auto
                               bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Explore Saudi Multiple Entry Visa Options
                        <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                             class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
                <div class="">
                    <img src="<?php echo e(asset('assets/images/umrah/umrah-14.webp')); ?>"
                         alt=""
                         title=""
                         class="max-w-2xl h-auto mx-auto md:ms-auto md:mt-0 mt-5">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="flec item-center justify-center pt-14 pb-18">
    <div class="container">
        <div class="mx-auto text-center">
            <h1>
                <span>World Wide </span><span class="text-mst">Umrah Services</span>
            </h1>
            <p class="mt-4 md:w-3xl mx-auto">Our travel agency got 5 star ratings globally for umrah services. We offer
                                          competitive pricing with best customer support available 24/7 over
                                          Whatsapp.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mt-14">
            
            <div class="bg-gray-50 p-8 rounded-xl border-1 border-gray-200 space-y-4">
                <img src="<?php echo e(asset('assets/images/umrah/umrah-3.webp')); ?>" class="mx-auto" alt="img">
                <h5 class="font-heading text-md font-semibold text-center mb-1">Visa Services</h5>
                <p class="font-body text-xs text-center">Avail umrah visa with just a 3 step online process and get an
                                                         approval in the next 48 hours.</p>
            </div>
            
            <div class="bg-gray-50 p-8 rounded-xl border-1 border-gray-200 space-y-4">
                <img src="<?php echo e(asset('assets/images/umrah/umrah-4.webp')); ?>" class="mx-auto" alt="img">
                <h5 class="font-heading text-md font-semibold text-center mb-1">Flights Reservations</h5>
                <p class="font-body text-xs text-center">Booking flights is easy with Saifco Travel – we always have the
                                                         best prices for Umrah Flights.</p>
            </div>
            
            <div class="bg-gray-50 p-8 rounded-xl border-1 border-gray-200 space-y-4">
                <img src="<?php echo e(asset('assets/images/umrah/umrah-5.webp')); ?>" class="mx-auto" alt="img">
                <h5 class="font-heading text-md font-semibold text-center mb-1">Transportation</h5>
                <p class="font-body text-xs text-center">Our agency offers different VIP transportation facility from
                                                         Makkah to Madina and vise versa.</p>
            </div>
            
            <div class="bg-gray-50 p-8 rounded-xl border-1 border-gray-200 space-y-4">
                <img src="<?php echo e(asset('assets/images/umrah/umrah-6.webp')); ?>" class="mx-auto" alt="img">
                <h5 class="font-heading text-md font-semibold text-center mb-1">Hotel Booking</h5>
                <p class="font-body text-xs text-center">Book luxury hotel in best prices as we are in collaboration
                                                         with top hotels in Saudi Arabia.</p>
            </div>
        </div>
    </div>
</section>

<section class="pt-10 pb-30 bg-gray-50">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-12 pb-10">
            <h1>
                <span>Umrah Offered </span><span class="text-mst">By</span>
            </h1>
            <p class="mt-5">
                Begin your sacred journey with comfort, trust, and complete guidance. We believe in reliability, quality
                customer service, willingness and dedication to serving you the best umrah packages from Dubai, Abu
                Dhabi & Sharjah.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
            <div class="space-y-7">
                <div class="py-4 px-6 rounded-xl border border-gray-200 bg-white text-center md:text-left">
                    <h3 class="italic"><span>Clear Scans of  </span><span class="text-mst">Passport Copy</span></h3>
                    <p class="text-[14px] mt-2">Passport should be valid for 6 months and Visa should be valid for
                                                months .</p>
                </div>
                <div class="py-4 px-6 rounded-xl border border-gray-200 bg-white text-center md:text-left">
                    <h3 class="italic"><span>1 Passport   </span><span class="text-mst">Size Photo</span></h3>
                    <p class="text-[14px] mt-2">Passport should be valid for 6 months and Visa should be valid for
                                                months.</p>
                </div>
                <div class="py-4 px-6 rounded-xl border border-gray-200 bg-white text-center md:text-left">
                    <h3 class="italic"><span>National ID   </span><span class="text-mst">Card Copy</span></h3>
                    <p class="text-[14px] mt-2">National ID Card copy (Front & Back)</p>
                </div>
                <div class="py-4 px-6 rounded-xl border border-gray-200 bg-white text-center md:text-left">
                    <h3 class="italic"><span>Processing  </span><span class="text-mst">Time</span></h3>
                    <p class="text-[14px] mt-2">Umrah Visa Processing will take approximately 2-3 working days.</p>
                </div>
            </div>
            <div class="flex items-center justify-end">
                <img src="<?php echo e(asset('assets/images/umrah/umrah-1.webp')); ?>"
                     class="w-full object-cover rounded-xl"
                     alt="umrah">
            </div>
        </div>
    </div>
</section>
<?php echo $__env->make('frontend.components.testimonials', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<section class="flex justify-center items-center">
    <div class="px-4 relative flex md:min-h-[995px]  min-h-[520px] w-full bg-[-250px] bg-cover bg-no-repeat"
         style="background-image: url('<?php echo e(asset('assets/images/umrah/umrah-15.webp')); ?>')">
        <div class="z-10 w-full py-10">
            <div class="container mx-auto">
                <div class="mx-auto max-w-3xl text-center pt-12 pb-10">
                    <h1>
                        <span>Umrah for </span><span class="text-mst">Single Ladies</span>
                    </h1>
                    <p class="mt-5 text-[16px]">Yes, We make this possible for all single ladies to perform umrah
                                                without mahram. Contact us and avail different type of umrah packages
                                                offered from UAE and UK. Our umrah agency make it convenient for single
                                                ladies to visit the Holy Kabba without any hustle.</p>
                    <a href="#"
                       class="flex items-center justify-center mx-auto mt-8 w-44 text-white px-4 pt-2 pb-3
                   rounded-full
                           bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Read More <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                                       class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="flex justify-between items-center py-12 bg-gray-50">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] items-center gap-8">
            <div>
                <h1 class="text-center">
                    <span>How to perform </span><span class="text-mst">Umrah?</span>
                </h1>
                <p class="text-[16px] mt-4 text-center">Learn the step-by-step process of performing Umrah, from the journey to
                                            Mecca to completing the rituals with devotion and reverence.</p>
            </div>
            <div class="flex items-center justify-end">
                <a href="" class="flex items-center justify-center w-fit text-white text-lg px-7 pt-3 pb-3
                rounded-full mx-auto md:ms-auto
                                    bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                                     hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                                     transition duration-300 font-heading italic"> Download Umrah Guide
                    <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                         class="w-5 ms-2 rotate-90"
                         alt="arrow"> </a>
            </div>
        </div>
    </div>
</section>

<section class="pb-12">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-12 pb-10">
            <h1>
                <span>Umrah Offered </span><span class="text-mst">By</span>
            </h1>
            <p class="mt-5">
                Begin your sacred journey with comfort, trust, and complete guidance. We believe in reliability, quality
                customer service, willingness and dedication to serving you the best umrah packages from Dubai, Abu
                Dhabi & Sharjah.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-3xl">
                <div class="text-center">
                    <img src="<?php echo e(asset('assets/images/umrah/umrah-7.webp')); ?>" class="mx-auto mb-4" alt="">
                    <h3 class="text-xl">Umrah from Dubai</h3>
                    <p class="text-sm leading-6 my-4 line-clamp-2">Saifco Travel is a Dubai Based Specialist Umrah
                                                                   Travel Agency providing luxury Umrah packages by Bus
                                                                   and</p>
                    <a href="#"
                       class="flex items-center justify-center w-fit mx-auto text-white text-sm mt-5 px-4 pt-1 pb-2
                       rounded-full
                               bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Learn more <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                                        class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
            </div>
            <div class="flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-3xl">
                <div class="text-center">
                    <img src="<?php echo e(asset('assets/images/umrah/umrah-8.webp')); ?>" class="mx-auto mb-4" alt="">
                    <h3 class="text-xl">Umrah from Abu Dhabi</h3>
                    <p class="text-sm leading-6 my-4 line-clamp-2">Avail best Umrah by bus and air packages from Abu
                                                                   Dhabi. Visa services included in all of the
                                                                   packages.</p>
                    <a href="#"
                       class="flex items-center justify-center w-fit mx-auto text-white text-sm mt-5 px-4 pt-1 pb-2
                                   rounded-full
                                           bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Learn more <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                                        class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
            </div>
            <div class="flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-3xl">
                <div class="text-center">
                    <img src="<?php echo e(asset('assets/images/umrah/umrah-9.webp')); ?>" class="mx-auto mb-4" alt="">
                    <h3 class="text-xl">Umrah from Sharjah</h3>
                    <p class="text-sm leading-6 my-4 line-clamp-2">Our experienced and highest quality services range
                                                                   from just Umrah Visa to a complete Umrah package</p>
                    <a href="#"
                       class="flex items-center justify-center w-fit mx-auto text-white text-sm mt-5 px-4 pt-1 pb-2
                                   rounded-full
                                           bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Learn more <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                                        class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5">
            <div class="flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-3xl">
                <div class="text-center">
                    <img src="<?php echo e(asset('assets/images/umrah/umrah-10.webp')); ?>" class="mx-auto mb-4" alt="">
                    <h3 class="text-xl">VFS Tasheel Locations</h3>
                    <p class="text-sm leading-6 my-4 line-clamp-3">VFS Tasheel International processes visas for the
                                                                   Kingdom of Saudi Arabia. Visas are processed at VFS
                                                                   Tasheel Visa Services Center as mandated by the
                                                                   Ministry of Foreign Affairs, Kingdom of Saudi
                                                                   Arabia.</p>
                    <a href="#"
                       class="flex items-center justify-center w-fit mx-auto text-white text-sm mt-5 px-4 pt-1 pb-2
                               rounded-full
                                       bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Learn more <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                                        class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
            </div>
            <div class="flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-3xl">
                <div class="text-center">
                    <img src="<?php echo e(asset('assets/images/umrah/umrah-11.webp')); ?>" class="mx-auto mb-4" alt="">
                    <h3 class="text-xl">Umrah Vaccination Center</h3>
                    <p class="text-sm leading-6 my-4 line-clamp-3">Every year, millions of Muslims are traveling to
                                                                   Mecca to perform Hajj and Umrah. They are coming from
                                                                   different regions with different age groups. As a
                                                                   result, different health problems may occur if they
                                                                   don’t take preventative.</p>
                    <a href="#"
                       class="flex items-center justify-center w-fit mx-auto text-white text-sm mt-5 px-4 pt-1 pb-2
                                           rounded-full
                                                   bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Learn more <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                                        class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $__env->make('frontend.components.tour_faqs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('frontend.components.explore_dubai', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


<section class="flex justify-between items-center py-12 bg-gray-50 -mb-8">
    <div class="container">
        <div class="text-center">
            <h1 class="">
                <span>Need more </span><span class="text-mst">Information?</span>
            </h1>
            <p class="text-[16px] my-6">Click below to open inquiry form and our team will get back to you within 24
                                        hours.</p>
        </div>
        <div class="flex items-center justify-end">
            <a href="" class="flex items-center mx-auto justify-center w-fit text-white text-lg px-7 pt-3 pb-3
            rounded-full
                                    bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                                     hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                                     transition duration-300 font-heading italic"> Send Inquiry
                <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                     class="w-5 ms-2"
                     alt="arrow"> </a>
        </div>
    </div>
</section>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/pages/includes/umrah.blade.php ENDPATH**/ ?>