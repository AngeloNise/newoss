<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office of the Student Services</title>
    <link rel="stylesheet" href="{{ asset('css/Login/loginuser.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="{{ asset('js/org/orgscript.js') }}"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>


    <!-- Sidebar -->
    <div class="sb">
        <input type="checkbox" id="sidebar">
        <label for="sidebar" class="open">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
        </label>
        
        <label id="overlay" for="sidebar"></label>

        <!-- Sidebar Header with Logo and Title -->
        <div class="sidebar-header">
            <img src="{{ asset('images/1730626303_OSS_LOGO.png') }}" alt="OSS Logo">
            <h2>Office of Student Services</h2>
        </div>

        <div class="link-container">
            <label for="sidebar" class="close">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
            </label>
            <br><br><br><br><br><br>
            <ul>
                <li><a href="{{ url('/') }}"><i class="bx bx-home bx-sm"></i> Home</a></li>

                <li><a href="{{ url('/In-Campus!') }}"><i class="bx bx-calendar-event bx-sm"></i> Upcoming Events</a></li>
            </ul>            
        </div>   
    </div>  
    @yield('content')
</body>
</html>
