<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sree Adhya Traders</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <style type="text/css">
    body{      background: #F8F9FA;    }
     .company-name { font-size: 24px; font-weight: bold; color: #1e293b; }
  </style>
</head>
<body>
    <h2> Login</h2>

    <?php if($errors->any()): ?>
        <div style="color: red;">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('login.post')); ?>">
        <?php echo csrf_field(); ?> 
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo e(old('email')); ?>" required>
        </div>
        <br>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\admin\login1.blade.php ENDPATH**/ ?>