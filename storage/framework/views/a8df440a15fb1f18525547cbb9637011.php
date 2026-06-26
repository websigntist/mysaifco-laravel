<section class="flex justify-center items-center border-b-1 border-gray-200">
    <div class="px-4 relative flex min-h-[400px] w-full
                    items-center justify-center overflow-hidden">
        <div class="absolute inset-0 scale-100 bg-cover bg-top bg-no-repeat"
             style="background-image: url('<?php echo e(asset('assets/images/pages/1782415698_6a3d81521a2b6_image.webp')); ?>')"
             aria-hidden="true"></div>
        
        <div class="absolute inset-0 bg-gray-950/50" aria-hidden="true"></div>
        <div class="relative z-10 w-full py-14">
            <div class="container mx-auto">
                <h1 class="text-white text-[54px] font-body not-italic w-7/12 leading-16">Travel Help & Frequently Asked
                                                                            Questions</h1>
                <p class="text-white text-lg w-6/12 mt-5">
                    Quick answers to the most common questions about Dubai tours, desert safaris, Umrah packages, UAE visas and holiday bookings.</p>
            </div>
        </div>
    </div>
</section>

<section class="trust-bar py-12 bg-[#FDFDFD]">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="flex items-center gap-4 p-5 bg-white border border-[#EAEAEA] rounded-[20px] shadow-[0_8px_30px_rgb(0,0,0,0.02)] transition duration-300 hover:shadow-md">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="<?php echo e(asset('assets/images/icons/17years.svg')); ?>" alt="Experience Icon" class="w-full h-full object-contain">
                </div>
                <div>
                    <h3 class="font-heading italic font-bold text-mst-gray text-[17px] md:text-[18px] leading-tight">17 + Years Experience</h3>
                    <p class="font-body text-gray-500 text-xs md:text-sm mt-1 leading-snug">Trusted by thousands of happy Travelers</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="flex items-center gap-4 p-5 bg-white border border-[#EAEAEA] rounded-[20px] shadow-[0_8px_30px_rgb(0,0,0,0.02)] transition duration-300 hover:shadow-md">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="<?php echo e(asset('assets/images/icons/17years.svg')); ?>" alt="Travelers Icon" class="w-full h-full object-contain">
                </div>
                <div>
                    <h3 class="font-heading italic font-bold text-mst-gray text-[17px] md:text-[18px] leading-tight">50,000+ Travelers Served</h3>
                    <p class="font-body text-gray-500 text-xs md:text-sm mt-1 leading-snug">Successfully served travelers from around the world</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="flex items-center gap-4 p-5 bg-white border border-[#EAEAEA] rounded-[20px] shadow-[0_8px_30px_rgb(0,0,0,0.02)] transition duration-300 hover:shadow-md">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="<?php echo e(asset('assets/images/icons/247visa.svg')); ?>" alt="Visa Icon" class="w-full h-full object-contain">
                </div>
                <div>
                    <h3 class="font-heading italic font-bold text-mst-gray text-[17px] md:text-[18px] leading-tight">24/7 Visa Assistance</h3>
                    <p class="font-body text-gray-500 text-xs md:text-sm mt-1 leading-snug">Reliable visa support with 100% guidance</p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="flex items-center gap-4 p-5 bg-white border border-[#EAEAEA] rounded-[20px] shadow-[0_8px_30px_rgb(0,0,0,0.02)] transition duration-300 hover:shadow-md">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="<?php echo e(asset('assets/images/icons/support2.svg')); ?>" alt="Support Icon" class="w-full h-full object-contain">
                </div>
                <div>
                    <h3 class="font-heading italic font-bold text-mst-gray text-[17px] md:text-[18px] leading-tight">24/7 Customer Support</h3>
                    <p class="font-body text-gray-500 text-xs md:text-sm mt-1 leading-snug">We're here to help you anytime, anywhere</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="faqs-listing">
    <div class="container mx-auto">
         <div class="grid grid-cols-1 md:grid-cols-[3fr_9fr] gap-6">
             <div class="faqLeftColumn">
                 <div class="flex flex-col gap-6">
                     <!-- Categories List Card -->
                     <div class="bg-white border border-[#EAEAEA] rounded-[20px] p-5 shadow-[0_8px_30px_rgb(0,0,0,0.01)]">
                         <h2 class="font-heading italic font-bold text-mst-gray text-xl mb-4 px-2">Categories</h2>
                         <div class="flex flex-col gap-1" id="faq-categories-list">
                             <!-- Category Item 1 -->
                             <button class="faq-cat-btn active flex items-center gap-3 w-full text-left px-3 py-3 rounded-xl border-l-[4px] border-mst bg-[#F9F7E8] font-body text-sm font-semibold text-mst-gray transition duration-200" data-category="desert-safari">
                                 <img src="<?php echo e(asset('assets/images/icons/desert.svg')); ?>" class="w-5 h-5 object-contain" alt="Desert Safari">
                                 <span>Desert Safari</span>
                             </button>
                             <!-- Category Item 2 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-xl border-l-[4px] border-transparent hover:bg-gray-55 font-body text-sm font-medium text-mst-gray transition duration-200" data-category="general">
                                 <img src="<?php echo e(asset('assets/images/icons/home1.svg')); ?>" class="w-5 h-5 object-contain" alt="General">
                                 <span>General</span>
                             </button>
                             <!-- Category Item 3 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-xl border-l-[4px] border-transparent hover:bg-gray-55 font-body text-sm font-medium text-mst-gray transition duration-200" data-category="dhow-cruises">
                                 <img src="<?php echo e(asset('assets/images/icons/dhow.svg')); ?>" class="w-5 h-5 object-contain" alt="Dhow Cruises">
                                 <span>Dhow Cruises</span>
                             </button>
                             <!-- Category Item 4 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-xl border-l-[4px] border-transparent hover:bg-gray-55 font-body text-sm font-medium text-mst-gray transition duration-200" data-category="yacht-charter">
                                 <img src="<?php echo e(asset('assets/images/icons/yacht.svg')); ?>" class="w-5 h-5 object-contain" alt="Yacht Charter">
                                 <span>Yacht Charter</span>
                             </button>
                             <!-- Category Item 5 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-xl border-l-[4px] border-transparent hover:bg-gray-55 font-body text-sm font-medium text-mst-gray transition duration-200" data-category="umrah">
                                 <img src="<?php echo e(asset('assets/images/icons/umrah.svg')); ?>" class="w-5 h-5 object-contain" alt="Umrah">
                                 <span>Umrah</span>
                             </button>
                             <!-- Category Item 6 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-xl border-l-[4px] border-transparent hover:bg-gray-55 font-body text-sm font-medium text-mst-gray transition duration-200" data-category="dubai-city">
                                 <img src="<?php echo e(asset('assets/images/icons/dubai.svg')); ?>" class="w-5 h-5 object-contain" alt="Dubai City Tours">
                                 <span>Dubai City Tours</span>
                             </button>
                             <!-- Category Item 7 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-xl border-l-[4px] border-transparent hover:bg-gray-55 font-body text-sm font-medium text-mst-gray transition duration-200" data-category="abu-dhabi">
                                 <img src="<?php echo e(asset('assets/images/icons/abu.svg')); ?>" class="w-5 h-5 object-contain" alt="Abu Dhabi Tours">
                                 <span>Abu Dhabi Tours</span>
                             </button>
                             <!-- Category Item 8 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-xl border-l-[4px] border-transparent hover:bg-gray-55 font-body text-sm font-medium text-mst-gray transition duration-200" data-category="uae-visa">
                                 <img src="<?php echo e(asset('assets/images/icons/visa.svg')); ?>" class="w-5 h-5 object-contain" alt="UAE Visa">
                                 <span>UAE Visa</span>
                             </button>
                             <!-- Category Item 9 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-xl border-l-[4px] border-transparent hover:bg-gray-55 font-body text-sm font-medium text-mst-gray transition duration-200" data-category="holiday-packages">
                                 <img src="<?php echo e(asset('assets/images/icons/holiday.svg')); ?>" class="w-5 h-5 object-contain" alt="Holiday Packages">
                                 <span>Holiday Packages</span>
                             </button>
                             <!-- Category Item 10 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-xl border-l-[4px] border-transparent hover:bg-gray-55 font-body text-sm font-medium text-mst-gray transition duration-200" data-category="pricing-payment">
                                 <img src="<?php echo e(asset('assets/images/icons/pricing.svg')); ?>" class="w-5 h-5 object-contain" alt="Pricing / Payment">
                                 <span>Pricing / Payment</span>
                             </button>
                             <!-- Category Item 11 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-xl border-l-[4px] border-transparent hover:bg-gray-55 font-body text-sm font-medium text-mst-gray transition duration-200" data-category="cancellation-refund">
                                 <img src="<?php echo e(asset('assets/images/icons/refund.svg')); ?>" class="w-5 h-5 object-contain" alt="Cancellation / Refund">
                                 <span>Cancellation / Refund</span>
                             </button>
                             <!-- Category Item 12 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-xl border-l-[4px] border-transparent hover:bg-gray-55 font-body text-sm font-medium text-mst-gray transition duration-200" data-category="booking">
                                 <img src="<?php echo e(asset('assets/images/icons/booking.svg')); ?>" class="w-5 h-5 object-contain" alt="Booking">
                                 <span>Booking</span>
                             </button>
                             <!-- Category Item 13 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-xl border-l-[4px] border-transparent hover:bg-gray-55 font-body text-sm font-medium text-mst-gray transition duration-200" data-category="support">
                                 <img src="<?php echo e(asset('assets/images/icons/support2.svg')); ?>" class="w-5 h-5 object-contain" alt="Support">
                                 <span>Support</span>
                             </button>
                         </div>
                     </div>

                     <!-- Live Help Box -->
                     <div class="bg-[#FBFBFB] border border-[#EAEAEA] rounded-[20px] p-5 shadow-[0_8px_30px_rgb(0,0,0,0.01)] flex flex-col gap-4">
                         <div class="flex items-start justify-between gap-3">
                             <div>
                                 <h3 class="font-heading italic font-bold text-mst-gray text-lg leading-tight">Need real-time help?</h3>
                                 <p class="font-body text-gray-500 text-[13px] mt-1.5 leading-snug">Our travel experts are online and ready to assist you with immediate inquiries</p>
                             </div>
                             <div class="w-10 h-10 flex-shrink-0 flex items-center justify-center bg-white border border-[#EAEAEA] rounded-xl shadow-sm">
                                 <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                 </svg>
                             </div>
                         </div>

                         <a href="https://wa.me/<?php echo e(get_setting('tour_inquiry_whatsapp')); ?>?text=Hello%2C%20I%20need%20help%20with%20booking" target="_blank" class="flex items-center justify-center gap-2 py-3 bg-[#D0011B] hover:bg-red-700 transition duration-200 rounded-lg text-white font-heading font-bold uppercase text-[11px] tracking-wider shadow-sm">
                             <img src="<?php echo e(asset('assets/images/icons/phone.svg')); ?>" class="w-4 h-4 invert filter brightness-200" alt="phone">
                             <span>Start Live Chat</span>
                         </a>
                     </div>
                 </div>
             </div>
             <div class="faqRightColumn">
                 <div class="flex flex-col gap-6">
                     <!-- Header Title -->
                     <div>
                         <h1 class="font-heading italic font-bold text-3xl leading-tight" id="faq-category-title">
                             <span class="text-mst-gray">Desert</span> <span class="text-mst">Safari FAQs</span>
                         </h1>
                     </div>

                     <!-- Search Input Box -->
                     <div class="relative w-full">
                         <input type="text" id="faq-search-input" placeholder="Search Your Question" class="w-full py-4 pl-5 pr-12 bg-white border border-[#EAEAEA] rounded-xl font-body text-sm text-mst-gray placeholder-gray-400 focus:outline-none focus:border-mst focus:ring-1 focus:ring-mst shadow-[0_4px_20px_rgb(0,0,0,0.01)] transition-colors duration-200">
                         <span class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 flex items-center justify-center pointer-events-none">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                             </svg>
                         </span>
                     </div>

                     <!-- FAQs Accordion List Container -->
                     <div class="flex flex-col gap-4" id="faqs-accordion-container">
                         <!-- FAQs will be dynamically rendered here via JavaScript -->
                     </div>

                     <!-- No FAQs Match State -->
                     <div id="faq-no-results" class="hidden text-center py-12 bg-[#FBFBFB] border border-dashed border-[#EAEAEA] rounded-[20px]">
                         <p class="font-body text-gray-500 text-sm">No FAQs found matching your criteria. Try another category or search term.</p>
                     </div>
                 </div>
             </div>
         </div>
    </div>
