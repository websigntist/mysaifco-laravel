<section class="flex justify-center items-center border-b-1 border-gray-200">
    <div class="px-4 relative flex min-h-[400px] w-full
                    items-center justify-center overflow-hidden">
        <div class="absolute inset-0 scale-100 bg-cover bg-top bg-no-repeat"
             style="background-image: url('{{ asset('assets/images/pages/1782556549_6a3fa7851bfc7_image.webp') }}')"
             aria-hidden="true"></div>
        {{--@dump($explore_uae)--}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#000000]/90 to-[#000000]/0" aria-hidden="true"></div>
        <div class="relative z-10 w-full py-14">
            <div class="container mx-auto">
                <h1 class="text-white text-[54px] font-body not-italic w-7/12 leading-16">Travel Tips, Guides &
                                                                                          Inspiration</h1>
                <p class="text-white text-lg w-6/12 mt-5">Find answers to common Umrah-related questions to help you
                                                          prepare for a smooth and spiritually fulfilling journey.</p>
            </div>
        </div>
    </div>
</section>
{{-- explore --}}
<section class="blog-explore py-12">
    <div class="container mx-auto px-4 lg:px-0">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-center">
            <!-- Left Text Column -->
            <div class="lg:col-span-6">
                <h2 class="font-heading italic font-bold text-3xl md:text-[32px] text-mst-gray leading-11 mb-4">
                    Explore Dubai Travel Guides, <span class="text-mst">Umrah Tips & Visa Information</span>
                </h2>
                <p class="text-gray-700 text-[14px] leading-relaxed">
                    Discover expert travel resources covering Dubai attractions, desert safari experiences, Umrah
                    planning, UAE visa requirements yacht charter ideas, Abu Dhabi tours, holiday packages, and
                    practical travel tips. Whether you're visiting Dubai for the first time or planning your next
                    journey, our guides help you make informed travel decisions and get the most from your trip.
                </p>
            </div>
            <!-- Right Features Grid Column -->
            <div class="lg:col-span-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-0 md:divide-x md:divide-gray-200">
                    <!-- Feature 1: Experience -->
                    <div class="flex flex-col items-center text-center px-2 py-4">
                        <div class="w-12 h-12 flex items-center justify-center mb-3">
                            <img src="{{ asset('assets/images/icons/17years.svg') }}" alt="17+ Years Experience" class="w-full h-full object-contain">
                        </div>
                        <h3 class="font-heading italic font-bold text-mst-gray text-sm md:text-[15px] leading-tight">
                            17 + Years<br>Experience
                        </h3>
                    </div>
                    <!-- Feature 2: Travelers Served -->
                    <div class="flex flex-col items-center text-center px-2 py-4">
                        <div class="w-12 h-12 flex items-center justify-center mb-3">
                            <img src="{{ asset('assets/images/icons/17years.svg') }}" alt="50,000+ Travelers Served" class="w-full h-full object-contain">
                        </div>
                        <h3 class="font-heading italic font-bold text-mst-gray text-sm md:text-[15px] leading-tight">
                            50,000+<br>Travelers Served
                        </h3>
                    </div>
                    <!-- Feature 3: Customer Support -->
                    <div class="flex flex-col items-center text-center px-2 py-4">
                        <div class="w-12 h-12 flex items-center justify-center mb-3">
                            <img src="{{ asset('assets/images/icons/support2.svg') }}" alt="24/7 Customer Support" class="w-full h-full object-contain">
                        </div>
                        <h3 class="font-heading italic font-bold text-mst-gray text-sm md:text-[15px] leading-tight">
                            24/7 Customer<br>Support
                        </h3>
                    </div>
                    <!-- Feature 4: Best Price Guaranteed -->
                    <div class="flex flex-col items-center text-center px-2 py-4">
                        <div class="w-12 h-12 flex items-center justify-center mb-3">
                            <img src="{{ asset('assets/images/icons/dbadge.svg') }}" alt="Best Price Guaranteed" class="w-full h-full object-contain">
                        </div>
                        <h3 class="font-heading italic font-bold text-mst-gray text-sm md:text-[15px] leading-tight">
                            Best Price<br>Guaranted
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- blogs categories --}}
<section class="blog-categories pb-16">
    <div class="container mx-auto px-4 lg:px-0">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10">
            <div>
                <h2 class="font-heading italic font-semibold text-2xl leading-tight mb-2">
                    <span class="text-mst-gray">Big</span> <span class="text-mst">Categories</span>
                </h2>
                <p class="font-body text-gray-700 text-sm md:text-base leading-relaxed">
                    Explore a wide range of carefully curated categories, making it easy to find the perfect products
                    and services for your needs.
                </p>
            </div>
            <div class="flex-shrink-0">
                <a
                    href="#"
                    class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-mst
                                        to-mst-dark px-5 py-2 font-heading text-base italic text-white transition
                                        hover:from-mst-dark hover:to-mst md:text-lg"
                > View all Categories <img
                        src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                        class="ms-1 w-5"
                        width="24"
                        height="24"
                        alt=""
                    > </a>
            </div>
        </div>
        <!-- Categories Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-5">
            <!-- UAE Travel -->
            <a href="#" class="group flex flex-col items-center text-center p-5 bg-white border border-gray-200 rounded-2xl transition-all duration-300 hover:shadow-md hover:border-mst shadow-[0_8px_30px_rgb(0,0,0,0.015)] cursor-pointer">
                <div class="w-16 h-16 flex items-center justify-center mb-4 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/dubai.svg') }}" alt="UAE Travel" class="w-full h-full object-contain">
                </div>
                <h4 class="font-heading italic font-bold text-[18px] leading-tight">
                    <span class="text-mst-gray">UAE</span><br> <span class="text-mst">Travel</span>
                </h4>
                <span class="font-body text-gray-500 text-xs md:text-sm mt-3">15 Posts</span> </a>
            <!-- Umrah Guide -->
            <a href="#" class="group flex flex-col items-center text-center p-5 bg-white border border-gray-200 rounded-2xl transition-all duration-300 hover:shadow-md hover:border-mst shadow-[0_8px_30px_rgb(0,0,0,0.015)] cursor-pointer">
                <div class="w-16 h-16 flex items-center justify-center mb-4 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/kaba.svg') }}" alt="Umrah Guide" class="w-full h-full object-contain">
                </div>
                <h4 class="font-heading italic font-bold text-[18px] leading-tight">
                    <span class="text-mst-gray">Umrah</span><br> <span class="text-mst">Guide</span>
                </h4>
                <span class="font-body text-gray-500 text-xs md:text-sm mt-3">12 Posts</span> </a>
            <!-- Desert Safari -->
            <a href="#" class="group flex flex-col items-center text-center p-5 bg-white border border-gray-200 rounded-2xl transition-all duration-300 hover:shadow-md hover:border-mst shadow-[0_8px_30px_rgb(0,0,0,0.015)] cursor-pointer">
                <div class="w-16 h-16 flex items-center justify-center mb-4 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/desert.svg') }}" alt="Desert Safari" class="w-full h-full object-contain">
                </div>
                <h4 class="font-heading italic font-bold text-[18px] leading-tight">
                    <span class="text-mst-gray">Desert</span><br> <span class="text-mst">Safari</span>
                </h4>
                <span class="font-body text-gray-500 text-xs md:text-sm mt-3">10 Posts</span> </a>
            <!-- Yacht Charter -->
            <a href="#" class="group flex flex-col items-center text-center p-5 bg-white border border-gray-200 rounded-2xl transition-all duration-300 hover:shadow-md hover:border-mst shadow-[0_8px_30px_rgb(0,0,0,0.015)] cursor-pointer">
                <div class="w-16 h-16 flex items-center justify-center mb-4 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/yacht.svg') }}" alt="Yacht Charter" class="w-full h-full object-contain">
                </div>
                <h4 class="font-heading italic font-bold text-[18px] leading-tight">
                    <span class="text-mst-gray">Yacht</span><br> <span class="text-mst">Charter</span>
                </h4>
                <span class="font-body text-gray-500 text-xs md:text-sm mt-3">8 Posts</span> </a>
            <!-- UAE Visa -->
            <a href="#" class="group flex flex-col items-center text-center p-5 bg-white border border-gray-200 rounded-2xl transition-all duration-300 hover:shadow-md hover:border-mst shadow-[0_8px_30px_rgb(0,0,0,0.015)] cursor-pointer">
                <div class="w-16 h-16 flex items-center justify-center mb-4 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/visa1.svg') }}" alt="UAE Visa" class="w-full h-full object-contain">
                </div>
                <h4 class="font-heading italic font-bold text-[18px] leading-tight">
                    <span class="text-mst-gray">UAE</span><br> <span class="text-mst">Visa</span>
                </h4>
                <span class="font-body text-gray-500 text-xs md:text-sm mt-3">7 Posts</span> </a>
            <!-- Abu Dhabi Tours -->
            <a href="#" class="group flex flex-col items-center text-center p-5 bg-white border border-gray-200 rounded-2xl transition-all duration-300 hover:shadow-md hover:border-mst shadow-[0_8px_30px_rgb(0,0,0,0.015)] cursor-pointer">
                <div class="w-16 h-16 flex items-center justify-center mb-4 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/dubai.svg') }}" alt="Abu Dhabi Tours" class="w-full h-full object-contain">
                </div>
                <h4 class="font-heading italic font-bold text-[18px] leading-tight">
                    <span class="text-mst-gray">Abu Dhabi</span><br> <span class="text-mst">Tours</span>
                </h4>
                <span class="font-body text-gray-500 text-xs md:text-sm mt-3">15 Posts</span> </a>
            <!-- Holiday Packages -->
            <a href="#" class="group flex flex-col items-center text-center p-5 bg-white border border-gray-200 rounded-2xl transition-all duration-300 hover:shadow-md hover:border-mst shadow-[0_8px_30px_rgb(0,0,0,0.015)] cursor-pointer">
                <div class="w-16 h-16 flex items-center justify-center mb-4 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/holiday.svg') }}" alt="Holiday Packages" class="w-full h-full object-contain">
                </div>
                <h4 class="font-heading italic font-bold text-[18px] leading-tight">
                    <span class="text-mst-gray">Holiday</span><br> <span class="text-mst">Packages</span>
                </h4>
                <span class="font-body text-gray-500 text-xs md:text-sm mt-3">11 Posts</span> </a>
            <!-- Travel Tips -->
            <a href="#" class="group flex flex-col items-center text-center p-5 bg-white border border-gray-200 rounded-2xl transition-all duration-300 hover:shadow-md hover:border-mst shadow-[0_8px_30px_rgb(0,0,0,0.015)] cursor-pointer">
                <div class="w-16 h-16 flex items-center justify-center mb-4 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/tips.svg') }}" alt="Travel Tips" class="w-full h-full object-contain">
                </div>
                <h4 class="font-heading italic font-bold text-[18px] leading-tight">
                    <span class="text-mst-gray">Travel</span><br> <span class="text-mst">Tips</span>
                </h4>
                <span class="font-body text-gray-500 text-xs md:text-sm mt-3">11 Posts</span> </a>
        </div>
    </div>
