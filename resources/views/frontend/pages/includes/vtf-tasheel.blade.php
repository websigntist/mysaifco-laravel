@php
    $vfsGlobalOffices = [
        ['city' => 'Dubai',     'address' => 'Wafi Mall, First Floor, Phase 5 - Hours,<br>Umm Hurair 2, Dubai - UAE',                                             'centre' => 'Visa Application Centre', 'hours' => 'Operating Hours: Mon - Fri, 09:00 AM - 05:00 PM', 'map' => '#'],
        ['city' => 'Abu Dhabi', 'address' => 'Level B2 (Lower Ground), The Mall,<br>World Trade Center, Khalifa Bin Zayed, The 1st Street, Abu Dhabi UAE.',       'centre' => 'Visa Application Centre', 'hours' => 'Operating Hours: Mon - Fri, 09:00 AM - 05:00 PM', 'map' => '#'],
    ];

    $tasheerOffices = [
        ['city' => 'Dubai',     'address' => 'Wafi Mall, First Floor, Phase 5 - Hours,<br>Umm Hurair 2, Dubai - UAE',                                             'centre' => 'Visa Application Centre', 'hours' => 'Operating Hours: Mon - Fri, 09:00 AM - 05:00 PM', 'map' => '#'],
        ['city' => 'Abu Dhabi', 'address' => 'Level B2 (Lower Ground), The Mall,<br>World Trade Center, Khalifa Bin Zayed, The 1st Street, Abu Dhabi UAE.',       'centre' => 'Visa Application Centre', 'hours' => 'Operating Hours: Mon - Fri, 09:00 AM - 05:00 PM', 'map' => '#'],
    ];
@endphp
@php
    $cmsPage = page_body_content('vfs-tasheer');
    $sections = ($cmsPage && $cmsPage->sections) ? $cmsPage->sections : collect([]);

    $sec = [];
    for ($i = 0; $i < 50; $i++) {
        $sec[$i] = $sections->get($i);
    }
@endphp
{{-- ===== Important Note bar ===== --}}
@php
    $impNote_title = $sec[0]->section_heading ?? '';
    $impNote_desc = $sec[0]->section_description ?? '';
    $impNote_link = $sec[0]->section_link ?? '';
@endphp
<section class="pt-0">
    <div class="container mx-auto">
        <div class="bg-gray-50 border border-gray-200 rounded-2xl p-4 md:p-6 flex flex-col lg:flex-row items-start
        lg:items-center justify-between gap-6">
            <div class="flex items-start gap-4">
                <img src="{{ asset('assets/images/icons/785.svg') }}" alt="">
                <div>
                    <h3 class="font-heading italic font-semibold text-xl text-[#EB001B] -mt-1 mb-3">{{$impNote_title}}</h3>
                    <p class="font-body text-sm text-mst-gray font-medium leading-6">
                        {!! $impNote_desc !!}
                    </p>
                </div>
            </div>
            <a href="{{$impNote_link}}" class="inline-flex items-center justify-center gap-2 flex-shrink-0 rounded-lg px-6 py-2
                      font-heading italic text-base md:text-lg text-white
                      bg-mst transition duration-300">
                <img src="{{ asset('assets/images/icons/3656.svg') }}" class="brightness-0 invert" alt=""> Book an
                                                                                                           Appointment
            </a>
        </div>
    </div>
</section>
{{-- ===== Intro + Quick Links ===== --}}
@php
    $vfsgbl_title = $sec[1]->section_heading ?? '';
    $vfsgbl_desc = $sec[1]->section_description ?? '';
@endphp
<section class="pt-12">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_0.3fr] gap-10 items-center">
            <div>
                <h2 class="font-heading italic font-bold text-xl md:text-2xl text-mst-gray leading-snug">
                    {!! format_two_color_heading($vfsgbl_title) !!}
                </h2>
                <p class="font-body text-mst-gray leading-7 mt-4 text-[16px]">{!! $vfsgbl_desc !!}</p>
            </div>
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 h-fit">
                <h3 class="font-heading italic font-bold text-xl text-mst-gray mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    @php
                        $quickLinks = [
                            ['label' => 'About Us',       'url' => url('/about-us'), 'icon' => '900.svg'],
                            ['label' => 'UAE Tours',      'url' => url('/uae-tours'), 'icon' => '9014.svg'],
                            ['label' => 'Umrah Packages', 'url' => url('/umrah-packages'), 'icon' => '065.svg'],
                            ['label' => 'FAQs',           'url' => url('/faqs'), 'icon' => '0656.svg'],
                            ['label' => 'Contact Us',     'url' => url('/contact-us'), 'icon' => '8605.svg'],
                        ];
                    @endphp

                    @foreach ($quickLinks as $link)
                        <li>
                            <a href="{{ $link['url'] }}"
                               class="group flex items-center gap-3 text-mst-gray hover:text-mst transition">
                                <img src="{{ asset('assets/images/icons/' . $link['icon']) }}"
                                     alt="{{ $link['label'] }}">
                                <span class="font-heading text-sm font-semibold">{{ $link['label'] }}</span> </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
{{-- ===== VFS Global (International Visas) ===== --}}
@php
    $vfsgblintl_title = $sec[2]->section_heading ?? '';
    $vfsgblintl_desc = $sec[2]->section_description ?? '';

    $dxboffice_desc = $sec[3]->section_description ?? '';
    $abudhabiffice_desc = $sec[4]->section_description ?? '';
