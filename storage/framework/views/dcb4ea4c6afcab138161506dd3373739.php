

<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Offer Information
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('offers.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <label for="customer_id" class="col-md-4 col-form-label text-md-end text-start"><strong>Customer ID:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($offer->customer_id); ?>

                        </div>
                    </div>
                    <div class="row">
                        <label for="offer_number" class="col-md-4 col-form-label text-md-end text-start"><strong>Offer Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($offer->offer_number); ?>

                        </div>
                    </div>
                    <div class="row">
                        <label for="valid_until" class="col-md-4 col-form-label text-md-end text-start"><strong>Valid Until (Date):</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($offer->valid_until); ?>

                        </div>
                    </div>
                    
                        
                    
                    
                    <div class="row">
                        <label for="subtotal" class="col-md-4 col-form-label text-md-end text-start"><strong>Sub Total:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($offer->subtotal); ?>

                        </div>
                    </div>
                    <div class="row">
                        <label for="gst_amount" class="col-md-4 col-form-label text-md-end text-start"><strong>GST Amount:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($offer->gst_amount); ?>

                        </div>
                    </div>
                    <div class="row">
                        <label for="total_amount" class="col-md-4 col-form-label text-md-end text-start"><strong>Total Amount:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($offer->total_amount); ?>

                        </div>
                    </div>
                    
                    <div class="row">
                        <label for="offer_status" class="col-md-4 col-form-label text-md-end text-start"><strong>Offer Status:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($offer->offer_status); ?>

                        </div>
                    </div>
                    




            </div>
        </div>
    </div>    
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('offers.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pksso\sreeadhya\resources\views\offers\show.blade.php ENDPATH**/ ?>