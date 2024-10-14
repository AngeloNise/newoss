
<?php $__env->startSection('content'); ?>
<div class="fra-container">
    <a href="/faculty/FRA-C-Evaluation" class="btn btn-primary">Back</a>
    <h2>Acknowledgement Receipt for Equipment</h2>

    <div class="receipt_info">
        <?php
            // Assuming these variables are arrays similar to the receipts example
            $quantities = json_decode($annexc->qty) ?? [];
            $units = json_decode($annexc->unit) ?? [];
            $descriptions = json_decode($annexc->item_description) ?? [];
            $serial_nos = json_decode($annexc->serial_no) ?? [];
            $property_nos = json_decode($annexc->property_no) ?? [];
            $unit_costs = json_decode($annexc->unit_cost) ?? [];
            $total_amounts = json_decode($annexc->total_amount) ?? [];
        ?>

        <?php if(count($quantities) > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Qty.</th>
                        <th>Unit</th>
                        <th>Item/Description</th>
                        <th>Serial No.</th>
                        <th>Property No.</th>
                        <th>Unit Cost</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 0; $i < count($quantities); $i++): ?>
                        <tr>
                            <td><?php echo e($quantities[$i] ?? 'N/A'); ?></td>
                            <td><?php echo e($units[$i] ?? 'N/A'); ?></td>
                            <td><?php echo e($descriptions[$i] ?? 'N/A'); ?></td>
                            <td><?php echo e($serial_nos[$i] ?? 'N/A'); ?></td>
                            <td><?php echo e($property_nos[$i] ?? 'N/A'); ?></td>
                            <td><?php echo e($unit_costs[$i] ?? 'N/A'); ?></td>
                            <td><?php echo e($total_amounts[$i] ?? 'N/A'); ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p><strong>Equipment Details:</strong> N/A</p>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/fraeval/fra-c-evaluation-detail.blade.php ENDPATH**/ ?>