{{--
  Logo carousel: infinite horizontal scroll (CSS marquee on .logo-carousel-track).
  The track is duplicated once in markup so the -50% animation loops seamlessly.

  Default: edit $logoCarouselFilenames below (files in public/assets/images/logos/).

  Optional override: pass $logoCarouselSlides from a view/controller as
  [['src' => full_url, 'alt' => '...'], ...] — it replaces the static list (still duplicated for marquee).
--}}
@php
    /**
     * Static list: one filename per logo, in order.
     * Files live in public/assets/images/logos/
     */
    $logoCarouselFilenames = [
        '01.webp',
        '02.webp',
        '03.webp',
        '04.webp',
        '05.webp',
        '06.webp',
        '07.webp',
        '08.webp',
        '09.webp',
        '10.webp',
        '11.webp',
        '12.webp',
        '13.webp',
        '14.webp',
    ];

    if (! isset($logoCarouselSlides) || ! is_array($logoCarouselSlides) || count($logoCarouselSlides) === 0) {
        $logoCarouselSlides = [];
        foreach ($logoCarouselFilenames as $file) {
            $logoCarouselSlides[] = [
                'src' => asset('assets/images/logos/'.$file),
                'alt' => ucfirst(str_replace(['-', '_'], ' ', pathinfo($file, PATHINFO_FILENAME))),
            ];
        }
    }

    // Seamless CSS marquee: two identical sequences (see custom.css translate -50%)
    $logoCarouselTrackSlides = array_merge($logoCarouselSlides, $logoCarouselSlides);
@endphp
@if (count($logoCarouselSlides) > 0)
<section class="logo-carousel-section flex w-full flex-col items-center justify-center
py-8 md:py-14 bg-cover bg-center bg-no-repeat" aria-label="{{ __('Partner logos') }}"
         style="background-image: url('{{ asset ('assets/images/background/bg411.webp') }}')">

    <h6 class="font-semibold text-sm bg-gray-100 inline-block px-2 py3 rounded-full text-gray-900 uppercase
                           shadow-sm shadow-gray-300 mb-3">high demanded categories</h6>
    <h2 class="text-center font-bold text-3xl mb-4">Check Out Our Customers Patches Below</h2>
    <div class="w-32 bg-std-400 h-1 rounded-full mb-4"></div>

    <div class="logo-carousel-panel w-full --max-w-5xl --md:max-w-6xl">
        <div class="logo-carousel-viewport mx-auto w-full overflow-hidden py-2 md:py-3">
            <div
                class="logo-carousel-track flex w-max flex-nowrap items-center gap-6"
                style="--logo-marquee-duration: 42s">
                @foreach ($logoCarouselTrackSlides as $slide)
                    <div class="logo-carousel-item flex shrink-0 items-center justify-center">
                        <img src="{{ $slide['src'] }}" alt="{{ $slide['alt'] ?? 'Logo' }}"
                             class="max-w-44 w-auto object-contain rounded-md" loading="lazy"
                             decoding="async">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@else
<section class="bg-gray-100 logo-carousel-section flex w-full flex-col items-center justify-center py-10 md:py-16" aria-label="{{ __('Partner logos') }}">
    <p class="px-4 text-center text-sm text-slate-600">
        Add filenames to <code>$logoCarouselFilenames</code> in <code>logo_carousel.blade.php</code>, or pass <code>$logoCarouselSlides</code>.
    </p>
</section>
@endif
