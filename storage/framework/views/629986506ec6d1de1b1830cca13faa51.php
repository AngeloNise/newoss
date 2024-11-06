<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/orgs/fraeval/annexa.css')); ?>">
<script src="<?php echo e(asset('js/org/annexa.js')); ?>"></script>
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
    <form action="<?php echo e(url('/annex-a')); ?>" method="POST">
    <?php echo csrf_field(); ?>
        <h2>FUND RAISING ACTIVITY APPLICATION (Annex-A)</h2>
        <div class="fill-up-container">
            <input type="hidden" name="email" value="<?php echo e(auth()->user()->email); ?>">
            
            <div class="fra-group">
                <label for="name_of_project">Name of Project</label>
                <input type="text" id="name_of_project" name="name_of_project" class="form-control" value="<?php echo e(old('name_of_project')); ?>" required>
                <?php $__errorArgs = ['name_of_project'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div id="duration">
                <div class="split">
                    <div class="fra-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo e(old('start_date')); ?>" required>
                        <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    
                    <div class="fra-group">
                        <label for="end_date">End Date</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" value="<?php echo e(old('end_date')); ?>" required>
                        <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>            

            <div class="fra-group">
                <label for="requesting_organization">Requesting Organization</label>
                <input type="text" id="requesting_organization" name="requesting_organization" class="form-control <?php echo e(Session::has('error_field') && Session::get('error_field') == 'requesting_organization' ? 'is-invalid' : ''); ?>" 
                    value="<?php echo e(old('requesting_organization', auth()->user()->name_of_organization)); ?>" 
                    placeholder="<?php echo e(auth()->user()->name_of_organization ?? 'Enter your organization name'); ?>">
                <?php if(Session::has('error_field') && Session::get('error_field') == 'requesting_organization'): ?>
                    <small class="text-danger">The requesting organization does not match our records.</small>
                <?php endif; ?>
            </div>
            
            

            <div class="fra-group">
                <label for="college_branch">College/Branch/Campus</label>
                <input type="text" id="college_branch" name="college_branch" class="form-control" value="<?php echo e(old('college_branch')); ?>" required>
                <?php $__errorArgs = ['college_branch'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div class="fra-group">
                <label for="representative">Name of Representative</label>
                <input type="text" id="representative" name="representative" class="form-control" value="<?php echo e(old('representative')); ?>" required>
                <?php $__errorArgs = ['representative'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div class="fra-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control" value="<?php echo e(old('address')); ?>" required>
                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div class="fra-group">
                <label for="contact">Contact No.</label>
                <input type="text" id="contact" name="contact" class="form-control" value="<?php echo e(old('contact')); ?>" required>
                <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div class="fra-group">
                <label for="objectives">Objectives</label>
                <input type="text" id="objectives" name="objectives" class="form-control" value="<?php echo e(old('objectives')); ?>" required>
                <?php $__errorArgs = ['objectives'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="text-danger"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>            

            <h2>Project Estimates</h2>
            <h3>1. Estimate Income</h3>
            
            <div id="items">
                <h5>(Tickets are to be registered at the Office of Student Services)</h5>
                <div class="items-to-be-sold">
                    <div class="fra-group">
                        <label for="items_to_be_sold">a. Tickets/items to be sold</label>
                        <?php if(is_array(old('items_to_be_sold'))): ?>
                            <?php $__currentLoopData = old('items_to_be_sold'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="text" id="items_to_be_sold" name="items_to_be_sold[]" class="form-control" value="<?php echo e($income); ?>"><br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <input type="text" id="items_to_be_sold" name="items_to_be_sold[]" class="form-control" value="">
                        <?php endif; ?>
                    </div>
    
                    <div class="fra-group">
                        <label for="item_pieces">Pieces</label>
                        <?php if(is_array(old('item_pieces'))): ?>
                            <?php $__currentLoopData = old('item_pieces'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pieces): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="text" id="item_pieces" name="item_pieces[]" class="form-control" value="<?php echo e($pieces); ?>">
                                <div class="error-message" style="color: red; display: none;">Please enter a valid number.</div> <!-- Error message -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <input type="text" id="item_pieces" name="item_pieces[]" class="form-control" value="">
                            <div class="error-message" style="color: red; display: none;">Please enter a valid number.</div> <!-- Error message -->
                        <?php endif; ?>
                    </div>
                    
                    <div class="fra-group">
                        <label for="price_ticket">b. Price per ticket/item</label>
                        <?php if(is_array(old('price_ticket'))): ?>
                            <?php $__currentLoopData = old('price_ticket'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="text" id="price_ticket" name="price_ticket[]" class="form-control" value="<?php echo e($price); ?>">
                                <div class="error-message" style="color: red; display: none;">Please enter a valid number.</div> <!-- Error message -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <input type="text" id="price_ticket" name="price_ticket[]" class="form-control" value="">
                            <div class="error-message" style="color: red; display: none;">Please enter a valid number.</div> <!-- Error message -->
                        <?php endif; ?>
                    </div>
                                      
                </div>
            </div>

            <div class="button-items">
                <button type="button" id="remove-items">Remove</button>
                <button type="button" id="add-items">Add</button>
            </div> 

            <div id="total-sales-container">
                <div class="total-sales">
                    <div class="fra-group">
                        <label for="total_estimate_ticket">c. Total estimated tickets/items sales (a × b)</label>
                        <h5>(Note: Change the value if you see the computation went wrong or different from what you got.)</h5>
                        <?php if(is_array(old('total_estimate_ticket'))): ?>
                            <?php $__currentLoopData = old('total_estimate_ticket'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="text" id="total_estimate_ticket" name="total_estimate_ticket[]" class="form-control" value="<?php echo e($total); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <input type="text" id="total_estimate_ticket" name="total_estimate_ticket[]" class="form-control" value="">
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div id="add-income">
                <div class="split">
                    <div class="fra-group">
                        <label for="other_income">d. Other Income</label>
                        <?php if(is_array(old('other_income'))): ?>
                            <?php $__currentLoopData = old('other_income'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="text" id="other_income" name="other_income[]" class="form-control" value="<?php echo e($income); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <input type="text" id="other_income" name="other_income[]" class="form-control" value="">
                        <?php endif; ?>
                    </div>

                    <div class="fra-group">
                        <label for="income_amount">Amount</label>
                        <?php if(is_array(old('income_amount'))): ?>
                            <?php $__currentLoopData = old('income_amount'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="text" id="income_amount" name="income_amount[]" class="form-control" value="<?php echo e($amount); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <input type="text" id="income_amount" name="income_amount[]" class="form-control" value="">
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="button-income">
                <button type="button" id="remove-other-income">Remove</button>
                <button type="button" id="add-other-income">Add</button>
            </div>  

            <div class="fra-group">
                <label for="total_estimated_income">e.Total estimated Income (c + d)</label>
                <input type="text" id="total_estimated_income" name="total_estimated_income" class="form-control" value="<?php echo e(old('total_estimated_income')); ?>">
            </div>

            <h3>2. Budget Expenses</h3>
            <div id="budget-container">
                <div class="split">
                    <div class="fra-group">
                        <label for="expenditures">Expenditure</label>
                        <?php if(is_array(old('expenditures'))): ?>
                            <?php $__currentLoopData = old('expenditures'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expenditure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="text" id="expenditures" name="expenditures[]" class="form-control" value="<?php echo e($expenditure); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <input type="text" id="expenditures" name="expenditures[]" class="form-control" value="">
                        <?php endif; ?>
                    </div>
            
                    <div class="fra-group">
                        <label for="amount">Cost</label>
                        <?php if(is_array(old('amount'))): ?>
                            <?php $__currentLoopData = old('amount'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="text" id="amount" name="amount[]" class="form-control" value="<?php echo e($amount); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <input type="text" id="amount" name="amount[]" class="form-control" value="">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <div class="button-budget">
                <button type="button" id="remove-budget">Remove</button>
                <button type="button" id="add-budget">Add</button>
            </div>  

            <div class="fra-group">
                <label for="total_budget_expenses_php">a. Total Budgeted Expenses</label>
                <input type="text" id="total_budget_expenses_php" name="total_budget_expenses_php" class="form-control" placeholder="(sum of all expenditures) Php" value="<?php echo e(old('total_budget_expenses_php')); ?>">
            </div>

            <div class="fra-group">
                <label for="total_estimated_proceeds">3. Total Estimated Proceeds (1e-2a)</label>
                <input type="text" id="total_estimated_proceeds" name="total_estimated_proceeds" class="form-control" placeholder="(Php) total estimated income minus total budgeted expenses" value="<?php echo e(old('total_estimated_proceeds')); ?>">
            </div>

            <div class="fra-group">
                <label for="utilization_plan">4. Proceeds Utilization Plan/Budget Proposal</label>
                <input type="text" id="utilization_plan" name="utilization_plan" class="form-control" value="<?php echo e(old('utilization_plan')); ?>">
            </div>

            <div class="fra-group">
                <label for="solicitation">5. Solicitation/Lists of Donors</label>
                <input type="text" id="solicitation" name="solicitation" class="form-control" value="<?php echo e(old('solicitation')); ?>">
            </div>

            <div class="fra-group">
                <div id="coordinator">
                    <div class="fra-group">
                        <label for="coordinator">6. Lists of Officials/Coordinators</label>
                        <?php if(is_array(old('coordinator'))): ?>
                            <?php $__currentLoopData = old('coordinator'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coordinator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="text" id="coordinator" name="coordinator[]" class="form-control" value="<?php echo e($coordinator); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <input type="text" id="coordinator" name="coordinator[]" class="form-control" value="">
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="button-coordinator">
                <button type="button" id="remove-coordinator">Remove</button>
                <button type="button" id="add-coordinator">Add</button>
            </div>

            <div class="fra-group">
                <label for="participants">7. Lists of Participants</label>
                <input type="text" id="participants" name="participants" class="form-control" value="<?php echo e(old('participants')); ?>">
            </div>

            <h3>Additional Information</h3>
        <div class="split">
            <div class="fra-group">
                <label for="president">President of Organization</label>
                <input type="text" id="president" name="president" class="form-control <?php echo e(Session::has('error_field') && Session::get('error_field') == 'president' ? 'is-invalid' : ''); ?>" 
                    value="<?php echo e(old('president', auth()->user()->name)); ?>" 
                    placeholder="<?php echo e(auth()->user()->name ?? 'Enter the president\'s name'); ?>">
                <?php if(Session::has('error_field') && Session::get('error_field') == 'president'): ?>
                    <small class="text-danger">The president's name does not match our records.</small>
                <?php endif; ?>
            </div>                   

            <div class="fra-group">
                <label for="treasurer">Treasurer/ Representative</label>
                <input type="text" id="treasurer" name="treasurer" class="form-control" value="<?php echo e(old('treasurer')); ?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/sidebar/fraeval/annex-a.blade.php ENDPATH**/ ?>