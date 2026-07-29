@php
    $dubaiCenters = [
        ['image' => 'vaccine-1.webp',  'name' => 'AL Barsha Health Centre',       'address' => 'Al Barsha - Al Barsha 3 - Dubai - United Arab Emirates',                                   'phone' => '+97800342',    'map' => '#'],
        ['image' => 'vaccine-11.webp',  'name' => 'Al Mankhool Health Center',      'address' => 'Al Mankhool Rd - behind Eid Musalla mosque - Al Mankhool',                                 'phone' => '+97645022(0)', 'map' => '#'],
        ['image' => 'vaccine-2.webp',  'name' => 'Al Kuwait Hospital Dubai',       'address' => 'Deira - Dubai - United Arab Emirates',                                                     'phone' => '+97647078000', 'map' => '#'],
        ['image' => 'vaccine-5.webp',  'name' => 'Apple International Polyclinic',  'address' => 'International City, Greece Cluster Building No Easy access through K16 - Mamzena St - from - Dubai', 'phone' => '+97643578686', 'map' => '#'],
        ['image' => 'vaccine-4.webp',  'name' => 'Badr Al Samaa Medical Centre',   'address' => 'Opp. Musalla Tower - Khalid Bin Al Waleed Rd - Dubai - United Arab Emirates',               'phone' => '+97643578686', 'map' => '#'],
        ['image' => 'vaccine-3.webp',  'name' => 'Thumbay Hospital',               'address' => '13th Street, Near Stadium Metro Station, Behind Lulu Hypermarket, Al Qusais - Dubai - United Arab Emirates', 'phone' => '+97646030555', 'map' => '#'],
    ];

    $sharjahCenters = [
        ['image' => 'vaccine-12.webp',  'name' => 'Zulekha Hospital Sharjah',       'address' => 'Al Zahrah St - Al Sharq - Al Nasserya - Sharjah - UAE',                                    'phone' => '+97800524442', 'map' => '#'],
        ['image' => 'vaccine-6.webp',  'name' => 'Central Hospital Sharjah',       'address' => 'Sheikh Zayed St, Mysaloon Near Clock Tower - Sharjah - UAE',                                'phone' => '+97165639900', 'map' => '#'],
        ['image' => 'vaccine-7.webp',  'name' => 'Medcare Hospital Sharjah',       'address' => 'King Faisal St - Al Qasimia - Al Suof - Sharjah - UAE',                                     'phone' => '+97180061322173', 'map' => '#'],
        ['image' => 'vaccine-10.webp', 'name' => 'Medcare Medical Centre, Sharjah','address' => 'Al Jawhara Building - Al Taawun St - Al Khan - Sharjah - United Arab Emirates',              'phone' => '+97180063322173', 'map' => '#'],
        ['image' => 'vaccine-9.webp', 'name' => 'French Medical Center - Sharjah', 'address' => 'Al Buhaira Building - Corniche St - Al Majaz - Sharjah - United Arab Emirates',              'phone' => '+97165744266', 'map' => '#'],
        ['image' => 'vaccine-8.webp', 'name' => 'Aster Clinic',                   'address' => 'Sultacc Building - King Faisal St - Al Majaz - Al Majaz 1 - Sharjah - United Arab Emirates', 'phone' => '+97644600500', 'map' => '#'],
    ];

    $ajmanCenters = $dubaiCenters;
@endphp
{{-- ===== Intro ===== --}}
<section class="pt-0 pb-8">
    <div class="container mx-auto">
        <div class="mx-auto max-w-6xl text-center">
            <h1>
                Umrah Vaccination <span class="text-mst">Centers</span>
            </h1>
            <p class="mt-5 text-mst-gray text-[16px]">
                Preparing for Umrah involves more than booking flights and accommodation. Pilgrims should also stay
                updated with the latest vaccination and travel health requirements issued by Saudi authorities.
                Vaccination guidelines may vary based on nationality, travel history, age, and current health
                regulations.
            </p>
            <p class="mt-4 text-mst-gray text-[16px]">
                Saifco Travel &amp; Tourism, a trusted Dubai-based travel company since 2008, assists pilgrims with
                Umrah visa processing, vaccination guidance, Umrah by bus packages, Umrah by air packages, hotel
                reservations, and transportation services. Our team helps travelers understand the latest requirements
                before departure so they can focus on their spiritual journey with confidence. Whether you are traveling
                from Dubai, Sharjah, Abu Dhabi, Ajman, or anywhere in the UAE, we are here to help make your Umrah
                preparation simple, smooth, and stress-free.
            </p>
        </div>
    </div>
</section>
{{-- ===== Alert strip ===== --}}
<section class="pb-12">
    <div class="w-full bg-[#FBE3EA] py-4">
        <div class="container mx-auto">
            <div class="flex items-center justify-center gap-3 text-center">
                <img src="{{ asset('assets/images/icons/alert.svg') }}" class="w-6 flex-shrink-0" alt="alert">
                <span class="text-mst-gray text-sm md:text-[16px]">
                    Umrah vaccination from Govt Hospital is only acceptable to Saudi Consulate
                </span>
            </div>
        </div>
    </div>
