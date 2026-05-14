<footer class="py-12 pb-8 px-3 border-t-2 border-t-mst-gray">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-6 gap-5">
            <!-- Logo & Description — 2 cols -->
            <div class="md:col-span-2">
                <a href="{{url('/')}}" class="text-2xl font-bold text-mst-gray py-3">
                    <img src="{{asset('assets/images/footer-logo.svg')}}" alt="logo" title="brand logo"> </a>
                <p class="text-sm my-3 text-mst-gray leading-6 pe-6">
                    Saifco Travel & Tourism is a leading Dubai-based travel company offering Dubai tours, desert safari,
                    yacht charters, holiday packages, Umrah services, and global visa assistance with trusted service
                    and competitive prices.
                </p>
            </div>
            <!-- Services — 1 col -->
            <div class="hidden md:block">
                <div class="text-mst-gray text-sm font-semibold mb-3">Services</div>
                <ul class="flex flex-col text-mst-gray text-sm space-y-[5px]">
                    <li><a href="#" class="hover:text-black transition-all duration-300">Dubai Tour</a></li>
                    <li><a href="#" class="hover:text-black transition-all duration-300">Umrah Packages</a></li>
                    <li><a href="#" class="hover:text-black transition-all duration-300">Holiday Packages</a></li>
                    <li><a href="#" class="hover:text-black transition-all duration-300">Global Visa Assistance</a></li>
                </ul>
            </div>
            <!-- Company — 1 col -->
            <div class="hidden md:block">
                <div class="text-mst-gray text-sm font-semibold mb-3">Company</div>
                <ul class="flex flex-col text-mst-gray text-sm space-y-[5px]">
                    <li><a href="" class="hover:text-black transition-all duration-300">Home</a></li>
                    <li><a href="" class="hover:text-black transition-all duration-300">About Us</a></li>
                    <li><a href="" class="hover:text-black transition-all duration-300">Customer Reviews</a></li>
                </ul>
            </div>
            <div class="hidden md:block md:col-span-2">
                <div class="flex gap-30 mb-6">
                    <div>
                        <div class="text-mst-gray text-sm font-semibold mb-3">Legal</div>
                        <ul class="flex flex-col text-mst-gray text-sm space-y-[5px]">
                            <li><a href="" class="hover:text-black transition-all duration-300">Privacy Policy</a></li>
                            <li><a href="" class="hover:text-black transition-all duration-300">Terms & Conditions</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="text-mst-gray text-sm font-semibold mb-3">Need Help?</div>
                        <ul class="flex flex-col text-mst-gray text-sm space-y-[5px]">
                            <li><a href="" class="hover:text-black transition-all duration-300">FAQs</a></li>
                            <li><a href="" class="hover:text-black transition-all duration-300">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <img src="{{asset('assets/images/payment-icons.png')}}" class="w-fit" alt="payment-icons">
            </div>
            @include('frontend.components.footer_menu')
        </div>
    </div>

    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-[1.6fr_1fr_1fr_1fr] gap-10">
            <div>
                <ul class="flex gap-5 mt-5 items-center">
                    <li>
                        <a href=""><img src="{{asset('assets/images/fb.svg')}}" class="w-10" alt="facebook"></a>
                    </li>
                    <li>
                        <a href=""><img src="{{asset('assets/images/insta.svg')}}" class="w-10" alt="instagram"></a>
                    </li>
                    <li>
                        <a href=""><img src="{{asset('assets/images/yt.svg')}}" class="w-10" alt="youtube"></a>
                    </li>
                    <li>
                        <a href=""><img src="{{asset('assets/images/tt.svg')}}" class="w-10" alt="tiktok"></a>
                    </li>
                    <li>
                        <a href=""><img src="{{asset('assets/images/lk.svg')}}" class="w-10" alt="linkedin"></a>
                    </li>
                </ul>
                <p class="text-xs text-body mt-3">Copyright © 2025 Mysaifco.com. All Rights Reserved.</p>
            </div>
            <!-- Email -->
            <div class="flex items-center text-xs text-body md:mt-10 gap-3">
                <img src="{{asset('assets/images/email.svg')}}" class="w-10 shrink-0" alt="email"> <span>info@mysaifco.com</span>
            </div>
            <!-- Address -->
            <div class="flex items-start text-xs text-body  md:mt-12 gap-3 -ms-10">
                <img src="{{asset('assets/images/location.svg')}}" class="w-10 shrink-0 mt-0.5" alt="address">
                <span class="mt-1">16th Street Shop # 5, Bohra Masjid <br> Road, Ayal Nasir, Deira, Dubai, UAE</span>
            </div>
            <!-- Phone -->
            <div class="flex items-start text-xs text-body md:mt-10 gap-3">
                <img src="{{asset('assets/images/phone.svg')}}" class="w-10 shrink-0 mt-1" alt="phone"> <span>
                    Office: +971 4 2733868 <br>
                    Tours: +971 50 5593840 <br>
                    Umrah: +971 55 6337710
                </span>
            </div>
        </div>
    </div>
</footer>
