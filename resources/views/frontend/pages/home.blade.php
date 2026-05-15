@extends('frontend.layouts.master')
@section('content')
    @include('frontend.components.hero_section')
    @include('frontend.components.explore_uae')
    @include('frontend.components.best_seller')
    @include('frontend.components.our_popular')
    @include('frontend.components.testimonials')
    @include('frontend.components.umrah_packages')
    @include('frontend.components.5xboxes')
    @include('frontend.components.global-visa')
    @include('frontend.components.holiday_packages')
    {{--@include('frontend.components.blogs')
    @include('frontend.components.faqs')--}}
@endsection

