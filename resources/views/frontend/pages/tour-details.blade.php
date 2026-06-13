@extends('frontend.layouts.master')
@section('content')
    <div class="pt-8">
        <div class="container mx-auto">
            <!-- Top Bar: Back Button, Title, Action Buttons -->
            <div class="flex items-center justify-between gap-4 flex-wrap mb-6">
                <!-- Left: Back Button & Title -->
                <div class="flex items-center gap-4 flex-wrap">
                    <a href="javascript:history.back()" class="inline-flex items-center text-white ps-4 pe-6 pt-1 pb-2
                    rounded-full
                     font-heading italic font-medium text-md
                     bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                      hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                      transition duration-300">
                        <!-- Left Chevron SVG -->
                        <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                             class="w-4 rotate-180 mt-1 me-1"
                             alt="arrow"> Back </a>
                    <h1 class="md:text-3xl font-heading font-semibold italic capitalize leading-none -mt-1">
                        {{ $tour->title ?? 'Abu Dhabi City Tour' }}
                    </h1>
                </div>
                <!-- Right: Action Buttons (Share, Heart, More) -->
                <div class="flex items-center gap-3">
                    <!-- Share Button -->
                    <a class="w-11 h-11 rounded-full border border-gray-300 flex items-center justify-center cursor-pointer" title="Share">
                        <img src="{{ asset('assets/images/icons/share.svg') }}" alt=""> </a>
                    <a class="w-11 h-11 rounded-full border border-gray-300 flex items-center justify-center cursor-pointer" title="wish">
                        <img src="{{ asset('assets/images/icons/heart.svg') }}" alt=""> </a>
                    <a class="w-11 h-11 rounded-full border border-gray-300 flex items-center justify-center cursor-pointer" title="more">
                        <img src="{{ asset('assets/images/icons/more.svg') }}" alt=""> </a>
                </div>
            </div>
        </div>
    </div>

    <div class="tour_slider">
        <div class="container mx-auto">
            <div class="relative w-full mb-8">
                <!-- Swiper Container -->
                <div class="swiper tour-details-swiper rounded-xl md:rounded-2xl overflow-hidden shadow-xs relative">
                    <div class="swiper-wrapper">
                        @if(isset($sliderImages))
                            @foreach($sliderImages as $sliderImage)
                                <div class="swiper-slide relative aspect-[16/12] md:aspect-[21/9] w-full">
                                    <img src="{{ $sliderImage['url'] }}" class="w-full h-full object-cover" alt="{{ $sliderImage['alt'] }}">
                                </div>
                            @endforeach
                        @else
                            <div class="swiper-slide relative aspect-[16/12] md:aspect-[21/9] w-full">
                                <img src="{{ asset('assets/images/sliders/tourbanner1.webp') }}" class="w-full h-full object-cover" alt="Abu Dhabi City Tour View 1">
                            </div>
                            <div class="swiper-slide relative aspect-[16/12] md:aspect-[21/9] w-full">
                                <img src="{{ asset('assets/images/sliders/tourbanner2.webp') }}" class="w-full h-full object-cover" alt="Abu Dhabi City Tour View 2">
                            </div>
                        @endif
                    </div>
                    <!-- Pagination Dots -->
                    {{--<div class="swiper-pagination tour-details-swiper-pagination !bottom-6 z-10"></div>--}}
                </div>
                <!-- Navigation Arrows -->
                <!-- Left Chevron -->
                <button class="hidden md:block tour-details-swiper-prev absolute left-6 top-1/2 -translate-y-1/2 z-20 cursor-pointer" aria-label="Previous Slide">
                    <img src="{{ asset('assets/images/icons/ltarrow.svg') }}" alt="">
                </button>
                <!-- Right Chevron -->
                <button class="hidden md:block tour-details-swiper-next absolute right-6 top-1/2 -translate-y-1/2 z-20 cursor-pointer" aria-label="Next Slide">
                    <img src="{{ asset('assets/images/icons/rtarrow.svg') }}" alt="">
                </button>
            </div>
        </div>
    </div>

    <div class="more_details">
        <div class="container mx-auto">
            <!-- Bottom Metadata List Bar -->
            <div class="py-5 overflow-x-auto ddscroll w-fulls">
                <div class="md:flex md:items-center md:justify-between gap-6 text-sm space-y-5 md:space-y-0 ">
                    <!-- Item 1: Starting From -->
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('assets/images/icons/redpin.svg') }}" alt="">
                        <div class="flex flex-col text-left">
                            <span class="text-xs font-semibold leading-none text-gray-600">StartingFrom</span>
                            <span class="text-[16px] font-bold mt-1">AED {{ isset($tour) ? number_format($tour->price, 0) : '125' }}<span class="text-gray-800 font-normal
                            text-xs">/person</span></span>
                        </div>
                    </div>
                    <!-- Bullet Dot -->
                    <span class="hidden md:block text-gray-300 select-none font-bold text-3xl">•</span>
                    <!-- Item 2: Tour Location -->
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('assets/images/icons/redpin.svg') }}" alt="">
                        <div class="flex flex-col text-left">
                            <span class="text-xs font-semibold leading-none">Tour Location</span>
                            <span class="text-[16px] font-bold mt-1">{{ $tour->tour_location ?? 'Abu Dhabi Tours' }}</span>
                        </div>
                    </div>
                    <!-- Bullet Dot -->
                    <span class="hidden md:block text-gray-300 select-none font-bold text-3xl">•</span>
                    <!-- Item 3: Tour Duration -->
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('assets/images/icons/3dclock.svg') }}" alt="">
                        <div class="flex flex-col text-left">
                            <span class="text-xs font-semibold leading-none">Tour Duration</span>
                            <span class="text-[16px] font-bold mt-1">{{ $tour->tour_duration ?? '10 Hours' }}</span>
                        </div>
                    </div>
                    <!-- Bullet Dot -->
                    <span class="hidden md:block text-gray-300 select-none font-bold text-3xl">•</span>
                    <!-- Item 4: Max People -->
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('assets/images/icons/gr3.svg') }}" alt="">
                        <div class="flex flex-col text-left">
                            <span class="text-xs font-semibold leading-none">Max People</span>
                            <span class="text-[16px] font-bold mt-1">{{ $tour->max_persons ?? '150' }}</span>
                        </div>
                    </div>
                    <!-- Bullet Dot -->
                    <span class="hidden md:block text-gray-300 select-none font-bold text-3xl">•</span>
                    <!-- Item 5: Min. Age -->
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('assets/images/icons/min-age.svg') }}" alt="">
                        <div class="flex flex-col text-left">
                            <span class="text-xs font-semibold leading-none">Min. Age</span>
                            <span class="text-[16px] font-bold mt-1">{{ isset($tour) && $tour->min_age > 0 ? $tour->min_age : 'N/A' }}</span>
                        </div>
                    </div>
                    <!-- Bullet Dot -->
                    <span class="hidden md:block text-gray-300 select-none font-bold text-3xl">•</span>
                    <!-- Item 6: Reviews -->
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('assets/images/icons/review.svg') }}" alt="">
                        <div class="flex flex-col text-left">
                            <span class="text-xs font-semibold leading-none">Reviews</span>
                            <span class="text-[16px] font-bold mt-1 flex items-center gap-1">
                                <!-- Yellow Star -->
                                <img src="{{ asset('assets/images/icons/star.svg') }}" alt="">
                                @if(isset($reviews) && $reviews->isNotEmpty())
                                    ({{ number_format($reviews->avg('rating'), 1) }}/5) {{ $reviews->count() }} Reviews
                                @else
                                    (4.9/5) 2.4K Reviews
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            <div class="mt-10">
                <ul class="umrah-package-tabs flex justify-center  md:justify-start flex-wrap gap-2 text-sm md:
                text-md font-medium
                md:gap-3"
                    id="default-styled-tab"
                    data-tabs-toggle="#default-styled-tab-content"
                    data-tabs-active-classes="tab-btn--active"
                    data-tabs-inactive-classes=""
                    role="tablist">
                    <li class="me-0 md:me-1" role="presentation">
                        <button class="tab-btn inline-block cursor-pointer rounded-full px-4 pt-1 pb-2 font-heading italic"
                                id="description-tab"
                                data-tabs-target="#styled-description"
                                type="button"
                                role="tab"
                                aria-controls="description"
                                aria-selected="true">
                            Description
                        </button>
                    </li>
                    <li class="me-0 md:me-1" role="presentation">
                        <button class="tab-btn inline-block cursor-pointer rounded-full px-4 pt-1 pb-2 font-heading italic"
                                id="itinerary-tab"
                                data-tabs-target="#styled-itinerary"
                                type="button"
                                role="tab"
                                aria-controls="itinerary"
                                aria-selected="false">
                            Itinerary
                        </button>
                    </li>
                    <li class="me-0 md:me-1" role="presentation">
                        <button class="tab-btn inline-block cursor-pointer rounded-full px-4 pt-1 pb-2 font-heading italic"
                                id="reviews-tab"
                                data-tabs-target="#styled-reviews"
                                type="button"
                                role="tab"
                                aria-controls="reviews"
                                aria-selected="false">
                            Reviews
                        </button>
                    </li>
                </ul>
                <div id="default-styled-tab-content" class="mt-8 mb-10">
                    <div class="hidden" id="styled-description" role="tabpanel" aria-labelledby="description-tab">
                        <h2 class="font-semibold text-3xl font-heading mb-4">
                            <span>Tour </span><span class="text-mst">Overview</span>
                        </h2>
                        <div class="prose max-w-none text-gray-700">
                            {!! $tour->description ?? '<p>No description available.</p>' !!}
                        </div>
                    </div>
                    <div class="hidden rounded-base bg-neutral-secondary-soft" id="styled-itinerary" role="tabpanel" aria-labelledby="itinerary-tab">
                        <h2 class="font-semibold text-3xl font-heading mb-4">
                            <span>Tour </span><span class="text-mst">Itinerary</span>
                        </h2>
                        <div class="prose max-w-none text-gray-700">
                            {!! $tour->itinerary ?? '<p>No itinerary details available.</p>' !!}
                        </div>
                    </div>
                    <div class="hidden rounded-base bg-neutral-secondary-soft" id="styled-reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <h2 class="font-semibold text-3xl font-heading mb-4">
                            <span>Customer </span><span class="text-mst">Reviews</span>
                        </h2>
                        <div class="space-y-4">
                            @if(isset($reviews) && $reviews->isNotEmpty())
                                @foreach($reviews as $review)
                                    <div class="p-4 bg-white rounded-xl border border-gray-100 shadow-2xs">
                                        <div class="flex items-center justify-between mb-2">
                                            <div>
                                                <div class="font-bold text-gray-800">{{ $review->name }}</div>
                                                @if($review->designation || $review->company)
                                                    <div class="text-xs text-gray-500">{{ $review->designation }} {{ $review->company ? '@ ' . $review->company : '' }}</div>
                                                @endif
                                            </div>
                                            <div class="flex items-center text-amber-400">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <span class="text-lg leading-none">{{ $i <= $review->rating ? '★' : '☆' }}</span>
                                                @endfor
                                            </div>
                                        </div>
                                        <p class="text-sm text-gray-600 italic">"{{ $review->review }}"</p>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-gray-500 italic">No reviews yet for this tour.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-10">
                @include('frontend.components.booking_form')
            </div>
        </div>
    </div>

    <div class="container mx-auto my-14">
        <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between md:gap-8">
            <div class="min-w-0 flex-1">
                <h1 class="text-left">
                    <span>You May </span><span class="text-mst">also Like</span>
                </h1>
                <p class="text-left mt-4 pe-20">Get reliable global visa assistance with expert support for tourist
                                                visas, visit visas, business visas, and worldwide travel. </p>
            </div>
        </div>
        <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-5">
            <div class="relative">
                <img src="{{ asset('assets/images/packages/01.webp') }}"
                     class="rounded-lg w-full h-full min-h-[280px] object-cover"
                     alt="">
                <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80 hover:bg-black/20 transition duration-300 ease-in-out"></div>
                <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white z-10 truncate max-w-[85%]">
                    Dhow Cruise Dinner in Dubai Marina
                </div>
                <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10" aria-hidden="true">
                    @for ($i = 0; $i < 5; $i++)
                        <span class="text-base leading-none md:text-lg">&#9733;</span>
                    @endfor
                    <span class="text-white text-xs ms-1">(4.9/5) 3.1K Reviews</span>
                </div>
                <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1 px-4 text-white z-10">
                    Starting from: AED {{ number_format((float) 599, 0) }}
                </div>
                <a href="#"
                   class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center w-15 h-9 rounded-full bg-white z-10 hover:right-4 transition-all ease-in-out duration-500">
                    <img src="{{ asset('assets/images/icons/line-arrow.svg') }}" alt="" class="w-5 h-6"> </a>
            </div>
            <div class="relative">
                            <img src="{{ asset('assets/images/packages/02.webp') }}"
                                 class="rounded-lg w-full h-full min-h-[280px] object-cover"
                                 alt="">
                            <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80 hover:bg-black/20 transition duration-300 ease-in-out"></div>
                            <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white z-10 truncate max-w-[85%]">
                                Dhow Cruise Dinner in Dubai Marina
                            </div>
                            <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10" aria-hidden="true">
                                @for ($i = 0; $i < 5; $i++)
                                    <span class="text-base leading-none md:text-lg">&#9733;</span>
                                @endfor
                                <span class="text-white text-xs ms-1">(4.9/5) 3.1K Reviews</span>
                            </div>
                            <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1 px-4 text-white z-10">
                                Starting from: AED {{ number_format((float) 599, 0) }}
                            </div>
                            <a href="#"
                               class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center w-15 h-9 rounded-full bg-white z-10 hover:right-4 transition-all ease-in-out duration-500">
                                <img src="{{ asset('assets/images/icons/line-arrow.svg') }}" alt="" class="w-5 h-6"> </a>
                        </div>
            <div class="relative">
                            <img src="{{ asset('assets/images/packages/03.webp') }}"
                                 class="rounded-lg w-full h-full min-h-[280px] object-cover"
                                 alt="">
                            <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80 hover:bg-black/20 transition duration-300 ease-in-out"></div>
                            <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white z-10 truncate max-w-[85%]">
                                Dhow Cruise Dinner in Dubai Marina
                            </div>
                            <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10" aria-hidden="true">
                                @for ($i = 0; $i < 5; $i++)
                                    <span class="text-base leading-none md:text-lg">&#9733;</span>
                                @endfor
                                <span class="text-white text-xs ms-1">(4.9/5) 3.1K Reviews</span>
                            </div>
                            <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1 px-4 text-white z-10">
                                Starting from: AED {{ number_format((float) 599, 0) }}
                            </div>
                            <a href="#"
                               class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center w-15 h-9 rounded-full bg-white z-10 hover:right-4 transition-all ease-in-out duration-500">
                                <img src="{{ asset('assets/images/icons/line-arrow.svg') }}" alt="" class="w-5 h-6"> </a>
                        </div>
        </div>
    </div>

    @include('frontend.components.tour_faqs')
    @include('frontend.components.explore_dubai')
@endsection
