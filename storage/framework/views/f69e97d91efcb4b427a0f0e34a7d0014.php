
<div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 flex flex-col">
    <div class="flex items-center gap-3 mb-5">
        <img src="<?php echo e(asset('assets/images/icons/099.svg')); ?>" class="w-6" alt="">
        <h3 class="font-heading italic font-bold text-xl text-mst-gray"><?php echo e($city); ?> <span class="text-mst">Office</span></h3>
    </div>

    <div class="flex items-start gap-3 mb-3">
        <img src="<?php echo e(asset('assets/images/icons/787.svg')); ?>" class="w-6" alt="">
        <span class="text-sm text-mst-gray leading-6"><?php echo $address; ?></span>
    </div>

    <div class="flex items-center gap-3 mb-3">
        <img src="<?php echo e(asset('assets/images/icons/099.svg')); ?>" class="w-5" alt="">
        <span class="text-sm text-mst-gray"><?php echo e($centre); ?></span>
    </div>

    <hr class="border-gray-200 my-2">

    <div class="flex items-center gap-3 mb-6 mt-1">
        <img src="<?php echo e(asset('assets/images/icons/46.svg')); ?>" class="w-6" alt="">
        <span class="text-sm text-mst-gray"><?php echo e($hours); ?></span>
    </div>

    <a href="<?php echo e($map); ?>" target="_blank" rel="noopener"
       class="mt-auto inline-flex items-center justify-center w-fit gap-2 text-md px-6 pt-2 pb-2.5 rounded-full
              font-heading italic text-white
              bg-gradient-to-r from-[#BA9B31] to-[#74611E] hover:from-[#74611E] hover:to-[#BA9B31] transition duration-300">
        Get Directions
        <img src="<?php echo e(asset('assets/images/icons/787.svg')); ?>" class="w-5 brightness-0 invert" alt="">
    </a>
</div>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/pages/includes/partials/vfs-office-card.blade.php ENDPATH**/ ?>