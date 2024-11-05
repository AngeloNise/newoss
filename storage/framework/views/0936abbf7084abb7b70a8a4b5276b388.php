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

    // Check for pending applications in AnnexA
    $existingPendingApplication = \App\Models\AnnexA::where('email', $user->email)
        ->where('status', 'Pending Approval')
        ->exists();

    // Check for applications that are not returned and are 'Fund Raising'
    $existingApplication = \App\Models\Application::where('name_of_organization', $user->name_of_organization)
        ->where('status', '!=', 'Returned') // Only check for statuses that are not 'Returned'
        ->where('proposed_activity', 'Fund Raising') // Check if the proposed activity is 'Fund Raising'
        ->exists();
?>

<div class="content-container">
    <h1>Pre-Evaluation</h1>
    <div class="activity-question">
        <p>What type of Activity?</p>
    </div>
      
    <div class="activity-buttons">
        <a href="<?php echo e(url('/FRA/Annex-A')); ?>" class="button <?php echo e($existingPendingApplication || $existingApplication ? 'disabled' : ''); ?>" 
           <?php echo e($existingPendingApplication || $existingApplication ? 'onclick="return false;"' : ''); ?>>
           <?php echo e($existingPendingApplication ? 'Fund Raising Activity (Pending Application Exists)' : ($existingApplication ? 'Fund Raising Activity (One Pre-Evaluation at a time)' : 'Fund Raising Activity')); ?>

        </a>
        <a href="<?php echo e(url('/Off-Campus-Activity')); ?>" class="button">Off-Campus Activity</a>
    </div>
    
    <div class="note">
        <p>Note: Pre-Evaluation does not guarantee an approved Application. It helps check all the requirements needed to have an approved activity.</p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/sidebar/preeval.blade.php ENDPATH**/ ?>