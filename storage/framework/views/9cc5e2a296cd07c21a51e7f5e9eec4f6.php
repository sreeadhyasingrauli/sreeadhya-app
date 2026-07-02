<form method="POST" action="<?php echo e(route('password.update')); ?>">
    <?php echo csrf_field(); ?>

    <!-- Current Password -->
    <div>
        <label>Current Password</label>
        <input type="password" name="current_password" required>
        <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <!-- New Password -->
    <div>
        <label>New Password</label>
        <input type="password" name="password" required>
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <!-- Confirm New Password -->
    <div>
        <label>Confirm New Password</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <button type="submit">Update Password</button>
</form>
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\auth\change-password.blade.php ENDPATH**/ ?>