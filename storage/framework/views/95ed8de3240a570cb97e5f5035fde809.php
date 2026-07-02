

<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Offer
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('offers.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('offers.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    
                    <div class="form-group">
                    <label for="customer_id"> Customer ID</label>
                    <select name="customer_id" id="customer_id" class="form-control">
                      <option value="">Select Customer</option>
                     <?php $__currentLoopData = $allCustomers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($customer->customer_id); ?>">
                         <?php echo e($customer->customer_name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>

                    <div class="mb-3 row">
                        <label for="offer_number" class="col-md-4 col-form-label text-md-end text-start">Offer Number</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['offer_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="offer_number" name="offer_number" value="<?php echo e(old('offer_number')); ?>">
                            <?php $__errorArgs = ['offer_number'];
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
                    <div class="mb-3 row">
                        <label for="offer_date" class="col-md-4 col-form-label text-md-end text-start">Offer Date</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control <?php $__errorArgs = ['offer_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="offer_date" name="offer_date" value="<?php echo e(old('offer_date')); ?>">
                            <?php $__errorArgs = ['offer_date'];
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
                    <div class="mb-3 row">
                        <label for="valid_until" class="col-md-4 col-form-label text-md-end text-start">Valid Until (Date)</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control <?php $__errorArgs = ['valid_until'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="valid_until" name="valid_until" value="<?php echo e(old('valid_until')); ?>">
                            <?php $__errorArgs = ['valid_until'];
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
                    <div class="mb-3 row">
                        <label for="payment_terms" class="col-md-4 col-form-label text-md-end text-start">Payment Terms :</label>
                        <div class="col-md-6">
                          <select class="form-control <?php $__errorArgs = ['payment_terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="payment_terms" name="payment_terms">
                                <option value="">Select Payment Terms</option>
                                <option value="100% within 21 days" <?php echo e(old('payment_terms') == '1' ? 'selected' : ''); ?>>100% within 21 days</option>
                                <option value="Accepted as per your NIT/Offer" <?php echo e(old('payment_terms') == '2' ? 'selected' : ''); ?>>Accepted as per your NIT/Offer</option>
                            </select>
                            <?php $__errorArgs = ['payment_terms'];
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
                    <div class="mb-3 row">
                        <label for="gst_terms" class="col-md-4 col-form-label text-md-end text-start">GST :</label>
                        <div class="col-md-6">
                          <select class="form-control <?php $__errorArgs = ['gst_terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="gst_terms" name="gst_terms">
                                <option value="">Select GST Terms</option>
                                <option value="Extra GST @18%" <?php echo e(old('gst_terms') == '1' ? 'selected' : ''); ?>>Extra GST @18%</option>
                                <option value="Extra as per applicable" <?php echo e(old('gst_terms') == '2' ? 'selected' : ''); ?>>Extra as per applicable</option>
                            </select>
                            <?php $__errorArgs = ['gst_terms'];
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
                    <div class="mb-3 row">
                        <label for="delivery_terms" class="col-md-4 col-form-label text-md-end text-start">Delivery : </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['delivery_terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="delivery_terms" name="delivery_terms" value="<?php echo e(old('delivery_terms')); ?>">
                            <?php $__errorArgs = ['delivery_terms'];
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
                    <div class="mb-3 row">
                        <label for="pf_terms" class="col-md-4 col-form-label text-md-end text-start">Packing & Forwarding (P&F) : </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['pf_terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="pf_terms" name="pf_terms" value="<?php echo e(old('pf_terms')); ?>">
                            <?php $__errorArgs = ['pf_terms'];
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
                    <div class="mb-3 row">
                        <label for="pricebasis_terms" class="col-md-4 col-form-label text-md-end text-start">Basis Of Price : </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['pricebasis_terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="pricebasis_terms" name="pricebasis_terms" value="<?php echo e(old('pricebasis_terms')); ?>">
                            <?php $__errorArgs = ['pricebasis_terms'];
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
                    <div class="mb-3 row">
                        <label for="guarantee_terms" class="col-md-4 col-form-label text-md-end text-start">Guarantee/Waranty : </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['guarantee_terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="guarantee_terms" name="guarantee_terms" value="<?php echo e(old('guarantee_terms')); ?>">
                            <?php $__errorArgs = ['guarantee_terms'];
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
                    <div class="mb-3 row">
                        <label for="ld_terms" class="col-md-4 col-form-label text-md-end text-start">LD Clause : </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['ld_terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="ld_terms" name="ld_terms" value="<?php echo e(old('ld_terms')); ?>">
                            <?php $__errorArgs = ['ld_terms'];
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
                    <div class="mb-3 row">
                        <label for="other_terms" class="col-md-4 col-form-label text-md-end text-start">Any Other : </label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['other_terms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="other_terms" name="other_terms" value="<?php echo e(old('other_terms')); ?>">
                            <?php $__errorArgs = ['other_terms'];
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
                    
             
        <!-- Initial Item Row -->
         <div id="items-container">
    <div class="item-row mb-3 d-flex gap-2 align-items-center">
        <!-- Part Number -->
        <select name="items[0][part_number]" class="form-control" required>
            <option value="">Select Part Number</option>
            <?php $__currentLoopData = $allProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($product->part_number); ?>"><?php echo e($product->part_number); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <!-- Description -->
        <div class="mb-0">
            <label class="d-none">Part Description</label>
            <input type="text" name="items[0][part_description]" class="form-control" placeholder="Description" required>
        </div>

        <!-- Quantity -->
        <div class="mb-0">
            <label class="d-none">Quantity</label>
            <input type="number" name="items[0][quantity]" class="form-control" min="1" placeholder="Qty" required>
        </div>

        <!-- UoM -->
        <div class="mb-0">
            <label class="d-none">Unit Of Measurement</label>
            <input type="text" name="items[0][uom]" class="form-control" placeholder="UoM" required>
        </div>

        <!-- Price -->
        <div class="mb-0">
            <label class="d-none">Price</label>
            <input type="number" step="0.01" name="items[0][price]" class="form-control" placeholder="Price" min="0" required>
        </div>

        <!-- Remove Button -->
        <button type="button" class="btn btn-danger remove-item">X</button>
    </div>
</div>

<button type="button" class="btn btn-primary mt-2" id="add-item">+ Add Row</button>

            
            
                    <div class="mb-3 row">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
            <!-- JavaScript to add rows -->
<script>
    let itemIndex = 1;
    document.addEventListener('DOMContentLoaded', function () {
    let itemIndex = 0;
    const container = document.getElementById('items-container');
    const addButton = document.getElementById('add-item');

    // Add new row
    addButton.addEventListener('click', function () {
        itemIndex++;
        // Clone the first item row
        let newRow = container.querySelector('.item-row').cloneNode(true);

        // Reset values and update names/IDs
        newRow.querySelectorAll('input, select').forEach(function (element) {
            if (element.tagName === 'SELECT') {
                element.selectedIndex = 0;
            } else {
                element.value = ''; // Clear inputs
            }

            // Replace the index (items[0] -> items[1], items[2], etc.)
            let name = element.getAttribute('name');
            if (name) {
                let newName = name.replace(/items\[\d+\]/, `items[${itemIndex}]`);
                element.setAttribute('name', newName);
            }
            let id = element.getAttribute('id');
            if (id) {
                let newId = id.replace(/items\[\d+\]/, `items[${itemIndex}]`);
                element.setAttribute('id', newId);
            }
        });

        // Append the new row
        container.appendChild(newRow);
    });

    // Remove row
    container.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-item')) {
            // Ensure at least one row remains
            if (container.querySelectorAll('.item-row').length > 1) {
                e.target.closest('.item-row').remove();
            }
        }
    });
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('offers.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pksso\sreeadhya\resources\views\offers\create1.blade.php ENDPATH**/ ?>