<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;


// public routes
Route::group(
    [
        'middleware' => HandlePrecognitiveRequests::class,
    ],
    function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/about-us', [DashboardController::class, 'aboutUs'])->name('about-us');
        Route::get('/course/{id}', [CourseController::class, 'show'])->name('show-course');
    }
);

Route::group(
    [
        'prefix' => '/teacher',
        'middleware' => 'auth',
    ],
    function () {
        Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('teacher-dashboard');
        Route::get('/course/{id}', [TeacherController::class, 'showCourse'])->name('teacher-show-course');
        Route::get('/subject/{id}', [TeacherController::class, 'showSubject'])->name('teacher-show-subject');
        Route::get('/assignment/{id}', [TeacherController::class, 'showAssignment'])->name('teacher-show-assingment');
    }
);

Route::group(
    [
        'prefix' => '/student',
        'middleware' => 'auth',
    ],
    function () {
        
        // shwowing the actual student's individual course
        Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student-dashboard');
        
        // shwowing the individual course
        Route::get('/course/{id}', [StudentController::class, 'showCourse'])->name('student-show-course');

        // showing all the assignments of the student
        Route::get('/assignments', [StudentController::class, 'assignments'])->name('student-assignments');

        // showing the individual assignment
        Route::get('/assignment/{id}', [StudentController::class, 'showAssignment'])->name('student-show-assignments');
    }
);


Route::get('/pre-login', [AuthController::class, 'preLogin'])->name('pre-login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/pre-register', [AuthController::class, 'preRegister'])->name('pre-register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');