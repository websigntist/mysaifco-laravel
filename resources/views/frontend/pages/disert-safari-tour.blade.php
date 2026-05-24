@extends('frontend.layouts.master')
@section('content')
    @include('frontend.pages.partials.cms-content')
    @php
        $packages = $packages ?? [
            [
                'title' => 'Dubai Desert Safari',
                'badge' => 'Best Seller',
                'badge_style' => 'fire',
                'image' => asset('assets/images/packages/001.webp'),
                'rating' => '4.9',
                'reviews' => '5.1k Reviews | 3 Hours',
                'price' => '150',
                'url' => '#',
            ],
            [
                'title' => 'Dubai: Royal Camel Race, Standard Ticket',
                'badge' => 'Best Price Yacht Deal',
                'badge_style' => 'fire',
                'image' => asset('assets/images/packages/002.webp'),
                'rating' => '4.8',
                'reviews' => '5.1k Reviews | 3 Hours',
                'price' => '890',
                'url' => '#',
            ],
            [
                'title' => 'Desert Safari with 30 mins Quad Biking',
                'badge' => 'Top Rated Dinner Cruise',
                'badge_style' => 'star',
                'image' => asset('assets/images/packages/003.webp'),
                'rating' => '4.9',
                'reviews' => '5.1k Reviews | 3 Hours',
                'price' => '220',
                'url' => '#',
            ],
            [
                'title' => 'Private Dubai Desert Safari with BBQ Dinner',
                'badge' => 'Best Seller',
                'badge_style' => 'fire',
                'image' => asset('assets/images/packages/004.webp'),
                'rating' => '4.7',
                'reviews' => '5.1k Reviews | 3 Hours',
                'price' => '185',
                'url' => '#',
            ],
            [
                'title' => 'Morning Desert Safari ',
                'badge' => 'Top Rated',
                'badge_style' => 'star',
                'image' => asset('assets/images/packages/005.webp'),
                'rating' => '4.6',
                'reviews' => '5.1k Reviews | 3 Hours',
                'price' => '95',
                'url' => '#',
            ],
            [
                'title' => 'Morning Desert Safari with 30 mins Quad Bike ride',
                'badge' => 'Best Seller',
                'badge_style' => 'fire',
                'image' => asset('assets/images/packages/006.webp'),
                'rating' => '4.8',
                'reviews' => '5.1k Reviews | 3 Hours',
                'price' => '125',
                'url' => '#',
            ],
            [
                'title' => 'Dubai Trio ( Dubai City Tour, Desert Safari and Dhow Cruise D...',
                'badge' => 'Best Seller',
                'badge_style' => 'fire',
                'image' => asset('assets/images/packages/007.webp'),
                'rating' => '4.9',
                'reviews' => '5.1k Reviews | 3 Hours',
                'price' => '150',
                'url' => '#',
            ],
            [
                'title' => '4 Tours: Desert Safari, Dubai City Tour, Cruise Dinner & Abu Dhabi',
                'badge' => 'Best Price Yacht Deal',
                'badge_style' => 'fire',
                'image' => asset('assets/images/packages/008.webp'),
                'rating' => '4.8',
                'reviews' => '5.1k Reviews | 3 Hours',
                'price' => '890',
                'url' => '#',
            ],
            [
                'title' => 'Dubai Desert Safari Pick-up from Shj, Ajman and Ras al Khaimah',
                'badge' => 'Top Rated Dinner Cruise',
                'badge_style' => 'star',
                'image' => asset('assets/images/packages/009.webp'),
                'rating' => '4.9',
                'reviews' => '5.1k Reviews | 3 Hours',
                'price' => '220',
                'url' => '#',
            ],
            [
                'title' => 'Combo 1 : Dubai City Tour and Desert Safari',
                'badge' => 'Best Seller',
                'badge_style' => 'fire',
                'image' => asset('assets/images/packages/010.webp'),
                'rating' => '4.9',
                'reviews' => '5.1k Reviews | 3 Hours',
                'price' => '150',
                'url' => '#',
            ],
            [
                'title' => 'Combo 3: Desert Safari and Dhow Cruise Dinner',
                'badge' => 'Best Price Yacht Deal',
                'badge_style' => 'fire',
                'image' => asset('assets/images/packages/011.webp'),
                'rating' => '4.8',
                'reviews' => '5.1k Reviews | 3 Hours',
                'price' => '890',
                'url' => '#',
            ],
            [
                'title' => 'Combo 4 : Desert Safari and Abu Dhabi City Tour',
                'badge' => 'Top Rated Dinner Cruise',
                'badge_style' => 'star',
                'image' => asset('assets/images/packages/012.webp'),
                'rating' => '4.9',
                'reviews' => '5.1k Reviews | 3 Hours',
                'price' => '220',
                'url' => '#',
            ],
        ];
    @endphp
    {{--===== top banner ======--}}
    <section class="flex justify-center items-center border-b-1 border-gray-200">
        <div class="px-4 relative flex min-h-[400px] w-full
        items-center justify-center overflow-hidden">
            <div class="absolute inset-0 scale-105 bg-cover bg-top bg-no-repeat"
                 style="background-image: url('{{ asset('assets/images/sliders/560650.webp') }}')"
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
                                    <a href="tel:+971505593840">
                                        <div class="font-heading font-bold italic text-mst text-xl">Tour Inquires <br>
                                            <span class="text-mst-gray">+971 50 559 3840</span>
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

    {{--===== main heading ======--}}
    <section class="flex justify-center items-center py-8 px-4 md:py-10">
        <div class="container mx-auto">
            <div class="testimonials-section-inner mx-auto max-w-6xl">
                <div class="mx-auto text-center">
                    <h1>
                        <span>Desert Safari   </span><span class="text-mst">Tours</span>
                    </h1>
                    <p class="mt-4">Experience the best Desert Safari Dubai with thrilling dune bashing, camel rides,
                                    sandboarding, and BBQ dinner under the stars. Choose from evening desert safari,
                                    morning safari, private desert safari, and VIP desert camp experiences. Enjoy live
                                    entertainment including belly dance, Tanoura show, and fire show while exploring the
                                    golden dunes of Dubai. These desert safari tours offer a perfect mix of adventure,
                                    culture, and relaxation, making them one of the top things to do in Dubai for
                                    tourists and families.</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 relative mt-8 -mx-4 px-4 sm:mx-0 sm:px-0">
                @foreach ($packages as $slide)
                    <div class="swiper-slide !h-auto">
                        <article class="best-seller-card flex h-full flex-col overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
                            <a href="{{ $slide['url'] }}" class="relative block aspect-[16/10] shrink-0 overflow-hidden">
                                <img
                                    src="{{ $slide['image'] }}"
                                    alt=""
                                    class="h-full w-full object-cover transition duration-300 hover:scale-105"
                                    loading="lazy"
                                    width="400"
                                    height="250"> </a>
                            <div class="flex flex-1 flex-col p-4">
                                <h2 class="line-clamp-2">
                                    <a href="{{ $slide['url'] }}" class="hover:text-mst transition ease-in-out duration-500
                                    focus-visible:outline
                                    focus-visible:outline-offset-2 focus-visible:outline-mst">
                                        {{ $slide['title'] }}
                                    </a>
                                </h2>
                                <div class="mt-2 flex flex-wrap items-center gap-1.5 text-xs text-gray-700
                                                            font-heading">
                                    <span class="text-amber-400" aria-hidden="true">&#9733;</span>
                                    <span class="font-body">{{ $slide['rating'] }}/5 |</span> <span>{{
                                    $slide['reviews'] }}</span>
                                </div>
                                <div class="mt-auto flex items-end justify-between gap-3 pt-4">
                                    <div>
                                        <p class="text-xs text-fine -mb-1">Starting</p>
                                        <p class="font-heading text-xl font-bold text-mst-gray">
                                            AED {{ $slide['price'] }}
                                            <span class="text-sm font-normal text-gray-600">/person</span>
                                        </p>
                                    </div>
                                    <a
                                        href="{{ $slide['url'] }}"
                                        class="inline-flex shrink-0 items-center gap-1 rounded-full px-4 py-2
                                                                    text-sm font-light text-white
                                                                    bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                                                                     hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                                                                     transition duration-300 font-heading italic
                                                                    focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-mst-dark"
                                    > Book Now <img src="{{asset('assets/images/icons/btn-arrow.svg')}}"
                                                    class="w-4 ms-1"
                                                    alt="arrow"> </a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('frontend.components.testimonials')
    @include('frontend.components.faqs_disert_safari')
    @include('frontend.components.explore_dubai')
@endsection
