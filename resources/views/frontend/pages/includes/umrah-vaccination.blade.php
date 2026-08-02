@php
    $cmsPage = page_body_content('umrah-vaccination');
    $sections = ($cmsPage && $cmsPage->sections) ? $cmsPage->sections : collect([]);

    $sec = [];
    for ($i = 0; $i < 50; $i++) {
        $sec[$i] = $sections->get($i);
    }

    // umrah travel agencey data
    $umrahvacc_title = $sec[0]->section_heading ?? '';
    $umrahvacc_desc = $sec[0]->section_description ?? '';
@endphp
{{-- ===== Intro ===== --}}
<section class="pt-0 pb-8">
    <div class="container mx-auto">
        <div class="mx-auto max-w-6xl text-center">
            <h1>
                {!! format_two_color_heading($umrahvacc_title) !!}
            </h1>
            <p class="mt-5 text-mst-gray text-[16px]">{!! $umrahvacc_desc !!}</p>
        </div>
    </div>
</section>
{{-- ===== Alert strip ===== --}}
@php
    $alert_desc = $sec[1]->section_description ?? '';
@endphp
<section class="pb-12">
    <div class="w-full bg-[#FBE3EA] py-4">
        <div class="container mx-auto">
            <div class="flex items-center justify-center gap-3 text-center">
                <img src="{{ asset('assets/images/icons/alert.svg') }}" class="w-6 flex-shrink-0" alt="alert">
                <span class="text-mst-gray text-sm md:text-[16px]">
                    {!! $alert_desc !!}
                </span>
            </div>
        </div>
    </div>
</section>
{{-- ===== City center grids ===== --}}
@php
    $dubaiCenter_title = $sec[2]->section_heading ?? '';
    $dubaiCenter_desc = $sec[2]->section_description ?? '';

    $sharjahCenter_title = $sec[3]->section_heading ?? '';
    $sharjahCenter_desc = $sec[3]->section_description ?? '';

    $ajmanCenter_title = $sec[4]->section_heading ?? '';
    $ajmanCenter_desc = $sec[4]->section_description ?? '';
@endphp
@foreach([
    ['title' => $dubaiCenter_title, 'desc' => $dubaiCenter_desc, 'location' => 'Dubai Centers'],
    ['title' => $sharjahCenter_title, 'desc' => $sharjahCenter_desc, 'location' => 'Sharjah Centers'],
    ['title' => $ajmanCenter_title, 'desc' => $ajmanCenter_desc, 'location' => 'Ajman Centers'],
] as $section)
    <section class="pb-14">
        <div class="container mx-auto">
            <div class="mx-auto max-w-3xl text-center mb-10">
                <h1>
                    {!! format_two_color_heading($section['title']) !!}
                </h1>
                <p class="mt-4 text-mst-gray text-[16px]">{!! $section['desc'] !!}</p>
            </div>
            @include('frontend.components.vaccination_centers', ['vaccine-center' => $section['location']])
        </div>
    </section>
@endforeach
{{-- ===== Umrah Offered By ===== --}}
@php
    // umrah offered data
    $umrahOffered_title = $sec[5]->section_heading ?? '';
    $umrahOffered_desc = $sec[5]->section_description ?? '';

    $umrahBus_title = $sec[6]->section_heading ?? '';
    $umrahBus_desc = $sec[6]->section_description ?? '';
    $umrahBus_img = $sec[6]->section_image ?? '';

    $umrahAir_title = $sec[7]->section_heading ?? '';
    $umrahAir_desc = $sec[7]->section_description ?? '';
    $umrahAir_img = $sec[7]->section_image ?? '';

    $umrahVisa_title = $sec[8]->section_heading ?? '';
    $umrahVisa_desc = $sec[8]->section_description ?? '';
    $umrahVisa_img = $sec[8]->section_image ?? '';

    $umrahMultiEntry_title = $sec[9]->section_heading ?? '';
    $umrahMultiEntry_desc = $sec[9]->section_description ?? '';
    $umrahMultiEntry_img = $sec[9]->section_image ?? '';
