<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/select2.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 mt-3">
        <form action="<?php echo e(route( $module . '.store')); ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            <?php echo csrf_field(); ?>
            <div class="row gy-6">
                <div class="col-sm-12 col-xl-8 offset-xl-2">
                    <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                        <div class="d-flex flex-column justify-content-center">
                            <?php echo heading_breadcrumbs('Add New '. str_replace('-',' ',$title), str_replace('-',' ',$title).' form'); ?>

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
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="coupon_title">
                                            <span><?php echo e(_label('coupon_title')); ?></span> </label>
                                        <input type="text"
                                               id="coupon_title"
                                               name="coupon_title"
                                               value="<?php echo e(old('coupon_title')); ?>"
                                               class="form-control"
                                               placeholder="Enter <?php echo e(_label('coupon_title')); ?>..." required>
                                        <?php echo error_label('coupon_title'); ?>

                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="coupon_code">
                                            <span><?php echo e(_label('coupon_code')); ?></span> </label>
                                        <input type="text"
                                               id="coupon_code"
                                               name="coupon_code"
                                               value="<?php echo e(old('coupon_code')); ?>"
                                               class="form-control"
                                               placeholder="Enter <?php echo e(_label('coupon_code')); ?>..." required>
                                        <?php echo error_label('coupon_code'); ?>

                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="discount_type">
                                            <span><?php echo e(_label('discount_type')); ?></span> </label>
                                        <select id="discount_type" name="discount_type" class="form-select select2" required>
                                            <?php $__currentLoopData = $gettype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(old($type, $type)); ?>"><?php echo e(ucfirst($type)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="discount_value">
                                            <span><?php echo e(_label('discount_value')); ?></span> </label> <input type="number"
                                                                                                    id="discount_value"
                                                                                                    name="discount_value"
                                                                                                    value="<?php echo e(old('discount_value')); ?>"
                                                                                                    class="form-control"
                                                                                                    placeholder="Enter <?php echo e(_label('discount_value')); ?>..." required>
                                        <?php echo error_label('discount_value'); ?>

                                    </div>
                                    <div class="col-md-4">
                                                <label class="form-label text-capitalize" for="sale_start"> <?php echo e(_label('start_date')); ?></label>
                                                <input type="text"
                                                       id="start_date"
                                                       name="start_date"
                                                       value="<?php echo e(old('start_date')); ?>"
                                                       class="form-control dob-picker"
                                                       placeholder="YYYY-MM-DD">
                                                <?php echo error_label('start_date'); ?>

                                            </div>
                                    <div class="col-md-4">
                                                <label class="form-label text-capitalize" for="sale_end"> <?php echo e(_label('end_date')); ?></label>
                                                <input type="text"
                                                       id="end_date"
                                                       name="end_date"
                                                       value="<?php echo e(old('end_date')); ?>"
                                                       class="form-control dob-picker"
                                                       placeholder="YYYY-MM-DD">
                                                <?php echo error_label('end_date'); ?>

                                    </div>
                                    <div class="col-md-4">
                                    <label class="form-label text-capitalize" for="usage_limit">
                                        <span><?php echo e(_label('usage_limit')); ?></span> </label> <input type="number"
                                                                                                id="usage_limit"
                                                                                                name="usage_limit"
                                                                                                value="<?php echo e(old('usage_limit')); ?>"
                                                                                                class="form-control"
                                                                                                placeholder="Enter <?php echo e(_label('usage_limit')); ?>..." required>
                                    <?php echo error_label('usage_limit'); ?>

                                </div>
                                    <div class="col-md-4">
                                    <label class="form-label text-capitalize" for="min_order_value">
                                        <span><?php echo e(_label('min_order_value')); ?></span> </label> <input type="number"
                                                                                                id="min_order_value"
                                                                                                name="min_order_value"
                                                                                                value="<?php echo e(old('min_order_value')); ?>"
                                                                                                class="form-control"
                                                                                                placeholder="Enter <?php echo e(_label('min_order_value')); ?>..." required>
                                    <?php echo error_label('min_order_value'); ?>

                                </div>
                                    <div class="col-md-2">
                                                                            <label class="form-label text-capitalize" for="status">
                                                                                <span><?php echo e(_label('status')); ?></span> </label>
                                                                            <select id="status" name="status" class="form-select select2" required>
                                                                                <?php $__currentLoopData = $getStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option value="<?php echo e(old($status, $status)); ?>"><?php echo e(ucfirst($status)); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </select>
                                                                        </div>
                                    <div class="col-md-2">
                                        <label class="form-label text-capitalize" for="ordering">
                                            <?php echo e(_label('ordering')); ?>

                                        </label> <input type="number"
                                                        id="ordering"
                                                        name="ordering"
                                                        value="<?php echo e(old('ordering')); ?>"
                                                        class="form-control"
                                                        placeholder="Enter 1 to 99...">
                                    </div>
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
    

    <script src="<?php echo e(asset('assets/backend/js/flatpickr.js')); ?>"></script>
    <?php echo $__env->make('backend.components.form_js_libraries', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <script src="<?php echo e(asset('assets/backend/js/jquery-repeater.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/forms-extras.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\coupons\form.blade.php ENDPATH**/ ?>