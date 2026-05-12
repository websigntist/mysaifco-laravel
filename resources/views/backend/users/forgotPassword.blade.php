@extends('backend.layouts.user')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/page-auth.css') }}">
@endpush
@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-6">
                <!-- Forgot Password -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-6">
                            <a href="" class="app-brand-link">
                                <img src="{{asset('assets/backend/images/websigntist.svg')}}" width="50" alt="logo">
                                <span class="app-brand-text demo text-heading fw-bold text-uppercase">Websigntist</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h5 class="mb-1">Forgot Password?</h5>
                        <p class="mb-6">Enter your email and system will send you reset password link.</p>
                        <form action="{{route ('forgot-password')}}" method="POST" class="mb-6 needs-validation" novalidate>
                            @csrf
                            <div class="mb-6 form-control-validation">
                                <label for="email" class="form-label">Email</label>
                                <input type="email"
                                       id="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="Enter your email"
                                       required>
                            </div>
                            {!! error_label('email') !!}
                            <button type="submit" class="btn btn-primary d-grid w-100">Send Reset Link</button>
                        </form>
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="d-flex justify-content-center">
                                <i class="icon-base ti tabler-chevron-left scaleX-n1-rtl me-1_5"></i> Back to login </a>
                        </div>
                    </div>
                </div>
                <!-- /Forgot Password -->
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/backend/js/form-validation.js') }}"></script>
@endsection
