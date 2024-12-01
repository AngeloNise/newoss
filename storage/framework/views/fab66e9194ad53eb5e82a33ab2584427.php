<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office of the Student Services</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/login/loginuser.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/faculty/notif.css')); ?>">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="<?php echo e(asset('js/faculty/application.js')); ?>"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>
<body>
    <?php echo $__env->yieldContent('content'); ?>
    <header>
        <!-- Display Username and Direct Logout -->
        <nav style="display: flex; justify-content: space-between; padding: 10px; align-items: center;">
            <div>
                <div style="position: relative;">
                    <!-- Notification Bell Icon -->
                    <i class="bx bx-bell" style="cursor: pointer;" id="notif-bell">
                        <?php if($newNotificationCount > 0): ?>
                            <span id="notif-count" style="position: absolute; top: -5px; right: -10px; background-color: red; color: white; border-radius: 50%; padding: 3px 6px; font-size: 12px;">
                                <?php echo e($newNotificationCount); ?>

                            </span>
                        <?php endif; ?>
                    </i>                    
            
                    <!-- Notification Dropdown -->
                    <div id="notif-dropdown" class="notification-container" style="display: none; position: absolute; top: 30px; right: 0; background: white; border: 1px solid #ccc; padding: 10px; width: 300px; z-index: 1000; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                        <div class="notification">
                            <?php if($notifications->isEmpty()): ?>
                                <p>No new notifications.</p>
                            <?php else: ?>
                                <ul style="list-style: none; padding: 0; margin: 0;">
                                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li style="border-bottom: 1px solid #ddd; padding: 5px 0; cursor: pointer;" 
                                            onclick="window.location='<?php echo e(route('faculty.fra-a-evaluation.show', $notification['id'])); ?>'">
                                            <p style="margin: 0; font-size: 14px;">
                                                <?php echo e($notification['message']); ?>

                                                <br>
                                                <small style="color: #888;"><?php echo e($notification['time']); ?></small>
                                            </p>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <hr>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div style="display: flex; align-items: center;">
                <!-- Display Authenticated User's Name -->
                <span style="margin-right: 20px; color: #000; font-weight: bold;">
                    <?php echo e(Auth::user()->name); ?>

                </span>
                <!-- Logout Button -->
                <a href="<?php echo e(route('logout')); ?>" style="color: #000; font-weight: bold;" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </div>
        </nav>
    
        <!-- Logout Form (Hidden) -->
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
            <?php echo csrf_field(); ?>
        </form>
    </header>
    
    

    <!-- Sidebar -->
    <div class="sb" style="top: 0; position: fixed;">
        <input type="checkbox" id="sidebar">
        <label for="sidebar" class="open">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
        </label>
        
        <label id="overlay" for="sidebar"></label>

        <!-- Sidebar Header with Logo, Title, and Underline -->
        <div class="sidebar-header">
            <img src="<?php echo e(asset('images/1730626303_OSS_LOGO.png')); ?>" alt="OSS Logo">
            <h2>Office of Student Services</h2>
            <div class="underline"></div>
        </div>

        <div class="link-container">
            <label for="sidebar" class="close">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
            </label>
            <ul>
                <li><a href="<?php echo e(url('/faculty/Generate-Report')); ?>"><i class="bx bx-copy-alt"></i> Generate Report</a></li>
                <br>
                <li><a href="<?php echo e(url('/faculty/Dashboard-Admin')); ?>"><i class="bx bx-home"></i> Dashboard</a></li>
                <br>
                <li><a href="<?php echo e(url('/faculty/Organization-Account-Management')); ?>"><i class="bx bx-group"></i> Organization Account Management</a></li>
                <br>
                <li><a href="<?php echo e(url('/faculty/Application-Admin')); ?>"><i class="bx bx-folder"></i> Application</a></li>
                <br>
                <li><a href="<?php echo e(url('/faculty/Post-Report')); ?>"><i class="bx bx-file"></i> Post-Activity Report</a></li>
                <br>
                <li><a href="<?php echo e(url('/faculty/Pre-Evaluation-Status')); ?>"><i class="bx bx-edit"></i> Pre Evaluation Forms</a></li>
                <br>
                <li><a href="<?php echo e(route('faculty.managePost')); ?>"><i class="bx bx-pencil"></i> Manage/Create Post</a></li>
            </ul>
        </div>   
    </div>  
    
</body>
<script>
    document.getElementById('notif-bell').addEventListener('click', function () {
        const notifDropdown = document.getElementById('notif-dropdown');
        notifDropdown.style.display = notifDropdown.style.display === 'none' ? 'block' : 'none';
        
        // Check if the notification dropdown is being opened
        if (notifDropdown.style.display === 'block') {
            // Reset the notification count visually
            const notifCount = document.getElementById('notif-count');
            if (notifCount) {
                notifCount.remove();  // Remove the notification count badge
            }

            // Store a timestamp in localStorage to mark when the notifications were seen
            localStorage.setItem('notificationsSeenAt', new Date().toISOString());
        }
    });

    // On page load, check if the notifications have been seen and adjust the display of the count
    window.addEventListener('load', function () {
        const lastSeen = localStorage.getItem('notificationsSeenAt'); // Get the timestamp of the last time notifications were seen
        const notifCountElement = document.getElementById('notif-count');
        
        // Get the latest notifications from the backend (you should pass this from the server)
        const notifications = <?php echo json_encode($notifications, 15, 512) ?>; // This is the notifications array passed from your controller
        
        // Filter the notifications to find those that are newer than the last seen timestamp
        const newNotifications = notifications.filter(notification => {
            const updatedAt = new Date(notification.updated_at);
            const lastSeenDate = lastSeen ? new Date(lastSeen) : new Date(0); // Default to epoch if no timestamp exists
            return updatedAt > lastSeenDate; // Only consider notifications updated after the last seen time
        });

        // If there are new notifications, show the count
        if (newNotifications.length > 0) {
            // If the notification count element doesn't exist, create it dynamically
            if (!notifCountElement) {
                const notifBell = document.getElementById('notif-bell');
                const newNotifCountElement = document.createElement('span');
                newNotifCountElement.id = 'notif-count';
                newNotifCountElement.style = 'position: absolute; top: -5px; right: -10px; background-color: red; color: white; border-radius: 50%; padding: 3px 6px; font-size: 12px;';
                newNotifCountElement.textContent = newNotifications.length;
                notifBell.appendChild(newNotifCountElement);
            } else {
                // If the notification count element exists, just update it
                notifCountElement.textContent = newNotifications.length;
            }
        } else {
            // If no new notifications, remove the notification count element
            if (notifCountElement) {
                notifCountElement.remove();
            }
        }
    });

    // Close the dropdown if clicking outside
    document.addEventListener('click', function (event) {
        const dropdown = document.getElementById('notif-dropdown');
        const bell = document.getElementById('notif-bell');
        if (!dropdown.contains(event.target) && event.target !== bell) {
            dropdown.style.display = 'none';
        }
    });
</script>
</html>
<?php /**PATH D:\College\oss\resources\views/layout/adminlayout.blade.php ENDPATH**/ ?>