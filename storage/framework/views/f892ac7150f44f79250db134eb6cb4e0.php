<?php $__env->startSection('content'); ?>

    <div class="application-detail-container">
        <a href="<?php echo e(route('faculty.faculty.applicationadmin')); ?>" class="btn btn-primary">Back</a>
        <h2>Application Details</h2>

        <form id="applicationForm" method="POST" action="<?php echo e(route('faculty.application.update', $application->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="application-info">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name of Project</th>
                            <th>Organization</th>
                            <th>Proposed Activity</th>
                            <th>Status</th>
                            <th>Current File Location</th>
                            <th>Submission Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo e($application->name_of_project); ?></td>
                            <td><?php echo e($application->name_of_organization); ?></td>
                            <td><?php echo e($application->proposed_activity); ?></td>

                            <!-- Editable Status Dropdown -->
                            <td>
                                <select name="status" id="status">
                                    <option value="Pending Approval" <?php echo e($application->status === 'pending approval' ? 'selected' : ''); ?>>Pending Approval</option>
                                    <option value="Approved" <?php echo e($application->status === 'Approved' ? 'selected' : ''); ?>>Approved</option>
                                    <option value="Rejected" <?php echo e($application->status === 'Rejected' ? 'selected' : ''); ?>>Rejected</option> <!-- Alternative to "denied" -->
                                </select>
                            </td>

                            <!-- Editable Current File Location Dropdown -->
                            <td>
                                <select name="current_file_location" id="current_file_location">
                                    <option value="OSS" <?php echo e($application->current_file_location === 'OSS' ? 'selected' : ''); ?>>OSS</option>
                                    <option value="Forwarded by OSS" <?php echo e($application->current_file_location === 'Forwarded by OSS' ? 'selected' : ''); ?>>Forwarded by OSS</option>
                                    <option value="Returned to OSS" <?php echo e($application->current_file_location === 'Returned to OSS' ? 'selected' : ''); ?>>Returned to OSS</option> <!-- Alternative phrasing -->
                                </select>
                            </td>

                            <td><?php echo e(\Carbon\Carbon::parse($application->submission_date)->format('Y-m-d')); ?></td> <!-- Submission Date Column -->
                        </tr>
                    </tbody>
                </table>
            </div>

            <button type="button" class="btn btn-success" onclick="confirmChanges()">Commit Changes</button>
        </form>

        
    </div>

    <script src="/js/faculty/applicationstatus.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/applicationadmindetails.blade.php ENDPATH**/ ?>