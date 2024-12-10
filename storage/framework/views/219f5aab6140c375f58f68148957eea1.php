<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/faculty/oam.css')); ?>">

<div class="org-account-container">
    <h2>Organization Account Management</h2>
    <a href="<?php echo e(route('faculty.orgs.create')); ?>" class="org-btn org-btn-primary">+ Add Account</a>
    <!-- Display the Total Accounts -->
    <br><p class="total-count">
        <strong>Total:</strong> <?php echo e($organizations->total()); ?> accounts
    </p>
    
    <!-- Success and Error Alerts -->
    <?php if(session('success')): ?>
        <div class="org-alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="org-alert-danger">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <!-- Search Bar -->
    <form method="GET" action="<?php echo e(route('faculty.orgs.index')); ?>" class="search-form">
        <input 
            type="text" 
            id="searchBar" 
            name="search" 
            value="<?php echo e(request()->get('search')); ?>" 
            placeholder="Search by Title or Colleges..." 
            class="search-bar">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <br>
    <!-- Organization Table -->
    <table class="org-table org-table-striped">
        <thead>
            <tr>
                <th>Organization Name</th>
                <th>Person in Charge</th>
                <th>Department</th>
                <th>Webmail</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="organizationsTable">
            <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($organization->name_of_organization); ?></td>
                    <td><?php echo e($organization->name); ?></td>
                    <td><?php echo e($organization->colleges); ?></td>
                    <td><?php echo e($organization->email); ?></td>
                    <td>
                        <!-- Dropdown for Status -->
                        <form action="<?php echo e(route('faculty.updateStatus', $organization->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <select name="status" onchange="this.form.submit()" class="status-dropdown">
                                <option value="Without Deficiencies" <?php echo e($organization->status == 'Without Deficiencies' ? 'selected' : ''); ?>>Without Deficiencies</option>
                                <option value="With Deficiencies" <?php echo e($organization->status == 'With Deficiencies' ? 'selected' : ''); ?>>With Deficiencies</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <!-- Textbox for Remarks -->
                        <form action="<?php echo e(route('faculty.updateRemarks', $organization->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <textarea name="remarks" rows="1" class="remarks-textarea" placeholder="Add remarks..."><?php echo e($organization->remarks); ?></textarea>
                            <button type="submit" class="org-btn org-btn-secondary">💾 Save</button>
                        </form>
                    </td>                    
                    <td>
                        <div class="org-btn-group">
                            <a href="<?php echo e(route('faculty.orgs.edit', $organization->id)); ?>" class="org-btn org-btn-primary">✏️</a>
                            <a href="<?php echo e(route('faculty.orgs.remove', $organization->id)); ?>" class="org-btn org-btn-danger" onclick="return confirm('Are you sure you want to remove this organization?');">🗑️</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="pagination-container">
        <?php echo e($organizations->appends(['search' => request()->get('search')])->links('pagination::simple-bootstrap-4')); ?>

    </div>    
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/oam.blade.php ENDPATH**/ ?>