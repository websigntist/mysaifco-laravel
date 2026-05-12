@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 mt-3 -container-p-y">
          <form action="{{route('invoices.store')}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
              @csrf
             <div class="row gy-6">
                 <div class="col-sm-12">
                     <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                         <div class="d-flex flex-column justify-content-center">
                             {!! heading_breadcrumbs('Add New '. $title, $title.' form') !!}
                         </div>
                         <div class="card-header-elements ms-auto d-flex align-content-between">
                             {!! goBack($module) !!}
                         </div>
                     </div>
                 </div>
             </div>

              {{-- Display Validation Errors --}}
              @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <h5 class="alert-heading mb-2">Validation Errors:</h5>
                      <ul class="mb-0">
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              @endif

              <div class="row mb-6 gy-6">
             <!-- left column ===================================-->
             <!-- ===============================================-->
                <div class="col-sm-12 col-xl-8">
                   <!-- Customer Invoice Information -->
                   <div class="card card-action border-top-bottom">
                      <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                          <h6 class="mb-0 text-capitalize">
                              <span class="icon-sm icon-base ti tabler-apps iconmrgn me-1"></span>
                               Fill Out The {{ucfirst($title)}} Details
                           </h6>
                          {!! card_action_element() !!}
                      </div>
                      <div class="collapse show">
                         <div class="card-body">
                            <div class="row g-6 pt-5">
                               <div class="col-md-4">
                                  <label class="form-label text-capitalize" for="invoice_type">
                                      <span>invoice Type</span>
                                  </label>
                                  <select class="form-select select2" id="invoice_type" name="invoice_type" required>
                                      <option value="">Select Type</option>
                                      @foreach($invoiceTypes as $key => $type)
                                          <option value="{{$key}}" {{ old('invoice_type', 'sales') == $key ? 'selected' : '' }}>
                                              {{$type}}
                                          </option>
                                      @endforeach
                                  </select>
                                   {!! error_label('invoice_type') !!}
                               </div>
                               <div class="col-md-4">
                                  <label class="form-label text-capitalize" for="invoice_number">
                                      <span>{{_label('invoice_number')}}</span>
                                  </label>
                                  <input type="text"
                                         id="invoice_number"
                                         name="invoice_number"
                                         value="{{ old('invoice_number', $invoiceNumber) }}"
                                         class="form-control"
                                         placeholder="invoice Number..."
                                         readonly
                                         required>
                                   {!! error_label('invoice_number') !!}
                               </div>
                               <div class="col-md-4">
                                  <label class="form-label text-capitalize" for="status">
                                      <span>{{_label('invoice_status')}}</span>
                                  </label>
                                  <select class="form-select select2" id="status" name="status" required>
                                      <option value="">Select Status</option>
                                      @foreach($getStatus as $status)
                                          <option value="{{$status}}" {{ old('status') == $status ? 'selected' : '' }}>
                                              {{ucfirst($status)}}
                                          </option>
                                      @endforeach
                                  </select>
                                   {!! error_label('status') !!}
                               </div>
                               <div class="col-md-4">
                                  <label class="form-label text-capitalize" for="payment_status">
                                      <span>Payment Status</span>
                                  </label>
                                  <select class="form-select select2" id="payment_status" name="payment_status" required>
                                      <option value="">Select Payment Status</option>
                                      @foreach($paymentStatus as $pStatus)
                                          <option value="{{$pStatus}}" {{ old('payment_status', 'Paid') == $pStatus ? 'selected' : '' }}>
                                              {{$pStatus}}
                                          </option>
                                      @endforeach
                                  </select>
                                   {!! error_label('payment_status') !!}
                               </div>
                               <div class="col-md-4">
                                  <label class="form-label text-capitalize" for="currency">
                                      <span>Currency</span>
                                  </label>
                                  <select class="form-select select2" id="currency" name="currency" required>
                                      <option value="">Select Currency</option>
                                      @foreach($currencies as $code => $symbol)
                                          <option value="{{$code}}" {{ old('currency', 'AED') == $code ? 'selected' : '' }}>
                                              {{$code}} ({{$symbol}})
                                          </option>
                                      @endforeach
                                  </select>
                                   {!! error_label('currency') !!}
                               </div>
                               <div class="col-md-4">
                                  <label class="form-label text-capitalize" for="invoice_date">
                                      <span>{{_label('invoice_date')}}</span>
                                  </label>
                                  <input type="date"
                                         id="invoice_date"
                                         name="invoice_date"
                                         value="{{ old('invoice_date', date('Y-m-d')) }}"
                                         class="form-control dob-picker"
                                         placeholder="YYYY-MM-DD"
                                         required>
                                   {!! error_label('invoice_date') !!}
                               </div>
                               <div class="col-md-4">
                                  <label class="form-label text-capitalize" for="due_date">
                                      <span>{{_label('due_date')}}</span>
                                  </label>
                                  <input type="date"
                                         id="due_date"
                                         name="due_date"
                                         value="{{ old('due_date') }}"
                                         class="form-control dob-picker"
                                         placeholder="YYYY-MM-DD"
                                         required>
                                   {!! error_label('due_date') !!}
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
                          {!! card_action_element() !!}
                      </div>
                      <div class="collapse show">
                         <div class="card-body">
                            <div class="row g-6 pt-5">
                               <div class="col-md-12">
                                  <label class="form-label text-capitalize" for="client_name">
                                      <span>{{_label('client_name')}}</span>
                                  </label>
                                  <input type="text"
                                         id="client_name"
                                         name="client_name"
                                         value="{{ old('client_name') }}"
                                         class="form-control"
                                         placeholder="Enter client name..."
                                         required>
                                   {!! error_label('client_name') !!}
                               </div>
                               <div class="col-md-6">
                                  <label class="form-label text-capitalize" for="client_email">
                                      <span>{{_label('client_email')}}</span>
                                  </label>
                                  <input type="email"
                                         id="client_email"
                                         name="client_email"
                                         value="{{ old('client_email') }}"
                                         class="form-control"
                                         placeholder="client@example.com">
                                   {!! error_label('client_email') !!}
                               </div>
                               <div class="col-md-6">
                                  <label class="form-label text-capitalize" for="client_phone">
                                      <span>Client Phone</span>
                                  </label>
                                  <input type="text"
                                         id="client_phone"
                                         name="client_phone"
                                         value="{{ old('client_phone') }}"
                                         class="form-control"
                                         placeholder="+1 234 567 8900">
                                   {!! error_label('client_phone') !!}
                               </div>
                               <div class="col-md-12">
                                  <label class="form-label text-capitalize" for="client_address">
                                      {{_label('client_address')}}
                                  </label>
                                  <textarea class="form-control"
                                            id="-editor"
                                            name="client_address"
                                            placeholder="Enter client address..."
                                            rows="3">{{ old('client_address') }}</textarea>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>

                   <!-- Customer Invoice Items -->
                   <div class="card card-action border-top-bottom mt-5">
                      <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                         <h6 class="mb-0 text-capitalize">
                            <span class="icon-sm icon-base ti tabler-list iconmrgn me-1"></span>
                             Customer Invoice Items
                         </h6>
                          {!! card_action_element() !!}
                      </div>
                      <div class="collapse show">
                         <div class="card-body">
                            <div id="invoice-items-container">
                                <div class="invoice-item border p-3 mb-3 rounded" data-item="0">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="mb-0 text-primary">Item #<span class="item-counter">1</span></h6>
                                        <button type="button" class="btn btn-sm btn-danger waves-effect waves-light remove-single-item-btn">
                                            <span class="icon-base ti tabler-trash icon-20px"></span>
                                        </button>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize">{{_label('item_name')}}</label>
                                            <input type="text"
                                                   name="items[0][item_name]"
                                                   class="form-control"
                                                   placeholder="Item name..."
                                                   required>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize">{{_label('description')}}</label>
                                            <textarea name="items[0][description]"
                                                      id="description_0"
                                                      class="form-control editor"
                                                      placeholder="Item description..."></textarea>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label text-capitalize">{{_label('quantity')}}</label>
                                            <input type="number"
                                                   name="items[0][quantity]"
                                                   class="form-control item-quantity"
                                                   placeholder="1"
                                                   value="1"
                                                   min="1"
                                                   required>
                                        </div>
                                        <div class="col-md-3 -item-discount-col">
                                            <label class="form-label text-capitalize">Discount</label>
                                            <input type="number"
                                                   name="items[0][discount]"
                                                   class="form-control item-discount"
                                                   placeholder="0.00"
                                                   value="0"
                                                   step="0.01"
                                                   min="0">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label text-capitalize">{{_label('unit_price')}}</label>
                                            <input type="number"
                                                   name="items[0][unit_price]"
                                                   class="form-control item-price"
                                                   placeholder="0.00"
                                                   step="0.01"
                                                   min="0"
                                                   required>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label text-capitalize">{{_label('amount')}}</label>
                                            <input type="number"
                                                   class="form-control item-amount"
                                                   placeholder="0.00"
                                                   step="0.01"
                                                   readonly>
                                        </div>
                                    </div>
                                </div>
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
                          {!! card_action_element() !!}
                      </div>
                      <div class="collapse show">
                         <div class="card-body">
                            <div class="row g-6 pt-5">
                               <div class="col-md-12">
                                  <label class="form-label text-capitalize" for="notes">
                                      Notes
                                  </label>
                                  <textarea class="form-control"
                                            id="-editor"
                                            name="notes"
                                            placeholder="Additional notes..."
                                            rows="3">{{ old('notes') }}</textarea>
                               </div>
                               <div class="col-md-12">
                                  <label class="form-label text-capitalize" for="terms">
                                      Terms & Conditions
                                  </label>
                                  <textarea class="form-control"
                                            id="-editor"
                                            name="terms"
                                            placeholder="Payment terms and conditions..."
                                            rows="3">{{ old('terms') }}</textarea>
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
                          {!! card_action_element() !!}
                      </div>
                      <div class="collapse show">
                         <div class="card-body">
                            <div class="row g-6 pt-5">
                               <div class="col-md-4">
                                  <label class="form-label text-capitalize" for="letterhead">
                                      Letterhead
                                  </label>
                                  <input type="file"
                                         id="letterhead"
                                         name="letterhead"
                                         class="form-control"
                                         accept="image/*">
                                   <small class="text-danger mt-2">jpg, png, jpeg (max size 2mb)</small>
                               </div>
                               <div class="col-md-4">
                                  <label class="form-label text-capitalize" for="signature">
                                      Signature
                                  </label>
                                  <input type="file"
                                         id="signature"
                                         name="signature"
                                         class="form-control"
                                         accept="image/*">
                                   <small class="text-danger mt-2">jpg, png, jpeg (max size 2mb)</small>
                               </div>
                               <div class="col-md-4">
                                  <label class="form-label text-capitalize" for="stamp">
                                      Stamp
                                  </label>
                                  <input type="file"
                                         id="stamp"
                                         name="stamp"
                                         class="form-control"
                                         accept="image/*">
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
                   <!-- Customer Invoice Summary -->
                   <div class="card card-action border-top-bottom -sticky-top" style="-top: 100px;">
                      <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                         <h6 class="mb-0 text-capitalize">
                            <span class="icon-sm icon-base ti tabler-calculator iconmrgn me-1"></span>
                             Customer Invoice Summary
                         </h6>
                          {!! card_action_element() !!}
                      </div>
                      <div class="collapse show">
                         <div class="card-body">
                            <div class="row g-4">
                               <div class="col-12">
                                   <div class="d-flex justify-content-between align-items-center text-danger mb-3 mt-5">
                                       <small class="fs-6 fw-medium">Subtotal:</small>
                                       <strong id="subtotal-display">$0.00</strong>
                                   </div>
                                   <input type="hidden" name="subtotal" id="subtotal" value="0">
                               </div>
                               <div class="col-12">
                                  <label class="form-label" for="tax_rate">Tax Rate (%)</label>
                                  <input type="number"
                                         id="tax_rate"
                                         name="tax_rate"
                                         class="form-control"
                                         value="{{ old('tax_rate', 0) }}"
                                         step="0.01"
                                         min="0"
                                         max="100">
                                  <div class="d-flex justify-content-between align-items-center text-warning mt-2">
                                      <small class="fw-medium">Tax Amount:</small>
                                      <strong id="tax-display">$0.00</strong>
                                  </div>
                               </div>
                               <div class="col-12">
                                  <label class="form-label" for="vat_rate">VAT Rate (%)</label>
                                  <input type="number"
                                         id="vat_rate"
                                         name="vat_rate"
                                         class="form-control"
                                         value="{{ old('vat_rate', 0) }}"
                                         step="0.01"
                                         min="0"
                                         max="100">
                                  <div class="d-flex justify-content-between align-items-center text-warning mt-2">
                                      <small class="fw-medium">VAT Amount:</small>
                                      <strong id="vat-display">$0.00</strong>
                                  </div>
                               </div>
                               <div class="col-12">
                                  <label class="form-label text-capitalize" for="discount">Discount on Total Amount</label>
                                  <input type="number"
                                         id="discount"
                                         name="discount"
                                         class="form-control"
                                         value="{{ old('discount', 0) }}"
                                         step="0.01"
                                         min="0">
                               </div>
                                <div class="col-12">
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" id="show_tax" name="show_tax" value="1" checked>
                                        <label class="form-check-label" for="show_tax">Show TAX With Total</label>
                                    </div>
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" id="show_vat" name="show_vat" value="1" checked>
                                        <label class="form-check-label" for="show_vat">Show VAT With Total</label>
                                    </div>
                                    <div class="form-check form-switch mb-2">
                                        <input class="form-check-input" type="checkbox" id="show_discount" name="show_discount" value="1" checked>
                                        <label class="form-check-label" for="show_discount"> Show Each Items Discount
                                                                                             Column </label>
                                    </div>
                                </div>
                                <hr>
                               <div class="col-12">
                                   <div class="d-flex justify-content-between align-items-center">
                                       <h5 class="fw-medium text-danger">Total:</h5>
                                       <h5 class="text-danger fw-semibold fs-4" id="total-display">$0.00</h5>
                                   </div>
                                   <input type="hidden" name="total" id="total" value="0">
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
                          {!! card_action_element() !!}
                      </div>
                      <div class="collapse show">
                         <div class="card-body">
                             <div class="row mt-5">
                               {!! form_action_buttons('Submit Now', 'Save & New', 'Save & Stay') !!}
                           </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </form>
    </div>
