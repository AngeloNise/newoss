<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/orgs/accset.css')); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

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
                        <label for="organization" class="form-label">Organization Name:</label>
                        <input type="text" class="form-control" id="organization" name="organization" value="<?php echo e(old('name_of_organization', $user->name_of_organization)); ?>" placeholder="Organization Name" readonly>
                    </div>

                    <div class="form-accset">
                        <label for="colleges" class="form-label">College:</label>
                        <input type="text" class="form-control" id="colleges" name="colleges" value="<?php echo e(old('colleges', $user->colleges)); ?>" placeholder="College" readonly>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="form-right">
                    <!-- Old Password -->
                    <div class="form-accset">
                        <label for="old_password" class="form-label">Old Password:</label>
                        <div class="password-wrapper">
                            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter old password" required>
                            <i id="toggleOldPassword" class="fas fa-eye toggle-icon"></i>
                        </div>
                    </div>
                    
                    <!-- Change Password -->
                    <div class="form-accset">
                        <div class="password-wrapper">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
                            <i id="toggleNewPasswords" class="fas fa-eye toggle-icon"></i>
                        </div>
                    </div>
                    
                    <!-- Confirm Password -->
                    <div class="form-accset">
                        <div class="password-wrapper">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password">
                        </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Toggle Old Password Visibility
        const toggleOldPassword = document.getElementById('toggleOldPassword');
        const oldPasswordField = document.getElementById('old_password');

        toggleOldPassword.addEventListener('click', function () {
            const type = oldPasswordField.type === 'password' ? 'text' : 'password';
            oldPasswordField.type = type;
            toggleOldPassword.classList.toggle('fa-eye-slash'); // Toggle the icon
        });

        // Toggle New Password and Confirm Password Visibility
        const toggleNewPasswords = document.getElementById('toggleNewPasswords');
        const newPasswordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('password_confirmation');

        toggleNewPasswords.addEventListener('click', function () {
            const type = newPasswordField.type === 'password' ? 'text' : 'password';
            newPasswordField.type = type;
            confirmPasswordField.type = type;
            toggleNewPasswords.classList.toggle('fa-eye-slash'); // Toggle the icon
        });

        document.addEventListener('DOMContentLoaded', function () {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                // Hide the alert after 4 seconds
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 4000); // Matches the animation duration
            });
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/org/auth/sidebar/accset.blade.php ENDPATH**/ ?>