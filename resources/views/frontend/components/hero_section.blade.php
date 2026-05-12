<div class="flex justify-center items-center border-b-1 border-gray-200">
    <div
        class="px-4 hero_section relative flex min-h-[60vh] w-full items-center justify-center
        overflow-hidden">
        <div class="absolute inset-0 scale-105 bg-cover bg-center bg-no-repeat -blur-[3px] bg-gray-50"
             style="background-image: url('{{ asset('assets/images/home-page-hero.webp') }}')"
             aria-hidden="true"></div>
        {{--<div class="absolute inset-0 bg-gray-950/80" aria-hidden="true"></div>--}}
        <div class="relative z-10 w-full py-10 md:py-14">
            <div class="container mx-auto w-full">
                <div class="grid w-full grid-cols-1 md:grid-cols-1 items-center gap-5">
                    <div class="flex flex-col justify-center">
                        <h1 class="text-4xl text-center md:text-left md:text-6xl font-bold text-std-400 uppercase">
                            transforming</h1>
                        <h3 class="text-2xl text-center md:text-left md:text-3xl font-bold text-std-200 my-4
                        leading-8 md:leading-10">
                            Your Ideas into Custom Design <br class="hidden md:block"> with our experties in USA
                        </h3>
                        <p class="text-md text-std-400 text-center md:text-left">
                            Crafted with High-Quality Materials. Delivered in as Fast as 5 days.
                            <br class="hidden md:block">No Setup Fees.
                        </p>
                        {{-- button start --}}
                        <div class="mt-8 mb-4 flex items-center justify-start md:flex md:items-center
                        md:justify-start w-full md:w-4/12 gap-5">
                            <a href="" class="text-white bg-gradient-to-br rounded-full from-std to-std-300 w-54
                            uppercase
                                                hover:bg-gradient-to-bl font-medium rounded-base text-md px-6 py-3
                                                text-center leading-5">Get a Quote</a> <a href="" class="text-white bg-gradient-to-br rounded-full from-std to-std-300 w-fit uppercase
                                                                            hover:bg-gradient-to-bl font-medium
                                                                            rounded-base text-md px-6 py-3
                                                                            text-center leading-5">view gallery</a>
                            {{-- button end --}}
                        </div>
                        <ul class="flex gap-3 text-std text-md font-semibold mt-5 capitalize">
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960"
                                     width="22px" class="me-1" fill="#05293a">
                                    <path d="m424-296 282-282-56-56-226
                                     226-114-114-56
                                     56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/>
                                </svg>
                                Free sample
                            </li>
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960"
                                     width="22px" class="me-1" fill="#05293a">
                                    <path d="m424-296 282-282-56-56-226
                                                                226-114-114-56
                                                                56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/>
                                </svg>
                                Premium quality
                            </li>
                            <li class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960"
                                     width="22px" class="me-1" fill="#05293a">
                                    <path d="m424-296 282-282-56-56-226
                                                                226-114-114-56
                                                                56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/>
                                </svg>
                                free art & design
                            </li>
                        </ul>
                    </div>
                    {{--<div class="">
                        @include('frontend.components.quote_form')
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
