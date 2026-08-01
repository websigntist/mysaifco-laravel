@php
    use App\Models\backend\RelatedService;
    use App\Models\backend\TourType;

    $currentTourTypeId = $tour_type_id ?? $tourTypeId ?? null;

    if (!$currentTourTypeId && isset($tourType)) {
        $currentTourTypeId = is_object($tourType) ? $tourType->id : TourType::where('friendly_url', $tourType)->orWhere('title', $tourType)->value('id');
    }

    if (!$currentTourTypeId && isset($page) && !empty($page->tour_type_id)) {
        $currentTourTypeId = $page->tour_type_id;
    }

    if (!$currentTourTypeId) {
        $routeSlug = request()->route('slug');
        if ($routeSlug) {
            $currentTourTypeId = TourType::where('friendly_url', $routeSlug)->value('id');
        }
    }

    $query = RelatedService::where('status', 'Active');

    if ($currentTourTypeId) {
        $query->where(function($q) use ($currentTourTypeId) {
            $q->whereJsonContains('tour_type_ids', (int) $currentTourTypeId)
              ->orWhereJsonContains('tour_type_ids', (string) $currentTourTypeId)
              ->orWhere('tour_type_ids', 'LIKE', '%"' . $currentTourTypeId . '"%');
        });
    }

    $relatedServices = $query->orderBy('ordering', 'asc')->orderBy('id', 'asc')->get();
@endphp

@if($relatedServices->isNotEmpty())
    <section class="related-services-section py-10">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($relatedServices as $service)
                    @php
                        $hasLink = filled($service->page_link);
                        $linkUrl = $hasLink ? $service->page_link : 'javascript:void(0);';
                        $cardTag = $hasLink ? 'a' : 'div';
                    @endphp
                    <{{ $cardTag }} @if($hasLink) href="{{ $linkUrl }}" @endif class="group bg-gray-50 p-6 rounded-2xl border border-gray-200 space-y-4 hover:shadow-md transition-all duration-300 flex flex-col justify-between text-decoration-none block">
                        <div>
                            @if($service->image)
                                <div class="w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                                    <img src="{{ asset('assets/images/related-services/' . $service->image) }}"
                                         width="64"
                                         height="64"
                                         alt="{{ $service->title }}"
                                         class="max-w-full max-h-full object-contain mx-auto group-hover:scale-105 transition-transform duration-300">
                                </div>
                            @endif

                            <h5 class="font-heading text-lg font-semibold text-center text-mst-gray mb-2 group-hover:text-mst transition-colors">
                                {!! format_two_color_heading($service->title) !!}
                            </h5>

                            @if($service->description)
                                <div class="font-body text-xs text-gray-600 text-center leading-relaxed">
                                    {!! $service->description !!}
                                </div>
                            @endif
                        </div>
                    </{{ $cardTag }}>
                @endforeach
            </div>
        </div>
    </section>
@endif
