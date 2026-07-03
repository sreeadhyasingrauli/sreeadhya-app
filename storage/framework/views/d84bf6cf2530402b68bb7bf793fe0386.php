

<?php $__env->startSection('content'); ?>
 <div style="font-size: <?php echo e($fontSize); ?>;">
   

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
            <div class="card-header">Company List</div>
            <div class="card-body">
                <a href="<?php echo e(route('companies.create')); ?>" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Company</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Address Line 1</th>
                        <th scope="col">Address Line 2</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Pin Code</th>
                        <th scope="col">Country</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Website</th>
                        <th scope="col">PAN Number</th>
                        <th scope="col">GST Number</th>
                        <th scope="col">Banker's Name</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">IFSC Code</th>
                        <th scope="col">Branch Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="row"><?php echo e($loop->iteration); ?></th>
                            <td><?php echo e($company->company_name); ?></td>
                            <td><?php echo e($company->address_line1); ?></td>
                            <td><?php echo e($company->address_line2); ?></td>
                            <td><?php echo e($company->city); ?></td>
                            <td><?php echo e($company->state); ?></td>
                            <td><?php echo e($company->pin_code); ?></td>
                            <td><?php echo e($company->country); ?></td>
                            <td><?php echo e($company->contact_number); ?></td>
                            <td><?php echo e($company->email); ?></td>
                            <td><?php echo e($company->website); ?></td>
                            <td><?php echo e($company->pan_number); ?></td>
                            <td><?php echo e($company->gst_number); ?></td>
                            <td><?php echo e($company->bank_name); ?></td>
                            <td><?php echo e($company->account_number); ?></td>
                            <td><?php echo e($company->ifsc_code); ?></td>
                            <td><?php echo e($company->branch_name); ?></td>

                            <td>
                                <form action="<?php echo e(route('companies.destroy', $company->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <a href="<?php echo e(route('companies.show', $company->id)); ?>" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="<?php echo e(route('companies.edit', $company->id)); ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this company?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Company Found!</strong>
                                </span>
                            </td>
                        <?php endif; ?>
                    </tbody>
                  </table>

                  <?php echo e($companies->links()); ?>


            </div>
        </div>
    </div>    
</div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('companies.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pksso\sreeadhya\resources\views/companies/index.blade.php ENDPATH**/ ?>