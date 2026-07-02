

<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Order
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('orders.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('orders.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    
            
                    <div class="mb-3 row">
                        <label for="shipping_address" class="col-md-4 col-form-label text-md-end text-start">Shipping Address</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control <?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="shipping_address" name="shipping_address" value="<?php echo e(old('shipping_address')); ?>">
                            <?php $__errorArgs = ['shipping_address'];
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

               
             <div id="items-container">
        <!-- Initial Item Row -->
        
           <div class="mb-3">
                <label>Part Number</label>
                <input type="number" name="items[0][product_id]" class="form-control" min="1" required>
            </div>
            
            <div class="mb-3">
                <label>Quantity</label>
                <input type="number" name="items[0][quantity]" class="form-control" min="1" required>
            </div>
           
            <button type="button" class="btn btn-danger remove-row">Remove</button>
        </div>
    </div>
    
                <button type="button" id="add-item" class="btn btn-secondary">Add More Items</button>
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
    document.getElementById('add-item').addEventListener('click', function () {
        const container = document.getElementById('items-container');
        const firstRow = container.querySelector('.item-row');
        const newRow = firstRow.cloneNode(true);

        // Update all input names with the new index
        newRow.querySelectorAll('input').forEach(input => {
            const name = input.getAttribute('name');
            const newName = name.replace(/items\[\d+\]/, `items[${itemIndex}]`);
            input.setAttribute('name', newName);
            input.value = ''; // Reset values
        });

        // Add event listener for the remove button in the new row
        newRow.querySelector('.remove-row').addEventListener('click', function () {
            if(container.querySelectorAll('.item-row').length > 1) {
                newRow.remove();
            }
        });

        container.appendChild(newRow);
        itemIndex++;
    });

    // Event delegation for existing remove buttons
    document.getElementById('items-container').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-row')) {
            if (this.querySelectorAll('.item-row').length > 1) {
                e.target.closest('.item-row').remove();
            }
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('orders.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pksso\sreeadhya\resources\views\orders\create.blade.php ENDPATH**/ ?>