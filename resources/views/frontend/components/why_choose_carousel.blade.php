@php
    /**
     * Static list: one filename per slide, in order.
     * Files live in public/assets/images/logos/
     * Edit this array only — add/remove/reorder as you design each asset name.
     */
    $logoSlides = [
        'why2.webp',
        'why3.webp',
        'why4.webp',
    ];
@endphp
<div class="why-choose-logos-swiper-wrap w-full max-w-xl mx-auto md:max-w-none">
    @if (count($logoSlides) > 0)
        <div class="swiper why-choose-logos-swiper"
             id="why-choose-logos-swiper"
             aria-roledescription="carousel"
             aria-label="Partner logos">
            <div class="swiper-wrapper">
                @foreach ($logoSlides as $file)
                    <div class="swiper-slide">
                        <div class="flex w-full md:w-10/12 mx-auto items-center justify-center px-8 py-10 md:px-12
                        md:py-12">
                            <img src="{{ asset('assets/images/logos/'.$file) }}"
                                 alt=""
                                 class="w-auto max-w-full object-contain rounded-lg"
                                 loading="lazy">
                        </div>
                    </div>
                @endforeach
            </div>
            {{--<div class="swiper-pagination why-choose-logos-swiper-pagination !static pb-4" aria-hidden="true"></div>--}}
        </div>
    @else
        <div class="rounded-2xl border border-white/10 bg-white/5 px-6 py-16 text-center text-sm text-white/70">
            Add filenames to the <code class="text-white/90">$logoSlides</code> array in <code>why_choose_carousel.blade.php</code>.
        </div>
    @endif
</div>
