<!-- resources/views/invoices/show.blade.php -->


<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        <?php $__sessionArgs = ['success'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
            <div class="alert alert-success" role="alert">
                <?php echo e($value); ?>

            </div>
        <?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?>
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Payment  Information
                </div>
                <div class="float-end">
                   
<form action="<?php echo e(route('payments.store', $invoice->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <h3>Record Payment Received</h3>
    <p>Total Invoice Due: <strong><?php echo e(number_format($invoice->balance_amount, 2)); ?></strong></p>

    <div>
        <label>Amount Received </label>
        <input type="number" name="amount_received" step="0.01" max="<?php echo e($invoice->balance_amount); ?>" required>
    </div>

    <div>
        <label>Payment Date</label>
        <input type="date" name="payment_date" value="<?php echo e(date('Y-m-d')); ?>" required>
    </div>

    <div>
        <label>Payment Method</label>
        <select name="payment_method" required>
            <option value="bank_transfer">Bank Transfer</option>
            <option value="cash">Cash</option>
            <option value="stripe">Stripe Gateway</option>
        </select>
    </div>

    <div>
        <label>Transaction ID Reference</label>
        <input type="text" name="transaction_id">
    </div>

    <button type="submit">Log Payment Receipt</button>
</form>
 </div>
        </div>
    </div>    
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('invoices.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pksso\sreeadhya\resources\views\invoices\show.blade.php ENDPATH**/ ?>