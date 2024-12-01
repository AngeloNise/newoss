<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Applications Details PDF</title>
    <style>
        @page {
            size: 8.5in 14in; /* Legal size */
            margin: 0.5in; /* 0.5 inch margin */
        }
        
        .container {
            width: 100%;
        }
        
        .page {
            page-break-after: always; /* Ensure each section starts on a new page */
            margin-bottom: 20px; /* Space between sections */
        }

        h2 {
            text-decoration: underline;
            margin: 0; /* Remove default margin */
            padding-bottom: 10px; /* Add space below heading */
        }

        .no-applications {
            font-style: italic;
            color: gray;
        }
    </style>
</head>
<body>

    
    <div class="container">
        <div class="page">
            <table id="headerTable" style="width: 100%; border-collapse: collapse; margin-top: -5px;">
                <tr>
                    <td style="width: 80px; vertical-align: middle;">
                        <?php if($logo && $logo->oss_logo && file_exists(public_path('images/' . $logo->oss_logo))): ?>
                            <img src="<?php echo e(public_path('images/' . $logo->oss_logo)); ?>" width="80px" alt="University Logo">
                        <?php else: ?>
                            <p>Image not found</p>
                        <?php endif; ?>
                    </td>
                    <td style="text-align: left; vertical-align: middle;">
                        <h4 style="font-family: 'Calibri', sans-serif; font-size: 10pt; font-weight: normal; margin: 0;">
                            &nbsp;&nbsp;&nbsp;Republic of the Philippines
                        </h4>
                        <h4 style="font-family: 'Californian FB', serif; font-size: 12pt; font-weight: bold; margin: 0;">
                            &nbsp;&nbsp;&nbsp;POLYTECHNIC UNIVERSITY OF THE PHILIPPINES
                        </h4>
                        <h4 style="font-family: 'Californian FB', serif; font-size: 12pt; font-weight: normal; margin: 0;">
                            &nbsp;&nbsp;&nbsp;OFFICE OF THE VICE PRESIDENT FOR FINANCE
                        </h4>
                    </td>
                    <td style="text-align: center; vertical-align: middle; font-family: 'Calibri', sans-serif; font-size: 7pt; font-weight: bold; border: 0.5px solid black; padding: 1px;">
                        <?php echo e($dateRange); ?>

                    </td>
                </tr>
            </table>
            <br>
            <h4 style="font-family: 'Californian FB', serif; font-size: 18pt; font-weight: bold; margin: 1px 0; text-align: center;">
                Summary Report
            </h4>
            <?php
            // Initialize counters for each category
            $counts = [
                'fundRaising' => ['Pending Approval' => 0, 'Returned' => 0, 'Approved' => 0],
                'inCampus' => ['Pending Approval' => 0, 'Returned' => 0, 'Approved' => 0],
                'offCampus' => ['Pending Approval' => 0, 'Returned' => 0, 'Approved' => 0],
            ];
        
            // Count applications based on status and activity type
            foreach ($applications as $application) {
                $activity = strtolower(trim($application['proposed_activity']));
                $status = $application['status'];
        
                if ($activity === 'fund raising') {
                    $counts['fundRaising'][$status]++;
                } elseif ($activity === 'in campus') {
                    $counts['inCampus'][$status]++;
                } elseif ($activity === 'off campus') {
                    $counts['offCampus'][$status]++;
                }
            }
        
            // Calculate total counts
            $totalCounts = [
                'Pending Approval' => $counts['fundRaising']['Pending Approval'] + $counts['inCampus']['Pending Approval'] + $counts['offCampus']['Pending Approval'],
                'Returned' => $counts['fundRaising']['Returned'] + $counts['inCampus']['Returned'] + $counts['offCampus']['Returned'],
                'Approved' => $counts['fundRaising']['Approved'] + $counts['inCampus']['Approved'] + $counts['offCampus']['Approved'],
            ];
        ?>
        
        <div style="margin-top: -15px; font-family: 'Calibri', sans-serif;">
            <h5 style="color: #2c3e50; font-size: 13pt; font-weight: bold; border-bottom: 2px solid #000000; padding-bottom: 5px;">Fund Raising</h5>
            <div class="count-section" style="font-size: 14px">
                <p><strong>Total Pending Application:</strong> <span class="count"><?php echo e($counts['fundRaising']['Pending Approval']); ?></span></p>
                <p><strong>Total Returned:</strong> <span class="count"><?php echo e($counts['fundRaising']['Returned']); ?></span></p>
                <p><strong>Total Approved:</strong> <span class="count"><?php echo e($counts['fundRaising']['Approved']); ?></span></p>
                <p><strong>Total Applications:</strong> <span class="count"><?php echo e(array_sum($counts['fundRaising'])); ?></span></p>
            </div>
        
            <h5 style="color: #2c3e50; font-size: 13pt; font-weight: bold; border-bottom: 2px solid #000000; padding-bottom: 5px;">In-Campus</h5>
            <div class="count-section" style="font-size: 14px">
                <p><strong>Total Pending Application:</strong> <span class="count"><?php echo e($counts['inCampus']['Pending Approval']); ?></span></p>
                <p><strong>Total Returned:</strong> <span class="count"><?php echo e($counts['inCampus']['Returned']); ?></span></p>
                <p><strong>Total Approved:</strong> <span class="count"><?php echo e($counts['inCampus']['Approved']); ?></span></p>
                <p><strong>Total Applications:</strong> <span class="count"><?php echo e(array_sum($counts['inCampus'])); ?></span></p>
            </div>
        
            <h5 style="color: #2c3e50; font-size: 13pt; font-weight: bold; border-bottom: 2px solid #000000; padding-bottom: 5px;">Off-Campus</h5>
            <div class="count-section" style="font-size: 14px">
                <p><strong>Total Pending Application:</strong> <span class="count"><?php echo e($counts['offCampus']['Pending Approval']); ?></span></p>
                <p><strong>Total Returned:</strong> <span class="count"><?php echo e($counts['offCampus']['Returned']); ?></span></p>
                <p><strong>Total Approved:</strong> <span class="count"><?php echo e($counts['offCampus']['Approved']); ?></span></p>
                <p><strong>Total Applications:</strong> <span class="count"><?php echo e(array_sum($counts['offCampus'])); ?></span></p>
            </div>
        
            <h5 style="color: #2c3e50; font-size: 13pt; font-weight: bold; border-bottom: 2px solid #000000; padding-bottom: 5px;">Total Proposed Activity</h5>
            <div class="count-section" style="font-size: 14px">
                <p><strong>Total Pending Application:</strong> <span class="count"><?php echo e($totalCounts['Pending Approval']); ?></span></p>
                <p><strong>Total Returned:</strong> <span class="count"><?php echo e($totalCounts['Returned']); ?></span></p>
                <p><strong>Total Approved:</strong> <span class="count"><?php echo e($totalCounts['Approved']); ?></span></p>
                <p><strong>Total Applications:</strong> <span class="count"><?php echo e(count($applications)); ?></span></p>
            </div>
        </div>
        
        <style>
            .count-section {
                background-color: #ecf0f1;
                border-radius: 5px;
                padding: 15px;
                margin-bottom: 20px;
            }
            .count {
                font-weight: bold;
                color: #2980b9;
            }
        </style>        


        <?php
            $priority = ['Approved' => 1, 'Pending Approval' => 2, 'Returned' => 3];

            // Convert the collection to an array
            $applicationsArray = $applications->toArray();

            // Sort the array
            usort($applicationsArray, function ($a, $b) use ($priority) {
                return $priority[$a['status']] <=> $priority[$b['status']];
            });
        ?>

        <!-- Fund Raising Section -->
        <div class="page">
            <table id="headerTable" style="width: 100%; border-collapse: collapse; margin-top: -5px;">
                <tr>
                    <td style="width: 80px; vertical-align: middle;">
                        <?php if($logo && $logo->oss_logo && file_exists(public_path('images/' . $logo->oss_logo))): ?>
                            <img src="<?php echo e(public_path('images/' . $logo->oss_logo)); ?>" width="80px" alt="University Logo">
                        <?php else: ?>
                            <p>Image not found</p>
                        <?php endif; ?>
                    </td>
                    <td style="text-align: left; vertical-align: middle;">
                        <h4 style="font-family: 'Calibri', sans-serif; font-size: 10pt; font-weight: normal; margin: 0;">
                            &nbsp;&nbsp;&nbsp;Republic of the Philippines
                        </h4>
                        <h4 style="font-family: 'Californian FB', serif; font-size: 12pt; font-weight: bold; margin: 0;">
                            &nbsp;&nbsp;&nbsp;POLYTECHNIC UNIVERSITY OF THE PHILIPPINES
                        </h4>
                        <h4 style="font-family: 'Californian FB', serif; font-size: 12pt; font-weight: normal; margin: 0;">
                            &nbsp;&nbsp;&nbsp;OFFICE OF THE VICE PRESIDENT FOR FINANCE
                        </h4>
                    </td>
                    <td style="text-align: center; vertical-align: middle; font-family: 'Calibri', sans-serif; font-size: 24pt; font-weight: bold; border: 0.5px solid black; padding: 1px;">
                        Fund Raising
                    </td>
                </tr>
            </table>
            <div style="margin-top: -15px; font-family: 'Calibri', sans-serif;">
                <h5 style="color: #2c3e50; font-size: 13pt; font-weight: bold; border-bottom: 2px solid #000000; padding-bottom: 45px;"></h5>
                <div class="count-section" style="font-size: 14px">
                    <p><strong>Total Pending Application:</strong> <span class="count"><?php echo e($counts['fundRaising']['Pending Approval']); ?></span></p>
                    <p><strong>Total Returned:</strong> <span class="count"><?php echo e($counts['fundRaising']['Returned']); ?></span></p>
                    <p><strong>Total Approved:</strong> <span class="count"><?php echo e($counts['fundRaising']['Approved']); ?></span></p>
                    <p><strong>Total Applications:</strong> <span class="count"><?php echo e(array_sum($counts['fundRaising'])); ?></span></p>
                </div>
            </div>
            <br>
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                <thead>
                    <tr>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Project Name</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Organization</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Proposed Activity</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Start Date</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">End Date</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">College Branch</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Total Estimated Income</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Place of Activity</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Status</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Submission Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $hasFundRaising = false; ?>
                    <?php $__currentLoopData = $applicationsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(trim(strtolower($application['proposed_activity'])) === 'fund raising'): ?>
                            <?php $hasFundRaising = true; ?>
                            <tr>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['name_of_project']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['name_of_organization']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['proposed_activity']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['start_date']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['end_date']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['college_branch']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['total_estimated_income']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['place_of_activity'] ?: 'N/A'); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['status']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['submission_date']); ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!$hasFundRaising): ?>
                        <tr>
                            <td colspan="10" style="border: 1px solid black; padding: 5px; text-align: left;" class="no-applications">No applications found in this category.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- In Campus Section -->
        <div class="page">
            <table id="headerTable" style="width: 100%; border-collapse: collapse; margin-top: -5px;">
                <tr>
                    <td style="width: 80px; vertical-align: middle;">
                        <?php if($logo && $logo->oss_logo && file_exists(public_path('images/' . $logo->oss_logo))): ?>
                            <img src="<?php echo e(public_path('images/' . $logo->oss_logo)); ?>" width="80px" alt="University Logo">
                        <?php else: ?>
                            <p>Image not found</p>
                        <?php endif; ?>
                    </td>
                    <td style="text-align: left; vertical-align: middle;">
                        <h4 style="font-family: 'Calibri', sans-serif; font-size: 10pt; font-weight: normal; margin: 0;">
                            &nbsp;&nbsp;&nbsp;Republic of the Philippines
                        </h4>
                        <h4 style="font-family: 'Californian FB', serif; font-size: 12pt; font-weight: bold; margin: 0;">
                            &nbsp;&nbsp;&nbsp;POLYTECHNIC UNIVERSITY OF THE PHILIPPINES
                        </h4>
                        <h4 style="font-family: 'Californian FB', serif; font-size: 12pt; font-weight: normal; margin: 0;">
                            &nbsp;&nbsp;&nbsp;OFFICE OF THE VICE PRESIDENT FOR FINANCE
                        </h4>
                    </td>
                    <td style="text-align: center; vertical-align: middle; font-family: 'Calibri', sans-serif; font-size: 24pt; font-weight: bold; border: 0.5px solid black; padding: 1px;">
                        In-Campus
                    </td>
                </tr>
            </table>
            <div style="margin-top: -15px; font-family: 'Calibri', sans-serif;">
                <h5 style="color: #2c3e50; font-size: 13pt; font-weight: bold; border-bottom: 2px solid #000000; padding-bottom: 45px;"></h5>
                <div class="count-section" style="font-size: 14px">
                    <p><strong>Total Pending Application:</strong> <span class="count"><?php echo e($counts['inCampus']['Pending Approval']); ?></span></p>
                    <p><strong>Total Returned:</strong> <span class="count"><?php echo e($counts['inCampus']['Returned']); ?></span></p>
                    <p><strong>Total Approved:</strong> <span class="count"><?php echo e($counts['inCampus']['Approved']); ?></span></p>
                    <p><strong>Total Applications:</strong> <span class="count"><?php echo e(array_sum($counts['inCampus'])); ?></span></p>
                </div>
            </div>
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px; margin-top: 39px">
                <thead>
                    <tr>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Project Name</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Organization</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Proposed Activity</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Start Date</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">End Date</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">College Branch</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Total Estimated Income</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Place of Activity</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Status</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Submission Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $hasInCampus = false; ?>
                    <?php $__currentLoopData = $applicationsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(trim(strtolower($application['proposed_activity'])) === 'in campus'): ?>
                            <?php $hasInCampus = true; ?>
                            <tr>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['name_of_project']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['name_of_organization']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['proposed_activity']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['start_date']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['end_date']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['college_branch']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['total_estimated_income']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['place_of_activity'] ?: 'N/A'); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['status']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['submission_date']); ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!$hasInCampus): ?>
                        <tr>
                            <td colspan="10" style="border: 1px solid black; padding: 5px; text-align: left;" class="no-applications">No applications found in this category.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Off Campus Section -->
        <div class="page">
            <table id="headerTable" style="width: 100%; border-collapse: collapse; margin-top: -5px;">
                <tr>
                    <td style="width: 80px; vertical-align: middle;">
                        <?php if($logo && $logo->oss_logo && file_exists(public_path('images/' . $logo->oss_logo))): ?>
                            <img src="<?php echo e(public_path('images/' . $logo->oss_logo)); ?>" width="80px" alt="University Logo">
                        <?php else: ?>
                            <p>Image not found</p>
                        <?php endif; ?>
                    </td>
                    <td style="text-align: left; vertical-align: middle;">
                        <h4 style="font-family: 'Calibri', sans-serif; font-size: 10pt; font-weight: normal; margin: 0;">
                            &nbsp;&nbsp;&nbsp;Republic of the Philippines
                        </h4>
                        <h4 style="font-family: 'Californian FB', serif; font-size: 12pt; font-weight: bold; margin: 0;">
                            &nbsp;&nbsp;&nbsp;POLYTECHNIC UNIVERSITY OF THE PHILIPPINES
                        </h4>
                        <h4 style="font-family: 'Californian FB', serif; font-size: 12pt; font-weight: normal; margin: 0;">
                            &nbsp;&nbsp;&nbsp;OFFICE OF THE VICE PRESIDENT FOR FINANCE
                        </h4>
                    </td>
                    <td style="text-align: center; vertical-align: middle; font-family: 'Calibri', sans-serif; font-size: 24pt; font-weight: bold; border: 0.5px solid black; padding: 1px;">
                        Off-Campus
                    </td>
                </tr>
            </table>
            <div style="margin-top: -15px; font-family: 'Calibri', sans-serif;">
                <h5 style="color: #2c3e50; font-size: 13pt; font-weight: bold; border-bottom: 2px solid #000000; padding-bottom: 45px;"></h5>
                <div class="count-section" style="font-size: 14px">
                    <p><strong>Total Pending Application:</strong> <span class="count"><?php echo e($counts['offCampus']['Pending Approval']); ?></span></p>
                    <p><strong>Total Returned:</strong> <span class="count"><?php echo e($counts['offCampus']['Returned']); ?></span></p>
                    <p><strong>Total Approved:</strong> <span class="count"><?php echo e($counts['offCampus']['Approved']); ?></span></p>
                    <p><strong>Total Applications:</strong> <span class="count"><?php echo e(array_sum($counts['offCampus'])); ?></span></p>
                </div>
            </div>
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px; margin-top: 39px">
                <thead>
                    <tr>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Project Name</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Organization</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Proposed Activity</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Start Date</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">End Date</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">College Branch</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Total Estimated Income</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Place of Activity</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Status</th>
                        <th style="border: 1px solid black; padding: 5px; text-align: left;">Submission Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $hasOffCampus = false; ?>
                    <?php $__currentLoopData = $applicationsArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(trim(strtolower($application['proposed_activity'])) === 'off campus'): ?>
                            <?php $hasOffCampus = true; ?>
                            <tr>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['name_of_project']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['name_of_organization']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['proposed_activity']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['start_date']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['end_date']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['college_branch']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['total_estimated_income']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['place_of_activity'] ?: 'N/A'); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['status']); ?></td>
                                <td style="border: 1px solid black; padding: 5px; text-align: left;"><?php echo e($application['submission_date']); ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!$hasOffCampus): ?>
                        <tr>
                            <td colspan="10" style="border: 1px solid black; padding: 5px; text-align: left;" class="no-applications">No applications found in this category.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\College\oss\resources\views/faculty/generatepdf/allapplicationspdf.blade.php ENDPATH**/ ?>