@endphp
<section class="pt-14">
    <div class="container mx-auto">
        <div class="flex items-center gap-3 mb-3">
            <img src="{{ asset('assets/images/icons/099.svg') }}" alt="">
            <h2 class="font-heading italic font-bold text-2xl text-mst-gray">
                {!! format_two_color_heading($vfsgblintl_title) !!}
            </h2>
        </div>
        <p class="font-body text-mst-gray leading-7 mb-8 text-[16px]">{!! $vfsgblintl_desc !!}</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-5">
            {!! $dxboffice_desc !!}
            {!! $abudhabiffice_desc !!}
            {{--@foreach($vfsGlobalOffices as $office)
                @include('frontend.pages.includes.partials.vfs-office-card', $office)
            @endforeach--}}
        </div>
    </div>
</section>
{{-- ===== Tasheer (Saudi Arabia Visas) ===== --}}
@php
    $tasheersab_title = $sec[5]->section_heading ?? '';
    $tasheersab_desc = $sec[5]->section_description ?? '';

    $saaoffice_desc = $sec[6]->section_description ?? '';
    $saabuffice_desc = $sec[7]->section_description ?? '';
@endphp
<section class="pt-14">
    <div class="container mx-auto">
        <div class="flex items-center gap-3 mb-3">
            <img src="{{ asset('assets/images/icons/099.svg') }}" alt="">
                        <h2 class="font-heading italic font-bold text-2xl text-mst-gray">
                {!! format_two_color_heading($tasheersab_title) !!}
            </h2>
        </div>
        <p class="font-body text-mst-gray leading-7 mb-8 text-[16px]">{!! $tasheersab_desc !!}</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-5">
            {!! $saaoffice_desc !!}
            {!! $saabuffice_desc !!}
            {{--@foreach($tasheerOffices as $office)
                @include('frontend.pages.includes.partials.vfs-office-card', $office)
            @endforeach--}}
        </div>
    </div>
