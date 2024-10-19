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
    <a href="<?php echo e(url('/FRA/Annex-A')); ?>" class="button">Annex-A</a>
    <h1>Post-Activity Forms</h1>
    <a href="<?php echo e(url('/FRA/Annex-B')); ?>" class="button">Annex-B</a>
    <a href="<?php echo e(url('/FRA/Annex-C')); ?>" class="button">Annex-C</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/sidebar/preevalfra.blade.php ENDPATH**/ ?>