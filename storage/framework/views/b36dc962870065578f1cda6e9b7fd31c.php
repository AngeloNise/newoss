

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/orgs/applicationhistory.css')); ?>">
<div class="history-container">
    <h2>In Campus Application History</h2>

    
    <h3>Ongoing Applications (Pending Approval)</h3>
    <?php
        $pendingApplications = $applications->filter(function ($application) {
            return $application->status === 'Pending Approval';
        });
    ?>

    <?php if($pendingApplications->isEmpty()): ?>
        <p>No ongoing applications.</p>
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
                <?php $__currentLoopData = $pendingApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

    
    <h3>Recently Approved or Returned Application</h3>
    <?php
        // Get the most recent application that is either Approved or Returned, excluding ongoing applications
        $mostRecentApprovedOrReturned = $applications->filter(function ($application) use ($pendingApplications) {
            return in_array($application->status, ['Approved', 'Returned']) && 
                   !$pendingApplications->contains('id', $application->id);
        })->sortByDesc('updated_at')->first(); // Get the most recent one
    ?>

    <?php if(!$mostRecentApprovedOrReturned): ?>
        <p>No approved or returned applications.</p>
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
                <tr>
                    <td><?php echo e($mostRecentApprovedOrReturned->name_of_project); ?></td>
                    <td><?php echo e($mostRecentApprovedOrReturned->name_of_organization); ?></td>
                    <td><?php echo e($mostRecentApprovedOrReturned->proposed_activity); ?></td>
                    <td><?php echo e($mostRecentApprovedOrReturned->status); ?></td>
                    <td><?php echo e($mostRecentApprovedOrReturned->current_file_location); ?></td>
                    <td><?php echo e($mostRecentApprovedOrReturned->submission_date); ?></td>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>

    
    <h3>All Approved or Returned Applications</h3>
    <?php
        // Get all applications that are either Approved or Returned, excluding ongoing and the most recent one
        $allApprovedReturned = $applications->whereIn('status', ['Approved', 'Returned'])
            ->reject(function ($application) use ($pendingApplications, $mostRecentApprovedOrReturned) {
                return $pendingApplications->contains('id', $application->id) || 
                       ($mostRecentApprovedOrReturned && $mostRecentApprovedOrReturned->id === $application->id);
            })->sortByDesc('submission_date');
    ?>

    <?php if($allApprovedReturned->isEmpty()): ?>
        <p>No approved or returned applications.</p>
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
                <?php $__currentLoopData = $allApprovedReturned; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/org/auth/sidebar/history/icahistory.blade.php ENDPATH**/ ?>