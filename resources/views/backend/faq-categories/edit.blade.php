@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 mt-3 -container-p-y">
        <form action="{{ route($module . '.update', $data->id) }}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')
            <div class="row gy-6">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                        <div class="d-flex flex-column justify-content-center">
                            {!! heading_breadcrumbs('Edit ' . str_replace('-', ' ', $title), str_replace('-', ' ', $title) . ' edit form') !!}
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
                <!-- Left Column (8 cols) -->
                <div class="col-sm-12 col-xl-8">
                    <!-- Page Information -->
                    <div class="card card-action border-top-bottom">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-apps iconmrgn me-1"></span>
                                Edit {{ ucfirst(str_replace('-', ' ', $title)) }} Details
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="title">
                                            <span>{{ _label('title') }}</span>
                                        </label>
                                        <input type="text"
                                               id="title"
                                               name="title"
                                               value="{{ old('title', $data->title) }}"
                                               class="form-control"
                                               placeholder="Enter {{ _label('title') }}..." required>
                                        {!! error_label('title') !!}
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="friendly_url">
                                            <span>{{ _label('friendly_url') }}</span>
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="friendlyUrl">{{ url('/') }}/</span>
                                            <input type="text"
                                                   class="form-control"
                                                   id="friendly_url"
                                                   name="friendly_url"
                                                   value="{{ old('friendly_url', $data->friendly_url) }}"
                                                   placeholder="Enter {{ _label('friendly_url') }}" required>
                                        </div>
                                        {!! error_label('friendly_url') !!}
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="description">
                                            <span>{{ _label('description') }}</span>
                                        </label>
                                        <textarea class="form-control"
                                                  id="description"
                                                  name="description"
                                                  placeholder="Write {{ _label('description') }}..." rows="5">{{ old('description', $data->description) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SEO Meta Description -->
                    <div class="card card-action border-top-bottom mt-5">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-world-www iconmrgn me-1"></span> SEO Meta Description
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="meta_title">
                                            <span>{{ _label('meta_title') }}</span>
                                        </label>
                                        <input type="text"
                                               id="meta_title"
                                               name="meta_title"
                                               value="{{ old('meta_title', $data->meta_title) }}"
                                               class="form-control"
                                               placeholder="Enter {{ _label('meta_title') }}...">
                                        {!! error_label('meta_title') !!}
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="meta_keywords">
                                            {{ _label('meta_keywords') }}
                                        </label>
                                        <input type="text"
                                               id="meta_keywords"
                                               name="meta_keywords"
                                               value="{{ old('meta_keywords', $data->meta_keywords) }}"
                                               class="form-control"
                                               placeholder="Enter {{ _label('meta_keywords') }}...">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="meta_description">
                                            {{ _label('meta_description') }}
                                        </label>
                                        <textarea class="form-control"
                                                  id="meta_description"
                                                  name="meta_description"
                                                  placeholder="Write {{ _label('meta_description') }}..." rows="3">{{ old('meta_description', $data->meta_description) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Column (4 cols) -->
                <div class="col-sm-12 col-xl-4">
                    <!-- Featured Image -->
                    <div class="card card-action border-top-bottom">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-photo iconmrgn me-1"></span> Featured Image
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        {!! image_input_option($data->image ? asset('assets/images/'.$module.'/'.$data->image) : imageNotFound(), 'image') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Other Options -->
                    <div class="card card-action border-top-bottom mt-5">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-settings iconmrgn me-1"></span> Other Options
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
                                        <label class="form-label text-capitalize" for="ordering">
                                            {{ _label('ordering') }}
                                        </label>
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
                    <!-- Action Buttons -->
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
    <script>
        $('#title').bind('keyup blur', function () {
            var title = $(this).val();
            if(!$('#friendly_url').data('edited')){
                $('#friendly_url').val(friendly_URL(title));
            }
            if(!$('#meta_title').data('edited')){
                $('#meta_title').val(meta_title(title));
            }
        });
        $('#friendly_url').change(function(){ $(this).data('edited', true); });
        $('#meta_title').change(function(){ $(this).data('edited', true); });

        function friendly_URL(url) {
            url.trim();
            var URL = url.replace(/\-+/g, '-').replace(/\W+/g, '-');
            if (URL.substr((URL.length - 1), URL.length) == '-') {
                URL = URL.substr(0, (URL.length - 1));
            }
            return URL.toLowerCase();
        }

        function meta_title(url) {
            url.trim();
            var URL = url.replace(/\-+/g, '-').replace(/\W+/g, ' ');
            if (URL.substr((URL.length - 1), URL.length) == ' ') {
                URL = URL.substr(0, (URL.length - 1));
            }
            return capital_letter(URL);
        }

        function capital_letter(str) {
            str = str.split(" ");
            for (var i = 0, x = str.length; i < x; i++) {
                if (str[i]) {
                    str[i] = str[i][0].toUpperCase() + str[i].substr(1);
                }
            }
            return str.join(" ");
        }
    </script>
    <script src="{{ asset('assets/backend/js/cleave-zen.js') }}"></script>
    <script src="{{ asset('assets/backend/js/select2.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form-layouts.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form-validation.js') }}"></script>
@endpush
