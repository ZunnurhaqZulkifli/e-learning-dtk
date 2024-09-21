<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function assignmentDetails()
    {
        return $this->hasMany(AssignmentDetail::class);
    }

    public function assignmentStudents()
    {
        return $this->belongsToMany(Student::class, 'assignment_detail_student', 'assignment_detail_id', 'student_id');
    }
}
