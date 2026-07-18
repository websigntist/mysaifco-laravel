<section class="">
    <div class="px-4 relative flex w-full items-start justify-center overflow-hidden">
        <div class="absolute inset-0 scale-100 bg-cover bg-top bg-no-repeat" style="background-image: url('{{ asset('assets/images/pages/1784392804_6a5bac646bb10_image.webp') }}')" aria-hidden="true"></div>
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
                    <span class="text-mst capitalize">Umrah by Air</span>
                </nav>
                <h1 class="text-5xl w-4xl mt-6 font-body font-bold not-italic leading-16 text-white">
                    Umrah by <br> <span class="text-mst">Air</span>
                </h1>
                <p class="text-lg mt-5 w-6/12 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum,
                                                          eos.</p>
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
    $airPackages = [
        [
            'title' => '5 Nights 5 Star Umrah Package',
            'image' => 'umrah/macca2.webp',
            'price' => '4800',
            'people' => '2 Persons',
            'makkah_hotel' => 'Pullman Zamzam or Similar',
            'makkah_image' => 'umrah/macca3.webp',
            'madinah_hotel' => 'Madina Movenpick or Similar',
            'madinah_image' => 'umrah/madina1.webp',
        ],
        [
            'title' => '5 Nights 4 Star Umrah Package',
            'image' => 'umrah/macca4.webp',
            'price' => '4050',
            'people' => '2 Persons',
            'makkah_hotel' => 'Nawazi Watheer or Similar',
            'makkah_image' => 'umrah/macca1.webp',
            'madinah_hotel' => 'Tawar International or Similar',
            'madinah_image' => 'umrah/madina1.webp',
        ],
        [
            'title' => '5 Nights 3 Star Umrah Package',
            'image' => 'umrah/macca2.webp',
            'price' => '3975',
            'people' => '2 Persons',
            'makkah_hotel' => 'Johrs Diar Matar or Similar',
            'makkah_image' => 'umrah/macca3.webp',
            'madinah_hotel' => 'Al Jumeen Hotel or Similar',
            'madinah_image' => 'umrah/madina1.webp',
        ],
    ];

    $packagesInclude = [
        ['title' => 'Umrah Visa with Insurance',   'desc' => 'Umrah visa processing with mandatory travel insurance coverage.',       'icon' => 'r56.svg'],
        ['title' => 'Airline Return Ticket (Saudi)','desc' => 'Return airfare from Saudi Arabia included for a convenient journey home.', 'icon' => 'ticket.svg'],
        ['title' => 'Transfer in KSA',              'desc' => 'Comfortable transportation services within Saudi Arabia throughout your trip.', 'icon' => 'r666.svg'],
        ['title' => 'Muqeem Registration',          'desc' => 'Assistance with Muqeem registration and required travel formalities.',   'icon' => 'r989r8.svg'],
        ['title' => 'Jumma at Makkah',               'desc' => 'Experience the spiritual blessing of performing Jumma prayer in Makkah.', 'icon' => 't65.svg'],
        ['title' => 'Double Sharing Stay',          'desc' => 'Comfortable accommodation with double-sharing room arrangements.',       'icon' => '7b556.svg'],
        ['title' => 'Tawakkalna App Assist',        'desc' => 'Dedicated support for Tawakkalna app setup and usage during your stay.', 'icon' => '6u56.svg'],
        ['title' => 'Holy Place to Visit',          'desc' => 'Guided visits to significant Islamic and historical sites in the holy cities.', 'icon' => 'm989.svg'],
    ];

    $requiredDocsAir = [
        ['icon' => 'scan.svg',  'title_main' => 'Clear Scans of ', 'title_accent' => 'Passport Copy',   'desc' => 'Passport should be valid for 6 months and Visa should be valid for  months .'],
        ['icon' => 'photo.svg', 'title_main' => '1 Passport   ',   'title_accent' => 'Size Photo',      'desc' => 'Passport should be valid for 6 months and Visa should be valid for months.'],
        ['icon' => 'idcard.svg','title_main' => 'National ID ',    'title_accent' => 'Card Copy',       'desc' => 'National ID Card copy (Front & Back)'],
        ['icon' => 'timer.svg', 'title_main' => 'Processing ',     'title_accent' => 'Time',            'desc' => 'Umrah Visa Processing will take approximately 2-3 working days.'],
    ];

    $reviews = [
        ['name' => 'Syed Hussain Hashmi', 'role' => 'Umrah Traveler · Dubai',
         'text' => 'Saifco made our Umrah journey truly unforgettable. Everything was perfectly arranged - visa, hotels near Haram, and the transport. We felt so well cared for throughout our spiritual journey Highly recommended.'],
        ['name' => 'Sarah Ahmed', 'role' => 'Umrah Traveler · Dubai',
         'text' => 'My Umrah journey was truly unforgettable. The seamless process and incredible support made everything so smooth. From the initial steps of booking to completing the rituals, I felt guided every step of the way.'],
        ['name' => 'Mohammad Bilal', 'role' => 'Umrah Traveler · Dubai',
         'text' => 'Performing Umrah has been one of the most meaningful experiences of my life. Peacefulness I felt while praying at the Holy Mosque was indescribable. The entire process was organized, and I felt deeply connected with my faith.'],
    ];

    $worldwideServices = [
        ['title' => 'Visa Services',        'desc' => 'Avail umrah visa with just a 3 step online process and get an approval in the next 48 hours.', 'icon' => 'r56.svg'],
        ['title' => 'Flights Reservations', 'desc' => 'Booking flights is easy with Saifco Travel - we always have the best prices for Umrah flights.', 'icon' => 'p34.svg'],
        ['title' => 'Transportation',       'desc' => "Our agency offers different VIP transportation facility from Makkah to Madina and vise versa.", 'icon' => 'b896.svg'],
        ['title' => 'Hotel Booking',        'desc' => 'Book luxury hotel at best prices as we are in collaboration with top hotels in Saudi Arabia.',  'icon' => '988.svg'],
    ];
