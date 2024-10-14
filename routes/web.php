<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


// public routes
Route::group(
    [
        'middleware' => HandlePrecognitiveRequests::class,
    ],
    function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/about-us', [DashboardController::class, 'aboutUs'])->name('about-us');
        Route::get('/course/{id}', [DashboardController::class, 'showCourse'])->name('show-course');
    }
);

Route::group(
    [
        'prefix' => '/teacher',
        'middleware' => 'auth',
    ],
    function () {
        Route::get('/dashboard', [DashboardController::class, 'teacherDashboard'])->name('teacher-dashboard');
        Route::get('/course/{id}', [DashboardController::class, 'teacherShowCourse'])->name('teacher-show-course');
        Route::get('/subject/{id}', [DashboardController::class, 'teacherShowSubject'])->name('teacher-show-subject');
        Route::get('/assignment/{id}', [DashboardController::class, 'teacherShowAssginment'])->name('teacher-show-assingment');
    }
);

Route::group(
    [
        'prefix' => '/student',
        'middleware' => 'auth',
    ],
    function () {
        
        // shwowing the actual student's individual course
        Route::get('/dashboard', [DashboardController::class, 'studentDashboard'])->name('student-dashboard');
        
        // shwowing the individual course
        Route::get('/course/{id}', [DashboardController::class, 'studentShowCourse'])->name('student-show-course');

        // showing all the assignments of the student
        Route::get('/assignments', [DashboardController::class, 'studentAssingments'])->name('student-assignments');

        // showing the individual assignment
        Route::get('/assignment/{id}', [DashboardController::class, 'showStudentAssignment'])->name('student-show-assignments');
    }
);

// Custom login routes
Route::get('/pre-login', [AuthController::class, 'pre_login'])->name('pre_login');

// Login Route 
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout Route
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/pre-register', [AuthController::class, 'pre_register'])->name('pre_register');

Route::post('/register', [AuthController::class, 'register'])->name('register');