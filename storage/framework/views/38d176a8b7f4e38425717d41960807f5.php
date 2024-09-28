<?php $__env->startSection('content'); ?>

<?php if(Session::has('success')): ?>
<div class="alert alert-success overlay"><?php echo e(Session::get('success')); ?></div>
<?php endif; ?>

<div class="annexes">
    <h1>Fill-up the Forms below</h1>
    <a href="<?php echo e(url('/Annex-A')); ?>" class="button">Annex-A</a>
    <a href="<?php echo e(url('/Annex-B')); ?>" class="button">Annex-B</a>
    <a href="<?php echo e(url('/Annex-C')); ?>" class="button">Annex-C</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/preevalfra.blade.php ENDPATH**/ ?>