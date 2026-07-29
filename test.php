<ul class="site-navbar__list flex w-full flex-col gap-0.5 p-0 text-sm font-medium md:flex-row md:items-center md:justify-end md:gap-1 lg:gap-2">
    <li class="block rounded-full text-white bg-gradient-to-r from-[#BA9B31] to-[#74611E] transition duration-300">
        <a href="{{route('/')}}" class="block py-2.5 px-4 md:py-2 md:px-3" aria-current="page">Home</a>
    </li>
    <li class="relative group nav-dropdown text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <button type="button" class="nav-dropdown-trigger flex items-center justify-between w-full py-2.5 px-4 md:py-2 md:px-3 font-medium focus:outline-none">
            <span>Dropdown</span>
            <svg class="w-4 h-4 ms-1.5 transition-transform duration-200 group-hover:rotate-180 group-[.is-open]:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7"/>
            </svg>
        </button>
        <!-- Dropdown 1 Level 1-->
        <div class="nav-dropdown-menu hidden group-hover:block group-[.is-open]:block w-full md:w-52 bg-white rounded-xl p-2 shadow-xl border border-gray-100 mt-1 md:absolute md:top-full md:left-0 md:z-50 text-mst-gray">
            <ul class="flex flex-col gap-1 text-sm font-medium">
                <li>
                    <a href="{{route('page.default','all-tour-categories')}}" class="block px-3 py-2 rounded-lg hover:bg-amber-50 hover:text-mst transition duration-200">
                        Dashboard
                    </a>
                </li>
                <!-- Level 2 Dropdown -->
                <li class="relative group/sub nav-submenu">
                    <button type="button" class="nav-submenu-trigger flex items-center justify-between w-full px-3 py-2 rounded-lg hover:bg-amber-50 hover:text-mst transition duration-200 focus:outline-none">
                        <span>Dropdown</span>
                        <svg class="w-4 h-4 ms-auto transition-transform duration-200 group-hover/sub:rotate-90 group-[.is-open]/sub:rotate-90 md:group-hover/sub:rotate-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7"/>
                        </svg>
                    </button>
                    <!-- Level 2 Sub-dropdown menu -->
                    <div class="nav-submenu-menu hidden group-hover/sub:block group-[.is-open]/sub:block w-full md:w-48 bg-white rounded-xl p-2 shadow-xl border border-gray-100 mt-1 md:mt-0 md:absolute md:top-0 md:left-full md:z-50 md:ml-1 text-mst-gray">
                        <ul class="flex flex-col gap-1 text-sm font-medium">
                            <li>
                                <a href="{{route('page.default','all-tour-categories')}}" class="block px-3 py-2 rounded-lg hover:bg-amber-50 hover:text-mst transition duration-200">
                                    Overview
                                </a>
                            </li>
                            <li>
                                <a href="{{route('page.default','all-tour-categories')}}" class="block px-3 py-2 rounded-lg hover:bg-amber-50 hover:text-mst transition duration-200">
                                    My downloads
                                </a>
                            </li>
                            <li>
                                <a href="{{route('page.default','all-tour-categories')}}" class="block px-3 py-2 rounded-lg hover:bg-amber-50 hover:text-mst transition duration-200">
                                    Billing
                                </a>
                            </li>
                            <li>
                                <a href="{{route('page.default','all-tour-categories')}}" class="block px-3 py-2 rounded-lg hover:bg-amber-50 hover:text-mst transition duration-200">
                                    Rewards
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{route('page.default','all-tour-categories')}}" class="block px-3 py-2 rounded-lg hover:bg-amber-50 hover:text-mst transition duration-200">
                        Earnings
                    </a>
                </li>
                <li>
                    <a href="{{route('page.default','all-tour-categories')}}" class="block px-3 py-2 rounded-lg hover:bg-amber-50 hover:text-mst transition duration-200">
                        Sign out
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="block text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <a href="{{route('page.default','all-tour-categories')}}" class="block py-2.5 px-4 md:py-2 md:px-3">Holiday Package</a>
    </li>
    <!-- Dropdown 2 -->
    <li class="relative group nav-dropdown text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <button type="button" class="nav-dropdown-trigger flex items-center justify-between w-full py-2.5 px-4 md:py-2 md:px-3 font-medium focus:outline-none">
            <span>Visa</span>
            <svg class="w-4 h-4 ms-1.5 transition-transform duration-200 group-hover:rotate-180 group-[.is-open]:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7"/>
            </svg>
        </button>
        <!-- Level 1-->
        <div class="nav-dropdown-menu hidden group-hover:block group-[.is-open]:block w-full md:w-52 bg-white rounded-xl p-2 shadow-xl border border-gray-100 mt-1 md:absolute md:top-full md:left-0 md:z-50 text-mst-gray">
            <ul class="flex flex-col gap-1 text-sm font-medium">
                <li>
                    <a href="{{route('page.default','all-tour-categories')}}" class="block px-3 py-2 rounded-lg hover:bg-amber-50 hover:text-mst transition duration-200">
                        UAE Visa </a>
                </li>
                <li>
                    <a href="{{route('page.default','all-tour-categories')}}" class="block px-3 py-2 rounded-lg hover:bg-amber-50 hover:text-mst transition duration-200">
                        Saudi Arabia Multi Entry Visa </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="block text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <a href="{{route('page.default','all-tour-categories')}}" class="block py-2.5 px-4 md:py-2 md:px-3">FAQs</a>
    </li>
    <li class="block text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <a href="{{route('page.default','all-tour-categories')}}" class="block py-2.5 px-4 md:py-2 md:px-3">Blogs</a>
    </li>
    <li class="block text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <a href="{{route('page.default','contact-us')}}" class="block py-2.5 px-4 md:py-2 md:px-3">Contact</a>
    </li>
</ul>


{{--<ul class="site-navbar__list flex w-full flex-col gap-0.5 p-0 text-sm font-medium md:flex-row md:items-center md:justify-end md:gap-1 lg:gap-2">
    <li class="block rounded-full text-white bg-gradient-to-r from-[#BA9B31] to-[#74611E] transition duration-300">
        <a href="{{route('/')}}" class="block py-2.5 px-4 md:py-2 md:px-3" aria-current="page">Home</a>
    </li>
    <li class="block text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <a href="{{route('page.default','all-tour-categories')}}" class="block py-2.5 px-4 md:py-2 md:px-3">UAE Tour</a>
    </li>
    <li class="block text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <a href="{{ route('page.default', 'desert-safari-tours') }}" class="block py-2.5 px-4 md:py-2 md:px-3">Desert Safari</a>
    </li>
    <li class="block text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <a href="#" class="block py-2.5 px-4 md:py-2 md:px-3">Holiday Packages</a>
    </li>
    <li class="block text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <a href="#" class="block py-2.5 px-4 md:py-2 md:px-3">Visa</a>
    </li>
    <li class="block text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <a href="#" class="block py-2.5 px-4 md:py-2 md:px-3">Blogs</a>
    </li>
    <li class="block text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <a href="#" class="block py-2.5 px-4 md:py-2 md:px-3">FAQs</a>
    </li>
    <li class="block text-mst-gray transition duration-300 hover:rounded-full hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] hover:text-white">
        <a href="{{ route('page.default', 'contact-us') }}" class="block py-2.5 px-4 md:py-2 md:px-3">Contact</a>
    </li>
</ul>--}}
