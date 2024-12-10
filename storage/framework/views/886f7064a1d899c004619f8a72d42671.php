 

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/orgs/applicationhistorycomment.css')); ?>">

<div class="comments-container">
    <h2>Comments for <?php echo e($application->name_of_project); ?></h2>
    
    <!-- Added the table element here -->
    <table>
        <thead>
            <tr>
                <th>Document</th>
                <th>Comment</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $application->logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $document = json_decode($log->document, true);
                    $comment = json_decode($log->comment, true);
                ?>

                <?php if($document || $comment): ?> <!-- Only show if document or comment exist -->
                    <tr>
                        <td><?php echo e($document['new'] ?? 'N/A'); ?></td>
                        <td><?php echo e($comment['new'] ?? 'N/A'); ?></td>
                        <td><?php echo e($log->updated_at->format('F j, Y, g:i a')); ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/org/auth/sidebar/history/frahistorydetails.blade.php ENDPATH**/ ?>