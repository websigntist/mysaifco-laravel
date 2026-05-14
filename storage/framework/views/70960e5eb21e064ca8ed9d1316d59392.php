
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/select2.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 mt-3 -container-p-y">
        <form action="<?php echo e(route($module.'.store')); ?>" method="post" class="needs-validation" enctype="multipart/form-data" id="dropzone-basic" novalidate>
            <?php echo csrf_field(); ?>
            <div class="row gy-6">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
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
                <div class="col-sm-12 col-xl-8">
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
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="title">
                                            <span><?php echo e(_label('gallery_title') ?? 'Gallery Title'); ?></span>
                                        </label>
                                        <input type="text"
                                               id="title"
                                               name="title"
                                               value="<?php echo e(old('title')); ?>"
                                               class="form-control"
                                               placeholder="Enter gallery title..." required>
                                        <?php echo error_label('title'); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-action border-top-bottom mt-5">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-photo iconmrgn me-1"></span>
                                Gallery Images (multiple)
                            </h6>
                            <?php echo card_action_element(); ?>

                        </div>
                        <div class="collapse show">
                            <div class="card-body dropzone needsclick">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">

                                        <div class="card">
                                            <h5 class="card-header">Multiple</h5>
                                            <div class="card-body">
                                                <div class="dz-message needsclick">
                                                    Drop files here or click to upload
                                                    <span class="note needsclick">(This is just a demo dropzone. Selected files are <span class="fw-medium">not</span> actually uploaded.)</span>
                                                </div>
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-4">
                    <div class="card card-action border-top-bottom">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-photo iconmrgn me-1"></span>
                                Gallery cover image
                            </h6>
                            <?php echo card_action_element(); ?>

                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        <label class="form-label">Cover image (optional)</label>
                                        <input class="form-control" type="file" name="cover_image" id="cover_image" accept="image/*">
                                        <small class="text-muted">Or set one of the gallery images as cover when editing.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-action border-top-bottom mt-5">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-table-options iconmrgn me-1"></span>
                                Other options
                            </h6>
                            <?php echo card_action_element(); ?>

                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="status">
                                            <span><?php echo e(_label('status') ?? 'Status'); ?></span>
                                        </label>
                                        <select id="status" name="status" class="form-select select2" required>
                                            <?php $__currentLoopData = $getStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e(old($status, $status)); ?>"><?php echo e(ucfirst($status)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="ordering">
                                            <?php echo e(_label('ordering') ?? 'Ordering'); ?>

                                        </label>
                                        <input type="number" id="ordering" name="ordering" value="<?php echo e(old('ordering', 0)); ?>" class="form-control" placeholder="0" min="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script src="<?php echo e(asset('assets/backend/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/form-validation.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/galleries/form.blade.php ENDPATH**/ ?>