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
    <form action="<?php echo e(url('/annex-b')); ?>" method="POST">
    <?php echo csrf_field(); ?>
        <h2> Annex B </h2>
        <div id="receipt-for-equipment">
            <div class="equipment">
                <div class="fra-group">
                    <label for="name">Name</label>
                    <?php if(is_array(old('name'))): ?>
                        <?php $__currentLoopData = old('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="name" name="name[]" class="form-control" value="<?php echo e($name); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="name" name="name[]" class="form-control" value="">
                    <?php endif; ?>
                </div>
                
                <div class="fra-group">
                    <label for="participation">Paticipation</label>
                    <?php if(is_array(old('participation'))): ?>
                        <?php $__currentLoopData = old('participation'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $participation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="participation" name="participation[]" class="form-control" value="<?php echo e($participation); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="participation" name="participation[]" class="form-control" value="">
                    <?php endif; ?>
                </div>
        
                <div class="fra-group">
                    <label for="cobc">College/ Organization/ Branch/ Campus</label>
                    <?php if(is_array(old('cobc'))): ?>
                        <?php $__currentLoopData = old('cobc'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $cobc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="cobc" name="cobc[]" class="form-control" value="<?php echo e($cobc); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="cobc" name="cobc[]" class="form-control" value="">
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="button-receipt">
            <button type="button" id="remove-receipt-for-equipment">Remove</button>
            <button type="button" id="add-receipt-for-equipment">Add</button>
        </div>  

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/sidebar/offcampus/annex-b.blade.php ENDPATH**/ ?>