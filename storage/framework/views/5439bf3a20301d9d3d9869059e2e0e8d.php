
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

<div class="fra-container">
    <form action="<?php echo e(url('/fraapp')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <h2>FUND RAISING ACTIVITY APPLICATION</h2>
        <div class="split">
            <div class="fra-group">
                <label for="name_of_project">Name of Project</label>
                <input type="text" id="name_of_project" name="name_of_project" class="form-control">
            </div>

            <div class="fra-group">
                <label for="name_of_organization">Name of Organization</label>
                <select id="name_of_organization" name="name_of_organization" class="form-control">
                    <option value="">Select Organization</option>
                    <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($organization); ?>"><?php echo e($organization); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//faculty/auth/createapp/fraapp.blade.php ENDPATH**/ ?>