<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/select2.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/maxLength.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/flatpickr.css')); ?>">
<?php $__env->stopPush(); ?>
<?php
    $p = $product ?? null;
    $defaultProductTypes = $p && is_array($p->product_types) && count($p->product_types)
        ? $p->product_types
        : (isset($productTypeOptions) && $productTypeOptions->isNotEmpty() ? [$productTypeOptions->first()->name] : []);
    $selectedTypes = old('product_type', $defaultProductTypes);
?>
<?php $__env->startSection('content'); ?>
    <?php
        $product = $product ?? null;
        $isEdit = (bool) $product;
        $selectedCategoryIds = array_map('strval', (array) old('product_categories', optional($product)->categories?->pluck('id')->all() ?? []));
        $activeTab = old('active_tab', request('active_tab', '#navs-basic-info'));
    ?>
    <div class="container-xxl flex-grow-1 mt-3 -container-p-y">
        <form action="<?php echo e($isEdit ? route($module . '.update', $product->id) : route($module . '.store')); ?>" method="post"
              class="needs-validation"
              id="wizard-validation-form"
              enctype="multipart/form-data"
              novalidate>
            <input type="hidden" name="active_tab" id="active_tab" value="<?php echo e($activeTab); ?>">
            <?php echo csrf_field(); ?>
            <?php if($isEdit): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>
            <div class="row gy-6">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                        <div class="d-flex flex-column justify-content-center">
                            <?php echo heading_breadcrumbs('Add New '. str_replace('-',' ',$title), str_replace('-',' ',$title).' form'); ?>

                        </div>
                        <div class="card-header-elements ms-auto d-flex align-content-between">
                            <?php echo goBack($_module); ?>

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
                    <div class="card card-action border-top-bottom productForm">
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
                                    
                                    <div class="nav-align-top nav-tabs-shadow">
                                        <ul class="nav nav-tabs nav-fill" role="tablist">
                                            <li class="nav-item">
                                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-basic-info" aria-controls="navs-basic-info" aria-selected="true">
                                                  <span class="d-none d-sm-inline-flex align-items-center">
                                                    <i class="icon-base ti tabler-analyze icon-sm me-1_5"></i>Basic Details
                                                  </span> <i class="icon-base ti tabler-analyze icon-sm d-sm-none"></i>
                                                </button>
                                            </li>
                                            <li class="nav-item">
                                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pricing-discount" aria-controls="navs-pricing-discount" aria-selected="false">
                                                  <span class="d-none d-sm-inline-flex align-items-center"><i class="icon-base ti tabler-report-money icon-sm me-1_5"></i>
                                                  Pricing & Discount
                                                  </span> <i class="icon-base ti tabler-report-money icon-sm d-sm-none"></i>
                                                </button>
                                            </li>
                                            <li class="nav-item">
                                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-images-gallery" aria-controls="navs-images-gallery" aria-selected="false">
                                                  <span class="d-none d-sm-inline-flex align-items-center"><i class="icon-base ti tabler-photo icon-sm me-1_5"></i>
                                                  Images Gallery
                                                  </span>
                                                    <i class="icon-base ti tabler-photo icon-sm d-sm-none"></i>
                                                </button>
                                            </li>
                                            <li class="nav-item">
                                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-colors" aria-controls="navs-colors" aria-selected="false">
                                                  <span class="d-none d-sm-inline-flex align-items-center"><i class="icon-base ti tabler-color-filter icon-sm me-1_5"></i>
                                                      Colors
                                                  </span>
                                                    <i class="icon-base ti tabler-color-filter icon-sm d-sm-none"></i>
                                                </button>
                                            </li>
                                            <li class="nav-item">
                                                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-sizes" aria-controls="navs-sizes" aria-selected="false">
                                                  <span class="d-none d-sm-inline-flex align-items-center"><i class="icon-base ti tabler-ruler-measure icon-sm me-1_5"></i>
                                                      Sizes
                                                  </span>
                                                    <i class="icon-base ti tabler-ruler-measure icon-sm d-sm-none"></i>
                                                </button>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <?php echo $__env->make('backend.components.product_basic_info', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                            <?php echo $__env->make('backend.components.product_pricing_discount', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                            <?php echo $__env->make('backend.components.product_images_gallery', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                            <?php echo $__env->make('backend.components.product_colors', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                            <?php echo $__env->make('backend.components.product_sizes', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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
                    <!-- menu parent -->
                    <div class="card card-action border-top-bottom">
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
                                            <?php $__currentLoopData = $enumStatus ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($opt); ?>" <?php if(old('status', optional($product)->status ?? ($enumStatus[0] ?? '')) === $opt): echo 'selected'; endif; ?>><?php echo e($opt); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="product_categories">
                                            <span><?php echo e(_label('categories')); ?></span>
                                        </label>
                                        <select id="product_categories" name="product_categories[]" class="form-select select2" multiple required
                                                data-placeholder="Select categories">
                                            <?php $__currentLoopData = $productCategories ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($cat->id); ?>"
                                                    <?php if(in_array((string) $cat->id, $selectedCategoryIds, true)): echo 'selected'; endif; ?>>
                                                    <?php echo e($cat->title); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="visibility">
                                            <span><?php echo e(_label('visibility')); ?></span> </label>
                                        <select id="visibility" name="visibility" class="form-select select2" required>
                                            <?php $__currentLoopData = $enumVisibility ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($opt); ?>" <?php if(old('visibility', optional($product)->visibility ?? ($enumVisibility[0] ?? '')) === $opt): echo 'selected'; endif; ?>><?php echo e($opt); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="product_type"> <span><?php echo e(_label('product_type')); ?></span> </label>
                                        <select id="product_type" name="product_type[]" class="form-select select2" required multiple data-placeholder="Select types">
                                            <?php $__currentLoopData = $productTypeOptions ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($opt->name); ?>" <?php if(in_array($opt->name, (array) $selectedTypes, true)): echo 'selected'; endif; ?>><?php echo e($opt->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php echo error_label('product_type'); ?>

                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="ordering">
                                            <?php echo e(_label('ordering')); ?>

                                        </label> <input type="number"
                                                        id="ordering"
                                                        name="ordering"
                                                        value="<?php echo e(old('ordering', optional($product)->ordering)); ?>"
                                                        class="form-control"
                                                        placeholder="Enter 1 to 99...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- meta title -->
                                        <div class="card card-action border-top-bottom mt-5">
                                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                                <h6 class="mb-0 text-capitalize">
                                                    <span class="icon-sm icon-base ti tabler-world-www iconmrgn me-1"></span> SEO Meta
                                                                                                                              Description
                                                </h6>
                                                <?php echo card_action_element(); ?>

                                            </div>
                                            <div class="collapse show">
                                                <div class="card-body">
                                                    <div class="row g-6 pt-5">
                                                        <div class="col-md-12">
                                                            <label class="form-label text-capitalize" for="meta_title">
                                                                <span><?php echo e(_label('meta_title')); ?></span> </label> <input type="text"
                                                                                                                      id="meta_title"
                                                                                                                      name="meta_title"
                                                                                                                      value="<?php echo e(old('meta_title', optional($product)->meta_title)); ?>"
                                                                                                                      class="form-control"
                                                                                                                      placeholder="Enter <?php echo e(_label('meta_title')); ?>..." required>
                                                            <?php echo error_label('meta_title'); ?>

                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="form-label text-capitalize" for="meta_keywords">
                                                                <?php echo e(_label('meta_keywords')); ?>

                                                            </label> <input type="text"
                                                                            id="meta_keywords"
                                                                            name="meta_keywords"
                                                                            value="<?php echo e(old('meta_keywords', optional($product)->meta_keywords)); ?>"
                                                                            class="form-control"
                                                                            placeholder="Enter <?php echo e(_label('meta_keywords')); ?>...">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-password-toggle">
                                                                <label class="form-label text-capitalize" for="meta_description">
                                                                    <?php echo e(_label('meta_description')); ?>

                                                                </label> <textarea class="form-control"
                                                                                   id="meta_description"
                                                                                   name="meta_description"
                                                                                   placeholder="Write <?php echo e(_label('meta_description')); ?>" rows="3"><?php echo e(old('meta_description', optional($product)->meta_description)); ?></textarea>
                                                            </div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var activeTabInput = document.getElementById('active_tab');
            if (!activeTabInput || typeof bootstrap === 'undefined') return;

            var tabButtons = document.querySelectorAll('[data-bs-target^="#navs-"]');
            tabButtons.forEach(function (btn) {
                btn.addEventListener('shown.bs.tab', function (e) {
                    var target = e.target.getAttribute('data-bs-target');
                    if (target) activeTabInput.value = target;
                });
            });

            var initialTarget = activeTabInput.value;
            if (!initialTarget) return;
            var initialBtn = document.querySelector('[data-bs-target="' + initialTarget + '"]');
            if (initialBtn) {
                new bootstrap.Tab(initialBtn).show();
            }
        });
    </script>
    
    <script src="<?php echo e(asset('assets/backend/js/flatpickr.js')); ?>"></script>
    <?php echo $__env->make('backend.components.form_js_libraries', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <script src="<?php echo e(asset('assets/backend/js/jquery-repeater.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/forms-extras.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/backend/products/form.blade.php ENDPATH**/ ?>