<ul class="site-navbar__list flex w-full flex-col gap-0.5 p-0 text-sm font-medium md:flex-row md:items-center md:justify-end md:gap-1 lg:gap-2">
    <li class="block rounded-full text-white bg-gradient-to-r from-[#BA9B31] to-[#74611E] transition duration-300">
        <a href="{{route('/')}}" class="block py-2.5 px-4 md:py-2 md:px-3" aria-current="page">Home</a>
    </li>
    <!-- Dropdown 1 start -->
    <li class="relative group nav-dropdown text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <button type="button" class="nav-dropdown-trigger flex items-center justify-between w-full py-2.5 px-4 md:py-2 md:px-3 font-medium focus:outline-none">
            <span>UAE Tours</span>
            <svg class="w-4 h-4 ms-1.5 transition-transform duration-200 group-hover:rotate-180 group-[.is-open]:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7"/>
            </svg>
        </button>
        <!-- Dropdown 1 Level 1-->
        <div class="nav-dropdown-menu hidden group-hover:block group-[.is-open]:block w-full md:w-50 bg-white
        rounded-md shadow-xl border-y-3 border-mst mt-1 md:absolute md:top-full md:left-0 md:z-50 text-mst-gray">
            <ul class="flex flex-col gap-1 text-sm font-medium space-y-2 px-2 pt-3 pb-4">
                <li>
                    <a href="{{route('page.default','#')}}" class="block px-3 hover:text-mst transition duration-200">Abu Dhabi Tours</a>
                </li>
                <li>
                    <a href="{{route('page.default','#')}}" class="block px-3 hover:text-mst transition duration-200">Camel Race Dubai</a>
                </li>
                <li>
                    <a href="{{route('page.default','#')}}" class="block px-3 hover:text-mst transition duration-200">Dubai City Tours</a>
                </li>
                <li>
                    <a href="{{route('page.default','#')}}" class="block px-3 hover:text-mst transition duration-200">Dubai Combo Tours</a>
                </li>
                <li>
                    <a href="{{route('page.default','#')}}" class="block px-3 hover:text-mst transition duration-200">Desert Safari Tours</a>
                </li>
                <li>
                    <a href="{{route('page.default','#')}}" class="block px-3 hover:text-mst transition duration-200">Dhow Cruise Tours</a>
                </li>
                <li>
                    <a href="{{route('page.default','#')}}" class="block px-3 hover:text-mst transition duration-200">Theme Park Tickets</a>
                </li>
                <li>
                    <a href="{{route('page.default','#')}}" class="block px-3 hover:text-mst transition duration-200">Water Activities</a>
                </li>
                <li>
                    <a href="{{route('page.default','#')}}" class="block px-3 hover:text-mst transition duration-200">Yacht Charter</a>
                </li>
            </ul>
        </div>
    </li>
    <!-- Dropdown 1 end -->
    <!-- Dropdown 2 start -->
    <li class="relative group nav-dropdown text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <button type="button" class="nav-dropdown-trigger flex items-center justify-between w-full py-2.5 px-4 md:py-2 md:px-3 font-medium focus:outline-none">
            <span>Umrah From UAE</span>
            <svg class="w-4 h-4 ms-1.5 transition-transform duration-200 group-hover:rotate-180 group-[.is-open]:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7"/>
            </svg>
        </button>
        <!-- Dropdown 1 Level 1-->
        <div class="nav-dropdown-menu hidden group-hover:block group-[.is-open]:block w-full md:w-60 bg-white
                rounded-md shadow-xl border-y-3 border-mst mt-1 md:absolute md:top-full md:left-0 md:z-50 text-mst-gray">
            <ul class="flex flex-col gap-1 text-sm font-medium space-y-2 px-2 pt-3 pb-4">
                <li>
                    <a href="{{route('page.default','multiple-entry')}}" class="block px-3 hover:text-mst transition duration-200">Saudi Arabia Multi Entry Visa </a>
                </li>
                <li>
                    <a href="{{route('page.default','#')}}" class="block px-3 hover:text-mst transition duration-200">Umrah Packages </a>
                </li>
                <li>
                    <a href="{{route('page.default','umrah-by-bus')}}" class="block px-3 hover:text-mst transition duration-200">umrah by bus</a>
                </li>
                <li>
                    <a href="{{route('page.default','umrah-by-air')}}" class="block px-3 hover:text-mst transition duration-200">Umrah By Air</a>
                </li>
                <li>
                    <a href="{{route('page.default','umrah-visa')}}" class="block px-3 hover:text-mst transition duration-200">Umrah visa</a>
                </li>
                <li>
                    <a href="{{route('page.default','umrah-for-single-lady')}}" class="block px-3 hover:text-mst transition duration-200">Umrah for Single Ladies</a>
                </li>
                {{--<li>
                    <a href="{{route('page.default','#')}}" class="block px-3 hover:text-mst transition duration-200">umrah packages sharjah</a>
                </li>
                <li>
                    <a href="{{route('page.default','#')}}" class="block px-3 hover:text-mst transition duration-200">umrah packages abu dhabi</a>
                </li>--}}
                <li>
                    <a href="{{route('page.default','umrah-vaccination')}}" class="block px-3 hover:text-mst transition duration-200">umrah vaccination</a>
                </li>
                <li>
                    <a href="{{route('page.default','vtf-tasheel')}}" class="block px-3 hover:text-mst transition duration-200">VFS Tasheel Location – UAE</a>
                </li>
                <li>
                    <a href="{{route('page.default','umrah-faqs')}}" class="block px-3 hover:text-mst transition duration-200">Umrah FAQs</a>
                </li>
            </ul>
        </div>
    </li>
    <!-- Dropdown 2 end -->
    <li class="block text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <a href="{{route('page.default','holiday-packages')}}" class="block py-2.5 px-4 md:py-2 md:px-3">Holiday Package</a>
    </li>
    <!-- Dropdown 3 start -->
    <li class="relative group nav-dropdown text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <button type="button" class="nav-dropdown-trigger flex items-center justify-between w-full py-2.5 px-4 md:py-2 md:px-3 font-medium focus:outline-none">
            <span>Visa</span>
            <svg class="w-4 h-4 ms-1.5 transition-transform duration-200 group-hover:rotate-180 group-[.is-open]:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7"/>
            </svg>
        </button>
        <!-- Level 1-->
        <div class="nav-dropdown-menu hidden group-hover:block group-[.is-open]:block w-full md:w-58 bg-white
                        rounded-md shadow-xl border-y-3 border-mst mt-1 md:absolute md:top-full md:left-0 md:z-50 text-mst-gray">
            <ul class="flex flex-col gap-1 text-sm font-medium">
                <li>
                    <a href="{{route('page.default','all-tour-categories')}}" class="block px-3 py-2 rounded-lg hover:text-mst transition duration-200">
                        UAE Visa </a>
                </li>
                <li>
                    <a href="{{route('page.default','all-tour-categories')}}" class="block px-3 py-2 rounded-lg hover:text-mst transition duration-200">
                        Saudi Arabia Multi Entry Visa </a>
                </li>
            </ul>
        </div>
    </li>
    <!-- Dropdown 3 end -->
    <li class="block text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <a href="{{route('page.default','faqs')}}" class="block py-2.5 px-4 md:py-2 md:px-3">FAQs</a>
    </li>
    <li class="block text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <a href="{{route('page.default','blogs')}}" class="block py-2.5 px-4 md:py-2 md:px-3">Blogs</a>
    </li>
    <li class="block text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <a href="{{route('page.default','contact-us')}}" class="block py-2.5 px-4 md:py-2 md:px-3">Contact</a>
    </li>
</ul>
