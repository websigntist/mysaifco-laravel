@php
    $airPackages = \App\Models\backend\UmrahAirPackage::published()
        ->orderBy('ordering', 'asc')
        ->orderByDesc('id')
        ->get();
@endphp

@if($airPackages->isNotEmpty())
    <div class="single-packages">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            @foreach($airPackages as $package)
                <div class="bg-gray-50 rounded-3xl border border-gray-200 p-4 flex flex-col justify-between">
                    <div>
                        <!-- Header Image Container -->
                        <div class="relative pb-6">
                            <!-- Image Wrapper -->
                            <div class="relative w-full aspect-[4/3] rounded-2xl overflow-hidden">
                                <img src="{{ $package->imageUrl() }}"
                                     class="w-full h-full object-cover"
                                     alt="{{ $package->image_alt ?: $package->title }}"
                                     title="{{ $package->image_title ?: $package->title }}">
                                <!-- Bottom Gradient Overlay -->
                                <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gradient-to-t from-black/75 via-black/50 to-transparent"></div>
                                <!-- Title -->
                                <div class="absolute bottom-16 left-0 right-0 px-2 text-center">
                                    <h3 class="text-white text-[22px] font-bold italic font-heading capitalize leading-tight">
                                        {{ $package->title }}
                                    </h3>
                                </div>
                            </div>
                            <!-- Hanging Badge -->
                            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 translate-y-1/2 z-10 w-[90%] md:w-[78%] bg-gradient-to-r from-[#BA9B31] to-[#74611E] rounded-full py-4 px-6 flex items-center justify-between text-white">
                                <!-- Price -->
                                <div class="flex items-center gap-1.5">
                                    <img src="{{ asset('assets/images/icons/icon5.svg') }}" alt="Price">
                                    <div class="flex flex-col text-left">
                                        <span class="text-xs text-white tracking-wider leading-none">Price Per Head</span>
                                        <span class="text-xs md:text-sm font-medium text-white leading-none mt-1">
                                            {{ $package->currency ?? 'AED' }} {{ $package->price }}
                                        </span>
                                    </div>
                                </div>
                                <!-- Dot -->
                                <span class="text-white text-lg font-bold select-none">•</span>
                                <!-- Min People -->
                                <div class="flex items-center gap-1.5">
                                    <img src="{{ asset('assets/images/icons/gr3.svg') }}" alt="Min People">
                                    <div class="flex flex-col text-left">
                                        <span class="text-xs text-white tracking-wider leading-none">Min People</span>
                                        <span class="text-xs md:text-sm font-medium text-white leading-none mt-1">
                                            {{ $package->min_people ?? '2 Persons' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Accommodation Info Block -->
                        <div class="mt-4 space-y-4">
                            <!-- Hotel Box 1 (Makkah) -->
                            <div class="bg-gray-100 rounded-2xl p-3 flex gap-3.5">
                                <div class="rounded-xl overflow-hidden flex-shrink-0 w-24 h-24">
                                    <img src="{{ $package->makkahImageUrl() }}" class="w-full h-full object-cover" alt="Makkah Hotel">
                                </div>
                                <div class="flex-grow flex flex-col justify-center min-w-0">
                                    <h4 class="text-[18px] font-bold italic font-heading leading-tight mb-1 truncate">
                                        {{ $package->makkah_nights_title ?? '3 Nights in Makkah' }}
                                    </h4>
                                    <div class="flex items-center gap-1 text-gray-700 mt-2 mb-3">
                                        <img src="{{ asset('assets/images/icons/redmark.svg') }}" alt="">
                                        <span class="text-xs font-medium truncate">{{ $package->makkah_hotel ?? 'Pullman Zamzam or Similar' }}</span>
                                    </div>
                                    <div class="flex items-center gap-1 text-[#282828]">
                                        <img src="{{ asset('assets/images/icons/star.svg') }}" alt="">
                                        <span class="text-xs text-gray-500 font-medium">
                                            <strong class="text-gray-800">{{ $package->makkah_rating ?? '4.9/5' }}</strong> <span class="mx-0.5 text-gray-300">|</span> {{ $package->makkah_reviews ?? '5.1k Reviews' }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Hotel Box 2 (Madinah) -->
                            <div class="bg-gray-100 rounded-2xl p-3 flex gap-3.5">
                                <div class="rounded-xl overflow-hidden flex-shrink-0 w-24 h-24">
                                    <img src="{{ $package->madinahImageUrl() }}" class="w-full h-full object-cover" alt="Madinah Hotel">
                                </div>
                                <div class="flex-grow flex flex-col justify-center min-w-0">
                                    <h4 class="text-[18px] font-bold italic font-heading leading-tight mb-1 truncate">
                                        {{ $package->madinah_nights_title ?? '2 Nights in Madinah' }}
                                    </h4>
                                    <div class="flex items-center gap-1 text-gray-700 mt-2 mb-3">
                                        <img src="{{ asset('assets/images/icons/redmark.svg') }}" alt="">
                                        <span class="text-xs font-medium truncate">{{ $package->madinah_hotel ?? 'Madina Movenpick or Similar' }}</span>
                                    </div>
                                    <div class="flex items-center gap-1 text-[#282828]">
                                        <img src="{{ asset('assets/images/icons/star.svg') }}" alt="">
                                        <span class="text-xs text-gray-500 font-medium">
                                            <strong class="text-gray-800">{{ $package->madinah_rating ?? '4.9/5' }}</strong> <span class="mx-0.5 text-gray-300">|</span> {{ $package->madinah_reviews ?? '5.1k Reviews' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="mt-5 flex items-center justify-between sm:gap-3 px-3">
                        <a href="{{ umrah_whatsapp_url() }}"
                           target="_blank"
                           class="flex items-center justify-center mx-auto w-fit text-white px-6 pt-1 pb-2 rounded-full text-sm bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                            Package Inquiry
                            <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4 mt-1 ms-1" alt="">
                        </a>
                        <a href="tel:{{ get_setting('mobile_number') }}"
                           class="flex items-center justify-center mx-auto w-fit text-white px-6 pt-1 pb-2 rounded-full text-sm bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                            Call me Back
                            <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}" class="w-4 mt-1 ms-1" alt="">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
    <h1 class="text-center py-10">Packages Not Found</h1>
@endif
