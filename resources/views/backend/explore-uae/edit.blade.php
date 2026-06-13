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
                <div class="col-sm-12 col-xl-10 offset-xl-1">
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
                <div class="col-sm-12 col-xl-10 offset-xl-1">
                    <div class="card card-action border-top-bottom">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-apps iconmrgn me-1"></span>
                                Update The Explore UAE Details
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">

                                    <!-- 1 Column View (Full Width) -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label text-capitalize font-weight-bold" for="title">Title</label>
                                        <input type="text" id="title" name="title" value="{{ old('title', $data->title ?? '') }}" class="form-control" placeholder="Enter title..." required>
                                        {!! error_label('title') !!}
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <label class="form-label text-capitalize font-weight-bold" for="editor">Description</label>
                                        <textarea class="form-control" id="editor" name="description" placeholder="Write description..." rows="5">{{ old('description', $data->description ?? '') }}</textarea>
                                    </div>

                                    <!-- Section Header: Items Grid -->
                                    <!-- Row 1 of Items -->
                                    <!-- Item 1 -->
                                    <div class="col-md-4 mb-3">
                                        <div>
                                            <div class="mb-3">
                                                <label class="form-label" for="title1">Title 1</label>
                                                <input type="text" name="title1" id="title1" class="form-control" placeholder="Title 1" value="{{ old('title1', $data->title1 ?? '') }}">
                                            </div>
                                            <div>
                                                <label class="form-label" for="sub_title1">Sub Title 1</label>
                                                <input type="text" name="sub_title1" id="sub_title1" class="form-control" placeholder="Sub Title 1" value="{{ old('sub_title1', $data->sub_title1 ?? '') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Item 2 -->
                                    <div class="col-md-4 mb-3">
                                        <div>
                                            <div class="mb-3">
                                                <label class="form-label" for="title2">Title 2</label>
                                                <input type="text" name="title2" id="title2" class="form-control" placeholder="Title 2" value="{{ old('title2', $data->title2 ?? '') }}">
                                            </div>
                                            <div>
                                                <label class="form-label" for="sub_title2">Sub Title 2</label>
                                                <input type="text" name="sub_title2" id="sub_title2" class="form-control" placeholder="Sub Title 2" value="{{ old('sub_title2', $data->sub_title2 ?? '') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Item 3 -->
                                    <div class="col-md-4 mb-3">
                                        <div>
                                            <div class="mb-3">
                                                <label class="form-label" for="title3">Title 3</label>
                                                <input type="text" name="title3" id="title3" class="form-control" placeholder="Title 3" value="{{ old('title3', $data->title3 ?? '') }}">
                                            </div>
                                            <div>
                                                <label class="form-label" for="sub_title3">Sub Title 3</label>
                                                <input type="text" name="sub_title3" id="sub_title3" class="form-control" placeholder="Sub Title 3" value="{{ old('sub_title3', $data->sub_title3 ?? '') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Row 2 of Items -->
                                    <!-- Item 4 -->
                                    <div class="col-md-4 mb-3">
                                        <div>
                                            <div class="mb-3">
                                                <label class="form-label" for="title4">Title 4</label>
                                                <input type="text" name="title4" id="title4" class="form-control" placeholder="Title 4" value="{{ old('title4', $data->title4 ?? '') }}">
                                            </div>
                                            <div>
                                                <label class="form-label" for="sub_title4">Sub Title 4</label>
                                                <input type="text" name="sub_title4" id="sub_title4" class="form-control" placeholder="Sub Title 4" value="{{ old('sub_title4', $data->sub_title4 ?? '') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Item 5 -->
                                    <div class="col-md-4 mb-3">
                                        <div>
                                            <div class="mb-3">
                                                <label class="form-label" for="title5">Title 5</label>
                                                <input type="text" name="title5" id="title5" class="form-control" placeholder="Title 5" value="{{ old('title5', $data->title5 ?? '') }}">
                                            </div>
                                            <div>
                                                <label class="form-label" for="sub_title5">Sub Title 5</label>
                                                <input type="text" name="sub_title5" id="sub_title5" class="form-control" placeholder="Sub Title 5" value="{{ old('sub_title5', $data->sub_title5 ?? '') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Status & Ordering Box -->
                                    <div class="col-md-4 mb-3">
                                        <div class="">
                                            <div class="mb-3">
                                                <label class="form-label" for="status">Status</label>
                                                <select id="status" name="status" class="form-select select2" required>
                                                    @foreach($getStatus as $status)
                                                        <option value="{{ $status }}" {{ old('status', $data->status ?? 'Active') === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                <label class="form-label" for="ordering">Ordering</label>
                                                <input type="number" id="ordering" name="ordering" value="{{ old('ordering', $data->ordering ?? 0) }}" class="form-control" placeholder="0" min="0">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        {!! form_action_buttons('Update Now', 'Save & New', 'Save & Stay') !!}
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
    <script src="{{ asset('assets/backend/js/form-layouts.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form-validation.js') }}"></script>
    <script src="{{ asset('assets/backend/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            tinymce.init({
                selector: '#editor',
                license_key: 'gpl', // Required for free version
                plugins: 'code lists link image table anchor searchreplace visualblocks fullscreen insertdatetime table wordcount',

                toolbar: [
                    'undo redo | fontfamily fontsize | bold italic underline forecolor backcolor | strikethrough numlist ' +
                    'bullist checklist alignleft aligncenter alignright alignjustify |',
                    'link image table | subscript superscript removeformat | fullscreen code'
                ].join(' '),

                menubar: false,
                branding: false,
                toolbar_mode: 'wrap',

                font_family_formats:
                    'Poppins=poppins, sans-serif;' +
                    'Arial=arial,helvetica,sans-serif;' +
                    'Georgia=georgia,serif;' +
                    'Times New Roman=times new roman,times;' +
                    'Verdana=verdana,geneva,sans-serif;',

                font_size_formats: '8px 10px 12px 14px 16px 18px 20px 24px 28px 32px 36px',
            });
        });
    </script>
@endpush
