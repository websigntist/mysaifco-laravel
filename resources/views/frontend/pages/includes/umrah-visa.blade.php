@php
    $quickFacts = [
        ['title' => 'Processing Time', 'value' => 'Usually 2 - 5<br>Working days',
         'icon'  => 'c98.svg'],
        ['title' => 'Visa Type', 'value' => 'Saudi Umrah Visa /<br>Saudi Visit Visa for Umrah',
         'icon'  => '247visa.svg'],
        ['title' => 'Support From', 'value' => 'All Emirates in UAE, Dubai, Sharjah<br>Abu Dhabi &amp; more',
         'icon'  => 'c5656.svg'],
        ['title' => 'Assistance', 'value' => 'Visa, hotel, transport, flights,<br>and Umrah package support',
         'icon'  => 'e89.svg'],
    ];

    $requiredDocs = [
        ['text' => 'Passport copy (clear colored copy)',                         'icon' => 'r56.svg'],
        ['text' => 'Passport size photograph with white background',             'icon' => 'v56.svg'],
        ['text' => 'UAE residence visa copy, if applicable',                     'icon' => 'v98.svg'],
        ['text' => 'Vaccination certificate, if required',                       'icon' => 'a655.svg'],
        ['text' => 'Hotel / transport / flight details, depending on visa type', 'icon' => '988.svg'],
    ];

    $visaFor = [
        'Perform Umrah in Makkah',
        'Visit Madinah',
        'Travel wih family',
        'Book Umrah without ful package',
        'Combine visa with hotel and transport',
    ];

    $applySteps = [
        ['title' => 'Send <br> Documents', 'icon' => 't5632.svg'],
        ['title' => 'Our Visa Team checks <br> Eligibility',         'icon' => 'g89.svg'],
        ['title' => 'Application is Submitted', 'icon' => 'bc65.svg'],
        ['title' => 'Receive Visa by <br> WhatsApp / Email',                 'icon' => 'n560.svg'],
        ['title' => 'Travel for<br>Umrah',                 'icon' => 'x89.svg'],
    ];

    $importantNotes = [
        'Visa approval is subject to Saudi immigration',
        'Rules may change without prior notice',
        'Passport should usually have at least  month validity',
        'Umrah Visa is not valid for Hajj',
        'Hotel / transport booking may be required depending on current Saudi rules',
    ];

    $whyChoose = [
        ['text' => 'Since 2008',                    'icon' => 'h56.svg'],
        ['text' => 'Dubai Licensed Travel Company',  'icon' => '0256.svg'],
        ['text' => '50,000+ travelers served',       'icon' => '06565.svg'],
        ['text' => 'Umrah Visa and Package support', 'icon' => '870.svg'],
        ['text' => 'WhatsApp Assistance',            'icon' => 'k989.svg'],
        ['text' => 'Office in Deira Dubai',          'icon' => 'l56.svg'],
    ];
@endphp
@php
    $cmsPage = page_body_content('umrah-visa');
    $sections = ($cmsPage && $cmsPage->sections) ? $cmsPage->sections : collect([]);

    $sec = [];
    for ($i = 0; $i < 50; $i++) {
        $sec[$i] = $sections->get($i);
    }
