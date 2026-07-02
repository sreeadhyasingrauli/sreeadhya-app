<!DOCTYPE html>
<html>
   <head>
      <title>Sree Adhya Traders - Multiple File Upload</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
         <div class="panel panel-primary">
            <div class="panel-heading mb-3 mt-5">
               <h2>Sree Adhya Traders - Multiple File Upload</h2>
            </div>
            <div class="panel-body">
               <?php if($message = Session::get('success')): ?>
                   <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong><?php echo e($message); ?></strong>
                   </div>
               <?php endif; ?>
 
               <?php if(count($errors) > 0): ?>
               <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.
                  <ul>
                     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <li><?php echo e($error); ?></li>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
               </div>
               <?php endif; ?>
 
               <form action="<?php echo e(route('store.multiple-files')); ?>" method="POST" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <div class="row">
                     <div class="mb-3 col-md-6">
                        <label class="form-label">Select Files:</label>
                        <input type="file" name="documents[]" class="form-control" multiple/>
                     </div>
 
                     <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Upload Files...</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </body>
</html><?php /**PATH C:\Users\pksso\sreeadhya\resources\views\multiple-file-upload.blade.php ENDPATH**/ ?>