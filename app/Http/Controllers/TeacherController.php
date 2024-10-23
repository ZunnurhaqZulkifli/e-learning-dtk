<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class TeacherController extends Controller
{
    public function dashboard()
    {
        $model = Teacher::whereBelongsTo(Auth::user())
            ->with('courses.subjects')
            ->with('courses.students')
            ->with('user')
            ->get()->first();

        $courses = Course::whereBelongsTo($model)->get();

        return Inertia::render('teachers/dashboard', [
            'model'   => $model,
            'courses' => $courses,
        ]);
    }

    public function showCourse($id)
    {
        $model = Course::whereId($id)
            ->with('subjects')
            ->with('students')
            ->with('teacher')
            ->get()->first();

        return Inertia::render('teachers/courses', [
            'model' => $model,
        ]);
    }

    public function showSubject($id)
    {
        $model = Subject::whereId($id)
            ->with('assignments')
            ->with('assignments.assignmentDetails')
            ->with('assignments.assignmentDetails.students')
            ->with('course')
            ->with('teacher')
            ->with('students')
            ->get()
            ->first();

        return Inertia::render('teachers/subjects', [
            'model' => $model,
        ]);
    }

    public function showAssignment($id)
    {
        $model = Assignment::whereId($id)
            ->whereHas('subject', function ($query) {
                $query->whereHas('teacher', function ($query) {
                    $query->whereBelongsTo(Auth::user());
                });
            })
            ->with('assignmentDetails')
            ->with('assignmentDetails.students')
            ->with('assignmentStudents')
            ->with('subject')
            ->with('subject.teacher')
            ->get()
            ->first();

        // if(isset($model)) {
        //     $model['assignments'] = AssignmentDetail::whereAssignmentId($model->id)
        //         ->with('assignment')
        //         ->where('is_graded', false)
        //         ->with('students')
        //         ->get();
        // }

        // dd($model);

        return Inertia::render('teachers/assignments', [
            'model' => $model,
        ]);
    }

}
