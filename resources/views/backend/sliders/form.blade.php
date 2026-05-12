@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 mt-3">
        <form action="{{route( $module . '.store')}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row gy-6">
                <div class="col-sm-12 col-xl-8 offset-xl-2">
                    <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                        <div class="d-flex flex-column justify-content-center">
                            {!! heading_breadcrumbs('Add New '. str_replace('-',' ',$title), str_replace('-',' ',$title).' form') !!}
                        </div>
                        <div class="card-header-elements ms-auto d-flex align-content-between">
                            {!! goBack($module) !!}
                        </div>
                    </div>
                </div>
            </div>
            {{-- Display Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h5 class="alert-heading mb-2">Validation Errors:</h5>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row mb-6 gy-6">
                <div class="col-sm-12 col-xl-8 offset-xl-2">
                    <!-- page information -->
                    <div class="card card-action border-top-bottom">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-apps iconmrgn me-1"></span> Fill Out
                                                                                                     The {{ucfirst(str_replace('-',' ',$title))}}
                                                                                                     Details
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="title">
                                            <span>{{_label('title')}}</span> </label>
                                        <input type="text"
                                               id="title"
                                               name="title"
                                               value="{{ old('title') }}"
                                               class="form-control"
                                               placeholder="Enter {{_label('title')}}..." required>
                                        {!! error_label('title') !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="heading">
                                            <span>{{_label('heading')}}</span> </label>
                                        <input type="text"
                                               id="heading"
                                               name="heading"
                                               value="{{ old('heading') }}"
                                               class="form-control"
                                               placeholder="Enter {{_label('heading')}}..." required>
                                        {!! error_label('heading') !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="sub_heading">
                                            {{_label('sub_heading')}} </label>
                                        <input type="text"
                                               id="sub_heading"
                                               name="sub_heading"
                                               value="{{ old('sub_heading') }}"
                                               class="form-control"
                                               placeholder="Enter {{_label('sub_heading')}}...">
                                        {!! error_label('sub_heading') !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="link">
                                            {{_label('link')}} </label>
                                        <input type="text"
                                               id="link"
                                               name="link"
                                               value="{{ old('link') }}"
                                               class="form-control"
                                               placeholder="Enter {{_label('link')}}...">
                                        {!! error_label('link') !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="button_text">
                                            {{_label('button_text')}} </label>
                                        <input type="text"
                                               id="button_text"
                                               name="button_text"
                                               value="{{ old('button_text') }}"
                                               class="form-control"
                                               placeholder="Enter {{_label('button_text')}}...">
                                        {!! error_label('button_text') !!}
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="description">
                                            {{_label('content')}} </label>
                                        <textarea class="form-control"
                                                   id="description"
                                                   name="description"
                                                   placeholder="Write {{_label('description')}}" rows="3">{{ old('description') }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="status">
                                            <span>{{_label('status')}}</span> </label>
                                        <select id="status" name="status" class="form-select select2" required>
                                            @foreach($getStatus as $status)
                                                <option value="{{ old($status, $status) }}">{{ ucfirst($status) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="type">
                                            <span>{{_label('type')}}</span> </label>
                                        <select id="type" name="type" class="form-select select2" required>
                                            @foreach($gettype as $type)
                                                <option value="{{ old($type, $type) }}">{{ ucfirst($type) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="ordering">
                                            {{_label('ordering')}}
                                        </label> <input type="number"
                                                        id="ordering"
                                                        name="ordering"
                                                        value="{{ old('ordering') }}"
                                                        class="form-control"
                                                        placeholder="Enter 1 to 99...">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="slider_image">
                                            <span>{{_label('slider_image')}}</span>
                                        </label>
                                        <input class="form-control"
                                                 type="file"
                                                 name="image"
                                                 id="image">
                                    </div>
                                    <div class="col-md-12">
                                        {!! form_action_buttons('Submit Now', 'Save & New', 'Save & Stay') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('script')
    <script src="{{ asset('assets/backend/js/cleave-zen.js') }}"></script>
    <script src="{{ asset('assets/backend/js/select2.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form-layouts.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form-validation.js') }}"></script>
@endpush
