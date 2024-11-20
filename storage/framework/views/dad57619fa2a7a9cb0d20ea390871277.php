<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/faculty/manageevent.css')); ?>">

<!-- Manage Events Container -->
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
        <input type="text" id="searchBar" placeholder="Search by Title or Colleges..." class="search-bar" onkeyup="filterEvents()">
        <!-- Upcoming Events Section -->
        <h2 class="headerincampus_incampus">Upcoming Events</h2>
        <?php if($upcomingEvents->isEmpty()): ?>
            <p class="no-events-message">No upcoming events.</p>
        <?php else: ?>
            <div class="cards-container" id="upcomingEventsContainer">
                <?php $__currentLoopData = $upcomingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="cardincampus_incampus" data-title="<?php echo e(strtolower($event->title)); ?>" data-colleges="<?php echo e(strtolower($event->colleges)); ?>">
                        <img src="<?php echo e(asset('storage/' . $event->image)); ?>" class="cardimgincampus_incampus" alt="<?php echo e($event->title); ?>">
                        <div class="cardbodyincampus_incampus">
                            <h5 class="cardtcollegeincampus_incampus"><?php echo e($event->colleges); ?></h5>
                            <h5 class="cardtitleincampus_incampus"><?php echo e($event->title); ?></h5>
                            <p class="cardtextincampus_incampus"><?php echo e(Str::limit($event->description, 250, '...')); ?></p>
                            <h2 class="cardtextincampus_incampus">Open for: <?php echo e($event->eligible); ?></h2>
                            <p class="event-date"><?php echo e(\Carbon\Carbon::parse($event->event_date)->format('F j, Y g:i A')); ?></p>
                            <a href="<?php echo e($event->href); ?>" class="btnlinkincampus_incampus text-danger">Click here for more details.</a>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $event)): ?>
                                <form action="<?php echo e(route('faculty.events.destroy', $event->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btnincampus-delete_incampus">Delete</button>
                                </form>
                            <?php endif; ?>
                        
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Pagination for Upcoming Events -->
            <div class="pagination-container">
                <?php echo e($upcomingEvents->appends(['ended_page' => request()->get('ended_page')])->links('pagination::simple-bootstrap-4')); ?>

            </div>
        <?php endif; ?>
    </div>

    <!-- Ended Events Section -->
    <div class="content-container-finished">
        <h2 class="headerincampus_incampus">Ended Events</h2>
        <?php if($endedEvents->isEmpty()): ?>
            <p class="no-events-message">No ended events.</p>
        <?php else: ?>
            <div class="cards-container" id="endedEventsContainer">
                <?php $__currentLoopData = $endedEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="cardincampus_incampus" data-title="<?php echo e(strtolower($event->title)); ?>" data-colleges="<?php echo e(strtolower($event->colleges)); ?>">
                        <img src="<?php echo e(asset('storage/' . $event->image)); ?>" class="cardimgincampus_incampus" alt="<?php echo e($event->title); ?>">
                        <div class="cardbodyincampus_incampus">
                            <h5 class="cardtcollegeincampus_incampus"><?php echo e($event->colleges); ?></h5>
                            <h5 class="cardtitleincampus_incampus"><?php echo e($event->title); ?></h5>
                            <p class="cardtextincampus_incampus"><?php echo e(Str::limit($event->description, 250, '...')); ?></p>
                            <h2 class="cardtextincampus_incampus">Open for: <?php echo e($event->eligible); ?></h2>
                            <p class="event-date"><?php echo e(\Carbon\Carbon::parse($event->event_date)->format('F j, Y g:i A')); ?></p>
                            <a href="<?php echo e($event->href); ?>" class="btnlinkincampus_incampus text-danger">Click here for more details.</a>

                            <!-- Edit/Delete buttons for authorized users -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $event)): ?>
                                <form action="<?php echo e(route('faculty.events.destroy', $event->id)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btnincampus-delete_incampus">Delete</button>
                                </form>
                            <?php endif; ?>
                        
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Pagination for Ended Events -->
            <div class="pagination-container">
                <?php echo e($endedEvents->appends(['upcoming_page' => request()->get('upcoming_page')])->links('pagination::simple-bootstrap-4')); ?>

            </div>
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

function filterEvents() {
    const searchInput = document.getElementById('searchBar').value.toLowerCase();
    const eventCards = document.querySelectorAll('#upcomingEventsContainer .cardincampus_incampus, #endedEventsContainer .cardincampus_incampus');

    eventCards.forEach(card => {
        const title = card.getAttribute('data-title');
        const colleges = card.getAttribute('data-colleges');
        
        if (title.includes(searchInput) || colleges.includes(searchInput)) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/managepost.blade.php ENDPATH**/ ?>