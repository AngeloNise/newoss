

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="/public/css/orgs/applicationhistory.css">




<link rel="stylesheet" href="/css/orgs/fraeval/annexa.css">
<link rel="stylesheet" href="/css/orgs/applicationhistory.css">
<link rel="stylesheet" href="/css/test.css">
<div class="history-container">
    <h2>Fund Raising Application History</h2>

    <?php if($applications->isEmpty()): ?>
        <p>No fund raising applications found.</p>
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
                <tr onclick="window.location='<?php echo e(url('Fund-Raising-History/applications/'.$application->id.'/comments')); ?>'" style="cursor: pointer;">
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

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/org/auth/sidebar/history/frahistory.blade.php ENDPATH**/ ?>