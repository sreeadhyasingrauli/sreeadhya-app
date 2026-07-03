

<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Purchase Order
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('purchase-orders.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('purchase-orders.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    
                    <!-- Vendor Selection -->
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
                        <label for="po_number" class="col-md-4 col-form-label text-md-end text-start">PO Number</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['po_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="po_number" name="po_number" value="<?php echo e(old('po_number')); ?>">
                            <?php $__errorArgs = ['po_number'];
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
                        <label for="po_date" class="col-md-4 col-form-label text-md-end text-start">PO Date</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control <?php $__errorArgs = ['po_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="po_date" name="po_date" value="<?php echo e(old('po_date')); ?>">
                            <?php $__errorArgs = ['po_date'];
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
                        <label for="del_end_date" class="col-md-4 col-form-label text-md-end text-start">Delivery End Date</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control <?php $__errorArgs = ['del_end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="del_end_date" name="del_end_date" value="<?php echo e(old('del_end_date')); ?>">
                            <?php $__errorArgs = ['del_end_date'];
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
<?php echo $__env->make('purchase-orders.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pksso\sreeadhya\resources\views/purchase-orders/create.blade.php ENDPATH**/ ?>