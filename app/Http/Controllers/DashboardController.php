<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentDetail;
use App\Models\Course;
use App\Models\Student;
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
        $courses = Course::with('subjects')
            ->with('subjects.assignments')
            ->paginate(4)
            ;

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
            ->with('assignments')
            ->with('assignments.assignmentDetails')
            ->with('assignments.assignmentDetails.students')
            ->with('course')
            ->with('teacher')
            ->with('students')
            ->get()
            ->first();
            

        return Inertia::render('TeacherSubject', [
            'model' => $model,
        ]);
    }

    public function teacherShowAssginment($id)
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

        return Inertia::render('TeacherAssignment', [
            'model' => $model,
        ]);
    }

    public function studentDashboard()
    {
        $model = Student::whereBelongsTo(Auth::user())
            ->with('courses.subjects')
            ->with('user')
            ->get()->first();

        $courses = $model->courses;

        return Inertia::render('StudentDashboard', [
            'model' => $model,
            'courses' => $courses,
        ]);
    }

    // listing of all the student's enrolled courses
    public function studentCourses() {
        $model = Student::whereBelongsTo(Auth::user())
            ->with('courses')
            ->get()->first();

        $courses = $model->courses;

        return Inertia::render('StudentCourses', [
            'model' => $model,
            'courses' => $courses,
        ]);        
    }

    // individual courses page for students
    public function studentShowCourse(string $id) {
        
        $model = Course::whereId($id)
            ->with('subjects')
            ->with('subjects.assignments')
            ->with('subjects.assignments.assignmentDetails')
            ->with('subjects.assignments.assignmentDetails.students')
            ->with('teacher')
            ->get()->first();

        return Inertia::render('StudentCourse', [
            'model' => $model,
        ]);
    }

    public function studentAssingments() {

        // this is all the student's assignments
        $model = Student::whereBelongsTo(Auth::user())
            ->with('courses')
            ->with('courses.subjects')
            ->with('courses.subjects.assignments')
            ->get()->first();

        $subjects = [];

        foreach($model->courses as $course) {
            foreach($course->subjects as $subject) {
                $subjects[] = $subject;
            }
        }

        $submittedAssignments = AssignmentDetail::whereHas('students', function ($query) {
            $query->whereBelongsTo(Auth::user());
        })->get();

        return Inertia::render('StudentAssignments', [
            'model' => $model,
            'subjects' => $subjects,
            'submittedAssignments' => $submittedAssignments,
        ]);
    }

    public function showStudentAssignment(string $id) {

        $assignment = Assignment::findOrFail($id)->load('subject');

        $assignmentDetail = AssignmentDetail::whereBelongsTo($assignment)
            ->whereHas('students', function ($query) {
                $query->whereBelongsTo(Auth::user());
            })
            ->with('assignment')
            ->with('teacher')
            ->with('students')
            ->get()
            ->first();

        return Inertia::render('StudentAssignmentPage', [
            'assignment' => $assignment,
            'assignmentDetail' => $assignmentDetail,
        ]);
    }

    // actual store page 

    public function showCourse(string $id) {
        $model = Course::whereId($id)
            ->with('subjects')
            ->with('subjects.assignments')
            ->with('subjects.assignments.assignmentDetails')
            ->with('subjects.assignments.assignmentDetails.students')
            ->with('teacher')
            ->get()->first();

        dd($model);

        return Inertia::render('Course', [
            'model' => $model,
        ]);
    }
}
