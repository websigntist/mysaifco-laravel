<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/select2.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 mt-3">
        <form action="<?php echo e(route( $module . '.store')); ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            <?php echo csrf_field(); ?>
            <div class="row gy-6">
                <div class="col-sm-12 col-xl-8 offset-xl-2">
                    <div class="d-flex justify-content-between align-items-center mb-3">
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
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="first_name">
                                            <span><?php echo e(_label('first_name')); ?></span> </label>
                                        <input type="text"
                                               id="first_name"
                                               name="first_name"
                                               value="<?php echo e(old('first_name')); ?>"
                                               class="form-control"
                                               placeholder="Enter <?php echo e(_label('first_name')); ?>..." required>
                                        <?php echo error_label('first_name'); ?>

                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="last_name">
                                            <?php echo e(_label('last_name')); ?> </label>
                                        <input type="text"
                                               id="last_name"
                                               name="last_name"
                                               value="<?php echo e(old('last_name')); ?>"
                                               class="form-control"
                                               placeholder="Enter <?php echo e(_label('last_name')); ?>..." required>
                                        <?php echo error_label('last_name'); ?>

                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="email">
                                            <span><?php echo e(_label('email')); ?></span> </label>
                                        <input type="email"
                                               id="email"
                                               name="heading"
                                               value="<?php echo e(old('email')); ?>"
                                               class="form-control"
                                               placeholder="Enter <?php echo e(_label('email')); ?>..." required>
                                        <?php echo error_label('email'); ?>

                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="phone">
                                            <span><?php echo e(_label('phone')); ?></span>
                                        </label>
                                        <input type="text"
                                               id="phone"
                                               name="phone"
                                               value="<?php echo e(old('phone')); ?>"
                                               class="form-control"
                                               placeholder="Enter <?php echo e(_label('phone')); ?>...">
                                        <?php echo error_label('phone'); ?>

                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="subject">
                                            <?php echo e(_label('subject')); ?> </label>
                                        <input type="text"
                                               id="subject"
                                               name="subject"
                                               value="<?php echo e(old('subject')); ?>"
                                               class="form-control"
                                               placeholder="Enter <?php echo e(_label('subject')); ?>...">
                                        <?php echo error_label('subject'); ?>

                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="message">
                                            <?php echo e(_label('customer_message')); ?> </label>
                                        <textarea class="form-control"
                                                   id="message"
                                                   name="message"
                                                   placeholder="Write <?php echo e(_label('description')); ?>" rows="5"><?php echo e(old
                                                   ('message')); ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="status">
                                            <span><?php echo e(_label('status')); ?></span> </label>
                                        <select id="status" name="status" class="form-select select2" required>
                                            <?php $__currentLoopData = $getStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(old($status, $status)); ?>"><?php echo e(ucfirst($status)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="document">
                                            <?php echo e(_label('document')); ?>

                                        </label>
                                        <input class="form-control"
                                                 type="file"
                                                 name="document"
                                                 id="document">
                                        <div class="text-center my-3">
                                            <small class="text-danger">jpg,png,pdf,docx,xlsx|max:2mb</small>
                                        </div>
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
    <script src="<?php echo e(asset('assets/backend/js/cleave-zen.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/form-layouts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/form-validation.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/inquiries/form.blade.php ENDPATH**/ ?>