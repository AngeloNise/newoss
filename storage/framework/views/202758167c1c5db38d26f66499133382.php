<?php $__env->startSection('content'); ?>
    <div class="notification-container">
        <div class="notification">
            <?php if($notifications->isEmpty()): ?>
                <p>No new notifications.</p>
            <?php else: ?>
                <ul>
                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li onclick="window.location='<?php echo e(route('faculty.fra-a-evaluation.show', $notification['id'])); ?>'" style="cursor:pointer;">
                            <p><?php echo e($notification['message']); ?> - <?php echo e($notification['time']); ?></p>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <hr>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/dbadmin.blade.php ENDPATH**/ ?>