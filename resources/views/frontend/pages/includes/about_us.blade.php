<section class="flex justify-center items-center border-b-1 border-gray-200">
    <div class="px-4 relative flex min-h-[400px] w-full
                    items-center justify-center overflow-hidden">
        <div class="absolute inset-0 scale-100 bg-cover bg-top bg-no-repeat"
             style="background-image: url('{{ asset('assets/images/pages/1782583577_6a40111912011_image.webp') }}')"
             aria-hidden="true"></div>
        {{--@dump($explore_uae)--}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#ffffff]/90 to-[#ffffff]/0" aria-hidden="true"></div>
        <div class="relative z-10 w-full py-14">
            <div class="container mx-auto">
                <div class="text-mst font-bold">ABOUT US</div>
                <h1 class="text-[54px] w-5/12 font-body font-bold not-italic leading-16">
                    Your Journey <br class="hidden md:block"> <span class="text-mst">Our Commitment</span>
                </h1>
                <p class="text-lg mt-5 w-5/12">Saifco Travel and Tourism is a trusted name in the UAE travel industry,
                                               creating memorable experiences since 2008 with integrity, reliability and
                                               unmatched service.</p>
                <div class="flex mt-8 gap-6">
                    <a
                        href="#"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-[#03174C]
                                            px-7 py-3 font-heading text-base italic text-white transition hover:from-mst-dark
                                             hover:to-mst md:text-lg"
                    > Explore Our Tours <img
                            src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                            class="ms-1 w-6"
                            width="24"
                            height="24"
                            alt=""
                        > </a> <a
                        href="#"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-mst
                                            to-mst-dark px-7 py-3 font-heading text-base italic text-white transition hover:from-mst-dark
                                             hover:to-mst md:text-lg"
                    > Contact Us <img
                            src="{{ asset('assets/images/icons/call.svg') }}"
                            class="ms-1 w-4"
                            width="24"
                            height="24"
                            alt=""
                        > </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="who-are-we py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <!-- Left Column: Who are We? -->
            <div class="abtRight pr-0 lg:pr-8">
                <h2 class="font-heading font-bold text-3xl text-mst-gray leading-tight mb-6">
                    Who are <span class="text-mst italic">We?</span>
                </h2>
                <p class="font-body text-mst-gray text-sm md:text-base leading-relaxed mb-4">
                    Founded in 2008, Saifco Travel and Tourism is a Dubai-based travel company offering a wide range of
                    travel services including tours, Umrah packages, visa services, hotel bookings, airline tickets and
                    more.
                </p>
                <p class="font-body text-mst-gray text-sm md:text-base leading-relaxed mb-8">
                    Over the years, we have grown through the trust of our clients and the dedication of our team. Our
                    mission is to turn every journey into a memory that lasts a lifetime.
                </p>
                <!-- Features row -->
                <div class="grid grid-cols-2 md:grid-cols-5 mt-10 gap-6 md:gap-0 md:divide-x md:divide-gray-200">
                    <!-- Feature 1: Experience -->
                    <div class="flex flex-col items-center text-center px-1">
                        <div class="w-10 h-10 flex items-center justify-center mb-3">
                            <img src="{{ asset('assets/images/icons/4543534.svg') }}" alt="">
                        </div>
                        <h4 class="font-heading italic font-bold text-mst-gray text-base leading-tight">17+</h4>
                        <span class="text-[12px] font-heading text-mst-gray font-semibold mt-1">
                            Years Experience
                        </span>
                    </div>
                    <!-- Feature 2: Happy Travelers -->
                    <div class="flex flex-col items-center text-center px-1">
                        <div class="w-10 h-10 flex items-center justify-center mb-3">
                            <img src="{{ asset('assets/images/icons/17years.svg') }}" alt="">
                        </div>
                        <h4 class="font-heading italic font-bold text-mst-gray text-base leading-tight">50,000+</h4>
                        <span class="text-[12px] font-heading text-mst-gray font-semibold mt-1">Happy Travelers</span>
                    </div>
                    <!-- Feature 3: Travel Products -->
                    <div class="flex flex-col items-center text-center px-1">
                        <div class="w-10 h-10 flex items-center justify-center mb-3">
                            <img src="{{ asset('assets/images/icons/6786.svg') }}" alt="">
                        </div>
                        <h4 class="font-heading italic font-bold text-mst-gray text-base leading-tight">50+</h4>
                        <span class="text-[12px] font-heading text-mst-gray font-semibold mt-1">Travel Products</span>
                    </div>
                    <!-- Feature 4: Hotel Partners -->
                    <div class="flex flex-col items-center text-center px-1">
                        <div class="w-10 h-10 flex items-center justify-center mb-3">
                            <img src="{{ asset('assets/images/icons/8789.svg') }}" alt="">
                        </div>
                        <h4 class="font-heading italic font-bold text-mst-gray text-base leading-tight">100+</h4>
                        <span class="text-[12px] font-heading text-mst-gray font-semibold mt-1">Hotel Partners</span>
                    </div>
                    <!-- Feature 5: support -->
                    <div class="flex flex-col items-center text-center px-1">
                        <div class="w-10 h-10 flex items-center justify-center mb-3">
                            <img src="{{ asset('assets/images/icons/support2.svg') }}" alt="">
                        </div>
                        <h4 class="font-heading italic font-bold text-mst-gray text-base leading-tight">24/7</h4>
                        <span class="text-[12px] font-heading text-mst-gray font-semibold mt-1">Contact Support</span>
                    </div>
                </div>
            </div>
            <!-- Right Column: Why thousands choose Saifco? -->
            <div class="abtLeft flex-col md:flex-row gap-5 items-center lg:items-start">
                <h2 class="font-heading font-bold text-3xl text-mst-gray leading-tight mb-6">
                    Why thousands <span class="text-mst italic">choose Saifco?</span>
                </h2>
                <div class="flex">
                    <!-- Benefits List -->
                    <div class="flex-1 space-y-3 w-full">
                        <!-- Benefit 1 -->
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('assets/images/icons/563455.svg') }}" class="w-10 h-10" alt="">
                            <span class="font-body font-semibold text-sm text-mst-gray">Established since 2008</span>
                        </div>
                        <!-- Benefit 2 -->
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('assets/images/icons/0256.svg') }}" class="w-10 h-10" alt="">
                            <span class="font-body font-semibold text-sm text-mst-gray">Licensed Dubai Travel Company</span>
                        </div>
                        <!-- Benefit 3 -->
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('assets/images/icons/06565.svg') }}" class="w-10 h-10" alt="">
                            <span class="font-body font-semibold text-sm text-mst-gray">Thousands of happy Customers</span>
                        </div>
                        <!-- Benefit 4 -->
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('assets/images/icons/870.svg') }}" class="w-10 h-10" alt="">
                            <span class="font-body font-semibold text-sm text-mst-gray">Secure Online Booking</span>
                        </div>
                        <!-- Benefit 5 -->
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('assets/images/icons/980.svg') }}" class="w-10 h-10" alt="">
                            <span class="font-body font-semibold text-sm text-mst-gray">Professional Tour Guides</span>
                        </div>
                        <!-- Benefit 6 -->
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('assets/images/icons/890.svg') }}" class="w-10 h-10" alt="">
                            <span class="font-body font-semibold text-sm text-mst-gray">24/7 Customer Support</span>
                        </div>
                    </div>
                    <!-- Suitcase Image -->
                    <div class="w-full md:w-[260px] lg:w-[320px] flex-shrink-0 flex justify-center items-center pt-8 md:pt-0">
                        <img src="{{ asset('assets/images/image 2444-original.webp') }}" alt="Travel Gear"
                             class="w-full max-w-[230px] object-contain">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="what-we-offer">
    <div class="container mx-auto px-4">
        <!-- Section Title with lines and dots -->
        <div class="flex items-center justify-center gap-4 mb-12">
            {{--<div class="hidden md:block w-32 h-[2px] bg-gradient-to-r from-transparent to-[#BA9B31] relative">
                <div class="absolute right-0 top-1/2 -translate-y-1/2 w-2.5 h-2.5 rounded-full bg-[#BA9B31]"></div>
            </div>--}}
            <h2 class="font-heading font-bold text-3xl md:text-[38px] text-mst-gray leading-tight text-center">
                What we <span class="text-mst italic">Offer?</span>
            </h2>
            {{--<div class="hidden md:block w-32 h-[2px] bg-gradient-to-l from-transparent to-[#BA9B31] relative">
                <div class="absolute left-0 top-1/2 -translate-y-1/2 w-2.5 h-2.5 rounded-full bg-[#BA9B31]"></div>
            </div>--}}
        </div>
        <!-- 5 Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            <!-- Card 1: UAE Tours -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden flex flex-col h-full relative group">
                <div class="relative w-full h-[180px] overflow-hidden">
                    <img src="{{ asset('assets/images/75a83f469853919410b9476bf7279b57a0ddb912-original.webp') }}" alt="UAE Tours" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <!-- Floating icon badge -->
                <div class="absolute top-[156px] left-12 -translate-x-1/2 w-12 h-12 rounded-full bg-[#03174C] flex
                items-center justify-center  z-10">
                    <img src="{{ asset('assets/images/icons/4324.svg') }}" alt="UAE Tours Icon" class="w-6 h-6 object-contain">
                </div>
                <div class="p-6 pt-10 flex flex-col flex-1 bg-white">
                    <h3 class="font-heading font-bold text-lg text-mst-gray mb-4">UAE Tours</h3>
                    <ul class="space-y-2 text-mst-gray text-xs md:text-sm flex-1 font-body">
                        <ul class="list-disc ms-6 space-y-1">
                            <li>Desert Safari</li>
                            <li>Dubai City Tours</li>
                            <li>Abu Dhabi City Tour</li>
                            <li>Dhow Cruise</li>
                            <li>Luxury Yacht Rental</li>
                            <li>Jet Ski & Water Sports</li>
                            <li>Helicopter Tour</li>
                            <li>Dubai Marina Cruise</li>
                            <li>Theme Park Tickets</li>
                            <li>And More...</li>
                        </ul>
                    </ul>
                </div>
            </div>
            <!-- Card 2: Travel Services -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden flex flex-col h-full relative group">
                <div class="relative w-full h-[180px] overflow-hidden">
                    <img src="{{ asset('assets/images/6bd7d38372ae03ba24c615c77580229b3c275cc5-original.webp') }}" alt="UAE Tours" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <!-- Floating icon badge -->
                <div class="absolute top-[156px] left-12 -translate-x-1/2 w-12 h-12 rounded-full bg-[#03174C] flex
                            items-center justify-center  z-10">
                    <img src="{{ asset('assets/images/icons/4324.svg') }}" alt="UAE Tours Icon" class="w-6 h-6 object-contain">
                </div>
                <div class="p-6 pt-10 flex flex-col flex-1 bg-white">
                    <h3 class="font-heading font-bold text-lg text-mst-gray mb-4">Travel Services</h3>
                    <ul class="space-y-2 text-mst-gray text-xs md:text-sm flex-1 font-body">
                        <ul class="list-disc ms-6 space-y-1">
                            <li>Hotel Bookings</li>
                            <li>Airline Tickets</li>
                            <li>Airport Transfers</li>
                            <li>UAE Visa Assistance</li>
                            <li>Travel Insurance</li>
                            <li>Tourist Visa Services</li>
                            <li>Group Bookings</li>
                            <li>MICE Services</li>
                            <li>And More...</li>
                        </ul>
                    </ul>
                </div>
            </div>
            <!-- Card 3: Religious Travels -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden flex flex-col h-full relative group">
                <div class="relative w-full h-[180px] overflow-hidden">
                    <img src="{{ asset('assets/images/a795af09aed7660cdcf4f16278b49649a23cef19-original.webp') }}" alt="UAE Tours" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <!-- Floating icon badge -->
                <div class="absolute top-[156px] left-12 -translate-x-1/2 w-12 h-12 rounded-full bg-[#03174C] flex
                            items-center justify-center  z-10">
                    <img src="{{ asset('assets/images/icons/4234.svg') }}" alt="UAE Tours Icon" class="w-6 h-6 object-contain">
                </div>
                <div class="p-6 pt-10 flex flex-col flex-1 bg-white">
                    <h3 class="font-heading font-bold text-lg text-mst-gray mb-4">Religious Travels</h3>
                    <ul class="space-y-2 text-mst-gray text-xs md:text-sm flex-1 font-body">
                        <ul class="list-disc ms-6 space-y-1">
                            <li>Umrah by Bus</li>
                            <li>Umrah by Air</li>
                            <li>Umrah Visa</li>
                            <li>Saudi Multi Entry Visa</li>
                            <li>Ziyarat Tours</li>
                            <li>Group Umrah Booking</li>
                            <li>Private Umrah Packages</li>
                            <li>Ramadan & Special Packages</li>
                            <li>And More...</li>
                        </ul>
                    </ul>
                </div>
            </div>
            <!-- Card 4: Visa Services -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden flex flex-col h-full relative group">
                <div class="relative w-full h-[180px] overflow-hidden">
                    <img src="{{ asset('assets/images/5ca35a590ea25fd4c7d15380a4b12247102182b1-original.webp') }}" alt="UAE Tours" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <!-- Floating icon badge -->
                <div class="absolute top-[156px] left-12 -translate-x-1/2 w-12 h-12 rounded-full bg-[#03174C] flex
                            items-center justify-center  z-10">
                    <img src="{{ asset('assets/images/icons/247visa.svg') }}" alt="UAE Tours Icon" class="w-6 h-6 object-contain">
                </div>
                <div class="p-6 pt-10 flex flex-col flex-1 bg-white">
                    <h3 class="font-heading font-bold text-lg text-mst-gray mb-4">Visa Services</h3>
                    <ul class="space-y-2 text-mst-gray text-xs md:text-sm flex-1 font-body">
                        <ul class="list-disc ms-6 space-y-1">
                            <li>UAE Visa</li>
                            <li>Dubai Visa</li>
                            <li>Visit Visa</li>
                            <li>Transit Visa</li>
                            <li>Visa Change</li>
                            <li>Visa Extension</li>
                            <li>Multiple Entry Visa</li>
                            <li>Corporate Visa</li>
                            <li>And More...</li>
                        </ul>
                    </ul>
                </div>
            </div>
            <!-- Card 5: Holiday Packages -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden flex flex-col h-full relative group">
                <div class="relative w-full h-[180px] overflow-hidden">
                    <img src="{{ asset('assets/images/1b1d882cb5f802e1f2727ebd1dc0a66191a5f708-original.webp') }}" alt="UAE Tours" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <!-- Floating icon badge -->
                <div class="absolute top-[156px] left-12 -translate-x-1/2 w-12 h-12 rounded-full bg-[#03174C] flex
                            items-center justify-center  z-10">
                    <img src="{{ asset('assets/images/icons/4533.svg') }}" alt="UAE Tours Icon" class="w-6 h-6 object-contain">
                </div>
                <div class="p-6 pt-10 flex flex-col flex-1 bg-white">
                    <h3 class="font-heading font-bold text-lg text-mst-gray mb-4">Holiday Packages</h3>
                    <ul class="space-y-2 text-mst-gray text-xs md:text-sm flex-1 font-body">
                        <ul class="list-disc ms-6 space-y-1">
                            <li>Dubai Holiday Packages</li>
                            <li>UAE Holiday Packages</li>
                            <li>Honeymoon Packages</li>
                            <li>Family Packages</li>
                            <li>Group Tour Packages</li>
                            <li>Luxury Holiday Packages</li>
                            <li>Custom Holiday Packages</li>
                            <li>Weekend Getaways</li>
                            <li>And More...</li>
                        </ul>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="journey py-16">
    <div class="container mx-auto px-4">
        <!-- Row 1: Journey & Mission/Vision -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-16">
            <!-- Left Side: Our Journey Timeline (7/12 cols) -->
            <div class="lg:col-span-6 flex flex-col justify-center">
                <h2 class="font-heading font-bold text-3xl italic text-mst-gray mb-10 text-center">
                    Our <span class="text-mst italic">Journey</span>
                </h2>
                <!-- Timeline container -->
                <div class="relative w-full">
                    <!-- Gold horizontal line -->
                    <div class="absolute top-[12px] left-4 right-4 h-[3px] bg-[#F79E1B]"></div>
                    <div class="grid grid-cols-5 gap-2 relative">
                        <!-- Step 1: 2008 -->
                        <div class="flex flex-col items-center text-center">
                            <div class="w-6 h-6 rounded-full bg-[#F79E1B] z-10 mb-2"></div>
                            <h4 class="font-heading font-bold text-xltext-mst-gray">2008</h4>
                            <p class="text-sm text-gray-900 font-body mt-1 leading-tight px-1">Company established in
                                                                                               Dubai</p>
                        </div>
                        <!-- Step 2: 2012 -->
                        <div class="flex flex-col items-center text-center">
                            <div class="w-6 h-6 rounded-full bg-[#F79E1B] z-10 mb-2"></div>
                            <h4 class="font-heading font-bold text-lg md:text-xl text-mst-gray">2012</h4>
                            <p class="text-sm text-gray-900 font-body mt-1 leading-tight px-1">Expanded UAE Tour
                                                                                               Portfolio</p>
                        </div>
                        <!-- Step 3: 2017 -->
                        <div class="flex flex-col items-center text-center">
                            <div class="w-6 h-6 rounded-full bg-[#F79E1B] z-10 mb-2"></div>
                            <h4 class="font-heading font-bold text-lg md:text-xl text-mst-gray">2017</h4>
                            <p class="text-sm text-gray-900 font-body mt-1 leading-tight px-1">Launched Umrah
                                                                                               Services</p>
                        </div>
                        <!-- Step 4: 2020 -->
                        <div class="flex flex-col items-center text-center">
                            <div class="w-6 h-6 rounded-full bg-[#F79E1B] z-10 mb-2"></div>
                            <h4 class="font-heading font-bold text-lg md:text-xl text-mst-gray">2020</h4>
                            <p class="text-sm text-gray-900 font-body mt-1 leading-tight px-1">Digital Transformation
                                                                                               Journey</p>
                        </div>
                        <!-- Step 5: 2025 -->
                        <div class="flex flex-col items-center text-center">
                            <div class="w-6 h-6 rounded-full bg-[#F79E1B] z-10 mb-2"></div>
                            <h4 class="font-heading font-bold text-lg md:text-xl text-mst-gray">2025</h4>
                            <p class="text-sm text-gray-900 font-body mt-1 leading-tight px-1">Thousands of Happy
                                                                                               Travelers Served</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Side: Mission & Vision Cards (5/12 cols) -->
            <div class="lg:col-span-6 flex rounded-2xl overflow-hidden flex-col sm:flex-row h-full">
                <!-- Our Mission (Navy Blue) -->
                <div class="flex-1 bg-[#03174C] p-4 flex items-center justify-center gap-4">
                    <div class="flex items-center justify-center gap-3">
                        <img src="{{ asset('assets/images/icons/6506.svg') }}"
                             class="w-30 h-30"
                             alt="">
                    </div>
                    <div>
                        <h3 class="font-heading font-bold text-lg text-white mb-1">Our Mission</h3>
                        <p class="font-body text-xs md:text-sm text-white leading-relaxed">
                            To deliver exceptional travel experiences through professional service, transparency, and
                            customer-focused solutions.
                        </p>
                    </div>
                </div>
                <!-- Our Vision (Golden Orange) -->
                <div class="flex-1 bg-[#F09B25] p-4 flex items-center justify-center gap-4">
                    <div class="flex items-center justify-center gap-3">
                        <img src="{{ asset('assets/images/icons/0986.svg') }}"
                             class="w-30 h-30"
                             alt="">
                    </div>
                    <div>
                        <h3 class="font-heading font-bold text-lg text-white mb-1">Our Vision</h3>
                        <p class="font-body text-xs md:text-sm text-white leading-relaxed">
                            To become one of the most trusted and preferred travel companies in the UAE and beyond.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row 2: MD Message & Reviews -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <!-- Left Side: MD Message (6/12 cols) -->
            <div class="lg:col-span-6 flex flex-col md:flex-row gap-6 items-center md:items-start">
                <!-- Circular Portrait -->
                <div class="relative flex-shrink-0">
                    <img src="{{ asset('assets/images/md-msg.png') }}" alt="Asim Rehman" class="w-full h-full rounded-full object-cover">
                </div>
                <div class="flex-1">
                    <!-- Quote Mark icon -->
                    <img src="{{ asset('assets/images/icons/quote.svg') }}"
                         class="w-10 h-10 mb-5"
                         alt="">
                    <h3 class="font-heading font-bold text-2xl text-mst-gray mb-4 leading-8 italic">
                        A message from our Managing Director
                    </h3>
                    <p class="text-sm text-mst-gray font-body mb-4">
                        At Saifco, our commitment goes beyond booking trips - it's about creating meaningful experiences
                        and building lasting relationships. Thank you for trusting us to be part of your journey.
                    </p>
                    <div class="pt-3">
                        <h4 class="font-heading font-bold text-mst-gray italic">Asim Rehman</h4>
                        <div class="text-sm text-mst-gray font-body w-50">
                            Founder & Managing Director Saifco Travel & Tourism LLC.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Side: Reviews & Ratings (6/12 cols) -->
            <div class="lg:col-span-6 grid grid-cols-1 md:grid-cols-[1.9fr_1.9fr_1.7fr] gap-4">
                <!-- Google Review Card -->
                <div class="p-5 rounded-3xl border border-gray-200 flex flex-col justify-between h-60">
                    <div class="space-y-3">
                        <!-- Top header -->
                        <img src="{{ asset('assets/images/icons/grating.svg') }}"
                             class="w-full"
                             alt="">
                        <h4 class="font-heading font-bold text-4xl italic text-mst-gray mt-5">4.9/
                            <span class="text-2xl -ms-2">5</span></h4>
                        <p class="font-body text-xs text-mst-gray leading-normal">
                            "Excellent service and well organised tour. Highly recommended!"
                        </p>
                        <div class="font-heading italic font-semibold text-mst-gray mt-3 block">- Ayesha Khan</div>
                    </div>
                </div>
                <!-- TripAdvisor Review Card -->
                <div class="p-5 rounded-3xl border border-gray-200 flex flex-col justify-between h-60">
                    <div class="space-y-3">
                        <!-- Top header -->
                        <img src="{{ asset('assets/images/icons/triprating.svg') }}"
                             class="w-full"
                             alt="">
                        <h4 class="font-heading font-bold text-4xl italic text-mst-gray mt-5">5.0/
                            <span class="text-2xl -ms-2">5</span></h4>
                        <p class="font-body text-xs text-mst-gray leading-normal">
                            "Amazing desert safari experience. Everything was perfect!"
                        </p>
                        <div class="font-heading italic font-semibold text-mst-gray mt-3 block">- John Smith</div>
                    </div>
                </div>
                <!-- Overall Rating Card (Navy Blue) -->
                <div class="bg-[#03174C] p-5 rounded-3xl text-white text-center flex flex-col justify-between h-60">
                    <span class="font-heading text-white font-bold block">Overall Rating</span>
                    <h4 class="font-heading font-bold text-4xl italic text-white mt-5">4.9</h4>
                    <!-- Stars -->
                    <img src="{{ asset('assets/images/icons/stars1.svg') }}"
                         class="w-full h-full"
                         alt="">
                    <div class="text-sm text-white font-body leading-tight block">
                        Based on Google & TripAdvisor Reviews
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="need__help py-10 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
            <!-- Left Info column -->
            <div class="flex flex-col justify-center text-center lg:text-left">
                <h2 class="font-heading font-bold text-4xl italic text-mst-gray leading-tight mb-2">
                    Need Help Planing <span class="text-mst">Your Journey?</span>
                </h2>
                <p class="font-body text-mst-gray">
                    Our travel experts are ready to help you plan your perfect trip.
                </p>
            </div>
            <!-- Right Actions Column -->
            <div class="flex flex-col sm:flex-row items-center gap-6 lg:gap-8 w-full lg:w-auto justify-center lg:justify-end">
                <!-- WhatsApp Button -->
                <a href="#"
                   target="_blank"
                   class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-[#2D9D3E] to-[#1E5E28] px-8 py-3.5 rounded-full text-white font-heading font-bold italic text-base md:text-lg shadow-md hover:shadow-lg transition-all duration-300 w-full sm:w-auto group">
                    <img src="{{ asset('assets/images/icons/whatsapp1.svg') }}" alt="">
                    <span>Contact Us on WhatsApp</span> </a>
                <!-- Vertical Divider -->
                <div class="hidden sm:block w-[1.5px] h-10 bg-gray-300"></div>
                <!-- Call Button / Details -->
                <div class="flex items-center gap-4 w-full sm:w-auto justify-center sm:justify-start">
                    <a href="#" class="flex items-center justify-center flex-shrink-0">
                        <img src="{{ asset('assets/images/icons/phone1.svg') }}"
                             class=""
                             alt="">
                    </a>
                    <div class="text-left">
                        <a href="#" class="font-heading font-bold text-xl italic text-mst-gray leading-tight">+971 4 2733868 </a>
                        <span class="text-mst-gray font-body block font-medium">Call us anytime</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
