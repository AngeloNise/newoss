<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>

<div class="container">
    <div class="profile-header">
        <div class="details">
            <h3><?php echo e($user->name_of_organization); ?></h3>
            <p>PRESIDENT</p>
            <p><?php echo e($user->name); ?></p>
        </div>

    </div>

    <div class="form-container-accset">
        <form action="<?php echo e(route('accset.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
    
            <div class="form-layout">
                <!-- Left Column -->
                <div class="form-left">
                    <div class="form-accset">
                        <label for="name" class="form-label">President Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name', $user->name)); ?>" required>
                    </div>
    
                    <div class="form-accset">
                        <input type="text" class="form-control" id="organization" name="organization" value="<?php echo e(old('name_of_organization', $user->name_of_organization)); ?>" placeholder="Organization Name" required>
                    </div>
                </div>
    
                <!-- Right Column -->
                <div class="form-right">
                    <div class="form-accset">
                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter old password" required>
                    </div>
    
                    <div class="form-accset">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
                    </div>
    
                    <div class="form-accset">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password">
                    </div>
                </div>
            </div>
    
            <!-- Submit Button -->
            <div class="buttons">
                <button type="submit" class="btn btn-success">Save Changes</button>
            </div>
        </form>
    </div>
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/org/auth/sidebar/accset.blade.php ENDPATH**/ ?>