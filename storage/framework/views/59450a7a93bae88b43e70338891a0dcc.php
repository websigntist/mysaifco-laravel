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
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="name">
                                            <span><?php echo e(_label('name')); ?></span> </label>
                                        <input type="text"
                                               id="name"
                                               name="name"
                                               value="<?php echo e(old('name')); ?>"
                                               class="form-control"
                                               placeholder="Enter <?php echo e(_label('name')); ?>..." required>
                                        <?php echo error_label('name'); ?>

                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="designation">
                                            <span><?php echo e(_label('designation')); ?></span> </label>
                                        <input type="text"
                                               id="designation"
                                               name="designation"
                                               value="<?php echo e(old('designation')); ?>"
                                               class="form-control"
                                               placeholder="Enter <?php echo e(_label('designation')); ?>..." required>
                                        <?php echo error_label('designation'); ?>

                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="company">
                                            <?php echo e(_label('company')); ?> </label>
                                        <input type="text"
                                               id="company"
                                               name="company"
                                               value="<?php echo e(old('company')); ?>"
                                               class="form-control"
                                               placeholder="Enter <?php echo e(_label('company')); ?>...">
                                        <?php echo error_label('company'); ?>

                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="review">
                                            <span><?php echo e(_label('review')); ?></span>
                                         </label>
                                        <textarea class="form-control"
                                                   id="review"
                                                   name="review"
                                                   placeholder="Write <?php echo e(_label('review')); ?>" rows="5"><?php echo e(old('review')); ?></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="status">
                                            <span><?php echo e(_label('status')); ?></span> </label>
                                        <select id="status" name="status" class="form-select select2" required>
                                            <?php $__currentLoopData = $getStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(old($status, $status)); ?>"><?php echo e(ucfirst($status)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="type">
                                            <span><?php echo e(_label('type')); ?></span> </label>
                                        <select id="type" name="type" class="form-select select2" required>
                                            <?php $__currentLoopData = $gettype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(old($type, $type)); ?>"><?php echo e(ucfirst($type)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
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
                                        <label class="form-label text-capitalize" for="image">
                                            <span><?php echo e(_label('image')); ?></span>
                                        </label>
                                        <input class="form-control"
                                                 type="file"
                                                 name="image"
                                                 id="image">
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

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/testimonials/form.blade.php ENDPATH**/ ?>