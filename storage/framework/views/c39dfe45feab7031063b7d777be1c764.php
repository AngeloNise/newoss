
<?php $__env->startSection('content'); ?>
<div class="fra-container">
    <form action="<?php echo e(url('annexbs')); ?>" method="POST">
    <?php echo csrf_field(); ?>
        <h2>FUND RAISING ACTIVITY APPLICATION (Annex-b)</h2>

        <h2>Financial Report</h2>
        <div class="fill-up-container">
            <div class="fra-group">
                <label for="name_of_org">Name of Organization</label>
                <input type="text" id="name_of_org" name="name_of_org" class="form-control">
            </div>
    
            <div class="fra-group">
                <label for="semester">Semester</label>
                <input type="text" id="semester" name="semester" class="form-control">
            </div>
    
            <div class="fra-group">
                <label for="school_year">School Year</label>
                <input type="text" id="school_year" name="school_year" class="form-control">
            </div>
    
            <div class="fra-group">
                <label for="period_covered">Period Covered</label>
                <input type="text" id="period_covered" name="period_covered" class="form-control">
            </div>
    
            <div class="fra-group">
                <label for="cash_balance">Beginning Cash Balance (From Previous FRA if there is any) </label>
                <input type="text" id="cash_balance" name="cash_balance" class="form-control">
            </div>
    
            <div class="fra-group">
                <label for="cash_receipt">Add: Cash Receipts/Collection:</label>
                <input type="text" id="cash_receipt" name="cash_receipt" class="form-control">
            </div>
    
            <div class="fra-group">
                <label for="solicitation">Solicitation/Donations (if there is any)</label>
                <input type="text" id="solicitation" name="solicitation" class="form-control">
            </div>

            <div class="fra-group">
                <label for="cash_available">Total Cash Available</label>
                <input type="text" id="cash_available" name="cash_available" class="form-control">
            </div>

            <div class="fra-group">
                <label for="cash_disbursements">Less: Cash Disbursements</label>
                <input type="text" id="cash_disbursements" name="cash_disbursements" class="form-control">
            </div>

            <div class="fra-group">
                <label for="ending_cash_balance">Ending Cash Balance</label>
                <input type="text" id="ending_cash_balance" name="ending_cash_balance" class="form-control">
            </div>

            <h2>Summary of Cash Receipts and Disbursements</h2>
            <h3>Cash Receipts</h3>

            <div id="cash-receipt">
                <div class="split-1">
                    <div class="fra-group">
                        <label for="date_receipt">Date</label>
                        <input type="text" id="date_receipt" name="date_receipt[]" class="form-control">
                    </div>
            
                    <div class="fra-group">
                        <label for="invoice_no_receipt">O.R./Invoice No.</label>
                        <input type="text" id="invoice_no_receipt" name="invoice_no_receipt[]" class="form-control">
                    </div>

                    <div class="fra-group">
                        <label for="particulars">Particulars</label>
                        <input type="text" id="particulars" name="particulars[]" class="form-control">
                    </div>

                    <div class="fra-group">
                        <label for="amount">Amount</label>
                        <input type="text" id="amount" name="amount[]" class="form-control">
                    </div>

                    <div class="fra-group">
                        <label for="remarks_receipt">Remarks</label>
                        <input type="text" id="remarks_receipt" name="remarks_receipt[]" class="form-control">
                    </div>
                </div>
            </div> 

            <div class="button-receipt">
                <button type="button" id="add-cash-receipt">Add</button>
            </div>  

            <div class="fra-group">
                <label for="total_receipt">Total</label>
                <input type="text" id="total_receipt" name="total_receipt" class="form-control" placeholder="Php">
            </div>

            <h3>Disbursements</h3>

            <div id="disbursements">
                <div class="split-2">
                    <div class="fra-group">
                        <label for="date_disburse">Date</label>
                        <input type="text" id="date_disburse" name="date_disburse[]" class="form-control">
                    </div>
            
                    <div class="fra-group">
                        <label for="invoice_no_disburse">O.R./Invoice No.</label>
                        <input type="text" id="invoice_no_disburse" name="invoice_no_disburse[]" class="form-control">
                    </div>

                    <div class="fra-group">
                        <label for="description">Description</label>
                        <input type="text" id="description" name="description[]" class="form-control">
                    </div>

                    <div class="fra-group">
                        <label for="purpose">Purpose</label>
                        <input type="text" id="purpose" name="purpose[]" class="form-control">
                    </div>

                    <div class="fra-group">
                        <label for="remarks_disburse">Remarks</label>
                        <input type="text" id="remarks_disburse" name="remarks_disburse[]" class="form-control">
                    </div>
                </div>
            </div> 

            <div class="button-disbursements">
                <button type="button" id="add-disbursements">Add</button>
            </div>  

            <div class="fra-group">
                <label for="total_disburse">Total</label>
                <input type="text" id="total_disburse" name="total_disburse" class="form-control" placeholder="Php">
            </div>

            <h3>Additional Information</h3>
            <div class="split">
                <div class="fra-group">
                    <label for="prepared">Prepared by:</label>
                    <input type="text" id="prepared" name="prepared" class="form-control" placeholder="Treasurer/Representative">
                </div>
    
                <div class="fra-group">
                    <label for="checked">Checked by:</label>
                    <input type="text" id="checked" name="checked" class="form-control" placeholder="Auditor">
                </div>
            </div>

            <div class="split">
                <div class="fra-group">
                    <label for="approved">Approved by:</label>
                    <input type="text" id="approved" name="approved" class="form-control" placeholder="President of Organization">
                </div>
    
                <div class="fra-group">
                    <label for="certified">Certified Correct by:</label>
                    <input type="text" id="certified" name="certified" class="form-control" placeholder="Adviser">
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/fraeval/annex-b.blade.php ENDPATH**/ ?>