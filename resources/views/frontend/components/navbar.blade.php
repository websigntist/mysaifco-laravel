<nav class="relative z-10 w-full min-w-0 bg-transparent">
    <div class="flex flex-wrap justify-center items-center w-full">
        <button data-collapse-toggle="mega-menu-full" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-md text-body rounded-lg md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-default" aria-controls="mega-menu-full" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
            </svg>
        </button>
        <div id="mega-menu-full" class="items-center justify-between hidden absolute right-0 top-full z-40 mt-2 w-80
         max-w-full pb-8 pt-4 md:static md:mt-0 md:flex md:w-auto md:max-w-none md:order-1">
            <ul class="flex flex-col md:flex-row md:flex-nowrap md:items-center md:space-x-4
             rtl:space-x-reverse text-md capitalize">
                {{--<li class="md:relative md:z-0 md:flex md:items-center">
                    <a href="#" class="font-semibold uppercase flex items-center py-2 px-3 md:inline-flex md:py-0 md:px-0
                    md:leading-none text-white">Home</a>
                </li>--}}
                <li class="group md:static md:flex md:items-center md:hover:z-50 md:focus-within:z-50">
                    {{-- Mobile: click to toggle (Flowbite). Desktop: label only; mega opens on li hover --}}
                    <button id="mega-menu-full-dropdown-button" data-collapse-toggle="mega-menu-full-dropdown"
                            type="button" aria-expanded="false" aria-controls="mega-menu-full-dropdown"
                            class="flex items-center capitalize justify-between w-full py-2 px-3 md:hidden">
                        Patches
                        <svg class="w-4 h-4 ms-1.5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                        </svg>
                    </button>
                    <span class="hidden md:inline-flex md:items-center md:gap-1 text-md font-semibold uppercase py-2
                    px-3 md:py-0 md:px-0 md:leading-none cursor-default select-none text-white">
                        Patches
                        <svg class="w-4 h-4 ms-1.5 shrink-0 self-center" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/></svg>
                    </span>
                    <div id="mega-menu-full-dropdown" class="hidden w-full mt-1
                    md:absolute md:left-1/2 md:right-auto md:top-full md:z-[60] md:mt-0 md:w-screen md:max-w-[80vw]
                    md:-translate-x-1/2
                    md:block md:opacity-0 md:pointer-events-none md:transition-opacity md:duration-150
                    md:before:absolute md:before:-top-4 md:before:inset-x-0 md:before:h-4 md:before:bg-neutral-primary-soft md:before:content-['']
                    md:group-hover:opacity-100 md:group-hover:pointer-events-auto
                    md:group-focus-within:opacity-100 md:group-focus-within:pointer-events-auto">
                        <div class="grid w-full max-w-none grid-cols-1 text-md px-0 py-2
                        md:grid-cols-4 md:px-6 md:pb-5 md:pt-3 rounded-lg border-y-3 border-y-std bg-white">
                            <ul aria-labelledby="mega-menu-full-dropdown-button">
                                <li class="font-medium py-1">
                                    <a href="{{route('custom-embroidered-patches-maker-in-usa')}}" class="block px-3 py-1">
                                        <div class="">Custom Embroidered Patches</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Chenille Patches</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Leather Patches</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">PVC Patches</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Sublimated Patches</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Woven Patches</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Magnetic Patches</div>
                                    </a>
                                </li>
                            </ul>
                            <ul class="hidden md:block">
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Custom Adhesive Patches</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">keychains Patches</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Bullion Patches</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Blank Patches</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Stock Patches</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Custom Face Masks</div>
                                    </a>
                                </li>
                            </ul>
                            <ul class="hidden md:block">
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Custom Velcro Patches</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Hats with Patch Attached</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Direct Embroidered Hats</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Direct Embroidered Shirts</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Printed T-Shirts</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Neckerchiefs</div>
                                    </a>
                                </li>
                            </ul>
                            <ul class="hidden md:block">
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Bumperstickers</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Woven Clothing Labels</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Printed Clothing Labels</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Hang Tags</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Mouse Pads</div>
                                    </a>
                                </li>
                                <li class="font-medium py-1">
                                    <a href="#" class="block px-3 py-1">
                                        <div class="">Lanyards</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                {{--<li class="group md:relative md:z-10 md:flex md:items-center md:hover:z-40 md:focus-within:z-40">
                    <button id="styles-dropdown-button" data-collapse-toggle="styles-dropdown" type="button"
                            aria-expanded="false" aria-controls="styles-dropdown"
                            class="cursor-pointer capitalize text-md flex items-center justify-between w-full py-2 px-3 font-medium
                             border-b md:hidden md:border-0">
                        Styles
                        <svg class="w-4 h-4 ms-1.5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                        </svg>
                    </button>
                    <span class="hidden cursor-pointer md:inline-flex md:items-center md:gap-1 text-md font-semibold uppercase py-2 px-3 md:py-0 md:px-0 md:leading-none cursor-default select-none text-white">
                        Styles
                        <svg class="w-4 h-4 ms-1.5 shrink-0 self-center" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/></svg>
                    </span>
                    <div id="styles-dropdown" class="hidden w-full md:absolute md:left-0 md:top-full md:z-[55] md:w-44
                    md:mt-2 md:block md:opacity-0 md:pointer-events-none md:transition-opacity md:duration-150
                    md:before:absolute md:before:-top-2 md:before:left-0 md:before:right-0 md:before:h-2 md:before:content-['']
                    md:group-hover:opacity-100 md:group-hover:pointer-events-auto
                    md:group-focus-within:opacity-100 md:group-focus-within:pointer-events-auto text-md rounded-lg border-y-3 border-y-std bg-white">
                        <ul class="py-2 px-3"
                            aria-labelledby="styles-dropdown-button">
                            <li class="font-medium py-1">
                                <a href="#" class="block">Fire Department</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">Military Patches</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">Motorcycle Patches</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">Scout Patches</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">Soccer Patches</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">Iron On Patches</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">Morale Patches</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">Police Patches</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">Sports Patches</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="group md:relative md:z-10 md:flex md:items-center md:hover:z-40 md:focus-within:z-40">
                    <button id="locations-dropdown-button" data-collapse-toggle="locations-dropdown" type="button"
                            aria-expanded="false" aria-controls="locations-dropdown"
                            class="capitalize text-md flex items-center justify-between w-full py-2 px-3
                            font-medium border-b md:hidden md:border-0 cursor-pointer">
                        Locations
                        <svg class="w-4 h-4 ms-1.5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                        </svg>
                    </button>
                    <span class="hidden cursor-pointer md:inline-flex md:items-center md:gap-1 py-2 px-3 md:py-0 md:px-0 md:leading-none text-md font-semibold uppercase  cursor-default select-none text-white">
                                        Locations
                                        <svg class="w-4 h-4 ms-1.5 shrink-0 self-center" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/></svg>
                                    </span>
                    <div id="locations-dropdown" class="hidden w-full md:absolute md:left-0 md:top-full md:z-[55] md:w-44
                                    md:mt-2 md:block md:opacity-0 md:pointer-events-none md:transition-opacity md:duration-150
                                    md:before:absolute md:before:-top-2 md:before:left-0 md:before:right-0 md:before:h-2 md:before:content-['']
                                    md:group-hover:opacity-100 md:group-hover:pointer-events-auto
                                    md:group-focus-within:opacity-100 md:group-focus-within:pointer-events-auto
                                    text-md rounded-lg border-y-3 border-y-std bg-white">
                        <ul class="py-2 px-3"
                            aria-labelledby="locations-dropdown-button">
                            <li class="font-medium py-1">
                                <a href="#" class="block">Washington</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">New York</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">Los Angeles</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">San Francisco</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">Houstan</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">Chicago</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">San Diego</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">Portland</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">Dallas</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">California</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">Boston</a>
                            </li>
                            <li class="font-medium py-1">
                                <a href="#" class="block">Miami</a>
                            </li>
                        </ul>
                    </div>
                </li>--}}
                <li class="md:relative md:z-0 md:flex md:items-center">
                    <a href="#" class="font-semibold uppercase flex items-center py-2 px-3 md:inline-flex md:py-0 md:px-0
                    md:leading-none text-white">Patches Options</a>
                </li>
                <li class="md:relative md:z-0 md:flex md:items-center">
                    <a href="#" class="font-semibold uppercase flex items-center py-2 px-3 md:inline-flex md:py-0 md:px-0
                    md:leading-none text-white">Gallery</a>
                </li>
                <li class="md:relative md:z-0 md:flex md:items-center">
                    <a href="{{route('about-us')}}" class="font-semibold uppercase flex items-center py-2 px-3
                    md:inline-flex
                    md:py-0
                    md:px-0
                    md:leading-none text-white">About</a>
                </li>
                <li class="md:relative md:z-0 md:flex md:items-center">
                    <a href="#" class="font-semibold uppercase flex items-center py-2 px-3 md:inline-flex md:py-0 md:px-0
                    md:leading-none text-white">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- If position is absolute -->
