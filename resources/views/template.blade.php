{{--Standard Template code --}}
    <!doctype html>
<html lang='en'>
<head>
    <title>js paul</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <link rel="stylesheet" href="/fontawesome/css/all.css">

    <link href='/css/base.css' type='text/css' rel='stylesheet'>

    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js" integrity="sha512-XLo6bQe08irJObCc86rFEKQdcFYbGGIHVXcfMsxpbvF8ompmd1SNJjqVY5hmjQ01Ts0UmmSQGfqpt3fGjm6pGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    @stack('head')

</head>

<body>

<header>
    <div class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
        <div class="container">
            <a href="../" class="navbar-brand"><h3>js paul</h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false">news <span class="caret"></span></a>
                        <div class="dropdown-menu" aria-labelledby="download">
                            <a class="dropdown-item" href="/">coming soon</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="download" aria-expanded="false">about me<span class="caret"></span></a>
                        <div class="dropdown-menu" aria-labelledby="download">
                            <a class="dropdown-item" href="/">home</a>
                            <a class="dropdown-item" href="/#welcome">welcome</a>
                            <a class="dropdown-item" href="/#education">education</a>
                            <a class="dropdown-item" href="/#achievements">achievements</a>
                            <a class="dropdown-item" href="/#languages">languages</a>
                            <a class="dropdown-item" href="/#skills">skills</a>
                            <a class="dropdown-item" href="/#volunteering">volunteering and work experience</a>
                            <a class="dropdown-item" href="/#other">other extra-curriculars</a>
                            <a class="dropdown-item" href="/#contact">contact</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/coursework">coursework</a>
                            <a class="dropdown-item" href="/achievements">detailed achievements</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/portfolio">portfolio</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    @if(Auth::check())
                        <li class="nav-item dropdown">

                            <a href="#" class="nav-link dropdown-toggle acc" data-toggle="dropdown" role="button" aria-expanded="false">my account <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="/account">Profile</a></li>

                                <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>

                            </ul>

                        </li>

                    @else
                        <li class="nav-item dropdown">

                            <a href="#" class="nav-link dropdown-toggle acc" data-toggle="dropdown" role="button" aria-expanded="false">my account <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="/register">Sign Up</a></li>

                                <li><a class="dropdown-item" href="/login">Login</a></li>
                            </ul>

                        </li>

                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
<br>

<div class="container" id="mainbody">
    @yield('data')
    <div class="baked">
        <br>
        <img class="img-baked" src="/images/ground.jpg" alt="">
        <br>
    </div>
</div>








<footer>
    <br>
    <div class="container">
        <h3 id="contact">follow me</h3>
        <br>
        <ul class="footer-nav">
            <li class="foot-item">
                <a href="https://github.com/jspaul2003"><i class="fab fa-github" style="font-size:42px;"></i></a>
            </li>
            <li class="foot-item">
                <a href="https://www.facebook.com/profile.php?id=100013608780941"><i class="fab fa-facebook" style="font-size:42px;"></i></a>
            </li>
            <li class="foot-item">
                <a href="https://twitter.com/jspaul2003"><i class="fab fa-twitter" style="font-size:42px;"></i></a>
            </li>
            <li class="foot-item">
                <a href="https://www.instagram.com/jspaul2003/"><i class="fab fa-instagram" style="font-size:42px;"></i></a>
            </li>
        </ul>
        <br>
        <ul class="footer-nav">
            <li class="foot-item">
                <a href="mailto:jspaul@caltech.edu"><i class="far fa-envelope" style="font-size:42px;"></i></a><span id="spanemail">&nbsp; &nbsp;jspaul@caltech.edu</span>
            </li>
        </ul>
    </div>
    <br>
</footer>

</body>
