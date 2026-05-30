<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/select2.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 mt-3">
        <form action="<?php echo e(route($module.'.store')); ?>" method="post" class="needs-validation" novalidate>
            <?php echo csrf_field(); ?>
            <div class="row gy-6">
                <div class="col-sm-12 col-xl-8 offset-xl-2">
                    <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                        <div class="d-flex flex-column justify-content-center">
                            <?php echo heading_breadcrumbs('Add New '. $title, $title.' form'); ?>

                        </div>
                        <div class="card-header-elements ms-auto d-flex align-content-between">
                            <?php echo goBack($module); ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h5 class="alert-heading mb-2">Validation Errors:</h5>
                    <ul class="mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <div class="row mb-6 gy-6">
                <div class="col-sm-12 col-xl-8 offset-xl-2">
                    <div class="card card-action border-top-bottom">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-apps iconmrgn me-1"></span>
                                Fill Out The <?php echo e(ucfirst($title)); ?> Details
                            </h6>
                            <?php echo card_action_element(); ?>

                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <?php echo $__env->make('backend.components.tour-package-text-fields', ['data' => null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                    <div class="col-md-12">
                                        <?php echo form_action_buttons('Submit Now', 'Save & New', 'Save & Stay'); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/form-layouts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/form-validation.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/tinymce/tinymce.min.js')); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            tinymce.init({
                selector: '#editor',
                license_key: 'gpl', // Required for free version
                plugins: 'code lists link image table anchor searchreplace visualblocks fullscreen insertdatetime table wordcount',

                toolbar: [
                    'undo redo | fontfamily fontsize | bold italic underline forecolor backcolor | strikethrough numlist ' +
                    'bullist checklist alignleft aligncenter alignright alignjustify |',
                    'link image table | subscript superscript removeformat | fullscreen code'
                ].join(' '),

                menubar: false,
                branding: false,
                toolbar_mode: 'wrap',

                font_family_formats:
                    'Poppins=poppins, sans-serif;' +
                    'Arial=arial,helvetica,sans-serif;' +
                    'Georgia=georgia,serif;' +
                    'Times New Roman=times new roman,times;' +
                    'Verdana=verdana,geneva,sans-serif;',

                font_size_formats: '8px 10px 12px 14px 16px 18px 20px 24px 28px 32px 36px',
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\explore\form.blade.php ENDPATH**/ ?>