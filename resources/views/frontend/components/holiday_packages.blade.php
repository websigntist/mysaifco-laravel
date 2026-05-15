@php
    $bestSellerSlides = $bestSellerSlides ?? [
        [
            'title' => 'Dubai Desert Safari',
            'badge' => 'Best Seller',
            'badge_style' => 'fire',
            'image' => asset('assets/images/p1.webp'),
            'rating' => '4.9',
            'reviews' => '5.1k',
            'price' => '150',
            'url' => '#',
        ],
        [
            'title' => 'Private Luxury Yacht Charter',
            'badge' => 'Best Price Yacht Deal',
            'badge_style' => 'fire',
            'image' => asset('assets/images/p2.webp'),
            'rating' => '4.8',
            'reviews' => '3.2k',
            'price' => '890',
            'url' => '#',
        ],
        [
            'title' => 'Dinner Cruise Dubai Marina',
            'badge' => 'Top Rated Dinner Cruise',
            'badge_style' => 'star',
            'image' => asset('assets/images/p3.webp'),
            'rating' => '4.9',
            'reviews' => '8.4k',
            'price' => '220',
            'url' => '#',
        ],
        [
            'title' => 'Abu Dhabi City Tour',
            'badge' => 'Best Seller',
            'badge_style' => 'fire',
            'image' => asset('assets/images/p1.webp'),
            'rating' => '4.7',
            'reviews' => '2.1k',
            'price' => '185',
            'url' => '#',
        ],
        [
            'title' => 'Dubai Frame & Sky Views',
            'badge' => 'Top Rated',
            'badge_style' => 'star',
            'image' => asset('assets/images/p2.webp'),
            'rating' => '4.6',
            'reviews' => '1.4k',
            'price' => '95',
            'url' => '#',
        ],
        [
            'title' => 'Morning Desert Safari',
            'badge' => 'Best Seller',
            'badge_style' => 'fire',
            'image' => asset('assets/images/p3.webp'),
            'rating' => '4.8',
            'reviews' => '4.0k',
            'price' => '125',
            'url' => '#',
        ],
    ];
@endphp
<section class="flex justify-center items-center py-14 px-4
bg-gradient-to-r from-[#ffffff] from-50% to-[#E5EBFB] to-50%">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-[8fr_4fr] gap-6">
            <div class="flex flex-col justify-center pe-50">
                <h1 class="capitalize italic font-semibold text-3xl font-heading">
                    holiday <span class="text-mst">
                        packages
                    </span>
                </h1>
                <div class="text-md my-2 leading-6 font-body w-9/12 mt-5">
                    <p>Discover the best Dubai holiday packages with top UAE tours, exclusive deals, and unforgettable
                       experiences. From desert safari and luxury yacht tours to Abu Dhabi city tours and dhow cruises,
                       explore the UAE with expertly crafted travel packages for comfort, value, and memorable
                       journeys.</p>
                </div>
                <a href="" class="flex items-center justify-center w-72 text-white text-lg px-6 py-3 rounded-full
                                            bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                                             hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                                             transition duration-300 font-heading italic mt-8"> Explore all Destination
                                                <img src="{{asset('assets/images/icons/btn-arrow.svg')}}"
                                                     class="w-6 ms-1"
                                                     alt="arrow"> </a>
            </div>
            <div class="">

            </div>
        </div>
    </div>
</section>
