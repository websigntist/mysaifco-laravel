<?php $p = $product ?? null; ?>
<div class="tab-pane fade" id="product_specifications" role="tabpanel">
    <textarea name="product_specifications" class="form-control tinymce-editor" id="editor_product_specifications" rows="8"><?php echo e(old('product_specifications', optional($p)->product_specifications)); ?></textarea>
</div>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/backend/components/product_specifications.blade.php ENDPATH**/ ?>