
<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/select2.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 mt-3">
        <form action="<?php echo e(route($module.'.update', $data->id)); ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            <?php echo csrf_field(); ?>
            <?php echo method_field('Put'); ?>
            <div class="row gy-6">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column justify-content-center">
                            <?php echo heading_breadcrumbs('Update '. $title, $title.' form'); ?>

                        </div>
                        <div class="card-header-elements ms-auto d-flex align-content-between">
                            <?php echo goBack($module,'Update'); ?>

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
                                        <label class="form-label text-capitalize" for="title">Gallery Title</label>
                                        <input type="text" id="title" name="title"
                                               value="<?php echo e(old('title', $data->title)); ?>"
                                               class="form-control" placeholder="Enter gallery title..." required>
                                        <?php echo error_label('title'); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($data->images->count() > 0): ?>
                    <div class="card card-action border-top-bottom mt-5">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-photo iconmrgn me-1"></span>
                                Existing gallery images
                            </h6>
                            <?php echo card_action_element(); ?>

                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Set as cover</th>
                                            <th>Title</th>
                                            <th>Alt</th>
                                            <th>Order</th>
                                            <th>Remove</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $data->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <img src="<?php echo e($img->image ? asset('assets/images/galleries/images/'.$img->image) : imageNotFound()); ?>" alt="" class="rounded border" style="max-height: 60px;">
                                                    <input type="hidden" name="image_id[]" value="<?php echo e($img->id); ?>">
                                                </td>
                                                <td>
                                                    <input type="radio" name="cover_image_id" value="<?php echo e($img->id); ?>" <?php echo e($data->cover_image === $img->image ? 'checked' : ''); ?> title="Use as gallery cover">
                                                </td>
                                                <td>
                                                    <input type="text" name="image_title[]" class="form-control form-control-sm" value="<?php echo e(old('image_title.'.$img->id, $img->image_title)); ?>" placeholder="Title">
                                                </td>
                                                <td>
                                                    <input type="text" name="image_alt[]" class="form-control form-control-sm" value="<?php echo e(old('image_alt.'.$img->id, $img->image_alt)); ?>" placeholder="Alt">
                                                </td>
                                                <td>
                                                    <input type="number" name="image_ordering[]" class="form-control form-control-sm" value="<?php echo e(old('image_ordering.'.$img->id, $img->ordering)); ?>" min="0" style="width: 70px;">
                                                </td>
                                                <td>
                                                    <label class="form-check">
                                                        <input type="checkbox" name="remove_image_ids[]" value="<?php echo e($img->id); ?>" class="form-check-input"> Remove
                                                    </label>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="card card-action border-top-bottom mt-5">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-photo-plus iconmrgn me-1"></span>
                                Add more images
                            </h6>
                            <?php echo card_action_element(); ?>

                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        <label class="form-label">Upload additional images</label>
                                        <input class="form-control" type="file" name="images[]" id="images" multiple accept="image/*">
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
                                        <?php echo image_input_option($data->cover_image ? asset('assets/images/'.$module.'/'.$data->cover_image) : imageNotFound(), 'cover_image'); ?>

                                        <small class="text-muted">Or select "Set as cover" on an existing image above.</small>
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
                                        <label class="form-label text-capitalize" for="status">Status</label>
                                        <select id="status" name="status" class="form-select select2" required>
                                            <?php $__currentLoopData = $getStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($status); ?>" <?php echo e($data->status == $status ? 'selected' : ''); ?>><?php echo e(ucfirst($status)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="ordering">Ordering</label>
                                        <input type="number" id="ordering" name="ordering" value="<?php echo e(old('ordering', $data->ordering)); ?>" class="form-control" placeholder="0" min="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-top-bottom mt-5 py-3">
                        <div class="row">
                            <?php echo form_action_buttons('Update Now', 'Update & New', 'Update & Stay'); ?>

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

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/galleries/edit.blade.php ENDPATH**/ ?>