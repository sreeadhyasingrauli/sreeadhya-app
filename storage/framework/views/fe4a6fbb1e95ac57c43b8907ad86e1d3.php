

<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Invoice
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('invoices.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('invoices.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    
                    <!-- Customer Selection -->
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
                        <label for="invoice_number" class="col-md-4 col-form-label text-md-end text-start">Invoice Number</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['invoice_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="invoice_number" name="invoice_number" value="<?php echo e(old('invoice_number')); ?>">
                            <?php $__errorArgs = ['invoice_number'];
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
                        <label for="invoice_date" class="col-md-4 col-form-label text-md-end text-start">Invoice Date</label>
                       <div class="col-md-6">
                          <input type="date" class="form-control <?php $__errorArgs = ['invoice_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="invoice_date" name="invoice_date" value="<?php echo e(old('invoice_date')); ?>">
                            <?php $__errorArgs = ['invoice_date'];
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

                     <div class="form-group">
                    <label for="order_id"> Purchase Order ID</label>
                    <select name="order_id" id="order_id" class="form-control">
                      <option value="">Select PO ID</option>
                     <?php $__currentLoopData = $allPOs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $po): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option value="<?php echo e($po->id); ?>"><?php echo e($po->id); ?>-<?php echo e($po->po_number); ?></option>
                         <?php echo e($po->id); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    </div>
                     
                    
                 

                    
                

             <!-- Initial Item Row -->
         <div id="items-container">
    <div class="item-row mb-3 d-flex gap-2 align-items-center">
        <!-- Part Number -->
        <select name="items[0][part_number]" class="form-control" required>
            <option value="">Select Part Number</option>
            <?php $__currentLoopData = $allPOItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($product->part_number); ?>"><?php echo e($product->purchase_order_id); ?>-<?php echo e($product->part_number); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        

        <!-- Quantity -->
        <div class="mb-0">
            <label class="d-none">Quantity</label>
            <input type="number" name="items[0][inv_quantity]" class="form-control" min="1" placeholder="Qty" required>
        </div>

       

        <!-- Price -->
        <div class="mb-0">
            <label class="d-none">Price</label>
            <input type="number" step="0.01" name="items[0][unit_price]" class="form-control" placeholder="Price" min="0" required>
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
<?php echo $__env->make('invoices.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pksso\sreeadhya\resources\views\invoices\create.blade.php ENDPATH**/ ?>