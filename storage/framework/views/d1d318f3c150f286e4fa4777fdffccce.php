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
    <!-- Top KPI Cards Overview -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <p class="text-sm font-medium text-gray-500 uppercase">Total Revenue</p>
            <p class="text-2xl font-bold text-green-600"><?php echo e(number_format($metrics['total_revenue'], 2)); ?></p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <p class="text-sm font-medium text-gray-500 uppercase">Pending Payments</p>
            <p class="text-2xl font-bold text-amber-500"><?php echo e(number_format($metrics['pending_amount'], 2)); ?></p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <p class="text-sm font-medium text-gray-500 uppercase">Overdue Collections</p>
            <p class="text-2xl font-bold text-red-600"><?php echo e(number_format($metrics['overdue_amount'], 2)); ?></p>
        </div>
    </div>

    <!-- Data Table: Recent Invoices -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Invoices</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-gray-600 text-sm font-medium">
                        <th class="p-3">Invoice ID</th>
                        <th class="p-3">Client</th>
                        <th class="p-3">Amount</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Due Date</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    <?php $__currentLoopData = $recentInvoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="p-3 font-semibold text-blue-600"><?php echo e($invoice->invoice_number); ?></td>
                        <td class="p-3"><?php echo e($invoice->customer_id); ?></td>
                        <td class="p-3"><?php echo e(number_format($invoice->invoice_amount, 2)); ?></td>
                        <td class="p-3">
                            <span class="px-2 py-1 rounded text-xs font-semibold 
                                <?php echo e($invoice->status == 'paid' ? 'bg-green-100 text-green-800' : ''); ?>

                                <?php echo e($invoice->status == 'unpaid' ? 'bg-amber-100 text-amber-800' : ''); ?>

                                <?php echo e($invoice->status == 'overdue' ? 'bg-red-100 text-red-800' : ''); ?>">
                                <?php echo e(ucfirst($invoice->status)); ?>

                            </span>
                        </td>
                        <td class="p-3 text-gray-500"><?php echo e($invoice->invoice_date); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
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
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\dashboard\index.blade.php ENDPATH**/ ?>