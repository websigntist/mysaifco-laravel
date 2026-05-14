<?php
    $meta_title = '401 - Access Denied';
    $meta_keywords = '';
    $meta_description = '';
?>
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/page-misc.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    
    <!--Under Maintenance -->
    <div class="container-xxl container-p-y">
        <div class="misc-wrapper">
            <h4 class="mb-2 mx-2">You are not Authorized! 🔐</h4>
            <p class="mb-6 mx-2">You don’t have permission to access this page. Go Back!</p>
            <a href="<?php echo e(siteUrl('admin/dashboard')); ?>" class="btn btn-primary">Back to Dashboard</a>
            <div class="mt-12">
                <img src="<?php echo e(asset('assets/backend/images/under-maintenance.png')); ?>"
                     width="550"
                     alt="under-maintenance"
                     title="under-maintenance"
                     class="img-fluid">
            </div>
        </div>
    </div>
    <!-- /Under Maintenance -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\laravel-cursor\resources\views/errors/404.blade.php ENDPATH**/ ?>