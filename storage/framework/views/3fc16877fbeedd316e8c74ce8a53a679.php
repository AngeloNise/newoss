

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/orgs/eventmanage.css')); ?>">

<div class="content-container">
    <h1 class="headerincampus_incampus">Created Events</h1>

    <!-- Success and error alert handling -->
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
    
    <!-- Upcoming Events Cards -->
    <div class="cards-container">
        <?php $__empty_1 = true; $__currentLoopData = $upcomingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="cardincampus_incampus">
                <img src="<?php echo e(asset('storage/' . $event->image)); ?>" class="cardimgincampus_incampus" alt="<?php echo e($event->title); ?>">
                <div class="cardbodyincampus_incampus">
                    <h5 class="cardtitleincampus_incampus"><?php echo e($event->title); ?></h5>
                    <p class="cardtextincampus_incampus"><?php echo e(Str::limit($event->description, 250, '...')); ?></p>
                    <h2 class="cardtextincampus_incampus">Open for: <?php echo e($event->eligible); ?></h2>
                    <p class="event-date"><?php echo e(\Carbon\Carbon::parse($event->event_date)->format('F j, Y g:i A')); ?></p>
                    <!-- Edit and Delete buttons -->
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $event)): ?>
                        <form action="<?php echo e(route('events.edit', $event->id)); ?>" method="GET" style="display:inline;">
                            <button type="submit" class="btnincampus-edit_incampus">Edit</button>
                        </form>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $event)): ?>
                        <form action="<?php echo e(route('events.destroy', $event->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btnincampus-delete_incampus">Delete</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>No created events found for your organization. Please create one.</p>
        <?php endif; ?>
    </div>
    
    <!-- Finished Events Cards -->
    <h2 class="headerincampus_incampus">Finished Events</h2>
    <div class="cards-container">
        <?php $__empty_1 = true; $__currentLoopData = $endedEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="cardincampus_incampus">
                <img src="<?php echo e(asset('storage/' . $event->image)); ?>" class="cardimgincampus_incampus" alt="<?php echo e($event->title); ?>">
                <div class="cardbodyincampus_incampus">
                    <h5 class="cardtitleincampus_incampus"><?php echo e($event->title); ?></h5>
                    <p class="cardtextincampus_incampus"><?php echo e(Str::limit($event->description, 250, '...')); ?></p>
                    <h2 class="cardtextincampus_incampus">Open for: <?php echo e($event->eligible); ?></h2>
                    <p class="event-date"><?php echo e(\Carbon\Carbon::parse($event->event_date)->format('F j, Y g:i A')); ?></p>
                    <!-- Edit and Delete buttons -->

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $event)): ?>
                        <form action="<?php echo e(route('events.destroy', $event->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btnincampus-delete_incampus">Delete</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>No finished events found for your organization.</p>
        <?php endif; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alertsuccessincampus_incampus, .alerterrorincampus_incampus');

    setTimeout(() => {
        alerts.forEach(alert => {
            alert.classList.add('fade-out');
        });
    }, 2000);

    setTimeout(() => {
        alerts.forEach(alert => {
            alert.style.display = 'none';
        });
    }, 2500);
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/org/auth/sidebar/manage_events.blade.php ENDPATH**/ ?>