@endsection

@push('script')
<script>
$(document).ready(function() {
    let itemCount = 0;

    // Update invoice number when invoice type changes
    $('#invoice_type').on('change', function() {
        const invoiceType = $(this).val();
        if (invoiceType) {
            // Make AJAX call to get new invoice number
            $.ajax({
                url: '{{ route("invoices.create") }}',
                type: 'GET',
                data: { ajax: 1, invoice_type: invoiceType },
                success: function(response) {
                    // If we get HTML back, extract the invoice number
                    if (typeof response === 'string') {
                        // Generate the number based on type in frontend
                        const prefix = invoiceType === 'purchase' ? 'PURCHAS-INV-' : 'SALES-INV-';
                        // Get current number and increment or use 1001 as base
                        const currentNumber = $('#invoice_number').val();
                        let newNumber = 1001;

                        // Try to extract number from current if it matches pattern
                        if (currentNumber) {
                            const match = currentNumber.match(/-INV-(\d+)$/);
                            if (match) {
                                newNumber = parseInt(match[1]);
                            }
                        }

                        $('#invoice_number').val(prefix + newNumber);
                    }
                },
                error: function() {
                    // Fallback: update locally
                    const prefix = invoiceType === 'purchase' ? 'PURCHAS-INV-' : 'SALES-INV-';
                    const currentNumber = $('#invoice_number').val();
                    let baseNumber = 1001;

                    if (currentNumber) {
                        const match = currentNumber.match(/-INV-(\d+)$/);
                        if (match) {
                            baseNumber = parseInt(match[1]);
                        }
                    }

                    $('#invoice_number').val(prefix + baseNumber);
                }
            });
        }
    });

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
        itemCount++;
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
                        <label class="form-label text-capitalize">Item Name</label>
                        <input type="text"
                               name="items[${itemCount}][item_name]"
                               class="form-control"
                               placeholder="Item name..."
                               required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label text-capitalize">Description</label>
                        <textarea name="items[${itemCount}][description]"
                                  id="description_${itemCount}"
                                  class="form-control editor"
                                  placeholder="Item description..."
                                  rows="2"></textarea>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label text-capitalize">Quantity</label>
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
                        <label class="form-label text-capitalize">Unit Price</label>
                        <input type="number"
                               name="items[${itemCount}][unit_price]"
                               class="form-control item-price"
                               placeholder="0.00"
                               step="0.01"
                               min="0"
                               required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label text-capitalize">Amount</label>
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
        // Trigger TinyMCE save
        if (typeof tinymce !== 'undefined') {
            tinymce.triggerSave();
        }
    });

    // Initialize
    toggleDiscountColumn();
    calculateTotals();
});
</script>
<script src="{{ asset('assets/backend/js/cleave-zen.js') }}"></script>
<script src="{{ asset('assets/backend/js/moment.js') }}"></script>
<script src="{{ asset('assets/backend/js/flatpickr.js') }}"></script>
<script src="{{ asset('assets/backend/js/select2.js') }}"></script>
<script src="{{ asset('assets/backend/js/form-layouts.js') }}"></script>
<script src="{{ asset('assets/backend/js/form-validation.js') }}"></script>
<script src="{{ asset('assets/backend/js/tinymce/tinymce.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        tinymce.init({
            selector: '#description_0',
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
@endpush


