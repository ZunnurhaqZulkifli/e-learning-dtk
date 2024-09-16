<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

    public function teacherDashboard()
    {
        $model = Teacher::whereBelongsTo(Auth::user())->get();

        return Inertia::render('TeacherDashboard', [
            'model' => $model,
        ]);
    }
}
