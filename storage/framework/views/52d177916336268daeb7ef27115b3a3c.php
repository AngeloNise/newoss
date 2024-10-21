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
        <h2>FUND RAISING ACTIVITY APPLICATION (Annex-C)</h2>
        <div id="receipt-for-equipment">
            <input type="hidden" name="name" value="<?php echo e(auth()->user()->name); ?>">
            <input type="hidden" name="name_of_organization" value="<?php echo e(auth()->user()->name_of_organization); ?>">

        
            <div class="equipment">
                <div class="fra-group">
                    <label for="qty">Qty.</label>
                    <?php if(is_array(old('qty'))): ?>
                        <?php $__currentLoopData = old('qty'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $qty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="qty" name="qty[]" class="form-control" value="<?php echo e($qty); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="qty" name="qty[]" class="form-control" value="">
                    <?php endif; ?>
                </div>
                
                <div class="fra-group">
                    <label for="unit">Unit</label>
                    <?php if(is_array(old('unit'))): ?>
                        <?php $__currentLoopData = old('unit'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="unit" name="unit[]" class="form-control" value="<?php echo e($unit); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="unit" name="unit[]" class="form-control" value="">
                    <?php endif; ?>
                </div>
        
                <div class="fra-group">
                    <label for="item_description">Item/Description</label>
                    <?php if(is_array(old('item_description'))): ?>
                        <?php $__currentLoopData = old('item_description'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item_description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="item_description" name="item_description[]" class="form-control" value="<?php echo e($item_description); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="item_description" name="item_description[]" class="form-control" value="">
                    <?php endif; ?>
                </div>
        
                <div class="fra-group">
                    <label for="serial_no">Serial No.</label>
                    <?php if(is_array(old('serial_no'))): ?>
                        <?php $__currentLoopData = old('serial_no'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $serial_no): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="serial_no" name="serial_no[]" class="form-control" value="<?php echo e($serial_no); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="serial_no" name="serial_no[]" class="form-control" value="">
                    <?php endif; ?>
                </div>
        
                <div class="fra-group">
                    <label for="property_no">Property No.</label>
                    <?php if(is_array(old('property_no'))): ?>
                        <?php $__currentLoopData = old('property_no'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $property_no): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="property_no" name="property_no[]" class="form-control" value="<?php echo e($property_no); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="property_no" name="property_no[]" class="form-control" value="">
                    <?php endif; ?>
                </div>

                <div class="fra-group">
                    <label for="unit_cost">Unit Cost</label>
                    <?php if(is_array(old('unit_cost'))): ?>
                        <?php $__currentLoopData = old('unit_cost'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $unit_cost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="unit_cost" name="unit_cost[]" class="form-control" value="<?php echo e($unit_cost); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="unit_cost" name="unit_cost[]" class="form-control" value="">
                    <?php endif; ?>
                </div>

                <div class="fra-group">
                    <label for="total_amount">Total Amount</label>
                    <?php if(is_array(old('total_amount'))): ?>
                        <?php $__currentLoopData = old('total_amount'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $total_amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input type="text" id="total_amount" name="total_amount[]" class="form-control" value="<?php echo e($total_amount); ?>">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <input type="text" id="total_amount" name="total_amount[]" class="form-control" value="">
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
<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/sidebar/fraeval/annex-c.blade.php ENDPATH**/ ?>