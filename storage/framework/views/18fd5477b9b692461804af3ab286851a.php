<?php $__env->startSection('content'); ?>
    <div class="bg-slate-900 shadow-3xll py-6 px-5 rounded-lg mx-auto sm:w-11/12 lg:w-1/3">
        <div class="flex min-h-full flex-col justify-center px-6 py-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h1 class="text-center text-xl mt-4 font-bold tracking-tight text-slate-300">Reset Password</h1>
            </div>

            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="<?php echo e(route('forgot-password')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" placeholder="Enter your registered email..." autocomplete="email" required class="block w-full
                        rounded-sm bg-slate-800 px-3 py-2 text-base text-gray-100 placeholder:text-gray-400 focus:outline focus:outline-slate-700">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-red-600 text-sm"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" placeholder="Enter new password..." autocomplete="current-password" required
                               class="block w-full rounded-sm bg-slate-800 px-3 py-2 text-base text-gray-100 placeholder:text-gray-400 focus:outline focus:outline-slate-700">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-red-600 text-sm"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mt-2">
                        <input type="password" name="password_confirmation" id="confirmpassword" placeholder="Enter new password. .." autocomplete="current-password" required
                               class="block w-full rounded-sm bg-slate-800 px-3 py-2 text-base text-gray-100 placeholder:text-gray-400 focus:outline focus:outline-slate-700">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-red-600 text-sm"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <button type="submit" class="flex w-full justify-center rounded-sm bg-slate-700 px-3 py-2 text-md font-semibold text-white hover:bg-slate-800">
                        Send Reset Password Link
                    </button>

                    <div class="text-center text-slate-300">
                        <p>New Here <a href="<?php echo e(route('register')); ?>" class="font-bold">Register Now</a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\customers\resetPassword.blade.php ENDPATH**/ ?>