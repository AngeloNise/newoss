<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/faculty/offcampuseval/annex-a-view.css')); ?>">




<div class="application-container">
<a href="<?php echo e(url('/faculty/Off-Campus-Evaluation')); ?>" class="btn back-btn-primary">Back</a>
    <h2>Submission Details</h2>


<div class="org_info">
    <form id="status-update-form" class="mb-4">
        <div class="form-group">
            <label for="status">Update Status</label>
            <select id="status" class="form-control" required>
                <option value="" disabled selected>Select new status</option>
                <option value="Pending Approval">Pending Approval</option>
                <option value="Approved">Approved</option>
                <option value="Returned">Returned</option>
            </select>
            <div class="split">
                <button type="button" class="btn btn-primary">Update Status</button>
                <a href="<?php echo e(route('faculty.faculty.offcampus.annex-a.evaluate', ['id' => $submission->id])); ?>" class="btn btn-secondary">Evaluate</a>
            </div>
        </div>

    <?php if(session('success')): ?>
        <div class="alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert-danger">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <table class="details-table">
        <tbody>
            <tr>
                <td><strong>Name of Activity:</strong> <?php echo e($submission->name_of_activity); ?></td>
                <td><strong>Place of Activity:</strong> <?php echo e($submission->place_of_activity); ?></td>
                <td><strong>Start Date:</strong> <?php echo e($submission->start_date); ?></td>
            </tr>
            <tr>
                <td><strong>End Date:</strong> <?php echo e($submission->end_date); ?></td>
                <td><strong>Number of Participants:</strong> <?php echo e($submission->number_of_participants); ?></td>
                <td><strong>Campus/College/Organization:</strong> <?php echo e($submission->campus_college_org); ?></td>
            </tr>
        </tbody>
    </table>

    <h4>Attachments</h4>
    <table class="attachments-table">
        <tbody>
            <?php
                $attachmentLabels = [
                    'Letter of Intent',
                    'Invitation/Acceptance Letter',
                    'Endorsement Letter',
                    'Program of Activities',
                    'Summary List of Participants',
                    'Latest Certificate of Registration',
                    'Curriculum Copy (For Curricular Activities)'
                ];
            ?>

            <?php for($i = 1; $i <= 7; $i++): ?>
                <?php 
                    $attachment = "attachment{$i}_path"; 
                ?>
                <tr>
                    <td>
                        <strong><?php echo e($attachmentLabels[$i - 1]); ?>:</strong> 
                        <?php if($submission->$attachment): ?>
                        <a href="<?php echo e(route('faculty.preApproval.download', ['id' => $submission->id, 'attachmentNumber' => $i])); ?>" target="_blank">View File</a>
                        <?php else: ?>
                            Not provided
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endfor; ?>

        </tbody>
    </table>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/offcampuseval/annexashow.blade.php ENDPATH**/ ?>