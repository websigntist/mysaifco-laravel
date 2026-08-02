@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
    <style>
        .select2-container .select2-selection--multiple {
            height: auto !important;
            min-height: var(--bs-select-height, 38px);
            overflow: visible;
        }
        .select2-container .select2-selection--multiple .select2-selection__rendered {
            display: flex !important;
            flex-wrap: wrap;
            align-items: center;
            row-gap: 2px;
            width: 100%;
            height: auto;
            white-space: normal !important;
            overflow: visible !important;
            text-overflow: unset !important;
        }
    </style>
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 mt-3 -container-p-y">
        <form action="{{ route($module.'.update', $data->id) }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')
            <div class="row gy-6">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                        <div class="d-flex flex-column justify-content-center">
                            {!! heading_breadcrumbs('Edit '. $title, $title.' edit') !!}
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
                {{-- Left Main Column (8 cols) --}}
                <div class="col-sm-12 col-xl-8">
                    <div class="card card-action border-top-bottom">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-file-text iconmrgn me-1"></span>
                                Edit {{ ucfirst($title) }} Details
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize font-weight-bold" for="title">
                                            <span>Section Main Title</span>
                                        </label>
                                        <input type="text"
                                               id="title"
                                               name="title"
                                               value="{{ old('title', $data->title) }}"
                                               class="form-control"
                                               placeholder="e.g. Required Documents for Umrah Visa"
                                               required>
                                        {!! error_label('title') !!}
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize font-weight-bold" for="subtitle">
                                            <span>Subheading / Description</span>
                                        </label>
                                        <textarea name="subtitle"
                                                  id="subtitle"
                                                  class="form-control"
                                                  rows="3"
                                                  placeholder="e.g. Please ensure all documents are clear, valid and up to date.">{{ old('subtitle', $data->subtitle) }}</textarea>
                                        {!! error_label('subtitle') !!}
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        @include('backend.components.document-items-repeater', ['data' => $data])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Sidebar Column (4 cols) --}}
                <div class="col-sm-12 col-xl-4">
                    <div class="card card-action border-top-bottom">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-photo iconmrgn me-1"></span>Featured Side Image
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                     <div class="col-md-12">
                                         @php
                                             $imageSrc = !empty($data->image)
                                                 ? asset('assets/images/'.$module.'/'.$data->image)
                                                 : imageNotFound();
                                         @endphp
                                         {!! image_input_option($imageSrc, 'image') !!}
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
                                        <label class="form-label text-capitalize" for="status">
                                            <span>{{ _label('status') }}</span>
                                        </label>
                                        <select id="status" name="status" class="form-select select2" required>
                                            @foreach($getStatus as $status)
                                                <option value="{{ $status }}" {{ old('status', $data->status) === $status ? 'selected' : '' }}>
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
                                               value="{{ old('ordering', $data->ordering) }}"
                                               class="form-control"
                                               placeholder="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-top-bottom mt-5 py-3">
                        <div class="row">
                            {!! form_action_buttons('Update Now', 'Save & New', 'Save & Stay') !!}
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
    <script src="{{ asset('assets/backend/js/jquery-repeater.js') }}"></script>
    <script src="{{ asset('assets/backend/js/forms-extras.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2({ width: '100%' });

            $(document).on('input change', '.item-color-picker', function () {
                $(this).siblings('.item-color-input').val($(this).val());
            });
            $(document).on('input change', '.item-color-input', function () {
                $(this).siblings('.item-color-picker').val($(this).val());
            });
        });
    </script>
@endpush
