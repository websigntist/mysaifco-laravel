@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 mt-3 -container-p-y">
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
                @include('backend.components.validation_errors')
                <div class="row mb-6 gy-6">
                    <div class="col-sm-12 col-xl-8 offset-xl-2">
                        <!-- page information -->
                        <div class="card card-action border-top-bottom">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-apps iconmrgn me-1"></span>
                                    Fill Out The {{ucfirst(str_replace('-',' ',$title))}}Details
                                </h6>
                                {!! card_action_element() !!}
                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <div class="col-sm-12 col-md-6">
                                            <label class="form-label text-capitalize" for="parent_id">
                                                <span>{{_label('parent_id')}}</span> </label>
                                            <select id="parent_id" name="parent_id" class="form-select select2" required>
                                                <option value="0">/Parent Module</option>
                                                @foreach($modules as $module_id => $module_title)
                                                    <option value="{{ old($module_id, $module_id) }}">{{ ucfirst($module_title) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label class="form-label text-capitalize" for="show_in_menu">
                                                <span>{{_label('show_in_menu')}}</span> </label>
                                            <select id="show_in_menu" name="show_in_menu" class="form-select select2" required>
                                                @foreach($getShowinmenu as $menu)
                                                    <option value="{{ old($menu, $menu) }}">{{ ucfirst($menu) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label class="form-label text-capitalize" for="module_title">
                                                <span>{{_label('module_title')}}</span> </label>
                                            <input type="text"
                                                   id="module_title"
                                                   name="module_title"
                                                   value="{{ old('module_title') }}"
                                                   class="form-control"
                                                   placeholder="Enter {{_label('module_title')}}..." required>
                                            {!! error_label('module_title') !!}
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label class="form-label text-capitalize" for="module_slug">
                                                <span>{{_label('module_slug')}}</span> </label>
                                            <input type="text"
                                                   id="module_slug"
                                                   name="module_slug"
                                                   value="{{ old('module_slug') }}"
                                                   class="form-control"
                                                   placeholder="Enter {{_label('module_slug')}}..." required>
                                            {!! error_label('module_slug') !!}
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label class="form-label text-capitalize" for="status">
                                                <span>{{_label('status')}}</span> </label>
                                            <select id="status" name="status" class="form-select select2" required>
                                                @foreach($getStatus as $status)
                                                    <option value="{{ old($status, $status) }}">{{ ucfirst($status) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label class="form-label text-capitalize" for="ordering">
                                                {{_label('ordering')}}
                                            </label>
                                            <input type="number"
                                                   id="ordering"
                                                   name="ordering"
                                                   value="{{ old('ordering') }}"
                                                   class="form-control"
                                                   placeholder="Enter 1 to 99...">
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <label class="form-label text-capitalize" for="actions">
                                                <span>{{_label('actions')}}</span> </label>
                                            <input type="text"
                                                   id="actions"
                                                   name="actions"
                                                   value="{{ old('actions', 'nil') }}"
                                                   class="form-control"
                                                   placeholder="Enter {{_label('actions')}}..." required>
                                            <div class="form-text text-danger">
                                                add | edit | view | status | delete | delete all | More | import | export
                                            </div>
                                            {!! error_label('actions') !!}
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <label class="form-label text-capitalize" for="icon">
                                                <?php echo _label('CSS_icon_code'); ?>
                                                <small>(iconify - tabler)</small>
                                            </label>
                                            <input type="text"
                                                   id="icon"
                                                   name="icon"
                                                   value="{{ old('icon') }}"
                                                   class="form-control"
                                                   placeholder="Enter {{_label('icon')}}...">
                                            {!! error_label('icon') !!}
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
    <script>
        /*===========================*/
        $('#module_title').bind('keyup blur', function () {
            var module_title = $(this).val();
            $('#module_slug').val(module_slug(module_title));
        });

        /*auto written module_slug*/
        function module_slug(url) {
            url.trim();
            var URL = url.replace(/\-+/g, '-').replace(/\W+/g, '-');// Replace Non-word characters
            if (URL.substr((URL.length - 1), URL.length) == '-') {
                URL = URL.substr(0, (URL.length - 1));
            }
            return URL.toLowerCase();
        }

        document.addEventListener("DOMContentLoaded", function () {
                    document.querySelectorAll('input[name="actions"], textarea[name="actions"]').forEach(function (el) {
                        function cleanValue(val) {
                            return val
                                .replace(/\s*\|\s*/g, ' | ') // normalize spaces around |
                                .replace(/\s+/g, ' ')        // collapse multiple spaces
                                .trim();                     // remove leading/trailing spaces
                        }

                        // On keyup format instantly
                        el.addEventListener('keyup', function () {
                            this.value = cleanValue(this.value);
                        });

                        // Also on blur (final cleanup)
                        el.addEventListener('blur', function () {
                            this.value = cleanValue(this.value);
                        });
                    });
                });
    </script>
    <script src="{{ asset('assets/backend/js/cleave-zen.js') }}"></script>
    <script src="{{ asset('assets/backend/js/select2.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form-layouts.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form-validation.js') }}"></script>
@endpush
