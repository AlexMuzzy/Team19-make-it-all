<?php
    $name = ucfirst(Route::currentRouteName());
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href={{asset('css/template.css')}} rel="stylesheet">
    <script>
        (document).ready(function () {
            $enable - shadows;
        });
    </script>
    <title>
        Make-it-all Helpdesk {{$name}}
    </title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark navbar-default">
        <div class="container my-2">
            <a class="navbar-brand" href="#">{{$name}} Page</a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-Main">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-between" id="navbar-Main">
                <ul class="navbar-nav ml-auto my-1">
                    <li class="nav-item">
                        <a class="nav-link ml-2" href={{route('home')}}>
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item ml-2">
                        <a class="nav-link" href="specialists.html">
                            <i class="fas fa-users"></i> Specialists
                        </a>
                    </li>
                    <li class="nav-item ml-2">
                        <a class="nav-link" href="logs.html">
                            <i class="fas fa-phone"></i> Call Logs
                        </a>
                    </li>
                    <li class="nav-item ml-2 ">
                        <a class="nav-link" href="profiles.html">
                            <i class="fas fa-user-circle"></i> Profiles
                        </a>
                    </li>
                    <li class="nav-item ml-2">
                        <a class="nav-link" href={{route('cases')}}>
                            <i class="fas fa-clipboard"></i> View Cases
                        </a>
                    </li>
                    <li class="nav-item ml-2">
                        <a class="nav-link" href="hardware.html">
                            <i class="fas fa-keyboard"></i> Hardware
                        </a>
                    </li>
                    <li class="nav-item ml-2 d-sm-block d-md-none">
                        <a class="nav-link" href="login.html">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
                <a class="nav-item ml-3 d-none d-md-block">
                    <div class="inset">
                        <img src="assets/pexels-photo-555790.jpg">
                    </div>
                </a>
                <ul class="nav navbar-nav navbar-right d-none d-md-block">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbar-main-dropdown" data-toggle="dropdown"></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="login.html">logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>