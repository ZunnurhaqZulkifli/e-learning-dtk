<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function students()
    {
        // return $this->belongsToMany(Student::class, 'course_student', 'course_id', 'student_id');
        return $this->belongsToMany(Student::class)->withPivot('student_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
