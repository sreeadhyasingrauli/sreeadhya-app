<<div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-6">Billing Dashboard</h1>

    <!-- Metric Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-green-500">
            <p class="text-sm text-gray-500 font-semibold uppercase">Total Revenue</p>
            <p class="text-2xl font-bold text-gray-800">$<?php echo e(number_format($stats['total_revenue'], 2)); ?></p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-yellow-500">
            <p class="text-sm text-gray-500 font-semibold uppercase">Pending Invoices</p>
            <p class="text-2xl font-bold text-gray-800">$<?php echo e(number_format($stats['pending_amount'], 2)); ?></p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-red-500">
            <p class="text-sm text-gray-500 font-semibold uppercase">Overdue Amount</p>
            <p class="text-2xl font-bold text-gray-800">$<?php echo e(number_format($stats['overdue_amount'], 2)); ?></p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-sm border-l-4 border-blue-500">
            <p class="text-sm text-gray-500 font-semibold uppercase">Invoices Today</p>
            <p class="text-2xl font-bold text-gray-800"><?php echo e($stats['sales_today']); ?></p>
        </div>
    </div>

    <!-- Recent Invoices Table -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-lg font-bold mb-4">Recent Invoices</h2>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b text-gray-600">
                    <th class="pb-2">Invoice #</th>
                    <th class="pb-2">Customer</th>
                    <th class="pb-2">Amount</th>
                    <th class="pb-2">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $recentInvoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 font-semibold text-blue-600"><?php echo e($invoice->invoice_number); ?></td>
                    <td class="py-3"><?php echo e($invoice->customer_id); ?></td>
                    <td class="py-3">$<?php echo e(number_format($invoice->invoice_amount, 2)); ?></td>
                    <td class="py-3">
                        <span class="px-2 py-1 text-xs font-bold rounded <?php echo e($invoice->status == 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'); ?>">
                            <?php echo e(strtoupper($invoice->status)); ?>

                        </span>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\billing\dashboard.blade.php ENDPATH**/ ?>