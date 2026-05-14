<script>
    document.addEventListener('DOMContentLoaded', function () {
        <?php if(session('success')): ?>
        Notiflix.Notify.success("<?php echo e(session('success')); ?>", {
            position: 'right-top',
            timeout: 5000,
        });
        <?php endif; ?>

        <?php if(session('error')): ?>
        Notiflix.Notify.failure("<?php echo e(session('error')); ?>", {
            position: 'right-top',
            timeout: 5000,
        });
        <?php endif; ?>

        <?php if(session('warning')): ?>
        Notiflix.Notify.warning("<?php echo e(session('warning')); ?>", {
            position: 'right-top',
            timeout: 5000,
        });
        <?php endif; ?>

        <?php if(session('info')): ?>
        Notiflix.Notify.info("<?php echo e(session('info')); ?>", {
            position: 'right-top',
            timeout: 5000,
        });
        <?php endif; ?>
    });
</script>
<?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/components/notification.blade.php ENDPATH**/ ?>