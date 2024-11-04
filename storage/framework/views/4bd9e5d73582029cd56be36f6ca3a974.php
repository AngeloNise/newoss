

<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="/css/orgs/pdf/evalpdf.css">
    <div class="fra-container mt-4">
        <h2>Your Submitted Forms</h2>

        <?php if($applications->isEmpty()): ?>
            <p>No forms submitted yet.</p>
        <?php else: ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name of Project</th>
                        <th>Requesting Organization</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Total Estimated Income</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?>).</td>
                            <td><?php echo e($application->name_of_project); ?></td>
                            <td><?php echo e($application->requesting_organization); ?></td>
                            <td><?php echo e($application->start_date); ?></td>
                            <td><?php echo e($application->end_date); ?></td>
                            <td><?php echo e($application->total_estimated_income); ?></td>
                            <td><?php echo e($application->status); ?></td>
                            <td>
                                <div class="split">
                                    <button onclick="window.location='<?php echo e(route('org.fra-a-evaluation.show', $application->id)); ?>'" class="btn btn-primary">
                                        View
                                    </button>
                                    <?php if($application->status === 'Approved'): ?>
                                        <a href="<?php echo e(route('generate-pdf', ['id' => $application->id])); ?>" class="btn btn-secondary" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 5px;">
                                                <path d="M12 3v9m0 0l3-3m-3 3l-3-3M4 21h16" />
                                            </svg>
                                            PDF
                                        </a>
                                    <?php else: ?>
                                        <div class="border p-2 text-muted" style="border-radius: 5px;">
                                            PDF will be available once approved
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/org/auth/sidebar/preevalpdf.blade.php ENDPATH**/ ?>