<?php
    $multiple = (bool) ($multiple ?? false);
    $required = (bool) ($required ?? false);
    $tourTypes = $tourTypes ?? collect();
    $fieldId = $id ?? ($multiple ? 'tour_type' : 'tour_type_id');
    $fieldName = $multiple ? 'tour_type[]' : 'tour_type_id';
    $selectedValues = (array) ($selected ?? []);
?>
<label class="form-label text-capitalize" for="<?php echo e($fieldId); ?>"><?php echo e(_label('tour_type')); ?></label>
<select id="<?php echo e($fieldId); ?>"
        name="<?php echo e($fieldName); ?>"
        class="form-select select2"
        <?php if($multiple): ?> multiple data-placeholder="Select tour type..." <?php endif; ?>
        <?php if(!empty($required)): ?> required <?php endif; ?>>
    <?php if (! ($multiple)): ?>
        <option value="">- select tour type -</option>
    <?php endif; ?>
    <?php $__currentLoopData = $tourTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tourType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($tourType->id); ?>"
            <?php echo e(in_array($tourType->id, $selectedValues) ? 'selected' : ''); ?>>
            <?php echo e($tourType->title); ?>

        </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/backend/components/tour-type-select.blade.php ENDPATH**/ ?>