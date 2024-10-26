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

    protected $casts = [
        'start_date'   => 'datetime:Y-m-d',
        'submitted_at' => 'datetime:Y-m-d',
        'created_at'   => 'datetime:Y-m-d',
        'updated_at'   => 'datetime:Y-m-d',
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
