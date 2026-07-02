<form method="POST" action="<?php echo e(route('settings.update')); ?>" class="space-y-6">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <!-- Application Name -->
    <div>
        <label for="app_name">Application Name</label>
        <input type="text" id="app_name" name="app_name" value="<?php echo e(old('app_name', $setting->data['app_name'] ?? '')); ?>" required>
        <?php $__errorArgs = ['app_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <!-- Support Email -->
    <div>
        <label for="support_email">Support Email</label>
        <input type="email" id="support_email" name="support_email" value="<?php echo e(old('support_email', $setting->data['support_email'] ?? '')); ?>" required>
        <?php $__errorArgs = ['support_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <!-- Items Per Page -->
    <div>
        <label for="items_per_page">Items Per Page</label>
        <input type="number" id="items_per_page" name="items_per_page" value="<?php echo e(old('items_per_page', $setting->data['items_per_page'] ?? 15)); ?>" required>
        <?php $__errorArgs = ['items_per_page'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <!-- Maintenance Mode Toggle -->
    <div>
        <label for="maintenance_mode">Maintenance Mode</label>
        <select id="maintenance_mode" name="maintenance_mode">
            <option value="0" <?php echo e(old('maintenance_mode', $setting->data['maintenance_mode'] ?? 0) == 0 ? 'selected' : ''); ?>>Disabled</option>
            <option value="1" <?php echo e(old('maintenance_mode', $setting->data['maintenance_mode'] ?? 0) == 1 ? 'selected' : ''); ?>>Enabled</option>
        </select>
    </div>

    <button type="submit">Save Settings</button>
</form>
<?php /**PATH C:\Users\pksso\sreeadhya\resources\views\admin\settings\edit.blade.php ENDPATH**/ ?>