<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $guarded = ['id'];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courses()
    {
        // return $this->belongsToMany(Course::class, 'course_student', 'course_id', 'student_id');
        return $this->belongsToMany(Course::class, 'course_student')->withPivot('course_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function assignments()
    {
        return $this->belongsToMany(AssignmentDetail::class, 'assignment_detail_student', 'student_id', 'assignment_detail_id');
    }
}
