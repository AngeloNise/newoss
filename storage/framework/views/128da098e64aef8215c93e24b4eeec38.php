
<?php $__env->startSection('content'); ?>
<div class="fra-container">
    <a href="/faculty/FRA-B-Evaluation" class="btn btn-primary">Back</a>
    <h2>Financial Summary</h2>

    <div class="org_info">
        <h3>Organization Information</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Name of Organization</th>
                    <th>Period Cover</th>
                    <th>Semester</th>
                    <th>School Year</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo e($annexb->name_of_org ?? 'N/A'); ?></td>
                    <td><?php echo e($annexb->period_covered ?? 'N/A'); ?></td>
                    <td><?php echo e($annexb->semester ?? 'N/A'); ?></td>
                    <td><?php echo e($annexb->school_year ?? 'N/A'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="org_info">
        <table class="table">
            <thead>
                <tr>
                    <th>Solicitation</th>
                    <th>Cash Available</th>
                    <th>Cash Receipts</th>
                    <th>Cash Disbursements</th>
                    <th>Cash Balance</th>
                    <th>Ending Cash Balance</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo e($annexb->solicitation ?? 'N/A'); ?></td>
                    <td><?php echo e($annexb->cash_available ?? 'N/A'); ?></td>
                    <td><?php echo e($annexb->cash_receipt ?? 'N/A'); ?></td>
                    <td><?php echo e($annexb->cash_disbursements ?? 'N/A'); ?></td>
                    <td><?php echo e($annexb->cash_balance ?? 'N/A'); ?></td>
                    <td><?php echo e($annexb->ending_cash_balance ?? 'N/A'); ?></td>
                </tr>
            </tbody>
        </table>
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

        <?php if(count($dates_receipt) > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice No</th>
                        <th>Particulars</th>
                        <th>Amount</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 0; $i < count($dates_receipt); $i++): ?>
                        <tr>
                            <td><?php echo e($dates_receipt[$i] ?? 'N/A'); ?></td>
                            <td><?php echo e($invoice_no_receipt[$i] ?? 'N/A'); ?></td>
                            <td><?php echo e($particulars[$i] ?? 'N/A'); ?></td>
                            <td><?php echo e($amounts[$i] ?? 'N/A'); ?></td>
                            <td><?php echo e($remarks_receipt[$i] ?? 'N/A'); ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p><strong>Receipts:</strong> N/A</p>
        <?php endif; ?>

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

        <?php if(count($dates_disburse) > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice No</th>
                        <th>Description</th>
                        <th>Purpose</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 0; $i < count($dates_disburse); $i++): ?>
                        <tr>
                            <td><?php echo e($dates_disburse[$i] ?? 'N/A'); ?></td>
                            <td><?php echo e($invoice_no_disburse[$i] ?? 'N/A'); ?></td>
                            <td><?php echo e($descriptions[$i] ?? 'N/A'); ?></td>
                            <td><?php echo e($purposes[$i] ?? 'N/A'); ?></td>
                            <td><?php echo e($remarks_disburse[$i] ?? 'N/A'); ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p><strong>Disbursements:</strong> N/A</p>
        <?php endif; ?>

        <p><strong>Total Disbursements:</strong> <?php echo e($annexb->total_disburse ?? 'N/A'); ?></p>
    </div>

    <div class="other_info">
        <h3>Other Information</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Prepared by</th>
                    <th>Approved by</th>
                    <th>Checked by</th>
                    <th>Certified by</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo e($annexb->prepared ?? 'N/A'); ?></td>
                    <td><?php echo e($annexb->approved ?? 'N/A'); ?></td>
                    <td><?php echo e($annexb->checked ?? 'N/A'); ?></td>
                    <td><?php echo e($annexb->certified ?? 'N/A'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/fraeval/fra-b-evaluation-detail.blade.php ENDPATH**/ ?>