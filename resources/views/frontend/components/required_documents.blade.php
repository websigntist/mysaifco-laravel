@php
    $reqDocData = $reqDocData ?? \App\Models\backend\RequiredDocument::active()->orderBy('ordering', 'asc')->first();

    $docTitle = $reqDocData->title ?? 'Required Documents for Umrah Visa';
    $docSubtitle = $reqDocData->subtitle ?? 'Please ensure all documents are clear, valid and up to date.';
    $docImage = !empty($reqDocData->image) 
        ? asset('assets/images/required-documents/' . $reqDocData->image) 
        : asset('assets/images/pages/sections/umrah-1.webp');

    $docItems = $reqDocData->document_items ?? [
        ['title' => 'Clear Scans of Passport Copy', 'description' => 'Passport should be valid for 6 months and Visa should be valid for months.'],
        ['title' => '1 Passport Size Photo', 'description' => 'Passport should be valid for 6 months and Visa should be valid for months.'],
        ['title' => 'National ID Card Copy', 'description' => 'National ID Card copy (Front & Back)'],
        ['title' => 'Processing Time', 'description' => 'Umrah Visa Processing will take approximately 2-3 working days.'],
    ];

    $defaultIcons = ['scan.svg', 'photo.svg', 'idcard.svg', 'timer.svg'];
@endphp

<section class="pt-10 pb-30 bg-gray-50">
    <div class="container">
        <div class="mx-auto max-w-5xl text-center pt-12 pb-10">
            <h1>
                {!! format_two_color_heading($docTitle) !!}
            </h1>
            @if($docSubtitle)
                <div class="mt-5">
                    {!! $docSubtitle !!}
                </div>
            @endif
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
            <div class="space-y-7">
                @foreach($docItems as $index => $item)
                    @php
                        $iconFile = $defaultIcons[$index % count($defaultIcons)];
                    @endphp
                    <div class="py-4 px-6 rounded-xl border border-gray-200 bg-white text-center md:text-left">
                        <div class="flex items-center">
                            <div class="me-3 flex-shrink-0">
                                <img src="{{ asset('assets/images/icons/' . $iconFile) }}" alt="{{ strip_tags($item['title'] ?? '') }}">
                            </div>
                            <div class="">
                                <h3 class="italic">
                                    {!! format_two_color_heading($item['title'] ?? '') !!}
                                </h3>
                                @if(!empty($item['description']))
                                    <p class="text-[14px] mt-2">{!! $item['description'] !!}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex items-center justify-end">
                <img src="{{ $docImage }}"
                     width="643"
                     height="479"
                     title="{{ strip_tags($docTitle) }}"
                     alt="{{ strip_tags($docTitle) }}"
                     class="w-full object-cover rounded-xl">
            </div>
        </div>
    </div>
</section>
