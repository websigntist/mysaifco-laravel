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
                <p class="font-body text-gray-700 text-sm md:text-base leading-relaxed mb-4">
                    Founded in 2008, Saifco Travel and Tourism is a Dubai-based travel company offering a wide range of
                    travel services including tours, Umrah packages, visa services, hotel bookings, airline tickets and
                    more.
                </p>
                <p class="font-body text-gray-700 text-sm md:text-base leading-relaxed mb-8">
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
                        <span class="text-[12px] font-heading text-gray-700 font-semibold mt-1">
                            Years Experience
                        </span>
                    </div>
                    <!-- Feature 2: Happy Travelers -->
                    <div class="flex flex-col items-center text-center px-1">
                        <div class="w-10 h-10 flex items-center justify-center mb-3">
                            <img src="{{ asset('assets/images/icons/17years.svg') }}" alt="">
                        </div>
                        <h4 class="font-heading italic font-bold text-mst-gray text-base leading-tight">50,000+</h4>
                        <span class="text-[12px] font-heading text-gray-700 font-semibold mt-1">Happy Travelers</span>
                    </div>
                    <!-- Feature 3: Travel Products -->
                    <div class="flex flex-col items-center text-center px-1">
                        <div class="w-10 h-10 flex items-center justify-center mb-3">
                            <img src="{{ asset('assets/images/icons/6786.svg') }}" alt="">
                        </div>
                        <h4 class="font-heading italic font-bold text-mst-gray text-base leading-tight">50+</h4>
                        <span class="text-[12px] font-heading text-gray-700 font-semibold mt-1">Travel Products</span>
                    </div>
                    <!-- Feature 4: Hotel Partners -->
                    <div class="flex flex-col items-center text-center px-1">
                        <div class="w-10 h-10 flex items-center justify-center mb-3">
                            <img src="{{ asset('assets/images/icons/8789.svg') }}" alt="">
                        </div>
                        <h4 class="font-heading italic font-bold text-mst-gray text-base leading-tight">100+</h4>
                        <span class="text-[12px] font-heading text-gray-700 font-semibold mt-1">Hotel Partners</span>
                    </div>
                    <!-- Feature 5: support -->
                    <div class="flex flex-col items-center text-center px-1">
                        <div class="w-10 h-10 flex items-center justify-center mb-3">
                            <img src="{{ asset('assets/images/icons/support2.svg') }}" alt="">
                        </div>
                        <h4 class="font-heading italic font-bold text-mst-gray text-base leading-tight">24/7</h4>
                        <span class="text-[12px] font-heading text-gray-700 font-semibold mt-1">Contact Support</span>
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
                    <ul class="space-y-2 text-gray-700 text-xs md:text-sm flex-1 font-body">
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
                    <ul class="space-y-2 text-gray-700 text-xs md:text-sm flex-1 font-body">
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
                    <ul class="space-y-2 text-gray-700 text-xs md:text-sm flex-1 font-body">
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
                    <ul class="space-y-2 text-gray-700 text-xs md:text-sm flex-1 font-body">
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
                    <ul class="space-y-2 text-gray-700 text-xs md:text-sm flex-1 font-body">
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