</section>
{{-- ===== How the Process Works + Important Notes ===== --}}
<section class="pt-14">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-[1.2fr_0.8fr] gap-6">
            {{-- Process --}}
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 md:p-8">
                <div class="flex items-center gap-3 mb-8">
                    <img src="{{ asset('assets/images/icons/1235.svg') }}" class="w-7" alt="">
                    <h3 class="font-heading italic font-bold text-xl text-mst-gray -mt-1">
                        How the Process
                        <span class="text-mst">Works</span>
                    </h3>
                </div>
                @php
                    $steps = [
                        ['title' => 'Book<br>Appointment',    'desc' => 'Schedule your application online in advance', 'icon'  => '3656.svg'],
                        ['title' => 'Submit<br>Documents',    'desc' => 'Visit the center with the required documents', 'icon'  => '265.svg'],
                        ['title' => 'Complete<br>Biometrics',  'desc' => 'Biometrics enrolment and data captures', 'icon'  => '123.svg'],
                        ['title' => 'Track<br>Application',    'desc' => 'Track your application status data capture', 'icon'  => '78.svg'],
                        ['title' => 'Receive<br>Passport',     'desc' => 'Collect passport from the center or via courier', 'icon'  => '125.svg'],
                    ];
                @endphp
                <div class="grid grid-cols-1 sm:grid-cols-5 gap-6 sm:gap-2">
                    @foreach($steps as $i => $step)
                        <div class="relative flex flex-col items-center text-center">
                            @if(!$loop->last)
                                <span class="hidden sm:block absolute top-19 left-1/2 w-full border-t-2 border-dashed
                                 border-gray-300" aria-hidden="true"></span>
                            @endif
                            <div class="w-7 h-7 rounded-full bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                            text-white font-heading italic text-sm flex items-center justify-center mb-3 relative z-10">
                                {{ $i + 1 }}
                            </div>
                            <div class="w-14 h-14 rounded-full bg-white border border-gray-200 shadow-sm flex
                            items-center justify-center mt-1 mb-3 relative z-10">
                                <img src="{{ asset('assets/images/icons/' . $step['icon']) }}" alt="">
                            </div>
                            <h4 class="font-heading font-bold text-sm text-mst-gray leading-tight mb-1 mt-2">{!! $step['title'] !!}</h4>
                            <p class="!text-sm mt-1 text-gray-600 leading-snug">{{ $step['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- Important Notes --}}
            @php
                $imtnte_title = $sec[8]->section_heading ?? '';
                $imtnte_desc = $sec[8]->section_description ?? '';
            @endphp
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 md:p-8">
                <div class="flex items-center gap-3 mb-6">
                    <img src="{{ asset('assets/images/icons/785.svg') }}" alt="">
                    <h3 class="font-heading italic -mt-1 font-bold text-xl text-mst-gray">{{$imtnte_title}}</h3>
                </div>
                @php
                    $notes = [
                        'Appointment is mandatory for most visa services.',
                        'Please arrive at least 15 minutes before your scheduled appointment.',
                        'Bring original documents and photocopies as required.',
                        'Mobile phones and electronic devices may be restricted inside the application center',
                        'Service fees and biometric charges are non-refundable.',
                        'Visa approval is solely at the discretion of the respective embassy or government authority.',
                        'Cookies & Tracking Technologies',
                    ];
                @endphp
                {!! $imtnte_desc !!}
                {{--<ul class="space-y-3">
                    @foreach($notes as $note)
                        <li class="flex items-start gap-3">
                            <img src="{{ asset('assets/images/icons/006.svg') }}" alt="">
                            <span class="font-body text-sm text-mst-gray leading-6 -m-1">{{ $note }}</span>
                        </li>
                    @endforeach
                </ul>--}}
            </div>
        </div>
    </div>
</section>
{{-- ===== Services Available + Why Travelers Choose ===== --}}
<section class="pt-14">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Services Available --}}
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-4">
                <div class="flex items-center gap-3 mb-6">
                    <img src="{{ asset('assets/images/icons/5326.svg') }}" alt="">
                    <h3 class="font-heading italic font-bold text-xl text-mst-gray">Services Available at
                        <span class="text-mst">VFS Global &amp; Tasheer</span></h3>
                </div>
                @php
                    $services = [
                        ['label' => 'Visa Application Submission', 'icon' => '36.svg'],
                        ['label' => 'Biometric Enrollment',       'icon' => '236.svg'],
                        ['label' => 'Document Verification',       'icon' => '156.svg'],
                        ['label' => 'Passport Collection &amp; Return', 'icon' => '65.svg'],
                        ['label' => 'Application Tracking',        'icon' => '951.svg'],
                        ['label' => 'SMS &amp; Notification Service',   'icon' => '650.svg'],
                        ['label' => 'Premium Lounge (Selected Countries)', 'icon' => '480.svg'],
                        ['label' => 'Courier &amp; Passport Delivery',  'icon' => '898.svg'],
                    ];
                @endphp
                <div class="grid grid-cols-2 md:grid-cols-4 gap-y-6">
                    @foreach($services as $service)
                        <div class="flex items-start gap-1">
                            <img src="{{ asset('assets/images/icons/' . $service['icon']) }}" alt="{{ $service['label'] }}">
                            <span class="font-heading font-semibold text-xs text-mst-gray">{!! $service['label'] !!}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- Why Travelers Choose --}}
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-4">
                <div class="flex items-center gap-3 mb-4">
                    <img src="{{ asset('assets/images/icons/598.svg') }}" alt="">
                    <h3 class="font-heading italic font-bold text-xl text-mst-gray">Why Travelers Choose VFS
                        <span class="text-mst">Global &amp; Tasheel</span></h3>
                </div>
                @php
                    $reasons = [
                        ['label' => 'Official Government-Authorized Centers', 'icon' => '156.svg'],
                        ['label' => 'Multiple International Visa Services',   'icon' => '032.svg'],
                        ['label' => 'Biometric Collection Facilities',       'icon' => '987.svg'],
                        ['label' => 'Secure Documents Handling',             'icon' => '236.svg'],
                        ['label' => 'Convenient Locations Across UAE',       'icon' => '456.svg'],
                    ];
                @endphp
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-4">
                    @foreach($reasons as $reason)
                        <div class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/' . $reason['icon']) }}" alt="{{ $reason['label'] }}">
                            <span class="font-body text-sm text-mst-gray leading-tight">{{ $reason['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.components.testimonials');
{{-- FAQs --}}
@php
    $faq_title = $sec[9]->section_heading ?? '';
    $faq_desc = $sec[9]->section_description ?? '';
@endphp
<div class="container mx-auto">
    <div class="md:w-8/12 mx-auto text-center">
        <h1 class="text-3xl md:text-4xl">
            {!! format_two_color_heading($faq_title) !!}
        </h1>
        <p class="mt-4 mx-auto">{!! $faq_desc !!}</p>
    </div>
</div>
@include('frontend.components.tour_faqs')
{{-- related services --}}
<section class="relatedServices py-12 bg-white">
    <div class="container mx-auto">
        <div class="mb-8">
            <h2 class="font-heading italic font-bold text-3xl text-mst-gray">Related
                <span class="text-mst">Services</span></h2>
            <p class="font-body text-gray-700 mt-2">Quick access to what travelers explore most—making it easier to find
                                                    the right experience without the search</p>
        </div>
        @include('frontend.components.related_services', ['limit' => 6, 'position' => 'first', 'cols' => 6])
    </div>
</section>
@include('frontend.components.footerContactBar');
@include('frontend.components.explore_dubai')
