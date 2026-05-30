<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Quotation <?php echo e($getData->quotation_number); ?></title>
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
            <?php if($getData->letterhead): ?>
            background-image: url('<?php echo e(getPublicAssetPath('assets/images/quo-assets/' . $getData->letterhead)); ?>');
            background-size: cover;
            background-position: center top;
            background-repeat: no-repeat;
            <?php endif; ?>
        }
        .container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 50px;
        }
        .quotation-info {
            display: table;
            width: 100%;
            margin-top: 30px;
            margin-bottom: 30px;
        }
        .quotation-info-left, .quotation-info-right {
            display: table-cell;
            width: 50%;
            vertical-align: top;
        }
        .quotation-info-right {
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
        .header h2{
                    font-family: 'Arial Black', sans-serif;
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
            padding-top: 10px;
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
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header text-center" style="margin-top: 180px;font-family: Poppins">
            <h2>Customer Quotation</h2>
            
        </div>

        <!-- quotation Info -->
        <div class="quotation-info">
            <div class="quotation-info-left">
                <div class="section-title">Quotation To:</div>
                <strong><?php echo e($getData->client_name); ?></strong><br>
                <?php if($getData->client_phone): ?>
                    <strong>Phone:</strong> <?php echo e($getData->client_phone); ?><br>
                <?php endif; ?>
                <?php if($getData->client_email): ?>
                    <strong>Email:</strong> <?php echo e($getData->client_email); ?><br>
                <?php endif; ?>
                <?php if($getData->client_address): ?>
                    <strong>Address:</strong> <?php echo e($getData->client_address); ?>

                <?php endif; ?>
            </div>
            <div class="quotation-info-right">
                <div class="section-title">Quotation Info:</div>
                <strong>Quote #:</strong> <?php echo e($getData->quotation_number); ?><br>
                <strong>Date:</strong> <?php echo e($getData->quotation_date->format('M d, Y')); ?><br>
                <strong>Valid Until:</strong> <?php echo e($getData->valid_until->format('M d, Y')); ?><br>
                <strong>Quote Status:</strong> <?php echo e(strtoupper($getData->status)); ?><br>
            </div>
        </div>

        <!-- Customer Quotation Items -->
        <div class="section">
            <table>
                <thead>
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
                    <?php $__currentLoopData = $getData->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center"><?php echo e($index + 1); ?></td>
                        <td>
                            <strong> <?php echo $item->item_name; ?></strong>
                            <div style="margin-left: 15px"><?php echo $item->description; ?></div>
                        </td>
                        <td class="text-center"><?php echo e($item->quantity); ?></td>
                        <?php if($getData->show_discount): ?>
                        <td class="text-center"><?php echo e($currencySymbol); ?> <?php echo e(number_format($item->discount ?? 0, 2)); ?></td>
                        <?php endif; ?>
                        <td class="text-center"><?php echo e($currencySymbol); ?> <?php echo e(number_format($item->unit_price, 2)); ?></td>
                        <td class="text-center"><strong><?php echo e($currencySymbol); ?> <?php echo e(number_format($item->amount, 2)); ?></strong></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        
        <div class="quotation-info">
            <div class="quotation-info-left" style="margin-top: 50px">
                <!-- Notes and Terms -->
                <?php if($getData->notes || $getData->terms): ?>
                    <div class="notes-section">
                        <?php if($getData->notes): ?>
                            <div style="margin-bottom: 15px;">
                                <strong>Notes:</strong><br>
                                <?php echo e($getData->notes); ?>

                            </div>
                        <?php endif; ?>
                        <?php if($getData->terms): ?>
                            <div>
                                <strong>Terms & Conditions:</strong><br>
                                <?php echo e($getData->terms); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="quotation-info-right">
                <!-- Summary -->
                <table class="summary-table">
                    <tr>
                        <td><strong>Subtotal:</strong></td>
                        <td class="text-right"><?php echo e($currencySymbol); ?> <?php echo e(number_format($getData->subtotal, 2)); ?></td>
                    </tr>
                    <?php if($getData->show_tax): ?>
                        <tr>
                            <td>Tax (<?php echo e($getData->tax_rate); ?>%):</td>
                            <td class="text-right"><?php echo e($currencySymbol); ?> <?php echo e(number_format($getData->tax_amount, 2)); ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php if($getData->show_vat): ?>
                        <tr>
                            <td>VAT (<?php echo e($getData->vat_rate); ?>%):</td>
                            <td class="text-right"><?php echo e($currencySymbol); ?> <?php echo e(number_format($getData->vat_amount, 2)); ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php if($getData->discount > 0): ?>
                        <tr>
                            <td style="color: #f00; margin-bottom: 10px">Discount:</td>
                            <td class="text-right" style="color: #f00;">
                                -<?php echo e($currencySymbol); ?> <?php echo e(number_format($getData->discount, 2)); ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr class="total-row">
                        <td>Total:</td>
                        <td class="text-right"><?php echo e($currencySymbol); ?> <?php echo e(number_format($getData->total, 2)); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        

        <!-- Signature and Stamp -->
        <?php if($getData->signature || $getData->stamp): ?>
        <div class="footer">
            <?php if($getData->signature): ?>
            <div class="footer-item">
                <div><strong>Authorized Signature</strong></div>
                <img src="<?php echo e(getPublicAssetPath('assets/images/quo-assets/' . $getData->signature)); ?>" alt="Signature">
            </div>
            <?php endif; ?>
            <?php if($getData->stamp): ?>
            <div class="footer-item">
                <div style="margin-bottom: 10px"><strong>Official Stamp</strong></div>
                <img src="<?php echo e(getPublicAssetPath('assets/images/quo-assets/' . $getData->stamp)); ?>" alt="Stamp">
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>




<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\customer-quotations\pdf.blade.php ENDPATH**/ ?>