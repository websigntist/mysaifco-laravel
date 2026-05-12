@extends('frontend.layouts.master')
@section('content')
    @include('frontend.components.hero_section')
    {{--@include('frontend.components.marquee')--}}
    @include('frontend.components.logo_carousel')
    @include('frontend.components.product_categories')
    @include('frontend.components.small_buniess')
    @include('frontend.components.high_quality')
    @include('frontend.components.process')
    @include('frontend.components.delivering_precision')
    @include('frontend.components.why_choose')
    @include('frontend.components.faqs')
    @include('frontend.components.blogs')
    @include('frontend.components.inspiration')
@endsection

