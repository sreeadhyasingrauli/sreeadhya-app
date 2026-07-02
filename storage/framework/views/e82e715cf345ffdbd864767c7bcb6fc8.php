

<?php $__env->startSection('content'); ?>
<div class="p-6 max-w-7xl mx-auto space-y-6">
    <h1 class="text-2xl font-bold text-gray-800">Billing Dashboard</h1>

    <!-- Stats Grid Display -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Revenue Card -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <p class="text-sm font-medium text-gray-500">Total Revenue</p>
            <p class="text-2xl font-bold text-emerald-600"><?php echo e(number_format($stats['total_revenue'], 2)); ?></p>
        </div>

        <!-- Monthly Income Card -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <p class="text-sm font-medium text-gray-500">This Month</p>
            <p class="text-2xl font-bold text-blue-600"><?php echo e(number_format($stats['monthly_revenue'], 2)); ?></p>
        </div>

        <!-- Pending Collections Card -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <p class="text-sm font-medium text-gray-500">Outstanding Balances</p>
            <p class="text-2xl font-bold text-amber-600"><?php echo e(number_format($stats['pending_amount'], 2)); ?></p>
        </div>

        <!-- Count Indicator Card -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <p class="text-sm font-medium text-gray-500">Invoices Generated Today</p>
            <p class="text-2xl font-bold text-gray-900"><?php echo e($stats['today_bills']); ?></p>
        </div>
    </div>

    <!-- Data Layout Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Table Representation: Recent Bills -->
        <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Invoices</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-200 text-sm text-gray-400">
                            <th class="pb-3">Invoice ID</th>
                            <th class="pb-3">Customer</th>
                            <th class="pb-3">Amount</th>
                            <th class="pb-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        <?php $__currentLoopData = $recentInvoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="py-3 font-medium text-gray-900"><?php echo e($invoice->invoice_number); ?></td>
                            <td class="py-3 text-gray-600"><?php echo e($invoice->customer_id); ?></td>
                            <td class="py-3 text-gray-900">$<?php echo e(number_format($invoice-invoice_amount, 2)); ?></td>
                            <td class="py-3">
                                <span class="px-2 py-1 text-xs rounded-full 
                                    <?php echo e($invoice->status === 'paid' ? 'bg-emerald-50 text-emerald-700' : 'bg-amber-50 text-amber-700'); ?>">
                                    <?php echo e(ucfirst($invoice->status)); ?>

                                </span>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Informational Side Panel -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Quick Actions</h2>
            <div class="space-y-2">
                <a href="#" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded-lg text-sm transition">
                    + Generate New Invoice
                </a>
                <a href="#" class="block w-full text-center bg-gray-50 hover:bg-gray-100 text-gray-700 font-medium py-2 rounded-lg text-sm transition">
                    Export Financial Reports
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pksso\sreeadhya\resources\views\admin\dashboard3.blade.php ENDPATH**/ ?>