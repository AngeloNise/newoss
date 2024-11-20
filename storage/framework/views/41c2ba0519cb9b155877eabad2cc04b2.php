<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/faculty/postactfra.css')); ?>">
<script src="<?php echo e(asset('js/faculty/postactfra.js')); ?>"></script> <!-- Link to the JS file -->

<div class="content-container">
    <h1>Post Activity Report/Untagging</h1>

    <!-- Search Bar -->
    <input type="text" id="searchBar" placeholder="Search Activity Report..." class="search-bar" onkeyup="filterApplications()">

    <!-- Not Submitted Section -->
    <h2>Not Submitted</h2>
    <table id="notSubmittedTable">
        <thead>
            <tr>
                <th>Organization Name</th>
                <th>Name of Project</th>
                <th>Activity Report</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $approvedApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($application->status == 'not_submitted'): ?>
            <tr>
                <td><?php echo e($application->name_of_organization); ?></td>
                <td><?php echo e($application->name_of_project); ?></td> <!-- Fix the closing </td> -->
                <td>
                    <!-- Dropdown for 'frapost' status -->
                    <form action="<?php echo e(route('faculty.updateFrapost', $application->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <select name="frapost" onchange="this.form.submit()">
                            <option value="not_submitted" <?php echo e($application->frapost == 'not_submitted' ? 'selected' : ''); ?>>Not Submitted</option>
                            <option value="submitted" <?php echo e($application->frapost == 'submitted' ? 'selected' : ''); ?>>Submitted</option>
                        </select>
                    </form>
                </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <!-- Submitted Section -->
    <h2>Submitted</h2>
    <table id="submittedTable">
        <thead>
            <tr>
                <th>Organization Name</th>
                <th>Name of Project</th>
                <th>Activity Report</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $approvedApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($application->frapost == 'submitted'): ?>
            <tr>
                <td><?php echo e($application->name_of_organization); ?></td>
                <td><?php echo e($application->name_of_project); ?></td> <!-- Fix the closing </td> -->
                <td>
                    <!-- Dropdown for 'frapost' status -->
                    <form action="<?php echo e(route('faculty.updateFrapost', $application->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <select name="frapost" onchange="this.form.submit()">
                            <option value="not_submitted" <?php echo e($application->frapost == 'not_submitted' ? 'selected' : ''); ?>>Not Submitted</option>
                            <option value="submitted" <?php echo e($application->frapost == 'submitted' ? 'selected' : ''); ?>>Submitted</option>
                        </select>
                    </form>
                </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/postreportfra.blade.php ENDPATH**/ ?>