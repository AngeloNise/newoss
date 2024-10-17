

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h2>Your Submitted Forms</h2>

        <?php if($applications->isEmpty()): ?>
            <p>No forms submitted yet.</p>
        <?php else: ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name of Project</th>
                        <th>Requesting Organization</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Total Estimated Income</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($application->name_of_project); ?></td>
                            <td><?php echo e($application->requesting_organization); ?></td>
                            <td><?php echo e($application->start_date); ?></td>
                            <td><?php echo e($application->end_date); ?></td>
                            <td><?php echo e($application->total_estimated_income); ?></td>
                            <td>
                                <a href="#" class="btn btn-primary">View</a>
                                <a href="#" class="btn btn-secondary">Download PDF</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/org/auth/sidebar/preevalpdf.blade.php ENDPATH**/ ?>