</section>
{{-- blogs listing --}}
<section class="blog-listing">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-[9fr_3fr] gap-6">
            <div class="blogRight min-w-0">
                <div class="cover-blog bg-gray-50 border border-gray-200 p-5 rounded-2xl flex flex-col md:flex-row gap-6">
                    <!-- Left: Image with Badge -->
                    <div class="relative w-full md:w-[45%] h-[260px] md:h-[300px] flex-shrink-0 rounded-2xl overflow-hidden">
                        <img src="{{ asset('assets/images/91d9ed0181f54a5e5eef312d07045557fc90311b-original.webp') }}" alt="Complete Umrah Guide" class="w-full h-full object-cover">
                        <span class="absolute top-4 left-4 bg-[#BA9B31] text-white text-xs md:text-sm font-heading italic font-bold px-4 py-1.5 rounded-full shadow-sm">
                                        Featured
                                    </span>
                    </div>
                    <!-- Right: Content -->
                    <div class="flex flex-col justify-center flex-1 py-2">
                    <span class="text-[#F76401] font-heading font-bold tracking-wider text-xl mb-2 uppercase">
                        Umrah Guide
                    </span>
                        <h2 class="font-heading font-bold text-3xl text-mst-gray leading-tight mb-3 hover:text-mst
                        transition-colors duration-200">
                            <a href="#">Complete Umrah Guide 2026 - Step by Step for First Timers</a>
                        </h2>
                        <!-- Meta Details -->
                        <div class="flex flex-wrap items-center gap-4 text-gray-700 text-xs md:text-sm mb-4">
                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                </svg>
                                <span>May 10, 2026</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"></path>
                                </svg>
                                <span>Saifco Team</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                </svg>
                                <span>8 min read</span>
                            </div>
                        </div>
                        <p class="font-body text-gray-700 text-sm leading-relaxed mb-5">
                            Everything you need to know about Umrah in 2026. From visa requirements, step-by-step
                            process, packing list to important tips for a smooth and spiritual journey.
                        </p>
                        <div>
                            <a href="#" class="inline-flex items-center gap-1.5 font-heading italic font-bold
                            text-mst text-xl transition-colors duration-200"> <span>Read more</span>
                                <svg class="w-5 h-5 text-mst mt-1" fill="none" stroke="currentColor" stroke-width="2.5"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- all categories --}}
                <div class="cat-list flex items-center gap-3 overflow-x-auto whitespace-nowrap py-6 cursor-grab
                select-none"><a href="#" class="px-6 py-2.5 bg-[#BA9B31] text-white rounded-full font-heading italic font-bold text-md select-none">All</a><a href="#" class="px-6 py-2.5 bg-white border border-gray-200 text-mst-gray hover:border-mst hover:text-mst rounded-full font-heading italic font-bold text-md transition-all duration-200 select-none">UAE Travel</a><a href="#" class="px-6 py-2.5 bg-white border border-gray-200 text-mst-gray hover:border-mst hover:text-mst rounded-full font-heading italic font-bold text-md transition-all duration-200 select-none">Umrah Guide</a><a href="#" class="px-6 py-2.5 bg-white border border-gray-200 text-mst-gray hover:border-mst hover:text-mst rounded-full font-heading italic font-bold text-md transition-all duration-200 select-none">Desert Safari</a><a href="#" class="px-6 py-2.5 bg-white border border-gray-200 text-mst-gray hover:border-mst hover:text-mst rounded-full font-heading italic font-bold text-md transition-all duration-200 select-none">Yacht Charter</a><a href="#" class="px-6 py-2.5 bg-white border border-gray-200 text-mst-gray hover:border-mst hover:text-mst rounded-full font-heading italic font-bold text-md transition-all duration-200 select-none">UAE Visa</a><a href="#" class="px-6 py-2.5 bg-white border border-gray-200 text-mst-gray hover:border-mst hover:text-mst rounded-full font-heading italic font-bold text-md transition-all duration-200 select-none">Abu Dhabi Tours</a><a href="#" class="px-6 py-2.5 bg-white border border-gray-200 text-mst-gray hover:border-mst hover:text-mst rounded-full font-heading italic font-bold text-md transition-all duration-200 select-none">Holiday Packages</a><a href="#" class="px-6 py-2.5 bg-white border border-gray-200 text-mst-gray hover:border-mst hover:text-mst rounded-full font-heading italic font-bold text-md transition-all duration-200 select-none">Travel Tips</a></div>
                <div class="blogAllListing">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Card 1 -->
                        <div class="border border-gray-200 rounded-2xl overflow-hidden flex flex-col h-full">
                            <div class="relative w-full h-[200px] overflow-hidden">
                                <img src="{{ asset('assets/images/f27fd1a41f4b718bfd6da3cb787ece5195bab2ca-original.webp') }}" alt="Desert Safari" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                            </div>
                            <div class="p-3 flex flex-col flex-1">
                                <h3 class="font-heading font-bold text-xl text-mst-gray mb-3 leading-snug
                                hover:text-mst transition-colors duration-200 line-clamp-2">
                                    <a href="#">Desert Safari in Dubai - Types, Price & what to Exp...</a>
                                </h3>
                                <div class="flex items-center gap-4 text-gray-700 text-sm mb-3">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                                             stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                        </svg>
                                        <span>May 10, 2026</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                                             stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                        </svg>
                                        <span>8 min read</span>
                                    </div>
                                </div>
                                <p class="font-body text-gray-700 text-sm leading-relaxed mb-2 flex-1">
                                    Explore the thrill of Dubai desert safari, learn about different safari types,
                                    prices, inclusions and tips for an amazing.
                                </p>
                                <div class="mt-auto">
                                    <a href="#" class="inline-flex items-center gap-1 font-heading italic font-bold text-mst text-sm transition-colors duration-200">
                                        <span>Read more</span>
                                        <svg class="w-3.5 h-3.5 text-mst" fill="none" stroke="currentColor"
                                             stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="border border-gray-200 rounded-2xl overflow-hidden flex flex-col h-full">
                            <div class="relative w-full h-[200px] overflow-hidden">
                                <img src="{{ asset('assets/images/627727e24441f5e0b9c98e7e7155c6b8e41b28cb-original.webp') }}" alt="Desert Safari" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                            </div>
                            <div class="p-3 flex flex-col flex-1">
                                <h3 class="font-heading font-bold text-xl text-mst-gray mb-3 leading-snug
                                                        hover:text-mst transition-colors duration-200 line-clamp-2">
                                    <a href="#">Desert Safari in Dubai - Types, Price & what to Exp...</a>
                                </h3>
                                <div class="flex items-center gap-4 text-gray-700 text-sm mb-3">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                                             stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                        </svg>
                                        <span>May 10, 2026</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                                             stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                        </svg>
                                        <span>8 min read</span>
                                    </div>
                                </div>
                                <p class="font-body text-gray-700 text-sm leading-relaxed mb-2 flex-1">
                                    Explore the thrill of Dubai desert safari, learn about different safari types,
                                    prices, inclusions and tips for an amazing.
                                </p>
                                <div class="mt-auto">
                                    <a href="#" class="inline-flex items-center gap-1 font-heading italic font-bold text-mst text-sm transition-colors duration-200">
                                        <span>Read more</span>
                                        <svg class="w-3.5 h-3.5 text-mst" fill="none" stroke="currentColor"
                                             stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="border border-gray-200 rounded-2xl overflow-hidden flex flex-col h-full">
                            <div class="relative w-full h-[200px] overflow-hidden">
                                <img src="{{ asset('assets/images/3754530afa51e91aebdd8958304807da623d7c68-original.webp') }}" alt="Desert Safari" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                            </div>
                            <div class="p-3 flex flex-col flex-1">
                                <h3 class="font-heading font-bold text-xl text-mst-gray mb-3 leading-snug
                                                        hover:text-mst transition-colors duration-200 line-clamp-2">
                                    <a href="#">Desert Safari in Dubai - Types, Price & what to Exp...</a>
                                </h3>
                                <div class="flex items-center gap-4 text-gray-700 text-sm mb-3">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                                             stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                        </svg>
                                        <span>May 10, 2026</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                                             stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                        </svg>
                                        <span>8 min read</span>
                                    </div>
                                </div>
                                <p class="font-body text-gray-700 text-sm leading-relaxed mb-2 flex-1">
                                    Explore the thrill of Dubai desert safari, learn about different safari types,
                                    prices, inclusions and tips for an amazing.
                                </p>
                                <div class="mt-auto">
                                    <a href="#" class="inline-flex items-center gap-1 font-heading italic font-bold text-mst text-sm transition-colors duration-200">
                                        <span>Read more</span>
                                        <svg class="w-3.5 h-3.5 text-mst" fill="none" stroke="currentColor"
                                             stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Card 4 -->
                        <div class="border border-gray-200 rounded-2xl overflow-hidden flex flex-col h-full">
                            <div class="relative w-full h-[200px] overflow-hidden">
                                <img src="{{ asset('assets/images/f27fd1a41f4b718bfd6da3cb787ece5195bab2ca-original.webp') }}" alt="Desert Safari" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                            </div>
                            <div class="p-3 flex flex-col flex-1">
                                <h3 class="font-heading font-bold text-xl text-mst-gray mb-3 leading-snug
                                                        hover:text-mst transition-colors duration-200 line-clamp-2">
                                    <a href="#">Desert Safari in Dubai - Types, Price & what to Exp...</a>
                                </h3>
                                <div class="flex items-center gap-4 text-gray-700 text-sm mb-3">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                                             stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                        </svg>
                                        <span>May 10, 2026</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                                             stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                        </svg>
                                        <span>8 min read</span>
                                    </div>
                                </div>
                                <p class="font-body text-gray-700 text-sm leading-relaxed mb-2 flex-1">
                                    Explore the thrill of Dubai desert safari, learn about different safari types,
                                    prices, inclusions and tips for an amazing.
                                </p>
                                <div class="mt-auto">
                                    <a href="#" class="inline-flex items-center gap-1 font-heading italic font-bold text-mst text-sm transition-colors duration-200">
                                        <span>Read more</span>
                                        <svg class="w-3.5 h-3.5 text-mst" fill="none" stroke="currentColor"
                                             stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Card 5 -->
                        <div class="border border-gray-200 rounded-2xl overflow-hidden flex flex-col h-full">
                            <div class="relative w-full h-[200px] overflow-hidden">
                                <img src="{{ asset('assets/images/627727e24441f5e0b9c98e7e7155c6b8e41b28cb-original.webp') }}" alt="Desert Safari" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                            </div>
                            <div class="p-3 flex flex-col flex-1">
                                <h3 class="font-heading font-bold text-xl text-mst-gray mb-3 leading-snug
                                                                                hover:text-mst transition-colors duration-200 line-clamp-2">
                                    <a href="#">Desert Safari in Dubai - Types, Price & what to Exp...</a>
                                </h3>
                                <div class="flex items-center gap-4 text-gray-700 text-sm mb-3">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                                             stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                        </svg>
                                        <span>May 10, 2026</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                                             stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                        </svg>
                                        <span>8 min read</span>
                                    </div>
                                </div>
                                <p class="font-body text-gray-700 text-sm leading-relaxed mb-2 flex-1">
                                    Explore the thrill of Dubai desert safari, learn about different safari types,
                                    prices, inclusions and tips for an amazing.
                                </p>
                                <div class="mt-auto">
                                    <a href="#" class="inline-flex items-center gap-1 font-heading italic font-bold text-mst text-sm transition-colors duration-200">
                                        <span>Read more</span>
                                        <svg class="w-3.5 h-3.5 text-mst" fill="none" stroke="currentColor"
                                             stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Card 6 -->
                        <div class="border border-gray-200 rounded-2xl overflow-hidden flex flex-col h-full">
                            <div class="relative w-full h-[200px] overflow-hidden">
                                <img src="{{ asset('assets/images/3754530afa51e91aebdd8958304807da623d7c68-original.webp') }}" alt="Desert Safari" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                            </div>
                            <div class="p-3 flex flex-col flex-1">
                                <h3 class="font-heading font-bold text-xl text-mst-gray mb-3 leading-snug
                                                                                hover:text-mst transition-colors duration-200 line-clamp-2">
                                    <a href="#">Desert Safari in Dubai - Types, Price & what to Exp...</a>
                                </h3>
                                <div class="flex items-center gap-4 text-gray-700 text-sm mb-3">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                                             stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                        </svg>
                                        <span>May 10, 2026</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                                             stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                        </svg>
                                        <span>8 min read</span>
                                    </div>
                                </div>
                                <p class="font-body text-gray-700 text-sm leading-relaxed mb-2 flex-1">
                                    Explore the thrill of Dubai desert safari, learn about different safari types,
                                    prices, inclusions and tips for an amazing.
                                </p>
                                <div class="mt-auto">
                                    <a href="#" class="inline-flex items-center gap-1 font-heading italic font-bold text-mst text-sm transition-colors duration-200">
                                        <span>Read more</span>
                                        <svg class="w-3.5 h-3.5 text-mst" fill="none" stroke="currentColor"
                                             stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Load More Button -->
                    <div class="flex justify-center mt-10">
                        <a
                            href="#"
                            class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-mst
                                                                    to-mst-dark px-7 py-3 font-heading text-base italic text-white transition hover:from-mst-dark
                                                                     hover:to-mst md:text-lg"
                        > Load More Articles <img
                                src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                class="ms-1 w-6"
                                width="24"
                                height="24"
                                alt=""
                            > </a>
                    </div>
                </div>
            </div>
            <div class="blogLeft space-y-6">
                <!-- Search Blogs -->
                <div class="blogsearch bg-gray-50 border border-gray-200 p-6 rounded-2xl">
                    <h3 class="font-heading font-bold text-lg text-mst-gray mb-4">Search Blogs</h3>
                    <div class="relative">
                        <input type="text" placeholder="Search for blogs, guide" class="font-heading rounded-full
                        border border-gray-200 bg-white py-3 pl-5 pr-12 w-full text-sm outline-none focus:border-mst focus:ring-1 focus:ring-mst transition-colors">
                        <button class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-mst transition-colors">
                            <img src="{{ asset('assets/images/icons/search-icons.svg') }}" alt="UAE Tours" class="w-5 h-5 object-contain">
                        </button>
                    </div>
                </div>
                <!-- Categories -->
                <div class="blogSideCategories bg-gray-50 border border-gray-200 p-6 rounded-2xl">
                    <h3 class="font-heading font-bold text-lg text-mst-gray mb-4">Categories</h3>
                    <div class="flex flex-col">
                        <!-- UAE Tours -->
                        <a href="#" class="flex items-center justify-between py-3 hover:text-mst transition-colors duration-200">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('assets/images/icons/dubai.svg') }}" alt="UAE Tours" class="w-6 h-6 object-contain">
                                <span class="font-heading font-bold text-[15px] text-mst-gray hover:text-mst transition-colors">UAE Tours</span>
                            </div>
                            <span class="text-sm font-semibold text-gray-500 border border-gray-200 rounded px-2 py-1 w-8 text-center">15</span>
                        </a>
                        <!-- Umrah Guide -->
                        <a href="#" class="flex items-center justify-between py-3 hover:text-mst transition-colors duration-200">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('assets/images/icons/kaba.svg') }}" alt="Umrah Guide" class="w-6 h-6 object-contain">
                                <span class="font-heading font-bold text-[15px] text-mst-gray hover:text-mst transition-colors">Umrah Guide</span>
                            </div>
                            <span class="text-sm font-semibold text-gray-500 border border-gray-200 rounded px-2 py-1 w-8 text-center">12</span>
                        </a>
                        <!-- Desert Safari -->
                        <a href="#" class="flex items-center justify-between py-3 hover:text-mst transition-colors duration-200">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('assets/images/icons/desert.svg') }}" alt="Desert Safari" class="w-6 h-6 object-contain">
                                <span class="font-heading font-bold text-[15px] text-mst-gray hover:text-mst transition-colors">Desert Safari</span>
                            </div>
                            <span class="text-sm font-semibold text-gray-500 border border-gray-200 rounded px-2 py-1 w-8 text-center">10</span>
                        </a>
                        <!-- Yacht Charter -->
                        <a href="#" class="flex items-center justify-between py-3 hover:text-mst transition-colors duration-200">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('assets/images/icons/yacht.svg') }}" alt="Yacht Charter" class="w-6 h-6 object-contain">
                                <span class="font-heading font-bold text-[15px] text-mst-gray hover:text-mst transition-colors">Yacht Charter</span>
                            </div>
                            <span class="text-sm font-semibold text-gray-500 border border-gray-200 rounded px-2 py-1 w-8 text-center">8</span>
                        </a>
                        <!-- UAE Visa -->
                        <a href="#" class="flex items-center justify-between py-3 hover:text-mst transition-colors duration-200">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('assets/images/icons/visa1.svg') }}" alt="UAE Visa" class="w-6 h-6 object-contain">
                                <span class="font-heading font-bold text-[15px] text-mst-gray hover:text-mst transition-colors">UAE Visa</span>
                            </div>
                            <span class="text-sm font-semibold text-gray-500 border border-gray-200 rounded px-2 py-1 w-8 text-center">7</span>
                        </a>
                        <!-- Abu Dhabi Tours -->
                        <a href="#" class="flex items-center justify-between py-3 hover:text-mst transition-colors duration-200">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('assets/images/icons/abu.svg') }}" alt="Abu Dhabi Tours" class="w-6 h-6 object-contain">
                                <span class="font-heading font-bold text-[15px] text-mst-gray hover:text-mst transition-colors">Abu Dhabi Tours</span>
                            </div>
                            <span class="text-sm font-semibold text-gray-500 border border-gray-200 rounded px-2 py-1 w-8 text-center">6</span>
                        </a>
                        <!-- Holiday Packages -->
                        <a href="#" class="flex items-center justify-between py-3 hover:text-mst transition-colors duration-200">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('assets/images/icons/holiday.svg') }}" alt="Holiday Packages" class="w-6 h-6 object-contain">
                                <span class="font-heading font-bold text-[15px] text-mst-gray hover:text-mst transition-colors">Holiday Packages</span>
                            </div>
                            <span class="text-sm font-semibold text-gray-500 border border-gray-200 rounded px-2 py-1 w-8 text-center">11</span>
                        </a>
                        <!-- Tips -->
                        <a href="#" class="flex items-center justify-between py-3 hover:text-mst transition-colors duration-200">
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('assets/images/icons/tips.svg') }}" alt="Tips" class="w-6 h-6 object-contain">
                                <span class="font-heading font-bold text-[15px] text-mst-gray hover:text-mst transition-colors">Tips</span>
                            </div>
                            <span class="text-sm font-semibold text-gray-500 border border-gray-200 rounded px-2 py-1 w-8 text-center">9</span>
                        </a>
                    </div>
                    <div class="mt-4">
                        <a href="#" class="inline-flex items-center gap-1.5 font-heading italic font-bold
                        text-mst text-sm transition-colors duration-200"> <span>View All Categories</span>
                            <svg class="w-4 h-4 text-mst" fill="none" stroke="currentColor" stroke-width="2.5"
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- Popular Guides -->
                <div class="popular-guide bg-gray-50 border border-gray-200 p-6 rounded-2xl">
                    <h3 class="font-heading font-bold text-lg text-mst-gray mb-4">Popular Guides</h3>
                    <div class="flex flex-col">
                        <!-- Guide 1 -->
                        <a href="#" class="flex gap-3 py-2 group">
                            <img src="{{ asset('assets/images/b1-original.webp') }}" alt="Complete Umrah Guide" class="w-14 h-14 rounded-lg object-cover flex-shrink-0">
                            <div class="flex-1 flex flex-col justify-center">
                                <h4 class="font-heading font-bold text-sm text-mst-gray leading-tight">
                                    Complete Umrah Guide from Dubai
                                </h4>
                                <div class="flex items-center gap-1 text-xs text-gray-700">
                                    <svg class="w-3 h-3 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                    </svg>
                                    <span>8 mins read</span>
                                </div>
                            </div>
                        </a>
                        <!-- Guide 2 -->
                        <a href="#" class="flex gap-3 py-2 group">
                            <img src="{{ asset('assets/images/b2-original.webp') }}" alt="Desert Safari Guide" class="w-14 h-14 rounded-lg object-cover flex-shrink-0">
                            <div class="flex-1 flex flex-col justify-center">
                                <h4 class="font-heading font-bold text-sm text-mst-gray leading-tight">
                                    Desert Safari Guide - Everything You must Know
                                </h4>
                                <div class="flex items-center gap-1 text-xs text-gray-700">
                                    <svg class="w-3 h-3 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                    </svg>
                                    <span>6 mins read</span>
                                </div>
                            </div>
                        </a>
                        <!-- Guide 3 -->
                        <a href="#" class="flex gap-3 py-2 group">
                            <img src="{{ asset('assets/images/b3-original.webp') }}" alt="UAE Visa Guide" class="w-14 h-14 rounded-lg object-cover flex-shrink-0">
                            <div class="flex-1 flex flex-col justify-center">
                                <h4 class="font-heading font-bold text-sm text-mst-gray leading-tight">
                                    UAE Visa Guide for Tourists
                                </h4>
                                <div class="flex items-center gap-1 text-[11px] text-gray-700">
                                    <svg class="w-3 h-3 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                    </svg>
                                    <span>5 mins read</span>
                                </div>
                            </div>
                        </a>
                        <!-- Guide 4 -->
                        <a href="#" class="flex gap-3 py-2 group">
                            <img src="{{ asset('assets/images/b4-original.webp') }}" alt="Abu Dhabi Travel Guide" class="w-14 h-14 rounded-lg object-cover flex-shrink-0">
                            <div class="flex-1 flex flex-col justify-center">
                                <h4 class="font-heading font-bold text-sm text-mst-gray leading-tight">
                                    Abu Dhabi Travel Guide - Top places to Visit
                                </h4>
                                <div class="flex items-center gap-1 text-[11px] text-gray-700">
                                    <svg class="w-3 h-3 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                    </svg>
                                    <span>5 mins read</span>
                                </div>
                            </div>
                        </a>
                        <!-- Guide 5 -->
                        <a href="#" class="flex gap-3 py-2 group">
                            <img src="{{ asset('assets/images/b5-original.webp') }}" alt="Budget trip to Dubai" class="w-14 h-14 rounded-lg object-cover flex-shrink-0">
                            <div class="flex-1 flex flex-col justify-center">
                                <h4 class="font-heading font-bold text-sm text-mst-gray leading-tight">
                                    How to plan a Budget trip to Dubai
                                </h4>
                                <div class="flex items-center gap-1 text-xs text-gray-700">
                                    <svg class="w-3 h-3 text-gray-700" fill="none" stroke="currentColor"
                                         stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                    </svg>
                                    <span>5 mins read</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
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
        <ul class="flex flex-wrap items-center justify-center gap-3 font-body text-sm bg-[#FAF7F2] mt-6 p-5 rounded-lg border border-[#BA9B31]/40">
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
        </ul>
    </div>
