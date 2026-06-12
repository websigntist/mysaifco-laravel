{{-- Inline content for [include file="all-tours-packages"] --}}
@php
    $tours = $tours ?? collect();
@endphp
@include('frontend.components.tour-listing-grid', ['tours' => $tours])
@php $slug = request()->segment(1); @endphp

@if(!in_array($slug, ['umrah-by-bus', 'umrah']))
    @include('frontend.components.testimonials')
    @include('frontend.components.tour_faqs')
    @include('frontend.components.explore_dubai')
@endif