@endphp
{{-- ===== Intro strip ===== --}}
<section class="pt-10 pb-4">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] items-center gap-8">
            <div>
                <h1 class="text-center md:text-left"><span>Umrah by </span><span class="text-mst">Air</span></h1>
                <p class="text-[16px] mt-4 text-center md:text-left">We specialize in Umrah packages by Air. We offer an
                                                                     economy to 5-star Umrah package. Departure options
                                                                     are available from Dubai, Sharjah, or Abu Dhabi,
                                                                     according to your convenience. We offer customized
                                                                     and tailor-made Umrah packages that suit your
                                                                     requirements at a very reasonable price. We arrange
                                                                     transportation, luxury vehicles, and hotel bookings
                                                                     across Saudi Arabia, so you won't have to worry
                                                                     about a thing.</p>
                <div class="flex items-center justify-center md:justify-start">
                    <a href="#" class="flex items-center justify-center w-fit text-white text-md md:text-lg px-5 pt-2 pb-2
                            rounded-full bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                             hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                             transition duration-300 font-heading italic mt-8"> Connect with Us
                        <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-5 ms-1" alt="arrow"> </a>
                </div>
            </div>
            <div class="flex items-center justify-center md:justify-end">
                <div class="w-65">
                    <img src="{{ asset('assets/images/98d9f8d9-original.webp') }}" alt="Umrah by Air">
                </div>
            </div>
        </div>
    </div>
