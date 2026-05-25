@php
    $searchRows = old('popular-search-items');
    if ($searchRows === null && isset($data)) {
        $searchRows = $data->search_items ?? [];
    }
    if (! is_array($searchRows) || count($searchRows) === 0) {
        $searchRows = [['title' => '']];
    }
@endphp
<div class="col-md-12">
    <label class="form-label text-capitalize mb-3">
        <span>Search terms</span>
    </label>
    <div class="form-repeater" id="popular-search-items-repeater">
        <div data-repeater-list="popular-search-items">
            @foreach($searchRows as $row)
                @php $row = is_array($row) ? $row : []; @endphp
                <div data-repeater-item="">
                    <div class="row align-items-end">
                        <div class="col-lg-10 col-12 mb-0">
                            <label class="form-label text-capitalize">
                                <span>{{ _label('title') }}</span>
                            </label>
                            <input type="text"
                                   name="title"
                                   class="form-control"
                                   value="{{ $row['title'] ?? '' }}"
                                   placeholder="e.g. Yacht in Dubai Marina"
                                   required>
                        </div>
                        <div class="col-lg-2 col-12 d-flex align-items-center mb-0">
                            <button type="button" class="btn btn-label-danger w-100" data-repeater-delete="">
                                <i class="icon-base ti tabler-x me-1"></i>
                                <span class="align-middle">Delete</span>
                            </button>
                        </div>
                    </div>
                    <hr>
                </div>
            @endforeach
        </div>
        <div class="mb-0">
            <button type="button" class="btn btn-primary" data-repeater-create="">
                <i class="icon-base ti tabler-plus me-1"></i>
                <span class="align-middle">Add more field</span>
            </button>
        </div>
    </div>
</div>
