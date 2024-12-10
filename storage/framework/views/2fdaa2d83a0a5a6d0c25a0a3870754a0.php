<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/faculty/application.css')); ?>">
<script src="<?php echo e(asset('js/faculty/application.js')); ?>"></script>

<div class="application-container">
    <a href="<?php echo e(route('faculty.application.create')); ?>" class="button">Add Application</a>

    <form method="GET" action="<?php echo e(route('faculty.application.admin')); ?>" class="search-form mb-3">
        <input 
            type="text" 
            id="searchBar" 
            name="search" 
            value="<?php echo e(request()->get('search')); ?>" 
            placeholder="Search by Project Name or Organization..." 
            class="search-bar">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>     

    <h2>Application List</h2>

    
    <h3>Pending Approval Applications</h3>
    <?php if($pendingApplications->isEmpty()): ?>
        <p>No pending approval applications found.</p>
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
        <div class="pagination-container">
            <?php echo e($pendingApplications->appends([
                'search' => request()->get('search'),
                'pending_page' => request()->get('pending_page'),
                'returned_page' => request()->get('returned_page'),
                'approved_page' => request()->get('approved_page')
            ])->links('pagination::simple-bootstrap-4')); ?>

        </div>
    <?php endif; ?>

    
    <h3>Returned Applications</h3>
    <?php if($returnedApplications->isEmpty()): ?>
        <p>No returned applications found.</p>
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
        <div class="pagination-container">
            <?php echo e($returnedApplications->appends([
                'search' => request()->get('search'),
                'pending_page' => request()->get('pending_page'),
                'returned_page' => request()->get('returned_page'),
                'approved_page' => request()->get('approved_page')
            ])->links('pagination::simple-bootstrap-4')); ?>

        </div>
    <?php endif; ?>

    
    <h3>Approved Applications</h3>
    <?php if($approvedApplications->isEmpty()): ?>
        <p>No approved applications found.</p>
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
        <div class="pagination-container">
            <?php echo e($approvedApplications->appends([
                'search' => request()->get('search'),
                'pending_page' => request()->get('pending_page'),
                'returned_page' => request()->get('returned_page'),
                'approved_page' => request()->get('approved_page')
            ])->links('pagination::simple-bootstrap-4')); ?>

        </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/applicationadmin.blade.php ENDPATH**/ ?>