<?php
    $faqBtnClass = 'faq-accordion-btn flex w-full items-center justify-between gap-4 border-0 bg-transparent px-5 py-5 font-heading text-lg font-semibold text-left text-mst-gray transition [&[aria-expanded=\'true\']]:text-white';
    $faqCardClass = 'faqmst overflow-hidden rounded-lg border border-gray-200 bg-white transition';

    $faqItems = [
        [
            'question' => 'What are the best tours to book in Dubai?',
            'answer' => 'Dubai offers a variety of top-rated experiences including desert safari tours, luxury yacht rentals, Dubai city tours, Abu Dhabi day trips, and dhow cruise dinners. At Saifco Travel & Tourism, we provide carefully curated UAE inbound tours designed for families, couples, and corporate groups.',
            'open' => true,
        ],
        [
            'question' => 'How much does a Dubai desert safari cost?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium animi assumenda at consequatur cum distinctio dolor dolores doloribus ducimus eligendi, esse et eum exercitationem facere fugit hic iste maiores modi molestiae mollitia nam nihil odit optio porro quae quasi quia sit soluta tempora temporibus unde ut vel veritatis. A, molestiae!',
            'open' => false,
        ],
        [
            'question' => 'Do you provide hotel pickup and drop-off for tours?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium animi assumenda at consequatur cum distinctio dolor dolores doloribus ducimus eligendi, esse et eum exercitationem facere fugit hic iste maiores modi molestiae mollitia nam nihil odit optio porro quae quasi quia sit soluta tempora temporibus unde ut vel veritatis. A, molestiae!',
            'open' => false,
        ],
        [
            'question' => 'Do you offer private yacht rentals in Dubai?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium animi assumenda at consequatur cum distinctio dolor dolores doloribus ducimus eligendi, esse et eum exercitationem facere fugit hic iste maiores modi molestiae mollitia nam nihil odit optio porro quae quasi quia sit soluta tempora temporibus unde ut vel veritatis. A, molestiae!',
            'open' => false,
        ],
        [
            'question' => 'Can I apply for a UAE visa through your company?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium animi assumenda at consequatur cum distinctio dolor dolores doloribus ducimus eligendi, esse et eum exercitationem facere fugit hic iste maiores modi molestiae mollitia nam nihil odit optio porro quae quasi quia sit soluta tempora temporibus unde ut vel veritatis. A, molestiae!',
            'open' => false,
        ],
        [
            'question' => 'What are the best tours to book in Dubai?',
            'answer' => 'Dubai offers a variety of top-rated experiences including desert safari tours, luxury yacht rentals, Dubai city tours, Abu Dhabi day trips, and dhow cruise dinners. At Saifco Travel & Tourism, we provide carefully curated UAE inbound tours designed for families, couples, and corporate groups.',
            'open' => false,
        ],
        [
            'question' => 'How much does a Dubai desert safari cost?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium animi assumenda at consequatur cum distinctio dolor dolores doloribus ducimus eligendi, esse et eum exercitationem facere fugit hic iste maiores modi molestiae mollitia nam nihil odit optio porro quae quasi quia sit soluta tempora temporibus unde ut vel veritatis. A, molestiae!',
            'open' => false,
        ],
        [
            'question' => 'Do you provide hotel pickup and drop-off for tours?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium animi assumenda at consequatur cum distinctio dolor dolores doloribus ducimus eligendi, esse et eum exercitationem facere fugit hic iste maiores modi molestiae mollitia nam nihil odit optio porro quae quasi quia sit soluta tempora temporibus unde ut vel veritatis. A, molestiae!',
            'open' => false,
        ],
        [
            'question' => 'Do you offer private yacht rentals in Dubai?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium animi assumenda at consequatur cum distinctio dolor dolores doloribus ducimus eligendi, esse et eum exercitationem facere fugit hic iste maiores modi molestiae mollitia nam nihil odit optio porro quae quasi quia sit soluta tempora temporibus unde ut vel veritatis. A, molestiae!',
            'open' => false,
        ],
        [
            'question' => 'Can I apply for a UAE visa through your company?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium animi assumenda at consequatur cum distinctio dolor dolores doloribus ducimus eligendi, esse et eum exercitationem facere fugit hic iste maiores modi molestiae mollitia nam nihil odit optio porro quae quasi quia sit soluta tempora temporibus unde ut vel veritatis. A, molestiae!',
            'open' => false,
        ],
    ];

    $faqColumns = [array_slice($faqItems, 0, 5), array_slice($faqItems, 5, 5)];
?>
<section class="flex items-center justify-center pt-14 pb-18">
    <div class="container mx-auto px-4">
        <div class="mx-auto text-center">
            <h1>
                <span>Frequently Asked  </span><span class="text-mst">Questions</span>
            </h1>
            <p class="mt-4 text-center mx-auto md:w-7/12">
                Find answers to frequently asked questions about Dubai tours, desert safari, holiday packages, Umrah
                services, and global visa assistance to help you plan your journey with ease.</p>
        </div>
        <div id="accordion-card" class="faq-disert-safari mt-14" data-accordion="collapse">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-x-10">
                <?php $__currentLoopData = $faqColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $columnIndex => $columnItems): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex flex-col gap-4">
                        <?php $__currentLoopData = $columnItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemIndex => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $faqNumber = ($columnIndex * 5) + $itemIndex + 1;
                                $isOpen = $faq['open'];
                            ?>
                            <div class="<?php echo e($faqCardClass); ?>">
                                <h2 id="faq-<?php echo e($faqNumber); ?>">
                                    <button type="button"
                                            class="<?php echo e($faqBtnClass); ?>"
                                            data-accordion-target="#faq-body-<?php echo e($faqNumber); ?>"
                                            aria-expanded="<?php echo e($isOpen ? 'true' : 'false'); ?>"
                                            aria-controls="faq-body-<?php echo e($faqNumber); ?>">
                                        <span><?php echo e($faq['question']); ?></span>
                                        <svg data-accordion-icon class="h-5 w-5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                                        </svg>
                                    </button>
                                </h2>
                                <div id="faq-body-<?php echo e($faqNumber); ?>"
                                     class="<?php echo e($isOpen ? '' : 'hidden'); ?> px-5 pb-5"
                                     aria-labelledby="faq-<?php echo e($faqNumber); ?>">
                                    <p class="font-body text-sm leading-relaxed text-white"><?php echo e($faq['answer']); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <a href="" class="flex items-center justify-center w-fit text-white text-lg px-5 pt-2 pb-2 rounded-full mx-auto
                                                    bg-gradient-to-r from-[#BA9B31] to-[#74611E]
                                                     hover:bg-gradient-to-r hover:from-[#74611E] hover:to-[#BA9B31]
                                                     transition duration-300 font-heading italic mt-8"> Explore all FAQs
            <img src="<?php echo e(asset('assets/images/icons/btn-arrow.svg')); ?>"
                 class="w-5 ms-1"
                 alt="arrow"> </a>
    </div>
</section>
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/components/tour_faqs.blade.php ENDPATH**/ ?>