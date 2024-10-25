<?php $__env->startSection('content'); ?>
<div class="content-container">
    <h1>Pre Evaluation</h1>
    <div class="activity-question">
        <p>What type of Activity?</p>
    </div>
    <div class="activity-buttons">
        <a href="<?php echo e(url('/Fund-Raising')); ?>" class="button">Fund Raising Activity</a>
        <a href="<?php echo e(url('/In-Campus-Activity')); ?>" class="button">In-Campus Activity</a>
        <a href="<?php echo e(url('/Off-Campus-Activity')); ?>" class="button">Off-Campus Activity</a>
    </div>
    <div class="note">
        <p>Note: Pre Evaluation doesn’t guarantee an approved Evaluation. It just helps to check if you have all the requirements needed to have an approved activity.</p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\newoss-main\resources\views//org/auth/sidebar/preeval.blade.php ENDPATH**/ ?>