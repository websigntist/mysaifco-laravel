@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 mt-3">
            <form action="{{ route( $module . '.update', $data->id) }}" method="post" class="needs-validation"
                  enctype="multipart/form-data" novalidate>
                @csrf
                @method('Put')
                <div class="row gy-6">
                    <div class="col-sm-12 col-xl-8 offset-xl-2">
                        <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                            <div class="d-flex flex-column justify-content-center">
                                {!! heading_breadcrumbs('Update '. str_replace('-',' ',$title), str_replace('-',' ', $title).' edit form') !!}
                            </div>
                            <div class="card-header-elements ms-auto d-flex align-content-between">
                                {!! goBack($module, 'Update') !!}
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
                                        <div class="col-md-4">
                                            <label class="form-label text-capitalize" for="coupon_title">
                                                <span>{{_label('coupon_title')}}</span> </label>
                                            <input type="text"
                                                 id="coupon_title"
                                                 name="coupon_title"
                                                 value="{{ old('coupon_title', $data->coupon_title) }}"
                                                 class="form-control"
                                                 placeholder="Enter {{_label('coupon_title')}}..." required>
                                            {!! error_label('coupon_title') !!}
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-capitalize" for="coupon_code">
                                                <span>{{_label('coupon_code')}}</span> </label>
                                            <input type="text"
                                                   id="coupon_code"
                                                   name="coupon_code"
                                                   value="{{ old('coupon_code', $data->coupon_code) }}"
                                                   class="form-control"
                                                   placeholder="Enter {{_label('coupon_code')}}..." required>
                                            {!! error_label('coupon_code') !!}
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label text-capitalize" for="discount_type">
                                                <span>{{_label('discount_type')}}</span> </label>
                                            <select id="discount_type" name="discount_type" class="form-select select2" required>
                                                @foreach($gettype as $type)
                                                    <option value="{{ old($type, $type) }}" {{ $data->discount_type == $type ? 'selected' : '' }}>
                                                        {{ ucfirst($type) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-capitalize" for="discount_value">
                                                {{_label('discount_value')}} </label>
                                            <input type="text"
                                                  id="discount_value"
                                                  name="discount_value"
                                                  value="{{ old('discount_value', $data->discount_value) }}"
                                                  class="form-control"
                                                  placeholder="Enter {{_label('discount_value')}}...">
                                            {!! error_label('discount_value') !!}
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-capitalize" for="sale_start"> {{_label('start_date')}}</label>
                                            <input type="text"
                                                   id="start_date"
                                                   name="start_date"
                                                   value="{{ old('start_date', $data->start_date?->format('Y-m-d')) }}"
                                                   class="form-control dob-picker"
                                                   placeholder="YYYY-MM-DD">
                                            {!! error_label('start_date') !!}
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-capitalize" for="sale_end"> {{_label('end_date')}}</label>
                                            <input type="text"
                                                   id="end_date"
                                                   name="end_date"
                                                   value="{{ old('end_date', $data->end_date?->format('Y-m-d')) }}"
                                                   class="form-control dob-picker"
                                                   placeholder="YYYY-MM-DD">
                                            {!! error_label('end_date') !!}
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-capitalize" for="usage_limit">
                                                {{_label('usage_limit')}} </label>
                                            <input type="number"
                                                  id="usage_limit"
                                                  name="usage_limit"
                                                  value="{{ old('usage_limit', $data->usage_limit) }}"
                                                  class="form-control"
                                                  placeholder="Enter {{_label('usage_limit')}}...">
                                            {!! error_label('usage_limit') !!}
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-capitalize" for="min_order_value">
                                                {{_label('min_order_value')}} </label>
                                            <input type="number"
                                                  id="min_order_value"
                                                  name="min_order_value"
                                                  value="{{ old('min_order_value', $data->min_order_value) }}"
                                                  class="form-control"
                                                  placeholder="Enter {{_label('min_order_value')}}...">
                                            {!! error_label('min_order_value') !!}
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label text-capitalize" for="status">
                                                <span>{{_label('status')}}</span> </label>
                                            <select id="status" name="status" class="form-select select2" required>
                                                @foreach($getStatus as $status)
                                                    <option value="{{ old($status, $status) }}" {{ $data->status == $status ? 'selected' : '' }}>
                                                        {{ ucfirst($status) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label text-capitalize" for="ordering">
                                                {{_label('ordering')}}
                                            </label> <input type="number"
                                                            id="ordering"
                                                            name="ordering"
                                                            value="{{ old('ordering', $data->ordering) }}"
                                                            class="form-control"
                                                            placeholder="Enter 1 to 99...">
                                        </div>
                                        <div class="col-md-12">
                                            {!! form_action_buttons('Update Now', 'Update & New', 'Update & Stay') !!}
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
    <script src="{{ asset('assets/backend/js/flatpickr.js') }}"></script>
    @include('backend.components.form_js_libraries')
    <script src="{{ asset('assets/backend/js/jquery-repeater.js') }}"></script>
    <script src="{{ asset('assets/backend/js/forms-extras.js') }}"></script>
@endpush