@endphp
<section class="pb-12">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-12 pb-10">
            <h1>
                {!! format_two_color_heading($umrahOffered_title) !!}
            </h1>
            <div class="mt-5">
                {!! $umrahOffered_desc !!}
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="md:flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-xl gap-5">
                <div class="text-center justify-center md:text-left">
                    <h3 class="text-2xl">{{ $umrahBus_title }}</h3>
                    <p class="text-sm leading-6 mt-4 pe-5">{!! $umrahBus_desc !!}</p>
                    <a href="{{ route('page.default', 'umrah-by-bus') }}"
                       class="flex items-center justify-center w-fit text-white text-sm mt-4 px-4 pt-1 pb-2 rounded-full mx-auto md:ms-0
                                bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Explore Umrah by Bus Packages <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                                           class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
                <div class="">
                    <img src="{{ asset('assets/images/pages/sections/' . $umrahBus_img) }}"
                         width="150"
                         height="150"
                         alt="{{ $umrahBus_img }}"
                         title="{{ $umrahBus_img }}"
                         class="max-w-xl h-auto mx-auto md:ms-0 md:mt-0 mt-5">
                </div>
            </div>
            <div class="md:flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-xl gap-5">
                <div class="text-center justify-center md:text-left">
                    <h3 class="text-2xl">{{ $umrahAir_title }}</h3>
                    <p class="text-sm leading-6 mt-4 pe-5">{!! $umrahAir_desc !!}</p>
                    <a href="{{ route('page.default', 'umrah-by-air') }}"
                       class="flex items-center justify-center w-fit text-white text-sm mt-4 px-4 pt-1 pb-2 rounded-full mx-auto md:ms-0
                                bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        View Umrah by Air Packages <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                                        class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
                <div class="">
                    <img src="{{ asset('assets/images/pages/sections/' . $umrahAir_img) }}"
                         width="150"
                         height="150"
                         alt="{{$umrahAir_img}}"
                         title="{{$umrahAir_img}}"
                         class="max-w-2xl h-auto mx-auto md:ms-0 md:mt-0 mt-5">
                </div>
            </div>
            <div class="md:flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-xl gap-5">
                <div class="text-center justify-center md:text-left">
                    <h3 class="text-2xl">{{$umrahVisa_title}}</h3>
                    <p class="text-sm leading-6 mt-4 pe-5">{!! $umrahVisa_desc !!}</p>
                    <a href="{{ route('page.default', 'umrah-visa') }}"
                       class="flex items-center justify-center w-fit text-white text-sm mt-4 px-4 pt-1 pb-2 rounded-full mx-auto md:ms-0
                                bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Check Umrah Visa Requirements <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                                           class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
                <div class="">
                    <img src="{{ asset('assets/images/pages/sections/' . $umrahVisa_img) }}"
                         width="150"
                         height="150"
                         alt="{{$umrahVisa_img}}"
                         title="{{$umrahVisa_img}}"
                         class="max-w-2xl h-auto mx-auto md:ms-0 md:mt-0 mt-5">
                </div>
            </div>
            <div class="md:flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-xl gap-5">
                <div class="text-center justify-center md:text-left">
                    <h3 class="text-2xl">{{ $umrahMultiEntry_title }}</h3>
                    <p class="text-sm leading-6 mt-4 pe-5">{!! $umrahMultiEntry_desc !!}</p>
                    <a href="{{ route('page.default', 'multiple-entry') }}"
                       class="flex items-center justify-center w-fit text-white text-sm mt-4 px-4 pt-1 pb-2 rounded-full mx-auto md:ms-0
                                bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Explore Saudi Multiple Entry Visa Options
                        <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                             class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
                <div class="">
                    <img src="{{ asset('assets/images/pages/sections/' . $umrahMultiEntry_img) }}"
                         width="150"
                         height="150"
                         alt="{{$umrahMultiEntry_img}}"
                         title="{{$umrahMultiEntry_img}}"
                         class="max-w-2xl h-auto mx-auto md:ms-0 md:mt-0 mt-5">
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.components.testimonials');
{{-- FAQs --}}
@php
    $faq_title = $sec[10]->section_heading ?? '';
    $faq_desc = $sec[10]->section_description ?? '';
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
@include('frontend.components.footerContactBar');
@include('frontend.components.explore_dubai')
