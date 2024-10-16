<?php $__env->startSection('content'); ?>

<div class="container">
    <h2>Edit Organization Account</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('faculty.orgs.update', $organization->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label for="org_webmail">Org Webmail</label>
            <input type="email" id="org_webmail" name="email" class="form-control" value="<?php echo e(old('email', $organization->email)); ?>" required>
        </div>

        <div class="form-group">
            <label for="org_name">Org Name</label>
            <input type="text" id="org_name" name="name_of_organization" class="form-control" value="<?php echo e(old('name_of_organization', $organization->name_of_organization)); ?>" required>
        </div>

        <div class="form-group">
            <label for="head_name">Head Name</label>
            <input type="text" id="head_name" name="name" class="form-control" value="<?php echo e(old('name', $organization->name)); ?>" required>
        </div>

        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Leave blank if you do not want to change">
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm New Password</label>
            <input type="password" id="confirm_password" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save Changes</button>
        <a href="<?php echo e(route('faculty.orgs.index')); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/oamedit.blade.php ENDPATH**/ ?>