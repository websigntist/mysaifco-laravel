<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/select2.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/jstree.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 mt-3 -container-p-y">
        <form action="<?php echo e(route($module . '.update', $data->id)); ?>" method="post" class="needs-validation"
              enctype="multipart/form-data" novalidate>
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row gy-6">
                <div class="col-sm-12 col-xl-8 offset-xl-2">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column justify-content-center">
                            <?php echo heading_breadcrumbs('Add New '. str_replace('-',' ',$title), str_replace('-',' ',$title).' form'); ?>

                        </div>
                        <div class="card-header-elements ms-auto d-flex align-content-between">
                            <?php echo goBack($module, 'Update'); ?>

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
            <?php echo $__env->make('backend.components.validation_errors', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <div class="row mb-6 gy-6">
                <div class="col-sm-12 col-xl-8 offset-xl-2">
                    <!-- page information -->
                    <div class="card card-action border-top-bottom">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-apps iconmrgn me-1"></span> Fill Out
                                                                                                     The <?php echo e(ucfirst(str_replace('-',' ',$title))); ?>

                                                                                                     Details
                            </h6>
                            <?php echo card_action_element(); ?>

                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="user_type">
                                            <span><?php echo e(_label('user_type')); ?></span> </label>
                                        <input type="text"
                                               id="user_type"
                                               name="user_type"
                                               value="<?php echo e(old('user_type', $data->user_type)); ?>"
                                               class="form-control"
                                               placeholder="Enter <?php echo e(_label('user_type')); ?>..." required>
                                        <?php echo error_label('user_type'); ?>

                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="login_type">
                                            <span><?php echo e(_label('login_type')); ?></span> </label>
                                        <select id="login_type" name="login_type" class="form-select select2" required>
                                            <?php $__currentLoopData = $loginTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $login_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(old($login_type, $login_type)); ?>"<?php echo e($data->login_type == $login_type ? 'selected' : ''); ?>>
                                                    <?php echo e(ucfirst($login_type)); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="status">
                                            <span><?php echo e(_label('status')); ?></span> </label>
                                        <select id="status" name="status" class="form-select select2" required>
                                            <?php $__currentLoopData = $getStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(old($status, $status)); ?>" <?php echo e($data->status == $status ? 'selected' : ''); ?>>
                                                    <?php echo e(ucfirst($status)); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <div id="jstree-checkbox" class="mt-5">
                                            <?php echo buildModuleCheckBox(0, $menu, $assignedModules, $selectedActions); ?>

                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-start mt-5">
                                            <?php echo form_action_buttons('Update Now', 'Update & New', 'Update & Stay'); ?>

                                        </div>
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
    <script src="<?php echo e(asset('assets/backend/js/cleave-zen.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/form-layouts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/form-validation.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/jstree.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/extended-ui-treeview.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/user-types/edit.blade.php ENDPATH**/ ?>