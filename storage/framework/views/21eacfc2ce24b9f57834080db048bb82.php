<section class="flex item-center justify-center pt-14 pb-18">
    <div class="container mx-auto">
        <div class="mx-auto text-center">
            <h1>
                <span>Frequently Asked  </span><span class="text-mst">Questions</span>
            </h1>
            <p class="mt-4 text-center mx-auto md:w-7/12">
                Find answers to frequently asked questions about Dubai tours, desert safari, holiday packages, Umrah
                services, and global visa assistance to help you plan your journey with ease.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-14 items-center">
            <?php
                $faqBtnClass = 'faq-accordion-btn flex w-full items-center justify-between gap-3 rounded-lg border border-gray-200 bg-white px-2 py-4 font-heading text-md font-medium text-mst-gray transition md:px-3 [&[aria-expanded=\'true\']]:rounded-b-none [&[aria-expanded=\'true\']]:border-transparent [&[aria-expanded=\'true\']]:bg-gradient-to-r [&[aria-expanded=\'true\']]:from-mst [&[aria-expanded=\'true\']]:to-mst-dark [&[aria-expanded=\'true\']]:text-white [&[aria-expanded=\'true\']]:shadow-none';
            ?>
            
            <div class="faqmst">
                <div id="accordion-card" data-accordion="collapse">
                    
                    <h2 id="faq-1">
                        <button type="button"
                                class="<?php echo e($faqBtnClass); ?>"
                                data-accordion-target="#faq-body-1"
                                aria-expanded="true"
                                aria-controls="faq-body-1">
                            <span class="text-xl">What are the best tours to book in Dubai?</span>
                            <svg data-accordion-icon class="h-5 w-5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                            </svg>
                        </button>
                    </h2>
                    <div id="faq-body-1" class="rounded-b-lg bg-gradient-to-r from-mst to-mst-dark"
                         aria-labelledby="faq-1">
                        <div class="pb-4 pt-0 px-4">
                            <p class="mb-2 text-body text-xs text-white">Dubai offers a variety of top-rated experiences
                                                                         including desert safari tours, luxury yacht
                                                                         rentals, Dubai city tours, Abu Dhabi day trips,
                                                                         and dhow cruise dinners. At Saifco Travel &
                                                                         Tourism, we provide carefully curated UAE
                                                                         inbound tours designed for families, couples,
                                                                         and corporate groups.</p>
                        </div>
                    </div>
                    
                    <h2 id="faq-2" class="mt-6">
                        <button type="button"
                                class="<?php echo e($faqBtnClass); ?>"
                                data-accordion-target="#faq-body-2"
                                aria-expanded="false"
                                aria-controls="faq-body-2">
                            <span class="text-xl">How much does a Dubai desert safari cost?</span>
                            <svg data-accordion-icon class="h-5 w-5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                            </svg>
                        </button>
                    </h2>
                    <div id="faq-body-2" class="hidden rounded-b-lg bg-gradient-to-r from-mst to-mst-dark"
                         aria-labelledby="faq-2">
                        <div class="pb-4 pt-0 px-4">
                            <p class="mb-2 text-body text-xs text-white">Lorem ipsum dolor sit amet, consectetur
                                                                         adipisicing elit. Accusantium animi assumenda
                                                                         at consequatur cum distinctio dolor dolores
                                                                         doloribus ducimus eligendi, esse et eum
                                                                         exercitationem facere fugit hic iste maiores
                                                                         modi molestiae mollitia nam nihil odit optio
                                                                         porro quae quasi quia sit soluta tempora
                                                                         temporibus unde ut vel veritatis. A,
                                                                         molestiae!</p>
                        </div>
                    </div>
                    
                    <h2 id="faq-3" class="mt-6">
                        <button type="button"
                                class="<?php echo e($faqBtnClass); ?>"
                                data-accordion-target="#faq-body-3"
                                aria-expanded="false"
                                aria-controls="faq-body-3">
                            <span class="text-xl">Do you provide hotel pickup and drop-off for tours?</span>
                            <svg data-accordion-icon class="h-5 w-5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                            </svg>
                        </button>
                    </h2>
                    <div id="faq-body-3" class="hidden rounded-b-lg bg-gradient-to-r from-mst to-mst-dark" aria-labelledby="faq-3">
                        <div class="pb-4 pt-0 px-4">
                            <p class="mb-2 text-body text-xs text-white">Lorem ipsum dolor sit amet, consectetur
                                                                         adipisicing elit. Accusantium animi assumenda
                                                                         at consequatur cum distinctio dolor dolores
                                                                         doloribus ducimus eligendi, esse et eum
                                                                         exercitationem facere fugit hic iste maiores
                                                                         modi molestiae mollitia nam nihil odit optio
                                                                         porro quae quasi quia sit soluta tempora
                                                                         temporibus unde ut vel veritatis. A,
                                                                         molestiae!</p>
                        </div>
                    </div>
                    
                    <h2 id="faq-4" class="mt-6">
                        <button type="button"
                                class="<?php echo e($faqBtnClass); ?>"
                                data-accordion-target="#faq-body-4"
                                aria-expanded="false"
                                aria-controls="faq-body-4">
                            <span class="text-xl">Do you offer private yacht rentals in Dubai?</span>
                            <svg data-accordion-icon class="h-5 w-5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                            </svg>
                        </button>
                    </h2>
                    <div id="faq-body-4" class="hidden rounded-b-lg bg-gradient-to-r from-mst to-mst-dark" aria-labelledby="faq-4">
                        <div class="pb-4 pt-0 px-4">
                            <p class="mb-2 text-body text-xs text-white">Lorem ipsum dolor sit amet, consectetur
                                                                         adipisicing elit. Accusantium animi assumenda
                                                                         at consequatur cum distinctio dolor dolores
                                                                         doloribus ducimus eligendi, esse et eum
                                                                         exercitationem facere fugit hic iste maiores
                                                                         modi molestiae mollitia nam nihil odit optio
                                                                         porro quae quasi quia sit soluta tempora
                                                                         temporibus unde ut vel veritatis. A,
                                                                         molestiae!</p>
                        </div>
                    </div>
                    
                    <h2 id="faq-5" class="mt-6">
                        <button type="button"
                                class="<?php echo e($faqBtnClass); ?>"
                                data-accordion-target="#faq-body-5"
                                aria-expanded="false"
                                aria-controls="faq-body-5">
                            <span class="text-xl">Can I apply for a UAE visa through your company?</span>
                            <svg data-accordion-icon class="h-5 w-5 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/>
                            </svg>
                        </button>
                    </h2>
                    <div id="faq-body-5" class="hidden rounded-b-lg bg-gradient-to-r from-mst to-mst-dark" aria-labelledby="faq-5">
                        <div class="pb-4 pt-0 px-4">
                            <p class="mb-2 text-body text-xs text-white">Lorem ipsum dolor sit amet, consectetur
                                                                         adipisicing elit. Accusantium animi assumenda
                                                                         at consequatur cum distinctio dolor dolores
                                                                         doloribus ducimus eligendi, esse et eum
                                                                         exercitationem facere fugit hic iste maiores
                                                                         modi molestiae mollitia nam nihil odit optio
                                                                         porro quae quasi quia sit soluta tempora
                                                                         temporibus unde ut vel veritatis. A,
                                                                         molestiae!</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end">
                <img src="<?php echo e(asset('assets/images/faq-img.webp')); ?>" class="" alt="img">
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
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/frontend/components/faqs.blade.php ENDPATH**/ ?>