@extends('backend.layouts.master')
@section('content')
    {{--{{ dd($page) }}--}}
    <div class="container px-5">
        <h1 class="text-white text-3xl py-5 px-5">{{ $page->menu_title }} Page Detail</h1>
        <ul class="text-white">
            <li><strong>Menu Title:</strong> {{ $page->menu_title }}</li>
            <li><strong>Page Title:</strong> {{ $page->page_title }}</li>
            <li><strong>Friendly URL:</strong> {{ $page->friendly_url }}</li>
            <li><strong>Status:</strong> {{ $page->status }}</li>
            <li><strong>Description:</strong> {{$page->description}}</li>
            <li><strong>Meta Title:</strong> {{ $page->meta_title }}</li>
            <li><strong>Meta Description:</strong> {{ $page->meta_description }}</li>
            <li><strong>Meta Keywords:</strong> {{ $page->meta_keywords }}</li>
            <li><strong>Image:</strong><br>
                <div class="lightgallery">
                    @if($page->image)
                        <img src="{{asset('assets/images/pages/'.$page->image)}}" class="w-2xs border-gray-300 border-1 rounded-sm" title="{{$page->image}}" alt="{{$page->image}}"/>
                    @else
                        <img src="{{imageNotFound()}}"
                             class="w-2xs border-gray-300 border-1 rounded-sm"
                             title="{{$page->image}}"
                             alt="{{$page->image}}"/>
                    @endif
                </div>
            </li>
        </ul>

        <ul class="text-white mt-5">
            <li><strong>Maintenance Title:</strong> {{$maintenance->maintenance_title}}</li>
            <li><strong>Maintenance Mode:</strong> {{ $maintenance->mode == 0 ? 'Inactive' : 'Active' }}
            </li>
            <li><strong>Image:</strong><br>
                <div class="lightgallery">
                    @if($maintenance->maintenance_image)
                        <img src="{{asset('assets/images/maintenance/'.$maintenance->maintenance_image)}}"
                             class="w-2xs border-gray-300 border-1 rounded-sm"
                             title="{{$page->image}}"
                             alt="{{$page->image}}"/>
                    @else
                        <img src="{{imageNotFound('jk')}}"
                             class="w-2xs border-gray-300 border-1 rounded-sm"
                             title="{{$page->image}}"
                             alt="{{$page->image}}"/>
                    @endif
                </div>
            </li>
        </ul>
        <a href="{{ route('pages') }}" class="btn btn-secondary text-white">Back to List</a>
    </div>

@endsection
