@php
    $popularCategories = $popularCategories ?? [
        ['title' => 'Dubai Safari Tour', 'count' => '15 Tours', 'image' => 'product-category/01.webp', 'url' => '#', 'wide' => false],
        ['title' => 'Yacht Charter', 'count' => '21 Tours', 'image' => 'product-category/02.webp', 'url' => '#', 'wide' => true],
        ['title' => 'Abu Dhabi Tours', 'count' => '5 Tours', 'image' => 'product-category/03.webp', 'url' => '#', 'wide' => false],
        ['title' => 'Dhow Cruise Tours', 'count' => '4 Tours', 'image' => 'product-category/04.webp', 'url' => '#', 'wide' => false],
        ['title' => 'Dubai City Tour', 'count' => '5 Tours', 'image' => 'product-category/05.webp', 'url' => '#', 'wide' => false],
        ['title' => 'Dubai Combo Tours', 'count' => '7 Tours', 'image' => 'product-category/06.webp', 'url' => '#', 'wide' => false],
        ['title' => 'Water Activities', 'count' => '5 Tours', 'image' => 'product-category/07.webp', 'url' => '#', 'wide' => false],
        ['title' => 'Theme Park Tickets', 'count' => '10 Tours', 'image' => 'product-category/08.webp', 'url' => '#', 'wide' => false],
    ];
@endphp
<section class="our-popular-section flex justify-center items-center bg-white py-12 px-4 md:py-14">
    <div class="container mx-auto">
        <div class="our-popular-inner">
            <div class="our-popular-header flex flex-col gap-5 md:flex-row md:items-start md:justify-between md:gap-8">
                <div class="min-w-0 flex-1">
                    <h2 class="font-heading text-2xl font-semibold italic leading-tight tracking-tight text-mst-gray sm:text-3xl">
                        <span class="text-mst-gray">Our Popular</span><span class="text-mst"> Tour Categories</span>
                    </h2>
                    <p class="mt-4 font-body text-base leading-7 text-neutral-600 md:text-lg md:leading-8">
                        Explore our travel packages for every traveler. Whether a camel race, safari tour, or city
                        exploration, we have something special!
                    </p>
                </div>
                <div class="our-popular-header__cta flex shrink-0 md:pt-1">
                    <a
                        href="#"
                        class="inline-flex w-fit items-center justify-center gap-2 rounded-full bg-gradient-to-r from-mst to-mst-dark px-6 py-3 font-heading text-base italic text-white transition hover:from-mst-dark hover:to-mst md:px-7 md:text-lg"
                    >
                        View all Packages
                        <img
                            src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                            class="ms-1 w-5 md:w-6"
                            width="24"
                            height="24"
                            alt=""
                        />
                    </a>
                </div>
            </div>
            <div class="our-popular-grid mt-8 grid grid-cols-1 gap-4 sm:gap-5 md:mt-10 md:grid-cols-3 md:gap-5">
                @foreach ($popularCategories as $category)
                    <article @class([
                        'our-popular-card',
                        'our-popular-card--wide md:col-span-2' => ! empty($category['wide']),
                    ])>
                        <a href="{{ $category['url'] }}" class="our-popular-card__link">
                            <img
                                src="{{ asset('assets/images/' . $category['image']) }}"
                                alt="{{ $category['title'] }}"
                                class="our-popular-card__img"
                                loading="lazy"
                                width="640"
                                height="480"
                            />
                            <div class="our-popular-card__overlay" aria-hidden="true"></div>
                            <div class="our-popular-card__content">
                                <h3 class="our-popular-card__title font-heading">
                                    {{ $category['title'] }}
                                </h3>
                                <p class="our-popular-card__count font-body">
                                    {{ $category['count'] }}
                                </p>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
