<section class="flex justify-center items-center border-b-1 border-gray-200">
    <div class="px-4 relative flex min-h-[400px] w-full
                    items-center justify-center overflow-hidden">
        <div class="absolute inset-0 scale-100 bg-cover bg-top bg-no-repeat"
             style="background-image: url('{{ asset('assets/images/pages/1783263792_6a4a7230031f8_image.webp') }}')"
             aria-hidden="true"></div>
        {{--@dump($explore_uae)--}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#ffffff] from-30% to-[#ffffff]/0 to-90%"
             aria-hidden="true"></div>
        <div class="relative z-10 w-full py-14">
            <div class="container mx-auto">
                <div class="text-mst font-bold">terms and conditions</div>
                <h1 class="text-[54px] w-5/12 font-body font-bold not-italic leading-16">
                    Terms & Conditions
                </h1>
                <p class="text-lg mt-5 w-5/12">Important information abouot booking, payments, cancellations, tour,
                                               visas and travel services with Saifco Travel & Tourism</p>
                <div class="flex mt-8 gap-6">
                    <a
                        href="#"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-[#2D9D3E] to-[#1E5E28]
                        hover:from-[#1E5E28] hover:to-[#2D9D3E]
                        px-7 py-3 font-heading text-base italic text-white transition md:text-lg"
                    > <img
                            src="{{ asset('assets/images/icons/whatsapp1.svg') }}"
                            class="ms-1 w-6"
                            width="24"
                            height="24"
                            alt=""
                        > WhatsApp Us </a> <a
                        href="#"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-[#03174C]
                                             px-7 py-3 font-heading text-base italic text-white transition hover:from-mst-dark
                                                                 hover:to-mst md:text-lg"
                    > <img
                            src="{{ asset('assets/images/icons/support6.svg') }}"
                            class="ms-1 w-7 brightness-0 invert"
                            alt=""
                        > Contact Support </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="trust-bar py-12">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="flex items-center gap-4 p-5 bg-white border border-gray-200 rounded-2xl shadow-[0_8px_30px_rgb(0, 0,0,0.02)] transition duration-300 hover:shadow-md">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/17years.svg') }}" alt="Experience Icon" class="w-full h-full object-contain">
                </div>
                <div>
                    <h3 class="font-heading italic font-bold text-mst-gray text-[16px] leading-tight">Since 2008</h3>
                    <p class="font-body text-gray-700 text-xs md:text-sm mt-2 leading-snug">Trusted b thousands of happy
                                                                                            Travelers</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="flex items-center gap-4 p-5 bg-white border border-gray-200 rounded-2xl shadow-[0_8px_30px_rgb(0, 0,0,0.02)] transition duration-300 hover:shadow-md">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/17years.svg') }}" alt="Travelers Icon" class="w-full h-full object-contain">
                </div>
                <div>
                    <h3 class="font-heading italic font-bold text-mst-gray text-[16px] leading-tight">50,000+
                                                                                                      Travelers</h3>
                    <p class="font-body text-gray-700 text-xs md:text-sm mt-2 leading-snug">Successfully served
                                                                                            travelers from around the
                                                                                            world</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="flex items-center gap-4 p-5 bg-white border border-gray-200 rounded-2xl shadow-[0_8px_30px_rgb(0, 0,0,0.02)] transition duration-300 hover:shadow-md">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/247visa.svg') }}" alt="Visa Icon" class="w-full h-full object-contain">
                </div>
                <div>
                    <h3 class="font-heading italic font-bold text-mst-gray text-[16px] leading-tight">Dubai Licensed
                                                                                                      Company</h3>
                    <p class="font-body text-gray-700 text-xs md:text-sm mt-2 leading-snug">Reliable visa support with
                                                                                            100% guidance</p>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="flex items-center gap-4 p-5 bg-white border border-gray-200 rounded-2xl shadow-[0_8px_30px_rgb(0, 0,0,0.02)] transition duration-300 hover:shadow-md">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/checktick.svg') }}" alt="Support Icon" class="w-full h-full object-contain">
                </div>
                <div>
                    <h3 class="font-heading italic font-bold text-mst-gray text-[16px] leading-tight">Secure
                                                                                                      Payment</h3>
                    <p class="font-body text-gray-700 text-xs md:text-sm mt-2 leading-snug">We’re here o help you
                                                                                            anytime, anywhere</p>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- content --}}
<section class="faqs-listing">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-[3fr_9fr] gap-6">
            <div class="tcLeft">
                <div class="border border-gray-200 rounded-2xl sticky top-28 h-fit select-none">
                    <h3 class="bg-mst/10 rounded-t-2xl py-4 px-6 font-heading font-bold text-lg md:text-xl text-mst">
                        On this Page
                    </h3>
                    <nav class="space-y-1 p-6 ">
                        <a href="#introduction" class="flex items-center gap-2 py-2.5 text-sm text-gray-700 hover:text-mst hover:font-bold border-b border-[#EAE5D9]/60 last:border-b-0 transition-colors duration-200">
                            <svg class="w-2.5 h-2.5 text-mst shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <span>Introduction</span>
                        </a>
                        <a href="#booking-confirmation" class="flex items-center gap-2 py-2.5 text-sm text-gray-700 hover:text-mst hover:font-bold border-b border-[#EAE5D9]/60 last:border-b-0 transition-colors duration-200">
                            <svg class="w-2.5 h-2.5 text-mst shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <span>Booking &amp; Confirmation</span>
                        </a>
                        <a href="#pricing-payments" class="flex items-center gap-2 py-2.5 text-sm text-gray-700 hover:text-mst hover:font-bold border-b border-[#EAE5D9]/60 last:border-b-0 transition-colors duration-200">
                            <svg class="w-2.5 h-2.5 text-mst shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <span>Pricing and Payments</span>
                        </a>
                        <a href="#tours-activities" class="flex items-center gap-2 py-2.5 text-sm text-gray-700 hover:text-mst hover:font-bold border-b border-[#EAE5D9]/60 last:border-b-0 transition-colors duration-200">
                            <svg class="w-2.5 h-2.5 text-mst shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <span>Tours &amp; Activities</span>
                        </a>
                        <a href="#desert-safari" class="flex items-center gap-2 py-2.5 text-sm text-gray-700 hover:text-mst hover:font-bold border-b border-[#EAE5D9]/60 last:border-b-0 transition-colors duration-200">
                            <svg class="w-2.5 h-2.5 text-mst shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <span>Desert Safari</span>
                        </a>
                        <a href="#yacht-charter" class="flex items-center gap-2 py-2.5 text-sm text-gray-700 hover:text-mst hover:font-bold border-b border-[#EAE5D9]/60 last:border-b-0 transition-colors duration-200">
                            <svg class="w-2.5 h-2.5 text-mst shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <span>Yacht Charter &amp; Cruises</span>
                        </a>
                        <a href="#visa-services" class="flex items-center gap-2 py-2.5 text-sm text-gray-700 hover:text-mst hover:font-bold border-b border-[#EAE5D9]/60 last:border-b-0 transition-colors duration-200">
                            <svg class="w-2.5 h-2.5 text-mst shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <span>Visa Services</span>
                        </a>
                        <a href="#umrah-services" class="flex items-center gap-2 py-2.5 text-sm text-gray-700 hover:text-mst hover:font-bold border-b border-[#EAE5D9]/60 last:border-b-0 transition-colors duration-200">
                            <svg class="w-2.5 h-2.5 text-mst shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <span>Umrah Services</span>
                        </a>
                        <a href="#customer-responsibilities" class="flex items-center gap-2 py-2.5 text-sm text-gray-700 hover:text-mst hover:font-bold border-b border-[#EAE5D9]/60 last:border-b-0 transition-colors duration-200">
                            <svg class="w-2.5 h-2.5 text-mst shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <span>Customer Responsibilities</span>
                        </a>
                        <a href="#cancellation-refunds" class="flex items-center gap-2 py-2.5 text-sm text-gray-700 hover:text-mst hover:font-bold border-b border-[#EAE5D9]/60 last:border-b-0 transition-colors duration-200">
                            <svg class="w-2.5 h-2.5 text-mst shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <span>Cancellation &amp; Refunds</span>
                        </a>
                        <a href="#third-party-suppliers" class="flex items-center gap-2 py-2.5 text-sm text-gray-700 hover:text-mst hover:font-bold border-b border-[#EAE5D9]/60 last:border-b-0 transition-colors duration-200">
                            <svg class="w-2.5 h-2.5 text-mst shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <span>Third-Party Suppliers</span>
                        </a>
                        <a href="#limitation-liability" class="flex items-center gap-2 py-2.5 text-sm text-gray-700 hover:text-mst hover:font-bold border-b border-[#EAE5D9]/60 last:border-b-0 transition-colors duration-200">
                            <svg class="w-2.5 h-2.5 text-mst shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <span>Limitation of Liability</span>
                        </a>
                        <a href="#force-majeure" class="flex items-center gap-2 py-2.5 text-sm text-gray-700 hover:text-mst hover:font-bold border-b border-[#EAE5D9]/60 last:border-b-0 transition-colors duration-200">
                            <svg class="w-2.5 h-2.5 text-mst shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <span>Force Majeure</span>
                        </a>
                        <a href="#intellectual-property" class="flex items-center gap-2 py-2.5 text-sm text-gray-700 hover:text-mst hover:font-bold border-b border-[#EAE5D9]/60 last:border-b-0 transition-colors duration-200">
                            <svg class="w-2.5 h-2.5 text-mst shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <span>Intellectual Property</span>
                        </a>
                        <a href="#website-usage" class="flex items-center gap-2 py-2.5 text-sm text-gray-700 hover:text-mst hover:font-bold border-b border-[#EAE5D9]/60 last:border-b-0 transition-colors duration-200">
                            <svg class="w-2.5 h-2.5 text-mst shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <span>Website Usage</span>
                        </a>
                        <a href="#governing-law" class="flex items-center gap-2 py-2.5 text-sm text-gray-700 hover:text-mst hover:font-bold border-b border-[#EAE5D9]/60 last:border-b-0 transition-colors duration-200">
                            <svg class="w-2.5 h-2.5 text-mst shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <span>Governing Law</span>
                        </a>
                        <a href="#contact-us" class="flex items-center gap-2 py-2.5 text-sm text-gray-700 hover:text-mst hover:font-bold border-b border-[#EAE5D9]/60 last:border-b-0 transition-colors duration-200">
                            <svg class="w-2.5 h-2.5 text-mst shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <span>Contact Us</span>
                        </a>
                    </nav>
                </div>
            </div>
            <div class="tcRight space-y-6 bg-gray-50 rounded-2xl p-6 border border-gray-200">
                <!-- Header -->
                <div class="mb-6">
                    <div class="font-heading font-bold italic text-lg">Last Updated: <span class="text-mst">June2026</span></div>
                    <p class="font-body text-gray-700 text-sm mt-3 leading-relaxed">
                        Welcome to Saifco Travel &amp; Tourism LLC. By using our website, booking our services, or communicating with us, you agree to be bound by the following Terms &amp; Conditions. Please read them carefully.
                    </p>
                    <div class="border-b border-mst my-6"></div>
                </div>

                <!-- 17 Points -->
                <div class="space-y-8 pb-10">
                    <!-- Point 1 -->
                    <div id="introduction" class="tc-section flex items-start gap-4 scroll-mt-24">
                        <div class="text-sm font-medium text-mst shrink-0 w-6">1.</div>
                        <div class="space-y-1">
                            <h4 class="font-body text-sm font-medium text-gray-800 leading-tight">Introduction</h4>
                            <p class="font-body text-sm text-gray-700 leading-relaxed">
                                Saifco Travel &amp; Tourism LLC is a Dubai-based travel and tourism company offering tours, visa services, Umrah packages, hotel bookings, transportation, yacht charters and other travel-related services.
                            </p>
                        </div>
                    </div>

                    <!-- Point 2 -->
                    <div id="booking-confirmation" class="tc-section flex items-start gap-4 scroll-mt-24">
                        <div class="text-sm font-medium text-mst shrink-0 w-6">2.</div>
                        <div class="space-y-1">
                            <h4 class="font-body text-sm font-medium text-gray-800 leading-tight">Booking &amp; Confirmation</h4>
                            <p class="font-body text-sm text-gray-700 leading-relaxed">
                                All bookings are subject to availability. A booking is confirmed only after we receive payment and issue a confirmation. Customers must provide accurate personal and travel details.
                            </p>
                        </div>
                    </div>

                    <!-- Point 3 -->
                    <div id="pricing-payments" class="tc-section flex items-start gap-4 scroll-mt-24">
                        <div class="text-sm font-medium text-mst shrink-0 w-6">3.</div>
                        <div class="space-y-1">
                            <h4 class="font-body text-sm font-medium text-gray-800 leading-tight">Pricing &amp; Payments</h4>
                            <p class="font-body text-sm text-gray-700 leading-relaxed">
                                All prices are in AED unless stated otherwise. Prices may change without prior notice until confirmed. Payments can be made via card, bank transfer, payment links or other approved methods.
                            </p>
                        </div>
                    </div>

                    <!-- Point 4 -->
                    <div id="tours-activities" class="tc-section flex items-start gap-4 scroll-mt-24">
                        <div class="text-sm font-medium text-mst shrink-0 w-6">4.</div>
                        <div class="space-y-1">
                            <h4 class="font-body text-sm font-medium text-gray-800 leading-tight">Tours &amp; Activities</h4>
                            <p class="font-body text-sm text-gray-700 leading-relaxed">
                                Tour schedules, itineraries and timings are approximate and may change due to traffic, weather, operational or seasonal reasons. We reserve the right to modify or cancel any tour for safety reasons.
                            </p>
                        </div>
                    </div>

                    <!-- Point 5 -->
                    <div id="desert-safari" class="tc-section flex items-start gap-4 scroll-mt-24">
                        <div class="text-sm font-medium text-mst shrink-0 w-6">5.</div>
                        <div class="space-y-1">
                            <h4 class="font-body text-sm font-medium text-gray-800 leading-tight">Desert Safari Activities</h4>
                            <p class="font-body text-sm text-gray-700 leading-relaxed">
                                Activities may include dune bashing, camel riding, sandboarding and more. Participation is at your own risk. Not recommended for pregnant women, guests with heart conditions, back or neck problems, or other medical conditions.
                            </p>
                        </div>
                    </div>

                    <!-- Point 6 -->
                    <div id="yacht-charter" class="tc-section flex items-start gap-4 scroll-mt-24">
                        <div class="text-sm font-medium text-mst shrink-0 w-6">6.</div>
                        <div class="space-y-1">
                            <h4 class="font-body text-sm font-medium text-gray-800 leading-tight">Yacht Tours &amp; Cruises</h4>
                            <p class="font-body text-sm text-gray-700 leading-relaxed">
                                Please arrive before the reporting time. Late arrivals or no-shows may not be eligible for refunds. Shared yacht tours operate on fixed schedules and cannot be delayed for late passengers.
                            </p>
                        </div>
                    </div>

                    <!-- Point 7 -->
                    <div id="visa-services" class="tc-section flex items-start gap-4 scroll-mt-24">
                        <div class="text-sm font-medium text-mst shrink-0 w-6">7.</div>
                        <div class="space-y-1">
                            <h4 class="font-body text-sm font-medium text-gray-800 leading-tight">Visa Services</h4>
                            <p class="font-body text-sm text-gray-700 leading-relaxed">
                                We assist with visa applications but do not issue visas. Visa approval is at the sole discretion of immigration authorities. Visa fees and service charges are non-refundable once the application is submitted.
                            </p>
                        </div>
                    </div>

                    <!-- Point 8 -->
                    <div id="umrah-services" class="tc-section flex items-start gap-4 scroll-mt-24">
                        <div class="text-sm font-medium text-mst shrink-0 w-6">8.</div>
                        <div class="space-y-1">
                            <h4 class="font-body text-sm font-medium text-gray-800 leading-tight">Umrah Services</h4>
                            <p class="font-body text-sm text-gray-700 leading-relaxed">
                                Umrah packages may include visa, transport, accommodation and other services. Customers must ensure they meet all travel requirements. Hotel allocations are subject to availability.
                            </p>
                        </div>
                    </div>

                    <!-- Point 9 -->
                    <div id="customer-responsibilities" class="tc-section flex items-start gap-4 scroll-mt-24">
                        <div class="text-sm font-medium text-mst shrink-0 w-6">9.</div>
                        <div class="space-y-1">
                            <h4 class="font-body text-sm font-medium text-gray-800 leading-tight">Customer Responsibilities</h4>
                            <p class="font-body text-sm text-gray-700 leading-relaxed">
                                Customers agree to provide accurate information, follow local laws, follow instructions from our staff and service providers, and reserve the right to refuse service for inappropriate or unlawful behavior.
                            </p>
                        </div>
                    </div>

                    <!-- Point 10 -->
                    <div id="cancellation-refunds" class="tc-section flex items-start gap-4 scroll-mt-24">
                        <div class="text-sm font-medium text-mst shrink-0 w-6">10.</div>
                        <div class="space-y-1">
                            <h4 class="font-body text-sm font-medium text-gray-800 leading-tight">Cancellation &amp; Refunds</h4>
                            <p class="font-body text-sm text-gray-700 leading-relaxed">
                                Cancellation and refund policies vary by service and are communicated during booking. No refunds for no-shows, missed departures, missed flights, or failure to provide required documents.
                            </p>
                        </div>
                    </div>

                    <!-- Point 11 -->
                    <div id="third-party-suppliers" class="tc-section flex items-start gap-4 scroll-mt-24">
                        <div class="text-sm font-medium text-mst shrink-0 w-6">11.</div>
                        <div class="space-y-1">
                            <h4 class="font-body text-sm font-medium text-gray-800 leading-tight">Third-Party Suppliers</h4>
                            <p class="font-body text-sm text-gray-700 leading-relaxed">
                                Many services are operated by third-party suppliers. Saifco is not liable for acts, omissions, delays or service failures of those suppliers.
                            </p>
                        </div>
                    </div>

                    <!-- Point 12 -->
                    <div id="limitation-liability" class="tc-section flex items-start gap-4 scroll-mt-24">
                        <div class="text-sm font-medium text-mst shrink-0 w-6">12.</div>
                        <div class="space-y-1">
                            <h4 class="font-body text-sm font-medium text-gray-800 leading-tight">Limitation of Liability</h4>
                            <p class="font-body text-sm text-gray-700 leading-relaxed">
                                Saifco shall not be liable for any indirect losses, personal injury, property damage, flight delays, or other losses beyond our control. Our liability is limited to the amount paid for the booking.
                            </p>
                        </div>
                    </div>

                    <!-- Point 13 -->
                    <div id="force-majeure" class="tc-section flex items-start gap-4 scroll-mt-24">
                        <div class="text-sm font-medium text-mst shrink-0 w-6">13.</div>
                        <div class="space-y-1">
                            <h4 class="font-body text-sm font-medium text-gray-800 leading-tight">Force Majeure</h4>
                            <p class="font-body text-sm text-gray-700 leading-relaxed">
                                We shall not be liable for delays or failures due to events beyond our control including natural disasters, severe weather, government actions, pandemics, political unrest, or transportation disruptions.
                            </p>
                        </div>
                    </div>

                    <!-- Point 14 -->
                    <div id="intellectual-property" class="tc-section flex items-start gap-4 scroll-mt-24">
                        <div class="text-sm font-medium text-mst shrink-0 w-6">14.</div>
                        <div class="space-y-1">
                            <h4 class="font-body text-sm font-medium text-gray-800 leading-tight">Intellectual Property</h4>
                            <p class="font-body text-sm text-gray-700 leading-relaxed">
                                All content on this website including text, logos, images and designs is the property of Saifco Travel &amp; Tourism LLC. Unauthorized use or reproduction is prohibited.
                            </p>
                        </div>
                    </div>

                    <!-- Point 15 -->
                    <div id="website-usage" class="tc-section flex items-start gap-4 scroll-mt-24">
                        <div class="text-sm font-medium text-mst shrink-0 w-6">15.</div>
                        <div class="space-y-1">
                            <h4 class="font-body text-sm font-medium text-gray-800 leading-tight">Website Usage</h4>
                            <p class="font-body text-sm text-gray-700 leading-relaxed">
                                You agree not to use this website for any unlawful purpose, attempt unauthorized access, or interfere with the website's functionality or security.
                            </p>
                        </div>
                    </div>

                    <!-- Point 16 -->
                    <div id="governing-law" class="tc-section flex items-start gap-4 scroll-mt-24">
                        <div class="text-sm font-medium text-mst shrink-0 w-6">16.</div>
                        <div class="space-y-1">
                            <h4 class="font-body text-sm font-medium text-gray-800 leading-tight">Governing Law</h4>
                            <p class="font-body text-sm text-gray-700 leading-relaxed">
                                These Terms &amp; Conditions are governed by the laws of the United Arab Emirates. Any disputes shall be subject to the jurisdiction of the courts of Dubai.
                            </p>
                        </div>
                    </div>

                    <!-- Point 17 -->
                    <div id="contact-us" class="tc-section flex items-start gap-4 scroll-mt-24">
                        <div class="text-sm font-medium text-mst shrink-0 w-6">17.</div>
                        <div class="space-y-1">
                            <h4 class="font-body text-sm font-medium text-gray-800 leading-tight">Contact Us</h4>
                            <p class="font-body text-sm text-gray-700 leading-relaxed">
                                If you have any questions regarding these Terms &amp; Conditions, please contact us using the details below.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- contact bar --}}