</section>
{{-- umrah packages --}}
<section class="pb-12">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-12 pb-10">
            <h1>
                <span>Umrah by Air </span><span class="text-mst">Packages</span>
            </h1>
            <p class="mt-5">Compare our Umrah by Bus packages and select the accommodation option that matches your
                            travel needs and budget. From economical sharing arrangements to more private room options,
                            we have packages suitable for every pilgrim.</p>
        </div>
        <div class="single-packages">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Card 1: 5 Star Package -->
                <div class="bg-gray-50 rounded-3xl border border-gray-200 p-4 flex flex-col justify-between">
                    <div>
                        <!-- Header Image Container -->
                        <div class="relative pb-6">
                            <!-- Image Wrapper -->
                            <div class="relative w-full aspect-[4/3] rounded-2xl overflow-hidden">
                                <img src="{{ asset('assets/images/umrah/macca1.webp') }}" class="w-full h-full
                                object-cover" alt="5 Nights 5 Star Umrah Package">
                                <!-- Bottom Gradient Overlay -->
                                <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/75
                                via-black/50 to-transparent"></div>
                                <!-- Title -->
                                <div class="absolute bottom-16 left-0 right-0 px-2 text-center">
                                    <h3 class="text-white text-[22px] font-bold italic font-heading capitalize
                                    leading-tight">
                                        5 Nights 5 Star Umrah Package
                                    </h3>
                                </div>
                            </div>
                            <!-- Hanging Badge -->
                            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 translate-y-1/2 z-10 w-[90%]
                                        md:w-[78%] bg-gradient-to-r from-[#BA9B31] to-[#74611E] rounded-full py-4 px-6 flex
                                        items-center justify-between text-white">
                                <!-- Price -->
                                <div class="flex items-center gap-1.5">
                                    <!-- Coin SVG -->
                                    <img src="{{ asset('assets/images/icons/icon5.svg') }}" alt="">
                                    <div class="flex flex-col text-left">
                                        <span class="text-xs text-white tracking-wider leading-none">Price Per Head</span>
                                        <span class="text-xs md:text-sm font-medium text-white leading-none mt-1">AED
                                                                                                                  4600</span>
                                    </div>
                                </div>
                                <!-- Dot -->
                                <span class="text-white text-lg font-bold select-none">•</span>
                                <!-- Min People -->
                                <div class="flex items-center gap-1.5">
                                    <!-- Group SVG -->
                                    <img src="{{ asset('assets/images/icons/gr3.svg') }}" alt="">
                                    <div class="flex flex-col text-left">
                                        <span class="text-xs text-white tracking-wider leading-none">Min People</span>
                                        <span class="text-xs md:text-sm font-medium text-white leading-none mt-1">2 Persons</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accommodation Info Block -->
                        <div class="mt-4 space-y-4">
                            <!-- Hotel Box 1 -->
                            <div class="bg-gray-100 rounded-2xl p-3 flex gap-3.5 ">
                                <div class="rounded-xl overflow-hidden flex-shrink-0">
                                    <img src="{{ asset('assets/images/umrah/macca4.webp') }}" class="w-full h-full object-cover" alt="Makkah Hotel">
                                </div>
                                <div class="flex-grow flex flex-col justify-center min-w-0">
                                    <h4 class="text-[18px] font-bold italic font-heading leading-tight mb-1 truncate">3
                                                                                                                      Nights
                                                                                                                      in
                                                                                                                      Makkah</h4>
                                    <div class="flex items-center gap-1 text-gray-700 mt-2 mb-3">
                                        <img src="{{asset('assets/images/icons/redmark.svg')}}" alt="">
                                        <span class="text-xs font-medium truncate">Pullman Zamzam or Similar</span>
                                    </div>
                                    <div class="flex items-center gap-1 text-[#282828]">
                                        <img src="{{asset('assets/images/icons/star.svg')}}" alt="">
                                        <span class="text-xs text-gray-500 font-medium">
                                            <strong class="text-gray-800">4.9</strong>/5 <span class="mx-0.5 text-gray-300">|</span> 5.1k Reviews</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Hotel Box 2 -->
                            <div class="bg-gray-100 rounded-2xl p-3 flex gap-3.5 ">
                                <div class="rounded-xl overflow-hidden flex-shrink-0">
                                    <img src="{{ asset('assets/images/umrah/madina1.webp') }}" class="w-full h-full object-cover" alt="Makkah Hotel">
                                </div>
                                <div class="flex-grow flex flex-col justify-center min-w-0">
                                    <h4 class="text-[18px] font-bold italic font-heading leading-tight mb-1 truncate">2
                                                                                                                      Nights
                                                                                                                      in
                                                                                                                      Madinah</h4>
                                    <div class="flex items-center gap-1 text-gray-700 mt-2 mb-3">
                                        <img src="{{asset('assets/images/icons/redmark.svg')}}" alt="">
                                        <span class="text-xs font-medium truncate">Pullman Zamzam or Similar</span>
                                    </div>
                                    <div class="flex items-center gap-1 text-[#282828]">
                                        <img src="{{asset('assets/images/icons/star.svg')}}" alt="">
                                        <span class="text-xs text-gray-500 font-medium">
                                        <strong class="text-gray-800">4.9</strong>/5 <span class="mx-0.5 text-gray-300">|</span> 5.1k Reviews</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CTA Buttons -->
                    <div class="mt-5 flex items-center justify-between sm:gap-3 px-3">
                        <a href="#"
                           class="flex items-center justify-center mx-auto w-fit text-white px-6 pt-1 pb-2 rounded-full text-sm
                               bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                            Package Inquiry
                            <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4 mt-1 ms-1" alt="">
                        </a> <a href="#"
                                class="flex items-center justify-center mx-auto w-fit text-white px-6 pt-1 pb-2 rounded-full text-sm
                               bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                            Call me Back
                            <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4 mt-1 ms-1" alt="">
                        </a>
                    </div>
                </div>
                <!-- Card 2: 5 Star Package -->
                <div class="bg-gray-50 rounded-3xl border border-gray-200 p-4 flex flex-col justify-between">
                    <div>
                        <!-- Header Image Container -->
                        <div class="relative pb-6">
                            <!-- Image Wrapper -->
                            <div class="relative w-full aspect-[4/3] rounded-2xl overflow-hidden">
                                <img src="{{ asset('assets/images/umrah/macca2.webp') }}" class="w-full h-full
                                object-cover" alt="5 Nights 5 Star Umrah Package">
                                <!-- Bottom Gradient Overlay -->
                                <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/75
                                via-black/50 to-transparent"></div>
                                <!-- Title -->
                                <div class="absolute bottom-16 left-0 right-0 px-2 text-center">
                                    <h3 class="text-white text-[22px] font-bold italic font-heading capitalize
                                    leading-tight">
                                        5 Nights 5 Star Umrah Package
                                    </h3>
                                </div>
                            </div>
                            <!-- Hanging Badge -->
                            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 translate-y-1/2 z-10 w-[90%]
                                md:w-[78%] bg-gradient-to-r from-[#BA9B31] to-[#74611E] rounded-full py-4 px-6 flex
                                items-center justify-between text-white">
                                <!-- Price -->
                                <div class="flex items-center gap-1.5">
                                    <!-- Coin SVG -->
                                    <img src="{{ asset('assets/images/icons/icon5.svg') }}" alt="">
                                    <div class="flex flex-col text-left">
                                        <span class="text-xs text-white tracking-wider leading-none">Price Per Head</span>
                                        <span class="text-xs md:text-sm font-medium text-white leading-none mt-1">AED
                                                                                                                  4600</span>
                                    </div>
                                </div>
                                <!-- Dot -->
                                <span class="text-white text-lg font-bold select-none">•</span>
                                <!-- Min People -->
                                <div class="flex items-center gap-1.5">
                                    <!-- Group SVG -->
                                    <img src="{{ asset('assets/images/icons/gr3.svg') }}" alt="">
                                    <div class="flex flex-col text-left">
                                        <span class="text-xs text-white tracking-wider leading-none">Min People</span>
                                        <span class="text-xs md:text-sm font-medium text-white leading-none mt-1">2 Persons</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accommodation Info Block -->
                        <div class="mt-4 space-y-4">
                            <!-- Hotel Box 1 -->
                            <div class="bg-gray-100 rounded-2xl p-3 flex gap-3.5 ">
                                <div class="rounded-xl overflow-hidden flex-shrink-0">
                                    <img src="{{ asset('assets/images/umrah/macca4.webp') }}" class="w-full h-full object-cover" alt="Makkah Hotel">
                                </div>
                                <div class="flex-grow flex flex-col justify-center min-w-0">
                                    <h4 class="text-[18px] font-bold italic font-heading leading-tight mb-1 truncate">3
                                                                                                                      Nights
                                                                                                                      in
                                                                                                                      Makkah</h4>
                                    <div class="flex items-center gap-1 text-gray-700 mt-2 mb-3">
                                        <img src="{{asset('assets/images/icons/redmark.svg')}}" alt="">
                                        <span class="text-xs font-medium truncate">Pullman Zamzam or Similar</span>
                                    </div>
                                    <div class="flex items-center gap-1 text-[#282828]">
                                        <img src="{{asset('assets/images/icons/star.svg')}}" alt="">
                                        <span class="text-xs text-gray-500 font-medium">
                                            <strong class="text-gray-800">4.9</strong>/5 <span class="mx-0.5 text-gray-300">|</span> 5.1k Reviews</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Hotel Box 2 -->
                            <div class="bg-gray-100 rounded-2xl p-3 flex gap-3.5 ">
                                <div class="rounded-xl overflow-hidden flex-shrink-0">
                                    <img src="{{ asset('assets/images/umrah/madina1.webp') }}" class="w-full h-full object-cover" alt="Makkah Hotel">
                                </div>
                                <div class="flex-grow flex flex-col justify-center min-w-0">
                                    <h4 class="text-[18px] font-bold italic font-heading leading-tight mb-1 truncate">2
                                                                                                                      Nights
                                                                                                                      in
                                                                                                                      Madinah</h4>
                                    <div class="flex items-center gap-1 text-gray-700 mt-2 mb-3">
                                        <img src="{{asset('assets/images/icons/redmark.svg')}}" alt="">
                                        <span class="text-xs font-medium truncate">Pullman Zamzam or Similar</span>
                                    </div>
                                    <div class="flex items-center gap-1 text-[#282828]">
                                        <img src="{{asset('assets/images/icons/star.svg')}}" alt="">
                                        <span class="text-xs text-gray-500 font-medium">
                                        <strong class="text-gray-800">4.9</strong>/5 <span class="mx-0.5 text-gray-300">|</span> 5.1k Reviews</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CTA Buttons -->
                    <div class="mt-5 flex items-center justify-between sm:gap-3 px-3">
                        <a href="#"
                           class="flex items-center justify-center mx-auto w-fit text-white px-6 pt-1 pb-2 rounded-full text-sm
                               bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                            Package Inquiry
                            <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4 mt-1 ms-1" alt="">
                        </a> <a href="#"
                                class="flex items-center justify-center mx-auto w-fit text-white px-6 pt-1 pb-2 rounded-full text-sm
                               bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                            Call me Back
                            <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4 mt-1 ms-1" alt="">
                        </a>
                    </div>
                </div>
                <!-- Card 3: 5 Star Package -->
                <div class="bg-gray-50 rounded-3xl border border-gray-200 p-4 flex flex-col justify-between">
                    <div>
                        <!-- Header Image Container -->
                        <div class="relative pb-6">
                            <!-- Image Wrapper -->
                            <div class="relative w-full aspect-[4/3] rounded-2xl overflow-hidden">
                                <img src="{{ asset('assets/images/umrah/macca3.webp') }}" class="w-full h-full
                                object-cover" alt="5 Nights 5 Star Umrah Package">
                                <!-- Bottom Gradient Overlay -->
                                <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/75
                                via-black/50 to-transparent"></div>
                                <!-- Title -->
                                <div class="absolute bottom-16 left-0 right-0 px-2 text-center">
                                    <h3 class="text-white text-[22px] font-bold italic font-heading capitalize
                                    leading-tight">
                                        5 Nights 5 Star Umrah Package
                                    </h3>
                                </div>
                            </div>
                            <!-- Hanging Badge -->
                            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 translate-y-1/2 z-10 w-[90%]
                            md:w-[78%] bg-gradient-to-r from-[#BA9B31] to-[#74611E] rounded-full py-4 px-6 flex
                            items-center justify-between text-white">
                                <!-- Price -->
                                <div class="flex items-center gap-1.5">
                                    <!-- Coin SVG -->
                                    <img src="{{ asset('assets/images/icons/icon5.svg') }}" alt="">
                                    <div class="flex flex-col text-left">
                                        <span class="text-xs text-white tracking-wider leading-none">Price Per Head</span>
                                        <span class="text-xs md:text-sm font-medium text-white leading-none mt-1">AED
                                                                                                                  4600</span>
                                    </div>
                                </div>
                                <!-- Dot -->
                                <span class="text-white text-lg font-bold select-none">•</span>
                                <!-- Min People -->
                                <div class="flex items-center gap-1.5">
                                    <!-- Group SVG -->
                                    <img src="{{ asset('assets/images/icons/gr3.svg') }}" alt="">
                                    <div class="flex flex-col text-left">
                                        <span class="text-xs text-white tracking-wider leading-none">Min People</span>
                                        <span class="text-xs md:text-sm font-medium text-white leading-none mt-1">2 Persons</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accommodation Info Block -->
                        <div class="mt-4 space-y-4">
                            <!-- Hotel Box 1 -->
                            <div class="bg-gray-100 rounded-2xl p-3 flex gap-3.5 ">
                                <div class="rounded-xl overflow-hidden flex-shrink-0">
                                    <img src="{{ asset('assets/images/umrah/macca4.webp') }}" class="w-full h-full object-cover" alt="Makkah Hotel">
                                </div>
                                <div class="flex-grow flex flex-col justify-center min-w-0">
                                    <h4 class="text-[18px] font-bold italic font-heading leading-tight mb-1 truncate">3
                                                                                                                      Nights
                                                                                                                      in
                                                                                                                      Makkah</h4>
                                    <div class="flex items-center gap-1 text-gray-700 mt-2 mb-3">
                                        <img src="{{asset('assets/images/icons/redmark.svg')}}" alt="">
                                        <span class="text-xs font-medium truncate">Pullman Zamzam or Similar</span>
                                    </div>
                                    <div class="flex items-center gap-1 text-[#282828]">
                                        <img src="{{asset('assets/images/icons/star.svg')}}" alt="">
                                        <span class="text-xs text-gray-500 font-medium">
                                            <strong class="text-gray-800">4.9</strong>/5 <span class="mx-0.5 text-gray-300">|</span> 5.1k Reviews</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Hotel Box 2 -->
                            <div class="bg-gray-100 rounded-2xl p-3 flex gap-3.5 ">
                                <div class="rounded-xl overflow-hidden flex-shrink-0">
                                    <img src="{{ asset('assets/images/umrah/madina1.webp') }}" class="w-full h-full object-cover" alt="Makkah Hotel">
                                </div>
                                <div class="flex-grow flex flex-col justify-center min-w-0">
                                    <h4 class="text-[18px] font-bold italic font-heading leading-tight mb-1 truncate">2
                                                                                                                      Nights
                                                                                                                      in
                                                                                                                      Madinah</h4>
                                    <div class="flex items-center gap-1 text-gray-700 mt-2 mb-3">
                                        <img src="{{asset('assets/images/icons/redmark.svg')}}" alt="">
                                        <span class="text-xs font-medium truncate">Pullman Zamzam or Similar</span>
                                    </div>
                                    <div class="flex items-center gap-1 text-[#282828]">
                                        <img src="{{asset('assets/images/icons/star.svg')}}" alt="">
                                        <span class="text-xs text-gray-500 font-medium">
                                        <strong class="text-gray-800">4.9</strong>/5 <span class="mx-0.5 text-gray-300">|</span> 5.1k Reviews</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- CTA Buttons -->
                    <div class="mt-5 flex items-center justify-between sm:gap-3 px-3">
                        <a href="#"
                           class="flex items-center justify-center mx-auto w-fit text-white px-6 pt-1 pb-2 rounded-full text-sm
                               bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                            Package Inquiry
                            <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4 mt-1 ms-1" alt="">
                        </a> <a href="#"
                                class="flex items-center justify-center mx-auto w-fit text-white px-6 pt-1 pb-2 rounded-full text-sm
                               bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                            Call me Back
                            <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4 mt-1 ms-1" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- ===== Packages Include ===== --}}
<section class="pb-6">
    <div class="container mx-auto">
        <div class="mx-auto max-w-5xl text-center pb-10">
            <h1><span>Packages </span><span class="text-mst">Include</span></h1>
            <p class="mt-5">Our comprehensive Umrah packages include visa processing, accommodation, transportation, and
                            guided services for a seamless pilgrimage experience</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($packagesInclude as $item)
                <div class="flex flex-col items-center text-center px-5 py-6 rounded-2xl border border-gray-200 bg-gray-50">
                    <img src="{{ asset('assets/images/icons/' . $item['icon']) }}"
                         class="w-12 h-12 object-contain mx-auto mb-2"
                         alt="{{ $item['title'] }}">

                    <h3 class="font-heading font-semibold text-base text-mst-gray mb-2">
                        {{ $item['title'] }}
                    </h3>

                    <p class="text-xs font-body text-gray-600 leading-snug">
                        {{ $item['desc'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
{{-- ===== Required Documents for Umrah Visa ===== --}}
<section class="pt-10 pb-16 bg-gray-50">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-2 pb-10">
            <h1><span>Required Documents for </span><span class="text-mst">Umrah Visa</span></h1>
            <p class="mt-5">Please ensure all documents are clear, valid and up to date.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
            <div class="space-y-7">
                @foreach($requiredDocsAir as $doc)
                    <div class="py-4 px-6 rounded-xl border border-gray-200 bg-white text-center md:text-left">
                        <div class="flex items-center">
                            <div class="me-3">
                                <img src="{{ asset('assets/images/icons/' . $doc['icon']) }}" alt="">
                            </div>
                            <div>
                                <h3 class="italic">
                                    <span>{{ $doc['title_main'] }}</span><span class="text-mst">{{ $doc['title_accent'] }}</span>
                                </h3>
                                <p class="text-[14px] mt-2">{{ $doc['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex items-center justify-end">
                <img src="{{ asset('assets/images/umrah/umrah-1.webp') }}"
                     class="w-full object-cover rounded-xl"
                     alt="umrah visa">
            </div>
        </div>
    </div>
</section>
{{-- ===== We Offer Umrah from ===== --}}
<section class="pb-12">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-12 pb-10">
            <h1><span>We Offer </span><span class="text-mst">Umrah from</span></h1>
            <p class="mt-5">Find the perfect umrah packages as per your family needs, we got a wide range of luxury,
                            VIP, 5 Star, 4 Star and 3 Star packages to perfrom umrah by bus and air from all emirates in
                            UAE.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-3xl">
                <div class="text-center">
                    <img src="{{ asset('assets/images/umrah/umrah-7.webp') }}" class="mx-auto mb-4" alt="">
                    <h3 class="text-xl">Umrah from Dubai</h3>
                    <p class="text-sm leading-6 my-4 line-clamp-2">Saifco Travel is a Dubai Based Specialist Umrah
                                                                   Travel Agency providing luxury Umrah packages by Bus
                                                                   and</p>
                    <a href="#"
                       class="flex items-center justify-center w-fit mx-auto text-white text-sm mt-5 px-4 pt-1 pb-2
                       rounded-full
                               bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Learn more <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                        class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
            </div>
            <div class="flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-3xl">
                <div class="text-center">
                    <img src="{{ asset('assets/images/umrah/umrah-8.webp') }}" class="mx-auto mb-4" alt="">
                    <h3 class="text-xl">Umrah from Abu Dhabi</h3>
                    <p class="text-sm leading-6 my-4 line-clamp-2">Avail best Umrah by bus and air packages from Abu
                                                                   Dhabi. Visa services included in all of the
                                                                   packages.</p>
                    <a href="#"
                       class="flex items-center justify-center w-fit mx-auto text-white text-sm mt-5 px-4 pt-1 pb-2
                                   rounded-full
                                           bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Learn more <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                        class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
            </div>
            <div class="flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-3xl">
                <div class="text-center">
                    <img src="{{ asset('assets/images/umrah/umrah-9.webp') }}" class="mx-auto mb-4" alt="">
                    <h3 class="text-xl">Umrah from Sharjah</h3>
                    <p class="text-sm leading-6 my-4 line-clamp-2">Our experienced and highest quality services range
                                                                   from just Umrah Visa to a complete Umrah package</p>
                    <a href="#"
                       class="flex items-center justify-center w-fit mx-auto text-white text-sm mt-5 px-4 pt-1 pb-2
                                   rounded-full
                                           bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Learn more <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                        class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.components.testimonials')
{{-- ===== World Wide Umrah Services ===== --}}
<section class="pt-6 pb-14">
    <div class="container mx-auto">
        <div class="mx-auto max-w-5xl text-center pb-10">
            <h1><span>World Wide </span><span class="text-mst">Umrah Services</span></h1>
            <p class="mt-5">Our travel agency got 5 star ratings globally for umrah services. We offer competitive
                            pricing with best customer support available 24/7 over Whatsapp.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($worldwideServices as $service)
                <div class="flex flex-col items-center text-center px-5 py-6 rounded-2xl border border-gray-200 bg-gray-50">
                    <span class="rounded-xl flex items-center justify-center mb-2">
                        <img src="{{ asset('assets/images/icons/' . $service['icon']) }}"
                             class="w-12 h-12 object-contain"
                             alt="{{ $service['title'] }}">
                    </span>

                    <h3 class="font-heading font-semibold text-base text-mst-gray mb-2">
                        {{ $service['title'] }}
                    </h3>

                    <p class="text-xs font-body text-gray-600 leading-snug">
                        {{ $service['desc'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
{{-- ===== How to perform Umrah? ===== --}}
<section class="flex justify-between items-center py-12 mb-16 bg-gray-100">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] items-center gap-8">
            <div>
                <h1 class="md:text-left text-center">
                    <span>How to perform </span><span class="text-mst">Umrah?</span>
                </h1>
                <p class="text-[16px] mt-4 md:text-left text-center">Learn the step-by-step process of performing Umrah,
                                                                     from the journey to Mecca to completing the rituals
                                                                     with devotion and reverence.</p>
            </div>
            <div class="flex items-center justify-center md:justify-end">
                <a href="" class="flex items-center justify-center w-fit text-white text-lg px-7 pt-3 pb-3
                rounded-full
                                    bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                                     hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                                     transition duration-300 font-heading italic"> Download Umrah Guide
                    <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                         class="w-5 ms-2 rotate-90"
                         alt="arrow"> </a>
            </div>
        </div>
    </div>
</section>
{{-- FAQs --}}
<section class="flex items-center justify-center pb-0">
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
