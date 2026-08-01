@php
    $cmsPage = page_body_content('umrah');
    $sections = ($cmsPage && $cmsPage->sections) ? $cmsPage->sections : collect([]);

    $sec = [];
    for ($i = 0; $i < 50; $i++) {
        $sec[$i] = $sections->get($i);
    }

    // umrah travel agencey data
    $umrahTravel_title = $sec[0]->section_heading ?? '';
    $umrahTravel_desc = $sec[0]->section_description ?? '';
    $umrahTravel_img = $sec[0]->section_image ?? '';
@endphp
{{-- umrah travel --}}
<section class="flex justify-between items-center pb-12">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] items-center gap-8">
            <div>
                <h1 class="text-center md:text-left">
                    {!! format_two_color_heading($umrahTravel_title) !!}
                </h1>
                <div class="text-[16px] mt-4 text-center md:text-left">
                    {!! $umrahTravel_desc !!}
                </div>
                <a href="{{ umrah_whatsapp_url() }}" class="flex items-center justify-center w-fit text-white text-lg
                px-5 pt-2 pb-2
                rounded-full
                                                                            bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                                                                             hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                                                                             transition duration-300 font-heading
                                                                             italic mt-8 mx-auto md:ms-0"> Get Umrah
                                                                                                           Details on
                                                                                                           WhatsApp
                    <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                         class="w-5 ms-1"
                         alt="arrow"> </a>
            </div>
            <div class="flex items-center justify-end">
                <img src="{{ asset('assets/images/pages/sections/' . $umrahTravel_img) }}"
                     class="w-full object-cover rounded-xl"
                     title="{{ $umrahTravel_img }}"
                     alt="{{ $umrahTravel_img }}">
            </div>
        </div>
    </div>
</section>
@php
    // umrah offered data
    $umrahOffered_title = $sec[1]->section_heading ?? '';
    $umrahOffered_desc = $sec[1]->section_description ?? '';

    $umrahBus_title = $sec[2]->section_heading ?? '';
    $umrahBus_desc = $sec[2]->section_description ?? '';
    $umrahBus_img = $sec[2]->section_image ?? '';

    $umrahAir_title = $sec[3]->section_heading ?? '';
    $umrahAir_desc = $sec[3]->section_description ?? '';
    $umrahAir_img = $sec[3]->section_image ?? '';

    $umrahVisa_title = $sec[4]->section_heading ?? '';
    $umrahVisa_desc = $sec[4]->section_description ?? '';
    $umrahVisa_img = $sec[4]->section_image ?? '';

    $umrahMultiEntry_title = $sec[5]->section_heading ?? '';
    $umrahMultiEntry_desc = $sec[5]->section_description ?? '';
    $umrahMultiEntry_img = $sec[5]->section_image ?? '';
@endphp
{{-- umrah offered --}}
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
{{-- world wide --}}
@php
    $worldwide_title = $sec[6]->section_heading ?? '';
    $worldwide_desc = $sec[6]->section_description ?? '';

    /*$visa_title = $sec[7]->section_heading ?? '';
    $visa_desc = $sec[7]->section_description ?? '';
    $visa_img = $sec[7]->section_image ?? '';

    $flights_title = $sec[8]->section_heading ?? '';
    $flights_desc = $sec[8]->section_description ?? '';
    $flights_img = $sec[8]->section_image ?? '';

    $trans_title = $sec[9]->section_heading ?? '';
    $trans_desc = $sec[9]->section_description ?? '';
    $trans_img = $sec[9]->section_image ?? '';

    $hotel_title = $sec[10]->section_heading ?? '';
    $hotel_desc = $sec[10]->section_description ?? '';
    $hotel_img = $sec[10]->section_image ?? '';*/
@endphp
<section class="flec item-center justify-center pt-14 pb-18">
    <div class="container">
        <div class="mx-auto text-center">
            <h1>
                {!! format_two_color_heading($worldwide_title) !!}
            </h1>
            <div class="mt-4 md:w-3xl mx-auto">
                {!! $worldwide_desc !!}
            </div>
        </div>
        @include('frontend.components.related_services')
        {{--<div class="grid grid-cols-1 md:grid-cols-4 gap-10 mt-14">
            <div class="bg-gray-50 p-8 rounded-xl border-1 border-gray-200 space-y-4">
                <img src="{{asset('assets/images/pages/sections/' . $visa_img)}}" class="mx-auto" alt="img">
                <h5 class="font-heading text-md font-semibold text-center mb-1">{{$visa_title}}</h5>
                <p class="font-body text-xs text-center">{!! $visa_desc !!}</p>
            </div>
            <div class="bg-gray-50 p-8 rounded-xl border-1 border-gray-200 space-y-4">
                <img src="{{asset('assets/images/pages/sections/' . $flights_img)}}" class="mx-auto" alt="img">
                <h5 class="font-heading text-md font-semibold text-center mb-1">{{$flights_title}}</h5>
                <p class="font-body text-xs text-center">{!! $flights_desc !!}</p>
            </div>
            <div class="bg-gray-50 p-8 rounded-xl border-1 border-gray-200 space-y-4">
                <img src="{{asset('assets/images/pages/sections/' . $trans_img)}}" class="mx-auto" alt="img">
                <h5 class="font-heading text-md font-semibold text-center mb-1">{{$trans_title}}</h5>
                <p class="font-body text-xs text-center">{!! $trans_desc !!}</p>
            </div>
            <div class="bg-gray-50 p-8 rounded-xl border-1 border-gray-200 space-y-4">
                <img src="{{asset('assets/images/pages/sections/' . $hotel_img)}}" class="mx-auto" alt="img">
                <h5 class="font-heading text-md font-semibold text-center mb-1">{{$hotel_title}}</h5>
                <p class="font-body text-xs text-center">{!! $hotel_desc !!}</p>
            </div>
        </div>--}}
    </div>
