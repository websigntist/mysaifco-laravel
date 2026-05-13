<header class="sticky top-0 z-50 flex items-center overflow-visible py-1 px-3 bg-white">
    <div class="container max-w-[1366px] mx-auto overflow-visible">
        <div class="flex items-center justify-between gap-3 overflow-visible">
            <div class="brand_logo">
                <a href="{{url('/')}}">
                    <img src="{{asset('assets/images/logo.svg')}}" class="w-14" alt="brand_logo"
                         title="standard patches">
                </a>
            </div>
            {{-- menu start --}}
            <div class="flex items-center">
                @include('frontend.components.navbar')
            </div>
            {{-- menu end --}}
            {{--<div class="flex justify-end items-center shrink-0">
                <ul class="flex items-center gap-2 md:gap-4">
                    <li class="hidden md:flex text-body text-xs">
                        <div class="uppercase font-semibold just">
                            <a href="" class="bg-white text-fine rounded-full uppercase font-bold
                                                                          text-xs text-center block ps-2 pe-1 py-2 ">
                                Get <span class="bg-fine px-2 py-1 rounded-full text-xs text-center text-body ">Started</span> </a>
                        </div>
                    </li>
                    <li class="text-xs flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960"
                             width="28px" fill="#ffffff">
                            <path d="M367-527q-47-47-47-113t47-113q47-47 113-47t113 47q47 47 47 113t-47 113q-47 47-113 47t-113-47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm296.5-343.5Q560-607 560-640t-23.5-56.5Q513-720 480-720t-56.5 23.5Q400-673 400-640t23.5 56.5Q447-560 480-560t56.5-23.5ZM480-640Zm0 400Z"/>
                        </svg>
                    </li>
                    <li class="text-xs flex">
                        <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960"
                             width="22px" fill="#ffffff">
                            <path d="M200-80q-33 0-56.5-23.5T120-160v-480q0-33 23.5-56.5T200-720h80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720h80q33 0 56.5 23.5T840-640v480q0 33-23.5 56.5T760-80H200Zm0-80h560v-480H200v480Zm421.5-298.5Q680-517 680-600h-80q0 50-35 85t-85 35q-50 0-85-35t-35-85h-80q0 83 58.5 141.5T480-400q83 0 141.5-58.5ZM360-720h240q0-50-35-85t-85-35q-50 0-85 35t-35 85ZM200-160v-480 480Z"/>
                        </svg>
                    </li>
                </ul>
            </div>--}}
        </div>
    </div>
</header>
