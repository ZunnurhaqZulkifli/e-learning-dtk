<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\StoreController;
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

        // showing all the subjects of the student
        Route::get('/subject/{id}', [StudentController::class, 'showSubject'])->name('student-show-subject');

        // showing all the assignments of the student
        Route::get('/assignments', [StudentController::class, 'assignments'])->name('student-assignments');

        // showing the individual assignment
        Route::get('/assignment/{id}', [StudentController::class, 'showAssignment'])->name('student-show-assignments');

        // saving notes
        Route::get('/notes/{id}', [NoteController::class, 'store'])->name('notes-store');
    }
);


Route::group(
    [
        'prefix' => '/store',
        'middleware' => HandlePrecognitiveRequests::class,
    ], function() {
    Route::get('/index', [StoreController::class, 'index'])->name('store-courses');
    Route::get('/preview/{course_id}', [StoreController::class, 'show'])->name('store-show-course');
    Route::get('/buy/{course_id}', [StoreController::class, 'buy'])->name('store-purchase-course');
});


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/do-login', [AuthController::class, 'doLogin'])->name('do-login');
Route::get('/pre-register', [AuthController::class, 'preRegister'])->name('pre-register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');