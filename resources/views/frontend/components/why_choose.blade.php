<section class="flex justify-center items-center">
    <div class="hero_section relative flex py-10 px-4 w-full items-center justify-center overflow-hidden">
        <div class="absolute inset-0 scale-105 bg-cover bg-center bg-no-repeat blur-[0]"
             style="background-image: url('{{ asset('assets/images/background/bg1.webp') }}')" aria-hidden="true"></div>
        <div class="absolute inset-0 bg-gray-950/60" aria-hidden="true"></div>
        <div class="relative z-10 w-full">
            <div class="container mx-auto w-full">
                <div class="grid w-full grid-cols-1 md:grid-cols-2 items-center gap-5">
                    <div class="flex flex-col justify-center space-y-5">
                        <h4 class="text-lg font-semibold text-white capitalize">Design for Free Revise Without
                                                                                Limits</h4>
                        <h1 class="text-4xl leading-10 md:text-6xl md:leading-16 font-bold text-white capitalize">
                            Why Choose Standard Patches?
                        </h1>
                        <div class="w-32 bg-white h-1 rounded-full mb-4"></div>
                        <p class="text-md text-white leading-7">Standard Patches is a reliable source for all kinds of
                                                                digitized prints and patches, including Custom Patches
                                                                in USA! With a wide range of colors, attachments, and
                                                                prints, you are likely to find something that is
                                                                suitable for your needs. Your experience with us will be
                                                                swift and convenient with quality services and the best
                                                                products. Place an order today, and release yourself of
                                                                all your logo-related worries!</p>
                    </div>
                    <div class="">
                        @include('frontend.components.why_choose_carousel')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
