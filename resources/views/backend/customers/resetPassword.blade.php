@extends('backend.layouts.user')
@section('content')
    <div class="bg-slate-900 shadow-3xll py-6 px-5 rounded-lg mx-auto sm:w-11/12 lg:w-1/3">
        <div class="flex min-h-full flex-col justify-center px-6 py-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h1 class="text-center text-xl mt-4 font-bold tracking-tight text-slate-300">Reset Password</h1>
            </div>

            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="{{ route('forgot-password') }}" method="POST">
                    @csrf
                    <div class="mt-2">
                        <input type="email" name="email" id="email" placeholder="Enter your registered email..." autocomplete="email" required class="block w-full
                        rounded-sm bg-slate-800 px-3 py-2 text-base text-gray-100 placeholder:text-gray-400 focus:outline focus:outline-slate-700">
                        @error('email')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" placeholder="Enter new password..." autocomplete="current-password" required
                               class="block w-full rounded-sm bg-slate-800 px-3 py-2 text-base text-gray-100 placeholder:text-gray-400 focus:outline focus:outline-slate-700">
                        @error('password')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <input type="password" name="password_confirmation" id="confirmpassword" placeholder="Enter new password. .." autocomplete="current-password" required
                               class="block w-full rounded-sm bg-slate-800 px-3 py-2 text-base text-gray-100 placeholder:text-gray-400 focus:outline focus:outline-slate-700">
                        @error('password')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="flex w-full justify-center rounded-sm bg-slate-700 px-3 py-2 text-md font-semibold text-white hover:bg-slate-800">
                        Send Reset Password Link
                    </button>

                    <div class="text-center text-slate-300">
                        <p>New Here <a href="{{ route('register') }}" class="font-bold">Register Now</a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
