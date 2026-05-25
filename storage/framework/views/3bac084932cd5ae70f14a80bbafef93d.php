<?php $p = $product ?? null; ?>
<div class="tab-pane fade" id="navs-pricing-discount" role="tabpanel">
    <div class="row col-md-10 offset-1 g-6">
        <div class="col-md-6">
            <label class="form-label text-capitalize" for="regular_price"> <span><?php echo e(_label('regular_price')); ?></span>
            </label> <input type="text"
                            id="regular_price"
                            name="regular_price"
                            value="<?php echo e(old('regular_price', optional($p)->regular_price)); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo e(_label('regular_price')); ?>...">
            <?php echo error_label('regular_price'); ?>

        </div>
        <div class="col-md-6">
            <label class="form-label text-capitalize" for="sale_price"> <?php echo e(_label('sale_price')); ?></label>
            <input type="text"
                   id="sale_price"
                   name="sale_price"
                   value="<?php echo e(old('sale_price', optional($p)->sale_price)); ?>"
                   class="form-control"
                   placeholder="Enter <?php echo e(_label('sale_price')); ?>...">
            <?php echo error_label('sale_price'); ?>

        </div>
        <div class="col-md-6">
            <label class="form-label text-capitalize" for="sale_start"> <?php echo e(_label('sale_start')); ?></label>
            <input type="text"
                   id="sale_start"
                   name="sale_start"
                   value="<?php echo e(old('sale_start', optional($p)->sale_start?->format('Y-m-d'))); ?>"
                   class="form-control dob-picker"
                   placeholder="YYYY-MM-DD">
            <?php echo error_label('sale_start'); ?>

        </div>
        <div class="col-md-6">
            <label class="form-label text-capitalize" for="sale_end"> <?php echo e(_label('sale_end')); ?></label>
            <input type="text"
                   id="sale_end"
                   name="sale_end"
                   value="<?php echo e(old('sale_end', optional($p)->sale_end?->format('Y-m-d'))); ?>"
                   class="form-control dob-picker"
                   placeholder="YYYY-MM-DD">
            <?php echo error_label('sale_end'); ?>

        </div>
    </div>
</div>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/backend/components/product_pricing_discount.blade.php ENDPATH**/ ?>