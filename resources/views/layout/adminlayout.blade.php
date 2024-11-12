<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office of the Student Services</title>
    <link rel="stylesheet" href="{{ asset('css/Login/loginuser.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="{{ asset('js/faculty/application.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>
<body>
    <header>
        <!-- Display Username and Direct Logout -->
        <nav style="display: flex; justify-content: flex-end; padding: 10px;">
            <span style="margin-right: 20px; color: #000; font-weight: bold;">
                {{ Auth::user()->name }}
            </span>
            <a href="{{ route('logout') }}" style="color: #000; font-weight: bold;" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
        </nav>

        <!-- Logout form (hidden) -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
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
            <img src="{{ asset('images/1730626303_OSS_LOGO.png') }}" alt="OSS Logo">
            <h2>Office of Student Services</h2>
            <div class="underline"></div>
        </div>

        <div class="link-container">
            <label for="sidebar" class="close">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
            </label>
            <ul>
                <li><a href="{{ url('/faculty/Dashboard-Admin') }}"><i class="bx bx-home"></i> Dashboard</a></li>
                <br>
                <li><a href="{{ url('/faculty/Organization-Account-Management') }}"><i class="bx bx-group"></i> Organization Account Management</a></li>
                <br>
                <li><a href="{{ url('/faculty/Application-Admin') }}"><i class="bx bx-folder"></i> Application</a></li>
                <br>
                <li><a href="{{ url('/faculty/Post-Report') }}"><i class="bx bx-file"></i> Post Report</a></li>
                <br>
                <li><a href="{{ url('/faculty/Pre-Evaluation-Status') }}"><i class="bx bx-edit"></i> Pre Evaluation Forms</a></li>
                <br>
                <li><a href="{{ route('faculty.managePost') }}"><i class="bx bx-pencil"></i> Manage/Create Post</a></li>
            </ul>
        </div>   
    </div>  
    @yield('content')
</body>

<!-- Additional Styles for Sidebar Header and Underline -->
<style>
    /* Sidebar adjustments */
    .sb {
        padding-top: 0;
        margin-top: 0;
        top: 0; /* Ensure sidebar is fixed to the top */
        position: fixed; /* Makes the sidebar stay at the top */
        overflow-y: auto; /* Adds scrolling if sidebar content overflows */
    }

    .sidebar-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 15px;
        color: #ffffff;
        text-align: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    }

    .sidebar-header img {
        width: 80px;
        height: auto;
        margin-bottom: 8px;
    }

    .sidebar-header h2 {
        font-size: 18px;
        font-weight: bold;
        margin: 0;
    }


</style>
</html>
