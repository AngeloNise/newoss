

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/orgs/applicationhistorycomment.css')); ?>">
<div class="comments-container">
    <h2>Comments for <?php echo e($application->name_of_project); ?></h2>

    <?php if($comments->isEmpty()): ?>
        <p>No comments found for this application.</p>
    <?php else: ?>
        <ul class="comment-list">
            <?php $__currentLoopData = $comments->sortByDesc('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <p>Document: <?php echo e($comment->document); ?></p>
                    <strong><?php echo e($comment->user->name); ?>:</strong> <?php echo e($comment->comment); ?>

                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/org/auth/sidebar/history/frahistorydetails.blade.php ENDPATH**/ ?>