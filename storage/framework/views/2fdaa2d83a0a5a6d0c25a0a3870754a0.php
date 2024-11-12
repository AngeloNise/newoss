<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/faculty/application.css')); ?>">
<script src="<?php echo e(asset('js/faculty/application.js')); ?>"></script>

<div class="application-container">
    <a href="<?php echo e(route('faculty.application.create')); ?>" class="button">Add Application</a>
    <h2>Application List</h2>

    <!-- Search Bar -->
    <input type="text" id="searchBar" placeholder="Search..." class="search-bar" onkeyup="filterApplications()">

    
    <h3>Pending Approval Applications</h3>
    <?php
        $pendingApplications = $applications->filter(function ($application) {
            return $application->status === 'Pending Approval';
        })->sortBy(function ($application) {
            return [$application->created_at, $application->updated_at];
        });
    ?>

    <?php if($pendingApplications->isEmpty()): ?>
        <p>No pending approval applications.</p>
    <?php else: ?>
        <table class="table" id="pendingApplicationsTable">
            <thead>
                <tr>
                    <th>Name of Project</th>
                    <th>Organization</th>
                    <th>Proposed Activity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pendingApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr onclick="window.location='<?php echo e(route('faculty.applications.show', $application->id)); ?>'" style="cursor:pointer;">
                    <td><?php echo e($application->name_of_project); ?></td>
                    <td><?php echo e($application->name_of_organization); ?></td>
                    <td><?php echo e($application->proposed_activity); ?></td>
                    <td><?php echo e($application->status); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>

    
    <h3>Returned Applications</h3>
    <?php
        $returnedApplications = $applications->filter(function ($application) {
            return $application->status === 'Returned';
        })->sortBy(function ($application) {
            return [$application->created_at, $application->updated_at];
        });
    ?>

    <?php if($returnedApplications->isEmpty()): ?>
        <p>No returned applications.</p>
    <?php else: ?>
        <table class="table" id="returnedApplicationsTable">
            <thead>
                <tr>
                    <th>Name of Project</th>
                    <th>Organization</th>
                    <th>Proposed Activity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $returnedApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr onclick="window.location='<?php echo e(route('faculty.applications.show', $application->id)); ?>'" style="cursor:pointer;">
                    <td><?php echo e($application->name_of_project); ?></td>
                    <td><?php echo e($application->name_of_organization); ?></td>
                    <td><?php echo e($application->proposed_activity); ?></td>
                    <td><?php echo e($application->status); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>

    
    <h3>Approved Applications</h3>
    <?php
        $approvedApplications = $applications->filter(function ($application) {
            return $application->status === 'Approved';
        })->sortBy(function ($application) {
            return [$application->created_at, $application->updated_at];
        });
    ?>

    <?php if($approvedApplications->isEmpty()): ?>
        <p>No approved applications.</p>
    <?php else: ?>
        <table class="table" id="approvedApplicationsTable">
            <thead>
                <tr>
                    <th>Name of Project</th>
                    <th>Organization</th>
                    <th>Proposed Activity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $approvedApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr onclick="window.location='<?php echo e(route('faculty.applications.show', $application->id)); ?>'" style="cursor:pointer;">
                    <td><?php echo e($application->name_of_project); ?></td>
                    <td><?php echo e($application->name_of_organization); ?></td>
                    <td><?php echo e($application->proposed_activity); ?></td>
                    <td><?php echo e($application->status); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/applicationadmin.blade.php ENDPATH**/ ?>