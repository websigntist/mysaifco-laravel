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
                <!-- left column ===================================-->
                <!-- ===============================================-->
                <div class="col-sm-12 col-xl-8">
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
                                        <label class="form-label text-capitalize" for="title">
                                            <span><?php echo e(_label('attribute_title')); ?></span> </label> <input type="text"
                                                                                                       id="title"
                                                                                                       name="title"
                                                                                                       value="<?php echo e(old('title')); ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="Enter <?php echo e(_label('attribute_title')); ?>..." required>
                                        <?php echo error_label('title'); ?>

                                    </div>
                                    <div class="--form-repeater">
                                        <div data-repeater-list="group-a">
                                            <div data-repeater-item="">
                                                <div class="row">
                                                    <div class="mb-6 col-lg-6 col-xl-3 col-12 mb-0">
                                                        <label class="form-label text-capitalize" for="item_name">
                                                            <span><?php echo e(_label('item_name')); ?></span>
                                                        </label>
                                                        <input type="text"
                                                               name="item_name[]"
                                                               id="form-repeater-1-1"
                                                               class="form-control"
                                                               placeholder="<?php echo e(_label('item_name')); ?>">
                                                    </div>
                                                    <div class="mb-6 col-lg-6 col-xl-3 col-12 mb-0">
                                                        <label class="form-label text-capitalize" for="item_value">
                                                            <span><?php echo e(_label('item_value')); ?></span></label>
                                                        <input type="text"
                                                               name="item_value[]"
                                                               id="form-repeater-1-2"
                                                               class="form-control"
                                                               placeholder="<?php echo e(_label('item_value')); ?>">
                                                    </div>
                                                    <div class="mb-6 col-lg-6 col-xl-6 col-12 mb-0">
                                                        <label class="form-label text-capitalize"
                                                               for="item_description"><?php echo e(_label('item_description')); ?>

                                                        </label>
                                                        <input type="text"
                                                               name="item_description[]"
                                                               id="form-repeater-1-2"
                                                               class="form-control"
                                                               placeholder="<?php echo e(_label('item_description')); ?>">
                                                    </div>
                                                    <div class="mb-6 col-lg-6 col-xl-4 col-12 mb-0">
                                                        <label class="form-label text-capitalize"
                                                               for="item_image"><?php echo e(_label('item_image')); ?></label>
                                                        <input class="form-control"
                                                               type="file"
                                                               name="item_image[]"
                                                               id="image">
                                                    </div>
                                                    <div class="mb-6 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                                                        <button class="btn btn-label-danger mt-xl-6" data-repeater-delete="">
                                                            <i class="icon-base ti tabler-x me-1"></i>
                                                            <span class="align-middle">Delete</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="mb-0">
                                            <button class="btn btn-primary" data-repeater-create="">
                                                <i class="icon-base ti tabler-plus me-1"></i>
                                                <span class="align-middle">Add</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right column ===================================-->
                <!-- ================================================-->
                <div class="col-sm-12 col-xl-4">
                    <!-- status -->
                    <div class="card card-action border-top-bottom">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-photo iconmrgn me-1"></span>feature image
                            </h6>
                            <?php echo card_action_element(); ?>

                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        <input class="form-control"
                                               type="file"
                                               name="image"
                                               id="image">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="image_alt"><?php echo e(_label('image_alt')); ?> </label>
                                        <input type="text" id="image_alt" name="image_alt" value="<?php echo e(old('image_alt')); ?>" class="form-control" placeholder="Enter <?php echo e(_label('image_alt')); ?>...">
                                        <?php echo error_label('image_alt'); ?>

                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="image_title"><?php echo e(_label('image_title')); ?></label>
                                        <input type="text" id="image_title" name="image_title" value="<?php echo e(old('image_title')); ?>" class="form-control" placeholder="Enter <?php echo e(_label('image_title')); ?>...">
                                        <?php echo error_label('image_title'); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- menu parent -->
                    <div class="card card-action border-top-bottom mt-5">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-table-options iconmrgn me-1"></span>other
                                                                                                             option
                            </h6>
                            <?php echo card_action_element(); ?>

                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="status">
                                            <span><?php echo e(_label('status')); ?></span> </label>
                                        <select id="status" name="status" class="form-select select2" required>
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="ordering">
                                            <?php echo e(_label('ordering')); ?>

                                        </label> <input type="number"
                                                        id="ordering"
                                                        name="ordering"
                                                        value="<?php echo e(old('ordering')); ?>"
                                                        class="form-control"
                                                        placeholder="Enter 1 to 99...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- maintenance mode -->
                    
                    <!-- action buttons -->
                    <div class="card border-top-bottom mt-5 py-3">
                        <div class="row">
                            <?php echo form_action_buttons('Submit Now', 'Save & New', 'Save & Stay'); ?>

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
    <script src="<?php echo e(asset('assets/backend/js/jquery-repeater.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/forms-extras.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\attributes\form.blade.php ENDPATH**/ ?>