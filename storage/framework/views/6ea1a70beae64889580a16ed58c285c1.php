

<?php $__env->startSection('content'); ?>

<div class="history-container">
    <h2>In Campus Application History</h2>

    <?php if($applications->isEmpty()): ?>
        <p>No in campus applications found.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Name of Project</th>
                    <th>Name of Organization</th>
                    <th>Proposed Activity</th>
                    <th>Status</th>
                    <th>Current File Location</th>
                    <th>Submission Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($application->name_of_project); ?></td>
                    <td><?php echo e($application->name_of_organization); ?></td>
                    <td><?php echo e($application->proposed_activity); ?></td>
                    <td><?php echo e($application->status); ?></td>
                    <td><?php echo e($application->current_file_location); ?></td>
                    <td><?php echo e($application->submission_date); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/sidebar/history/icahistory.blade.php ENDPATH**/ ?>