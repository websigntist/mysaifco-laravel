<section class="">
    <div class="px-4 relative flex w-full items-start justify-center overflow-hidden">
        <div class="absolute inset-0 scale-100 bg-cover bg-top bg-no-repeat" style="background-image: url('{{ asset('assets/images/pages/1784058432_6a5692407991b_image.webp') }}')" aria-hidden="true"></div>
        {{--@dump($explore_uae)--}}
        <div class="absolute inset-0 bg-gradient-to-r from-black/90 from-30% to-black/05 to-90%"
             aria-hidden="true"></div>
        <div class="relative z-10 w-full py-14">
            <div class="container mx-auto">
                <nav class="breadcrumb flex items-center gap-1 text-md font-heading" aria-label="Breadcrumb">
                    <a href="{{ url('/') }}" class="text-white hover:text-mst transition">Home</a>
                    <svg class="w-4 h-4 text-mst" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7"/>
                    </svg>
                    <span class="text-mst">Tourist Visa</span>
                </nav>
                <h1 class="text-5xl w-4xl mt-6 font-body font-bold not-italic leading-16 text-white">
                    30 Days Dubai <br> Tourist Visa
                </h1>
                <p class="text-lg mt-5 w-6/12 text-white">Explore Dubai and the UAE for up to 30 days. We provide fast,
                                                          reliable and professional visa assistance for a hassle-free
                                                          journey.</p>
                <div class="flex mt-8 mb-15 gap-6">
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
<section class="trust-bar py-12 -mt-26 relative z-1">
    <div class="container mx-auto">
        <div class="bg-gray-50 border border-gray-300 rounded-3xl grid grid-cols-1 md:grid-cols-4 py-8 px-4 md:px-8">
            <!-- Card 1: Experience -->
            <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/starbadge.svg') }}" alt="Experience Icon" class="w-full h-full object-contain">
                </div>
                <div class="font-heading italic font-bold text-mst-gray text-center leading-tight">
                    17+ Years<br>Experience
                </div>
            </div>
            <!-- Card 2: Travelers Served -->
            <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/17years.svg') }}" alt="Travelers Icon" class="w-full h-full object-contain">
                </div>
                <div class="font-heading italic font-bold text-mst-gray text-center leading-tight">
                    50,000+ Travelers<br>Served
                </div>
            </div>
            <!-- Card 3: Customer Support -->
            <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/support2.svg') }}" alt="Support Icon" class="w-full h-full object-contain">
                </div>
                <div class="font-heading italic font-bold text-mst-gray text-center leading-tight">
                    24/7 Customer<br>Support
                </div>
            </div>
            <!-- Card 4: Best Price Guaranteed -->
            <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/dbadge.svg') }}" alt="Best Price Icon" class="w-full h-full object-contain">
                </div>
                <div class="font-heading italic font-bold text-mst-gray text-center leading-tight">
                    Best Price<br>Guaranted
                </div>
            </div>
        </div>
    </div>
</section>




@php
    $overviewPoints = [
        'Stay in the UAE for up to 30 days',
        'Visit Dubai, Abu Dhabi, Sharjah and all Emirates',
        'Perfect for tourism, family or short business trips',
        'Simple process with minimum documentation',
        'Reliable and professional visa support',
    ];

    $trustItems = [
        ['title' => 'Since 2008',             'sub' => 'Years of Experience', 'icon'  => 'w989.svg'],
        ['title' => 'Dubai Licensed Company',  'sub' => 'Trusted and Registered', 'icon'  => 'a999.svg'],
        ['title' => '50,000+ Travelers',       'sub' => 'Served Worldwide', 'icon'  => '17years.svg'],
        ['title' => 'Processing Time',         'sub' => 'Quick &amp; Reliable', 'icon'  => 'c98.svg'],
        ['title' => 'WhatsApp Support',        'sub' => 'We are here to help you', 'icon'  => 'w89.svg'],
    ];

    $requiredDocs = [
        'Passport copy (clear colored copy)',
        'Passport size photograph with white background',
        'Confirmed return ticket or onward ticket',
        'Hotel booking or accommodation details (if applicable)',
        'Additional documents may be required based on nationality',
    ];

    $visaFor = [
        ['text' => 'Tourism and Holiday trips',                  'icon' => 'p98.svg'],
        ['text' => 'Family visits and vacation',                 'icon' => '130.svg'],
        ['text' => 'Short business meetings and conferences',    'icon' => 't89.svg'],
        ['text' => 'Leisure activities and events',              'icon' => 'e656.svg'],
        ['text' => 'Exploring Dubai and other Emirates',         'icon' => 'd989.svg'],
    ];

    $processSteps = [
        ['title' => 'Submit Inquiry',   'desc' => 'Fill out the inquiry form or contact our team'],
        ['title' => 'Submit Documents', 'desc' => 'Share your documents via email or WhatsApp'],
        ['title' => 'Visa Processnig',  'desc' => 'We process your visa application'],
        ['title' => 'Receive Visa',     'desc' => 'Get your visa via email and enjoy your trip'],
    ];
