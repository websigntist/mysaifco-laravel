@php
    use App\Models\backend\RelatedService;
    use App\Models\backend\TourType;

    /*
    |--------------------------------------------------------------------------
    | Tour Type Configurations (Limit, Position, Grid Columns, Learn More Button, Image Size)
    |--------------------------------------------------------------------------
    | Options per tour_type (by slug or ID):
    |   - limit: (int) number of items to show
    |   - position: 'first' or 'last'
    |   - cols / grid_cols: 3, 4, or custom grid classes string
    |   - show_button / show_learn_more: true or false
    |   - img_size / image_size: '64px' (default), '100px', '120px', or Tailwind class 'w-24 h-24'
    |
    | Examples:
    |   'umrah-visa'          => ['limit' => 3, 'position' => 'last', 'cols' => 3, 'show_button' => true, 'img_size' => '100px'],
    |   'desert-safari-tours' => ['limit' => 4, 'position' => 'first', 'cols' => 4, 'show_button' => false, 'img_size' => '64px'],
    |
    */
    $tourTypeConfig = [
        // 'umrah-visa' => ['limit' => 3, 'position' => 'last', 'cols' => 3, 'show_button' => true, 'img_size' => '100px'],
    ];

    $currentTourTypeId = $tour_type_id ?? $tourTypeId ?? null;
    $currentTourTypeSlug = null;

    if (!$currentTourTypeId && isset($tourType)) {
        if (is_object($tourType)) {
            $currentTourTypeId = $tourType->id;
            $currentTourTypeSlug = strtolower($tourType->friendly_url ?? $tourType->title ?? '');
        } else {
            $tObj = TourType::where('friendly_url', $tourType)->orWhere('title', $tourType)->first();
            $currentTourTypeId = $tObj?->id;
            $currentTourTypeSlug = strtolower($tObj?->friendly_url ?? '');
        }
    }

    if (!$currentTourTypeId && isset($page) && !empty($page->tour_type_id)) {
        $currentTourTypeId = $page->tour_type_id;
        if (isset($page->tourType)) {
            $currentTourTypeSlug = strtolower($page->tourType->friendly_url ?? '');
        }
    }

    if (!$currentTourTypeId) {
        $routeSlug = request()->route('slug');
        if ($routeSlug) {
            $tObj = TourType::where('friendly_url', $routeSlug)->first();
            $currentTourTypeId = $tObj?->id;
            $currentTourTypeSlug = strtolower($tObj?->friendly_url ?? $routeSlug);
        }
    }

    if ($currentTourTypeId && !$currentTourTypeSlug) {
        $currentTourTypeSlug = strtolower(TourType::where('id', $currentTourTypeId)->value('friendly_url') ?? '');
    }

    // Determine limit, position, cols, show_button, and img_size settings
    $effectiveLimit = $limit ?? null;
    $effectivePosition = strtolower($position ?? 'first');
    $effectiveCols = $cols ?? $grid_cols ?? null;
    $effectiveShowButton = $show_button ?? $show_learn_more ?? null;
    $effectiveImgSize = $img_size ?? $image_size ?? null;

    if ($currentTourTypeSlug && isset($tourTypeConfig[$currentTourTypeSlug])) {
        $cfg = $tourTypeConfig[$currentTourTypeSlug];
        if (is_array($cfg)) {
            $effectiveLimit = $effectiveLimit ?? ($cfg['limit'] ?? null);
            $effectivePosition = $cfg['position'] ?? $effectivePosition;
            $effectiveCols = $effectiveCols ?? ($cfg['grid_cols'] ?? $cfg['cols'] ?? null);
            $effectiveShowButton = $effectiveShowButton ?? ($cfg['show_button'] ?? $cfg['show_learn_more'] ?? null);
            $effectiveImgSize = $effectiveImgSize ?? ($cfg['img_size'] ?? $cfg['image_size'] ?? null);
        } elseif (is_numeric($cfg)) {
            $effectiveLimit = $effectiveLimit ?? (int) $cfg;
        }
    } elseif ($currentTourTypeId && isset($tourTypeConfig[$currentTourTypeId])) {
        $cfg = $tourTypeConfig[$currentTourTypeId];
        if (is_array($cfg)) {
            $effectiveLimit = $effectiveLimit ?? ($cfg['limit'] ?? null);
            $effectivePosition = $cfg['position'] ?? $effectivePosition;
            $effectiveCols = $effectiveCols ?? ($cfg['grid_cols'] ?? $cfg['cols'] ?? null);
            $effectiveShowButton = $effectiveShowButton ?? ($cfg['show_button'] ?? $cfg['show_learn_more'] ?? null);
            $effectiveImgSize = $effectiveImgSize ?? ($cfg['img_size'] ?? $cfg['image_size'] ?? null);
        } elseif (is_numeric($cfg)) {
            $effectiveLimit = $effectiveLimit ?? (int) $cfg;
        }
    }

    $effectiveShowButton = (bool) ($effectiveShowButton ?? false);
    $effectiveImgSize = $effectiveImgSize ?? '64px';

    // Format img size style or Tailwind class
    $imgSizeStyle = null;
    $imgSizeClass = null;

    if (is_numeric($effectiveImgSize)) {
        $imgSizeStyle = "width: {$effectiveImgSize}px; height: {$effectiveImgSize}px;";
    } elseif (str_contains($effectiveImgSize, 'px') || str_contains($effectiveImgSize, 'rem') || str_contains($effectiveImgSize, '%')) {
        $imgSizeStyle = "width: {$effectiveImgSize}; height: {$effectiveImgSize};";
    } else {
        $imgSizeClass = $effectiveImgSize;
    }

    // Resolve grid classes based on cols setting
    if (is_numeric($effectiveCols)) {
        if ((int)$effectiveCols === 3) {
            $gridClass = 'grid-cols-1 sm:grid-cols-2 md:grid-cols-3';
        } elseif ((int)$effectiveCols === 2) {
            $gridClass = 'grid-cols-1 sm:grid-cols-2';
        } else {
            $gridClass = 'grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4';
        }
    } elseif (is_string($effectiveCols) && filled($effectiveCols)) {
        $gridClass = $effectiveCols;
    } else {
        $gridClass = 'grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4';
    }

    $query = RelatedService::where('status', 'Active');

    if ($currentTourTypeId) {
        $query->where(function($q) use ($currentTourTypeId) {
            $q->whereJsonContains('tour_type_ids', (int) $currentTourTypeId)
              ->orWhereJsonContains('tour_type_ids', (string) $currentTourTypeId)
              ->orWhere('tour_type_ids', 'LIKE', '%"' . $currentTourTypeId . '"%');
        });
    }

    $allServices = $query->orderBy('ordering', 'asc')->orderBy('id', 'asc')->get();

    // Apply limit and position ('first' vs 'last')
    if ($effectiveLimit && $allServices->count() > $effectiveLimit) {
        if ($effectivePosition === 'last') {
            $relatedServices = $allServices->slice(-$effectiveLimit)->values();
        } else {
            $relatedServices = $allServices->take($effectiveLimit)->values();
        }
    } else {
        $relatedServices = $allServices;
    }
