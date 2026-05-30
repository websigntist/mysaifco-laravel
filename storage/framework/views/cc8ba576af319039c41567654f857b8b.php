<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 mt-3">
        <div class="row gy-6">
            <div class="col-sm-12">
                <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                    <div class="d-flex flex-column justify-content-center">
                        <?php echo heading_breadcrumbs('View '. $title, $data->title); ?>

                    </div>
                    <div class="card-header-elements ms-auto">
                        <?php echo goBack($module, 'Back'); ?>

                        <a href="<?php echo e(route($module.'.edit', $data->id)); ?>" class="btn btn-primary btn-sm">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-action border-top-bottom">
            <div class="card-header border-bottom py-3">
                <h6 class="mb-0">Gallery: <?php echo e($data->title); ?></h6>
            </div>
            <div class="card-body">
                <p><strong>Status:</strong> <span class="badge <?php echo e($data->status === 'active' ? 'bg-label-success' : 'bg-label-danger'); ?>"><?php echo e(ucfirst($data->status)); ?></span></p>
                <p><strong>Ordering:</strong> <?php echo e($data->ordering); ?></p>
                <?php if($data->cover_image): ?>
                    <p><strong>Cover image:</strong></p>
                    <img src="<?php echo e(asset('assets/images/'.$module.'/'.$data->cover_image)); ?>" alt="<?php echo e($data->title); ?>" class="img-thumbnail rounded" style="max-height: 200px;">
                <?php endif; ?>
                <hr>
                <h6>Gallery images (<?php echo e($data->images->count()); ?>)</h6>
                <div class="row g-3 mt-1">
                    <?php $__currentLoopData = $data->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <img src="<?php echo e($img->image ? asset('assets/images/galleries/images/'.$img->image) : imageNotFound()); ?>" alt="<?php echo e($img->image_alt); ?>" class="img-thumbnail rounded w-100">
                            <?php if($img->image_title): ?><p class="small mb-0 mt-1"><?php echo e($img->image_title); ?></p><?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\galleries\view.blade.php ENDPATH**/ ?>