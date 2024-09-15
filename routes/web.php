<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [DashboardController::class, 'index'])
->middleware([HandlePrecognitiveRequests::class])
->name('dashboard');

Route::prefix('public')->middleware(
    ['auth']
)->group(function () {
    Route::get('/home', function () {
        return view('front.user.dashboard');
    });
});

// Custom login routes
Route::get('/pre-login', [LoginController::class, 'pre_login'])->name('pre_login');

// Login Route 
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Logout Route
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
