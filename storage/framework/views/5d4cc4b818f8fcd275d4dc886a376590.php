

<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Product Information
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="part_number" class="col-md-4 col-form-label text-md-end text-start"><strong>Part Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($product->part_number); ?>

                        </div>
                    </div>

                    <div class="row">
                        <label for="part_description" class="col-md-4 col-form-label text-md-end text-start"><strong>Part Description:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($product->part_description); ?>

                        </div>
                    </div>
                    <div class="row">
                        <label for="make" class="col-md-4 col-form-label text-md-end text-start"><strong>Make:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($product->make); ?>

                        </div>
                    </div>
                    <div class="row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start"><strong>Price:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($product->price); ?>

                        </div>
                    </div>
                    <div class="row">
                        <label for="uom" class="col-md-4 col-form-label text-md-end text-start"><strong>Unit Of Measurement:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($product->uom); ?>

                        </div>
                    </div>
                    
                    <div class="row">
                        <label for="hsn_code" class="col-md-4 col-form-label text-md-end text-start"><strong>HSN Code:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($product->hsn_code); ?>

                        </div>
                    </div>
                    <div class="row">
                        <label for="gst_rate" class="col-md-4 col-form-label text-md-end text-start"><strong>GST Rate:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($product->gst_rate); ?>

                        </div>
                    </div>

                    
        
            </div>
        </div>
    </div>    
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('products.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pksso\sreeadhya\resources\views\products\show.blade.php ENDPATH**/ ?>