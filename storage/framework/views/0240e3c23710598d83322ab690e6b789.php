
<?php $__env->startSection('content'); ?>

<div class="content-container">
    <h1>Annexes</h1>
    <div class="activity-question">
        <p>Pre-Activity-Evaluation</p>
    </div>

    <div class="activity-buttons">
        <a href="<?php echo e(url('/faculty/FRA-A-Evaluation')); ?>" class="button">Annex-A</a>
    </div>

    <div class="activity-question">
        <p>Post-Activity-Evaluation</p>
    </div>

    <div class="activity-buttons">
        <a href="<?php echo e(url('/faculty/FRA-B-Evaluation')); ?>" class="button">Annex-B</a>
    </div>

    <div class="activity-buttons">
        <a href="<?php echo e(url('/faculty/FRA-C-Evaluation')); ?>" class="button">Annex-C</a>
    </div>
    
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//faculty/auth/fraeval/fra-evaluation.blade.php ENDPATH**/ ?>