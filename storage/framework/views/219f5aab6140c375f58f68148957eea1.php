<?php $__env->startSection('content'); ?>

<div class="container">
    <h2>Organization Account Management</h2>
    
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

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Organization Name</th>
                <th>Person in Charge</th>
                <th>Webmail</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($organization->name_of_organization); ?></td>
                    <td><?php echo e($organization->name); ?></td>
                    <td><?php echo e($organization->email); ?></td>
                    <td><?php echo e($organization->status); ?></td>
                    <td>
                        <a href="<?php echo e(route('faculty.orgs.edit', $organization->id)); ?>" class="btn btn-primary">Edit</a>
                        <a href="<?php echo e(route('faculty.orgs.remove', $organization->id)); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this organization?');">Remove</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/oam.blade.php ENDPATH**/ ?>