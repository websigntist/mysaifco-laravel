<?php
    /** @var \App\Models\backend\Tour $tour */
    $tour = $tour ?? null;
?>
<?php if($tour): ?>
    <div class="relative">
        <img src="<?php echo e($tour->imageUrl()); ?>"
             class="rounded-lg w-full h-full min-h-[280px] object-cover"
             alt="<?php echo e($tour->image_alt ?? $tour->title); ?>">
        <?php if($tour->redTag && filled($tour->redTag->title)): ?>
            <span class="absolute left-3 top-3 inline-flex items-center gap-1 rounded-full px-3 py-1 text-sm font-normal text-white shadow-sm bg-red-600 font-heading z-10">
                <?php if(filled($tour->redTag->icon)): ?>
                    <img src="<?php echo e(asset('assets/images/red-tags/' . $tour->redTag->icon)); ?>" alt="" class="h-4 w-4 rounded-full object-cover">
                <?php endif; ?>
                <span aria-hidden="true"><?php echo e($tour->redTag->title); ?></span>
            </span>
        <?php endif; ?>
        <div class="absolute inset-0 rounded-lg bg-gradient-to-b from-transparent to-black/80 hover:bg-black/20 transition duration-300 ease-in-out"></div>
        <div class="absolute left-5 bottom-20 font-heading text-xl font-normal text-white z-10 truncate max-w-[85%]">
            <?php echo e($tour->title); ?>

        </div>
        <div class="absolute left-5 bottom-14 flex gap-0.5 text-amber-400 items-center z-10" aria-hidden="true">
            <?php for($i = 0; $i < 5; $i++): ?>
                <span class="text-base leading-none md:text-lg">&#9733;</span>
            <?php endfor; ?>
            <?php if(filled($tour->tour_duration)): ?>
                
                <span class="text-white text-xs ms-1">(4.9/5) 3.1K Reviews</span>
            <?php endif; ?>
        </div>
        <div class="absolute left-5 bottom-5 font-body font-medium text-xs bg-mst rounded-full py-1 px-4 text-white z-10">
            Starting from: AED <?php echo e(number_format((float) $tour->price, 0)); ?>

        </div>
        <a href="<?php echo e($tour->frontendUrl()); ?>"
           class="absolute right-5 bottom-5 inline-flex shrink-0 items-center justify-center w-15 h-9 rounded-full bg-white z-10 hover:right-4 transition-all ease-in-out duration-500">
            <img src="<?php echo e(asset('assets/images/icons/line-arrow.svg')); ?>" alt="" class="w-5 h-6">
        </a>
    </div>
<?php endif; ?>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/components/tour-card.blade.php ENDPATH**/ ?>