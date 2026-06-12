{{-- umrah by bus --}}
<section class="flex justify-between items-center py-12">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] items-center gap-8">
            <div>
                @php
                    $page_title = "Umrah by Bus from Dubai – Affordable Packages with Visa & Transport";
                    $words      = explode(' ', $page_title);
                    $count      = count($words);
                    $spanN      = $count >= 7 ? 6 : 5;
                    $mainText   = implode(' ', array_slice($words, 0, -$spanN));
                    $spanText   = implode(' ', array_slice($words, -$spanN));
                @endphp
                <h1 class="text-center md:text-left md:w-10/12">
                    <span>{{ $mainText }} </span><span class="text-mst">{{ $spanText }}</span>
                </h1>
                <p class="text-[16px] mt-4 text-center md:text-left">Our 10-days Umrah by Bus packages from Dubai and
                                                                     UAE offer an affordable and convenient way to
                                                                     perform Umrah. Each package includes essential
                                                                     travel arrangements to ensure a smooth and
                                                                     spiritually rewarding journey.</p>
                <div class="flex items-center justify-start gap-3">
                    <a href="" class="flex items-center justify-center w-fit text-white text-lg px-5 pt-2 pb-2 rounded-full
                            bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                             hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                             transition duration-300 font-heading
                             italic mt-8"> View Packages <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                                              class="w-5 ms-1"
                                                              alt="arrow"> </a> <a href="" class="flex items-center justify-center w-fit text-white text-lg px-5 pt-2 pb-2 rounded-full
                            bg-gradient-to-r from-[#2D9D3E] to-[#1E5E28]
                             hover:bg-gradient-to-r hover:from-[#1E5E28] hover:to-[#2D9D3E]
                             transition duration-300 font-heading
                             italic mt-8"> WhatsApp Now <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                                             class="w-5 ms-1"
                                                             alt="arrow"> </a>
                </div>
            </div>
            <div class="flex items-center justify-end">
                <img src="{{asset('assets/images/umrah/busstop.webp')}}"
                     class="object-cover"
                     alt="umrah"
                     title="umrah"
                     width="250"
                     height="250">
            </div>
        </div>
    </div>
</section>
{{--===== alert ======--}}
<section class="py-5 flex items-center justify-center bg-[#EB001B26]">
    <div class="flex">
        <img src="{{ asset('assets/images/icons/alert.svg') }}"
             class="me-2"
             title="alert"
             alt="alert">
        <p>The Below Rates are not valid for RAMADAN. Rates for the Umrah by Bus Ramadan package can be discussed on the
           phone.</p>
    </div>
</section>
{{-- umrah packages --}}
<section class="">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-12 pb-10">
            <h1>
                <span>Umrah by Bus  </span><span class="text-mst">Packages</span>
            </h1>
            <p class="mt-5">Compare our Umrah by Bus packages and select the accommodation option that matches your
                            travel needs and budget. From economical sharing arrangements to more private room options,
                            we have packages suitable for every pilgrim.</p>
        </div>
        @include('frontend.components.umrah-pricing')
    </div>
</section>
{{-- packages include --}}
<section class="">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pb-10">
            <h1>
                <span>Packages  </span><span class="text-mst">Include</span>
            </h1>
            <p class="mt-5">Our comprehensive Umrah packages include visa processing, accommodation, transportation, and
                            guided services for a seamless pilgrimage experience</p>
        </div>
        <div class="pkg-include">
            <!-- Service Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1: Luxury Bus -->
                <div id="pkg-include-bus-card" class="flex flex-col items-center justify-center text-center px-4 py-10
                rounded-3xl border border-gray-200 bg-gray-50 transition
                duration-300 hover:-translate-y-1 hover:border-gray-200 group">
                    <div class="w-16 h-16 mb-5 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                        <img src="{{ asset('assets/images/icons/bus.svg') }}" alt="Luxury Bus" class="w-full h-full object-contain">
                    </div>
                    <h3 class="font-heading font-semibold text-lg text-mst-gray mb-3">Luxury Bus</h3>
                    <p class="text-sm font-body font-medium text-gray-700">Comfortable air-conditioned bus travel from
                                                                           UAE to Saudi Arabia .</p>
                </div>
                <!-- Card 2: Umrah Visa -->
                <div id="pkg-include-visa-card" class="flex flex-col items-center justify-center text-center px-4 py-10
                                rounded-3xl border border-gray-200 bg-gray-50 transition
                                duration-300 hover:-translate-y-1 hover:border-gray-200 group">
                    <div class="w-16 h-16 mb-5 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                        <img src="{{ asset('assets/images/icons/visa.svg') }}" alt="Umrah Visa" class="w-full h-full object-contain">
                    </div>
                    <h3 class="font-heading font-semibold text-lg text-mst-gray mb-3">Umrah Visa</h3>
                    <p class="text-sm font-body font-medium text-gray-700">Fast and reliable Umrah visa processing
                                                                           included.</p>
                </div>
                <!-- Card 3: Hotel Stay -->
                <div id="pkg-include-hotel-card" class="flex flex-col items-center justify-center text-center px-4 py-10
                                rounded-3xl border border-gray-200 bg-gray-50 transition
                                duration-300 hover:-translate-y-1 hover:border-gray-200 group">
                    <div class="w-16 h-16 mb-5 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                        <img src="{{ asset('assets/images/icons/hotel.svg') }}" alt="Hotel Stay" class="w-full h-full object-contain">
                    </div>
                    <h3 class="font-heading font-semibold text-lg text-mst-gray mb-3">Hotel Stay</h3>
                    <p class="text-sm font-body font-medium text-gray-700">Quality accommodation in Makkah and
                                                                           Madinah.</p>
                </div>
                <!-- Card 4: Visit to Holy Sites -->
                <div id="pkg-include-ziyarat-card" class="flex flex-col items-center justify-center text-center px-4 py-10
                                rounded-3xl border border-gray-200 bg-gray-50 transition
                                duration-300 hover:-translate-y-1 hover:border-gray-200 group">
                    <div class="w-16 h-16 mb-5 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                        <img src="{{ asset('assets/images/icons/mosque.svg') }}" alt="Visit to Holy Sites (Ziyarat)" class="w-full h-full object-contain">
                    </div>
                    <h3 class="font-heading font-semibold text-lg text-mst-gray mb-3">Visit to Holy Sites (Ziyarat)</h3>
                    <p class="text-sm font-body font-medium text-gray-700">Guided visits to renowned Islamic
                                                                           landmarks.</p>
                </div>
            </div>
            <!-- Bottom Features Bar -->
            <div class="mt-8 p-6 lg:p-8 rounded-3xl border border-gray-200 bg-gray-50">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-0 lg:divide-x
                lg:divide-black">
                    <!-- Feature 1: Licensed & Trusted -->
                    <div id="pkg-feature-licensed" class="flex items-center gap-4 lg:pr-6">
                        <div class="w-14 h-14 flex-shrink-0 transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('assets/images/icons/trusted2.svg') }}" alt="Licensed & Trusted" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-[15px] sm:text-base text-mst-gray mb-0.5 leading-snug">
                                Licensed & Trusted</h4>
                            <p class="text-xs text-gray-900 font-body leading-normal">UAE Licensed Travel Agency</p>
                        </div>
                    </div>
                    <!-- Feature 2: 18+ Years Experience -->
                    <div id="pkg-feature-experience" class="flex items-center gap-4 lg:px-6">
                        <div class="w-14 h-14 flex-shrink-0 transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('assets/images/icons/18exp.svg') }}" alt="18+ Years Experience" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-[15px] sm:text-base text-mst-gray mb-0.5 leading-snug">
                                18+ Years Experience</h4>
                            <p class="text-xs text-gray-900 font-body leading-normal">Serving Pilgrims Since 2008</p>
                        </div>
                    </div>
                    <!-- Feature 3: Best Price Guaranteed -->
                    <div id="pkg-feature-price" class="flex items-center gap-4 lg:px-6">
                        <div class="w-14 h-14 flex-shrink-0 transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('assets/images/icons/guarented.svg') }}" alt="Best Price Guaranteed" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-[15px] sm:text-base text-mst-gray mb-0.5 leading-snug">
                                Best Price Guaranteed</h4>
                            <p class="text-xs text-gray-900 font-body leading-normal">Quality service at Affordable
                                                                                      Price</p>
                        </div>
                    </div>
                    <!-- Feature 4: 24/7 Support -->
                    <div id="pkg-feature-support" class="flex items-center gap-4 lg:pl-6">
                        <div class="w-14 h-14 flex-shrink-0 transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('assets/images/icons/support.svg') }}" alt="24/7 Support" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-[15px] sm:text-base text-mst-gray mb-0.5 leading-snug">
                                24/7 Support</h4>
                            <p class="text-xs text-gray-900 font-body leading-normal">We are here to help you
                                                                                      anytime</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- bus packages --}}
