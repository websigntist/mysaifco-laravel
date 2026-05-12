@php
    /**
     * Static list: one filename per slide, in order.
     * Files live in public/assets/images/logos/
     * Edit this array only — add/remove/reorder as you design each asset name.
     */
    $logoSlides = [
        'image-20.webp',
        'image-21.webp',
        'image-22.webp',
        'image-23.webp',
        'image-20.webp',
        'image-21.webp',
        'image-22.webp',
        'image-23.webp',
    ];
@endphp
<section class="image-logos-carousel-section w-full overflow-x-hidden" aria-label="Logo carousel">
    @if (count($logoSlides) > 0)
        <div class="image-logos-carousel flex w-full max-w-[100vw] items-center gap-2 px-2 py-6 sm:gap-3 sm:px-4 sm:py-8 md:gap-4 md:px-6 lg:px-8">
            <button type="button"
                    class="image-logos-swiper-prev swiper-button-prev !relative !top-auto !left-auto !right-auto !mt-0 !flex !h-8 !w-8 shrink-0 items-center justify-center"
                    aria-label="Previous slide">
            </button>
            <div class="swiper image-logos-swiper min-w-0 flex-1 overflow-hidden"
                 id="image-logos-swiper"
                 aria-roledescription="carousel">
                <div class="swiper-wrapper">
                    @foreach ($logoSlides as $file)
                        <div class="swiper-slide">
                            <div class="flex h-full items-center justify-center px-1 py-3 sm:min-h-[104px] sm:px-2 sm:py-4 md:min-h-[120px]">
                                <img src="{{ asset('assets/images/logos/'.$file) }}"
                                     alt=""
                                     class="w-auto max-w-full object-contain rounded-lg"
                                     loading="lazy">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="button"
                    class="image-logos-swiper-next swiper-button-next !relative !top-auto !left-auto !right-auto !mt-0 !flex !h-8 !w-8 shrink-0 items-center justify-center"
                    aria-label="Next slide">
            </button>
        </div>
    @else
        <div class="w-full border-y border-slate-200 bg-slate-50 px-4 py-12 text-center text-sm text-slate-600">
            Add filenames to the <code>$logoSlides</code> array in <code>image_carousel.blade.php</code>.
        </div>
    @endif
</section>
