<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Assignment;
use App\Models\AssignmentDetail;
use App\Models\Course;
use App\Models\Note;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $model = Student::whereBelongsTo(Auth::user())
            ->with('courses.subjects')
            ->with('user')
            ->get()->first();

        $courses = $model->courses;

        return Inertia::render('students/dashboard', [
            'model'   => $model,
            'courses' => $courses,
        ]);
    }

    // listing of all the student's enrolled courses
    public function courses()
    {
        $model = Student::whereBelongsTo(Auth::user())
            ->with('courses')
            ->get()->first();

        $courses = $model->courses;

        return Inertia::render('students/courses', [
            'model'   => $model,
            'courses' => $courses,
        ]);
    }

    // individual courses page for students
    public function showCourse(string $id)
    {

        $model = Course::whereId($id)
            ->with('subjects')
            ->with('subjects.assignments')
            // ->with('subjects.assignments.assignmentDetails')
            // ->with('subjects.assignments.assignmentDetails.students')
            ->with('teacher')
            ->get()->first();

        return Inertia::render('students/courses', [
            'model' => $model,
        ]);
    }

    public function showSubject(string $id)
    {
        $totalMarks = 0;

        $model = Subject::whereId($id)
            ->with('assignments')
            ->with('teacher')
            ->get()->first();

        $notes = Note::where('subject_id', $id)
            ->where('student_id', Auth::user()->id)
            ->get();
        
        $model['notes'] = $notes;
        $totalMarks += count($notes) * 2;
        
        foreach($model->assignments as $assignment) {
            $assignmentDetail[$assignment->id] = AssignmentDetail::where('assignment_id', $assignment->id)
                ->whereHas('students', function ($query) {
                    $query->where('assignment_details.name', Auth::user()->name);
                })->get()->toArray();
            
            $totalMarks += $assignmentDetail[$assignment->id][0]['marks'] ?? 0;
            $model['total_marks'] = $totalMarks;
        }

        if ($model->assignments->count() > 0) {
            foreach ($model->assignments as $assignment) {
                $assignment->assignmentDetail = $assignmentDetail[$assignment->id] ?? [];
            }
        }

        return Inertia::render('students/subjects', [
            'model' => $model,
            'student' => Auth::user(),
        ]);
    }

    public function assignments()
    {
        // this is all the student's assignments
        $model = Student::whereBelongsTo(Auth::user())
            ->with('courses')
            ->with('courses.subjects')
            ->with('courses.subjects.assignments')
            ->get()->first();

        $subjects = [];

        foreach ($model->courses as $course) {
            foreach ($course->subjects as $subject) {
                $subjects[] = $subject;
            }
        }

        $submittedAssignments = AssignmentDetail::whereHas('students', function ($query) {
            $query->whereBelongsTo(Auth::user());
        })->get();

        return Inertia::render('students/assignments', [
            'model'                => $model,
            'subjects'             => $subjects,
            'submittedAssignments' => $submittedAssignments,
        ]);
    }

    public function showAssignment(string $id)
    {

        $assignment = Assignment::findOrFail($id)->load('subject');

        $assignmentDetail = AssignmentDetail::whereBelongsTo($assignment)
            ->where('name', Auth::user()->name)
            ->with('assignment')
            ->with('teacher')
            ->get()
            ->first();
        
        // dd($assignmentDetail);
        return Inertia::render('students/assignments-page', [
            'assignment'       => $assignment,
            'assignmentDetail' => $assignmentDetail,
        ]);
    }
}
