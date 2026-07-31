@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 mt-3">
        <form action="{{ route($module.'.update', $data->id) }}" method="post" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="row gy-6">
                <div class="col-sm-12 col-xl-8 offset-xl-2">
                    <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                        <div class="d-flex flex-column justify-content-center">
                            {!! heading_breadcrumbs('Edit '. $title, $title.' edit form') !!}
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
                <div class="col-sm-12 col-xl-8 offset-xl-2">
                    <div class="card card-action border-top-bottom">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-package iconmrgn me-1"></span>
                                Update {{ ucfirst($title) }} Details
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-8">
                                        <label class="form-label text-capitalize" for="title">
                                            <span>Package Title</span> <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"
                                               id="title"
                                               name="title"
                                               value="{{ old('title', $data->title) }}"
                                               class="form-control"
                                               placeholder="e.g. Sharing 4 Beds, Sharing 3 Beds..."
                                               required>
                                        {!! error_label('title') !!}
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="badge">
                                            <span>Ribbon / Badge Tag</span>
                                        </label>
                                        <input type="text"
                                               id="badge"
                                               name="badge"
                                               value="{{ old('badge', $data->badge) }}"
                                               class="form-control"
                                               placeholder="e.g. MOST POPULAR, BEST VALUE">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="subtitle">
                                            <span>Price Subtitle</span>
                                        </label>
                                        <input type="text"
                                               id="subtitle"
                                               name="subtitle"
                                               value="{{ old('subtitle', $data->subtitle) }}"
                                               class="form-control"
                                               placeholder="e.g. Starting from">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="price">
                                            <span>Price Amount</span>
                                        </label>
                                        <input type="text"
                                               id="price"
                                               name="price"
                                               value="{{ old('price', $data->price) }}"
                                               class="form-control"
                                               placeholder="e.g. 1150">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="currency">
                                            <span>Currency</span>
                                        </label>
                                        <input type="text"
                                               id="currency"
                                               name="currency"
                                               value="{{ old('currency', $data->currency) }}"
                                               class="form-control"
                                               placeholder="e.g. AED">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="header_color">
                                            <span>Card Header Theme Color</span>
                                        </label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="color"
                                                   id="header_color_picker"
                                                   class="form-control form-control-color"
                                                   value="{{ old('header_color', $data->header_color ?? '#0096a6') }}"
                                                   title="Choose color">
                                            <input type="text"
                                                   id="header_color"
                                                   name="header_color"
                                                   value="{{ old('header_color', $data->header_color ?? '#0096a6') }}"
                                                   class="form-control"
                                                   placeholder="#0096a6">
                                        </div>
                                        <div class="mt-2 d-flex gap-2">
                                            <button type="button" class="btn btn-sm text-white preset-color-btn" style="background: #0096a6;" data-color="#0096a6">Teal</button>
                                            <button type="button" class="btn btn-sm text-white preset-color-btn" style="background: #2e7d32;" data-color="#2e7d32">Green</button>
                                            <button type="button" class="btn btn-sm text-white preset-color-btn" style="background: #e69100;" data-color="#e69100">Gold</button>
                                            <button type="button" class="btn btn-sm text-white preset-color-btn" style="background: #d50032;" data-color="#d50032">Red</button>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        @include('backend.components.tour-type-select', [
                                            'tourTypes' => $tourTypes,
                                            'selected' => old('tour_type_id', $data->tour_type_id) ? [(int) old('tour_type_id', $data->tour_type_id)] : [],
                                        ])
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="features">
                                            <span>Package Features (One per line)</span>
                                        </label>
                                        <textarea class="form-control"
                                                  id="features"
                                                  name="features"
                                                  placeholder="Umrah Visa&#10;Makkah Hotel&#10;Madinah Hotel&#10;Transportation&#10;Border Fee"
                                                  rows="6">{{ old('features', $data->features) }}</textarea>
                                        <small class="text-muted">Enter each checkmark feature on a new line.</small>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="button_title">
                                            <span>Button Title</span>
                                        </label>
                                        <input type="text"
                                               id="button_title"
                                               name="button_title"
                                               value="{{ old('button_title', $data->button_title ?? 'WhatsApp Now') }}"
                                               class="form-control"
                                               placeholder="e.g. WhatsApp Now">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="button_url">
                                            <span>Button URL / Link</span>
                                        </label>
                                        <input type="text"
                                               id="button_url"
                                               name="button_url"
                                               value="{{ old('button_url', $data->button_url) }}"
                                               class="form-control"
                                               placeholder="e.g. https://wa.me/...">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="status">
                                            <span>Status</span> <span class="text-danger">*</span>
                                        </label>
                                        <select id="status" name="status" class="form-select select2" required>
                                            @foreach($getStatus as $st)
                                                <option value="{{ $st }}" {{ old('status', $data->status) == $st ? 'selected' : '' }}>
                                                    {{ ucfirst($st) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="ordering">
                                            <span>Ordering</span>
                                        </label>
                                        <input type="number"
                                               id="ordering"
                                               name="ordering"
                                               value="{{ old('ordering', $data->ordering) }}"
                                               class="form-control"
                                               placeholder="1, 2, 3...">
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        {!! form_action_buttons('Update & Exit', 'Update & New', 'Update & Stay') !!}
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
    <script src="{{ asset('assets/backend/js/select2.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2({ width: '100%' });

            $('#header_color_picker').on('input change', function () {
                $('#header_color').val($(this).val());
            });

            $('#header_color').on('input change', function () {
                $('#header_color_picker').val($(this).val());
            });

            $('.preset-color-btn').on('click', function () {
                var color = $(this).attr('data-color');
                $('#header_color').val(color);
                $('#header_color_picker').val(color);
            });
        });
    </script>
@endpush
