<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/page-auth.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-6">
                <!-- Forgot Password -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-6">
                            <a href="" class="app-brand-link">
                                <img src="<?php echo e(asset('assets/backend/images/websigntist.svg')); ?>" width="50" alt="logo">
                                <span class="app-brand-text demo text-heading fw-bold text-uppercase">Websigntist</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h5 class="mb-1">Forgot Password?</h5>
                        <p class="mb-6">Enter your email and system will send you reset password link.</p>
                        <form action="<?php echo e(route ('forgot-password')); ?>" method="POST" class="mb-6 needs-validation" novalidate>
                            <?php echo csrf_field(); ?>
                            <div class="mb-6 form-control-validation">
                                <label for="email" class="form-label">Email</label>
                                <input type="email"
                                       id="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="Enter your email"
                                       required>
                            </div>
                            <?php echo error_label('email'); ?>

                            <button type="submit" class="btn btn-primary d-grid w-100">Send Reset Link</button>
                        </form>
                        <div class="text-center">
                            <a href="<?php echo e(route('login')); ?>" class="d-flex justify-content-center">
                                <i class="icon-base ti tabler-chevron-left scaleX-n1-rtl me-1_5"></i> Back to login </a>
                        </div>
                    </div>
                </div>
                <!-- /Forgot Password -->
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('assets/backend/js/form-validation.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\customers\forgotPassword.blade.php ENDPATH**/ ?>