@endphp

@if($relatedServices->isNotEmpty())
    <section class="related-services-section">
        <div class="mx-auto">
            <div class="grid {{ $gridClass }} gap-5">
                @foreach($relatedServices as $service)
                    @php
                        $hasLink = filled($service->page_link);
                        $linkUrl = $hasLink ? $service->page_link : 'javascript:void(0);';
                        $cardTag = $hasLink ? 'a' : 'div';
                    @endphp
                    <{{ $cardTag }} @if($hasLink) href="{{ $linkUrl }}" @endif class="group bg-gray-50 p-6 rounded-2xl border border-gray-200 space-y-4 hover:shadow-md transition-all duration-300 flex flex-col justify-between text-decoration-none block">
                        <div>
                            @if($service->image)
                                @php
                                    $imgContainerAttr = isset($imgSizeStyle) ? 'style="' . $imgSizeStyle . '"' : '';
                                    $imgContainerClass = isset($imgSizeClass) ? $imgSizeClass : '';
                                @endphp
                                <div class="{{ $imgContainerClass }} mx-auto mb-4 flex items-center justify-center" {!! $imgContainerAttr !!}>
                                    <img src="{{ asset('assets/images/related-services/' . $service->image) }}"
                                         alt="{{ $service->title }}"
                                         class="w-full h-full object-contain mx-auto group-hover:scale-105 transition-transform duration-300">
                                </div>
                            @endif

                            <h5 class="font-heading text-lg font-semibold text-center text-mst-gray mb-2 group-hover:text-mst transition-colors">
                                {{ $service->title }}
                                {{--{!! format_two_color_heading($service->title) !!}--}}
                            </h5>

                            @if($service->description)
                                <div class="font-body text-xs text-gray-600 text-center leading-relaxed">
                                    {!! $service->description !!}
                                </div>
                            @endif
                        </div>

                        @if($effectiveShowButton && $hasLink)
                            <div class="text-center">
                                <span class="flex items-center justify-center w-fit mx-auto text-white text-sm mt-5 px-4 pt-1 pb-2 rounded-full bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300 font-heading italic">
                                    Learn More
                                </span>
                            </div>
                        @endif
                    </{{ $cardTag }}>
                @endforeach
            </div>
        </div>
    </section>
@endif
