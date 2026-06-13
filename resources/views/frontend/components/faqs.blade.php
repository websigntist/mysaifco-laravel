@php
    $faqs = ($faqs ?? collect())->values();
    $faqImage = $faqImage ?? 'faq-img.webp';
    $faqBtnClass = 'faq-accordion-btn flex w-full items-center justify-between gap-3 rounded-lg border border-gray-200 bg-white px-2 py-4 font-heading text-md font-medium text-mst-gray transition md:px-3 [&[aria-expanded=\'true\']]:rounded-b-none [&[aria-expanded=\'true\']]:border-transparent [&[aria-expanded=\'true\']]:bg-gradient-to-r [&[aria-expanded=\'true\']]:from-mst [&[aria-expanded=\'true\']]:to-mst-dark [&[aria-expanded=\'true\']]:text-white [&[aria-expanded=\'true\']]:shadow-none';
@endphp
@if($faqs->isNotEmpty())
    <section class="flex item-center justify-center pt-14 pb-18">
        <div class="container mx-auto">
            <div class="mx-auto text-center">
                <h1>
                    <span>Frequently Asked  </span><span class="text-mst">Questions</span>
                </h1>
                <p class="mt-4 text-center mx-auto md:w-7/12">
                    Find answers to frequently asked questions about Dubai tours, desert safari, holiday packages, Umrah
                    services, and global visa assistance to help you plan your journey with ease.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-14 items-center">
                <div>
                    <div id="accordion-card" class="faq-disert-safari flex flex-col gap-4" data-accordion="collapse">
                        @foreach($faqs as $faq)
                            @php
                                $faqNumber = $loop->iteration;
                                $isFirst = $loop->first;
                            @endphp
                            <div class="faqmst overflow-hidden rounded-lg border border-gray-200 bg-white transition">
                                <h2 id="faq-{{ $faqNumber }}">
                                    <button type="button"
                                            class="faq-accordion-btn flex w-full items-center justify-between gap-4 border-0 bg-transparent px-5 py-5 font-heading text-lg font-semibold text-left text-mst-gray transition [&[aria-expanded='true']]:text-white"
                                            data-accordion-target="#faq-body-{{ $faqNumber }}"
                                            aria-expanded="{{ $isFirst ? 'true' : 'false' }}"
                                            aria-controls="faq-body-{{ $faqNumber }}">
                                        <span>{{ $faq->title }}</span>
                                        <svg data-accordion-icon class="h-5 w-5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                                        </svg>
                                    </button>
                                </h2>
                                <div id="faq-body-{{ $faqNumber }}"
                                     class="{{ $isFirst ? '' : 'hidden' }} px-5 pb-5"
                                     aria-labelledby="faq-{{ $faqNumber }}">
                                    <p class="font-body text-sm leading-relaxed text-white">{{ $faq->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-end">
                    @php $slug = request()->segment(1); @endphp

                    @if($slug == '')
                        <img src="{{ asset('assets/images/faq-img.webp') }}"
                             alt="Frequently asked questions"
                             class="max-w-full h-auto">
                    @elseif($slug == 'all-tour-categories')
                        <img src="{{ asset('assets/images/Intersect.webp') }}"
                             alt="Frequently asked questions"
                             class="max-w-full h-auto">
                    @endif
                </div>
            </div>
            <a href="" class="flex items-center justify-center w-fit text-white text-lg px-5 pt-2 pb-2 rounded-full mx-auto
                                                        bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                                                         hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                                                         transition duration-300 font-heading italic mt-8"> Explore all
                                                                                                            FAQs
                <img src="{{ asset('assets/images/icons/btn-arrow.svg') }}"
                     class="w-5 ms-1"
                     alt="arrow"> </a>
        </div>
    </section>
@endif
