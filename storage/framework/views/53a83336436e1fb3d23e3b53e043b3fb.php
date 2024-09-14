<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office of the Student Services</title>
    <link rel="stylesheet" href="/css/Login/loginuser.css">
    <link rel="stylesheet" href="/css/orgs/download.css">
    <link rel="stylesheet" href="/css/orgs/fraeval.css">
    <link rel="stylesheet" href="/css/orgs/preeval.css">
    <link rel="stylesheet" href="/css/orgs/accset.css">
    <link rel="stylesheet" href="/css/test.css">
    <script>
        function confirmDownload(event) {
            var userConfirmed = confirm("Are you sure you want to download this file?");
            if (!userConfirmed) {
                event.preventDefault();
            }
        }

        document.addEventListener("DOMContentLoaded", function() {

        var dropdownToggles = document.querySelectorAll('.dropdown-toggle');

        dropdownToggles.forEach(function(toggle) {
            toggle.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default anchor behavior
                var targetId = this.getAttribute('data-target');
                var dropdown = document.getElementById(targetId);

                if (dropdown) {
                    // Toggle the visibility of the dropdown
                    if (dropdown.style.display === 'block') {
                        dropdown.style.display = 'none';
                    } else {
                        // Close any open dropdowns
                        document.querySelectorAll('.dropdown').forEach(function(dd) {
                            dd.style.display = 'none';
                        });
                        dropdown.style.display = 'block';
                    }
                }
            });
        });

        const alertBox = document.querySelector('.alert');
            if (alertBox) {
                setTimeout(() => {
                    alertBox.style.opacity = '0';
                    setTimeout(() => {
                        alertBox.remove();
                    }, 500);
                }, 3000);
            }
        });
        document.querySelector('form').addEventListener('submit', function(event) {
        let inputs = document.querySelectorAll('input[type="file"]');
        let hasFile = Array.from(inputs).some(input => input.files.length > 0);

        if (!hasFile) {
            event.preventDefault();
            alert('Please add at least one document.');
        }
    });
    </script>
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

        <div class="link-container">
            <label for="sidebar" class="close">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
            </label>
            <ul>
                <li><a href="<?php echo e(url('/Homepage')); ?>">Home</a></li>
                <li><a href="<?php echo e(url('/Account-Settings')); ?>">Account Settings</a></li>
                <li><a href="<?php echo e(url('/Dashboard')); ?>">Dashboard</a></li>
                <div class="tooltip">
                    <p class="dropdown-toggle" data-target="application-dropdown">Application</p>
                    <div class="tooltiptext">Application History</div>
                </div>
                        <ul id="application-dropdown" class="dropdown">
                        <li><a href="<?php echo e(url('/Fund-Raising-History')); ?>">Fund Raising Activity</a></li>
                        <li><a href="<?php echo e(url('/In-Campus-History')); ?>">In-Campus Activity</a></li>
                        <li><a href="<?php echo e(url('/Off-Campus-History')); ?>">Off-Campus Activity</a></li>
                    </ul>
                <li><a href="<?php echo e(url('/Download')); ?>">Download Forms</a></li>
                <li><a href="<?php echo e(url('/Pre-Evaluation')); ?>">Pre-Evaluation</a></li>
                <p>Upcoming Events<p>
                <li><a href="<?php echo e(url('/In-Campus')); ?>">In-Campus</a></li>
                <li><a href="#">Off-Campus</a></li>
                <!--<li><a href="#">Log-Out</a></li>-->
            </ul>            
        </div>   
    </div>  
        <?php echo $__env->yieldContent('content'); ?>
</body>
</html><?php /**PATH D:\College\oss\resources\views/layout/orglayout.blade.php ENDPATH**/ ?>