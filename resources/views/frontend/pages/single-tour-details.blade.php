@php
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
@endphp
{{-- tour gallery --}}
<section class="tour-detail-gallery pt-8 pb-4">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-[8fr_4fr] gap-6">
            <!-- Left Column: Big image autoplay slider -->
            <div class="relative w-full h-[280px] md:h-[450px] group min-w-0">
                <!-- Swiper Container -->
                <div class="swiper tour-details-swiper rounded-2xl overflow-hidden h-full shadow-sm">
                    <div class="swiper-wrapper">
                        @foreach($galleryImages as $imageUrl)
                            <div class="swiper-slide h-full">
                                <img src="{{ $imageUrl }}" class="w-full h-full object-cover" alt="Gallery Image">
                            </div>
                        @endforeach
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
                        <img src="{{ asset('assets/images/icons/share.svg') }}" class="w-10 h-10" alt="Share">
                    </button>
                    <!-- Heart -->
                    <button class="cursor-pointer shadow-md" title="Wishlist">
                        <img src="{{ asset('assets/images/icons/heart.svg') }}" class="w-10 h-10" alt="Wishlist">
                    </button>
                    <!-- Three Dots -->
                    <button class="cursor-pointer shadow-md" title="More">
                        <img src="{{ asset('assets/images/icons/more.svg') }}" class="w-10 h-10" alt="More">
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
                    <img src="{{ $galleryImages[1] ?? ($galleryImages[0] ?? asset('assets/images/sliders/tourbanner1.webp')) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Gallery Image 1">
                </div>
                <!-- Grid Image 2 -->
                <div class="gallery-grid-item relative aspect-square overflow-hidden rounded-2xl border border-gray-100 shadow-xs group cursor-pointer" data-index="2">
                    <img src="{{ $galleryImages[2] ?? ($galleryImages[0] ?? asset('assets/images/sliders/tourbanner1.webp')) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Gallery Image 2">
                </div>
                <!-- Grid Image 3 -->
                <div class="gallery-grid-item relative aspect-square overflow-hidden rounded-2xl border border-gray-100 shadow-xs group cursor-pointer" data-index="3">
                    <img src="{{ $galleryImages[3] ?? ($galleryImages[0] ?? asset('assets/images/sliders/tourbanner1.webp')) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Gallery Image 3">
                </div>
                <!-- Grid Image 4 (with +X remaining overlay) -->
                <div class="gallery-grid-item relative aspect-square overflow-hidden rounded-2xl border border-gray-100 shadow-xs group cursor-pointer" data-index="4">
                    <img src="{{ $galleryImages[4] ?? ($galleryImages[0] ?? asset('assets/images/sliders/tourbanner1.webp')) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="Gallery Image 4">
                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center z-15 hover:bg-black/30 transition duration-300">
                        <span class="font-heading font-normal text-3xl md:text-4xl text-white">+{{ $remainingCount > 0 ? $remainingCount : 10 }}</span>
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
{{-- tour details --}}
<section class="tour__details py-4">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-[8fr_4fr] gap-6">
            {{-- left column --}}
            <div class="leftSide__column">
                <!-- Breadcrumbs -->
                <div class="text-sm text-mst-gray font-heading mb-2 flex items-center gap-1.5 select-none">
                    <a href="{{ url('/') }}" class="hover:text-mst transition">Home</a>
                    <svg class="w-2.5 h-2.5 text-mst" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <a href="#" class="hover:text-mst transition">UAE Tours</a>
                    <svg class="w-2.5 h-2.5 text-mst" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-mst font-medium">Abu Dhabi Tours</span>
                </div>
                <!-- Tour Title -->
                <h2 class="my-5">
                    Abu Dhabi <span class="text-mst">City Tour</span>
                </h2>
                <!-- Rating -->
                <div class="flex items-center gap-2 mt-2 select-none">
                    <div class="flex gap-0.5 text-amber-400 text-md">
                        ★ ★ ★ ★ ★
                    </div>
                    <span class="text-xs md:text-sm font-body text-gray-500"><strong class="text-gray-800 font-bold">(4.9/5)</strong> 2.4K Reviews</span>
                </div>
                <!-- Specifications List -->
                <div class="grid grid-cols-2 sm:grid-cols-5 gap-4 mt-6 border-t border-gray-200 py-5">
                    <!-- Spec item 1 -->
                    <div class="flex items-center gap-2.5">
                        <div class="flex items-center justify-center flex-shrink-0">
                            <img src="{{ asset('assets/images/icons/tag.svg') }}" class="object-contain" alt="">
                        </div>
                        <div>
                            <div class="text-xs text-mst-gray leading-none">Starting From</div>
                            <div class="text-sm font-bold text-gray-800 mt-1">
                                AED 125<span class="text-xs font-normal text-gray-400">/person</span>
                            </div>
                        </div>
                    </div>
                    <!-- Spec item 2 -->
                    <div class="flex items-center gap-2.5">
                        <div class="flex items-center justify-center flex-shrink-0">
                            <img src="{{ asset('assets/images/icons/redpin.svg') }}" class="object-contain" alt="">
                        </div>
                        <div>
                            <div class="text-xs text-mst-gray leading-none">Tour Location</div>
                            <div class="text-sm font-bold text-gray-800 mt-1">Abu Dhabi Tours</div>
                        </div>
                    </div>
                    <!-- Spec item 3 -->
                    <div class="flex items-center gap-2.5">
                        <div class="flex items-center justify-center flex-shrink-0">
                            <img src="{{ asset('assets/images/icons/3dclock.svg') }}" class="object-contain" alt="">
                        </div>
                        <div>
                            <div class="text-xs text-mst-gray leading-none">Tour Duration</div>
                            <div class="text-sm font-bold text-gray-800 mt-1">10 Hours</div>
                        </div>
                    </div>
                    <!-- Spec item 4 -->
                    <div class="flex items-center gap-2.5">
                        <div class="flex items-center justify-center flex-shrink-0">
                            <img src="{{ asset('assets/images/icons/gr3.svg') }}" class="object-contain" alt="">
                        </div>
                        <div>
                            <div class="text-xs text-mst-gray leading-none">Max People</div>
                            <div class="text-sm font-bold text-gray-800 mt-1">150</div>
                        </div>
                    </div>
                    <!-- Spec item 5 -->
                    <div class="flex items-center gap-2.5">
                        <div class="flex items-center justify-center flex-shrink-0">
                            <img src="{{ asset('assets/images/icons/min-age.svg') }}" class="object-contain"
                                 alt="">
                        </div>
                        <div>
                            <div class="text-xs text-mst-gray leading-none">Min Age</div>
                            <div class="text-sm font-bold text-gray-800 mt-1">N/A</div>
                        </div>
                    </div>
                </div>
                <!-- Tabs Buttons -->
                <div class="flex items-center gap-3 mt-6">
                    <button class="bg-[#BA9B31] text-white px-5 py-2 rounded-full font-heading italic font-bold text-sm shadow-xs transition duration-300" data-target="#tab-panel-description">
                        Description
                    </button>
                    <button class="bg-white text-mst-gray border border-gray-200 hover:border-[#BA9B31] hover:text-[#BA9B31] px-5 py-2 rounded-full font-heading italic font-bold text-sm transition duration-300" data-target="#tab-panel-itinerary">
                        Itinerary
                    </button>
                    <button class="bg-white text-mst-gray border border-gray-200 hover:border-[#BA9B31] hover:text-[#BA9B31] px-5 py-2 rounded-full font-heading italic font-bold text-sm transition duration-300" data-target="#tab-panel-reviews">
                        Reviews
                    </button>
                </div>
                <!-- Tab Panel: Description -->
                <div id="tab-panel-description" class="tab-panel space-y-8">
                    <!-- Tour Overview -->
                    <div class="mt-8 space-y-4">
                        <h3 class="font-heading italic text-xl md:text-2xl font-bold text-gray-800">
                            Tour <span class="text-mst">Overview</span>
                        </h3>
                        <div class="text-mst-gray leading-relaxed space-y-4">
                            <p>
                                Marvel the beauty of the United Arab Emirates' capital - Abu Dhabi. Also known as one of
                                the riches cities in the middle east and world's largest producer of oil. House of the
                                world's most expensive hotel is the famous Emirates Palace. This amazing tour starts
                                with a pick up from your hotel, approximately 2 hours drive towards south.
                            </p>
                            <p>
                                On the way to Abu Dhabi you will pass through an industrial area called Jebel Ali free
                                zone. Once you reach Abu Dhabi's border you will see several stunning plantations all
                                along the wayside and superb villages in the city. First stop will be at Sheikh Zayed
                                Grand Mosque, the 3rd largest Mosque in the world and one of the best architectural
                                landmarks of the capital. The mosque also features an exceptional collection of marble
                                works and the largest carpet in the world designed by Iranian artists.
                            </p>
                            <p>
                                You will see the Cultural Foundation, not far from it close walk to 'Qasr Al Hosn'
                                (meaning 'White Fort'-The oldest stone building in the city). Continue the drive to
                                admire the panoramic view of the Al Bateen District where the 'Presidential Palace' is
                                situated. A visit to Heritage Village will follow.
                            </p>
                            <p>
                                Moving on to the next stop toward the breakwater and get a chance to capture the city's
                                skyline and probably take a snack or lunch then drive ahead towards Abu Dhabi Corniche.
                                On the way back to Dubai by pass through Abudhabi Yas Island and Formula-1 racing
                                circuit on with a memorable memories.
                            </p>
                        </div>
                        <a href="#" class="inline-block text-[#BA9B31] font-semibold text-sm hover:underline mt-2">Read
                                                                                                                   More</a>
                    </div>
                    <!-- Policies Section -->
                    <div class="">
                        <h3 class="mb-6">
                            Cancellation, Amendment & <span class="text-mst">Refund Policy</span>
                        </h3>
                        <ul class="space-y-4 text-sm">
                            <li class="flex items-start gap-3">
                                <img src="{{ asset('assets/images/icons/checkcircle.svg') }}" alt=""> 100% refund for
                                                                                                      cancellations made
                                                                                                      72 hours or more
                                                                                                      before the start
                                                                                                      time of the tour
                                                                                                      (excluding the 4%
                                                                                                      payment gateway
                                                                                                      fee).
                            </li>
                            <li class="flex items-start gap-3">
                                <img src="{{ asset('assets/images/icons/checkcircle.svg') }}" alt=""> 50% refund for
                                                                                                      cancellations made
                                                                                                      between 48 to 72
                                                                                                      hours before the
                                                                                                      tour start time
                                                                                                      (excluding the 4%
                                                                                                      payment gateway
                                                                                                      fee).
                            </li>
                            <li class="flex items-start gap-3">
                                <img src="{{ asset('assets/images/icons/checkcircle.svg') }}" alt=""> No refund for
                                                                                                      cancellations made
                                                                                                      less than 48 hours
                                                                                                      before the tour,
                                                                                                      or for no-shows.
                            </li>
                            <li class="flex items-start gap-3">
                                <img src="{{ asset('assets/images/icons/checkcircle.svg') }}" alt=""> Once a tour or
                                                                                                      service has
                                                                                                      started, or if any
                                                                                                      part of a package
                                                                                                      has been utilized,
                                                                                                      no refunds will be
                                                                                                      provided.
                            </li>
                            <li class="flex items-start gap-3">
                                <img src="{{ asset('assets/images/icons/checkcircle.svg') }}" alt="">
                                <strong class="text-gray-800 font-bold">Important Note:</strong> A 4% payment gateway
                                                                                                 fee applies to all
                                                                                                 online payments. This
                                                                                                 fee is non-refundable
                                                                                                 in all cases.
                            </li>
                            <li class="flex items-start gap-3">
                                <img src="{{ asset('assets/images/icons/checkcircle.svg') }}" alt="">
                                <strong class="text-gray-800 font-bold">Process:</strong> Any eligible refunds will be
                                                                                          processed within 7 working
                                                                                          days from the date of
                                                                                          cancellation. The final
                                                                                          refunded amount will depend on
                                                                                          the above terms, minus the
                                                                                          non-refundable gateway fee.
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Tab Panel: Itinerary -->
                <div id="tab-panel-itinerary" class="tab-panel hidden space-y-8">
                    <div class="mt-8 space-y-4">
                        <h3 class="font-heading italic text-xl md:text-2xl font-bold text-gray-800">
                            Tour <span class="text-mst">Itinerary</span>
                        </h3>
                        <div class="relative border-l border-dashed border-[#BA9B31] ml-4 pl-8 space-y-8 mt-6">
                            <!-- Milestone 1 -->
                            <div class="relative">
                                <div class="absolute -left-[41px] top-0 w-6 h-6 rounded-full bg-[#BA9B31] border-4 border-white flex items-center justify-center shadow-xs"></div>
                                <div>
                                    <span class="inline-block bg-[#FFF9E6] text-[#BA9B31] text-[10px] font-bold px-2 py-0.5 rounded-md uppercase">08:30 AM</span>
                                    <h4 class="font-heading font-bold text-sm md:text-base text-gray-800 mt-1">Pickup
                                                                                                               &amp;
                                                                                                               Drive to
                                                                                                               Abu
                                                                                                               Dhabi</h4>
                                    <p class="text-xs md:text-sm text-gray-500 mt-1 leading-relaxed">
                                        Convenient pickup from your Dubai hotel or a central location. Begin a scenic
                                        2-hour drive south passing by the industrial hub of Jebel Ali Free Zone.
                                    </p>
                                </div>
                            </div>
                            <!-- Milestone 2 -->
                            <div class="relative">
                                <div class="absolute -left-[41px] top-0 w-6 h-6 rounded-full bg-[#BA9B31] border-4 border-white flex items-center justify-center shadow-xs"></div>
                                <div>
                                    <span class="inline-block bg-[#FFF9E6] text-[#BA9B31] text-[10px] font-bold px-2 py-0.5 rounded-md uppercase">10:30 AM</span>
                                    <h4 class="font-heading font-bold text-sm md:text-base text-gray-800 mt-1">Sheikh
                                                                                                               Zayed
                                                                                                               Grand
                                                                                                               Mosque
                                                                                                               Visit</h4>
                                    <p class="text-xs md:text-sm text-gray-500 mt-1 leading-relaxed">
                                        Explore one of the largest mosques in the world. Admire the stunning marble
                                        architecture, massive hand-knotted Iranian carpet, and Swarovski crystal
                                        chandeliers.
                                    </p>
                                </div>
                            </div>
                            <!-- Milestone 3 -->
                            <div class="relative">
                                <div class="absolute -left-[41px] top-0 w-6 h-6 rounded-full bg-[#BA9B31] border-4 border-white flex items-center justify-center shadow-xs"></div>
                                <div>
                                    <span class="inline-block bg-[#FFF9E6] text-[#BA9B31] text-[10px] font-bold px-2 py-0.5 rounded-md uppercase">01:00 PM</span>
                                    <h4 class="font-heading font-bold text-sm md:text-base text-gray-800 mt-1">
                                        Sightseeing: Palace &amp; Fort</h4>
                                    <p class="text-xs md:text-sm text-gray-500 mt-1 leading-relaxed">
                                        Panoramic drive by the Al Bateen district, Qasr Al Hosn (the historic White
                                        Fort), and the impressive Presidential Palace (Qasr Al Watan).
                                    </p>
                                </div>
                            </div>
                            <!-- Milestone 4 -->
                            <div class="relative">
                                <div class="absolute -left-[41px] top-0 w-6 h-6 rounded-full bg-[#BA9B31] border-4 border-white flex items-center justify-center shadow-xs"></div>
                                <div>
                                    <span class="inline-block bg-[#FFF9E6] text-[#BA9B31] text-[10px] font-bold px-2 py-0.5 rounded-md uppercase">02:30 PM</span>
                                    <h4 class="font-heading font-bold text-sm md:text-base text-gray-800 mt-1">Heritage
                                                                                                               Village
                                                                                                               &amp;
                                                                                                               Corniche
                                                                                                               Stop</h4>
                                    <p class="text-xs md:text-sm text-gray-500 mt-1 leading-relaxed">
                                        Experience the traditional desert lifestyle at Heritage Village. Enjoy lunch or
                                        snacks along the Abu Dhabi Corniche waterfront with skyline views.
                                    </p>
                                </div>
                            </div>
                            <!-- Milestone 5 -->
                            <div class="relative">
                                <div class="absolute -left-[41px] top-0 w-6 h-6 rounded-full bg-[#BA9B31] border-4 border-white flex items-center justify-center shadow-xs"></div>
                                <div>
                                    <span class="inline-block bg-[#FFF9E6] text-[#BA9B31] text-[10px] font-bold px-2 py-0.5 rounded-md uppercase">04:30 PM</span>
                                    <h4 class="font-heading font-bold text-sm md:text-base text-gray-800 mt-1">Yas
                                                                                                               Island
                                                                                                               &amp;
                                                                                                               Dubai
                                                                                                               Return</h4>
                                    <p class="text-xs md:text-sm text-gray-500 mt-1 leading-relaxed">
                                        Drive past the Formula-1 Yas Marina Circuit and Ferrari World on Yas Island.
                                        Head back to Dubai with unforgettable memories.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab Panel: Reviews -->
                <div id="tab-panel-reviews" class="tab-panel hidden space-y-8">
                    <div class="mt-8 space-y-4">
                        <h3>
                            Customer <span class="text-mst">Reviews</span>
                        </h3>
                        <div class="space-y-4 mt-6">
                            <!-- Review 1 -->
                            <div class="border border-gray-200 rounded-xl p-4 shadow-xs space-y-2">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center font-bold text-xs text-mst-gray">
                                            SJ
                                        </div>
                                        <div>
                                            <h5 class="text-sm font-bold text-gray-800">Sarah Jenkins</h5>
                                            <span class="text-xs text-gray-600">Verified Traveler • May 2026</span>
                                        </div>
                                    </div>
                                    <div class="text-amber-400 text-md select-none">★ ★ ★ ★ ★</div>
                                </div>
                                <p class="text-sm font-semibold text-gray-800">"Amazing experience!"</p>
                                <p class="text-xs text-gray-600">
                                    The tour was perfectly organized. Sheikh Zayed Mosque is a must-see. The guide was
                                    incredibly helpful and gave us plenty of time for photos. Highly recommend Saifco!
                                </p>
                            </div>
                            <!-- Review 2 -->
                            <div class="border border-gray-200 rounded-xl p-4 shadow-xs space-y-2">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center font-bold text-xs text-mst-gray">
                                            MD
                                        </div>
                                        <div>
                                            <h5 class="text-sm font-bold text-gray-800">Marc Dubois</h5>
                                            <span class="text-xs text-gray-600">Verified Traveler • Apr 2026</span>
                                        </div>
                                    </div>
                                    <div class="text-amber-400 text-md select-none">★ ★ ★ ★ ★</div>
                                </div>
                                <p class="text-sm font-semibold text-gray-800">"Incredible architecture and history"</p>
                                <p class="text-xs text-gray-600">
                                    Our tour guide was very knowledgeable. We learned a lot about Abu Dhabi's history.
                                    The pickup was exactly on time and the vehicle was very comfortable and clean.
                                </p>
                            </div>
                            <!-- Review 3 -->
                            <div class="border border-gray-200 rounded-xl p-4 shadow-xs space-y-2">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center font-bold text-xs text-mst-gray">
                                            RS
                                        </div>
                                        <div>
                                            <h5 class="text-sm font-bold text-gray-800">Rahul Sharma</h5>
                                            <span class="text-xs text-gray-600">Verified Traveler • Mar 2026</span>
                                        </div>
                                    </div>
                                    <div class="text-amber-400 text-md select-none">★ ★ ★ ★ ☆</div>
                                </div>
                                <p class="text-xs font-semibold text-gray-800">"Highly recommended tour"</p>
                                <p class="text-xs text-gray-600">
                                    Very comfortable bus ride. The itinerary covers all the major attractions. Driver
                                    was very polite. Wish we had a bit more time at Heritage Village, but overall great
                                    value.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- right column --}}
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
                                <div class="text-sm font-heading font-bold text-mst-gray">Select Date</div>
                            </div>
                        </div>
                        <div class="relative">
                            <div class="w-full flex items-center justify-between border border-gray-200 rounded-xl px-4 py-3 text-mst-gray cursor-pointer">
                                <div class="flex items-center gap-2.5 w-full">
                                    <img src="{{ asset('assets/images/icons/3dcalender.svg') }}" class="object-contain flex-shrink-0 pointer-events-none" alt="">
                                    <input type="date" id="booking-tour-date" class="font-body text-sm font-medium
                                    focus:outline-none bg-transparent w-full cursor-pointer text-mst-gray" required>
                                </div>
                                <svg class="w-3.5 h-3.5 text-gray-400 flex-shrink-0 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <!-- STEP 2 -->
                    <div class="space-y-2">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-9 pb-1 rounded-full italic font-heading
                                                         bg-gradient-to-r from-mst to-mst-dark
                                                         text-white flex items-center justify-center text-xl flex-shrink-0 select-none">
                                2
                            </div>
                            <div>
                                <div class="text-xs font-medium text-mst leading-none">STEP 2</div>
                                <div class="text-sm font-heading font-bold text-mst-gray">Select Starting Time</div>
                            </div>
                        </div>
                        <div class="relative">
                            <select id="booking-tour-time" class="w-full appearance-none border border-gray-200
                            rounded-xl px-4 py-3 text-sm font-medium focus:outline-none focus:border-[#BA9B31]
                            cursor-pointer text-mst-gray">
                                <option value="">Please select the date first</option>
                                <option value="09:00 AM">09:00 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="02:00 PM">02:00 PM</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-gray-400">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <!-- STEP 3 -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-2.5 mb-2">
                            <div class="w-8 h-9 pb-1 rounded-full italic font-heading
                                                         bg-gradient-to-r from-mst to-mst-dark
                                                         text-white flex items-center justify-center text-xl flex-shrink-0 select-none">
                                3
                            </div>
                            <div>
                                <div class="text-xs font-medium text-mst leading-none">STEP 3</div>
                                <div class="text-sm font-heading font-bold text-mst-gray">Number of Guests</div>
                            </div>
                        </div>
                        <div class="space-y-3 pl-1">
                            <!-- Adults -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('assets/images/icons/user2.svg') }}" class="object-contain" alt="">
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
                                    <img src="{{ asset('assets/images/icons/user2.svg') }}" class="object-contain" alt="">
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
                                    <img src="{{ asset('assets/images/icons/user2.svg') }}" class="object-contain" alt="">
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
                    <!-- STEP 4 -->
                    <div class="space-y-3">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-9 pb-1 rounded-full italic font-heading
                                                         bg-gradient-to-r from-mst to-mst-dark
                                                         text-white flex items-center justify-center text-xl flex-shrink-0 select-none">
                                4
                            </div>
                            <div>
                                <div class="text-xs font-medium text-mst leading-none">STEP 4</div>
                                <div class="text-sm font-heading font-bold text-mst-gray">Add On / Extra Services
                                    <span class="text-xs text-gray-400 font-normal">(Optional)</span></div>
                            </div>
                        </div>
                        <div class="text-xs texmst-t-gray ms-10 -mt-2 leading-tight select-none">
                            Enhance your experiences by adding extra services
                        </div>
                        <div class="mt-4 space-y-3 pl-1">
                            <!-- Add-on 1 -->
                            <div class="border border-gray-200 rounded-xl p-4 space-y-3">
                                <div class="flex justify-between gap-3 relative">
                                    <div class="items-start w-45">
                                        <div class="text-sm font-semibold text-mst-gray mb-3">Services</div>
                                        <div class="flex gap-2">
                                            <input type="checkbox" class="addon-checkbox mt-1 w-5 h-5 rounded-md border border-gray-300 bg-white checked:bg-[#282828] checked:border-[#282828] appearance-none cursor-pointer flex items-center justify-center flex-shrink-0 after:content-[''] after:hidden checked:after:block after:w-1.5 after:h-2.5 after:border-r-2 after:border-b-2 after:border-white after:rotate-45 after:-translate-y-[1px]" data-id="1" data-price="100" checked>
                                            <div>
                                                <div class="text-xs text-mst-gray leading-tight">
                                                    Add 30 mins Quad Bike Ride (Inside the Fence)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-20">
                                        <div class="text-sm font-semibold text-mst-gray mb-3">Price (AED)</div>
                                        <div class="text-xs text-mst mt-4 flex justify-center me-3">
                                            100
                                        </div>
                                    </div>
                                    <div class="w-20">
                                        <div class="text-sm font-semibold text-mst-gray mb-3 ms-2">Quantity</div>
                                        <div class="flex items-center gap-2 border border-gray-200 rounded-lg
                                        px-1.5 py-0.5 select-none justify-between">
                                            <button type="button" class="flex items-center justify-center text-mst text-md addon-dec" data-id="1">
                                                -
                                            </button>
                                            <span class="w-4 text-center text-xs font-bold text-mst-gray addon-qty"
                                                  id="addon-1-qty">2</span>
                                            <button type="button" class="flex items-center justify-center text-mst text-md addon-inc" data-id="1">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                    <div class="w-10">
                                        <div class="text-sm font-semibold text-mst-gray mb-3">Total</div>
                                        <div class="text-xs text-mst mt-4 text-rightselect-none flex justify-center">
                                            <span id="addon-1-total">200</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Nested Guests breakdown -->
                                <div class="pt-3 border-t border-gray-200 items-center select-none space-y-3">
                                    <!-- Adults -->
                                    <div>
                                        <div class="flex items-center justify-between gap-2.5">
                                            <div class="flex item-center gap-3">
                                                <img src="{{ asset('assets/images/icons/user2.svg') }}" class="object-contain" alt="">
                                                <span class="text-sm font-semibold text-mst-gray mt-2">Adults</span>
                                            </div>
                                            <span class="font-bold text-[14px] text-gray-800 px-4 rounded-md border
                                            border-gray-300" id="addon-1-adults">2</span>
                                        </div>
                                    </div>
                                    <!-- Children -->
                                    <div>
                                        <div class="flex items-center justify-between gap-2.5">
                                            <div class="flex item-center gap-3">
                                                <img src="{{ asset('assets/images/icons/user2.svg') }}" class="object-contain" alt="">
                                                <span class="text-sm font-semibold text-mst-gray mt-2">Children</span>
                                            </div>
                                            <span class="font-bold text-[14px] text-gray-800 px-4 rounded-md border
                                                                                        border-gray-300" id="addon-1-adults">2</span>
                                        </div>
                                    </div>
                                    <!-- Infant -->
                                    <div>
                                        <div class="flex items-center justify-between gap-2.5">
                                            <div class="flex item-center gap-3">
                                                <img src="{{ asset('assets/images/icons/user2.svg') }}" class="object-contain" alt="">
                                                <span class="text-sm font-semibold text-mst-gray mt-2">Infant</span>
                                            </div>
                                            <span class="font-bold text-[14px] text-gray-800 px-4 rounded-md border
                                                                                        border-gray-300" id="addon-1-adults">2</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add-on 2 -->
                            <div class="border border-gray-200 rounded-xl p-4 space-y-3">
                                <div class="flex justify-between gap-3 relative">
                                    <div class="items-start w-45">
                                        <div class="flex gap-2">
                                            <input type="checkbox" class="addon-checkbox mt-1 w-5 h-5 rounded-md border border-gray-300 bg-white checked:bg-[#282828] checked:border-[#282828] appearance-none cursor-pointer flex items-center justify-center flex-shrink-0 after:content-[''] after:hidden checked:after:block after:w-1.5 after:h-2.5 after:border-r-2 after:border-b-2 after:border-white after:rotate-45 after:-translate-y-[1px]" data-id="2" data-price="150">
                                            <div>
                                                <div class="text-xs text-mst-gray leading-tight">
                                                    Add 30 mins Quad Bike Ride (Open Desert)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-20">
                                        <div class="text-xs text-mst mt-2 flex justify-center me-3">
                                            150
                                        </div>
                                    </div>
                                    <div class="w-20">
                                        <div class="flex items-center gap-2 border border-gray-200 rounded-lg
                                                                    px-1.5 py-0.5 select-none justify-between">
                                            <button type="button" class="flex items-center justify-center text-mst
                                            text-md addon-dec" data-id="2">
                                                -
                                            </button>
                                            <span class="w-4 text-center text-xs font-bold text-mst-gray addon-qty"
                                                  id="addon-2-qty">1</span>
                                            <button type="button" class="flex items-center justify-center text-mst
                                            text-md addon-inc" data-id="2">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                    <div class="w-10">
                                        <div class="text-xs text-mst mt-2 text-rightselect-none flex justify-center">
                                            <span id="addon-2-total">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add-on 3 -->
                            <div class="border border-gray-200 rounded-xl p-4 space-y-3">
                                <div class="flex justify-between gap-3 relative">
                                    <div class="items-start w-45">
                                        <div class="flex gap-2">
                                            <input type="checkbox" class="addon-checkbox mt-1 w-5 h-5 rounded-md
                                            border border-gray-300 bg-white checked:bg-[#282828]
                                            checked:border-[#282828] appearance-none cursor-pointer flex items-center justify-center flex-shrink-0 after:content-[''] after:hidden checked:after:block after:w-1.5 after:h-2.5 after:border-r-2 after:border-b-2 after:border-white after:rotate-45 after:-translate-y-[1px]" data-id="3" data-price="250">
                                            <div>
                                                <div class="text-xs text-mst-gray leading-tight">
                                                    Add 30 mins Quad Bike Ride (Open Desert)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-20">
                                        <div class="text-xs text-mst mt-2 flex justify-center me-3">
                                            250
                                        </div>
                                    </div>
                                    <div class="w-20">
                                        <div class="flex items-center gap-2 border border-gray-200 rounded-lg
                                                                                                px-1.5 py-0.5 select-none justify-between">
                                            <button type="button" class="flex items-center justify-center text-mst
                                                                        text-md addon-dec" data-id="3">
                                                -
                                            </button>
                                            <span class="w-4 text-center text-xs font-bold text-mst-gray addon-qty"
                                                  id="addon-3-qty">1</span>
                                            <button type="button" class="flex items-center justify-center text-mst
                                                                        text-md addon-inc" data-id="3">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                    <div class="w-10">
                                        <div class="text-xs text-mst mt-2 text-rightselect-none flex justify-center">
                                            <span id="addon-3-total">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add-on 4 -->
                            <div class="border border-gray-200 rounded-xl p-4 space-y-3">
                                <div class="flex justify-between gap-3 relative">
                                    <div class="items-start w-45">
                                        <div class="flex gap-2">
                                            <input type="checkbox" class="addon-checkbox mt-1 w-5 h-5 rounded-md
                                                border border-gray-300 bg-white checked:bg-[#282828]
                                                checked:border-[#282828] appearance-none
                                                cursor-pointer flex items-center
                                                justify-center flex-shrink-0 after:content-[''] after:hidden checked:after:block after:w-1.5 after:h-2.5 after:border-r-2 after:border-b-2 after:border-white after:rotate-45 after:-translate-y-[1px]" data-id="4" data-price="350">
                                            <div>
                                                <div class="text-xs text-mst-gray leading-tight">
                                                    Add 30 mins Quad Bike Ride (Open Desert)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-20">
                                        <div class="text-xs text-mst mt-2 flex justify-center me-3">
                                            350
                                        </div>
                                    </div>
                                    <div class="w-20">
                                        <div class="flex items-center gap-2 border border-gray-200 rounded-lg px-1.5 py-0.5 select-none justify-between">
                                            <button type="button" class="flex items-center justify-center text-mst text-md addon-dec" data-id="4">
                                                -
                                            </button>
                                            <span class="w-4 text-center text-xs font-bold text-mst-gray addon-qty" id="addon-4-qty">1</span>
                                            <button type="button" class="flex items-center justify-center text-mst text-md addon-inc" data-id="4">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                    <div class="w-10">
                                        <div class="text-xs text-mst mt-2 text-rightselect-none flex justify-center">
                                            <span id="addon-4-total">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add-on 5 -->
                            <div class="border border-gray-200 rounded-xl p-4 space-y-3">
                                <div class="flex justify-between gap-3 relative">
                                    <div class="items-start w-45">
                                        <div class="flex gap-2">
                                            <input type="checkbox" class="addon-checkbox mt-1 w-5 h-5 rounded-md
                                                                            border border-gray-300 bg-white checked:bg-[#282828]
                                                                            checked:border-[#282828] appearance-none
                                                                            cursor-pointer flex items-center
                                                                            justify-center flex-shrink-0
                                                                            after:content-[''] after:hidden
                                                                            checked:after:block after:w-1.5 after:h-2 .5 after:border-r-2 after:border-b-2 after:border-white after:rotate-45 after:-translate-y-[1px]" data-id="5" data-price="400">
                                            <div>
                                                <div class="text-xs text-mst-gray leading-tight">
                                                    Add 30 mins Quad Bike Ride (Open Desert)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-20">
                                        <div class="text-xs text-mst mt-2 flex justify-center me-3">
                                            400
                                        </div>
                                    </div>
                                    <div class="w-20">
                                        <div class="flex items-center gap-2 border border-gray-200 rounded-lg px-1.5 py-0.5 select-none justify-between">
                                            <button type="button" class="flex items-center justify-center text-mst
                                            text-md addon-dec" data-id="5">
                                                -
                                            </button>
                                            <span class="w-4 text-center text-xs font-bold text-mst-gray addon-qty"
                                                  id="addon-5-qty">1</span>
                                            <button type="button" class="flex items-center justify-center text-mst
                                            text-md addon-inc" data-id="5">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                    <div class="w-10">
                                        <div class="text-xs text-mst mt-2 text-rightselect-none flex justify-center">
                                            <span id="addon-5-total">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add-on 6 -->
                            <div class="border border-gray-200 rounded-xl p-4 space-y-3">
                                <div class="flex justify-between gap-3 relative">
                                    <div class="items-start w-45">
                                        <div class="flex gap-2">
                                            <input type="checkbox" class="addon-checkbox mt-1 w-5 h-5 rounded-md
                                                                        border border-gray-300 bg-white checked:bg-[#282828]
                                                                        checked:border-[#282828] appearance-none
                                                                        cursor-pointer flex items-center
                                                                        justify-center flex-shrink-0
                                                                        after:content-[''] after:hidden checked:after:block after:w-1.5 after:h-2.5 after:border-r-2 after:border-b-2 after:border-white after:rotate-45 after:-translate-y-[1px]" data-id="6" data-price="550">
                                            <div>
                                                <div class="text-xs text-mst-gray leading-tight">
                                                    Add 30 mins Quad Bike Ride (Open Desert)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-20">
                                        <div class="text-xs text-mst mt-2 flex justify-center me-3">
                                            550
                                        </div>
                                    </div>
                                    <div class="w-20">
                                        <div class="flex items-center gap-2 border border-gray-200 rounded-lg
                                                                                                                            px-1.5 py-0.5 select-none justify-between">
                                            <button type="button" class="flex items-center justify-center text-mst text-md addon-dec" data-id="6">
                                                -
                                            </button>
                                            <span class="w-4 text-center text-xs font-bold text-mst-gray addon-qty" id="addon-6-qty">1</span>
                                            <button type="button" class="flex items-center justify-center text-mst text-md addon-inc" data-id="6">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                    <div class="w-10">
                                        <div class="text-xs text-mst mt-2 text-rightselect-none flex justify-center">
                                            <span id="addon-6-total">0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-xs text-mst-gray pl-1 leading-tight flex items-center gap-1 mt-1.5 select-none">
                            <img src="{{ asset('assets/images/icons/alert2.svg') }}" alt="">
                            <span>You can add multiple quantities of the same service</span>
                        </div>
                    </div>
                    <!-- PRICING SUMMARY -->
                    <div class="mt-6 p-5 bg-mst/10 rounded-xl space-y-2 select-none font-heading">
                        <div class="flex items-center justify-between text-sm font-medium text-mst-gray">
                            <span>Total Pricing (Base Price)</span>
                            <span class="font-bold text-mst-gray">AED <span id="base-price-display">600.00</span></span>
                        </div>
                        <div class="flex items-center justify-between text-sm font-medium text-mst-gray">
                            <span>Add-ons Total</span>
                            <span class="font-bold text-mst-gray">AED <span id="addons-price-display">200.00</span></span>
                        </div>
                        <div class="flex items-center justify-between text-md font-bold text-mst-gray pt-2 border-t
                        border-gray-300">
                            <span>Grand Total</span>
                            <span class="text-lg text-mst font-extrabold">AED <span id="grand-price-display">800.00</span></span>
                        </div>
                    </div>
                    <!-- BOOK ACTIONS -->
                    <div class="space-y-3">
                        <button type="submit" class="w-full flex items-center justify-center gap-2 rounded-full
                        bg-gradient-to-r from-mst to-mst-dark hover:from-mst-dark hover:to-mst text-white
                        font-heading font-semibold italic text-md py-3 transition duration-300 select-none">
                            <img src="{{ asset('assets/images/icons/lock.svg') }}" alt="">
                            Book Now
                        </button>
                        <a href="#" target="_blank" class="w-full flex items-center justify-center gap-2 rounded-full
                         bg-gradient-to-r from-[#2D9D3E] to-[#1E5E28] hover:from-[#1E5E28] hover:to-[#2D9D3E]
                         text-white font-heading font-semibold italic text-md py-3
                         shadow-md transition duration-300">
                            <img src="{{ asset('assets/images/icons/whatsapp1.svg') }}" class="brightness-0 invert" alt="">
                            Book via WhatsApp </a>
                    </div>
                    <!-- NEED HELP -->
                    <div class="p-5 bg-mst/10 rounded-xl flex items-center justify-between gap-3">
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/support6.svg') }}" class="object-contain" alt="">
                            <div>
                                <div class="text-md font-heading font-bold text-mst italic leading-tight">Need Help?</div>
                                <div class="text-sm text-gray-600 leading-none mt-1">We're here to help you</div>
                            </div>
                        </div>
                        <div class="text-right space-y-1 leading-none font-heading">
                            <div class="flex">
                                <img src="{{ asset('assets/images/icons/phone9.svg') }}" class="me-1 object-contain" alt="">
                                <a href="#" class="block text-sm font-bold text-mst-gray italic">+971 4 273 3888</a>
                            </div>
                            <div class="flex">
                                <img src="{{ asset('assets/images/icons/wa5.svg') }}" class="me-1 object-contain" alt="">
                                <a href="#" target="_blank" class="block text-sm font-bold italic">+971 50 559 3840</a>
                            </div>
                        </div>
                    </div>
                    <!-- TRUST BADGES -->
                    <div class="grid grid-cols-3 gap-1 font-heading select-none">
                        <div class="flex flex-col items-center text-center">
                            <img src="{{ asset('assets/images/icons/4543534.svg') }}" class="object-contain" alt="">
                            <span class="text-sm font-bold text-mst-gray mt-1 italic leading-tight">Since 2008</span>
                            <span class="text-xs text-gray-500 mt-0.5">Trusted Partner</span>
                        </div>
                        <div class="flex flex-col items-center text-center">
                            <img src="{{ asset('assets/images/icons/17years.svg') }}" class="object-contain" alt="">
                            <span class="text-sm font-bold text-mst-gray mt-1 italic leading-tight">50,000+</span>
                            <span class="text-xs text-gray-500 mt-0.5">Happy Travelers</span>
                        </div>
                        <div class="flex flex-col items-center text-center">
                            <img src="{{ asset('assets/images/icons/badge1.svg') }}" class="object-contain" alt="">
                            <span class="text-sm font-bold text-mst-gray mt-3 italic leading-tight">Licensed</span>
                            <span class="text-xs text-gray-500 mt-0.5">UAE Tour Operator</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Booking Form Interactive Calculations -->
</section>
{{-- you may also --}}
<section class="justify-center items-center py-8">
    <div class="container mx-auto">
        <div class="our-popular-inner">
            <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between md:gap-8">
                <div class="min-w-0 flex-1">
                    <h1 class="text-left">
                        <span>You may </span><span class="text-mst">also like</span>
                    </h1>
                    <p class="text-left mt-4 pe-20">Book Desert Safari Dubai tours with dune bashing, camel rides,
                                                    sandboarding, and BBQ dinner, including evening, morning, private,
                                                    and VIP desert safari experiences.</p>
                </div>
                <div class="flex shrink-0 md:pt-1">
                    <a href="#" class="inline-flex items-center justify-center gap-2 rounded-full
                    bg-gradient-to-r from-mst to-mst-dark transition hover:from-mst-dark hover:to-mst
                    px-7 py-3.5 font-heading text-base italic text-white md:py-4 md:text-lg"> View all
                        <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="ms-1 w-6" width="24" height="24" alt="">
                    </a>
                </div>
            </div>
            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="relative">
                    <img src="{{ asset('assets/images/tours/1779654952_6a136128093c9_image.webp') }}" class="rounded-lg w-full h-full min-h-[280px] object-cover" alt="4
                    tours
                    desert
                    safari dubai city tour cruise dinner abu dhabi">
                    <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80 hover:bg-black/20 transition duration-300 ease-in-out"></div>
                    <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white z-10 truncate max-w-[85%]">
                        4 Tours: Desert Safari, Dubai City Tour, Cruise Dinner &amp; Abu Dhabi
                    </div>
                    <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10" aria-hidden="true">
                        <span class="text-base leading-none md:text-lg">★</span>
                        <span class="text-base leading-none md:text-lg">★</span>
                        <span class="text-base leading-none md:text-lg">★</span>
                        <span class="text-base leading-none md:text-lg">★</span>
                        <span class="text-base leading-none md:text-lg">★</span> <span class="text-white text-xs ms-1">(4.9/5) 3.1K Reviews</span>
                    </div>
                    <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1 px-4 text-white z-10">
                        Starting from: AED 99
                    </div>
                    <a href="#" class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                    w-15 h-9 rounded-full bg-white z-10 hover:right-4 transition-all ease-in-out duration-500">
                        <img src="{{ asset('assets/images/icons/line-arrow.svg') }}" alt="" class="w-5 h-6"> </a>
                </div>
                <div class="relative">
                    <img src="{{ asset('assets/images/tours/1779654998_6a136156a0cf2_image.webp') }}" class="rounded-lg w-full h-full min-h-[280px] object-cover" alt="combo 1 dubai city tour and desert safari">
                    <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80 hover:bg-black/20 transition duration-300 ease-in-out"></div>
                    <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white z-10 truncate max-w-[85%]">
                        Combo 1 : Dubai City Tour and Desert Safari
                    </div>
                    <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10" aria-hidden="true">
                        <span class="text-base leading-none md:text-lg">★</span>
                        <span class="text-base leading-none md:text-lg">★</span>
                        <span class="text-base leading-none md:text-lg">★</span>
                        <span class="text-base leading-none md:text-lg">★</span>
                        <span class="text-base leading-none md:text-lg">★</span> <span class="text-white text-xs ms-1">(4.9/5) 3.1K Reviews</span>
                    </div>
                    <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1 px-4 text-white z-10">
                        Starting from: AED 99
                    </div>
                    <a href="#" class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                        w-15 h-9 rounded-full bg-white z-10 hover:right-4 transition-all ease-in-out duration-500">
                        <img src="{{ asset('assets/images/icons/line-arrow.svg') }}" alt="" class="w-5 h-6"> </a>
                </div>
                <div class="relative">
                    <img src="{{ asset('assets/images/tours/1779655014_6a136166191e8_image.webp') }}" class="rounded-lg w-full h-full min-h-[280px] object-cover"
                         alt="combo 3
                    desert
                    safari and dhow cruise dinner">
                    <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80 hover:bg-black/20 transition duration-300 ease-in-out"></div>
                    <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white z-10 truncate max-w-[85%]">
                        Combo 3: Desert Safari and Dhow Cruise Dinner
                    </div>
                    <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10" aria-hidden="true">
                        <span class="text-base leading-none md:text-lg">★</span>
                        <span class="text-base leading-none md:text-lg">★</span>
                        <span class="text-base leading-none md:text-lg">★</span>
                        <span class="text-base leading-none md:text-lg">★</span>
                        <span class="text-base leading-none md:text-lg">★</span> <span class="text-white text-xs ms-1">(4.9/5) 3.1K Reviews</span>
                    </div>
                    <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1 px-4 text-white z-10">
                        Starting from: AED 99
                    </div>
                    <a href="#" class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                        w-15 h-9 rounded-full bg-white z-10 hover:right-4 transition-all ease-in-out duration-500">
                        <img src="{{ asset('assets/images/icons/line-arrow.svg') }}" alt="" class="w-5 h-6"> </a>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- FAQs --}}
<section class="flex items-center justify-center pt-10 pb-0">
    <div class="container mx-auto px-4">
        <div class="mx-auto text-center">
            <h1 class="text-3xl md:text-4xl">
                <span>Frequently Asked  </span><span class="text-mst">Questions</span>
            </h1>
            <p class="mt-4 text-center mx-auto md:w-7/12">
                Find answers to frequently asked questions about Dubai tours, desert safari, holiday packages, Umrah
                services, and global visa assistance to help you plan your journey with ease.
            </p>
        </div>
        <div id="accordion-card" class="faq-disert-safari mt-14" data-custom-accordion="collapse">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-x-10">
                <div class="flex flex-col gap-4">
                    <div class="faqmst overflow-hidden rounded-lg border border-gray-200 bg-white transition">
                        <h2 id="faq-1">
                            <button type="button" class="faq-accordion-btn flex w-full items-center justify-between gap-4 border-0 bg-transparent px-5 py-5 font-heading text-lg font-semibold text-left text-mst-gray transition [&amp;[aria-expanded='true']]:text-white" data-custom-accordion-target="#faq-body-1" aria-expanded="false" aria-controls="faq-body-1">
                                <span>What is included in Desert Safari Dubai packages?</span>
                                <svg data-accordion-icon="" class="h-5 w-5 shrink-0 transition-transform duration-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="faq-body-1" class="grid transition-all duration-300 ease-in-out" style="grid-template-rows: 0fr;" aria-labelledby="faq-1">
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
            <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-5 ms-1" alt="arrow"> </a>
    </div>
</section>
{{-- seo tags --}}
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
<!-- Tab Toggles Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Price configuration
        const ADULT_PRICE = 300;
        const CHILD_PRICE = 150;
        const INFANT_PRICE = 0;

        // DOM elements - Guest Counters
        const adultQty = document.getElementById('adult-qty');
        const childQty = document.getElementById('child-qty');
        const infantQty = document.getElementById('infant-qty');

        // DOM elements - Add-ons
        const addonCheckboxes = document.querySelectorAll('.addon-checkbox');

        // DOM elements - Add-on 1 Guest details
        const addon1Adults = document.getElementById('addon-1-adults');
        const addon1Child = document.getElementById('addon-1-child');
        const addon1Infant = document.getElementById('addon-1-infant');

        // DOM elements - Pricing Displays
        const basePriceDisplay = document.getElementById('base-price-display');
        const addonsPriceDisplay = document.getElementById('addons-price-display');
        const grandPriceDisplay = document.getElementById('grand-price-display');

        // Guest increment/decrement event listeners
        document.getElementById('adult-inc').addEventListener('click', () => {
            let val = parseInt(adultQty.textContent) || 0;
            adultQty.textContent = val + 1;
            updateCalculations();
        });
        document.getElementById('adult-dec').addEventListener('click', () => {
            let val = parseInt(adultQty.textContent) || 0;
            if (val > 0) {
                adultQty.textContent = val - 1;
                updateCalculations();
            }
        });

        document.getElementById('child-inc').addEventListener('click', () => {
            let val = parseInt(childQty.textContent) || 0;
            childQty.textContent = val + 1;
            updateCalculations();
        });
        document.getElementById('child-dec').addEventListener('click', () => {
            let val = parseInt(childQty.textContent) || 0;
            if (val > 0) {
                childQty.textContent = val - 1;
                updateCalculations();
            }
        });

        document.getElementById('infant-inc').addEventListener('click', () => {
            let val = parseInt(infantQty.textContent) || 0;
            infantQty.textContent = val + 1;
            updateCalculations();
        });
        document.getElementById('infant-dec').addEventListener('click', () => {
            let val = parseInt(infantQty.textContent) || 0;
            if (val > 0) {
                infantQty.textContent = val - 1;
                updateCalculations();
            }
        });

        // Addon checkboxes listener
        addonCheckboxes.forEach(chk => {
            chk.addEventListener('change', function () {
                const id = this.getAttribute('data-id');
                const qtyEl = document.getElementById(`addon-${id}-qty`);
                if (this.checked) {
                    if (parseInt(qtyEl.textContent) === 0) {
                        qtyEl.textContent = 1;
                    }
                } else {
                    qtyEl.textContent = 0;
                }
                updateCalculations();
            });
        });

        // Addon counter buttons listener
        document.querySelectorAll('.addon-inc').forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const qtyEl = document.getElementById(`addon-${id}-qty`);
                const chk = document.querySelector(`.addon-checkbox[data-id="${id}"]`);
                let val = parseInt(qtyEl.textContent) || 0;
                qtyEl.textContent = val + 1;
                chk.checked = true;
                updateCalculations();
            });
        });

        document.querySelectorAll('.addon-dec').forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const qtyEl = document.getElementById(`addon-${id}-qty`);
                const chk = document.querySelector(`.addon-checkbox[data-id="${id}"]`);
                let val = parseInt(qtyEl.textContent) || 0;
                if (val > 0) {
                    qtyEl.textContent = val - 1;
                    if (val - 1 === 0) {
                        chk.checked = false;
                    }
                    updateCalculations();
                }
            });
        });

        function updateCalculations() {
            const adults = parseInt(adultQty.textContent) || 0;
            const children = parseInt(childQty.textContent) || 0;
            const infants = parseInt(infantQty.textContent) || 0;

            // 1. Calculate Base Price
            const basePrice = (adults * ADULT_PRICE) + (children * CHILD_PRICE) + (infants * INFANT_PRICE);
            basePriceDisplay.textContent = basePrice.toFixed(2);

            // Update Add-on 1 nested info
            if (addon1Adults) addon1Adults.textContent = adults;
            if (addon1Child) addon1Child.textContent = children;
            if (addon1Infant) addon1Infant.textContent = infants;

            // 2. Calculate Add-ons Price
            let addonsTotal = 0;
            addonCheckboxes.forEach(chk => {
                const id = chk.getAttribute('data-id');
                const price = parseFloat(chk.getAttribute('data-price')) || 0;
                const qtyEl = document.getElementById(`addon-${id}-qty`);
                const totalEl = document.getElementById(`addon-${id}-total`);
                const qty = parseInt(qtyEl.textContent) || 0;

                let rowTotal = 0;
                if (chk.checked) {
                    rowTotal = price * qty;
                } else {
                    // Keep quantity sync if checkbox is manually unchecked
                    qtyEl.textContent = 0;
                }
                if (totalEl) totalEl.textContent = rowTotal;
                addonsTotal += rowTotal;
            });
            addonsPriceDisplay.textContent = addonsTotal.toFixed(2);

            // 3. Grand Total
            const grandTotal = basePrice + addonsTotal;
            grandPriceDisplay.textContent = grandTotal.toFixed(2);
        }

        // Trigger initial calculations
        updateCalculations();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabButtons = document.querySelectorAll('[data-target]');
        const tabPanels = document.querySelectorAll('.tab-panel');

        tabButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                // 1. Remove active state from all buttons
                tabButtons.forEach(b => {
                    b.classList.remove('bg-[#BA9B31]', 'text-white');
                    b.classList.add('bg-white', 'text-mst-gray', 'border', 'border-gray-200', 'hover:border-[#BA9B31]', 'hover:text-[#BA9B31]');
                });

                // 2. Add active state to clicked button
                this.classList.add('bg-[#BA9B31]', 'text-white');
                this.classList.remove('bg-white', 'text-mst-gray', 'border', 'border-gray-200', 'hover:border-[#BA9B31]', 'hover:text-[#BA9B31]');

                // 3. Hide all panels
                tabPanels.forEach(p => {
                    p.classList.add('hidden');
                });

                // 4. Show targeted panel
                const target = this.getAttribute('data-target');
                const panel = document.querySelector(target);
                if (panel) {
                    panel.classList.remove('hidden');
                }
            });
        });
    });
</script>
