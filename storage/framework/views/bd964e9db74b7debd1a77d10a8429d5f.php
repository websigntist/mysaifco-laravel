<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/flatpickr.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/select2.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 mt-3 -container-p-y">
            <form action="<?php echo e(route($module.'.update', $user->id)); ?>" method="post"
                  enctype="multipart/form-data" class="needs-validation" novalidate>
                <?php echo csrf_field(); ?>
                <?php echo method_field('Put'); ?>
                <!-- top heading and action buttons bar -->
                <div class="row gy-6">
                    <div class="col-sm-12">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-column justify-content-center">
                                <?php echo heading_breadcrumbs('Update '. $title, $title.' form'); ?>

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
                <!-- left column ===================================-->
                <!-- ===============================================-->
                <div class="row mb-6 gy-6">
                    <div class="col-sm-12 col-xl-8">
                        <!-- user information -->
                        <div class="card card-action border-top-bottom">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-apps iconmrgn"></span>
                                    Fill Out The <?php echo e(ucfirst($title)); ?> Details
                                </h6>
                                <?php echo card_action_element(); ?>

                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="first_name">
                                                <span><?php echo e(_label('first_name')); ?></span>
                                            </label>
                                            <input type="text"
                                                   id="first_name"
                                                   class="form-control"
                                                   name="first_name"
                                                   value="<?php echo e(old('first_name', $user->first_name)); ?>"
                                                   placeholder="Enter <?php echo e(_label('first_name')); ?>..." required>
                                            <?php echo error_label('first_name'); ?>

                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="last_name">
                                                <span><?php echo e(_label('last_name')); ?></span>
                                            </label>
                                            <input type="text"
                                                   name="last_name"
                                                   value="<?php echo e(old('last_name', $user->last_name)); ?>"
                                                   id="last_name"
                                                   class="form-control"
                                                   placeholder="Enter <?php echo e(_label('last_name')); ?>..." required>
                                            <?php echo error_label('last_name'); ?>

                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="mobile_no">
                                                <span><?php echo e(_label('mobile_no')); ?></span>
                                            </label>
                                            <input type="text"
                                                   name="mobile_no"
                                                   value="<?php echo e(old('mobile_no', $user->mobile_no)); ?>"
                                                   id="mobile_no"
                                                   class="form-control"
                                                   placeholder="Enter <?php echo e(_label('mobile_no')); ?>..." required>
                                            <?php echo error_label('mobile_no'); ?>

                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="landline_no">
                                                <span><?php echo e(_label('landline_no')); ?></span>
                                            </label>
                                            <input type="text"
                                                   name="landline_no"
                                                   value="<?php echo e(old('landline_no', $user->landline_no)); ?>"
                                                   id="landline_no"
                                                   class="form-control"
                                                   placeholder="Enter <?php echo e(_label('landline_no')); ?>" required>
                                            <?php echo error_label('landline_no'); ?>

                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize" for="address">
                                                <?php echo e(_label('address')); ?>

                                            </label>
                                            <input type="text"
                                                   name="address"
                                                   value="<?php echo e(old('address', $user->address)); ?>"
                                                   id="address"
                                                   class="form-control"
                                                   placeholder="Enter your <?php echo e(_label('address')); ?> (optional)">
                                            <?php echo error_label('address'); ?>

                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="city">
                                                <span><?php echo e(_label('city')); ?></span>
                                            </label>
                                            <input type="text"
                                                   name="city"
                                                   value="<?php echo e(old('city', $user->city)); ?>"
                                                   id="city"
                                                   class="form-control"
                                                   placeholder="Enter <?php echo e(_label('city')); ?>..." required>
                                            <?php echo error_label('city'); ?>

                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="zipcode">
                                                <span><?php echo e(_label('zipcode')); ?></span>
                                            </label>
                                            <input type="text"
                                                   name="zipcode"
                                                   value="<?php echo e(old('zipcode', $user->zipcode)); ?>"
                                                   id="zipcode"
                                                   class="form-control"
                                                   placeholder="Enter <?php echo e(_label('zipcode')); ?>..." required>
                                            <?php echo error_label('zipcode'); ?>

                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="state">
                                                <span><?php echo e(_label('state')); ?></span>
                                            </label>
                                            <input type="text"
                                                   name="state"
                                                   value="<?php echo e(old('state', $user->state)); ?>"
                                                   id="state"
                                                   class="form-control"
                                                   placeholder="Enter <?php echo e(_label('state')); ?>..." required>
                                            <?php echo error_label('state'); ?>

                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="country">
                                                <span><?php echo e(_label('country')); ?></span>
                                            </label>
                                            <select id="country" name="country" class="select2 form-select" required>
                                                <option value="">Select</option>
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($country); ?>" <?php echo e($user->country == $country ? 'selected' : ''); ?>>
                                                        <?php echo e($country); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php echo error_label('country'); ?>

                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="gender">
                                                <span><?php echo e(_label('gender')); ?></span>
                                            </label>
                                            <select id="gender" name="gender" class="form-select select2" required>
                                                <option value="">-Select option-</option>
                                                <?php $__currentLoopData = $getGender; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($gender); ?>" <?php echo e($user->gender == $gender ? 'selected' : ''); ?>>
                                                        <?php echo e(ucfirst($gender)); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php echo error_label('gender'); ?>

                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="dob">
                                                <?php echo e(_label('date_of_birth')); ?>

                                            </label>
                                            <input type="text"
                                                   id="dob"
                                                   name="dob"
                                                   value="<?php echo e(old('dob', $user->dob)); ?>"
                                                   class="form-control dob-picker"
                                                   placeholder="YYYY-MM-DD" required>
                                            <?php echo error_label('dob'); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- login information -->
                        <div class="card card-action border-top-bottom mt-5">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-login-2 iconmrgn"></span> Login Information
                                </h6>
                                <?php echo card_action_element(); ?>

                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="email">
                                                <span><?php echo e(_label('email')); ?></span> </label>
                                            <input type="email"
                                                     name="email"
                                                     value="<?php echo e(old('email', $user->email)); ?>"
                                                     id="email"
                                                     class="form-control"
                                                     placeholder="Enter <?php echo e(_label('email')); ?>..." required>
                                            <?php echo error_label('email'); ?>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-password-toggle">
                                                <label class="form-label text-capitalize" for="password">
                                                    <span><?php echo e(_label('password')); ?></span>
                                                </label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password"
                                                           id="password"
                                                           name="password"
                                                           value="<?php echo e(old('password')); ?>"
                                                           class="form-control"
                                                           placeholder="******">
                                                    <span class="input-group-text cursor-pointer" id="password">
                                                   <i class="icon-base ti tabler-eye-off"></i></span>
                                                </div>
                                                <?php echo error_label('password'); ?>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="user_type_id">
                                                <span><?php echo e(_label('user_type')); ?></span>
                                            </label>
                                            <select id="user_type_id" name="user_type_id" class="form-select select2" required>
                                                <option value="">-Select option-</option>
                                                <?php $__currentLoopData = $userTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($id); ?>" <?php echo e($user->user_type_id == $id ? 'selected' : ''); ?>>
                                                        <?php echo e(ucfirst($label)); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php echo error_label('user_type_id'); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right column ===================================-->
                    <!-- ================================================-->
                    <div class="col-sm-12 col-xl-4 ">
                        <!-- status -->
                        <div class="card card-action border-top-bottom">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-status-change iconmrgn"></span> Status
                                </h6>
                                <?php echo card_action_element(); ?>

                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <div class="col-md-12">
                                            <select id="status" name="status" class="form-select select2" required>
                                                <option value="">-Select option-</option>
                                                <?php $__currentLoopData = $getStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($status); ?>" <?php echo e($user->status == $status ? 'selected' : ''); ?>>
                                                        <?php echo e(ucfirst($status)); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php echo error_label('status'); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- image option -->
                        <div class="card card-action border-top-bottom mt-5">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-photo iconmrgn"></span> image options
                                </h6>
                                <?php echo card_action_element(); ?>

                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <div class="col-md-12">
                                            <?php echo image_input_option($user->image ? asset ('assets/images/' . $module .'/'. $user->image) : imageNotFound() ); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ordering or sorting -->
                        <div class="card card-action border-top-bottom mt-5">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-arrows-sort iconmrgn"></span> ordering
                                </h6>
                                <?php echo card_action_element(); ?>

                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <div class="col-md-12">
                                            <input type="number"
                                                   name="ordering"
                                                   value="<?php echo e(old('ordering', $user->ordering)); ?>"
                                                   id="ordering"
                                                   class="form-control"
                                                   placeholder="Enter 1 to 99...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- action buttons -->
                        <div class="card card-action border-top-bottom mt-5">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-brand-planetscale iconmrgn"></span> Action
                                </h6>
                                <?php echo card_action_element(); ?>

                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <!-- action buttons -->
                                        <?php echo form_action_buttons('Update Now', 'Update & New', 'Update & Stay'); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/cleave-zen.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/moment.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/flatpickr.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/form-layouts.js')); ?>"></script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/users/edit.blade.php ENDPATH**/ ?>