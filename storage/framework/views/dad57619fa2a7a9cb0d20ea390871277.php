<?php $__env->startSection('content'); ?>
<style>
    .container_incampus {
        max-width: 90%;         /* Set the maximum width of the container. Adjust to increase or decrease width. */
        margin: 0 auto;         /* Center the container horizontally in the page. */
        padding: 20px;          /* Add padding inside the container for spacing. Adjust to increase or decrease space. */
    }

    .headerincampus_incampus {
        text-align: center;      /* Center the header container */
        margin-top: 70px;   /* Space above (top margin) and below (bottom margin) the header. Adjust the first value for top margin. */
        margin-left: 250px;
    }

    .formincampus-control_incampus {
        border-radius: 5px;      /* Round the corners of the input field. Adjust for more or less rounding. */
        border: 1px solid #ccc;  /* Set border style and color for the input field. Change color for different border styles. */
        padding: 10px;           /* Add padding inside the input field. Adjust for more or less space. */
        margin-bottom: 15px;      /* Space below the input field. Adjust to increase or decrease space. */
        width: 100%;              /* Set the width of the input field to full container width. Change to a specific width if needed. */
    }

    .btnincampus-primary_incampus {
        background-color: #ff5c5c; /* Set background color for primary button. Change hex value for different colors. */
        border-color: #ff5c5c;      /* Set border color for the button. Change hex value for different colors. */
        color: #fff;                /* Set text color for the button. Change hex value for different colors. */
        margin-left: 250px;
        padding: 10px 20px;        /* Set padding inside the button. Adjust for more or less space. */
        font-size: 16px;           /* Set font size for button text. Change the value for larger or smaller text. */
        border-radius: 5px;       /* Round the corners of the button. Adjust for more or less rounding. */
        text-decoration: none;     /* Remove underline from the button text */
        transition: background-color 0.3s ease; /* Set transition effect for background color change. Adjust duration for faster or slower transitions. */
    }

    .btnincampus-primary_incampus:hover {
        background-color: #e04e4e; /* Set background color when the button is hovered. Change hex value for different colors. */
        border-color: #e04e4e;      /* Set border color when the button is hovered. Change hex value for different colors. */
    }

    .btnincampus-edit_incampus {
        background-color: #ff5c5c; /* Set background color for primary button. Change hex value for different colors. */
        border-color: #ff5c5c;      /* Set border color for the button. Change hex value for different colors. */
        color: #fff;                /* Set text color for the button. Change hex value for different colors. */
        padding: 10px 20px;        /* Set padding inside the button. Adjust for more or less space. */
        font-size: 16px;           /* Set font size for button text. Change the value for larger or smaller text. */
        border-radius: 5px;       /* Round the corners of the button. Adjust for more or less rounding. */
        text-decoration: none;     /* Remove underline from the button text */
        transition: background-color 0.3s ease; /* Set transition effect for background color change. Adjust duration for faster or slower transitions. */

    }

    .btnincampus-edit_incampus:hover {
        background-color: #e04e4e; /* Set background color when the button is hovered. Change hex value for different colors. */
        border-color: #e04e4e;      /* Set border color when the button is hovered. Change hex value for different colors. */
    }

    .btnincampus-delete_incampus {
        background-color: #ff5c5c; /* Set background color for primary button. Change hex value for different colors. */
        border-color: #ff5c5c;      /* Set border color for the button. Change hex value for different colors. */
        color: #fff;                /* Set text color for the button. Change hex value for different colors. */
        padding: 10px 20px;        /* Set padding inside the button. Adjust for more or less space. */
        font-size: 16px;           /* Set font size for button text. Change the value for larger or smaller text. */
        border-radius: 5px;       /* Round the corners of the button. Adjust for more or less rounding. */
        text-decoration: none;     /* Remove underline from the button text */
        transition: background-color 0.3s ease; /* Set transition effect for background color change. Adjust duration for faster or slower transitions. */

    }

    .btnincampus-delete_incampus:hover {
        background-color: #e04e4e; /* Set background color when the button is hovered. Change hex value for different colors. */
        border-color: #e04e4e;      /* Set border color when the button is hovered. Change hex value for different colors. */
    }

    .alertincampus_incampus {
        margin-bottom: 20px;       /* Space below the alert box. Adjust to increase or decrease space. */
        padding: 15px;             /* Add padding inside the alert box. Adjust for more or less space. */
        border-radius: 5px;        /* Round the corners of the alert box. Adjust for more or less rounding. */
        color: #fff;               /* Set text color for alert messages. Change hex value for different colors. */
        text-align: center;         /* Center-align text inside the alert. Change to 'left' or 'right' for different alignment. */
        margin: 0 auto;
    }
    /* Alert styling */
    .alert-overlay {
        position: fixed;
        top: 20px;
        width: 100%;
        display: flex;
        justify-content: center;
        z-index: 1000; /* Ensure it stays on top */
        pointer-events: none; /* Click-through for underlying elements */
    }

        .alertsuccessincampus_incampus,
    .alerterrorincampus_incampus {
        width: 50%; /* Adjust width as needed to center within the container */
        margin: 20px 300px 30px auto; /* Top, Right, Bottom, Left */
        padding: 15px; /* Padding for better readability */
        color: #fff; /* Text color for contrast */
        border-radius: 5px; /* Rounded corners */
        text-align: center; /* Center the text inside the alert */
        font-weight: bold; /* Optional: bold text for emphasis */
    }

    .alertsuccessincampus_incampus {
        background-color: #4CAF50; /* Success alert color */
    }

    .alerterrorincampus_incampus {
        background-color: #f44336; /* Error alert color */
    }

    .fade-out {
        opacity: 0;
        transition: opacity 0.5s ease-out;
    }

    .cards-container {
        margin-left: 50px;
        display: flex;            /* Use flexbox for layout */
        flex-wrap: wrap;         /* Allow wrapping of items to the next line */
        justify-content: space-between; /* Space out cards evenly */
    }

    .cardincampus_incampus {
        border: 1px solid #ddd;    /* Set border style and color for the card. Change hex value for different colors. */
        border-radius: 10px;       /* Round the corners of the card. Adjust for more or less rounding. */
        margin-bottom: 20px;       /* Space below the card. Adjust to increase or decrease space. */
        margin-left: 250px;
        box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1); /* Set shadow for card. Adjust values for different shadow effects. */
        text-align: center;         /* Center content inside the card. Change to 'left' or 'right' for different alignment. */
        padding: 15px;             /* Add padding inside the card for better spacing */
        width: calc(30% - 20px);   /* Set width of card to be 30% of container width, accounting for margins */
    }

    .cardincampus_incampus img {
        width: 100%;                /* Set width for images within cards. Adjust to fit your design needs. */
        height: 300px;             /* Set a fixed height for images. Adjust to increase or decrease height. */
        object-fit: contain;        /* Ensure images cover the area without distortion. Change to 'contain' for different fitting. */
        border-top-left-radius: 10px; /* Round top-left corner of images. Adjust for more or less rounding. */
        border-top-right-radius: 10px; /* Round top-right corner of images. Adjust for more or less rounding. */
    }

    .cardbodyincampus_incampus {
        padding: 15px;             /* Add padding inside the card body. Adjust for more or less space. */
    }

    .btnlinkincampus_incampus {
        color: #ff5c5c;            /* Set text color for links. Change hex value for different colors. */
        display: block;            /* Make the link a block element to not be on the same row as others */
        margin-top: 10px;         /* Optional: space above the link */
    }

    .btnlinkincampus_incampus:hover {
        color: #e04e4e;            /* Set text color when link is hovered. Change hex value for different colors. */
        text-decoration: none;      /* Remove underline on hover. Change to 'underline' for consistent underlining. */
    }

    .create-button {
        margin-bottom: 20px;       /* Space below the create button. Adjust to increase or decrease space. */
        display: flex;             /* Use flexbox for layout. Adjust for different display styles if needed. */
        justify-content: center;    /* Center-align the button in its container. Change to 'flex-start' or 'flex-end' for different alignment. */
    }

    .search-bar {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
        margin-right: 350px;
    }

    .search-bar input[type="text"] {
        width: 300px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-left: 100px;
    }

    .search-bar button {
        padding: 10px;
        background-color: #ff5c5c;
        color: white;
        border: none;
        border-radius: 5px;
        margin-right: 350px;
        cursor: pointer;
    }

    .search-bar button:hover {
        background-color: #e04e4e;
    }
