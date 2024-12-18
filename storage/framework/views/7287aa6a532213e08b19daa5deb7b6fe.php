<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/faculty/preevallist.css')); ?>">
<script src="<?php echo e(asset('js/faculty/preeval.js')); ?>"></script> <!-- Link to the JS file -->

<div class="fra-container">
    <a href="<?php echo e(url('/faculty/Pre-Evaluation-Status')); ?>" class="btn btn-secondary mb-3">Back</a>
    <h2>FRA Evaluation Applications</h2>

    <form method="GET" action="<?php echo e(url()->current()); ?>" class="search-form mb-3">
        <input 
            type="text" 
            id="searchBar" 
            name="search" 
            placeholder="Search by project name or organization..." 
            class="search-bar" 
            value="<?php echo e(request('search')); ?>">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>    

    <!-- Pending Approval Applications -->
    <h3>Pending Approval</h3>
    <?php if($pendingApprovalApplications->isEmpty()): ?>
        <p>No applications pending approval.</p>
    <?php else: ?>
        <table class="table" id="pendingApprovalTable">
            <thead>
                <tr>
                    <th>Name of Project</th>
                    <th>Organization</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Total Estimated Income</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pendingApprovalApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr onclick="window.location='<?php echo e(route('faculty.fra-a-evaluation.show', $application->id)); ?>'" style="cursor:pointer;">
                    <td><?php echo e($application->name_of_project); ?></td>
                    <td><?php echo e($application->requesting_organization); ?></td>
                    <td><?php echo e($application->start_date); ?></td>
                    <td><?php echo e($application->end_date); ?></td>
                    <td><?php echo e($application->status); ?></td>
                    <td><?php echo e($application->total_estimated_income); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="pagination-container">
            <?php echo e($pendingApprovalApplications->appends(request()->except('pending_page'))->links('pagination::simple-bootstrap-4')); ?>

        </div>
    <?php endif; ?>

    <!-- Returned Applications -->
    <h3>Returned</h3>
    <?php if($returnedApplications->isEmpty()): ?>
        <p>No applications returned.</p>
    <?php else: ?>
        <table class="table" id="returnedApplicationsTable">
            <thead>
                <tr>
                    <th>Name of Project</th>
                    <th>Organization</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Total Estimated Income</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $returnedApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr onclick="window.location='<?php echo e(route('faculty.fra-a-evaluation.show', $application->id)); ?>'" style="cursor:pointer;">
                    <td><?php echo e($application->name_of_project); ?></td>
                    <td><?php echo e($application->requesting_organization); ?></td>
                    <td><?php echo e($application->start_date); ?></td>
                    <td><?php echo e($application->end_date); ?></td>
                    <td><?php echo e($application->status); ?></td>
                    <td><?php echo e($application->total_estimated_income); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="pagination-container">
            <?php echo e($returnedApplications->appends(request()->except('returned_page'))->links('pagination::simple-bootstrap-4')); ?>

        </div>
    <?php endif; ?>

    <!-- Approved Applications -->
    <h3>Approved</h3>
    <?php if($approvedApplications->isEmpty()): ?>
        <p>No applications approved yet.</p>
    <?php else: ?>
        <table class="table" id="approvedApplicationsTable">
            <thead>
                <tr>
                    <th>Name of Project</th>
                    <th>Organization</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Total Estimated Income</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $approvedApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr onclick="window.location='<?php echo e(route('faculty.fra-a-evaluation.show', $application->id)); ?>'" style="cursor:pointer;">
                    <td><?php echo e($application->name_of_project); ?></td>
                    <td><?php echo e($application->requesting_organization); ?></td>
                    <td><?php echo e($application->start_date); ?></td>
                    <td><?php echo e($application->end_date); ?></td>
                    <td><?php echo e($application->status); ?></td>
                    <td><?php echo e($application->total_estimated_income); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="pagination-container">
            <?php echo e($approvedApplications->appends(request()->except('approved_page'))->links('pagination::simple-bootstrap-4')); ?>

        </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/fraeval/fra-a-evaluation.blade.php ENDPATH**/ ?>