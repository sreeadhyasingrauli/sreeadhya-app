<!-- resources/views/invoices/show.blade.php -->
<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Offer Information
                </div>
                <div class="float-end">
                   
<form action="<?php echo e(route('payments.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    

    <div class="mb-3 row">
                        <label for="amount_received" class="col-md-4 col-form-label text-md-end text-start">Amount Received</label>
                        <div class="col-md-6">
                          <input type="number" step="0.01" class="form-control <?php $__errorArgs = ['amount_received'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="amount_received" name="amount_received" value="<?php echo e(old('amount_received')); ?>">
                            <?php $__errorArgs = ['amount_received'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
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
</div><?php /**PATH C:\Users\pksso\sreeadhya\resources\views\payments\create.blade.php ENDPATH**/ ?>