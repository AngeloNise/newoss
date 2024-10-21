<?php $__env->startSection('content'); ?>
<div class="fra-container">
    <a href="/faculty/FRA-A-Evaluation" class="btn btn-primary">Back</a>
    <h2>Evaluation Details</h2>

    <div class="org_info">
        <h3>Project Information</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Name of Project</th>
                    <th>Requesting Organization</th>
                    <th>College Branch</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo e($annexa->email ?? 'N/A'); ?></td>
                    <td><?php echo e($annexa->name_of_project ?? 'N/A'); ?></td>
                    <td><?php echo e($annexa->requesting_organization ?? 'N/A'); ?></td>
                    <td><?php echo e($annexa->college_branch ?? 'N/A'); ?></td>
                </tr>
            </tbody>
        </table>

        <table class="table">
            <thead>
                <tr>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Representative</th>
                    <th>Address and Contact</th>
                    <th>Objectives</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo e($annexa->start_date ?? 'N/A'); ?></td>
                    <td><?php echo e($annexa->end_date ?? 'N/A'); ?></td>
                    <td><?php echo e($annexa->representative ?? 'N/A'); ?></td>
                    <td><?php echo e($annexa->address_contact ?? 'N/A'); ?></td>
                    <td><?php echo e($annexa->objectives ?? 'N/A'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="items_info">
        <h3>Items to be Sold</h3>
        <?php
            $items_to_be_sold = json_decode($annexa->items_to_be_sold) ?? [];
            $item_pieces = json_decode($annexa->item_pieces) ?? [];
            $itemPrices = json_decode($annexa->price_ticket) ?? [];
            $totalEstimateItems = json_decode($annexa->total_estimate_ticket) ?? [];
        ?>

        <?php if(is_array($items_to_be_sold) && is_array($itemPrices)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Item Pieces</th>
                        <th>Price</th>
                        <th>Estimate Item Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $items_to_be_sold; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item ?? 'N/A'); ?></td>
                            <td><?php echo e($item_pieces[$index] ?? 'N/A'); ?></td>
                            <td><?php echo e($itemPrices[$index] ?? 'N/A'); ?></td>
                            <td><?php echo e($totalEstimateItems[$index] ?? 'N/A'); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <p><strong>Other Income:</strong> N/A</p>
        <?php endif; ?>

        <h3>Other Income</h3>
        <?php
            $other_income = json_decode($annexa->other_income) ?? [];
            $income_amount = json_decode($annexa->income_amount) ?? [];
        ?>

        <?php if(is_array($other_income) && is_array($income_amount)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Item Names</th>
                        <th>Item Pieces</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $other_income; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item ?? 'N/A'); ?></td>
                            <td><?php echo e($income_amount[$index] ?? 'N/A'); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <p><strong>Other Income:</strong> N/A</p>
        <?php endif; ?>

            <h3>Expenditures</h3>
            <?php
                $expenditures = json_decode($annexa->expenditures) ?? [];
                $amounts = json_decode($annexa->amount) ?? [];
            ?>
    
            <?php if(is_array($expenditures) && is_array($amounts)): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Expenditure</th>
                            <th>Item Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $expenditures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $expenditure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($expenditure ?? 'N/A'); ?></td>
                                <td><?php echo e($amounts[$index] ?? 'N/A'); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p><strong>Expenditures:</strong> N/A</p>
            <?php endif; ?>

        <p><strong>Total Estimated Income:</strong> <?php echo e($annexa->total_estimated_income ?? 'N/A'); ?></p>
        <p><strong>Total Budget Expenses (PHP):</strong> <?php echo e($annexa->total_budget_expenses_php ?? 'N/A'); ?></p>
        <p><strong>Total Estimated Proceeds:</strong> <?php echo e($annexa->total_estimated_proceeds ?? 'N/A'); ?></p>
    </div>
        
        <div class="other_info">
            <h3>Other Information</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Coordinator</th>
                        <th>Participants</th>
                        <th>Utilization Plan</th>
                        <th>Solicitation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
    
                        <td><?php echo e($annexa->coordinator ?? 'N/A'); ?></td>
                        <td><?php echo e($annexa->participants ?? 'N/A'); ?></td>
                        <td><?php echo e($annexa->utilization_plan ?? 'N/A'); ?></td>
                        <td><?php echo e($annexa->solicitation ?? 'N/A'); ?></td>
                    </tr>
                </tbody>
            </table>

        <table class="table">
            <thead>
                <tr>
                    <th>President</th>
                    <th>Treasurer</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo e($annexa->president ?? 'N/A'); ?></td>
                    <td><?php echo e($annexa->treasurer ?? 'N/A'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/fraeval/fra-a-evaluation-detail.blade.php ENDPATH**/ ?>