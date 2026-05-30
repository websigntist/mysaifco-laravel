<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-6">
                <div class="col-sm-12 mt-8">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex flex-column justify-content-center">
                            <?php echo heading_breadcrumbs('Customer Quotation Details'); ?>

                        </div>
                        
                        <div class="card-header-elements ms-auto d-flex align-content-between">
                            <a href="<?php echo e(route($module.'.edit', $getData->id)); ?>" class="btn btn-sm btn-primary waves-effect waves-light d-lg-block d-none d-flex"
                               data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                <span class="icon-base ti tabler-edit icon-sm me-2"></span>Edit</a>
                            <a href="<?php echo e(route($module.'.edit', $getData->id)); ?>" class="btn btn-icon btn-primary waves-effect d-flex d-lg-none d-sm-block d-flex"
                               data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                <span class="icon-base ti tabler-edit icon-22px"></span> </a>
                            <a href="<?php echo e(route($module)); ?>" class="btn btn-sm btn-dark waves-effect waves-light d-lg-block d-none d-flex"
                               data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Go Back">
                                <span class="icon-base ti tabler-arrow-back-up-double icon-22px me-2"></span>Go Back</a>
                            <a href="<?php echo e(route($module)); ?>" class="btn btn-icon btn-dark waves-effect d-flex d-lg-none d-sm-block d-flex"
                               data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Go Back">
                                <span class="icon-base ti tabler-arrow-back-up-double icon-22px"></span> </a>
                            <div style="display: flex !important;">
                                
                                
                                 <a href="<?php echo e(route($module.'.download-pdf', $getData->id)); ?>"
                                    class="btn btn-sm btn-danger waves-effect d-lg-block d-none d-flex">
                                     <span class="icon-base ti tabler-file-type-pdf icon-20px me-2"></span>PDF</a>
                                 <a href="<?php echo e(route($module.'.download-pdf', $getData->id)); ?>"
                                    class="btn btn-sm btn-icon btn-danger waves-effect d-lg-none d-sm-block d-flex">
                                     <span class="icon-base ti tabler-file-type-pdf icon-20px"></span> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- quotation Card -->
            <div class="card mb-6" style="<?php if($getData->letterhead): ?>background-image: url('<?php echo e(asset
            ('assets/images/quo-assets/' . $getData->letterhead)); ?>'); background-size: cover; background-position:
            center top; background-repeat: no-repeat;<?php endif; ?>">
                <div class="card-body">
                    <!-- quotation Header -->
                    

                    <!-- Client Information -->
                    <div class="row mb-5" style="margin-top: 300px;">
                        <div class="col-md-12 mb-10"><h3 class="text-center fw-semibold">Customer Quotation</h3></div>
                        <div class="col-md-6">
                            <h5 class="fw-bold">Quotation To:</h5>
                            <p class="mb-1"><strong> <?php echo e($getData->client_name); ?></strong></p>
                            <?php if($getData->client_email): ?>
                                <p class="mb-1"><strong>Emai:</strong> <?php echo e($getData->client_email); ?></p>
                            <?php endif; ?>
                            <?php if($getData->client_phone): ?>
                                <p class="mb-1"><strong>Phone #:</strong> <?php echo e($getData->client_phone); ?></p>
                            <?php endif; ?>
                            <?php if($getData->client_address): ?>
                                <p class="mb-0"><strong>Address:</strong> <?php echo e($getData->client_address); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <div>
                                <h5 class="fw-bold">Quotation Info:</h5>
                                <p class="mb-1"><strong>Quote #:</strong> <?php echo e($getData->quotation_number); ?></p>
                                <p class="mb-1"><strong>Date:</strong> <?php echo e($getData->quotation_date->format('M d, Y')); ?></p>
                                <p class="mb-1"><strong>Valid Until:</strong> <?php echo e($getData->valid_until->format('M d, Y')); ?></p>
                                <p class="mb-1"><strong>Quote Status:</strong>
                                    <?php echo e(ucwords($getData->status)); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Quotation Items -->
                    <div class="table-responsive mb-4 mt-10">
                        <table class="table table-bordered">
                            <thead class="table-light">
                            <tr>
                                <th width="5%" class="text-center">#</th>
                                <th width="30%">Description</th>
                                <th width="5%" class="text-center">Qty</th>
                                <?php if($getData->show_discount): ?>
                                    <th width="13%" class="text-center">Discount</th>
                                <?php endif; ?>
                                <th width="15%" class="text-center">Unit Price</th>
                                <th width="20%" class="text-center">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $currencySymbols = ['USD' => '$', 'AED' => 'AED', 'EUR' => '�', 'GBP' => '�'];
                                $currencySymbol = $currencySymbols[$getData->currency] ?? '$';
                            ?>
                            <?php $__currentLoopData = $getData->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e($index + 1); ?></td>
                                    <td>
                                        <strong> <?php echo $item->item_name; ?></strong>
                                        <?php if($item->description): ?>
                                            <p><?php echo $item->description; ?></p>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center"><?php echo e($item->quantity); ?></td>
                                    <?php if($getData->show_discount): ?>
                                        <td class="text-center"><?php echo e($currencySymbol); ?> <?php echo e(number_format($item->discount ?? 0, 2)); ?></td>
                                    <?php endif; ?>
                                    <td class="text-center"><?php echo e($currencySymbol); ?> <?php echo e(number_format($item->unit_price, 2)); ?></td>
                                    <td class="text-center">
                                        <strong><?php echo e($currencySymbol); ?> <?php echo e(number_format($item->amount, 2)); ?></strong>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Customer Quotation Summary -->
                    <div class="row mt-10">
                        
                        <div class="col-md-6">
                            <?php if($getData->notes): ?>
                                <div class="mb-4">
                                    <h6 class="mb-2">Notes:</h6>
                                    <p class="text-muted"><?php echo e($getData->notes); ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if($getData->terms): ?>
                                <div class="mb-4">
                                    <h6 class="mb-2">Terms & Conditions:</h6>
                                    <p class="text-muted"><?php echo e($getData->terms); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="rounded" style="background-color: rgba(255,255,255,0.5)">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Subtotal:</span>
                                        <span><?php echo e($currencySymbol); ?> <?php echo e(number_format($getData->subtotal, 2)); ?></span>
                                    </div>
                                    <?php if($getData->show_tax): ?>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Tax (<?php echo e($getData->tax_rate); ?>%):</span>
                                            <span><?php echo e($currencySymbol); ?> <?php echo e(number_format($getData->tax_amount, 2)); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($getData->show_vat): ?>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>VAT (<?php echo e($getData->vat_rate); ?>%):</span>
                                            <span><?php echo e($currencySymbol); ?> <?php echo e(number_format($getData->vat_amount, 2)); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($getData->discount > 0): ?>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="text-danger">Discount:</span>
                                            <span class="text-danger">-<?php echo e($currencySymbol); ?> <?php echo e(number_format($getData->discount, 2)); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <hr class="border-dark">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-0">Total:</h5>
                                        <h5 class="mb-0 text-primary fw-semibold">
                                            <?php echo e($currencySymbol); ?> <?php echo e(number_format ($getData->total, 2)); ?>

                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 150px;"></div>
                        
                        <div class="col-md-6">
                            <?php if($getData->signature): ?>
                                <h6 class="mb-2">Authorize Signature</h6>
                                <img src="<?php echo e(asset('assets/images/quo-assets/' . $getData->signature)); ?>"
                                     alt="Signature"
                                     style="max-width: 150px; max-height: 80px;">
                            <?php endif; ?>
                        </div>
                        
                        <div class="col-md-6 d-flex justify-content-end">
                            <?php if($getData->stamp): ?>
                                <div>
                                    <h6 class="mb-2">Authorize Stamp</h6>
                                    <img src="<?php echo e(asset('assets/images/quo-assets/' . $getData->stamp)); ?>"
                                         alt="Stamp"
                                         style="max-width: 150px; max-height: 80px;">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div style="margin-bottom: 300px;"></div>
            </div>
        </div>
        <!-- / Content -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
    <style>
        @media print {
            .content-wrapper {
                margin:  0 !important;
                padding: 0 !important;
            }

            .card-header-elements,
            .btn,
            nav,
            aside,
            footer {
                display: none !important;
            }

            .card {
                border:     none !important;
                box-shadow: none !important;
            }
        }
    </style>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\customer-quotations\view.blade.php ENDPATH**/ ?>