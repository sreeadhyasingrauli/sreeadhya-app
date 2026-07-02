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
    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Statistics Metric Cards Row -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <!-- Card 1: Revenue -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <p class="text-sm font-medium text-gray-500 uppercase">Total Revenue</p>
                    <p class="text-2xl font-bold text-emerald-600">$<?php echo e(number_format($total_revenue, 2)); ?></p>
                </div>

                <!-- Card 2: Monthly Earnings -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <p class="text-sm font-medium text-gray-500 uppercase">Monthly Earnings</p>
                    <p class="text-2xl font-bold text-blue-600">$<?php echo e(number_format($monthly_earnings, 2)); ?></p>
                </div>

                <!-- Card 3: Pending Invoices -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <p class="text-sm font-medium text-gray-500 uppercase">Pending Collection</p>
                    <p class="text-2xl font-bold text-amber-500">$<?php echo e(number_format($pending_amount, 2)); ?></p>
                </div>

                <!-- Card 4: Overdue/Unpaid Count -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <p class="text-sm font-medium text-gray-500 uppercase">Unpaid Invoices</p>
                    <p class="text-2xl font-bold text-rose-600"><?php echo e($unpaid_count); ?></p>
                </div>
            </div>

            <!-- Recent Invoices Data Table -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Recent Billing Activity</h3>
                </div>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-sm font-semibold border-b">
                            <th class="p-4">Invoice #</th>
                            <th class="p-4">Customer</th>
                            <th class="p-4">Amount</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Due Date</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700">
                        <?php $__currentLoopData = $recent_invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-4 font-mono font-bold"><?php echo e($invoice->invoice_number); ?></td>
                            <td class="p-4"><?php echo e($invoice->customer_id); ?></td>
                            <td class="p-4">$<?php echo e(number_format($invoice->invoice_amount, 2)); ?></td>
                            <td class="p-4">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold
                                    <?php echo e($invoice->status === 'paid' ? 'bg-green-100 text-green-800' : ''); ?>

                                    <?php echo e($invoice->status === 'pending' ? 'bg-amber-100 text-amber-800' : ''); ?>

                                    <?php echo e($invoice->status === 'unpaid' ? 'bg-red-100 text-red-800' : ''); ?>

                                ">
                                    <?php echo e(ucfirst($invoice->payment_status)); ?>

                                </span>
                            </td>
                            <td class="p-4"><?php echo e($invoice->invoice_date); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\admin\dashboard.blade.php ENDPATH**/ ?>