<?php $p = $product ?? null; ?>
<div class="tab-pane fade" id="product_features" role="tabpanel">
    <textarea name="product_features" class="form-control tinymce-editor" id="editor_product_features" rows="8"><?php echo e(old('product_features', optional($p)->product_features)); ?></textarea>
</div>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\components\product_features.blade.php ENDPATH**/ ?>