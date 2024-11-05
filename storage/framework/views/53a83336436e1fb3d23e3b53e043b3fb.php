<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office of the Student Services</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/Login/loginuser.css')); ?>">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="<?php echo e(asset('js/org/orgscript.js')); ?>"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

</head>
<header>
    <div class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <?php echo e(Auth::user()->name); ?>

        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <?php echo e(__('Logout')); ?>

            </a>

            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
            </form>
        </div>
    </div>
</header>
<body>
    <div class="sb">
        <input type="checkbox" id="sidebar">
        <label for="sidebar" class="open">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
        </label>
        
        <label id="overlay" for="sidebar"></label>

        <div class="link-container" >
            <label for="sidebar" class="close">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
            </label>
            <ul>
                <li><a href="<?php echo e(url('/Homepage')); ?>"><i class="bx bx-home bx-sm"></i>&emsp;Home</a></li>
                <br>
                <li><a href="<?php echo e(url('/Download')); ?>"><i class="bx bx-download bx-sm"></i>&emsp;Download Forms</a></li>
                <li><a href="<?php echo e(url('/Pre-Evaluation')); ?>"><i class="bx bx-edit-alt bx-sm"></i>&emsp;Pre-Evaluation</a></li>
                <div class="tooltip">
                    <p class="dropdown-toggle" data-target="application-dropdown"><i class="bx bx-history bx-sm"></i>&emsp;Application History</p>
                    <div class="tooltiptext">Application History</div>
                </div>
                <ul id="application-dropdown" class="dropdown">
                    <li><a href="<?php echo e(url('/Fund-Raising-History')); ?>"><i class="bx bx-trending-up bx-sm"></i>&emsp;Fund Raising Activity</a></li>
                    <li> <a href="<?php echo e(url('/In-Campus-History')); ?>"><i class="bx bx-run bx-sm"></i>&emsp;In-Campus Activity</a></li>

                    <li>  <a href="<?php echo e(url('/Off-Campus-History')); ?>"><i class="bx bx-map-pin bx-sm"></i>&emsp;Off-Campus Activity</a></li>
                </ul>
                
                <li> <a href="<?php echo e(url('/Pre-Evaluation-PDF')); ?>"><i class="bx bx-file bx-sm"></i>&emsp;Generate / Download PDF</a></li>
                <li><a href="<?php echo e(url('/In-Campus')); ?>"> <i class="bx bx-calendar-event bx-sm"></i>&emsp;Upcoming Events</a></li>
                <br><br><br><br><br><br><br>
                <li><a href="<?php echo e(url('/Account-Settings')); ?>"><i class="bx bx-cog bx-sm"></i>&emsp;Account Settings</a></li>
            </ul>            
        </div>   
    </div>  
    <?php echo $__env->yieldContent('content'); ?>
</body>
</html>
<?php /**PATH D:\College\oss\resources\views/layout/orglayout.blade.php ENDPATH**/ ?>