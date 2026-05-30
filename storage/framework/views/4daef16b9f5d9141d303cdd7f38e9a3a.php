<?php
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
?>
<div class="tab-pane fade" id="navs-sizes" role="tabpanel">
    <div class="row g-6">
        <div class="form-repeater" id="product-sizes-repeater">
            <div data-repeater-list="product-sizes">
                <?php $__currentLoopData = $sizeRows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $s = is_array($s) ? $s : []; ?>
                <div data-repeater-item="">
                    <div class="row">
                        <div class="col-lg-6 col-xl-2 col-12 mb-0">
                            <label class="form-label">Item Name</label>
                            <input type="text" name="item_name" class="form-control" value="<?php echo e($s['item_name'] ?? ''); ?>" placeholder="">
                        </div>
                        <div class="col-lg-6 col-xl-2 col-12 mb-0">
                            <label class="form-label">Item Value</label>
                            <input type="text" name="value" class="form-control" value="<?php echo e($s['value'] ?? ''); ?>" placeholder="">
                        </div>
                        <div class="col-lg-6 col-xl-2 col-12 mb-0">
                            <label class="form-label">Item Price</label>
                            <input type="text" name="price" class="form-control" value="<?php echo e($s['price'] ?? ''); ?>" placeholder="">
                        </div>
                        <div class="col-lg-6 col-xl-4 col-12 mb-0">
                            <label class="form-label">Item Description</label>
                            <input type="text" name="description" class="form-control" value="<?php echo e($s['description'] ?? ''); ?>" placeholder="">
                        </div>
                        <div class="col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                            <button type="button" class="btn btn-label-danger mt-xl-6" data-repeater-delete="">
                                <i class="icon-base ti tabler-x me-1"></i>
                            </button>
                        </div>
                    </div>
                    <hr>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="mb-0">
                <button type="button" class="btn btn-primary" data-repeater-create="">
                    <i class="icon-base ti tabler-plus me-1"></i> <span class="align-middle">Add</span>
                </button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\components\product_sizes.blade.php ENDPATH**/ ?>