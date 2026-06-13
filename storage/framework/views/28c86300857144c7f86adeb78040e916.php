<?php
    $packages = [
        [
            'title' => 'Sharing 5 Beds',
            'bg_color' => 'bg-[#038FA6]',
            'price' => '1150',
            'features' => ['Umrah Visa', 'Makkah Hotel', 'Madinah Hotel', 'Transportation', 'Border Fee'],
            'popular' => false,
        ],
        [
            'title' => 'Sharing 4 Beds',
            'bg_color' => 'bg-[#118F37]',
            'price' => '1150',
            'features' => ['Umrah Visa', 'Makkah Hotel', 'Madinah Hotel', 'Transportation', 'Border Fee'],
            'popular' => true,
        ],
        [
            'title' => 'Sharing 3 Beds',
            'bg_color' => 'bg-[#EE9B02]',
            'price' => '1300',
            'features' => ['Umrah Visa', 'Makkah Hotel', 'Madinah Hotel', 'Transportation', 'Border Fee'],
            'popular' => false,
        ],
        [
            'title' => 'Sharing 2 Beds',
            'bg_color' => 'bg-[#EC0937]',
            'price' => '1450',
            'features' => ['Umrah Visa', 'Makkah Hotel', 'Madinah Hotel', 'Transportation', 'Border Fee'],
            'popular' => false,
        ],
    ];

    $whatsapp_raw = get_setting('umrah_inquiry_whatsapp') ?? '+971 55 663 7710';
    $whatsapp_clean = preg_replace('/[^0-9]/', '', $whatsapp_raw);
?>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 pt-4 pb-12">
    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="relative flex flex-col bg-white rounded-2xl border border-gray-200 hover:-translate-y-2
        transition-all duration-300 ease-out overflow-hidden h-full">

            
            <?php if($package['popular']): ?>
                <div class="absolute top-0 right-0 w-28 h-28 overflow-hidden pointer-events-none z-10">
                        <div class="absolute top-4 -right-12 w-40 bg-[#EE9B02] text-white text-xs font-semibold
                    text-center py-1 rotate-45 uppercase tracking-wider font-heading">
                        Most <br> Popular
                    </div>
                </div>
            <?php endif; ?>

            
            <div class="<?php echo e($package['bg_color']); ?> pt-8 pb-7 px-4 flex flex-col items-center justify-center text-center">
                
                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center mb-4 shadow-sm">
                    <svg class="w-8 h-8 text-[#5390F5]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Head -->
                        <circle cx="12" cy="7" r="4.25" stroke="#7BA6E6" stroke-width="1.5" fill="#EBF3FC"/>
                        <!-- Shoulder outline -->
                        <path d="M4 21C4 16.8 7.35 14.5 12 14.5C16.65 14.5 20 16.8 20 21" stroke="#7BA6E6" stroke-width="1.5" fill="#EBF3FC"/>
                    </svg>
                </div>

                
                <h3 class="font-heading text-white text-[24px] font-bold tracking-wide">
                    <?php echo e($package['title']); ?>

                </h3>
            </div>

            
            <div class="flex flex-col flex-grow pt-6 pb-8 px-10 bg-white justify-between">

                
                <div class="text-center mb-6">
                    <p class="font-heading text-lg text-black">
                        Starting from
                    </p>
                    <p class="font-heading text-black text-4xl font-extrabold leading-tight tracking-tight">
                        AED <?php echo e($package['price']); ?>

                    </p>
                </div>

                
                <ul class="space-y-3 mb-8 text-left">
                    <?php $__currentLoopData = $package['features']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="flex gap-3 text-black text-sm font-medium">
                            
                            <img src="<?php echo e(asset('assets/images/icons/check-bullet.svg')); ?>"
                                 title="check"
                                 class="w-4"
                                 alt="check">
                            <p><?php echo e($feature); ?></p>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

                
                <div class="flex justify-center mt-auto">
                    <a href="" class="flex items-center justify-center text-white text-xs px-3 py-2
                    rounded-full
                                                bg-gradient-to-r from-[#2D9D3E] to-[#1E5E28]
                                                 hover:bg-gradient-to-r hover:from-[#1E5E28] hover:to-[#2D9D3E]
                                                 transition duration-300 font-heading
                                                 italic">
                        <img src="<?php echo e(asset('assets/images/icons/wa.svg')); ?>" class="me-2" alt="wa">
                        WhatsApp Now <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                                                                                 class="w-4 ms-1"
                                                                                 alt="arrow"> </a>
                </div>

            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/components/umrah-pricing.blade.php ENDPATH**/ ?>