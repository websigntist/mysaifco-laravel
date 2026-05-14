<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/flatpickr.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/select2.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 mt-3 -container-p-y">
          <form action="<?php echo e(route('invoices.update', $getData->id)); ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
              <?php echo csrf_field(); ?>
              <?php echo method_field('PUT'); ?>
             <div class="row gy-6">
                 <div class="col-sm-12">
                     <div class="d-flex justify-content-between align-items-center mb-3">
                         <div class="d-flex flex-column justify-content-center">
                             <?php echo heading_breadcrumbs('Edit '. $title, $title.' form'); ?>

                         </div>
                         <div class="card-header-elements ms-auto d-flex align-content-between">
                             <?php echo goBack($module, 'Update'); ?>


                             
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
              
              <?php if($errors->any()): ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <h5 class="alert-heading mb-2">Validation Errors:</h5>
                      <ul class="mb-0">
                          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li><?php echo e($error); ?></li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              <?php endif; ?>
              <div class="row mb-6 gy-6">
             <!-- left column ===================================-->
             <!-- ===============================================-->
                <div class="col-sm-12 col-xl-8">
                   <!-- Invoice Information -->
                   <div class="card card-action border-top-bottom">
                      <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                         <h6 class="mb-0 text-capitalize">
                            <span class="icon-sm icon-base ti tabler-receipt iconmrgn me-1"></span>
                             Invoice Details
                         </h6>
                          <?php echo card_action_element(); ?>

                      </div>
                      <div class="collapse show">
                         <div class="card-body">
                            <div class="row g-6 pt-5">
                               <div class="col-md-3">
                                  <label class="form-label text-capitalize" for="invoice_type">
                                      <span>Invoice Type</span>
                                  </label>
                                  <select class="form-select select2" id="invoice_type" name="invoice_type" required>
                                      <option value="">Select Type</option>
                                      <?php $__currentLoopData = $invoiceTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($key); ?>" <?php echo e(old('invoice_type', $getData->invoice_type ?? 'sales') == $key ? 'selected' : ''); ?>>
                                              <?php echo e($type); ?>

                                          </option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                   <?php echo error_label('invoice_type'); ?>

                               </div>
                               <div class="col-md-3">
                                  <label class="form-label text-capitalize" for="invoice_number">
                                      <span><?php echo e(_label('invoice_number')); ?></span>
                                  </label>
                                  <input type="text"
                                         id="invoice_number"
                                         name="invoice_number"
                                         value="<?php echo e(old('invoice_number', $getData->invoice_number)); ?>"
                                         class="form-control"
                                         placeholder="Invoice Number..."
                                         required>
                                   <?php echo error_label('invoice_number'); ?>

                               </div>
                               <div class="col-md-3">
                                   <label class="form-label text-capitalize" for="status">
                                       <span><?php echo e(_label('status')); ?></span> </label>
                                  <select class="form-select select2" id="status" name="status" required>
                                      <option value="">Select Status</option>
                                      <?php $__currentLoopData = $getStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($status); ?>" <?php echo e(old('status', $getData->status) == $status ? 'selected' : ''); ?>>
                                              <?php echo e(ucfirst($status)); ?>

                                          </option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                   <?php echo error_label('status'); ?>

                               </div>
                               <div class="col-md-3">
                                  <label class="form-label text-capitalize" for="payment_status">
                                      <span>Payment Status</span>
                                  </label>
                                  <select class="form-select select2" id="payment_status" name="payment_status" required>
                                      <option value="">Select Payment Status</option>
                                      <?php $__currentLoopData = $paymentStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($pStatus); ?>" <?php echo e(old('payment_status', $getData->payment_status ?? 'Paid') == $pStatus ? 'selected' : ''); ?>>
                                              <?php echo e($pStatus); ?>

                                          </option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                   <?php echo error_label('payment_status'); ?>

                               </div>

                               <div class="col-md-4">
                                  <label class="form-label text-capitalize" for="currency">
                                      <span>Currency</span>
                                  </label>
                                  <select class="form-select select2" id="currency" name="currency" required>
                                      <option value="">Select Currency</option>
                                      <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $symbol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($code); ?>" <?php echo e(old('currency', $getData->currency ?? 'USD') == $code ? 'selected' : ''); ?>>
                                              <?php echo e($code); ?> (<?php echo e($symbol); ?>)
                                          </option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                                   <?php echo error_label('currency'); ?>

                               </div>
                               <div class="col-md-4">
                                  <label class="form-label text-capitalize" for="invoice_date">
                                      <span><?php echo e(_label('invoice_date')); ?></span>
                                  </label>
                                  <input type="date"
                                         id="invoice_date"
                                         name="invoice_date"
                                         value="<?php echo e(old('invoice_date', $getData->invoice_date->format('Y-m-d'))); ?>"
                                         class="form-control dob-picker"
                                         placeholder="YYYY-MM-DD"
                                         required>
                                   <?php echo error_label('invoice_date'); ?>

                               </div>
                               <div class="col-md-4">
                                  <label class="form-label text-capitalize" for="due_date">
                                      <span><?php echo e(_label('due_date')); ?></span>
                                  </label>
                                  <input type="date"
                                         id="due_date"
                                         name="due_date"
                                         value="<?php echo e(old('due_date', $getData->due_date->format('Y-m-d'))); ?>"
                                         class="form-control dob-picker"
                                         placeholder="YYYY-MM-DD"
                                         required>
                                   <?php echo error_label('due_date'); ?>

                               </div>
                            </div>
                         </div>
                      </div>
                   </div>

                   <!-- Client Information -->
                   <div class="card card-action border-top-bottom mt-5">
                      <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                         <h6 class="mb-0 text-capitalize">
                            <span class="icon-sm icon-base ti tabler-user iconmrgn me-1"></span>
                             Client Information
                         </h6>
                          <?php echo card_action_element(); ?>

                      </div>
                      <div class="collapse show">
                         <div class="card-body">
                            <div class="row g-6 pt-5">
                               <div class="col-md-12">
                                  <label class="form-label text-capitalize" for="client_name">
                                      <span><?php echo e(_label('client_name')); ?></span>
                                  </label>
                                  <input type="text"
                                         id="client_name"
                                         name="client_name"
                                         value="<?php echo e(old('client_name', $getData->client_name)); ?>"
                                         class="form-control"
                                         placeholder="Enter client name..."
                                         required>
                                   <?php echo error_label('client_name'); ?>

                               </div>
                               <div class="col-md-6">
                                  <label class="form-label text-capitalize" for="client_email">
                                      <span><?php echo e(_label('client_email')); ?></span>
                                  </label>
                                  <input type="email"
                                         id="client_email"
                                         name="client_email"
                                         value="<?php echo e(old('client_email', $getData->client_email)); ?>"
                                         class="form-control"
                                         placeholder="client@example.com">
                                   <?php echo error_label('client_email'); ?>

                               </div>
                               <div class="col-md-6">
                                  <label class="form-label text-capitalize" for="client_phone">
                                      <span><?php echo e(_label('client_phone')); ?></span>
                                  </label>
                                  <input type="text"
                                         id="client_phone"
                                         name="client_phone"
                                         value="<?php echo e(old('client_phone', $getData->client_phone)); ?>"
                                         class="form-control"
                                         placeholder="+1 234 567 8900">
                                   <?php echo error_label('client_phone'); ?>

                               </div>
                               <div class="col-md-12">
                                  <label class="form-label text-capitalize" for="client_address">
                                      <?php echo e(_label('client_address')); ?>

                                  </label>
                                  <textarea class="form-control"
                                            id="client_address"
                                            name="client_address"
                                            placeholder="Enter client address..."
                                            rows="3"><?php echo e(old('client_address', $getData->client_address)); ?></textarea>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>

                   <!-- Invoice Items -->
                   <div class="card card-action border-top-bottom mt-5">
                      <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                         <h6 class="mb-0 text-capitalize">
                            <span class="icon-sm icon-base ti tabler-list iconmrgn me-1"></span>
                             Invoice Items
                         </h6>
                          <?php echo card_action_element(); ?>

                      </div>
                      <div class="collapse show">
                         <div class="card-body">
                            <div id="invoice-items-container">
                                <?php $__currentLoopData = $getData->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="invoice-item border p-3 mb-3 rounded" data-item="<?php echo e($index); ?>">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="mb-0 text-primary">Item #<span class="item-counter"><?php echo e($index + 1); ?></span></h6>
                                        <button type="button" class="btn btn-sm btn-danger waves-effect waves-light remove-single-item-btn">
                                            <span class="icon-base ti tabler-trash icon-20px"></span>
                                        </button>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize"><?php echo e(_label('item_name')); ?></label>
                                            <input type="text"
                                                   name="items[<?php echo e($index); ?>][item_name]"
                                                   class="form-control"
                                                   placeholder="Item name..."
                                                   value="<?php echo e(old('items.'.$index.'.item_name', $item->item_name)); ?>"
                                                   required>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize"><?php echo e(_label('description')); ?></label>
                                            <textarea name="items[<?php echo e($index); ?>][description]"
                                                      id="description_<?php echo e($index); ?>"
                                                      class="form-control editor"
                                                      placeholder="Item description..."
                                                      rows="2"><?php echo e(old('items.'.$index.'.description', $item->description)); ?></textarea>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label text-capitalize"><?php echo e(_label('quantity')); ?></label>
                                            <input type="number"
                                                   name="items[<?php echo e($index); ?>][quantity]"
                                                   class="form-control item-quantity"
                                                   placeholder="1"
                                                   value="<?php echo e(old('items.'.$index.'.quantity', $item->quantity)); ?>"
                                                   min="1"
                                                   required>
                                        </div>
                                        <div class="col-md-3 -item-discount-col">
                                            <label class="form-label text-capitalize">Discount</label>
                                            <input type="number"
                                                   name="items[<?php echo e($index); ?>][discount]"
                                                   class="form-control item-discount"
                                                   placeholder="0.00"
                                                   value="<?php echo e(old('items.'.$index.'.discount', $item->discount ?? 0)); ?>"
                                                   step="0.01"
                                                   min="0">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label text-capitalize"><?php echo e(_label('unit_price')); ?></label>
                                            <input type="number"
                                                   name="items[<?php echo e($index); ?>][unit_price]"
                                                   class="form-control item-price"
                                                   placeholder="0.00"
                                                   value="<?php echo e(old('items.'.$index.'.unit_price', $item->unit_price)); ?>"
                                                   step="0.01"
                                                   min="0"
                                                   required>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label text-capitalize"><?php echo e(_label('amount')); ?></label>
                                            <input type="number"
                                                   class="form-control item-amount"
                                                   placeholder="0.00"
                                                   value="<?php echo e($item->amount); ?>"
                                                   step="0.01"
                                                   readonly>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                             <div class="demo-inline-spacing">
                                 <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" id="add-item-btn">
                                     <span class="icon-base ti tabler-square-rounded-plus icon-22px"></span>
                                 </button>
                                 <button type="button" class="btn btn-sm btn-danger waves-effect waves-light"
                                         id="remove-item-btn">
                                     <span class="icon-base ti tabler-trash icon-22px"></span>
                                 </button>
                             </div>
                         </div>
                      </div>
                   </div>

                   <!-- Additional Information -->
                   <div class="card card-action border-top-bottom mt-5">
                      <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                         <h6 class="mb-0 text-capitalize">
                            <span class="icon-sm icon-base ti tabler-notes iconmrgn me-1"></span>
                             Additional Information
                         </h6>
                          <?php echo card_action_element(); ?>

                      </div>
                      <div class="collapse show">
                         <div class="card-body">
                            <div class="row g-6 pt-5">
                               <div class="col-md-12">
                                  <label class="form-label text-capitalize" for="notes">
                                      <?php echo e(_label('notes')); ?>

                                  </label>
                                  <textarea class="form-control"
                                            id="notes"
                                            name="notes"
                                            placeholder="Additional notes..."
                                            rows="3"><?php echo e(old('notes', $getData->notes)); ?></textarea>
                               </div>
                               <div class="col-md-12">
                                  <label class="form-label text-capitalize" for="terms">
                                      Terms & Conditions
                                  </label>
                                  <textarea class="form-control"
                                            id="terms"
                                            name="terms"
                                            placeholder="Payment terms and conditions..."
                                            rows="3"><?php echo e(old('terms', $getData->terms)); ?></textarea>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>

                   <!-- Letterhead, Signature & Stamp -->
                   <div class="card card-action border-top-bottom mt-5">
                      <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                         <h6 class="mb-0 text-capitalize">
                            <span class="icon-sm icon-base ti tabler-photo iconmrgn me-1"></span>
                             Letterhead, Signature & Stamp
                         </h6>
                          <?php echo card_action_element(); ?>

                      </div>
                      <div class="collapse show">
                         <div class="card-body">
                            <div class="row g-6 pt-5">
                               <div class="col-md-4">
                                  <label class="form-label text-capitalize" for="letterhead">
                                       <?php echo e(_label('letterhead')); ?>

                                  </label>
                                   <div class="clearfix"></div>
                                  <?php if($getData->letterhead): ?>
                                      <div class="mb-2 position-relative d-inline-block" id="letterhead-preview">
                                          <img src="<?php echo e(asset('assets/images/inv-assets/' . $getData->letterhead)); ?>"
                                               alt="Letterhead"
                                               style="width: 100px; height: 100px;">
                                          <button type="button" class="btn btn-xs btn-danger position-absolute p-1"
                                                  onclick="removeImage('letterhead')">
                                              <span class="icon-sm icon-base ti tabler-trash icon-xs"></span>
                                          </button>
                                      </div>
                                  <?php endif; ?>
                                  <input type="file"
                                         id="letterhead"
                                         name="letterhead"
                                         class="form-control"
                                         accept="image/*">
                                  <input type="hidden" name="remove_letterhead" id="remove_letterhead" value="0">
                                   <small class="text-danger mt-2">jpg, png, jpeg (max size 2mb)</small>
                               </div>
                               <div class="col-md-4">
                                  <label class="form-label text-capitalize" for="signature">
                                       <?php echo e(_label('signature')); ?>

                                  </label>
                                   <div class="clearfix"></div>
                                  <?php if($getData->signature): ?>
                                      <div class="mb-2 position-relative d-inline-block" id="signature-preview">
                                          <img src="<?php echo e(asset('assets/images/inv-assets/' . $getData->signature)); ?>"
                                               alt="Signature"
                                               style="width: 100px; height: 100px;">
                                          <button type="button" class="btn btn-sm btn-danger position-absolute p-1"
                                                  onclick="removeImage('signature')">
                                              <span class="icon-sm icon-base ti tabler-trash icon-xs"></span>
                                          </button>
                                      </div>
                                  <?php endif; ?>
                                  <input type="file"
                                         id="signature"
                                         name="signature"
                                         class="form-control"
                                         accept="image/*">
                                  <input type="hidden" name="remove_signature" id="remove_signature" value="0">
                                   <small class="text-danger mt-2">jpg, png, jpeg (max size 2mb)</small>
                               </div>
                               <div class="col-md-4">
                                  <label class="form-label text-capitalize" for="stamp">
                                       <?php echo e(_label('stamp')); ?>

                                  </label>
                                   <div class="clearfix"></div>
                                  <?php if($getData->stamp): ?>
                                      <div class="mb-2 position-relative d-inline-block" id="stamp-preview">
                                          <img src="<?php echo e(asset('assets/images/inv-assets/' . $getData->stamp)); ?>"
                                               alt="Stamp"
                                               style="width: 100px; height: 100px;">
                                          <button type="button" class="btn btn-sm btn-danger position-absolute p-1"
                                                  onclick="removeImage('stamp')">
                                              <span class="icon-sm icon-base ti tabler-trash icon-xs"></span>
                                          </button>
                                      </div>
                                  <?php endif; ?>
                                  <input type="file"
                                         id="stamp"
                                         name="stamp"
                                         class="form-control"
                                         accept="image/*">
                                  <input type="hidden" name="remove_stamp" id="remove_stamp" value="0">
                                   <small class="text-danger mt-2">jpg, png, jpeg (max size 2mb)</small>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>

             <!-- right column ===================================-->
             <!-- ================================================-->
                <div class="col-sm-12 col-xl-4">
                   <!-- Invoice Summary -->
                   <div class="card card-action border-top-bottom -sticky-top" style="-top: 100px;">
                      <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                         <h6 class="mb-0 text-capitalize">
                            <span class="icon-sm icon-base ti tabler-calculator iconmrgn me-1"></span>
                             Invoice Summary
                         </h6>
                          <?php echo card_action_element(); ?>

                      </div>
                      <div class="collapse show">
                         <div class="card-body">
                            <div class="row g-4">
                               <div class="col-12">
                                   <div class="d-flex justify-content-between align-items-center text-danger mb-3 mt-5">
                                       <small class="fs-6 fw-medium">Subtotal:</small>
                                       <strong id="subtotal-display">$<?php echo e(number_format($getData->subtotal, 2)); ?></strong>
                                   </div>
                                   <input type="hidden" name="subtotal" id="subtotal" value="<?php echo e($getData->subtotal); ?>">
                               </div>
                               <div class="col-12">
                                  <label class="form-label" for="tax_rate">Tax Rate (%)</label>
                                  <input type="number"
                                         id="tax_rate"
                                         name="tax_rate"
                                         class="form-control"
                                         value="<?php echo e(old('tax_rate', $getData->tax_rate)); ?>"
                                         step="0.01"
                                         min="0"
                                         max="100">
                                  <div class="d-flex justify-content-between align-items-center text-warning mt-2 mt-3">
                                      <small class="fw-medium">Tax Amount:</small>
                                      <strong id="tax-display">$<?php echo e(number_format($getData->tax_amount, 2)); ?></strong>
                                  </div>
                               </div>
                               <div class="col-12">
                                  <label class="form-label" for="vat_rate">VAT Rate (%)</label>
                                  <input type="number"
                                         id="vat_rate"
                                         name="vat_rate"
                                         class="form-control"
                                         value="<?php echo e(old('vat_rate', $getData->vat_rate ?? 0)); ?>"
                                         step="0.01"
                                         min="0"
                                         max="100">
                                  <div class="d-flex justify-content-between align-items-center text-warning mt-2">
                                      <small class="fw-medium">VAT Amount:</small>
                                      <strong id="vat-display">$<?php echo e(number_format($getData->vat_amount ?? 0, 2)); ?></strong>
                                  </div>
                               </div>
                               <div class="col-12">
                                  <label class="form-label" for="discount">Discount on Total Amount</label>
                                  <input type="number"
                                         id="discount"
                                         name="discount"
                                         class="form-control"
                                         value="<?php echo e(old('discount', $getData->discount)); ?>"
                                         step="0.01"
                                         min="0">
                               </div>
                                <div class="col-12">
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" id="show_tax" name="show_tax" value="1" <?php echo e(old('show_tax', $getData->show_tax) ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="show_tax">Show TAX With Total</label>
                                    </div>
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" id="show_vat" name="show_vat" value="1" <?php echo e(old('show_vat', $getData->show_vat) ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="show_vat">Show VAT With Total</label>
                                    </div>
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" id="show_discount" name="show_discount" value="1" <?php echo e(old('show_discount', $getData->show_discount) ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="show_discount"> Show Each Items Discount
                                                                                             Column </label>
                                    </div>
                                </div>
                                <hr>
                               <div class="col-12">
                                   <div class="d-flex justify-content-between align-items-center">
                                       <h5 class="fw-medium text-danger">Total:</h5>
                                       <h5 class="text-danger fw-semibold fs-4" id="total-display">
                                           $<?php echo e(number_format ($getData->total, 2)); ?>

                                       </h5>
                                   </div>
                                   <input type="hidden" name="total" id="total" value="<?php echo e($getData->total); ?>">
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>

                   <!-- Action Buttons -->
                   <div class="card card-action border-top-bottom mt-4">
                      <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                         <h6 class="mb-0 text-capitalize">
                            <span class="icon-sm icon-base ti tabler-settings iconmrgn me-1"></span>
                             Actions
                         </h6>
                          <?php echo card_action_element(); ?>

                      </div>
                      <div class="collapse show">
                         <div class="card-body">
                             <div class="row mt-5">
                                <?php echo form_action_buttons('Update Now', 'Update & New', 'Update & Stay'); ?>

                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
