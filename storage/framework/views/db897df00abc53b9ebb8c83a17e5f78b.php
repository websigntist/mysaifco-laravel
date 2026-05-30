<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Under Maintenance</title>
</head>
<body style="text-align: center; padding: 50px; font-family: Arial, sans-serif;">
    <h1><?php echo e(get_setting('maintenance_title')); ?></h1>
    <img src="<?php echo e(asset('assets/images/settings/'.get_setting('m_logo'))); ?>" width="500" alt="logo">
    <p><?php echo e(get_setting('content')); ?></p>
</body>
</html>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\frontend\pages\under_maintenance.blade.php ENDPATH**/ ?>