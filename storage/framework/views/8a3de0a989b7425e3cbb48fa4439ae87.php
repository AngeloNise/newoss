
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/orgs/preeval.css')); ?>">

<?php if(Session::has('success')): ?>
    <script>
        window.flashMessage = {
            message: "<?php echo e(Session::get('success')); ?>",
            type: "success"
        };
    </script>
<?php endif; ?>

<div class="content-container">
    <a href="<?php echo e(url('/Pre-Evaluation')); ?>" class="btn btn-primary">Back</a>
    <h1>Submitted Forms</h1>
    <div class="activity-buttons">
        <!-- Check if a Fund Raising application exists and isn't returned or submitted, or if the user has a pending AnnexA application -->
        <a href="<?php echo e(url('/Fund-Raising-SF')); ?>" class="button">Fund Raising Activity</a>
        <a href="<?php echo e(url('/Off-Campus-Activity-SF')); ?>" class="button">Off-Campus Activity</a>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/sidebar/submittedforms.blade.php ENDPATH**/ ?>