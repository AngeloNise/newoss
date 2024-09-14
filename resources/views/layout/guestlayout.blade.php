<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office of the Student Services</title>
    <link rel="stylesheet" href="/css/guest.css">
</head>

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
                <li><a href="{{ url('/') }}">Home</a></li>
                <!--<li><a href="{{ url('/Dashboard') }}">Dashboard</a></li>-->
                <p>Upcoming Events<p>
                <li><a href="{{ url('/In-Campus!') }}">In-Campus</a></li>
                <li><a href="#">Off-Campus</a></li>
                <!--<li><a href="{{ url('/Application') }}">Application</a></li>-->
            </ul>            
        </div>   
    </div>
    @yield('content')
    <div class="login-option">
        <img src="image/OSS_LOGO.png" alt="PUP Logo" class="logo">
        <h1>Hi, PUPian!</h1>
        <p>Please click or tap your destination.</p>
        <div class="buttons">
            <a href="/login" class="button student">Student</a>
            <a href="/faculty/login" class="button faculty">Faculty</a>
        </div>
        <p class="terms">
            By using this service, you understood and agree to the PUP Online Services 
            <a href="/terms-of-use">Terms of Use</a> and 
            <a href="/privacy-statement">Privacy Statement</a>.
        </p>
    </div>
</body>
</html>