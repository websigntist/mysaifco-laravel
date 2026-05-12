<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>invoice {{ $getData->invoice_number }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: #333;
            line-height: 1.4;
            @if($getData->letterhead)
            background-image: url('{{ getPublicAssetPath('assets/images/inv-assets/' . $getData->letterhead) }}');
            background-size: cover;
            background-position: center top;
            background-repeat: no-repeat;
            @endif
        }
        .container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 50px;
        }
        .invoice-info {
            display: table;
            width: 100%;
            margin-top: 30px;
            margin-bottom: 30px;
        }
        .invoice-info-left, .invoice-info-right {
            display: table-cell;
            width: 50%;
            vertical-align: top;
        }
        .invoice-info-right {
            text-align: right;
        }
        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 2px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-draft { background-color: #95a5a6; color: white; }
        .status-sent { background-color: #3498db; color: white; }
        .status-paid { background-color: #27ae60; color: white; }
        .status-overdue { background-color: #e74c3c; color: white; }
        .status-cancelled { background-color: #f39c12; color: white; }

        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #000;
            margin-bottom: 10px;
            padding-bottom: 5px;
        }
        .header h2{
            font-family: 'Arial Black', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: rgba(255,255,255,0.40);
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }
        th {
            color:            #333;
            font-weight:      bold;
            background-color: #e8e8e8;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .summary-table {
            width: 300px;
            margin-left: auto;
            margin-top: 0;
        }
        .summary-table td {
            padding: 2px 4px;
            border: none;
        }
        .summary-table .total-row {
            font-size: 16px;
            font-weight: bold;
            padding-top: 20px;
            border-top: 1px solid #999;
        }

        .footer {
            margin-top: 60px;
            display: table;
            width: 100%;
        }
        .footer-item {
            display: table-cell;
            width: 50%;
            text-align: center;
        }
        .footer-item img {
            max-width: 150px;
            max-height: 80px;
        }
        .discount{
            color: #ff0000;
            padding: 10px 0 !important;
            margin: 10px 0 !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header text-center" style="margin-top: 150px;">
            @php
                $invoiceTypeTitle = $getData->invoice_type === 'purchase' ? 'PURCHASE invoice' : 'SALES invoice';
            @endphp
            <h2>{{ $invoiceTypeTitle }}</h2>
        </div>

        <!-- invoice Info -->
        <div class="invoice-info">
            <div class="invoice-info-left">
                <div class="section-title">invoice To:</div>
                <strong>{{ $getData->client_name }}</strong><br>
                @if($getData->client_phone)
                    <strong>Phone:</strong> {{ $getData->client_phone }}<br>
                @endif
                @if($getData->client_email)
                    <strong>Email:</strong> {{ $getData->client_email }}<br>
                @endif
                @if($getData->client_address)
                    <strong>Address:</strong> {{ $getData->client_address }}
                @endif
            </div>
            <div class="invoice-info-right">
                <div class="section-title">invoice Info:</div>
                <strong>invoice #:</strong> {{ $getData->invoice_number }}<br>
                <strong>invoice Date:</strong> {{ $getData->invoice_date->format('M d, Y') }}<br>
                <strong>Due Date:</strong> {{ $getData->due_date->format('M d, Y') }}<br>
                <strong>Payment Status:</strong> {{ strtoupper($getData->payment_status)}}<br>
            </div>
        </div>

        <!-- Customer Invoice Items -->
        <div class="section">
            <table>
                <thead>
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
                    @foreach($getData->items as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>
                            <strong> {!! $item->item_name !!}</strong>
                            <div style="margin-left: 15px">{!! $item->description !!}</div>
                        </td>
                        <td class="text-center">{{ $item->quantity }}</td>
                        @if($getData->show_discount)
                        <td class="text-center">{{ $currencySymbol }} {{ number_format($item->discount ?? 0, 2) }}</td>
                        @endif
                        <td class="text-center">{{ $currencySymbol }} {{ number_format($item->unit_price, 2) }}</td>
                        <td class="text-center"><strong>{{ $currencySymbol }} {{ number_format($item->amount, 2) }}</strong></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{--===========================--}}
        <div class="invoice-info">
            <div class="invoice-info-left" style="margin-top: 50px">
                <!-- Notes and Terms -->
                @if($getData->notes || $getData->terms)
                    <div class="notes-section">
                        @if($getData->notes)
                            <div style="margin-bottom: 15px;">
                                <strong>Notes:</strong><br>
                                {{ $getData->notes }}
                            </div>
                        @endif
                        @if($getData->terms)
                            <div>
                                <strong>Terms & Conditions:</strong><br>
                                {{ $getData->terms }}
                            </div>
                        @endif
                    </div>
                @endif
            </div>
            <div class="invoice-info-right">
                <!-- Summary -->
                <table class="summary-table">
                    <tr>
                        <td><strong>Subtotal:</strong></td>
                        <td class="text-right">{{ $currencySymbol }} {{ number_format($getData->subtotal, 2) }}</td>
                    </tr>
                    @if($getData->show_tax)
                        <tr>
                            <td>Tax ({{ $getData->tax_rate }}%):</td>
                            <td class="text-right">{{ $currencySymbol }} {{ number_format($getData->tax_amount, 2) }}</td>
                        </tr>
                    @endif
                    @if($getData->show_vat)
                        <tr>
                            <td>VAT ({{ $getData->vat_rate }}%):</td>
                            <td class="text-right">{{ $currencySymbol }} {{ number_format($getData->vat_amount, 2) }}</td>
                        </tr>
                    @endif
                    @if($getData->discount > 0)
                        <tr class="discount">
                            <td>Discount:</td>
                            <td class="text-right">
                                -{{ $currencySymbol }} {{ number_format($getData->discount, 2) }}
                            </td>
                        </tr>
                    @endif
                    <tr class="total-row">
                        <td>Total:</td>
                        <td class="text-right">{{ $currencySymbol }} {{ number_format($getData->total, 2) }}</td>
                    </tr>
                </table>
            </div>
        </div>
        {{--===========================--}}

        <!-- Signature and Stamp -->
        @if($getData->signature || $getData->stamp)
        <div class="footer">
            @if($getData->signature)
            <div class="footer-item">
                <div><strong>Authorized Signature</strong></div>
                <img src="{{ getPublicAssetPath('assets/images/inv-assets/' . $getData->signature) }}" alt="Signature">
            </div>
            @endif
            @if($getData->stamp)
            <div class="footer-item">
                <div style="margin-bottom: 10px"><strong>Official Stamp</strong></div>
                <img src="{{ getPublicAssetPath('assets/images/inv-assets/' . $getData->stamp) }}" alt="Stamp">
            </div>
            @endif
        </div>
        @endif
    </div>
</body>
</html>