@endphp
{{-- ===== Quick facts strip ===== --}}
<section class="pt-5">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4">
            @foreach($quickFacts as $fact)
                <div class="flex flex-col items-center text-center px-4 py-4 md:border-r border-gray-200 last:border-r-0">
                    <img src="{{ asset('assets/images/icons/' . $fact['icon']) }}" alt="">
                    <h3 class="font-heading italic font-bold text-lg mt-3 text-mst-gray">{{ $fact['title'] }}</h3>
                    <p class="font-body text-sm text-mst-gray mt-1 leading-snug">{!! $fact['value'] !!}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
{{-- ===== Required Documents + What This Visa is For ===== --}}
<section class="pt-12">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Required Documents --}}
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 md:p-8">
                <h3 class="font-heading font-bold text-xl text-mst-gray mb-6">Required Documents</h3>
                <ul class="space-y-3">
                    @foreach($requiredDocs as $doc)
                        <li class="flex items-center gap-4">
                            <span class="w-9 h-9 flex-shrink-0 rounded-lg bg-[#EAF2FB] flex items-center justify-center">
                                <img src="{{ asset('assets/images/icons/' . $doc['icon']) }}" alt="">
                            </span> <span class="font-body text-sm text-mst-gray">{{ $doc['text'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{-- What This Visa is For --}}
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 md:p-8">
                <h3 class="font-heading font-bold text-xl text-mst-gray mb-6">What This Visa is For?</h3>
                <ul class="space-y-3">
                    @foreach($visaFor as $item)
                        <li class="flex items-center gap-4">
                            <img src="{{ asset('assets/images/icons/check-bullet.svg') }}" alt="">
                            <span class="font-body text-sm text-mst-gray">{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
{{-- ===== How to Apply ===== --}}
<section class="pt-12">
    <div class="container mx-auto">
        <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 md:p-10">
            <h2 class="font-heading italic font-bold text-3xl text-mst-gray text-center mb-10">How to
                <span class="text-mst">Apply?</span></h2>
            <div class="grid grid-cols-1 sm:grid-cols-5 gap-8 sm:gap-2">
                @foreach($applySteps as $i => $step)
                    <div class="relative flex flex-col items-center text-center">
                        @if(!$loop->last)
                            <span class="hidden sm:block absolute top-20 left-1/2 w-full border-t-2 border-dashed border-gray-300" aria-hidden="true"></span>
                        @endif
                        <div class="w-9 h-9 pt-2 pb-3 rounded-full bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                        text-white
                        font-heading italic text-xl flex items-center justify-center mb-4 relative z-10">
                            {{ $i + 1 }}
                        </div>
                        <div class="w-16 h-16 rounded-full bg-white shadow-md flex items-center justify-center mb-4 relative z-10">
                            <img src="{{ asset('assets/images/icons/' . $step['icon']) }}" class="w-10" alt="">
                        </div>
                        <h4 class="font-heading font-bold text-base text-mst-gray leading-tight">{!! $step['title'] !!}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
{{-- ===== Important Notes + Why choose Saifco ===== --}}
<section class="pt-12">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Important Notes --}}
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 md:p-8">
                <h3 class="font-heading font-bold text-xl text-mst-gray mb-6">Important Notes</h3>
                <ul class="space-y-5">
                    @foreach($importantNotes as $note)
                        <li class="flex items-start gap-4">
                            <img src="{{ asset('assets/images/icons/check-bullet.svg') }}" alt="">
                            <span class="font-body text-sm text-mst-gray">{{ $note }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{-- Why choose Saifco --}}
            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 md:p-8">
                <h3 class="font-heading italic font-bold text-2xl text-mst-gray mb-6">Why <span class="text-mst">choose Saifco?</span>
                </h3>
                <ul class="space-y-3">
                    @foreach($whyChoose as $why)
                        <li class="flex items-center gap-4">
                            <img src="{{ asset('assets/images/icons/' . $why['icon']) }}" alt="">
                            <span class="font-body text-sm text-mst-gray">{{ $why['text'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@include('frontend.components.testimonials');
{{-- FAQs --}}
@php
    $faq_title = $sec[0]->section_heading ?? '';
    $faq_desc = $sec[0]->section_description ?? '';
@endphp
<div class="container mx-auto">
    <div class="md:w-8/12 mx-auto text-center">
        <h1 class="text-3xl md:text-4xl">
            {!! format_two_color_heading($faq_title) !!}
        </h1>
        <p class="mt-4 mx-auto">{!! $faq_desc !!}</p>
    </div>
</div>
@include('frontend.components.tour_faqs')
{{-- related services --}}
<section class="relatedServices py-12 bg-white">
    <div class="container mx-auto">
        <div class="mb-8">
            <h2 class="font-heading italic font-bold text-3xl text-mst-gray">Related
                <span class="text-mst">Services</span></h2>
            <p class="font-body text-gray-700 mt-2">Quick access to what travelers explore most—making it easier to find
                                                    the right experience without the search</p>
        </div>
        @include('frontend.components.related_services', ['limit' => 6, 'position' => 'first', 'cols' => 6])
    </div>
</section>
@include('frontend.components.footerContactBar');
@include('frontend.components.explore_dubai')
