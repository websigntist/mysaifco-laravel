@extends('backend.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 mt-3">
        <div class="row gy-6">
            <div class="col-sm-12">
                <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                    <div class="d-flex flex-column justify-content-center">
                        {!! heading_breadcrumbs('View '. $title, $data->title) !!}
                    </div>
                    <div class="card-header-elements ms-auto">
                        {!! goBack($module, 'Back') !!}
                        <a href="{{ route($module.'.edit', $data->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-action border-top-bottom">
            <div class="card-header border-bottom py-3">
                <h6 class="mb-0">Gallery: {{ $data->title }}</h6>
            </div>
            <div class="card-body">
                <p><strong>Status:</strong> <span class="badge {{ $data->status === 'active' ? 'bg-label-success' : 'bg-label-danger' }}">{{ ucfirst($data->status) }}</span></p>
                <p><strong>Ordering:</strong> {{ $data->ordering }}</p>
                @if($data->cover_image)
                    <p><strong>Cover image:</strong></p>
                    <img src="{{ asset('assets/images/'.$module.'/'.$data->cover_image) }}" alt="{{ $data->title }}" class="img-thumbnail rounded" style="max-height: 200px;">
                @endif
                <hr>
                <h6>Gallery images ({{ $data->images->count() }})</h6>
                <div class="row g-3 mt-1">
                    @foreach($data->images as $img)
                        <div class="col-6 col-md-4 col-lg-3">
                            <img src="{{ $img->image ? asset('assets/images/galleries/images/'.$img->image) : imageNotFound() }}" alt="{{ $img->image_alt }}" class="img-thumbnail rounded w-100">
                            @if($img->image_title)<p class="small mb-0 mt-1">{{ $img->image_title }}</p>@endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