</style>
<div class="container_incampus">
    <h1 class="headerincampus_incampus">Admin: Manage All Events</h1>

    <?php if(session('success')): ?>
        <div class="alertincampus_incampus alertsuccessincampus_incampus">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alertincampus_incampus alerterrorincampus_incampus">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <!-- Create Event Button (Admin can create any event) -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Event::class)): ?> <!-- Check if user can create an event -->
    <div class="create-button">
        <a href="<?php echo e(route('faculty.events.create')); ?>" class="btnincampus-primary_incampus">Create Event</a>
    </div>
    <?php endif; ?>

    <div class="cards-container">
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="cardincampus_incampus">
                <img src="<?php echo e(asset('storage/' . $event->image)); ?>" class="cardimgincampus_incampus" alt="<?php echo e($event->title); ?>">
                <div class="cardbodyincampus_incampus">
                    <h5 class="cardtitleincampus_incampus"><?php echo e($event->title); ?></h5>
                    <p class="cardtextincampus_incampus"><?php echo e(Str::limit($event->description, 250, '...')); ?></p>
                    <p class="event-date"><?php echo e(\Carbon\Carbon::parse($event->event_date)->format('F j, Y g:i A')); ?></p>
                    <a href="<?php echo e($event->href); ?>" class="btnlinkincampus_incampus text-danger">Event Link</a>

                    <!-- Only show edit/delete options if user is authorized -->
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $event)): ?>
                        <a href="<?php echo e(route('faculty.events.edit', $event->id)); ?>" class="btnincampus-edit_incampus">Edit</a>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $event)): ?>
                        <form action="<?php echo e(route('faculty.events.destroy', $event->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btnincampus-delete_incampus">Delete</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Select all alert elements
    const alerts = document.querySelectorAll('.alertsuccessincampus_incampus, .alerterrorincampus_incampus');

    // Set a timeout to add the fade-out class after 2 seconds
    setTimeout(() => {
        alerts.forEach(alert => {
            alert.classList.add('fade-out');
        });
    }, 2000);

    // Set another timeout to remove the alert from the DOM completely after 2.5 seconds
    setTimeout(() => {
        alerts.forEach(alert => {
            alert.style.display = 'none';
        });
    }, 2500);
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/managepost.blade.php ENDPATH**/ ?>