$(document).ready(function() {
    let itemCount = <?php echo e(count($getData->items)); ?>;

    // Get currency symbol
    function getCurrencySymbol() {
        const currency = $('#currency').val();
        const symbols = {
            'USD': '$',
            'AED': 'AED',
            'EUR': '€',
            'GBP': '£'
        };
        return symbols[currency] || '$';
    }

    // Add new item
    $('#add-item-btn').on('click', function() {
        const newItem = `
            <div class="invoice-item border p-3 mb-3 rounded" data-item="${itemCount}">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="mb-0 text-primary">Item #<span class="item-counter">${itemCount + 1}</span></h6>
                    <button type="button" class="btn btn-sm btn-danger waves-effect waves-light remove-single-item-btn">
                        <span class="icon-base ti tabler-trash icon-20px"></span>
                    </button>
                </div>
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label text-capitalize"><?php echo e(_label('item_name')); ?></label>
                        <input type="text"
                               name="items[${itemCount}][item_name]"
                               class="form-control"
                               placeholder="Item name..."
                               required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label text-capitalize"><?php echo e(_label('description')); ?></label>
                        <textarea name="items[${itemCount}][description]"
                                  id="description_${itemCount}"
                                  class="form-control editor"
                                  placeholder="Item description..."
                                  rows="2"></textarea>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label text-capitalize"><?php echo e(_label('quantity')); ?></label>
                        <input type="number"
                               name="items[${itemCount}][quantity]"
                               class="form-control item-quantity"
                               placeholder="1"
                               value="1"
                               min="1"
                               required>
                    </div>
                    <div class="col-md-3 -item-discount-col">
                        <label class="form-label text-capitalize">Discount</label>
                        <input type="number"
                               name="items[${itemCount}][discount]"
                               class="form-control item-discount"
                               placeholder="0.00"
                               value="0"
                               step="0.01"
                               min="0">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label text-capitalize"><?php echo e(_label('unit_price')); ?></label>
                        <input type="number"
                               name="items[${itemCount}][unit_price]"
                               class="form-control item-price"
                               placeholder="0.00"
                               step="0.01"
                               min="0"
                               required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label text-capitalize"><?php echo e(_label('amount')); ?></label>
                        <input type="number"
                               class="form-control item-amount"
                               placeholder="0.00"
                               step="0.01"
                               readonly>
                    </div>
                </div>
            </div>
        `;
        $('#invoice-items-container').append(newItem);

        // Initialize TinyMCE for the new textarea
        tinymce.init({
            selector: '#description_' + itemCount,
            license_key: 'gpl',
            plugins: 'code lists link wordcount',
            toolbar: 'fontsize | bold italic forecolor | numlist bullist | link | code',
            menubar: false,
            branding: false,
            toolbar_mode: 'wrap',
            font_size_formats: '8px 10px 12px 14px 16px 18px 20px 24px 28px 32px 36px',
            height: 200,
            resize: false,
            content_style: "body { overflow-y: auto; }"
        });

        itemCount++;
        toggleDiscountColumn();
    });

    // Remove last item
    $('#remove-item-btn').on('click', function() {
        const items = $('.invoice-item');
        if (items.length > 1) {
            const lastItem = items.last();
            const textarea = lastItem.find('textarea.editor');

            // Destroy TinyMCE instance if exists
            if (textarea.length && textarea.attr('id')) {
                const editorId = textarea.attr('id');
                if (tinymce.get(editorId)) {
                    tinymce.get(editorId).remove();
                }
            }

            lastItem.remove();
            updateItemCounters();
            calculateTotals();
        } else {
            alert('At least one item is required');
        }
    });

    // Remove specific item (delegated event)
    $(document).on('click', '.remove-single-item-btn', function() {
        const items = $('.invoice-item');
        if (items.length > 1) {
            const itemToRemove = $(this).closest('.invoice-item');
            const textarea = itemToRemove.find('textarea.editor');

            // Destroy TinyMCE instance if exists
            if (textarea.length && textarea.attr('id')) {
                const editorId = textarea.attr('id');
                if (tinymce.get(editorId)) {
                    tinymce.get(editorId).remove();
                }
            }

            itemToRemove.remove();
            updateItemCounters();
            calculateTotals();
        } else {
            alert('At least one item is required');
        }
    });

    // Update item counters
    function updateItemCounters() {
        $('.invoice-item').each(function(index) {
            $(this).find('.item-counter').text(index + 1);
        });
    }

    // Toggle discount column visibility
    function toggleDiscountColumn() {
        const showDiscount = $('#show_discount').is(':checked');
        if (showDiscount) {
            $('.item-discount-col').show();
        } else {
            $('.item-discount-col').hide();
        }
    }

    $('#show_discount').on('change', function() {
        toggleDiscountColumn();
    });

    // Calculate item amount
    $(document).on('input', '.item-quantity, .item-price, .item-discount', function() {
        const row = $(this).closest('.invoice-item');
        const quantity = parseFloat(row.find('.item-quantity').val()) || 0;
        const price = parseFloat(row.find('.item-price').val()) || 0;
        const discount = parseFloat(row.find('.item-discount').val()) || 0;
        const amount = (quantity * price) - discount;
        row.find('.item-amount').val(amount.toFixed(2));
        calculateTotals();
    });

    // Calculate totals
    $(document).on('input', '#tax_rate, #vat_rate, #discount, #currency', function() {
        calculateTotals();
    });

    function calculateTotals() {
        let subtotal = 0;
        $('.item-amount').each(function() {
            subtotal += parseFloat($(this).val()) || 0;
        });

        const taxRate = parseFloat($('#tax_rate').val()) || 0;
        const vatRate = parseFloat($('#vat_rate').val()) || 0;
        const discount = parseFloat($('#discount').val()) || 0;

        const taxAmount = (subtotal * taxRate) / 100;
        const vatAmount = (subtotal * vatRate) / 100;
        const total = subtotal + taxAmount + vatAmount - discount;

        const symbol = getCurrencySymbol();

        $('#subtotal').val(subtotal.toFixed(2));
        $('#subtotal-display').text(symbol + ' ' + subtotal.toFixed(2));
        $('#tax-display').text(symbol + ' ' + taxAmount.toFixed(2));
        $('#vat-display').text(symbol + ' ' + vatAmount.toFixed(2));
        $('#total').val(total.toFixed(2));
        $('#total-display').text(symbol + ' ' + total.toFixed(2));
    }

    // Sync TinyMCE content before form submission
    $('form').on('submit', function(e) {
        tinymce.triggerSave();
    });

    // Initialize
    toggleDiscountColumn();
    calculateTotals();
});

