

<?php $__env->startSection('content'); ?>
<div class="application-container">
    <h2>Submission Details</h2>
    
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

    <div class="activity-buttons">
        <a href="<?php echo e(route('faculty.offcampus.annex.a.index')); ?>" class="btn btn-secondary">Back to Submissions</a>
    </div>
</div>

<link rel="stylesheet" href="/css/faculty/offcampuseval/annex-a-view.css">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/offcampuseval/annexashow.blade.php ENDPATH**/ ?>