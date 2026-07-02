

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
            <div class="card-header">Payment Of Invoice List</div>
            <div class="card-body">
                <a href="<?php echo e(route('payments.create')); ?>" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Payment</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ID#</th>
                        <th scope="col">Customer ID</th>
                        
                        <th scope="col">Invoice Number</th>
                       
                        <th scope="col">Invoice Amount</th>
                           <th scope="col">Received Amount</th>
                           <th scope="col">Balance Amount</th>
                        <th scope="col">Status</th>
                        
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="row"><?php echo e($inv->id); ?></th>
                             <td><?php echo e($inv->customer_id); ?></td>
                            <td><?php echo e($inv->invoice_number); ?></td>
                           <td><?php echo e($inv->invoice_amount); ?></td>
                            <td><?php echo e($inv->received_amount); ?></td>
                            <td><?php echo e($inv->balance_amount); ?></td>
                            <td><?php echo e($inv->status); ?></td>
                                                  
                             


                            <td>
                                <form action="<?php echo e(route('payments.destroy', $inv->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                  
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Invoice?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Invoice Found!</strong>
                                </span>
                            </td>
                        <?php endif; ?>
                    </tbody>
                  </table>

                  <?php echo e($payments->links()); ?>


            </div>
        </div>
    </div>    
</div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('payments.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pksso\sreeadhya\resources\views\payments\index.blade.php ENDPATH**/ ?>