<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #333; }
        .header { font-size: 24px; font-weight: bold; margin-bottom: 20px; }
        .details { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .total { font-size: 18px; font-weight: bold; margin-top: 20px; text-align: right; }
    </style>
</head>
<body>
    <div class="header">Official Offer</div>
    <div class="details">
        <p><strong>To:</strong> <?php echo e($offer->customer_name); ?></p>
        <p><strong>Date:</strong> <?php echo e($offer->created_at->format('Y-m-d')); ?></p>
    </div>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo e($offer->item_description); ?></td>
                <td>$<?php echo e(number_format($offer->price, 2)); ?></td>
            </tr>
        </tbody>
    </table>
    <div class="total">Total: $<?php echo e(number_format($offer->price, 2)); ?></div>
</body>
</html>
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\offer_pdf.blade.php ENDPATH**/ ?>