

<?php $__env->startSection('content'); ?>
<div class="fra-container">
    <form action="<?php echo e(route('faculty.secretform123.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div id="duration">
            <div class="split">
                <div class="fra-group">
                    <label for="pup_logo">PUP LOGO</label>
                    <input type="file" id="pup_logo" name="pup_logo" class="form-control" required>
                </div>

                <div class="fra-group">
                    <label for="ched_logo">CHED LOGO</label>
                    <input type="file" id="ched_logo" name="ched_logo" class="form-control" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/secretform.blade.php ENDPATH**/ ?>