</section>
{{-- required documents --}}
@php
    $docTitle = $sec[11]->section_heading ?? '';
    $docDesc = $sec[11]->section_description ?? '';
    $docImg = $sec[11]->section_image ?? '';

    $clearTitle = $sec[12]->section_heading ?? '';
    $clearDesc = $sec[12]->section_description ?? '';

    $passTitle = $sec[13]->section_heading ?? '';
    $passDesc = $sec[13]->section_description ?? '';

    $nationalTitle = $sec[14]->section_heading ?? '';
    $nationalDesc = $sec[14]->section_description ?? '';

    $processTitle = $sec[15]->section_heading ?? '';
    $processDesc = $sec[15]->section_description ?? '';
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
@include('frontend.components.testimonials')
{{--===== umrah for single ======--}}
@php
    $singleTitle = $sec[16]->section_heading ?? '';
    $singleDesc = $sec[16]->section_description ?? '';
@endphp
<section class="flex justify-center items-center">
    <div class="px-4 relative flex md:min-h-[850px] min-h-[650px] w-full bg-[-250px] md:bg-center bg-cover bg-no-repeat umrah-hero-section"
         style="
              background-image: url('{{ asset('assets/images/umrah/lady.webp') }}'), url('{{ asset('assets/images/umrah/umrah-15.webp') }}');
              background-position: center bottom, center center;
              background-repeat: no-repeat, no-repeat;
              background-size: 600px auto, cover;
          ">
        <div class="z-10 w-full py-10">
            <div class="container mx-auto">
                <div class="mx-auto max-w-3xl text-center pt-12 pb-10">
                    <h1>
                        {!! format_two_color_heading($singleTitle) !!}
                    </h1>
                    <div class="mt-5 text-[16px]">
                        {!! $singleDesc !!}
                    </div>
                    <a href="{{route('page.default','umrah-for-single-lady')}}"
                       class="flex items-center justify-center mx-auto mt-8 w-44 text-white px-4 pt-2 pb-3
                   rounded-full
                           bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Read More <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                                   class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- how to perform --}}
@php
    $howTitle = $sec[17]->section_heading ?? '';
    $howDesc = $sec[17]->section_description ?? '';
@endphp
<section class="flex justify-between items-center py-12 bg-gray-50">
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr] items-center gap-8">
            <div>
                <h1 class="md:text-left text-center">
                    {!! format_two_color_heading($howTitle) !!}
                </h1>
                <div class="text-[16px] mt-4 md:text-left text-center">
                    {!! $howDesc !!}
                </div>
            </div>
            <div class="flex items-center justify-center md:justify-end">
                <a href="#" class="flex items-center justify-center w-fit text-white text-lg px-7 pt-3 pb-3
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
{{-- umrah offer --}}
@php
    $offerTitle = $sec[18]->section_heading ?? '';
    $offerDesc = $sec[18]->section_description ?? '';

    $dubaiTitle = $sec[19]->section_heading ?? '';
    $dubaiDesc = $sec[19]->section_description ?? '';

    $abudhabiTitle = $sec[20]->section_heading ?? '';
    $abudhabiDesc = $sec[20]->section_description ?? '';

    $sharjahTitle = $sec[21]->section_heading ?? '';
    $sharjahDesc = $sec[21]->section_description ?? '';

    $vfsTitle = $sec[22]->section_heading ?? '';
    $vfsDesc = $sec[22]->section_description ?? '';

    $vaccineTitle = $sec[23]->section_heading ?? '';
    $vaccineDesc = $sec[23]->section_description ?? '';
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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5">
            <div class="flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-3xl">
                <div class="text-center">
                    <img src="{{ asset('assets/images/umrah/umrah-10.webp') }}" class="mx-auto mb-4" alt="">
                    <h3 class="text-xl">{{$vfsTitle}}</h3>
                    <p class="text-sm leading-6 my-4 line-clamp-3">{!! $vfsDesc !!}</p>
                    <a href="#" class="flex items-center justify-center w-fit mx-auto text-white text-sm mt-5 px-4 pt-1 pb-2 rounded-full bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Learn more
                        <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
            </div>
            <div class="flex items-center justify-between bg-gray-50 border border-gray-200 px-8 pt-5 pb-8 rounded-3xl">
                <div class="text-center">
                    <img src="{{ asset('assets/images/umrah/umrah-11.webp') }}" class="mx-auto mb-4" alt="">
                    <h3 class="text-xl">{{$vaccineTitle}}</h3>
                    <p class="text-sm leading-6 my-4 line-clamp-3">{!! $vaccineDesc !!}</p>
                    <a href="#" class="flex items-center justify-center w-fit mx-auto text-white text-sm mt-5 px-4 pt-1 pb-2 rounded-full bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                        Learn more
                        <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4 mt-1 ms-1" alt=""> </a>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.components.tour_faqs')
@include('frontend.components.footerContactBar');
@include('frontend.components.explore_dubai')

