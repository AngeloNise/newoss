<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/orgs/pdf/evalpdf.css')); ?>">
<div class="fra-container mt-4">
    <h2>Your Submitted Forms</h2>
    <br><br>
    <h2>Fund-Raising Applications</h2>

    
    <h3>Ongoing Applications (Pending Approval)</h3>
    <?php
        $pendingApplications = $applications->filter(function ($application) {
            return $application->status === 'Pending Approval';
        });
    ?>

    <?php if($pendingApplications->isEmpty()): ?>
        <p>No ongoing applications.</p>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Name of Project</th>
                    <th scope="col">Requesting Organization</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Total Estimated Income</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pendingApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?>).</td>
                        <td><?php echo e($application->name_of_project); ?></td>
                        <td><?php echo e($application->requesting_organization); ?></td>
                        <td><?php echo e($application->start_date); ?></td>
                        <td><?php echo e($application->end_date); ?></td>
                        <td><?php echo e($application->total_estimated_income); ?></td>
                        <td><?php echo e($application->status); ?></td>
                        <td>
                            <button onclick="window.location='<?php echo e(route('org.fra-a-evaluation.show', $application->id)); ?>'" class="btn btn-primary">View</button>
                            <?php if($application->status === 'Approved'): ?>
                                <a href="<?php echo e(route('generate-pdf', ['id' => $application->id])); ?>" class="btn btn-secondary" target="_blank">PDF</a>
                            <?php else: ?>
                                <div class="border p-2 text-muted" style="border-radius: 5px;">
                                    PDF available once approved
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>

    
    <h3>Recently Approved or Returned Application</h3>
    <?php
        $mostRecentApprovedOrReturned = $applications->filter(function ($application) {
            return in_array($application->status, ['Approved', 'Returned']);
        })->sortByDesc('updated_at')->first();
    ?>

    <?php if(!$mostRecentApprovedOrReturned): ?>
        <p>No approved or returned applications.</p>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Name of Project</th>
                    <th scope="col">Requesting Organization</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Total Estimated Income</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1).</td>
                    <td><?php echo e($mostRecentApprovedOrReturned->name_of_project); ?></td>
                    <td><?php echo e($mostRecentApprovedOrReturned->requesting_organization); ?></td>
                    <td><?php echo e($mostRecentApprovedOrReturned->start_date); ?></td>
                    <td><?php echo e($mostRecentApprovedOrReturned->end_date); ?></td>
                    <td><?php echo e($mostRecentApprovedOrReturned->total_estimated_income); ?></td>
                    <td><?php echo e($mostRecentApprovedOrReturned->status); ?></td>
                    <td>
                        <button onclick="window.location='<?php echo e(route('org.fra-a-evaluation.show', $mostRecentApprovedOrReturned->id)); ?>'" class="btn btn-primary">View</button>
                        <?php if($mostRecentApprovedOrReturned->status === 'Approved'): ?>
                            <a href="<?php echo e(route('generate-pdf', ['id' => $mostRecentApprovedOrReturned->id])); ?>" class="btn btn-secondary" target="_blank">PDF</a>
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>

    
    <h3>All Approved or Returned Applications</h3>
    <?php
        $allApprovedReturned = $applications->whereIn('status', ['Approved', 'Returned'])->sortByDesc('updated_at');

        $recentId = $mostRecentApprovedOrReturned ? $mostRecentApprovedOrReturned->id : null;
        if ($recentId) {
            $allApprovedReturned = $allApprovedReturned->where('id', '!=', $recentId);
        }
    ?>

    <?php if($allApprovedReturned->isEmpty()): ?>
        <p>No approved or returned applications.</p>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Name of Project</th>
                    <th scope="col">Requesting Organization</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Total Estimated Income</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $allApprovedReturned; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?>).</td>
                        <td><?php echo e($application->name_of_project); ?></td>
                        <td><?php echo e($application->requesting_organization); ?></td>
                        <td><?php echo e($application->start_date); ?></td>
                        <td><?php echo e($application->end_date); ?></td>
                        <td><?php echo e($application->total_estimated_income); ?></td>
                        <td><?php echo e($application->status); ?></td>
                        <td>
                            <button onclick="window.location='<?php echo e(route('org.fra-a-evaluation.show', $application->id)); ?>'" class="btn btn-primary">View</button>
                            <?php if($application->status === 'Approved'): ?>
                                <a href="<?php echo e(route('generate-pdf', ['id' => $application->id])); ?>" class="btn btn-secondary" target="_blank">PDF</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/org/auth/sidebar/preevalpdf.blade.php ENDPATH**/ ?>