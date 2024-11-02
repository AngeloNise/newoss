<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Applications Details PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { padding: 20px; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <div class="container">
        <h1>All Applications Details</h1>
        <table>
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Organization</th>
                    <th>Proposed Activity</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>College Branch</th>
                    <th>Total Estimated Income</th>
                    <th>Place of Activity</th>
                    <th>Status</th>
                    <th>File Location</th>
                    <th>Submission Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($application->name_of_project); ?></td>
                    <td><?php echo e($application->name_of_organization); ?></td>
                    <td><?php echo e($application->proposed_activity); ?></td>
                    <td><?php echo e($application->start_date); ?></td>
                    <td><?php echo e($application->end_date); ?></td>
                    <td><?php echo e($application->college_branch); ?></td>
                    <td><?php echo e($application->total_estimated_income); ?></td>
                    <td><?php echo e($application->place_of_activity); ?></td>
                    <td><?php echo e($application->status); ?></td>
                    <td><?php echo e($application->current_file_location); ?></td>
                    <td><?php echo e($application->submission_date); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php /**PATH D:\College\oss\resources\views/faculty/generatepdf/allapplicationspdf.blade.php ENDPATH**/ ?>