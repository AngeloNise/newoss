<?php $__env->startSection('content'); ?>

<div class="application-detail-container">
    <a href="<?php echo e(route('faculty.application.admin')); ?>" class="btn btn-primary">Back</a>
    <h2>Application Details</h2>
    <a href="<?php echo e(route('faculty.applications.comments.create', $application->id)); ?>" class="btn btn-secondary">Add Comment</a>
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
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo e($application->name_of_project); ?></td>
                        <td><?php echo e($application->name_of_organization); ?></td>
                        <td><?php echo e($application->proposed_activity); ?></td>
                        
                        <td>
                            <input type="date" name="start_date" value="<?php echo e($application->start_date); ?>" class="form-control">
                        </td>

                        <td>
                            <input type="date" name="end_date" value="<?php echo e($application->end_date); ?>" class="form-control">
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table">
                <thead>
                    <tr>
                        <th>College Branch</th>
                        <th>Total Estimated Income</th>
                        <th>Status</th>
                        <th>Current File Location</th>
                        <th>Submission Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="college_branch" value="<?php echo e($application->college_branch); ?>" class="form-control">
                        </td>

                        <td>
                            <input type="number" name="total_estimated_income" value="<?php echo e($application->total_estimated_income); ?>" step="0.01" class="form-control">
                        </td>

                        <td>
                            <select name="status" id="status" class="form-control">
                                <option value="Pending Approval" <?php echo e($application->status === 'pending approval' ? 'selected' : ''); ?>>Pending Approval</option>
                                <option value="Approved" <?php echo e($application->status === 'Approved' ? 'selected' : ''); ?>>Approved</option>
                                <option value="Returned" <?php echo e($application->status === 'Returned' ? 'selected' : ''); ?>>Returned</option>
                            </select>
                        </td>

                        <td>
                            <select name="current_file_location" id="current_file_location" class="form-control">
                                <option value="OSS" <?php echo e($application->current_file_location === 'OSS' ? 'selected' : ''); ?>>OSS</option>
                                <option value="Forwarded by OSS" <?php echo e($application->current_file_location === 'Forwarded by OSS' ? 'selected' : ''); ?>>Forwarded by OSS</option>
                                <option value="Returned to OSS" <?php echo e($application->current_file_location === 'Returned to OSS' ? 'selected' : ''); ?>>Returned to OSS</option>
                            </select>
                        </td>

                        <td><?php echo e(\Carbon\Carbon::parse($application->submission_date)->format('Y-m-d')); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <button type="button" class="btn btn-success" onclick="confirmChanges()">Save</button>
    </form>
</div>
<link rel="stylesheet" href="/css/faculty/applicationdetails.css">
<script src="/js/faculty/applicationstatus.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/applicationadmindetails.blade.php ENDPATH**/ ?>