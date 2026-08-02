{{-- Reusable vaccination center card --}}
@php
    $centerName = $name ?? $title ?? '';
    $centerAddress = $address ?? '';
    $centerPhone = $phone ?? '';
    $mapUrl = $map ?? $map_url ?? '#';

    $imgSrc = imageNotFound();
    if (!empty($image)) {
        if (str_contains($image, '/')) {
            $imgSrc = asset($image);
        } elseif (file_exists(public_path('assets/images/vaccination-centers/' . $image))) {
            $imgSrc = asset('assets/images/vaccination-centers/' . $image);
        } elseif (file_exists(public_path('assets/images/vaccine/' . $image))) {
            $imgSrc = asset('assets/images/vaccine/' . $image);
        }
    }
@endphp
<div class="bg-white border border-gray-300 rounded-2xl overflow-hidden flex flex-col shadow-sm hover:shadow-md transition duration-300">
    <div class="h-52 w-full overflow-hidden">
        <img src="{{ $imgSrc }}"
             alt="{{ $centerName }}"
             class="w-full h-full object-cover">
    </div>
    <div class="p-5 flex flex-col flex-1">
        <h3 class="font-heading font-bold not-italic text-xl mb-4 text-mst-gray">{{ $centerName }}</h3>

        @if(!empty($centerAddress))
            <div class="flex items-start gap-2 mb-2 font-heading">
                <img src="{{ asset('assets/images/icons/002213.svg') }}" class="w-4 mt-1 flex-shrink-0" alt="location">
                <span class="text-xs text-mst-gray leading-6">{{ $centerAddress }}</span>
            </div>
        @endif

        @if(!empty($centerPhone))
            <div class="flex items-center gap-2 mb-5 font-heading">
                <img src="{{ asset('assets/images/icons/5650.svg') }}" class="w-4 flex-shrink-0" alt="phone">
                <a href="tel:{{ $centerPhone }}" class="text-xs text-mst-gray hover:text-mst transition">{{ $centerPhone }}</a>
            </div>
        @endif

        <a href="{{ $mapUrl }}" target="_blank" rel="noopener"
           class="mt-auto inline-flex items-center justify-center w-fit gap-2 text-sm px-4 pt-1 pb-2 rounded-full
           font-heading italic text-white
                  bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300">
            Get Direction on Maps
            <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4" alt="">
        </a>
    </div>
</div>
