
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
                <input type="text" id="name_of_project" name="name_of_project" class="form-control" placeholder="Name of the Project" required>
            </div>

            <div class="fra-group">
                <select id="name_of_organization" name="name_of_organization" class="form-control select2" required>
                    <option value="">Select Organization</option>
                    <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($organization); ?>"><?php echo e($organization); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="fra-group">
                <select id="proposed_activity" name="proposed_activity" class="form-control" required>
                    <option value="">Select Proposed Activity</option>
                    <option value="off campus">Off Campus</option>
                    <option value="in campus">In Campus</option>
                    <option value="fund raising">Fund Raising</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    // Initialize Select2
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select Organization",
            allowClear: true
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/createapp/fraapp.blade.php ENDPATH**/ ?>