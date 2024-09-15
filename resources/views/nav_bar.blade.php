<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(0, 71, 165)">
    <div class="container-fluid">
        <a class="navbar-brand text-white"
           href="/">E-Learning DTK</a>
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
                       class="nav-link text-white"
                       href="{{route('about-us')}}">About Us</a>
                </li>
            </ul>
        </div>

        @if (Auth::check())
            <div class="btn-group">
                <button aria-expanded="false"
                        class="btn dropdown-toggle text-white"
                        data-bs-display="static"
                        data-bs-toggle="dropdown"
                        type="button">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-lg-end">
                    <li><a class="dropdown-item" href="" type="button">Courses</a></li>
                    <li><a class="dropdown-item" href="" type="button">New Course</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}" type="button">Logout</a></li>
                </ul>
            </div>
        @else
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a aria-current="page"
                       class="nav-link text-white"
                       href="{{ route('pre_login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a aria-current="page"
                       class="nav-link text-white"
                       href="{{ route('pre_login') }}">Register</a>
                </li>
            </ul>
        @endif
    </div>
</nav>