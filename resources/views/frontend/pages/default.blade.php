@extends('frontend.layouts.master')
@section('content')
    @php
        $topTitileBaner = ! empty($pageImageUrl)
            ? $pageImageUrl
            : asset('assets/images/sliders/560650.webp');
    @endphp
    {{--===== top banner ======--}}
    @php $slug = request()->segment(1); @endphp
    @if(!in_array($slug, ['umrah-for-single-lady','faqs','umrah-faqs','blogs','about-us','contact-us',
    'single-tour-details','terms-conditions','privacy-policy']))
        <section class="flex justify-center items-center border-b-1 border-gray-200">
            <div class="px-4 relative flex min-h-[400px] w-full
                    items-center justify-center overflow-hidden">
                <div class="absolute inset-0 scale-105 bg-cover bg-top bg-no-repeat"
                     style="background-image: url('{{ $topTitileBaner }}')"
                     aria-hidden="true"></div>
                {{--@dump($explore_uae)--}}
                <div class="absolute inset-0 bg-gray-950/25" aria-hidden="true"></div>
                <div class="relative z-10 w-full py-14">
                    <div class="container mx-auto">
                        <div class="grid grid-cols-1 md:grid-cols-[0.7fr_1fr] gap-6">
                            <div class="flex flex-col justify-center">
                                <ul class="flex items-center justify-start gap-5">
                                    <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                        <div class="text-white text-xl font-medium text-center italic font-heading">
                                            {{ $explore_uae[0]->title1 }}
                                        </div>
                                        <div class="text-white text-xs text-center">{{ $explore_uae[0]->sub_title1 }}</div>
                                    </li>
                                    <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                        <div class="text-white text-xl font-medium text-center italic font-heading">
                                            {{ $explore_uae[0]->title2 }}
                                        </div>
                                        <div class="text-white text-xs text-center">{{ $explore_uae[0]->sub_title2 }}</div>
                                    </li>
                                    <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                        <div class="text-white text-xl font-medium text-center italic font-heading">
                                            {{ $explore_uae[0]->title3 }}
                                        </div>
                                        <div class="text-white text-xs text-center">{{ $explore_uae[0]->sub_title3 }}</div>
                                    </li>
                                </ul>
                                <ul class="flex items-center justify-start gap-5 mt-5">
                                    <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                        <div class="text-white text-xl font-medium text-center italic font-heading">
                                            {{ $explore_uae[0]->title5 }}
                                        </div>
                                        <div class="text-white text-xs text-center">{{ $explore_uae[0]->sub_title5 }}</div>
                                    </li>
                                    <li class="bg-mst px-4 pt-3 pb-4 w-full rounded-lg space-y-1">
                                        <div class="text-white text-xl font-medium text-center italic font-heading">
                                            {{ $explore_uae[0]->sub_title4 }}
                                        </div>
                                        <div class="text-white text-xs text-center">{{ $explore_uae[0]->sub_title4 }}</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex items-center justify-end">
                                <div class="bg-gray-50 rounded-xl pt-3 pb-4 px-4 border border-gray-200 space-y-4 w-96 h-40">
                                    <div class="font-heading font-bold italic text-xl capitalize mb-3">
                                        Contact with <span class="text-mst">Us</span>
                                    </div>
                                    <div class="bg-gray-50 rounded-xl p-4 border gap-3 border-gray-200 flex item-center justify-start">
                                        <img src="{{asset('assets/images/icons/whatsapp.svg')}}" class="w36" alt="whatsapp">
                                        <a href="tel:https://wa.me/{{ get_setting('tour_inquiry_whatsapp') }}?text=Hello%2C%20I%20am%20interested">
                                            <div class="font-heading font-bold italic text-mst text-xl">Tour Inquires
                                                <br>
                                                <span class="text-mst-gray">{{ get_setting('tour_inquiry_whatsapp') }}</span>
                                            </div>
                                        </a>
                                        <img src="{{asset('assets/images/icons/line-arrow.svg')}}" class="w36 ml-auto" alt="arrow">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    {{--===== page content ======--}}
    <div class="cms-page">
        @if($page->show_title == '1' && filled($page->page_title))
            <section class="flex justify-center py-8">
                <div class="container mx-auto">
                    @if($page && ($page->show_title ?? '0') == '1' && filled($page->page_title))
                        @php
                            $words    = explode(' ', $page->page_title);
                            $count    = count($words);
                            $spanN    = $count >= 3 ? 2 : 1;  // 3+ words = last 2, 2 words = last 1
                            $mainText = implode(' ', array_slice($words, 0, -$spanN));
                            $spanText = implode(' ', array_slice($words, -$spanN));
                        @endphp

                        <h1 class="text-center">
                            <span>{{ $mainText }} </span><span class="text-mst">{{ $spanText }}</span>
                        </h1>
                    @endif

                    @if(filled($page->sub_title))
                        <p class="mt-3 text-lg text-center">{{ $page->sub_title }}</p>
                    @endif
                </div>
            </section>
        @endif

        @if(filled($pageContent ?? null))
            <div class="-container mx-auto">
                {!! $pageContent !!}
            </div>
        @endif
    </div>
@endsection
