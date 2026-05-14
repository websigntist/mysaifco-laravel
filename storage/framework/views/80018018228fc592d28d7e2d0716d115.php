<!doctype html>
<html lang="en" class=" layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-skin="default" data-bs-theme="light" data-assets-path="assets/" data-template="vertical-menu-template-semi-dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($meta_title); ?></title>
    <meta name="keywords" content="<?php echo e($meta_keywords); ?>">
    <meta name="description" content="<?php echo e($meta_description); ?>">
    <meta property="og:title" content="">
    <meta property="og:type" content="admin-panel">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:description" content="">
    <meta property="og:site_name" content="">
    <link rel="canonical" href="">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/images/settings/'.get_setting('favicon'))); ?>">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/app.css')); ?>">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/notiflix-3.2.8.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/sweetalert2.min.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.8.3/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.8.3/dist/css/lg-thumbnail.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.8.3/dist/css/lg-zoom.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <?php echo $__env->yieldPushContent('style'); ?>
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
</head>
<body>
<?php echo $__env->yieldContent('content'); ?>
</body>
    <!-- Core JS Files - Load in order -->
    <script src="<?php echo e(asset('assets/backend/js/helpers.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/config.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/pickr.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/autocomplete-js.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/menu.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/cards-actions.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/perfect-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/node-waves.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/main.js')); ?>"></script>

    <!-- Vendor JS Libraries -->
    <script src="<?php echo e(asset('assets/backend/js/vendor/notiflix-3.2.8.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/vendor/sweetalert2.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.8.3/dist/js/lightgallery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.8.3/dist/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.8.3/dist/plugins/zoom/lg-zoom.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <!-- Application JS -->
    <script src="<?php echo e(asset('assets/backend/js/app.js')); ?>"></script>
</html>
<?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/layouts/user.blade.php ENDPATH**/ ?>