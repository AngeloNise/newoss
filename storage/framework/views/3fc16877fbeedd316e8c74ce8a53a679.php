

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
                        <button class="btnincampus-delete_incampus delete-button" data-event-id="<?php echo e($event->id); ?>">
                            Delete
                        </button>
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
                    <!-- Delete button -->
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $event)): ?>
                        <button class="btnincampus-delete_incampus delete-button" data-event-id="<?php echo e($event->id); ?>">
                            Delete
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>No finished events found for your organization.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Overlay -->
<div id="deleteOverlay" class="overlay">
    <div class="overlay-content">
        <div class="icon">
            <!-- Trash icon as SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path d="M3 6l3 18h12l3-18H3zm15 16H6l-2-14h16l-2 14zM10 2v2h4V2h-4z"/>
            </svg>
        </div>
        <p>Are you sure you want to delete this event?</p>
        <div class="overlay-buttons">
            <button id="cancelButton" class="btn btn-secondary">Cancel</button>
            <form id="confirmDeleteForm" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </form>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');
        const deleteOverlay = document.getElementById('deleteOverlay');
        const confirmDeleteForm = document.getElementById('confirmDeleteForm');
        const cancelButton = document.getElementById('cancelButton');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const eventId = this.dataset.eventId;
                confirmDeleteForm.action = `/events/${eventId}`;
                deleteOverlay.style.display = 'flex';
            });
        });

        cancelButton.addEventListener('click', function () {
            deleteOverlay.style.display = 'none';
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/org/auth/sidebar/manage_events.blade.php ENDPATH**/ ?>