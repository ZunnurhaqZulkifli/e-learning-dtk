<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


// public routes
Route::group(
    [
        'middleware' => HandlePrecognitiveRequests::class,
    ],
    function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/about-us', [DashboardController::class, 'aboutUs'])->name('about-us');
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
    }
);

// Custom login routes
Route::get('/pre-login', [AuthController::class, 'pre_login'])->name('pre_login');

// Login Route 
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout Route
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