<section class="">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-16 pb-10">
            <h1>
                <span>Ramadan Umrah by Bus  </span><span class="text-mst"> Packages 2026</span>
            </h1>
            <p class="mt-5">Travel comfortably this Ramadan with our specially arranged Umrah by Bus packages.
                            Affordable fares, reliable service, and a spiritually enriching journey.</p>
        </div>
        <div class="ramadan-umrah" id="ramadan-umrah-section">
            <!-- Responsive Table Container with Custom Scrollbar -->
            <div class="overflow-x-auto ddscroll rounded-2xl border border-gray-200/60 shadow-[0_4px_25px_rgba(0,0,0,0.01)]">
                <table id="ramadan-umrah-table" class="w-full min-w-[768px] border-collapse bg-white text-center">
                    <thead>
                    <tr class="bg-[#1E5E28] text-white">
                        <th id="ramadan-umrah-table-head-departure" class="py-4 px-6 font-heading font-semibold border-r border-[#17491E] last:border-r-0">
                            <div class="flex items-center justify-center gap-2">
                                <img src="{{ asset('assets/images/icons/calender.svg') }}" alt="Calendar"
                                     class="w-5 h-5"> <span>Departure Day</span>
                            </div>
                        </th>
                        <th id="ramadan-umrah-table-head-sharing-4-5" class="py-4 px-6 font-heading font-semibold border-r border-[#17491E] last:border-r-0">
                            <div class="flex items-center justify-center gap-2">
                                <img src="{{ asset('assets/images/icons/bed.svg') }}" alt="Bed" class="w-6 h-5
                                    object-contain"> <span>Sharing 4~5 Beds</span>
                            </div>
                        </th>
                        <th id="ramadan-umrah-table-head-sharing-3" class="py-4 px-6 font-heading font-semibold border-r border-[#17491E] last:border-r-0">
                            <div class="flex items-center justify-center gap-2">
                                <img src="{{ asset('assets/images/icons/bed.svg') }}" alt="Bed" class="w-6 h-5 object-contain">
                                <span>Sharing 3 Beds</span>
                            </div>
                        </th>
                        <th id="ramadan-umrah-table-head-sharing-2" class="py-4 px-6 font-heading font-semibold border-r border-[#17491E] last:border-r-0">
                            <div class="flex items-center justify-center gap-2">
                                <img src="{{ asset('assets/images/icons/bed.svg') }}" alt="Bed" class="w-6 h-5 object-contain">
                                <span>Sharing 2 Beds</span>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-md text-mst-gray font-semibold">
                    <tr>
                        <td class="py-5 px-6 border-r border-gray-100">05 March 2025</td>
                        <td class="py-5 px-6 border-r border-gray-100">2200/-</td>
                        <td class="py-5 px-6 border-r border-gray-100">2400/-</td>
                        <td class="py-5 px-6 text-[#282828]">2750/-</td>
                    </tr>
                    <tr>
                        <td class="py-5 px-6 border-r border-gray-100">12 March 2025</td>
                        <td class="py-5 px-6 border-r border-gray-100">2200/-</td>
                        <td class="py-5 px-6 border-r border-gray-100 ">2400/-</td>
                        <td class="py-5 px-6 text-[#282828]">2750/-</td>
                    </tr>
                    <tr>
                        <td class="py-5 px-6 border-r border-gray-100">19 March 2025</td>
                        <td class="py-5 px-6 border-r border-gray-100 text-[#282828]">2600/-</td>
                        <td class="py-5 px-6 border-r border-gray-100 text-[#282828]">2400/-</td>
                        <td class="py-5 px-6 text-[#282828]">3100/-</td>
                    </tr>
                    <tr>
                        <td class="py-5 px-6 border-r border-gray-100">26 March 2025</td>
                        <td class="py-5 px-6 border-r border-gray-100 text-[#282828]">3200/-</td>
                        <td class="py-5 px-6 border-r border-gray-100 text-[#282828]">2400/-</td>
                        <td class="py-5 px-6 text-[#282828]">4000/-</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@include('frontend.components.testimonials')
{{-- bus Schedule --}}
<section class="pb-12">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pb-10">
            <h1>
                <span>Umrah Bus   </span><span class="text-mst"> Schedule</span>
            </h1>
            <p class="mt-5">Explore upcoming Umrah by Bus schedules from Dubai, Sharjah, and UAE. Find affordable Umrah
                            packages with visa processing, luxury bus travel, hotel accommodation in Makkah and Madinah,
                            and guided Ziyarat tours.</p>
        </div>
        <div class="bus-schedule" id="bus-schedule-section">
            <!-- Responsive Table Container with Custom Scrollbar -->
            <div class="overflow-x-auto ddscroll rounded-2xl border border-gray-300">
                <table id="bus-schedule-table" class="w-full border-collapse bg-white text-center">
                    <thead>
                    <tr class="bg-[#1E5E28] text-white">
                        <th id="bus-schedule-table-head-month" class="w-[15%] py-4 px-4 font-heading font-semibold
                            border-r border-[#17491E] last:border-r-0">
                            <div class="flex items-center justify-center gap-2">
                                <img src="{{ asset('assets/images/icons/calender.svg') }}" alt="Calendar" class="w-5 h-5">
                                <span>Month</span>
                            </div>
                        </th>
                        <th id="bus-schedule-table-head-dep-day" class="w-[15%] py-4 px-4 font-heading font-semibold
                            border-r border-[#17491E] last:border-r-0">
                            <div class="flex items-center justify-center gap-2">
                                <img src="{{ asset('assets/images/icons/calender.svg') }}" alt="Calendar" class="w-5 h-5">
                                <span>Departure Day</span>
                            </div>
                        </th>
                        <th id="bus-schedule-table-head-dep-date" class="w-[26%] py-4 px-4 font-heading
                            font-semibold
                             border-r border-[#17491E] last:border-r-0">
                            <div class="flex items-center justify-center gap-2">
                                <img src="{{ asset('assets/images/icons/calender.svg') }}" alt="Calendar" class="w-5 h-5">
                                <span>Departure Date</span>
                            </div>
                        </th>
                        <th id="bus-schedule-table-head-arr-day" class="w-[15%] py-4 px-4 font-heading font-semibold
                            border-r border-[#17491E] last:border-r-0">
                            <div class="flex items-center justify-center gap-2">
                                <img src="{{ asset('assets/images/icons/calender.svg') }}" alt="Calendar" class="w-5 h-5">
                                <span>Arrival Day</span>
                            </div>
                        </th>
                        <th id="bus-schedule-table-head-arr-date" class="w-[26%] py-4 px-4 font-heading font-semibold
                             border-r border-[#17491E] last:border-r-0">
                            <div class="flex items-center justify-center gap-2">
                                <img src="{{ asset('assets/images/icons/calender.svg') }}" alt="Calendar" class="w-5 h-5">
                                <span>Arrival Day</span>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 font-body text-md sm:text-mst-gray">
                    <!-- Row 1: July 2026 -->
                    <tr>
                        <!-- Column 1: Month -->
                        <td class="py-6 px-4 border-r border-gray-300 align-middle">
                            <div class="flex flex-col items-center justify-center text-center w-full">
                                <img src="{{ asset('assets/images/icons/calender-circle.svg') }}" alt="Calendar" class="w-12 h-12 mb-2">
                                <span class="font-semibold">July 2026</span>
                            </div>
                        </td>
                        <!-- Column 2: Departure Day -->
                        <td class="py-6 px-4 border-r border-gray-300 align-middle font-semibold">
                            Wednesday
                        </td>
                        <!-- Column 3: Departure Date -->
                        <td class="py-6 px-4 border-r border-gray-300 align-middle text-left">
                            <div class="space-y-2 mx-auto">
                                @foreach([['1', '09/07/2025'], ['2', '16/07/2025'], ['3', '23/07/2025'], ['4', '30/07/2025']] as $date)
                                    <div class="flex items-center gap-3 bg-gray-50 rounded-xl px-3 py-2">
                                            <span class="w-6 h-6 flex items-center justify-center border border-gray-300
                                            rounded-md text-xs font-semibold">{{ $date[0] }}</span>
                                        <span class="font-medium text-sm mx-auto">{{ $date[1] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        <!-- Column 4: Arrival Day -->
                        <td class="py-6 px-4 border-r border-gray-300 align-middle">
                            <div class="flex flex-col items-center justify-center text-center">
                                <img src="{{ asset('assets/images/icons/calender-circle.svg') }}" alt="Calendar" class="w-12 h-12 mb-2">
                                <span class="font-semibold">Saturday</span>
                            </div>
                        </td>
                        <!-- Column 5: Arrival Day (Dates) -->
                        <td class="py-6 px-4 align-middle text-left">
                            <div class="space-y-2 mx-auto">
                                @foreach([['1', '09/07/2025'], ['2', '16/07/2025'], ['3', '23/07/2025'], ['4', '30/07/2025']] as $date)
                                    <div class="flex items-center gap-3 bg-gray-50 rounded-xl px-3 py-2">
                                                                                    <span class="w-6 h-6 flex items-center justify-center border border-gray-300
                                                                                    rounded-md text-xs font-semibold">{{ $date[0] }}</span>
                                        <span class="font-medium text-sm mx-auto">{{ $date[1] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    <!-- Row 2: Aug 2026 -->
                    <tr>
                        <!-- Column 1: Month -->
                        <td class="py-6 px-4 border-r border-gray-300 align-middle">
                            <div class="flex flex-col items-center justify-center text-center">
                                <img src="{{ asset('assets/images/icons/calender-circle.svg') }}" alt="Calendar" class="w-12 h-12 mb-2">
                                <span class="font-semibold">Aug 2026</span>
                            </div>
                        </td>
                        <!-- Column 2: Departure Day -->
                        <td class="py-6 px-4 border-r border-gray-300 align-middle font-semibold">
                            Wednesday
                        </td>
                        <!-- Column 3: Departure Date -->
                        <td class="py-6 px-4 border-r border-gray-300 align-middle text-left">
                            <div class="space-y-2 mx-auto">
                                @foreach([['1', '09/07/2025'], ['2', '16/07/2025'], ['3', '23/07/2025'], ['4', '30/07/2025']] as $date)
                                    <div class="flex items-center gap-3 bg-gray-50 rounded-xl px-3 py-2">
                                            <span class="w-6 h-6 flex items-center justify-center border border-gray-300
                                            rounded-md text-xs font-semibold">{{ $date[0] }}</span>
                                        <span class="font-medium text-sm mx-auto">{{ $date[1] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        <!-- Column 4: Arrival Day -->
                        <td class="py-6 px-4 border-r border-gray-300 align-middle">
                            <div class="flex flex-col items-center justify-center text-center">
                                <img src="{{ asset('assets/images/icons/calender-circle.svg') }}" alt="Calendar" class="w-12 h-12 mb-2">
                                <span class="font-semibold">Saturday</span>
                            </div>
                        </td>
                        <!-- Column 5: Arrival Day (Dates) -->
                        <td class="py-6 px-4 align-middle text-left">
                            <div class="space-y-2 mx-auto">
                                @foreach([['1', '09/07/2025'], ['2', '16/07/2025'], ['3', '23/07/2025'], ['4', '30/07/2025']] as $date)
                                    <div class="flex items-center gap-3 bg-gray-50 rounded-xl px-3 py-2">
                                                                                    <span class="w-6 h-6 flex items-center justify-center border border-gray-300
                                                                                    rounded-md text-xs font-semibold">{{ $date[0] }}</span>
                                        <span class="font-medium text-sm mx-auto">{{ $date[1] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    <!-- Row 3: Sep 2026 -->
                    <tr>
                        <!-- Column 1: Month -->
                        <td class="py-6 px-4 border-r border-gray-300 align-middle">
                            <div class="flex flex-col items-center justify-center text-center">
                                <img src="{{ asset('assets/images/icons/calender-circle.svg') }}" alt="Calendar" class="w-12 h-12 mb-2">
                                <span class="font-semibold">Sep 2026</span>
                            </div>
                        </td>
                        <!-- Column 2: Departure Day -->
                        <td class="py-6 px-4 border-r border-gray-300 align-middle font-semibold">
                            Wednesday
                        </td>
                        <!-- Column 3: Departure Date -->
                        <td class="py-6 px-4 border-r border-gray-300 align-middle text-left">
                            <div class="space-y-2 mx-auto">
                                @foreach([['1', '06/08/2025'], ['2', '13/08/2025'], ['3', '20/08/2025'], ['4', '27/08/2025']] as $date)
                                    <div class="flex items-center gap-3 bg-gray-50 rounded-xl px-3 py-2">
                                                                                    <span class="w-6 h-6 flex items-center justify-center border border-gray-300
                                                                                    rounded-md text-xs font-semibold">{{ $date[0] }}</span>
                                        <span class="font-medium text-sm mx-auto">{{ $date[1] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        <!-- Column 4: Arrival Day -->
                        <td class="py-6 px-4 border-r border-gray-300 align-middle">
                            <div class="flex flex-col items-center justify-center text-center">
                                <img src="{{ asset('assets/images/icons/calender-circle.svg') }}" alt="Calendar" class="w-12 h-12 mb-2">
                                <span class="font-semibold">Saturday</span>
                            </div>
                        </td>
                        <!-- Column 5: Arrival Day (Dates) -->
                        <td class="py-6 px-4 align-middle text-left">
                            <div class="space-y-2 mx-auto">
                                @foreach([['1', '06/08/2025'], ['2', '13/08/2025'], ['3', '20/08/2025'], ['4', '27/08/2025']] as $date)
                                    <div class="flex items-center gap-3 bg-gray-50 rounded-xl px-3 py-2">
                                                                                    <span class="w-6 h-6 flex items-center justify-center border border-gray-300
                                                                                    rounded-md text-xs font-semibold">{{ $date[0] }}</span>
                                        <span class="font-medium text-sm mx-auto">{{ $date[1] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    <!-- Row 4: Oct 2026 -->
                    <tr>
                        <!-- Column 1: Month -->
                        <td class="py-6 px-4 border-r border-gray-300 align-middle">
                            <div class="flex flex-col items-center justify-center text-center">
                                <img src="{{ asset('assets/images/icons/calender-circle.svg') }}" alt="Calendar" class="w-12 h-12 mb-2">
                                <span class="font-semibold">Oct 2026</span>
                            </div>
                        </td>
                        <!-- Column 2: Departure Day -->
                        <td class="py-6 px-4 border-r border-gray-300 align-middle font-semibold">
                            Wednesday
                        </td>
                        <!-- Column 3: Departure Date -->
                        <td class="py-6 px-4 border-r border-gray-300 align-middle text-left">
                            <div class="space-y-2 mx-auto">
                                @foreach([['1', '06/08/2025'], ['2', '13/08/2025'], ['3', '20/08/2025'], ['4', '27/08/2025']] as $date)
                                    <div class="flex items-center gap-3 bg-gray-50 rounded-xl px-3 py-2">
                                                                                    <span class="w-6 h-6 flex items-center justify-center border border-gray-300
                                                                                    rounded-md text-xs font-semibold">{{ $date[0] }}</span>
                                        <span class="font-medium text-sm mx-auto">{{ $date[1] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                        <!-- Column 4: Arrival Day -->
                        <td class="py-6 px-4 border-r border-gray-300 align-middle">
                            <div class="flex flex-col items-center justify-center text-center">
                                <img src="{{ asset('assets/images/icons/calender-circle.svg') }}" alt="Calendar" class="w-12 h-12 mb-2">
                                <span class="font-semibold">Saturday</span>
                            </div>
                        </td>
                        <!-- Column 5: Arrival Day (Dates) -->
                        <td class="py-6 px-4 align-middle text-left">
                            <div class="space-y-2 mx-auto">
                                @foreach([['1', '06/08/2025'], ['2', '13/08/2025'], ['3', '20/08/2025'], ['4', '27/08/2025']] as $date)
                                    <div class="flex items-center gap-3 bg-gray-50 rounded-xl px-3 py-2">
                                                                                    <span class="w-6 h-6 flex items-center justify-center border border-gray-300
                                                                                    rounded-md text-xs font-semibold">{{ $date[0] }}</span>
                                        <span class="font-medium text-sm mx-auto">{{ $date[1] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- Centered Button below the table -->
            <div class="flex justify-center mt-8">
                <a href="#" id="view-all-schedules-btn" class="flex items-center justify-center gap-2 text-white text-base px-6 py-2.5 rounded-full bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic shadow-sm hover:shadow-md">
                    <span>View all Schedules</span>
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
{{-- umrah offer  --}}
<section class="pb-12">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-12 pb-10">
            <h1>
                <span>We Offer </span><span class="text-mst">Umrah from</span>
            </h1>
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
{{--required documents --}}
<section class="pt-10 pb-30 bg-gray-50">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-12 pb-10">
            <h1>
                <span>Required Documents for </span><span class="text-mst">Umrah Visa</span>
            </h1>
            <p class="mt-5">Please ensure all documents are clear, valid and up to date.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
            <div class="space-y-7">
                <div class="py-4 px-6 rounded-xl border border-gray-200 bg-white text-center md:text-left">
                    <div class="flex items-center">
                        <div class="me-3">
                            <img src="{{ asset('assets/images/icons/scan.svg') }}" alt="">
                        </div>
                        <div class="">
                            <h3 class="italic"><span>Clear Scans of  </span><span class="text-mst">Passport Copy</span>
                            </h3>
                            <p class="text-[14px] mt-2">Passport should be valid for 6 months and Visa should be valid
                                                        for months .</p>
                        </div>
                    </div>
                </div>
                <div class="py-4 px-6 rounded-xl border border-gray-200 bg-white text-center md:text-left">
                    <div class="flex items-center">
                        <div class="me-3">
                            <img src="{{ asset('assets/images/icons/photo.svg') }}" alt="">
                        </div>
                        <div class="">
                            <h3 class="italic"><span>1 Passport   </span><span class="text-mst">Size Photo</span></h3>
                            <p class="text-[14px] mt-2">Passport should be valid for 6 months and Visa should be valid
                                                        for months.</p>
                        </div>
                    </div>
                </div>
                <div class="py-4 px-6 rounded-xl border border-gray-200 bg-white text-center md:text-left">
                    <div class="flex items-center">
                        <div class="me-3">
                            <img src="{{ asset('assets/images/icons/idcard.svg') }}" alt="">
                        </div>
                        <div class="">
                            <h3 class="italic"><span>National ID   </span><span class="text-mst">Card Copy</span></h3>
                            <p class="text-[14px] mt-2">National ID Card copy (Front & Back)</p>
                        </div>
                    </div>
                </div>
                <div class="py-4 px-6 rounded-xl border border-gray-200 bg-white text-center md:text-left">
                    <div class="flex items-center">
                        <div class="me-3">
                            <img src="{{ asset('assets/images/icons/timer.svg') }}" alt="">
                        </div>
                        <div class="">
                            <h3 class="italic"><span>Processing  </span><span class="text-mst">Time</span></h3>
                            <p class="text-[14px] mt-2">Umrah Visa Processing will take approximately 2-3 working
                                                        days.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end">
                <img src="{{asset('assets/images/umrah/umrah-1.webp')}}"
                     class="w-full object-cover rounded-xl"
                     alt="umrah">
            </div>
        </div>
    </div>
</section>
{{-- how to perform --}}
<section class="flex justify-between items-center py-12 bg-gray-100">
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
            <div class="flex items-center justify-end">
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
@include('frontend.components.tour_faqs')
@include('frontend.components.explore_dubai')
{{-- how to perform --}}
<section class="flex justify-between items-center py-8 bg-gray-50 -mb-8">
    <div class="container">
        <div class="text-center">
            <h1 class="">
                <span>Need more </span><span class="text-mst">Information?</span>
            </h1>
            <p class="text-[16px] my-6">Click below to open inquiry form and our team will get back to you within 24
                                        hours.</p>
        </div>
        <div class="flex items-center justify-end">
            <a href="" class="flex items-center mx-auto justify-center w-fit text-white text-lg px-7 pt-3 pb-3
            rounded-full
                                    bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                                     hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                                     transition duration-300 font-heading italic"> Send Inquiry
                <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                     class="w-5 ms-2"
                     alt="arrow"> </a>
        </div>
    </div>
</section>
