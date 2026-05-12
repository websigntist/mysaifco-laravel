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
                                <img src="{{asset('assets/backend/images/websigntist.svg')}}" width="50" alt="logo">
                                <span class="app-brand-text demo text-heading fw-bold text-uppercase">Websigntist</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h5 class="mb-1">Welcome to Laravel Admin</h5>
                        <p class="mb-6">Please sign-in to your account.</p>
                        <form action="{{route('login')}}" method="POST" class="mb-6 needs-validation" novalidate>
                            @csrf
                            <div class="mb-6">
                                <label for="email" class="form-label">Email or Username</label>
                                <input type="email"
                                   id="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Enter your email or username" required>
                            </div>
                            {!! error_label('email') !!}
                            @error('email')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                            <div class="mb-6 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password"
                                           id="password"
                                           name="password"
                                           class="form-control"
                                           placeholder="**********" required>
                                    <span class="input-group-text cursor-pointer"><i class="icon-base ti tabler-eye-off"></i></span>
                                </div>
                                {!! error_label('password') !!}
                                @error('password')
                                <div class="text-red-600 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="my-8">
                                <div class="d-flex justify-content-between">
                                    <div class="form-check mb-0 ms-2">
                                        <input class="form-check-input" type="checkbox" id="remember-me" name="remember" value="1">
                                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                                    </div>
                                    <a href="{{ route('forgot-password') }}">
                                        <p class="mb-0">Forgot Password?</p>
                                    </a>
                                </div>
                            </div>
                            <div class="mb-6">
                                <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
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
