

<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Customer Information
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('customers.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="address_to" class="col-md-4 col-form-label text-md-end text-start"><strong>Address To:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($customer->address_to); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="customer_name" class="col-md-4 col-form-label text-md-end text-start"><strong>Customer Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($customer->customer_name); ?>

                        </div>
                    </div>
                    <div class="row">
                        <label for="customer_short_name" class="col-md-4 col-form-label text-md-end text-start"><strong>Customer Short Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($customer->customer_short_name); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="address_line1" class="col-md-4 col-form-label text-md-end text-start"><strong>Address Line 1:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($customer->address_line1); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="address_line2" class="col-md-4 col-form-label text-md-end text-start"><strong>Address Line 2:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($customer->address_line2); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="city" class="col-md-4 col-form-label text-md-end text-start"><strong>City:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($customer->city); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="state" class="col-md-4 col-form-label text-md-end text-start"><strong>State:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($customer->state); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="pin_code" class="col-md-4 col-form-label text-md-end text-start"><strong>Pin Code:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($customer->pin_code); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="country" class="col-md-4 col-form-label text-md-end text-start"><strong>Country:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($customer->country); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="contact_number" class="col-md-4 col-form-label text-md-end text-start"><strong>Contact Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($customer->contact_number); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start"><strong>Email:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($customer->email); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="website" class="col-md-4 col-form-label text-md-end text-start"><strong>Website:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($customer->website); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="pan_number" class="col-md-4 col-form-label text-md-end text-start"><strong>PAN Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($customer->pan_number); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="gst_number" class="col-md-4 col-form-label text-md-end text-start"><strong>GST Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($customer->gst_number); ?>

                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('customers.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pksso\sreeadhya\resources\views\customers\show.blade.php ENDPATH**/ ?>