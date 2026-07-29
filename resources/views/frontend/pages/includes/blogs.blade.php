{{-- explore --}}
<section class="blog-explore py-12">
    <div class="container mx-auto px-4 lg:px-0">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 items-center">
            <!-- Left Text Column -->
            <div class="lg:col-span-6">
                <h2 class="font-heading italic font-bold text-3xl md:text-[32px] text-mst-gray leading-11 mb-4">
                    Explore Dubai Travel Guides, <span class="text-mst">Umrah Tips & Visa Information</span>
                </h2>
                <p class="text-gray-700 text-[14px] leading-relaxed">
                    Discover expert travel resources covering Dubai attractions, desert safari experiences, Umrah
                    planning, UAE visa requirements yacht charter ideas, Abu Dhabi tours, holiday packages, and
                    practical travel tips. Whether you're visiting Dubai for the first time or planning your next
                    journey, our guides help you make informed travel decisions and get the most from your trip.
                </p>
            </div>
            <!-- Right Features Grid Column -->
            <div class="lg:col-span-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-0 md:divide-x md:divide-gray-200">
                    <!-- Feature 1: Experience -->
                    <div class="flex flex-col items-center text-center px-2 py-4">
                        <div class="w-12 h-12 flex items-center justify-center mb-3">
                            <img src="{{ asset('assets/images/icons/17years.svg') }}" alt="17+ Years Experience" class="w-full h-full object-contain">
                        </div>
                        <h3 class="font-heading italic font-bold text-mst-gray text-sm md:text-[15px] leading-tight">
                            17 + Years<br>Experience
                        </h3>
                    </div>
                    <!-- Feature 2: Travelers Served -->
                    <div class="flex flex-col items-center text-center px-2 py-4">
                        <div class="w-12 h-12 flex items-center justify-center mb-3">
                            <img src="{{ asset('assets/images/icons/17years.svg') }}" alt="50,000+ Travelers Served" class="w-full h-full object-contain">
                        </div>
                        <h3 class="font-heading italic font-bold text-mst-gray text-sm md:text-[15px] leading-tight">
                            50,000+<br>Travelers Served
                        </h3>
                    </div>
                    <!-- Feature 3: Customer Support -->
                    <div class="flex flex-col items-center text-center px-2 py-4">
                        <div class="w-12 h-12 flex items-center justify-center mb-3">
                            <img src="{{ asset('assets/images/icons/support2.svg') }}" alt="24/7 Customer Support" class="w-full h-full object-contain">
                        </div>
                        <h3 class="font-heading italic font-bold text-mst-gray text-sm md:text-[15px] leading-tight">
                            24/7 Customer<br>Support
                        </h3>
                    </div>
                    <!-- Feature 4: Best Price Guaranteed -->
                    <div class="flex flex-col items-center text-center px-2 py-4">
                        <div class="w-12 h-12 flex items-center justify-center mb-3">
                            <img src="{{ asset('assets/images/icons/dbadge.svg') }}" alt="Best Price Guaranteed" class="w-full h-full object-contain">
                        </div>
                        <h3 class="font-heading italic font-bold text-mst-gray text-sm md:text-[15px] leading-tight">
                            Best Price<br>Guaranted
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- blogs categories --}}
<section class="blog-categories pb-16">
    <div class="container mx-auto px-4 lg:px-0">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10">
            <div>
                <h2 class="font-heading italic font-semibold text-2xl leading-tight mb-2">
                    <span class="text-mst-gray">Big</span> <span class="text-mst">Categories</span>
                </h2>
                <p class="font-body text-gray-700 text-sm md:text-base leading-relaxed">
                    Explore a wide range of carefully curated categories, making it easy to find the perfect products
                    and services for your needs.
                </p>
            </div>
            @if($categories->count() > 8)
            <div class="flex-shrink-0">
                <button
                    type="button"
                    id="viewAllBigCategoriesBtn"
                    class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-mst
                                        to-mst-dark px-5 py-2 font-heading text-base italic text-white transition
                                        hover:from-mst-dark hover:to-mst md:text-lg"
                > <span>View all Categories</span> <img
                        src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                        class="ms-1 w-5 transition-transform duration-200"
                        width="24"
                        height="24"
                        alt=""
                    > </button>
            </div>
            @endif
        </div>
        <!-- Categories Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-5" id="bigCategoriesGrid">
            @foreach($categories as $index => $category)
                @php
                    $categoryTitleWords = explode(' ', $category->title);
                    $categoryTitleLastWord = array_pop($categoryTitleWords);
                    $categoryTitleFirstPart = implode(' ', $categoryTitleWords);
                @endphp
                <a href="{{ url('/blogs') }}?category={{ $category->friendly_url }}" class="group flex flex-col items-center text-center p-5 bg-white border border-gray-200 rounded-2xl transition-all duration-300 hover:shadow-md hover:border-mst shadow-[0_8px_30px_rgb(0,0,0,0.015)] cursor-pointer {{ $index >= 8 ? 'extra-big-category hidden' : '' }}">
                    <div class="w-16 h-16 flex items-center justify-center mb-4 transition-transform duration-300 group-hover:scale-110">
                        <img src="{{ filled($category->image) ? asset('assets/images/blog-category/'.$category->image) : asset('assets/images/icons/dubai.svg') }}" alt="{{ $category->title }}" class="w-full h-full object-contain">
                    </div>
                    <h4 class="font-heading italic font-bold text-[18px] leading-tight">
                        @if($categoryTitleFirstPart)
                            <span class="text-mst-gray">{{ $categoryTitleFirstPart }}</span><br>
                        @endif
                        <span class="text-mst">{{ $categoryTitleLastWord }}</span>
                    </h4>
                    <span class="font-body text-gray-500 text-xs md:text-sm mt-3">{{ $category->posts_count }} Posts</span>
                </a>
            @endforeach
        </div>
    </div>
