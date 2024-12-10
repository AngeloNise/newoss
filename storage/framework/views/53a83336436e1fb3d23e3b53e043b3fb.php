<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office of the Student Services</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/login/loginuser.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/orgs/notif.css')); ?>">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="<?php echo e(asset('js/org/orgscript.js')); ?>"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>

    <header>
        <!-- Display Username and Direct Logout -->
        <nav style="display: flex; justify-content: space-between; padding: 10px; align-items: center;">
            <div>
                <div style="position: relative">
                    <!-- Notification Bell Icon -->
                    <i class="bx bx-bell" style="cursor: pointer;" id="notif-bell"></i>
                    <?php if($new_notifications_count > 0): ?>
                        <span id="notif-count" style="position: absolute; top: -5px; right: 5px; background-color: red; color: white; border-radius: 50%; padding: 2px 6px; font-size: 12px;">
                            <?php echo e($new_notifications_count); ?>

                        </span>
                    <?php endif; ?>
                
                    <!-- Notification Dropdown -->
                    <div id="notif-dropdown" class="notification-container" style="display: none; position: absolute; top: 30px; right: 0; background: white; border: 1px solid #ccc; padding: 10px; width: 300px; z-index: 1000; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                        <div class="notification">
                            <?php if($organization_notifications->isEmpty()): ?>
                                <p>No new notifications.</p>
                            <?php else: ?>
                                <ul style="list-style: none; padding: 0; margin: 0;">
                                    <?php $__currentLoopData = $organization_notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li style="border-bottom: 1px solid #ddd; padding: 5px 0; cursor: pointer;" 
                                             onclick="window.location='<?php echo e(route('org.fra-a-evaluation.show', $notification['id'])); ?>'">
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
                <li><a href="<?php echo e(url('/Events')); ?>"><i class="bx bx-calendar-event bx-sm"></i> Upcoming Events</a></li>
                <li><a href="<?php echo e(url('/Account-Settings')); ?>"><i class="bx bx-cog bx-sm"></i> Account Settings</a></li>
            </ul>            
        </div>   
    </div>  
    <?php echo $__env->yieldContent('content'); ?>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle Application History Dropdown Toggle
        const dropdownToggle = document.querySelector('.dropdown-toggle');
        const dropdownMenu = document.getElementById('application-dropdown');

        // Event listener for the Application History dropdown
    dropdownToggle.addEventListener('click', function (event) {
        // Prevents event propagation to avoid interference with other click handlers
        event.stopPropagation();
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    });

        // Handle Notification Bell Dropdown
    const notifDropdown = document.getElementById('notif-dropdown');
    const notifBell = document.getElementById('notif-bell');
    const notifCountElement = document.getElementById('notif-count');
    
    notifBell.addEventListener('click', function (event) {
        event.stopPropagation(); // Prevent the click from bubbling to the document
        notifDropdown.style.display = notifDropdown.style.display === 'none' ? 'block' : 'none';

        // If the dropdown is opened, mark notifications as seen
        if (notifDropdown.style.display === 'block') {
            // Remove the notification count visually
            if (notifCountElement) {
                notifCountElement.remove();
            }

            // Store the current timestamp in localStorage to mark when the notifications were seen
            localStorage.setItem('notificationsSeenAt', new Date().toISOString());
        }
    });

        // Close the dropdowns if clicking outside
        document.addEventListener('click', function (event) {
            // Check if the click is outside the notification dropdown and bell
            if (!notifDropdown.contains(event.target) && event.target !== notifBell) {
                notifDropdown.style.display = 'none';
            }

            // Check if the click is outside the application dropdown
            if (!dropdownMenu.contains(event.target) && event.target !== dropdownToggle) {
                dropdownMenu.style.display = 'none';
            }
        });
    });


    window.addEventListener('load', function () {
        const lastSeen = localStorage.getItem('notificationsSeenAt'); // Get the timestamp of the last time notifications were seen
        const notifCountElement = document.getElementById('notif-count');
        
        // Get the latest notifications from the backend (you should pass this from the server)
        const notifications = <?php echo json_encode($organization_notifications, 15, 512) ?>; // This is the notifications array passed from your controller
        
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
                newNotifCountElement.style = 'position: absolute; top: -5px; right: 5px; background-color: red; color: white; border-radius: 50%; padding: 3px 6px; font-size: 12px;';
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
</script>
</html>
<?php /**PATH D:\College\oss\resources\views/layout/orglayout.blade.php ENDPATH**/ ?>