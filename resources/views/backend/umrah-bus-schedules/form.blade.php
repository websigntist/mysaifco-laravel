@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 mt-3">
        <form action="{{ route($module.'.store') }}" method="post" class="needs-validation" novalidate>
            @csrf
            <div class="row gy-6">
                <div class="col-sm-12 col-xl-8 offset-xl-2">
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
                <div class="col-sm-12 col-xl-8 offset-xl-2">
                    <div class="card card-action border-top-bottom">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-calendar-event iconmrgn me-1"></span>
                                Fill Out The {{ ucfirst($title) }} Details
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="departure_date">
                                            <span>Departure Date / Day</span> <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"
                                               id="departure_date"
                                               name="departure_date"
                                               value="{{ old('departure_date') }}"
                                               class="form-control"
                                               placeholder="e.g. 05 March 2025"
                                               required>
                                        {!! error_label('departure_date') !!}
                                    </div>

                                    <div class="col-md-6">
                                        @include('backend.components.tour-type-select', [
                                            'tourTypes' => $tourTypes,
                                            'selected' => old('tour_type_id') ? [(int) old('tour_type_id')] : [],
                                        ])
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="sharing_4_5_beds">
                                            <span>Sharing 4~5 Beds Price</span>
                                        </label>
                                        <input type="text"
                                               id="sharing_4_5_beds"
                                               name="sharing_4_5_beds"
                                               value="{{ old('sharing_4_5_beds', '2200/-') }}"
                                               class="form-control"
                                               placeholder="e.g. 2200/-">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="sharing_3_beds">
                                            <span>Sharing 3 Beds Price</span>
                                        </label>
                                        <input type="text"
                                               id="sharing_3_beds"
                                               name="sharing_3_beds"
                                               value="{{ old('sharing_3_beds', '2400/-') }}"
                                               class="form-control"
                                               placeholder="e.g. 2400/-">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="sharing_2_beds">
                                            <span>Sharing 2 Beds Price</span>
                                        </label>
                                        <input type="text"
                                               id="sharing_2_beds"
                                               name="sharing_2_beds"
                                               value="{{ old('sharing_2_beds', '2750/-') }}"
                                               class="form-control"
                                               placeholder="e.g. 2750/-">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="status">
                                            <span>Status</span> <span class="text-danger">*</span>
                                        </label>
                                        <select id="status" name="status" class="form-select select2" required>
                                            @foreach($getStatus as $st)
                                                <option value="{{ $st }}" {{ old('status', 'Active') == $st ? 'selected' : '' }}>
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
                                               value="{{ old('ordering', 0) }}"
                                               class="form-control"
                                               placeholder="0, 1, 2...">
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        {!! form_action_buttons('Submit Form', 'Save & New', 'Save & Stay') !!}
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
        });
    </script>
@endpush