<section class="contactBar pb-5 pt-14 bg-white">
    <div class="container mx-auto">
        <div class="bg-gray-50 rounded-lg p-6 md:p-8 flex flex-col lg:flex-row items-center justify-between gap-6
        w-11/12 mx-auto">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/support2.svg') }}"
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
{{-- related services --}}
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
            <a href="{{ url('/desert-safari-tours') }}" class="group flex flex-col items-center text-center p-4
             bg-gray-50
            border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-16 h-16 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/desert.svg') }}" class="w-full h-full object-contain" alt="Desert Safari">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                                duration-200">Desert <span class="text-mst">Safari</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Experience thrilling desert adventure</p>
            </a>
            <!-- Card 2: Yacht Charter -->
            <a href="{{ url('/yacht-charter-tours') }}" class="group flex flex-col items-center text-center p-4
                         bg-gray-50
                        border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/yacht.svg') }}" class="w-full h-full object-contain" alt="Yacht Charter">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                duration-200">Yacht <span class="text-mst">Charter</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Luxury yachts for unforgettable moments</p>
            </a>
            <!-- Card 3: Umrah Packages -->
            <a href="{{ url('/umrah') }}" class="group flex flex-col items-center text-center p-4
                         bg-gray-50
                        border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/umrah.svg') }}" class="w-full h-full object-contain" alt="Umrah Packages">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                duration-200">Umrah <span class="text-mst">Packages</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Spiritual journeys made easy</p>
            </a>
            <!-- Card 4: UAE Visa -->
            <a href="{{ url('/uae-visa') }}" class="group flex flex-col items-center text-center p-4
                         bg-gray-50
                        border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/visa.svg') }}" class="w-full h-full object-contain" alt="UAE Visa">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                duration-200">UAE <span class="text-mst">Visa</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Hassle-free visa support & processing</p>
            </a>
            <!-- Card 5: Abu Dhabi Tours -->
            <a href="{{ url('/abu-dhabi-tours') }}" class="group flex flex-col items-center text-center p-4
                         bg-gray-50
                        border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/abu.svg') }}" class="w-full h-full object-contain" alt="Abu Dhabi Tours">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                duration-200">Abu Dhabi <span class="text-mst">Tours</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Explore Abu Dhabi's top attractions</p>
            </a>
            <!-- Card 6: Holiday Packages -->
            <a href="{{ url('/holiday-packages') }}" class="group flex flex-col items-center text-center p-4
                         bg-gray-50
                        border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/holiday.svg') }}" class="w-full h-full object-contain" alt="Holiday Packages">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                duration-200">Holiday <span class="text-mst">Packages</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Perfect getaways for everyone</p>
            </a>
        </div>
    </div>
