<div class="col-md-12">
    <label class="form-label text-capitalize" for="title">
        <span><?php echo e(_label('title')); ?></span>
    </label>
    <input type="text"
           id="title"
           name="title"
           value="<?php echo e(old('title', $data->title ?? '')); ?>"
           class="form-control"
           placeholder="Enter <?php echo e(_label('title')); ?>..."
           required>
    <?php echo error_label('title'); ?>

</div>
<div class="col-md-12">
    <label class="form-label text-capitalize" for="description">
        <span><?php echo e(_label('description')); ?></span>
    </label>
    <textarea class="form-control"
              id="editor"
              name="description"
              placeholder="Write <?php echo e(_label('description')); ?>..."
              rows="5"><?php echo e(old('description', $data->description ?? '')); ?></textarea>
</div>
<div class="col-md-4">
    <label class="form-label text-capitalize" for="status">
        <span><?php echo e(_label('status')); ?></span>
    </label>
    <select id="status" name="status" class="form-select select2" required>
        <?php $__currentLoopData = $getStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($status); ?>" <?php echo e(old('status', $data->status ?? 'Active') === $status ? 'selected' : ''); ?>><?php echo e(ucfirst($status)); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<div class="col-md-4">
    <?php echo $__env->make('backend.components.tour-type-select', [
        'tourTypes' => $tourTypes,
        'selected' => old('tour_type_id', $data->tour_type_id ?? null) ? [(int) old('tour_type_id', $data->tour_type_id ?? null)] : [],
    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>
<div class="col-md-4">
    <label class="form-label text-capitalize" for="ordering"><?php echo e(_label('ordering')); ?></label>
    <input type="number"
           id="ordering"
           name="ordering"
           value="<?php echo e(old('ordering', $data->ordering ?? 0)); ?>"
           class="form-control"
           placeholder="0"
           min="0">
</div>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/backend/components/tour-package-text-fields.blade.php ENDPATH**/ ?>