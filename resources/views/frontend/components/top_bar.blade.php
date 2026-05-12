<div class="top_bar bg-std py-2 px-3 flex items-center">
        <div class="container mx-auto">
            <div class="grid grid-cols-2">
                <div class="flex justify-start">
                    <ul class="flex mt-0.5">
                        <li class="text-white text-xs flex">
                            <img src="{{asset('assets/images/icons/phone.svg')}}" alt="phone icon" class="w-5 md:w-4 me-1 -mt-1">
                            <span class="hidden md:block">{{get_setting('landline_number')}}</span>
                        </li>
                        <li class="text-white text-xs flex mx-3">
                            <img src="{{asset('assets/images/icons/email.svg')}}" alt="phone icon" class="w-5 md:w-4 me-1 -mt-1">
                            <span class="hidden md:block">{{get_setting('email')}}</span>
                        </li>
                        <li class="text-white text-xs flex">
                            <img src="{{asset('assets/images/icons/pin.svg')}}" alt="phone icon" class="w-5 md:w-4 me-1 -mt-1">
                            <span class="hidden md:block">{{get_setting('address')}}</span>
                        </li>
                    </ul>
                </div>
                <div class="flex justify-end">
                    <ul class="flex">
                        <li class="text-white text-xs flex">
                            <img src="{{asset('assets/images/icons/fb.svg')}}" alt="phone icon" class="w-5 me-1">
                        </li>
                        <li class="text-white text-xs flex mx-1">
                            <img src="{{asset('assets/images/icons/yt.svg')}}" alt="phone icon" class="w-5 me-1">
                        </li>
                        <li class="text-white text-xs flex">
                            <img src="{{asset('assets/images/icons/insta.svg')}}" alt="phone icon" class="w-5 me-1">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
