@php
    $tours = $tours ?? collect();
@endphp
<section>
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 relative mt-8 -mx-4 px-4 sm:mx-0 sm:px-0">
            @forelse($tours as $tour)
                <div class="!h-auto">
                    <article class="best-seller-card flex h-full flex-col overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
                        <a href="{{ $tour->frontendUrl() }}" class="relative block aspect-[16/10] shrink-0 overflow-hidden">
                            <img
                                src="{{ $tour->imageUrl() }}"
                                alt="{{ $tour->image_alt ?? $tour->title }}"
                                class="h-full w-full object-cover transition duration-300 hover:scale-105"
                                loading="lazy"
                                width="400"
                                height="250">
                            @if($tour->redTag && filled($tour->redTag->title))
                                <span class="absolute left-3 top-3 rounded-full bg-red-600 px-3 py-1 text-xs text-white shadow-sm">
                                    {{ $tour->redTag->title }}
                                </span>
                            @endif
                        </a>
                        <div class="flex flex-1 flex-col p-4">
                            <h2 class="line-clamp-2 text-left">
                                <a href="{{ $tour->frontendUrl() }}"
                                   class="hover:text-mst transition ease-in-out duration-500 line-clamp-1 mb-4">
                                    {{ $tour->title }}
                                </a>
                            </h2>
                            @if(filled($tour->tour_duration))
                                <div class="mt-2 text-xs text-gray-700 font-heading text-left">
                                    <span class="text-amber-400">&#9733;</span>4.9/5  |  5.1k Reviews  | 3 Hours {{--{{ $tour->tour_duration }}--}}
                                </div>
                            @endif
                            <div class="mt-auto flex items-end justify-between gap-3 pt-4">
                                <div>
                                    <p class="text-xs text-fine -mb-1 text-left">Starting</p>
                                    <p class="font-heading text-xl font-bold text-mst-gray">
                                        AED {{ number_format((float) $tour->price, 0) }}
                                        <span class="text-sm font-normal text-gray-600">/person</span>
                                    </p>
                                </div>
                                <a href="{{ $tour->frontendUrl() }}"
                                   class="inline-flex shrink-0 items-center gap-1 rounded-full px-4 py-2 text-sm font-light text-white bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                                    Book Now
                                    <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4 ms-1" alt="">
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            @empty
                <p class="col-span-full py-12 text-center text-gray-600">No tour packages found for this category.</p>
            @endforelse
        </div>
    </div>
</section>
