{{-- Reusable vaccination center card. Expects: $image, $name, $address, $phone, $map --}}
<div class="bg-white border border-gray-500 rounded-2xl overflow-hidden flex flex-col">
    <img src="{{ asset('assets/images/vaccine/' . $image) }}"
         alt="{{ $name }}"
         class="w-full h-full object-cover">
    <div class="p-5 flex flex-col flex-1">
        <h3 class="font-heading font-bold not-italic text-xl mb-4">{{ $name }}</h3>

        <div class="flex items-start gap-2 mb-2 font-heading">
            <img src="{{ asset('assets/images/icons/002213.svg') }}" class="w-4 mt-1 flex-shrink-0" alt="location">
            <span class="text-xs text-mst-gray leading-6">{{ $address }}</span>
        </div>

        <div class="flex items-center gap-2 mb-5 font-heading">
            <img src="{{ asset('assets/images/icons/5650.svg') }}" class="w-4 flex-shrink-0" alt="phone">
            <a href="tel:{{ $phone }}" class="text-xs text-mst-gray">{{ $phone }}</a>
        </div>

        <a href="{{ $map }}" target="_blank" rel="noopener"
           class="mt-auto inline-flex items-center justify-center w-fit gap-2 text-sm px-4 pt-1 pb-2 rounded-full
           font-heading italic text-white
                  bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300">
            Get Direction on Maps
            <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4" alt="">
        </a>
    </div>
</div>
