@php
 use App\Models\Course;   
@endphp

<style>
    .navbar2 {
        background-color: rgb(218, 218, 218);
        height: 35px;
        overflow: hidden;
        opacity: 1;
        visibility: show;
    }
</style>

<nav class="navbar2 navbar navbar-expand-lg">
    <div class="container-fluid">
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
                    <a class="nav-link {{ Request::routeIs('student-dashboard') ? 'text-primary' : 'text-dark' }}"
                       href="{{ route('student-dashboard') }}">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('student-assignments') ? 'text-primary' : 'text-dark' }}"
                       href="{{ route('student-assignments') }}">
                       Assignemnts
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('store-courses') ? 'text-primary' : 'text-dark' }}"
                       href="{{ route('store-courses') }}">
                       Courses
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('student-show-course') ? 'text-primary' : 'text-dark' }}"
                       href="{{ route('student-dashboard') }}">
                       Courses
                       {{ Request::routeIs('student-show-course') ?  '| ' . Course::find(request()->segment(3))->name : '' }}
                    </a>
                </li> --}}
            </ul>
    </div>
</div>
</nav>
