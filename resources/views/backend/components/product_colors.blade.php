@php
    $p = $product ?? null;
    $colorRows = old('product-colors');
    if ($colorRows === null && $p) {
        $colorRows = $p->productColors->map(fn ($c) => [
            'item_name'   => $c->item_name,
            'value'       => $c->value,
            'price'       => $c->price,
            'description' => $c->description,
        ])->all();
    }
    if (! is_array($colorRows) || count($colorRows) === 0) {
        $colorRows = [['item_name' => '', 'value' => '', 'price' => '', 'description' => '']];
    }
@endphp
<div class="tab-pane fade" id="navs-colors" role="tabpanel">
    <div class="row g-6">
        <div class="form-repeater" id="product-colors-repeater">
            <div data-repeater-list="product-colors">
                @foreach($colorRows as $c)
                    @php $c = is_array($c) ? $c : []; @endphp
                <div data-repeater-item="">
                    <div class="row">
                        <div class="col-lg-6 col-xl-2 col-12 mb-0">
                            <label class="form-label">Item Name</label>
                            <input type="text" name="item_name" class="form-control" value="{{ $c['item_name'] ?? '' }}" placeholder="">
                        </div>
                        <div class="col-lg-6 col-xl-2 col-12 mb-0">
                            <label class="form-label">Value</label>
                            <input type="text" name="value" class="form-control product-color-value" value="{{ $c['value'] ?? '' }}" placeholder="#000000" autocomplete="off">
                        </div>
                        <div class="col-lg-6 col-xl-1 col-12 mb-0">
                            <label class="form-label">Color</label>
                            <input type="color" class="form-control product-color-picker" value="{{ !empty($c['value']) && preg_match('/^#[0-9A-Fa-f]{6}$/', $c['value']) ? $c['value'] : '#7367f0' }}"
                                   style="height: 40px;padding: 0 !important;">
                        </div>
                        <div class="col-lg-6 col-xl-2 col-12 mb-0">
                            <label class="form-label">Price</label>
                            <input type="text" name="price" class="form-control" value="{{ $c['price'] ?? '' }}" placeholder="">
                        </div>
                        <div class="col-lg-6 col-xl-3 col-12 mb-0">
                            <label class="form-label">Description (optional)</label>
                            <input type="text" name="description" class="form-control" value="{{ $c['description'] ?? '' }}" placeholder="">
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

@once
    @push('script')
        <script>
            (function () {
                function syncPickerToValue(picker) {
                    var row = picker.closest('[data-repeater-item]');
                    if (!row) return;
                    var valInput = row.querySelector('.product-color-value');
                    if (valInput) {
                        valInput.value = picker.value;
                    }
                }

                document.addEventListener('input', function (e) {
                    if (e.target.classList && e.target.classList.contains('product-color-picker')) {
                        syncPickerToValue(e.target);
                    }
                });
                document.addEventListener('change', function (e) {
                    if (e.target.classList && e.target.classList.contains('product-color-picker')) {
                        syncPickerToValue(e.target);
                    }
                });

                function syncAllColorPickers() {
                    document.querySelectorAll('#product-colors-repeater .product-color-picker').forEach(syncPickerToValue);
                }
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', syncAllColorPickers);
                } else {
                    syncAllColorPickers();
                }
            })();
        </script>
    @endpush
@endonce
