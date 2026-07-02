

<?php $__env->startSection('content'); ?>

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Order Information
                </div>
                <div class="float-end">
                    <a href="<?php echo e(route('orders.index')); ?>" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                    
                    <div class="row">
                        <label for="po_number" class="col-md-4 col-form-label text-md-end text-start"><strong>PO Number:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($order->po_number); ?>

                        </div>
                    </div>
                    <div class="row">
                        <label for="grand_total" class="col-md-4 col-form-label text-md-end text-start"><strong>Grand Total:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($order->grand_total); ?>

                        </div>
                    </div>
                    
                        
                    
                    
                    <div class="row">
                        <label for="status" class="col-md-4 col-form-label text-md-end text-start"><strong>Status :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($order->status); ?>

                        </div>
                    </div>
                    <div class="row">
                        <label for="shipping_address" class="col-md-4 col-form-label text-md-end text-start"><strong>Shipping Address:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <?php echo e($order->shipping_address); ?>

                        </div>
                    </div>
                    
                    




            </div>
        </div>
    </div>    
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('orders.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pksso\sreeadhya\resources\views\orders\show.blade.php ENDPATH**/ ?>