
<?php $__env->startSection('content'); ?>
<div class="content-container">
    <h1>Evaluation Form</h1>
    <div class="activity-question">
        <p>What type of Activity?</p>
    </div>
    <div class="activity-buttons">
        <a href="<?php echo e(url('/faculty/FRA-Evaluation')); ?>" class="button">Fund Raising Activity</a>
        <a href="<?php echo e(url('/faculty/In-Campus-Evaluation')); ?>" class="button">In-Campus Activity</a>
        <a href="<?php echo e(url('/faculty/Off-Campus-Evaluation')); ?>" class="button">Off-Campus Activity</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//faculty/auth/preevalstatus.blade.php ENDPATH**/ ?>