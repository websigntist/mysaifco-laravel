@php
    $meta_title = '401 - Access Denied';
    $meta_keywords = '';
    $meta_description = '';
@endphp
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/page-misc.css') }}">
@endpush
@extends('backend.layouts.user')
@section('content')
    {{--<div class="min-vh-100 position-relative">
        <div class="position-absolute top-50 start-50 translate-middle p-5 text-center">
            <h2 class="fw-semibold">404 - Page Not Found</h2>
            <h4>Custom Page on Laravel 12</h4>
            <p>Sorry, the page you are looking for could not be found.</p>

            <a href="{{siteUrl('admin/dashboard')}}" class="btn btn-dark waves-effect waves-light mt-10 d-flex">
                <span class="icon-base ti tabler-brand-google-home icon-20px me-2"></span>
                Back to home
            </a>
        </div>
    </div>--}}
    <!--Under Maintenance -->
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
            <h4 class="mb-2 mx-2">You are not Authorized! 🔐</h4>
            <p class="mb-6 mx-2">You don’t have permission to access this page. Go Back!</p>
            <a href="{{siteUrl('admin/dashboard')}}" class="btn btn-primary">Back to Dashboard</a>
            <div class="mt-12">
                <img src="{{asset('assets/backend/images/under-maintenance.png')}}"
                     width="550"
                     alt="under-maintenance"
                     title="under-maintenance"
                     class="img-fluid">
            </div>
        </div>
    </div>
    <!-- /Under Maintenance -->
@endsection
