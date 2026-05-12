<footer class="pt-12 px-3 border-t-2 border-t-mst-gray">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-[3fr_1fr_1fr_1fr_1fr] gap-5">
            <div>
                <a href="{{url('/')}}" class="text-2xl font-bold text-mst-gray py-3">
                    <img src="{{asset('assets/images/footer-logo.svg')}}" width="" alt="logo" title="brand logo"> </a>
                <p class="text-sm my-3 text-mst-gray leading-6 pe-6">
                    Saifco Travel & Tourism is a leading Dubai-based travel company offering Dubai tours, desert safari,
                    yacht charters, holiday packages, Umrah services, and global visa assistance with trusted service
                    and competitive prices.
                </p>
            </div>
            <div class="hidden md:block">
                <div class="text-mst-gray text-sm font-semibold mb-3">Services</div>
                <ul class="flex flex-col gap-1 text-mst-gray text-sm capitalize space-y-[5px]">
                    <li class="flex hover:text-black transition-300">
                        <a href="#">Dubai Tour</a></li>
                    <li class="flex hover:text-black transition-300">
                        <a href="#">Umrah Packages</a></li>
                    <li class="flex hover:text-black transition-300">
                        <a href="#">Holiday Packages</a></li>
                    <li class="flex hover:text-black transition-300">
                        <a href="#">Global Visa Assistance</a></li>
                </ul>
            </div>
            <div class="hidden md:block">
                <div class="heading text-mst-gray text-sm font-semibold mb-3">Company</div>
                <ul class="flex flex-col gap-1 text-mst-gray text-sm capitalize space-y-[5px]">
                    <li class="flex hover:text-black transition-300">
                        <a href="">Home</a></li>
                    <li class="flex hover:text-black transition-300">
                        <a href="">About Us</a></li>
                    <li class="flex hover:text-black transition-300">
                        <a href="">Customer Reviews</a></li>
                </ul>
            </div>
            <div class="hidden md:block md:col-span-2">
                <div class="container">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="hidden md:block">
                            <div class="heading text-mst-gray text-sm font-semibold mb-3">Legal</div>
                            <ul class="flex flex-col gap-1 text-mst-gray text-sm capitalize space-y-[5px]">
                                <li class="flex hover:text-black transition-300">
                                    <a href="">Privacy Policy</a></li>
                                <li class="flex hover:text-black transition-300">
                                    <a href="">Terms & Conditions</a></li>
                            </ul>
                        </div>
                        <div class="hidden md:block">
                            <div class="heading text-mst-gray text-sm font-semibold mb-3">Need Help?</div>
                            <ul class="flex flex-col gap-1 text-mst-gray text-sm capitalize space-y-[5px]">
                                <li class="flex">
                                    <a href="">FAQs</a></li>
                                <li class="flex">
                                    <a href="">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <img src="{{asset('assets/images/payment-icons.png')}}" class="w-64 mt-4" alt="payment-icons">
                </div>
            </div>
            @include('frontend.components.footer_menu')
        </div>
    </div>
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-[1.5fr_1fr_1fr_1fr] gap-5">
            <div>
                <ul class="flex gap-4 mt-1 items-center">
                    <li>
                        <a href=""><img src="{{asset('assets/images/fb.svg')}}" class="w-12" alt="facebook"></a>
                    </li>
                    <li>
                        <a href=""><img src="{{asset('assets/images/insta.svg')}}" class="w-12" alt="instagram"></a>
                    </li>
                    <li>
                        <a href=""><img src="{{asset('assets/images/yt.svg')}}" class="w-12" alt="youtube"></a>
                    </li>
                    <li>
                        <a href=""><img src="{{asset('assets/images/tt.svg')}}" class="w-12" alt="tiktok"></a>
                    </li>
                    <li>
                        <a href=""><img src="{{asset('assets/images/lk.svg')}}" class="w-12" alt="linkedin"></a>
                    </li>
                </ul>
                <p class="text-xs text-body mt-3">Copyright © 2025 Mysaifco.com. All Rights Reserved.</p>
            </div>
            <!-- Email -->
            <div class="flex items-center gap-2 text-xs text-body md:mt-4">
                <img src="{{asset('assets/images/email.svg')}}" class="w-10 shrink-0" alt="email"> <span>info@mysaifco.com</span>
            </div>
            <!-- Address -->
            <div class="flex items-start gap-2 text-xs text-body md:mt-6">
                <img src="{{asset('assets/images/location.svg')}}" class="w-10 shrink-0 mt-0.5" alt="address"> <span>16th Street Shop # 5, Bohra Masjid Road, Ayal Nasir, Deira, Dubai, UAE</span>
            </div>
            <!-- Phone -->
            <div class="flex items-start gap-2 text-xs text-body md:mt-4">
                <img src="{{asset('assets/images/phone.svg')}}" class="w-10 shrink-0 mt-0.5" alt="phone"> <span>
                    Office: +971 4 2733868 <br>
                    Tours: +971 50 5593840 <br>
                    Umrah: +971 55 6337710
                </span>
            </div>
        </div>
    </div>
</footer>
