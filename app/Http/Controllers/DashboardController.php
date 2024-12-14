<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if(isset($user)) {
            $userRoles = $user->roles->pluck('name');
        }

        $courses = Course::with('subjects')
            ->with('subjects.assignments')
            ->paginate(4)
        ;

        return Inertia::render('dashboards/dashboard', [
            'appUrl' => 'https://e-learning-dtk.ngrok.app',
            'images'  => Image::where('image_type_id', 1)->pluck('path'),
            'user'    => $user,
            'userRoles' => $userRoles ?? null,
            'courses' => $courses,
        ]);
    }

    public function aboutUs()
    {
        return Inertia::render('dashboards/about-us');
    }
}
