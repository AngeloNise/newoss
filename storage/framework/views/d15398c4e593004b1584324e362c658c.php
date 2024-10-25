
<?php $__env->startSection('content'); ?>

<?php if(Session::has('error')): ?>
    <script>
        window.flashMessage = {
            message: "<?php echo e(Session::get('error')); ?>",
            type: "error"
        };
    </script>
<?php endif; ?>

<?php if(Session::has('success')): ?>
    <script>
        window.flashMessage = {
            message: "<?php echo e(Session::get('success')); ?>",
            type: "success"
        };
    </script>
<?php endif; ?>

<div class="fra-container">
    <form action="<?php echo e(url('/annex-d')); ?>" method="POST">
    <?php echo csrf_field(); ?>
        <h2> INDIVIDUAL ITINERARY OF TRAVEL (Annex-D) </h2>
        
        <div class="fra-group">
            <label for="noa">Name of Activity</label>
            <input type="text" id="noa" name="noa" class="form-control" value="<?php echo e(old('noa')); ?>">
        </div>

        <div class="fra-group">
            <label for="occ">Organization/College/Campus</label>
            <input type="text" id="occ" name="occ" class="form-control" value="<?php echo e(old('occ')); ?>">
        </div>

        <div class="fra-group">
            <label for="poa">Place of Activity</label>
            <input type="text" id="poa" name="poa" class="form-control" value="<?php echo e(old('poa')); ?>">
        </div>

        <div class="fra-group">
            <label for="doa">Duration of Activity</label>
            <input type="text" id="doa" name="doa" class="form-control" value="<?php echo e(old('doa')); ?>">
        </div>

        <div id="receipt-for-equipment">
            <div class="equipment">
                <div class="fra-group">
                    <label for="date">Date</label>
                    <?php if(is_array(old('date'))): ?>
                        <?php $__currentLoopData = old('date'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="date" name="date[]" class="form-control" value="<?php echo e($date); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="date" name="date[]" class="form-control" value="">
                    <?php endif; ?>
                </div>
                
                <div class="fra-group">
                    <label for="pvd">Places to be visited Destination (From Residence to venue)</label>
                    <?php if(is_array(old('pvd'))): ?>
                        <?php $__currentLoopData = old('pvd'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pvd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="pvd" name="pvd[]" class="form-control" value="<?php echo e($pvd); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="pvd" name="pvd[]" class="form-control" value="">
                    <?php endif; ?>
                </div>
        
                <div class="fra-group">
                    <label for="time">Time</label>
                    <?php if(is_array(old('time'))): ?>
                        <?php $__currentLoopData = old('time'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="time" name="time[]" class="form-control" value="<?php echo e($time); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="time" name="time[]" class="form-control" value="">
                    <?php endif; ?>
                </div>

                <div class="fra-group">
                    <label for="activity">Activity</label>
                    <?php if(is_array(old('activity'))): ?>
                        <?php $__currentLoopData = old('activity'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="activity" name="activity[]" class="form-control" value="<?php echo e($activity); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="activity" name="activity[]" class="form-control" value="">
                    <?php endif; ?>
                </div>

                <div class="fra-group">
                    <label for="mot">Means of Transportation</label>
                    <?php if(is_array(old('mot'))): ?>
                        <?php $__currentLoopData = old('mot'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $mot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="mot" name="mot[]" class="form-control" value="<?php echo e($mot); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="mot" name="mot[]" class="form-control" value="">
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="button-receipt">
            <button type="button" id="remove-receipt-for-equipment">Remove</button>
            <button type="button" id="add-receipt-for-equipment">Add</button>
        </div>  

        <div class="fra-group">
            <label for="prepared_by">Prepared by</label>
            <input type="text" id="prepared_by" name="prepared_by" class="form-control" placeholder="Student Participant" value="<?php echo e(old('prepared_by')); ?>">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/offcampus/annex-d.blade.php ENDPATH**/ ?>