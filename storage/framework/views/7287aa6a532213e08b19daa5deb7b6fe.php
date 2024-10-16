
<?php $__env->startSection('content'); ?>

<div class="fra-container">
    <a href="http://127.0.0.1:8000/faculty/FRA-Evaluation" class="btn btn-secondary mb-3">Back</a>
    <h2>FRA Evaluation Applications</h2>
    

    <?php if($applications->isEmpty()): ?>
        <p>No applications submitted for evaluation yet.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Name of Project</th>
                    <th>Organization</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Total Estimated Income</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr onclick="window.location='<?php echo e(route('faculty.fra-a-evaluation.show', $application->id)); ?>'" style="cursor:pointer;">
                    <td><?php echo e($application->name_of_project); ?></td>
                    <td><?php echo e($application->requesting_organization); ?></td>
                    <td><?php echo e($application->start_date); ?></td>
                    <td><?php echo e($application->end_date); ?></td>
                    <td><?php echo e($application->total_estimated_income); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>    
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/fraeval/fra-a-evaluation.blade.php ENDPATH**/ ?>