</section>
{{-- seo tags --}}
<section class="pb-14">
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
<section class="seoGlobe py-10 bg-white border-t border-[#F0F0F0]">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-8">
            <div class="w-16 h-16 md:w-20 md:h-20 flex-shrink-0 flex items-center justify-center">
                <img src="{{ asset('assets/images/icons/glob.svg') }}" class="w-full h-full object-contain" alt="Globe">
            </div>
            <div class="flex-1 text-center md:text-left">
                <p class="font-body text-gray-700 text-sm md:text-base leading-relaxed">
                    Saifco Travels & Tourism offers reliable and affordable travel packages across UAE and beyond. From
                    desert safaris, yacht tours, and city sightseeing to Umrah packages and visa services, we provide
                    unforgettable experiences with professional support every step of the way.
                </p>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sections = document.querySelectorAll('.tc-section');
        const navLinks = document.querySelectorAll('nav a');

        const observerOptions = {
            root: null,
            rootMargin: '-10% 0px -70% 0px',
            threshold: 0
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const activeId = entry.target.getAttribute('id');

                    navLinks.forEach(link => {
                        const href = link.getAttribute('href');
                        if (href === `#${activeId}`) {
                            link.classList.add('text-mst', 'font-bold');
                            link.classList.remove('text-gray-700');
                        } else {
                            link.classList.remove('text-mst', 'font-bold');
                            link.classList.add('text-gray-700');
                        }
                    });
                }
            });
        }, observerOptions);

        sections.forEach(section => {
            observer.observe(section);
        });

        // Optional: fallback scrollspy if intersection observer does not trigger
        window.addEventListener('scroll', () => {
            if (window.scrollY < 100) {
                navLinks.forEach((link, idx) => {
                    if (idx === 0) {
                        link.classList.add('text-mst', 'font-bold');
                        link.classList.remove('text-gray-700');
                    } else {
                        link.classList.remove('text-mst', 'font-bold');
                        link.classList.add('text-gray-700');
                    }
                });
            }
        });
    });
</script>
