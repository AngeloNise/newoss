
<?php $__env->startSection('content'); ?>
<div class="fra-container">
    <a href="/faculty/FRA-B-Evaluation" class="btn btn-primary">Back</a>
    <h2>Financial Summary</h2>
    
    <div class="org_info">
        <p><strong>Name of Organization:</strong> <?php echo e($annexb->name_of_org ?? 'N/A'); ?></p>
        <p><strong>Semester:</strong> <?php echo e($annexb->semester ?? 'N/A'); ?></p>
        <p><strong>School Year:</strong> <?php echo e($annexb->school_year ?? 'N/A'); ?></p>
        <p><strong>Period Covered:</strong> <?php echo e($annexb->period_covered ?? 'N/A'); ?></p>
        <p><strong>Cash Balance:</strong> <?php echo e($annexb->cash_balance ?? 'N/A'); ?></p>
        <p><strong>Cash Receipts:</strong> <?php echo e($annexb->cash_receipt ?? 'N/A'); ?></p>
        <p><strong>Solicitation:</strong> <?php echo e($annexb->solicitation ?? 'N/A'); ?></p>
        <p><strong>Cash Available:</strong> <?php echo e($annexb->cash_available ?? 'N/A'); ?></p>
        <p><strong>Cash Disbursements:</strong> <?php echo e($annexb->cash_disbursements ?? 'N/A'); ?></p>
        <p><strong>Ending Cash Balance:</strong> <?php echo e($annexb->ending_cash_balance ?? 'N/A'); ?></p>
    </div>

    <div class="receipt_info">
        <h3>Receipts</h3>
        <?php
            $dates_receipt = json_decode($annexb->date_receipt) ?? [];
            $invoice_no_receipt = json_decode($annexb->invoice_no_receipt) ?? [];
            $particulars = json_decode($annexb->particulars) ?? [];
            $amounts = json_decode($annexb->amount) ?? [];
            $remarks_receipt = json_decode($annexb->remarks_receipt) ?? [];
        ?>
        <p>
            <?php if(is_array($dates_receipt) && is_array($invoice_no_receipt)): ?>
                <?php $__currentLoopData = $dates_receipt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong>Date:</strong> <?php echo e($date ?? 'N/A'); ?>,
                    <strong>Invoice No:</strong> <?php echo e($invoice_no_receipt[$index] ?? 'N/A'); ?>,
                    <strong>Particulars:</strong> <?php echo e($particulars[$index] ?? 'N/A'); ?>,
                    <strong>Amount:</strong> <?php echo e($amounts[$index] ?? 'N/A'); ?>,
                    <strong>Remarks:</strong> <?php echo e($remarks_receipt[$index] ?? 'N/A'); ?><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <strong>Receipts:</strong> N/A
            <?php endif; ?>
        </p>
        <p><strong>Total Receipts:</strong> <?php echo e($annexb->total_receipt ?? 'N/A'); ?></p>
    </div>

    <div class="disbursement_info">
        <h3>Disbursements</h3>
        <?php
            $dates_disburse = json_decode($annexb->date_disburse) ?? [];
            $invoice_no_disburse = json_decode($annexb->invoice_no_disburse) ?? [];
            $descriptions = json_decode($annexb->description) ?? [];
            $purposes = json_decode($annexb->purpose) ?? [];
            $remarks_disburse = json_decode($annexb->remarks_disburse) ?? [];
        ?>
        <p>
            <?php if(is_array($dates_disburse) && is_array($invoice_no_disburse)): ?>
                <?php $__currentLoopData = $dates_disburse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong>Date:</strong> <?php echo e($date ?? 'N/A'); ?>,
                    <strong>Invoice No:</strong> <?php echo e($invoice_no_disburse[$index] ?? 'N/A'); ?>,
                    <strong>Description:</strong> <?php echo e($descriptions[$index] ?? 'N/A'); ?>,
                    <strong>Purpose:</strong> <?php echo e($purposes[$index] ?? 'N/A'); ?>,
                    <strong>Remarks:</strong> <?php echo e($remarks_disburse[$index] ?? 'N/A'); ?><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <strong>Disbursements:</strong> N/A
            <?php endif; ?>
        </p>
        <p><strong>Total Disbursements:</strong> <?php echo e($annexb->total_disburse ?? 'N/A'); ?></p>
    </div>

    <div class="other_info">
        <p><strong>Prepared by:</strong> <?php echo e($annexb->prepared ?? 'N/A'); ?></p>
        <p><strong>Checked by:</strong> <?php echo e($annexb->checked ?? 'N/A'); ?></p>
        <p><strong>Approved by:</strong> <?php echo e($annexb->approved ?? 'N/A'); ?></p>
        <p><strong>Certified by:</strong> <?php echo e($annexb->certified ?? 'N/A'); ?></p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/fraeval/fra-b-evaluation-detail.blade.php ENDPATH**/ ?>