

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/orgs/createevent.css')); ?>">
<div class="createevents-container">
    <h1 class="header-incampus">Create Event</h1>

    <!-- Display Success or Error Messages -->
    <?php if(session('success')): ?>
        <div class="alertincampus_incampus alertsuccessincampus_incampus">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alertincampus_incampus alerterrorincampus_incampus">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <!-- Validation error messages -->
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('faculty.events.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="title" class="label">Event Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="description" class="label">Event Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>

        <div class="form-group">
            <label for="image" class="label">Event Image</label>
            <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png, .gif, .bmp" required>
            <small class="form-text text-muted">Max: 7168kb | 7 mb</small>
        </div>

        <div class="form-group">
            <label for="href" class="label">Event Facebook Link</label>
            <input type="url" class="form-control" id="href" name="href" required>
        </div>

        <div class="form-group">
            <label for="eligible" class="label">Eligible to attend for...</label>
            <input type="text" class="form-control" id="eligible" name="eligible" placeholder="Ex: Everyone, COC, CCIS" required>
        </div>

        <div class="form-group">
            <label for="event_date" class="label">Event Date and Time</label>
            <input type="datetime-local" class="form-control" id="event_date" name="event_date" required>
        </div>

        <button type="submit" class="btn-primary" id="submitBtn">Save Event</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/faculty_create_event.blade.php ENDPATH**/ ?>