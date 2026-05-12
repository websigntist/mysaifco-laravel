@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 mt-3">
        <form action="{{ route($module . '.update', $data->id) }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')
            <div class="row gy-6">
                <div class="col-sm-12 col-xl-8 offset-xl-2">
                    <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                        <div class="d-flex flex-column justify-content-center">
                            {!! heading_breadcrumbs('Update ' . str_replace('-', ' ', $title), str_replace('-', ' ', $title) . ' edit') !!}
                        </div>
                        <div class="card-header-elements ms-auto d-flex align-content-between">
                            {!! goBack($module, 'Update') !!}
                        </div>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                                <span class="icon-sm icon-base ti tabler-apps iconmrgn me-1"></span>
                                Brand details
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="name">
                                                    <span>{{_label('brand_name')}}</span> </label>
                                        <input type="text" id="title" name="name" value="{{ old('name', $data->name) }}" class="form-control" required>{!! error_label('name') !!}
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="friendly_url">
                                            <span>{{_label('friendly_url')}}</span>
                                        </label>
                                        <input type="text" id="friendly_url" name="friendly_url" value="{{ old('friendly_url', $data->friendly_url) }}" class="form-control">
                                        {!! error_label('friendly_url') !!}
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="description">{{ _label('description') }}</label>
                                        <textarea class="form-control" id="editor" name="description" rows="4">{{ old('description', $data->description) }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="status">
                                            <span>{{ _label('status') }}</span>
                                        </label>
                                        <select id="status" name="status" class="form-select select2 text-capitalize" required>
                                            @foreach($getStatus as $status)
                                                <option value="{{ $status }}" {{ old('status', $data->status) === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label" for="ordering">{{ _label('ordering') }}</label>
                                        <input type="number" id="ordering" name="ordering" value="{{ old('ordering', $data->ordering) }}" class="form-control" min="0">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="image"><span>{{ _label('image') }}</span></label>
                                        {!! image_input_option($data->image ? asset('assets/images/'.$module .'/' . $data->image) : imageNotFound(), 'image', '100px') !!}
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
    <script>
            $('#title').bind('keyup blur', function () {
                var title = $(this).val();
                $('#friendly_url').val(friendly_URL(title));
                $('#meta_title').val(meta_title(title));
            });

            /*auto written friendly url*/
            function friendly_URL(url) {
                url.trim();
                var URL = url.replace(/\-+/g, '-').replace(/\W+/g, '-');// Replace Non-word characters
                if (URL.substr((URL.length - 1), URL.length) == '-') {
                    URL = URL.substr(0, (URL.length - 1));
                }
                return URL.toLowerCase();
            }
        </script>
    <script src="{{ asset('assets/backend/js/cleave-zen.js') }}"></script>
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
