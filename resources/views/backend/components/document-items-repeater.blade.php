@php
    $rows = old('required-document-items');
    if ($rows === null && isset($data)) {
        $rows = $data->document_items ?? [];
    }
    if (!is_array($rows) || count($rows) === 0) {
        $rows = [
            ['title' => 'Clear Scans of Passport Copy', 'description' => 'Passport should be valid for 6 months and Visa should be valid for months.'],
            ['title' => '1 Passport Size Photo', 'description' => 'Passport should be valid for 6 months and Visa should be valid for months.'],
            ['title' => 'National ID Card Copy', 'description' => 'National ID Card copy (Front & Back)'],
            ['title' => 'Processing Time', 'description' => 'Umrah Visa Processing will take approximately 2-3 working days.'],
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
                <div data-repeater-item class="border rounded p-4 mb-4 shadow-xs position-relative" style="background-color: #f2f2f2 !important;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-primary">Document Item</span>
                        <button type="button" class="btn btn-sm btn-label-danger" data-repeater-delete>
                            <i class="icon-base ti tabler-trash me-1"></i> Remove Item
                        </button>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-12">
                            <label class="form-label text-capitalize font-weight-bold"> <span>Item Title</span>
                            </label>
                            <input type="text"
                                   name="title"
                                   class="form-control"
                                   value="{{ $row['title'] ?? '' }}"
                                   placeholder="e.g. Clear Scans of Passport Copy"
                                   required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label text-capitalize font-weight-bold"> <span>Item Subtitle / Description</span>
                            </label>
                            <textarea name="description"
                                      class="form-control"
                                      rows="3"
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
