<footer class="pt-12 px-3 bg-gray-900-- border-t-3 border-t-std relative overflow-hidden">
    <div class="absolute inset-0 scale-105 bg-cover bg-center bg-no-repeat blur-[3px]"
         style="background-image: url('{{ asset('assets/images/background/bg2.webp') }}')" aria-hidden="true"></div>
    <div class="absolute inset-0 bg-gray-950/90" aria-hidden="true"></div>
    <div class="container mx-auto relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr_1fr_1fr_1fr] gap-5">
            <div class="">
                <a href="{{url('/')}}" class="text-2xl font-bold text-gray-300 py-3">
                    <img src="{{asset('assets/images/logo.webp')}}" alt="logo" title="brand logo"> </a>
                <p class="text-sm my-3 text-gray-300 leading-6">
                    Standard Patches Inc. Standard Patches offer premium quality yet cost-effective custom patches
                    design in the USA.
                </p>
                <p class="font-semibold text-md text-white">Follow Us</p>
                <ul class="flex gap-2 mt-1">
                    <li>
                        <a href=""> <img src="{{asset('assets/images/icons/fb.svg')}}"
                                         class="w-8"
                                         alt="brand_logo"
                                         title="standard patches"> </a>
                    </li>
                    <li>
                        <a href=""> <img src="{{asset('assets/images/icons/yt.svg')}}"
                                         class="w-8"
                                         alt="brand_logo"
                                         title="standard patches"> </a>
                    </li>
                </ul>
                <div class="std_timing flex mt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                        <path d="M582-298 440-440v-200h80v167l118 118-56 57ZM440-720v-80h80v80h-80Zm280 280v-80h80v80h-80ZM440-160v-80h80v80h-80ZM160-440v-80h80v80h-80ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/>
                    </svg>
                    <span class="ms-1 text-white text-sm mt-0.5">Hours: 10:00 - 18:00, Mon - Sat</span>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="heading text-white text-lg font-semibold mb-3">Quick Links</div>
                <ul class="flex flex-col gap-1 text-gray-300 text-sm capitalize space-y-[5px]">
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="{{route('about-us')}}">about us</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Privacy Policy</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Terms & Conditions</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Return & Refund Policy</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Shipping Policy</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Contact Us</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Blogs</a></li>
                </ul>
            </div>
            <div class="hidden md:block">
                <div class="heading text-white text-lg font-semibold mb-3">Products</div>
                <ul class="flex flex-col gap-1 text-gray-300 text-sm capitalize space-y-[5px]">
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Embroidered Patches</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Leather Patches</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Sublimated Patches</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Keychains Patches</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Printed T-Shirts</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Neckerchiefs</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Chenille Patches</a></li>
                </ul>
            </div>
            <div class="hidden md:block">
                <div class="heading text-white text-lg font-semibold mb-3">Style Types</div>
                <ul class="flex flex-col gap-1 text-gray-300 text-sm capitalize space-y-[5px]">
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Blank Patches</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Iron On Patches</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Morale Patches</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Police Patches</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Soccer Patches</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Lanyards Patches</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Mouse Pads Patches</a></li>
                </ul>
            </div>
            <div class="hidden md:block">
                <div class="heading text-white text-lg font-semibold mb-3">Popular Patches</div>
                <ul class="flex flex-col gap-1 text-gray-300 text-sm capitalize space-y-[5px]">
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Fire Dept. Patches</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Military Patches</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Biker Patches</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Sports Patches</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Bumperstickers</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Printed Labels</a></li>
                    <li class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                             fill="#FFFFFF">
                            <path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/>
                        </svg>
                        <a href="">Custom Face Masks</a></li>
                </ul>
            </div>
            @include('frontend.components.footer_menu')
        </div>
    </div>
    <div class="container flex items-center relative z-10 justify-content-center mx-auto border-b-1 md:border-y-1
    border-y-gray-700 md:mt-10 py-10">
        <div class="md:w-12/12 mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="">
                    <div class="flex items-center justify-center gap-3">
                        <div class="text-white text-sm font-medium text-center space-y-[5px]">
                            <img src="{{asset('assets/images/icons/us.png')}}" class="mx-auto" alt="logo" title="usa">
                            <div class="text-sm">22414 NE Townsend Way, Fairview, OR 97024.</div>
                            <div class="text-sm">info@standardpatches.com</div>
                            <div class="text-md text-lg">+1 971 3836 579</div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="flex items-center justify-center gap-3">
                        <div class="text-white text-sm font-medium text-center space-y-[5px]">
                            <img src="{{asset('assets/images/icons/ca.png')}}" class="mx-auto" alt="logo" title="canada">
                            <div class="text-sm">520 Florencedale Crescent Kitchener ON N2R 0N3.</div>
                            <div class="text-sm">info@standardpatches.com</div>
                            <div class="text-white text-md text-lg">+1 807 6999 909</div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="flex items-center justify-center gap-3">
                        <div class="text-white text-sm font-medium text-center space-y-[5px]">
                            <img src="{{asset('assets/images/icons/pk.png')}}" class="mx-auto" alt="logo" title="pakistan">
                            <div class="text-sm">52 PLOT Industrial Area, Karachi - Pakistan.</div>
                            <div class="text-sm">info@standardpatches.com</div>
                            <div class="text-white text-md text-lg">+92 343 2014 556</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center text-sm py-5 relative z-10">
        <span class="text-gray-300">Copyright &copy; 2026. All Right Reserved by Standard Patches - Designed & Developed by</span>
        <span class="text-white"> <a href="https://websigntist.com/"
                                                            target="_blank">WebSigntist</a></span>
    </div>
</footer>
