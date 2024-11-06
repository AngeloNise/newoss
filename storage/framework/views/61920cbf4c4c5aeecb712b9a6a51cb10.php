<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/faculty/preevalforms.css')); ?>">

<div class="content-container">
    <h1>Post Activity Report</h1>
    <div class="activity-question">
        <p>What type of Activity?</p>
    </div>
    <div class="activity-buttons">
        <a href="<?php echo e(url('/faculty/Post-Activity-FRA')); ?>" class="button">Fund Raising Activity</a>
        <a href="<?php echo e(url('/faculty/Off-Campus-PostActivity')); ?>" class="button">Off-Campus Activity</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//faculty/auth/postreport.blade.php ENDPATH**/ ?>