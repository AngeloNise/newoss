<?php $__env->startSection('content'); ?>
<?php if(Session::has('error')): ?>
    <script>
        window.flashMessage = {
            message: "<?php echo e(Session::get('error')); ?>",
            type: "error"
        };
    </script>
<?php endif; ?>

<?php if(Session::has('success')): ?>
    <script>
        window.flashMessage = {
            message: "<?php echo e(Session::get('success')); ?>",
            type: "success"
        };
    </script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/sidebar/offcampus/annex-a.blade.php ENDPATH**/ ?>