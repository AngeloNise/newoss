
<?php $__env->startSection('content'); ?>
<div class="fra-container">
    <a href="/dean/Pre-Evaluation-Forms" class="btn btn-primary">Back</a>
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
                    <td><?php echo e($application->email ?? 'N/A'); ?></td>
                    <td><?php echo e($application->name_of_project ?? 'N/A'); ?></td>
                    <td><?php echo e($application->requesting_organization ?? 'N/A'); ?></td>
                    <td><?php echo e($application->college_branch ?? 'N/A'); ?></td>
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
                    <td><?php echo e($application->start_date ?? 'N/A'); ?></td>
                    <td><?php echo e($application->end_date ?? 'N/A'); ?></td>
                    <td><?php echo e($application->representative ?? 'N/A'); ?></td>
                    <td><?php echo e($application->address ?? 'N/A'); ?><?php echo e($application->address && $application->contact ? ' - ' : ''); ?><?php echo e($application->contact ?? 'N/A'); ?></td>
                    <td><?php echo e($application->objectives ?? 'N/A'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="items_info">
        <h3>Items to be Sold</h3>
        <?php
            $items_to_be_sold = json_decode($application->items_to_be_sold) ?? [];
            $item_pieces = json_decode($application->item_pieces) ?? [];
            $itemPrices = json_decode($application->price_ticket) ?? [];
            $totalEstimateItems = json_decode($application->total_estimate_ticket) ?? [];
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
            $other_income = json_decode($application->other_income) ?? [];
            $income_amount = json_decode($application->income_amount) ?? [];
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
            $expenditures = json_decode($application->expenditures) ?? [];
            $amounts = json_decode($application->amount) ?? [];
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

        <p><strong>Total Estimated Income:</strong> <?php echo e($application->total_estimated_income ?? 'N/A'); ?></p>
        <p><strong>Total Budget Expenses (PHP):</strong> <?php echo e($application->total_budget_expenses_php ?? 'N/A'); ?></p>
        <p><strong>Total Estimated Proceeds:</strong> <?php echo e($application->total_estimated_proceeds ?? 'N/A'); ?></p>
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
                    <td><?php echo e($application->coordinator ?? 'N/A'); ?></td>
                    <td><?php echo e($application->participants ?? 'N/A'); ?></td>
                    <td><?php echo e($application->utilization_plan ?? 'N/A'); ?></td>
                    <td><?php echo e($application->solicitation ?? 'N/A'); ?></td>
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
                    <td><?php echo e($application->president ?? 'N/A'); ?></td>
                    <td><?php echo e($application->treasurer ?? 'N/A'); ?></td>
                </tr>
            </tbody>
        </table>
        <a href="<?php echo e(route('dean.fra-a-evaluation.suggestion', $application->id)); ?>" class="btn btn-secondary">Add Comment</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.deanlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/dean/auth/fra-a-evaluation-detail.blade.php ENDPATH**/ ?>