<div class="scroll_menu mx-auto flex w-96 max-w-full items-center gap-1 rounded-full bg-white py-1 ps-3 pe-1
md:absolute md:left-1/2 md:-translate-x-1/2 mt-20 shadow-md shadow-gray-300">
    <div class="scroll_menu__track min-h-6 min-w-0 flex-1 overflow-x-auto overscroll-x-contain scroll-smooth"
         data-scroll-menu-track>
        <ul class="flex h-full min-h-6 w-max max-w-none flex-nowrap items-center gap-x-12 text-sm font-semibold
        whitespace-nowrap pe-2">
            <li class="flex shrink-0 items-center"><a href="">Embroidered</a></li>
            <li class="flex shrink-0 items-center"><a href="">Chenille</a></li>
            <li class="flex shrink-0 items-center"><a href="">Leather</a></li>
            <li class="flex shrink-0 items-center"><a href="">Printed</a></li>
            <li class="flex shrink-0 items-center"><a href="">Woven</a></li>
            <li class="flex shrink-0 items-center"><a href="">Heart</a></li>
            <li class="flex shrink-0 items-center"><a href="">Applique</a></li>
            <li class="flex shrink-0 items-center"><a href="">Brand</a></li>
            <li class="flex shrink-0 items-center"><a href="">Versity Letter</a></li>
            <li class="flex shrink-0 items-center"><a href="">Sports</a></li>
            <li class="flex shrink-0 items-center"><a href="">Rubber</a></li>
            <li class="flex shrink-0 items-center"><a href="">Iron On</a></li>
            <li class="flex shrink-0 items-center"><a href="">Military</a></li>
        </ul>
    </div>
    <button type="button"
            class="scroll_menu__next flex size-6 shrink-0 items-center justify-center rounded-full bg-std-400
            hover:bg-std-100 cursor-pointer
            text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-std-100"
            data-scroll-menu-next
            aria-label="Scroll patch types">
        <svg class="size-3 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor"
             aria-hidden="true">
            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
        </svg>
    </button>
</div>
