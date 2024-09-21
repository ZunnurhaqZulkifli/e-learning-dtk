<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentDetail extends Model
{
    use HasFactory;

    protected $table = 'assignment_details';

    protected $guarded = [
        'id',
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'assignment_detail_student', 'assignment_detail_id', 'student_id');
    }
}