// Remove image function
function removeImage(type) {
    if (confirm('Are you sure you want to remove this image?')) {
        // Hide the preview immediately
        $('#' + type + '-preview').fadeOut(300, function() {
            $(this).remove();
        });
        // Set the hidden field to mark for deletion
        $('#remove_' + type).val('1');
        // Clear the file input
        $('#' + type).val('');
    }
}
</script>
<script src="<?php echo e(asset('assets/backend/js/cleave-zen.js')); ?>"></script>
<script src="<?php echo e(asset('assets/backend/js/moment.js')); ?>"></script>
<script src="<?php echo e(asset('assets/backend/js/flatpickr.js')); ?>"></script>
<script src="<?php echo e(asset('assets/backend/js/select2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/backend/js/form-layouts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/backend/js/form-validation.js')); ?>"></script>
<script src="<?php echo e(asset('assets/backend/js/tinymce/tinymce.min.js')); ?>"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        tinymce.init({
            selector: '.editor',
            license_key: 'gpl', // Required for free version
            plugins: 'code lists link wordcount',
            toolbar: 'fontsize | bold italic forecolor | numlist bullist | link | code',
            menubar: false,
            branding: false,
            toolbar_mode: 'wrap',
            font_size_formats: '8px 10px 12px 14px 16px 18px 20px 24px 28px 32px 36px',

            // 👇 Fixed editor height
            height: 200, // You can set any px value (e.g., 300, 500, etc.)

            // Optional: prevent resizing by user
            resize: false,

            // Optional: add scrollbars if content exceeds height
            content_style: "body { overflow-y: auto; }"
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/invoices/edit.blade.php ENDPATH**/ ?>