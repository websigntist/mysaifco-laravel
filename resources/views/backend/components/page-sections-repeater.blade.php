@php
    $sectionsData = old('sections');
    if ($sectionsData === null && isset($data) && isset($data->sections) && count($data->sections) > 0) {
        $sectionsData = $data->sections->toArray();
    }
    $isInitEmpty = false;
    if (!is_array($sectionsData) || count($sectionsData) === 0) {
        $sectionsData = [[
            'id' => '',
            'section_heading' => '',
            'section_sub_heading' => '',
            'section_description' => '',
            'button_status' => 0,
            'button_title' => '',
            'button_url' => '',
            'section_image' => ''
        ]];
        $isInitEmpty = true;
    }
@endphp

@push('style')
<style>
    .repeater-section-item {
        padding: 1.25rem;
        border-radius: 8px;
        margin-bottom: 1.25rem;
        border: 1px solid #e2e8f0;
        transition: background-color 0.2s ease-in-out;
    }
    .repeater-section-item:nth-child(even) {
        background-color: #f2f2f2 !important;
    }
    .repeater-section-item:nth-child(odd) {
        background-color: #ffffff !important;
    }
</style>
@endpush

<input type="hidden" id="repeater-init-empty" value="{{ $isInitEmpty ? '1' : '0' }}">

<div class="card card-action border-top-bottom mt-5">
    <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
        <h6 class="mb-0 text-capitalize">
            <span class="icon-sm icon-base ti tabler-apps iconmrgn me-1"></span>
            Section Details
        </h6>
        {!! card_action_element() !!}
    </div>
    <div class="collapse show">
        <div class="card-body pt-5">
            <div class="form-repeater" id="page-sections-repeater">
                <div data-repeater-list="sections">
                    @foreach($sectionsData as $index => $sec)
                        @php $sec = (array) $sec; @endphp
                        <div data-repeater-item class="repeater-section-item">
                            <input type="hidden" name="id" value="{{ $sec['id'] ?? '' }}" class="section-id-input">

                            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
                                <h6 class="mb-0 text-primary section-title fw-bold d-flex align-items-center flex-wrap">
                                    <i class="icon-base ti tabler-layout-grid me-1"></i> Section <span class="section-number ms-1">{{ $index }}</span><span class="section-heading-display text-dark d-inline-flex align-items-center" style="font-size: inherit; font-weight: inherit;">@if(!empty($sec['section_heading']))<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="mx-1 text-secondary"><path d="m9 18 6-6-6-6"/></svg><span class="section-heading-text" style="color: #000000 !important;">{{ $sec['section_heading'] }}</span>@endif</span>
                                </h6>
                                <button type="button" class="btn btn-label-danger btn-sm" data-repeater-delete>
                                    <i class="icon-base ti tabler-trash me-1"></i> Delete Section
                                </button>
                            </div>

                            <div class="row g-4">
                                <div class="col-md-12">
                                    <label class="form-label text-capitalize">
                                        <span>{{ _label('section_heading') }}</span>
                                    </label>
                                    <input type="text"
                                           name="section_heading"
                                           value="{{ $sec['section_heading'] ?? '' }}"
                                           class="form-control"
                                           placeholder="Enter {{ _label('section_heading') }}..." required>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label text-capitalize">
                                        {{ _label('section_sub_heading') }}
                                        <small class="text-muted" style="font-size: 10px">(optional)</small>
                                    </label>
                                    <input type="text"
                                           name="section_sub_heading"
                                           value="{{ $sec['section_sub_heading'] ?? '' }}"
                                           class="form-control"
                                           placeholder="Enter {{ _label('section_sub_heading') }}...">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label text-capitalize">
                                        <span>{{ _label('section_description') }}</span>
                                    </label>
                                    <textarea class="form-control section-editor"
                                              id="section_description_{{ $index }}"
                                              name="section_description"
                                              rows="4"
                                              placeholder="Enter {{ _label('section_description') }}...">{{ $sec['section_description'] ?? '' }}</textarea>
                                </div>

                                <div class="col-md-3 d-flex align-items-end pb-2">
                                    <div class="form-check form-switch mb-0 d-flex align-items-center gap-2">
                                        <input type="hidden" name="button_status" value="0">
                                        <input type="checkbox" name="button_status" class="form-check-input mt-0 me-0" value="1" {{ !empty($sec['button_status']) ? 'checked' : '' }}>
                                        <label class="form-check-label text-capitalize mb-0" style="cursor: pointer;">Button Show/Hide</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label text-capitalize">
                                        {{ _label('button_title') }}
                                    </label>
                                    <input type="text"
                                           name="button_title"
                                           value="{{ $sec['button_title'] ?? '' }}"
                                           class="form-control"
                                           placeholder="Enter {{ _label('button_title') }}...">
                                </div>

                                <div class="col-md-5">
                                    <label class="form-label text-capitalize">
                                        {{ _label('button_url') }}
                                    </label>
                                    <input type="text"
                                           name="button_url"
                                           value="{{ $sec['button_url'] ?? '' }}"
                                           class="form-control"
                                           placeholder="Enter {{ _label('button_url') }}...">
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label class="form-label text-capitalize">
                                        {{ _label('section_image') }}
                                    </label>
                                    <input type="file"
                                           name="section_image"
                                           class="form-control section-image-input"
                                           accept="image/webp,image/jpeg,image/png,image/jpg,image/svg+xml">
                                    <small class="text-danger d-block mt-1">webp, jpg, png, svg, jpeg (max size 2mb)</small>
                                </div>

                                <div class="col-md-6 mt-3 section-img-preview-wrapper" style="{{ !empty($sec['section_image']) ? '' : 'display: none;' }}">
                                    <label class="form-label text-capitalize d-block">Image Preview</label>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="light-gallery border rounded p-1">
                                            @php
                                                $imgSrc = !empty($sec['section_image']) ? asset('assets/images/pages/sections/' . $sec['section_image']) : asset('assets/images/pages/1779663114_6a13810aa05d7_image.webp');
                                            @endphp
                                            <a href="{{ $imgSrc }}" target="_blank" class="section-img-link">
                                                <img src="{{ $imgSrc }}"
                                                     class="rounded img-fluid section-img-preview"
                                                     style="height: 60px; object-fit: cover;"
                                                     alt="Section Image">
                                            </a>
                                        </div>
                                        <button type="button"
                                                class="btn btn-sm btn-danger del_section_img"
                                                data-id="{{ $sec['id'] ?? '' }}">
                                            Remove Image
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mb-0">
                    <button type="button" class="btn btn-primary" data-repeater-create>
                        <i class="icon-base ti tabler-plus me-1"></i>
                        <span class="align-middle">Add New Section</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
