<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/assets/frontend/css/app.css']); ?>
</head>
<body class="w-full overflow-x-hidden antialiased">
<?php echo $__env->make('frontend.layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('frontend.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
<?php echo app('Illuminate\Foundation\Vite')(['resources/assets/frontend/js/app.js']); ?>
<?php echo $__env->yieldPushContent('script'); ?>
</html>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/layouts/master.blade.php ENDPATH**/ ?>