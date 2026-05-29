@if(filled($pageContent ?? null) && isset($page))
    <section class="flex justify-center items-center py-8 px-4 md:py-10">
        <div class="container mx-auto">
            <div class="testimonials-section-inner mx-auto max-w-6xl">
                <div class="mx-auto text-center">
                    @if($page->show_title == '1' && filled($page->page_title))
                        @php
                            $words     = explode(' ', $page->page_title);
                            $mainText  = implode(' ', array_slice($words, 0, -2));
                            $spanText  = implode(' ', array_slice($words, -2));
                        @endphp
                        <h1>
                            <span>{{ $mainText }}  </span><span class="text-mst">{{ $spanText }}</span>
                        </h1>
                    @endif
                    <p class="mt-4">
                        {!! $pageContent !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
@endif

{{--===== main heading ======--}}
<section class="flex justify-center items-center py-8 px-4 md:py-10">
    <div class="container mx-auto">
        <div class="testimonials-section-inner mx-auto max-w-6xl">
            <div class="mx-auto text-center">
                <h1>
                    <span>Explore the Best </span><span class="text-mst">Dubai Tours, Activities</span>
                </h1>
                <p class="mt-4">
                    Explore the best Dubai tours and activities with a trusted local tour operator. Find top experiences
                    including Dubai desert safari, Dubai city tours, Dubai Marina yacht tours, dhow cruise dinner, and
                    full-day Abu Dhabi city tours with Ferrari World and Louvre Museum. Choose from popular Dubai water
                    activities, theme park tickets, and value Dubai combo tours with hotel pickup and drop-off, best
                    price guarantee, and 24/7 support. All tours are designed for easy booking, flexible options, and a
                    smooth travel experience.
                </p>
            </div>
        </div>
    </div>
</section>

@foreach($tourSections ?? [] as $section)
    @include('frontend.components.tour-type-section', ['section' => $section])
@endforeach

@include('frontend.components.testimonials')
@include('frontend.components.faqs')
@include('frontend.components.explore_dubai')
