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
                             @if(isset($faqCategories) && count($faqCategories) > 0)
                                 @foreach($faqCategories as $index => $cat)
                                     @php
                                         $slug = strtolower($cat->friendly_url ?: Str::slug($cat->title));
                                         
                                         // Fallback icons logic if no custom image is uploaded
                                         if (!empty($cat->image)) {
                                             $catIcon = asset('assets/images/faq-categories/' . $cat->image);
                                         } elseif (str_contains($slug, 'visa-service') || str_contains($slug, 'multiple') || str_contains($slug, 'saudi')) {
                                             $catIcon = asset('assets/images/icons/vis1.svg');
                                         } elseif (str_contains($slug, 'visa')) {
                                             $catIcon = asset('assets/images/icons/visa1.svg');
                                         } elseif (str_contains($slug, 'ihram')) {
                                             $catIcon = asset('assets/images/icons/ihram.svg');
                                         } elseif (str_contains($slug, 'tawaf')) {
                                             $catIcon = asset('assets/images/icons/tawaf.svg');
                                         } elseif (str_contains($slug, 'saii') || str_contains($slug, 'saee')) {
                                             $catIcon = asset('assets/images/icons/saii.svg');
                                         } elseif (str_contains($slug, 'kaaba') || str_contains($slug, 'kaba')) {
                                             $catIcon = asset('assets/images/icons/kaba.svg');
                                         } elseif (str_contains($slug, 'lady') || str_contains($slug, 'ladies') || str_contains($slug, 'women')) {
                                             $catIcon = asset('assets/images/icons/lady.svg');
                                         } else {
                                             $catIcon = asset('assets/images/icons/kaba2.svg');
                                         }
                                     @endphp
                                     <button class="faq-cat-btn font-medium border-transparent flex items-center gap-3 w-full text-left px-3 py-3 rounded-md border-l-[4px] hover:border-l-[4px] hover:border-mst border-transparent hover:bg-[#F9F7E8] font-heading text-md text-mst-gray transition duration-200 cursor-pointer"
                                             data-category-id="{{ $cat->id }}"
                                             data-category-title="{{ $cat->title }}"
                                             data-category-slug="{{ $slug }}">
                                         <img src="{{ $catIcon }}" class="w-8 h-8 object-contain" alt="{{ $cat->title }}">
                                         <span>{{ $cat->title }}</span>
                                     </button>
                                 @endforeach
                             @else
                                 <!-- Default Fallback Static Categories if table is empty -->
                                 <button class="faq-cat-btn font-medium border-transparent flex items-center gap-3 w-full text-left px-3 py-3 rounded-md border-l-[4px] hover:border-l-[4px] hover:border-mst border-transparent hover:bg-[#F9F7E8] font-heading text-md text-mst-gray transition duration-200 cursor-pointer" data-category-slug="umrah" data-category-title="Umrah">
                                     <img src="{{ asset('assets/images/icons/kaba2.svg') }}" class="w-8 h-8 object-contain" alt="Umrah">
                                     <span>Umrah</span>
                                 </button>
                                 <button class="faq-cat-btn font-medium border-transparent flex items-center gap-3 w-full text-left px-3 py-3 rounded-md border-l-[4px] hover:border-l-[4px] hover:border-mst border-transparent hover:bg-[#F9F7E8] font-heading text-md text-mst-gray transition duration-200 cursor-pointer" data-category-slug="umrah-visa" data-category-title="Umrah Visa">
                                     <img src="{{ asset('assets/images/icons/visa1.svg') }}" class="w-8 h-8 object-contain" alt="Umrah Visa">
                                     <span>Umrah Visa</span>
                                 </button>
                                 <button class="faq-cat-btn font-medium border-transparent flex items-center gap-3 w-full text-left px-3 py-3 rounded-md border-l-[4px] hover:border-l-[4px] hover:border-mst border-transparent hover:bg-[#F9F7E8] font-heading text-md text-mst-gray transition duration-200 cursor-pointer" data-category-slug="saudi-multiple-visa" data-category-title="Saudi Multiple Visa">
                                     <img src="{{ asset('assets/images/icons/vis1.svg') }}" class="w-8 h-8 object-contain" alt="Saudi Multiple Visa">
                                     <span>Saudi Multiple Visa</span>
                                 </button>
                                 <button class="faq-cat-btn font-medium border-transparent flex items-center gap-3 w-full text-left px-3 py-3 rounded-md border-l-[4px] hover:border-l-[4px] hover:border-mst border-transparent hover:bg-[#F9F7E8] font-heading text-md text-mst-gray transition duration-200 cursor-pointer" data-category-slug="ihram" data-category-title="Ihram">
                                     <img src="{{ asset('assets/images/icons/ihram.svg') }}" class="w-8 h-8 object-contain" alt="Ihram">
                                     <span>Ihram</span>
                                 </button>
                             @endif
                         </div>

                         <!-- Live Help Box -->
                         <div class="bg-[#FBFBFB] rounded mt-10 p-3 shadow-[0_8px_30px_rgb(0,0,0,0.01)] flex flex-col gap-2">
                             <div class="flex items-start justify-between gap-3">
                                 <div>
                                     <h3 class="font-heading italic font-bold text-mst-gray text-2xl leading-tight">Need real-time help?</h3>
                                 </div>
                                 <div class="w-10 h-10 flex-shrink-0 flex items-center justify-center">
                                     <img src="{{ asset('assets/images/icons/help.svg') }}" alt="help">
                                 </div>
                             </div>
                             <p class="font-body text-gray-800 text-sm mt-1.5 leading-snug">Our travel experts are online and ready to assist you with immediate inquiries</p>
                             <a href="https://wa.me/971501234567" target="_blank" class="flex items-center justify-center gap-2 py-3 bg-[#EB001B] hover:bg-red-700 transition duration-200 rounded-lg text-white font-heading font-semibold uppercase text-lg tracking-wider mt-2">
                                 <img src="{{ asset('assets/images/icons/support5.svg') }}" class="w-8 h-8" alt="support">
                                 <span>Start Live Chat</span>
                             </a>
                         </div>
                     </div>

                 </div>
             </div>

             {{-- faq listing right column --}}
             <div class="faqRightColumn">
                 <div class="border border-gray-200 bg-gray-50/80 rounded-2xl p-5 flex flex-col gap-6">
                     <!-- Header Title -->
                     <div>
                         <h1 class="font-heading italic font-bold text-3xl leading-tight" id="faq-category-title">
                             <span class="text-mst-gray">Umrah</span> <span class="text-mst">FAQs</span>
                         </h1>
                     </div>

                     <!-- Search Input Box -->
                     <div class="relative w-full">
                         <input type="text" id="faq-search-input" placeholder="Search Your Question" class="w-full py-4 pl-5 pr-12 bg-white border border-[#EAEAEA] rounded-xl font-heading text-md text-mst-gray placeholder-gray-400 focus:outline-none focus:border-mst focus:ring-1 focus:ring-mst shadow-[0_4px_20px_rgb(0,0,0,0.01)] transition-colors duration-200">
                         <span class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 flex items-center justify-center pointer-events-none">
                             <img src="{{ asset('assets/images/icons/search-icons.svg') }}" alt="search">
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

