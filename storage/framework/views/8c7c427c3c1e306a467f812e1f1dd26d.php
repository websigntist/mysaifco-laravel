<?php
    $explore = $explore ?? null;
    $popularSearch = $popularSearch ?? null;
    $popularSearchItems = $popularSearchItems ?? [];
?>
<section class="py-14">

    <?php if($explore && (filled($explore->title) || filled($explore->description))): ?>
        <div class="container mx-auto">
            <?php if(filled($explore->title)): ?>
                <?php
                    $words     = explode(' ', $explore->title);
                    $mainText  = implode(' ', array_slice($words, 0, -2)); // all except last 2
                    $spanText  = implode(' ', array_slice($words, -2));    // last 2 words
                ?>

                <h2 class="text-left font-heading text-2xl font-semibold italic leading-tight tracking-tight text-mst-gray">
                    <span><?php echo e($mainText); ?>  </span><span class="text-mst"><?php echo e($spanText); ?></span>
                </h2>
            <?php endif; ?>
            <?php if(filled($explore->description)): ?>
                <div class="font-body text-center md:text-left text-sm bg-[#FAF7F2] mt-6 p-5 rounded-lg border border-[#BA9B31]/40">
                    <?php echo $explore->description; ?>

                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if($popularSearch && (filled($popularSearch->title) || filled($popularSearch->description) || count($popularSearchItems) > 0)): ?>
        <div class="container mx-auto mt-10">
            <?php if(filled($popularSearch->title)): ?>
                <?php
                    $words     = explode(' ', $popularSearch->title);
                    $mainText  = implode(' ', array_slice($words, 0, -1));
                    $spanText  = implode(' ', array_slice($words, -1));
                ?>
                <h2 class="text-left font-heading text-2xl font-semibold italic leading-tight tracking-tight text-mst-gray">
                    <span><?php echo e($mainText); ?>  </span><span class="text-mst"><?php echo e($spanText); ?></span>
                </h2>
            <?php else: ?>
                <h2 class="text-left font-heading text-2xl font-semibold italic leading-tight tracking-tight text-mst-gray">
                    <span class="text-mst-gray">Popular </span><span class="text-mst">Searches</span>
                </h2>
            <?php endif; ?>
            <?php if(filled($popularSearch->description)): ?>
                <p class="text-left font-body mt-2"><?php echo e($popularSearch->description); ?></p>
            <?php endif; ?>
            <?php if(count($popularSearchItems) > 0): ?>
                <ul class="flex flex-wrap items-center justify-center gap-3 font-body text-sm
                           bg-[#FAF7F2] mt-6 p-5 rounded-lg border border-[#BA9B31]/40">
                    <?php $__currentLoopData = $popularSearchItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                            <?php echo e($label); ?>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\frontend\components\explore_dubai.blade.php ENDPATH**/ ?>