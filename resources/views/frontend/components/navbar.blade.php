<nav class="z-20 top-0 start-0 flex items-center justify-end">
    <div class="flex flex-wrap items-center justify-end p-4">
        <button data-collapse-toggle="navbar-multi-level-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary" aria-controls="navbar-multi-level-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level-dropdown">
            <ul class="flex flex-col text-sm p-4 md:p-0 mt-4 md:space-x-8 rtl:space-x-reverse md:flex-row
            md:mt-0">
                <li class="block py-2 px-4 rounded-full text-white bg-linear-[135deg,#BA9B31,#74611E]">
                    <a href="#" class="py-2 px-2" aria-current="page">Home</a>
                </li>
                {{--<li class="block py-2 px-2">
                    <button id="multiLevelDropdownButton" data-dropdown-toggle="multi-dropdown" class="flex items-center justify-between w-full py-2 px-2 rounded font-medium text-heading md:w-auto hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0">
                        UAE Tours
                        <svg class="w-4 h-4 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="multi-dropdown" class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-44">
                        <ul class="p-2 text-sm text-body font-medium" aria-labelledby="multiLevelDropdownButton">
                            <li class="block py-2 px-2">
                                <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Dashboard</a>
                            </li>
                            <li class="block py-2 px-2">
                                <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">
                                    Dropdown
                                    <svg class="h-4 w-4 ms-auto rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                                    </svg>
                                </button>
                                <div id="doubleDropdown" class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-44">
                                    <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownMultiLevelButton">
                                        <li class="block py-2 px-2">
                                            <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Overview</a>
                                        </li>
                                        <li class="block py-2 px-2">
                                            <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">My
                                                                                                                                                                downloads</a>
                                        </li>
                                        <li class="block py-2 px-2">
                                            <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Billing</a>
                                        </li>
                                        <li class="block py-2 px-2">
                                            <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Rewards</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="block py-2 px-2">
                                <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Earnings</a>
                            </li>
                            <li class="block py-2 px-2">
                                <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Sign
                                                                                                                                                    out</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="block py-2 px-2">
                    <button id="multiLevelDropdownButton" data-dropdown-toggle="multi-dropdown" class="flex items-center justify-between w-full py-2 px-2 rounded font-medium text-heading md:w-auto hover:bg-neutral-tertiary md:hover:bg-transparent md:border-0 md:hover:text-fg-brand md:p-0">
                        Umrah
                        <svg class="w-4 h-4 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="multi-dropdown" class="z-10 hidden shadow-lg w-44">
                        <ul class="p-2 text-sm text-body bg-white font-medium" aria-labelledby="multiLevelDropdownButton">
                            <li class="block py-2 px-2">
                                <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Dashboard</a>
                            </li>
                            <li class="block py-2 px-2">
                                <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Earnings</a>
                            </li>
                            <li class="block py-2 px-2">
                                <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Sign
                                                                                                                                                    out</a>
                            </li>
                        </ul>
                    </div>
                </li>--}}
                <li class="block py-2 px-2">
                    <a href="#">UAE Tours</a>
                </li>
                <li class="block py-2 px-2">
                    <a href="#">Umrah</a>
                </li>
                <li class="block py-2 px-2">
                    <a href="#">Holiday Packages</a>
                </li>
                <li class="block py-2 px-2">
                    <a href="#">Visa</a>
                </li>
                <li class="block py-2 px-2">
                    <a href="#">Blogs</a>
                </li>
                <li class="block py-2 px-2">
                    <a href="#">FAQs</a>
                </li>
                <li class="block py-2 px-2">
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
