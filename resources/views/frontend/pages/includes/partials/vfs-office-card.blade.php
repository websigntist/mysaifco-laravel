{{-- Reusable VFS/Tasheer office card. Expects: $city, $address, $centre, $hours, $map --}}
<div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 flex flex-col">
    <div class="flex items-center gap-3 mb-5">
        <img src="{{ asset('assets/images/icons/099.svg') }}" class="w-6" alt="">
        <h3 class="font-heading italic font-bold text-xl text-mst-gray">{{ $city }} <span class="text-mst">Office</span></h3>
    </div>

    <div class="flex items-start gap-3 mb-3">
        <img src="{{ asset('assets/images/icons/787.svg') }}" class="w-6" alt="">
        <span class="text-sm text-mst-gray leading-6">{!! $address !!}</span>
    </div>

    <div class="flex items-center gap-3 mb-3">
        <img src="{{ asset('assets/images/icons/099.svg') }}" class="w-5" alt="">
        <span class="text-sm text-mst-gray">{{ $centre }}</span>
    </div>

    <hr class="border-gray-200 my-2">

    <div class="flex items-center gap-3 mb-6 mt-1">
        <img src="{{ asset('assets/images/icons/46.svg') }}" class="w-6" alt="">
        <span class="text-sm text-mst-gray">{{ $hours }}</span>
    </div>

    <a href="{{ $map }}" target="_blank" rel="noopener"
       class="mt-auto inline-flex items-center justify-center w-fit gap-2 text-md px-6 pt-2 pb-2.5 rounded-full
              font-heading italic text-white
              bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300">
        Get Directions
        <img src="{{ asset('assets/images/icons/787.svg') }}" class="w-5 brightness-0 invert" alt="">
    </a>
</div>
