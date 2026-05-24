<?php $__env->startSection('content'); ?>
    <div class="cms-page">
        <?php if($page->show_title == '1' && filled($page->page_title)): ?>
            <section class="flex justify-center px-4 py-8 md:py-10">
                <div class="container mx-auto">
                    <h1 class="text-4xl font-semibold capitalize"><?php echo e($page->page_title); ?></h1>
                    <?php if(filled($page->sub_title)): ?>
                        <p class="mt-3 text-lg text-mst-gray"><?php echo e($page->sub_title); ?></p>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if(!empty($pageImageUrl)): ?>
            <section class="flex justify-center px-4 pb-6">
                <div class="container mx-auto">
                    <img src="<?php echo e($pageImageUrl); ?>"
                         alt="<?php echo e($page->image_alt ?? $page->page_title); ?>"
                         title="<?php echo e($page->image_title ?? $page->page_title); ?>"
                         class="mx-auto max-h-[28rem] w-full max-w-4xl rounded-xl object-cover">
                </div>
            </section>
        <?php endif; ?>

        <?php echo $__env->make('frontend.pages.partials.cms-content', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <?php if(!empty($includeFile)): ?>
        <div class="cms-page__include">
            <?php echo shortcode_include_render($includeFile, [
                'page'    => $page,
                'cmsPage' => $page,
            ]); ?>

        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/pages/combined.blade.php ENDPATH**/ ?>