

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/faculty/offcampuseval/annex-a.css')); ?>">

<div class="application-detail-container">
    <h2>All Submissions</h2>

    <?php if($submissions->isNotEmpty()): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name of Activity</th>
                    <th>Place of Activity</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Participants</th>
                    <th>Campus/College/Org</th>
                    <th>Attached Files</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $submissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($submission->id); ?></td>
                    <td><?php echo e($submission->name_of_activity); ?></td>
                    <td><?php echo e($submission->place_of_activity); ?></td>
                    <td><?php echo e($submission->start_date); ?></td>
                    <td><?php echo e($submission->end_date); ?></td>
                    <td><?php echo e($submission->number_of_participants); ?></td>
                    <td><?php echo e($submission->campus_college_org); ?></td>
                    <td>
                        <a href="<?php echo e(route('faculty.offcampus.annex.a.show', $submission->id)); ?>" class="btn btn-primary">View Details</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No submissions found.</p>
    <?php endif; ?>
</div>

<script>
    function previewAttachment(filePath, label) {
        // Check if the file is a PDF
        if (!filePath.endsWith('.pdf')) {
            alert('The file "' + label + '" is not a PDF and cannot be previewed.');
            return;
        }

        // If it is a PDF, open it in a new tab
        window.open('<?php echo e(url('/')); ?>/' + filePath, '_blank');
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/offcampuseval/offcampusannexa.blade.php ENDPATH**/ ?>