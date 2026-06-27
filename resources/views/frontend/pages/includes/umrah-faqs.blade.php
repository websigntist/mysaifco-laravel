<section class="flex justify-center items-center border-b-1 border-gray-200">
    <div class="px-4 relative flex min-h-[400px] w-full
                    items-center justify-center overflow-hidden">
        <div class="absolute inset-0 scale-100 bg-cover bg-top bg-no-repeat"
             style="background-image: url('{{ asset('assets/images/pages/1782498306_6a3ec402a59a4_image.webp') }}')"
             aria-hidden="true"></div>
        {{--@dump($explore_uae)--}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#000000]/90 to-[#000000]/0" aria-hidden="true"></div>
        <div class="relative z-10 w-full py-14">
            <div class="container mx-auto">
                <h1 class="text-white text-[54px] font-body not-italic w-7/12 leading-16">How can we assist your Umrah Journey?</h1>
                <p class="text-white text-lg w-6/12 mt-5">Find answers to common Umrah-related questions to help you prepare for a smooth and spiritually fulfilling journey.</p>
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
                    <h3 class="font-heading italic font-bold text-mst-gray text-[16px] leading-tight">17 + Years Experience</h3>
                    <p class="font-body text-gray-700 text-xs md:text-sm mt-2 leading-snug">Trusted by thousands of happy Travelers</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="flex items-center gap-4 p-5 bg-white border border-gray-200 rounded-2xl shadow-[0_8px_30px_rgb(0, 0,0,0.02)] transition duration-300 hover:shadow-md">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/17years.svg') }}" alt="Travelers Icon" class="w-full h-full object-contain">
                </div>
                <div>
                    <h3 class="font-heading italic font-bold text-mst-gray text-[16px] leading-tight">50,000+ Travelers Served</h3>
                    <p class="font-body text-gray-700 text-xs md:text-sm mt-2 leading-snug">Successfully served travelers from around the world</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="flex items-center gap-4 p-5 bg-white border border-gray-200 rounded-2xl shadow-[0_8px_30px_rgb(0, 0,0,0.02)] transition duration-300 hover:shadow-md">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/247visa.svg') }}" alt="Visa Icon" class="w-full h-full object-contain">
                </div>
                <div>
                    <h3 class="font-heading italic font-bold text-mst-gray text-[16px] leading-tight">24/7 Visa Assistance</h3>
                    <p class="font-body text-gray-700 text-xs md:text-sm mt-2 leading-snug">Reliable visa support with 100% guidance</p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="flex items-center gap-4 p-5 bg-white border border-gray-200 rounded-2xl shadow-[0_8px_30px_rgb(0, 0,0,0.02)] transition duration-300 hover:shadow-md">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/support2.svg') }}" alt="Support Icon" class="w-full h-full object-contain">
                </div>
                <div>
                    <h3 class="font-heading italic font-bold text-mst-gray text-[16px] leading-tight">24/7 Customer Support</h3>
                    <p class="font-body text-gray-700 text-xs md:text-sm mt-2 leading-snug">We're here to help you anytime, anywhere</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- faqs listing--}}
<section class="faqs-listing">
    <div class="container mx-auto">
         <div class="grid grid-cols-1 md:grid-cols-[3fr_9fr] gap-6">
             <div class="faqLeftColumn">
                 <div class="flex flex-col gap-6">
                     <!-- Categories List Card -->
                     <div class="border border-gray-200 rounded-2xl p-5">
                         <h2 class="font-heading font-bold text-mst-gray text-2xl mb-4 px-2">Categories</h2>
                         <div class="flex flex-col gap-1" id="faq-categories-list">
                             <!-- Category Item 1 -->
                             <button class="faq-cat-btn active flex items-center gap-3 w-full text-left px-3 py-3 rounded-md border-l-[4px] border-mst bg-[#F9F7E8] font-heading text-md font-semibold text-mst-gray transition duration-200 cursor-pointer" data-category="umrah">
                                 <img src="{{ asset('assets/images/icons/kaba2.svg') }}" class="w-8 h-8 object-contain" alt="Umrah">
                                 <span>Umrah</span>
                             </button>
                             <!-- Category Item 2 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-md border-l-[4px] hover:border-l-[4px] hover:border-mst border-transparent hover:bg-[#F9F7E8] font-heading text-md font-semibold text-mst-gray transition duration-200 cursor-pointer" data-category="umrah-visa">
                                 <img src="{{ asset('assets/images/icons/visa1.svg') }}" class="w-8 h-8 object-contain" alt="Umrah Visa">
                                 <span>Umrah Visa</span>
                             </button>
                             <!-- Category Item 3 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-md border-l-[4px] hover:border-l-[4px] hover:border-mst border-transparent hover:bg-[#F9F7E8] font-heading text-md font-semibold text-mst-gray transition duration-200 cursor-pointer" data-category="saudi-multiple-visa">
                                 <img src="{{ asset('assets/images/icons/vis1.svg') }}" class="w-8 h-8 object-contain" alt="Saudi Multiple Visa">
                                 <span>Saudi Multiple Visa</span>
                             </button>
                             <!-- Category Item 4 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-md border-l-[4px] hover:border-l-[4px] hover:border-mst border-transparent hover:bg-[#F9F7E8] font-heading text-md font-semibold text-mst-gray transition duration-200 cursor-pointer" data-category="ihram">
                                 <img src="{{ asset('assets/images/icons/ihram.svg') }}" class="w-8 h-8 object-contain" alt="Ihram">
                                 <span>Ihram</span>
                             </button>
                             <!-- Category Item 5 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-md border-l-[4px] hover:border-l-[4px] hover:border-mst border-transparent hover:bg-[#F9F7E8] font-heading text-md font-semibold text-mst-gray transition duration-200 cursor-pointer" data-category="tawaf">
                                 <img src="{{ asset('assets/images/icons/tawaf.svg') }}" class="w-8 h-8 object-contain" alt="Tawaf">
                                 <span>Tawaf</span>
                             </button>
                             <!-- Category Item 6 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-md border-l-[4px] hover:border-l-[4px] hover:border-mst border-transparent hover:bg-[#F9F7E8] font-heading text-md font-semibold text-mst-gray transition duration-200 cursor-pointer" data-category="saii">
                                 <img src="{{ asset('assets/images/icons/saii.svg') }}" class="w-8 h-8 object-contain" alt="Saii">
                                 <span>Saii</span>
                             </button>
                             <!-- Category Item 7 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-md border-l-[4px] hover:border-l-[4px] hover:border-mst border-transparent hover:bg-[#F9F7E8] font-heading text-md font-semibold text-mst-gray transition duration-200 cursor-pointer" data-category="kaaba">
                                 <img src="{{ asset('assets/images/icons/kaba.svg') }}" class="w-8 h-8 object-contain" alt="Kaaba">
                                 <span>Kaaba</span>
                             </button>
                             <!-- Category Item 8 -->
                             <button class="faq-cat-btn flex items-center gap-3 w-full text-left px-3 py-3 rounded-md border-l-[4px] hover:border-l-[4px] hover:border-mst border-transparent hover:bg-[#F9F7E8] font-heading text-md font-semibold text-mst-gray transition duration-200 cursor-pointer" data-category="single-ladies">
                                 <img src="{{ asset('assets/images/icons/lady.svg') }}" class="w-8 h-8 object-contain" alt="Umrah for Single Ladies">
                                 <span>Umrah for Single Ladies</span>
                             </button>
                         </div>
                         <!-- Live Help Box -->
                         <div class="bg-[#FBFBFB] rounded mt-10 p-3 shadow-[0_8px_30px_rgb(0,0,0,0.01)] flex flex-col gap-2">
                             <div class="flex items-start justify-between gap-3">
                                 <div>
                                     <h3 class="font-heading italic font-bold text-mst-gray text-2xl leading-tight">Need real-time help?</h3>
                                 </div>
                                 <div class="w-10 h-10 flex-shrink-0 flex items-center justify-center">
                                     <img src="{{ asset('assets/images/icons/help.svg') }}" alt="">
                                 </div>
                             </div>
                             <p class="font-body text-gray-800 text-sm mt-1.5 leading-snug">Our travel experts are online and ready to assist you with immediate inquiries</p>
                             <a href="#" target="_blank" class="flex items-center justify-center gap-2 py-3
                             bg-[#EB001B] hover:bg-red-700 transition duration-200 rounded-lg text-white font-heading
                             font-semibold uppercase text-lg tracking-wider mt-2">
                                 <img src="{{ asset('assets/images/icons/support5.svg') }}"
                                      class="w-8 h-8" alt="phone">
                                 <span>Start Live Chat</span> </a>
                         </div>
                     </div>

                 </div>
             </div>

             {{-- faq listing --}}
             <div class="faqRightColumn">
                 <div class="border border-gray-200 bg-gray-50/80 rounded-2xl p-5 flex flex-col gap-6">
                     <!-- Header Title -->
                     <div>
                         <h1 class="font-heading italic font-bold text-3xl leading-tight" id="faq-category-title">
                             <span class="text-mst-gray">Desert</span> <span class="text-mst">Safari FAQs</span>
                         </h1>
                     </div>

                     <!-- Search Input Box -->
                     <div class="relative w-full">
                         <input type="text" id="faq-search-input" placeholder="Search Your Question" class="w-full py-4 pl-5 pr-12 bg-white border border-[#EAEAEA] rounded-xl font-heading text-md text-mst-gray placeholder-gray-400 focus:outline-none focus:border-mst focus:ring-1 focus:ring-mst shadow-[0_4px_20px_rgb(0,0,0,0.01)] transition-colors duration-200">
                         <span class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 flex items-center justify-center pointer-events-none">
                             <img src="{{ asset('assets/images/icons/search-icons.svg') }}" alt="">
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
        <div class="bg-gray-50 rounded-lg p-6 md:p-8 flex flex-col lg:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/support2.svg') }}"
                         class="w-full h-full object-contain"
                         alt="Support">
                </div>
                <div>
                    <h3 class="font-heading italic font-bold text-xl md:text-2xl text-mst-gray">Didn't find your <span class="text-mst">Answer?</span></h3>
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
                    <span>Email Us</span>
                </a>
                <!-- Call Button -->
                <a href="#" class="flex items-center gap-2.5 px-6 py-3 bg-[#EB001B] hover:bg-red-700 transition-all
                duration-200 rounded-full text-white font-heading font-semibold text-md italic">
                    <img src="{{ asset('assets/images/icons/call.svg') }}" class="w-5 h-5 object-contain" alt="call">
                    <span>Call Now</span>
                </a>
                <!-- WhatsApp Button -->
                <a href="#" target="_blank" class="flex items-center gap-2.5 px-6 py-3
                 bg-gradient-to-r from-[#2D9D3E] to-[#1E5E28] hover:bg-[#2D9D3E]
                 transition-all duration-200 rounded-full text-white font-heading font-semibold text-md italic">
                    <img src="{{ asset('assets/images/icons/whatsapp1.svg') }}" class="w-5 h-5 object-contain" alt="whatsapp">
                    <span>WhatsApp</span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="relatedServices py-12 bg-white">
    <div class="container mx-auto">
        <div>
            <h2 class="font-heading italic font-bold text-3xl text-mst-gray">Related Umrah <span
                    class="text-mst">Services</span></h2>
            <p class="font-body text-gray-700 mt-2">Quick access to what travelers explore most—making it
                                                            easier to find the right experience without the search</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-5 mt-8">
            <!-- Card 1: Desert Safari -->
            <a href="{{ url('/desert-safari-tours') }}" class="group flex flex-col items-center text-center p-4
             bg-gray-50
            border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-16 h-16 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/kaba.svg') }}" class="w-full h-full object-contain" alt="Desert Safari">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                                duration-200 w-20">Umrah <span class="text-mst">Package</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Complete Package with visa & stay</p>
            </a>

            <!-- Card 2: Yacht Charter -->
            <a href="{{ url('/yacht-charter-tours') }}" class="group flex flex-col items-center text-center p-4
                         bg-gray-50
                        border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/plan.svg') }}" class="w-full h-full object-contain" alt="Yacht Charter">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                duration-200 w-30">Umrah by <span class="text-mst">Air</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Fly comfortable to Makkah & Madinah</p>
            </a>

            <!-- Card 3: Umrah Packages -->
            <a href="{{ url('/umrah') }}" class="group flex flex-col items-center text-center p-4
                         bg-gray-50
                        border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/bus1.svg') }}" class="w-full h-full object-contain" alt="Umrah Packages">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                duration-200 w-30">Umrah by <span class="text-mst">Bus</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Affordable bus Umrah Packages</p>
            </a>

            <!-- Card 4: UAE Visa -->
            <a href="{{ url('/uae-visa') }}" class="group flex flex-col items-center text-center p-4
                         bg-gray-50
                        border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/visa1.svg') }}" class="w-full h-full object-contain" alt="UAE Visa">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                duration-200 w-20">Umrah <span class="text-mst">Visa</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Hassle-free Umrah visa Assistance</p>
            </a>

            <!-- Card 5: Abu Dhabi Tours -->
            <a href="{{ url('/abu-dhabi-tours') }}" class="group flex flex-col items-center text-center p-4
                         bg-gray-50
                        border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/vis1.svg') }}" class="w-full h-full object-contain" alt="Abu Dhabi Tours">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                duration-200 w-30">Saudi Multi <span class="text-mst">Visa</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Multiple entry visa for Saudi Arabia</p>
            </a>

            <!-- Card 6: Holiday Packages -->
            <a href="{{ url('/holiday-packages') }}" class="group flex flex-col items-center text-center p-4
                         bg-gray-50
                        border border-gray-200 rounded-2xl transition-all duration-300">
                <div class="w-14 h-14 flex items-center justify-center mb-3 transition-transform duration-300 group-hover:scale-110">
                    <img src="{{ asset('assets/images/icons/lady.svg') }}" class="w-full h-full object-contain" alt="Holiday Packages">
                </div>
                <h4 class="font-heading italic font-bold text-lg text-mst-gray group-hover:text-mst transition-colors
                                duration-200 w-45">Umrah for Single  <span class="text-mst">Ladies</span></h4>
                <p class="font-body text-gray-700 text-sm mt-1 leading-snug">Safe & comfortable Umrah for Women</p>
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
                    Saifco Travels & Tourism offers reliable and affordable travel packages across UAE and beyond. From desert safaris, yacht tours, and city sightseeing to Umrah packages and visa services, we provide unforgettable experiences with professional support every step of the way.
                </p>
            </div>
        </div>
    </div>
</section>

<script>
    window.faqsData = @json($allFaqs ?? []);

    const categoryMap = {
        'umrah': { ids: [11], keywords: [] },
        'umrah-visa': { ids: [11, 14, 15], keywords: ['visa', 'procedure'] },
        'saudi-multiple-visa': { ids: [11, 14, 15], keywords: ['visa', 'multiple', 'entry'] },
        'ihram': { ids: [11, 14, 15], keywords: ['ihram', 'dress', 'wear', 'perfume'] },
        'tawaf': { ids: [11, 14, 15], keywords: ['tawaf', 'kaaba', 'circumambulation'] },
        'saii': { ids: [11, 14, 15], keywords: ['saii', 'saee', 'safa', 'marwah'] },
        'kaaba': { ids: [11, 14, 15], keywords: ['kaaba', 'mosque', 'haram'] },
        'single-ladies': { ids: [15], keywords: ['lady', 'ladies', 'women', 'woman', 'single'] }
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
        let filtered = window.faqsData.filter(faq => {
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

        // Fallback to general Umrah FAQs if category is empty
        if (filtered.length === 0 && cat !== 'umrah') {
            const fallbackRule = categoryMap['umrah'];
            const fallbackFiltered = window.faqsData.filter(faq => {
                let matchSearch = true;
                if (searchVal !== '') {
                    const title = (faq.title || '').toLowerCase();
                    const desc = (faq.description || '').toLowerCase();
                    matchSearch = title.includes(searchVal) || desc.includes(searchVal);
                }
                return faq.tour_type_id && fallbackRule.ids.includes(parseInt(faq.tour_type_id)) && matchSearch;
            });
            if (fallbackFiltered.length > 0) {
                filtered.push(...fallbackFiltered);
            }
        }

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

        // Initial render: Set title to active category and render
        const initialActiveBtn = document.querySelector('.faq-cat-btn.active');
        if (initialActiveBtn) {
            updateRightTitle(initialActiveBtn.querySelector('span').innerText);
        }
        renderFAQs();
    });
</script>