</section>

<section class="contactBar py-8 bg-white">
    <div class="container mx-auto">
        <div class="bg-[#FBFBFB] border border-[#EAEAEA] rounded-[20px] p-6 md:p-8 flex flex-col lg:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center bg-white border border-[#EAEAEA] rounded-full shadow-sm">
                    <img src="<?php echo e(asset('assets/images/icons/support2.svg')); ?>" class="w-6 h-6 object-contain animate-pulse" alt="Support">
                </div>
                <div>
                    <h3 class="font-heading italic font-bold text-xl md:text-2xl text-mst-gray">Didn't find your <span class="text-mst">Answer?</span></h3>
                    <p class="font-body text-gray-500 text-xs md:text-sm mt-1">Our Travel specialists are available 24/7 for you.</p>
                </div>
            </div>
            <div class="flex flex-wrap items-center gap-3 md:gap-4 justify-center">
                <!-- Email Button -->
                <a href="mailto:<?php echo e(get_setting('contact_email') ?? 'info@mysaifco.com'); ?>" class="flex items-center gap-2.5 px-6 py-3 bg-white border border-[#EAEAEA] hover:border-gray-300 hover:bg-gray-50 transition-all duration-200 rounded-full text-mst-gray font-body font-semibold text-sm shadow-xs">
                    <img src="<?php echo e(asset('assets/images/icons/email.svg')); ?>" class="w-5 h-5 object-contain" alt="email">
                    <span>Email Us</span>
                </a>
                <!-- Call Button -->
                <a href="tel:<?php echo e(get_setting('contact_phone') ?? '+97142733333'); ?>" class="flex items-center gap-2.5 px-6 py-3 bg-[#D0011B] hover:bg-red-700 transition-all duration-200 rounded-full text-white font-body font-semibold text-sm shadow-xs">
                    <img src="<?php echo e(asset('assets/images/icons/call.svg')); ?>" class="w-5 h-5 object-contain" alt="call">
                    <span>Call Now</span>
                </a>
                <!-- WhatsApp Button -->
                <a href="https://wa.me/<?php echo e(get_setting('tour_inquiry_whatsapp')); ?>" target="_blank" class="flex items-center gap-2.5 px-6 py-3 bg-[#1E7E34] hover:bg-green-800 transition-all duration-200 rounded-full text-white font-body font-semibold text-sm shadow-xs">
                    <img src="<?php echo e(asset('assets/images/icons/whatsapp1.svg')); ?>" class="w-5 h-5 object-contain" alt="whatsapp">
                    <span>WhatsApp</span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="relatedServices py-12 bg-white">
    <div class="container mx-auto">
        <div>
            <h2 class="font-heading italic font-bold text-3xl text-mst-gray">Related <span class="text-mst">Services</span></h2>
            <p class="font-body text-gray-500 text-sm mt-2">Quick access to what travelers explore most—making it easier to find the right experience without the search</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-5 mt-8">
            <!-- Card 1: Desert Safari -->
            <a href="<?php echo e(url('/desert-safari-tours')); ?>" class="group flex flex-col items-center text-center p-6 bg-white border border-[#EAEAEA] rounded-[20px] shadow-xs hover:shadow-md transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="<?php echo e(asset('assets/images/icons/desert.svg')); ?>" class="w-full h-full object-contain" alt="Desert Safari">
                </div>
                <h4 class="font-heading italic font-bold text-[15px] md:text-[16px] text-mst-gray group-hover:text-mst transition-colors duration-200">Desert <span class="text-mst">Safari</span></h4>
                <p class="font-body text-gray-500 text-xs mt-2 leading-snug">Experience thrilling desert adventure</p>
            </a>

            <!-- Card 2: Yacht Charter -->
            <a href="<?php echo e(url('/yacht-charter-tours')); ?>" class="group flex flex-col items-center text-center p-6 bg-white border border-[#EAEAEA] rounded-[20px] shadow-xs hover:shadow-md transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="<?php echo e(asset('assets/images/icons/yacht.svg')); ?>" class="w-full h-full object-contain" alt="Yacht Charter">
                </div>
                <h4 class="font-heading italic font-bold text-[15px] md:text-[16px] text-mst-gray group-hover:text-mst transition-colors duration-200">Yacht <span class="text-mst">Charter</span></h4>
                <p class="font-body text-gray-500 text-xs mt-2 leading-snug">Luxury yachts for unforgettable moments</p>
            </a>

            <!-- Card 3: Umrah Packages -->
            <a href="<?php echo e(url('/umrah')); ?>" class="group flex flex-col items-center text-center p-6 bg-white border border-[#EAEAEA] rounded-[20px] shadow-xs hover:shadow-md transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="<?php echo e(asset('assets/images/icons/umrah.svg')); ?>" class="w-full h-full object-contain" alt="Umrah Packages">
                </div>
                <h4 class="font-heading italic font-bold text-[15px] md:text-[16px] text-mst-gray group-hover:text-mst transition-colors duration-200">Umrah <span class="text-mst">Packages</span></h4>
                <p class="font-body text-gray-500 text-xs mt-2 leading-snug">Spiritual journeys made easy</p>
            </a>

            <!-- Card 4: UAE Visa -->
            <a href="<?php echo e(url('/uae-visa')); ?>" class="group flex flex-col items-center text-center p-6 bg-white border border-[#EAEAEA] rounded-[20px] shadow-xs hover:shadow-md transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="<?php echo e(asset('assets/images/icons/visa.svg')); ?>" class="w-full h-full object-contain" alt="UAE Visa">
                </div>
                <h4 class="font-heading italic font-bold text-[15px] md:text-[16px] text-mst-gray group-hover:text-mst transition-colors duration-200">UAE <span class="text-mst">Visa</span></h4>
                <p class="font-body text-gray-500 text-xs mt-2 leading-snug">Hassle-free visa support & processing</p>
            </a>

            <!-- Card 5: Abu Dhabi Tours -->
            <a href="<?php echo e(url('/abu-dhabi-tours')); ?>" class="group flex flex-col items-center text-center p-6 bg-white border border-[#EAEAEA] rounded-[20px] shadow-xs hover:shadow-md transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="<?php echo e(asset('assets/images/icons/abu.svg')); ?>" class="w-full h-full object-contain" alt="Abu Dhabi Tours">
                </div>
                <h4 class="font-heading italic font-bold text-[15px] md:text-[16px] text-mst-gray group-hover:text-mst transition-colors duration-200">Abu Dhabi <span class="text-mst">Tours</span></h4>
                <p class="font-body text-gray-500 text-xs mt-2 leading-snug">Explore Abu Dhabi's top attractions</p>
            </a>

            <!-- Card 6: Holiday Packages -->
            <a href="<?php echo e(url('/holiday-packages')); ?>" class="group flex flex-col items-center text-center p-6 bg-white border border-[#EAEAEA] rounded-[20px] shadow-xs hover:shadow-md transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="<?php echo e(asset('assets/images/icons/holiday.svg')); ?>" class="w-full h-full object-contain" alt="Holiday Packages">
                </div>
                <h4 class="font-heading italic font-bold text-[15px] md:text-[16px] text-mst-gray group-hover:text-mst transition-colors duration-200">Holiday <span class="text-mst">Packages</span></h4>
                <p class="font-body text-gray-500 text-xs mt-2 leading-snug">Perfect getaways for everyone</p>
            </a>
        </div>
    </div>
