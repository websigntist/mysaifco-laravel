@php
    $p = $product ?? null;
    $sizeRows = old('product-sizes');
    if ($sizeRows === null && $p) {
        $sizeRows = $p->productSizes->map(fn ($s) => [
            'item_name'   => $s->item_name,
            'value'       => $s->value,
            'price'       => $s->price,
            'description' => $s->description,
        ])->all();
    }
    if (! is_array($sizeRows) || count($sizeRows) === 0) {
        $sizeRows = [['item_name' => '', 'value' => '', 'price' => '', 'description' => '']];
    }
@endphp
<div class="tab-pane fade" id="navs-sizes" role="tabpanel">
    <div class="row g-6">
        <div class="form-repeater" id="product-sizes-repeater">
            <div data-repeater-list="product-sizes">
                @foreach($sizeRows as $s)
                    @php $s = is_array($s) ? $s : []; @endphp
                <div data-repeater-item="">
                    <div class="row">
                        <div class="col-lg-6 col-xl-2 col-12 mb-0">
                            <label class="form-label">Item Name</label>
                            <input type="text" name="item_name" class="form-control" value="{{ $s['item_name'] ?? '' }}" placeholder="">
                        </div>
                        <div class="col-lg-6 col-xl-2 col-12 mb-0">
                            <label class="form-label">Item Value</label>
                            <input type="text" name="value" class="form-control" value="{{ $s['value'] ?? '' }}" placeholder="">
                        </div>
                        <div class="col-lg-6 col-xl-2 col-12 mb-0">
                            <label class="form-label">Item Price</label>
                            <input type="text" name="price" class="form-control" value="{{ $s['price'] ?? '' }}" placeholder="">
                        </div>
                        <div class="col-lg-6 col-xl-4 col-12 mb-0">
                            <label class="form-label">Item Description</label>
                            <input type="text" name="description" class="form-control" value="{{ $s['description'] ?? '' }}" placeholder="">
                        </div>
                        <div class="col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                            <button type="button" class="btn btn-label-danger mt-xl-6" data-repeater-delete="">
                                <i class="icon-base ti tabler-x me-1"></i>
                            </button>
                        </div>
                    </div>
                    <hr>
                </div>
                @endforeach
            </div>
            <div class="mb-0">
                <button type="button" class="btn btn-primary" data-repeater-create="">
                    <i class="icon-base ti tabler-plus me-1"></i> <span class="align-middle">Add</span>
                </button>
            </div>
        </div>
    </div>
</div>
