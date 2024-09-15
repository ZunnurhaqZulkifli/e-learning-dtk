<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


// public routes
Route::group(
    [
        // 'prefix' => '/',
        'middleware' => HandlePrecognitiveRequests::class,
    ],
    function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/about-us', [DashboardController::class, 'aboutUs'])->name('about-us');
    }
);

Route::prefix('public')->middleware(
    ['auth']
)->group(function () {
    Route::get('/home', function () {
        return view('front.user.dashboard');
    });
});

// Custom login routes
Route::get('/pre-login', [AuthController::class, 'pre_login'])->name('pre_login');

// Login Route 
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout Route
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
