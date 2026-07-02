<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        Dashboard - BillFlow Pro
     <?php $__env->endSlot(); ?>

    <!-- Main Dashboard Content Grid -->
    <div class="space-y-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Billing Overview</h1>
            <p class="text-sm text-gray-500">Monitor your real-time collections and pending invoicing.</p>
        </div>

        <!-- Metric Cards Dashboard Section -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                <p class="text-sm font-medium text-gray-500">Total Revenue</p>
            <p class="text-2xl font-bold text-emerald-600"><?php echo e(number_format($stats['total_revenue'], 2)); ?></p>
            </div>
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                <div class="text-sm text-gray-500 font-medium">Amount Collected</div>
                <p class="text-2xl font-bold text-emerald-600"><?php echo e(number_format(($stats['partial_amount']+$stats['paid_amount']), 2)); ?></p>
            </div>
            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                <div class="text-sm text-gray-500 font-medium">Outstanding  Amount</div>
            <p class="text-2xl font-bold text-emerald-600"><?php echo e(number_format(($stats['total_revenue']-$stats['partial_amount']+$stats['paid_amount']), 2)); ?></p>
            </div>
            </div>
            <!-- Data Layout: Recent Invoices Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="px-6 py-4 font-semibold border-b text-gray-800">Recent Generated Invoices</div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-sm uppercase">
                        <th class="p-4 border-b">Invoice #</th>
                        <th class="p-4 border-b">Customer Code</th>
                        <th class="p-4 border-b">Invoice Date</th>
                        <th class="p-4 border-b">Invoice Amount</th>
                        <th class="p-4 border-b">Payment Status</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    <?php $__empty_1 = true; $__currentLoopData = $recentInvoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50 border-b">
                            <td class="p-4 font-medium text-indigo-600">#<?php echo e($invoice->invoice_number); ?></td>
                            <td class="p-4"><?php echo e($invoice->customer_id); ?></td>
                            <td class="p-4"><?php echo e(\Carbon\Carbon::parse($invoice->invoice_date)->format('d-m-Y')); ?></td>
                            <td class="p-4 font-semibold"><?php echo e(number_format($invoice->invoice_amount, 2)); ?></td>
                            <td class="p-4">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold 
                                    <?php echo e($invoice->payment_status === 'paid' ? 'bg-green-100 text-green-800' : ''); ?>

                                    <?php echo e($invoice->payment_status === 'unpaid' ? 'bg-yellow-100 text-yellow-800' : ''); ?>

                                    <?php echo e($invoice->payment_status === 'partial' ? 'bg-yellow-100 text-yellow-800' : ''); ?>

                                    <?php echo e($invoice->payment_status === 'overdue' ? 'bg-red-100 text-red-800' : ''); ?>">
                                    <?php echo e(ucfirst($invoice->payment_status)); ?>

                                </span>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-400">No invoices generated yet.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views/dashboard.blade.php ENDPATH**/ ?>