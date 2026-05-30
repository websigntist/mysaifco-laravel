<?php $__env->startSection('title', 'User Profile - Laravel Backend App'); ?>
<?php $__env->startSection('description', 'user profile of admin panel'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-slate-900 rounded-lg mx-auto sm:w-11/12 lg:w-1/3 my-4">
        <div class="flex min-h-full flex-col justify-center px-6 py-8 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h1 class="text-center text-xl font-bold tracking-tight text-slate-300">Update Profile</h1>
            </div>
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="<?php echo e(route('profile')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div>
                        <div class="mt-2">
                            <input
                                type="text"
                                name="first_name"
                                value="<?php echo e(auth()->user()->first_name); ?>"
                                placeholder="Enter first name..."
                                id="first_name"
                                autocomplete="first_name" class="block w-full rounded-sm bg-slate-800 px-3 py-2 text-base text-gray-100 placeholder:text-gray-400 focus:outline focus:outline-slate-700">
                            <?php $__errorArgs = ['first_name'];
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
                    </div>
                    <div>
                        <div class="mt-2">
                            <input type="text" name="last_name" value="<?php echo e(auth()->user()->last_name); ?>"
                                   placeholder="Enter last name..." id="last_name" autocomplete="last_name" class="block w-full rounded-sm bg-slate-800 px-3 py-2 text-base text-gray-100 placeholder:text-gray-400 focus:outline focus:outline-slate-700/6">
                            <?php $__errorArgs = ['last_name'];
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
                    </div>
                    <div>
                        <div class="mt-2">
                            <input type="text" name="phone" value="<?php echo e(auth()->user()->phone); ?>" placeholder="Enter
                            Phone..." id="phone" autocomplete="phone" class="block w-full rounded-sm bg-slate-800 px-3 py-2 text-base text-gray-100 placeholder:text-gray-400 focus:outline focus:outline-slate-700/6">
                            <?php $__errorArgs = ['phone'];
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
                    </div>
                    <div>
                        <div class="mt-2">
                            <input type="text" name="address" value="<?php echo e(auth()->user()->address); ?>" placeholder="Enter
                            address..." id="address" autocomplete="address" class="block w-full rounded-sm bg-slate-800 px-3 py-2 text-base text-gray-100 placeholder:text-gray-400 focus:outline focus:outline-slate-700/6">
                            <?php $__errorArgs = ['address'];
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
                    </div>
                    <div>
                        <div class="mt-2">
                            <input type="email" disabled name="email" value="<?php echo e(auth()->user()->email); ?>"
                                   placeholder="Enter login email..." id="email"
                                   autocomplete="email" class="block w-full rounded-sm bg-slate-800 px-3 py-2 text-base text-gray-100 placeholder:text-gray-400 focus:outline focus:outline-slate-700/6">
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
                    </div>
                    <div>
                        <div class="mt-2">
                            <input type="password" name="password" placeholder="Enter login password..." id="password" autocomplete="current-password" class="block w-full rounded-sm bg-slate-800 px-3 py-2 text-base text-gray-100 placeholder:text-gray-400 focus:outline focus:outline-slate-700/6">
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
                    </div>
                    <div class="mt-2">
                        <div class="place-items-center">
                            <input class="block w-full text-sm text-white border border-gray-600 rounded
                                                        cursor-pointer bg-gray-700 focus:outline-1 focus:outline-gray-500 py-3 px-3"
                                   aria-describedby="file_input_help" id="file_input" name="image" type="file">
                            <div class="lightgallery">
                                <?php if(auth()->user()->image && auth()->user()->image !== '0'): ?>
                                    <a href="<?php echo e(asset('assets/images/'.auth()->user()->image)); ?>">
                                        <img
                                            src="<?php echo e(asset('assets/images/users/'.auth()->user()->image)); ?>"
                                            class="w-[100px] h-[100px] rounded-full mt-2 object-cover border-3
                                            border-gray-600 overflow-hidden thumb-img"
                                            title="<?php echo e(auth()->user()->image); ?>"
                                            alt="<?php echo e(auth()->user()->image); ?>"/>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <p class="mt-1 mb-2 text-xs text-gray-500" id="file_input_help">SVG, PNG, JPG or GIF (MAX.
                                                                                            2MB).</p>
                            <div class="fImg">
                                <input type="hidden" name="delete_img[image]" value="0" class="delete_img">
                                <?php if(auth()->user()->image && auth()->user()->image !== '0'): ?>
                                    <button type="button"
                                            value="Delete"
                                            class="del_img img_delete text-white bg-red-500 hover:bg-red-700 focus:ring-0 focus:outline-none rounded text-sm px-5 py-2 text-center cursor-pointer">
                                        Delete image
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-sm bg-slate-700 px-3 py-2 text-md font-semibold text-white hover:bg-slate-800">
                            Update Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\users\profile.blade.php ENDPATH**/ ?>