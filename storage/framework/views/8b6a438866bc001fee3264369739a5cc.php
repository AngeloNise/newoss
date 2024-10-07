
<?php $__env->startSection('content'); ?>
<div class="fra-container">
    <h2>Evaluation Details</h2>
    <div class="org_info">
        <p><strong>Email:</strong> <?php echo e($annexa->email ?? 'N/A'); ?></p>
        <p><strong>Name of Project:</strong> <?php echo e($annexa->name_of_project ?? 'N/A'); ?></p>
        <p><strong>Requesting Organization:</strong> <?php echo e($annexa->requesting_organization ?? 'N/A'); ?></p>
        <p><strong>College Branch:</strong> <?php echo e($annexa->college_branch ?? 'N/A'); ?></p>
        <p><strong>Start Date:</strong> <?php echo e($annexa->start_date ?? 'N/A'); ?></p>
        <p><strong>End Date:</strong> <?php echo e($annexa->end_date ?? 'N/A'); ?></p>
        <p><strong>Representative:</strong> <?php echo e($annexa->representative ?? 'N/A'); ?></p>
        <p><strong>Address and Contact:</strong> <?php echo e($annexa->address_contact ?? 'N/A'); ?></p>
        <p><strong>Objectives:</strong> <?php echo e($annexa->objectives ?? 'N/A'); ?></p>
    </div>
    <div class="items_info">
        <?php
            $estimate_income = json_decode($annexa->estimate_income) ?? [];
            $item_pieces = json_decode($annexa->item_pieces) ?? [];
            $itemPrices = json_decode($annexa->price_ticket) ?? [];
            $totalEstimateItems = json_decode($annexa->total_estimate_ticket) ?? [];
        ?>

        <p>
            <?php if(is_array($estimate_income) && is_array($itemPrices)): ?>
                <?php $__currentLoopData = $estimate_income; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong>Item:</strong> <?php echo e($item ?? 'N/A'); ?>, 
                    <strong>Item Pieces:</strong> <?php echo e($item_pieces[$index] ?? 'N/A'); ?>, 
                    <strong>Price:</strong> <?php echo e($itemPrices[$index] ?? 'N/A'); ?>, 
                    <strong>Estimate Item Price:</strong> <?php echo e($totalEstimateItems[$index] ?? 'N/A'); ?><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <strong>Items to be sold:</strong> <?php echo e($estimate_income ? implode(', ', $estimate_income) : 'N/A'); ?><br>
                <strong>Item Pieces:</strong> <?php echo e($item_pieces ? implode(', ', $item_pieces) : 'N/A'); ?><br>
                <strong>Item Price:</strong> <?php echo e($itemPrices ? implode(', ', $itemPrices) : 'N/A'); ?><br>
                <strong>Total Estimate Item Price:</strong> <?php echo e($totalEstimateItems ? implode(', ', $totalEstimateItems) : 'N/A'); ?>

            <?php endif; ?>
        </p>

        <?php
            $otherIncome = json_decode($annexa->other_income) ?? [];
            $otherIncomeAmount = json_decode($annexa->income_amount) ?? [];
        ?>

        <p>
            <?php if(is_array($otherIncome) && is_array($otherIncomeAmount)): ?>
                <?php $__currentLoopData = $otherIncome; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $income): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong>Other Income:</strong> <?php echo e($income ?? 'N/A'); ?>, 
                    <strong>Amount:</strong> <?php echo e($otherIncomeAmount[$index] ?? 'N/A'); ?><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <strong>Other Income:</strong> <?php echo e($otherIncome ? implode(', ', $otherIncome) : 'N/A'); ?><br>
                <strong>Amount:</strong> <?php echo e($otherIncomeAmount ? implode(', ', $otherIncomeAmount) : 'N/A'); ?>

            <?php endif; ?>
        </p>

        <p><strong>Total Estimated Income:</strong> <?php echo e($annexa->total_estimated_income ?? 'N/A'); ?></p>
        <p><strong>Total Budget Expenses (PHP):</strong> <?php echo e($annexa->total_budget_expenses_php ?? 'N/A'); ?></p>
        <p><strong>Total Estimated Proceeds:</strong> <?php echo e($annexa->total_estimated_proceeds ?? 'N/A'); ?></p>
    </div>

    <div class="other_info">
        <p><strong>Coordinator:</strong> <?php echo e($annexa->coordinator ?? 'N/A'); ?></p>
        <p><strong>Participants:</strong> <?php echo e($annexa->participants ?? 'N/A'); ?></p>
        <p><strong>Utilization Plan:</strong> <?php echo e($annexa->utilization_plan ?? 'N/A'); ?></p>
        <p><strong>Solicitation:</strong> <?php echo e($annexa->solicitation ?? 'N/A'); ?></p>
        <?php
            $expenditures = json_decode($annexa->expenditures) ?? [];
            $amounts = json_decode($annexa->amount) ?? [];
        ?>

        <p>
            <?php if(is_array($expenditures) && is_array($amounts)): ?>
                <?php $__currentLoopData = $expenditures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $expenditure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong>Expenditure:</strong> <?php echo e($expenditure ?? 'N/A'); ?>, 
                    <strong>Cost:</strong> <?php echo e($amounts[$index] ?? 'N/A'); ?><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <strong>Expenditures:</strong> <?php echo e($expenditures ? implode(', ', $expenditures) : 'N/A'); ?> 
                <strong>Cost:</strong> <?php echo e($amounts ? implode(', ', $amounts) : 'N/A'); ?>

            <?php endif; ?>
        </p>

        <p><strong>President:</strong> <?php echo e($annexa->president ?? 'N/A'); ?></p>
        <p><strong>Treasurer:</strong> <?php echo e($annexa->treasurer ?? 'N/A'); ?></p>
    </div>

    <a href="<?php echo e(route('faculty.fra.evaluation')); ?>" class="btn btn-primary">Back to List</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/fra-evaluation-detail.blade.php ENDPATH**/ ?>