@endphp

{{-- ===== Visa Overview + Inquiry Form ===== --}}
<section class="pt-5">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Visa Overview --}}
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 md:p-8">
                <h2 class="font-heading italic font-bold text-2xl text-mst-gray mb-4">Visa <span class="text-mst">Overview</span></h2>
                <p class="font-body text-mst-gray leading-7 mb-6">
                    The 30 Days UAE Tourist Visa is perfect for travelers who want to explore Dubai and the Emirates for
                    tourism, family visits, or short business meetings. This visa is valid for 30 days from the date of entry.
                </p>
                <div class="flex flex-col sm:flex-row gap-5">
                    <img src="{{ asset('assets/images/packages/w9w989.webp') }}" alt="30 Days UAE Tourist Visa"
                         class="w-full sm:w-40 h-48 sm:h-auto object-cover rounded-xl flex-shrink-0">
                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-5 flex-1">
                        <ul class="space-y-4">
                            @foreach($overviewPoints as $point)
                                <li class="flex items-start gap-3">
                                    <img src="{{ asset('assets/images/icons/check-bullet.svg') }}" alt="">
                                    <span class="font-body text-sm text-mst-gray">{{ $point }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            {{-- Inquiry Form --}}
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 md:p-8">
                <h2 class="font-heading italic font-bold text-2xl text-mst-gray mb-6">Apply for 30 Days <span class="text-mst">Dubai Tourist Visa</span></h2>
                <form action="#" method="POST">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                        <input type="text" name="full_name" placeholder="Enter your full name"
                               class="w-full bg-gray-100 border border-gray-200 rounded-lg px-4 py-3 text-sm text-mst-gray focus:outline-none focus:border-mst">
                        <input type="tel" name="phone" placeholder="Phone number here"
                               class="w-full bg-gray-100 border border-gray-200 rounded-lg px-4 py-3 text-sm text-mst-gray focus:outline-none focus:border-mst">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                        <div class="relative">
                            <select name="nationality" class="appearance-none w-full bg-gray-100 border
                            border-gray-200 rounded-lg px-4 py-3 text-sm text-mst-gray focus:outline-none
                            focus:border-mst cursor-pointer">
                                <option value="">Select Nationality</option>
                                <option>United Arab Emirates</option>
                                <option>Pakistan</option>
                                <option>India</option>
                                <option>Bangladesh</option>
                                <option>Philippines</option>
                                <option>Egypt</option>
                                <option>Other</option>
                            </select>
                            <svg class="w-3.5 h-3.5 text-gray-400 absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                        <input type="text" name="travel_date" placeholder="Travel Date"
                               onfocus="this.type='date'; try { this.showPicker(); } catch(e) {}"
                               onblur="if(!this.value)this.type='text'"
                               class="w-full bg-gray-100 border border-gray-200 rounded-lg px-4 py-3 text-sm text-mst-gray focus:outline-none focus:border-mst">
                    </div>
                    <textarea name="message" rows="4" placeholder="Message (Optional)&#10;Type you message here...."
                              class="w-full bg-gray-100 border border-gray-200 rounded-lg px-4 py-3 text-sm
                              text-mst-gray focus:outline-none focus:border-mst resize-none mb-5"></textarea>
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <button type="submit"
                                class="inline-flex items-center justify-center gap-2 rounded-full px-8 py-3 font-heading italic text-base text-white
                                       bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300">
                            Submit Inquiry
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7"/></svg>
                        </button>
                        <span class="inline-flex items-center gap-2 bg-[#FAF7F2] border border-[#BA9B31]/30 rounded-full px-4 py-3 text-xs text-mst-gray">
                            <img src="{{ asset('assets/images/icons/lock565.svg') }}" alt="">
                            Your Information is secure and will not be shared
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- ===== Trust strip ===== --}}
<section class="pt-12">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4">
            @foreach($trustItems as $item)
                <div class="flex items-start gap-3">
                    <img src="{{ asset('assets/images/icons/' . $item['icon']) }}" alt="">
                    <div>
                        <h4 class="font-heading italic font-bold text-mst-gray">{{ $item['title'] }}</h4>
                        <p class="font-body text-xs text-gray-600 mt-0.5">{!! $item['sub'] !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== Required Documents + What This Visa is For ===== --}}
