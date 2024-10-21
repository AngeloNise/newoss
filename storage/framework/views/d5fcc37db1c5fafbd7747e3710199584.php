<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(url('/faculty/Application')); ?>" class="button">Add Application</a>
    <div class="application-container">
        <a href="<?php echo e(url('/faculty/applications')); ?>" class="btn btn-secondary mb-3">Back</a>
        <h2>Application List</h2>
        
        <?php if($applications->isEmpty()): ?>
            <p>No applications submitted yet.</p>
        <?php else: ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name of Project</th>
                        <th>Organization</th>
                        <th>Proposed Activity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr onclick="window.location='<?php echo e(route('faculty.applications.show', $application->id)); ?>'" style="cursor:pointer;">
                        <td><?php echo e($application->name_of_project); ?></td>
                        <td><?php echo e($application->name_of_organization); ?></td>
                        <td><?php echo e($application->proposed_activity); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>    
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//faculty/auth/applicationadmin.blade.php ENDPATH**/ ?>