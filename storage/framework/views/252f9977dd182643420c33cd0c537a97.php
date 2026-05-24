<?php
    $redTags = $redTags ?? collect();
    $selected = old('red_tag_id', $selected ?? null);
?>
<label class="form-label text-capitalize" for="red_tag_id"><?php echo e(_label('red_tag') ?? 'Red Tag'); ?></label>
<select id="red_tag_id"
        name="red_tag_id"
        class="form-select select2">
    <option value="">- select red tag -</option>
    <?php $__currentLoopData = $redTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $redTag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($redTag->id); ?>" <?php echo e((string) $selected === (string) $redTag->id ? 'selected' : ''); ?>>
            <?php echo e($redTag->title); ?>

        </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/backend/components/red-tag-select.blade.php ENDPATH**/ ?>