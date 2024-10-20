
<?php $__env->startSection('content'); ?>
<div class="fra-container">
    <div class="org_info">
        <table class="table_org_info" style="width: 100%; border-collapse: collapse; border: 1px solid black; font-family: 'Calibri', sans-serif; font-size: 11px; margin-top: 25px">
            <tbody>
                <tr>
                    <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">Application No.</th>
                    <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 44%;">Received by:</th>
                    <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">Date received:</th>
                </tr>
                <tr>
                    <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">Name of Project:</th>
                    <td colspan="2" style="border: 1px solid black; padding: 1.5px;"><?php echo e($annexa->name_of_project ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">Date/Duration:</th>
                    <td colspan="2" style="border: 1px solid black; padding: 1.5px;"><?php echo e($annexa->start_date ?? 'N/A'); ?> to <?php echo e($annexa->end_date ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">Requesting Organization:</th>
                    <td colspan="2" style="border: 1px solid black; padding: 1.5px;"><?php echo e($annexa->requesting_organization ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">College/Branch/Campus:</th>
                    <td colspan="2" style="border: 1px solid black; padding: 1.5px;"><?php echo e($annexa->college_branch ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">Name of Representative:</th>
                    <td colspan="2" style="border: 1px solid black; padding: 1.5px;"><?php echo e($annexa->representative ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">Address and Contact:</th>
                    <td colspan="2" style="border: 1px solid black; padding: 1.5px;"><?php echo e($annexa->address_contact ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">Objectives:</th>
                    <td colspan="2" style="border: 1px solid black; padding: 1.5px;"><?php echo e($annexa->objectives ?? 'N/A'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="items_info">
        <h2 style="font-family: 'Calibri', sans-serif; font-size: 11px; font-weight: bold;">PROJECT ESTIMATES:</h2>
        <h3 style="font-family: 'Calibri', sans-serif; font-size: 11px; font-weight: bold;">1. Estimate Income (provide extra sheet if necessary)</h3>
        
        <?php
            $items_to_be_sold = json_decode($annexa->items_to_be_sold) ?? [];
            $item_pieces = json_decode($annexa->item_pieces) ?? [];
            $itemPrices = json_decode($annexa->price_ticket) ?? [];
            $totalEstimateItems = json_decode($annexa->total_estimate_ticket) ?? [];
            $other_income = json_decode($annexa->other_income) ?? [];
            $amount = json_decode($annexa->amount) ?? [];
        ?>
    
        <?php if(is_array($items_to_be_sold) && is_array($itemPrices)): ?>
            <table class="table" style="width: 100%; border-collapse: collapse; border: 1px solid black; font-family: 'Calibri', sans-serif; font-size: 11px;">
                <tbody>
                    <tr>
                        <th style="border: 1px solid black; padding: 1.5px; width: 50%; text-align: left; vertical-align: top;">a. Number of tickets/items to be sold</th>
                        <td style="border: 1px solid black; padding: 1.5px;">
                            <?php $__currentLoopData = $items_to_be_sold; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($item ?? 'N/A'); ?> 
                                - <?php echo e($item_pieces[$index] ?? 'N/A'); ?> pcs
                                <?php if(!$loop->last): ?> <br> <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <th style="border: 1px solid black; padding: 1.5px; width: 50%; text-align: left; vertical-align: top;">b. Price per ticket/item</th>
                        <td style="border: 1px solid black; padding: 1.5px;">
                            <?php $__currentLoopData = $items_to_be_sold; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($item ?? 'N/A'); ?> 
                                - Php <?php echo e($itemPrices[$index] ?? 'N/A'); ?> 
                                <?php if(!$loop->last): ?> <br> <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid black; padding: 1.5px; width: 50%; text-align: left; vertical-align: top;">c. Total estimated tickets/items sales (a x b)</th>
                        <td style="border: 1px solid black; padding: 1.5px;">
                            <?php $__currentLoopData = $items_to_be_sold; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($item ?? 'N/A'); ?> 
                                - Php <?php echo e($totalEstimateItems[$index] ?? 'N/A'); ?> 
                                <?php if(!$loop->last): ?> <br> <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid black; padding: 1.5px; width: 50%; text-align: left; vertical-align: top;">d. Other Income</th>
                        <td style="border: 1px solid black; padding: 1.5px;">
                            <?php $__currentLoopData = $other_income; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($item ?? 'N/A'); ?> 
                                - Php <?php echo e($amount[$index] ?? 'N/A'); ?> 
                                <?php if(!$loop->last): ?> <br> <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                    </tr>
                    
                    <tr>
                        <th style="border: 1px solid black; padding: 1.5px; width: 50%; text-align: left; vertical-align: top;">e. Total estimated Income (c + d)</th>
                        <td style="border: 1px solid black; padding: 1.5px;">Php <?php echo e($annexa->total_estimated_income ?? 'N/A'); ?></td>     
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <p><strong>Other Income:</strong> N/A</p>
        <?php endif; ?>
    </div>

    <div class="items_info"> 
        <h3 style="font-family: 'Calibri', sans-serif; font-size: 11px; font-weight: bold;">2. Budgeted Expenses</h3>
        <?php
            $expenditures = json_decode($annexa->expenditures) ?? [];
            $amounts = json_decode($annexa->amount) ?? [];
        ?>
    
        <?php if(is_array($expenditures) && is_array($amounts)): ?>
            <table class="table" style="width: 100%; border-collapse: collapse; border: 1px solid black; font-family: 'Calibri', sans-serif; font-size: 11px;">
                <thead>
                    <tr>
                        <th style="border: 1px solid black; padding: 1.5px; width: 50%; text-align: left;">Expenditure</th>
                        <th style="border: 1px solid black; padding: 1.5px; width: 50%; text-align: left;">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $expenditures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $expenditure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="border: 1px solid black; padding: 1.5px;"><?php echo e($expenditure ?? 'N/A'); ?></td>
                            <td style="border: 1px solid black; padding: 1.5px;">Php <?php echo e($amounts[$index] ?? 'N/A'); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="border: 1px solid black; padding: 1.5px; font-weight: bold;">a. Total Budget Expenses</td>
                        <td style="border: 1px solid black; padding: 1.5px;">Php <?php echo e($annexa->total_budget_expenses_php ?? 'N/A'); ?></td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <p><strong>Expenditures:</strong> N/A</p>
        <?php endif; ?>
    </div>
    <div class="fra-container page-break">
    <div class="other_info "> 
        <table class="table" style="width: 100%; border-collapse: collapse; border: 1px solid black; font-family: 'Calibri', sans-serif; font-size: 11px; margin-top: 17px;">
            <tbody>
                <tr>
                    <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">3. Total Estimated Proceeds (1e-2a)</th>
                </tr>
                <tr>
                    <td style="border: 1px solid black; padding: 1.5px;"><?php echo e($annexa->total_estimated_proceeds ?? 'N/A'); ?></td>
                </tr>
            </tbody>
        </table>


        <table class="table" style="width: 100%; border-collapse: collapse; border: 1px solid black; font-family: 'Calibri', sans-serif; font-size: 11px; margin-top: 17px;">
            <tbody>
                <tr>
                    <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">4. Proceeds Utilization Plan/Budget Proposal (use extra sheet if necessary)</th>
                </tr>
                <tr>
                    <td style="border: 1px solid black; padding: 1.5px;"><?php echo e($annexa->utilization_plan ?? 'N/A'); ?></td>
                </tr>
            </tbody>
        </table>
    
        <table class="table" style="width: 100%; border-collapse: collapse; border: 1px solid black; font-family: 'Calibri', sans-serif; font-size: 11px; margin-top: 17px;">
            <tbody>
                <tr>
                    <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">5. Solicitation/Lists of Donors (Pls. provide extra sheet if necessary)</th>
                </tr>
                <tr>
                    <td style="border: 1px solid black; padding: 1.5px;"><?php echo e($annexa->solicitation ?? 'N/A'); ?></td>
                </tr>
            </tbody>
        </table>
    
        <table class="table" style="width: 100%; border-collapse: collapse; border: 1px solid black; font-family: 'Calibri', sans-serif; font-size: 11px; margin-top: 17px;">
            <tbody>
                <tr>
                    <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">6. Lists of Officials/Coordinator (pls. use extra sheet)</th>
                </tr>
                <tr>
                    <td style="border: 1px solid black; padding: 1.5px;"><?php echo e($annexa->coordinator ?? 'N/A'); ?></td>
                </tr>
            </tbody>
        </table>
    
        <table class="table" style="width: 100%; border-collapse: collapse; border: 1px solid black; font-family: 'Calibri', sans-serif; font-size: 11px; margin-top: 17px;">
            <tbody>
                <tr>
                    <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">7. Lists of Participants (if necessary)</th>
                </tr>
                <tr>
                    <td style="border: 1px solid black; padding: 1.5px;"><?php echo e($annexa->participants ?? 'N/A'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
    <br>
    <div class="head_info" style="width: 100%; font-family: 'Calibri', sans-serif; font-size: 11px; margin-top: 10px;">
        <table style="width: 100%; border-collapse: collapse; font-family: 'Calibri', sans-serif; font-size: 11px;">
            <thead>
                <tr>
                    <td style="padding: 1.5px; text-align: center;"><?php echo e($annexa->treasurer ?? 'N/A'); ?></td>
                    <td style="padding: 1.5px; text-align: center; "><?php echo e($annexa->president ?? 'N/A'); ?></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="padding: 1.5px; text-align: center;">
                        <div style="border-top: 1px solid black; width: 50%; margin: 0 auto;"></div> 
                        Treasurer/Representative
                    </th>
                    <th style="padding: 1.5px; text-align: center;">
                        <div style="border-top: 1px solid black; width: 50%; margin: 0 auto;"></div> 
                        President of Organization
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <p style="font-family: 'Calibri', sans-serif; font-size: 11px; font-weight: bold; font-style: italic; text-align: center;">RECOMMENDING APPROVAL</p>
    <br>
    <div class="other_approval" style="width: 100%; font-family: 'Calibri', sans-serif; font-size: 11px; margin-top: 10px;">
        <table style="width: 100%; border-collapse: collapse; font-family: 'Calibri', sans-serif; font-size: 11px;">
            <thead>
                <tr>
                    <td style="padding: 1.5px; text-align: center;"></td>
                    <td style="padding: 1.5px; text-align: center; "></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th style="padding: 1.5px; text-align: center;">
                        <div style="border-top: 1px solid black; width: 50%; margin: 0 auto;"></div> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adviser&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </th>
                    <th style="padding: 1.5px; text-align: center;">
                        <div style="border-top: 1px solid black; width: 50%; margin: 0 auto;"></div> 
                        Dean/Director
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.pdflayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/pdf/annexapdf.blade.php ENDPATH**/ ?>