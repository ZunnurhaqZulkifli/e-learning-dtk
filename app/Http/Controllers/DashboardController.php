<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Backpack\PermissionManager\app\Models\Role as ModelsRole;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

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
        $model = Teacher::whereBelongsTo(Auth::user())
            ->with('courses.subjects')
            ->with('courses.students')
            ->with('user')
            ->get()->first();

        $courses = Course::whereBelongsTo($model)->get();

        return Inertia::render('TeacherDashboard', [
            'model' => $model,
            'courses' => $courses,
        ]);
    }

    public function teacherShowCourse($id)
    {
        $model = Course::whereId($id)
            ->with('subjects')
            ->with('students')
            ->with('teacher')
            ->get()->first();

        return Inertia::render('TeacherCourse', [
            'model' => $model,
        ]);
    }

    public function teacherShowSubject($id)
    {
        $model = Subject::whereId($id)
            ->with('students')
            ->with('assignments')
            ->with('course')
            ->with('teacher')
            ->get()->first();

        return Inertia::render('TeacherSubject', [
            'model' => $model,
        ]);
    }
}