</section>

<section class="seoGlobe py-10 bg-white border-t border-[#F0F0F0]">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-8">
            <div class="w-16 h-16 md:w-20 md:h-20 flex-shrink-0 flex items-center justify-center">
                <img src="<?php echo e(asset('assets/images/icons/glob.svg')); ?>" class="w-full h-full object-contain" alt="Globe">
            </div>
            <div class="flex-1 text-center md:text-left">
                <p class="font-body text-gray-600 text-sm md:text-base leading-relaxed">
                    Saifco Travels & Tourism offers reliable and affordable travel packages across UAE and beyond. From desert safaris, yacht tours, and city sightseeing to Umrah packages and visa services, we provide unforgettable experiences with professional support every step of the way.
                </p>
            </div>
        </div>
    </div>
</section>

<script>
    window.faqsData = <?php echo json_encode($allFaqs ?? [], 15, 512) ?>;

    const categoryMap = {
        'desert-safari': { ids: [1], keywords: [] },
        'general': { ids: [9, 10], keywords: [] },
        'dhow-cruises': { ids: [5], keywords: [] },
        'yacht-charter': { ids: [2], keywords: [] },
        'umrah': { ids: [11, 14, 15], keywords: [] },
        'dubai-city': { ids: [3], keywords: [] },
        'abu-dhabi': { ids: [4], keywords: [] },
        'uae-visa': { ids: [], keywords: ['visa', 'permit', 'entry'] },
        'holiday-packages': { ids: [], keywords: ['holiday', 'package'] },
        'pricing-payment': { ids: [], keywords: ['price', 'cost', 'pay', 'charge', 'pricing', 'aed', 'usd'] },
        'cancellation-refund': { ids: [], keywords: ['cancel', 'refund', 'change', 'policy'] },
        'booking': { ids: [], keywords: ['book', 'reserve', 'confirmation'] },
        'support': { ids: [], keywords: ['support', 'contact', 'help', 'phone', 'email'] }
    };

    function renderFAQs() {
        const container = document.getElementById('faqs-accordion-container');
        const noResults = document.getElementById('faq-no-results');
        const searchVal = document.getElementById('faq-search-input').value.toLowerCase().trim();

        const activeBtn = document.querySelector('.faq-cat-btn.active');
        if (!activeBtn) return;
        const cat = activeBtn.getAttribute('data-category');
        const rule = categoryMap[cat] || { ids: [], keywords: [] };

        // Filter FAQs
        const filtered = window.faqsData.filter(faq => {
            // Category filtering
            let matchCat = false;
            if (rule.ids.length > 0) {
                if (faq.tour_type_id && rule.ids.includes(parseInt(faq.tour_type_id))) {
                    matchCat = true;
                }
            }
            if (rule.keywords.length > 0) {
                const title = (faq.title || '').toLowerCase();
                const desc = (faq.description || '').toLowerCase();
                if (rule.keywords.some(kw => title.includes(kw) || desc.includes(kw))) {
                    matchCat = true;
                }
            }

            // Search filtering
            let matchSearch = true;
            if (searchVal !== '') {
                const title = (faq.title || '').toLowerCase();
                const desc = (faq.description || '').toLowerCase();
                matchSearch = title.includes(searchVal) || desc.includes(searchVal);
            }

            return matchCat && matchSearch;
        });

        // Render FAQs
        container.innerHTML = '';
        if (filtered.length === 0) {
            container.classList.add('hidden');
            noResults.classList.remove('hidden');
        } else {
            container.classList.remove('hidden');
            noResults.classList.add('hidden');

            filtered.forEach((faq, index) => {
                const faqNum = index + 1;
                const isFirst = index === 0; // Default first item open as in the design

                const faqEl = document.createElement('div');
                faqEl.className = `faq-item overflow-hidden rounded-xl border transition-all duration-300 ${isFirst ? 'border-transparent bg-gradient-to-r from-[#BA9B31] to-[#74611E] text-white shadow-sm' : 'border-[#EAEAEA] bg-white text-mst-gray shadow-none'}`;
                faqEl.innerHTML = `
                    <h2>
                        <button type="button" class="w-full flex items-center justify-between gap-4 px-6 py-5 font-heading text-md md:text-lg font-bold text-left border-0 bg-transparent cursor-pointer transition-colors duration-300 ${isFirst ? 'text-white' : 'text-mst-gray'}" onclick="toggleFaq(this)">
                            <span>${faq.title}</span>
                            <svg class="w-5 h-5 shrink-0 transition-transform duration-300 ${isFirst ? 'rotate-180 text-white' : 'text-gray-400'}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m19 9-7 7-7-7"></path>
                            </svg>
                        </button>
                    </h2>
                    <div class="faq-body transition-all duration-300 ease-in-out ${isFirst ? '' : 'hidden'}">
                        <div class="px-6 pb-6">
                            <div class="font-body text-xs md:text-sm leading-relaxed ${isFirst ? 'text-white/95' : 'text-gray-600'}">
                                ${faq.description}
                            </div>
                        </div>
                    </div>
                `;
                container.appendChild(faqEl);
            });
        }
    }

    function toggleFaq(button) {
        const item = button.closest('.faq-item');
        const body = item.querySelector('.faq-body');
        const svg = button.querySelector('svg');
        const isClosed = body.classList.contains('hidden');

        // Close all other items
        document.querySelectorAll('.faq-item').forEach(otherItem => {
            if (otherItem !== item) {
                otherItem.classList.remove('border-transparent', 'bg-gradient-to-r', 'from-[#BA9B31]', 'to-[#74611E]', 'text-white', 'shadow-sm');
                otherItem.classList.add('border-[#EAEAEA]', 'bg-white', 'text-mst-gray', 'shadow-none');

                const otherBtn = otherItem.querySelector('button');
                otherBtn.classList.remove('text-white');
                otherBtn.classList.add('text-mst-gray');

                const otherSvg = otherItem.querySelector('svg');
                otherSvg.classList.remove('rotate-180', 'text-white');
                otherSvg.classList.add('text-gray-400');

                otherItem.querySelector('.faq-body').classList.add('hidden');
                const otherBodyText = otherItem.querySelector('.font-body');
                if (otherBodyText) {
                    otherBodyText.classList.remove('text-white/95');
                    otherBodyText.classList.add('text-gray-600');
                }
            }
        });

        if (isClosed) {
            // Open this item
            item.classList.remove('border-[#EAEAEA]', 'bg-white', 'text-mst-gray', 'shadow-none');
            item.classList.add('border-transparent', 'bg-gradient-to-r', 'from-[#BA9B31]', 'to-[#74611E]', 'text-white', 'shadow-sm');

            button.classList.remove('text-mst-gray');
            button.classList.add('text-white');

            svg.classList.add('rotate-180', 'text-white');
            svg.classList.remove('text-gray-400');

            body.classList.remove('hidden');
            const bodyText = item.querySelector('.font-body');
            if (bodyText) {
                bodyText.classList.remove('text-gray-600');
                bodyText.classList.add('text-white/95');
            }
        } else {
            // Close this item
            item.classList.remove('border-transparent', 'bg-gradient-to-r', 'from-[#BA9B31]', 'to-[#74611E]', 'text-white', 'shadow-sm');
            item.classList.add('border-[#EAEAEA]', 'bg-white', 'text-mst-gray', 'shadow-none');

            button.classList.remove('text-white');
            button.classList.add('text-mst-gray');

            svg.classList.remove('rotate-180', 'text-white');
            svg.classList.add('text-gray-400');

            body.classList.add('hidden');
            const bodyText = item.querySelector('.font-body');
            if (bodyText) {
                bodyText.classList.remove('text-white/95');
                bodyText.classList.add('text-gray-600');
            }
        }
    }

    function updateRightTitle(titleText) {
        const titleEl = document.getElementById('faq-category-title');
        if (!titleEl) return;

        const words = titleText.trim().split(' ');
        if (words.length > 1) {
            const first = words[0];
            const rest = words.slice(1).join(' ');
            titleEl.innerHTML = `<span class="text-mst-gray">${first}</span> <span class="text-mst">${rest} FAQs</span>`;
        } else {
            titleEl.innerHTML = `<span class="text-mst-gray">${titleText}</span> <span class="text-mst">FAQs</span>`;
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Add click listeners to category buttons
        const catButtons = document.querySelectorAll('.faq-cat-btn');
        catButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active classes
                catButtons.forEach(b => {
                    b.classList.remove('active', 'bg-[#F9F7E8]', 'font-semibold');
                    b.classList.add('font-medium');
                    b.classList.remove('border-mst');
                    b.classList.add('border-transparent');
                });

                // Add active class to clicked button
                btn.classList.add('active', 'bg-[#F9F7E8]', 'font-semibold');
                btn.classList.remove('font-medium');
                btn.classList.remove('border-transparent');
                btn.classList.add('border-mst');

                // Get category title and update right side title
                const catName = btn.querySelector('span').innerText;
                updateRightTitle(catName);

                // Re-render
                renderFAQs();
            });
        });

        // Add search listener
        const searchInput = document.getElementById('faq-search-input');
        if (searchInput) {
            searchInput.addEventListener('input', () => {
                renderFAQs();
            });
        }

        // Initial render
        renderFAQs();
    });
</script>
         </div>
    </div>
</section>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/pages/includes/faqs.blade.php ENDPATH**/ ?>