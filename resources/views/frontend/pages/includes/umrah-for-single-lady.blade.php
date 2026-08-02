@php
    $cmsPage = page_body_content('umrah-for-single-lady');
    $sections = ($cmsPage && $cmsPage->sections) ? $cmsPage->sections : collect([]);

    $sec = [];
    for ($i = 0; $i < 50; $i++) {
        $sec[$i] = $sections->get($i);
    }

    // umrah travel agencey data
    $umrah_title = $sec[0]->section_heading ?? '';
    $umrah_desc = $sec[0]->section_description ?? '';
@endphp
{{--===== umrah for single ======--}}
<section class="flex justify-center items-center -mt-10">
    <div class="px-4 relative flex md:min-h-[850px] min-h-[650px] w-full umrah-hero-section"
         style="
             background-image: url('{{ asset('assets/images/umrah/lady.webp') }}'), url('{{ asset('assets/images/umrah/umrah-15.webp') }}');
             background-position: center bottom, center center;
             background-repeat: no-repeat, no-repeat;
         ">
        <div class="z-10 w-full py-10">
            <div class="container mx-auto">
                <div class="mx-auto max-w-3xl text-center pt-12 pb-10">
                    <h1>
                        {!! format_two_color_heading($umrah_title) !!}
                    </h1>
                    <p class="mt-5 text-[16px]">{!! $umrah_desc !!}</p>
                    <a href="{{umrah_whatsapp_url()}}"
                       class="flex items-center justify-center mx-auto mt-8 w-fit text-white px-6 pt-2 pb-3
                       rounded-full bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E]
                       hover:to-[#BA9B31] transition duration-300 font-heading italic"> Connect with Us
                        <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- umrah packages --}}
@php
    $umrahpkg_title = $sec[1]->section_heading ?? '';
    $umrahpkg_desc = $sec[1]->section_description ?? '';
@endphp
<section class="pb-12">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-12 pb-10">
            <h1>
                {!! format_two_color_heading($umrahpkg_title) !!}
            </h1>
            <p class="mt-5">{!! $umrahpkg_desc !!}</p>
        </div>
        @include('frontend.components.umrah_by_air_packages');
    </div>
</section>
{{-- umrah offer  --}}
@php
    $weoffer_title = $sec[2]->section_heading ?? '';
    $weoffer_desc = $sec[2]->section_description ?? '';
@endphp
<section class="pb-12">
    <div class="container py-10">
        <div class="mx-auto max-w-5xl text-center pb-10">
            <h1>
                {!! format_two_color_heading($weoffer_title) !!}
            </h1>
            <p class="mt-5">{!! $weoffer_desc !!}</p>
        </div>
        @include('frontend.components.related_services', ['limit' => 3, 'position' => 'last', 'cols' => 3, 'show_button' => true, 'img_size' => '150px'])
    </div>
</section>
{{--required documents --}}
@include('frontend.components.required_documents');
{{-- how to perform --}}
@php
    $saudi_title = $sec[3]->section_heading ?? '';
    $saudi_desc = $sec[3]->section_description ?? '';
    $saudi_img = $sec[3]->section_image ?? '';
@endphp
<section class="flex justify-between items-center py-12">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1.5fr] items-center gap-8">
            <div>
                <h1 class="md:text-left text-center normal-case">
                    {!! format_two_color_heading($saudi_title) !!}
                </h1>
                <p class="text-[16px] mt-4 md:text-left text-center">{!! $saudi_desc !!}</p>
                <div class="flex items-center justify-center md:justify-start mt-10">
                    <a href="{{route('page.default','multiple-entry')}}" class="flex items-center justify-center w-fit text-white text-lg px-7 pt-3 pb-3
                    rounded-full
                                        bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                                         hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                                         transition duration-300 font-heading italic"> Explore more Details
                        <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                             class="w-5 ms-2 rotate-90"
                             alt="arrow"> </a>
                </div>
            </div>
            <div class="flex justify-center md:justify-end">
                <img src="{{ asset('assets/images/pages/sections/' . $saudi_img) }}" alt="$saudi_img">
            </div>
        </div>
    </div>
</section>
{{-- world wide umrah services --}}
@php
    $ww_title = $sec[4]->section_heading ?? '';
    $ww_desc = $sec[4]->section_description ?? '';
@endphp
<section class="flec item-center justify-center pt-14">
    <div class="container">
        <div class="mx-auto text-center mb-10">
            <h1>
                {!! format_two_color_heading($ww_title) !!}
            </h1>
            <p class="mt-4 md:w-3xl mx-auto">{!! $ww_desc !!}</p>
        </div>
        @include('frontend.components.related_services', ['limit' => 4, 'position' => 'first', 'cols' => 4])
    </div>
</section>
@include('frontend.components.testimonials')
{{-- FAQs --}}
@php
    $faq_title = $sec[5]->section_heading ?? '';
    $faq_desc = $sec[5]->section_description ?? '';
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
