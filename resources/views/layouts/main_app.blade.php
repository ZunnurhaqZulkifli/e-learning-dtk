<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0"
          name="viewport">
    <meta content="ie=edge"
          http-equiv="X-UA-Compatible">

    <link crossorigin="anonymous"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
          rel="stylesheet">
    
    <script>var Alert = ReactBootstrap.Alert;</script>

    <title>E Learning</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand"
               href="#">E LEARN</a>
            <button aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                    class="navbar-toggler"
                    data-bs-target="#navbarNav"
                    data-bs-toggle="collapse"
                    type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse"
                 id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a aria-current="page"
                           class="nav-link active"
                           href="">Home</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="">

        @if (Auth::check())
            <a href="{{ route('dashboard') }}" class="btn btn-icon">Dashboard</a>
            <a href="" class="">Logout</a>
        @else
            <a href="{{ route('pre_login') }}" class="btn btn-icon">Login</a>
        @endif
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    
</body>

</html>