</section>
<section class="contactBar py-8 bg-gray-50 ">
    <div class="container">
        <div class="py-4 flex flex-col lg:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/support2.svg') }}"
                         class="w-full h-full object-contain"
                         alt="Support">
                </div>
                <div>
                    <h3 class="font-heading italic font-bold text-3xl text-mst-gray">Didn’t find your
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
                    <img src="{{ asset('assets/images/icons/email1.svg') }}" class="w-5 h-5 object-contain" alt="email">
                    <span>Email Us</span> </a>
                <!-- Call Button -->
                <a href="#" class="flex items-center gap-2.5 px-6 py-3 bg-[#EB001B] hover:bg-red-700 transition-all
                        duration-200 rounded-full text-white font-heading font-semibold text-md italic">
                    <img src="{{ asset('assets/images/icons/call.svg') }}" class="w-5 h-5 object-contain" alt="call">
                    <span>Call Now</span> </a>
                <!-- WhatsApp Button -->
                <a href="#" target="_blank" class="flex items-center gap-2.5 px-6 py-3
                         bg-gradient-to-r from-[#2D9D3E] to-[#1E5E28] hover:bg-[#2D9D3E]
                         transition-all duration-200 rounded-full text-white font-heading font-semibold text-md italic">
                    <img src="{{ asset('assets/images/icons/whatsapp1.svg') }}" class="w-5 h-5 object-contain" alt="whatsapp">
                    <span>WhatsApp</span> </a>
            </div>
        </div>
    </div>
</section>
<style>
    .cat-list::-webkit-scrollbar {
        display: none;
    }
    .cat-list {
        -ms-overflow-style: none;
        scrollbar-width:    none;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slider = document.querySelector('.cat-list');
        if (!slider) return;
        let isDown = false;
        let startX;
        let scrollLeft;
        let isDragging = false;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            isDragging = false;
            slider.classList.remove('cursor-grab');
            slider.classList.add('cursor-grabbing');
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });

        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.classList.remove('cursor-grabbing');
            slider.classList.add('cursor-grab');
        });

        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('cursor-grabbing');
            slider.classList.add('cursor-grab');
        });

        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            isDragging = true;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 2;
            slider.scrollLeft = scrollLeft - walk;
        });

        // Scroll horizontally using mouse wheel
        slider.addEventListener('wheel', (e) => {
            e.preventDefault();
            slider.scrollLeft += e.deltaY;
        });

        // Prevent accidental link clicks when dragging
        slider.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', (e) => {
                if (isDragging) {
                    e.preventDefault();
                }
            });
        });
    });
</script>