@include('frontend.components.footerContactBar')

<section class="relatedServices py-12 bg-white">
    <div class="container mx-auto">
        <div>
            <h2 class="font-heading italic font-bold text-3xl text-mst-gray">Related Umrah <span class="text-mst">Services</span></h2>
            <p class="font-body text-gray-700 mt-2 mb-6">Quick access to what travelers explore most—making it easier to find the right experience without the search</p>
        </div>
        @include('frontend.components.related_services', ['limit' => 6, 'position' => 'first', 'cols' => 6])
    </div>
</section>

@include('frontend.components.explore_dubai')

<script>
    window.faqsData = @json($allFaqs ?? []);
    window.categoriesData = @json($faqCategories ?? []);

    const categoryKeywords = {
        'umrah': ['umrah', 'pilgrimage', 'mecca', 'makkah'],
        'umrah-visa': ['visa', 'procedure', 'passport', 'application'],
        'saudi-multiple-visa': ['multiple', 'entry', 'validity', 'tourist'],
        'ihram': ['ihram', 'dress', 'wear', 'perfume', 'garment'],
        'tawaf': ['tawaf', 'kaaba', 'circumambulation'],
        'saii': ['saii', 'saee', 'safa', 'marwah'],
        'kaaba': ['kaaba', 'kaba', 'mosque', 'haram'],
        'single-ladies': ['lady', 'ladies', 'women', 'woman', 'single', 'mahram']
    };

    function renderFAQs() {
        const container = document.getElementById('faqs-accordion-container');
        const noResults = document.getElementById('faq-no-results');
        const searchVal = document.getElementById('faq-search-input').value.toLowerCase().trim();

        const activeBtn = document.querySelector('.faq-cat-btn.active');

        // Filter FAQs
        let filtered = window.faqsData.filter(faq => {
            let matchCat = true;

            if (activeBtn) {
                const catId = activeBtn.getAttribute('data-category-id');
                const catSlug = activeBtn.getAttribute('data-category-slug') || '';
                const catTitle = activeBtn.getAttribute('data-category-title') || '';
                const keywords = categoryKeywords[catSlug] || [catSlug, catTitle.toLowerCase()];

                matchCat = false;
                if (catId && faq.faq_category_id && parseInt(faq.faq_category_id) === parseInt(catId)) {
                    matchCat = true;
                } else if (!faq.faq_category_id) {
                    // Keyword fallback for unassigned/legacy FAQs
                    const title = (faq.title || '').toLowerCase();
                    const desc = (faq.description || '').toLowerCase();
                    if (keywords.some(kw => kw && (title.includes(kw) || desc.includes(kw)))) {
                        matchCat = true;
                    }
                }
            }

            // Search filter check
            let matchSearch = true;
            if (searchVal !== '') {
                const title = (faq.title || '').toLowerCase();
                const desc = (faq.description || '').toLowerCase();
                matchSearch = title.includes(searchVal) || desc.includes(searchVal);
            }

            return matchCat && matchSearch;
        });

        // Render Accordion
        container.innerHTML = '';
        if (filtered.length === 0) {
            container.classList.add('hidden');
            noResults.classList.remove('hidden');
        } else {
            container.classList.remove('hidden');
            noResults.classList.add('hidden');

            filtered.forEach((faq, index) => {
                const isFirst = (index === 0);

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

        // Close all other accordion items
        document.querySelectorAll('.faq-item').forEach(otherItem => {
            if (otherItem !== item) {
                otherItem.classList.remove('border-transparent', 'bg-gradient-to-r', 'from-[#BA9B31]', 'to-[#74611E]', 'text-white', 'shadow-sm');
                otherItem.classList.add('border-[#EAEAEA]', 'bg-white', 'text-mst-gray', 'shadow-none');

                const otherBtn = otherItem.querySelector('button');
                if (otherBtn) {
                    otherBtn.classList.remove('text-white');
                    otherBtn.classList.add('text-mst-gray');
                }

                const otherSvg = otherItem.querySelector('svg');
                if (otherSvg) {
                    otherSvg.classList.remove('rotate-180', 'text-white');
                    otherSvg.classList.add('text-gray-400');
                }

                otherItem.querySelector('.faq-body').classList.add('hidden');
                const otherBodyText = otherItem.querySelector('.font-body');
                if (otherBodyText) {
                    otherBodyText.classList.remove('text-white/95');
                    otherBodyText.classList.add('text-gray-600');
                }
            }
        });

        if (isClosed) {
            // Open clicked item
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
            // Close clicked item
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

        let cleanText = titleText.replace(/faqs?/i, '').trim();
        const words = cleanText.split(' ');
        if (words.length > 1) {
            const first = words[0];
            const rest = words.slice(1).join(' ');
            titleEl.innerHTML = `<span class="text-mst-gray">${first}</span> <span class="text-mst">${rest} FAQs</span>`;
        } else {
            titleEl.innerHTML = `<span class="text-mst-gray">${cleanText}</span> <span class="text-mst">FAQs</span>`;
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const catButtons = document.querySelectorAll('.faq-cat-btn');
        catButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const wasActive = btn.classList.contains('active');

                // Deactivate all buttons first
                catButtons.forEach(b => {
                    b.classList.remove('active', 'bg-[#F9F7E8]', 'font-semibold', 'border-mst');
                    b.classList.add('font-medium', 'border-transparent');
                });

                if (!wasActive) {
                    // Activate clicked button
                    btn.classList.add('active', 'bg-[#F9F7E8]', 'font-semibold', 'border-mst');
                    btn.classList.remove('font-medium', 'border-transparent');
                    const catName = btn.querySelector('span') ? btn.querySelector('span').innerText : btn.getAttribute('data-category-title');
                    updateRightTitle(catName);
                } else {
                    // Deselecting active button returns to default "Umrah FAQs" all items state
                    updateRightTitle('Umrah');
                }

                renderFAQs();
            });
        });

        const searchInput = document.getElementById('faq-search-input');
        if (searchInput) {
            searchInput.addEventListener('input', () => {
                renderFAQs();
            });
        }

        // Initial render (by default, no category is active -> renders ALL FAQs for tour type "Umrah FAQs")
        updateRightTitle('Umrah');
        renderFAQs();
    });
</script>
