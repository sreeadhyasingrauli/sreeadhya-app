

<?php $__env->startSection('content'); ?>
<div>
    <h1>Part Master Registry</h1>
    <a href="<?php echo e(route('parts.create')); ?>">Add New Part</a>

    <?php if(session('success')): ?>
        <p style="color: green;"><?php echo e(session('success')); ?></p>
    <?php endif; ?>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Part Number</th>
                <th>Part Description</th>
                <th>Make</th>
                <th>Unit Of Measurement</th>
                <th>Price</th>
                <th>HSN Code</th>
                <th>GST Rate</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($part->part_number); ?></td>
                <td><?php echo e($part->part_description); ?></td>
                <td><?php echo e($part->make); ?></td>
                <td><?php echo e($part->uom); ?></td>
                <td>$<?php echo e(number_format($part->price, 2)); ?></td>
                <td><?php echo e($part->hsn_code); ?></td>
                <td>$<?php echo e(number_format($part->gst_rate, 2)); ?></td>
                <td>
                    <a href="<?php echo e(route('parts.edit', $part->part_number)); ?>">Edit</a> | 
                    <form action="<?php echo e(route('parts.destroy', $part->part_number)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($parts->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('parts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\pksso\sreeadhya\resources\views\parts\index.blade.php ENDPATH**/ ?>