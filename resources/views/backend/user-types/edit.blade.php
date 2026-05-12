@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/jstree.css') }}">
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 mt-3 -container-p-y">
        <form action="{{ route($module . '.update', $data->id) }}" method="post" class="needs-validation"
              enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')
            <div class="row gy-6">
                <div class="col-sm-12 col-xl-8 offset-xl-2">
                    <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                        <div class="d-flex flex-column justify-content-center">
                            {!! heading_breadcrumbs('Add New '. str_replace('-',' ',$title), str_replace('-',' ',$title).' form') !!}
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
            @include('backend.components.validation_errors')
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
                                        <label class="form-label text-capitalize" for="user_type">
                                            <span>{{_label('user_type')}}</span> </label>
                                        <input type="text"
                                               id="user_type"
                                               name="user_type"
                                               value="{{ old('user_type', $data->user_type) }}"
                                               class="form-control"
                                               placeholder="Enter {{_label('user_type')}}..." required>
                                        {!! error_label('user_type') !!}
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="login_type">
                                            <span>{{_label('login_type')}}</span> </label>
                                        <select id="login_type" name="login_type" class="form-select select2" required>
                                            @foreach($loginTypes as $login_type)
                                                <option value="{{ old($login_type, $login_type) }}"{{$data->login_type == $login_type ? 'selected' : ''}}>
                                                    {{ ucfirst($login_type) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="status">
                                            <span>{{_label('status')}}</span> </label>
                                        <select id="status" name="status" class="form-select select2" required>
                                            @foreach($getStatus as $status)
                                                <option value="{{ old($status, $status) }}" {{$data->status == $status ? 'selected' : ''}}>
                                                    {{ ucfirst($status) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <div id="jstree-checkbox" class="mt-5">
                                            {!! buildModuleCheckBox(0, $menu, $assignedModules, $selectedActions) !!}
                                        </div>
                                        {{--<div id="form_message" class="text-danger mt-2"></div>--}}
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-start mt-5">
                                            {!! form_action_buttons('Update Now', 'Update & New', 'Update & Stay') !!}
                                        </div>
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
    <script src="{{ asset('assets/backend/js/jstree.js') }}"></script>
    <script src="{{ asset('assets/backend/js/extended-ui-treeview.js') }}"></script>
@endpush
