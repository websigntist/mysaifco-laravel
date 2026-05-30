<?php $__env->startSection('content'); ?>
    
    <div class="container px-5">
        <h1 class="text-white text-3xl py-5 px-5"><?php echo e($blog->title); ?> Blog Detail</h1>
        <ul class="text-white">
            <li><strong>Blog Title:</strong> <?php echo e($blog->title); ?></li>
            <li><strong>Friendly URL:</strong> <?php echo e($blog->friendly_url); ?></li>
            <li><strong>Blog Category:</strong>
                <?php $__empty_1 = true; $__currentLoopData = $blog->blogCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <span class="badge bg-gray-700 px-1 rounded text-[12px]"><?php echo e($category->title . ','); ?> </span> &nbsp;
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <span class="text-muted">No Category</span>
                <?php endif; ?>
            </li>
            <li><strong>Status:</strong> <?php echo e($blog->status); ?></li>
            <li><strong>Description:</strong> <?php echo e($blog->description); ?></li>
            <li><strong>Meta Title:</strong> <?php echo e($blog->meta_title); ?></li>
            <li><strong>Meta Description:</strong> <?php echo e($blog->meta_description); ?></li>
            <li><strong>Meta Keywords:</strong> <?php echo e($blog->meta_keywords); ?></li>
            <li><strong>Image:</strong><br>
                <div class="lightgallery">
                    <?php if($blog->image): ?>
                        <a href="<?php echo e(asset('assets/images/blogs/'.$blog->image)); ?>">
                            <img src="<?php echo e(asset('assets/images/blogs/'.$blog->image)); ?>" class="w-2xs border-gray-300 border-1 rounded-sm" title="<?php echo e($blog->image); ?>" alt="<?php echo e($blog->image); ?>"/>
                        </a>
                    <?php else: ?>
                        <img src="<?php echo e(imageNotFound()); ?>"
                             class="w-2xs border-gray-300 border-1 rounded-sm"
                             title="<?php echo e($blog->image); ?>"
                             alt="<?php echo e($blog->image); ?>"/>
                    <?php endif; ?>
                </div>
            </li>
        </ul>

        <a href="<?php echo e(route('blogs')); ?>" class="btn btn-secondary text-white">Back to List</a>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\blogs\view.blade.php ENDPATH**/ ?>