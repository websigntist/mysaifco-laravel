<?php
    $p = $product ?? null;
    $selectedBrandId = old('brand_id', optional($p)->brand_id);
    if ($selectedBrandId === null && isset($brands) && $brands->isNotEmpty() && ! $p) {
        $selectedBrandId = $brands->first()->id;
    }
?>
<div class="tab-pane fade show active" id="navs-basic-info" role="tabpanel">
    <div class="row g-6">
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="title"> <span><?php echo e(_label('title')); ?></span> </label>
            <input type="text"
                   id="title"
                   name="title"
                   value="<?php echo e(old('title', optional($p)->title)); ?>"
                   class="form-control"
                   placeholder="Enter <?php echo e(_label('title')); ?>..." required>
            <?php echo error_label('title'); ?>

        </div>
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="friendly_url">
                <span><?php echo e(_label('friendly_url')); ?></span></label>
            <div class="input-group">
                <span class="input-group-text" id="friendlyUrl"><?php echo e(url('/')); ?>/</span> <input type="text"
                                                                                            class="form-control"
                                                                                            id="friendly_url"
                                                                                            name="friendly_url"
                                                                                            value="<?php echo e(old('friendly_url', optional($p)->friendly_url)); ?>"
                                                                                            placeholder="Enter <?php echo e(_label('friendly_url')); ?>" required>
            </div>
            <div class="form-text text-danger">product url/slug should be unique.</div>
            <?php echo error_label('friendly_url'); ?>

        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="quantity"> <span><?php echo e(_label('quantity')); ?></span> </label>
            <input type="number"
                   id="quantity"
                   name="quantity"
                   value="<?php echo e(old('quantity', optional($p)->quantity ?? 0)); ?>"
                   class="form-control"
                   min="0"
                   placeholder="Enter <?php echo e(_label('quantity')); ?>..." required>
            <?php echo error_label('quantity'); ?>

        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="stock_status"> <span><?php echo e(_label('stock_status')); ?></span> </label>
            <select id="stock_status" name="stock_status" class="form-select select2" required>
                <?php $__currentLoopData = $enumStockStatus ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($opt); ?>" <?php if(old('stock_status', optional($p)->stock_status ?? ($enumStockStatus[0] ?? '')) === $opt): echo 'selected'; endif; ?>><?php echo e($opt); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php echo error_label('stock_status'); ?>

        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="discount"> <?php echo e(_label('discount')); ?> </label>
            <select id="discount" name="discount" class="form-select select2" data-placeholder="Select types">
                <option value="">Select discount</option>
                <?php $__currentLoopData = $enumDiscount ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($opt); ?>" <?php if((string) old('discount', optional($p)->discount) === (string) $opt): echo 'selected'; endif; ?>><?php echo e($opt); ?>%</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php echo error_label('discount'); ?>

        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="brand_id"> <?php echo e(_label('brand')); ?> </label>
            <select id="brand_id" name="brand_id" class="form-select select2" required <?php if(isset($brands) && $brands->isEmpty()): ?> disabled <?php endif; ?>>
                <?php $__currentLoopData = $brands ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($b->id); ?>" <?php if((string) $selectedBrandId === (string) $b->id): echo 'selected'; endif; ?>><?php echo e($b->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if(isset($brands) && $brands->isEmpty()): ?>
                <div class="form-text text-warning">Add at least one active brand before creating a product.</div>
            <?php endif; ?>
            <?php echo error_label('brand_id'); ?>

        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="product_tag"> <?php echo e(_label('product_tag')); ?> </label>
            <select id="product_tag" name="product_tag" class="form-select select2">
                <option value="">Select product tag</option>
                <?php $__currentLoopData = $enumProductTag ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($opt); ?>" <?php if(old('product_tag', optional($p)->product_tag) === $opt): echo 'selected'; endif; ?>><?php echo e($opt); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php echo error_label('product_tag'); ?>

        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="style_no"> <?php echo e(_label('style_no')); ?> </label>
            <input type="text"
                   id="style_no"
                   name="style_no"
                   value="<?php echo e(old('style_no', optional($p)->style_no)); ?>"
                   class="form-control"
                   placeholder="Enter <?php echo e(_label('style_no')); ?>...">
            <?php echo error_label('style_no'); ?>

        </div>
         <div class="col-md-3">
            <label class="form-label text-capitalize" for="sku"> <?php echo e(_label('SKU')); ?> </label>
            <input type="text"
                   id="sku"
                   name="sku"
                   value="<?php echo e(old('sku', optional($p)->sku)); ?>"
                   class="form-control"
                   placeholder="Enter <?php echo e(_label('sku')); ?>...">
            <?php echo error_label('sku'); ?>

        </div>
         <div class="col-md-3">
            <label class="form-label text-capitalize" for="isbn"> Barcode / ISBN </label>
            <input type="text"
                   id="isbn"
                   name="isbn"
                   value="<?php echo e(old('isbn', optional($p)->isbn)); ?>"
                   class="form-control"
                   placeholder="Enter barcode / ISBN...">
            <?php echo error_label('isbn'); ?>

        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="weight">
                <?php echo e(_label('weight')); ?> <unit class="text-lowercase">(<?php echo e(get_setting('weight_unit')); ?>)</unit>
            </label>
            <input type="number"
                   step="0.001"
                   id="weight"
                   name="weight"
                   value="<?php echo e(old('weight', optional($p)->weight)); ?>"
                   class="form-control"
                   placeholder="Enter <?php echo e(_label('weight')); ?>...">
            <div class="form-text text-danger">update unit from <a href="<?php echo e(siteUrl('admin/settings')); ?>" target="_blank">setting</a></div>
            <?php echo error_label('weight'); ?>

        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="length">
                <?php echo e(_label('length')); ?> <unit class="text-lowercase">(<?php echo e(get_setting('measurment_unit')); ?>)</unit>
            </label>
            <input type="number"
                   step="0.001"
                   id="length"
                   name="length"
                   value="<?php echo e(old('length', optional($p)->length)); ?>"
                   class="form-control"
                   placeholder="Enter <?php echo e(_label('length')); ?>...">
            <?php echo error_label('length'); ?>

        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="width">
                <?php echo e(_label('width')); ?> <unit class="text-lowercase">(<?php echo e(get_setting('measurment_unit')); ?>)</unit>
            </label>
            <input type="number"
                   step="0.001"
                   id="width"
                   name="width"
                   value="<?php echo e(old('width', optional($p)->width)); ?>"
                   class="form-control"
                   placeholder="Enter <?php echo e(_label('width')); ?>...">
            <?php echo error_label('width'); ?>

        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="height">
                <?php echo e(_label('height')); ?> <unit class="text-lowercase">(<?php echo e(get_setting('measurment_unit')); ?>)</unit>
            </label>
            <input type="number"
                   step="0.001"
                   id="height"
                   name="height"
                   value="<?php echo e(old('height', optional($p)->height)); ?>"
                   class="form-control"
                   placeholder="Enter <?php echo e(_label('height')); ?>...">
            <?php echo error_label('height'); ?>

        </div>
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="short_description"> <?php echo e(_label('short_description')); ?> </label>
            <textarea name="short_description" id="short_description" class="form-control" rows="5" placeholder="Write product short description..."><?php echo e(old('short_description', optional($p)->short_description)); ?></textarea>
        </div>
        <div class="-col-md-12">
            
            <div class="nav-align-top nav-tabs-shadow">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#full_description">
                          Product Full Description
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#product_features">
                          Product Features
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#product_specifications">
                          Product Specifications
                        </button>
                    </li>
                </ul>
                <div class="tab-content" style="padding: 20px 0 0 0 !important;">
                    <?php echo $__env->make('backend.components.full_description', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('backend.components.product_features', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('backend.components.product_specifications', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>
            
        </div>

    </div>
</div>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\components\product_basic_info.blade.php ENDPATH**/ ?>