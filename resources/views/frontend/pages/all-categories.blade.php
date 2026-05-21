@extends('frontend.layouts.master')
@section('content')

    {{--===== top banner ======--}}
    <section class="flex justify-center items-center border-b-1 border-gray-200">
        <div class="px-4 relative flex min-h-[400px] w-full
        items-center justify-center overflow-hidden">
            <div class="absolute inset-0 scale-105 bg-cover bg-top bg-no-repeat"
                 style="background-image: url('{{ asset('assets/images/sliders/560650.webp') }}')"
                 aria-hidden="true"></div>
            <div class="absolute inset-0 bg-gray-950/25" aria-hidden="true"></div>
            <div class="relative z-10 w-full py-14">
                <div class="container mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-[0.7fr_1fr] gap-6">
                        <div class="flex flex-col justify-center">
                            <ul class="flex items-center justify-start gap-5">
                                <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                    <div class="text-white text-xl font-medium text-center italic font-heading">
                                        Best Price
                                    </div>
                                    <div class="text-white text-xs text-center">Guaranteed Deals</div>
                                </li>
                                <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                    <div class="text-white text-xl font-medium text-center italic font-heading">
                                        18 + Years
                                    </div>
                                    <div class="text-white text-xs text-center">Trusted Experience</div>
                                </li>
                                <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                    <div class="text-white text-xl font-medium text-center italic font-heading">
                                        Top Rated
                                    </div>
                                    <div class="text-white text-xs text-center">5 Starts Rated</div>
                                </li>
                            </ul>
                            <ul class="flex items-center justify-start gap-5 mt-5">
                                <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                    <div class="text-white text-xl font-medium text-center italic font-heading">
                                        Licensed Operator
                                    </div>
                                    <div class="text-white text-xs text-center">Dubai Approved</div>
                                </li>
                                <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                    <div class="text-white text-xl font-medium text-center italic font-heading">
                                        50K + Customers
                                    </div>
                                    <div class="text-white text-xs text-center">World Wide Travelerss</div>
                                </li>
                            </ul>
                        </div>
                        {{--======================--}}
                        <div class="flex items-center justify-end">
                            <div class="bg-gray-50 rounded-xl pt-3 pb-4 px-4 border border-gray-200 space-y-4 w-96 h-40">
                                <div class="font-heading font-bold italic text-xl capitalize mb-3">
                                    Contact with <span class="text-mst">Us</span>
                                </div>
                                <div class="bg-gray-50 rounded-xl p-4 border gap-3 border-gray-200 flex item-center justify-start">
                                    <img src="{{asset('assets/images/icons/whatsapp.svg')}}" class="w36" alt="whatsapp">
                                    <a href="tel:+971505593840">
                                        <div class="font-heading font-bold italic text-mst text-xl">Tour Inquires <br>
                                            <span class="text-mst-gray">+971 50 559 3840</span>
                                        </div>
                                    </a>
                                    <img src="{{asset('assets/images/icons/line-arrow.svg')}}" class="w36 ml-auto" alt="arrow">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--===== main heading ======--}}
    <section class="flex justify-center items-center py-8 px-4 md:py-10">
        <div class="container mx-auto">
            <div class="testimonials-section-inner mx-auto max-w-6xl">
                <div class="mx-auto text-center">
                    <h1>
                        <span>Explore the Best  </span><span class="text-mst">Dubai Tours, Activities</span>
                    </h1>
                    <p class="mt-4">
                        Explore the best Dubai tours and activities with a trusted local tour operator. Find top
                        experiences including Dubai desert safari, Dubai city tours, Dubai Marina yacht tours, dhow
                        cruise dinner, and full-day Abu Dhabi city tours with Ferrari World and Louvre Museum. Choose
                        from popular Dubai water activities, theme park tickets, and value Dubai combo tours with hotel
                        pickup and drop-off, best price guarantee, and 24/7 support. All tours are designed for easy
                        booking, flexible options, and a smooth travel experience.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{--===== desert safari ======--}}
    <section class="justify-center items-center bg-white py-8 px-4 md:py-6">
        <div class="container mx-auto">
            <div class="our-popular-inner">
                <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between md:gap-8">
                    <div class="min-w-0 flex-1">
                        <h1>
                            <span>Desert </span><span class="text-mst"> Safari</span>
                        </h1>
                        <p class="mt-4 pe-20">
                            Book Desert Safari Dubai tours with dune bashing, camel rides, sandboarding, and BBQ dinner,
                            including evening, morning, private, and VIP desert safari experiences.
                        </p>
                    </div>
                    {{--===== button ======--}}
                    <div class="flex shrink-0 md:pt-1">
                        <a
                            href="{{ $link ?? '#' }}"
                            class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-mst to-mst-dark px-7 py-3.5 font-heading text-base italic text-white transition hover:from-mst-dark hover:to-mst md:py-4 md:text-lg"
                        > View all <img
                                src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                class="ms-1 w-6"
                                width="24"
                                height="24"
                                alt=""
                            > </a>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/01.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img"> <span
                            class="absolute left-3 top-3 inline-flex items-center gap-1 rounded-full px-3
                                                                py-1 text-sm font-normal text-white shadow-sm bg-red-600 font-heading"
                        >
                            <span aria-hidden="true" class="z-10">&#128293; Best Seller</span></span>
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                            hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                            z-10 truncate max-w-[85%]">Dubai Desert Safari
                        </div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 2.4K Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                            px-4
                            text-white z-10">Starting from: AED 99
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                  w-15 h-9 rounded-full bg-white z-10
                                  hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/02.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                                                hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                                                z-10 truncate max-w-[85%]">Dubai: Royal Camel Race, Standard...
                        </div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 2.4K Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                                                px-4
                                                text-white z-10">Starting from: AED 726.35
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                                      w-15 h-9 rounded-full bg-white z-10
                                                      hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/03.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                                                hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                                                z-10 truncate max-w-[85%]">Desert Safari with 30 mins Quad B...
                        </div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 900 Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                                                px-4
                                                text-white z-10">Starting from: AED 726.35
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                                      w-15 h-9 rounded-full bg-white z-10
                                                      hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--===== yacht charter ======--}}
    <section class="justify-center items-center bg-white py-8 px-4 md:py-6">
        <div class="container mx-auto">
            <div class="our-popular-inner">
                <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between md:gap-8">
                    <div class="min-w-0 flex-1">
                        <h1>
                            <span>Yacht </span><span class="text-mst"> Charter</span>
                        </h1>
                        <p class="mt-4 pe-20">
                            Enjoy luxury yacht charter Dubai experiences with private yacht rental, Dubai Marina cruises, and views of Atlantis, Burj Al Arab, and JBR.
                        </p>
                    </div>
                    {{--===== button ======--}}
                    <div class="flex shrink-0 md:pt-1">
                        <a
                            href="{{ $link ?? '#' }}"
                            class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-mst to-mst-dark px-7 py-3.5 font-heading text-base italic text-white transition hover:from-mst-dark hover:to-mst md:py-4 md:text-lg"
                        > View all <img
                                src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                class="ms-1 w-6"
                                width="24"
                                height="24"
                                alt=""
                            > </a>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/04.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                            hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                            z-10 truncate max-w-[85%]">Shared Yacht Tour Dubai Marina
                        </div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 2.4K Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                            px-4
                            text-white z-10">Starting from: AED 99
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                  w-15 h-9 rounded-full bg-white z-10
                                  hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/05.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                                                hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                                                z-10 truncate max-w-[85%]">Private Luxury Yacht Cruising 36 Ft
                        </div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 2.4K Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                                                px-4
                                                text-white z-10">Starting from: AED 726.35
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                                      w-15 h-9 rounded-full bg-white z-10
                                                      hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/06.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                                                hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                                                z-10 truncate max-w-[85%]">Jet Ski rental Dubai
                        </div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 900 Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                                                px-4
                                                text-white z-10">Starting from: AED 726.35
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                                      w-15 h-9 rounded-full bg-white z-10
                                                      hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--===== dubai city tour ======--}}
    <section class="justify-center items-center bg-white py-8 px-4 md:py-6">
        <div class="container mx-auto">
            <div class="our-popular-inner">
                <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between md:gap-8">
                    <div class="min-w-0 flex-1">
                        <h1>
                            <span>dubai city </span><span class="text-mst"> tour</span>
                        </h1>
                        <p class="mt-4 pe-20">
                            Discover Dubai city tours covering Burj Khalifa views, Dubai Frame, Jumeirah Mosque, and top attractions with guided sightseeing experiences.
                        </p>
                    </div>
                    {{--===== button ======--}}
                    <div class="flex shrink-0 md:pt-1">
                        <a
                            href="{{ $link ?? '#' }}"
                            class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-mst to-mst-dark px-7 py-3.5 font-heading text-base italic text-white transition hover:from-mst-dark hover:to-mst md:py-4 md:text-lg"
                        > View all <img
                                src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                class="ms-1 w-6"
                                width="24"
                                height="24"
                                alt=""
                            > </a>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/05.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                            hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                            z-10 truncate max-w-[85%]">Dubai City Tour
                        </div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 2.4K Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                            px-4
                            text-white z-10">Starting from: AED 99
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                  w-15 h-9 rounded-full bg-white z-10
                                  hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/06.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                                                hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                                                z-10 truncate max-w-[85%]">Dubai Trio (City Tour, Desert Safari</div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 2.4K Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                                                px-4
                                                text-white z-10">Starting from: AED 726.35
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                                      w-15 h-9 rounded-full bg-white z-10
                                                      hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/07.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                                                hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                                                z-10 truncate max-w-[85%]">4 Tours: Desert Safari, Dubai City</div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 900 Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                                                px-4
                                                text-white z-10">Starting from: AED 726.35
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                                      w-15 h-9 rounded-full bg-white z-10
                                                      hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--===== dubai city tour ======--}}
    <section class="justify-center items-center bg-white py-8 px-4 md:py-6">
        <div class="container mx-auto">
            <div class="our-popular-inner">
                <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between md:gap-8">
                    <div class="min-w-0 flex-1">
                        <h1>
                            <span>Abu Dhabi </span><span class="text-mst"> tour</span>
                        </h1>
                        <p class="mt-4 pe-20">
                            Explore Abu Dhabi tours with Sheikh Zayed Grand Mosque, Louvre Museum, city sightseeing, and full-day guided tours from Dubai.
                        </p>
                    </div>
                    {{--===== button ======--}}
                    <div class="flex shrink-0 md:pt-1">
                        <a
                            href="{{ $link ?? '#' }}"
                            class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-mst to-mst-dark px-7 py-3.5 font-heading text-base italic text-white transition hover:from-mst-dark hover:to-mst md:py-4 md:text-lg"
                        > View all <img
                                src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                class="ms-1 w-6"
                                width="24"
                                height="24"
                                alt=""
                            > </a>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/10.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                            hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                            z-10 truncate max-w-[85%]">Abu Dhabi City Tours </div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 2.4K Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                            px-4
                            text-white z-10">Starting from: AED 99
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                  w-15 h-9 rounded-full bg-white z-10
                                  hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/11.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                                                hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                                                z-10 truncate max-w-[85%]">Abu Dhabi City Tour with Louvre M..</div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 2.4K Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                                                px-4
                                                text-white z-10">Starting from: AED 726.35
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                                      w-15 h-9 rounded-full bg-white z-10
                                                      hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/12.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                                                hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                                                z-10 truncate max-w-[85%]">Abu Dhabi City Tour with Ferrari W..</div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 900 Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                                                px-4
                                                text-white z-10">Starting from: AED 726.35
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                                      w-15 h-9 rounded-full bg-white z-10
                                                      hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--===== dubai city tour ======--}}
    <section class="justify-center items-center bg-white py-8 px-4 md:py-6">
        <div class="container mx-auto">
            <div class="our-popular-inner">
                <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between md:gap-8">
                    <div class="min-w-0 flex-1">
                        <h1>
                            <span>Dhow Cruise </span><span class="text-mst"> tour</span>
                        </h1>
                        <p class="mt-4 pe-20">
                            Book dhow cruise Dubai with dinner, live entertainment, and scenic views of Dubai Marina or Creek for a relaxing evening experience.
                        </p>
                    </div>
                    {{--===== button ======--}}
                    <div class="flex shrink-0 md:pt-1">
                        <a
                            href="{{ $link ?? '#' }}"
                            class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-mst to-mst-dark px-7 py-3.5 font-heading text-base italic text-white transition hover:from-mst-dark hover:to-mst md:py-4 md:text-lg"
                        > View all <img
                                src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                class="ms-1 w-6"
                                width="24"
                                height="24"
                                alt=""
                            > </a>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/13.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                            hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                            z-10 truncate max-w-[85%]">Dhow Cruise Dinner in Dubai Marina</div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 2.4K Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                            px-4
                            text-white z-10">Starting from: AED 99
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                  w-15 h-9 rounded-full bg-white z-10
                                  hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/14.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                                                hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                                                z-10 truncate max-w-[85%]">Musandam Dibba Day Cruise with</div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 2.4K Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                                                px-4
                                                text-white z-10">Starting from: AED 726.35
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                                      w-15 h-9 rounded-full bg-white z-10
                                                      hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/15.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                                                hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                                                z-10 truncate max-w-[85%]">Dhow Cruise Dinner in Dubai Creek</div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 900 Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                                                px-4
                                                text-white z-10">Starting from: AED 726.35
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                                      w-15 h-9 rounded-full bg-white z-10
                                                      hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--===== dubai city tour ======--}}
    <section class="justify-center items-center bg-white py-8 px-4 md:py-6">
        <div class="container mx-auto">
            <div class="our-popular-inner">
                <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between md:gap-8">
                    <div class="min-w-0 flex-1">
                        <h1>
                            <span>Dubai Combo </span><span class="text-mst"> tour</span>
                        </h1>
                        <p class="mt-4 pe-20">
                            Save more with Dubai combo tours including desert safari, city tours, dhow cruise, and Abu Dhabi tours in one package.
                        </p>
                    </div>
                    {{--===== button ======--}}
                    <div class="flex shrink-0 md:pt-1">
                        <a
                            href="{{ $link ?? '#' }}"
                            class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-mst to-mst-dark px-7 py-3.5 font-heading text-base italic text-white transition hover:from-mst-dark hover:to-mst md:py-4 md:text-lg"
                        > View all <img
                                src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                class="ms-1 w-6"
                                width="24"
                                height="24"
                                alt=""
                            > </a>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/16.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                            hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                            z-10 truncate max-w-[85%]">Dubai Trio (Dubai City Tour, Desert</div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 2.4K Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                            px-4
                            text-white z-10">Starting from: AED 99
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                  w-15 h-9 rounded-full bg-white z-10
                                  hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/17.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                                                hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                                                z-10 truncate max-w-[85%]">4 Tours: Desert Safari, Dubai City</div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 2.4K Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                                                px-4
                                                text-white z-10">Starting from: AED 726.35
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                                      w-15 h-9 rounded-full bg-white z-10
                                                      hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/18.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                                                hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                                                z-10 truncate max-w-[85%]">Combo 1: Dubai City Tour & Desert</div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 900 Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                                                px-4
                                                text-white z-10">Starting from: AED 726.35
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                                      w-15 h-9 rounded-full bg-white z-10
                                                      hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--===== dubai city tour ======--}}
    <section class="justify-center items-center bg-white py-8 px-4 md:py-6">
        <div class="container mx-auto">
            <div class="our-popular-inner">
                <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between md:gap-8">
                    <div class="min-w-0 flex-1">
                        <h1>
                            <span>Water  </span><span class="text-mst"> Activities</span>
                        </h1>
                        <p class="mt-4 pe-20">
                            Experience Dubai water activities including jet ski, parasailing, flyboarding, banana rides, and exciting beach adventures across Dubai.
                        </p>
                    </div>
                    {{--===== button ======--}}
                    <div class="flex shrink-0 md:pt-1">
                        <a
                            href="{{ $link ?? '#' }}"
                            class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-mst to-mst-dark px-7 py-3.5 font-heading text-base italic text-white transition hover:from-mst-dark hover:to-mst md:py-4 md:text-lg"
                        > View all <img
                                src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                class="ms-1 w-6"
                                width="24"
                                height="24"
                                alt=""
                            > </a>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/19.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                            hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                            z-10 truncate max-w-[85%]">Jet Ski rental Dubai</div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 2.4K Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                            px-4
                            text-white z-10">Starting from: AED 99
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                  w-15 h-9 rounded-full bg-white z-10
                                  hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/20.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                                                hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                                                z-10 truncate max-w-[85%]">Speed Boat Tour Dubai - 90 mins</div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 2.4K Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                                                px-4
                                                text-white z-10">Starting from: AED 726.35
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                                      w-15 h-9 rounded-full bg-white z-10
                                                      hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/21.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                                                hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                                                z-10 truncate max-w-[85%]">Deep Sea Fishing 4 hours Tour</div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 900 Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                                                px-4
                                                text-white z-10">Starting from: AED 726.35
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                                      w-15 h-9 rounded-full bg-white z-10
                                                      hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--===== dubai city tour ======--}}
    <section class="justify-center items-center bg-white py-8 px-4 md:py-6">
        <div class="container mx-auto">
            <div class="our-popular-inner">
                <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between md:gap-8">
                    <div class="min-w-0 flex-1">
                        <h1>
                            <span>Theme Park </span><span class="text-mst"> Tickets</span>
                        </h1>
                        <p class="mt-4 pe-20">
                            Get theme park tickets for Dubai attractions including Ferrari World, IMG Worlds, Motiongate, and Aquaventure water park experiences.
                        </p>
                    </div>
                    {{--===== button ======--}}
                    <div class="flex shrink-0 md:pt-1">
                        <a
                            href="{{ $link ?? '#' }}"
                            class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-mst to-mst-dark px-7 py-3.5 font-heading text-base italic text-white transition hover:from-mst-dark hover:to-mst md:py-4 md:text-lg"
                        > View all <img
                                src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                                class="ms-1 w-6"
                                width="24"
                                height="24"
                                alt=""
                            > </a>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/22.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                            hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                            z-10 truncate max-w-[85%]">Hot Air Balloon Tour (6 Hours)</div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 2.4K Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                            px-4
                            text-white z-10">Starting from: AED 99
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                  w-15 h-9 rounded-full bg-white z-10
                                  hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/23.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                                                hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                                                z-10 truncate max-w-[85%]">Wonder Bus Tour</div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 2.4K Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                                                px-4
                                                text-white z-10">Starting from: AED 726.35
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                                      w-15 h-9 rounded-full bg-white z-10
                                                      hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                    <div class="relative">
                        <img src="{{asset('assets/images/packages/24.webp')}}"
                             class="rounded-lg w-full h-full object-cover"
                             alt="img">
                        <!-- Overlay -->
                        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80
                                                hover:bg-black/20 transition duration-300 ease-in-out"></div>
                        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white
                                                z-10 truncate max-w-[85%]">Bollywood Parks™ Dubai</div>
                        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10"
                             aria-hidden="true">
                            @for ($i = 0; $i < 5; $i++)
                                <span class="text-base leading-none md:text-lg">&#9733;</span>
                            @endfor
                            <span class="text-white text-xs">(4.9/5) 900 Reviews</span>
                        </div>
                        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1
                                                px-4
                                                text-white z-10">Starting from: AED 726.35
                        </div>
                        <a href=""
                           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center
                                                      w-15 h-9 rounded-full bg-white z-10
                                                      hover:right-4 transition-all ease-in-out duration-500">
                            <img src="{{asset('assets/images/icons/line-arrow.svg')}}" alt="arrow" class="w-5 h-6"> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.components.testimonials')
    @include('frontend.components.faqs')
    @include('frontend.components.explore_dubai')
@endsection
