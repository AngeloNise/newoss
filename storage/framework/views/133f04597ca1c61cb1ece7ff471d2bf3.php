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
    <form action="<?php echo e(url('annex-b')); ?>" method="POST">
    <?php echo csrf_field(); ?>
        <h2>FUND RAISING ACTIVITY APPLICATION (Annex-b)</h2>

        <h2>Financial Report</h2>
        <div class="fill-up-container">
            <div class="fra-group">
                <label for="name_of_org">Name of Organization</label>
                <input type="text" id="name_of_org" name="name_of_org" class="form-control <?php echo e(Session::has('error_field') && Session::get('error_field') == 'name_of_org' ? 'is-invalid' : ''); ?>" 
                value="<?php echo e(old('name_of_org')); ?>" 
                placeholder="<?php echo e(auth()->user()->name_of_organization ?? 'Name of Organization'); ?>">
                <?php if(Session::has('error_field') && Session::get('error_field') == 'name_of_org'): ?>
                    <small class="text-danger">Your organization name does not match our records.</small>
                <?php endif; ?>
            </div>
    
            <!-- Semester dropdown -->
            <div class="fra-group">
                <label for="semester">Semester</label>
                <select id="semester" name="semester" class="form-control">
                    <option value="1st sem" <?php echo e(old('semester') == '1st sem' ? 'selected' : ''); ?>>First Semester</option>
                    <option value="2nd sem" <?php echo e(old('semester') == '2nd sem' ? 'selected' : ''); ?>>Second Semester</option>
                    <option value="summer sem" <?php echo e(old('semester') == 'summer sem' ? 'selected' : ''); ?>>Summer Semester</option>
                </select>
            </div>
    
            <div class="fra-group">
                <label for="school_year">School Year</label>
                <select id="school_year" name="school_year" class="form-control">
                    <?php for($year = date('Y'); $year <= date('Y') + 6; $year++): ?>
                        <option value="<?php echo e($year); ?>-<?php echo e($year + 1); ?>" <?php echo e(old('school_year') == "$year-" . ($year + 1) ? 'selected' : ''); ?>>
                            <?php echo e($year); ?>-<?php echo e($year + 1); ?>

                        </option>
                    <?php endfor; ?>
                </select>
            </div>
    
            <div class="fra-group">
                <label for="period_covered">Period Covered</label>
                <input type="text" id="period_covered" name="period_covered" class="form-control" value="<?php echo e(old('period_covered')); ?>">
            </div>
    
            <div class="fra-group">
                <label for="cash_balance">Beginning Cash Balance (From Previous FRA if there is any) </label>
                <input type="text" id="cash_balance" name="cash_balance" class="form-control" value="<?php echo e(old('cash_balance')); ?>">
            </div>
    
            <div class="fra-group">
                <label for="cash_receipt">Add: Cash Receipts/Collection:</label>
                <input type="text" id="cash_receipt" name="cash_receipt" class="form-control" value="<?php echo e(old('cash_receipt')); ?>">
            </div>
    
            <div class="fra-group">
                <label for="solicitation">Solicitation/Donations (if there is any)</label>
                <input type="text" id="solicitation" name="solicitation" class="form-control" value="<?php echo e(old('solicitation')); ?>">
            </div>

            <div class="fra-group">
                <label for="cash_available">Total Cash Available</label>
                <input type="text" id="cash_available" name="cash_available" class="form-control" value="<?php echo e(old('cash_available')); ?>">
            </div>

            <div class="fra-group">
                <label for="cash_disbursements">Less: Cash Disbursements</label>
                <input type="text" id="cash_disbursements" name="cash_disbursements" class="form-control" value="<?php echo e(old('cash_disbursements')); ?>">
            </div>

            <div class="fra-group">
                <label for="ending_cash_balance">Ending Cash Balance</label>
                <input type="text" id="ending_cash_balance" name="ending_cash_balance" class="form-control" value="<?php echo e(old('ending_cash_balance')); ?>">
            </div>

            <h2>Summary of Cash Receipts and Disbursements</h2>
            <h3>Cash Receipts</h3>

            <div id="cash-receipt">
                <div class="split-1">
                    <div class="fra-group">
                        <label for="date_receipt">Date</label>
                        <?php if(is_array(old('date_receipt'))): ?>
                            <?php $__currentLoopData = old('date_receipt'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="text" id="date_receipt" name="date_receipt[]" class="form-control" value="<?php echo e($date); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <input type="text" id="date_receipt" name="date_receipt[]" class="form-control" value="">
                        <?php endif; ?>
                    </div>
                    
                    <div class="fra-group">
                        <label for="invoice_no_receipt">O.R./Invoice No.</label>
                        <?php if(is_array(old('invoice_no_receipt'))): ?>
                            <?php $__currentLoopData = old('invoice_no_receipt'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="text" id="invoice_no_receipt" name="invoice_no_receipt[]" class="form-control" value="<?php echo e($invoice); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <input type="text" id="invoice_no_receipt" name="invoice_no_receipt[]" class="form-control" value="">
                        <?php endif; ?>
                    </div>
            
                    <div class="fra-group">
                        <label for="particulars">Particulars</label>
                        <?php if(is_array(old('particulars'))): ?>
                            <?php $__currentLoopData = old('particulars'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $particular): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="text" id="particulars" name="particulars[]" class="form-control" value="<?php echo e($particular); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <input type="text" id="particulars" name="particulars[]" class="form-control" value="">
                        <?php endif; ?>
                    </div>
            
                    <div class="fra-group">
                        <label for="amount">Amount</label>
                        <?php if(is_array(old('amount'))): ?>
                            <?php $__currentLoopData = old('amount'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="text" id="amount" name="amount[]" class="form-control" value="<?php echo e($amount); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <input type="text" id="amount" name="amount[]" class="form-control" value="">
                        <?php endif; ?>
                    </div>
            
                    <div class="fra-group">
                        <label for="remarks_receipt">Remarks</label>
                        <?php if(is_array(old('remarks_receipt'))): ?>
                            <?php $__currentLoopData = old('remarks_receipt'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $remarks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="text" id="remarks_receipt" name="remarks_receipt[]" class="form-control" value="<?php echo e($remarks); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <input type="text" id="remarks_receipt" name="remarks_receipt[]" class="form-control" value="">
                        <?php endif; ?>
                    </div>
                </div>
            </div>            

            <div class="button-receipt">
                <button type="button" id="remove-cash-receipt">Remove</button>
                <button type="button" id="add-cash-receipt">Add</button>
            </div>  

            <div class="fra-group">
                <label for="total_receipt">Total</label>
                <input type="text" id="total_receipt" name="total_receipt" class="form-control" placeholder="Php" value="<?php echo e(old('total_receipt')); ?>">
            </div>

            <h3>Disbursements</h3>

            <div id="disbursements">
                <div class="split-2">
                    <div class="fra-group">
                        <label for="date_disburse">Date</label>
                        <input type="text" id="date_disburse" name="date_disburse[]" class="form-control" value="<?php echo e(old('date_disburse.0')); ?>">
                    </div>
            
                    <div class="fra-group">
                        <label for="invoice_no_disburse">O.R./Invoice No.</label>
                        <input type="text" id="invoice_no_disburse" name="invoice_no_disburse[]" class="form-control" value="<?php echo e(old('invoice_no_disburse.0')); ?>">
                    </div>

                    <div class="fra-group">
                        <label for="description">Description</label>
                        <input type="text" id="description" name="description[]" class="form-control" value="<?php echo e(old('description.0')); ?>">
                    </div>

                    <div class="fra-group">
                        <label for="purpose">Purpose</label>
                        <input type="text" id="purpose" name="purpose[]" class="form-control" value="<?php echo e(old('purpose.0')); ?>">
                    </div>

                    <div class="fra-group">
                        <label for="remarks_disburse">Remarks</label>
                        <input type="text" id="remarks_disburse" name="remarks_disburse[]" class="form-control" value="<?php echo e(old('remarks_disburse.0')); ?>">
                    </div>
                </div>
            </div> 

            <div class="button-disbursements">
                <button type="button" id="remove-disbursements">Remove</button>
                <button type="button" id="add-disbursements">Add</button>
            </div>  

            <div class="fra-group">
                <label for="total_disburse">Total</label>
                <input type="text" id="total_disburse" name="total_disburse" class="form-control" placeholder="Php" value="<?php echo e(old('total_disburse')); ?>">
            </div>

            <h3>Additional Information</h3>
            <div class="split">
                <div class="fra-group">
                    <label for="prepared">Prepared by:</label>
                    <input type="text" id="prepared" name="prepared" class="form-control" placeholder="Treasurer/Representative" value="<?php echo e(old('prepared')); ?>">
                </div>
    
                <div class="fra-group">
                    <label for="checked">Checked by:</label>
                    <input type="text" id="checked" name="checked" class="form-control" placeholder="Auditor" value="<?php echo e(old('checked')); ?>">
                </div>
            </div>

            <div class="split">
                <div class="fra-group">
                    <label for="approved">Approved by: (President)</label>
                    <input type="text" id="approved" name="approved" class="form-control <?php echo e(Session::has('error_field') && Session::get('error_field') == 'approved' ? 'is-invalid' : ''); ?>" 
                    value="<?php echo e(old('approved')); ?>" 
                    placeholder="<?php echo e(auth()->user()->name ?? 'Enter the president\'s name'); ?>">
                    <?php if(Session::has('error_field') && Session::get('error_field') == 'approved'): ?>
                        <small class="text-danger">The president's name does not match our records.</small>
                    <?php endif; ?>
                </div>
    
                <div class="fra-group">
                    <label for="certified">Certified Correct by:</label>
                    <input type="text" id="certified" name="certified" class="form-control" placeholder="Adviser" value="<?php echo e(old('certified')); ?>">
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/sidebar/fraeval/annex-b.blade.php ENDPATH**/ ?>