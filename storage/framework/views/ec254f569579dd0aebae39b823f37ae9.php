<?php $__env->startSection('content'); ?>
    
    <div class="container px-5">
        <h1 class="text-white text-3xl py-5 -px-5">User Detail</h1>
        <ul class="text-white">
            <li><strong>User:</strong> <?php echo e($user->first_name .' '. $user->last_name); ?></li>
            <li><strong>Phone:</strong> <?php echo e($user->mobile_no); ?></li>
            <li><strong>Email:</strong> <?php echo e($user->email); ?></li>
            <li><strong>Created at:</strong> <?php echo e($user->created_at->format('M d, Y')); ?></li>
            <li><strong>Image:</strong><br>
                <div class="lightgallery">
                    <?php if($user->image): ?>
                        <img src="<?php echo e(asset('assets/images/users/'.$user->image)); ?>"
                             class="w-2xs border-gray-300 border-1 rounded-sm"
                             title="<?php echo e($user->image); ?>"
                             alt="<?php echo e($user->image); ?>"/>
                    <?php else: ?>
                        <img src="<?php echo e(imageNotFound()); ?>"
                             class="w-2xs border-gray-300 border-1 rounded-sm"
                             title="image not found"
                             alt="image not found"/>
                    <?php endif; ?>
                </div>
            </li>
        </ul>
        <a href="<?php echo e(route($module)); ?>" class="btn btn-secondary text-white">Back to List</a>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\users\view.blade.php ENDPATH**/ ?>