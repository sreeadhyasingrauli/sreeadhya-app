<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://jsdelivr.net">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="#">Control Center</a>
        <form action="<?php echo e(route('admin.logout')); ?>" method="POST" class="d-inline">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-outline-light btn-sm">Log Out</button>
        </form>
    </nav>
    <div class="container mt-5">
        <div class="card p-5 shadow-sm bg-white">
            <h2>Welcome Back, <?php echo e(Auth::user()->name); ?>!</h2>
            <p>You have successfully logged into the administrative zone.</p>
        </div>
    </div>
</body>
</html>

<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\admin\dashboard2.blade.php ENDPATH**/ ?>