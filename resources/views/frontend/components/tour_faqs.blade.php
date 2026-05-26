@php
    $faqs = $faqs ?? collect();
    $tourType = $tourType ?? null;

    $faqBtnClass = 'faq-accordion-btn flex w-full items-center justify-between gap-4 border-0 bg-transparent px-5 py-5 font-heading text-lg font-semibold text-left text-mst-gray transition [&[aria-expanded=\'true\']]:text-white';
    $faqCardClass = 'faqmst overflow-hidden rounded-lg border border-gray-200 bg-white transition';

    $faqItems = $faqs->values()->map(function ($faq, $index) {
        return [
            'question' => $faq->title,
            'answer'   => $faq->description,
            'open'     => $index === 0,
        ];
    })->all();

    $half = (int) ceil(count($faqItems) / 2);
    $faqColumns = [
        array_slice($faqItems, 0, $half),
        array_slice($faqItems, $half),
    ];
@endphp
@if(count($faqItems) > 0)
    <section class="flex items-center justify-center pt-14 pb-18">
        <div class="container mx-auto px-4">
            <div class="mx-auto text-center">
                <h1>
                    <span>Frequently Asked  </span><span class="text-mst">Questions</span>
                </h1>
                <p class="mt-4 text-center mx-auto md:w-7/12">
                    @if($tourType && filled($tourType->title))
                        Find answers to frequently asked questions about Dubai tours, desert safari, holiday packages, Umrah services, and global visa assistance to help you plan your journey with ease.
                    @else
                        Find answers to frequently asked questions about Dubai tours, desert safari, holiday packages, Umrah services, and global visa assistance to help you plan your journey with ease.
                    @endif
                </p>
            </div>
            <div id="accordion-card" class="faq-disert-safari mt-14" data-accordion="collapse">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-x-10">
                    @foreach ($faqColumns as $columnIndex => $columnItems)
                        @if(count($columnItems) > 0)
                            <div class="flex flex-col gap-4">
                                @foreach ($columnItems as $itemIndex => $faq)
                                    @php
                                        $faqNumber = ($columnIndex * $half) + $itemIndex + 1;
                                        $isOpen = $faq['open'];
                                    @endphp
                                    <div class="{{ $faqCardClass }}">
                                        <h2 id="faq-{{ $faqNumber }}">
                                            <button type="button"
                                                    class="{{ $faqBtnClass }}"
                                                    data-accordion-target="#faq-body-{{ $faqNumber }}"
                                                    aria-expanded="{{ $isOpen ? 'true' : 'false' }}"
                                                    aria-controls="faq-body-{{ $faqNumber }}">
                                                <span>{{ $faq['question'] }}</span>
                                                <svg data-accordion-icon class="h-5 w-5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                                                </svg>
                                            </button>
                                        </h2>
                                        <div id="faq-body-{{ $faqNumber }}"
                                             class="{{ $isOpen ? '' : 'hidden' }} px-5 pb-5"
                                             aria-labelledby="faq-{{ $faqNumber }}">
                                            <p class="font-body text-sm leading-relaxed text-white">{{ $faq['answer'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <a href="" class="flex items-center justify-center w-fit text-white text-lg px-5 pt-2 pb-2 rounded-full mx-auto
                                                        bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                                                         hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                                                         transition duration-300 font-heading italic mt-8"> Explore all FAQs
                <img src="{{asset('assets/images/icons/btn-arrow.svg')}}"
                     class="w-5 ms-1"
                     alt="arrow"> </a>
        </div>
    </section>
@endif