</section>
{{-- blogs listing --}}
<section class="blog-listing">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-[9fr_3fr] gap-6">
            <div class="blogRight min-w-0">
                @if($featuredBlog)
                <div class="cover-blog bg-gray-50 border border-gray-200 p-5 rounded-2xl flex flex-col md:flex-row gap-6">
                    <!-- Left: Image with Badge -->
                    <div class="relative w-full md:w-[45%] h-[260px] md:h-[300px] flex-shrink-0 rounded-2xl overflow-hidden">
                        <img src="{{ $featuredBlog->imageUrl() }}" alt="{{ $featuredBlog->title }}" class="w-full h-full object-cover">
                        <span class="absolute top-4 left-4 bg-[#BA9B31] text-white text-xs md:text-sm font-heading italic font-bold px-4 py-1.5 rounded-full shadow-sm">
                                        Featured
                                    </span>
                    </div>
                    <!-- Right: Content -->
                    <div class="flex flex-col justify-center flex-1 py-2">
                    <span class="text-[#F76401] font-heading font-bold tracking-wider text-xl mb-2 uppercase">
                        {{ $featuredBlog->blogCategories->first()->title ?? '' }}
                    </span>
                        <h2 class="font-heading font-bold text-3xl text-mst-gray leading-tight mb-3 hover:text-mst
                        transition-colors duration-200">
                            <a href="{{ $featuredBlog->frontendUrl() }}">{{ $featuredBlog->title }}</a>
                        </h2>
                        <!-- Meta Details -->
                        <div class="flex flex-wrap items-center gap-4 text-gray-700 text-xs md:text-sm mb-4">
                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                </svg>
                                <span>{{ $featuredBlog->created_at?->format('M d, Y') }}</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"></path>
                                </svg>
                                <span>{{ $featuredBlog->creator->first_name ?? 'Saifco Team' }}</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                </svg>
                                <span>{{ $featuredBlog->readingTimeMinutes() }} min read</span>
                            </div>
                        </div>
                        <p class="font-body text-gray-700 text-sm leading-relaxed mb-5">
                            {{ $featuredBlog->excerpt(180) }}
                        </p>
                        <div>
                            <a href="{{ $featuredBlog->frontendUrl() }}" class="inline-flex items-center gap-1.5 font-heading italic font-bold
                            text-mst text-xl transition-colors duration-200"> <span>Read more</span>
                                <svg class="w-5 h-5 text-mst mt-1" fill="none" stroke="currentColor" stroke-width="2.5"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                {{-- all categories --}}
                <div class="cat-list flex items-center gap-3 overflow-x-auto whitespace-nowrap py-6 cursor-grab
                select-none">
                    <a href="{{ url('/blogs') }}" class="px-6 py-2.5 rounded-full font-heading italic font-bold text-md select-none transition-all duration-200 {{ !$activeCategory ? 'bg-[#BA9B31] text-white' : 'bg-white border border-gray-200 text-mst-gray hover:border-mst hover:text-mst' }}">All</a>
                    @foreach($categories as $category)
                        <a href="{{ url('/blogs') }}?category={{ $category->friendly_url }}" class="px-6 py-2.5 rounded-full font-heading italic font-bold text-md select-none transition-all duration-200 {{ $activeCategory && $activeCategory->id === $category->id ? 'bg-[#BA9B31] text-white' : 'bg-white border border-gray-200 text-mst-gray hover:border-mst hover:text-mst' }}">{{ $category->title }}</a>
                    @endforeach
                </div>
                <div class="blogAllListing">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="blogCardsGrid">
                        @include('frontend.pages.includes.partials.blog-card', ['blogs' => $blogs])
                    </div>
                    @if($hasMoreBlogs)
                        <!-- Load More Button -->
                        <div class="flex justify-center mt-10">
                            <button
                                type="button"
                                id="loadMoreBlogsBtn"
                                data-offset="{{ $blogsOffset }}"
                                data-category="{{ $activeCategory->friendly_url ?? '' }}"
                                class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-mst
                                                                        to-mst-dark px-7 py-3 font-heading text-base italic text-white transition hover:from-mst-dark
                                                                         hover:to-mst md:text-lg"
                            > Load More Articles <img
                                    src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                    class="ms-1 w-6"
                                    width="24"
                                    height="24"
                                    alt=""
                                > </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="blogLeft space-y-6">
                <!-- Search Blogs -->
                <div class="blogsearch bg-gray-50 border border-gray-200 p-6 rounded-2xl">
                    <h3 class="font-heading font-bold text-lg text-mst-gray mb-4">Search Blogs</h3>
                    <div class="relative">
                        <input type="text" placeholder="Search for blogs, guide" class="font-heading rounded-full
                        border border-gray-200 bg-white py-3 pl-5 pr-12 w-full text-sm outline-none focus:border-mst focus:ring-1 focus:ring-mst transition-colors">
                        <button class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-mst transition-colors">
                            <img src="{{ asset('assets/images/icons/search-icons.svg') }}" alt="UAE Tours" class="w-5 h-5 object-contain">
                        </button>
                    </div>
                </div>
                <!-- Categories -->
                <div class="blogSideCategories bg-gray-50 border border-gray-200 p-6 rounded-2xl">
                    <h3 class="font-heading font-bold text-lg text-mst-gray mb-4">Categories</h3>
                    <div class="flex flex-col" id="sideCategoriesList">
                        @foreach($categories as $index => $category)
                            <a href="{{ url('/blogs') }}?category={{ $category->friendly_url }}" class="flex items-center justify-between py-3 transition-colors duration-200 {{ $index >= 8 ? 'extra-category hidden' : '' }} {{ $activeCategory && $activeCategory->id === $category->id ? 'text-mst' : 'hover:text-mst' }}">
                                <div class="flex items-center gap-3">
                                    <img src="{{ filled($category->image) ? asset('assets/images/blog-category/'.$category->image) : asset('assets/images/icons/dubai.svg') }}" alt="{{ $category->title }}" class="w-6 h-6 object-contain">
                                    <span class="font-heading font-bold text-[15px] text-mst-gray hover:text-mst transition-colors">{{ $category->title }}</span>
                                </div>
                                <span class="text-sm font-semibold text-gray-500 border border-gray-200 rounded px-2 py-1 w-8 text-center">{{ $category->posts_count }}</span>
                            </a>
                        @endforeach
                    </div>
                    @if($categories->count() > 8)
                    <div class="mt-4">
                        <button type="button" id="viewAllCategoriesBtn" class="inline-flex items-center gap-1.5 font-heading italic font-bold
                        text-mst text-sm transition-colors duration-200"> <span>View All Categories</span>
                            <svg class="w-4 h-4 text-mst transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2.5"
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                            </svg>
                        </button>
                    </div>
                    @endif
                </div>
                <!-- Popular Guides -->
                <div class="popular-guide bg-gray-50 border border-gray-200 p-6 rounded-2xl">
                    <h3 class="font-heading font-bold text-lg text-mst-gray mb-4">Popular Guides</h3>
                    <div class="flex flex-col">
                        @foreach($popularGuides as $guide)
                            <a href="{{ $guide->frontendUrl() }}" class="flex gap-3 py-2 group">
                                <img src="{{ $guide->imageUrl() }}" alt="{{ $guide->title }}" class="w-14 h-14 rounded-lg object-cover flex-shrink-0">
                                <div class="flex-1 flex flex-col justify-center">
                                    <h4 class="font-heading font-bold text-sm text-mst-gray leading-tight">
                                        {{ $guide->title }}
                                    </h4>
                                    <div class="flex items-center gap-1 text-xs text-gray-700">
                                        <svg class="w-3 h-3 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                        </svg>
                                        <span>{{ $guide->readingTimeMinutes() }} mins read</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="relatedServices py-12 bg-white">
    <div class="container mx-auto">
        <div>
            <h2 class="font-heading italic font-bold text-3xl text-mst-gray">Related
                <span class="text-mst">Services</span></h2>
            <p class="font-body text-gray-700 mt-2">Quick access to what travelers explore most—making it easier to find
                                                    the right experience without the search</p>
        </div>
        <ul class="flex flex-wrap items-center justify-center gap-3 font-body text-sm bg-[#FAF7F2] mt-6 p-5 rounded-lg border border-[#BA9B31]/40">
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Yacht Rental Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Dune Bashing Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Quad Biking Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                VR5 Tasheel Locations
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Desert Safari in Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Ski Dubai Tickets Offer
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Legoland Dubai Tickets
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                The Frame Dubai Tickets
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Umrah By Bus
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Umrah Services Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Theme Park Tickets
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Safari Tour Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Speed Boat Tour
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Yacht for Party
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Online Travel Agency
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Dinner Cruise Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Abu Dhabi City Tour
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Abu Dhabi Tour Packages
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Umrah By Air
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                                    hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Deep Sea Fishing
            </li>
        </ul>
    </div>
