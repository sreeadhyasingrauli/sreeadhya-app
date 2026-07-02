<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #<?php echo e($invoice->invoice_number); ?></title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #333; line-height: 1.4; }
        .invoice-box { max-width: 800px; margin: auto; padding: 30px; font-size: 16px; }
        .row-table { width: 100%; text-align: left; border-collapse: collapse; }
        .row-table td { padding: 8px; vertical-align: top; }
        .header { font-size: 28px; font-weight: bold; color: #1e3a8a; }
        .text-right { text-align: right; }
        .details-table { width: 100%; margin-top: 40px; border-bottom: 1px solid #eee; }
        .details-table th { background: #f8fafc; padding: 12px; font-weight: 600; }
        .details-table td { padding: 12px; border-bottom: 1px solid #f1f5f9; }
        .total-box { float: right; width: 30%; margin-top: 20px; font-weight: bold; font-size: 18px; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table class="row-table">
            <tr>
                <td class="header">INVOICE</td>
                <td class="text-right">
                    <strong>Invoice #:</strong> <?php echo e($invoice->invoice_number); ?><br>
                    <strong>Date:</strong> <?php echo e(\Carbon\Carbon::parse($invoice->invoice_date)->format('M d, Y')); ?>

                </td>
            </tr>
            <tr>
                <td>
                    <strong>From:</strong><br>
                    Your Company Name LLC<br>
                    123 Business Rd, Suite 100<br>
                    billing@yourcompany.com
                </td>
                <td>
                    <strong>To:</strong><br>
                    <?php echo e($invoice->customer_name); ?><br>
                    <?php echo e($invoice->customer_address); ?><br>
                    <?php echo e($invoice->customer_email); ?>

                </td>
            </tr>
        </table>

        <table class="details-table" cellspacing="0">
            <thead>
                <tr>
                    <th>Description</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Professional Development Services Rendered</td>
                    <td class="text-right">$<?php echo e(number_format($invoice->amount, 2)); ?></td>
                </tr>
            </tbody>
        </table>

        <div class="total-box">
            <table class="row-table">
                <tr>
                    <td>Total Due:</td>
                    <td class="text-right">$<?php echo e(number_format($invoice->amount, 2)); ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\invoices\template.blade.php ENDPATH**/ ?>