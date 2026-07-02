

<?php $__env->startSection('content'); ?>
        <div style="font-size: <?php echo e($fontSize); ?>;">
<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Company Information
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('companies.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Company Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($company->company_name); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="address_line1" class="col-md-4 col-form-label text-md-end text-start"><strong>Address Line 1:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($company->address_line1); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="address_line2" class="col-md-4 col-form-label text-md-end text-start"><strong>Address Line 2:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($company->address_line2); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="city" class="col-md-4 col-form-label text-md-end text-start"><strong>City:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($company->city); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="state" class="col-md-4 col-form-label text-md-end text-start"><strong>State:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($company->state); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="pin_code" class="col-md-4 col-form-label text-md-end text-start"><strong>Pin Code:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($company->pin_code); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="country" class="col-md-4 col-form-label text-md-end text-start"><strong>Country:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($company->country); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="contact_number" class="col-md-4 col-form-label text-md-end text-start"><strong>Contact Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($company->contact_number); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start"><strong>Email:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($company->email); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="website" class="col-md-4 col-form-label text-md-end text-start"><strong>Website:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($company->website); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="pan_number" class="col-md-4 col-form-label text-md-end text-start"><strong>PAN Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($company->pan_number); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="gst_number" class="col-md-4 col-form-label text-md-end text-start"><strong>GST Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($company->gst_number); ?>

                        </div>
                    </div>
                    <div class="row">
                        <label for="bank_name" class="col-md-4 col-form-label text-md-end text-start"><strong>Bank Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($company->bank_name); ?>

                        </div>
                    </div>
                    <div class="row">
                        <label for="account_number" class="col-md-4 col-form-label text-md-end text-start"><strong>Account Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($company->account_number); ?>

                        </div>
                    </div>
                    <div class="row">
                        <label for="ifsc_code" class="col-md-4 col-form-label text-md-end text-start"><strong>IFSC Code:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($company->ifsc_code); ?>

                        </div>
                    </div>
                    <div class="row">
                        <label for="branch_name" class="col-md-4 col-form-label text-md-end text-start"><strong>Branch Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($company->branch_name); ?>

                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('companies.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pksso\sreeadhya\resources\views\companies\show.blade.php ENDPATH**/ ?>