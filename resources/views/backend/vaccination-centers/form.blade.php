@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 mt-3">
        <form action="{{ route($module.'.store') }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row gy-6">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                        <div class="d-flex flex-column justify-content-center">
                            {!! heading_breadcrumbs('Add New '. $title, $title.' form') !!}
                        </div>
                        <div class="card-header-elements ms-auto d-flex align-content-between">
                            {!! goBack($module) !!}
                        </div>
                    </div>
                </div>
            </div>
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
                {{-- Left Column (8 cols) --}}
                <div class="col-sm-12 col-xl-8">
                    <div class="card card-action border-top-bottom">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-building-hospital iconmrgn me-1"></span>
                                Fill Out The {{ ucfirst($title) }} Details
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize font-weight-bold" for="title">
                                            <span>Center Title / Name</span> <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"
                                               id="title"
                                               name="title"
                                               value="{{ old('title') }}"
                                               class="form-control"
                                               placeholder="e.g. AL Barsha Health Centre"
                                               required>
                                        {!! error_label('title') !!}
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize font-weight-bold" for="address">
                                            <span>Address / Full Location</span>
                                        </label>
                                        <input type="text"
                                               id="address"
                                               name="address"
                                               value="{{ old('address') }}"
                                               class="form-control"
                                               placeholder="e.g. Al Barsha - Al Barsha 3 - Dubai - United Arab Emirates">
                                        {!! error_label('address') !!}
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize font-weight-bold" for="phone">
                                            <span>Phone / Contact Number</span>
                                        </label>
                                        <input type="text"
                                               id="phone"
                                               name="phone"
                                               value="{{ old('phone') }}"
                                               class="form-control"
                                               placeholder="e.g. +97800342">
                                        {!! error_label('phone') !!}
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize font-weight-bold" for="map_url">
                                            <span>Google Maps Link</span>
                                        </label>
                                        <input type="text"
                                               id="map_url"
                                               name="map_url"
                                               value="{{ old('map_url') }}"
                                               class="form-control"
                                               placeholder="e.g. https://maps.google.com/...">
                                        {!! error_label('map_url') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Column (4 cols) --}}
                <div class="col-sm-12 col-xl-4">
                    <div class="card card-action border-top-bottom">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-photo iconmrgn me-1"></span>Center Image
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                     <div class="col-md-12">
                                         {!! image_input_option(imageNotFound(), 'image') !!}
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-action border-top-bottom mt-5">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-table-options iconmrgn me-1"></span>Other Options
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize font-weight-bold" for="center_location">
                                            <span>Center Location</span> <span class="text-danger">*</span>
                                        </label>
                                        <select id="center_location" name="center_location" class="form-select select2" required>
                                            @foreach($getLocationOptions as $val => $label)
                                                <option value="{{ $val }}" {{ old('center_location', 'none') === $val ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="status">
                                            <span>{{ _label('status') }}</span>
                                        </label>
                                        <select id="status" name="status" class="form-select select2" required>
                                            @foreach($getStatus as $status)
                                                <option value="{{ $status }}" {{ old('status', 'Active') === $status ? 'selected' : '' }}>
                                                    {{ ucfirst($status) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="ordering">{{ _label('ordering') }}</label>
                                        <input type="number"
                                               id="ordering"
                                               name="ordering"
                                               value="{{ old('ordering', 0) }}"
                                               class="form-control"
                                               placeholder="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-top-bottom mt-5 py-3">
                        <div class="row">
                            {!! form_action_buttons('Submit Now', 'Save & New', 'Save & Stay', $module) !!}
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('script')
    <script src="{{ asset('assets/backend/js/select2.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form-layouts.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form-validation.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2({ width: '100%' });
        });
    </script>
@endpush
