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
        return $this->belongsToMany(Student::class, 'student_courses');
    }
}
