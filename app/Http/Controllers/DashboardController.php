<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $courses = Course::all();

        return Inertia::render('Dashboard', [
           'user' => $user,
           'courses' => $courses,
        ]);
    }

    public function aboutUs()
    {
        return Inertia::render('AboutUs');
    }
}
