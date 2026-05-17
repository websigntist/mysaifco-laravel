<div class="flex justify-center items-center border-b-1 border-gray-200">
    <div class="px-4 hero_section relative flex min-h-[50vh] md:min-h-[88vh] 2xl:min-h-[92vh] w-full items-center
    justify-center
    overflow-hidden">
        <div class="absolute inset-0 scale-105 bg-cover bg-center bg-no-repeat"
             style="background-image: url('{{ asset('assets/images/sliders/hero-banner.webp') }}')"
             aria-hidden="true"></div>
        <div class="absolute inset-0 bg-gray-950/0" aria-hidden="true"></div>
        <div class="relative z-10 w-full py-10 md:py-14">
            <div class="container mx-auto w-full">
                <div class="grid w-full grid-cols-1 md:grid-cols-2 items-center gap-5">
                    <div class="flex flex-col justify-center">
                        <h1 class="text-5xl text-center md:text-left font-bold text-mst capitalize
                        italic leading-14 md:leading-16 tracking-wide">
                            Best Dubai Tours, <br class="hidden md:block"> Desert Safari & <br class="hidden md:block">
                            Yacht Experience
                        </h1>
                        <p class="text-lg text-white text-center md:text-left mt-6 leading-7">
                            Explore Desert Safari, luxury yacht tours & city experiences with <br class="hidden md:block">
                            trusted local experts. Best yacht prices in Dubai with instant <br class="hidden md:block">
                            booking & confirmation.
                        </p>
                        {{-- button start --}}
                        <div class="mt-8 mb-4">
                            <a href="" class="flex items-center justify-center w-44 text-white text-lg px-5 py-2
                            rounded-full md:ms-auto mx-auto
                            bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                             hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                             transition duration-300 font-heading italic"> Book Now
                                <img src="{{asset('assets/images/icons/btn-arrow.svg')}}"
                                     class="w-5 ms-1"
                                     alt="arrow">
                            </a>
                            {{-- button end --}}
                        </div>
                    </div>
                    <div class="flex w-full flex-col items-center gap-4 sm:gap-5 md:items-end">
                        <div class="bg-mst w-full max-w-xs rounded-lg p-4 sm:max-w-sm md:w-80">
                            <div class="text-white text-xl font-medium text-center italic font-heading">50K + Customers</div>
                            <div class="text-white text-sm text-center mt-1">World Wide Travelers</div>
                        </div>
                        <div class="bg-mst w-full max-w-xs rounded-lg p-4 sm:max-w-sm md:w-80">
                            <div class="text-white text-xl font-medium text-center italic font-heading">Licensed Operator</div>
                            <div class="text-white text-sm text-center mt-1">Dubai Approved</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
