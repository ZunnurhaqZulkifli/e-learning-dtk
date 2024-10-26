<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class StoreController extends Controller
{
    public function index()
    {
        $student = Student::whereBelongsTo(Auth::user())
            ->with('courses.subjects')
            ->with('user')
            ->get()->first();
        
        foreach ($student->courses as $course) {
            $ownedCourses[] = $course->name;
        }

        $courses = Course::with(['subjects', 'subjects.assignments'])
            ->paginate(100);

        foreach ($courses as $course) {
            $course['isOwned'] = in_array($course->name, $ownedCourses);
        }

        return Inertia::render('store/index', [
            'courses' => $courses,
        ]);
    }

    public function show(string $id)
    {
        $course = Course::where('id', $id)->with(['subjects', 'subjects.assignments'])->get()->first();

        return Inertia::render('store/show', [
            'course' => $course,
        ]);
    }

    public function buy(string $id)
    {
        dd(Course::find($id));
    }
}
