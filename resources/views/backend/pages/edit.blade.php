@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 mt-3">
        <form action="{{ route($module.'.update', $data->id) }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            @method('Put')
            <div class="row gy-6">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                        <div class="d-flex flex-column justify-content-center">
                            {!! heading_breadcrumbs('Update '. $title, $title.' form') !!}
                        </div>
                        <div class="card-header-elements ms-auto d-flex align-items-center flex-wrap gap-2">
                            @if(!empty($data->friendly_url))
                                <a href="{{ url($data->friendly_url) }}" target="_blank" class="btn btn-sm btn-info waves-effect waves-light me-1 d-none d-lg-inline-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="View Page">
                                    <span class="icon-base ti tabler-eye icon-20px me-1"></span>View Page
                                </a>
                                <a href="{{ url($data->friendly_url) }}" target="_blank" class="btn btn-icon btn-sm btn-info waves-effect waves-light me-1 d-inline-flex d-lg-none align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="View Page">
                                    <span class="icon-base ti tabler-eye icon-20px"></span>
                                </a>
                            @endif
                            {!! goBack($module,'Update') !!}
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
                                <span class="icon-sm icon-base ti tabler-apps iconmrgn me-1"></span> Fill Out
                                                                                                     The {{ucfirst($title)}}
                                                                                                     Details
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="menu_title">
                                            <span>{{_label('menu_title')}}</span> </label> <input type="text"
                                                                                                  id="menu_title"
                                                                                                  name="menu_title"
                                                                                                  value="{{ old('menu_title', $data->menu_title) }}"
                                                                                                  class="form-control"
                                                                                                  placeholder="Enter {{_label('menu_title')}}..." required>
                                        {!! error_label('menu_title') !!}
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="page_title">
                                            <span>{{_label('page_title')}}</span> </label>
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <input class="form-check-input mt-0"
                                                       type="checkbox"
                                                       name="show_title"
                                                       value="1"
                                                       {{ old('show_title', $data->show_title) == 1 ? 'checked' : '' }}
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       data-bs-original-title="Show Title">
                                            </div>
                                            <input type="text"
                                                   id="page_title"
                                                   name="page_title"
                                                   value="{{ old('page_title', $data->page_title) }}"
                                                   class="form-control"
                                                   placeholder="Enter {{_label('page_title')}}..." required>
                                        </div>
                                        {!! error_label('page_title') !!}
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="sub_title">
                                            {{_label('sub_title')}}
                                            <small style="font-size: 10px">(optional)</small></label> <input type="text"
                                                                                                             id="sub_title"
                                                                                                             name="sub_title"
                                                                                                             value="{{ old('sub_title', $data->sub_title) }}"
                                                                                                             class="form-control"
                                                                                                             placeholder="Enter {{_label('sub_title')}}...">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="friendly_url">
                                            <span>{{_label('friendly_url')}}</span> </label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="friendlyUrl">https://websigntist.com/</span>
                                            <input type="text"
                                                   class="form-control"
                                                   id="friendly_url"
                                                   name="friendly_url"
                                                   value="{{ old('friendly_url', $data->friendly_url) }}"
                                                   placeholder="Enter {{_label('friendly_url')}}" required>
                                        </div>
                                        {!! error_label('friendly_url') !!}
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="short_details">
                                            <span>{{_label('short_details')}}</span>
                                        </label>
                                        <textarea class="form-control"
                                                  id="short_details"
                                                  name="short_details"
                                                  rows="3"
                                                  placeholder="Enter {{_label('short_details')}}...">{{ old('short_details', $data->short_details) }}</textarea>
                                        {!! error_label('short_details') !!}
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="description" class="form-control" id="editor">{{ old('description', $data->description) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section repeater -->
                    @include('backend.components.page-sections-repeater', ['data' => $data])
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
                                        {!! image_input_option($data->image ? asset('assets/images/'.$module .'/' . $data->image) : imageNotFound(),'image') !!}
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="image_alt">{{_label('image_alt')}} </label>
                                        <input type="text" id="image_alt" name="image_alt" value="{{ old('image_alt', $data->image_alt) }}" class="form-control" placeholder="Enter {{_label('image_alt')}}...">
                                        {!! error_label('image_alt') !!}
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="image_title">{{_label('image_title')}}</label>
                                        <input type="text" id="image_title" name="image_title" value="{{ old('image_title', $data->image_title) }}" class="form-control" placeholder="Enter {{_label('image_title')}}...">
                                        {!! error_label('image_title') !!}
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
                                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="show_contact_us" id="show_contact_us" value="1" {{ old('show_contact_us', $data->show_contact_us ?? 1) == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label text-capitalize" for="show_contact_us">Contact Us</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="show_whatsapp" id="show_whatsapp" value="1" {{ old('show_whatsapp', $data->show_whatsapp ?? 1) == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label text-capitalize" for="show_whatsapp">WhatsApp</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="show_email_us" id="show_email_us" value="1" {{ old('show_email_us', $data->show_email_us ?? 1) == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label text-capitalize" for="show_email_us">Email Us</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="show_trust_bar" id="show_trust_bar" value="1" {{ old('show_trust_bar', $data->show_trust_bar ?? 1) == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label text-capitalize"
                                                       for="show_trust_bar">Trust Bar (Show/Hide)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="tour_type_id">
                                            <span>Tour Category</span>
                                        </label>
                                        <select id="tour_type_id" name="tour_type_id" class="form-select select2">
                                            <option value="">- Select Tour Category -</option>
                                            @foreach($tourTypes as $tourType)
                                                <option value="{{ $tourType->id }}" {{ old('tour_type_id', $data->tour_type_id) == $tourType->id ? 'selected' : '' }}>
                                                    {{ $tourType->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="status">
                                            <span>{{_label('status')}}</span> </label>
                                        <select id="status" name="status" class="form-select select2" required>
                                            @foreach($getStatus as $status)
                                                <option value="{{ $status }}" {{ $data->status == $status ? 'selected' : '' }}>
                                                    {{ ucfirst($status) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="parent_id">
                                            {{_label('parent_id')}}
                                        </label>
                                        <select id="parent_id" name="parent_id" class="form-select select2">
                                            <option value="0">/Parent</option>
                                            @foreach($parent_ids as $parent)
                                                <option value="{{ $parent->id }}" {{ $parent->id == $data->parent_id ? 'selected' : '' }}>
                                                    {{ $parent->menu_title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="parent_id">
                                            {{_label('container_layout')}}
                                        </label>
                                        <select id="container_layout" name="container_layout" class="form-select select2">
                                            @foreach($getlayout as $layout)
                                                <option value="{{ $layout }}" {{ $data->container_layout == $layout ? 'selected' : '' }}>{{ ucfirst($layout) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="show_in_menu">
                                            {{_label('show_in_menu')}}
                                        </label>
                                        <select id="show_in_menu" name="show_in_menu" class="form-select select2">
                                            @foreach($getShowinmenu as $menu)
                                                <option value="{{ $menu }}" {{ $data->show_in_menu == $menu ?
                                                'selected' : '' }}>
                                                    {{ ucfirst($menu) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="ordering">
                                            {{_label('ordering')}}
                                        </label> <input type="number"
                                                        id="ordering"
                                                        name="ordering"
                                                        value="{{ old('ordering', $data->ordering) }}"
                                                        class="form-control"
                                                        placeholder="Enter 1 to 99...">
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
                                                                                                  value="{{ old('meta_title', $data->meta_title) }}"
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
                                                        value="{{ old('meta_keywords', $data->meta_keywords) }}"
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
                                                               placeholder="Write {{_label('meta_description')}}" rows="3">{{ old('meta_description', $data->meta_description) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- maintenance mode -->
                    {{--@include('backend.components.page_maintenance_option')--}}
                    <!-- action buttons -->
                    <div class="card border-top-bottom mt-5 py-3 sticky-action-card" style="position: sticky; top: 90px; z-index: 99; background: var(--bs-card-bg, #ffffff);">
                        <div class="row">
                            {!! form_action_buttons('Update & Stay', 'Update & New', 'Update & Exit') !!}
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('script')
    <script>
        $('#menu_title').bind('keyup blur', function () {
            var menu_title = $(this).val();
            $('#friendly_url').val(friendly_URL(menu_title));
            $('#meta_title').val(meta_title(menu_title));
            // $('#page_title').val(page_title(menu_title));
            $('#image_title').val(image_title(menu_title));
            $('#image_alt').val(image_alt(menu_title));
            $('#title').val(meta_title(menu_title));
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

        function image_alt(url) {
            url.trim();
            var img_alt = url.replace(/\-+/g, '-').replace(/\W+/g, '-');
            if (img_alt.substr((img_alt.length - 1), img_alt.length) == ' ') {
                img_alt = img_alt.substr(0, (img_alt.length - 1));
            }
            return img_alt.toLowerCase();
        }

        function image_title(url) {
            url.trim();
            var URL = url.replace(/\-+/g, '-').replace(/\W+/g, ' ');
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
    <script src="{{ asset('assets/backend/js/moment.js') }}"></script>
    <script src="{{ asset('assets/backend/js/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/backend/js/select2.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form-layouts.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form-validation.js') }}"></script>
    <script src="{{ asset('assets/backend/js/jquery-repeater.js') }}"></script>
    <script src="{{ asset('assets/backend/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        function initTinyMCEForElement(elementId) {
            if (typeof tinymce === 'undefined') return;
            if (tinymce.get(elementId)) {
                tinymce.remove('#' + elementId);
            }
            tinymce.init({
                selector: '#' + elementId,
                license_key: 'gpl',
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
                setup: function (editor) {
                    editor.on('change blur keyup', function () {
                        editor.save();
                    });
                }
            });
        }

        function initAllSectionEditors() {
            $('.section-editor').each(function (idx) {
                var id = $(this).attr('id');
                if (!id) {
                    id = 'sec_desc_' + idx + '_' + new Date().getTime();
                    $(this).attr('id', id);
                }
                initTinyMCEForElement(id);
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            tinymce.init({
                selector: '#editor',
                license_key: 'gpl',
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

            initAllSectionEditors();
        });

        $(document).ready(function () {
            var savedScroll = sessionStorage.getItem('cms_page_scroll_pos');
            if (savedScroll !== null) {
                sessionStorage.removeItem('cms_page_scroll_pos');
                setTimeout(function () {
                    window.scrollTo({
                        top: parseInt(savedScroll),
                        behavior: 'instant'
                    });
                }, 80);
            }

            var chevronSvg = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="mx-1 text-secondary"><path d="m9 18 6-6-6-6"/></svg>';

            function updateSectionNumbers() {
                $('#page-sections-repeater [data-repeater-item]').each(function (index) {
                    $(this).find('.section-number').text(index);
                    var headingVal = $(this).find('input[name*="section_heading"]').val();
                    if (headingVal && headingVal.trim().length > 0) {
                        var safeText = $('<div>').text(headingVal.trim()).html();
                        $(this).find('.section-heading-display').html(chevronSvg + '<span class="section-heading-text" style="color: #000000 !important;">' + safeText + '</span>');
                    } else {
                        $(this).find('.section-heading-display').html('');
                    }
                });
            }

            $(document).on('input keyup change', 'input[name*="section_heading"]', function () {
                var val = $(this).val().trim();
                var $display = $(this).closest('[data-repeater-item]').find('.section-heading-display');
                if (val.length > 0) {
                    var safeText = $('<div>').text(val).html();
                    $display.html(chevronSvg + '<span class="section-heading-text" style="color: #000000 !important;">' + safeText + '</span>');
                } else {
                    $display.html('');
                }
            });

            $('#page-sections-repeater').repeater({
                show: function () {
                    var $item = $(this);
                    $item.slideDown();

                    // Clean up cloned TinyMCE markup
                    $item.find('.tox-tinymce').remove();
                    var $textarea = $item.find('.section-editor');
                    $textarea.show();

                    var newId = 'sec_desc_' + new Date().getTime() + '_' + Math.floor(Math.random() * 1000);
                    $textarea.attr('id', newId);

                    setTimeout(function () {
                        initTinyMCEForElement(newId);
                    }, 50);

                    $item.find('.section-id-input').val('');
                    $item.find('.section-heading-display').text('');
                    $item.find('.section-img-preview-wrapper').hide();
                    $item.find('.section-img-preview').attr('src', '');
                    $item.find('.section-img-link').attr('href', '');
                    updateSectionNumbers();
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this section?')) {
                        var editorId = $(this).find('.section-editor').attr('id');
                        if (editorId && typeof tinymce !== 'undefined' && tinymce.get(editorId)) {
                            tinymce.remove('#' + editorId);
                        }
                        $(this).slideUp(deleteElement, function () {
                            $(this).remove();
                            updateSectionNumbers();
                        });
                    }
                },
                isFirstItemUndeletable: false
            });

            updateSectionNumbers();

            $('form').on('submit', function () {
                if (typeof tinymce !== 'undefined') {
                    tinymce.triggerSave();
                }
                var currentPos = window.scrollY || document.documentElement.scrollTop;
                sessionStorage.setItem('cms_page_scroll_pos', currentPos);
            });

            $(document).on('click', '.del_section_img', function (e) {
                e.preventDefault();
                var btn = $(this);
                var sectionId = btn.attr('data-id');
                var wrapper = btn.closest('.section-img-preview-wrapper');
                var container = btn.closest('[data-repeater-item]');

                if (!confirm('Are you sure you want to remove this section image?')) {
                    return;
                }

                if (sectionId) {
                    $.ajax({
                        url: '{{ route("pages.delete-section-image") }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: sectionId
                        },
                        success: function (res) {
                            if (res.success) {
                                wrapper.fadeOut(function() { $(this).hide(); });
                                container.find('.section-image-input').val('');
                                if (typeof Notiflix !== 'undefined' && Notiflix.Notify) {
                                    Notiflix.Notify.success(res.message);
                                }
                            } else {
                                alert(res.message || 'Failed to remove image');
                            }
                        },
                        error: function () {
                            alert('Error removing image');
                        }
                    });
                } else {
                    wrapper.fadeOut(function() { $(this).hide(); });
                    container.find('.section-image-input').val('');
                }
            });

            $(document).on('change', '.section-image-input', function () {
                var input = this;
                var container = $(input).closest('[data-repeater-item]');
                var wrapper = container.find('.section-img-preview-wrapper');
                var imgPreview = container.find('.section-img-preview');
                var imgLink = container.find('.section-img-link');

                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        imgPreview.attr('src', e.target.result);
                        imgLink.attr('href', e.target.result);
                        wrapper.fadeIn();
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });
        });
    </script>
@endpush
