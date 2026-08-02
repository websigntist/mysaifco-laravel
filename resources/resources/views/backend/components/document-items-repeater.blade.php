@php
    $rows = old('required-document-items');
    if ($rows === null && isset($data)) {
        $rows = $data->document_items ?? [];
    }
    if (!is_array($rows) || count($rows) === 0) {
        $rows = [
            ['title' => 'Clear Scans of Passport Copy', 'description' => 'Passport should be valid for 6 months and Visa should be valid for months.', 'icon' => 'scan.svg', 'icon_color' => '#1e3a8a'],
            ['title' => '1 Passport Size Photo', 'description' => 'Passport should be valid for 6 months and Visa should be valid for months.', 'icon' => 'photo.svg', 'icon_color' => '#15803d'],
            ['title' => 'National ID Card Copy', 'description' => 'National ID Card copy (Front & Back)', 'icon' => 'idcard.svg', 'icon_color' => '#b45309'],
            ['title' => 'Processing Time', 'description' => 'Umrah Visa Processing will take approximately 2-3 working days.', 'icon' => 'clock.svg', 'icon_color' => '#b91c1c'],
        ];
    }
@endphp

<div class="col-md-12">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <label class="form-label text-capitalize font-weight-bold mb-0 fs-5">
            <i class="icon-base ti tabler-list-check me-1"></i> Document Items List
        </label>
    </div>
    <div class="form-repeater" id="required-document-items-repeater">
        <div data-repeater-list="required-document-items">
            @foreach($rows as $index => $row)
                @php $row = is_array($row) ? $row : []; @endphp
                <div data-repeater-item class="border rounded p-4 mb-4 bg-light shadow-xs position-relative">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-primary">Document Item</span>
                        <button type="button" class="btn btn-sm btn-label-danger" data-repeater-delete>
                            <i class="icon-base ti tabler-trash me-1"></i> Remove Item
                        </button>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label text-capitalize font-weight-bold" for="item_title_{{ $index }}">
                                Item Title <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   name="title"
                                   id="item_title_{{ $index }}"
                                   class="form-control"
                                   value="{{ $row['title'] ?? '' }}"
                                   placeholder="e.g. Clear Scans of Passport Copy"
                                   required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label text-capitalize font-weight-bold" for="item_icon_{{ $index }}">
                                Icon Name / Class
                            </label>
                            <input type="text"
                                   name="icon"
                                   id="item_icon_{{ $index }}"
                                   class="form-control"
                                   value="{{ $row['icon'] ?? '' }}"
                                   placeholder="e.g. scan.svg or tabler-id">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label text-capitalize font-weight-bold" for="item_color_{{ $index }}">
                                Icon Badge Color
                            </label>
                            <div class="d-flex align-items-center gap-2">
                                <input type="color"
                                       class="form-control form-control-color item-color-picker"
                                       value="{{ $row['icon_color'] ?? '#1e3a8a' }}"
                                       title="Choose color">
                                <input type="text"
                                       name="icon_color"
                                       id="item_color_{{ $index }}"
                                       class="form-control item-color-input"
                                       value="{{ $row['icon_color'] ?? '#1e3a8a' }}"
                                       placeholder="#1e3a8a">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label text-capitalize font-weight-bold" for="item_desc_{{ $index }}">
                                Item Subtitle / Description
                            </label>
                            <textarea name="description"
                                      id="item_desc_{{ $index }}"
                                      class="form-control"
                                      rows="2"
                                      placeholder="e.g. Passport should be valid for 6 months and Visa should be valid for months.">{{ $row['description'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-2">
            <button type="button" class="btn btn-primary" data-repeater-create>
                <i class="icon-base ti tabler-plus me-1"></i> Add Another Document Item
            </button>
        </div>
    </div>
</div>
