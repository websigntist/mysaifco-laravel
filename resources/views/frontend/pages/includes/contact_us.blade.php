<section class="flex justify-center items-center border-b-1 border-gray-200">
    <div class="px-4 relative flex min-h-[400px] w-full
                    items-center justify-center overflow-hidden">
        <div class="absolute inset-0 scale-100 bg-cover bg-top bg-no-repeat"
             style="background-image: url('{{ asset('assets/images/pages/1782765765_6a42d8c5e0c42_image.webp') }}')"
             aria-hidden="true"></div>
        {{--@dump($explore_uae)--}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#ffffff]/90 to-[#ffffff]/0" aria-hidden="true"></div>
        <div class="relative z-10 w-full py-14">
            <div class="container mx-auto">
                <div class="text-mst font-bold">CONTACT US</div>
                <h1 class="text-[54px] w-6/12 font-body font-bold not-italic leading-16">
                    Plan Your Perfect <br class="hidden md:block"> <span class="text-mst">Dubai Journey</span> With Us
                </h1>
                <p class="text-lg mt-5 w-5/12">Have a question or need help planning your trip? Our travel experts are
                                               ready to assist you with the best travel solutions in Dubai and
                                               beyond.</p>
                <div class="flex mt-8 gap-6">
                    <a
                        href="#"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                                            px-7 py-3 font-heading text-base italic text-white transition hover:from-mst-dark
                                             hover:to-mst md:text-lg"
                    > <img
                            src="{{ asset('assets/images/icons/phone1.svg') }}"
                            class="ms-1 w-6 brightness-0 invert"
                            width="24"
                            height="24"
                            alt=""
                        > Contact Now </a> <a
                        href="#"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-[#2D9D3E] to-[#1E5E28]
                                            px-7 py-3 font-heading text-base italic text-white transition hover:from-mst-dark
                                             hover:to-mst md:text-lg"
                    > <img
                            src="{{ asset('assets/images/icons/whatsapp1.svg') }}"
                            class="ms-1 w-6"
                            width="24"
                            height="24"
                            alt=""
                        > WhatsApp </a> <a
                        href="#"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-[#03174C]
                         px-7 py-3 font-heading text-base italic text-white transition hover:from-mst-dark
                                             hover:to-mst md:text-lg"
                    > <img
                            src="{{ asset('assets/images/icons/email1.svg') }}"
                            class="ms-1 w-5 brightness-0 invert"
                            width="24"
                            height="24"
                            alt=""
                        > Email Us </a>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- contact details --}}
<section class="contactDetails pt-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 lg:gap-0 divide-y lg:divide-y-0 lg:divide-x lg:divide-gray-200">
            <!-- Col 1: Our Office -->
            <div class="flex gap-4 first:pt-0">
                <img src="{{ asset('assets/images/icons/pin1.svg') }}" class="w-10 h-10 flex-shrink-0 object-contain" alt="Our Office">
                <div class="space-y-2">
                    <h3 class="font-heading font-bold text-lg italic text-mst-gray leading-none">Our Office</h3>
                    <div class="font-body font-medium text-sm text-mst-gray leading-relaxed">
                        <p>Saifco Travel & Tourism LLC</p>
                        <p>Office 5, Babra Building 10t Street, Deira</p>
                        <p>Dubai, UAE</p>
                    </div>
                </div>
            </div>
            <!-- Col 2: Phone -->
            <div class="flex gap-4 lg:px-6 pt-6 lg:pt-0">
                <img src="{{ asset('assets/images/icons/phone2.svg') }}" class="w-10 h-10 flex-shrink-0
                object-contain" alt="Phone">
                <div class="space-y-2">
                    <h3 class="font-heading font-bold text-lg italic text-mst-gray leading-none">Phone</h3>
                    <div class="font-body font-medium text-sm text-mst-gray leading-relaxed">
                        <p><a href="#">+971 4 2733868</a></p>
                        <p>Call us anytime</p>
                    </div>
                </div>
            </div>
            <!-- Col 3: WhatsApp -->
            <div class="flex gap-4 lg:px-6 pt-6 lg:pt-0">
                <img src="{{ asset('assets/images/icons/whatsapp2.svg') }}" class="w-10 h-10 flex-shrink-0
                object-contain" alt="WhatsApp">
                <div class="space-y-2">
                    <h3 class="font-heading font-bold text-lg italic text-mst-gray leading-none">WhatsApp</h3>
                    <div class="font-body font-medium text-sm text-mst-gray leading-relaxed">
                        <p><a href="#" target="_blank">+971 50 5593840</a></p>
                        <p><a href="#" target="_blank">+971 55 6337710</a></p>
                        <p>24/7 Support Available</p>
                    </div>
                </div>
            </div>
            <!-- Col 4: Email -->
            <div class="flex gap-4 lg:px-6 pt-6 lg:pt-0">
                <img src="{{ asset('assets/images/icons/email2.svg') }}" class="w-10 h-10 flex-shrink-0 object-contain" alt="Email">
                <div class="space-y-2">
                    <h3 class="font-heading font-bold text-lg italic text-mst-gray leading-none">Email</h3>
                    <div class="font-body font-medium text-sm text-mst-gray leading-relaxed">
                        <p><a href="mailto:info@mysaifco.com">info@mysaifco.com</a></p>
                        <p class="text-xs text-gray-400 mt-1">We reply within 30 mins</p>
                    </div>
                </div>
            </div>
            <!-- Col 5: Working Hours -->
            <div class="flex gap-4 lg:px-6 pt-6 lg:pt-0">
                <img src="{{ asset('assets/images/icons/clock2.svg') }}" class="w-10 h-10 flex-shrink-0
                object-contain" alt="Working Hours">
                <div class="space-y-2">
                    <h3 class="font-heading font-bold text-lg italic text-mst-gray leading-none">Working Hours</h3>
                    <div class="font-body font-medium text-sm text-mst-gray leading-relaxed">
                        <p>Mon - Sat: 9 AM - 6 PM</p>
                        <p>24/7 WhatsApp Support</p>
                        <p>Sunday Closed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- contact form --}}
