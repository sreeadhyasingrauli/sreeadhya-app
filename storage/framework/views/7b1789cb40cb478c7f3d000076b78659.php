<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quotation <?php echo e($quote->quote_number); ?></title>
    <script src="https://tailwindcss.com"></script>
</head>
<body class="bg-white p-8 text-gray-800">
    <div class="max-w-3xl mx-auto border p-8 rounded-lg shadow-sm">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-indigo-600">QUOTATION</h1>
                <p class="text-sm text-gray-500">No: <?php echo e($quote->quote_number); ?></p>
            </div>
            <div class="text-right">
                <h2 class="font-semibold text-lg">Your Company Name</h2>
                <p class="text-sm text-gray-500">Expires: <?php echo e($quote->expires_at->format('M d, Y')); ?></p>
            </div>
        </div>

        <div class="mb-8">
            <h3 class="font-bold text-gray-700 mb-2">Prepared For:</h3>
            <p class="text-sm"><?php echo e($quote->customer->name); ?></p>
            <p class="text-sm text-gray-500"><?php echo e($quote->customer->email); ?></p>
        </div>

        <table class="w-full text-left mb-8 border-collapse">
            <thead>
                <tr class="border-b-2 border-gray-200 bg-gray-50 text-gray-600 uppercase text-xs">
                    <th class="py-3 px-2">Description</th>
                    <th class="py-3 px-2 text-center">Qty</th>
                    <th class="py-3 px-2 text-right">Unit Price</th>
                    <th class="py-3 px-2 text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $quote->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="border-b border-gray-100 text-sm">
                    <td class="py-4 px-2"><?php echo e($item->description); ?></td>
                    <td class="py-4 px-2 text-center"><?php echo e($item->quantity); ?></td>
                    <td class="py-4 px-2 text-right">$<?php echo e(number_format($item->unit_price, 2)); ?></td>
                    <td class="py-4 px-2 text-right">$<?php echo e(number_format($item->total_price, 2)); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="flex justify-end">
            <div class="w-64 text-sm space-y-2">
                <div class="flex justify-between"><span>Subtotal:</span><span>$<?php echo e(number_format($quote->subtotal, 2)); ?></span></div>
                <div class="flex justify-between"><span>Tax (15%):</span><span>$<?php echo e(number_format($quote->tax_amount, 2)); ?></span></div>
                <div class="flex justify-between font-bold text-lg border-t pt-2 text-indigo-600">
                    <span>Total:</span><span>$<?php echo e(number_format($quote->total, 2)); ?></span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\pdf\quote.blade.php ENDPATH**/ ?>