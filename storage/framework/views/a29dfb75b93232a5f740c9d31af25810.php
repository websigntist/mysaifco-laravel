<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/flatpickr.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/select2.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
       <!-- Content -->
       <div class="container-xxl flex-grow-1 mt-3 -container-p-y">
          <form action="<?php echo e(route('setting.update-form')); ?>" method="post" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <?php echo method_field('PUT'); ?>
             <!-- top heading and action buttons bar -->
              <div class="row gy-6">
                  <div class="col-sm-12 col-xl-10 offset-xl-1">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                          <div class="d-flex flex-column justify-content-center">
                              <?php echo heading_breadcrumbs('Update '. $title, $title.' update form'); ?>

                          </div>
                          <div class="card-header-elements ms-auto d-flex align-content-between">
                                  <?php echo goBack('dashboard', 'Update'); ?>

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
                <div class="col-sm-12 col-xl-10 offset-xl-1">
                   <!-- page information -->
                   <div class="card card-action border-top-bottom">
                      <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                         <h6 class="mb-0 text-capitalize">
                            <span class="icon-sm icon-base ti tabler-settings-check iconmrgn me-1"></span> update setting
                         </h6>
                          <?php echo card_action_element(); ?>

                      </div>
                      <div class="collapse show">
                         <div class="card-body">
                            <div class="row g-6 pt-5">
                               <div class="col-md-12 sitesettings">
                                  <div class="nav-align-left nav-tabs-shadow">
                                     <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                           <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#general_setting">
                                              <span class="icon-sm icon-base ti tabler-brand-google-home iconmrgn me-1"></span>
                                              General Setting
                                           </button>
                                        </li>
                                        <li class="nav-item">
                                           <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#header_footer">
                                              <span class="icon-sm icon-base ti tabler-layout-board iconmrgn me-1"></span>
                                              Header & Footer
                                           </button>
                                        </li>
                                        <li class="nav-item">
                                           <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#contact_details">
                                              <span class="icon-sm icon-base ti tabler-headphones iconmrgn me-1"></span>
                                              Contaci Details
                                           </button>
                                        </li>
                                        <li class="nav-item">
                                           <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#admin_settings">
                                              <span class="icon-sm icon-base ti tabler-adjustments-cog iconmrgn me-1"></span>
                                              Admin Settings
                                           </button>
                                        </li>
                                        <li class="nav-item">
                                           <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#social_networks">
                                              <span class="icon-sm icon-base ti tabler-social iconmrgn me-1"></span> Social
                                                                                                                     Networks
                                           </button>
                                        </li>
                                        <li class="nav-item">
                                           <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#smtp_settings">
                                              <span class="icon-sm icon-base ti tabler-mail-cog iconmrgn me-1"></span> SMTP
                                                                                                                       Settings
                                           </button>
                                        </li>
                                        <li class="nav-item">
                                           <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#payment_api">
                                              <span class="icon-sm icon-base ti tabler-api iconmrgn me-1"></span> Payment
                                                                                                                  API
                                           </button>
                                        </li>
                                        <li class="nav-item">
                                           <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#maintenance_mode">
                                              <span class="icon-sm icon-base ti tabler-box-model-2 iconmrgn me-1"></span>
                                              Maintenance Mode
                                           </button>
                                        </li>
                                     </ul>
                                     <div class="tab-content">
                                        <?php echo $__env->make('backend.components.general_setting', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                        <?php echo $__env->make('backend.components.header_footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                        <?php echo $__env->make('backend.components.contact_details', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                        <?php echo $__env->make('backend.components.admin_settings', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                        <?php echo $__env->make('backend.components.social_networks', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                        <?php echo $__env->make('backend.components.smtp_settings', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                        <?php echo $__env->make('backend.components.payment_api', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                        <?php echo $__env->make('backend.components.maintenance_mode', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                     </div>
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
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modeSelect = document.getElementById("paypal_payment_mode");
            const liveDiv = document.getElementById("paypal_live");
            const sandboxDiv = document.getElementById("paypal_sandbox");

            function togglePayPalFields() {
                const value = modeSelect.value;
                console.log("Selected Mode:", value); // debug
                if (value === "live_mode") {
                    liveDiv.style.display = "block";
                    sandboxDiv.style.display = "none";
                } else {
                    sandboxDiv.style.display = "block";
                    liveDiv.style.display = "none";
                }
            }

            // Run once on load
            togglePayPalFields();

            // Handle change for normal select or Select2
            if (typeof jQuery !== "undefined" && jQuery.fn.select2) {
                jQuery(modeSelect).on("change", togglePayPalFields);
            } else {
                modeSelect.addEventListener("change", togglePayPalFields);
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modeSelect = document.getElementById("stripe_payment_mode");
            const liveDiv = document.getElementById("stripe_live");
            const sandboxDiv = document.getElementById("stripe_test");

            function togglePayPalFields() {
                const value = modeSelect.value;
                console.log("Selected Mode:", value); // debug
                if (value === "live_mode") {
                    liveDiv.style.display = "block";
                    sandboxDiv.style.display = "none";
                } else {
                    sandboxDiv.style.display = "block";
                    liveDiv.style.display = "none";
                }
            }

            // Run once on load
            togglePayPalFields();

            // Handle change for normal select or Select2
            if (typeof jQuery !== "undefined" && jQuery.fn.select2) {
                jQuery(modeSelect).on("change", togglePayPalFields);
            } else {
                modeSelect.addEventListener("change", togglePayPalFields);
            }
        });
    </script>
    <script src="<?php echo e(asset('assets/backend/js/cleave-zen.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/moment.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/flatpickr.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/form-layouts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/form-validation.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/settings/edit.blade.php ENDPATH**/ ?>