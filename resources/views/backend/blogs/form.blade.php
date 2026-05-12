@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 mt-3 -container-p-y">
            <form action="{{route( $module . '.store')}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row gy-6">
                    <div class="col-sm-12">
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
                    <!-- left column ===================================-->
                    <!-- ===============================================-->
                    <div class="col-sm-12 col-xl-8">
                        <!-- page information -->
                        <div class="card card-action border-top-bottom">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-apps iconmrgn me-1"></span>
                                    Fill Out The {{ucfirst(str_replace('-',' ',$title))}} Details
                                </h6>
                                {!! card_action_element() !!}
                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize" for="title">
                                                <span>{{_label('title')}}</span> </label>
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <input class="form-check-input mt-0"
                                                           type="checkbox"
                                                           name="show_title"
                                                           value="{{old('show_title')}}"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top"
                                                           data-bs-original-title="Show Title">
                                                </div>
                                                <input type="text"
                                                       id="title"
                                                       name="title"
                                                       value="{{old('title')}}"
                                                       class="form-control"
                                                       placeholder="Enter {{_label('title')}}..." required>
                                            </div>
                                            {!! error_label('title') !!}
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize" for="friendly_url">
                                                <span>{{_label('friendly_url')}}</span> </label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="friendlyUrl">{{siteUrl()}}/</span>
                                                <input type="text"
                                                       class="form-control"
                                                       id="friendly_url"
                                                       name="friendly_url"
                                                       value="{{old('friendly_url')}}"
                                                       placeholder="Enter {{_label('friendly_url')}}" required>
                                            </div>
                                            {!! error_label('friendly_url') !!}
                                        </div>
                                        <div class="col-md-12">
                                            <textarea name="description" class="form-control" id="editor">{{old('description')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- meta title -->
                        <div class="card card-action border-top-bottom mt-5">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-world-www iconmrgn me-1"></span> SEO Meta
                                                                                                              Description
                                </h6>
                                {!! card_action_element() !!}
                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize" for="meta_title">
                                                <span>{{_label('meta_title')}}</span> </label> <input type="text"
                                                                                                      id="meta_title"
                                                                                                      name="meta_title"
                                                                                                      value="{{old ('meta_title')}}"
                                                                                                      class="form-control"
                                                                                                      placeholder="Enter {{_label('meta_title')}}..." required>
                                            {!! error_label('meta_title') !!}
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize" for="meta_keywords">
                                                {{_label('meta_keywords')}}
                                            </label> <input type="text"
                                                            id="meta_keywords"
                                                            name="meta_keywords"
                                                            value="{{old ('meta_keywords')}}"
                                                            class="form-control"
                                                            placeholder="Enter {{_label('meta_keywords')}}...">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-password-toggle">
                                                <label class="form-label text-capitalize" for="meta_description">
                                                    {{_label('meta_description')}}
                                                </label> <textarea class="form-control"
                                                                   id="meta_description"
                                                                   name="meta_description"
                                                                   placeholder="Write {{_label('meta_description')}}" rows="3">{{old ('meta_description')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right column ===================================-->
                    <!-- ================================================-->
                    <div class="col-sm-12 col-xl-4">
                        <!-- status -->
                        <div class="card card-action border-top-bottom">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-photo iconmrgn me-1"></span>feature image
                                </h6>
                                {!! card_action_element() !!}
                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <div class="col-md-12">
                                            <input class="form-control"
                                                   type="file"
                                                   name="image"
                                                   id="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- menu parent -->
                        <div class="card card-action border-top-bottom mt-5">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-table-options iconmrgn me-1"></span>other
                                                                                                                 option
                                </h6>
                                {!! card_action_element() !!}
                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize" for="status">
                                                <span>{{_label('status')}}</span> </label>
                                            <select id="status" name="status" class="form-select select2" required>
                                                @foreach($getStatus as $status)
                                                    <option value="{{ old($status, $status) }}">{{ ucfirst($status) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize" for="blog_categories">
                                                {{_label('categories')}}
                                            </label> <select id="blog_categories" name="blog_categories[]" class="form-select select2" multiple>
                                                <option value="0">/Parent</option>
                                                @foreach($blogCategories as $blogCat)
                                                    <option value="{{ old($blogCat->id, $blogCat->id) }}">
                                                        {{ ucfirst ($blogCat->title) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize" for="blog_tags">
                                                {{_label('tags')}}
                                            </label>
                                            <select id="blog_tags" name="blog_tags[]" class="form-select select2" multiple>
                                                <option value="0">/Parent</option>
                                                @foreach($blogTags as $blogtag)
                                                    <option value="{{ old($blogtag->id, $blogtag->id) }}">
                                                        {{ ucfirst ($blogtag->title) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize" for="show_in_menu">
                                                {{_label('show_in_menu')}}
                                            </label>
                                            <select id="show_in_menu" name="show_in_menu" class="form-select select2">
                                                @foreach($getShowinmenu as $menu)
                                                    <option value="{{ $menu }}">{{ ucfirst($menu) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize" for="ordering">
                                                {{_label('ordering')}}
                                            </label> <input type="number"
                                                            id="ordering"
                                                            name="ordering"
                                                            value="{{old ('ordering')}}"
                                                            class="form-control"
                                                            placeholder="Enter 1 to 99...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-top-bottom mt-5 py-3">
                            <div class="row">
                                {!! form_action_buttons('Submit Now', 'Save & New', 'Save & Stay') !!}
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

        /*auto written page title*/
        function page_title(url) {
            url.trim();
            var URL = url.replace(/\-+/g, '-').replace(/\W+/g, ' ');// Replace Non-word characters
            if (URL.substr((URL.length - 1), URL.length) == ' ') {
                URL = URL.substr(0, (URL.length - 1));
            }
            return capital_letter(URL);
        }

        /*auto written meta title*/
        function meta_title(url) {
            url.trim();
            var URL = url.replace(/\-+/g, '-').replace(/\W+/g, ' ');// Replace Non-word characters
            if (URL.substr((URL.length - 1), URL.length) == ' ') {
                URL = URL.substr(0, (URL.length - 1));
            }
            return capital_letter(URL);
        }

        /* capitalize in java */
        function capital_letter(str) {
            str = str.split(" ");
            for (var i = 0, x = str.length; i < x; i++) {
                str[i] = str[i][0].toUpperCase() + str[i].substr(1);
            }
            return str.join(" ");
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
