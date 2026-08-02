@php
    $cmsPage = page_body_content('umrah-by-air');
    $sections = ($cmsPage && $cmsPage->sections) ? $cmsPage->sections : collect([]);

    $sec = [];
    for ($i = 0; $i < 50; $i++) {
        $sec[$i] = $sections->get($i);
    }

    // umrah travel agencey data
    $umrahAir_title = $sec[0]->section_heading ?? '';
    $umrahAir_desc = $sec[0]->section_description ?? '';
    $umrahAir_img = $sec[0]->section_image ?? '';
@endphp
{{-- ===== Intro strip ===== --}}
<section class="pt-10 pb-4">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] items-center gap-8">
            <div>
                <h1 class="text-center md:text-left">
                    {!! format_two_color_heading($umrahAir_title) !!}
                </h1>
                <p class="text-[16px] mt-4 text-center md:text-left">{!! $umrahAir_desc !!}</p>
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
                    <img src="{{ asset('assets/images/pages/sections/' . $umrahAir_img) }}" alt="Umrah by Air">
                </div>
            </div>
        </div>
    </div>
</section>
{{-- umrah packages --}}
@php
    $pkg_title = $sec[1]->section_heading ?? '';
    $pkg_desc = $sec[1]->section_description ?? '';
@endphp
<section class="pb-12">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-12 pb-10">
            <h1>
                {!! format_two_color_heading($pkg_title) !!}
            </h1>
            <p class="mt-5">{!! $pkg_desc !!}</p>
        </div>
        @include('frontend.components.umrah_by_air_packages');
    </div>
</section>
{{-- ===== Packages Include ===== --}}
@php
    $pkginc_title = $sec[2]->section_heading ?? '';
    $pkginc_desc = $sec[2]->section_description ?? '';
@endphp
<section class="pb-6 mb-16">
    <div class="container mx-auto">
        <div class="mx-auto max-w-5xl text-center pb-10">
            <h1>
                {!! format_two_color_heading($pkginc_title) !!}
            </h1>
            <p class="mt-5">{!! $pkginc_desc !!}</p>
        </div>
        @include('frontend.components.related_services', ['limit' => 8, 'position' => 'last', 'cols' => 4])
    </div>
</section>
{{-- ===== Required Documents for Umrah Visa ===== --}}
@include('frontend.components.required_documents');
{{-- ===== We Offer Umrah from ===== --}}
@php
    $weoffer_title = $sec[3]->section_heading ?? '';
    $weoffer_desc = $sec[3]->section_description ?? '';
@endphp
<section class="pb-12">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-12 pb-10">
            <h1>
                {!! format_two_color_heading($weoffer_title) !!}
            </h1>
            <p class="mt-5">{!! $weoffer_desc !!}</p>
        </div>
        @include('frontend.components.related_services', ['ids' => [15, 16, 17], 'cols' => 3, 'show_button' => true, 'img_size' => '150px'])
    </div>
</section>
@include('frontend.components.testimonials')
{{-- ===== World Wide Umrah Services ===== --}}
@php
    $ww_title = $sec[4]->section_heading ?? '';
    $ww_desc = $sec[4]->section_description ?? '';
@endphp
<section class="pt-6 pb-14">
    <div class="container mx-auto">
        <div class="mx-auto max-w-5xl text-center pb-10">
            <h1>
                {!! format_two_color_heading($ww_title) !!}
            </h1>
            <p class="mt-5">{!! $ww_desc !!}</p>
        </div>
        @include('frontend.components.related_services', ['ids' => [1, 2, 3, 4], 'cols' => 4])
    </div>
</section>
{{-- ===== How to perform Umrah? ===== --}}
@php
    $how_title = $sec[5]->section_heading ?? '';
    $how_desc = $sec[5]->section_description ?? '';
@endphp
<section class="flex justify-between items-center py-12 mb-16 bg-gray-100">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] items-center gap-8">
            <div>
                <h1 class="md:text-left text-center">
                    {!! format_two_color_heading($how_title) !!}
                </h1>
                <p class="text-[16px] mt-4 md:text-left text-center">{!! $how_desc !!}</p>
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
@php
    $faq_title = $sec[6]->section_heading ?? '';
    $faq_desc = $sec[6]->section_description ?? '';
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
