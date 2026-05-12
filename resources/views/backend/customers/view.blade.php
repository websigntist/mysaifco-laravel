@extends('backend.layouts.master')
@section('content')
    {{--{{ dd($user) }}--}}
    <div class="container px-5">
        <h1 class="text-white text-3xl py-5 -px-5">Customer detail</h1>
        <ul class="text-white">
            <li><strong>Customer:</strong> {{ $user->first_name .' '. $user->last_name }}</li>
            <li><strong>Phone:</strong> {{ $user->mobile_no }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
            <li><strong>Created at:</strong> {{ $user->created_at->format('M d, Y') }}</li>
            <li><strong>Image:</strong><br>
                <div class="lightgallery">
                    @if($user->image)
                        <img src="{{asset('assets/images/users/'.$user->image)}}"
                             class="w-2xs border-gray-300 border-1 rounded-sm"
                             title="{{$user->image}}"
                             alt="{{$user->image}}"/>
                    @else
                        <img src="{{imageNotFound()}}"
                             class="w-2xs border-gray-300 border-1 rounded-sm"
                             title="image not found"
                             alt="image not found"/>
                    @endif
                </div>
            </li>
        </ul>
        <a href="{{ route($module) }}" class="btn btn-secondary text-white">Back to List</a>
    </div>

@endsection
