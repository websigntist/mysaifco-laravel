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
                    <a href="javascript:history.back()" class="inline-flex items-center text-white px-5 py-2.5 rounded-full font-heading italic font-bold text-sm bg-[#BA9B31] hover:bg-[#A3872A] transition duration-300 shadow-md">
                        <!-- Left Arrow Chevron SVG -->
                        <svg class="w-4 h-4 mr-1.5 stroke-current" fill="none" stroke-width="3" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Back
                    </a>
                </div>

                <!-- Action Buttons (top-right) -->
                <div class="absolute right-6 top-6 z-20 flex items-center gap-3">
                    <!-- Share -->
                    <button class="w-10 h-10 rounded-full bg-white flex items-center justify-center cursor-pointer shadow-md hover:scale-105 transition" title="Share">
                        <img src="{{ asset('assets/images/icons/share.svg') }}" class="w-5 h-5" alt="Share">
                    </button>
                    <!-- Heart -->
                    <button class="w-10 h-10 rounded-full bg-white flex items-center justify-center cursor-pointer shadow-md hover:scale-105 transition" title="Wishlist">
                        <img src="{{ asset('assets/images/icons/heart.svg') }}" class="w-5 h-5" alt="Wishlist">
                    </button>
                    <!-- Three Dots -->
                    <button class="w-10 h-10 rounded-full bg-white flex items-center justify-center cursor-pointer shadow-md hover:scale-105 transition" title="More">
                        <img src="{{ asset('assets/images/icons/more.svg') }}" class="w-5 h-5" alt="More">
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
        document.addEventListener('DOMContentLoaded', function() {
            const swiperEl = document.querySelector('.tour-details-swiper');
            const gridItems = document.querySelectorAll('.gallery-grid-item');

            gridItems.forEach(item => {
                item.addEventListener('click', function() {
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
<section class="tour__details py-14">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-[8fr_4fr] gap-6">
            <div class="leftSide__column"></div>
            <div class="rightSide__column bg-gray-50 py-5 px-6 rounded-2xl border border-gray-200"></div>
        </div>
    </div>
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
                    <a href="#" class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r
                    from-mst to-mst-dark px-7 py-3.5 font-heading text-base italic text-white transition hover:from-mst-dark hover:to-mst md:py-4 md:text-lg">
                        View all
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
            <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-5 ms-1" alt="arrow">
        </a>
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
