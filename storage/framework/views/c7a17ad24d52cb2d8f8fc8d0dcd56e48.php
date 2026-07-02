

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
            <div class="card-header">Budgetory Offer List</div>
            <div class="card-body">
                <a href="<?php echo e(route('budgetories.create')); ?>" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Budgetory</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Budgetory Number</th>
                        <th scope="col">Budgetory Date</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Address To</th>
                        <th scope="col">Budget Description</th>
                        <th scope="col">Budget Amount</th>
                        <th scope="col">Payment Terms</th>
                        <th scope="col">Delivery Terms</th>
                        <th scope="col">Warranty Terms</th>
                        <th scope="col">Offer Validity</th>
                        <th scope="col">Validity End Date</th>
                        <th scope="col">Status</th>

                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $budgetories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $budgetory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="row"><?php echo e($loop->iteration); ?></th>
                            <td><?php echo e($budgetory->budgetory_number); ?></td>
                            <td><?php echo e($budgetory->budgetory_date); ?></td>
                            <td><?php echo e($budgetory->customer_name); ?></td>
                            <td><?php echo e($budgetory->address_to); ?></td>
                            <td><?php echo e($budgetory->budget_description); ?></td>
                            <td><?php echo e($budgetory->budget_amount); ?></td>
                            <td><?php echo e($budgetory->payment_terms); ?></td>
                            <td><?php echo e($budgetory->delivery_terms); ?></td>
                            <td><?php echo e($budgetory->warranty_terms); ?></td>
                            <td><?php echo e($budgetory->offer_validity); ?></td>
                            <td><?php echo e($budgetory->validity_end_date); ?></td>
                            <td><?php echo e($budgetory->status); ?></td>

                            <td>
                                <form action="<?php echo e(route('budgetories.destroy', $budgetory->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <a href="<?php echo e(route('budgetories.show', $budgetory->id)); ?>" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="<?php echo e(route('budgetories.edit', $budgetory->id)); ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this budgetory?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Budgetory Offer Found!</strong>
                                </span>
                            </td>
                        <?php endif; ?>
                    </tbody>
                  </table>

                  <?php echo e($budgetories->links()); ?>


            </div>
        </div>
    </div>    
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('budgetories.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pksso\sreeadhya\resources\views\budgetories\index.blade.php ENDPATH**/ ?>