@extends('backend.layouts.master')
@section('content')
    {{--{{ dd($blog) }}--}}
    <div class="container px-5">
        <h1 class="text-white text-3xl py-5 px-5">{{ $blog->title }} Blog Detail</h1>
        <ul class="text-white">
            <li><strong>Blog Title:</strong> {{ $blog->title }}</li>
            <li><strong>Friendly URL:</strong> {{ $blog->friendly_url }}</li>
            <li><strong>Blog Category:</strong>
                @forelse($blog->blogCategories as $category)
                    <span class="badge bg-gray-700 px-1 rounded text-[12px]">{{ $category->title . ',' }} </span> &nbsp;
                @empty
                    <span class="text-muted">No Category</span>
                @endforelse
            </li>
            <li><strong>Status:</strong> {{ $blog->status }}</li>
            <li><strong>Description:</strong> {{$blog->description}}</li>
            <li><strong>Meta Title:</strong> {{ $blog->meta_title }}</li>
            <li><strong>Meta Description:</strong> {{ $blog->meta_description }}</li>
            <li><strong>Meta Keywords:</strong> {{ $blog->meta_keywords }}</li>
            <li><strong>Image:</strong><br>
                <div class="lightgallery">
                    @if($blog->image)
                        <a href="{{asset('assets/images/blogs/'.$blog->image)}}">
                            <img src="{{asset('assets/images/blogs/'.$blog->image)}}" class="w-2xs border-gray-300 border-1 rounded-sm" title="{{$blog->image}}" alt="{{$blog->image}}"/>
                        </a>
                    @else
                        <img src="{{imageNotFound()}}"
                             class="w-2xs border-gray-300 border-1 rounded-sm"
                             title="{{$blog->image}}"
                             alt="{{$blog->image}}"/>
                    @endif
                </div>
            </li>
        </ul>

        <a href="{{ route('blogs') }}" class="btn btn-secondary text-white">Back to List</a>
    </div>

@endsection
