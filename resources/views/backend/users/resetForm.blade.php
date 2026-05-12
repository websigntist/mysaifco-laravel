@extends('backend.layouts.user')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/page-auth.css') }}">
@endpush
@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-6">
                <!-- Login -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-6">
                            <a href="" class="app-brand-link">
                                <img src="{{asset('assets/images/websigntist.svg')}}" width="50" alt="logo">
                                <span class="app-brand-text demo text-heading fw-bold text-uppercase">Websigntist</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h5 class="mb-1 text-center">Reset Your Password</h5>
                        <p class="mb-6 text-center">Enter your registered email ID and new password</p>
                        <form action="{{ route('update-password') }}" method="POST" class="mb-6 needs-validation" novalidate>
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="mb-6">
                                <label for="email" class="form-label"><span>Email/Username</span></label>
                                <input type="email"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       class="form-control"
                                       placeholder="Enter your email or username" required>
                            </div>
                            {!! error_label('email') !!}
                            <div class="mb-6 form-password-toggle">
                                <label class="form-label" for="password_confirmation"><span>New Password</span></label>
                                <div class="input-group input-group-merge">
                                    <input type="password"
                                           id="password_confirmation"
                                           name="password_confirmation"
                                           class="form-control"
                                           placeholder="**********" required>
                                    <span class="input-group-text cursor-pointer">
                                        <i class="icon-base ti tabler-eye-off"></i>
                                    </span>
                                </div>
                                {!! error_label('password_confirmation') !!}
                            </div>
                            <div class="mb-6 form-password-toggle">
                                <label class="form-label" for="password"><span>Confirm Password</span></label>
                                <div class="input-group input-group-merge">
                                    <input type="password"
                                           id="password"
                                           name="password"
                                           class="form-control"
                                           placeholder="**********" required>
                                    <span class="input-group-text cursor-pointer">
                                        <i class="icon-base ti tabler-eye-off"></i>
                                    </span>
                                </div>
                                {!! error_label('password') !!}
                            </div>
                            <div class="mb-6">
                                <button class="btn btn-primary d-grid w-100" type="submit">Update New Password</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Login -->
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/backend/js/form-validation.js') }}"></script>
@endsection
