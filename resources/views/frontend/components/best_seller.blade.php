@php
    $bestSellerSlides = $bestSellerSlides ?? [
        [
            'title' => 'Dubai Desert Safari',
            'badge' => 'Best Seller',
            'badge_style' => 'fire',
            'image' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=800&q=80',
            'rating' => '4.9',
            'reviews' => '5.1k',
            'price' => '150',
            'url' => '#',
        ],
        [
            'title' => 'Private Luxury Yacht Charter',
            'badge' => 'Best Price Yacht Deal',
            'badge_style' => 'fire',
            'image' => 'https://images.unsplash.com/photo-1567894340315-735d7c361db0?w=800&q=80',
            'rating' => '4.8',
            'reviews' => '3.2k',
            'price' => '890',
            'url' => '#',
        ],
        [
            'title' => 'Dinner Cruise Dubai Marina',
            'badge' => 'Top Rated Dinner Cruise',
            'badge_style' => 'star',
            'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=800&q=80',
            'rating' => '4.9',
            'reviews' => '8.4k',
            'price' => '220',
            'url' => '#',
        ],
        [
            'title' => 'Abu Dhabi City Tour',
            'badge' => 'Best Seller',
            'badge_style' => 'fire',
            'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=800&q=80',
            'rating' => '4.7',
            'reviews' => '2.1k',
            'price' => '185',
            'url' => '#',
        ],
        [
            'title' => 'Dubai Frame & Sky Views',
            'badge' => 'Top Rated',
            'badge_style' => 'star',
            'image' => 'https://images.unsplash.com/photo-1458695406213-6ed82fad51c8?w=800&q=80',
            'rating' => '4.6',
            'reviews' => '1.4k',
            'price' => '95',
            'url' => '#',
        ],
        [
            'title' => 'Morning Desert Safari',
            'badge' => 'Best Seller',
            'badge_style' => 'fire',
            'image' => 'https://images.unsplash.com/photo-1509316785289-025f5b846b35?w=800&q=80',
            'rating' => '4.8',
            'reviews' => '4.0k',
            'price' => '125',
            'url' => '#',
        ],
    ];
@endphp

<section class="flex justify-center items-center bg-white py-12 px-4 md:py-14">
    <div class="container mx-auto">
        <div
            class="best-seller-swiper-wrap"
            aria-label="Best seller tours carousel"
        >
            <header class="best-seller-header flex flex-col gap-6 md:gap-7">
                <div class="best-seller-heading-row flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between sm:gap-6 md:gap-8">
                    <h1 class="min-w-0 flex-1 font-heading text-3xl font-bold italic leading-tight tracking-tight text-mst-gray md:text-4xl md:leading-[1.15]">
                        <span class="text-mst-gray">Best Seller &amp;</span><span class="text-mst"> Top Rated Dubai Tours</span>
                    </h1>
                    <div class="best-seller-nav flex shrink-0 items-center justify-end gap-2.5 sm:justify-start">
                        <button
                            type="button"
                            class="best-seller-swiper-prev best-seller-nav-btn best-seller-nav-btn--prev"
                            aria-label="Previous tours"
                        >
                            <svg class="best-seller-nav-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        <button
                            type="button"
                            class="best-seller-swiper-next best-seller-nav-btn best-seller-nav-btn--next"
                            aria-label="Next tours"
                        >
                            <svg class="best-seller-nav-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <p class="max-w-4xl font-body text-base leading-7 text-neutral-600 md:text-lg md:leading-8">
                    Discover our most popular Dubai tours and experiences, including desert safari, yacht tours, city
                    tours, and Abu Dhabi trips – all top-rated and best value for money.
                </p>
            </header>

            <div class="relative mt-8 -mx-4 px-4 sm:mx-0 sm:px-0">
            <div
                class="swiper best-seller-swiper"
                id="best-seller-swiper"
            >
                <div class="swiper-wrapper">
                    @foreach ($bestSellerSlides as $slide)
                        <div class="swiper-slide !h-auto">
                            <article
                                class="best-seller-card flex h-full flex-col overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm"
                            >
                                <a href="{{ $slide['url'] }}" class="relative block aspect-[16/10] shrink-0 overflow-hidden">
                                    <img
                                        src="{{ $slide['image'] }}"
                                        alt=""
                                        class="h-full w-full object-cover transition duration-300 hover:scale-105"
                                        loading="lazy"
                                        width="400"
                                        height="250"
                                    >
                                    <span
                                        class="absolute left-3 top-3 inline-flex items-center gap-1 rounded px-2 py-1 text-xs font-semibold text-white shadow-sm bg-red-600"
                                    >
                                        @if (($slide['badge_style'] ?? '') === 'star')
                                            <span aria-hidden="true">&#11088;</span>
                                        @else
                                            <span aria-hidden="true">&#128293;</span>
                                        @endif
                                        {{ $slide['badge'] }}
                                    </span>
                                </a>
                                <div class="flex flex-1 flex-col p-4">
                                    <h2 class="font-heading text-lg font-bold leading-snug text-mst-gray line-clamp-2">
                                        <a href="{{ $slide['url'] }}" class="hover:text-mst focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-mst">
                                            {{ $slide['title'] }}
                                        </a>
                                    </h2>
                                    <div class="mt-2 flex flex-wrap items-center gap-1.5 text-sm text-gray-500">
                                        <span class="text-amber-400" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                                        <span class="font-body">({{ $slide['rating'] }}/5)</span>
                                        <span>{{ $slide['reviews'] }} Reviews</span>
                                    </div>
                                    <div class="mt-auto flex items-end justify-between gap-3 pt-4">
                                        <div>
                                            <p class="text-xs text-gray-500">From</p>
                                            <p class="font-heading text-base font-bold text-mst-gray">
                                                AED {{ $slide['price'] }}<span class="text-sm font-normal text-gray-600">/person</span>
                                            </p>
                                        </div>
                                        <a
                                            href="{{ $slide['url'] }}"
                                            class="inline-flex shrink-0 items-center gap-1 rounded-full bg-mst px-4 py-2 text-sm font-semibold text-white transition hover:bg-mst-dark focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-mst-dark"
                                        >
                                            Book Now
                                            <span class="text-white/90" aria-hidden="true">&rsaquo;</span>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
