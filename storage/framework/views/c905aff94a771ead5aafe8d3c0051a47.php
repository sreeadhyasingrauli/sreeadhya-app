<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> Billing Dashboard <?php $__env->endSlot(); ?>
     <?php $__env->slot('header', null, []); ?> Billing Overview <?php $__env->endSlot(); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <!-- Metrics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-blue-500">
            <div class="text-sm font-medium text-gray-500 uppercase">Total Invoiced</div>
            <div class="text-2xl font-bold text-gray-900"><?php echo e(number_format($stats['total_invoiced'], 2)); ?></div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-green-500">
            <div class="text-sm font-medium text-gray-500 uppercase">Total Collected</div>
            <div class="text-2xl font-bold text-green-600"><?php echo e(number_format(($stats['total_paid'] + $stats['total_partial']) , 2)); ?></div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-yellow-500">
            <div class="text-sm font-medium text-gray-500 uppercase">Pending Collection</div>
            <div class="text-2xl font-bold text-yellow-600"> <?php echo e(number_format(($stats['total_invoiced'] - $stats['total_paid']- $stats['total_partial']), 2)); ?> </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-red-500">
            <div class="text-sm font-medium text-gray-500 uppercase">Overdue Amount</div>
            <div class="text-2xl font-bold text-red-600"><?php echo e(number_format($stats['total_overdue'], 2)); ?></div>
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\dashboard3.blade.php ENDPATH**/ ?>