</section>
<section class="contactBar py-8 bg-gray-50 ">
    <div class="container">
        <div class="py-4 flex flex-col lg:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('assets/images/icons/support2.svg') }}"
                         class="w-full h-full object-contain"
                         alt="Support">
                </div>
                <div>
                    <h3 class="font-heading italic font-bold text-3xl text-mst-gray">Didn’t find your
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
<style>
    .cat-list::-webkit-scrollbar {
        display: none;
    }
    .cat-list {
        -ms-overflow-style: none;
        scrollbar-width:    none;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slider = document.querySelector('.cat-list');
        if (!slider) return;
        let isDown = false;
        let startX;
        let scrollLeft;
        let isDragging = false;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            isDragging = false;
            slider.classList.remove('cursor-grab');
            slider.classList.add('cursor-grabbing');
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });

        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.classList.remove('cursor-grabbing');
            slider.classList.add('cursor-grab');
        });

        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('cursor-grabbing');
            slider.classList.add('cursor-grab');
        });

        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            isDragging = true;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 2;
            slider.scrollLeft = scrollLeft - walk;
        });

        // Scroll horizontally using mouse wheel
        slider.addEventListener('wheel', (e) => {
            e.preventDefault();
            slider.scrollLeft += e.deltaY;
        });

        // Prevent accidental link clicks when dragging
        slider.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', (e) => {
                if (isDragging) {
                    e.preventDefault();
                }
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('loadMoreBlogsBtn');
        if (!btn) return;
        const grid = document.getElementById('blogCardsGrid');

        btn.addEventListener('click', async (e) => {
            e.preventDefault();
            const offset = btn.dataset.offset;
            const category = btn.dataset.category || '';
            btn.disabled = true;

            try {
                const url = `{{ url('/blogs/load-more') }}?offset=${encodeURIComponent(offset)}&category=${encodeURIComponent(category)}`;
                const res = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                const data = await res.json();

                grid.insertAdjacentHTML('beforeend', data.html);
                btn.dataset.offset = data.offset;

                if (!data.hasMore) {
                    btn.closest('div').style.display = 'none';
                }
            } catch (err) {
                console.error('Failed to load more blogs', err);
            } finally {
                btn.disabled = false;
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const viewAllBtn = document.getElementById('viewAllCategoriesBtn');
        if (!viewAllBtn) return;
        const list = document.getElementById('sideCategoriesList');
        const label = viewAllBtn.querySelector('span');
        const icon = viewAllBtn.querySelector('svg');
        let expanded = false;

        viewAllBtn.addEventListener('click', () => {
            expanded = !expanded;
            list.querySelectorAll('.extra-category').forEach(el => {
                el.classList.toggle('hidden', !expanded);
            });
            label.textContent = expanded ? 'View Less Categories' : 'View All Categories';
            icon.style.transform = expanded ? 'rotate(90deg)' : '';
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const viewAllBigBtn = document.getElementById('viewAllBigCategoriesBtn');
        if (!viewAllBigBtn) return;
        const grid = document.getElementById('bigCategoriesGrid');
        const label = viewAllBigBtn.querySelector('span');
        const icon = viewAllBigBtn.querySelector('img');
        let expanded = false;

        viewAllBigBtn.addEventListener('click', () => {
            expanded = !expanded;
            grid.querySelectorAll('.extra-big-category').forEach(el => {
                el.classList.toggle('hidden', !expanded);
            });
            label.textContent = expanded ? 'View Less Categories' : 'View all Categories';
            icon.style.transform = expanded ? 'rotate(90deg)' : '';
        });
    });
</script>
