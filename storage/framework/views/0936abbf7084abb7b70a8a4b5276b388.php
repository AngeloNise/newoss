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
<?php
    $user = auth()->user();
    $existingApplication = \App\Models\AnnexA::where('email', $user->email)
        ->where('status', 'Pending Approval')
        ->exists();
?>

<div class="content-container">
    <h1>Pre-Evaluation</h1>
    <div class="activity-question">
        <p>What type of Activity?</p>
    </div>
      
    <div class="activity-buttons">
        <a href="<?php echo e(url('/FRA/Annex-A')); ?>" class="button <?php echo e($existingApplication ? 'disabled' : ''); ?>" 
           <?php echo e($existingApplication ? 'onclick="return false;""' : ''); ?>>
           <?php echo e($existingApplication ? 'Fund Raising Activity (One Pre-Evaluation at a time)' : 'Fund Raising Activity'); ?>

        </a>
        <a href="<?php echo e(url('/Off-Campus-Activity')); ?>" class="button">Off-Campus Activity</a>
    </div>
    
    <div class="note">
        <p>Note: Pre-Evaluation does not guarantee an approved Application. It helps checking all the requirements needed to have an approved activity.</p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/sidebar/preeval.blade.php ENDPATH**/ ?>