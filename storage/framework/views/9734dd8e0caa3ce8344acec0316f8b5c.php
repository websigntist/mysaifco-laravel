<?php $__env->startSection('content'); ?>
    
    <div class="container px-5">
        <h1 class="text-white text-3xl py-5 px-5"><?php echo e($page->menu_title); ?> Page Detail</h1>
        <ul class="text-white">
            <li><strong>Menu Title:</strong> <?php echo e($page->menu_title); ?></li>
            <li><strong>Page Title:</strong> <?php echo e($page->page_title); ?></li>
            <li><strong>Friendly URL:</strong> <?php echo e($page->friendly_url); ?></li>
            <li><strong>Status:</strong> <?php echo e($page->status); ?></li>
            <li><strong>Description:</strong> <?php echo e($page->description); ?></li>
            <li><strong>Meta Title:</strong> <?php echo e($page->meta_title); ?></li>
            <li><strong>Meta Description:</strong> <?php echo e($page->meta_description); ?></li>
            <li><strong>Meta Keywords:</strong> <?php echo e($page->meta_keywords); ?></li>
            <li><strong>Image:</strong><br>
                <div class="lightgallery">
                    <?php if($page->image): ?>
                        <img src="<?php echo e(asset('assets/images/pages/'.$page->image)); ?>" class="w-2xs border-gray-300 border-1 rounded-sm" title="<?php echo e($page->image); ?>" alt="<?php echo e($page->image); ?>"/>
                    <?php else: ?>
                        <img src="<?php echo e(imageNotFound()); ?>"
                             class="w-2xs border-gray-300 border-1 rounded-sm"
                             title="<?php echo e($page->image); ?>"
                             alt="<?php echo e($page->image); ?>"/>
                    <?php endif; ?>
                </div>
            </li>
        </ul>

        <ul class="text-white mt-5">
            <li><strong>Maintenance Title:</strong> <?php echo e($maintenance->maintenance_title); ?></li>
            <li><strong>Maintenance Mode:</strong> <?php echo e($maintenance->mode == 0 ? 'Inactive' : 'Active'); ?>

            </li>
            <li><strong>Image:</strong><br>
                <div class="lightgallery">
                    <?php if($maintenance->maintenance_image): ?>
                        <img src="<?php echo e(asset('assets/images/maintenance/'.$maintenance->maintenance_image)); ?>"
                             class="w-2xs border-gray-300 border-1 rounded-sm"
                             title="<?php echo e($page->image); ?>"
                             alt="<?php echo e($page->image); ?>"/>
                    <?php else: ?>
                        <img src="<?php echo e(imageNotFound('jk')); ?>"
                             class="w-2xs border-gray-300 border-1 rounded-sm"
                             title="<?php echo e($page->image); ?>"
                             alt="<?php echo e($page->image); ?>"/>
                    <?php endif; ?>
                </div>
            </li>
        </ul>
        <a href="<?php echo e(route('pages')); ?>" class="btn btn-secondary text-white">Back to List</a>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\pages\view.blade.php ENDPATH**/ ?>