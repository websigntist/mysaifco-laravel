<?php if($page->show_title == '1' && filled($page->page_title)): ?>
    <section class="flex justify-center py-8 md:py-10">
        <div class="container mx-auto">
            <h1 class="text-4xl font-semibold capitalize"><?php echo e($page->page_title); ?></h1>
            <?php if(filled($page->sub_title)): ?>
                <p class="mt-3 text-lg text-mst-gray"><?php echo e($page->sub_title); ?></p>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if(filled($pageContent ?? null)): ?>
    <div class="container mx-auto">
        <div class="cms-page__content">
            <?php echo $pageContent; ?>

        </div>
    </div>
<?php endif; ?>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\frontend\pages\partials\cms-content.blade.php ENDPATH**/ ?>