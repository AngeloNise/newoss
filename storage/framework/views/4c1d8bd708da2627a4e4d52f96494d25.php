<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/orgs/incampus.css')); ?>">

<!-- Upcoming Events Container -->
<div class="content-container-parent">
    <div class="content-container">
        <!-- Alerts -->
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

        <!-- Search Bar -->
        <form method="GET" action="<?php echo e(route('org.auth.incampus')); ?>" class="search-form">
            <input 
                type="text" 
                id="searchBar" 
                name="search" 
                value="<?php echo e(request()->get('search')); ?>" 
                placeholder="Search by Title or Colleges..." 
                class="search-bar">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <!-- Create and Manage Buttons -->
        <div class="buttons-container">
            <!-- Create Event Button -->
            <div class="create-button">
                <a href="<?php echo e(route('events.create')); ?>" class="btnincampus-primary_incampus">Create Event</a>
            </div>

            <!-- Manage Events Button -->
            <div class="manage-button">
                <a href="<?php echo e(route('events.manage')); ?>" class="btnincampus-primary_incampus">Manage Events</a>
            </div>
        </div>

        <!-- Upcoming Events -->
        <h2 class="headerincampus_incampus">Upcoming Events</h2>
        <?php if($upcomingEvents->isEmpty()): ?>
            <p class="no-events-message">No upcoming events.</p>
        <?php else: ?>
            <div class="cards-container" id="upcomingEventsContainer">
                <?php $__currentLoopData = $upcomingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div 
                        class="cardincampus_incampus" 
                        data-title="<?php echo e(strtolower($event->title)); ?>" 
                        data-colleges="<?php echo e(strtolower($event->colleges)); ?>"
                    >
                        <img src="<?php echo e(asset('storage/' . $event->image)); ?>" class="cardimgincampus_incampus" alt="<?php echo e($event->title); ?>">
                        <div class="cardbodyincampus_incampus">
                            <h5 class="cardtcollegeincampus_incampus"><?php echo e($event->colleges); ?></h5>
                            <h5 class="cardtitleincampus_incampus"><?php echo e($event->title); ?></h5>
                            <p class="cardtextincampus_incampus"><?php echo e(Str::limit($event->description, 250, '...')); ?></p>
                            <h2 class="cardtextincampus_incampus">Open for: <?php echo e($event->eligible); ?></h2>
                            <p class="event-date"><?php echo e(\Carbon\Carbon::parse($event->event_date)->format('F j, Y g:i A')); ?></p>
                            <a href="<?php echo e($event->href); ?>" class="btnlinkincampus_incampus text-danger">Click here for more details.</a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Pagination for Upcoming Events -->
            <div class="pagination-container">
                <?php echo e($upcomingEvents->appends(['ended_page' => request()->get('ended_page'), 'search' => request()->get('search')])->links('pagination::simple-bootstrap-4')); ?>

            </div>
        <?php endif; ?>
    </div>

<!-- Finished Events Container -->
    <div class="content-container-finished">
        <h2 class="headerincampus_incampus">Finished Events</h2>
        <?php if($endedEvents->isEmpty()): ?>
            <p class="no-events-message">No finished events.</p>
        <?php else: ?>
            <div class="cards-container" id="endedEventsContainer">
                <?php $__currentLoopData = $endedEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div 
                        class="cardincampus_incampus" 
                        data-title="<?php echo e(strtolower($event->title)); ?>" 
                        data-colleges="<?php echo e(strtolower($event->colleges)); ?>"
                    >
                        <img src="<?php echo e(asset('storage/' . $event->image)); ?>" class="cardimgincampus_incampus" alt="<?php echo e($event->title); ?>">
                        <div class="cardbodyincampus_incampus">
                            <h5 class="cardtcollegeincampus_incampus"><?php echo e($event->colleges); ?></h5>
                            <h5 class="cardtitleincampus_incampus"><?php echo e($event->title); ?></h5>
                            <p class="cardtextincampus_incampus"><?php echo e(Str::limit($event->description, 250, '...')); ?></p>
                            <h2 class="cardtextincampus_incampus">Open for: <?php echo e($event->eligible); ?></h2>
                            <p class="event-date"><?php echo e(\Carbon\Carbon::parse($event->event_date)->format('F j, Y g:i A')); ?></p>
                            <a href="<?php echo e($event->href); ?>" class="btnlinkincampus_incampus text-danger">Click here for more details.</a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Pagination for Finished Events -->
            <div class="pagination-container">
                <?php echo e($endedEvents->appends(['upcoming_page' => request()->get('upcoming_page'), 'search' => request()->get('search')])->links('pagination::simple-bootstrap-4')); ?>

            </div>
        <?php endif; ?>
    </div>
</div>

<script>
// JavaScript for dynamic filtering (optional if using JavaScript search)
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

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/org/auth/sidebar/incampus.blade.php ENDPATH**/ ?>