<section class="pt-12">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Required Documents --}}
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 md:p-8 flex flex-col">
                <h3 class="font-heading font-bold text-xl text-mst-gray mb-6">Required Documents</h3>
                <ul class="space-y-4">
                    @foreach($requiredDocs as $doc)
                        <li class="flex items-start gap-3">
                            <img src="{{ asset('assets/images/icons/check-bullet.svg') }}" alt="">
                            <span class="font-body text-sm text-mst-gray">{{ $doc }}</span>
                        </li>
                    @endforeach
                </ul>
                <div class="bg-[#FAF7F2] border border-[#BA9B31]/30 rounded-xl p-4 mt-6 flex items-start gap-3">
                    <img src="{{ asset('assets/images/icons/i565.svg') }}" alt="">
                    <span class="font-body text-sm text-mst-gray"><span class="font-bold">Note</span>: Documents requirements may vary depending on nationality. Our Team will guide you after inquiry.</span>
                </div>
            </div>
            {{-- What This Visa is For --}}
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 md:p-8">
                <h3 class="font-heading font-bold text-xl text-mst-gray mb-3">What This Visa is For?</h3>
                <p class="font-body text-sm text-mst-gray mb-6">This visa ideal for Travelers visiting the UAE for:</p>
                <ul class="space-y-4">
                    @foreach($visaFor as $item)
                        <li class="flex items-center gap-4">
                            <span class="w-9 h-9 flex-shrink-0 rounded-lg bg-[#EAF2FB] flex items-center justify-center">
                                <img src="{{ asset('assets/images/icons/' . $item['icon']) }}" alt="">
                            </span>
                            <span class="font-body text-sm text-mst-gray">{{ $item['text'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ===== Application Process ===== --}}
<section class="pt-16 pb-4">
    <div class="container mx-auto">
        <div class="flex items-center justify-center gap-4 mb-2">
            <h2 class="font-heading italic font-bold text-3xl md:text-4xl text-mst-gray text-center">Application <span class="text-mst">Process</span></h2>
        </div>
        <p class="font-body text-mst-gray text-center max-w-2xl mx-auto mt-3 text-[16px]">
            We offer fast, reliable and hasle-free UAE tourist visa and mutiple entry visa services</p>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mt-10">
            @foreach($processSteps as $i => $step)
                <div class="relative flex items-start gap-6">
                    @if(!$loop->last)
                        <span class="hidden md:flex absolute top-2 -right-5 text-mst" aria-hidden="true">
                            <img src="{{ asset('assets/images/icons/arrowl.svg') }}" alt="">
                        </span>
                    @endif
                    <span class="w-9 h-9 pt-1 pb-2 flex-shrink-0 rounded-full bg-gradient-to-r from-[#BA9B31]
                    to-[#74611E] text-white font-heading italic flex items-center justify-center">
                        {{ $i + 1 }}
                    </span>
                    <div>
                        <h4 class="font-heading italic font-bold text-lg text-mst-gray">{{ $step['title'] }}</h4>
                        <p class="font-body text-sm text-mst-gray w-60 mt-1 leading-snug">{{ $step['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('frontend.components.testimonials');
{{-- FAQs --}}
<section class="flex items-center justify-center pt-10 pb-0">
    <div class="container mx-auto px-4">
        <div class="mx-auto text-center">
            <h1 class="text-3xl md:text-4xl">
                <span>Frequently Asked  </span><span class="text-mst">Questions</span>
            </h1>
            <p class="mt-4 text-center mx-auto md:w-3xl text-[16px]">Explore common questions about our Umrah by Bus
                                                                     packages from Dubai and UAE, including visa
                                                                     processing, departure schedules, hotel
                                                                     accommodation, transportation, and Ziyarat
                                                                     tours.</p>
        </div>
        <div id="accordion-card" class="faq-disert-safari mt-14" data-custom-accordion="collapse">
            <div class="w-4xl mx-auto md:gap-x-10">
                <div class="flex flex-col gap-4">
                    <div class="faqmst overflow-hidden rounded-lg border border-gray-200 bg-white transition">
                        <h2 id="faq-1">
                            <button type="button" class="faq-accordion-btn flex w-full items-center justify-between
                            gap-4 border-0 bg-transparent px-5 py-5 font-heading text-lg font-semibold text-left
                            text-mst-gray transition [&amp;[aria-expanded='true']]:text-white" data-custom-accordion-target="#faq-body-1" aria-expanded="true" aria-controls="faq-body-1">
                                <span>What is included in Desert Safari Dubai packages?</span>
                                <svg data-accordion-icon="" class="h-5 w-5 shrink-0 transition-transform duration-300 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"></path>
                                </svg>
                            </button>
                        </h2>
                        <div id="faq-body-1" class="grid transition-all duration-300 ease-in-out" style="grid-template-rows: 1fr;" aria-labelledby="faq-1">
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
