
<?php
    $tours = $tours ?? collect();
?>
<?php echo $__env->make('frontend.components.tour-listing-grid', ['tours' => $tours], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $slug = request()->segment(1); ?>

<?php if($slug != 'umrah-travel-agency'): ?>
    <?php echo $__env->make('frontend.components.testimonials', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('frontend.components.tour_faqs', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('frontend.components.explore_dubai', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php endif; ?>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\frontend\pages\includes\all-tours-packages.blade.php ENDPATH**/ ?>