</section>
{{-- ===== City center grids ===== --}}
@foreach([
    ['city' => 'Dubai',   'centers' => $dubaiCenters],
    ['city' => 'Sharjah', 'centers' => $sharjahCenters],
    ['city' => 'Ajman',   'centers' => $ajmanCenters],
] as $section)
    <section class="pb-14">
        <div class="container mx-auto">
            <div class="mx-auto max-w-3xl text-center mb-10">
                <h1>
                    <span>Umrah Vaccination </span><span class="text-mst">{{ $section['city'] }} Centers</span>
                </h1>
                <p class="mt-4 text-mst-gray text-[16px]">
                    Get your mandatory Umrah vaccinations from approved {{ $section['city'] }} medical centers with
                    quick processing and trusted healthcare services.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($section['centers'] as $center)
                    @include('frontend.pages.includes.partials.vaccine-center-card', $center)
                @endforeach
            </div>
        </div>
    </section>
@endforeach

{{-- ===== Umrah Offered By ===== --}}
<section class="pb-12">
    <div class="container mx-auto">
        <div class="mx-auto max-w-5xl text-center pt-4 pb-10">
            <h1>
                <span>Umrah Offered </span><span class="text-mst">By</span>
            </h1>
            <p class="mt-5 text-mst-gray">
                Begin your sacred journey with comfort, trust, and complete guidance. We believe in reliability, quality
                customer service, willingness and dedication to serving you the best umrah packages from Dubai, Abu
                Dhabi &amp; Sharjah.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="md:flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-xl">
                <div class="text-center justify-center md:text-left">
                    <h3 class="text-2xl">Umrah by Bus</h3>
                    <p class="text-sm leading-6 my-4 pe-5">Affordable Umrah by Bus from Dubai and UAE with visa
                                                           assistance, transport, and hotel options. Explore
                                                           budget-friendly Umrah packages designed for individuals,
                                                           families, and groups seeking a comfortable spiritual journey
                                                           to Makkah and Madinah.</p>
                    <a href="#"
                       class="flex items-center justify-center w-fit text-white text-sm px-4 pt-1 pb-2 rounded-full mx-auto md:ms-0
                               bg-gradient-to-r from-mst to-[#74611E] hover:from-[#74611E] hover:to-mst transition duration-300 font-heading italic">
                        Explore Umrah by Bus Packages <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                                           class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
                <div class="">
                    <img src="{{ asset('assets/images/umrah/umrah-12.webp') }}"
                         alt=""
                         title=""
                         class="max-w-2xl h-auto mx-auto md:ms-0 md:mt-0 mt-5">
                </div>
            </div>
            <div class="md:flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-xl">
                <div class="text-center justify-center md:text-left">
                    <h3 class="text-2xl">Umrah by Air</h3>
                    <p class="text-sm leading-6 my-4 pe-5">Travel with convenience through our Umrah by Air packages
                                                           from UAE, including visa support, flights, accommodation, and
                                                           complete travel assistance. Choose flexible Umrah options
                                                           with trusted guidance for a smooth pilgrimage experience.</p>
                    <a href="#"
                       class="flex items-center justify-center w-fit text-white text-sm px-4 pt-1 pb-2 rounded-full mx-auto md:ms-0
                               bg-gradient-to-r from-mst to-[#74611E] hover:from-[#74611E] hover:to-mst transition duration-300 font-heading italic">
                        View Umrah by Air Packages <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                                        class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
                <div class="">
                    <img src="{{ asset('assets/images/umrah/umrah-13.webp') }}"
                         alt=""
                         title=""
                         class="max-w-2xl h-auto mx-auto md:ms-0 md:mt-0 mt-5">
                </div>
            </div>
            <div class="md:flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-xl">
                <div class="text-center justify-center md:text-left">
                    <h3 class="text-2xl">Umrah Visa</h3>
                    <p class="text-sm leading-6 my-4 pe-5">Get fast and reliable Umrah visa assistance from UAE with
                                                           updated requirements, documentation guidance, and support
                                                           throughout the application process. Learn about eligibility,
                                                           processing times, and required documents.</p>
                    <a href="#"
                       class="flex items-center justify-center w-fit text-white text-sm px-4 pt-1 pb-2 rounded-full mx-auto md:ms-0
                               bg-gradient-to-r from-mst to-[#74611E] hover:from-[#74611E] hover:to-mst transition duration-300 font-heading italic">
                        Check Umrah Visa Requirements <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                                           class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
                <div class="">
                    <img src="{{ asset('assets/images/umrah/umrah-16.webp') }}"
                         alt=""
                         title=""
                         class="max-w-2xl h-auto mx-auto md:ms-0 md:mt-0 mt-5">
                </div>
            </div>
            <div class="md:flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-xl">
                <div class="text-center justify-center md:text-left">
                    <h3 class="text-2xl">Saudi Multiple Entry Visa</h3>
                    <p class="text-sm leading-6 my-4 pe-5">Apply for Saudi multiple entry visa options suitable for
                                                           Umrah, family visits, and business travel to Saudi Arabia.
                                                           Understand visa validity, eligibility criteria, and how
                                                           multiple-entry visas can provide flexible travel
                                                           opportunities.</p>
                    <a href="#"
                       class="flex items-center justify-center w-fit text-white text-sm px-4 pt-1 pb-2 rounded-full mx-auto md:ms-0
                               bg-gradient-to-r from-mst to-[#74611E] hover:from-[#74611E] hover:to-mst transition duration-300 font-heading italic">
                        Explore Saudi Multiple Entry Visa Options
                        <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                             class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
                <div class="">
                    <img src="{{ asset('assets/images/umrah/umrah-14.webp') }}"
                         alt=""
                         title=""
                         class="max-w-2xl h-auto mx-auto md:ms-0 md:mt-0 mt-5">
                </div>
            </div>
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
