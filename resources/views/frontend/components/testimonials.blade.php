@php
    $testimonialItems = $testimonials ?? [
        [
            'quote' => 'Saifco made our Umrah journey truly unforgettable. Every detail was handled with care and professionalism. Highly recommended.',
            'name' => 'Syed Hussain Hashmi',
            'meta' => 'Umrah Traveler · Dubai',
        ],
        [
            'quote' => 'Very good service from start to end! I really recommend this company for anyone visiting Dubai — the experience was world-class.',
            'name' => 'Preety Zinta',
            'meta' => 'Dubai City Tour · India',
        ],
        [
            'quote' => 'My trip to Dubai was amazing, and the desert safari with Saifco was the highlight! The team was friendly, knowledgeable, and made us feel so welcome.',
            'name' => 'Melissa Johnson',
            'meta' => 'Desert Safari · UK',
        ],
        [
            'quote' => 'From airport transfers to hotel coordination, the team made our Umrah journey stress-free. Kind staff and reliable timing at every step.',
            'name' => 'Fatima Zahra',
            'meta' => 'Pilgrim · Pakistan',
        ],
        [
            'quote' => 'The dhow cruise dinner exceeded expectations — great food, live music, and a magical view of the marina skyline. Worth every dirham.',
            'name' => 'Omar El-Sayed',
            'meta' => 'Honeymoon · Egypt',
        ],
        [
            'quote' => 'Responsive WhatsApp support and flexible rescheduling when our flight was delayed. That level of service is rare and deeply appreciated.',
            'name' => 'Priya Natarajan',
            'meta' => 'Solo Traveler · India',
        ],
    ];
@endphp

<section class="flex justify-center items-center py-12 px-4 md:py-16">
    <div class="container mx-auto">
        <div class="testimonials-section-inner mx-auto max-w-6xl">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="font-heading text-3xl font-semibold italic leading-tight tracking-tight text-mst-gray">
                    <span class="text-mst-gray">Customer </span><span class="text-mst">Reviews</span>
                </h2>
                <p class="mt-4 font-body text-base leading-7 text-neutral-600 md:text-lg md:leading-8">
                    Trusted by thousands of travelers for Dubai tours &amp; Umrah packages, delivering reliable service,
                    smooth journeys, and unforgettable experiences.
                </p>
            </div>

            <div class="customer_reviews mt-10 md:mt-14">
                <div class="testimonials-swiper-wrap">
                    <div class="flex items-stretch gap-3 sm:gap-4 md:items-center">
                        {{--<button
                            type="button"
                            class="testimonials-swiper-prev testimonials-nav-btn testimonials-nav-btn--prev shrink-0 self-center max-md:mt-1"
                            aria-label="Previous testimonials"
                        >
                            <svg class="testimonials-nav-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>--}}

                        <div
                            class="swiper testimonials-swiper min-w-0 flex-1 py-1"
                            id="testimonials-swiper"
                            aria-roledescription="carousel"
                        >
                            <div class="swiper-wrapper">
                                @foreach ($testimonialItems as $t)
                                    <div class="swiper-slide !h-auto">
                                        <article
                                            class="testimonial-card flex h-full flex-col rounded-[15px] border border-neutral-200/90 bg-neutral-50 p-6 shadow-sm md:p-7 md:px-8"
                                        >
                                            <div class="flex gap-0.5 text-amber-400" aria-hidden="true">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <span class="text-base leading-none md:text-lg">&#9733;</span>
                                                @endfor
                                            </div>
                                            <div class="relative mt-5 min-h-[6.5rem] flex-1 pb-10 md:min-h-[7.5rem]">
                                                <p class="pr-2 font-body text-sm">
                                                    {{ $t['quote'] }}
                                                </p>
                                                <span class="pointer-events-none absolute bottom-0 right-0">
                                                  <img src="{{asset('assets/images/icons/quote-down.svg')}}" alt="img">
                                                </span>
                                            </div>
                                            <footer>
                                                <p class="font-heading font-semibold">
                                                    &mdash; {{ $t['name'] }}
                                                </p>
                                                <p class="mt-1 font-body text-sm">
                                                    {{ $t['meta'] }}
                                                </p>
                                            </footer>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{--<button
                            type="button"
                            class="testimonials-swiper-next testimonials-nav-btn testimonials-nav-btn--next shrink-0 self-center max-md:mt-1"
                            aria-label="Next testimonials"
                        >
                            <svg class="testimonials-nav-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>--}}
                    </div>

                    <div class="mt-10">
                            <a href="" class="flex items-center justify-center w-32 text-white text-lg px-2 py-2
                            rounded-full mx-auto
                            bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                             hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                             transition duration-300 font-heading italic"> View All
                                <img src="{{asset('assets/images/icons/btn-arrow.svg')}}"
                                     class="w-6 ms-1"
                                     alt="arrow"> </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
