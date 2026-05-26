@extends('frontend.layouts.master')
@section('content')
    @php
        $tours = $tours ?? collect();
        $page = $page ?? null;
        $bannerImageUrl = $bannerImageUrl ?? asset('assets/images/sliders/560650.webp');
    @endphp

    {{--===== top banner (image from CMS page or tour type) ======--}}
    <section class="flex justify-center items-center border-b-1 border-gray-200">
            <div class="px-4 relative flex min-h-[400px] w-full
            items-center justify-center overflow-hidden">
                <div class="absolute inset-0 scale-105 bg-cover bg-center bg-no-repeat"
                     style="background-image: url('{{ $bannerImageUrl }}')"
                     aria-hidden="true"></div>
                <div class="absolute inset-0 bg-gray-950/25" aria-hidden="true"></div>
                <div class="relative z-10 w-full py-14">
                    <div class="container mx-auto">
                        <div class="grid grid-cols-1 md:grid-cols-[0.7fr_1fr] gap-6">
                            <div class="flex flex-col justify-center">
                                <ul class="flex items-center justify-start gap-5">
                                    <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                        <div class="text-white text-xl font-medium text-center italic font-heading">
                                            Best Price
                                        </div>
                                        <div class="text-white text-xs text-center">Guaranteed Deals</div>
                                    </li>
                                    <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                        <div class="text-white text-xl font-medium text-center italic font-heading">
                                            18 + Years
                                        </div>
                                        <div class="text-white text-xs text-center">Trusted Experience</div>
                                    </li>
                                    <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                        <div class="text-white text-xl font-medium text-center italic font-heading">
                                            Top Rated
                                        </div>
                                        <div class="text-white text-xs text-center">5 Starts Rated</div>
                                    </li>
                                </ul>
                                <ul class="flex items-center justify-start gap-5 mt-5">
                                    <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                        <div class="text-white text-xl font-medium text-center italic font-heading">
                                            Licensed Operator
                                        </div>
                                        <div class="text-white text-xs text-center">Dubai Approved</div>
                                    </li>
                                    <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                        <div class="text-white text-xl font-medium text-center italic font-heading">
                                            50K + Customers
                                        </div>
                                        <div class="text-white text-xs text-center">World Wide Travelerss</div>
                                    </li>
                                </ul>
                            </div>
                            {{--======================--}}
                            <div class="flex items-center justify-end">
                                <div class="bg-gray-50 rounded-xl pt-3 pb-4 px-4 border border-gray-200 space-y-4 w-96 h-40">
                                    <div class="font-heading font-bold italic text-xl capitalize mb-3">
                                        Contact with <span class="text-mst">Us</span>
                                    </div>
                                    <div class="bg-gray-50 rounded-xl p-4 border gap-3 border-gray-200 flex item-center justify-start">
                                        <img src="{{asset('assets/images/icons/whatsapp.svg')}}" class="w36" alt="whatsapp">
                                        <a href="tel:{{ get_setting('tour_inquiry_whatsapp') }}">
                                            <div class="font-heading font-bold italic text-mst text-xl">Tour Inquires <br>
                                                <span class="text-mst-gray">{{ get_setting('tour_inquiry_whatsapp') }}</span>
                                            </div>
                                        </a>
                                        <img src="{{asset('assets/images/icons/line-arrow.svg')}}" class="w36 ml-auto" alt="arrow">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @if(filled($pageContent ?? null))
        <section class="flex justify-center items-center py-8 px-4 md:py-10">
            <div class="container mx-auto">
                <div class="testimonials-section-inner mx-auto max-w-6xl">
                    <div class="mx-auto text-center">
                        @if($page && ($page->show_title ?? '0') == '1' && filled($page->page_title))
                            @php
                                $words    = explode(' ', $page->page_title);
                                $count    = count($words);
                                $spanN    = $count >= 3 ? 2 : 1;  // 3+ words = last 2, 2 words = last 1
                                $mainText = implode(' ', array_slice($words, 0, -$spanN));
                                $spanText = implode(' ', array_slice($words, -$spanN));
                            @endphp

                            <h1>
                                <span>{{ $mainText }} </span><span class="text-mst">{{ $spanText }}</span>
                            </h1>
                        @elseif($tourType && ! $page)
                            <h1>
                                <span class="text-mst">{{ $tourType->title }}</span>
                            </h1>
                        @endif
                        <div class="mt-4">
                            {!! $pageContent !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @elseif($tourType && filled($tourType->short_description))
        <section class="flex justify-center items-center py-8 px-4 md:py-10">
            <div class="container mx-auto max-w-6xl text-center">
                <p class="mt-4 text-mst-gray">{{ $tourType->short_description }}</p>
            </div>
        </section>
    @endif

    @include('frontend.components.tour-listing-grid', ['tours' => $tours])

    @include('frontend.components.testimonials')
    @include('frontend.components.tour_faqs')
    @include('frontend.components.explore_dubai')
@endsection
