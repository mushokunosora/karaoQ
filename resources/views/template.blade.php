{{--Standard Template code --}}
    <!doctype html>
<html lang='en'>
<head>
    <title>karaoQ</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <link rel="stylesheet" href="/fontawesome/css/all.css">

    <link href='/css/base.css' type='text/css' rel='stylesheet'>

    <link rel="icon" type="image/x-icon" sizes="16x16" href="/images/favicon.ico">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js" integrity="sha512-XLo6bQe08irJObCc86rFEKQdcFYbGGIHVXcfMsxpbvF8ompmd1SNJjqVY5hmjQ01Ts0UmmSQGfqpt3fGjm6pGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    @stack('head')

</head>

<body>

<header>
    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="https://youtu.be/dQw4w9WgXcQ">
                <img src="/images/favicon.png" height="36">
            </a>
            <a href="../" class="navbar-brand"><h3>karaoQ</h3></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-md-auto">

                    @if(Auth::check())
                        <li class="nav-item dropdown">

                            <a href="#" class="nav-link dropdown-toggle acc" data-toggle="dropdown" role="button" aria-expanded="false">my account <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="/account">admin page</a></li>

                                <li><a class="dropdown-item" href="{{ url('/logout') }}">logout</a></li>

                            </ul>

                        </li>

                    @else

                       <a href="/login" class="navbar-link" style="text-decoration: none;">login</a>

                    <!--
                        <li class="nav-item dropdown">

                            <a href="#" class="nav-link dropdown-toggle acc" data-toggle="dropdown" role="button" aria-expanded="false">my account <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="/register">sign up</a></li>

                                <li><a class="dropdown-item" href="/login">login</a></li>
                            </ul>

                        </li>
                        -->

                    @endif
                </ul>
            </div>
        </div>
    </div>
</header>
<br>

<div style="height: 40px;"></div>

<div class="container" id="mainbody">
    <br>
    @yield('data')
    <br>
</div>

<div style="height: 40px;"></div>
<!--
<footer>
    <br>
    <div class="container bg-light text-black" id="footcontainer">
        <h3 id="contact">follow karaoQ</h3>
        <br>
        <ul class="footer-nav">
            <li class="foot-item">
                <a href="https://github.com/mushokunosora/karaoQ"><i class="fab fa-github" style="font-size:42px; color: black"></i></a>
            </li>
            <li class="foot-item">
                <a href="mailto:alexisw@caltech.edu"><i class="far fa-envelope" style="font-size:42px; color: black"></i></a><span id="spanemail">&nbsp; &nbsp;alexisw@caltech.edu</span>
            </li>
            <li class="foot-item">
                <a href="mailto:jspaul@caltech.edu"><i class="far fa-envelope" style="font-size:42px; color: black"></i></a><span id="spanemail">&nbsp; &nbsp;jspaul@caltech.edu</span>
            </li>
            <li class="foot-item">
                <a href="mailto:knakagaw@caltech.edu"><i class="far fa-envelope" style="font-size:42px; color: black"></i></a><span id="spanemail">&nbsp; &nbsp;knakagaw@caltech.edu</span>
            </li>
        </ul>
        <br>
        <p>made with ♡</p>
    </div>
    <br>
</footer>

</body>-!>
