@extends('backend.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-6">
                <div class="col-sm-12 col-md-10 offset-md-1 mt-3">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex flex-column justify-content-center">
                            {!! heading_breadcrumbs('Customer Invoice Details') !!}
                        </div>
                        {{-- all buttons --}}
                        <div class="card-header-elements ms-auto d-flex align-content-between">
                            <a href="{{route($module.'.edit', $getData->id)}}" class="btn btn-sm btn-primary waves-effect waves-light d-lg-block d-none d-flex"
                               data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                <span class="icon-base ti tabler-edit icon-sm me-2"></span>Edit</a>
                            <a href="{{route($module.'.edit', $getData->id)}}" class="btn btn-icon btn-primary waves-effect d-flex d-lg-none d-sm-block d-flex"
                               data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit">
                                <span class="icon-base ti tabler-edit icon-22px"></span> </a>
                            <a href="{{route($module)}}" class="btn btn-sm btn-dark waves-effect waves-light d-lg-block d-none d-flex"
                               data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Go Back">
                                <span class="icon-base ti tabler-arrow-back-up-double icon-22px me-2"></span>Go Back</a>
                            <a href="{{route($module)}}" class="btn btn-icon btn-dark waves-effect d-flex d-lg-none d-sm-block d-flex"
                               data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Go Back">
                                <span class="icon-base ti tabler-arrow-back-up-double icon-22px"></span> </a>
                            <div style="display: flex !important;">
                                {{--<button type="submit" onclick="window.print()" class="btn btn-sm btn-info waves-effect waves-light d-lg-block d-none d-flex me-2" name="submitBtn" value="default">
                                    <span class="icon-base ti tabler-printer icon-20px me-2"></span>Print
                                </button>
                                <button type="button" onclick="window.print()" class="btn btn-icon btn-info waves-effect waves-light d-lg-none d-sm-block d-flex me-2" name="submitBtn" value="default">
                                    <span class="icon-base ti tabler-printer icon-20px"></span>
                                </button>--}}
                                {{-- PDF Buttons --}}
                                <a href="{{route($module.'.download-pdf', $getData->id)}}"
                                   class="btn btn-sm btn-danger waves-effect d-lg-block d-none d-flex">
                                    <span class="icon-base ti tabler-file-type-pdf icon-20px me-2"></span>PDF</a>
                                <a href="{{route($module.'.download-pdf', $getData->id)}}"
                                   class="btn btn-sm btn-icon btn-danger waves-effect d-lg-none d-sm-block d-flex">
                                    <span class="icon-base ti tabler-file-type-pdf icon-20px"></span> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- invoice Card -->
            <div class="row">
                <div class="col-sm-12 col-md-10 offset-md-1">
                    <div class="card mb-6" style="@if($getData->letterhead)background-image: url('{{ asset
                        ('assets/images/inv-assets/' . $getData->letterhead) }}'); background-size: cover; background-position:
                        center top; background-repeat: no-repeat;@endif">
                        <div class="card-body">
                            <!-- Client Information -->
                            <div class="row mb-5" style="margin-top: 250px;">
                                <div class="col-md-12 mb-10">
                                    @php
                                        $invoiceTypeTitle = $getData->invoice_type === 'purchase' ? 'PURCHASE invoice' : 'SALES invoice';
                                    @endphp
                                    <h3 class="text-center fw-semibold">{{ $invoiceTypeTitle }}</h3>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="fw-bold">invoice To</h5>
                                    <p class="mb-1"><strong> {{ $getData->client_name }}</strong></p>
                                    @if($getData->client_email)
                                        <p class="mb-1"><strong>Emai:</strong> {{ $getData->client_email }}</p>
                                    @endif
                                    @if($getData->client_phone)
                                        <p class="mb-1"><strong>Phone #:</strong> {{ $getData->client_phone }}</p>
                                    @endif
                                    @if($getData->client_address)
                                        <p class="mb-0"><strong>Address:</strong> {{ $getData->client_address }}</p>
                                    @endif
                                </div>
                                <div class="col-md-6 d-flex justify-content-end">
                                    <div>
                                        <h5 class="fw-bold">invoice Info:</h5>
                                        <p class="mb-1"><strong>invoice #:</strong> {{ $getData->invoice_number }}</p>
                                        <p class="mb-1">
                                            <strong>Date:</strong> {{ $getData->invoice_date->format('M d, Y') }}
                                        </p>
                                        <p class="mb-1"><strong>Due
                                                                Date:</strong> {{ $getData->due_date->format('M d, Y') }}
                                        </p>
                                        <p class="mb-1"><strong>Payment Status:</strong>
                                            {{ ucwords($getData->payment_status) }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Customer Invoice Items -->
                            <div class="table-responsive mb-4 mt-10">
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                    <tr>
                                        <th width="5%" class="text-center">#</th>
                                        <th width="30%">Description</th>
                                        <th width="5%" class="text-center">Qty</th>
                                        @if($getData->show_discount)
                                            <th width="13%" class="text-center">Discount</th>
                                        @endif
                                        <th width="15%" class="text-center">Unit Price</th>
                                        <th width="20%" class="text-center">Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $currencySymbols = ['USD' => '$', 'AED' => 'AED', 'EUR' => '€', 'GBP' => '£'];
                                        $currencySymbol = $currencySymbols[$getData->currency] ?? '$';
                                    @endphp
                                    @foreach($getData->items as $index => $item)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>
                                                <strong> {!! $item->item_name !!}</strong>
                                                <p>{!! $item->description !!}</p>
                                            </td>
                                            <td class="text-center">{{ $item->quantity }}</td>
                                            @if($getData->show_discount)
                                                <td class="text-center">{{ $currencySymbol }} {{ number_format($item->discount ?? 0, 2) }}</td>
                                            @endif
                                            <td class="text-center">{{ $currencySymbol }} {{ number_format($item->unit_price, 2) }}</td>
                                            <td class="text-center">
                                                <strong>{{ $currencySymbol }} {{ number_format($item->amount, 2) }}</strong>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Customer Invoice Summary -->
                            <div class="row mt-10">
                                {{-- note + terms and conditions --}}
                                <div class="col-md-6">
                                    @if($getData->notes)
                                        <div class="mb-4">
                                            <h6 class="mb-2">Notes:</h6>
                                            <p class="text-muted">{{ $getData->notes }}</p>
                                        </div>
                                    @endif
                                    @if($getData->terms)
                                        <div class="mb-4">
                                            <h6 class="mb-2">Terms & Conditions:</h6>
                                            <p class="text-muted">{{ $getData->terms }}</p>
                                        </div>
                                    @endif
                                </div>
                                {{-- amount summery --}}
                                <div class="col-md-6">
                                    <div class="rounded" style="background-color: rgba(255,255,255,0.5)">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-2">
                                                <span>Subtotal:</span>
                                                <span>{{ $currencySymbol }} {{ number_format($getData->subtotal, 2) }}</span>
                                            </div>
                                            @if($getData->show_tax)
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span>Tax ({{ $getData->tax_rate }}%):</span>
                                                    <span>{{ $currencySymbol }} {{ number_format($getData->tax_amount, 2) }}</span>
                                                </div>
                                            @endif
                                            @if($getData->show_vat)
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span>VAT ({{ $getData->vat_rate }}%):</span>
                                                    <span>{{ $currencySymbol }} {{ number_format($getData->vat_amount, 2) }}</span>
                                                </div>
                                            @endif
                                            @if($getData->discount > 0)
                                                <div class="d-flex justify-content-between mb-2">
                                                    <span>Discount:</span>
                                                    <span class="text-danger">-{{ $currencySymbol }} {{ number_format($getData->discount, 2) }}</span>
                                                </div>
                                            @endif
                                            <hr class="border-dark">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="mb-0">Total:</h5>
                                                <h5 class="mb-0 text-primary fw-semibold">
                                                    {{ $currencySymbol }} {{ number_format ($getData->total, 2) }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-top: 150px;"></div>
                                {{-- signature --}}
                                <div class="col-md-6">
                                    @if($getData->signature)
                                        <h6 class="mb-2">Authorize Signature</h6>
                                        <img src="{{ asset('assets/images/inv-assets/' . $getData->signature) }}"
                                             alt="Signature"
                                             style="max-width: 150px; max-height: 80px;">
                                    @endif
                                </div>
                                {{-- stamp --}}
                                <div class="col-md-6 d-flex justify-content-end">
                                    @if($getData->stamp)
                                        <div>
                                            <h6 class="mb-2">Authorize Stamp</h6>
                                            <img src="{{ asset('assets/images/inv-assets/' . $getData->stamp) }}"
                                                 alt="Stamp"
                                                 style="max-width: 150px; max-height: 80px;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div style="margin-bottom: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
    </div>
@endsection
@push('style')
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
@endpush


