<section class="">
    <div class="px-4 relative flex w-full items-start justify-center overflow-hidden">
        <div class="absolute inset-0 scale-100 bg-cover bg-top bg-no-repeat" style="background-image: url('{{ asset('assets/images/pages/1784392804_6a5bac646bb10_image.webp') }}')" aria-hidden="true"></div>
        {{--@dump($explore_uae)--}}
        <div class="absolute inset-0 bg-gradient-to-r from-black/90 from-30% to-black/05 to-90%"
             aria-hidden="true"></div>
        <div class="relative z-10 w-full py-14">
            <div class="container mx-auto">
                <nav class="breadcrumb flex items-center gap-1 text-md font-heading" aria-label="Breadcrumb">
                    <a href="{{ url('/') }}" class="text-white hover:text-mst transition">Home</a>
                    <svg class="w-4 h-4 text-mst" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7"/>
                    </svg>
                    <a href="{{ url('/') }}" class="text-white hover:text-mst transition">Blogs</a>
                    <svg class="w-4 h-4 text-mst" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7"/>
                    </svg>
                    <span class="text-mst capitalize">Umrah Guide 2026</span>
                </nav>
                <h1 class="text-5xl w-4xl mt-6 font-body font-bold not-italic leading-16 text-white">
                    Complete Umrah Guide <br> <span class="text-mst">2026</span>
                </h1>
                <p class="text-lg mt-5 w-6/12 text-white">Everything You need to know before your Spiritual Journey </p>
                <div class="flex mt-8 mb-15 gap-6">
                    <a
                        href="#"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-[#2D9D3E] to-[#1E5E28]
                        hover:from-[#1E5E28] hover:to-[#2D9D3E]
                        px-7 py-3 font-heading text-base italic text-white transition md:text-lg"
                    > <img
                            src="{{ asset('assets/images/icons/whatsapp1.svg') }}"
                            class="ms-1 w-6"
                            width="24"
                            height="24"
                            alt=""
                        > WhatsApp Us </a> <a
                        href="#"
                        class="inline-flex items-center justify-center gap-2 rounded-full bg-[#03174C]
                                             px-7 py-3 font-heading text-base italic text-white transition hover:from-mst-dark
                                                                 hover:to-mst md:text-lg"
                    > <img
                            src="{{ asset('assets/images/icons/support6.svg') }}"
                            class="ms-1 w-7 brightness-0 invert"
                            alt=""
                        > Contact Support </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="trust-bar py-12 -mt-26 relative z-1">
    <div class="container mx-auto">
        <div class="bg-gray-50 border border-gray-300 rounded-3xl grid grid-cols-1 md:grid-cols-4 py-8 px-4 md:px-8">
            <!-- Card 1: Experience -->
            <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/starbadge.svg') }}" alt="Experience Icon" class="w-full h-full object-contain">
                </div>
                <div class="font-heading italic font-bold text-mst-gray text-center leading-tight">
                    17+ Years<br>Experience
                </div>
            </div>
            <!-- Card 2: Travelers Served -->
            <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/17years.svg') }}" alt="Travelers Icon" class="w-full h-full object-contain">
                </div>
                <div class="font-heading italic font-bold text-mst-gray text-center leading-tight">
                    50,000+ Travelers<br>Served
                </div>
            </div>
            <!-- Card 3: Customer Support -->
            <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/support2.svg') }}" alt="Support Icon" class="w-full h-full object-contain">
                </div>
                <div class="font-heading italic font-bold text-mst-gray text-center leading-tight">
                    24/7 Customer<br>Support
                </div>
            </div>
            <!-- Card 4: Best Price Guaranteed -->
            <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/dbadge.svg') }}" alt="Best Price Icon" class="w-full h-full object-contain">
                </div>
                <div class="font-heading italic font-bold text-mst-gray text-center leading-tight">
                    Best Price<br>Guaranted
                </div>
            </div>
        </div>
    </div>
</section>

@php
    $tableOfContent = [
        'What is Umrah',
        'Difference between Umrah and Hajj',
        'Best time to Perform Umrah',
        'Umrah Visa Requirements',
        'Documents Required',
        'Step-by-Step Umrah Rituals',
        'What to Pack',
        'Health & Vaccination',
        'Estimated Cost',
        'Helpful Travel Tips',
        'Frequently Asked Questions',
    ];

    $comparisonRows = [
        ['Can be performed all year', 'Performed only during Dhull Hajjah'],
        ['Takes only a few hours',    'Losts around 5-6 days'],
        ['Fewer Rituals',             'More comprehensive rituals'],
        ['Optional',                  'Mandatory for financially and physically able Muslims'],
    ];

    $bestTimes = [
        ['title' => 'Ramadan',            'icon' => 'r656.svg',
         'desc'  => 'One of the most spiritually rewarding times to perform Umrah. However, it is also the busiest season with larger crowds and higher travel costs.'],
        ['title' => 'Winter (Nov - Feb)', 'icon' => 't5656.svg',
         'desc'  => 'Pleasant weather makes walking between holy sites much more comfortable.'],
        ['title' => 'Off-Peak Months',    'icon' => 'f565.svg',
         'desc'  => 'Ideal for families and elderly travelers seeking fewer crowds and better hotel availability.'],
    ];

    $blogCategories = [
        ['label' => 'Umrah Guide',      'icon' => 'h989.svg'],
        ['label' => 'Visa Information', 'icon' => 'h989.svg'],
        ['label' => 'Holiday Packages', 'icon' => 'holiday.svg'],
        ['label' => 'Travel Tips',      'icon' => 'tips.svg'],
        ['label' => 'Saudi Arabia',     'icon' => 'r5656.svg'],
        ['label' => 'Dubai Tours',      'icon' => 'dubai.svg'],
    ];

    $recentPosts = [
        ['title' => 'Complete Umrah Guide from Dubai',              'read' => '8 mins read', 'image' => 'b1-original.webp'],
        ['title' => 'Desert Safari Guide - Everything You must Know','read' => '6 mins read', 'image' => 'b2-original.webp'],
        ['title' => 'UAE Visa Guide for Tourists',                  'read' => '5 mins read', 'image' => 'b3-original.webp'],
        ['title' => 'Abu Dhabi Travel Guide - Top places to Visit', 'read' => '5 mins read', 'image' => 'b4-original.webp'],
        ['title' => 'How to plan a Budget trip to Dubai',           'read' => '5 mins read', 'image' => 'b5-original.webp'],
    ];

    $popularTags = ['Umrah', 'Saudi Arabia', 'Visa', 'Makhah', 'Madinah', 'Pilgrimage', 'Dubai', 'Travel', 'Flights', 'Umrah', 'Hoildays'];

    $blogFilters = ['All', 'UAE Travel', 'Umrah Guide', 'Desert Safari', 'Yacht Charter', 'UAE Visa', 'Abu Dhabi Tours', 'Holiday', 'Dubai Tours'];

    $relatedBlogs = [
        ['title' => 'Desert Safari in Dubai - Types, Price & what to Exp...', 'image' => '56dfd-original.webp',
         'date'  => 'May 10, 2026', 'read' => '8 min read',
         'desc'  => 'Explore the thrill of Dubai desert safari, learn about different safari types, prices, inclusions  and tips for an amazing.'],
        ['title' => 'Yacht Charter in Dubai - A Luxury Experience on Water', 'image' => '627727e24441f5e0b9c98e7e7155c6b8e41b28cb-original.webp',
         'date'  => 'May 10, 2026', 'read' => '8 min read',
         'desc'  => 'Book a private yacht charter n Dubai and enjoy luxury, comfort and breathing views. Perfect for celebration & special'],
        ['title' => 'Best Time to Visit Dubai - Weather, Events & Travel T...', 'image' => 'packages/holiday-package-6.webp',
         'date'  => 'May 10, 2026', 'read' => '8 min read',
         'desc'  => 'Planing a trp to Dubai?Discover the best time to vis it Dubai wth details on weather top events and travel tips to make you..'],
    ];
@endphp

{{-- ===== Article + Sidebar ===== --}}
<section class="pt-4 pb-6">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-[2fr_1fr] gap-8">
            {{-- LEFT: article --}}
            <div>
                <img src="{{ asset('assets/images/65660.webp') }}"
                     alt="Umrah Guide"
                     class="w-full h-72 md:h-96 object-cover rounded-2xl">
                <p class="font-body text-mst-gray leading-7 mt-5">
                    Planning your first Umrah? This comprehensive guide covers visas, costs, preparation, rituals, packing
                    essentials, and expert travel tips to help you perform a smooth and meaningful pilgrimage.
                </p>

                {{-- Table of Content --}}
                <div class="bg-gray-50 border border-gray-200 rounded-2xl px-6 py-5 mt-6">
                    <h3 class="font-heading font-bold text-xl text-mst-gray mb-5">Table of Content</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-2">
                        @foreach($tableOfContent as $toc)
                            <div class="flex items-center gap-3">
                                <img src="{{ asset('assets/images/icons/check-bullet.svg') }}" alt="">
                                <span class="font-body text-sm text-mst-gray">{{ $toc }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- 1. What is Umrah --}}
                <h2 class="font-heading italic font-bold text-2xl md:text-2xl text-mst-gray mt-5 mb-4">1. What is <span class="text-mst">Umrah</span></h2>
                <p class="font-body text-mst-gray leading-7 text-[16px]">
                    Umrah is an Islamic pilgrimage to Makkah that can be performed throughout the year. Unlike Hajj. which
                    is compulsory once in a lifetime for eligible Muslims and takes place during specific Islamic dates,
                    Umrah is a voluntary act of worship that offers immense spiritual rewards. Every year, millions of
                    Muslims travel from around the world to perform Umrah &amp; seek forgiveness, peace, &amp; closeness to Allah.
                </p>

                {{-- 2. Difference table --}}
                <h2 class="font-heading italic font-bold text-2xl md:text-2xl text-mst-gray mt-5 mb-5">2. Difference between <span class="text-mst">Umrah &amp; Hajj</span></h2>
                <div class="overflow-x-auto rounded-xl border border-gray-200">
                    <table class="w-full text-center font-body text-sm text-mst-gray">
                        <thead>
                            <tr class="font-heading text-base text-white">
                                <th class="bg-gradient-to-r from-[#BA9B31] to-[#a68a2c] py-4 px-4 w-1/2">Umrah</th>
                                <th class="bg-[#282828] py-4 px-4 w-1/2">Hajj</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($comparisonRows as $row)
                                <tr class="divide-x divide-gray-200">
                                    <td class="py-3 px-4">{{ $row[0] }}</td>
                                    <td class="py-3 px-4">{{ $row[1] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- 3. Best Time --}}
                <h2 class="font-heading italic font-bold text-2xl md:text-2xl text-mst-gray mt-5 mb-4">3. Best Time to <span class="text-mst">Perform Umrah</span></h2>
                <p class="font-body text-mst-gray leading-7 mb-6 text-[16px]">
                    While Umrah is available throughout the year, choosing the right season can greatly improve your experience.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 md:divide-x divide-gray-200">
                    @foreach($bestTimes as $time)
                        <div class="flex items-start gap-3 px-0 md:px-5 first:pl-0 last:pr-0 py-3 md:py-0">
                            <img src="{{ asset('assets/images/icons/' . $time['icon']) }}" class="w-8 flex-shrink-0" alt="">
                            <div>
                                <h4 class="font-heading italic font-bold text-base text-mst-gray">{{ $time['title'] }}</h4>
                                <p class="font-body text-sm text-mst-gray mt-1 leading-snug">{{ $time['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Buttons --}}
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mt-6">
                    <a href="#" class="inline-flex items-center gap-2 rounded-full px-7 py-3 font-heading italic text-white
                            bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300">
                        Load Full Guide
                        <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4" alt="">
                    </a>
                    <a href="#" class="inline-flex items-center gap-2 rounded-full px-7 py-3 font-heading italic text-white
                            bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300">
                        View all Blogs
                        <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4" alt="">
                    </a>
                </div>
            </div>

            {{-- RIGHT: sidebar --}}
            <aside class="space-y-6">
                {{-- Search --}}
                <div class="bg-gray-50 border border-gray-200 rounded-2xl p-4">
                    <div class="flex items-center gap-3 bg-white border border-gray-200 rounded-xl px-4 py-3">
                        <input type="text" placeholder="Search travel guides"
                               class="w-full bg-transparent font-body text-sm text-mst-gray focus:outline-none">
                        <img src="{{ asset('assets/images/icons/search-icons.svg') }}" class="w-5 flex-shrink-0" alt="search">
                    </div>
                </div>

                {{-- Categories --}}
                <div class="bg-gray-50 border border-gray-200 rounded-2xl px-6 py-6">
                    <h3 class="font-heading font-bold text-xl text-mst-gray mb-5">Categories</h3>
                    <ul class="space-y-4">
                        @foreach($blogCategories as $category)
                            <li>
                                <a href="#" class="flex items-center gap-3 group">
                                    <img src="{{ asset('assets/images/icons/' . $category['icon']) }}" class="w-6 flex-shrink-0" alt="">
                                    <span class="font-heading font-bold text-mst-gray group-hover:text-mst transition">{{ $category['label'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Recent Posts --}}
                <div class="bg-gray-50 border border-gray-200 rounded-2xl px-6 py-8">
                    <h3 class="font-heading font-bold text-xl text-mst-gray mb-5">Recent Posts</h3>
                    <ul class="space-y-6">
                        @foreach($recentPosts as $post)
                            <li>
                                <a href="#" class="flex items-start gap-3 group">
                                    <img src="{{ asset('assets/images/' . $post['image']) }}" class="w-16 h-14 rounded-lg object-cover flex-shrink-0" alt="">
                                    <div>
                                        <h4 class="font-heading font-bold text-sm text-mst-gray leading-snug group-hover:text-mst transition">{{ $post['title'] }}</h4>
                                        <span class="flex items-center gap-1.5 mt-1.5 font-body text-xs text-mst-gray">
                                            <img src="{{ asset('assets/images/icons/c563.svg') }}" class="w-3.5" alt="">
                                            {{ $post['read'] }}
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Popular Tags --}}
                <div class="bg-gray-50 border border-gray-200 rounded-2xl px-6 py-8">
                    <h3 class="font-heading font-bold text-xl text-mst-gray mb-5">Popular Tags</h3>
                    <div class="flex flex-wrap gap-2.5">
                        @foreach($popularTags as $tag)
                            <a href="#" class="bg-mst rounded-full py-1.5 px-4 text-white text-sm italic font-heading
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] transition duration-300">{{ $tag }}</a>
                        @endforeach
                    </div>
                </div>

                {{-- CTA banner --}}
                <div class="relative rounded-2xl overflow-hidden">
                    <img src="{{ asset('assets/images/image_2.webp') }}" class="absolute inset-0 w-full h-full object-cover" alt="">
                    <div class="absolute inset-0 bg-black/50" aria-hidden="true"></div>
                    <div class="relative z-10 p-6 pt-24">
                        <h3 class="font-heading font-bold text-2xl text-white leading-snug">Need Help Planning&nbsp; Your Umrah?</h3>
                        <p class="font-body text-sm text-white mt-2">We provide complete Umrah packages with visa, flights, hotels and 24/7 support</p>
                        <a href="#" class="inline-flex items-center gap-2 rounded-lg px-5 py-2.5 mt-4 font-heading italic text-white
                                bg-mst hover:bg-[#74611E] transition duration-300">
                            Book Your Umrah Today
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

{{-- ===== Related Blogs ===== --}}
<section class="pt-8 pb-6">
    <div class="container mx-auto">
        <h2 class="font-heading italic font-bold text-3xl md:text-3xl text-mst-gray">Related <span class="text-mst">Blogs</span></h2>

        <div class="flex flex-wrap gap-3 mt-6">
            @foreach($blogFilters as $i => $filter)
                <a href="#" class="rounded-full py-1.5 px-5 text-sm italic font-heading transition duration-300
                        {{ $i === 0
                            ? 'bg-gradient-to-r from-[#BA9B31] to-[#74611E] text-white'
                            : 'bg-white border border-gray-300 text-mst-gray hover:border-mst hover:text-mst' }}">{{ $filter }}</a>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            @foreach($relatedBlogs as $blog)
                <article class="bg-white border border-gray-500 rounded-2xl overflow-hidden flex flex-col">
                    <img src="{{ asset('assets/images/' . $blog['image']) }}" alt="{{ $blog['title'] }}" class="w-full h-44 object-cover" loading="lazy">
                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="font-heading font-bold text-lg text-mst-gray leading-snug line-clamp-2">{{ $blog['title'] }}</h3>
                        <div class="flex items-center gap-4 mt-2.5 font-body text-xs text-mst-gray">
                            <span class="flex items-center gap-1.5">
                                <img src="{{ asset('assets/images/icons/c563.svg') }}" class="w-3.5" alt="">
                                {{ $blog['date'] }}
                            </span>
                            <span class="flex items-center gap-1.5">
                                <img src="{{ asset('assets/images/icons/c563.svg') }}" class="w-3.5" alt="">
                                {{ $blog['read'] }}
                            </span>
                        </div>
                        <p class="font-body text-sm text-mst-gray mt-3 leading-snug">{{ $blog['desc'] }}</p>
                        <a href="#" class="inline-flex items-center gap-2 mt-4 font-heading italic font-bold text-sm text-mst hover:text-[#74611E] transition">
                            Read more
                            <img src="{{ asset('assets/images/icons/gb898.svg') }}" class="w-3.5" alt="">
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- contact bar --}}
<section class="contactBar pb-5 pt-14 bg-white">
    <div class="container mx-auto">
        <div class="bg-gray-50 rounded-lg p-6 md:p-8 flex flex-col lg:flex-row items-center justify-between gap-6
        w-11/12 mx-auto">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/support2.svg') }}"
                         class="w-full h-full object-contain"
                         alt="Support">
                </div>
                <div>
                    <h3 class="font-heading italic font-bold text-xl md:text-2xl text-mst-gray">Didn't find your
                        <span class="text-mst">Answer?</span></h3>
                    <p class="font-body text-gray-700 text-sm md:text-sm mt-1">
                        Our Travel specialists are available 24/7 for you.</p>
                </div>
            </div>
            <div class="flex flex-wrap items-center gap-3 md:gap-4 justify-center">
                <!-- Email Button -->
                <a href="#" class="flex items-center gap-2.5 px-6 py-3 bg-white border border-[#EAEAEA]
                hover:border-gray-300 hover:bg-gray-50 transition-all duration-200 rounded-full text-mst-gray
                font-heading font-semibold text-md italic">
                    <img src="{{ asset('assets/images/icons/email1.svg') }}" class="w-5 h-5 object-contain" alt="email">
                    <span>Email Us</span> </a>
                <!-- Call Button -->
                <a href="#" class="flex items-center gap-2.5 px-6 py-3 bg-[#EB001B] hover:bg-red-700 transition-all
                duration-200 rounded-full text-white font-heading font-semibold text-md italic">
                    <img src="{{ asset('assets/images/icons/call.svg') }}" class="w-5 h-5 object-contain" alt="call">
                    <span>Call Now</span> </a>
                <!-- WhatsApp Button -->
                <a href="#" target="_blank" class="flex items-center gap-2.5 px-6 py-3
                 bg-gradient-to-r from-[#2D9D3E] to-[#1E5E28] hover:bg-[#2D9D3E]
                 transition-all duration-200 rounded-full text-white font-heading font-semibold text-md italic">
                    <img src="{{ asset('assets/images/icons/whatsapp1.svg') }}" class="w-5 h-5 object-contain" alt="whatsapp">
                    <span>WhatsApp</span> </a>
            </div>
        </div>
    </div>
</section>
