<?php $__env->startSection('content'); ?>
<div class="container_incampus">
    <link rel="stylesheet" href="<?php echo e(asset('css/orgs/editevent.css')); ?>">
    <h1 class="headerincampus_incampus">Edit Event</h1>
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
    <form action="<?php echo e(isset($event) ? route('events.update', $event->id) : route('events.store')); ?>" method="POST" enctype="multipart/form-data" class="createevent-form" id="createEventForm">
        <?php echo csrf_field(); ?>

        <!-- For updating, use PUT method -->
        <?php if(isset($event)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div class="form-group">
            <label for="title" class="label">Event Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo e(isset($event) ? $event->title : old('title')); ?>" required>
        </div>

        <div class="form-group">
            <label for="description" class="label">Event Description</label>
            <input type="text" class="form-control" id="description" name="description" value="<?php echo e(isset($event) ? $event->description : old('description')); ?>" required>
        </div>

        <div class="form-group">
            <label for="image" class="label">Event Image (Leave empty if you don't want to change it)</label>
            <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png, .gif, .bmp">
            <small class="form-text text-muted">Max: 7168kb | 7 mb</small>
        </div>

        <div class="form-group">
            <label for="href" class="label">Event Facebook Link</label>
            <input type="url" class="form-control" id="href" name="href" value="<?php echo e(isset($event) ? $event->href : old('href')); ?>" required>
        </div>

        <div class="form-group">
            <label for="eligible" class="label">Eligible to attend for...</label>
            <input type="text" class="form-control" id="eligible" name="eligible" placeholder="Ex: Everyone, COC, CCIS" value="<?php echo e(isset($event) ? $event->eligible : old('eligible')); ?>" required>
        </div>

        <div class="form-group">
            <label for="event_date" class="label">Event Date and Time</label>
            <input type="datetime-local" class="form-control" id="event_date" name="event_date" value="<?php echo e(isset($event) ? $event->event_date : old('event_date')); ?>" required>
        </div>

        <!-- Hidden department field -->
        <div class="form-group">
            <input type="hidden" name="colleges" value="<?php echo e(auth()->user()->colleges); ?>">
        </div>

        <button type="submit" class="btn-primary" id="submitBtn"><?php echo e(isset($event) ? 'Update Event' : 'Save Event'); ?></button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/org/auth/sidebar/edit_event.blade.php ENDPATH**/ ?>