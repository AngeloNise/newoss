<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/faculty/dbadmin.css')); ?>">

<!-- Dashboard Analytics -->
<div class="parent">
    <!-- All Applications Analytics -->
    <div class="split">
        <div class="dashboard-line-analytics-container">
            <h2>Application Analytics</h2>
            <div class="chart-container">
                <canvas id="applicationChart" width="400" height="200"></canvas>
            </div>
            <h3>All Applications</h3>
        </div>

        <!-- Donut Chart for Breakdown -->
        <div class="dashboard-donut-analytics-container">
            <div class="chart-container">
                <canvas id="applicationBreakdownChart" width="400" height="200"></canvas>
            </div>
            <h3>Breakdown: In Campus, Off Campus, Fund Raising</h3>
            <strong>Total:</strong> <?php echo e($totalApplications); ?> applications
        </div>
    </div>

    <!-- Fundraising Applications Analytics -->
    <div class="split">
        <div class="dashboard-line-analytics-container">
            <h2>Pre-Approval Analytics</h2>
            <div class="chart-container">
                <canvas id="FRAChart" width="400" height="200"></canvas>
            </div>
            <h3>All Fundraising Applications</h3>
        </div>

        <!-- Donut Chart for Fundraising Breakdown -->
        <div class="dashboard-donut-analytics-container">
            <div class="chart-container">
                <canvas id="FRABreakdownChart" width="400" height="200"></canvas>
            </div>
            <h3>Breakdown: Pending Approval, Returned, Approved</h3>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data for the charts
    var monthlyData = <?php echo json_encode($monthlyData, 15, 512) ?>; // All applications per month
    var inCampusData = <?php echo json_encode($inCampusData, 15, 512) ?>;
    var offCampusData = <?php echo json_encode($offCampusData, 15, 512) ?>;
    var fundRaisingData = <?php echo json_encode($fundRaisingData, 15, 512) ?>;

    // Totals for the donut chart
    var totalInCampus = Object.values(inCampusData).reduce((a, b) => a + b, 0);
    var totalOffCampus = Object.values(offCampusData).reduce((a, b) => a + b, 0);
    var totalFundRaising = Object.values(fundRaisingData).reduce((a, b) => a + b, 0);

    // Labels for the months (1-12)
    var months = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    // Create All Applications Line Chart
    new Chart(document.getElementById('applicationChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'All Applications per Month',
                data: Object.values(monthlyData),
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: <?php echo e($stepSizeApplications); ?>,
                }
            }
        } 
    });

    // Create Donut Chart for Breakdown
    new Chart(document.getElementById('applicationBreakdownChart').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['In Campus', 'Off Campus', 'Fund Raising'],
            datasets: [{
                label: 'Total',
                data: [totalInCampus, totalOffCampus, totalFundRaising],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)', // In Campus
                    'rgba(255, 159, 64, 0.6)', // Off Campus
                    'rgba(153, 102, 255, 0.6)'  // Fund Raising
                ],
                hoverBackgroundColor: [
                    'rgba(54, 162, 235, 1)', // In Campus
                    'rgba(255, 159, 64, 1)', // Off Campus
                    'rgba(153, 102, 255, 1)'  // Fund Raising
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    var monthlyAnnexaData = <?php echo json_encode($monthlyAnnexaData, 15, 512) ?>; // Fundraising applications per month
    var statusData = <?php echo json_encode($statusData, 15, 512) ?>; // Status breakdown for fundraising applications

    // Create Fundraising Applications Line Chart
    new Chart(document.getElementById('FRAChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'All Pre Approval per Month',
                data: Object.values(monthlyAnnexaData),
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                fill: true,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: <?php echo e($stepSizeFundRaising); ?>, // Use the dynamic step size
                    }
                }
            }
        });
    // Create Donut Chart for Fundraising Status Breakdown
    new Chart(document.getElementById('FRABreakdownChart').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Pending Approval', 'Returned', 'Approved'],
            datasets: [{
                label: 'Total',
                data: [
                    statusData['Pending Approval'], 
                    statusData['Returned'], 
                    statusData['Approved']
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)', // Pending Approval
                    'rgba(255, 159, 64, 0.6)', // Returned
                    'rgba(153, 102, 255, 0.6)'  // Approved
                ],
                hoverBackgroundColor: [
                    'rgba(75, 192, 192, 1)', // Pending Approval
                    'rgba(255, 159, 64, 1)', // Returned
                    'rgba(153, 102, 255, 1)'  // Approved
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/dbadmin.blade.php ENDPATH**/ ?>