<nav class="z-20 top-0 start-0 flex items-center justify-end">
    <div class="flex flex-wrap items-center justify-end py-4">
        <button data-collapse-toggle="navbar-multi-level-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary" aria-controls="navbar-multi-level-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level-dropdown">
            <ul class="flex flex-col text-sm font-medium p-4 md:p-0 mt-4 md:space-x-4 rtl:space-x-reverse md:flex-row md:mt-0">
                <li class="block py-2 px-2 rounded-full text-white bg-gradient-to-r from-[#BA9B31] to-[#74611E] transition duration-300">
                    <a href="#" class="py-2 px-2" aria-current="page">Home</a>
                </li>

                {{-- single dropdown --}}
                <li class="nav-dropdown relative block py-2 px-2 text-mst-gray hover:text-black transition duration-300">
                    <button type="button" id="umrah-nav-trigger" class="nav-dropdown-trigger flex items-center justify-between w-full py-2 px-2 font-medium text-heading md:w-auto md:p-0">
                        UAE Tour
                        <svg class="w-4 h-4 ms-1.5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="umrah-nav-menu" class="nav-dropdown-panel absolute start-0 top-full z-50 hidden min-w-54
                    pt-1 border-y-2 border-y-gray-500 rounded-md" role="menu" aria-labelledby="umrah-nav-trigger">
                        <ul class="p-2 text-sm text-body bg-white font-medium">
                            <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                <a href="#" class="py-2 px-2">Abu Dhabi Tours</a>
                            </li>
                            <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                <a href="#" class="py-2 px-2">Camel Race Dubai</a>
                            </li>
                            <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                <a href="#" class="py-2 px-2">Dubai City Tours</a>
                            </li>
                            <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                <a href="#" class="py-2 px-2">Dubai Combo Tours</a>
                            </li>
                            <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                <a href="#" class="py-2 px-2">Desert Safari Tours</a>
                            </li>
                            <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                <a href="#" class="py-2 px-2">Dhow Cruise Tours</a>
                            </li>
                            <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                <a href="#" class="py-2 px-2">Theme Park Tickets</a>
                            </li>
                            <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                <a href="#" class="py-2 px-2">Water Activities</a>
                            </li>
                            <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                <a href="#" class="py-2 px-2">Yacht Charter</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- 2 level dropdown --}}
                <li class="nav-dropdown relative block py-2 px-2 hover:text-black">
                    <button type="button" id="uae-tours-nav-trigger" class="nav-dropdown-trigger flex items-center justify-between w-full py-2 px-2 font-medium text-heading md:w-auto md:p-0">
                        Umrah
                        <svg class="w-4 h-4 ms-1.5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="uae-tours-nav-menu" class="nav-dropdown-panel absolute start-0 top-full z-50 hidden
                    min-w-48 pt-1 border-y-2 border-y-gray-500 rounded-md" role="menu"
                         aria-labelledby="uae-tours-nav-trigger">
                        <ul class="p-2 text-sm text-body bg-white font-medium">
                            <li class="nav-submenu relative block py-0 px-2 hover:text-black">
                                <button type="button" id="uae-tours-sub-trigger" class="nav-submenu-trigger inline-flex items-center w-full p-2">
                                    Umrah From UAE
                                    <svg class="h-4 w-4 ms-auto shrink-0 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                                    </svg>
                                </button>
                                <div id="uae-tours-sub-menu" class="nav-submenu-panel absolute start-full top-0 z-20
                                ms-0 hidden min-w-64 md:ms-1 border-y-2 border-y-gray-500 rounded-md" role="menu"
                                     aria-labelledby="uae-tours-sub-trigger">
                                    <ul class="p-2 text-sm text-body font-medium bg-white">
                                        <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                            <a href="#" class="py-2 px-2">Saudi Arabia Multi Entry Visa</a>
                                        </li>
                                        <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                            <a href="#" class="py-2 px-2">Umrah Packages</a>
                                        </li>
                                        <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                            <a href="#" class="py-2 px-2">Umrah by Bus</a>
                                        </li>
                                        <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                            <a href="#" class="py-2 px-2">Umrah By Air</a>
                                        </li>
                                        <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                            <a href="#" class="py-2 px-2">Umrah Visa</a>
                                        </li>
                                        <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                            <a href="#" class="py-2 px-2">Umrah for Single Ladies</a>
                                        </li>
                                        <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                            <a href="#" class="py-2 px-2">Umrah Packages</a>
                                        </li>
                                        <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                            <a href="#" class="py-2 px-2">Umrah Packages Sharjah</a>
                                        </li>
                                        <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                            <a href="#" class="py-2 px-2">Umrah Packages Abu Dhabi</a>
                                        </li>
                                        <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                            <a href="#" class="py-2 px-2">Umrah Vaccination</a>
                                        </li>
                                        <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                            <a href="#" class="py-2 px-2">VFS Tasheel Location – UAE</a>
                                        </li>
                                        <li class="block py-2 px-2 text-mst-gray hover:text-black transition-300 ease-in-out">
                                            <a href="#" class="py-2 px-2">How to Perform Umrah Steps</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-submenu relative block py-0 px-2 hover:text-black">
                                <button type="button" id="uae-tours-sub-trigger" class="nav-submenu-trigger inline-flex items-center w-full p-2">
                                    Umrah From UK
                                    <svg class="h-4 w-4 ms-auto shrink-0 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                                    </svg>
                                </button>
                                <div id="uae-tours-sub-menu" class="nav-submenu-panel absolute start-full top-0 z-20
                                ms-0 hidden min-w-60 shadow-lg md:ms-1" role="menu"
                                     aria-labelledby="uae-tours-sub-trigger">
                                    <ul class="p-2 text-sm text-body font-medium bg-white">
                                        <li class="block py-2 px-2 text-mst-gray hover:text-black transition duration-300">
                                            <a href="#" class="py-2 px-2">Umrah Packages London</a>
                                        </li>
                                        <li class="block py-2 px-2 text-mst-gray hover:text-black transition duration-300">
                                            <a href="#" class="py-2 px-2">Umrah Visa UK</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- parent menu --}}
                <li class="block py-2 px-2 hover:rounded-full hover:text-white hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] transition duration-300">
                    <a href="#" class="py-2 px-2">Holiday Packages</a>
                </li>
                <li class="block py-2 px-2 hover:rounded-full hover:text-white hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] transition duration-300">
                    <a href="#" class="py-2 px-2">Visa</a>
                </li>
                <li class="block py-2 px-2 hover:rounded-full hover:text-white hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] transition duration-300">
                    <a href="#" class="py-2 px-2">Blogs</a>
                </li>
                <li class="block py-2 px-2 hover:rounded-full hover:text-white hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] transition duration-300">
                    <a href="#" class="py-2 px-2">FAQs</a>
                </li>
                <li class="block py-2 px-2 hover:rounded-full hover:text-white hover:bg-gradient-to-r hover:from-[#BA9B31] hover:to-[#74611E] transition duration-300">
                    <a href="#" class="py-2 px-2">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
