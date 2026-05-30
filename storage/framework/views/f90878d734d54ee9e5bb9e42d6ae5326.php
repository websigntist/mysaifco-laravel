<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Inquiry Received</title>
</head>
<body>
    <h2>New Contact Inquiry</h2>

    <p><strong>First Name:</strong> <?php echo e($data->first_name); ?></p>
    <p><strong>Last Name:</strong> <?php echo e($data->last_name); ?></p>
    <p><strong>Email:</strong> <?php echo e($data->email); ?></p>
    <p><strong>Phone:</strong> <?php echo e($data->phone); ?></p>
    <p><strong>Subject:</strong> <?php echo e($data->subject); ?></p>
    <p><strong>Message:</strong></p>
    <p><?php echo e($data->message); ?></p>

    <?php if($data->document): ?>
        <p><strong>Attachment:</strong> File attached.</p>
    <?php endif; ?>
</body>
</html>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\frontend\email-message\contact.blade.php ENDPATH**/ ?>