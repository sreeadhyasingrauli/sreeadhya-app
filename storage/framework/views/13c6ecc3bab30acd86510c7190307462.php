


<?php $__env->startSection('content'); ?>




<div class="row justify-content-center mt-5">
    <div class="col-md-8">


        <div class="container my-5">
            <div class="border rounded p-4">
                <h3 class="text-center mb-4">Admin Home Page</h3>
                   
                        <?php if($message = Session::get('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e($message); ?>

                            </div>
                        <?php endif; ?>    
            </div>
        </div>
    </div>    
</div>
   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pksso\sreeadhya\resources\views\admin\dashboard4.blade.php ENDPATH**/ ?>