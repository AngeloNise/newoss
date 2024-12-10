<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/orgs/ocaeval/ocaeval.css')); ?>">
<?php if(Session::has('success')): ?>
    <script>
        window.flashMessage = {
            message: "<?php echo e(Session::get('success')); ?>",
            type: "success"
        };
    </script>
<?php endif; ?>

<div class="annexes">
    <div class="activity-buttons">
        <h1>Pre-Approval Requirements</h1>
        <a href="<?php echo e(url('/Off-Campus/Annex-A')); ?>" class="button">Annex A-C</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/sidebar/preevaloffcamp.blade.php ENDPATH**/ ?>