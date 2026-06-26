<section class="flex justify-center items-center bg-white py-12 px-4 md:py-10">
    <div class="container mx-auto">
        <div class="best-seller-swiper-wrap" aria-label="Best seller tours carousel">
            <div class="best-seller-header flex item-center justify-between gap-6 md:gap-7">
                <div>
                    <div class="best-seller-heading-row flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between sm:gap-6 md:gap-8">
                        <h1 class="min-w-0 flex-1">
                            <span>Best Seller &amp;</span><span class="text-mst"> Top Rated Dubai Tours</span>
                        </h1>
                    </div>
                    <p class="mt-5 pe-20">
                        Discover our most popular Dubai tours and experiences, including desert safari, yacht tours,
                        city tours, and Abu Dhabi trips – all top-rated and best value for money.
                    </p>
                </div>
                {{-- arrow buttons --}}
                <div class="best-seller-nav flex shrink-0 items-center justify-end gap-4 sm:justify-start">
                    <button
                        type="button"
                        class="best-seller-swiper-prev best-seller-nav-btn best-seller-nav-btn--prev cursor-pointer"
                        aria-label="Previous tours"
                    >
                        <img
                            src="{{ asset('assets/images/icons/btn-arrow-blk-left.svg') }}"
                            class="best-seller-nav-img best-seller-nav-img--prev rotate-180"
                            width="20"
                            height="20"
                            alt=""
                        />
                    </button>
                    <button
                        type="button"
                        class="best-seller-swiper-next best-seller-nav-btn best-seller-nav-btn--next cursor-pointer"
                        aria-label="Next tours"
                    >
                        <img
                            src="{{ asset('assets/images/icons/btn-arrow-wht-right.svg') }}"
                            class="best-seller-nav-img"
                            width="20"
                            height="20"
                            alt=""
                        />
                    </button>
                </div>
            </div>
            <div class="relative mt-8 -mx-4 px-4 sm:mx-0 sm:px-0">
                <div class="swiper best-seller-swiper" id="---best-seller-swiper">
                    <div class="swiper-wrapper">
                        @foreach($best_seller_packages as $package)
                            <div class="swiper-slide !h-auto">
                                <article class="best-seller-card flex h-full flex-col overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
                                    <a href="{{ $package->frontendUrl() }}" class="relative block aspect-[16/10] shrink-0 overflow-hidden">
                                        <img
                                            src="{{ $package->imageUrl() }}"
                                            alt="{{ $package->image_alt }}"
                                            title="{{ $package->image_title }}"
                                            class="h-full w-full object-cover transition duration-300 hover:scale-105"
                                            loading="lazy"
                                            width="400"
                                            height="250"
                                        > <span
                                            class="absolute left-3 top-3 inline-flex items-center gap-1 rounded-full px-3
                                        py-1 text-sm font-normal text-white shadow-sm bg-red-600 font-heading"
                                        >
                                        @if (($slide['badge_style'] ?? '') === 'star')
                                                <span aria-hidden="true">&#11088;</span>
                                            @else
                                                <span aria-hidden="true">&#128293;</span>
                                            @endif
                                            {{ $package->redTag->title }}
                                    </span> </a>
                                    <div class="flex flex-1 flex-col p-4">
                                        <h2 class="font-heading text-xl leading-snug text-mst-gray line-clamp-1">
                                            <a href="{{ $package->frontendUrl() }}" class="hover:text-mst focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-mst">
                                                {{ $package->title }}
                                            </a>
                                        </h2>
                                        <div class="mt-2 flex flex-wrap items-center gap-1.5 text-xs text-gray-700 font-heading">
                                            <span class="text-amber-400" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                                            <span class="font-body">(4.5/5)</span> <span>4.0k Reviews</span>
                                        </div>
                                        <div class="mt-auto flex items-end justify-between gap-3 pt-4">
                                            <div>
                                                <p class="text-xs text-gray-700 -mb-1">From</p>
                                                <p class="font-heading text-xl font-bold text-mst-gray">
                                                    {{ get_setting('shop_currency') }} {{ number_format($package->price, 0) }}
                                                    <span class="text-sm font-normal text-gray-600">/person</span>
                                                </p>
                                            </div>
                                            <a
                                                href="{{ $package->frontendUrl() }}"
                                                class="inline-flex shrink-0 items-center gap-1 rounded-full px-4 py-2
                                            text-sm font-light text-white bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                                             hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                                             transition duration-300 font-heading italic
                                            focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-mst-dark"> Book Now
                                                <img src="{{asset('assets/images/icons/btn-arrow.svg')}}"
                                                            class="w-4 ms-1"
                                                            alt="arrow"> </a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-15">
                    <a href="{{ route( 'page.default', 'all-tour-categories') ?? '#' }}" class="flex items-center justify-center w-64 text-mst-gray text-xl px-5 py-3 rounded-full
                                                border border-mst-gray font-bold
                                                 transition duration-300 font-heading mx-auto"> View all Tours
                        <img src="{{asset('assets/images/icons/btn-arrow-blk.svg')}}"
                             class="w-6 ms-3"
                             alt="arrow"> </a>
                </div>
            </div>
        </div>
    </div>
</section>
