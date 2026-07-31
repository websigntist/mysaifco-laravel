@php
    $cmsPage = page_body_content('umrah-by-bus');
    $sections = ($cmsPage && $cmsPage->sections) ? $cmsPage->sections : collect([]);

    $sec = [];
    for ($i = 0; $i < 50; $i++) {
        $sec[$i] = $sections->get($i);
    }

    // umrah travel agencey data
    $umrah_title = $sec[0]->section_heading ?? '';
    $umrah_desc = $sec[0]->section_description ?? '';
    $umrah_img = $sec[0]->section_image ?? '';
@endphp
{{-- umrah by bus --}}
<section class="flex justify-between items-center pb-12 -mt-10">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] items-center gap-8">
            <div>
                @php
                    $page_title = $umrah_title;
                    $words      = explode(' ', $page_title);
                    $count      = count($words);
                    $spanN      = $count >= 7 ? 6 : 5;
                    $mainText   = implode(' ', array_slice($words, 0, -$spanN));
                    $spanText   = implode(' ', array_slice($words, -$spanN));
                @endphp
                <h1 class="text-center md:text-left md:w-10/12">
                    <span>{{ $mainText }} </span><span class="text-mst">{{ $spanText }}</span>
                </h1>
                <p class="text-[16px] mt-4 text-center md:text-left">{!! $umrah_desc !!}</p>
                <div class="flex items-center justify-start gap-3">
                    <a href="#packages" class="flex items-center justify-center w-fit text-white text-md md:text-lg px-3
                    md:px-5 pt-2 pb-2
                    rounded-full
                            bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                             hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                             transition duration-300 font-heading
                             italic mt-8"> View Packages <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                                              class="w-5 ms-1"
                                                              alt="arrow"> </a>
                    <a href="{{umrah_whatsapp_url()}}" class="flex items-center justify-center w-fit text-white text-md md:text-lg px-3
                    md:px-5 pt-2 pb-2 rounded-full
                            bg-gradient-to-r from-[#2D9D3E] to-[#1E5E28]
                             hover:bg-gradient-to-r hover:from-[#1E5E28] hover:to-[#2D9D3E]
                             transition duration-300 font-heading
                             italic mt-8"> WhatsApp Now <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                                             class="w-5 ms-1"
                                                             alt="arrow"> </a>
                </div>
            </div>
            <div class="flex items-center md:justify-end justify-center">
                <img src="{{asset('assets/images/pages/sections/' . $umrah_img)}}"
                     class="object-cover"
                     alt="{{$umrah_img}}"
                     title="{{$umrah_img}}"
                     width="250"
                     height="250">
            </div>
        </div>
    </div>
</section>
{{--===== alert ======--}}
<section class="py-5 flex items-center justify-center bg-[#EB001B26]">
    <div class="md:flex sm:mx-auto px-2">
        <img src="{{ asset('assets/images/icons/alert.svg') }}"
             class="md:me-2 mb-2 md:mb-0 mx-auto md:mx-0"
             title="alert"
             alt="alert">
        <p class="text-center">The Below Rates are not valid for RAMADAN. Rates for the Umrah by Bus Ramadan package can
                               be discussed on the phone.</p>
    </div>
</section>
{{-- umrah packages --}}
@php
    $umrahbus_title = $sec[1]->section_heading ?? '';
    $umrahbus_desc = $sec[1]->section_description ?? '';
@endphp
<section id="packages">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-12 pb-10">
            <h1>
                {!! format_two_color_heading($umrahbus_title) !!}
            </h1>
            <p class="mt-5">{!! $umrahbus_desc !!}</p>
        </div>
        @include('frontend.components.umrah-pricing')
    </div>
</section>
{{-- packages include --}}
@php
    $pkginc_title = $sec[2]->section_heading ?? '';
    $pkginc_desc = $sec[2]->section_description ?? '';

    $bus_img = $sec[3]->section_image ?? '';
    $bus_title = $sec[3]->section_heading ?? '';
    $bus_desc = $sec[3]->section_description ?? '';

    $visa_img = $sec[4]->section_image ?? '';
    $visa_title = $sec[4]->section_heading ?? '';
    $visa_desc = $sec[4]->section_description ?? '';

    $hotel_img = $sec[5]->section_image ?? '';
    $hotel_title = $sec[5]->section_heading ?? '';
    $hotel_desc = $sec[5]->section_description ?? '';

    $ziyarat_img = $sec[6]->section_image ?? '';
    $ziyarat_title = $sec[6]->section_heading ?? '';
    $ziyarat_desc = $sec[6]->section_description ?? '';

    $license_img = $sec[7]->section_image ?? '';
    $license_title = $sec[7]->section_heading ?? '';
    $license_desc = $sec[7]->section_description ?? '';

    $years_img = $sec[8]->section_image ?? '';
    $years_title = $sec[8]->section_heading ?? '';
    $years_desc = $sec[8]->section_description ?? '';

    $best_img = $sec[9]->section_image ?? '';
    $best_title = $sec[9]->section_heading ?? '';
    $best_desc = $sec[9]->section_description ?? '';

    $support_img = $sec[10]->section_image ?? '';
    $support_title = $sec[10]->section_heading ?? '';
    $support_desc = $sec[10]->section_description ?? '';
@endphp
<section class="">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pb-10">
            <h1>
            {!! format_two_color_heading($pkginc_title) !!}
            </h1>
            <p class="mt-5">{!! $pkginc_desc !!}</p>
        </div>
        <div class="pkg-include">
            <!-- Service Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1: Luxury Bus -->
                <div id="pkg-include-bus-card" class="flex flex-col items-center justify-center text-center px-4 py-10
                rounded-3xl border border-gray-200 bg-gray-50 transition
                duration-300 hover:-translate-y-1 hover:border-gray-200 group">
                    <div class="w-16 h-16 mb-5 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                        <img src="{{ asset('assets/images/pages/sections/' . $bus_img) }}" alt="Luxury Bus" class="w-full h-full object-contain">
                    </div>
                <h3 class="font-heading font-semibold text-lg text-mst-gray mb-3">{{$bus_title}}</h3>
                    <p class="text-sm font-body font-medium text-gray-700">{!! $bus_desc !!}</p>
                </div>
                <!-- Card 2: Umrah Visa -->
                <div id="pkg-include-visa-card" class="flex flex-col items-center justify-center text-center px-4 py-10
                                rounded-3xl border border-gray-200 bg-gray-50 transition
                                duration-300 hover:-translate-y-1 hover:border-gray-200 group">
                    <div class="w-16 h-16 mb-5 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                        <img src="{{ asset('assets/images/pages/sections/' . $visa_img) }}" alt="Umrah Visa" class="w-full h-full object-contain">
                    </div>
                    <h3 class="font-heading font-semibold text-lg text-mst-gray mb-3">{{$visa_title}}</h3>
                    <p class="text-sm font-body font-medium text-gray-700">{!! $visa_desc !!}</p>
                </div>
                <!-- Card 3: Hotel Stay -->
                <div id="pkg-include-hotel-card" class="flex flex-col items-center justify-center text-center px-4 py-10
                                rounded-3xl border border-gray-200 bg-gray-50 transition
                                duration-300 hover:-translate-y-1 hover:border-gray-200 group">
                    <div class="w-16 h-16 mb-5 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                        <img src="{{ asset('assets/images/pages/sections/' . $hotel_img) }}" alt="Hotel Stay" class="w-full h-full object-contain">
                    </div>
                <h3 class="font-heading font-semibold text-lg text-mst-gray mb-3">{{$hotel_title}}</h3>
                    <p class="text-sm font-body font-medium text-gray-700">{!! $hotel_desc !!}</p>
                </div>
                <!-- Card 4: Visit to Holy Sites -->
                <div id="pkg-include-ziyarat-card" class="flex flex-col items-center justify-center text-center px-4 py-10
                                rounded-3xl border border-gray-200 bg-gray-50 transition
                                duration-300 hover:-translate-y-1 hover:border-gray-200 group">
                    <div class="w-16 h-16 mb-5 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                        <img src="{{ asset('assets/images/pages/sections/' . $ziyarat_img) }}" alt="Visit to Holy Sites (Ziyarat)" class="w-full h-full object-contain">
                    </div>
                    <h3 class="font-heading font-semibold text-lg text-mst-gray mb-3">{{$ziyarat_title}}</h3>
                    <p class="text-sm font-body font-medium text-gray-700">{!! $ziyarat_desc !!}</p>
                </div>
            </div>
            <!-- Bottom Features Bar -->
            <div class="mt-8 p-6 lg:p-8 rounded-3xl border border-gray-200 bg-gray-50">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-0 lg:divide-x
                lg:divide-black">
                    <!-- Feature 1: Licensed & Trusted -->
                    <div id="pkg-feature-licensed" class="flex items-center gap-4 lg:pr-6">
                        <div class="w-14 h-14 flex-shrink-0 transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('assets/images/pages/sections/' . $license_img) }}" alt="Licensed & Trusted" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-[15px] sm:text-base text-mst-gray mb-0.5 leading-snug">
                                {{$license_title}}
                            </h4>
                            <p class="text-xs text-gray-900 font-body leading-normal">{!! $license_desc !!}</p>
                        </div>
                    </div>
                    <!-- Feature 2: 18+ Years Experience -->
                    <div id="pkg-feature-experience" class="flex items-center gap-4 lg:px-6">
                        <div class="w-14 h-14 flex-shrink-0 transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('assets/images/pages/sections/' . $years_img) }}" alt="18+ Years Experience" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-[15px] sm:text-base text-mst-gray mb-0.5 leading-snug">
                            {{$years_title}}</h4>
                            <p class="text-xs text-gray-900 font-body leading-normal">{!! $years_desc !!}</p>
                        </div>
                    </div>
                    <!-- Feature 3: Best Price Guaranteed -->
                    <div id="pkg-feature-price" class="flex items-center gap-4 lg:px-6">
                        <div class="w-14 h-14 flex-shrink-0 transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('assets/images/pages/sections/' . $best_img) }}" alt="Best Price Guaranteed" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-[15px] sm:text-base text-mst-gray mb-0.5 leading-snug">
                                {{$best_title}}</h4>
                            <p class="text-xs text-gray-900 font-body leading-normal">{!! $best_desc !!}</p>
                        </div>
                    </div>
                    <!-- Feature 4: 24/7 Support -->
                    <div id="pkg-feature-support" class="flex items-center gap-4 lg:pl-6">
                        <div class="w-14 h-14 flex-shrink-0 transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('assets/images/pages/sections/' . $support_img) }}" alt="24/7 Support" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-[15px] sm:text-base text-mst-gray mb-0.5 leading-snug">
                                {{$support_title}}</h4>
                            <p class="text-xs text-gray-900 font-body leading-normal">{!! $support_desc !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- bus packages --}}
@php
    $ramadan_title = $sec[11]->section_heading ?? '';
    $ramadan_desc = $sec[11]->section_description ?? '';
@endphp
<section class="">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-16 pb-10">
            <h1>
                {!! format_two_color_heading($ramadan_title) !!}
            </h1>
            <p class="mt-5">{!! $ramadan_desc !!}</p>
        </div>
        <div class="ramadan-umrah" id="ramadan-umrah-section">
            <!-- Responsive Table Container with Custom Scrollbar -->
            <div class="w-full overflow-x-auto ddscroll rounded-2xl border border-gray-200/60 shadow-[0_4px_25px_rgba(0,0,0,0.01)]">
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
                    @php
                        $dbSchedules = \App\Models\backend\UmrahBusSchedule::where('status', 'Active')
                            ->orderBy('ordering', 'asc')
                            ->orderBy('id', 'asc')
                            ->get();
                    @endphp
                    @foreach($dbSchedules as $sched)
                        <tr>
                            <td class="py-5 px-6 border-r border-gray-100">{{ $sched->departure_date }}</td>
                            <td class="py-5 px-6 border-r border-gray-100">{{ $sched->sharing_4_5_beds }}</td>
                            <td class="py-5 px-6 border-r border-gray-100">{{ $sched->sharing_3_beds }}</td>
                            <td class="py-5 px-6">{{ $sched->sharing_2_beds }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@include('frontend.components.testimonials')
{{-- bus Schedule --}}
@php
    $schedule_title = $sec[12]->section_heading ?? '';
    $schedule_desc = $sec[12]->section_description ?? '';
@endphp
<section class="pb-12">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pb-10">
            <h1>
                {!! format_two_color_heading($schedule_title) !!}
            </h1>
            <p class="mt-5">{!! $schedule_title !!}</p>
        </div>
        <div class="bus-schedule" id="bus-schedule-section">
            <!-- Responsive Table Container with Custom Scrollbar -->
            <div class="w-full overflow-x-auto ddscroll rounded-2xl border border-gray-300">
                <table id="bus-schedule-table" class="w-full min-w-[992px] border-collapse bg-white text-center">
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
                    @php
                        $dbRamadanPkgs = \App\Models\backend\RamadanPackage::where('status', 'Active')
                            ->orderBy('ordering', 'asc')
                            ->orderBy('id', 'asc')
                            ->get();
                    @endphp
                    @foreach($dbRamadanPkgs as $item)
                        <tr>
                            <!-- Column 1: Month -->
                            <td class="py-6 px-4 border-r border-gray-300 align-middle">
                                <div class="flex flex-col items-center justify-center text-center w-full">
                                    <img src="{{ asset('assets/images/icons/calender-circle.svg') }}" alt="Calendar" class="w-12 h-12 mb-2">
                                    <span class="font-semibold">{{ $item->month }}</span>
                                </div>
                            </td>
                            <!-- Column 2: Departure Day -->
                            <td class="py-6 px-4 border-r border-gray-300 align-middle font-semibold">
                                {{ $item->departure_day ?? 'Wednesday' }}
                            </td>
                            <!-- Column 3: Departure Date -->
                            <td class="py-6 px-4 border-r border-gray-300 align-middle text-left">
                                <div class="space-y-2 mx-auto">
                                    @foreach($item->departure_dates_list as $idx => $date)
                                        <div class="flex items-center gap-3 bg-gray-50 rounded-xl px-3 py-2">
                                            <span class="w-6 h-6 flex items-center justify-center border border-gray-300 rounded-md text-xs font-semibold">{{ $idx + 1 }}</span>
                                            <span class="font-medium text-sm mx-auto">{{ $date }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                            <!-- Column 4: Arrival Day -->
                            <td class="py-6 px-4 border-r border-gray-300 align-middle">
                                <div class="flex flex-col items-center justify-center text-center">
                                    <img src="{{ asset('assets/images/icons/calender-circle.svg') }}" alt="Calendar" class="w-12 h-12 mb-2">
                                    <span class="font-semibold">{{ $item->arrival_day ?? 'Saturday' }}</span>
                                </div>
                            </td>
                            <!-- Column 5: Arrival Dates -->
                            <td class="py-6 px-4 align-middle text-left">
                                <div class="space-y-2 mx-auto">
                                    @foreach($item->arrival_dates_list as $idx => $date)
                                        <div class="flex items-center gap-3 bg-gray-50 rounded-xl px-3 py-2">
                                            <span class="w-6 h-6 flex items-center justify-center border border-gray-300 rounded-md text-xs font-semibold">{{ $idx + 1 }}</span>
                                            <span class="font-medium text-sm mx-auto">{{ $date }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    @endforeach
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
@php
    $offerTitle = $sec[13]->section_heading ?? '';
    $offerDesc = $sec[13]->section_description ?? '';

    $dubaiTitle = $sec[14]->section_heading ?? '';
    $dubaiDesc = $sec[14]->section_description ?? '';

    $abudhabiTitle = $sec[15]->section_heading ?? '';
    $abudhabiDesc = $sec[15]->section_description ?? '';

    $sharjahTitle = $sec[16]->section_heading ?? '';
    $sharjahDesc = $sec[16]->section_description ?? '';
@endphp
<section class="pb-12">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-12 pb-10">
            <h1>
                {!! format_two_color_heading($offerTitle) !!}
            </h1>
            <div class="mt-5">
                {!! $offerDesc !!}
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-3xl">
                <div class="text-center">
                    <img src="{{ asset('assets/images/umrah/umrah-7.webp') }}" class="mx-auto mb-4" alt="">
                    <h3 class="text-xl">{{$dubaiTitle}}</h3>
                    <p class="text-sm leading-6 my-4 line-clamp-2">{!! $dubaiDesc !!}</p>
                    <a href="#" class="flex items-center justify-center w-fit mx-auto text-white text-sm mt-5 px-4 pt-1 pb-2 rounded-full bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Learn more
                        <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
            </div>
            <div class="flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-3xl">
                <div class="text-center">
                    <img src="{{ asset('assets/images/umrah/umrah-8.webp') }}" class="mx-auto mb-4" alt="">
                    <h3 class="text-xl">{{$abudhabiTitle}}</h3>
                    <p class="text-sm leading-6 my-4 line-clamp-2">{!! $abudhabiDesc !!}</p>
                    <a href="#" class="flex items-center justify-center w-fit mx-auto text-white text-sm mt-5 px-4 pt-1 pb-2 rounded-full bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Learn more
                        <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
            </div>
            <div class="flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-3xl">
                <div class="text-center">
                    <img src="{{ asset('assets/images/umrah/umrah-9.webp') }}" class="mx-auto mb-4" alt="">
                    <h3 class="text-xl">{{$sharjahTitle}}</h3>
                    <p class="text-sm leading-6 my-4 line-clamp-2">{!! $sharjahDesc !!}</p>
                    <a href="#" class="flex items-center justify-center w-fit mx-auto text-white text-sm mt-5 px-4 pt-1 pb-2 rounded-full bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Learn more
                        <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
            </div>
        </div>
    </div>
</section>
{{--required documents --}}
@php
    $docTitle = $sec[17]->section_heading ?? '';
    $docDesc = $sec[17]->section_description ?? '';
    $docImg = $sec[17]->section_image ?? '';

    $clearTitle = $sec[18]->section_heading ?? '';
    $clearDesc = $sec[18]->section_description ?? '';

    $passTitle = $sec[19]->section_heading ?? '';
    $passDesc = $sec[19]->section_description ?? '';

    $nationalTitle = $sec[20]->section_heading ?? '';
    $nationalDesc = $sec[20]->section_description ?? '';

    $processTitle = $sec[21]->section_heading ?? '';
    $processDesc = $sec[21]->section_description ?? '';
@endphp
<section class="pt-10 pb-30 bg-gray-50">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-12 pb-10">
            <h1>
                {!! format_two_color_heading($docTitle) !!}
            </h1>
            <div class="mt-5">
                {!! $docDesc !!}
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
            <div class="space-y-7">
                <div class="py-4 px-6 rounded-xl border border-gray-200 bg-white text-center md:text-left">
                    <div class="flex items-center">
                        <div class="me-3">
                            <img src="{{ asset('assets/images/icons/scan.svg') }}" alt="">
                        </div>
                        <div class="">
                            <h3 class="italic">
                                {!! format_two_color_heading($clearTitle) !!}
                            </h3>
                            <p class="text-[14px] mt-2">{!! $clearDesc !!}</p>
                        </div>
                    </div>
                </div>
                <div class="py-4 px-6 rounded-xl border border-gray-200 bg-white text-center md:text-left">
                    <div class="flex items-center">
                        <div class="me-3">
                            <img src="{{ asset('assets/images/icons/photo.svg') }}" alt="">
                        </div>
                        <div class="">
                            <h3 class="italic">
                                {!! format_two_color_heading($passTitle) !!}
                            </h3>
                            <p class="text-[14px] mt-2">{!! $passDesc !!}</p>
                        </div>
                    </div>
                </div>
                <div class="py-4 px-6 rounded-xl border border-gray-200 bg-white text-center md:text-left">
                    <div class="flex items-center">
                        <div class="me-3">
                            <img src="{{ asset('assets/images/icons/idcard.svg') }}" alt="">
                        </div>
                        <div class="">
                            <h3 class="italic">
                                {!! format_two_color_heading($nationalTitle) !!}
                            </h3>
                            <p class="text-[14px] mt-2">{!! $nationalDesc !!}</p>
                        </div>
                    </div>
                </div>
                <div class="py-4 px-6 rounded-xl border border-gray-200 bg-white text-center md:text-left">
                    <div class="flex items-center">
                        <div class="me-3">
                            <img src="{{ asset('assets/images/icons/timer.svg') }}" alt="">
                        </div>
                        <div class="">
                            <h3 class="italic">
                                {!! format_two_color_heading($processTitle) !!}
                            </h3>
                            <p class="text-[14px] mt-2">{!! $processDesc !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end">
                <img src="{{ asset('assets/images/pages/sections/' . $docImg) }}"
                     width="643"
                     height="479"
                     title="{{$docImg}}"
                     alt="{{$docImg}}"
                     class="w-full object-cover rounded-xl">
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
@include('frontend.components.tour_faqs')
@include('frontend.components.footerContactBar');
@include('frontend.components.explore_dubai')
