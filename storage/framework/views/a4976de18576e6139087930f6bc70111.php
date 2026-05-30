<?php $p = $product ?? null; ?>
<div class="tab-pane fade show active" id="full_description" role="tabpanel">
    <textarea name="full_description" class="form-control tinymce-editor" id="editor_full_description" rows="8"><?php echo e(old('full_description', optional($p)->full_description)); ?></textarea>
</div>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\components\full_description.blade.php ENDPATH**/ ?>