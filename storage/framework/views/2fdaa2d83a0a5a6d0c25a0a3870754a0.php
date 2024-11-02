<?php $__env->startSection('content'); ?>
    
    <div class="application-container">
        <a href="<?php echo e(route('faculty.application.create')); ?>" class="button">Add Application</a>
        <h2>Application List</h2>

        <!-- Search Bar -->
        <input type="text" id="searchBar" placeholder="Search..." class="search-bar" onkeyup="filterApplications()">

        <?php if($applications->isEmpty()): ?>
            <p>No applications submitted yet.</p>
        <?php else: ?>
            <table class="table" id="applicationsTable">
                <thead>
                    <tr>
                        <th>Name of Project</th>
                        <th>Organization</th>
                        <th>Proposed Activity</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
    <link rel="stylesheet" href="/css/faculty/application.css">
    <script src="/js/faculty/application.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/applicationadmin.blade.php ENDPATH**/ ?>