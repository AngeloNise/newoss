<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office of the Student Services</title>
    <link rel="stylesheet" href="/css/login/loginuser.css">
    <link rel="stylesheet" href="/css/faculty/preevallist.css">
    <link rel="stylesheet" href="/css/faculty/preevalforms.css">
    <link rel="stylesheet" href="/css/faculty/oam.css">
    <link rel="stylesheet" href="/css/faculty/notif.css">
    <link rel="stylesheet" href="/css/faculty/application.css">
    <link rel="stylesheet" href="/css/faculty/applicationdetails.css">

    <link rel="stylesheet" href="/css/dean/comments.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


    <script src="/js/faculty/application.js"></script>
    <link rel="stylesheet" href="/css/orgs/fraeval/allannex.css">
    <link rel="stylesheet" href="/css/orgs/fraeval/annexa.css">
    
</head>
<header>
    <div class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
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
            <li><a href="{{ url('/dean/Homepage') }}">Homepage</a></li>
            <li><a href="{{ url('/dean/Dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/dean/Organization-Account-Management') }}">Organization Account Management</a></li>
            <li><a href="{{ url('/dean/Pre-Evaluation-Forms') }}">Pre Evaluation Forms</a></li>
        </ul>            
    </div>   
</div>  
    @yield('content')
</body>
</html>