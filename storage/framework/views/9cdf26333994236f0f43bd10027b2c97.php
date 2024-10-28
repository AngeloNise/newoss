<?php $__env->startSection('content'); ?>

<?php if(Session::has('success')): ?>
    <script>
        window.flashMessage = {
            message: "<?php echo e(Session::get('success')); ?>",
            type: "success"
        };
    </script>
<?php endif; ?>

<div class="annexes">
    <h1>Pre-Activity Form</h1>
    <a href="<?php echo e(url('/Off-Campus/Annex-A')); ?>" class="button">Annex-A</a>
    <a href="<?php echo e(url('/Off-Campus/Annex-B')); ?>" class="button">Annex-B</a>
    <a href="<?php echo e(url('/Off-Campus/Annex-C')); ?>" class="button">Annex-C</a>
    <a href="<?php echo e(url('/Off-Campus/Annex-D')); ?>" class="button">Annex-D</a>
    <a href="<?php echo e(url('/Off-Campus/Annex-E')); ?>" class="button">Annex-E</a>
    <a href="<?php echo e(url('/Off-Campus/Annex-F')); ?>" class="button">Annex-F</a>
    <a href="<?php echo e(url('/Off-Campus/Annex-G')); ?>" class="button">Annex-G</a>
    <a href="<?php echo e(url('/Off-Campus/Annex-H')); ?>" class="button">Annex-H</a>    

    <h1>Post-Activity Forms</h1>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/sidebar/preevaloffcamp.blade.php ENDPATH**/ ?>