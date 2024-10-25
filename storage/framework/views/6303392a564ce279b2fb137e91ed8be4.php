
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
    <form action="<?php echo e(url('/annex-c')); ?>" method="POST">
    <?php echo csrf_field(); ?>
        <h2> COMPLIED STUDENT REQUIREMENTS (Annex-H) </h2>
        <div id="receipt-for-equipment">
            <div class="equipment">
                <div class="fra-group">
                    <label for="name">NAME OF STUDENT</label>
                    <?php if(is_array(old('name'))): ?>
                        <?php $__currentLoopData = old('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="name" name="name[]" class="form-control" value="<?php echo e($name); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="name" name="name[]" class="form-control" value="">
                    <?php endif; ?>
                </div>
                
                <div class="fra-group">
                    <label for="mobility">MOBILITY</label>
                    <?php if(is_array(old('mobility'))): ?>
                        <?php $__currentLoopData = old('mobility'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $mobility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="mobility" name="mobility[]" class="form-control" value="<?php echo e($mobility); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="mobility" name="mobility[]" class="form-control" value="">
                    <?php endif; ?>
                </div>
        
                <div class="fra-group">
                    <label for="cor">CERTIFICATE OF REGISTRATION</label>
                    <?php if(is_array(old('cor'))): ?>
                        <?php $__currentLoopData = old('cor'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $cor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="cor" name="cor[]" class="form-control" value="<?php echo e($cor); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="cor" name="cor[]" class="form-control" value="">
                    <?php endif; ?>
                </div>

                <div class="fra-group">
                    <label for="iiot">INDIVIDUAL ITINERARY OF TRAVEL</label>
                    <?php if(is_array(old('iiot'))): ?>
                        <?php $__currentLoopData = old('iiot'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $cobc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="iiot" name="iiot[]" class="form-control" value="<?php echo e($iiot); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="iiot" name="iiot[]" class="form-control" value="">
                    <?php endif; ?>
                </div>

                <div class="fra-group">
                    <label for="passport">PASSPORT</label>
                    <?php if(is_array(old('passport'))): ?>
                        <?php $__currentLoopData = old('passport'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $passport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="passport" name="passport[]" class="form-control" value="<?php echo e($passport); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="passport" name="passport[]" class="form-control" value="">
                    <?php endif; ?>
                </div>

                <div class="fra-group">
                    <label for="mc">MEDICAL CLEARANCE</label>
                    <?php if(is_array(old('mc'))): ?>
                        <?php $__currentLoopData = old('mc'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $mc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="mc" name="mc[]" class="form-control" value="<?php echo e($mc); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="mc" name="mc[]" class="form-control" value="">
                    <?php endif; ?>
                </div>

                <div class="fra-group">
                    <label for="insurance">INSURANCE</label>
                    <?php if(is_array(old('insurance'))): ?>
                        <?php $__currentLoopData = old('insurance'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $insurance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="insurance" name="insurance[]" class="form-control" value="<?php echo e($insurance); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="insurance" name="insurance[]" class="form-control" value="">
                    <?php endif; ?>
                </div>

                <div class="fra-group">
                    <label for="cf">CONSENT FORM</label>
                    <?php if(is_array(old('cf'))): ?>
                        <?php $__currentLoopData = old('cf'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $cf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="cf" name="cf[]" class="form-control" value="<?php echo e($cf); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="cf" name="cf[]" class="form-control" value="">
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
<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/offcampus/annex-h.blade.php ENDPATH**/ ?>