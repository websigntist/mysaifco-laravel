@extends('frontend.layouts.master')
@section('content')
    @php
        $topTitleBanner = !empty($pageImageUrl)
            ? $pageImageUrl
            : asset('assets/images/pages/1782765765_6a42d8c5e0c42_image.webp');
    @endphp

    {{-- ===== CMS Page Top Banner ===== --}}
    <section class="flex justify-center items-center border-b border-gray-200">
        <div class="px-4 relative flex min-h-[400px] w-full items-center justify-center overflow-hidden">
            <div class="absolute inset-0 scale-100 bg-cover bg-top bg-no-repeat"
                 style="background-image: url('{{ $topTitleBanner }}')"
                 aria-hidden="true"></div>

            <div class="absolute inset-0 bg-gradient-to-r from-[#ffffff]/95 from-20% to-[#ffffff]/0 to-80%"
                 aria-hidden="true"></div>

            <div class="relative z-10 w-full py-14">
                <div class="container mx-auto">
                    {{-- 1. Breadcrumbs --}}
                    <nav class="breadcrumb flex items-center gap-1.5 text-sm font-heading font-bold uppercase text-mst tracking-wider mb-2" aria-label="Breadcrumb">
                        <a href="{{ url('/') }}" class="hover:underline">Home</a>
                        <svg class="w-4 h-4 text-mst" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 5 7 7-7 7"/>
                        </svg>
                        <span>{{ $page->menu_title ?? $page->page_title ?? 'Page' }}</span>
                    </nav>

                    {{-- 2. Title (Two Colors) --}}
                    @php
                        $titleRaw = $page->page_title ?? $page->menu_title ?? '';
                        if (str_contains($titleRaw, '<span')) {
                            $formattedTitle = $titleRaw;
                        } else {
                            $words = explode(' ', trim($titleRaw));
                            $count = count($words);
                            if ($count >= 5) {
                                $t1 = implode(' ', array_slice($words, 0, $count - 4));
                                $t2 = implode(' ', array_slice($words, $count - 4, 2));
                                $t3 = implode(' ', array_slice($words, $count - 2));
                                $formattedTitle = e($t1) . ' <br class="hidden md:block"> <span class="text-mst">' . e($t2) . '</span> ' . e($t3);
                            } elseif ($count >= 3) {
                                $t1 = implode(' ', array_slice($words, 0, $count - 2));
                                $t2 = implode(' ', array_slice($words, $count - 2));
                                $formattedTitle = e($t1) . ' <br class="hidden md:block"> <span class="text-mst">' . e($t2) . '</span>';
                            } elseif ($count == 2) {
                                $formattedTitle = e($words[0]) . ' <span class="text-mst">' . e($words[1]) . '</span>';
                            } else {
                                $formattedTitle = e($titleRaw);
                            }
                        }
                    @endphp
                    <h1 class="text-3xl md:text-[54px] w-full md:w-7/12 font-body font-bold not-italic leading-tight md:leading-[64px]">
                        {!! $formattedTitle !!}
                    </h1>

                    {{-- 3. Short Content --}}
                    @php
                        $shortContent = filled($page->short_details ?? null)
                            ? $page->short_details
                            : (filled($page->sub_title ?? null) ? $page->sub_title : '');
                    @endphp
                    @if(filled($shortContent))
                        <p class="text-base md:text-lg mt-5 w-full md:w-5/12 text-gray-800 leading-relaxed">
                            {{ $shortContent }}
                        </p>
                    @endif

                    {{-- 4. 3 Buttons --}}
                    @if(($page->show_contact_us ?? 1) || ($page->show_whatsapp ?? 1) || ($page->show_email_us ?? 1))
                        <div class="flex flex-wrap items-center mt-8 gap-4 md:gap-6">
                            @if($page->show_contact_us ?? 1)
                                <a href="{{ url('/contact-us') }}"
                                   class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-[#BA9B31] to-[#74611E] px-7 py-3 font-heading text-base italic text-white transition hover:from-mst-dark hover:to-mst md:text-lg">
                                    <img src="{{ asset('assets/images/icons/phone1.svg') }}" class="ms-1 w-6 brightness-0 invert" width="24" height="24" alt="contact">
                                    <span>Contact Now</span>
                                </a>
                            @endif

                            @if($page->show_whatsapp ?? 1)
                                @php
                                    $waNumber = preg_replace('/[^0-9]/', '', get_setting('tour_inquiry_whatsapp') ?? get_setting('mobile_number') ?? '');
                                @endphp
                                <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode('Hello, I am interested in ' . ($page->page_title ?? 'your services')) }}"
                                   target="_blank"
                                   class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-[#2D9D3E] to-[#1E5E28] px-7 py-3 font-heading text-base italic text-white transition hover:from-mst-dark hover:to-mst md:text-lg">
                                    <img src="{{ asset('assets/images/icons/whatsapp1.svg') }}" class="ms-1 w-6" width="24" height="24" alt="whatsapp">
                                    <span>WhatsApp</span>
                                </a>
                            @endif

                            @if($page->show_email_us ?? 1)
                                <a href="mailto:{{ get_setting('email') }}"
                                   class="inline-flex items-center justify-center gap-2 rounded-full bg-[#03174C] px-7 py-3 font-heading text-base italic text-white transition hover:from-mst-dark hover:to-mst md:text-lg">
                                    <img src="{{ asset('assets/images/icons/email1.svg') }}" class="ms-1 w-5 brightness-0 invert" width="24" height="24" alt="email">
                                    <span>Email Us</span>
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- ===== Page Main Content ===== --}}
    <div class="cms-page">
        @if(filled($pageContent ?? null))
            <div class="-container mx-auto">
                {!! $pageContent !!}
            </div>
        @endif
    </div>
@endsection
