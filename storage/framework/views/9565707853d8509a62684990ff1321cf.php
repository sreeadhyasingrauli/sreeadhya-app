<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice <?php echo e($invoice_number); ?></title>
    <style>
        body { font-family: sans-serif; font-size: 14px; color: #333; }
        .invoice-box { max-width: 800px; margin: auto; padding: 20px; }
        .header { display: flex; justify-content: space-between; margin-bottom: 30px; }
        table { width: 100%; line-height: inherit; text-align: left; border-collapse: collapse; }
        table th { background: #f4f4f4; padding: 8px; font-weight: bold; }
        table td { padding: 8px; border-bottom: 1px solid #eee; }
        .total-row { font-weight: bold; text-align: right; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="header">
            <div>
                <h2>Your Company Name</h2>
                <p>123 Business Road, City, Country</p>
            </div>
            <div style="text-align: right;">
                <h3>INVOICE</h3>
                <p><strong>Invoice #:</strong> <?php echo e($invoice_number); ?></p>
                <p><strong>Date:</strong> <?php echo e($date); ?></p>
            </div>
        </div>
    </div>
        <hr>

        <div style="margin-bottom: 30px;">
            <strong>Bill To:</strong><br>
            <?php echo e($customer_id); ?><br>
            
        </div>

        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->part_description); ?></td>
                    <td><?php echo e($item->inv_quantity); ?></td>
                    <td>$<?php echo e(number_format($item->unit_price, 2)); ?></td>
                    <td>$<?php echo e(number_format($item->inv_quantity * $item->unit_price, 2)); ?></td>
                </tr>
                @endendforeach
                
                <tr class="total-row">
                    <td colspan="3">Subtotal:</td>
                    <td>$<?php echo e(number_format($subtotal, 2)); ?></td>
                </tr>
                <tr class="total-row">
                    <td colspan="3">Tax:</td>
                    <td>$<?php echo e(number_format($tax, 2)); ?></td>
                </tr>
                <tr class="total-row" style="font-size: 18px; color: #000;">
                    <td colspan="3">Total Due:</td>
                    <td>$<?php echo e(number_format($total, 2)); ?></td>
                </tr>
            </tbody>
        </table>
   
</body>
</html>
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\reports\invoice1.blade.php ENDPATH**/ ?>