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
    <script src="https://code.jquery.com/jquery-3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
    <header>
        <!-- Username and direct logout -->
        <nav style="display: flex; justify-content: flex-end; padding: 10px;">
            <a href="<?php echo e(url('/Account-Settings')); ?>" style="margin-right: 20px; color: #000; font-weight: bold;">
                <?php echo e(Auth::user()->name); ?>

            </a>
            <a href="<?php echo e(route('logout')); ?>" style="color: #000; font-weight: bold;" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
        </nav>

        <!-- Logout form (hidden) -->
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
            <?php echo csrf_field(); ?>
        </form>
    </header>

    <!-- Sidebar -->
    <div class="sb">
        <input type="checkbox" id="sidebar">
        <label for="sidebar" class="open">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
        </label>
        
        <label id="overlay" for="sidebar"></label>

        <!-- Sidebar Header with Logo and Title -->
        <div class="sidebar-header">
            <img src="<?php echo e(asset('images/1730626303_OSS_LOGO.png')); ?>" alt="OSS Logo">
            <h2><?php echo e(Auth::user()->name_of_organization); ?></h2>
        </div>

        <div class="link-container">
            <label for="sidebar" class="close">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
            </label>
            <ul>
                <li><a href="<?php echo e(url('/Homepage')); ?>"><i class="bx bx-home bx-sm"></i> Home</a></li>
                <li><a href="<?php echo e(url('/Download')); ?>"><i class="bx bx-download bx-sm"></i> Download Forms</a></li>
                <li><a href="<?php echo e(url('/Pre-Evaluation')); ?>"><i class="bx bx-edit-alt bx-sm"></i> Pre-Evaluation</a></li>
                <li>
                    <p class="dropdown-toggle"><i class="bx bx-history bx-sm"></i> Application History</p>
                    <ul id="application-dropdown" class="dropdown">
                        <li class=""><a href="<?php echo e(url('/Fund-Raising-History')); ?>"><i class="bx bx-trending-up bx-sm"></i> Fund Raising Activity</a></li>
                        <li><a href="<?php echo e(url('/In-Campus-History')); ?>"><i class="bx bx-run bx-sm"></i> In-Campus Activity</a></li>
                        <li><a href="<?php echo e(url('/Off-Campus-History')); ?>"><i class="bx bx-map-pin bx-sm"></i> Off-Campus Activity</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo e(url('/Submitted-Forms')); ?>"><i class="bx bx-file bx-sm"></i> Submitted Forms</a></li>
                <li><a href="<?php echo e(url('/Events')); ?>"><i class="bx bx-calendar-event bx-sm"></i> Upcoming Events</a></li>
                <li><a href="<?php echo e(url('/Account-Settings')); ?>"><i class="bx bx-cog bx-sm"></i> Account Settings</a></li>
            </ul>            
        </div>   
    </div>  
    <?php echo $__env->yieldContent('content'); ?>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownToggle = document.querySelector('.dropdown-toggle');
        const dropdownMenu = document.getElementById('application-dropdown');

        dropdownToggle.addEventListener('click', function() {
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });
    });
</script>
</html>
<?php /**PATH D:\College\oss\resources\views/layout/orglayout.blade.php ENDPATH**/ ?>