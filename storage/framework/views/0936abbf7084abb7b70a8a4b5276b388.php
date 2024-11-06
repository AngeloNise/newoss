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
    
    // Check if there is an existing Fund Raising application with status other than 'Returned' 
    // and 'frapost' is not 'submitted'
    $existingFundRaisingApplication = \App\Models\Application::where('name_of_organization', $user->name_of_organization)
        ->where('proposed_activity', 'Fund Raising')
        ->where(function($query) {
            $query->where('status', '!=', 'Returned') // Exclude 'Returned' status
                  ->where('frapost', '!=', 'submitted'); // Exclude if 'frapost' is 'submitted'
        })
        ->exists();
        
    // Check if there is an existing pending application for AnnexA
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
        <!-- Check if a Fund Raising application exists and isn't returned or submitted, or if the user has a pending AnnexA application -->
        <a href="<?php echo e(url('/FRA/Annex-A')); ?>" class="button <?php echo e($existingFundRaisingApplication || $existingApplication ? 'disabled' : ''); ?>" 
           <?php echo e($existingFundRaisingApplication || $existingApplication ? 'onclick="return false;"' : ''); ?>>
           <?php echo e($existingFundRaisingApplication || $existingApplication ? 'Fund Raising Activity (One FRA Application at a time)' : 'Fund Raising Activity'); ?>

        </a>
        <a href="<?php echo e(url('/Off-Campus-Activity')); ?>" class="button">Off-Campus Activity</a>
    </div>

    <div class="note">
        <p>Note: Pre-Evaluation does not guarantee an approved Application. It helps checking all the requirements needed to have an approved activity.</p>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/sidebar/preeval.blade.php ENDPATH**/ ?>