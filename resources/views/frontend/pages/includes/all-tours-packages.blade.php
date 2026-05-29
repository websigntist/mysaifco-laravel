{{-- Inline content for [include file="all-tours-packages"] --}}
@php
    $tours = $tours ?? collect();
@endphp

@include('frontend.components.tour-listing-grid', ['tours' => $tours])

@include('frontend.components.testimonials')
@include('frontend.components.tour_faqs')
@include('frontend.components.explore_dubai')
