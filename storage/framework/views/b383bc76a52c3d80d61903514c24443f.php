<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 mt-3 container-p-y">
        <div class="row gy-6">
            <div class="col-sm-12">
                <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                    <div class="d-flex flex-column justify-content-center">
                        <?php echo heading_breadcrumbs('Tour Detail', 'View tour'); ?>

                    </div>
                    <div class="card-header-elements ms-auto d-flex gap-2">
                        <a href="<?php echo e(route('tours.edit', $tour->id)); ?>" class="btn btn-sm btn-primary">
                            <span class="icon-base ti tabler-edit icon-sm me-1"></span> Edit
                        </a>
                        <?php echo goBack('tours'); ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-8">
                <div class="card card-action border-top-bottom mb-4">
                    <div class="card-header border-bottom py-3">
                        <h6 class="mb-0 text-capitalize">
                            <span class="icon-sm icon-base ti tabler-info-circle iconmrgn me-1"></span>
                            Tour Information
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <strong>Title</strong>
                                <p class="mb-0 text-muted"><?php echo e($tour->title); ?></p>
                            </div>
                            <div class="col-md-6">
                                <strong>Friendly URL</strong>
                                <p class="mb-0 text-muted"><?php echo e($tour->friendly_url); ?></p>
                            </div>
                            <div class="col-md-4">
                                <strong>Duration</strong>
                                <p class="mb-0 text-muted"><?php echo e($tour->tour_duration); ?></p>
                            </div>
                            <div class="col-md-4">
                                <strong>Max Persons</strong>
                                <p class="mb-0 text-muted"><?php echo e($tour->max_persons); ?></p>
                            </div>
                            <div class="col-md-4">
                                <strong>Price</strong>
                                <p class="mb-0 text-muted"><?php echo e($tour->price); ?></p>
                            </div>
                            <div class="col-12">
                                <strong>Status</strong>
                                <p class="mb-0">
                                    <span class="badge bg-<?php echo e($tour->status === 'active' ? 'success' : 'secondary'); ?>"><?php echo e(ucfirst($tour->status)); ?></span>
                                </p>
                            </div>
                            <?php if($tour->description): ?>
                                <div class="col-12">
                                    <strong>Description</strong>
                                    <div class="text-muted"><?php echo $tour->description; ?></div>
                                </div>
                            <?php endif; ?>
                            <?php if($tour->image): ?>
                                <div class="col-12">
                                    <strong>Image</strong>
                                    <div class="lightgallery mt-1">
                                        <img src="<?php echo e(asset('assets/images/tours/' . $tour->image)); ?>" alt="<?php echo e($tour->image_alt ?? $tour->title); ?>" class="img-thumbnail" style="max-height: 200px;">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-8">
                <div class="card card-action border-top-bottom">
                    <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 text-capitalize">
                            <span class="icon-sm icon-base ti tabler-help iconmrgn me-1"></span>
                            Assigned FAQs
                        </h6>
                        <?php if($tour->faqs->count() > 0): ?>
                            <span class="badge bg-label-primary"><?php echo e($tour->faqs->count()); ?> assigned</span>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <?php if($tour->faqs->count() > 0): ?>
                            <ul class="list-group list-group-flush">
                                <?php $__currentLoopData = $tour->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item px-0 d-flex align-items-start">
                                        <span class="badge bg-label-secondary rounded-pill me-2"><?php echo e($index + 1); ?></span>
                                        <div class="flex-grow-1">
                                            <strong><?php echo e($faq->title); ?></strong>
                                            <?php if($faq->description): ?>
                                                <div class="text-muted small mt-1"><?php echo Str::limit(strip_tags($faq->description), 120); ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <a href="<?php echo e(route('faqs.edit', $faq->id)); ?>" class="btn btn-sm btn-outline-primary" target="_blank">View FAQ</a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php else: ?>
                            <p class="text-muted mb-0">No FAQs assigned to this tour. <a href="<?php echo e(route('tours.edit', $tour->id)); ?>">Edit tour</a> to assign FAQs.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\tours\view.blade.php ENDPATH**/ ?>