<section class="contactForm py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
            <!-- Left Side: Map and We Can Help You With -->
            <div class="lg:col-span-6 flex flex-col justify-between h-full">
                <!-- Map wrapper -->
                <div class="w-full h-[410px] rounded-2xl overflow-hidden relative mb-8">
                    <iframe class="w-full h-full border-0"
                            src="https://maps.google.com/maps?q=Saifco%20Travel%20%26%20Tourism%20LLC%20Office%205,%20Babra%2520Building,%2010th%20Street,%20Deira,%20Dubai,%20UAE&t=&z=15&ie=UTF8&iwloc=&output=embed"
                            allowfullscreen=""
                            loading="lazy"></iframe>
                </div>
                <!-- We Can Help You With -->
                <div>
                    <h2 class="font-heading font-bold text-2xl text-mst-gray mb-6 italic">
                        We Can Help <span class="text-mst">You With</span>
                    </h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <!-- Dubai Tours -->
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/4324.svg') }}" class="w-6 h-6 object-contain" alt="Dubai Tours">
                            <span class="font-heading font-bold text-xs text-mst-gray mt-2">Dubai Tours</span>
                        </div>
                        <!-- Desert Safari -->
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/jeep.svg') }}" class="w-7 h-7 object-contain" alt="Desert Safari">
                            <span class="font-heading font-bold text-xs text-mst-gray mt-1">Desert Safari</span>
                        </div>
                        <!-- Umrah Packages -->
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/4234.svg') }}" class="w-6 h-6 object-contain" alt="Umrah Packages">
                            <span class="font-heading font-bold text-xs text-mst-gray">Umrah Packages</span>
                        </div>
                        <!-- UAE Visa -->
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/234.svg') }}" class="w-6 h-6 object-contain" alt="UAE Visa">
                            <span class="font-heading font-bold text-xs text-mst-gray">UAE Visa</span>
                        </div>
                        <!-- Hotel Booking -->
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/8789.svg') }}" class="w-6 h-6 object-contain" alt="Hotel Booking">
                            <span class="font-heading font-bold text-xs text-mst-gray">Hotel Booking</span>
                        </div>
                        <!-- Airline Tickets -->
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/plan2.svg') }}" class="w-6 h-6 object-contain mt-1" alt="Airline Tickets">
                            <span class="font-heading font-bold text-xs text-mst-gray">Airline Tickets</span>
                        </div>
                        <!-- Yacht Rental -->
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/ship2.svg') }}" class="w-6 h-6 object-contain" alt="Yacht Rental">
                            <span class="font-heading font-bold text-xs text-mst-gray">Yacht Rental</span>
                        </div>
                        <!-- Holiday Packages -->
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/4533.svg') }}" class="w-6 h-6 object-contain" alt="Holiday Packages">
                            <span class="font-heading font-bold text-xs text-mst-gray">Holiday Packages</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right Side: Contact Form Card -->
            <div class="lg:col-span-6 bg-gray-50 border border-gray-200 rounded-4xl p-6 md:p-8">
                <h2 class="font-heading font-bold text-xl text-mst-gray italic mb-1 leading-tight">
                    Request a Callback or <span class="text-mst">Travel Consultation</span>
                </h2>
                <p class="font-body font-medium text-sm text-gray-600 mb-4">
                    Find out the form below and our travel expert will get back to you.
                </p>
                <!-- Laravel Form -->
                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="font-medium text-sm text-mst-gray block mb-2">First
                                                                                                         Name</label>
                            <input type="text" id="first_name" name="first_name" required placeholder="Enter your first name"
                                   class="w-full px-4 py-3 rounded-lg bg-gray-100 text-sm focus:outline-none">
                        </div>
                        <!-- Email Address -->
                        <div>
                            <label for="email" class="font-medium text-sm text-mst-gray block mb-2">Email
                                                                                                    Address</label>
                            <input type="email" id="email" name="email" required placeholder="Enter your email address"
                                   class="w-full px-4 py-3 rounded-lg bg-gray-100 text-sm focus:outline-none">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Phone -->
                        <div>
                            <label for="phone" class="font-medium text-sm text-mst-gray block mb-2">Phone</label>
                            <input type="text" id="phone" name="phone" required placeholder="Phone number here"
                                   class="w-full px-4 py-3 rounded-lg bg-gray-100 text-sm focus:outline-none">
                        </div>
                        <!-- Subject -->
                        <div>
                            <label for="subject" class="font-medium text-sm text-mst-gray block mb-2">Subject</label>
                            <select id="subject" name="subject" required
                                    class="w-full px-4 py-3 rounded-lg bg-gray-100 text-sm focus:outline-none">
                                <option value="">Select a Subject</option>
                                <option value="Dubai Tours">Dubai Tours</option>
                                <option value="Desert Safari">Desert Safari</option>
                                <option value="Umrah Packages">Umrah Packages</option>
                                <option value="UAE Visa">UAE Visa</option>
                                <option value="Hotel Booking">Hotel Booking</option>
                                <option value="Airline Tickets">Airline Tickets</option>
                                <option value="Yacht Rental">Yacht Rental</option>
                                <option value="Holiday Packages">Holiday Packages</option>
                            </select>
                        </div>
                    </div>
                    <!-- Your Message -->
                    <div>
                        <label for="message" class="font-medium text-sm text-mst-gray block mb-2">Your Message *</label>
                        <textarea id="message" name="message" required placeholder="How can we help you?"
                                  class="w-full px-4 py-3 rounded-lg bg-gray-100 text-sm focus:outline-none"></textarea>
                    </div>
                    <!-- Checkbox agreement -->
                    <div class="flex items-start gap-3 py-2">
                        <input type="checkbox" id="agreement" name="agreement" required
                               class="w-4 h-4 mt-0.5 rounded border-gray-300 text-[#BA9B31] focus:ring-[#BA9B31] cursor-pointer">
                        <label for="agreement" class="font-body text-sm text-mst-gray cursor-pointer select-none"> I
                                                                                                                   agree
                                                                                                                   to
                                                                                                                   the
                            <a href="#" class="text-mst hover:underline">Privacy Policy</a> and
                            <a href="#" class="text-mst hover:underline">Terms & Conditions</a> </label>
                    </div>
                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                                class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-[#BA9B31] to-[#74611E] px-8 py-3.5 rounded-full
                                text-white font-heading italic text-base md:text-lg hover:from-[#74611E]
                                hover:to-[#BA9B31] transition duration-300 group">
                            <span>Send Message</span>
                            <svg class="w-4 h-4 text-white group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- md message -->
<section class="md__msg mb-20">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
            <!-- Left Side: MD Photo & Message (lg:col-span-8) -->
            <div class="lg:col-span-8 flex flex-col md:flex-row gap-8 items-center md:items-start">
                <!-- MD Photo -->
                <img src="{{ asset('assets/images/asim2.png') }}" alt="Asim Rehman" class="w-80 h-auto object-cover">
                <!-- MD Message content -->
                <div class="flex-1 space-y-4 text-center md:text-left">
                    <h2 class="font-heading font-bold text-xl normal-case italic text-mst-gray leading-tight">
                        A message from our <span class="text-mst">Managing Director</span>
                    </h2>
                    <div class="text-mst-gray text-sm leading-relaxed space-y-4">
                        <p>
                            Since 2008, Saifco Travel & Tourism has been committed to creating unforgettable travel
                            experiences for our clients. Our mission is to provide reliable, transparent, and
                            personalized travel services with the highest level of professionalism.
                        </p>
                        <p>
                            We look forward to helping you plan your next journey.
                        </p>
                    </div>
                    <div class="pt-2 text-mst-gray text-sm leading-relaxed">
                        <h4 class="font-heading font-bold text-lg md:text-xl italic text-mst-gray">Asim Rehman</h4>
                        <p>Founder & Managing Director</p>
                        <p>Saifco Travel & Tourism LLC.</p>
                    </div>
                </div>
            </div>
            <!-- Right Side: Dark Credentials Card (lg:col-span-4) -->
            <div class="lg:col-span-4 bg-[#222222] text-white rounded-3xl py-4 px-6 flex flex-col justify-between">
                <!-- Header of the credentials list -->
                <div class="flex items-center gap-4 mb-2">
                    <!-- Icon Badge -->
                    <img src="{{ asset('assets/images/icons/badge2.svg') }}" class="w-7 h-7 object-contain" alt="Licensed">
                    <div>
                        <h3 class="font-heading text-white text-[16px] w-40 font-bold leading-6">Licensed Dubai Travel Company</h3>
                    </div>
                </div>
                <!-- Vertical list of 6 credentials -->
                <div class="space-y-1">
                    <!-- Item 1: Trade License -->
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('assets/images/icons/license.svg') }}" class="w-7 h-7 object-contain" alt="Licensed">
                        <span class="font-body text-sm text-white">Trade License No. 1205447</span>
                    </div>
                    <!-- Item 2: Dubai Chamber Member -->
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('assets/images/icons/chamber.svg') }}" class="w-6 h-6 object-contain" alt="Licensed">
                        <span class="font-body text-sm text-white">Dubai Chamber Member</span>
                    </div>
                    <!-- Item 3: Operating since 2008 -->
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('assets/images/icons/3dcalender.svg') }}" class="w-6 h-6 object-contain" alt="Licensed">
                        <span class="font-body text-sm text-white">Operating since 2008</span>
                    </div>
                    <!-- Item 4: 50,000+ Happy Travelers -->
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('assets/images/icons/star.svg') }}" class="w-6 h-6 object-contain" alt="Licensed">
                        <span class="font-body text-sm text-white">50,000+ Happy Travelers</span>
                    </div>
                    <!-- Item 5: 4.9 Google Rating -->
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('assets/images/icons/gicon.svg') }}" class="w-6 h-6 object-contain" alt="Licensed">
                        <span class="font-body text-sm text-white">4.9 Google Rating</span>
                    </div>
                    <!-- Item 6: 24/7 Customer Support -->
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('assets/images/icons/ticket.svg') }}" class="w-6 h-6 object-contain" alt="Licensed">
                        <span class="font-body text-sm text-white">24/7 Customer Support</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FAQs section --}}
@include('frontend.components.tour_faqs')

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
