<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include Chart.js via CDN -->
    <script src="https://jsdelivr.net"></script>
</head>
<body>

    <!-- Chart Container -->
    <div style="width: 80%; margin: auto;">
        <canvas id="myChart"></canvas>
    </div>

    

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <!-- Total Revenue Card -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
        <p class="text-sm font-medium text-gray-500 uppercase">Total Revenue</p>
        <p class="text-2xl font-bold text-green-600">$<?php echo e(number_format($totalRevenue, 2)); ?></p>
    </div>

    <!-- Outstanding Invoices Card -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
        <p class="text-sm font-medium text-gray-500 uppercase">Pending Bills</p>
        <p class="text-2xl font-bold text-amber-500">$<?php echo e(number_format($pendingAmount, 2)); ?></p>
    </div>

    <!-- Paid Invoices Count -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
        <p class="text-sm font-medium text-gray-500 uppercase">Paid Invoices</p>
        <p class="text-2xl font-bold text-gray-800"><?php echo e($paidCount); ?></p>
    </div>

    <!-- Pending Invoices Count -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
        <p class="text-sm font-medium text-gray-500 uppercase">Unpaid Items</p>
        <p class="text-2xl font-bold text-gray-800"><?php echo e($pendingCount); ?></p>
    </div>
</div>

<div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Invoices</h3>
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b border-gray-200 text-gray-400 text-sm">
                <th class="pb-3">Invoice #</th>
                <th class="pb-3">Client</th>
                <th class="pb-3">Amount</th>
                <th class="pb-3">Status</th>
                <th class="pb-3">Date</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm">
            <?php $__currentLoopData = $recentInvoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="border-b border-gray-100 hover:bg-gray-50">
                <td class="py-3 font-medium text-blue-600">#<?php echo e($invoice->invoice_number); ?></td>
                <td class="py-3"><?php echo e($invoice->user->name); ?></td>
                <td class="py-3">$<?php echo e(number_format($invoice->total, 2)); ?></td>
                <td class="py-3">
                    <span class="px-2 py-1 rounded text-xs font-semibold 
                        <?php echo e($invoice->status === 'paid' ? 'bg-green-100 text-green-700' : 'bg-amber-100 text-amber-700'); ?>">
                        <?php echo e(ucfirst($invoice->status)); ?>

                    </span>
                </td>
                <td class="py-3"><?php echo e($invoice->created_at->format('M d, Y')); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>


</body>
</html><?php /**PATH C:\Users\pksso\sreeadhya\resources\views\dashboard6.blade.php ENDPATH**/ ?>