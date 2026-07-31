@php
    $slug = request()->route('slug') ?? ($page->friendly_url ?? '');
    $trustbar = !empty($page?->show_trust_bar) && $page->show_trust_bar == 1;

    $currentTourType = $tourType ?? ($page?->tourType ?? null);
    $tour_type = $currentTourType ? strtolower($currentTourType->friendly_url ?? $currentTourType->title ?? '') : $slug;
@endphp

{{-- ===== Trust Bar Start ===== --}}
@if($trustbar && ($tour_type === 'umrah' || $slug === 'umrah'))
    <section class="trust-bar -mt-16 relative z-1">
        <div class="container mx-auto">
            <div class="bg-white border border-gray-300 rounded-3xl grid grid-cols-1 md:grid-cols-4 py-8 px-4 md:px-8">
                <!-- Card 1: Experience -->
                <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('assets/images/icons/starbadge.svg') }}" alt="Experience Icon" class="w-full h-full object-contain">
                    </div>
                    <div class="font-heading italic font-bold text-mst-gray text-center leading-tight">
                        17+ Years<br>Experience
                    </div>
                </div>
                <!-- Card 2: Travelers Served -->
                <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('assets/images/icons/17years.svg') }}" alt="Travelers Icon" class="w-full h-full object-contain">
                    </div>
                    <div class="font-heading italic font-bold text-mst-gray text-center leading-tight">
                        50,000+ Travelers<br>Served
                    </div>
                </div>
                <!-- Card 3: Customer Support -->
                <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('assets/images/icons/support2.svg') }}" alt="Support Icon" class="w-full h-full object-contain">
                    </div>
                    <div class="font-heading italic font-bold text-mst-gray text-center leading-tight">
                        24/7 Customer<br>Support
                    </div>
                </div>
                <!-- Card 4: Best Price Guaranteed -->
                <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('assets/images/icons/dbadge.svg') }}" alt="Best Price Icon" class="w-full h-full object-contain">
                    </div>
                    <div class="font-heading italic font-bold text-mst-gray text-center leading-tight">
                        Best Price<br>Guaranted
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
{{-- ===== Trust Bar End ===== --}}

{{-- ===== Trust Bar Start ===== --}}
@if($trustbar && ($tour_type === 'umrah-by-bus' || $slug === 'umrah-by-bus'))
    <section class="trust-bar py-12 -mt-28 relative z-1">
        <div class="container mx-auto">
            <div class="bg-white border border-gray-300 rounded-3xl grid grid-cols-1 md:grid-cols-4 py-8 px-4 md:px-8">
                <!-- Card 1: Experience -->
                <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('assets/images/icons/starbadge.svg') }}" alt="Experience Icon" class="w-full h-full object-contain">
                    </div>
                    <div class="font-heading italic font-bold text-mst-gray text-center leading-tight">
                        17+ Years<br>Experience
                    </div>
                </div>
                <!-- Card 2: Travelers Served -->
                <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('assets/images/icons/17years.svg') }}" alt="Travelers Icon" class="w-full h-full object-contain">
                    </div>
                    <div class="font-heading italic font-bold text-mst-gray text-center leading-tight">
                        50,000+ Travelers<br>Served
                    </div>
                </div>
                <!-- Card 3: Customer Support -->
                <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('assets/images/icons/support2.svg') }}" alt="Support Icon" class="w-full h-full object-contain">
                    </div>
                    <div class="font-heading italic font-bold text-mst-gray text-center leading-tight">
                        24/7 Customer<br>Support
                    </div>
                </div>
                <!-- Card 4: Best Price Guaranteed -->
                <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('assets/images/icons/dbadge.svg') }}" alt="Best Price Icon" class="w-full h-full object-contain">
                    </div>
                    <div class="font-heading italic font-bold text-mst-gray text-center leading-tight">
                        Best Price<br>Guaranted
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
{{-- ===== Trust Bar End ===== --}}

@if($trustbar && ($tour_type === 'umrah-visa' || $slug === 'umrah-visa'))
    <section class="trust-bar -mt-16 relative z-1">
        <div class="container mx-auto">
            <div class="bg-white border border-gray-300 rounded-3xl grid grid-cols-1 md:grid-cols-4 py-8 px-4 md:px-8">
                <!-- Card 1: Experience -->
                <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('assets/images/icons/q5656.svg') }}" alt="Experience Icon" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <div class="font-heading italic font-bold text-mst-gray text-center leading-tight">
                            Dubai Licensed
                        </div>
                        <p class="text-sm mt-2">Travel Company</p>
                    </div>
                </div>
                <!-- Card 2: Travelers Served -->
                <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('assets/images/icons/d56.svg') }}" alt="Travelers Icon" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <div class="font-heading italic font-bold text-mst-gray leading-tight">
                            Since 2008
                        </div>
                        <p class="text-sm mt-2">Trusted Experience</p>
                    </div>
                </div>
                <!-- Card 3: Customer Support -->
                <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('assets/images/icons/17years.svg') }}" alt="Support Icon" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <div class="font-heading italic font-bold text-mst-gray leading-tight">
                            50,000+
                        </div>
                        <p class="text-sm mt-2">Happy Travellers</p>
                    </div>
                </div>
                <!-- Card 4: Best Price Guaranteed -->
                <div class="flex items-center gap-4 justify-center py-4 md:py-2 border-b md:border-b-0 md:border-r border-gray-300 last:border-b-0 last:border-r-0">
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center">
                        <img src="{{ asset('assets/images/icons/c98.svg') }}" alt="Best Price Icon" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <div class="font-heading italic font-bold text-mst-gray leading-tight">
                            Fast Processing
                        </div>
                        <p class="text-sm mt-2">2 - 5 Working Days</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
